<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->time('jam_selesai')
                ->nullable()
                ->after('jam_mulai');

            $table->unsignedSmallInteger('jumlah_slot')
                ->nullable()
                ->after('package_id');

            $table->unsignedSmallInteger('durasi_menit')
                ->nullable()
                ->after('jumlah_slot');

            $table->unsignedInteger('harga_saat_booking')
                ->nullable()
                ->after('durasi_menit');

            $table->boolean('wajib_dp')
                ->default(false)
                ->after('harga_saat_booking');

            $table->unsignedInteger('nominal_dp')
                ->default(0)
                ->after('wajib_dp');

            $table->string('bukti_dp')
                ->nullable()
                ->after('nominal_dp');

            $table->string('status_reservasi')
                ->default('menunggu_konfirmasi')
                ->after('status');

            $table->string('status_pembayaran')
                ->default('tidak_memerlukan_dp')
                ->after('status_reservasi');

            $table->text('alasan_bukti_ditolak')
                ->nullable()
                ->after('status_pembayaran');
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn([
                'jam_selesai',
                'jumlah_slot',
                'durasi_menit',
                'harga_saat_booking',
                'wajib_dp',
                'nominal_dp',
                'bukti_dp',
                'status_reservasi',
                'status_pembayaran',
                'alasan_bukti_ditolak',
            ]);
        });
    }
};