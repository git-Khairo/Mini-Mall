<?php

namespace App\repository;

use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use App\repositoryInterface\AdminRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class AdminRepository implements AdminRepositoryInterface
{
    public function viewOrders(){
        $user=Auth::user();

        $shop=$user->shop;

        return $shop->orders;
    }

    public function deleteOrder($id){
        // Find the order by ID
       $order = Order::find($id);

       // Check if the order exists
       if (!$order) {
           return response()->json(['message' => 'Order not found'], 404);
       }

       // Delete the order
       $order->delete();

       return $order;
   }

   public function orderConfirmation($data, $id){
    if ($data->fails()) {
        return response()->json(['errors' => $data->errors()], 422);
    }

    // Find the order by ID
    $order = Order::find($id);

    // Update the status of the order
    $order->status = $data['status'];
    $order->save();

    return $order;
   }

   public function createProduct($data){
        if ($data->fails()) {
            return response()->json(['errors' => $data->errors()], 422);
        }

        // Create the product
        $product = Product::create($data);

        return $product;
   }


   public function updateProduct($data, $id){
        $product = Product::find($id);

        // Check if the product exists
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        if ($data->fails()) {
            return response()->json(['errors' => $data->errors()], 422);
        }

        // Update the product fields
        $product->update($data);

        return $product;
   }


   public function deleteProduct($id){
        $product = Product::find($id);

        // Check if the product exists
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Delete the product
        $product->delete();

        return 'Product deleted successfully';
    }

   public function createShop($data){
    if ($data->fails()) {
        return response()->json(['errors' => $data->errors()], 422);
    }

    // Create the product
    $shop = Shop::create($data);

    return $shop;
   }


   public function updateShop($data,$id){
        $shop = Shop::find($id);

        // Check if the product exists
        if (!$shop) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        if ($data->fails()) {
            return response()->json(['errors' => $data->errors()], 422);
        }

        // Update the product fields
        $shop->update($data);

        return $shop;
   }


   public function deleteShop($id){
    $shop = Shop::find($id);

    // Check if the product exists
    if (!$shop) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    // Delete the product
    $shop->delete();

    return 'Shop deleted successfully';
   }

   public function viewProducts(){
       $user=Auth::user();

       $shop=$user->shop;

       $products =$shop->products;

       return $products;
   }

   public function Register($data){
       $imageName = Storage::disk('public')->put('images', $data->image);

       $data['image']= $imageName;

       $user=User::create($data);

       $userRole = Role::firstOrCreate(['name' => 'admin']);  // New user role

       $user->assignRole($userRole);

       return $user;

   }

   public function viewUsers(){
       $users = User::all();

       return $users;
   }

   public function viewShops(){
       $user=Auth::user();

       $shop=$user->shop;

       return $shop;
   }
}
