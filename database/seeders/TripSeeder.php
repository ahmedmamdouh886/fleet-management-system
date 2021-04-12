<?php

namespace Database\Seeders;

use App\Models\Station;
use App\Models\Trip;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Station list.
        $stations = ['Cairo', 'AlFayyum', 'AlMinya', 'Asyut'];

        // Create stations.
        $stationInstances = collect([]);
        collect($stations)->each(function ($item) use ($stationInstances) {
            $stationInstances->push(Station::factory()->create(['name' => $item]));
        });

        // Create a Trip and its relations.
        Trip::factory()->create()->each(function ($trip) use ($stationInstances) {
            $route = 1;
            $stationInstances->each(function ($station) use ($trip, &$route) { 
                $trip->stations()->attach($station->id, ['route' => $route++]);
            });
        });
    }
}
