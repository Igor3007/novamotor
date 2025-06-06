<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specializations = [
            [
                'title' => 'Специализация',
                'text' => '<p>ООО «Гидромаш-Краснодар» <b>специализируется</b> на&nbsp;поставке оборудования для:
                        водного хозяйства,
                        ЖКХ,
                        водоотведения и&nbsp;канализации,
                        пищевой и&nbsp;химической промышленности.</p>',
            ],
            [
                'title' => 'Комплексные решения',
                'text' => '<p>Мы стараемся предложить нашим клиентам комплексные решения, сотрудничаем как с крупными
                        компаниями, так и с оптово-розничными организациями, довольно часто поставляем оборудования
                        конечным потребителям.</p>',
            ],
            [
                'title' => 'Заводские цены',
                'text' => '<p>На весь модельный ряд действуют специальные ЗАВОДСКИЕ ЦЕНЫ!</p>',
            ],
            [
                'title' => 'Скидки оптовым клиентам',
                'text' => '<p>Оптовым клиентам, мы готовы предоставить гибкую систему скидок!</p>',
            ],
        ];

        foreach ($specializations as $i => $specialization) {
            Specialization::factory()->create([
                'title' => $specialization['title'],
                'text' => $specialization['text'],
                'sorting' => $i,
                'active' => true,
            ]);
        }
    }
}
