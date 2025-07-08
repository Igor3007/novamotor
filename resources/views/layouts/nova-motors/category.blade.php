@extends('layouts.nova-motors.app')

@section('content')
<main class="page">
    <div data-observ></div>
    <section class="breadcrumbs">
        <div class="_container breadcrumbs__container">
            {{ Breadcrumbs::render('category', $category) }}
        </div>
    </section>

    <section class="category">
        <div class="_container category__container">
            <div class="category__wrapper">
                <div class="category__content">
                    <div class="category__content-links">
                        <ul>
                            @foreach($categories as $linkCategory)
                            <li @if($linkCategory->id == $category->id) class="current" @endif>
                                <a href="{{$linkCategory->url}}">{{$linkCategory->shortTitle}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <h1>{{$h1}}</h1>
                    <div class="category__content-info info-category">
                        <div class="info-category__actions">
                            <button class="btn-blue get-modal--consultation" data-popup="ajax" data-url="/form/consultation">
                                Заказать консультацию
                            </button>
                            <a href="#motor-table" class="btn-down">
                                <i class="icon" style="background-image: url('/assets/images/icons/ic_down.svg')"></i>
                                <span>Выбрать двигатель</span>
                            </a>
                            @if($category->price_list)
                            <a href="{{\Illuminate\Support\Facades\Storage::url($category->price_list)}}" download="" class="btn-download">
                                <i class="icon" style="background-image: url('/assets/images/icons/ic_doc.svg')"></i>
                                <span>{{$category->price_list_title}}</span>
                            </a>
                            @endif
                        </div>
                        <div class="info-category__content">
                            {!! $category->description !!}

                            {{--
                            @if($category->decoding_file)
                            <a href="{{\Illuminate\Support\Facades\Storage::url($category->decoding_file)}}" download="" class="btn-transcript">
                                <i class="icon" style="background-image: url('/assets/images/icons/ic_transcript.svg')"></i>
                                <span>Расшифровка условных обозначений</span>
                            </a>
                            @endif
                            --}}
                            <div class="info-category__content-list">
                                {!! $category->common_props !!}
                            </div>

                        </div>
                    </div>
                </div>
                @if($category->image)
                <div class="category__img">
                    <picture>
                        <img src="{{\Illuminate\Support\Facades\Storage::url($category->image)}}" alt="category">
                    </picture>
                </div>
                @endif
            </div>
        </div>
    </section>

    @if($properties->count() > 0)
    <section class="characteristics" id="motor-table">
        <div class="_container characteristics__container">
            <div class="characteristics__heading">
                <h2>Каталог двигателей</h2>
                <p>
                    Тяните таблицу <span>влево</span>
                    или <span>вправо</span>, чтобы посмотреть <code>все</code> характеристики <code>(если
                        они не вмещаются на экране)</code>.</p>
            </div>
            <div class="characteristics__table dragscroll">
                <table>
                    <tr class="table-head">
                        <td>Наименование</td>
                        @foreach($properties as $property)
                        <td>{{$property->title}}</td>
                        @endforeach
                        {{--
                                <td>Цена, руб.</td>
                                --}}

                    </tr>
                    @foreach($products as $product)
                    <tr>
                        <td><a href="{{$product->url}}">{{$product->title}}</a></td>
                        @foreach($properties as $property)
                        <td>
                            @php
                            $productProperty = $product->properties->first(function(\App\Models\Property $productProperty) use ($property) {
                            return $property->id == $productProperty->id;
                            })
                            @endphp
                            @if($productProperty)
                            {{$productProperty->pivot->value}}
                            @else
                            -
                            @endif
                        </td>
                        @endforeach
                        {{--
                                    <td>{!! $product->formatMinPrice !!}</td>
                                    --}}
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
    @endif

    <x-blocks.seo-block/>

    @include('layouts.nova-motors.partials.faqs')
</main>
@endsection
