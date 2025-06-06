import {MaskInput} from "maska";

document.addEventListener('DOMContentLoaded', function () {
    class afLightbox {
        constructor(option = {}) {
            this.modal = null;
            this.mobileBottom = option.mobileInBottom || false;
        }

        createTemplate() {
            const template = document.createElement('div');
            template.innerHTML = `
                <div class="af-popup">
                    <div class="af-popup__bg"></div>
                    <div class="af-popup__wrp">
                        <div class="af-popup__container">
                            <div class="af-popup__content"></div>
                        </div>
                    </div>
                </div>
            `;
            document.body.append(template);
            this.instance = template;
            return template;
        }

        open(content, afterShow) {
            this.modal = this.createTemplate();

            if (window.innerWidth <= 480 && this.mobileBottom) {
                this.modal.querySelector(".af-popup").classList.add("af-popup--mobile");
            }

            document.body.classList.add('page-hidden');
            this.modal.querySelector('.af-popup__content').innerHTML = content;

            this.addCloseListeners();
            this.initializeValidation();

            if (afterShow) afterShow(this.modal);

            setTimeout(() => {
                this.modal.querySelector(".af-popup").classList.add("af-popup--visible");
            }, 10);

            this.createEvent();
        }

        initializeValidation() {
            const form = this.modal.querySelector('form');
            if (!form) return;

            const inputs = form.querySelectorAll('input[required], textarea[required]');
            const submitButton = form.querySelector('button[type="submit"]');
            if (submitButton) {
                submitButton.setAttribute('disabled', 'true');
            }

            inputs.forEach(input => {
                input.addEventListener('input', () => {
                    this.validateInput(input, submitButton);
                    this.checkAllInputs(inputs, submitButton);
                });
            });

            form.addEventListener('submit', (e) => {
                e.preventDefault();
                let isValid = true;
                inputs.forEach(input => {
                    if (!this.validateInput(input, submitButton)) {
                        isValid = false;
                    }
                });
                if (isValid) {
                    fetch(form.action, {
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']").getAttribute("content")
                        },
                        method: 'POST',
                        body: new FormData(form)
                    })
                        .then(response => response.json())
                        .then(function (data) {
                            form.querySelectorAll('.is-error').forEach(error => {
                                error.classList.remove('.is-error');
                            });

                            if(form.querySelector('.success')) {
                                form.querySelector('.success').remove();
                            }

                            if(!data.success) {
                                data.errors.forEach(inputName => {
                                    let input = form.querySelector('[name="'+inputName+'"]');
                                    if(input) {
                                        input.classList.add('is-error');
                                        if(input.closest('.form-field')) {
                                            input.closest('.form-field').classList.add('is-error');
                                        }
                                    }
                                });
                            }
                            else {
                                let div = document.createElement('div');
                                div.classList.add('success');
                                div.style.color = 'green';
                                div.innerText = 'Сообщение успешно отправлено';
                                div.style.paddingBottom = '10px';
                                form.insertBefore(div, form.querySelector('.form-fields--submit'));

                                form.reset();
                            }
                        })







                   // this.close();
                }
            });
        }

        validateInput(input, submitButton) {
            const value = input.value.trim();
            let isValid = true;
            input.classList.remove('err');

            if (input.hasAttribute('required') && !value) {
                isValid = false;
            } else if (input.type === 'email' && !this.validateEmail(value)) {
                isValid = false;
            } else if (input.type === 'tel' && !this.validatePhone(value)) {
                isValid = false;
            }

            if (!isValid) {
                input.classList.add('err');
                if (submitButton) submitButton.setAttribute('disabled', 'true');
            } else {
                if (submitButton) submitButton.removeAttribute('disabled');
            }

            return isValid;
        }

        checkAllInputs(inputs, submitButton) {
            const allValid = Array.from(inputs).every(input => input.value.trim());
            if (submitButton) {
                if (allValid) {
                    submitButton.removeAttribute('disabled');
                } else {
                    submitButton.setAttribute('disabled', 'true');
                }
            }
        }

        validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        validatePhone(phone) {
            const digits = phone.replace(/\D/g, '');
            return digits.length === 11;
        }

        addCloseListeners() {
            const closeElements = this.modal.querySelectorAll('.af-popup__close, [data-af-popup="close"]');
            closeElements.forEach(element => {
                element.addEventListener('click', () => this.close());
            });
        }

        createEvent() {
            const container = this.instance.querySelector('.af-popup');
            let isMoving = false;

            container.addEventListener('mousedown', () => {
                isMoving = true;
            });

            document.addEventListener('mousemove', () => {
                if (isMoving) container.classList.add('is-moving');
            });

            document.addEventListener('mouseup', () => {
                if (isMoving) {
                    isMoving = false;
                    setTimeout(() => {
                        container.classList.remove('is-moving');
                    }, 100);
                }
            });

            container.addEventListener('click', (e) => {
                if (!e.target.closest('.af-popup__container') && !container.classList.contains('is-moving')) {
                    this.close();
                }
            });

            this.instance.querySelector('.af-popup__container').addEventListener('click', (event) => {
                event.stopPropagation();
            });
        }

        close() {
            this.modal.querySelector('.af-popup').classList.remove('af-popup--visible');
            setTimeout(() => {
                this.instance.remove();
                document.body.classList.remove('page-hidden');
            }, 300);
        }
    }

    document.querySelectorAll('[data-popup="ajax"]').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const url = button.getAttribute('data-url');
            if (!url) return;

            fetch(url)
                .then(res => {
                    if (!res.ok) throw new Error('Ошибка при загрузке попапа');
                    return res.text();
                })
                .then(html => {
                    const popup = new afLightbox({ mobileInBottom: true });

                    const wrappedHtml = `
                        <div class="popup-common">
                            <div class="af-popup__close">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" tabindex="-1">
                                    <path d="M20 20L4 4m16 0L4 20"></path>
                                </svg>
                            </div>
                            <div class="popup-common__content">${html}</div>
                        </div>
                    `;

                    popup.open(wrappedHtml, (instance) => {
                        if (window.initSendForm) {
                            window.initSendForm(instance, () => popup.close());
                        }
                        const {MaskInput} = Maska;
                        new MaskInput("[data-maska]");
                    });
                })
                .catch(err => {
                    console.error('Ошибка загрузки попапа:', err);
                });
        });
    });
});
