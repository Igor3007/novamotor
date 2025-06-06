<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
        return [
            'title' => fake()->realText(30),
            'slug' => Str::slug(fake()->realText(30)),
            'category_id' => Category::all()->random()->id,
            'description' => fake()->realText(500),
            'sizes' => fake()->realText(500),
            'documentation' => fake()->realText(500),
            'full_title' => fake()->realText(30),
            'full_description' => fake()->realText(500),
            'quantity' => fake()->numberBetween(0,10),
        ];
    }
}
