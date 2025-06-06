@extends('layouts.nova-motors.app')

@section('content')

    <main class="page">
        <div data-observ></div>
        <section class="breadcrumbs">
            <div class="_container breadcrumbs__container">
                {{ Breadcrumbs::render('page', $page) }}
            </div>
        </section>

        <section class="service">
            <div class="_container service__container">
                <h1>{{$page->title}}</h1>
                <div class="service__wrapper">
                    <div class="service__content">
                        <div class="service__content-cards">
                            @if($service->service_partner)
                                <div class="service__content-card">
                                    <span>Сервисный партнер</span>
                                    <h4>{{$service->service_partner}}</h4>
                                </div>
                            @endif
                            @if($service->service_address)
                                <div class="service__content-card">
                                    <span>Адрес сервисного центра</span>
                                    <h4>{{$service->service_address}}</h4>
                                </div>
                            @endif
                        </div>
                        <div class="service__content-item">
                            {!! $service->text1 !!}
                        </div>
                        <div class="service__content-item">
                            {!! $service->text2 !!}
                        </div>
                    </div>
                    @if($service->image)
                        <div class="service__img">
                            <picture>
                                <img src="{{\Illuminate\Support\Facades\Storage::url($service->image)}}" alt="service">
                            </picture>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </main>
@endsection
