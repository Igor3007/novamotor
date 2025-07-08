@extends('layouts.nova-motors.app')

@section('content')
<main class="page">
    <div data-observ></div>
    <section class="breadcrumbs">
        <div class="_container breadcrumbs__container">
            {{ Breadcrumbs::render('product', $product) }}
        </div>
    </section>

    <section class="product">
        <div class="_container product__container">
            <div class="product__wrapper">
                <div class="product__content">
                    <div class="product__content-heading">
                        <h1>{{$h1}}</h1>
                        <div class="product__content-heading-panel">
                            @if(count($analogProducts) > 0)
                            <div class="product__content-heading-panel-item">
                                <span class="product__content-heading-panel-item-name">Аналоги:</span>
                                <ul>
                                    @foreach($analogProducts as $analogProduct)
                                    <li>
                                        <a href="{{$analogProduct['url']}}">{{$analogProduct['title']}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="product__content-heading-panel-item">
                                <span class="product__content-heading-panel-item-name">Наличие:</span>
                                <span class="product__content-heading-panel-item-value">
                                    В наличии
                                    {{--
                                        {{$product->quantity > 0 ? (($product->quantity >= $settings->catalog_quantity_word) ? 'Много' : 'Мало') : 'Нет в наличии'}}
                                    --}}
                                </span>
                            </div>

                        </div>
                    </div>
                    <div class="actions-product product__content-actions">
                        <div class="actions-product__pricing">
                            @foreach($product->offers as $offer)
                            <div class="actions-product__pricing-item">
                                <div class="price">{!! $offer->formatPrice !!}</div>
                                <span>{{$offer->title}}</span>
                            </div>
                            @endforeach
                        </div>
                        <div class="actions-product__buttons">
                            <button class="btn-blue get-modal--order" data-popup="ajax" data-url="/form/order">
                                Заказать двигатель
                            </button>
                            @if($product->tech_list)
                            <a href="{{\Illuminate\Support\Facades\Storage::url($product->tech_list)}}"
                                download="" class="btn-download">
                                <i class="icon"
                                    style="background-image: url('/assets/images/icons/ic_doc.svg')"></i>
                                <span>Скачать техлист ({{mb_strtoupper(pathinfo($product->tech_list)['extension'])}})</span>
                            </a>
                            @endif
                        </div>
                        @if($tiles->count() > 0)
                        <div class="actions-product__cards">
                            @foreach($tiles as $tile)
                            <div class="actions-product__card">
                                @if($tile->icon)
                                <div class="actions-product__card-icon">
                                    <i class="icon"
                                        style="background-image: url('{{\Illuminate\Support\Facades\Storage::url($tile->icon)}}')"></i>
                                </div>
                                @endif
                                <div class="actions-product__card-content">
                                    <h4>{{$tile->title}}</h4>
                                    <p>{{$tile->text}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="info-product product__content-info">

                        <div class="info-product__content">
                            <div class="info-product__content-list">
                                {!! $product->description !!}
                            </div>
                        </div>
                        <div class="info-product__actions">
                            <a href="#motor-table" class="btn-down">
                                <i class="icon"
                                    style="background-image: url('/assets/images/icons/ic_down.svg')"></i>
                                <span>Читать подробнее</span>
                            </a>

                            @if($product->category->decoding_file)
                            <a href="#tabs-custom"
                                class="btn-transcript">
                                <i class="icon"
                                    style="background-image: url('/assets/images/icons/ic_transcript.svg')"></i>
                                <span>Расшифровка условных обозначений</span>
                            </a>
                            @endif

                            <button class="btn-download-pdf" onclick="downloadPDF()">
                                <i class="icon"
                                    style="background-image: url('/assets/images/icons/ic_doc.svg')"></i>
                                Скачать тех.лист
                            </button>
                        </div>
                    </div>
                </div>
                <div class="product__slider">
                    <div class="product__content-heading product__content-heading--md">
                        <div class="title">{{$product->full_title}}</div>
                        <div class="product__content-heading-panel">
                            @if(count($analogProducts) > 0)
                            <div class="product__content-heading-panel-item">
                                <span class="product__content-heading-panel-item-name">Аналоги:</span>
                                <ul>
                                    @foreach($analogProducts as $analogProduct)
                                    <li>
                                        <a href="{{$analogProduct['url']}}">{{$analogProduct['title']}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="product__content-heading-panel-item">
                                <span class="product__content-heading-panel-item-name">Наличие:</span>
                                <span class="product__content-heading-panel-item-value">{{$product->quantity > 0 ? 'Много' : 'Нет в наличии'}}</span>
                            </div>

                        </div>
                    </div>

                    @if($product->images->count() > 0)
                    <div class="slider-product">
                        <div data-slider="product-main" class="splide">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach($product->images as $image)
                                    <li class="splide__slide">
                                        <a href="{{$image->getUrl()}}" data-fslightbox="product">
                                            <picture>
                                                <img src="{{$image->getUrl('')}}" alt="catalog">
                                            </picture>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div data-slider="product-thumb" class="splide">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach($product->images as $image)
                                    <li class="splide__slide">
                                        <picture>
                                            <img src="{{$image->getUrl('small')}}" alt="catalog">
                                        </picture>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="product__slider-zoom">
                                <i class="icon"
                                    style="background-image: url('/assets/images/icons/ic_zoom.svg')"></i>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="slider-product">
                        <img src="/assets/images/no-photo.png">
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="i-product" id="motor-table">
        <div class="_container i-product__container">
            <div class="tabs-custom" id="tabs-custom">
                <div class="tabs-custom__scroller">

                </div>
                <div class="tabs-custom__tabs">
                    @if($product->full_description)
                    <div class="tabs-custom__tab" data-tab="tab1">
                        <span>Описание</span>
                    </div>
                    @endif
                    @if($product->properties->count() > 0)
                    <div class="tabs-custom__tab active-tab" data-tab="tab2">
                        <span>Технические характеристики</span>
                    </div>
                    @endif
                    @if($product->sizes)
                    <div class="tabs-custom__tab" data-tab="tab3">
                        <span>Габариты</span>
                    </div>
                    @endif
                    @if($product->documentation || $product->files->count() > 0)
                    <div class="tabs-custom__tab" data-tab="tab4">
                        <span>Документация</span>
                    </div>
                    @endif
                    <div class="tabs-custom__tab" data-tab="tab5">
                        <span>Расшифровка</span>
                    </div>
                </div>
                <div id="tab1" class="tabs-custom__tab-content">
                    <div class="formated">
                        {!! $product->full_description !!}
                    </div>

                </div>
                <div id="tab2" class="tabs-custom__tab-content active-content">
                    <div class="i-product__content">
                        <div class="characteristics">
                            <div class="characteristics__table dragscroll">
                                <table>
                                    <tr>
                                        <td>Наименование</td>
                                        <td>{{$product->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>Категория</td>
                                        <td>{{$product->category->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>Полное наименование</td>
                                        <td>{{$product->full_title}}</td>
                                    </tr>
                                    @foreach($product->properties as $property)
                                    <tr>
                                        <td>{{$property->title}}</td>
                                        <td>{{$property->pivot->value}}</td>
                                    </tr>
                                    @endforeach
                                    {{--
                                            <tr>
                                                <td>Цена</td>
                                                <td>{!! $product->formatMinPrice !!}&nbsp₽</td>
                                            </tr>
                                            --}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @if($product->sizes)
                <div id="tab3" class="tabs-custom__tab-content">
                    <div class="formated tab-sizes">
                        {!! $product->sizes !!}
                    </div>
                </div>
                @endif
                @if($product->documentation || $product->files->count() > 0)
                <div id="tab4" class="tabs-custom__tab-content">
                    <div class="formated">
                        {!! $product->documentation !!}
                    </div>

                    <div class="product__docs-files">
                        @foreach($product->files as $document)
                        <div class="product__docs-file">
                            <div class="docs__item-heading">
                                <a href="{{\Illuminate\Support\Facades\Storage::url($document->path)}}" target="_blank">
                                    <i class="icon" style="background-image: url('/assets/images/icons/ic_doc-download.svg')"></i>
                                    {{$document->name}}
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                <div id="tab5" class="tabs-custom__tab-content">
                    <div class="legend-wrapper">
                        <div class="base">
                            <h4>Условные обозначения</h4>
                            <table class="legend-table">
                                <thead>
                                    <tr>
                                        <th>АИР</th>
                                        <th>х</th>
                                        <th>160</th>
                                        <th>S</th>
                                        <th>2</th>
                                        <th>х</th>
                                        <th>У</th>
                                        <th>2</th>
                                        <th>IP55</th>
                                        <th>15 кВт</th>
                                        <th>3000 об/мин</th>
                                        <th>IM 1081</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                        <td>5</td>
                                        <td>6</td>
                                        <td>7</td>
                                        <td>8</td>
                                        <td>9</td>
                                        <td>10</td>
                                        <td>11</td>
                                        <td>12</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="legend-notes">
                                <div class="legend-note">1 — серия (тип)</div>
                                <div class="legend-note">2 — электрические модификации</div>
                                <div class="legend-note">3 — высота оси вращения (габарит)</div>
                                <div class="legend-note">4 — длина сердечника и/или длина станины</div>
                                <div class="legend-note">5 — количество полюсов</div>
                                <div class="legend-note">6 — конструктивные модификации</div>
                                <div class="legend-note">7 — климатическое исполнение</div>
                                <div class="legend-note">8 — категория размещения</div>
                                <div class="legend-note">9 — степень защиты</div>
                                <div class="legend-note">10 — мощность</div>
                                <div class="legend-note">11 — частота вращения</div>
                                <div class="legend-note">12 — монтажное исполнение</div>
                            </div>
                        </div>

                        <div class="base legend-type">
                            <h4>Серия (тип) электродвигателя</h4>
                            <div class="legend-nodes">
                                <div class="legend-node">
                                    <div class="legend-node-title">
                                        Общепромышленные электродвигатели:
                                    </div>
                                    <p>АИ — обозначение общепромышленных электродвигателей</p>
                                    <p>Р, С (АИР, АИС) — вариант привязки мощности к установочным размерам:<br>
                                        АИР — электродвигатели, изготавливаемые по ГОСТ;<br>
                                        АИС — электродвигатели, изготавливаемые по DIN (CENELEC).</p>
                                </div>
                                <div class="legend-node">
                                    <div class="legend-node-title">
                                        Электрические модификации электродвигателя:
                                    </div>
                                    <p>М — модернизированный электродвигатель</p>
                                    <p>Н — защищённого исполнения с самовентиляцией</p>
                                    <p>Ф — защищённого исполнения с принудительным охлаждением</p>
                                    <p>К — с фазным ротором</p>
                                    <p>С — с повышенным скольжением</p>
                                    <p>Е — однофазный электродвигатель с рабочим конденсатором</p>
                                    <p>2Е — однофазный электродвигатель с пусковым и рабочим конденсатором</p>
                                    <p>В — встраиваемый электродвигатель</p>
                                </div>
                            </div>
                        </div>
                        <div class="base">
                            <h4>Габарит электродвигателя (высота оси вращения)</h4>
                            <div class="legend-node">
                                <div class="legend-node-title">Расстояние от низа лап до центра вала в миллиметрах:</div>
                                <p>50, 56, 63, 71, 80, 90, 100, 112, 132, 160, 180, 200, 225, 250, 280, 315, 355</p>
                            </div>
                        </div>
                        <div class="base">
                            <h4>Длина сердечника и/или длина станины</h4>
                            <div class="legend-nodes">
                                <div class="legend-node">
                                    <p>A, B, C — длина сердечника</p>
                                    <p>S, L, M — установочные размеры по длине станины</p>
                                </div>
                            </div>
                        </div>
                        <div class="base">
                            <h4>Количество полюсов электродвигателя</h4>
                            <div class="legend-node">
                                <p>2, 4, 6, 8, 10, 12</p>
                            </div>
                        </div>
                        <div class="base">
                            <h4>Конструктивные модификации электродвигателя</h4>
                            <div class="legend-nodes">
                                <div class="legend-node">
                                    <p>Е — со встроенным электромагнитным тормозом</p>
                                    <p>Б — встроенные датчики:<br>
                                        Б01 — РТС-термисторы в обмотках<br>
                                        Б02 — РТС-термисторы в обмотках, pt100 в подшипниках<br>
                                        Б05 — pt100 в обмотках<br>
                                        Б06 — pt100 в обмотках, pt100 в подшипниках</p>
                                </div>
                                <div class="legend-node">
                                    <p>Ж — электродвигатель для моноблочных насосов</p>
                                    <p>С — электродвигатель для станков качалок</p>
                                    <p>Н — электродвигатель малошумного исполнения</p>
                                    <p>Л — электродвигатель для привода лифтов</p>
                                </div>
                            </div>
                        </div>
                        <div class="base">
                            <h4>Климатические исполнения электродвигателя</h4>
                            <div class="legend-node">У — умеренный климат</div>
                            <div class="legend-node">Т — тропический климат</div>
                            <div class="legend-node">УХЛ — умеренно-холодный климат</div>
                            <div class="legend-node">ХЛ — холодный климат</div>
                            <div class="legend-node">ОМ — на судах морского и речного флота</div>
                        </div>
                        <div class="base">
                            <h4>Категории размещения</h4>
                            <div class="legend-node">5 — в помещении с повышенной влажностью</div>
                            <div class="legend-node">4 — в помещении с искусственно регулируемыми климатическими условиями</div>
                            <div class="legend-node">3 — в помещении</div>
                            <div class="legend-node">2 — на улице под навесом</div>
                            <div class="legend-node">1 — на открытом воздухе</div>
                        </div>
                        <div class="base legend-ips">
                            <h4>Степень защиты электродвигателя (IP)</h4>
                            <div class="legend-nodes">
                                <div class="legend-node">
                                    <div class="legend-node-title">Первая цифра — защита от пыли:</div>
                                    <table class="legend-node-table">
                                        <thead>
                                            <tr>
                                                <th>IP</th>
                                                <th>Определение</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>0</td>
                                                <td>без защиты</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>защита от твёрдых объектов размерами до 50 мм</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>защита от твёрдых объектов размерами до 12 мм</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>защита от твёрдых объектов размерами до 2,5 мм</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>защита от твёрдых объектов размерами до 1 мм</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>защита от пыли (без осаждения опасных материалов)</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>полная защита от пыли</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="legend-node">
                                    <div class="legend-node-title">Вторая цифра — защита от влаги:</div>
                                    <table class="legend-node-table">
                                        <thead>
                                            <tr>
                                                <th>IP</th>
                                                <th>Определение</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>0</td>
                                                <td>без защиты</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>защита от&nbsp;вертикально падающих капель</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>защита от&nbsp;капель воды, падающих на&nbsp;оболочку, наклонённую под углом не&nbsp;более 15 градусов к&nbsp;вертикали</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>защита от&nbsp;капель воды, падающих на&nbsp;оболочку, наклонённую под углом не&nbsp;более 60 градусов к&nbsp;вертикали</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>защита от брызг воды любого направления</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>защита от струй воды любого направления</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>защита от воздействий, подобных морским накатам</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="base">
                            <h4>Исполнения по способу монтажа</h4>
                            <div class="legend-node-img">
                                <picture>
                                    <img src="/assets/images/category/image1.png" alt="">
                                </picture>
                                <picture>
                                    <img src="/assets/images/category/image2.png" alt="">
                                </picture>
                                <picture>
                                    <img src="/assets/images/category/image3.png" alt="">
                                </picture>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($product->tech_list_photo)
    <section class="f-parts">
        <div class="f-parts__container _container">
            <h2>Габаритные размеры</h2>
            <div class="f-parts__images">
                <a href="{{\Illuminate\Support\Facades\Storage::url($product->tech_list_photo)}}"
                    data-fslightbox="f-parts" class="f-parts__image">
                    <picture>
                        <img src="{{\Illuminate\Support\Facades\Storage::url($product->tech_list_photo)}}"
                            alt="f-parts">
                    </picture>
                </a>
            </div>
        </div>
    </section>
    @endif

    @include('layouts.nova-motors.partials.advantages')

    <x-blocks.seo-block />

    @include('layouts.nova-motors.partials.faqs')
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function createTemplate() {

        let wrapper, date, template = document.createElement('div')

        let elements = [
            '.header',
            '.product__content-heading',
            '.product__slider',
            '.tabs-custom'
        ]

        elements.forEach(item => {
            if (document.querySelector(item)) {
                template.append(document.querySelector(item).cloneNode(true))
            }
        })

        // current date
        const today = new Date();
        const formattedDate = today.toLocaleDateString('ru-RU', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric'
        }).replace(/\//g, '.');

        date = document.createElement('div')
        date.classList.add('pdf-footer')
        date.innerHTML = `<div class="pdf-date" >${formattedDate}</div> <div class="pdf-url" >${window.location.host }</div>`
        template.append(date)

        //wrapper
        wrapper = document.createElement('div')
        wrapper.classList.add('pdf-wrapper')

        wrapper.append(template)
        document.body.append(wrapper)

        wrapper.querySelectorAll('.tabs-custom__tab').forEach((item, i) => {
            if (!i) {
                item.classList.add('active-tab')
                return false
            }
            item.remove()
        });

        wrapper.querySelectorAll('.tabs-custom__tab-content').forEach((item, i) => {
            if (item.querySelector('.characteristics')) {
                item.classList.add('active-content')
                return false
            }
            if (item.querySelector('.tab-sizes')) {
                item.classList.add('active-content')
                return false
            }
            item.remove()
        });

        return wrapper

    }

    function downloadPDF() {

        window.preloader.load()

        window.scrollTo({
            top: 0
        })

        let template = createTemplate()

        setTimeout(() => {
            const element = template;
            const animatedBlock = document.querySelector('.pdf-wrapper .tabs-custom__tab-content.active-content');

            const originalAnimation = animatedBlock.style.animation;
            const originalDisplay = animatedBlock.style.display;

            animatedBlock.style.animation = 'none';
            animatedBlock.style.display = 'block';

            const heading = document.querySelector('.product__content-heading h1');
            let filename = 'info.pdf';
            if (heading) {
                filename = heading.textContent
                    .trim()
                    .replace(/[\s\/\\:*?"<>|]+/g, '_')
                    .substring(0, 100) + '.pdf';
            }

            const opt = {
                margin: 0.5,
                filename: filename,
                image: {
                    type: 'jpeg',
                    quality: 1
                },
                html2canvas: {
                    scale: 2, // Увеличиваем scale
                    useCORS: true,
                    scrollY: 0, // Убедитесь, что нет скролла
                    allowTaint: true, // Попробуйте, если useCORS не помогает
                    logging: true // Включите логирование для отладки
                },
                jsPDF: {
                    unit: 'px',
                    format: [1400, 2800],
                    orientation: 'portrait',
                    hotfixes: ["px_scaling"],
                }
            };

            html2pdf().set(opt).from(element).save().then(() => {
                animatedBlock.style.animation = originalAnimation;
                animatedBlock.style.display = originalDisplay;

                template.remove()
                window.preloader.stop()
            });
        }, 100)



    }
</script>

@endsection