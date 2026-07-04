<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Mengizinkan mass-assignment untuk kolom-kolom ini
    protected $fillable = [
    'kode_booking',
    'customer_name',
    'no_hp',

    'tanggal',
    'jam_mulai',

    'package_id',

    'status',

    'approved_at',
    'catatan_admin',
    'alasan_penolakan',

    'checkin_at',
    'selesai_at',
];

    // Relasi ke tabel Package
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}