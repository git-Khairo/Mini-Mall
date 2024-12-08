<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    return $request->user();
});

// public Route
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/categories',[CategoryController::class,'index']);
Route::get('/categories/{id}',[CategoryController::class,'show']);
Route::get('/products',[ProductController::class,'index']);
Route::get('/products/{id}',[ProductController::class,'show']);
Route::get('/Shops',[ShopController::class, 'all']);
Route::get('/Shops/{id}',[ShopController::class, 'show']);
Route::get('/Orders',[OrderController::class, 'all']);

//pro Rote
Route::group(['middleware'=>['auth:sanctum']], function (){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/favorite',[FavoriteController::class, 'show']);
    Route::post('/favorite/store',[FavoriteController::class, 'store']);
    Route::delete('/favorite/delete/{id}',[FavoriteController::class, 'destroy']);
    Route::post('/Orders/store',[OrderController::class, 'store']);
    Route::get('/MyOrders',[OrderController::class, 'show']);
    Route::get('/MyOrders/{id}',[OrderController::class, 'showDetails']);
});
