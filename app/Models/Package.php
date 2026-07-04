<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
    'kategori',
    'nama_paket',
    'harga',
    'jumlah_slot',

    // Tambahan baru
    'estimasi_durasi',

    'deskripsi',
    'gambar'
];
}