<?php

namespace App\repository;

use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class ProductRepository implements ProductRepositoryInterface
{
    public function all(){
        return Product::all();
    }

    public function find($id){

        $product=Product::find($id);

        return $product;
    }
}
