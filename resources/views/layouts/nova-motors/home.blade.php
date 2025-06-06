@extends('layouts.nova-motors.app')

@section('content')
    <main class="page">
        <div data-observ></div>
        <section class="banner">
            <div class="_container banner__container">
                <div class="banner__wrapper">
                    @if($banners->count() > 0)
                        <div class="banner__slider">
                            <div class="slider-banner">
                                <div data-slider="slider-banner" class="splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            @foreach($banners as $banner)
                                                <li class="splide__slide">
                                                    <div class="slider-banner__item">
                                                        <div class="slider-banner__item-wrapper">
                                                            <div class="slider-banner__item-content">
                                                                <div class="slider-banner__item-content-info">
                                                                    <h2>{{$banner->title}}</h2>
                                                                    <p>{!! $banner->text !!}</p>
                                                                </div>
                                                                <div class="slider-banner__item-controls-wrapper">
                                                                    <div class="slider-banner__item-controls">
                                                                        @if($banner->btn_title)
                                                                            <a href="{{$banner->url}}">
                                                                                <button class="btn-blue">{{$banner->btn_title}}</button>
                                                                            </a>
                                                                        @endif
                                                                        @if($banners->count() > 1)
                                                                            <button class="slider-banner__prev">
                                                                                <i class="icon" style="background-image: url('/assets/images/icons/ic_arrow-rt.svg')"></i>
                                                                            </button>
                                                                            <button class="slider-banner__next">
                                                                                <i class="icon" style="background-image: url('/assets/images/icons/ic_arrow-rt.svg')"></i>
                                                                            </button>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="slider-banner__item-img">
                                                                @if($banner->image)
                                                                    <picture>
                                                                        <img src="{{\Illuminate\Support\Facades\Storage::url($banner->image)}}" alt="slider">
                                                                    </picture>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="banner__form">
                        <div class="banner__form-heading">
                            <h2>{{$mainPageSettings->form_title}}</h2>
                            <p>{{$mainPageSettings->form_text}}</p>
                        </div>
                        @include('layouts.nova-motors.partials.forms.consultation')
                    </div>
                </div>
            </div>
        </section>
        @if($categories->count() > 0)
            <section class="catalog">
                <div class="_container catalog__container">
                    @include('layouts.nova-motors.partials.catalog')
                </div>
            </section>
            <section class="about-main">
                <div class="_container about-main__container">
                    <div class="about-main__wrapper">
                        <div class="about-main__content">
                            {!! $mainPageSettings->about_text !!}
                            @if($mainPageSettings->about_btn_title)
                                <button class="btn-blue">
                                    <a href="{{$mainPageSettings->about_btn_url}}">{{$mainPageSettings->about_btn_title}}</a>
                                </button>
                            @endif
                        </div>
                        @if($mainPageSettings->about_image)
                            <div class="about-main__img">
                                <picture>
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($mainPageSettings->about_image)}}" alt="about">
                                </picture>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif

        @include('layouts.nova-motors.partials.advantages')

        <section class="formated">
            <div class="_container formated__container">
                <div class="formated__wrapper">
                    <div class="formated__heading">
                        <h1>{{$mainPageSettings->h1}}</h1>
                    </div>
                    <div class="formated__content">
                        @seoText('')
                    </div>
                </div>
            </div>
        </section>


    </main>
@endsection
