<?php

namespace Database\Seeders;

use App\Models\ServiceSetting;
use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ServiceSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $image = Storage::drive('public')->putFile('settings', new File(public_path('assets/images/i_service.jpg')));

        ServiceSetting::factory()->create([
            'service_partner' => 'ООО «Гидромаш-Краснодар»',
            'service_address' => 'Краснодар, СНТ «Краснодаргорстрой», ул. Строителей, д. 1/1',
            'image' => $image,
            'text1' => '
                        <h2>Гарантийный ремонт</h2>
                        <p>В случае выхода из строя электродвигателя в течение гарантийного срока,&nbsp; необходимо составить
                            акт рекламации по форме и вместе с другими документами, указанными в паспорте изделия,
                            отправить на&nbsp;почту <a href="mailto:novamotor@mail.ru">novamotor@mail.ru</a>.
                            В течение 1 рабочего дня в Ваш адрес поступит ответ с
                            инструкцией по&nbsp;отправке электродвигателя в сервисный центр.</p>
                        <p>При признании вины изготовителя гарантийный ремонт осуществляется в течение <b>30 дней</b>.
                            Для&nbsp;потребителя ремонт осуществляется безвозмездно при условии доставки электродвигателя
                            в&nbsp;сервисный центр. Гарантийный срок продляется на время нахождения в гарантийном
                            обслуживании.</p>
            ',
            'text2' => '
                        <h2>Послегарантийное обслуживание</h2>
                        <p>Сервисный центр принимает в ремонт только электродвигатели Nova Motor. Стоимость ремонта
                            составляется на основании проведения дефектовки. Срок проведения ремонта — <b>до 30
                                дней.</b></p>
                    ',
        ]);
    }
}
