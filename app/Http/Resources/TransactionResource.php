<?php

namespace App\Http\Resources;

use App\Http\Resources\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
        //     'type' => 'transaction',
        //     'attributes' => [
        //         'product_id' => $this->product_id,
        //         'quantity' => $this->quantity,
        //         // 'product' => [
        //         //     'name' => new ProductResource($this->whenLoaded('product'))
        //         // ]
        //         'product' => new ProductResource($this->whenLoaded('product'))
        //     ]
        // ];

        return [
            'id' => (string)$this->id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'product' => new ProductResource($this->whenLoaded('product'))
        ];
    }
}
