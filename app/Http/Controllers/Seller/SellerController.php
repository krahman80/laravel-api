<?php

namespace App\Http\Controllers\Seller;

use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\SellerResource;

class SellerController extends Controller
{

    public function index()
    {
        //http://localhost/api/sellers?sort=-name&filter[name]=tes&page[number]=1
        
        $sellers = QueryBuilder::for(Seller::class)
                ->allowedIncludes(['products'])
                ->allowedFilters(['name', 'email'])
                ->allowedSorts(['name'])
                ->jsonPaginate();

        // return response()->json([
        //     'data' => $sellers,
        // ]);
        
        return SellerResource::collection($sellers);

    }


    public function show($id)
    {
        //http://localhost/api/sellers/170
        //http://localhost/api/sellers/170?include=product

        $seller = QueryBuilder::for(Seller::class)
                ->allowedIncludes(['products'])
                ->findOrFail($id);

        // return response()->json([
        //     'data' => $seller,
        // ]);

        return new SellerResource($seller);
    }

}
