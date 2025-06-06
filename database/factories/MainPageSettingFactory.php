<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MainPageSetting>
 */
class MainPageSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'form_title' => fake()->realText(30),
            'form_text' => fake()->realText(30),
            'about_image' => fake()->image(),
            'about_text' => fake()->realText(30),
            'about_btn_title' => fake()->realText(30),
            'about_btn_url' => fake()->realText(30),
            'h1' => fake()->realText(30),
        ];
    }
}
