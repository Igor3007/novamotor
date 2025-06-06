@php
    $settings = \App\Models\Setting::query()->first();

    $menu = \App\Models\MenuItem::query()->with('menu')
    ->orderBy('sorting')
    ->get()->tree();

    $socialServices = \App\Models\SocialService::query()->active()->orderBy('sorting')->get();

    $categories = \App\Models\Category::query()->with('products')->active()->get();

    seo()->title('Страница не найдена');
@endphp

@extends('layouts.nova-motors.app')

@section('content')
    <main class="page">
        <div data-observ></div>

        <section class="not-found">
            <div class="_container not-found__container">
                <div class="not-found__wrapper">
                    <div class="not-found__content">
                        <span class="not-found__title">Ошибка 404:</span>
                        <h1>Страница не найдена</h1>
                        <div class="not-found__content-top">
                            <p>Ничего страшного, просто страница не нашлась или была удалена.</p>
                            <p>Вы всегда можете перейти в каталог и выбрать подходящий двигатель или вернуться на
                                главную:</p>
                            <div class="not-found__content-top-actions">
                                <a href="{{route('catalog')}}" class="btn-blue">Выбрать двигатель</a>
                                <a href="{{route('home')}}" class="btn-white">Вернуться на главную</a>
                            </div>
                        </div>
                        <div class="not-found__content-bottom">
                            <p>Также в случае возникновения любых вопросов или для оформления заказа просто позвоните нам по
                                телефонам:</p>
                            <div class="not-found__content-bottom-numbers">
                                @foreach($settings->phones as $phone)
                                    <a href="tel:{{\App\Helpers\Phone::getUrl($phone['phone'])}}">
                                        {!! \App\Helpers\Phone::getPretty($phone['phone']) !!}
                                    </a>
                                @endforeach
                            </div>
                            @if($settings->email)
                                <p>
                                    Или напишите на электронную почту
                                    <a href="mailto:{{$settings->email}}">{{$settings->email}}.</a>
                                </p>
                            @endif
                            <p><b>Наши специалисты проконсультируют вас совершенно бесплатно.</b></p>
                        </div>
                    </div>
                    <div class="not-found__img">
                        <picture>
                            <img src="/assets/images/i_not-found.jpg" alt="nf">
                        </picture>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
