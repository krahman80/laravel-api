<?php

namespace App\Http\Controllers\Product;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = QueryBuilder::for(Product::class)->allowedIncludes(['seller'])
        ->allowedFilters(['name', 'status'])
        ->allowedSorts('name', 'status')
        ->paginate();

        return ProductResource::collection($products);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = QueryBuilder::for(Product::class)->allowedIncludes(['seller'])
        ->findOrFail($id);

        return new ProductResource($product);
    }

}
