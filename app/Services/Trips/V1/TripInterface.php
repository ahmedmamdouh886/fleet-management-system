<?php

namespace App\Services\Trips\V1;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface TripInterface
{
    /**
     * List available trips.
     *
     * @param int $fromStation The starting station id.
     * @param int $toStation The end destination station id.
     *
     * @return array ['token' => 'token', 'type' => 'bearer', 'user' => 'user instance'] the trips info.
     */
    public function listAvailableTrips(int $fromStation, int $toStation): LengthAwarePaginator;
}
