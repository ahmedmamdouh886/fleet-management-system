<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_trip', function (Blueprint $table) {
            $table->id();
            $table->foreignId('station_id')->constrained('stations');
            $table->foreignId('trip_id')->constrained('trips');
            $table->unsignedTinyInteger('route');
            $table->timestamps();

            $table->index('station_id');
            $table->index('trip_id');
            $table->index('route');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('station_trip');
    }
}
