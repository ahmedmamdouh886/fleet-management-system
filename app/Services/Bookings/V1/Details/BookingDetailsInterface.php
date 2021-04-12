<?php

namespace App\Services\Bookings\V1\Details;


interface BookingDetailsInterface
{
    /**
     * Get booking details.
     *
     * @param int $bookId The book id.
     *
     * @return array
     */
    public function getDetails(int $bookId): array;
}
