<?php

namespace Database\Seeders;

use App\Models\ProductTile;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ProductTileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productTiles = [
            [
                'title' => 'Оплата',
                'text' => 'Возможность предоставления отсрочки платежа.',
                'icon' => 'assets/images/icons/product/ic_product-a.svg',
            ],
            [
                'title' => 'Доставка',
                'text' => 'Доставка любой транспортной компанией.',
                'icon' => 'assets/images/icons/product/ic_product-b.svg',
            ],
            [
                'title' => 'Гарантия от производителя',
                'text' => 'Используются только материалы высокого качества',
                'icon' => 'assets/images/icons/product/ic_product-c.svg',
            ],
        ];

        foreach($productTiles as $i => $productTile) {
            $icon = Storage::drive('public')->putFile('tiles', new File(public_path($productTile['icon'])));
            ProductTile::factory()->create([
                'title' => $productTile['title'],
                'text' => $productTile['text'],
                'icon' => $icon,
                'sorting' => $i,
                'active' => true
            ]);
        }
    }
}
