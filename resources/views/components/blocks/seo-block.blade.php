
@if($title || $text)
    <section class="formated">
        <div class="_container formated__container">
            <div class="formated__wrapper">
                @if($title)
                    <div class="formated__heading">
                        <h1>{{$title}}</h1>
                    </div>
                @endif
                @if(strip_tags($text))
                    <div class="formated__content">
                        {!! $text !!}
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
