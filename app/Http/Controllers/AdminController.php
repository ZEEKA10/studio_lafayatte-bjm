<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Exports\BookingsExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class AdminController extends Controller
{
    // Menampilkan form login
    public function login()
    {
        return view('admin.login');
    }

    // Memproses login
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Email atau Password salah!');
    }

    // Menampilkan dashboard admin
    public function dashboard(Request $request)
    {
        $search = $request->search;
        $status = $request->status;

        $bookings = Booking::with('package')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery
                        ->where('customer_name', 'like', '%' . $search . '%')
                        ->orWhere('kode_booking', 'like', '%' . $search . '%');
                });
            })
            ->when($status, function ($query) use ($status) {
                $query->where('status_reservasi', $status);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $totalBooking = Booking::count();

        $totalMenungguPembayaran = Booking::where(
            'status_reservasi',
            'menunggu_pembayaran'
        )->count();

        $totalMenungguVerifikasi = Booking::where(
            'status_reservasi',
            'menunggu_verifikasi'
        )->count();

        $totalTerkonfirmasi = Booking::where(
            'status_reservasi',
            'terkonfirmasi'
        )->count();

        $totalBerlangsung = Booking::where(
            'status_reservasi',
            'berlangsung'
        )->count();

        $totalSelesai = Booking::where(
            'status_reservasi',
            'selesai'
        )->count();

        return view(
            'admin.dashboard',
            compact(
                'bookings',
                'search',
                'status',
                'totalBooking',
                'totalMenungguPembayaran',
                'totalMenungguVerifikasi',
                'totalTerkonfirmasi',
                'totalBerlangsung',
                'totalSelesai'
            )
        );
    }

    public function notifikasiBooking(Request $request)
{
    $terakhirDilihat = $request->query('terakhir_dilihat');

    $query = Booking::with('package')
        ->orderBy('created_at', 'desc');

    if ($terakhirDilihat) {
        $query->where('created_at', '>', $terakhirDilihat);
    }

    $bookingBaru = $query->get();

    return response()->json([
        'jumlah' => $bookingBaru->count(),

        'booking' => $bookingBaru->map(function ($booking) {
            return [
                'id' => $booking->id,
                'kode_booking' => $booking->kode_booking,
                'customer_name' => $booking->customer_name,
                'nama_paket' => $booking->package->nama_paket ?? '-',
                'tanggal' => Carbon::parse($booking->tanggal)
                    ->locale('id')
                    ->translatedFormat('d F Y'),
                'jam' => Carbon::parse($booking->jam_mulai)
                    ->format('H:i'),
                'created_at' => $booking->created_at->toISOString(),
                'detail_url' => route(
                    'admin.bookingDetail',
                    $booking->id
                ),
            ];
        }),
    ]);
}

    public function bookingDetail($id)
    {
        $booking = Booking::with('package')->findOrFail($id);

        return view('admin.booking-detail', compact('booking'));
    }

    // Memproses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    // Memproses hasil scan QR Code untuk Check-in[cite: 1, 3]
    public function checkIn(Request $request)
    {
    $request->validate(['kode_booking' => 'required']);

    // Cari data booking berdasarkan kode dari QR[cite: 1, 3]
    $booking = Booking::where('kode_booking', $request->kode_booking)->first();

    if ($booking) {
    // Jika sudah pernah check-in
        if ($booking->status == 'Checked-in') {
            return back()->with('error', 'Peringatan: Booking ' . $booking->kode_booking . ' sudah melakukan Check-in sebelumnya!');
        }

    // Ubah status menjadi Checked-in[cite: 2, 4]
        $booking->update(['status' => 'Checked-in']);
            return back()->with('success', 'Berhasil! Customer ' . $booking->customer_name . ' telah Check-in.');
    }

        // Jika kode QR bukan milik sistem kita atau tidak valid
        return back()->with('error', 'Gagal: Kode Booking tidak ditemukan di database.');
    }

    // Fungsi untuk mengubah status booking secara manual[cite: 2, 4]
    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status_reservasi' => [
            'required',
            'in:menunggu_pembayaran,menunggu_verifikasi,terkonfirmasi,berlangsung,selesai',
        ],

        'status_pembayaran' => [
            'nullable',
            'in:belum_upload,menunggu_verifikasi,terverifikasi,perlu_upload_ulang',
        ],

        'alasan_bukti_ditolak' => [
            'nullable',
            'string',
            'max:1000',
        ],
    ]);

    $booking = Booking::findOrFail($id);

    $dataUpdate = [
        'status_reservasi' => $request->status_reservasi,
    ];

    if ($request->filled('status_pembayaran')) {
        $dataUpdate['status_pembayaran'] =
            $request->status_pembayaran;
    }

    if (
        $request->status_pembayaran === 'perlu_upload_ulang'
    ) {
        $request->validate([
            'alasan_bukti_ditolak' => [
                'required',
                'string',
                'max:1000',
            ],
        ]);

        $dataUpdate['alasan_bukti_ditolak'] =
            $request->alasan_bukti_ditolak;
    }

    if (
        $request->status_pembayaran === 'terverifikasi'
    ) {
        $dataUpdate['alasan_bukti_ditolak'] = null;
    }

    $booking->update($dataUpdate);

    return back()->with(
        'success',
        'Status reservasi ' .
        $booking->customer_name .
        ' berhasil diperbarui.'
    );
}

    // Fungsi untuk menghapus data booking[cite: 2, 4]
    public function deleteBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return back()->with('success', 'Data booking berhasil dihapus.');
    }

    public function exportExcel(Request $request)
{
    $request->validate([
        'tanggal_awal' => ['required', 'date'],
        'tanggal_akhir' => ['required', 'date', 'after_or_equal:tanggal_awal'],
    ], [
        'tanggal_awal.required' => 'Tanggal awal wajib dipilih.',
        'tanggal_akhir.required' => 'Tanggal akhir wajib dipilih.',
        'tanggal_akhir.after_or_equal' =>
            'Tanggal akhir tidak boleh lebih kecil dari tanggal awal.',
    ]);

    $tanggalAwal = Carbon::parse($request->tanggal_awal);

    $tanggalAkhir = Carbon::parse($request->tanggal_akhir);

    $bookings = Booking::with('package')
    ->whereDate('tanggal', '>=', $tanggalAwal->toDateString())
    ->whereDate('tanggal', '<=', $tanggalAkhir->toDateString())
    ->orderBy('tanggal', 'asc')
    ->get();

    return Excel::download(
        new BookingsExport($bookings),
        'Laporan-Booking-' .
        $tanggalAwal->format('d-m-Y') .
        '-sampai-' .
        $tanggalAkhir->format('d-m-Y') .
        '.xlsx'
    );
}

public function exportPdf(Request $request)
{
    $request->validate([
        'tanggal_awal' => ['required', 'date'],
        'tanggal_akhir' => ['required', 'date', 'after_or_equal:tanggal_awal'],
    ], [
        'tanggal_awal.required' => 'Tanggal awal wajib dipilih.',
        'tanggal_akhir.required' => 'Tanggal akhir wajib dipilih.',
        'tanggal_akhir.after_or_equal' =>
            'Tanggal akhir tidak boleh lebih kecil dari tanggal awal.',
    ]);

    $tanggalAwal = Carbon::parse($request->tanggal_awal);

    $tanggalAkhir = Carbon::parse($request->tanggal_akhir);

    $bookings = Booking::with('package')
    ->whereDate('tanggal', '>=', $tanggalAwal->toDateString())
    ->whereDate('tanggal', '<=', $tanggalAkhir->toDateString())
    ->orderBy('tanggal', 'asc')
    ->get();

    $totalBooking = $bookings->count();

    $totalPending = $bookings
        ->whereIn('status_reservasi', [
            'menunggu_pembayaran',
            'menunggu_verifikasi'
        ])
        ->count();

    $totalCheckin = $bookings
        ->where('status_reservasi', 'berlangsung')
        ->count();

    $totalSelesai = $bookings
        ->where('status_reservasi', 'selesai')
        ->count();

    /*
     * Sistem saat ini belum mempunyai status reservasi "batal".
     * Nilainya dibuat 0 agar template PDF lama tetap dapat digunakan.
     */
    $totalBatal = 0;

    $periode = $tanggalAwal
        ->locale('id')
        ->translatedFormat('d F Y')
    . ' - ' .
    $tanggalAkhir
        ->locale('id')
        ->translatedFormat('d F Y');

    $pdf = Pdf::loadView(
        'admin.laporan_pdf',
        compact(
            'bookings',
            'totalBooking',
            'totalPending',
            'totalCheckin',
            'totalSelesai',
            'totalBatal',
            'periode'
        )
    );

    return $pdf->stream(
    'Laporan-Booking-' .
    $tanggalAwal->format('d-m-Y') .
    '-sampai-' .
    $tanggalAkhir->format('d-m-Y') .
    '.pdf'
    );
}

}