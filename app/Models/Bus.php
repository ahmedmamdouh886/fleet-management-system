<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['plate_num', 'seats_count'];

    /**
     * Get the seats for the bus.
     */
    public function seats()
    {
        return $this->hasMany(BusSeat::class);
    }
}
