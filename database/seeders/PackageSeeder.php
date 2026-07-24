<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        Package::updateOrCreate(
            [
                'kategori' => 'Graduation',
                'nama_paket' => 'Basic',
            ],
            [
                'harga' => 300000,
                'jumlah_slot' => 2,
                'wajib_dp' => true,
                'nominal_dp' => 50000,
                'aktif' => true,
            ]
        );

        Package::updateOrCreate(
            [
                'kategori' => 'Graduation',
                'nama_paket' => 'Special',
            ],
            [
                'harga' => 470000,
                'jumlah_slot' => 3,
                'wajib_dp' => true,
                'nominal_dp' => 50000,
                'aktif' => true,
            ]
        );

        Package::updateOrCreate(
            [
                'kategori' => 'Pas Foto',
                'nama_paket' => 'Reguler',
            ],
            [
                'harga' => 75000,
                'jumlah_slot' => 1,
                'wajib_dp' => false,
                'nominal_dp' => 0,
                'aktif' => true,
            ]
        );
    }
}