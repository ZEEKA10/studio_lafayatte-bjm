<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Studio Foto - Lafayette</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <style>
        /* TEMA COKELAT MUDA */
        body { background-color: #F8F5F2; font-family: 'Montserrat', sans-serif; color: #4A3525; }
        .judul-elegan { font-family: 'Playfair Display', serif; font-weight: 700; }
        .bg-cokelat {  background:#8A6141 !important; color:#fff !important; }
        .text-cokelat { color: #8A6141 !important; }
        
        @keyframes fadeInUpForm { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .animasi-masuk { animation: fadeInUpForm 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards; }

        @keyframes pulse-cokelat { 0% { box-shadow: 0 0 0 0 rgba(186, 142, 104, 0.5); } 70% { box-shadow: 0 0 0 15px rgba(186, 142, 104, 0); } 100% { box-shadow: 0 0 0 0 rgba(186, 142, 104, 0); } }

        .btn-cokelat {  background:#8A6141;

    color:#fff;

    border:none;

    border-radius:12px;

    transition:.35s;

}
        .btn-cokelat:hover { background:#6F4A2F;

    color:#fff;

}
        .btn-outline-cokelat { border:2px solid #8A6141;

color:#8A6141;

background:#fff;

border-radius:12px;

transition:.35s;
}
        .btn-outline-cokelat:hover { background:#8A6141;

color:#fff;

}
        .btn-cokelat,
        .btn-outline-cokelat{ padding:12px 28px; font-weight:600; }

        .card-custom { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(138, 97, 65, 0.08); background-color: transparent; transition: all 0.3s ease;}
        .card-header-custom { border-radius: 15px 15px 0 0 !important; }
        
        .form-control, .form-select { transition: all 0.3s ease; border-color: #DBC4B1; color: #4A3525; padding: 12px 15px; border-radius: 10px;}
        .form-control:focus, .form-select:focus { border-color: #BA8E68; box-shadow: 0 0 0 0.25rem rgba(186, 142, 104, 0.25); transform: scale(1.01); }

        /* --- STYLE KHUSUS PAPAN JADWAL VISUAL --- */
        .jadwal-badge { display: flex; flex-direction: column; align-items: center; justify-content: center; width: 85px; padding: 10px 5px; border-radius: 12px; font-size: 0.95rem; font-weight: 600; transition: all 0.3s ease; user-select: none; }
        .jadwal-tersedia { background-color: #F1F8F1; color: #2E7D32; border: 2px solid #A5D6A7; cursor: pointer; }
        .jadwal-tersedia:hover { transform: translateY(-3px); box-shadow: 0 5px 12px rgba(46, 125, 50, 0.15); background-color: #E8F5E9; }
        .jadwal-selected { background-color: #BA8E68 !important; color: #FFFFFF !important; border-color: #8A6141 !important; transform: scale(1.05) translateY(-2px); box-shadow: 0 8px 20px rgba(138, 97, 65, 0.3); }
        .jadwal-penuh { background-color: #FFEBEE; color: #C62828; border: 2px solid #FFCDD2; opacity: 0.6; text-decoration: line-through; cursor: not-allowed; }
        .sisa-text { display:block; margin-top:6px; font-size:12px; font-weight:600; letter-spacing:.3px; }

        .pass-header{ margin-bottom:10px; }
        .pass-label{ display:inline-block; background:#A67C52; color:white; padding:6px 14px; border-radius:50px; font-size:11px; letter-spacing:2px; font-weight:600; margin-bottom:10px; }
        .pass-title{ color:#8B6B4A; font-weight:700; margin-bottom:0; }
        .booking-code{ color:#8B6B4A; font-size:28px; font-weight:700; letter-spacing:3px; margin-top:20px; font-family:'Playfair Display', serif; }
        .reservation-header{ background: linear-gradient(  rgba(0,0,0,.12),  rgba(0,0,0,.12) ), linear-gradient( 135deg, #6B4324, #A67C52,  #6B4324 ); border-radius:25px; padding:22px 20px; text-align:center; color:white; margin-bottom:35px; position:relative; overflow:hidden; }
        .reservation-badge{ display:inline-block; padding:8px 20px; border-radius:50px; background:rgba(255,255,255,.15); font-size:12px; letter-spacing:2px; font-weight:700; }
        .reservation-title{ margin-top:12px; font-size:38px; font-family:'Playfair Display', serif; font-weight:700; letter-spacing:1px; }
        .reservation-subtitle{ opacity:.9; font-size:15px; }
        .reservation-logo{  width:70px; height:70px; object-fit:contain; margin-bottom:20px; background:white; border-radius:50%; padding:10px; box-shadow:  0 10px 30px rgba(0,0,0,.15); transition:.3s; }
        .reservation-logo:hover{ transform:translateY(-4px); }
        .pass-badge{ display:inline-block; padding:8px 18px; border-radius:50px; background:#A57A4D; color:white; font-size:12px; letter-spacing:2px; font-weight:700;}
        .booking-info-list{ margin-top:15px; }
        .booking-item{ display:grid; grid-template-columns:200px 1fr; gap:15px; align-items:center; padding:10px 0; border-bottom:1px solid #EEE; }
        .booking-value{ font-weight:600;color:#2D2D2D; text-align:left; }
        .booking-label{ color:#8B6B4A; font-weight:600; }
        .booking-label i{ margin-right:10px; width:20px; }
        .booking-item strong{ color:#2d2d2d; font-weight:600; }
        .payment-card{ border-radius:20px; border:1px solid #EEE; transition:all .3s ease; }
        .payment-card:hover{ transform:translateY(-5px); box-shadow:0 15px 30px rgba(138,97,65,.12); }
        .payment-icon{ width:55px; height:55px; border-radius:50%; background:#F5EBE0; display:flex; align-items:center; justify-content:center; color:#8A6141; font-size:24px; }
        .payment-icon{ margin-bottom:15px; }
        .payment-label{ font-size:11px; letter-spacing:2px; color:#999; font-weight:600; }
        .payment-title{ color:#8A6141; font-family:'Playfair Display', serif; font-weight:700; font-size:28px; margin-top:8px; margin-bottom:12px; }
        .payment-text{ color:#666; line-height:1.6; font-size:14px; }

        .no-scroll { overflow: hidden; height: 100vh; }
        
        /* KARTU PAKET FOTO */
.paket-card{
    cursor:pointer;
    border:none;
    border-radius:15px;
    overflow:hidden;
    transition:0.3s;
    background:#fff;
}

.paket-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 30px rgba(0,0,0,0.15);
}

.paket-card.selected{
    border:3px solid #BA8E68;
}

.paket-card img{
    width:100%;
    height:250px;
    object-fit:cover;
}

.nav-pills .nav-link{
    color:#8A6141;
    font-weight:600;
}

.nav-pills .nav-link.active{
    background-color:#BA8E68;
}

.kategori-card{
    transition:all .3s ease;
    border:2px solid #E7D6C6;
    border-radius:15px;
    background:#fff;

    min-height:90px;

    display:flex;
    align-items:center;
    gap:12px;

    padding:10px 15px;
    cursor:pointer;
}


.kategori-card:hover{
    transform:translateY(-4px);
    box-shadow:0 8px 20px rgba(0,0,0,.08);
}


.kategori-card.active{
    background:#C69C72;
    color:white;
    border-color:#C69C72;
}

.kategori-icon{
    width:72px;
    height:72px;
    border-radius:50%;
    background:#F8F2EC;
    display:flex;
    align-items:center;
    justify-content:center;
}

.kategori-icon i{
    font-size:32px;
    color:#8A6141;
}

.kategori-title{
     font-size:16px;
    line-height:1.3;
    text-align:center;
}

.photo-product-wrapper,
    .photo-product-center{
    display:flex;
    justify-content:center;
    align-items:center;
    width:100%;
}

.photo-product-wrapper .kategori-card{
    min-height:100px;
}

.live-badge{
    background:#E63946;
    color:white;
    border-radius:30px;
    padding:5px 10px;
    font-size:11px;
    font-weight:700;
    letter-spacing:1px;
    animation:pulse 2s infinite;
}

.studio-info{

    background:#fff;

    border:1px solid #E8D7C6;

    border-radius:18px;

    padding:20px;

    box-shadow:0 8px 20px rgba(138,97,65,.08);

}

.studio-info-title{

    text-align:center;

    color:#8A6141;

    font-weight:700;

    font-size:20px;

    margin-bottom:20px;

}

.studio-item{

    display:flex;

    align-items:center;

    gap:15px;

    padding:12px 0;

    border-bottom:1px solid #F1ECE7;

}

.studio-item:last-child{

    border-bottom:none;

}

.studio-icon{

    width:42px;

    height:42px;

    display:flex;

    align-items:center;

    justify-content:center;

    border-radius:50%;

    background:#F8F2EC;

    color:#8A6141;

    font-size:18px;

    flex-shrink:0;

}

.studio-item strong{

    display:block;

    color:#6F4A2F;

    font-size:15px;

}

.studio-item small{

    color:#777;

    font-size:13px;

}

/* =====================================================
                STATUS BOOKING
===================================================== */

.status-booking-card{

    background:#fff;
    border:1px solid #E8D7C6;
    border-radius:24px;

    max-width:980px;

    margin:45px auto 0;

    padding:55px 70px;

    box-shadow:0 10px 25px rgba(138,97,65,.08);

}

.status-icon{

    width:80px;
    height:80px;

    margin:0 auto 25px;

    display:flex;
    justify-content:center;
    align-items:center;

    background:#F5EBE0;
    border-radius:18px;

    font-size:36px;
    color:#9B6E45;

}


.status-title{

    font-family:'Playfair Display', serif;
    font-size:48px;
    font-weight:700;
    color:#8A6141;

    text-align:center;

    margin:18px 0 20px;

}

.status-badge{

    display:inline-block;

    padding:12px 34px;

    border-radius:40px;

    background:#FFF3D9;

    color:#A56B00;

    font-size:18px;

    font-weight:700;

    margin:0 auto 40px;

}

.status-desc{

    max-width:760px;

    margin:0 auto;

    text-align:center;

    font-size:18px;

    line-height:2.1;

    color:#666;

}

.status-desc p{

    margin-bottom:18px;

}

.status-desc strong{

    color:#4A3525;

    font-weight:700;

}


    </style>
</head>
<body>


    <div class="container-fluid px-4 mt-5 mb-5">
        
        
    @if(session('success'))

<div class="row justify-content-center mb-5 animasi-masuk">
    <div class="col-xl-10">

        <div class="card card-custom p-4 shadow-sm"
             style="border:2px solid #BA8E68; border-radius:20px;">


    <div class="reservation-header">

    <img src="{{ asset('images/logo-lafayette.png') }}"
         alt="Lafayette Studio"
         class="reservation-logo">

    <div class="reservation-badge">
        RESERVASI BERHASIL
    </div>

    <h1 class="reservation-title">
        Lafayette Photo Studio
    </h1>

    <p class="reservation-subtitle">
        Reservasi Anda telah berhasil dicatat dan siap diproses oleh tim kami.
    </p>

</div>
            <div class="row align-items-start g-3">

                {{-- QR CODE --}}
                <div class="col-lg-6">

                    <div class="p-4 shadow-sm text-center"
                        style="
                        background:white;
                        border-radius:25px;
                        border:1px solid #EEE;
                        ">

                        <div class="pass-header">

                    <div class="pass-badge">
    CHECK-IN PASS
</div>

<h3 class="mt-3 text-cokelat">
    Lafayette Photo Studio
</h3>

<span class="badge rounded-pill bg-success px-3 py-2">
    Booking Aktif
</span>
                    </div>

                        <div class="bg-white p-4 rounded-4 shadow-lg d-inline-block my-3">
                            {!! QrCode::size(170)
                        ->color(74,53,37)
                        ->generate(session('kode_booking')) !!}
                    </div>

                        <h2 class="booking-code">
                        {{ session('kode_booking') }}
                    </h2>

                        <div class="mt-2">
                    <span class="badge rounded-pill text-bg-light border px-3 py-2">
                        Booking Reference
                    </span>
                    </div>

                        <small class="text-muted">
                            Tunjukkan QR Code ini saat datang ke studio.
                        </small>

                    </div>

                </div>

                {{-- DETAIL BOOKING --}}
                 <div class="col-lg-6">

        <div class="card border-0 shadow-sm"
                style="
                border-radius:25px;
                overflow:hidden;
                ">

        <div class="card-body p-4">

            <h3 class="judul-elegan text-cokelat mb-4">
                Detail Reservasi
            </h3>

            <div class="mb-3">
                <span class="badge bg-light text-cokelat border px-3 py-2">
                    INFORMASI BOOKING
                </span>
            </div>

            <div class="booking-info-list">

    <div class="booking-item">
        <span class="booking-label">
            <i class="bi bi-person"></i>
            Nama Customer
        </span>

        <span class="booking-value">
            {{ session('customer_name') }}
        </span>
    </div>

    <div class="booking-item">
        <span class="booking-label">
            <i class="bi bi-phone"></i>
            Nomor HP
        </span>

        <span class="booking-value">
            {{ session('no_hp') }}
        </span>
    </div>

    <div class="booking-item">
        <span class="booking-label">
            <i class="bi bi-camera"></i>
            Paket Foto
        </span>

        <span class="booking-value">
            {{ session('nama_paket') }}
        </span>
    </div>

    <div class="booking-item">
        <span class="booking-label">
            <i class="bi bi-calendar-event"></i>
            Tanggal
        </span>

        <span class="booking-value">
            {{ session('tanggal') }}
        </span>
    </div>

    <div class="booking-item">
        <span class="booking-label">
            <i class="bi bi-clock"></i>
            Jam
        </span>

        <span class="booking-value">
            {{ session('jam_mulai') }}
        </span>
    </div>

    <div class="booking-item">
        <span class="booking-label">
            <i class="bi bi-check-circle"></i>
            Status
        </span>

        <span>
            <span class="badge rounded-pill bg-warning text-dark px-3 py-2">
                {{ session('status') }}
            </span>
        </span>
    </div>

        <div class="booking-item">
    <span class="booking-label">
        <i class="bi bi-clock-history"></i>
        Ketentuan Check-in
    </span>

    <span class="booking-value">
        Mohon hadir 15 menit sebelum jadwal pemotretan untuk proses registrasi.
    </span>
</div>


</div>
                        </div>
                    </div>

                </div>

            </div>

            <hr class="mt-2 mb-3">

            <div class="row">

                <div class="col-md-6">

    <div class="card border-0 shadow-sm h-100 payment-card">
    <div class="card-body p-4">

        <div class="payment-icon mb-3">
    <i class="bi bi-wallet2"></i>
    </div>

    <small class="payment-label">
     INFORMASI PEMBAYARAN
    </small>

    <h4 class="payment-title">
     Pembayaran di Studio
    </h4>

    <p class="payment-text">
     Pembayaran dapat dilakukan langsung pada hari pemotretan sebelum sesi dimulai.
    </p>
    </div>
</div>

</div>

                <div class="col-md-6">

    <div class="card border-0 shadow-sm h-100 payment-card">
    <div class="card-body p-4">

        <div class="payment-icon mb-3">
        <i class="bi bi-whatsapp"></i>
        </div>

        <small class="payment-label">
            LAYANAN PELANGGAN
        </small>

        <h4 class="payment-title">
            Hubungi Admin
        </h4>

        <p class="payment-text">
        Untuk pembayaran melalui transfer bank maupun e-wallet, silakan hubungi admin Lafayette Photo Studio melalui WhatsApp untuk mendapatkan informasi pembayaran.
        </p>

    </div>
</div>

</div>
        </div>
        
            <div class="status-booking-card mb-4">

    <div class="status-icon">

        <i class="bi bi-hourglass-split"></i>

    </div>

    <h4 class="status-title">
        Status Reservasi
    </h4>

    <div class="text-center mb-4">

    <span class="status-badge pending">

        Pending Konfirmasi

    </span>

    </div>

    <div class="status-desc">

    <p>
        Reservasi Anda telah berhasil dikirim dan sedang menunggu proses
        verifikasi oleh <strong>Admin Lafayette Photo Studio</strong>.
    </p>

    <p>
        Status reservasi dapat berubah menjadi
        <strong>Disetujui</strong> atau
        <strong>Ditolak</strong>
        setelah dilakukan pemeriksaan jadwal.
    </p>

    <p>
        Silakan lakukan pengecekan status secara berkala melalui menu
        <strong>Cek Booking</strong>.
    </p>

    <p>
        Apabila reservasi telah disetujui, Anda dapat mengunduh
        <strong>Check-in Pass</strong>
        sebagai bukti masuk ke studio.
    </p>

</div>

            <div class="text-center mt-5">

    <!-- Tombol Utama -->
    <div class="mb-3">

        <a href="{{ route('booking.pdf', session('kode_booking')) }}"
           class="btn btn-success btn-lg px-3">

            <i class="bi bi-file-earmark-pdf me-2"></i>
            Download Bukti Reservasi

        </a>

    </div>

    <!-- Tombol Pendukung -->
    <div class="d-flex justify-content-center gap-3 mb-3">

        <a href="https://wa.me/6285216962962?text=Halo%20Admin%20Lafayette%20Photo%20Studio,%20saya%20ingin%20memperoleh%20informasi%20pembayaran%20melalui%20transfer%20bank%20atau%20e-wallet%20untuk%20reservasi%20saya."
           target="_blank"
           class="btn btn-cokelat btn-lg px-3">

            Hubungi Admin

        </a>

        <a href="{{ route('booking.check') }}"
           class="btn btn-outline-cokelat btn-lg px-3">

            <i class="bi bi-search me-2"></i>
            Lihat Status Booking

        </a>

    </div>

    <!-- Tombol Bawah -->
    <div>

        <a href="{{ url('/') }}"
           class="btn btn-outline-cokelat btn-lg px-3">

            <i class="bi bi-house-door me-2"></i>
            Kembali ke Beranda

        </a>

    </div>

</div>

@else
                        
            <div class="row">
                    <div class="col-lg-4 mb-4 animasi-masuk" style="animation-delay: 0.1s;">
                        <div class="card card-custom h-100" style="background-color: #FDFBF7;">
                            <div class="card-header bg-cokelat text-center py-3 card-header-custom text-white">
                                <h4 class="mb-0 judul-elegan fs-4 fw-bold"><i class="bi bi-calendar2-week me-2"></i>Monitor Jadwal Studio<span class="badge bg-danger ms-2 shadow-sm" style="font-size: 0.6rem; vertical-align: middle; animation: textPulse 2s infinite;">LIVE</span></h4>
                            </div>
                            <div class="card-body p-4">
                                <label class="form-label fw-bold text-cokelat">1. Pilih Tanggal Pemotretan:</label>
                                <input type="date" id="monitor_tanggal" class="form-control mb-4" style="border: 2px solid #BA8E68;" value="{{ date('Y-m-d') }}">

                                
<div class="studio-info">

    <div class="studio-info-title">
    <i class="bi bi-info-circle-fill me-2"></i>
    Informasi Jadwal Studio
    </div>

    <div class="studio-item">

        <i class="bi bi-camera-fill studio-icon"></i>

        <div>
            <strong>Studio</strong>
            <small>1 Studio Indoor Eksklusif</small>
        </div>

    </div>

    <div class="studio-item">

        <i class="bi bi-clock-fill studio-icon"></i>

        <div>
            <strong>Durasi Slot</strong>
            <small>30 Menit per Sesi</small>
        </div>

    </div>

    <div class="studio-item">

        <i class="bi bi-arrow-repeat studio-icon"></i>

        <div>
            <strong>Live Update</strong>
            <small>Jadwal diperbarui setiap 15 detik</small>
        </div>

    </div>

</div>
                                <div id="jadwal-display" class="text-center p-3" style="border: 1px dashed #DBC4B1; border-radius: 12px; min-height: 200px;">
                                    <div class="text-muted mt-5">⏳ Memuat jadwal studio...</div>
                                </div>
                            </div>
                        </div>
                    </div>

    <div class="col-lg-8 mb-4 animasi-masuk" style="animation-delay: 0.2s;">
    <div class="card card-custom h-100">

        <div class="card-header bg-cokelat text-center py-3 card-header-custom text-white">
            <h4 class="mb-0 judul-elegan fs-5"><i class="bi bi-journal-check me-2"></i>Form Reservasi
            </h4>
        </div>

        <div class="card-body p-4 p-md-5">
    
                                @if(session('error'))
                                    <div class="alert alert-danger fw-bold text-center mb-4">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <form action="{{ route('booking.store') }}" method="POST">
                                    @csrf
                                    <input
                                    type="hidden"
                                    name="tanggal"
                                    id="form_tanggal"
                                    value="{{ old('tanggal') }}"
                                    required
                                    >
                                    <input
                                    type="hidden"
                                    name="package_id"
                                    id="selected_package"
                                    value="{{ old('package_id') }}"
                                    required
                                    >
                                    <div class="alert mb-4 text-center" style="background-color: #F5EBE0; border: 2px solid #BA8E68; color: #4A3525;">
    Jadwal Terpilih: <br>

    <h5 class="fw-bold mt-2 mb-0" id="teks_jadwal_terpilih">
        Pilih jam di layar sebelah kiri ⬅️
    </h5>

    <select
        name="jam_mulai"
        id="form_jam"
        class="form-select mt-2 d-none"
        required
    >
        <option value="{{ old('jam_mulai') }}" selected>
            {{ old('jam_mulai') ?: '-- Kosong --' }}
        </option>
    </select>
</div>

<div
    id="info-pembayaran"
    class="alert mb-4 text-center d-none"
    style="
        background-color: #FFF8F0;
        border: 2px solid #D7B899;
        color: #4A3525;
    "
>
    <div class="fw-bold mb-1">
        Informasi Pembayaran
    </div>

    <div id="teks-dp-paket">
        Pilih paket terlebih dahulu
    </div>
</div>

<div class="mb-4">
    <label class="form-label fw-bold text-cokelat mb-3">
        Pilih Paket Foto
    </label>

<div class="row g-2 justify-content-center nav nav-pills">

@foreach($packages->groupBy('kategori') as $kategori => $items)

    <div class="col-lg-4 col-md-4 col-6">

        <button
            type="button"
            class="kategori-card w-100 nav-link {{ $loop->first ? 'active' : '' }}"
            id="tab-btn{{ $loop->index }}"
            data-bs-toggle="tab"
            data-bs-target="#tab{{ $loop->index }}"
            aria-selected="{{ $loop->first ? 'true' : 'false' }}">

            <div class="kategori-icon">

                @if($kategori == 'Single - Profile')
    <i class="bi bi-person-circle"></i>

@elseif($kategori == 'Graduation')
    <i class="bi bi-mortarboard-fill"></i>

@elseif($kategori == 'Family')
    <i class="bi bi-people-fill"></i>

@elseif($kategori == 'Group')
    <i class="bi bi-camera-fill"></i>

@elseif($kategori == 'Corporate/Student')
    <i class="bi bi-building-fill"></i>

@elseif($kategori == 'Pre/Postwedding & Couple')
    <i class="bi bi-heart-fill"></i>

@elseif($kategori == 'Maternity')
    <i class="bi bi-stars"></i>

@elseif($kategori == 'Kids')
    <i class="bi bi-emoji-smile-fill"></i>

@elseif($kategori == 'Pas Foto & Foto Gandeng')
    <i class="bi bi-image-fill"></i>

@else
    <i class="bi bi-box-seam"></i>
@endif
            </div>

            <div class="kategori-title">
                @if($kategori == 'Corporate/Student')
        Corporate<br>
        Student

    @elseif($kategori == 'Pre/Postwedding & Couple')
        Pre atau <br>
        Postwedding<br>
        & Couple

    @elseif($kategori == 'Pas Foto & Foto Gandeng')
        Pas Foto &<br>
        Foto Gandeng

    @elseif($kategori == 'Single - Profile')
        Single -<br>
        Profile

    @else
        {{ $kategori }}
    @endif
</div>

        </button>

    </div>

@endforeach

</div>


<div class="tab-content">

@foreach($packages->groupBy('kategori') as $kategori => $items)

<div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
     id="tab{{ $loop->index }}">

    <div class="row">

        @foreach($items as $item)

        <div class="col-md-6 mb-4">

            <div
            class="card paket-card h-100 shadow-sm"
            onclick="pilihPaket(this, '{{ $item->id }}')"

            data-nama-paket="{{ $item->nama_paket }}"
            data-wajib-dp="{{ $item->wajib_dp ? 1 : 0 }}"
            data-nominal-dp="{{ $item->nominal_dp }}"
            data-durasi-menit="{{ $item->jumlah_slot * 30 }}"
            >

                @if($item->gambar)
                    <img src="{{ asset('storage/'.$item->gambar) }}"
                         class="card-img-top"
                         style="height:250px; object-fit:cover;">
                @endif

                <div class="card-body">

                    <h4 class="judul-elegan text-cokelat">
                        {{ $item->nama_paket }}
                    </h4>

                    <h5 class="fw-bold">
                        Rp {{ number_format($item->harga,0,',','.') }}
                    </h5>

                    <hr>

                    @if($item->deskripsi)

                        <ul>

                        @foreach(explode("\n",$item->deskripsi) as $fitur)

                            @if(trim($fitur))
                                <li>{{ trim($fitur) }}</li>
                            @endif

                        @endforeach

                        </ul>

                    @endif

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endforeach

</div>

                                        <div class="mb-4">
    <label class="form-label fw-bold text-cokelat">
        Nama Lengkap
    </label>

    <input
        type="text"
        name="customer_name"
        class="form-control"
        placeholder="Masukkan nama Anda"
        value="{{ old('customer_name') }}"
        required
    >
</div>

                                    <div class="mb-4">
    <label class="form-label fw-bold text-cokelat">
        Nomor HP (WhatsApp)
    </label>

    <input
        type="text"
        name="no_hp"
        class="form-control"
        placeholder="Contoh: 08123456789"
        value="{{ old('no_hp') }}"
        required
    >
</div>

<div class="d-grid gap-2 mt-4 pt-2 border-top"
     style="border-color: #F5EBE0 !important;">

    <button
        type="submit"
        id="btnSubmit"
        class="btn btn-cokelat btn-lg fw-bold judul-elegan py-3"
    >
        Konfirmasi Pesanan
    </button>
</div>

                                </form>

            </div> <!-- card-body -->
        </div> <!-- card -->
    </div> <!-- col-lg-8 -->

</div> <!-- row -->

@endif

    <script>    
    document.addEventListener('DOMContentLoaded', function () {

    const monitorTanggal = document.getElementById('monitor_tanggal');
    const formTanggal = document.getElementById('form_tanggal');
    const selectedPackageInput = document.getElementById('selected_package');

    if (!monitorTanggal || !formTanggal) {
        return;
    }

    const formJam = document.getElementById('form_jam');
    const teksTerpilih = document.getElementById('teks_jadwal_terpilih');
    const jadwalDisplay =
    document.getElementById('jadwal-display');

const infoPembayaran =
    document.getElementById('info-pembayaran');

const teksDpPaket =
    document.getElementById('teks-dp-paket');

    let selectedJam = '';

    function resetPilihanJam() {
        selectedJam = '';

        formJam.innerHTML =
            '<option value="">-- Pilih jam --</option>';

        teksTerpilih.innerHTML =
            'Pilih paket dan jadwal yang tersedia';

        teksTerpilih.classList.remove(
            'text-success',
            'text-danger'
        );
    }

    function loadJadwal(
        tanggal,
        isBackgroundRefresh = false
    ) {
        formTanggal.value = tanggal;

        const packageId = selectedPackageInput
            ? selectedPackageInput.value
            : '';

        /*
         * Jangan mengambil jadwal sebelum paket dipilih.
         */
        if (!packageId) {
            if (!isBackgroundRefresh) {
                resetPilihanJam();

                jadwalDisplay.innerHTML = `
                    <div class="text-muted mt-5">
                        Silakan pilih paket terlebih dahulu.
                    </div>
                `;
            }

            return;
        }

        if (!isBackgroundRefresh) {
            resetPilihanJam();

            jadwalDisplay.innerHTML = `
                <div class="text-muted mt-5">
                    ⏳ Memperbarui jadwal studio...
                </div>
            `;
        }

        const url =
            `/booking/get-available-times` +
            `?tanggal=${encodeURIComponent(tanggal)}` +
            `&package_id=${encodeURIComponent(packageId)}`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(
                        'Gagal mengambil jadwal.'
                    );
                }

                return response.json();
            })
            .then(data => {
                let gridHtml = `
                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                `;

                let selectedJamMasihTersedia = false;

                data.detail.forEach(item => {
                    const isTersedia =
                        item.status === 'Tersedia';

                    let badgeClass = isTersedia
                        ? 'jadwal-tersedia'
                        : 'jadwal-penuh';

                    const sisaTeks = isTersedia
                        ? '🟢 Tersedia'
                        : '🔴 Penuh';

                    if (
                        item.jam === selectedJam &&
                        isTersedia
                    ) {
                        badgeClass += ' jadwal-selected';
                        selectedJamMasihTersedia = true;
                    }

                    const actionClick = isTersedia
                        ? `onclick="pilihJam(this, '${item.jam}', '${item.jam_selesai}')"`
                        : '';

                    gridHtml += `
                        <div
                            class="jadwal-badge ${badgeClass}"
                            ${actionClick}
                            id="jam-${item.jam.replace(':', '')}"
                        >
                            <span class="fs-6">
                                ${item.jam}
                            </span>

                            <span class="sisa-text">
                                ${sisaTeks}
                            </span>
                        </div>
                    `;
                });

                gridHtml += '</div>';

                jadwalDisplay.innerHTML = gridHtml;

                if (
                    selectedJam !== '' &&
                    !selectedJamMasihTersedia
                ) {
                    resetPilihanJam();

                    teksTerpilih.innerHTML =
                        'Maaf, jadwal yang dipilih sudah tidak tersedia. Silakan pilih jam lain.';

                    teksTerpilih.classList.add(
                        'text-danger'
                    );
                }
            })
            .catch(() => {
                if (!isBackgroundRefresh) {
                    jadwalDisplay.innerHTML = `
                        <div class="text-danger mt-5">
                            ⚠️ Jadwal tidak dapat dimuat.
                            Silakan muat ulang halaman.
                        </div>
                    `;
                }
            });
    }

    /*
     * Saat tanggal berubah, muat ulang jadwal.
     */
    monitorTanggal.addEventListener(
        'change',
        function () {
            loadJadwal(this.value, false);
        }
    );

    /*
     * Refresh jadwal setiap 15 detik.
     */
    setInterval(function () {
        const packageId = selectedPackageInput
            ? selectedPackageInput.value
            : '';

        if (
            monitorTanggal.value &&
            packageId
        ) {
            loadJadwal(
                monitorTanggal.value,
                true
            );
        }
    }, 15000);

    /*
     * Saat paket dipilih.
     */
    window.pilihPaket = function (card, id) {

    document
        .querySelectorAll('.paket-card')
        .forEach(function (item) {
            item.classList.remove('paket-selected');
        });

    card.classList.add('paket-selected');

    selectedPackageInput.value = id;

    // Ambil data dari kartu paket
    const namaPaket = card.dataset.namaPaket;
    const wajibDp = card.dataset.wajibDp === '1';
    const nominalDp = Number(card.dataset.nominalDp || 0);
    const durasiMenit = card.dataset.durasiMenit;

    // Tampilkan panel informasi pembayaran
    infoPembayaran.classList.remove('d-none');

    if (wajibDp) {
        const nominalFormat =
            new Intl.NumberFormat('id-ID').format(nominalDp);

        teksDpPaket.innerHTML = `
    <div><strong>${namaPaket}</strong></div>

    <div>Durasi : ${durasiMenit} menit</div>

    <div class="fw-bold text-success mb-2">
        DP yang harus dibayar: Rp ${nominalFormat}
    </div>

    <small class="text-muted">
        Setelah booking berhasil dibuat, Anda akan diarahkan ke halaman
        pembayaran untuk melihat QRIS dan mengunggah bukti transfer.
    </small>
    `;
    } else {
        teksDpPaket.innerHTML = `
    <div><strong>${namaPaket}</strong></div>

    <div>Durasi : ${durasiMenit} menit</div>

    <div class="fw-bold text-success mb-2">
        Paket ini tidak memerlukan DP
    </div>

    <small class="text-muted">
        Booking dapat langsung diproses setelah data berhasil dikirim.
    </small>
    `;
    }

    resetPilihanJam();

    loadJadwal(
        monitorTanggal.value,
        false
    );
};

    /*
     * Saat jam dipilih.
     */
    window.pilihJam = function (
        element,
        jam,
        jamSelesai
    ) {
        document
            .querySelectorAll('.jadwal-badge')
            .forEach(function (item) {
                item.classList.remove(
                    'jadwal-selected'
                );
            });

        element.classList.add(
            'jadwal-selected'
        );

        selectedJam = jam;

        formJam.innerHTML = `
            <option value="${jam}" selected>
                ${jam}
            </option>
        `;

        const bagianTanggal =
            formTanggal.value.split('-');

        const tanggal = new Date(
            bagianTanggal[0],
            bagianTanggal[1] - 1,
            bagianTanggal[2]
        );

        const formatTanggal =
            tanggal.toLocaleDateString(
                'id-ID',
                {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                }
            );

        teksTerpilih.innerHTML = `
            <i class="bi bi-calendar-event me-2"></i>
            ${formatTanggal}

            &nbsp;&nbsp;

            <i class="bi bi-clock me-2"></i>
            ${jam}–${jamSelesai} WITA
        `;

        teksTerpilih.classList.remove(
            'text-danger'
        );

        teksTerpilih.classList.add(
            'text-success'
        );
    };

    /*
     * Tampilan awal.
     */
    if (
        selectedPackageInput &&
        selectedPackageInput.value
    ) {
        loadJadwal(
            monitorTanggal.value,
            false
        );
    } else {
        jadwalDisplay.innerHTML = `
            <div class="text-muted mt-5">
                Silakan pilih paket terlebih dahulu.
            </div>
        `;
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>