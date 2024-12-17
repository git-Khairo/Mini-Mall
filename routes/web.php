<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SuperUserController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.login');
Route::post('/login', [AdminController::class, 'login'])->name('adminLogin');



Route::middleware('auth')->group(function(){

    Route::post('/Shops/store',[ShopController::class, 'store']);
    Route::put('/Shops/update/{id}',[ShopController::class, 'update']);
    Route::delete('/Shops/delete/{id}',[ShopController::class, 'destroy']);
    
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
});
// use the new route i made down
Route::middleware(RoleMiddleware::class.':admin')->group(function(){
    
    Route::get('/Orders', [AdminController::class, 'viewOrders'])->name('viewOrders');
    Route::get('/products', [AdminController::class, 'viewProducts'])->name('viewProducts');
    Route::delete('/products/delete/{id}', [AdminController::class, 'destroyProduct'])->name('destroyProduct');
    Route::get('/product/update/{product}', [AdminController::class, 'editProduct'])->name('updateProductPage');
    Route::put('/product/update/{id}', [AdminController::class, 'updateProduct'])->name('updateProduct');
    Route::get('/product/store', [AdminController::class, 'addProduct'])->name('addProductPage');
    Route::post('/product/store', [AdminController::class, 'createProduct'])->name('addProduct');
    Route::post('/Order/{id}', [AdminController::class, 'orderConfirmation'])->name('orderConfirmation');
    Route::delete('/Order/delete/{id}',[AdminController::class, 'deleteOrder'])->name('orderDelete');
    Route::post('/Orders', [AdminController::class, 'orderSort'])->name('orderSort');

});

Route::middleware([RoleMiddleware::class.':super admin'])->group(function(){
    Route::get('/users', [SuperUserController::class, 'viewUsers'])->name('viewUsers');
    Route::view('/Admin/Create', 'pages.addAdmin')->name('addAdminPage');
    Route::post('/Admin/Create', [SuperUserController::class, 'Admin'])->name('addAdmin');
    Route::delete('/Admin/Delete/{id}', [SuperUserController::class, 'deleteAdmin'])->name('deleteAdmin');


    Route::get('/shops', [SuperUserController::class, 'viewShops'])->name('viewShops');
    Route::get('/shops/Create', [SuperUserController::class, 'addShop'])->name('addShopPage');
    Route::post('/shops/Create', [SuperUserController::class, 'createShop'])->name('addShop');
    Route::delete('/shops/delete/{id}', [SuperUserController::class, 'destroyShop'])->name('deleteShop');
});

