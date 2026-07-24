<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Lafayette Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="preconnect"
href="https://fonts.googleapis.com">

<link rel="preconnect"
href="https://fonts.gstatic.com"
crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="{{ asset('css/lafayette.css') }}">

<style>

/* ===========================
   GLOBAL
=========================== */

body{
    background:#F8F5F2;
    font-family:'Montserrat',sans-serif;
    color:#4A3525;
}

/* ===========================
   NAVBAR
=========================== */

.navbar-custom{
    background:#BA8E68;
    padding:14px 0;
    box-shadow:0 10px 25px rgba(138,97,65,.10);
}

.navbar-custom .navbar-brand{
    display:flex !important;
    flex-direction:row !important;
    align-items:center !important;
    justify-content:flex-start;
    gap:14px;
    margin:0;
    padding:0;
    text-decoration:none;
}

.navbar-custom .navbar-logo{
    width:55px;
    height:55px;
    border-radius:50%;
    background:#fff;
    padding:3px;
}

.navbar-custom .judul-elegan{
    font-family:'Playfair Display',serif;
    font-size:1.50rem;
    font-weight:700;
    color:#fff;
    margin:0;
    white-space:nowrap;
}

.nav-link-kapsul{

    background:rgba(255,255,255,.18);
    color:#fff!important;

    padding:12px 35px;

    border-radius:35px;

    font-weight:600;

    transition:.3s;

    text-decoration:none;

}

.nav-link-kapsul:hover{

    background:#fff;

    color:#BA8E68!important;

}

.btn-logout{

    background:#B25353;

    color:#fff;

    border:none;

    border-radius:35px;

    padding:12px 35px;

    font-weight:600;

    transition:.3s;

}

.btn-logout:hover{

    background:#973F3F;

    color:#fff;

}

.dashboard-action{

    background:#fff;

    border-radius:20px;

    border:1px solid #EFE3D8;

    display:flex;

    align-items:center;

    gap:18px;

    padding:18px 22px;

    min-height:92px;

    box-shadow:0 8px 20px rgba(138,97,65,.08);

    transition:.3s;

    color:#4A3525;

    text-decoration:none;

}

.dashboard-action:hover{

    transform:translateY(-3px);

    box-shadow:0 12px 30px rgba(138,97,65,.12);

}

.dashboard-icon{

    width:72px;
    height:72px;

    display:flex;
    justify-content:center;
    align-items:center;

    border-radius:18px;

    flex-shrink:0;

    padding:0;
}

.dashboard-icon i{

    display:flex;

    justify-content:center;
    align-items:center;

    width:100%;
    height:100%;

    font-size:30px;

    line-height:1;

    margin:0;
    padding:0;
}

.excel-action .dashboard-icon{
    background:#2DB467;
}

.pdf-action .dashboard-icon{
    background:#E74A55;
}

.scan-action .dashboard-icon{
    background:#A87A4E;
}

.dashboard-action h6{

    margin:0;

    font-size:17px;

    font-weight:700;

}

.dashboard-action small{

    color:#8B7B6F;

}

.dashboard-action i:last-child{

    margin-left:auto;

    color:#D1B8A3;

}

/* ===========================
   STATISTIK
=========================== */

.stats-card{

    background:#fff;

    border-radius:18px;

    border:1px solid #EFE3D8;

    padding:25px;

    text-align:center;

    box-shadow:0 8px 20px rgba(138,97,65,.08);

    transition:.3s;

}

.stats-card:hover{

    transform:translateY(-3px);

}

.stats-icon{

    width:54px;

    height:54px;

    border-radius:50%;

    margin:auto;

    margin-bottom:14px;

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:24px;

}

.stats-number{

    font-family:'Playfair Display',serif;

    font-size:42px;

    font-weight:700;

    color:#4A3525;

}

.stats-title{

    margin-top:10px;

    font-size:15px;

    font-weight:600;

    color:#8A6141;

}

.bg-total{
    background:#F3E7DA;
    color:#8A6141;
}

.bg-warning-soft{
    background:#FFF2CF;
    color:#D8A109;
}

.bg-primary-soft{
    background:#DDEBFF;
    color:#2C77D6;
}

.bg-success-soft{
    background:#DDF6E7;
    color:#279A5D;
}

.bg-danger-soft{
    background:#FCE0E0;
    color:#D94B4B;
}

.btn-cokelat{

    background:#BA8E68;
    color:#fff;
    border:none;
    border-radius:12px;
    font-weight:600;
    transition:.3s;

}

.btn-cokelat:hover{

    background:#8A6141;
    color:#fff;

}

.btn-cokelat i{

    color:#fff;

}

.notification-button {
    position: relative;
    width: 46px;
    height: 46px;
    border: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.22);
    color: #ffffff;
    font-size: 20px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: 0.25s ease;
}

.notification-button:hover {
    background: rgba(255, 255, 255, 0.35);
    transform: translateY(-2px);
}

.notification-badge {
    position: absolute;
    top: -4px;
    right: -4px;
    min-width: 21px;
    height: 21px;
    padding: 0 6px;
    border-radius: 999px;
    background: #e63946;
    color: #ffffff;
    border: 2px solid #bd916b;
    font-size: 11px;
    font-weight: 700;
    line-height: 17px;
    text-align: center;
}

.booking-toast {
    position: fixed;
    top: 130px;
    right: 28px;
    z-index: 9999;
    width: min(390px, calc(100vw - 32px));
    padding: 18px;
    border: 1px solid #ead7c6;
    border-radius: 18px;
    background: #ffffff;
    box-shadow: 0 18px 45px rgba(84, 53, 30, 0.2);
    display: flex;
    gap: 14px;
    align-items: flex-start;
    opacity: 0;
    visibility: hidden;
    transform: translateX(30px);
    transition: 0.3s ease;
}

.booking-toast.show {
    opacity: 1;
    visibility: visible;
    transform: translateX(0);
}

.booking-toast-icon {
    flex: 0 0 48px;
    width: 48px;
    height: 48px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f5e7d9;
    color: #98613d;
    font-size: 22px;
}

.booking-toast-content {
    flex: 1;
    min-width: 0;
}

.booking-toast-label {
    color: #b4835c;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
}

.booking-toast-content h6 {
    margin: 4px 0 6px;
    color: #4f3321;
    font-weight: 700;
}

.booking-toast-content p {
    margin: 0 0 8px;
    color: #74665d;
    font-size: 14px;
    line-height: 1.5;
}

.booking-toast-link {
    color: #a66d43;
    font-weight: 700;
    text-decoration: none;
}

.booking-toast-link:hover {
    color: #7c4c2d;
}

.booking-toast-close {
    border: 0;
    background: transparent;
    color: #9a8a80;
    font-size: 15px;
    padding: 2px;
}

.notification-button.ringing {
    animation: bellRing 0.8s ease;
}

@keyframes bellRing {
    0%, 100% {
        transform: rotate(0);
    }

    20% {
        transform: rotate(15deg);
    }

    40% {
        transform: rotate(-15deg);
    }

    60% {
        transform: rotate(10deg);
    }

    80% {
        transform: rotate(-10deg);
    }
}

@media (max-width: 768px) {
    .booking-toast {
        top: 110px;
        right: 16px;
    }
}
</style>

</head>
<body>
    
    <nav class="navbar navbar-custom">
    <div class="container-fluid px-4 d-flex align-items-center">

        <!-- Logo -->
        <a href="#" class="navbar-brand">
            <img
                src="{{ asset('images/logo-lafayette.png') }}"
                class="navbar-logo"
                alt="Logo"
            >

            <span class="judul-elegan">
                Lafayette Admin
            </span>
        </a>

        <!-- Menu -->
        <div class="ms-5">
            <a
                href="{{ route('packages.index') }}"
                class="nav-link-kapsul"
            >
                Kelola Paket Foto
            </a>
        </div>

        <!-- Notifikasi dan Logout -->
        <div class="ms-auto d-flex align-items-center gap-3">

            <button
                type="button"
                class="notification-button"
                id="notificationButton"
                title="Notifikasi booking baru"
            >
                <i class="bi bi-bell-fill"></i>

                <span
                    class="notification-badge d-none"
                    id="notificationBadge"
                >
                    0
                </span>
            </button>

            <form
                action="{{ route('admin.logout') }}"
                method="POST"
                class="m-0"
            >
                @csrf

                <button type="submit" class="btn-logout">
                    Logout
                </button>
            </form>

        </div>

    </div>
</nav>

<!-- Toast Notifikasi Booking -->
<div
    class="booking-toast"
    id="bookingToast"
    role="alert"
    aria-live="assertive"
    aria-atomic="true"
>
    <div class="booking-toast-icon">
        <i class="bi bi-calendar2-check-fill"></i>
    </div>

    <div class="booking-toast-content">
        <small class="booking-toast-label">
            Reservasi Terbaru
        </small>

        <h6 id="toastTitle">
            Booking baru masuk
        </h6>

        <p id="toastMessage">
            Ada reservasi baru dari customer.
        </p>

        <a
            href="#"
            id="toastDetailLink"
            class="booking-toast-link"
        >
            Lihat Detail
            <i class="bi bi-arrow-right-short"></i>
        </a>
    </div>

    <button
        type="button"
        class="booking-toast-close"
        id="toastCloseButton"
        aria-label="Tutup notifikasi"
    >
        <i class="bi bi-x-lg"></i>
    </button>
</div>

<div class="container-fluid px-4 mt-5 mb-5">

    @if(session('success'))
            <div class="alert alert-success fw-bold shadow-sm border-0 animasi-masuk" style="border-radius: 10px;">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger fw-bold shadow-sm border-0 animasi-masuk" style="border-radius: 10px;">{{ session('error') }}</div>
        @endif

        <div class="row g-3 mb-4">

    <div class="col-lg-4 col-md-4">

        <a href="#"
        class="dashboard-action excel-action text-decoration-none"
        data-bs-toggle="modal"
        data-bs-target="#excelModal">

            <div class="dashboard-icon">
                <i class="bi bi-file-earmark-excel-fill"></i>
            </div>

            <div class="flex-grow-1">

                <h6>Export Excel</h6>

                <small>Unduh data reservasi</small>

            </div>

            <i class="bi bi-chevron-right"></i>

        </a>

    </div>

    <div class="col-lg-4 col-md-4">

        <a href="#"
        class="dashboard-action pdf-action text-decoration-none"
        data-bs-toggle="modal"
        data-bs-target="#pdfModal">

            <div class="dashboard-icon">
                <i class="bi bi-file-earmark-pdf-fill"></i>
            </div>

            <div class="flex-grow-1">

                <h6>Export PDF</h6>

                <small>Unduh laporan reservasi</small>

            </div>

            <i class="bi bi-chevron-right"></i>

        </a>

    </div>

    <div class="col-lg-4 col-md-4">

        <button
        class="dashboard-action scan-action w-100 border-0"
        data-bs-toggle="modal"
        data-bs-target="#scannerModal">

            <div class="dashboard-icon">

                <i class="bi bi-qr-code-scan"></i>

            </div>

            <div class="flex-grow-1 text-start">

                <h6>Scan QR Customer</h6>

                <small>Check-in pelanggan</small>

            </div>

            <i class="bi bi-chevron-right"></i>

        </button>

    </div>

</div>   <!-- PENUTUP ROW EXPORT -->

<!-- Modal Export Excel -->
<div class="modal fade" id="excelModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    Export Excel Reservasi
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

               <form action="{{ route('admin.exportExcel') }}" method="GET">

    <div class="mb-3">
        <label
            for="tanggalAwalExcel"
            class="form-label fw-bold"
        >
            Tanggal Awal
        </label>

        <input
            type="date"
            class="form-control"
            id="tanggalAwalExcel"
            name="tanggal_awal"
            required
        >
    </div>

    <div class="mb-3">
        <label
            for="tanggalAkhirExcel"
            class="form-label fw-bold"
        >
            Tanggal Akhir
        </label>

        <input
            type="date"
            class="form-control"
            id="tanggalAkhirExcel"
            name="tanggal_akhir"
            required
        >
    </div>

    <button
    type="submit"
    class="btn btn-success w-100"
    >
    <i class="bi bi-download me-2"></i>
    Download Excel
    </button>

</form>

            </div>

        </div>
    </div>
</div>

<!-- Modal Export PDF -->
<div class="modal fade" id="pdfModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    Export PDF Reservasi
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

                <form action="{{ route('admin.exportPdf') }}" method="GET" target="_blank">

    <div class="mb-3">
        <label
            for="tanggalAwalPdf"
            class="form-label fw-bold"
        >
            Tanggal Awal
        </label>

        <input
            type="date"
            class="form-control"
            id="tanggalAwalPdf"
            name="tanggal_awal"
            required
        >
    </div>

    <div class="mb-3">
        <label
            for="tanggalAkhirPdf"
            class="form-label fw-bold"
        >
            Tanggal Akhir
        </label>

        <input
            type="date"
            class="form-control"
            id="tanggalAkhirPdf"
            name="tanggal_akhir"
            required
        >
    </div>

    <button
        type="submit"
        class="btn btn-danger w-100"
    >
        <i class="bi bi-file-earmark-pdf-fill me-2"></i>
        Download PDF
    </button>

</form>

            </div>

        </div>
    </div>
</div>

<!-- ===========================
        STATISTIK DASHBOARD
=========================== -->

<div class="row g-3 mb-4">

    <div class="col-md-4 col-xl-2">
        <div class="stats-card">
            <div class="stats-icon bg-total">
                <i class="bi bi-calendar-check"></i>
            </div>

            <h3>{{ $totalBooking }}</h3>
            <small>Total Reservasi</small>
        </div>
    </div>

    <div class="col-md-4 col-xl-2">
        <div class="stats-card">
            <div class="stats-icon bg-warning-soft">
                <i class="bi bi-wallet2"></i>
            </div>

            <h3>{{ $totalMenungguPembayaran }}</h3>
            <small>Menunggu Pembayaran</small>
        </div>
    </div>

    <div class="col-md-4 col-xl-2">
        <div class="stats-card">
            <div class="stats-icon bg-primary-soft">
                <i class="bi bi-hourglass-split"></i>
            </div>

            <h3>{{ $totalMenungguVerifikasi }}</h3>
            <small>Menunggu Verifikasi</small>
        </div>
    </div>

    <div class="col-md-4 col-xl-2">
        <div class="stats-card">
            <div class="stats-icon bg-success-soft">
                <i class="bi bi-shield-check"></i>
            </div>

            <h3>{{ $totalTerkonfirmasi }}</h3>
            <small>Terkonfirmasi</small>
        </div>
    </div>

    <div class="col-md-4 col-xl-2">
        <div class="stats-card">
            <div class="stats-icon bg-primary-soft">
                <i class="bi bi-camera-fill"></i>
            </div>

            <h3>{{ $totalBerlangsung }}</h3>
            <small>Berlangsung</small>
        </div>
    </div>

    <div class="col-md-4 col-xl-2">
        <div class="stats-card">
            <div class="stats-icon bg-success-soft">
                <i class="bi bi-check-circle-fill"></i>
            </div>

            <h3>{{ $totalSelesai }}</h3>
            <small>Selesai</small>
        </div>
    </div>

</div>

<form
    method="GET"
    action="{{ route('admin.dashboard') }}"
    class="mb-4"
>
    <div class="row g-3 align-items-center">

        <!-- Search -->
        <div class="col-lg-7">
            <div class="input-group">

                <span class="input-group-text bg-white">
                    <i class="bi bi-search"></i>
                </span>

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari kode booking atau nama pelanggan..."
                    value="{{ request('search') }}"
                >

            </div>
        </div>

        <!-- Filter Status -->
        <div class="col-lg-3">

            <select
                name="status"
                class="form-select"
            >
                <option value="">
                    Semua Status
                </option>

                <option
                    value="menunggu_pembayaran"
                    {{ request('status') === 'menunggu_pembayaran' ? 'selected' : '' }}
                >
                    Menunggu Pembayaran
                </option>

                <option
                    value="menunggu_verifikasi"
                    {{ request('status') === 'menunggu_verifikasi' ? 'selected' : '' }}
                >
                    Menunggu Verifikasi
                </option>

                <option
                    value="terkonfirmasi"
                    {{ request('status') === 'terkonfirmasi' ? 'selected' : '' }}
                >
                    Terkonfirmasi
                </option>

                <option
                    value="berlangsung"
                    {{ request('status') === 'berlangsung' ? 'selected' : '' }}
                >
                    Berlangsung
                </option>

                <option
                    value="selesai"
                    {{ request('status') === 'selesai' ? 'selected' : '' }}
                >
                    Selesai
                </option>

            </select>
        </div>

        <!-- Tombol Filter -->
        <div class="col-lg-2">

            <button
                type="submit"
                class="btn btn-cokelat w-100"
            >
                <i class="bi bi-funnel-fill me-2"></i>
                Filter
            </button>

        </div>

    </div>
</form>

        <div class="card card-custom overflow-hidden animasi-masuk" style="animation-delay:0.2s;">
            <div class="card-body p-2">
                <div class="table-responsive">
                    <table class="table table-custom mb-0 align-middle text-center" style="border-collapse: separate; border-spacing: 0;">
                        <thead>
                            <tr>
                                <th>Kode Booking</th>
                                <th>Nama Customer</th>
                                <th>Paket</th>
                                <th>Tanggal & Jam</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabel-booking">
                            @forelse($bookings as $booking)
                            <tr>
                                <td class="fw-bold text-cokelat" style="font-size: 1.1rem;">{{ $booking->kode_booking }}</td>
                                <td><span class="fw-bold">{{ $booking->customer_name }}</span> <br> <small class="text-muted">{{ $booking->no_hp }}</small></td>
                                <td class="fw-bold" style="color: #6D4C3D;">{{ $booking->package->nama_paket ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->tanggal)->locale('id')->translatedFormat('d F Y') }}<br> <span class="badge bg-secondary mt-1">{{ \Carbon\Carbon::parse($booking->jam_mulai)->format('H:i') }}</span></td>
                                <td>

    @if($booking->status_reservasi === 'menunggu_pembayaran')

    <span class="badge rounded-pill bg-warning text-dark px-3 py-2">
        Menunggu Pembayaran
    </span>

@elseif($booking->status_reservasi === 'menunggu_verifikasi')

    <span class="badge rounded-pill bg-info text-dark px-3 py-2">
        Menunggu Verifikasi
    </span>

@elseif($booking->status_reservasi === 'terkonfirmasi')

    <span class="badge rounded-pill bg-success px-3 py-2">
        Terkonfirmasi
    </span>

@elseif($booking->status_reservasi === 'berlangsung')

    <span class="badge rounded-pill bg-primary px-3 py-2">
        Berlangsung
    </span>

@elseif($booking->status_reservasi === 'selesai')

    <span class="badge rounded-pill bg-secondary px-3 py-2">
        Selesai
    </span>

@else

    <span class="badge rounded-pill bg-light text-dark border px-3 py-2">
        Status Tidak Diketahui
    </span>

@endif

</td>

                                <td>
    <div class="d-flex justify-content-center">

        <a
            href="{{ route('admin.bookingDetail', $booking->id) }}"
            class="btn btn-primary btn-sm"
            title="Lihat Detail Reservasi"
        >
            <i class="bi bi-eye me-1"></i>
            Detail
        </a>

    </div>
</td>
                        
                            </tr>
                            @empty
                            <tr><td colspan="6" class="text-muted py-5">Belum ada data reservasi pelanggan.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Scanner -->
    <div class="modal fade" id="scannerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 20px; border: none; box-shadow: 0 20px 40px rgba(138, 97, 65, 0.25);">
                <div class="modal-header bg-cokelat text-white" style="border-radius: 20px 20px 0 0; padding: 20px;">
                    <h5 class="modal-title judul-elegan">📷 Arahkan QR Code ke Kamera</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" style="background-color: #FDFBF7; padding: 30px;">
                    <div id="reader" width="600px" style="border-radius: 15px; overflow: hidden; border: 3px solid #BA8E68; box-shadow: 0 10px 20px rgba(0,0,0,0.1);"></div>
                </div>
            </div>
        </div>
    </div>

    <form id="checkin-form" action="{{ route('admin.checkin') }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="kode_booking" id="kode_booking_input">
    </form>

    <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function onScanSuccess(decodedText, decodedResult) {
            html5QrcodeScanner.clear();
            document.getElementById('kode_booking_input').value = decodedText;
            document.getElementById('checkin-form').submit();
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: {width: 250, height: 250} }, false);
        
        const scannerModal = document.getElementById('scannerModal')
        scannerModal.addEventListener('shown.bs.modal', event => {
            html5QrcodeScanner.render(onScanSuccess);
        })

        scannerModal.addEventListener('hidden.bs.modal', event => {
            html5QrcodeScanner.clear();
        })
    </script>

    <script>
document.addEventListener('DOMContentLoaded', function () {
    const notificationButton = document.getElementById('notificationButton');
    const notificationBadge = document.getElementById('notificationBadge');
    const bookingToast = document.getElementById('bookingToast');
    const toastTitle = document.getElementById('toastTitle');
    const toastMessage = document.getElementById('toastMessage');
    const toastDetailLink = document.getElementById('toastDetailLink');
    const toastCloseButton = document.getElementById('toastCloseButton');

    let terakhirDilihat = new Date().toISOString();
    let jumlahNotifikasi = 0;
    let toastTimer = null;

    async function cekBookingBaru() {
        try {
            const response = await fetch(
                "{{ route('admin.notifikasiBooking') }}" +
                "?terakhir_dilihat=" +
                encodeURIComponent(terakhirDilihat),
                {
                    headers: {
                        'Accept': 'application/json'
                    }
                }
            );

            if (!response.ok) {
                throw new Error('Gagal mengambil notifikasi booking.');
            }

            const data = await response.json();

            if (data.booking.length > 0) {
                jumlahNotifikasi += data.jumlah;

                tampilkanBadge();

                const bookingTerbaru = data.booking[0];

                toastTitle.textContent =
                    'Booking Baru: ' + bookingTerbaru.kode_booking;

                toastMessage.textContent =
                    bookingTerbaru.customer_name +
                    ' memesan paket ' +
                    bookingTerbaru.nama_paket +
                    ' untuk ' +
                    bookingTerbaru.tanggal +
                    ' pukul ' +
                    bookingTerbaru.jam +
                    '.';

                toastDetailLink.href = bookingTerbaru.detail_url;

                tampilkanToast();

                notificationButton.classList.add('ringing');

                setTimeout(function () {
                    notificationButton.classList.remove('ringing');
                }, 800);

                terakhirDilihat = data.booking[0].created_at;
            }
        } catch (error) {
            console.error(error);
        }
    }

    function tampilkanBadge() {
        notificationBadge.textContent =
            jumlahNotifikasi > 99 ? '99+' : jumlahNotifikasi;

        notificationBadge.classList.remove('d-none');
    }

    function tampilkanToast() {
        bookingToast.classList.add('show');

        clearTimeout(toastTimer);

        toastTimer = setTimeout(function () {
            bookingToast.classList.remove('show');
        }, 8000);
    }

    toastCloseButton.addEventListener('click', function () {
        bookingToast.classList.remove('show');
        clearTimeout(toastTimer);
    });

    notificationButton.addEventListener('click', function () {
        jumlahNotifikasi = 0;
        notificationBadge.textContent = '0';
        notificationBadge.classList.add('d-none');

        window.location.href = "{{ route('admin.dashboard') }}";
    });

    setInterval(cekBookingBaru, 10000);
});
</script>

</body>
</html>