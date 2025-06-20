<?php

namespace Database\Seeders;

use App\Models\PolicyBlock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolicyBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blocks = [
            [
                'title' => 'Обрабатываемые данные',
                'text' => '
                    <p>1.1. Мы&nbsp;не&nbsp;осуществляем сбор ваших персональных данных с&nbsp;использованием Сайта.</p>
                    <p>1.2. Все данные, собираемые на&nbsp;Сайте, предоставляются и&nbsp;принимаются в&nbsp;обезличенной форме
                        (далее&nbsp;— «Обезличенные данные»).
                    </p>
                    <p>1.3. Обезличенные данные включают следующие сведения, которые не&nbsp;позволяют вас
                        идентифицировать:
                    </p>
                    <p>1.3.1. Информацию, которую вы&nbsp;предоставляете о&nbsp;себе самостоятельно с&nbsp;использованием
                        онлайн-форм и&nbsp;программных модулей Сайта, включая имя и&nbsp;номер телефона и/или адрес
                        электронной почты.
                    </p>
                    <p>1.3.2. Данные, которые передаются в&nbsp;обезличенном виде в&nbsp;автоматическом режиме
                        в&nbsp;зависимости от&nbsp;настроек используемого вами программного обеспечения.
                    </p>
                    <p>1.4. Администрация вправе устанавливать требования к&nbsp;составу Обезличенных данных
                        Пользователя, которые собираются использованием Сайта.
                    </p>
                    <p>1.5. Если определенная информация не&nbsp;помечена как обязательная, ее&nbsp;предоставление или
                        раскрытие осуществляется Пользователем на&nbsp;свое усмотрение. Одновременно вы&nbsp;даете
                        информированное согласие на&nbsp;доступ неограниченного круга лиц к&nbsp;таким данным. Указанные
                        данные становится общедоступными с&nbsp;момента предоставления и/или раскрытия в&nbsp;иной форме.
                    </p>
                    <p>1.6. Администрация не&nbsp;осуществляет проверку достоверности предоставляемых данных
                        и&nbsp;наличия у&nbsp;Пользователя необходимого согласия на&nbsp;их&nbsp;обработку в&nbsp;соответствии
                        с&nbsp;настоящей Политикой, полагая, что Пользователь действует добросовестно, осмотрительно
                        и&nbsp;прилагает все необходимые усилия к&nbsp;поддержанию такой информации в&nbsp;актуальном состоянии
                        и&nbsp;получению всех необходимых согласий на&nbsp;ее&nbsp;использование.
                    </p>
                    <p>1.7. Вы&nbsp;осознаете и&nbsp;принимаете возможность использования на&nbsp;Сайте программного
                        обеспечения третьих лиц, в&nbsp;результате чего такие лица могут получать и&nbsp;передавать
                        указанные в&nbsp;п.1.3 данные в&nbsp;обезличенном виде.
                    </p>
                    <article>
                        <h4>Выделение акцентного текста</h4>
                        <p>К&nbsp;указанному программному обеспечению третьих лиц относятся системы сбора статистики
                            посещений Google Analytics и&nbsp;Яндекс.Метрика. В&nbsp;отношении полученных данных сохраняется
                            конфиденциальность, за&nbsp;исключением случаев, когда они сделаны Пользователем общедоступными,
                            а&nbsp;также когда используемые на&nbsp;Сайте технологии и&nbsp;программное обеспечение третьих лиц либо
                            настройки используемого Пользователем программного обеспечения предусматривают открытый
                            обмен с&nbsp;данными лицами и/или иными участниками и&nbsp;пользователями сети Интернет.
                        </p>
                    </article>
                ',
            ],
            [
                'title' => 'Цели обработки данных',
                'text' => '
                    <p>2.1. Администрация использует данные в&nbsp;следующих целях:</p>
                    <p>2.1.1. Обработка поступающих запросов и&nbsp;связи с&nbsp;Пользователем;</p>
                    <p>2.1.2. Информационное обслуживание, включая рассылку рекламно-информационных
                        материалов;
                    </p>
                    <p>2.1.3. Проведение маркетинговых, статистических и&nbsp;иных исследований;</p>
                    <p>2.1.4. Таргетирование рекламных материалов на&nbsp;Сайте.</p>
                ',
            ],
            [
                'title' => 'Требования к защите данных',
                'text' => '
                    <p>3.1. Администрация осуществляет хранение данных и&nbsp;обеспечивает их&nbsp;охрану
                        от&nbsp;несанкционированного доступа и&nbsp;распространения в&nbsp;соответствии с&nbsp;внутренними правилами
                        и&nbsp;регламентами.
                    </p>
                    <p>3.2. В&nbsp;отношении полученных данных сохраняется конфиденциальность, за&nbsp;исключением
                        случаев, когда они сделаны Пользователем общедоступными, а&nbsp;также когда используемые
                        на&nbsp;Сайте технологии и&nbsp;программное обеспечение третьих лиц либо настройки используемого
                        Пользователем программного обеспечения предусматривают открытый обмен с&nbsp;данными лицами
                        и/или иными участниками и&nbsp;пользователями сети Интернет.
                    </p>
                    <p>3.3. В&nbsp;целях повышения качества работы Администрация вправе хранить лог-файлы
                        о&nbsp;действиях, совершенных Пользователем в&nbsp;рамках использования Сайта в&nbsp;течение&nbsp;1 (Одного)
                        года.
                    </p>
                ',
            ],
            [
                'title' => 'Передача данных',
                'text' => '
                    <p>4.1. Администрация вправе передать данные третьим лицам в следующих случаях:</p>
                    <ul>
                        <li>Пользователь выразил свое согласие на такие действия, включая случаи применения
                            Пользователем настроек используемого программного обеспечения, не ограничивающих
                            предоставление определенной информации;
                        </li>
                        <li>Передача необходима в рамках использования Пользователем функциональных возможностей
                            Сайта;
                        </li>
                        <li>Передача требуется в соответствии с целями обработки данных;</li>
                        <li>В связи с передачей Сайта во владение, пользование или собственность такого третьего
                            лица;
                        </li>
                        <li>По запросу суда или иного уполномоченного государственного органа в рамках установленной
                            законодательством процедуры;
                        </li>
                        <li>Для защиты прав и законных интересов Администрации в связи с допущенными Пользователем
                            нарушениями.
                        </li>
                    </ul>
                ',
            ],
            [
                'title' => 'Изменение «Политики конфиденциальности»',
                'text' => '
                    <p>5.1. Настоящая Политика может быть изменена или прекращена Администрацией в&nbsp;одностороннем
                        порядке без предварительного уведомления Пользователя. Новая редакция Политики вступает
                        в&nbsp;силу с&nbsp;момента ее&nbsp;размещения на&nbsp;Сайте, если иное не&nbsp;предусмотрено новой редакцией
                        Политики.
                    </p>
                    <p>5.2. Действующая редакция Политики находится на&nbsp;Сайте в&nbsp;сети Интернет по&nbsp;адресу. Действующая
                        редакция Политики от __________ 20__ г.</p>
                ',
            ],
        ];

        foreach($blocks as $i => $block) {
            PolicyBlock::factory()->create([
                'title' => $block['title'],
                'text' => $block['text'],
                'sorting' => $i,
                'active' => true,
            ]);
        }
    }
}
