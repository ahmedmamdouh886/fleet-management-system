<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Route extends Pivot
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'station_trip';

    /**
     * The trips that belong to the trip.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trip()
    {
        return $this->belongsTo(Trip::class, 'trip_id', 'id');
    }

    /**
     * Get station routes.
     * 
     * @param int $fromStation
     * 
     * @return 
     */
    public function whereStation(int $stationId)
    {
        return $this->where('station_id', $stationId);
    }

    /**
     * Get available starting stations routes.
     * 
     * @param int $fromStation
     * 
     * @return
     */
    public function getAvailableStartingStationsRoutes(int $stationId)
    {
        return $this->whereStation((int) $stationId)->get(['trip_id', 'station_id', 'route']);
    }

    /**
     * Get Available Ending Stations Routes.
     * 
     * @param int $stationId
     * @param int $tripId
     * @param int $route
     * 
     * @return
     */
    public function getAvailableEndingStationsRoute(int $stationId, int $tripId, int $startingRoute)
    {
        return $this->whereStation((int) $stationId)->where('trip_id', $tripId)->where('route', '>', $startingRoute)->first(['station_id', 'route', 'trip_id']);
    }
}
