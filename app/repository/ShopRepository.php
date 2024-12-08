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

        return $shop;
    }

    public function create($data){
        if ($data->fails()) {
            return response()->json(['errors' => $data->errors()], 422);
        }

        // Create the product
        $shop = Shop::create($data->validated());

        return $shop;
    }

    public function update($data,$id){
        $shop = Product::find($id);

        // Check if the product exists
        if (!$shop) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        if ($data->fails()) {
            return response()->json(['errors' => $data->errors()], 422);
        }

        // Update the product fields
        $shop->update($data->validated());

        return $shop;
    }

    public function delete($id){
        $product = Product::find($id);

        // Check if the product exists
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    
        // Delete the product
        $product->delete();
    
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}
