<?php

namespace App\Http\Resources;

use App\Http\Resources\SellerProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SellerResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'products' => SellerProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
