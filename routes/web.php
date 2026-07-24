<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Models\Package;

// =============================
// RUTE ADMIN LOGIN
// =============================

Route::get('/admin/login', [AdminController::class, 'login'])
    ->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'authenticate'])
    ->name('admin.authenticate');

Route::post('/admin/logout', [AdminController::class, 'logout'])
    ->name('admin.logout');


// =============================
// RUTE ADMIN (HARUS LOGIN)
// =============================

Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get(
    '/admin/notifikasi-booking',
    [AdminController::class, 'notifikasiBooking']
    )->name('admin.notifikasiBooking');

    Route::get('/admin/booking/{id}', [AdminController::class, 'bookingDetail'])
    ->name('admin.bookingDetail');

    Route::get('/admin/export-excel', [AdminController::class, 'exportExcel'])
        ->name('admin.exportExcel');

    Route::get('/admin/export-pdf', [AdminController::class, 'exportPdf'])
    ->name('admin.exportPdf');

    Route::post('/admin/checkin', [AdminController::class, 'checkIn'])
        ->name('admin.checkin');

    Route::post('/admin/booking/{id}/status', [AdminController::class, 'updateStatus'])
        ->name('admin.updateStatus');

    Route::delete('/admin/booking/{id}', [AdminController::class, 'deleteBooking'])
        ->name('admin.deleteBooking');

    Route::post(
    '/booking/{kode_booking}/upload-bukti',
    [BookingController::class, 'uploadBukti']
    )->name('booking.upload-bukti');

    Route::resource('/admin/packages', App\Http\Controllers\PackageController::class);

});


// =============================
// HALAMAN UTAMA
// =============================

Route::get('/', function () {

    $packages = Package::latest()->get();
    $packages = Package::whereNotNull('gambar')
    ->orderBy('harga')
    ->take(3)
    ->get();
    return view('home', compact('packages'));

});


// =============================
// BOOKING CUSTOMER
// =============================

Route::get('/booking/get-available-times', [BookingController::class, 'getAvailableTimes'])
    ->name('booking.getTimes');

Route::get('/booking', [BookingController::class, 'index'])
    ->name('booking.index');

Route::post('/booking', [BookingController::class, 'store'])
    ->name('booking.store');

Route::get('/booking/pdf/{kode_booking}', [BookingController::class, 'downloadPdf'])
    ->name('booking.pdf');

// =============================
// CEK STATUS BOOKING
// =============================

Route::get('/cek-booking', [BookingController::class, 'cekBooking'])
    ->name('booking.check');

Route::post('/cek-booking', [BookingController::class, 'cariBooking'])
    ->name('booking.search');
Route::get(
    '/booking/pembayaran/{kode_booking}',
    [BookingController::class, 'pembayaran']
)->name('booking.pembayaran');