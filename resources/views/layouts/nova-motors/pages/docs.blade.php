@extends('layouts.nova-motors.app')

@section('content')

    <main class="page">
        <div data-observ></div>
        <section class="breadcrumbs">
            <div class="_container breadcrumbs__container">
                {{ Breadcrumbs::render('page', $page) }}
            </div>
        </section>

        <section class="docs">
            <div class="_container docs__container">
                <h1>{{$h1}}</h1>
                <div class="docs__wrapper">
                    @foreach($documentGroups as $group)
                        @if($group->documents->count() == 0) @continue @endif
                        <div class="docs__items">
                            <h2>{{$group->title}}</h2>
                            @foreach($group->documents as $document)
                                <div class="docs__item">
                                    <div class="docs__item-heading">
                                        <a href="{{\Illuminate\Support\Facades\Storage::url($document->file)}}" target="_blank">
                                            <i class="icon" style="background-image: url('/assets/images/icons/ic_doc-download.svg')"></i>
                                            {{$document->title}}
                                        </a>
                                    </div>
                                    <p>{{$document->text}}</p>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <x-blocks.seo-block/>
    </main>
@endsection
