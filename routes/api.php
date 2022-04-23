<?php

use Illuminate\Http\Request;
use Buyer\BuyerController;
use Category\CategoryController;
use Seller\SellerController;
use Product\ProductController;
use Transaction\TransactionController;

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

Route::resource('buyers', BuyerController::class)->only(['index', 'show']);

Route::resource('categories', CategoryController::class)->except(['create','edit']);

Route::resource('products',ProductController::class)->only(['index', 'show']);

Route::resource('sellers', SellerController::class)->only(['index', 'show']);

Route::resource('transactions', TransactionController::class)->only(['index', 'show']);

Route::resource('users', 'User\UserController')->except(['create', 'edit']);
