<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<style>
body{
    font-family: DejaVu Sans, sans-serif;
    padding:10px;
    color:#4A3525;
}

.header{
    background:#8A6141;
    color:white;
    text-align:center;
    padding:18px;
    border-radius:12px;
}

.logo{
    font-size:28px;
    font-weight:bold;
}

.subtitle{
    font-size:14px;
    margin-top:5px;
}

.section-title{
    margin-top:15px;
    margin-bottom:15px;
    font-size:20px;
    font-weight:bold;
    color:#8A6141;
}

table{
    width:100%;
    border-collapse:collapse;
}

td{
    border:1px solid #ddd;
    padding:12px;
}

.label{
    width:35%;
    background:#F5F0EB;
    font-weight:bold;
}

.footer{
    margin-top:20px;
    text-align:center;
    color:#777;
    font-size:10px;
}

.status{
    display:inline-block;
    background:#FFC107;
    padding:6px 12px;
    border-radius:20px;
    font-weight:bold;
}
</style>

</head>

<body>

<div style="
    background:#8A6141;
    color:white;
    text-align:center;
    padding:15px;
    border-radius:10px;
    margin-bottom:15px;
">

    <img
        src="{{ public_path('images/logo-lafayette.png') }}"
        style="
            width:80px;
            height:auto;
            margin-bottom:15px;
        ">

    <h1 style="margin:0;">
        LAFAYETTE PHOTO STUDIO
    </h1>

    <p style="
        margin-top:10px;
        font-size:14px;
    ">
        Bukti Reservasi Pemotretan
    </p>

</div>

<div style="text-align:center; margin:8px 0;">

    <img
        src="data:image/svg+xml;base64,{{ $qrCode }}"
        width="120">

    <br><br>

    <div style="
        font-size:20px;
        font-weight:bold;
        color:#8A6141;
    ">
        {{ $booking->kode_booking }}
    </div>

    <p style="font-size:12px;color:#777;">
        Tunjukkan QR Check-in Pass ini kepada admin saat datang ke studio.
    </p>

</div>

<h2 style="
    margin-top:10px;
    margin-bottom:10px;
">
    Detail Reservasi
</h2>

<table>

<tr>
    <td class="label">Kode Booking</td>
    <td>{{ $booking->kode_booking }}</td>
</tr>

<tr>
    <td class="label">Nama Customer</td>
    <td>{{ $booking->customer_name }}</td>
</tr>

<tr>
    <td class="label">Nomor HP</td>
    <td>{{ $booking->no_hp }}</td>
</tr>

<tr>
    <td class="label">Paket Foto</td>
    <td>{{ $booking->package->nama_paket ?? '-' }}</td>
</tr>

<tr>
    <td class="label">Tanggal</td>
    <td>
    {{ \Carbon\Carbon::parse($booking->tanggal)
    ->locale('id')
    ->translatedFormat('d F Y') }}</td>
</tr>

<tr>
    <td class="label">Jam</td>
    <td>{{ \Carbon\Carbon::parse($booking->jam_mulai)->format('H:i') }}</td>
</tr>

<tr>
    <td class="label">Status</td>
    <td>
        <span class="status">
            {{ ucwords(str_replace('_', ' ', $booking->status_reservasi)) }}
        </span>
    </td>
</tr>

<tr>
    <td class="label">Dicetak Pada</td>
    <td>
        {{ now()
    ->locale('id')
    ->translatedFormat('d F Y H:i') }}
    </td>
</tr>

</table>

<div class="footer">

    Lafayette Photo Studio

    <br><br>

    Harap hadir 15 menit sebelum jadwal pemotretan dimulai.

</div>

</body>
</html>