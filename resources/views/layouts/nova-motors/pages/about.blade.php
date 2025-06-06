@extends('layouts.nova-motors.app')

@section('content')
    <main class="page">
        <div data-observ></div>
        <section class="breadcrumbs">
            <div class="_container breadcrumbs__container">
                {{ Breadcrumbs::render('page', $page) }}
            </div>
        </section>

        <section class="about">
            <div class="_container about__container">
                <h1>{{$page->title}}</h1>
                <div class="about__wrapper">
                    <div class="about__content">
                        {!! $page->text !!}
                    </div>
                    <div class="about__img">
                        <picture>
                            <img src="{{\Illuminate\Support\Facades\Storage::url($about->image)}}" alt="about">
                        </picture>
                    </div>
                </div>
            </div>
        </section>

        @include('layouts.nova-motors.partials.specialization')

        <section class="guarantee">
            <div class="_container guarantee__container">
                <div class="guarantee__wrapper">
                    @if($about->title)
                        <div class="guarantee__heading">
                            <h2>{{$about->title}}</h2>
                        </div>
                    @endif
                    <div class="guarantee__content">
                        {!! $about->text !!}
                        <div class="guarantee__content-numbers">
                            @foreach($about->phones as $phone)
                                <a href="tel:{{\App\Helpers\Phone::getUrl($phone['phone'])}}">
                                    {!! \App\Helpers\Phone::getPretty($phone['phone']) !!}
                                </a>
                            @endforeach
                        </div>
                        @if($about->btn_text)
                            <a href="{{$about->btn_url}}" class="btn-blue">{{$about->btn_text}}</a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        @include('layouts.nova-motors.partials.advantages')
    </main>
@endsection
