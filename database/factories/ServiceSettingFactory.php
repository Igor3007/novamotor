<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceSetting>
 */
class ServiceSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_partner' => fake()->realText(30),
            'service_address' => fake()->realText(30),
            'image' => fake()->image(),
            'text1' => fake()->realText(100),
            'text2' => fake()->realText(100),
        ];
    }
}
