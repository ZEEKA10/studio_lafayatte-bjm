<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat 3 Ruangan Studio[cite: 3]
        Room::insert([
            ['nama_ruangan' => 'Studio 1', 'created_at' => now(), 'updated_at' => now()],
            ['nama_ruangan' => 'Studio 2', 'created_at' => now(), 'updated_at' => now()],
            ['nama_ruangan' => 'Studio 3', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Membuat Data Paket Foto
        Package::insert([
            [
                'nama_paket' => 'Single Profile - Basic',
                'harga' => 300000,
                'jumlah_slot' => 1, // Durasi 30 menit = 1 slot
                'deskripsi' => '15 foto edit pilihan, 6 cetak 5R, 1 cetak 8R + pigura. Maksimal 2 kostum, 2 Background.',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'nama_paket' => 'Photo Product - Food & Beverages',
                'harga' => 124000,
                'jumlah_slot' => 4, // Durasi 2 jam = 4 slot (4 x 30 menit)
                'deskripsi' => '2 hours session, 1 menu, 10 edit & retouch photos. All soft file Hi-res JPEG.',
                'created_at' => now(), 
                'updated_at' => now()
            ]
        ]);

        // Membuat Akun Admin[cite: 1, 3]
        User::insert([
            'name' => 'Administrator',
            'email' => 'admin@studio.com',
            'password' => Hash::make('password123'), // Password disandikan untuk keamanan
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}