@extends('layouts.nova-motors.app')

@section('content')
    <main class="page">
        <div data-observ></div>
        <section class="breadcrumbs">
            <div class="_container breadcrumbs__container">
                {{ Breadcrumbs::render('page', $page) }}
            </div>
        </section>

        <section class="contacts">
            <div class="_container contacts__container">
                <div class="contacts__wrapper">
                    <div class="contacts__content">
                        <div class="contacts__content-heading">
                            <h1>{{$page->title}}</h1>
                        </div>
                        <div class="contacts__content-info">
                            @if($settings->phones)
                                <div class="contacts__content-info-item tel">
                                    <h3>Телефоны</h3>
                                    @foreach($settings->phones as $i => $phone)
                                        <a href="tel:{{\App\Helpers\Phone::getUrl($phone['phone'])}}">{{$phone['phone']}}</a>
                                        @if($i < count($settings->phones) - 1)
                                            <br>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                            @if($settings->address)
                                <div class="contacts__content-info-item address">
                                    <h3>Адрес</h3>
                                    <a href="{{$settings->map}}" target="_blank">
                                        {{$settings->address}}
                                    </a>
                                </div>
                            @endif
                            @if($settings->email)
                                <div class="mail contacts__content-info-item">
                                    <h3>Email</h3>
                                    <a href="mailto:{{$settings->email}}" class="mail">{{$settings->email}}</a>
                                </div>
                            @endif
                            @if($settings->worktimes)
                                <div class="contacts__content-info-item schedule">
                                    <h3>График работы</h3>
                                    @foreach($settings->worktimes as $i => $worktime)
                                        <p>{{$worktime['worktime']}}</p>
                                        @if($i < count($settings->worktimes) - 1)
                                            <br>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    @if($settings->coordinates)
                        <div class="contacts__map">
                            <div class="yandex-map" data-coord="[{{$settings->coordinates}}]"></div>
                        </div>
                    @endif
                </div>

            </div>
        </section>

        @include('layouts.nova-motors.partials.forms.contacts')
    </main>
@endsection
