<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banner = [
            'title' => 'Мы производим промышленные электродвигатели АИР, АИС и АМН',
            'text' => 'Наша компания занимает лидирующие место по объемам продаж
            Промышленного насосного оборудования, в Южном федеральном округе,
            первое место в Краснодарском крае, в г. Краснодаре.',
            'btn_title' => 'Выбрать двигатели',
            'url' => '#',
            'image' => 'assets/images/catalog/i_catalog-slider.png'
        ];

        for($i = 0; $i < 2; $i++) {
            $image = Storage::drive('public')->putFile('banners', new File(public_path($banner['image'])));
            Banner::factory()->create([
                'title' => $banner['title'],
                'text' => $banner['text'],
                'btn_title' => $banner['btn_title'],
                'url' => $banner['url'],
                'image' => $image,
                'sorting' => $i+1,
                'active' => true,
            ]);
        }
    }
}
