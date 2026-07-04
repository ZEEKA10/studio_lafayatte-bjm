<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Booking;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BookingController extends Controller
{
    public function index()
    {
        $packages = Package::all();

        $timeSlots = $this->generateTimeSlots();

        return view(
            'booking.index',
            compact('packages', 'timeSlots')
        );
    }

    private function generateTimeSlots()
    {
        $slots = [];

        $start_time = Carbon::createFromTime(9, 0, 0);
        $end_time   = Carbon::createFromTime(21, 0, 0);

        while ($start_time < $end_time) {
            $slots[] = $start_time->format('H:i');
            $start_time->addMinutes(30);
        }

        return $slots;
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'no_hp'         => 'required',
            'tanggal'       => 'required',
            'jam_mulai'     => 'required',
            'package_id'    => 'required'
        ]);

        // Cek apakah slot pada tanggal dan jam yang dipilih masih tersedia
        $slotSudahTerisi = Booking::where('tanggal', $request->tanggal)
            ->where('jam_mulai', $request->jam_mulai)
            ->whereIn('status', ['Pending', 'Confirmed', 'Checked-in'])
            ->exists();

        if ($slotSudahTerisi) {
        return back()
            ->withInput()
            ->with('error', 'Jadwal yang dipilih sudah penuh. Silakan pilih jam lainnya.');
        }

        $lastBooking = Booking::orderBy('id', 'desc')->first();

        $urutan = $lastBooking ? $lastBooking->id + 1 : 1;

        $kodeBooking =
            'LFT-' .
            date('Y') .
            '-' .
            str_pad($urutan, 3, '0', STR_PAD_LEFT);

        $booking = Booking::create([
            'kode_booking' => $kodeBooking,
            'customer_name' => $request->customer_name,
            'no_hp' => $request->no_hp,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'package_id' => $request->package_id,
            'status' => 'Pending'
        ]);

        $package = Package::find($request->package_id);

return back()->with([

    'success' => true,

    'kode_booking' => $booking->kode_booking,

    'customer_name' => $booking->customer_name,

    'no_hp' => $booking->no_hp,

    'tanggal' => $booking->tanggal,

    'jam_mulai' => $booking->jam_mulai,

    'nama_paket' => $package->nama_paket,

    'status' => $booking->status

]);
    }

    public function getAvailableTimes(Request $request)
{
    $tanggal = $request->tanggal;

    $allTimeSlots = $this->generateTimeSlots();

    $bookings = Booking::where('tanggal', $tanggal)
        ->where('status', '!=', 'Batal')
        ->get();

    $bookedCounts = $bookings->map(function ($booking) {
        return date('H:i', strtotime($booking->jam_mulai));
    })->countBy();

    $availableDropdown = [];
    $jadwalDetail = [];

    foreach ($allTimeSlots as $slot) {

        $count = $bookedCounts->get($slot, 0);

        // Karena hanya ada 1 studio indoor
        $sisa = ($count == 0) ? 1 : 0;

        if ($sisa > 0) {
        $availableDropdown[] = $slot;
    }

        $jadwalDetail[] = [
        'jam' => $slot,
        'sisa' => $sisa,
        'status' => $sisa > 0 ? 'Tersedia' : 'Penuh'
    ];
    }

    return response()->json([
        'dropdown' => $availableDropdown,
        'detail' => $jadwalDetail
    ]);
}

public function downloadPdf($kode_booking)
{
    $booking = Booking::where(
        'kode_booking',
        $kode_booking
    )->firstOrFail();

    $qrCode = base64_encode(
        QrCode::format('svg')
            ->size(200)
            ->generate($booking->kode_booking)
    );

    $pdf = Pdf::loadView(
        'pdf.booking',
        compact(
            'booking',
            'qrCode'
        )
    );

    return $pdf->download(
        'Booking-' .
        $booking->kode_booking .
        '.pdf'
    );

    }


// =====================================
// CEK STATUS BOOKING
// =====================================

public function cekBooking(Request $request)
{
    $booking = null;

    if ($request->filled('kode') && $request->filled('hp')) {

        $booking = Booking::with('package')
            ->where('kode_booking', $request->kode)
            ->where('no_hp', $request->hp)
            ->first();

    }

    return view('booking.check', compact('booking'));
}

public function cariBooking(Request $request)
{
    $request->validate([
        'kode_booking' => 'required',
        'no_hp' => 'required'
    ]);

    $booking = Booking::with('package')
        ->where('kode_booking', $request->kode_booking)
        ->where('no_hp', $request->no_hp)
        ->first();

    if (!$booking) {
        return back()->with('error', 'Kode booking atau nomor WhatsApp tidak ditemukan.');
    }

    return view('booking.check', compact('booking'));
}

} // <-- Penutup class BookingController
    
