<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'title' => 'Верхнее меню',
                'slug' => 'top',
                'items' => [
                    [
                        'title' => 'Как купить',
                        'url' => '/how-to-buy',
                        'items' => [],
                    ],
                    [
                        'title' => 'Сервис',
                        'url' => '/service',
                        'items' => [],
                    ],
                    [
                        'title' => 'Компания',
                        'url' => '/about',
                        'items' => [
                            [
                                'title' => 'О компании',
                                'url' => '/about',
                            ],
                            [
                                'title' => 'Наши объекты',
                                'url' => '/objects',
                            ],
                            [
                                'title' => 'Наши услуги',
                                'url' => '/our-services',
                            ],
                            [
                                'title' => 'Документация',
                                'url' => '/docs',
                            ],
                            [
                                'title' => 'Статьи и новости',
                                'url' => '/news',
                            ],
                            [
                                'title' => 'Вакансии компании',
                                'url' => '/vacancies',
                            ],
                            [
                                'title' => 'Контакты',
                                'url' => '/contacts',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Контакты',
                        'url' => '/contacts',
                        'items' => [],
                    ],
                ]
            ],
            [
                'title' => 'Каталог товаров',
                'slug' => 'footer1',
                'items' => [
                    [
                        'title' => 'Электродвигатели АИР',
                        'url' => '/elektrodvigateli-air',
                        'items' => [],
                    ],
                    [
                        'title' => 'Электродвигатели АИС',
                        'url' => '/elektrodvigateli-aic',
                        'items' => [],
                    ],
                    [
                        'title' => 'Электродвигатели АМН',
                        'url' => '/elektrodvigateli-amn',
                        'items' => [],
                    ],
                ],
            ],
            [
                'title' => 'Покупателям',
                'slug' => 'footer2',
                'items' => [
                    [
                        'title' => 'Как купить',
                        'url' => '/how-to-buy',
                        'items' => [],
                    ],
                    [
                        'title' => 'Сервис',
                        'url' => '/service',
                        'items' => [],
                    ],
                ],
            ],
            [
                'title' => 'Компания',
                'slug' => 'footer3',
                'items' => [
                    [
                        'title' => 'О компании',
                        'url' => '/about',
                        'items' => [],
                    ],
                    [
                        'title' => 'Наши услуги',
                        'url' => '/our-services',
                        'items' => [],
                    ],
                    [
                        'title' => 'Документация',
                        'url' => '/docs',
                        'items' => [],
                    ],
                    [
                        'title' => 'Статьи и новости',
                        'url' => '/news',
                        'items' => [],
                    ],
                    [
                        'title' => 'Вакансии компании',
                        'url' => '/vacancies',
                        'items' => [],
                    ],
                    [
                        'title' => 'Контакты',
                        'url' => '/contacts',
                        'items' => [],
                    ],
                ],
            ],
            [
                'title' => 'Нижнее меню',
                'slug' => 'bottom',
                'items' => [
                    [
                        'title' => 'Политика конфиденциальности',
                        'url' => '/policy',
                        'items' => [],
                    ],
                    [
                        'title' => 'Пользовательское соглашение',
                        'url' => '/agreement',
                        'items' => [],
                    ],
                ]
            ],
        ];

        foreach ($menus as $menu) {
            $menuModel = Menu::factory()->create([
                'title' => $menu['title'],
                'slug' => $menu['slug'],
            ]);

            foreach ($menu['items'] as $i => $item) {
                $menuItemModel = MenuItem::factory()->create([
                    'menu_id' => $menuModel->id,
                    'title' => $item['title'],
                    'url' => $item['url'],
                    'sorting' => $i+1,
                    'parent_id' => 0
                ]);

                foreach ($item['items'] as $j => $subItem) {
                    MenuItem::factory()->create([
                        'menu_id' => $menuModel->id,
                        'title' => $subItem['title'],
                        'url' => $subItem['url'],
                        'sorting' => $j+1,
                        'parent_id' => $menuItemModel->id
                    ]);
                }
            }
        }
    }
}
