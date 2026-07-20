<?php

namespace App\Services;

use App\Models\Booking;
use Carbon\Carbon;

class BookingAvailabilityService
{
    private int $capacity = 3;

    public function generateSlots(
        string $jamMulai,
        int $jumlahSlot
    ): array {
        $slots = [];

        $waktu = Carbon::createFromFormat('H:i', $jamMulai);

        for ($i = 0; $i < $jumlahSlot; $i++) {
            $slots[] = $waktu->format('H:i');
            $waktu->addMinutes(30);
        }

        return $slots;
    }

    public function calculateEndTime(
        string $jamMulai,
        int $jumlahSlot
    ): string {
        return Carbon::createFromFormat('H:i', $jamMulai)
            ->addMinutes($jumlahSlot * 30)
            ->format('H:i');
    }

    public function isAvailable(
        string $tanggal,
        string $jamMulai,
        int $jumlahSlot
    ): bool {
        $slots = $this->generateSlots($jamMulai, $jumlahSlot);

        foreach ($slots as $slot) {
            $jumlahBooking = $this->countBookingsAtSlot(
                $tanggal,
                $slot
            );

            if ($jumlahBooking >= $this->capacity) {
                return false;
            }
        }

        return true;
    }

    private function countBookingsAtSlot(
        string $tanggal,
        string $slot
    ): int {
        $slotStart = Carbon::createFromFormat('H:i', $slot);
        $slotEnd = $slotStart->copy()->addMinutes(30);

        return Booking::query()
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
                $slotEnd->format('H:i:s')
            )
            ->whereTime(
                'jam_selesai',
                '>',
                $slotStart->format('H:i:s')
            )
            ->count();
    }
}