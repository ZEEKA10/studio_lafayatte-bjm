<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_booking',
        'customer_name',
        'no_hp',

        'tanggal',
        'jam_mulai',
        'jam_selesai',

        'package_id',

        'jumlah_slot',
        'durasi_menit',
        'harga_saat_booking',

        'wajib_dp',
        'nominal_dp',
        'bukti_dp',

        'status',
        'status_reservasi',
        'status_pembayaran',
        'alasan_bukti_ditolak',
    ];

    protected $casts = [
        'tanggal' => 'date',

        'jumlah_slot' => 'integer',
        'durasi_menit' => 'integer',
        'harga_saat_booking' => 'integer',

        'wajib_dp' => 'boolean',
        'nominal_dp' => 'integer',
    ];

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }
}