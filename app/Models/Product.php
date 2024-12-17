<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
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
        'price',
        'image',
        'amount',
        'Category_id',
        'shop_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    public function favorite(){
        return $this->hasMany(Favorite::class);
    }

}
