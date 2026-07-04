<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Paket Foto - Lafayette Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <style>
        body { background-color: #F8F5F2; font-family: 'Montserrat', sans-serif; color: #4A3525; }
        .judul-elegan { font-family: 'Playfair Display', serif; font-weight: 700; }
        .bg-cokelat { background-color: #BA8E68 !important; color: #FFFFFF !important; }
        .text-cokelat { color: #8A6141 !important; }

        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .animasi-masuk { animation: fadeInUp 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards; }

        /* NAVBAR PREMIUM */
        .navbar-custom { background-color: #BA8E68; box-shadow: 0 10px 30px rgba(138, 97, 65, 0.1); padding: 15px 0; }
        .navbar-custom .navbar-brand { color: #FFFFFF !important; letter-spacing: 1px; transition: transform 0.3s; font-size: 1.5rem; }
        .navbar-logo { width: 55px; height: 55px; object-fit: cover; border-radius: 50%; background-color: #FFFFFF; padding: 3px; box-shadow: 0 4px 10px rgba(0,0,0,0.15); }
        .nav-link-kapsul { color: #FFFFFF !important; background-color: rgba(255, 255, 255, 0.15); border-radius: 30px; padding: 10px 25px !important; font-weight: 600; transition: all 0.3s ease; display: inline-block; }
        .nav-link-kapsul:hover { background-color: #FFFFFF; color: #BA8E68 !important; transform: translateY(-2px); }
        .btn-logout { background-color: #B25353; color: #FFFFFF; border: none; border-radius: 30px; padding: 10px 25px; font-weight: 600; transition: all 0.3s ease; }
        .btn-logout:hover { background-color: #8C3E3E; color: #FFFFFF; transform: translateY(-2px); }

        /* FORM & KARTU */
        .card-custom { border: none; border-radius: 15px; box-shadow: 0 10px 35px rgba(138, 97, 65, 0.08); background-color: #FFFFFF; padding: 15px; margin-top: 20px; }
        .card-header-custom { border-radius: 10px 10px 0 0 !important; font-size: 1.3rem; padding: 18px; }
        
        .form-control { border-color: #DBC4B1; color: #4A3525; padding: 12px 15px; border-radius: 10px; transition: all 0.3s; }
        .form-control:focus { border-color: #BA8E68; box-shadow: 0 0 0 0.25rem rgba(186, 142, 104, 0.25); transform: scale(1.005); }

        .btn-cokelat { background-color: #BA8E68; color: #FFFFFF; border: none; border-radius: 10px; transition: all 0.3s ease; padding: 12px 30px; }
        .btn-cokelat:hover { background-color: #9C7451; color: #FFFFFF; transform: translateY(-3px); box-shadow: 0 5px 15px rgba(186, 142, 104, 0.3); }
        .btn-outline-cokelat { border: 2px solid #BA8E68; color: #BA8E68; background-color: transparent; border-radius: 10px; padding: 12px 30px; transition: all 0.3s ease; }
        .btn-outline-cokelat:hover { background-color: #BA8E68; color: #FFFFFF; transform: translateY(-2px); }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom animasi-masuk">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold judul-elegan d-flex align-items-center" href="#">
                <img src="{{ asset('images/logo-lafayette.png') }}" alt="Logo Lafayette" class="navbar-logo me-3">
                Lafayette Admin
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                <li class="nav-item">
                    <a class="nav-link nav-link-kapsul" href="{{ route('admin.dashboard') }}">Dashboard Reservasi</a>
                </li>
            </ul>
            <div class="d-flex">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8 animasi-masuk" style="animation-delay: 0.1s; opacity: 0;">
                <div class="card card-custom">
                    <div class="card-header bg-cokelat card-header-custom text-center text-white">
                        <h4 class="mb-0 judul-elegan">✏️ Edit Paket Foto</h4>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-4">
                                <label class="form-label fw-bold text-cokelat">Kategori / Grup Paket</label>
                                <input type="text" name="kategori" class="form-control" value="{{ $package->kategori }}" required>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label fw-bold text-cokelat">Nama Paket (Tipe)</label>
                                <input type="text" name="nama_paket" class="form-control" value="{{ $package->nama_paket }}" required>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-bold text-cokelat">Harga (Rp)</label>
                                    <input type="number" name="harga" class="form-control" value="{{ $package->harga }}" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-bold text-cokelat">Jumlah Slot Waktu</label>
                                    <input type="number" name="jumlah_slot" class="form-control" min="1" value="{{ $package->jumlah_slot }}" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold text-cokelat">Deskripsi Fasilitas</label>
                                <div class="form-text text-muted mb-2">Pisahkan setiap fasilitas dengan tombol <b>Enter</b>.</div>
                                <textarea name="deskripsi" class="form-control" rows="6">{{ $package->deskripsi }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold text-cokelat">
                                    Gambar Paket Saat Ini
                                </label>

                                @if($package->gambar)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $package->gambar) }}"
                                            width="200"
                                            class="img-thumbnail">
                                    </div>
                                @else
                                <p class="text-muted">Belum ada gambar.</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold text-cokelat">
                                    Ganti Gambar Paket
                                </label>

                                <input type="file"
                                       name="gambar"
                                       class="form-control"
                                       accept="image/*">

                                <div class="form-text">
                                    Kosongkan jika tidak ingin mengganti gambar.
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-5 pt-4 border-top" style="border-color: #F0E6DD !important;">
                                <a href="{{ route('packages.index') }}" class="btn btn-outline-cokelat fw-bold">Kembali</a>
                                <button type="submit" class="btn btn-cokelat fw-bold">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>