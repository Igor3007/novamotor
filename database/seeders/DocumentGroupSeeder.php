<?php

namespace Database\Seeders;

use App\Models\DocumentGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            'Прайс-листы',
            'Каталоги',
            'Техническая информация',
            'Формы для заполнения',
        ];

        foreach ($groups as $i => $group) {
            DocumentGroup::factory()->create([
                'title' => $group,
                'sorting' => $i,
                'active' => true,
            ]);
        }
    }
}
