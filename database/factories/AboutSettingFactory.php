<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AboutSetting>
 */
class AboutSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => fake()->image(),
            'title' => fake()->realText(30),
            'text' => fake()->realText(100),
            'phones' => [],
            'btn_text' => fake()->realText(30),
            'btn_url' => fake()->url(),
        ];
    }
}
