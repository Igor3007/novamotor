@extends('layouts.nova-motors.app')

@section('content')
    <main class="page">
        <div data-observ></div>
        <section class="breadcrumbs">
            <div class="_container breadcrumbs__container">
                {{ Breadcrumbs::render('page', $page) }}
            </div>
        </section>

        <section class="policy">
            <div class="_container policy__container">
                <div class="policy__heading">
                    <h1>{{$h1}}</h1>
                    {!! $page->text !!}
                </div>
                @foreach($blocks as $block)
                    <div class="policy__row">
                        <div class="policy__row-heading">
                            <h2>{{$block->title}}</h2>
                        </div>
                        <div class="policy__row-content">
                            {!! $block->text !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
