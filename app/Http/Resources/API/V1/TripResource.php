<?php

namespace App\Http\Resources\API\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'bus_plate_num' => (int) $this->bus->plate_num,
            'notes' => $this->notes,
            'seats_count' => $this->bus->seats_count,
            'available_seats' => BusSeatResource::collection($this->bus->seats),
            'stations' => StationResource::collection($this->stations),
        ];
    }
}
