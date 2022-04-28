<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UsersCollection extends ResourceCollection
{
    
    public $collects = UsersResource::class;

    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }
}
