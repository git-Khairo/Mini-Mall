<?php

namespace App\repositoryInterface;

use Illuminate\Support\Facades\Request;

interface ShopRepositoryInterface
{
    public function all();//to show all shops
    public function show($id);//to show a specific shop
}
