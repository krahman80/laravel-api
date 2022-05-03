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
// Protected api

Route::group(['middleware' => 'auth:sanctum'], function() {
    
    Route::post('logout', 'Auth\AuthController@logout')->name('logout');

    Route::apiResource('users', 'User\UserController');
});

// Public api

Route::post('login', 'Auth\AuthController@login')->name('login');

Route::post('register', 'Auth\AuthController@register')->name('register');

Route::apiResource('buyers', 'Buyer\BuyerController')->only(['index', 'show']);

// Route::get('buyers/{id}/transaction', 'Buyer\BuyerTransactionController@index')->name('buyer.transactions.index');

Route::apiResource('categories', 'Category\CategoryController');

Route::apiResource('products','Product\ProductController')->only(['index', 'show']);

Route::apiResource('sellers', 'Seller\SellerController')->only(['index', 'show']);

Route::apiResource('transactions', 'Transaction\TransactionController')->only(['index', 'show']);


