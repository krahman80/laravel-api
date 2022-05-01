<?php

namespace App\Http\Resources;

use App\Http\Resources\ProductSellerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return [
        //     'id' => (string)$this->id,
        //     'type' => 'product',
        //     'attributes' => [
        //         'name' => $this->name,
        //     ]
        // ];

        return [
            'id' => (string)$this->id,
            'name' => $this->name,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'status' => $this->status,
            'image' => $this->image,
            'seller' => new ProductSellerResource($this->whenLoaded('seller')),
        ];
    }
}
