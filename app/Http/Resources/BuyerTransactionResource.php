<?php

namespace App\Http\Resources;

use App\Http\Resources\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BuyerTransactionResource extends JsonResource
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
            'quantity' => $this->quantity,
            'product_id' => $this->product_id,
            'product' => new ProductResource($this->whenLoaded('product'))
        ];
    }
}
