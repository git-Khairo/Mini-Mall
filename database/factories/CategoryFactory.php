<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Fruits', 'Vegetables', 'Grains', 'Dairy', 'Meat', 'Seafood', 'Beverages',
            'Tops', 'Bottoms', 'Dresses', 'Outerwear', 'Footwear', 'Accessories',
            'Computers', 'Smartphones', 'Gaming', 'Cameras', 'Audio Devices',
            'Team Sports', 'Individual Sports', 'Outdoor Activities',
            'Preschool', 'Elementary', 'High School', 'College',
            'Math', 'Science', 'History', 'Literature', 'Special Education',
            'Adventure Travel', 'Luxury Travel', 'Ecotourism',
            'Fiction', 'Non-fiction', 'Mystery', 'Fantasy',
            'Painting', 'Sculpture', 'Photography',
            'Creative Hobbies', 'Physical Hobbies', 'Collecting Hobbies'
        ];

        return [
            'type' => $this->faker->unique()->randomElement($categories),
        ];
    }
}
