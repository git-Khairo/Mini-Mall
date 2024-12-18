<?php

namespace App\repository;

use App\Models\Order;
use App\Models\User;
use App\repositoryInterface\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{

    public function show($id){
        // Find the user by ID
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Fetch the user's orders
        $orders = $user->orders;

        return $orders;
    }

    public function create($data, $id){

        if (empty($data)) {
            return response()->json(['errors' => $data->errors()], 422);
        }

        

        $orders = Order::create([
            'user_id' => $id,
            'shop_id' => $data['shop_id'],
            'products' => json_encode($data['products']),
            'status' => $data['status'],
            'total' => $data['total'],
        ]);

        return $orders;
    }

    public function showDetails($id){
        // Find the order by ID
        $order = Order::find($id);

        // Check if the order exists
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Return the order details
        return $order;
    }
}
