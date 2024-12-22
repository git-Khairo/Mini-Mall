<?php

namespace App\repository;

use App\Models\Category;
use App\repositoryInterface\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class CategoryRepository implements CategoryRepositoryInterface
{
 public function all(){
     return Category::all();
 }

 public function find($id){
     $category = Category::find($id);

    $products=$category->products;

     $shops = $products
        ->pluck('shop')
        ->unique()
        ->values();

     return $shops;
 }
}
