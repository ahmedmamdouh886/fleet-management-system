<?php

namespace App\Services\Bookings\V1;

interface BookingInterface
{
    /**
     * Book a trip.
     *
     * @param int $tripId The trip id.
     * @param int $userId The user id.
     *
     * @return array
     */
    public function book(int $tripId, int $userId, int $seatId): array;
}
