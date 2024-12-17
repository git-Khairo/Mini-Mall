<?php

namespace App\repository;

use App\Models\Favorite;
use App\Models\User;
use App\repositoryInterface\FavoriteRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class FavoriteRepository implements FavoriteRepositoryInterface
{

    public function show($id)
    {
        // Find the user by ID
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $favorites = $user->favorite()->with('product')->get();

        $updatedFavorites = $favorites->map(function ($favorite) {
            $favoriteData = $favorite->toArray(); 
            unset($favoriteData['product_id']); 
            return $favoriteData;
        });

        return $updatedFavorites;
    }

    public function store($data, $id)
    {
        if (empty($data)) {
            return response()->json(['errors' => $data->errors()], 422);
        }

        $productId = $data['productId'];

        $favorite = Favorite::create([
            'product_id' => $productId, 
            'user_id' => $id,  
        ]);

        return $favorite;
    }

    public function delete($userId, $productId)
    {
         // Find the favorite by ID
         $favorite = Favorite::where('user_id', $userId)
         ->where('product_id', $productId)
         ->first();

         // Check if the favorite exists
         if (!$favorite) {
             return response()->json(['message' => 'Order not found'], 404);
         }
 
         $favorite->delete();
 
         return $favorite;
    }
}
