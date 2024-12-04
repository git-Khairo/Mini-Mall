<?php

namespace App\repository;

use App\Models\Product;

interface ProductRepositoryInterface
{

 public function all();
 public function find($id);


}
