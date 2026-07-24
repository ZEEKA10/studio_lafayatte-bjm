<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Pembayaran Booking</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card shadow-sm">

                    <div class="card-body p-4">

                        <h2 class="text-center mb-4">
                            Pembayaran Booking
                        </h2>

                        <div class="alert alert-success">
                            Booking berhasil dibuat.
                        </div>

                        <div class="mb-3">
                            <strong>Kode Booking:</strong>

                            {{ $booking->kode_booking }}
                        </div>

                        <div class="mb-3">
                            <strong>Nama Pelanggan:</strong>

                            {{ $booking->customer_name }}
                        </div>

                        <div class="mb-3">
                            <strong>Nominal DP:</strong>

                            Rp {{ number_format(
                                $booking->nominal_dp,
                                0,
                                ',',
                                '.'
                            ) }}
                        </div>

                        <div class="alert alert-info">
    <h5 class="alert-heading">
        Cara Pembayaran
    </h5>

    <p class="mb-2">
        QRIS pembayaran dibuat secara dinamis melalui mesin EDC.
    </p>

    <p class="mb-2">
        Silakan hubungi admin melalui WhatsApp untuk meminta QRIS.
    </p>

    <p class="mb-0">
        QRIS hanya berlaku sekitar 10–15 menit.
        Jika QRIS sudah kedaluwarsa, silakan minta QRIS baru kepada admin.
    </p>
</div>

<a
    href="https://wa.me/6285216962962?text={{ urlencode(
        'Halo Admin Lafayette Photo Studio, saya ingin meminta QRIS untuk pembayaran DP booking dengan kode ' .
        $booking->kode_booking
    ) }}"
    target="_blank"
    class="btn btn-success w-100 mb-3"
>
    Hubungi Admin via WhatsApp
</a>

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form
    action="{{ route('booking.upload-bukti', $booking->kode_booking) }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf

    @if($booking->status_pembayaran == 'perlu_upload_ulang')

        <div class="alert alert-warning">
            <strong>Bukti pembayaran perlu diunggah ulang.</strong>

            <hr>

            <strong>Catatan Admin:</strong><br>

            {{ $booking->alasan_bukti_ditolak }}
        </div>

    @endif

    @if(
        $booking->status_pembayaran == 'belum_upload' ||
        $booking->status_pembayaran == 'perlu_upload_ulang'
    )

        <div class="mb-3">

            <label class="form-label">
                Upload Bukti Pembayaran
            </label>

            <input
                type="file"
                name="bukti_pembayaran"
                class="form-control"
                accept=".jpg,.jpeg,.png,.webp"
                required
            >

            <small class="text-muted">
                Format JPG, JPEG, PNG, atau WEBP.
                Maksimal 2 MB.
            </small>

        </div>

        <button
            class="btn btn-primary w-100"
            type="submit"
        >
            Upload Bukti Pembayaran
        </button>

    @elseif($booking->status_pembayaran == 'menunggu_verifikasi')

        <div class="alert alert-info mb-0">
            <strong>Bukti pembayaran sudah diterima.</strong><br>
            Saat ini sedang menunggu verifikasi admin.
        </div>

    @elseif($booking->status_pembayaran == 'terverifikasi')

        <div class="alert alert-success mb-0">
            <strong>Pembayaran berhasil diverifikasi.</strong><br>
            Booking Anda telah dikonfirmasi.
        </div>

    @endif

</form>

<div class="alert alert-secondary mb-0">
    Pelanggan yang tidak memiliki mobile banking dapat membayar DP secara tunai langsung di studio.
</div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>
</html>