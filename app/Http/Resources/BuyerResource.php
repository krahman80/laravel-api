<?php

namespace App\Http\Resources;

use App\Http\Resources\TransactionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BuyerResource extends JsonResource
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
            // 'type' => 'buyers',
            // 'attributes' => [
            //     'name' => $this->name,
            //     'email' => $this->email,
            //     'created_at' => $this->created_at,
            //     'updated_at' => $this->updated_at,
            // ],
            'name' => $this->name,
            'email' => $this->email,
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
            'transaction' => TransactionResource::collection($this->whenLoaded('transactions')), 
        ];
    }
}
