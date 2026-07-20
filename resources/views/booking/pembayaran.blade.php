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

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>
</html>