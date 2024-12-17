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
    if (empty($data)) {
        return response()->json(['errors' => $data->errors()], 422);
    }

    // Find the order by ID
    $order = Order::find($id);

    // Update the status of the order
    $order->status = $data['status'];
    $order->save();

    return $order;
   }

   public function orderSort($data){
        $status = $data['orderType'];

        $orders = Order::when($status !== 'all', function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->latest()
            ->get();

        return $orders;
   }

   public function createProduct($data){
        if (empty($data)) {
            return response()->json(['errors' => $data->errors()], 422);
        }

        // Create the product
        $product = Product::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'amount' => $data['amount'],
            'image' => $data['image'],
            'Category_id' => $data['categoryOption'],
            'shop_id' => Auth::user()->shop->id,
        ]);

        return $product;
   }


   public function updateProduct($data, $id){
        $product = Product::find($id);

        // Check if the product exists
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        if (empty($data)) {
            return response()->json(['errors' => $data->errors()], 422);
        }

        // Update the product fields
        $updateData = array_filter([
            'name' => $data['name'] ?? $product->name,
            'price' => $data['price'] ?? $product->price,
            'amount' => $data['amount'] ?? $product->amount,
            'image' => $data['image'] ?? $product->image,
            'Category_id' => $data['categoryOption'] ?? $product->Category_id,
            'shop_id' => Auth::user()->shop->id,
        ], fn($value) => $value !== null);
    
        // Update the product
        $product->update($updateData);

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
    if (empty($data)) {
        return response()->json(['errors' => $data->errors()], 422);
    }

    // Create the product
    $shop = Shop::create([
        'name' => $data['name'],
        'logo' => $data['logo'],
        'address' => $data['address'],
        'phonenumber' => $data['phonenumber'],
        'user_id' => $data['adminOption'],
    ]);

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

    if (!$shop) {
        return response()->json(['message' => 'Product not found'], 404);
    }

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
       $imageName = Storage::disk('public')->put('images', $data['image']);

       $data['image']= $imageName;

       $user=User::create($data);

       $userRole = Role::firstOrCreate(['name' => 'admin']);  // New user role

       $user->assignRole($userRole);

       return $user;
   }

   public function viewUsers(){
       $admin = User::role('admin')->get();

       $users = User::role('user')->get();

       $allUsers = [
        'admins' => $admin,
        'users' => $users
       ];

       return $allUsers;
   }

   public function viewShops(){
       $shops = Shop::latest()->get();

       return $shops;
   }
}
