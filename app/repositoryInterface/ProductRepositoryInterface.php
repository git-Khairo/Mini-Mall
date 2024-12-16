<?php

namespace App\repositoryInterface;

use App\Models\Product;

interface ProductRepositoryInterface
{

 public function all();
 public function find($id);
 public function search($name);
}
