<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    protected $fillable = [
        'kategori',
        'nama_paket',
        'harga',
        'jumlah_slot',
        'estimasi_durasi',
        'wajib_dp',
        'nominal_dp',
        'deskripsi',
        'gambar',
        'aktif',
    ];

    protected $casts = [
        'harga' => 'integer',
        'jumlah_slot' => 'integer',
        'wajib_dp' => 'boolean',
        'nominal_dp' => 'integer',
        'aktif' => 'boolean',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function getDurasiMenitAttribute(): int
    {
    return ((int) $this->jumlah_slot) * 30;
    }
}