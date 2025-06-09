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
                            <h1>{{$product->full_title ?? $product->title}}</h1>
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
                                    <a href="{{\Illuminate\Support\Facades\Storage::url($product->category->decoding_file)}}"
                                       download="" class="btn-transcript">
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
                <div class="tabs-custom">
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
                        @if($product->documentation)
                            <div class="tabs-custom__tab" data-tab="tab4">
                                <span>Документация</span>
                            </div>
                        @endif
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
                            <div class="formated">
                                {!! $product->sizes !!}
                            </div>

                        </div>
                    @endif
                    @if($product->documentation)
                        <div id="tab4" class="tabs-custom__tab-content">
                            <div class="formated">
                                {!! $product->documentation !!}
                            </div>

                        </div>
                    @endif
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

        @include('layouts.nova-motors.partials.faqs')
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function downloadPDF() {
            window.scrollTo({top: 0})
            const element = document.querySelector('main');
            const animatedBlock = document.querySelector('.tabs-custom__tab-content.active-content');

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
                image: {type: 'jpeg', quality: 1},
                html2canvas: {scale: 2, useCORS: true},
                jsPDF: {unit: 'in', format: 'a2', orientation: 'portrait'}
            };

            html2pdf().set(opt).from(element).save().then(() => {
                animatedBlock.style.animation = originalAnimation;
                animatedBlock.style.display = originalDisplay;
            });
        }

    </script>

@endsection
