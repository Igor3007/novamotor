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
                @foreach($blocks as $block)
                    <div class="buy__row">
                        <div class="buy__row-heading">
                            <h2>{{$block->title}}</h2>
                        </div>
                        <div class="buy__row-content">
                            {!! $block->text !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <x-blocks.seo-block/>
    </main>
@endsection
