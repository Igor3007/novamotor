<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Электродвигатели АИР',
                'image' => 'assets/images/catalog/i_catalog-air.png',
                'description' => '<p>Электродвигатели АИР&nbsp;— асинхронные электродвигатели с&nbsp;короткозамкнутым ротором. Являются
                                трехфазными электродвигателями общепромышленного назначения. Используются
                                в&nbsp;промышленности, сельском хозяйстве, ЖКХ. Предназначены для комплектации
                                электроприводов насосов, вентиляторов, станков и&nbsp;других механизмов.</p>',
            ],
            [
                'title' => 'Электродвигатели АИC',
                'image' => 'assets/images/catalog/i_catalog-ais.png',
                'description' => '<p>Электродвигатели АИС&nbsp;— трехфазные, асинхронные, с&nbsp;короткозамкнутым ротором,
                                общепромышленные.
                                Электродвигатели могут применяться в&nbsp;различных устройствах, механизмах и&nbsp;машинах
                                благодаря широкой гамме типоразмеров и&nbsp;модификаций, и&nbsp;предназначены для оборудования,
                                соответствующего евростандартам.</p>',
            ],
            [
                'title' => 'Электродвигатели АМН',
                'image' => 'assets/images/catalog/i_catalog-amn.png',
                'description' => '<p>Асинхронный электродвигатель АМН с&nbsp;короткозамкнутым ротором применяется для комплектации
                                горизонтальных насосов типа 1Д, 2Д, секционных насосов ЦНС(Г), компрессоров и&nbsp;другого
                                оборудования. Основным преимуществом перед типом АИР является то, что при одинаковой
                                мощности габаритные размеры АМН меньше.</p>',
            ],
        ];

        foreach ($categories as $i => $category) {

            $image = Storage::drive('public')->putFile('categories', new File(public_path($category['image'])));

            Category::factory()->create([
                'title' => $category['title'],
                'description' => $category['description'],
                'image' => $image,
                'sorting' => $i+1,
                'active' => true,
            ]);
        }
    }
}
