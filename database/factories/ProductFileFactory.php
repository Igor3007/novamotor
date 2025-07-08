<?php

namespace Database\Factories;

use App\Models\ProductFile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductFile>
 */
class ProductFileFactory extends Factory
{
    protected $model = ProductFile::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'path' => 'product_files/' . $this->faker->uuid . '.pdf',
        ];
    }
}
