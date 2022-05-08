<?php

namespace App\Http\Resources;

use App\Http\Resources\BookingsResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PlacesResource extends JsonResource
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
            'id' => (string)$this->id,
            'title' => $this->title,
            'description' => $this->description,
            'bookings' => BookingsResource::collection($this->whenLoaded('bookings')),
        ];
    }
}
