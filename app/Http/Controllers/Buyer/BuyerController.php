<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\BuyerResource;

class BuyerController extends Controller
{

    public function index()
    {
        // http://localhost/api/v1/buyers?sort=name&page[number]=1
        
        $buyers = QueryBuilder::for(Buyer::class)
                ->allowedIncludes(['transactions.product'])
                ->allowedFilters(['name', 'email'])
                ->allowedSorts('name', 'email')
                ->jsonPaginate();
                
        return BuyerResource::collection($buyers);
    }

    public function show($id)
    {
        // http://localhost/api/v1/buyers/15
        
        $buyer = QueryBuilder::for(Buyer::class)
                ->allowedIncludes(['transactions.product'])
                ->findOrFail($id);
                
        return new BuyerResource($buyer);

    }

}
