<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Laporan Booking Lafayette</title>

    <style>

        body{
            font-family: DejaVu Sans;
            font-size:12px;
        }

        h1{
            text-align:center;
            margin-bottom:5px;
            color:#8A6141;
        }

        .subjudul{
            text-align:center;
            margin-bottom:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table,
        th,
        td{
            border:1px solid #000;
        }

        th{
            background:#BA8E68;
            color:white;
            text-align:center;
        }

        th,
        td{
            padding:8px;
            text-align:left;
        }

    </style>

</head>

<body>

    <div style="text-align:center; margin-bottom:15px;">

        <img
            src="{{ public_path('images/logo-lafayette.png') }}"
            width="80">

        <h1 style="margin-top:10px;">
            Lafayette Photo Studio
        </h1>

    </div>   

    <div class="subjudul">

    <strong>
        LAPORAN DATA RESERVASI CUSTOMER
    </strong>

    <br><br>

    Periode :
    {{ $periode }}

    <br>

    Dicetak pada :
    {{ now()->format('d-m-Y H:i') }}

    </div>

    <hr style="border:none; height:2px; background:#BA8E68; margin:20px 0;">

<div style="background:#F8F1EA; border:1px solid #E0C7B0; padding:10px; margin-bottom:15px; text-align:center; font-size:12px; color:#4A3525;">

    <strong>Total Reservasi:</strong> {{ $totalBooking }}

    &nbsp;&nbsp; | &nbsp;&nbsp;

    <strong>Pending:</strong> {{ $totalPending }}

    &nbsp;&nbsp; | &nbsp;&nbsp;

    <strong>Checked-in:</strong> {{ $totalCheckin }}

    &nbsp;&nbsp; | &nbsp;&nbsp;

    <strong>Selesai:</strong> {{ $totalSelesai }}

    &nbsp;&nbsp; | &nbsp;&nbsp;

    <strong>Batal:</strong> {{ $totalBatal }}

</div>
<table>

        <thead>

            <tr>

                <th>No</th>
                <th>Kode Booking</th>
                <th>Customer</th>
                <th>Paket</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Status</th>

            </tr>

        </thead>

        <tbody>

            @foreach($bookings as $booking)

            <tr>

                <td style="text-align:center;">
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $booking->kode_booking }}
                </td>

                <td>
                    {{ $booking->customer_name }}
                </td>

                <td>
                    {{ $booking->package->nama_paket ?? '-' }}
                </td>

                <td>
                    {{ \Carbon\Carbon::parse($booking->tanggal)->format('d-m-Y') }}
                </td>

                <td>
                    {{ \Carbon\Carbon::parse($booking->jam_mulai)->format('H:i') }}
                </td>

                <td>
                    {{ ucwords(str_replace('_', ' ', $booking->status_reservasi)) }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

    <div style="margin-top:20px; text-align:center; font-size:10px; color:#777;">
        Laporan dibuat oleh Sistem Informasi Reservasi Lafayette Photo Studio
</div>
</body>
</html>