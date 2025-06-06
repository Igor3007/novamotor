<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\DocumentGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $docs = [
            [
                'group' => 'Прайс-листы',
                'items' => [
                    [
                        'title'=>'Прайс-лист на электродвигатели АИР',
                        'text'=>'АИР — привязка мощности и установочных размеров по ГОСТ 31606-2012 (по варианту I)',
                    ],
                    [
                        'title'=>'Прайс-лист на электродвигатели АИC',
                        'text'=>'АИC — привязка мощности и установочных размеров по стандарту МЭК60072-1:1991 (ГОСТ31606-2012, по варианту II)',
                    ],
                    [
                        'title'=>'Прайс-лист на электродвигатели АМН',
                        'text'=>'АМН — применяется для комплектации насосов, компрессоров и другого оборудования',
                    ],
                ],
            ],
            [
                'group' => 'Каталоги',
                'items' => [
                    [
                        'title'=>'Каталог электродвигателей АИР',
                        'text'=>'АИР — привязка мощности и установочных размеров по ГОСТ 31606-2012 (по варианту I)',
                    ],
                    [
                        'title'=>' Каталог электродвигателей АИC',
                        'text'=>'АИC — привязка мощности и установочных размеров по стандарту МЭК60072-1:1991 (ГОСТ31606-2012, по варианту II)',
                    ],
                    [
                        'title'=>'Каталог электродвигателей АМН',
                        'text'=>'АМН — применяется для комплектации насосов, компрессоров и другого оборудования',
                    ],
                ],
            ],
            [
                'group' => 'Техническая информация',
                'items' => [
                    [
                        'title'=>'Расшифровка условных обозначений',
                        'text'=>'',
                    ],
                    [
                        'title'=>'Схемы монтажа трехфазных электродвигателей',
                        'text'=>'',
                    ],
                    [
                        'title'=>'ГОСТы по электродвигателям',
                        'text'=>'',
                    ],
                ],
            ],
            [
                'group' => 'Формы для заполнения',
                'items' => [
                    [
                        'title'=>'Письмо на отгрузку транспортной компанией',
                        'text'=>'',
                    ],
                    [
                        'title'=>'Акт рекламации',
                        'text'=>'',
                    ],
                ],
            ],


        ];

        foreach ($docs as $doc) {
            $group = DocumentGroup::query()->where('title','=',$doc['group'])->first();
            foreach($doc['items'] as $i => $item) {
                Document::factory()->create([
                    'group_id' => $group->id,
                    'title' => $item['title'],
                    'text' => $item['text'],
                    'sorting' => $i,
                    'active' => true,
                ]);
            }
        }
    }
}
