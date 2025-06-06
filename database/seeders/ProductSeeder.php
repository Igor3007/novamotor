<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'title' => 'АИР56А2',
                'category' => 'Электродвигатели АИР',
                'description' => '<h4>Трехфазный асинхронный электродвигатель АИР56 А2 общепромышленного исполнения:
                                </h4>
                                <ul>
                                    <li>Варианты монтажного исполнения: IM1081 (лапы), IM2081 (лапы/фланец)</li>
                                    <li>Климатическое исполнение: У1</li>
                                    <li>Подключение питания: 220/380В (Δ/Υ)</li>
                                    <li>Степень защиты: IP55</li>
                                    <li>Класс нагревостойкости: F</li>
                                    <li>Режим работы: S1 (продолжительный)</li>
                                </ul>'
            ],
            [
                'title' => 'АИС56А2',
                'category' => 'Электродвигатели АИC',
                'description' => '<h4>Трехфазный асинхронный электродвигатель АИР56 А2 общепромышленного исполнения:
                                </h4>
                                <ul>
                                    <li>Варианты монтажного исполнения: IM1081 (лапы), IM2081 (лапы/фланец)</li>
                                    <li>Климатическое исполнение: У1</li>
                                    <li>Подключение питания: 220/380В (Δ/Υ)</li>
                                    <li>Степень защиты: IP55</li>
                                    <li>Класс нагревостойкости: F</li>
                                    <li>Режим работы: S1 (продолжительный)</li>
                                </ul>'
            ],
            [
                'title' => 'АМН56А2',
                'category' => 'Электродвигатели АМН',
                'description' => '<h4>Трехфазный асинхронный электродвигатель АИР56 А2 общепромышленного исполнения:
                                </h4>
                                <ul>
                                    <li>Варианты монтажного исполнения: IM1081 (лапы), IM2081 (лапы/фланец)</li>
                                    <li>Климатическое исполнение: У1</li>
                                    <li>Подключение питания: 220/380В (Δ/Υ)</li>
                                    <li>Степень защиты: IP55</li>
                                    <li>Класс нагревостойкости: F</li>
                                    <li>Режим работы: S1 (продолжительный)</li>
                                </ul>'
            ],
        ];

        foreach($products as $product) {
            for ($i = 0; $i < 30; $i++) {
                $category = Category::query()->where('title', '=',$product['category'])->select('id')->first();

                if(!$category) continue;

                $productModel = Product::factory()->create([
                    'title' => $product['title'],
                    'slug' => Str::slug($product['title'].' '.$i),
                    'description' => $product['description'],
                    'category_id' => $category->id,
                    'sorting' => $i+1,
                    'active' => true,
                ]);

                $image = Storage::drive('public')->putFile('products', new File(public_path('assets/images/catalog/i_catalog-air.png')));
                $productModel->addMediaFromDisk($image,'public')->toMediaCollection();

                $image = Storage::drive('public')->putFile('products', new File(public_path('assets/images/catalog/i_catalog-air-2.png')));
                $productModel->addMediaFromDisk($image,'public')->toMediaCollection();
            }
        }
    }
}
