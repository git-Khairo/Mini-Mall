<?php

namespace App\repositoryInterface;

interface AdminRepositoryInterface
{
    public function viewAllOrders();
    public function deleteOrder($id);
    public function orderConfirmation($data, $id);
    public function createProduct($data);
    public function updateProduct($data, $id);
    public function deleteProduct($id);
    public function createShop($data);
    public function updateShop($data,$id);
    public function deleteShop($id);
}
