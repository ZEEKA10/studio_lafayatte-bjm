<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Booking;
use Carbon\Carbon;
use App\Services\BookingAvailabilityService;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BookingController extends Controller
{
    private BookingAvailabilityService $bookingAvailabilityService;

    public function __construct(
        BookingAvailabilityService $bookingAvailabilityService
    ) {
        $this->bookingAvailabilityService = $bookingAvailabilityService;
    }

    /**
     * Menampilkan halaman form booking.
     */
    public function index()
    {
        $packages = Package::query()
            ->where('aktif', true)
            ->orderBy('nama_paket')
            ->get();

        $timeSlots = $this->generateTimeSlots();

        return view(
            'booking.index',
            compact('packages', 'timeSlots')
        );
    }

    /**
     * Membuat pilihan jam setiap 30 menit,
     * mulai pukul 09.00 sampai 20.30.
     */
    private function generateTimeSlots(): array
    {
        $slots = [];

        $startTime = Carbon::createFromTime(9, 0);
        $endTime = Carbon::createFromTime(21, 0);

        while ($startTime->lt($endTime)) {
            $slots[] = $startTime->format('H:i');
            $startTime->addMinutes(30);
        }

        return $slots;
    }

    /**
     * Menyimpan booking baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => [
                'required',
                'string',
                'max:100',
            ],
            'no_hp' => [
                'required',
                'string',
                'max:20',
            ],
            'tanggal' => [
                'required',
                'date',
                'after_or_equal:today',
            ],
            'jam_mulai' => [
                'required',
                'date_format:H:i',
            ],
            'package_id' => [
                'required',
                'integer',
                'exists:packages,id',
            ],
        ], [
            'customer_name.required' => 'Nama pelanggan wajib diisi.',
            'no_hp.required' => 'Nomor WhatsApp wajib diisi.',
            'tanggal.required' => 'Tanggal booking wajib dipilih.',
            'tanggal.after_or_equal' => 'Tanggal booking tidak boleh sebelum hari ini.',
            'jam_mulai.required' => 'Jam booking wajib dipilih.',
            'jam_mulai.date_format' => 'Format jam booking tidak sesuai.',
            'package_id.required' => 'Paket wajib dipilih.',
            'package_id.exists' => 'Paket yang dipilih tidak ditemukan.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Ambil paket yang masih aktif
        |--------------------------------------------------------------------------
        */
        $package = Package::query()
            ->where('aktif', true)
            ->find($validated['package_id']);

        if (!$package) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Paket yang dipilih sudah tidak tersedia.'
                );
        }

        $jumlahSlot = (int) $package->jumlah_slot;
        $durasiMenit = $jumlahSlot * 30;

        /*
        |--------------------------------------------------------------------------
        | Hitung jam selesai
        |--------------------------------------------------------------------------
        */
        $jamSelesai = $this->bookingAvailabilityService
            ->calculateEndTime(
                $validated['jam_mulai'],
                $jumlahSlot
            );

        /*
        |--------------------------------------------------------------------------
        | Pastikan booking tidak melewati jam tutup
        |--------------------------------------------------------------------------
        */
        if ($jamSelesai > '21:00') {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Durasi paket melewati jam operasional studio. Silakan pilih jam yang lebih awal.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Cek ketersediaan seluruh rentang waktu
        |--------------------------------------------------------------------------
        */
        $tersedia = $this->bookingAvailabilityService
            ->isAvailable(
                $validated['tanggal'],
                $validated['jam_mulai'],
                $jumlahSlot
            );

        if (!$tersedia) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Jadwal yang dipilih sudah penuh atau bertabrakan dengan booking lain.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Membuat kode booking
        |--------------------------------------------------------------------------
        */
        $lastBooking = Booking::query()
            ->orderByDesc('id')
            ->first();

        $urutan = $lastBooking
            ? $lastBooking->id + 1
            : 1;

        $kodeBooking =
            'LFT-' .
            now()->format('Y') .
            '-' .
            str_pad(
                (string) $urutan,
                3,
                '0',
                STR_PAD_LEFT
            );

        /*
        |--------------------------------------------------------------------------
        | Simpan booking
        |--------------------------------------------------------------------------
        */
        $booking = Booking::create([
            'kode_booking' => $kodeBooking,

            'customer_name' => $validated['customer_name'],
            'no_hp' => $validated['no_hp'],

            'tanggal' => $validated['tanggal'],
            'jam_mulai' => $validated['jam_mulai'],
            'jam_selesai' => $jamSelesai,

            'package_id' => $package->id,

            'jumlah_slot' => $jumlahSlot,
            'durasi_menit' => $durasiMenit,

            /*
             * Menyimpan salinan harga dan ketentuan DP
             * saat booking dibuat.
             */
            'harga_saat_booking' => $package->harga,
            'wajib_dp' => $package->wajib_dp,
            'nominal_dp' => $package->nominal_dp,

            /*
             * Kolom status lama tetap diisi sementara
             * agar halaman lama tidak langsung rusak.
             */
            'status' => 'Pending',

            /*
             * Status Smart Booking.
             */
            'status_reservasi' => 'menunggu_pembayaran',
            'status_pembayaran' => 'belum_upload',
        ]);

        return back()->with([
    'success' => true,

    'kode_booking' => $booking->kode_booking,
    'customer_name' => $booking->customer_name,
    'no_hp' => $booking->no_hp,

    'tanggal' => $booking->tanggal,
    'jam_mulai' => $booking->jam_mulai,
    'jam_selesai' => $booking->jam_selesai,

    'nama_paket' => $package->nama_paket,

    'status' => $booking->status,
    'status_reservasi' => $booking->status_reservasi,
    'status_pembayaran' => $booking->status_pembayaran,

    'wajib_dp' => $booking->wajib_dp,
    'nominal_dp' => $booking->nominal_dp,
]);
}

public function pembayaran($kode_booking)
{
    $booking = Booking::where(
        'kode_booking',
        $kode_booking
    )->firstOrFail();

    return view(
        'booking.pembayaran',
        compact('booking')
    );
}

/**
 * Mengambil daftar jam yang tersedia berdasarkan
 * tanggal dan paket yang dipilih.
 */
public function getAvailableTimes(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => [
                'required',
                'date',
            ],
            'package_id' => [
                'nullable',
                'integer',
                'exists:packages,id',
            ],
        ]);

        /*
         * Jika package_id belum dikirim oleh halaman,
         * pengecekan sementara menggunakan satu slot.
         */
        $jumlahSlot = 1;

        if (!empty($validated['package_id'])) {
            $package = Package::query()
                ->where('aktif', true)
                ->find($validated['package_id']);

            if (!$package) {
                return response()->json([
                    'dropdown' => [],
                    'detail' => [],
                    'message' => 'Paket tidak tersedia.',
                ], 422);
            }

            $jumlahSlot = (int) $package->jumlah_slot;
        }

        $allTimeSlots = $this->generateTimeSlots();

        $availableDropdown = [];
        $jadwalDetail = [];

        foreach ($allTimeSlots as $slot) {
            $jamSelesai = $this->bookingAvailabilityService
                ->calculateEndTime(
                    $slot,
                    $jumlahSlot
                );

            /*
             * Slot tidak boleh melewati pukul 21.00.
             */
            $masihDalamJamOperasional = $jamSelesai <= '21:00';

            $tersedia = false;

            if ($masihDalamJamOperasional) {
                $tersedia = $this->bookingAvailabilityService
                    ->isAvailable(
                        $validated['tanggal'],
                        $slot,
                        $jumlahSlot
                    );
            }

            if ($tersedia) {
                $availableDropdown[] = $slot;
            }

            $jadwalDetail[] = [
                'jam' => $slot,
                'jam_selesai' => $jamSelesai,
                'sisa' => $tersedia ? 1 : 0,
                'status' => $tersedia
                    ? 'Tersedia'
                    : 'Penuh',
            ];
        }

        return response()->json([
            'dropdown' => $availableDropdown,
            'detail' => $jadwalDetail,
        ]);
    }

    /**
     * Mengunduh bukti booking dalam bentuk PDF.
     */
    public function downloadPdf($kodeBooking)
    {
        $booking = Booking::with('package')
            ->where('kode_booking', $kodeBooking)
            ->firstOrFail();

        $qrCode = base64_encode(
            QrCode::format('svg')
                ->size(200)
                ->generate($booking->kode_booking)
        );

        $pdf = Pdf::loadView(
            'pdf.booking',
            compact('booking', 'qrCode')
        );

        return $pdf->download(
            'Booking-' .
            $booking->kode_booking .
            '.pdf'
        );
    }

    /**
     * Menampilkan halaman cek booking.
     */
    public function cekBooking(Request $request)
    {
        $booking = null;

        if (
            $request->filled('kode') &&
            $request->filled('hp')
        ) {
            $booking = Booking::with('package')
                ->where(
                    'kode_booking',
                    $request->kode
                )
                ->where(
                    'no_hp',
                    $request->hp
                )
                ->first();
        }

        return view(
            'booking.check',
            compact('booking')
        );
    }

    /**
     * Mencari booking berdasarkan kode dan nomor WhatsApp.
     */
    public function cariBooking(Request $request)
    {
        $validated = $request->validate([
            'kode_booking' => [
                'required',
                'string',
            ],
            'no_hp' => [
                'required',
                'string',
            ],
        ], [
            'kode_booking.required' => 'Kode booking wajib diisi.',
            'no_hp.required' => 'Nomor WhatsApp wajib diisi.',
        ]);

        $booking = Booking::with('package')
            ->where(
                'kode_booking',
                $validated['kode_booking']
            )
            ->where(
                'no_hp',
                $validated['no_hp']
            )
            ->first();

        if (!$booking) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Kode booking atau nomor WhatsApp tidak ditemukan.'
                );
        }

        return view(
            'booking.check',
            compact('booking')
        );
    }
}