<?php

namespace App\Services\Bookings\V1;

use App\Models\Booking as ModelsBooking;
use App\Models\Trip as TripModel;
use App\Models\User as UserModel;
use App\Services\Bookings\V1\Details\BookingDetailsInterface;

class Booking implements BookingInterface
{
    /**
     * Trip model instance.
     *
     * @var
     */
    protected $trip;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(TripModel $TripModel, UserModel $userModel, ModelsBooking $bookingModel, BookingDetailsInterface $bookingDetails)
    {
        $this->TripModel = $TripModel;
        $this->userModel = $userModel;
        $this->bookingModel = $bookingModel;
        $this->bookingDetails = $bookingDetails;
    }

    /**
     * Book a trip.
     *
     * @param int $tripId The trip id.
     * @param int $userId The user id.
     *
     * @return array
     */
    public function book(int $tripId, int $userId, int $seatId): array
    {
        // TODO: Stuffs such as validation and price calculation must be implemented.

        $trip = $this->TripModel->find((int) $tripId);

        $user = $this->userModel->findOrFail((int) $userId);

        $booking = $trip->bookings()->create([
            'user_id' => $user->id,
            'trip_id' => $trip->id,
            'seat_id' => $seatId,
        ]);

        return $this->bookingDetails->getDetails($booking->id);
    }
}
