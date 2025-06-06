<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faq>
 */
class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->realText(20),
            'text' => fake()->realText(100),
            'sorting' => fake()->numberBetween(0,10),
            'active' => fake()->boolean(),
            'show_in_catalog' => fake()->boolean(),
        ];
    }
}
