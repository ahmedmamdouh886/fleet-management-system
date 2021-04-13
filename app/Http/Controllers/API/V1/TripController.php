<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\TripRequest;
use App\Http\Resources\API\V1\TripResource;
use App\Services\Trips\V1\TripInterface;
use Illuminate\Http\Request;
use Illuminate\HTTP\Response;

class TripController extends Controller
{
    /**
     * Class constructor.
     *
     * @param \App\Services\Trips\V1\TripInterface The trip abstraction. DIP.
     *
     * @return void
     */
    public function __construct(TripInterface $trip)
    {
        $this->trip = $trip;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TripRequest $request)
    {
        try {
            $trips = $this->trip->listAvailableTrips((int) $request->input('from_station_id'), (int) $request->input('to_station_id'));

            return TripResource::collection($trips);
        } catch (\Throwable $th) {
            return response()->json(['message' => __('messages.internal_server_error')], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
