<div class="popup-common">
    <div class="popup-common__modal" id="modal-call">
        <div class="popup__wrapper">
            <div class="popup__body popup">
                <h2>{{$title}}</h2>

                <form method="post" action="{{route('call-answer-form')}}" class="v-form">
                    <input type="hidden" name="form_name" value="{{$titleForm}}">
                    <input type="hidden" name="page" value="{{url()->previous()}}">
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
                            <input type="tel" name="phone" placeholder="" id="NUMBER" required
                                   data-maska="+# (###) ###-##-##">
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
                        <button class="btn-blue btn-submit" type="submit" disabled="disabled">Отправить</button>
                        <div class="form-field--policy">
                            Нажимая на кнопку «Отправить», <br> вы соглашаетесь с нашей <a href="/policy">политикой
                                обработки данных</a>
                        </div>
                    </div>

                </form>


            </div>
        </div>
    </div>
</div>
