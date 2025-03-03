<?php

namespace App\repository;

use App\Models\Product;
use App\Models\Shop;
use App\repositoryInterface\ProductRepositoryInterface;
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

    public function search($data)
    {
        $product=Product::where('name','like','%'.$data['name'].'%')->get();
        $shops=Shop::where('name','like','%'.$data['name'].'%')->get();

        foreach($shops as $sh)
            $sh->products;

        $response=[
            'product'=>$product,
            'shop'=>$shops,
        ];

        return $response;
    }
}
