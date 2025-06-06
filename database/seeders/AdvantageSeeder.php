<?php

namespace Database\Seeders;

use App\Models\Advantage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class AdvantageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $advantages = [
            [
                'title' => 'Высокое качество',
                'description' => 'При производстве используются только материалы высокого качества.',
                'image' => '/assets/images/icons/advantages/ic_adv-a.svg'
            ],
            [
                'title' => 'Выгодные цены',
                'description' => 'Поддержание минимальных цен на рынке электродвигателей.',
                'image' => '/assets/images/icons/advantages/ic_adv-b.svg'
            ],
            [
                'title' => 'Наличие',
                'description' => 'Наличие складских остатков на складе в Краснодаре и Москве.',
                'image' => '/assets/images/icons/advantages/ic_adv-c.svg'
            ],
            [
                'title' => 'Гарантия от производителя',
                'description' => 'Придерживаемся принципов порядочности и доверительности',
                'image' => '/assets/images/icons/advantages/ic_adv-d.svg'
            ],
            [
                'title' => 'Удобные условия доставки',
                'description' => 'Доставка любой транспортной компанией - Деловые линии, Кашалот, ПЭК и другие (доставка до терминала - бесплатно)',
                'image' => '/assets/images/icons/advantages/ic_adv-e.svg'
            ],
            [
                'title' => 'Сервис',
                'description' => 'Наличие сервисного центра',
                'image' => '/assets/images/icons/advantages/ic_adv-f.svg'
            ],
            [
                'title' => 'Отсрочка',
                'description' => 'Возможность предоставления отсрочки платежа',
                'image' => '/assets/images/icons/advantages/ic_adv-g.svg'
            ],
        ];

        foreach($advantages as $i => $advantage) {
            $image = Storage::drive('public')->putFile('advantages', new File(public_path($advantage['image'])));

            Advantage::factory()->create([
                'title' => $advantage['title'],
                'description' => $advantage['description'],
                'image' => $image,
                'sorting' => $i+1,
                'active' => true,
            ]);
        }
    }
}
