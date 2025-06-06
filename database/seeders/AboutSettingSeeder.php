<?php

namespace Database\Seeders;

use App\Models\AboutSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class AboutSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $image = Storage::drive('public')->putFile('about', new File(public_path('assets/images/i_about.jpg')));

        AboutSetting::factory()->create([
            'image' => $image,
            'title' => 'Гарантия и ремонт',
            'text' => '
                        <h4>Все электродвигатели имеют заводскую гарантию</h4>
                        <p>Также наша компания осуществляет гарантийное и послегарантийное обслуживание. По любому
                            интересующему Вас вопросу Вы можете позвонить по телефонам:</p>
                        ',
            'phones' => [
                [
                    'phone' => '8 (861) 225-93-92',
                ],
                [
                    'phone' => '8 (861) 225-86-57',
                ],
            ],
            'btn_text' => 'Подробнее про гарантию и сервис',
            'btn_url' => '/service',
        ]);
    }
}
