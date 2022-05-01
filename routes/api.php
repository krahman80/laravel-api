<?php


use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::apiResource('users', 'User\UserController');

Route::apiResource('buyers', 'Buyer\BuyerController')->only(['index', 'show']);

// Route::get('buyers/{id}/transaction', 'Buyer\BuyerTransactionController@index')->name('buyer.transactions.index');

Route::apiResource('categories', 'Category\CategoryController');

Route::apiResource('products','Product\ProductController')->only(['index', 'show']);

Route::apiResource('sellers', 'Seller\SellerController')->only(['index', 'show']);

Route::apiResource('transactions', 'Transaction\TransactionController')->only(['index', 'show']);


