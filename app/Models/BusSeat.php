<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusSeat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['bus_id', 'ref_id'];

    /**
     * The trips that belong to the trip.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trip()
    {
        // return $this->belongsTo(Booking::class);
    }

    /**
     * The trips that belong to the trip.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function booking()
    {
        return $this->hasMany(Booking::class, 'seat_id');
    }
}
