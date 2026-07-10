<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Exports\BookingsExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class AdminController extends Controller {
    // Menampilkan form login
    public function login()
    {
        return view('admin.login');
    }

    // Memproses data login[cite: 1, 3]
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Email atau Password salah!');
       }

       // Menampilkan Dashboard Admin
public function dashboard(Request $request)
{
    $search = $request->search;
    $status = $request->status;

    $bookings = Booking::with('package')

        ->when($search, function ($query) use ($search) {

        $query->where('customer_name', 'like', '%' . $search . '%')
              ->orWhere('kode_booking', 'like', '%' . $search . '%');

    })

    ->when($status, function ($query) use ($status) {

        $query->where('status', $status);

    })

    ->orderBy('created_at', 'desc')
    ->get();

    $totalBooking = Booking::count();

$totalPending = Booking::where(
    'status',
    'Pending'
)->count();

$totalCheckin = Booking::where(
    'status',
    'Checked-in'
)->count();

$totalSelesai = Booking::where(
    'status',
    'Selesai'
)->count();

$totalBatal = Booking::where(
    'status',
    'Batal'
)->count();

    return view(
    'admin.dashboard',
    compact(
        'bookings',
        'search',
        'status',
        'totalBooking',
        'totalPending',
        'totalCheckin',
        'totalSelesai',
        'totalBatal'
    )
);
}

    // Memproses Logout
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
        $request->validate(['status' => 'required']);
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => $request->status]);

        return back()->with('success', 'Status booking ' . $booking->customer_name . ' berhasil diubah menjadi ' . $request->status);
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
    $periode = $request->periode;
    $tanggal = $request->tanggal;

    $bookings = Booking::with('package');

    if ($periode == 'harian') {

        $bookings->whereDate('tanggal', $tanggal);

    } elseif ($periode == 'mingguan') {

        $bookings->whereBetween('tanggal', [
            Carbon::parse($tanggal)->startOfWeek(),
            Carbon::parse($tanggal)->endOfWeek()
        ]);

    } elseif ($periode == 'bulanan') {

        $bookings->whereMonth('tanggal', Carbon::parse($tanggal)->month)
                 ->whereYear('tanggal', Carbon::parse($tanggal)->year);

    }

    return Excel::download(
        new BookingsExport($bookings->get()),
        'Booking-Lafayette.xlsx'
    );
}

public function exportPdf(Request $request)
{
    
    $periode = $request->periode;
    $tanggal = $request->tanggal;

    $bookings = Booking::with('package');

    if ($periode == 'harian') {

        $bookings->whereDate('tanggal', $tanggal);

    } elseif ($periode == 'mingguan') {

        $bookings->whereBetween('tanggal', [
            Carbon::parse($tanggal)->startOfWeek(),
            Carbon::parse($tanggal)->endOfWeek()
        ]);

    } elseif ($periode == 'bulanan') {

        $bookings->whereMonth('tanggal', Carbon::parse($tanggal)->month)
                 ->whereYear('tanggal', Carbon::parse($tanggal)->year);

    }

    $bookings = $bookings->orderBy('tanggal', 'desc')->get();

    $totalBooking = $bookings->count();

    $totalPending = $bookings->where('status', 'Pending')->count();

    $totalCheckin = $bookings->where('status', 'Checked-in')->count();

    $totalSelesai = $bookings->where('status', 'Selesai')->count();

    $totalBatal = $bookings->where('status', 'Batal')->count();

    $periode = '';

if ($request->periode == 'harian') {

    $periode = \Carbon\Carbon::parse($request->tanggal)
        ->translatedFormat('d F Y');

} elseif ($request->periode == 'mingguan') {

    $awal = \Carbon\Carbon::parse($request->tanggal)
        ->startOfWeek();

    $akhir = \Carbon\Carbon::parse($request->tanggal)
        ->endOfWeek();

    $periode = $awal->translatedFormat('d F Y')
        .' - '.
        $akhir->translatedFormat('d F Y');

} else {

    $periode = \Carbon\Carbon::parse($request->tanggal)
        ->translatedFormat('F Y');

}

    $pdf = Pdf::loadView(
        'admin.laporan_pdf',
        compact(
            'bookings',
            'totalBooking',
            'totalPending',
            'totalCheckin',
            'totalSelesai',
            'totalBatal',
            'periode',
            'tanggal'
        )
    );

    return $pdf->download('Laporan-Booking-Lafayette.pdf');
}

}