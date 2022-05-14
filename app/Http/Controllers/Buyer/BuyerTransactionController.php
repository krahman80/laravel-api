<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BuyerResource;
use Spatie\QueryBuilder\QueryBuilder;

class BuyerTransactionController extends Controller
{
    public function index($id) {

        // GET /buyer.transaction/16?include=transactions
        // $buyer = Buyer::find($id);
        $buyer = QueryBuilder::for(Buyer::class)
        ->allowedIncludes(['transactions'])
        ->findOrFail($id);
        $this->authorize('view', $buyer);

        return new BuyerResource($buyer);
    }
}
