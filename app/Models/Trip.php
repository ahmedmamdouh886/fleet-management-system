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
     */
    public function stations()
    {
        return $this->belongsToMany(Station::class);
    }
}