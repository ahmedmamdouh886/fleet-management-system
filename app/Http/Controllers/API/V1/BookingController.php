<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\StoreBookingRequest;
use App\Http\Resources\API\V1\TripResource;
use App\Services\Bookings\V1\BookingInterface;
use App\Services\Trips\V1\TripInterface;
use Illuminate\Http\Request;
use Illuminate\HTTP\Response;

class BookingController extends Controller
{
    /**
     * Class constructor.
     *
     * @param \App\Services\Trips\V1\TripInterface The trip abstraction. DIP.
     *
     * @return void
     */
    public function __construct(BookingInterface $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingRequest $request)
    {
        try {
            
            $bookingDetails = $this->booking->book($request->input('trip_id'), auth()->user()->id, $request->input('seat_id'));

            // TODO: should return the booking details.
            return response()->json(['data' => $bookingDetails]); // Should be resource.
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return response()->json(['message' => __('messages.internal_server_error')], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
