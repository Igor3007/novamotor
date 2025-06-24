<header class="header">
    <div class="header__fixed">
        <div class="header__main main-header">
            <div class="_container main-header__container">
                <div class="main-header__wrapper">
                    <div class="main-header__logo">
                        <a href="{{route('home')}}" aria-label="home">
                            @if($settings->logo)
                            <i class="icon"
                                style="background-image: url('{{\Illuminate\Support\Facades\Storage::url($settings->logo)}}')"></i>
                            @endif
                            <span class="main-header__logo-text">
                                @if($settings->slogan_image)
                                <i class="icon"
                                    style="background-image: url('{{\Illuminate\Support\Facades\Storage::url($settings->slogan_image)}}')"></i>
                                @endif
                                <small>{{ $settings->slogan_text }}</small>
                            </span>
                        </a>
                    </div>
                    <div class="main-header__actions">
                        <div class="catalog-btn main-header__catalog">
                            <div class="catalog-btn__btn" data-target="catalog">
                                <span class="icon"><i></i><i></i></span>
                                <div class="catalog-btn__btn-name">Каталог</div>
                            </div>
                        </div>
                        @if($menu->getMenuItems('top'))
                        <div class="main-header__nav">
                            <ul>
                                @foreach($menu->getMenuItems('top') as $menuItem)
                                <li>
                                    <a href="{{$menuItem->url}}">
                                        {{$menuItem->title}}
                                        @if($menuItem['child'])
                                        <i class="icon"
                                            style="background-image: url('/assets/images/icons/ic_arrow-clr.svg')"></i>
                                        @endif
                                    </a>
                                    @if($menuItem['child'])
                                    <div class="data-dropdown">
                                        <ul>
                                            @foreach($menuItem['child'] as $childrenMenuItem)
                                            <li>
                                                <a href="{{$childrenMenuItem->url}}">{{$childrenMenuItem->title}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="main-header__search">
                            <div class="btn-search main-header__search-btn">
                                <button class="btn-search__search" data-target="search">
                                    <i class="icon"
                                        style="background-image: url('/assets/images/icons/ic_search-blue.svg')"></i>
                                </button>
                            </div>
                            <div class="search-index" data-target="search">
                                <form action="#">
                                    <div class="search-index__form">
                                        <div class="search-index__field">
                                            <label class="search-index__input">
                                                <input type="text" name="q" autocomplete="off" placeholder="" value="">
                                            </label>
                                            <div class="search-index__btn">
                                                <button class="btn-search">
                                                    <i class="icon"
                                                        style="background-image: url('/assets/images/icons/ic_search.svg')"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="main-header__menu menu-btn">
                        <div class="menu-btn__btn" data-target="menu">
                            <span class="icon"><i></i><i></i></span>
                        </div>
                    </div>
                    <div class="info-header main-header__info">
                        <div class="info-header__wrapper">
                            <div class="info-header__socials">
                                <div class="phone-md" data-target="phone">
                                    <i class="icon"
                                        style="background-image: url('/assets/images/icons/ic_phone-clr.svg')"></i>
                                    <span class="icon-close">
                                        <i class="icon"
                                            style="background-image: url('/assets/images/icons/ic_p-close.svg')"></i>
                                    </span>
                                </div>
                                <a href="tel:{{\App\Helpers\Phone::getUrl($settings->phone)}}" class="phone">
                                    <i class="icon"
                                        style="background-image: url('/assets/images/icons/ic_phone-clr.svg')"></i>
                                    {{$settings->phone}}
                                    <i class="icon"
                                        style="background-image: url('/assets/images/icons/ic_arrow-clr.svg')"></i>
                                </a>
                                @if($settings->email)
                                <a href="mailto:{{$settings->email}}" class="mail">{{$settings->email}}</a>
                                @endif
                                <div class="socials-dropdown">
                                    <div class="socials-dropdown__wrapper">
                                        <div class="socials-dropdown__item">
                                            @foreach($settings->phones as $phone)
                                            <a href="tel:{{\App\Helpers\Phone::getUrl($phone['phone'])}}"
                                                class="phone">{{$phone['phone']}}</a>
                                            @endforeach
                                        </div>
                                        @if($settings->address)
                                        <div class="socials-dropdown__item">
                                            <span>Адрес:</span>
                                            <a href="#" target="_blank" class="street">{{$settings->address}}</a>
                                        </div>
                                        @endif
                                        @if($settings->email)
                                        <div class="socials-dropdown__item">
                                            <span>Email:</span>
                                            <a href="mailto:{{$settings->email}}" target="_blank"
                                                class="mail">{{$settings->email}}</a>
                                        </div>
                                        @endif
                                        <button class="btn-blue">
                                            Заказать звонок
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="info-header__messengers">
                                <div class="messengers">
                                    <ul>
                                        @foreach($socialServices as $socialService)
                                        <li>
                                            <a href="{{$socialService->url}}" target="_blank">
                                                <i class="icon"
                                                    style="background-image: url('{{\Illuminate\Support\Facades\Storage::url($socialService->icon)}}')"></i>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-menu" data-window="menu">
        <div class="_container mobile-menu__container">
            <div class="mobile-menu__wrapper">
                <div class="mobile-menu__cards">
                    @foreach($categories as $category)
                    <a href="{{$category->url}}" class="mobile-menu__card">
                        <h4>{{$category->title}}</h4>
                        <div class="mobile-menu__card-img">
                            @if($category->image)
                            <picture>
                                <img src="{{\Illuminate\Support\Facades\Storage::url($category->image)}}"
                                    alt="catalog">
                            </picture>
                            @endif
                        </div>
                    </a>
                    @endforeach
                </div>
                <div class="mobile-menu__catalog">
                    <div class="mobile-menu__catalog-list">

                    </div>
                </div>
                <div class="mobile-menu__search">
                    <div class="search-index">
                        <form action="#">
                            <div class="search-index__form">
                                <div class="search-index__field">
                                    <label class="search-index__input">
                                        <input type="text" name="q" autocomplete="off" placeholder="Поиск" value="">
                                    </label>
                                    <div class="search-index__btn">
                                        <button class="btn-search">
                                            <i class="icon"
                                                style="background-image: url('/assets/images/icons/ic_search.svg')"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="phone-menu" data-window="phone">
        <div class="_container phone-menu__container">
            <div class="phone-menu__wrapper">

                <div class="phone-menu__items">
                    <div class="phone-menu__item">
                        @foreach($settings->phones as $phone)
                        <a href="tel:{{\App\Helpers\Phone::getUrl($phone['phone'])}}"
                            class="phone">{{$phone['phone']}}</a>
                        @endforeach
                    </div>
                    @if($settings->address)
                    <div class="phone-menu__item">
                        <span>Адрес:</span>
                        <a href="#" target="_blank" class="street">{{$settings->address}}</a>
                    </div>
                    @endif
                    @if($settings->email)
                    <div class="phone-menu__item">
                        <span>Email:</span>
                        <a href="mailto:{{$settings->email}}" target="_blank" class="mail">{{$settings->email}}</a>
                    </div>
                    @endif
                </div>
                <button class="btn-blue">
                    Заказать звонок
                </button>
            </div>
        </div>
    </div>
    <div class="catalog-list" data-window="catalog">
        <div class="_container catalog-list__container">
            <div class="catalog-list__body">
                <div class="catalog-list__items">
                    @foreach($categories as $category)
                    <a href="{{$category->url}}" class="catalog-list__item">
                        <div class="catalog-list__item-wrapper">
                            <div class="catalog-list__item-info">
                                <h2>{{$category->title}}</h2>
                                {!! $category->description !!}
                            </div>
                            <div class="catalog-list__item-img">
                                @if($category->image)
                                <picture>
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($category->image)}}"
                                        alt="catalog">
                                </picture>
                                @endif
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="modal-search" data-window="search" data-search-id="main">
        <div class="modal-search__body">
            <div class="modal-search__btn" data-close="close">
                <span class="icon">
                    <i></i>
                    <i></i>
                </span>
            </div>
            <div class="_container modal-search__container">
                <div class="modal-search__wrapper">
                    <div class="search-index" data-target="search">
                        <form action="#">
                            <div class="search-index__form">
                                <div class="search-index__field">
                                    <div class="search-index__btn">
                                        <div class="btn-search">
                                            <i class="icon"
                                                style="background-image: url('/assets/images/icons/ic_search.svg')"></i>
                                        </div>
                                    </div>
                                    <label class="search-index__input">
                                        <input type="text" name="q" autocomplete="off"
                                            placeholder="пример вводимого текста" value="">
                                    </label>
                                    <button class="btn-blue btn-result">
                                        Найти
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="search-results" style="display: none">
                        <div class="search-results__title">
                            <h2>Результаты поиска:</h2>
                        </div>
                        <div class="search-results__list">
                            <ul></ul>
                        </div>
                        <div class="btn-search-res search-results__more">
                            <i class="icon"
                                style="background-image: url('/assets/images/icons/ic_arrow-d-search.svg')"></i>
                            Показать все результаты
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>