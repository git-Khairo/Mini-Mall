<?php

namespace App\repositoryInterface;


interface OrderRepositoryInterface
{
    public function show($id);//this is the user id
    public function create($data, $id);
    public function showDetails($id);//to show the order details
    public function delete($id);
}
