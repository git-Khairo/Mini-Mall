<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shops')->insert([
            [
                'name' => 'Nike',
                'logo' => 'shops/nike.jpeg',
                'address' => 'Damascus, Shaalan',
                'phonenumber' => '0951-584-193',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Adidas',
                'logo' => 'shops/adidas.jpeg',
                'address' => 'Damascus, Hamra',
                'phonenumber' => '0935-692-420',
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Casucci',
                'logo' => 'shops/casucci.jpeg',
                'address' => 'Damascus, Salheyah',
                'phonenumber' => '0962-938-140',
                'user_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Juri Planet',
                'logo' => 'shops/juri-planet.jpeg',
                'address' => 'Damascus, Maysat',
                'phonenumber' => '0948-201-309',
                'user_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Puma',
                'logo' => 'shops/puma.jpeg',
                'address' => 'Damascus, Malki',
                'phonenumber' => '0963-104-482',
                'user_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sham',
                'logo' => 'shops/sham.jpeg',
                'address' => 'Damascus, Dummar',
                'phonenumber' => '0914-294-591',
                'user_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Stickers World',
                'logo' => 'shops/stickers-world.jpeg',
                'address' => 'Damascus, Maydan',
                'phonenumber' => '0948-912-765',
                'user_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Talis',
                'logo' => 'shops/talis.jpeg',
                'address' => 'Damascus, Mazzeh',
                'phonenumber' => '0937-195-389',
                'user_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'XO',
                'logo' => 'shops/xo.jpeg',
                'address' => 'Damascus, Abo rummaneh',
                'phonenumber' => '0942-739-198',
                'user_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Zara',
                'logo' => 'shops/zara.jpeg',
                'address' => 'Damascus',
                'phonenumber' => '0951-589-394',
                'user_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
