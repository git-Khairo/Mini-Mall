<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
     protected static $userCounter = 2;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $shops = ['Thread & Trend', 'Fabric Factory', 'Stitch Haven', 'StyleWeave Co.', 'CoutureCraft', 'Velvet Vogue', 'Loom & Lace', 'Urban Stitchery', 'Chic Threads', 'Modish Mill', 'Tailor\'s Touch', 'Seam & Seamless', 'Textile Twist', 'Woven Wonders', 'Fashion Foundry'];


        return [
            'name' => $this->faker->unique()->randomElement($shops),
            'logo' => $this->faker->imageUrl(),
            'address' => $this->faker->sentence(),
            'phonenumber' => $this->faker->phoneNumber(),
            'user_id' => self::$userCounter++
        ];
    }
}
