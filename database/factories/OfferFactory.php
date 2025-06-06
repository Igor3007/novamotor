<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OfferFactory extends Factory
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
            'product_id' => Product::all()->random()->id,
            'price' => fake()->numberBetween(0,10000),
            'sorting' => fake()->numberBetween(0,10000),
            'active' => fake()->boolean()
        ];
    }
}
