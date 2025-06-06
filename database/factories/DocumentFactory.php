<?php

namespace Database\Factories;

use App\Models\DocumentGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group_id' => DocumentGroup::all()->random()->id,
            'title' => fake()->realText(30),
            'text' => fake()->realText(100),
            'file' => '',
            'sorting' => fake()->numberBetween(0,100),
            'active' => fake()->boolean(),
        ];
    }
}
