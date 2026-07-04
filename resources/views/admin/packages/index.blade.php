<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Paket Foto - Lafayette Studio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <style>
        /* TEMA COKELAT MUDA (LIGHT MOCHA & BEIGE) - PREMIUM UI */
        body { background-color: #F8F5F2; font-family: 'Montserrat', sans-serif; color: #4A3525; }
        .judul-elegan { font-family: 'Playfair Display', serif; font-weight: 700; }
        .bg-cokelat { background-color: #BA8E68 !important; color: #FFFFFF !important; }
        .text-cokelat { color: #8A6141 !important; }
        
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .animasi-masuk { animation: fadeInUp 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards; }

        @keyframes pulse-cokelat {
            0% { box-shadow: 0 0 0 0 rgba(186, 142, 104, 0.5); }
            70% { box-shadow: 0 0 0 15px rgba(186, 142, 104, 0); }
            100% { box-shadow: 0 0 0 0 rgba(186, 142, 104, 0); }
        }

        /* --- NAVBAR PREMIUM --- */
        .navbar-custom { background-color: #BA8E68; box-shadow: 0 10px 30px rgba(138, 97, 65, 0.1); padding: 15px 0; }
        .navbar-custom .navbar-brand { color: #FFFFFF !important; letter-spacing: 1px; transition: transform 0.3s; font-size: 1.5rem; }
        .navbar-custom .navbar-brand:hover { transform: scale(1.02); }
        
        .navbar-logo { width: 55px; height: 55px; object-fit: cover; border-radius: 50%; background-color: #FFFFFF; padding: 3px; box-shadow: 0 4px 10px rgba(0,0,0,0.15); }

        .nav-link-kapsul { color: #FFFFFF !important; background-color: rgba(255, 255, 255, 0.15); border-radius: 30px; padding: 10px 25px !important; font-weight: 600; transition: all 0.3s ease; border: 1px solid transparent; display: inline-block; }
        .nav-link-kapsul:hover { background-color: #FFFFFF; color: #BA8E68 !important; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transform: translateY(-2px); }

        .btn-logout { background-color: #B25353; color: #FFFFFF; border: none; border-radius: 30px; padding: 10px 25px; font-weight: 600; transition: all 0.3s ease; }
        .btn-logout:hover { background-color: #8C3E3E; color: #FFFFFF; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(178, 83, 83, 0.3); }
        
        /* --- TOMBOL UTAMA --- */
        .btn-cokelat { background-color: #BA8E68; color: #FFFFFF; border: none; border-radius: 10px; padding: 12px 25px; transition: all 0.3s ease; }
        .btn-cokelat:hover { background-color: #9C7451; color: #ffffff; transform: translateY(-3px); animation: pulse-cokelat 1.5s infinite; }
        
        /* --- KARTU & TABEL SPASIOUS --- */
        .card-custom { border: none; border-radius: 15px; box-shadow: 0 10px 35px rgba(138, 97, 65, 0.08); background-color: #FFFFFF; transition: all 0.3s ease; padding: 10px; margin-bottom: 30px; }
        .card-header-custom { border-radius: 10px 10px 0 0 !important; font-size: 1.1rem; padding: 15px 20px; }
        
        .table-custom thead th { background-color: transparent; color: #8A6141; border-bottom: 2px solid #F0E6DD; font-weight: 700; padding: 15px 10px; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px; }
        .table-custom tbody tr { background-color: #ffffff; transition: all 0.2s ease-in-out; border-bottom: 1px solid #F8F5F2; }
        .table-custom tbody tr:hover { background-color: #FDFBF7; transform: scale(1.002); box-shadow: 0 5px 15px rgba(138, 97, 65, 0.05); border-radius: 10px; }
        .table-custom tbody td { padding: 20px 10px; vertical-align: middle; }

        /* --- TOMBOL EDIT & HAPUS --- */
        .btn-edit { border: 1px solid #BA8E68; color: #BA8E68; background: transparent; padding: 6px 15px; border-radius: 8px; transition: all 0.2s; font-weight: 600; text-decoration: none; display: inline-block; font-size: 0.9rem; }
        .btn-edit:hover { background: #BA8E68; color: #fff; transform: translateY(-2px); box-shadow: 0 4px 10px rgba(186, 142, 104, 0.2); }
        
        .btn-delete { border: 1px solid #B25353; color: #B25353; background: transparent; padding: 6px 15px; border-radius: 8px; transition: all 0.2s; font-weight: 600; font-size: 0.9rem; }
        .btn-delete:hover { background: #B25353; color: #fff; transform: translateY(-2px); box-shadow: 0 4px 10px rgba(178, 83, 83, 0.2); }

        .table-responsive::-webkit-scrollbar { display: none; }
        .table-responsive { -ms-overflow-style: none; scrollbar-width: none; }
        
        /* List Deskripsi Rapi */
        .desc-list { padding-left: 20px; margin-bottom: 0; text-align: left; font-size: 0.9rem; color: #6D4C3D; }
        .desc-list li { margin-bottom: 4px; }
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

    <div class="container-fluid px-4 mt-5 mb-5">
        
        @if(session('success'))
            <div class="alert alert-success fw-bold shadow-sm animasi-masuk" style="border-radius: 10px;">{{ session('success') }}</div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4 animasi-masuk" style="animation-delay: 0.1s; opacity: 0;">
            <h3 class="mb-0 judul-elegan text-cokelat" style="font-size: 2rem;">Daftar Paket Foto</h3>
            <a href="{{ route('packages.create') }}" class="btn btn-cokelat fw-bold shadow-sm">➕ Tambah Paket Baru</a>
        </div>

        @forelse($groupedPackages as $kategori => $packages)
            <div class="card card-custom overflow-hidden animasi-masuk" style="animation-delay: 0.2s; opacity: 0;">
                <div class="card-header bg-cokelat card-header-custom text-white fw-bold">
                    📂 Kategori: <span class="judul-elegan fs-5 ms-1">{{ $kategori }}</span>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-custom mb-0 align-middle text-center" style="border-collapse: separate; border-spacing: 0;">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="15%">Gambar</th>
                                    <th width="15%">Tipe Paket</th>
                                    <th width="15%">Harga</th>
                                    <th width="10%">Durasi (Slot)</th>
                                    <th width="25%">Deskripsi Fasilitas</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($packages as $index => $package)
                                <tr>
                                    <td class="text-muted fw-bold">{{ $index + 1 }}</td>

                                    <td>
                                        @if($package->gambar)
                                            <img src="{{ asset('storage/' . $package->gambar) }}"
                                             width="100"
                                             class="img-thumbnail">
                                        @else
                                            <span class="text-muted">Tidak ada gambar</span>
                                        @endif
                                    </td>

                                    <td class="fw-bold text-cokelat">
                                        {{ $package->nama_paket }}
                                    </td>
                                    
                                    <td class="fw-bold" style="color: #6D4C3D;">Rp {{ number_format($package->harga, 0, ',', '.') }}</td>
                                    <td><span class="fw-bold">{{ $package->jumlah_slot }} Slot</span> <br><small class="text-muted">({{ $package->jumlah_slot * 30 }} Menit)</small></td>
                                    <td>
                                        @if($package->deskripsi)
                                            <ul class="desc-list">
                                                @foreach(explode("\n", $package->deskripsi) as $item)
                                                    @if(trim($item)) <li>{{ trim($item) }}</li> @endif
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('packages.edit', $package->id) }}" class="btn-edit">✏️ Edit</a>
                                            <form action="{{ route('packages.destroy', $package->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus paket ini?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn-delete">🗑️ Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-warning text-center fw-bold animasi-masuk" style="border-radius: 10px; animation-delay: 0.2s; opacity: 0;">Belum ada data paket foto yang ditambahkan.</div>
        @endforelse

    </div>
</body>
</html>