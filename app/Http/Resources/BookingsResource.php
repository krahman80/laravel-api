<?php

namespace App\Http\Resources;

use App\Http\Resources\PlacesResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingsResource extends JsonResource
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
            'from' => $this->from,
            'to' => $this->to,
            // 'place_id' => (string)$this->place_id,
            'place' => new PlacesResource($this->whenLoaded('place')),
        ];
    }
}
