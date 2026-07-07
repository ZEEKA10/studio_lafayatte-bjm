<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lafayette Photo Studio | Sistem Informasi Reservasi Studio Foto</title>

    <link rel="icon"type="image/png"href="{{ asset('images/logo-lafayette.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- CSS Lafayette -->
    <link rel="stylesheet" href="{{ asset('css/lafayette.css') }}">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-lafayette">

    <div class="container">

        <a class="navbar-brand d-flex flex-column" href="/">

    <span class="logo-title">
        Lafayette
    </span>

    <span class="logo-subtitle">
        PHOTO STUDIO
    </span>
    </a>
    
    <button class="menu-toggle" id="menuToggle">
        <i class="bi bi-list"></i>
    </button>

        <div class="navbar-menu">

            <a href="#beranda">
            <i class="bi bi-house-door-fill me-1"></i>
                Beranda
            </a>

            <a href="#paket">
            <i class="bi bi-box2-heart me-1"></i>
                Paket
            </a>

            <a href="#galeri">
            <i class="bi bi-images me-1"></i>
                Galeri
            </a>

            <a href="#lokasi">
            <i class="bi bi-geo-alt me-1"></i>
                Lokasi
            </a>

            <a href="/cek-booking">
            <i class="bi bi-calendar-check me-1"></i>
                Cek Booking
            </a>
        </div>

        <div class="navbar-action">

    <a href="{{ route('admin.login') }}"
        class="btn-outline-lafayette">
    <i class="bi bi-person-circle me-2"></i>
        Admin Login
    </a>

</div>

</nav>

<section id="beranda" class="hero">

        <div class="hero-container">

            <div class="hero-content">

    <!-- KIRI -->

        <h1 class="hero-title mt-4">

            Abadikan Setiap
            <br>
            Momen Berharga
            <br>
            Anda

        </h1>

        <div class="hero-line"></div>

        <p class="hero-desc mt-4">

            Lafayette Photo Studio siap membantu Anda
            mengabadikan setiap momen spesial dengan
            hasil profesional, elegan, dan penuh cerita.

        </p>
        <a href="/booking" class="btn-booking">
        <i class="bi bi-stars me-2"></i>
             Booking Sekarang
        </a>
</div>

    </div>

</section>

    <!-- TENTANG STUDIO -->
<section class="about-section">
    <div class="container text-center">
        <h2 class="section-title">
            Tentang Lafayette Studio
        </h2>

        <p class="section-desc mt-4">
            Lafayette Photo Studio merupakan studio foto di Banjarmasin
            yang menyediakan layanan foto wisuda, keluarga, couple,
            personal branding, prewedding, dan berbagai kebutuhan
            dokumentasi profesional lainnya.
        </p>
    </div>
</section>

<!-- PAKET FOTO -->
<section id="paket" class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Paket Foto
            </h2>

            <p class="section-desc">
                Pilihan paket terbaik untuk mengabadikan momen spesial Anda.
            </p>

        </div>

        <div class="row g-4">

    @foreach($packages as $package)

    <div class="col-lg-4 col-md-6">

        <div class="card paket-card h-100">

            <div class="card-body text-center">

                @if($package->gambar)

            <img src="{{ asset('storage/'.$package->gambar) }}"
                class="img-fluid rounded-top"
            style="height:220px;width:100%;object-fit:cover;">

            @endif

                <h4>{{ $package->nama_paket }}</h4>

                <h3 style="color:#8A6141;">
                    Rp {{ number_format($package->harga,0,',','.') }}
                </h3>

                <hr>

                @foreach(explode("\n", $package->deskripsi) as $item)

                    @if(trim($item) != '')
                        <p>
                            <i class="bi bi-check-lg me-2"></i>
                            {{ trim($item) }}
                        </p>
                    @endif

                @endforeach

                <p class="text-muted mt-3">
                    <i class="bi bi-clock-history me-1"></i>
                    {{ $package->estimasi_durasi }} Menit
                </p>

            </div>

        </div>

    </div>

    @endforeach
</div> <!-- row -->

</div> <!-- container -->

</section> <!-- paket selesai -->


<!-- GALERI -->
<section id="galeri" class="py-5 bg-white">

<div class="container">

<div class="text-center mb-5">

<h2 class="section-title">
Galeri Studio
</h2>

<p class="section-desc">
Beberapa hasil karya dan momen terbaik yang telah kami abadikan.
</p>

</div>

<div class="row g-4">

<div class="col-lg-4 col-md-6">

<div class="gallery-item">
<img src="/images/wisuda.jpg" class="gallery-img">
</div>

</div>

<div class="col-lg-4 col-md-6">

<div class="gallery-item">
<img src="/images/keluarga.jpg" class="gallery-img">
</div>

</div>

<div class="col-lg-4 col-md-6">

<div class="gallery-item">
<img src="/images/anak.jpg" class="gallery-img">
</div>

</div>

<div class="col-lg-4 col-md-6">

<div class="gallery-item">
<img src="/images/prewedding.jpg" class="gallery-img">
</div>

</div>

<div class="col-lg-4 col-md-6">

<div class="gallery-item">
<img src="/images/sendiri.jpg" class="gallery-img">
</div>

</div>

<div class="col-lg-4 col-md-6">

<div class="gallery-item">
<img src="/images/kantor.jpg" class="gallery-img">
</div>

</div>

</div>

</div>

</section>

<!-- LOKASI -->
<section id="lokasi" class="location-section">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Lokasi Studio
            </h2>

            <p class="section-desc">
                Temukan Lafayette Photo Studio dengan mudah
                melalui Google Maps.
            </p>

        </div>

        <div class="row align-items-stretch g-4">

            <!-- GOOGLE MAPS -->
            <div class="col-lg-7">

                <div class="map-card">

                    <iframe
                        src="https://maps.google.com/maps?q=Lafayette%20Photo%20Studio%20Banjarmasin&t=&z=15&ie=UTF8&iwloc=&output=embed"
                        width="100%"
                        height="420"
                        style="border:0;"
                        loading="lazy">
                    </iframe>

                </div>

            </div>

            <!-- INFORMASI -->
            <div class="col-lg-5">

                <div class="location-card">

                    <h4>Lafayette Photo Studio</h4>

                    <p>
                        <i class="bi bi-geo-alt-fill"></i>
                        Jl. Sultan Adam No.1-7,
                        Banjarmasin Utara,
                        Kalimantan Selatan
                    </p>

                    <p>
                        <i class="bi bi-clock-history"></i>
                        Setiap Hari
                        <br>
                        09.00 - 21.00 WITA
                    </p>

                    <a href="https://maps.app.goo.gl/VVVZUUqK6sCXtyLQ8"
                       target="_blank"
                       class="btn-booking">

                        Buka Google Maps

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ===========================
            FOOTER
=========================== -->
<footer class="footer">

    <div class="container">

    <div class="row gy-5 justify-content-between">

            <!-- ===========================
                    KOLOM 1
            =========================== -->
            <div class="col-lg-3">

                <div class="footer-logo">
                    Lafayette
                </div>

                <div class="footer-subtitle">
                    PHOTO STUDIO
                </div>

                <p class="footer-desc">
                    Studio foto profesional di Kota Banjarmasin yang siap
                    mengabadikan setiap momen terbaik dengan hasil berkualitas,
                    elegan, dan penuh cerita.
                </p>

            </div> 

                   <!-- ===========================
        KOLOM 2
=========================== -->

<div class="col-lg-3">

    <h4 class="footer-title">
        Follow Us
    </h4>

    <div class="footer-social">

        <a href="https://www.instagram.com/lafayettestudio.id"
           target="_blank"
           class="social-card">

            <i class="bi bi-instagram"></i>

            <div>

                <strong>Instagram</strong>

                <small>@lafayettestudio.id</small>

            </div>

        </a>

        <a href="https://www.tiktok.com/@lafayettestudio.id"
           target="_blank"
           class="social-card">

            <i class="bi bi-tiktok"></i>

            <div>

                <strong>TikTok</strong>

                <small>@lafayettestudio.id</small>

            </div>

        </a>

    </div>

</div>

            <!-- ===========================
                    KOLOM 2
            =========================== -->

            <div class="col-lg-3">

                <h4 class="footer-title">

                    Kontak

                </h4>

                <div class="footer-contact">

                    <i class="bi bi-geo-alt-fill"></i>

                    <span>

                        Jl. Sultan Adam No.1-7,
                        Banjarmasin Utara,
                        Kalimantan Selatan

                    </span>

                </div>

                <div class="footer-contact">

                    <i class="bi bi-clock-history"></i>

                    <span>

                        Setiap Hari
                        <br>
                        09.00 – 21.00 WITA

                    </span>

                </div>

                <div class="footer-contact">

                    <i class="bi bi-whatsapp"></i>

                    <span>

                        +62 852-1696-2962

                    </span>

                </div>

            </div>

            <!-- ===========================
                    KOLOM 3
            =========================== -->

            <div class="col-lg-3">

                <h4 class="footer-title">

                    Menu

                </h4>

                <ul class="footer-list">

                    <li>
                        <a href="#beranda">Beranda</a>
                    </li>

                    <li>
                        <a href="#paket">Paket Foto</a>
                    </li>

                    <li>
                        <a href="#galeri">Galeri</a>
                    </li>

                    <li>
                        <a href="#lokasi">Lokasi</a>
                    </li>

                    <li>
                        <a href="/booking">Booking Sekarang</a>
                    </li>

                </ul>

            </div>

        </div>

        <div class="footer-bottom">

            © 2026 Lafayette Photo Studio. All Rights Reserved.

        </div>

     </div>

</footer>

<script>

const sections=document.querySelectorAll("section[id]");

const navLinks=document.querySelectorAll(".navbar-menu a[href^='#']");

window.addEventListener("scroll",()=>{

let current="";

sections.forEach(section=>{

const sectionTop=section.offsetTop-140;

const sectionHeight=section.clientHeight;

if(pageYOffset>=sectionTop){

current=section.getAttribute("id");

}

});

navLinks.forEach(link=>{

link.classList.remove("active");

if(link.getAttribute("href")==="#"+current){

link.classList.add("active");

}

});

});

</script>
</body>
</html>