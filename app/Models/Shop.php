<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
     /** @use HasFactory<\Database\Factories\ProductFactory> */
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
         'phonenumber'
     ];

     public function products(){
        return $this->hasMany(Product::class);
    }
}
