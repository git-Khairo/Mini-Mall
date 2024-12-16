<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends Model
{
    /** @use HasFactory<\Database\Factories\ShopFactory> */
    use HasFactory;
     /**
      * The attributes that are mass assignable.
      *
      * @var array<int, string>
      */
     protected $fillable = [
         'name',
         'logo',
         'address',
         'phonenumber',
     ];

     public function products(){
        return $this->hasMany(Product::class);
     }

     public function user(){
         return $this->belongsTo(User::class);
     }

     public function orders(){
         return $this->hasMany(Order::class);
     }
}
