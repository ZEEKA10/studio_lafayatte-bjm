<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BookingsExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{

protected $bookings;

public function __construct($bookings)
{
    $this->bookings = $bookings;
}

    public function collection()
{
    return $this->bookings->map(function ($booking) {

        return [
            $booking->kode_booking,
            $booking->customer_name,
            $booking->no_hp,
            $booking->package->nama_paket ?? '-',

            \Carbon\Carbon::parse($booking->tanggal)
                ->locale('id')
                ->translatedFormat('d F Y'),

            \Carbon\Carbon::parse($booking->jam_mulai)
                ->format('H:i'),

            ucwords(
                str_replace(
                    '_',
                    ' ',
                    $booking->status_reservasi
                )
            ),
        ];
    });
}

    public function headings(): array
    {
        return [
             'Kode Booking',
             'Nama Customer',
             'Nomor HP',
             'Paket Foto',
             'Tanggal Reservasi',
             'Jam Reservasi',
             'Status Booking'
        ];
    }

    public function styles(Worksheet $sheet)
    {
    return [

        1 => [

            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => 'FFFFFF'
                ],
                'size' => 12
            ],

            'fill' => [
                'fillType' => 'solid',
                'startColor' => [
                    'rgb' => 'BA8E68'
                ]
            ]

        ]

    ];
}

}