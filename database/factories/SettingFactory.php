<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'logo' => fake()->image(),
            'slogan_image' => fake()->image(),
            'slogan_text' => fake()->realText(30),
            'email' => fake()->email(),
            'phones' => [],
            'address' => fake()->realText(30),
            'copyright_text' => fake()->realText(30),
            'metric_head' => null,
            'metric_body' => null,
            'metric_footer' => null,
            'footer_text' => fake()->realText(30),
            'adv_text' => fake()->realText(30),
            'catalog_h1' => fake()->realText(30),
            'footer_text_left' => fake()->realText(30),
            'catalog_quantity_word' => fake()->numberBetween(5,10),
            'worktime' => fake()->realText(30),
            'map' => fake()->url(),
            'coordinates' => fake()->latitude().','.fake()->longitude(),
        ];
    }
}
