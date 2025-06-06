@if($specializations->count() > 0)
    <section class="specialize">
        <div class="_container specialize__container">
            <h2>Специализация</h2>
            <div class="specialize__cards">
                @foreach($specializations as $specialization)
                    <div class="specialize__card">
                        <h4>{{$specialization->title}}</h4>
                        {!! $specialization->text !!}
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
