@extends('layouts.nova-motors.app')

@section('content')
    <main class="page">
        <div data-observ></div>
        <section class="breadcrumbs">
            <div class="_container breadcrumbs__container">
                {{ Breadcrumbs::render('page', $page) }}
            </div>
        </section>

        <section class="buy">
            <div class="_container buy__container">
                <h1>{{$h1}}</h1>
                {!! $page->text !!}
            </div>
        </section>
    </main>
@endsection
