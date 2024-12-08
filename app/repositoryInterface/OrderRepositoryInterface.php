<?php

namespace App\repositoryInterface;

use Illuminate\Support\Facades\Request;

interface OrderRepositoryInterface
{
    public function show($id);//this is the user id
    public function create($data, $id);
    public function showDetails($id);//to show the order details
}
