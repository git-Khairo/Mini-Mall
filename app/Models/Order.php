<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     /** @use HasFactory<\Database\Factories\ProductFactory> */
     use HasFactory;

     /**
      * The attributes that are mass assignable.
      *
      * @var array<int, string>
      */
     protected $fillable = [
         'products',
         'user_id',
         'total'
     ];

     public function user(){
        return $this->belongsTo(User::class);
     }
}
