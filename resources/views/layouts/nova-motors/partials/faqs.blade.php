@if($faqs->count() > 0)
    <section class="faq">
        <div class="_container faq__container">
            <div class="faq__wrapper">
                <div class="faq__heading">
                    <h2>Часто задаваемые <br> вопросы</h2>
                    <p>Наши цены остаются самыми низкими и конкурентными. Мы ценим и любим своих клиентов,
                        придерживаемся принципов порядочности, открытости и доверительности в делах. Если у вас есть
                        другие вопросы, с радостью на всё ответим и проконсультируем.</p>
                </div>
                <div class="accordion">
                    @foreach($faqs as $i => $faq)
                        <div class="accordion__item @if($i == 0) INIT @endif ">
                            <div class="accordion__head">
                                <div class="name">{{$faq->title}}</div>
                                <span class="icon">
                                    <i></i>
                                    <i></i>
                                </span>
                            </div>
                            <div class="accordion__text @if($i == 0) INIT @endif ">
                                <div class="accordion__text-body">
                                    {!! $faq->text !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
