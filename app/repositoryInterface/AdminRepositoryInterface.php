<?php

namespace App\repositoryInterface;

interface AdminRepositoryInterface
{
    public function viewOrders();
    public function deleteOrder($id);
    public function orderConfirmation($data, $id);
    public function createProduct($data);
    public function updateProduct($data, $id);
    public function deleteProduct($id);
    public function createShop($data);
    public function updateShop($data,$id);
    public function deleteShop($id);
    public function viewProducts();
    public function Register($data);
    public function viewShops();
    public function viewUsers();
}
