<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Как купить',
                'slug' => 'how-to-buy',
            ],
            [
                'title' => 'Сервис',
                'slug' => 'service',
            ],
            [
                'title' => 'О компании',
                'slug' => 'about',
            ],
            [
                'title' => 'Политика конфиденциальности',
                'slug' => 'policy',
            ],
            [
                'title' => 'Пользовательское соглашение',
                'slug' => 'assign',
            ],
            [
                'title' => 'Документация',
                'slug' => 'docs',
            ],
            [
                'title' => 'Статьи и новости',
                'slug' => 'news',
            ],
            [
                'title' => 'Вакансии компании',
                'slug' => 'vacancies',
            ],
            [
                'title' => 'Контакты',
                'slug' => 'contacts',
            ],
            [
                'title' => 'Наши объекты',
                'slug' => 'objects',
            ],
        ];

        foreach ($pages as $page) {
            Page::factory()->create([
                'title' => $page['title'],
                'slug' => $page['slug'],
                'active' => true
            ]);
        }
    }
}
