<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Restaurant;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'restaurant_id' => Restaurant::inRandomOrder()->first()->id,
            'name' => fake()->word,
            'description' => fake()->paragraph,
            'total_price' => fake()->randomFloat(2, 5, 200),
            'picture' => fake()->imageUrl(640, 480, 'food'),
        ];
    }
}
