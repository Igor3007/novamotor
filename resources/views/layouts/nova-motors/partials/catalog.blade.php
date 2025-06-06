<div class="catalog__cards">
    @foreach($categories as $category)
        <div class="card-catalog catalog__card">
            @if($category->image)
                <div class="card-catalog__img">
                    <picture>
                        <img src="{{\Illuminate\Support\Facades\Storage::url($category->image)}}" alt="catalog">
                    </picture>
                </div>
            @endif
            <div class="card-catalog__content">
                <div class="card-catalog__content-heading">
                    <h2><a href="{{$category->url}}">{{$category->title}}</a></h2>
                    {!! $category->description !!}
                </div>
                @if($category->products->count() > 0)
                    <div class="card-catalog__content-list">
                        <h3>Наименования моделей:</h3>
                        <ul>
                            @foreach($category->products as $product)
                                <li><a href="{{$product->url}}">{{$product->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-catalog__content-action">
                    <a href="{{$category->url}}" class="btn-blue">Смотреть все {{$category->firstLowerCharTitle}}</a>
                    @if($category->price_list)
                        <a href="{{\Illuminate\Support\Facades\Storage::url($category->price_list)}}" download=""
                           class="btn-download btn-formated">
                            <i class="icon" style="background-image: url('/assets/images/icons/ic_doc.svg')"></i>
                            <span>{{$category->price_list_title}}</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
