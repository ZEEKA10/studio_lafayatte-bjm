<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Reservasi</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>
        body {
            background-color: #f8f5f2;
        }

        .card-custom {
            border: none;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(109, 76, 61, 0.10);
        }

        .judul-halaman {
            color: #6d4c3d;
            font-weight: 700;
        }

        .label-detail {
            color: #7a7a7a;
            font-size: 0.9rem;
            margin-bottom: 4px;
        }

        .nilai-detail {
            color: #2f2f2f;
            font-weight: 600;
            margin-bottom: 0;
        }

        .bukti-pembayaran {
            width: 100%;
            max-width: 500px;
            max-height: 600px;
            object-fit: contain;
            border-radius: 14px;
            border: 1px solid #ddd;
            background-color: #fff;
            padding: 8px;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">

        <div>
            <h2 class="judul-halaman mb-1">
                Detail Reservasi
            </h2>

            <p class="text-muted mb-0">
                Informasi lengkap reservasi pelanggan
            </p>
        </div>

        <a
            href="{{ route('admin.dashboard') }}"
            class="btn btn-outline-secondary"
        >
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Dashboard
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row g-4">

        {{-- Informasi reservasi --}}
        <div class="col-lg-7">

            <div class="card card-custom h-100">
                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4" style="color: #6d4c3d;">
                        <i class="bi bi-calendar-check me-2"></i>
                        Informasi Reservasi
                    </h5>

                    <div class="row g-4">

                        <div class="col-md-6">
                            <div class="label-detail">
                                Kode Booking
                            </div>

                            <p class="nilai-detail">
                                {{ $booking->kode_booking }}
                            </p>
                        </div>

                        <div class="col-md-6">
                            <div class="label-detail">
                                Nama Customer
                            </div>

                            <p class="nilai-detail">
                                {{ $booking->customer_name }}
                            </p>
                        </div>

                        <div class="col-md-6">
                            <div class="label-detail">
                                Nomor WhatsApp
                            </div>

                            <p class="nilai-detail">
                                {{ $booking->no_hp }}
                            </p>
                        </div>

                        <div class="col-md-6">
                            <div class="label-detail">
                                Paket Foto
                            </div>

                            <p class="nilai-detail">
                                {{ $booking->package->nama_paket ?? '-' }}
                            </p>
                        </div>

                        <div class="col-md-6">
                            <div class="label-detail">
                                Tanggal Pemotretan
                            </div>

                            <p class="nilai-detail">
                                {{ \Carbon\Carbon::parse($booking->tanggal)->locale('id')->translatedFormat('d F Y') }}
                            </p>
                        </div>

                        <div class="col-md-6">
                            <div class="label-detail">
                                Waktu Pemotretan
                            </div>

                            <p class="nilai-detail">
                                {{ \Carbon\Carbon::parse($booking->jam_mulai)->format('H:i') }}
                                -
                                {{ \Carbon\Carbon::parse($booking->jam_selesai)->format('H:i') }}
                            </p>
                        </div>

                        <div class="col-md-6">
                            <div class="label-detail">
                                Harga Paket
                            </div>

                            <p class="nilai-detail">
                                Rp{{ number_format($booking->harga_saat_booking, 0, ',', '.') }}
                            </p>
                        </div>

                        <div class="col-md-6">
                            <div class="label-detail">
                                Nominal DP
                            </div>

                            <p class="nilai-detail">
                                Rp{{ number_format($booking->nominal_dp, 0, ',', '.') }}
                            </p>
                        </div>

                        <div class="col-md-6">
                            <div class="label-detail">
                                Status Reservasi
                            </div>

                            <div>
                                @if($booking->status_reservasi === 'menunggu_pembayaran')
                                    <span class="badge bg-warning text-dark px-3 py-2">
                                        Menunggu Pembayaran
                                    </span>

                                @elseif($booking->status_reservasi === 'menunggu_verifikasi')
                                    <span class="badge bg-info text-dark px-3 py-2">
                                        Menunggu Verifikasi
                                    </span>

                                @elseif($booking->status_reservasi === 'terkonfirmasi')
                                    <span class="badge bg-success px-3 py-2">
                                        Terkonfirmasi
                                    </span>

                                @elseif($booking->status_reservasi === 'berlangsung')
                                    <span class="badge bg-primary px-3 py-2">
                                        Berlangsung
                                    </span>

                                @elseif($booking->status_reservasi === 'selesai')
                                    <span class="badge bg-secondary px-3 py-2">
                                        Selesai
                                    </span>


                                @else
                                    <span class="badge bg-light text-dark border px-3 py-2">
                                        Status Tidak Diketahui
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="label-detail">
                                Status Pembayaran
                            </div>

                            <p class="nilai-detail text-capitalize">
                                {{ str_replace('_', ' ', $booking->status_pembayaran) }}
                            </p>
                        </div>

                    </div>

                    <hr class="my-4">

                    <div class="d-flex flex-wrap gap-2">

                        @if(
                        $booking->status_reservasi === 'menunggu_verifikasi'
                        && $booking->bukti_pembayaran
                        )
                            <form
                                action="{{ route('admin.updateStatus', $booking->id) }}"
                                method="POST"
                            >
                                @csrf

                                <input
                                    type="hidden"
                                    name="status_reservasi"
                                    value="terkonfirmasi"
                                >

                                <input
                                    type="hidden"
                                    name="status_pembayaran"
                                    value="terverifikasi"
                                >

                                <button
                                    type="submit"
                                    class="btn btn-success"
                                    onclick="return confirm('Yakin bukti pembayaran sudah valid?')"
                                >
                                    <i class="bi bi-shield-check me-1"></i>
                                    Verifikasi DP
                                </button>
                            </form>
                            <form
    action="{{ route('admin.updateStatus', $booking->id) }}"
    method="POST"
>
    @csrf

    <input
        type="hidden"
        name="status_reservasi"
        value="menunggu_pembayaran"
    >

    <input
        type="hidden"
        name="status_pembayaran"
        value="perlu_upload_ulang"
    >

    <button
        type="submit"
        class="btn btn-outline-danger"
        onclick="return confirm('Minta customer mengunggah ulang bukti pembayaran?')"
    >
        <i class="bi bi-arrow-repeat me-1"></i>
        Minta Upload Ulang
    </button>
</form>

                        @endif

                        @if($booking->status_reservasi === 'terkonfirmasi')
                            <form
                                action="{{ route('admin.updateStatus', $booking->id) }}"
                                method="POST"
                            >
                                @csrf

                                <input
                                    type="hidden"
                                    name="status_reservasi"
                                    value="berlangsung"
                                >

                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                    onclick="return confirm('Mulai sesi pemotretan sekarang?')"
                                >
                                    <i class="bi bi-camera me-1"></i>
                                    Mulai Sesi
                                </button>
                            </form>
                        @endif

                        @if($booking->status_reservasi === 'berlangsung')
                            <form
                                action="{{ route('admin.updateStatus', $booking->id) }}"
                                method="POST"
                            >
                                @csrf

                                <input
                                    type="hidden"
                                    name="status_reservasi"
                                    value="selesai"
                                >

                                <button
                                    type="submit"
                                    class="btn btn-dark"
                                    onclick="return confirm('Yakin sesi pemotretan sudah selesai?')"
                                >
                                    <i class="bi bi-check-circle me-1"></i>
                                    Selesaikan
                                </button>
                            </form>
                        @endif

                    </div>

                </div>
            </div>

        </div>

        {{-- Bukti pembayaran --}}
        <div class="col-lg-5">

            <div class="card card-custom h-100">
                <div class="card-body p-4 text-center">

                    <h5 class="fw-bold mb-4" style="color: #6d4c3d;">
                        <i class="bi bi-receipt me-2"></i>
                        Bukti Pembayaran DP
                    </h5>

                    @if($booking->bukti_pembayaran)

                        <a
                            href="{{ asset('storage/' . $booking->bukti_pembayaran) }}"
                            target="_blank"
                        >
                            <img
                                src="{{ asset('storage/' . $booking->bukti_pembayaran) }}"
                                alt="Bukti Pembayaran"
                                class="bukti-pembayaran"
                            >
                        </a>

                        <p class="text-muted small mt-3 mb-0">
                            Klik gambar untuk melihat ukuran penuh.
                        </p>

                    @else

                        <div class="alert alert-warning mb-0">
                            <i class="bi bi-image me-1"></i>
                            Bukti pembayaran belum diunggah.
                        </div>

                    @endif

                </div>
            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>