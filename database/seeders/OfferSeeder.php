<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::query()->get();
        foreach($products as $product) {
            Offer::factory()->create([
                'title' => 'За исполнение IM1081 (лапы)',
                'price' => '3559',
                'sorting' => 0,
                'active' => true
            ]);

            Offer::factory()->create([
                'title' => 'За исполнение IM2081 (лапы/фланец)',
                'price' => '3559.31',
                'sorting' => 1,
                'active' => true
            ]);
        }
    }
}
