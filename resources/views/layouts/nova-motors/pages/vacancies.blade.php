@extends('layouts.nova-motors.app')

@section('content')
    <main class="page">
        <div data-observ></div>
        <section class="breadcrumbs">
            <div class="_container breadcrumbs__container">
                {{ Breadcrumbs::render('page', $page) }}
            </div>
        </section>
        <section class="vacancies">
            <div class="_container vacancies__container">
                <div class="vacancies__heading">
                    <h1>{{$page->title}}</h1>
                </div>
                @foreach($vacancies as $i => $vacancy)
                    <div class="vacancies__row @if($i == $vacancies->count() - 1) vacancies__row-last @endif">
                        <div class="vacancies__row-heading">
                            <h2>{{$vacancy->title}}</h2>
                        </div>
                        <div class="vacancies__row-content">
                            <div class="vacancies__row-content-description">
                                {!! $vacancy->text !!}
                            </div>
                            <div class="vacancies__row-content-item">
                                <p>
                                    <b>
                                        Для отклика на вакансию пишите на почту
                                        <a href="mailto:{{$settings->email}}">{{$settings->email}}</a>
                                        или звоните по телефонам
                                        @foreach($settings->phones as $i => $phone)
                                            <a href="tel:{{\App\Helpers\Phone::getUrl($phone['phone'])}}">{{$phone['phone']}}</a>{{$i==count($settings->phones)-1?'.':','}}
                                        @endforeach

                                    </b>
                                </p>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
