<?php

namespace App\Services\Trips\V1;

use App\Models\Route;
use App\Models\Trip as TripModel;
use Illuminate\Pagination\LengthAwarePaginator;

class Trip implements TripInterface
{
    /**
     * Trip model instance.
     *
     * @var $trip
     */
    protected $trip;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(TripModel $trip, Route $route)
    {
        $this->trip = $trip;
        $this->route = $route;
    }

    /**
     * List available trips.
     *
     * @param int $fromStation The starting station id.
     * @param int $toStation The end destination station id.
     *
     * @return array ['token' => 'token', 'type' => 'bearer', 'user' => 'user instance'] the trips info.
     */
    public function listAvailableTrips(int $fromStation, int $toStation): LengthAwarePaginator
    {
        $availableStartingRoutes = $this->route->getAvailableStartingStationsRoutes((int) $fromStation);

        $destinationTripsIds = [];
        $availableStartingRoutes->each(function ($route) use ($toStation, &$destinationTripsIds) {
            $destinationRoute = $this->route->getAvailableEndingStationsRoute($toStation, $route->trip_id, $route->route);
            if ($destinationRoute) {
                $destinationTripsIds[] = $destinationRoute->trip_id;
            }
        });
        
        return $this->trip->withAvailableBusSeatsAndStations()->notFull()->whereIn('id', $destinationTripsIds)->paginate(10);
    }
}
