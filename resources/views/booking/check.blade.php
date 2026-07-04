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
        body{
    font-family:'Montserrat',sans-serif;
    color:#4A3525;

    background:
        radial-gradient(circle at center,
            rgba(255,255,255,.55) 0%,
            rgba(255,255,255,.15) 35%,
            transparent 65%),
        linear-gradient(
            135deg,
            #F7EFE5 0%,
            #F2E6D8 40%,
            #F8F3ED 70%,
            #F4E8DA 100%
        );

    min-height:100vh;
}

        .judul-elegan { font-family: 'Playfair Display', serif; font-weight: 700; }
        .bg-cokelat{

    background:linear-gradient(
        135deg,
        #C89B72,
        #BA8E68,
        #A97A53
    ) !important;

    color:#fff !important;

}
        .text-cokelat { color: #8A6141 !important; }
        
        @keyframes fadeInUpForm { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .animasi-masuk { animation: fadeInUpForm 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards; }

        @keyframes pulse-cokelat { 0% { box-shadow: 0 0 0 0 rgba(186, 142, 104, 0.5); } 70% { box-shadow: 0 0 0 15px rgba(186, 142, 104, 0); } 100% { box-shadow: 0 0 0 0 rgba(186, 142, 104, 0); } }

        .btn-cokelat { background-color: #BA8E68; color: #FFFFFF; border: none; border-radius: 8px; transition: all 0.3s ease-in-out; }
        .btn-cokelat:hover { background-color: #9C7451; color: #ffffff; animation: pulse-cokelat 1.5s infinite; transform: translateY(-3px); }
        .btn-outline-cokelat { border: 2px solid #BA8E68; color: #BA8E68; background-color: transparent; border-radius: 8px; transition: all 0.3s ease; }
        .btn-outline-cokelat:hover { background-color: #BA8E68; color: #FFFFFF; transform: translateY(-2px); }
        .btn-cokelat,
        .btn-outline-cokelat{ padding:12px 28px; font-weight:600; }

        .card-custom{

    background:#ffffff;

    border:none;

    border-radius:28px;

    box-shadow:
        0 25px 60px rgba(186,142,104,.18);

    overflow:hidden;

}

        .card-custom{

    position:relative;

}

.card-custom::before{

    content:"";

    position:absolute;

    width:320px;

    height:320px;

    background:rgba(255,255,255,.35);

    filter:blur(70px);

    top:-120px;

    left:50%;

    transform:translateX(-50%);

    border-radius:50%;

    z-index:0;

}

.card-custom>*{

    position:relative;

    z-index:2;

}

        .card-header-custom { border-radius: 15px 15px 0 0 !important; }
        
        .form-control, .form-select { transition: all 0.3s ease; border-color: #DBC4B1; color: #4A3525; padding: 12px 15px; border-radius: 10px;}
        .form-control:focus, .form-select:focus { border-color: #BA8E68; box-shadow: 0 0 0 0.25rem rgba(186, 142, 104, 0.25); transform: scale(1.01); }

        /* --- STYLE KHUSUS PAPAN JADWAL VISUAL --- */

        .pass-header{ margin-bottom:10px; }
        .pass-label{ display:inline-block; background:#A67C52; color:white; padding:6px 14px; border-radius:50px; font-size:11px; letter-spacing:2px; font-weight:600; margin-bottom:10px; }
        .pass-title{ color:#8B6B4A; font-weight:700; margin-bottom:0; }
        .booking-code{

    font-family:'Playfair Display',serif;

    color:#8A6141;

    font-size:42px;

    font-weight:700;

    letter-spacing:4px;

    line-height:1.2;

}
        .reservation-header{ background: linear-gradient(  rgba(0,0,0,.12),  rgba(0,0,0,.12) ), linear-gradient( 135deg, #6B4324, #A67C52,  #6B4324 ); border-radius:25px; padding:22px 20px; text-align:center; color:white; margin-bottom:35px; position:relative; overflow:hidden; }
        .reservation-badge{ display:inline-block; padding:8px 20px; border-radius:50px; background:rgba(255,255,255,.15); font-size:12px; letter-spacing:2px; font-weight:700; }
        .reservation-title{ margin-top:12px; font-size:38px; font-family:'Playfair Display', serif; font-weight:700; letter-spacing:1px; }
        .reservation-subtitle{ opacity:.9; font-size:15px; }
        .reservation-logo{  width:70px; height:70px; object-fit:contain; margin-bottom:20px; background:white; border-radius:50%; padding:10px; box-shadow:  0 10px 30px rgba(0,0,0,.15); transition:.3s; }
        .reservation-logo:hover{ transform:translateY(-4px); }
        .pass-badge{ display:inline-block; padding:8px 18px; border-radius:50px; background:#A57A4D; color:white; font-size:12px; letter-spacing:2px; font-weight:700;}
        .booking-info-list{ margin-top:15px; }
        .booking-item{

    display:grid;

    grid-template-columns:180px 1fr;

    gap:20px;

    align-items:center;

    padding:16px 0;

    border-bottom:1px solid #EFEFEF;

}
        .booking-value{

    color:#333;

    font-weight:600;

    font-size:16px;

}
        .booking-label{

    color:#8A6141;

    font-weight:700;

    font-size:16px;

}
        .booking-label i{ margin-right:10px; width:20px; }
        .booking-item strong{ color:#2d2d2d; font-weight:600; }
        .payment-card{ border-radius:20px; border:1px solid #EEE; transition:all .3s ease; }
        .payment-card:hover{ transform:translateY(-5px); box-shadow:0 15px 30px rgba(138,97,65,.12); }
        .payment-icon{ width:55px; height:55px; border-radius:50%; background:#F5EBE0; display:flex; align-items:center; justify-content:center; color:#8A6141; font-size:24px; }
        .payment-icon{ margin-bottom:15px; }
        .payment-label{ font-size:11px; letter-spacing:2px; color:#999; font-weight:600; }
        .payment-title{ color:#8A6141; font-family:'Playfair Display', serif; font-weight:700; font-size:28px; margin-top:8px; margin-bottom:12px; }
        .payment-text{ color:#666; line-height:1.6; font-size:14px; }        

        /* ===============================
   HERO CEK BOOKING
================================*/

.booking-hero{

    text-align:center;

    padding:28px 25px 10px;

}

.booking-icon{

    width:72px;
    height:72px;

    margin:auto;

    background:#F5EBE0;

    border-radius:50%;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:34px;

    color:#8A6141;

    margin-bottom:15px;

}

.booking-title{

    font-family:'Playfair Display',serif;

    font-size:38px;

    color:#8A6141;

    margin-bottom:12px;

}

.hero-line{

    width:170px;

    height:2px;

    background:#E7D6C6;

    margin:auto;

    margin-bottom:25px;

    position:relative;

}

.hero-line::after{

    content:"";

    width:10px;

    height:10px;

    border-radius:50%;

    background:#C9A37D;

    position:absolute;

    left:50%;

    top:-4px;

    transform:translateX(-50%);

}

.booking-subtitle{

    max-width:580px;

    margin:auto;

    color:#666;

    font-size:15px;

    line-height:1.8;

}

.divider-text{

    display:flex;

    align-items:center;

    justify-content:center;

    margin:25px 0;

}

.divider-text::before,

.divider-text::after{

    content:"";

    width:120px;

    height:1px;

    background:#E5D4C3;

}

.divider-text span{

    margin:0 15px;

    color:#777;

}


.booking-detail-card{

    border-radius:22px;

    overflow:hidden;

    margin-top:35px;

}

.booking-detail-card .card-body{

    padding:35px;

}

.status-info-card{

    margin-top:30px;

}

.status-info-card .alert{

    border-radius:18px;

    padding:22px 25px;

    font-size:16px;

    line-height:1.8;

    box-shadow:0 10px 25px rgba(0,0,0,.05);

}

.btn-action{

    min-width:260px;

    height:58px;

    border-radius:14px;

    font-weight:600;

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:17px;

}

.qr-wrapper{

    display:inline-block;

    background:#fff;

    padding:18px;

    border-radius:20px;

    box-shadow:0 12px 30px rgba(138,97,65,.12);

    border:1px solid #EFE3D8;

}

@media(max-width:768px){

.booking-title{

    font-size:30px;

}

.booking-subtitle{

    font-size:14px;

}

.booking-code{

    font-size:30px;

}

.btn-action{

    width:100%;

    min-width:unset;

}

.booking-item{

    grid-template-columns:1fr;

    gap:6px;

}

}

    </style>
</head>
<body>


    <div class="container-fluid px-4 mt-5 mb-5">
                        
            <div class="row">

    <div class="col-lg-6 mx-auto mb-4 animasi-masuk" style="animation-delay:0.2s;">
    <div class="card card-custom h-100">

        <div class="booking-hero">

    <div class="booking-icon">

        <i class="bi bi-person-vcard"></i>

    </div>

    <h2 class="booking-title">

        ✦ Cek Status Booking ✦

    </h2>

    <div class="hero-line"></div>

    <p class="booking-subtitle">

        Masukkan
        <strong>Kode Booking</strong>
        dan
        <strong>Nomor WhatsApp</strong>
        yang digunakan saat melakukan reservasi.

        <br>

        Sistem akan menampilkan status reservasi Anda secara
        <strong>real-time</strong>.

    </p>

</div>

        <div class="card-body p-4 p-md-5">
    
                                @if(session('error'))
                                    <div class="alert alert-danger fw-bold text-center mb-4">
                                        {{ session('error') }}
                                    </div>
                                @endif

    <form action="{{ route('booking.search') }}" method="POST">
    @csrf

    <div class="row g-4">

    <div class="col-md-6">

        <label class="form-label fw-bold text-cokelat">
            <i class="bi bi-ticket-perforated me-2"></i>
            Kode Booking
        </label>

        <input
            type="text"
            name="kode_booking"
            id="kode_booking"
            class="form-control"
            placeholder="Contoh : LFT-2026-001"
            value="{{ request('kode') }}"
            required>

    </div>

    <div class="col-md-6">

        <label class="form-label fw-bold text-cokelat">
            <i class="bi bi-whatsapp me-2"></i>
            Nomor WhatsApp
        </label>

        <input
            type="text"
            name="no_hp"
            id="no_hp"
            class="form-control"
            placeholder="08xxxxxxxxxx"
            value="{{ request('hp') }}"
            required>

    </div>

</div>

    <div class="d-grid mt-4">

    <button class="btn btn-cokelat btn-lg py-3">

        <i class="bi bi-search me-2"></i>

        Cari Booking

    </button>

</div>

<div class="text-center mt-3">

    <a href="{{ route('booking.index') }}"
       class="btn btn-outline-cokelat px-5 py-3">

        <i class="bi bi-arrow-left-circle me-2"></i>
        Kembali ke Reservasi

    </a>

</div>

</form>

<script> window.addEventListener("load",function(){ const kode=document.getElementById("kode_booking").value; const hp=document.getElementById("no_hp").value; if(kode!=='' && hp!=='') { document.querySelector("form").submit(); } }); </script>

@if(isset($booking))

<hr class="my-5">

<div class="card border-0 shadow-lg booking-detail-card">

    <div class="card-body p-4">

        <h3 class="judul-elegan text-cokelat text-center mb-5">
            Detail Booking
        </h3>

        <div class="row">

            <div class="col-lg-4 text-center mb-4 mb-lg-0">

    <div class="qr-wrapper">

        {!! QrCode::size(170)
            ->color(74,53,37)
            ->generate($booking->kode_booking) !!}

    </div>

    <h4 class="booking-code mt-3 mb-0">
        {{ $booking->kode_booking }}
    </h4>

</div>

            <div class="col-lg-8">

                <div class="booking-info-list">

                    <div class="booking-item">
                        <span class="booking-label">
                            Nama
                        </span>

                        <span class="booking-value">
                            {{ $booking->customer_name }}
                        </span>
                    </div>

                    <div class="booking-item">
                        <span class="booking-label">
                            Nomor HP
                        </span>

                        <span class="booking-value">
                            {{ $booking->no_hp }}
                        </span>
                    </div>

                    <div class="booking-item">
                        <span class="booking-label">
                            Paket
                        </span>

                        <span class="booking-value">
                            {{ $booking->package->nama_paket }}
                        </span>
                    </div>

                    <div class="booking-item">
                        <span class="booking-label">
                            Tanggal
                        </span>

                        <span class="booking-value">
                            {{ \Carbon\Carbon::parse($booking->tanggal)->translatedFormat('d F Y') }}
                        </span>
                    </div>

                    <div class="booking-item">
    <span class="booking-label">
        Jam
    </span>

    <span class="booking-value">
        {{ \Carbon\Carbon::parse($booking->jam_mulai)->format('H:i') }} WITA
    </span>
</div>

<!-- STATUS DITAMBAHKAN DI SINI -->

<div class="booking-item">

    <span class="booking-label">
        Status
    </span>

    <span>

        @if($booking->status=='Pending')

            <span class="badge rounded-pill bg-warning text-dark px-3 py-2">
                Pending
            </span>

        @elseif($booking->status=='Confirmed')

    <span class="badge rounded-pill bg-success px-3 py-2">
        Disetujui
    </span>

@elseif($booking->status=='Checked-in')

    <span class="badge rounded-pill bg-primary px-3 py-2">
        Checked-in
    </span>

@elseif($booking->status=='Selesai')

    <span class="badge rounded-pill bg-secondary px-3 py-2">
        Selesai
    </span>

@else

    <span class="badge rounded-pill bg-danger px-3 py-2">
        Ditolak
    </span>

@endif

    </span>

</div>

</div> <!-- booking-info-list -->

            </div>

        </div>

    </div>

</div> <!-- Card Detail Booking Selesai -->


<!-- ========================= -->
<!-- INFORMASI STATUS BOOKING -->
<!-- ========================= -->

<div class="status-info-card mt-4">

@if($booking->status == 'Pending')

<div class="alert alert-warning border-0 shadow-sm">

<h5 class="fw-bold mb-2">
⏳ Menunggu Konfirmasi Admin
</h5>

Reservasi Anda telah berhasil dikirim.

Admin Lafayette Photo Studio sedang melakukan verifikasi jadwal.

Silakan cek status booking secara berkala.

</div>

@elseif($booking->status == 'Confirmed')

<div class="alert alert-success border-0 shadow-sm">

<h5 class="fw-bold mb-2">
✅ Reservasi Disetujui
</h5>

Selamat!

Reservasi Anda telah disetujui.

Silakan mengunduh <b>Check-in Pass</b> dan datang 15 menit sebelum jadwal pemotretan.

</div>

@elseif($booking->status == 'Checked-in')

<div class="alert alert-primary border-0 shadow-sm">

<h5 class="fw-bold mb-2">
📸 Sudah Check-in
</h5>

Customer telah berhasil melakukan proses check-in.

Silakan menunggu sesi pemotretan dimulai.

</div>

@elseif($booking->status == 'Selesai')

<div class="alert alert-secondary border-0 shadow-sm">

<h5 class="fw-bold mb-2">
🎉 Reservasi Selesai
</h5>

Terima kasih telah menggunakan layanan Lafayette Photo Studio.

</div>

@else

<div class="alert alert-danger border-0 shadow-sm">

<h5 class="fw-bold mb-2">
❌ Reservasi Ditolak
</h5>

Mohon maaf,

Reservasi Anda belum dapat disetujui.

Silakan melakukan reservasi ulang dan memilih jadwal lain yang masih tersedia.

</div>

@endif

</div>

</div>

<div class="text-center mt-2">

@if($booking->status=='Pending')

<a href="https://wa.me/6285216962962?text=Halo%20Admin%20Lafayette%20Photo%20Studio,%20saya%20ingin%20menanyakan%20status%20booking%20saya."
target="_blank"
class="btn btn-cokelat btn-action">

<i class="bi bi-whatsapp me-2"></i>

Hubungi Admin

</a>

@elseif($booking->status=='Confirmed')

<a href="{{ route('booking.pdf',$booking->kode_booking) }}"
class="btn btn-success btn-action">

<i class="bi bi-download me-2"></i>

Download Check-in Pass

</a>

@elseif($booking->status=='Checked-in')

<button class="btn btn-primary btn-action" disabled>

<i class="bi bi-check-circle-fill me-2"></i>

Sudah Check-in

</button>

@elseif($booking->status=='Batal')

<a href="{{ route('booking.index') }}"
class="btn btn-danger btn-action">

<i class="bi bi-arrow-repeat me-2"></i>

Booking Lagi

</a>

@endif


<a href="{{ url('/') }}"
class="btn btn-outline-cokelat btn-action">

<i class="bi bi-house me-2"></i>

Beranda

</a>

</div>


        </div> <!-- card-body -->
        </div> <!-- card -->
    </div> <!-- col-lg-8 -->

</div> <!-- row -->

@endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>