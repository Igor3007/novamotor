<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::factory()->create([
            'logo' => Storage::drive('public')->putFile('settings', new File(public_path('/assets/images/icons/ic_logo-nova.png'))),
            'slogan_image' => Storage::drive('public')->putFile('settings', new File(public_path('/assets/images/icons/ic_logo-nova-text.png'))),
            'slogan_text' => 'Электродвигатели от производителя',
            'email' => 'novamotor@mail.ru',
            'phones' => [
                [
                    'phone' => '8 (861) 225-93-92',
                ],
                [
                    'phone' => '8 (861) 225-86-57',
                ],
            ],
            'address' => 'Краснодар, СНТ «Краснодаргорстрой», ул. Строителей, д. 1/1',
            'footer_text' => 'Небольшой текст о компании. Наши цены остаются самыми низкими и конкурентными. Мы ценим и любим своих клиентов, придерживаемся принципов порядочности, открытости и доверительности в делах.',
            'copyright_text' => 'Информация на сайте о технических характеристиках, наличии на складе, стоимости и изображениях товаров не является публичной офертой',
            'metric_head' => '',
            'metric_body' => '',
            'metric_footer' => '',
            'adv_text' => 'Компания «Нова Мотор» (ТМ «Nova Motor») является изготовителем асинхронных трёхфазных электродвигателей общепромышленного исполнения серий АИР, АИС, АМН. ',
            'catalog_h1' => 'Каталог продукции',
            'footer_text_left' => 'Nova Motor',
            'footer_text_right' => 'Наши мессенджеры',
            'worktime' => [
                [
                    'text' => '8.00 — 17.00, воскресенье — выходной',
                ],
            ],
            'map' => 'https://yandex.by/maps/10995/krasnodar-krai/house/ulitsa_stroiteley_1_1/Z0EYfw5pSUIEQFpvfX1zdntiYQ==/?ll=38.999073%2C45.127715&z=16.85',
            'coordinates' => '45.127715, 38.999073',
        ]);
    }
}
