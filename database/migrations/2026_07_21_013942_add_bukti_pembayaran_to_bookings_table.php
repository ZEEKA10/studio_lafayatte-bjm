<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->string('bukti_pembayaran')
            ->nullable()
            ->after('status_pembayaran');

        $table->timestamp('bukti_pembayaran_diupload_pada')
            ->nullable()
            ->after('bukti_pembayaran');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->dropColumn([
            'bukti_pembayaran',
            'bukti_pembayaran_diupload_pada',
        ]);
    });
}
};
