<footer class="footer">
    <div class="_container footer__container">
        <div class="footer__top top-footer">
            <div class="top-footer__wrapper">
                <div class="top-footer__item">
                    <div class="top-footer__item-logo">
                        <a href="{{route('home')}}" aria-label="home">
                            @if($settings->logo)
                                <i class="icon"
                                   style="background-image: url('{{\Illuminate\Support\Facades\Storage::url($settings->logo)}}')"></i>
                            @endif
                            <span class="top-footer__item-logo-text">
                                @if($settings->slogan_image)
                                    <i class="icon"
                                       style="background-image: url('{{\Illuminate\Support\Facades\Storage::url($settings->slogan_image)}}')"></i>
                                @endif
                                {{ $settings->slogan_text }}
                            </span>
                        </a>
                    </div>
                    <div class="top-footer__item-text">
                        <p>{{$settings->footer_text}}</p>
                    </div>
                </div>
                <div class="top-footer__item">
                    <div class="top-footer__item-col">
                        <div class="top-footer__item-row">
                            <div class="name">{{$menu->getMenuTitle('footer1')}}</div>
                            <ul>
                                @foreach($menu->getMenuItems('footer1') as $menuItem)
                                    <li><a href="{{$menuItem->url}}">{{$menuItem->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="top-footer__item-row">
                            <div class="name">{{$menu->getMenuTitle('footer2')}}</div>
                            <ul>
                                @foreach($menu->getMenuItems('footer2') as $menuItem)
                                    <li><a href="{{$menuItem->url}}">{{$menuItem->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="top-footer__item">
                    <div class="top-footer__item-col">
                        <div class="top-footer__item-row">
                            <div class="name">{{$menu->getMenuTitle('footer3')}}</div>
                            <ul>
                                @foreach($menu->getMenuItems('footer3') as $menuItem)
                                    <li><a href="{{$menuItem->url}}">{{$menuItem->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="top-footer__item">
                    <div class="top-footer__item-col">
                        <div class="top-footer__item-row contacts-row">
                            <div class="contacts-row__item">
                                @foreach($settings->phones as $phone)
                                    <a href="tel:{{\App\Helpers\Phone::getUrl($phone['phone'])}}"
                                       class="phone">{{$phone['phone']}}</a>
                                @endforeach
                            </div>
                            @if($settings->address)
                                <div class="contacts-row__item">
                                    <span>Адрес:</span>
                                    <a href="#" target="_blank" class="street">{{$settings->address}}</a>
                                </div>
                            @endif
                            @if($settings->email)
                                <div class="contacts-row__item">
                                    <span>Email:</span>
                                    <a href="mailto:{{$settings->email}}" target="_blank"
                                       class="mail">{{$settings->email}}</a>
                                </div>
                            @endif
                            <button class="btn-blue get-modal--call" data-popup="ajax"
                                    data-url="{{route('call-form')}}">Написать нам
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer__middle middle-footer">
            <div class="middle-footer__wrapper">
                <div class="middle-footer__info">
                    @foreach($menu->getMenuItems('bottom') as $menuItem)
                        <a href="{{$menuItem->url}}">{{$menuItem->title}}</a>
                    @endforeach
                </div>
                <div class="middle-footer__messengers">
                    <div class="middle-footer__messengers-text">
                        {{$settings->footer_text_right}}
                    </div>
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
        <div class="bottom-footer footer__bottom">
            <div class="bottom-footer__wrapper">
                <div class="bottom-footer__copy">
                    © {{date('Y')}}, {{$settings->footer_text_left}}
                </div>
                <div class="bottom-footer__public">
                    {{$settings->copyright_text}}
                </div>
                <div class="bottom-footer__develop">
                    <span>Разработка сайта:</span> <a href="https://promicom.ru/" target="_blank">Promicom</a>
                </div>
            </div>

        </div>
    </div>
</footer>
