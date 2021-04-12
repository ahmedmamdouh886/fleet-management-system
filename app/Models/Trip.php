<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['bus_id', 'notes'];

    /**
     * The stations that belong to the trip.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function stations()
    {
        return $this->belongsToMany(Station::class, 'station_trip')->withPivot('station_id', 'trip_id', 'route');
    }

    /**
     * Scope a query to only include not full trips.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotFull($query)
    {
        return $query->where('is_full', false);
    }

    /**
     * With bus seats and stations routes.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function withAvailableBusSeatsAndStations()
    {
        return $this->with(['bus.seats' => function ($query) {
            $query->whereDoesntHave('booking');
        }, 'stations' => function ($query) {
            $query->orderBy('pivot_route', 'asc');
        }]);
    }

    

    /**
     * Scope a query to only include specific trip id.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWhereId($query, int $id)
    {
        return $query->where('id', $id);
    }

    /**
     * The stations that belong to the trip.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    /**
     * The stations that belong to the trip.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function busSeats()
    {
        return $this->hasManyThrough(Bus::class, BusSeat::class);
    }
}
