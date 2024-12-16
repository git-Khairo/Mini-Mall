<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.login');
Route::post('/login', [AdminController::class, 'login'])->name('adminLogin');



Route::middleware('auth')->group(function(){

    Route::post('/Shops/store',[ShopController::class, 'store']);
    Route::put('/Shops/update/{id}',[ShopController::class, 'update']);
    Route::delete('/Shops/delete/{id}',[ShopController::class, 'destroy']);


    Route::delete('/Order/delete/{id}',[OrderController::class, 'destroy']);
});
// use the new route i made down
Route::middleware(RoleMiddleware::class.':admin')->group(function(){

 Route::get('/Orders', [AdminController::class, 'viewOrders'])->name('viewOrders');

});

Route::middleware([RoleMiddleware::class.':super admin'])->group(function(){



});

