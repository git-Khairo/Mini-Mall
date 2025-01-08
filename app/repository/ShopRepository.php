<?php

namespace App\repository;

use App\Models\Product;
use App\Models\Shop;
use App\repositoryInterface\ShopRepositoryInterface;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class ShopRepository implements ShopRepositoryInterface
{

    public function all(){
        return Shop::all();
    }

    public function show($id){
        $shop=Shop::find($id);


        $shop->products;

        return $shop;
    }
}
