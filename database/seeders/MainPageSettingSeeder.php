<?php

namespace Database\Seeders;

use App\Models\MainPageSetting;
use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class MainPageSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MainPageSetting::factory()->create([
            'form_title' => 'Быстрый подбор двигателя',
            'form_text' => 'Не знаете, какой именно двигатель вам подходит или нужно выбрать побыстрее? Напишите нам, мы перезвоним и подберём самые подходящие модели!',
            'about_image' => Storage::drive('public')->putFile('settings', new File(public_path('/assets/images/i_about-main.jpg'))),
            'about_text' => '<h2>О компании</h2>
                    <p><b>Компания «Нова Мотор» (ТМ&nbsp;«Nova Motor») является изготовителем асинхронных трёхфазных
                        электродвигателей общепромышленного исполнения серий АИР, АИС, АМН.
                    </b></p>
                    <p>Производство основано на&nbsp;основе производственной базы Краснодарского завода. Кроме того,
                        в&nbsp;производстве электродвигателей частично участвуют материалы, произведенные на&nbsp;других заводах
                        России и&nbsp;других стран. Прежде чем поступит в&nbsp;продажу, каждый электродвигатель проходит испытания
                        на&nbsp;специальном сертифицированном стенде.</p>
                    <p>ООО «Гидромаш-Краснодар» является эксклюзивным дистрибьютором продукции Nova Motor.</p>',
            'about_btn_title' => 'Подробнее о компании',
            'about_btn_url' => '#',
            'h1' => 'Блок с сео-текстом для примера',
        ]);
    }
}
