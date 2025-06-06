<section class="form-contacts">
    <div class="_container form-contacts__container">
        <div class="form-contacts__wrapper">
            <div class="form-contacts__heading">
                <h2>Напишите нам</h2>
                <p>Наши сотрудники помогут выполнить подбор двигателя и расчёт цены с учётом ваших требований!</p>
            </div>
            <div class="form-contacts__form">
                <form method="post" action="{{route('contacts-form')}}" class="v-form">
                    @csrf
                    <input type="hidden" name="form_name" value="Контакты">
                    <input type="hidden" name="page" value="{{request()->url()}}">
                    <div class="form-fields">
                        <div class="form-field">
                            <label for="NAME">Ваше имя</label>
                            <input type="text" name="name" id="NAME" required maxlength="24">
                        </div>
                        <div class="form-field">
                            <label for="COMPANY-NAME">Название компании (необязательно)</label>
                            <input type="text" name="company" id="COMPANY-NAME" maxlength="24">
                        </div>
                    </div>

                    <div class="form-fields">
                        <div class="form-field">
                            <label for="NUMBER">Номер телефона</label>
                            <input type="text" name="phone" placeholder="" id="NUMBER" required data-maska="+# (###) ###-##-##">
                        </div>
                        <div class="form-field">
                            <label for="EMAIL">Email (необязательно)</label>
                            <input type="email" name="email" id="EMAIL" maxlength="24">
                        </div>
                    </div>
                    <div class="form-field">
                        <label for="MESSAGE">Сообщение</label>
                        <textarea name="message" id="MESSAGE" required maxlength="360"></textarea>
                    </div>
                    <div data-success=""></div>
                    <div class="form-fields--submit">
                        <button class="btn-blue btn-submit">Отправить</button>
                        <div class="form-field--policy">
                            Нажимая на кнопку «Отправить», <br> вы соглашаетесь с нашей <a href="/policy">политикой
                                обработки данных</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
