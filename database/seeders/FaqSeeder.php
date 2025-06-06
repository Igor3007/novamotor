<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Faq;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'title' => 'В чём разница между типами двигателей АИР, АИС, АМН',
                'text' => '<p>Пример текста ответа.</p>
                <ul>
                    <li> АИР — привязка мощности и&nbsp;установочных размеров по&nbsp;ГОСТ 31606-2012 (по&nbsp;варианту I);
                    </li>
                    <li>АИC — привязка мощности и&nbsp;установочных размеров по&nbsp;стандарту МЭК60072-1:1991 (ГОСТ31606-2012,
                        по&nbsp;варианту II);
                    </li>
                    <li>АМН — применяется для комплектации насосов, компрессоров и&nbsp;другого оборудования.</li>
                </ul>'
            ],
            [
                'title' => 'Как правильно выбрать электродвигатель',
                'text' => '<p>Пример текста ответа.</p>'
            ],
            [
                'title' => 'Какие услуги мы оказываем',
                'text' => '<p>Пример текста ответа.</p>'
            ],
            [
                'title' => 'Условия доставки и оплаты',
                'text' => '<p>Пример текста ответа.</p>'
            ],
        ];

        $categoryIds = Category::query()->pluck('id')->all();
        $productIds = Product::query()->pluck('id')->all();

        foreach ($faqs as $i => $faq) {
            $faq = Faq::factory()->create([
                'title' => $faq['title'],
                'text' => $faq['text'],
                'sorting' => $i,
                'active' => true,
                'show_in_catalog' => true,
            ]);

            $faq->categories()->sync($categoryIds);
            $faq->products()->sync($productIds);
        }
    }
}
