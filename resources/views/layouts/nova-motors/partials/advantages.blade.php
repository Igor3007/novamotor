@if($advantages->count() > 0)
    <section class="advantages">
        <div class="_container advantages__container">
            <div class="advantages__heading">
                <h2>Наши преимущества</h2>
                <p>{{$settings->adv_text}}
                </p>
            </div>
            <div class="advantages__cards">
                @foreach($advantages as $advantage)
                    <div class="advantages__card card-advantages">
                        @if($advantage->image)
                            <div class="card-advantages__icon">
                                <i class="icon" style="background-image: url('{{\Illuminate\Support\Facades\Storage::url($advantage->image)}}')"></i>
                            </div>
                        @endif
                        <div class="card-advantages__content">
                            <h4>{{$advantage->title}}</h4>
                            <p>{{$advantage->description}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
