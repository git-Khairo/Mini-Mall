<?php

namespace App\repository;

use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class CategoryRepository implements CategoryRepositoryInterface
{
 public function all(){
     return Category::all();
 }

 public function find($id){
     $category = Category::find($id);

     $products=$category->products;

     $response=[
         'category'=>$category,
         'products'=>$products
     ];

     return $response;
 }
}
