<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productNames = [
            1 => ['Classic White Shirt', 'Flannel Shirt', 'Denim Shirt', 'Polo Shirt', 'Oxford Shirt'],
            2 => ['Jeans', 'Chinos', 'Khakis', 'Sweatpants', 'Cargo Pants'],
            3 => ['Leather Jacket', 'Denim Jacket', 'Bomber Jacket', 'Blazer', 'Windbreaker'],
            4 => ['Sneakers', 'Boots', 'Loafers', 'Sandals', 'Running Shoes'],
            5 => ['Boxers', 'Briefs', 'Trunks', 'Bikini', 'Thermal Underwear'],
            6 => ['Sunglasses', 'Watch', 'Belt', 'Scarf', 'Hat']
        ];
        // Fetch the categories from the database
        $categories = Category::all();
        $shops = Shop::all();

        // Handle the case where no categories are found
        if ($categories->isEmpty()) {
            throw new \Exception("No categories found. Please ensure categories are seeded first.");
        }
        if ($shops->isEmpty()) {
            throw new \Exception("No categories found. Please ensure categories are seeded first.");
        }

        // Select a random category and corresponding product name
        $category = $categories->random();
        $categoryName = $category->id;
        $productName = $this->faker->randomElement($productNames[$categoryName]);

        $shop = $shops->random();
        $ShopId = $shop->id;
        $productName = $this->faker->randomElement($productNames[$ShopId]);

        return [
            'name' => $productName,
            'Category_id' =>  $categoryName,
            'shop_id' =>  $ShopId,
            'price' => $this->faker->randomFloat(2, 10, 200),
            'amount' => $this->faker->numberBetween(1, 100),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
