@extends('layouts.nova-motors.app')

@section('content')
    <main class="page">
        <section class="breadcrumbs">
            <div class="_container breadcrumbs__container">
                {{ Breadcrumbs::render('catalog') }}
            </div>
        </section>
        <section class="catalog">
            <div class="_container catalog__container">
                <h1>{{$settings->catalog_h1}}</h1>
                @include('layouts.nova-motors.partials.catalog')
            </div>
        </section>

        @include('layouts.nova-motors.partials.advantages')
        @include('layouts.nova-motors.partials.faqs')



    </main>
@endsection
