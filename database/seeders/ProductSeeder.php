<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Gift Box',
                'price' => 9.99,
                'image' => 'box.jpeg',
                'amount' => 50,
                'Category_id' => 2,
                'shop_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Butterfly Bracelet',
                'price' => 19.99,
                'image' => 'bracelet.jpeg',
                'amount' => 50,
                'Category_id' => 2,
                'shop_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Happy Gloves',
                'price' => 9.99,
                'image' => 'gloves.png',
                'amount' => 50,
                'Category_id' => 2,
                'shop_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Weeknd Hoodie',
                'price' => 29.99,
                'image' => 'hoodie.jpeg',
                'amount' => 50,
                'Category_id' => 1,
                'shop_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Black Hoodie',
                'price' => 29.99,
                'image' => 'hoodie2.jpeg',
                'amount' => 50,
                'Category_id' => 1,
                'shop_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Zara Pijama',
                'price' => 29.99,
                'image' => 'pijama.jpeg',
                'amount' => 50,
                'Category_id' => 1,
                'shop_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ship',
                'price' => 19.99,
                'image' => 'ship.jpeg',
                'amount' => 50,
                'Category_id' => 2,
                'shop_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Shirt',
                'price' => 29.99,
                'image' => 'shirt.png',
                'amount' => 50,
                'Category_id' => 1,
                'shop_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smith Shoes',
                'price' => 29.99,
                'image' => 'shoes.jpeg',
                'amount' => 50,
                'Category_id' => 3,
                'shop_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gray Pumas',
                'price' => 29.99,
                'image' => 'shoes2.jpeg',
                'amount' => 50,
                'Category_id' => 3,
                'shop_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Red Pumas',
                'price' => 29.99,
                'image' => 'shoes3.jpeg',
                'amount' => 50,
                'Category_id' => 3,
                'shop_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gray Nike',
                'price' => 29.99,
                'image' => 'shoes4.jpeg',
                'amount' => 50,
                'Category_id' => 3,
                'shop_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Black Adidas',
                'price' => 29.99,
                'image' => 'shoes5.jpeg',
                'amount' => 50,
                'Category_id' => 3,
                'shop_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Casual Pumas',
                'price' => 29.99,
                'image' => 'shoes6.png',
                'amount' => 50,
                'Category_id' => 3,
                'shop_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Blue Adidas',
                'price' => 29.99,
                'image' => 'shoes7.jpeg',
                'amount' => 50,
                'Category_id' => 3,
                'shop_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jordan Nike',
                'price' => 29.99,
                'image' => 'shoes8.jpeg',
                'amount' => 50,
                'Category_id' => 3,
                'shop_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Green Nike',
                'price' => 29.99,
                'image' => 'shoes9.jpeg',
                'amount' => 50,
                'Category_id' => 3,
                'shop_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Flannel Skirt',
                'price' => 39.99,
                'image' => 'skirt.jpeg',
                'amount' => 50,
                'Category_id' => 1,
                'shop_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Stand Souvinre',
                'price' => 4.99,
                'image' => 'stand.jpeg',
                'amount' => 50,
                'Category_id' => 2,
                'shop_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Stickers collection #1',
                'price' => 9.99,
                'image' => 'stickers.jpeg',
                'amount' => 50,
                'Category_id' => 2,
                'shop_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Stickers collection #2',
                'price' => 9.99,
                'image' => 'stickers2.jpeg',
                'amount' => 50,
                'Category_id' => 2,
                'shop_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Stickers collection #3',
                'price' => 9.99,
                'image' => 'stickers3.jpeg',
                'amount' => 50,
                'Category_id' => 2,
                'shop_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Watch',
                'price' => 19.99,
                'image' => 'watch.jpeg',
                'amount' => 50,
                'Category_id' => 2,
                'shop_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Casual Shirt',
                'price' => 19.99,
                'image' => 'tshirt.jpeg',
                'amount' => 50,
                'Category_id' => 1,
                'shop_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gray T-Shirt',
                'price' => 19.99,
                'image' => 'tshirt2.jpeg',
                'amount' => 50,
                'Category_id' => 1,
                'shop_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pants',
                'price' => 29.99,
                'image' => 'pants.jpeg',
                'amount' => 50,
                'Category_id' => 1,
                'shop_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Leather Jacket',
                'price' => 39.99,
                'image' => 'jacket.png',
                'amount' => 50,
                'Category_id' => 1,
                'shop_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sweater',
                'price' => 29.99,
                'image' => 'sweater.jpeg',
                'amount' => 50,
                'Category_id' => 1,
                'shop_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Puff Jacket',
                'price' => 29.99,
                'image' => 'jacket2.jpeg',
                'amount' => 50,
                'Category_id' => 1,
                'shop_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Casual Jacket',
                'price' => 29.99,
                'image' => 'jacket4.jpeg',
                'amount' => 50,
                'Category_id' => 1,
                'shop_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Baseball Jacket',
                'price' => 29.99,
                'image' => 'jacket5.jpeg',
                'amount' => 50,
                'Category_id' => 1,
                'shop_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
