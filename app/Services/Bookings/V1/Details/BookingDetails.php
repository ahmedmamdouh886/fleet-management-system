<?php

namespace App\Services\Bookings\V1\Details;

use App\Services\Bookings\V1\Details\BookingDetailsInterface;

class BookingDetails implements BookingDetailsInterface
{
    /**
     * Get booking details.
     *
     * @param int $bookId The book id.
     *
     * @return array
     */
    public function getDetails(int $bookId): array
    {
        return [
            'booking details.'
        ];
    }
}
