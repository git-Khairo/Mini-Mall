<?php

namespace App\repository;

use App\Models\Order;
use App\Models\Product;
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
        foreach ($orders as &$order) {
            // Decode the products JSON
            $products = json_decode($order['products'], true);
        
            // Collect product details
            foreach ($products as &$product) {
                // Fetch product details from the database
                $productDetails = Product::find($product['id']);
                if ($productDetails) {
                    // Append product details to the product array
                    $product['details'] = [
                        'name' => $productDetails->name,
                        'price' => $productDetails->price,
                        'image' => $productDetails->image,
                    ];
                }
            }
        
            // Encode the products back to JSON (if required)
            $order['products'] = $products;
        }

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

        $products = json_decode($order['products'], true);
        
            // Collect product details
            foreach ($products as &$product) {
                // Fetch product details from the database
                $productDetails = Product::find($product['id']);
                if ($productDetails) {
                    // Append product details to the product array
                    $product['details'] = [
                        'name' => $productDetails->name,
                        'price' => $productDetails->price,
                        'image' => $productDetails->image,
                    ];
                }
            }
        
            // Encode the products back to JSON (if required)
            $order['products'] = $products;

        // Return the order details
        return $order;
    }

    public function delete($id){
        $order = Order::find($id);

       // Check if the order exists
       if (!$order) {
           return response()->json(['message' => 'Order not found'], 404);
       }

       // Delete the order
       $order->delete();

        return $order;
    }
}
