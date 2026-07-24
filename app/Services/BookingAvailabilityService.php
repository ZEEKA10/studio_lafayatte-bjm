<?php

namespace App\Services;

use App\Models\Booking;
use Carbon\Carbon;

class BookingAvailabilityService
{
    /**
     * Jumlah fotografer yang dapat melayani
     * booking secara bersamaan.
     */
    private int $capacity = 2;

    /**
     * Menghitung jam selesai berdasarkan durasi paket.
     */
    public function calculateEndTime(
        string $jamMulai,
        int $durasiMenit
    ): string {
        return Carbon::createFromFormat('H:i', $jamMulai)
            ->addMinutes($durasiMenit)
            ->format('H:i');
    }

    /**
     * Memeriksa apakah jadwal masih tersedia
     * sepanjang durasi paket.
     */
    public function isAvailable(
        string $tanggal,
        string $jamMulai,
        int $durasiMenit
    ): bool {
        $waktuMulai = Carbon::createFromFormat(
            'Y-m-d H:i',
            $tanggal . ' ' . $jamMulai
        );

        $waktuSelesai = $waktuMulai
            ->copy()
            ->addMinutes($durasiMenit);

        /*
         * Ambil semua booking aktif yang bertabrakan
         * dengan rentang booking baru.
         */
        $bookingBentrok = Booking::query()
            ->whereDate('tanggal', $tanggal)
            ->whereIn('status_reservasi', [
                'menunggu_pembayaran',
                'menunggu_verifikasi',
                'terkonfirmasi',
                'berlangsung',
            ])
            ->whereTime(
                'jam_mulai',
                '<',
                $waktuSelesai->format('H:i:s')
            )
            ->whereTime(
                'jam_selesai',
                '>',
                $waktuMulai->format('H:i:s')
            )
            ->get([
                'jam_mulai',
                'jam_selesai',
            ]);

        /*
         * Tidak ada booking yang bertabrakan.
         */
        if ($bookingBentrok->isEmpty()) {
            return true;
        }

        /*
         * Kumpulkan titik waktu yang perlu diperiksa.
         */
        $titikPemeriksaan = [
            $waktuMulai->timestamp,
        ];

        foreach ($bookingBentrok as $booking) {
            $mulaiBooking = Carbon::createFromFormat(
                'Y-m-d H:i:s',
                $tanggal . ' ' . $booking->jam_mulai
            );

            $selesaiBooking = Carbon::createFromFormat(
                'Y-m-d H:i:s',
                $tanggal . ' ' . $booking->jam_selesai
            );

            if (
                $mulaiBooking->greaterThanOrEqualTo($waktuMulai)
                && $mulaiBooking->lessThan($waktuSelesai)
            ) {
                $titikPemeriksaan[] = $mulaiBooking->timestamp;
            }

            if (
                $selesaiBooking->greaterThan($waktuMulai)
                && $selesaiBooking->lessThan($waktuSelesai)
            ) {
                $titikPemeriksaan[] = $selesaiBooking->timestamp;
            }
        }

        $titikPemeriksaan = array_unique($titikPemeriksaan);
        sort($titikPemeriksaan);

        /*
         * Periksa jumlah booking aktif pada setiap
         * bagian rentang waktu.
         */
        foreach ($titikPemeriksaan as $timestamp) {
            $waktuPeriksa = Carbon::createFromTimestamp($timestamp);

            $jumlahBookingAktif = $bookingBentrok
                ->filter(function ($booking) use (
                    $tanggal,
                    $waktuPeriksa
                ) {
                    $mulaiBooking = Carbon::createFromFormat(
                        'Y-m-d H:i:s',
                        $tanggal . ' ' . $booking->jam_mulai
                    );

                    $selesaiBooking = Carbon::createFromFormat(
                        'Y-m-d H:i:s',
                        $tanggal . ' ' . $booking->jam_selesai
                    );

                    return $mulaiBooking
                        ->lessThanOrEqualTo($waktuPeriksa)
                        && $selesaiBooking
                            ->greaterThan($waktuPeriksa);
                })
                ->count();

            /*
             * Jika sudah ada dua booking aktif,
             * booking baru tidak boleh masuk.
             */
            if ($jumlahBookingAktif >= $this->capacity) {
                return false;
            }
        }

        return true;
    }
}