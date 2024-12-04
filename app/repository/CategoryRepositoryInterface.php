<?php

namespace App\repository;

interface CategoryRepositoryInterface
{
   public function all();

   public function find($id);

}
