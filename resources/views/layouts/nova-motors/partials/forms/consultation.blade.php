<form method="post" action="{{route('fast-answer-form')}}" class="v-form">
    @csrf
    <input type="hidden" name="form_name" value="Быстрый подбор двигателя">
    <input type="hidden" name="page" value="{{request()->url()}}">
    <div class="form-field">
        <label for="NAME"></label>
        <input type="text" name="name" placeholder="Ваше имя" id="NAME" maxlength="24">
    </div>
    <div class="form-field">
        <label for="NUMBER"></label>
        <input type="text" name="phone" placeholder="Номер телефона" id="NUMBER" required data-maska="+# (###) ###-##-##">
    </div>
    <div data-success=""></div>
    <button class="btn-blue btn-submit">Заказать консультацию</button>
    <div class="form-field--policy">
        Нажимая на кнопку «Заказать консультацию», вы соглашаетесь с нашей <a href="/policy">политикой
            обработки данных</a>
    </div>
</form>
