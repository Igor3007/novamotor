@extends('layouts.nova-motors.app')

@section('content')
    <main class="page">
        <div data-observ></div>
        <section class="breadcrumbs">
            <div class="_container breadcrumbs__container">
                {{ Breadcrumbs::render('page', $page) }}
            </div>
        </section>

        <section class="objects">
            <div class="_container objects__container">
                <h1>{{$page->title}}</h1>
                <div class="objects__cards">
                    @foreach($objects as $object)
                        <div class="objects__card">
                            <div class="objects__card-img">
                                <picture>
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($object->image)}}" alt="obj">
                                </picture>
                            </div>
                            <div class="objects__card-info">
                                <div class="title">{{$object->title}}</div>
                                <p>{{$object->text}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        @include('layouts.nova-motors.partials.faqs')
    </main>
@endsection
