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
</style>

</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">

    <div class="container-fluid px-4 d-flex align-items-center">

        <!-- Logo -->
        <a href="#" class="navbar-brand">

            <img src="{{ asset('images/logo-lafayette.png') }}"
                 class="navbar-logo"
                 alt="Logo">

            <span class="judul-elegan">
                Lafayette Admin
            </span>

        </a>

        <!-- Menu -->
        <div class="ms-5">

            <a href="{{ route('packages.index') }}"
               class="nav-link-kapsul">

                Kelola Paket Foto

            </a>

        </div>

        <!-- Dorong Logout ke kanan -->
        <div class="ms-auto">

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">
                    Logout
                </button>
            </form>

        </div>

    </div>

</nav>

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

                        <label class="form-label fw-bold">
                            Pilih Periode
                        </label>

                        <select class="form-select" id="periodeExcel" name="periode">

                            <option value="harian">
                                Harian
                            </option>

                            <option value="mingguan">
                                Mingguan
                            </option>

                            <option value="bulanan">
                                Bulanan
                            </option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-bold">

                            Tanggal

                        </label>

                        <input type="date" class="form-control"id="tanggalExcel"name="tanggal">

                    </div>

                    <button
                        type="submit"
                        class="btn btn-success w-100">

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

                <form action="{{ route('admin.exportPdf') }}" method="GET">

                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Pilih Periode
                        </label>

                        <select class="form-select" id="periodePdf" name="periode">

                            <option value="harian">
                                Harian
                            </option>

                            <option value="mingguan">
                                Mingguan
                            </option>

                            <option value="bulanan">
                                Bulanan
                            </option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Tanggal
                        </label>

                        <input
                        type="date"
                        class="form-control"
                        id="tanggalPdf"
                        name="tanggal">
                    </div>

                    <button
                        type="submit"
                        class="btn btn-danger w-100">

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

    <div class="col">
        <div class="stats-card">

<div class="row g-3 mb-4">

    <div class="col">
        <div class="stats-card">
            <div class="stats-icon bg-total">
                <i class="bi bi-calendar-check"></i>
            </div>
            <h3>{{ $totalBooking }}</h3>
            <small>Total Reservasi</small>
        </div>
    </div>

    <div class="col">
        <div class="stats-card">
            <div class="stats-icon bg-warning-soft">
                <i class="bi bi-hourglass-split"></i>
            </div>
            <h3>{{ $totalPending }}</h3>
            <small>Pending</small>
        </div>
    </div>

    <div class="col">
        <div class="stats-card">
            <div class="stats-icon bg-primary-soft">
                <i class="bi bi-camera-fill"></i>
            </div>
            <h3>{{ $totalCheckin }}</h3>
            <small>Check-in</small>
        </div>
    </div>

    <div class="col">
        <div class="stats-card">
            <div class="stats-icon bg-success-soft">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <h3>{{ $totalSelesai }}</h3>
            <small>Selesai</small>
        </div>
    </div>
</div>

        <form method="GET"
      action="{{ route('admin.dashboard') }}"
      class="mb-4">

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
                    placeholder="Cari kode booking, nama pelanggan, atau nomor WhatsApp..."
                    value="{{ request('search') }}">

            </div>

        </div>

        <!-- Filter -->
        <div class="col-lg-3">

            <select
                name="status"
                class="form-select">

                <option value="">Semua Status</option>

                <option value="Pending"
                    {{ request('status')=='Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="Confirmed"
                    {{ request('status')=='Confirmed' ? 'selected' : '' }}>
                    Disetujui
                </option>

                <option value="Checked-in"
                    {{ request('status')=='Checked-in' ? 'selected' : '' }}>
                    Check-in
                </option>

                <option value="Selesai"
                    {{ request('status')=='Selesai' ? 'selected' : '' }}>
                    Selesai
                </option>
            </select>

        </div>

        <!-- Tombol -->
        <div class="col-lg-2">

            <button
                type="submit"
                class="btn btn-cokelat w-100">

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

    @if($booking->status == 'Pending')

        <span class="badge rounded-pill bg-warning text-dark px-3 py-2">
            ⏳ Pending
        </span>

    @elseif($booking->status == 'Confirmed')

        <span class="badge rounded-pill bg-success px-3 py-2">
            ✅ Disetujui
        </span>

    @elseif($booking->status == 'Checked-in')

        <span class="badge rounded-pill bg-primary px-3 py-2">
            📸 Check-in
        </span>

    @elseif($booking->status == 'Selesai')

        <span class="badge rounded-pill bg-secondary px-3 py-2">
            ✔ Selesai
        </span>

    @else

        <span class="badge rounded-pill bg-danger px-3 py-2">
            ❌ Ditolak
        </span>

    @endif

</td>

                                <td>
                                    <div class="d-flex justify-content-center">

                                        <!-- Tombol Aksi Setujui -->
<form action="{{ route('admin.updateStatus', $booking->id) }}"
      method="POST"
      class="d-inline">

    @csrf

    <input type="hidden"
           name="status"
           value="Confirmed">

    <button class="btn btn-success btn-sm rounded-circle"
        title="Setujui Reservasi">

    <i class="bi bi-check-lg"></i>
</button>

</form>

                                        <!-- Tombol Aksi Selesai -->
                                        <form action="{{ route('admin.updateStatus', $booking->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="status" value="Selesai">
                                            <button type="submit" class="btn-aksi btn-aksi-selesai" title="Tandai Selesai">✔️</button>
                                        </form>

                                        <!-- Tombol Aksi Hapus -->
                                        <form action="{{ route('admin.deleteBooking', $booking->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-aksi btn-aksi-hapus" title="Hapus Data">🗑️</button>
                                        </form>
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

</body>
</html>