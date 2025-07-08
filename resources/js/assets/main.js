import Splide from "@splidejs/splide";
import { Mask, MaskInput } from "maska"



document.querySelectorAll('.faq').forEach(container => {
    const accordionHeads = container.querySelectorAll('.accordion__item');
    const icons = container.querySelectorAll('.accordion__head .icon');

    const toggleAccordion = (accordionHead) => {
        const accordionInfo = accordionHead.querySelector('.accordion__text');
        const isOpen = accordionInfo.classList.contains('INIT');

        accordionHeads.forEach(head => {
            const info = head.querySelector('.accordion__text');
            head.classList.remove('INIT');
            info.classList.remove('INIT');
        });

        if (!isOpen) {
            accordionHead.classList.add('INIT');
            accordionInfo.classList.add('INIT');

            if (window.innerWidth <= 768) {
                const offset = 100;
                const elementPosition = accordionHead.getBoundingClientRect().top + window.scrollY;
                const scrollToPosition = elementPosition - offset;

                window.scrollTo({
                    top: scrollToPosition,
                    behavior: 'smooth',
                });
            }
        }
    };

    accordionHeads.forEach(accordionHead => {
        accordionHead.addEventListener('click', () => {
            toggleAccordion(accordionHead);
        });
    });

    icons.forEach(icon => {
        icon.addEventListener('click', (event) => {
            event.stopPropagation();
            toggleAccordion(icon.closest('.accordion__item'));
        });
    });
});


if (document.querySelector('[data-slider="product-main"]')) {

    const sliderMain = new Splide('[data-slider="product-main"]', {
        type: 'fade',
        gap: 16,
        pagination: false,
        arrows: false,
        cover: true,
        mediaQuery: 'min',
        breakpoints: {
            991.98: {
                pagination: false,
                gap: 32,
                focus: 'center',

            }
        }
    });

    const thumbnails = new Splide('[data-slider="product-thumb"]', {
        rewind: true,
        isNavigation: true,
        gap: 8,
        fixedWidth: 64,
        fixedHeight: 48,
        updateOnMove: true,
        cover: true,
        arrows: false,
        pagination: false,
        mediaQuery: 'min',
        dragMinThreshold: {
            mouse: 4,
            touch: 10,
        },
        breakpoints: {
            991.98: {
                gap: 12,
                fixedWidth: 80,
                fixedHeight: 60,
            }
        }

    });

    sliderMain.sync(thumbnails);
    sliderMain.mount();
    thumbnails.mount();

}


function initializeTabs(containerSelector, tabSelector, tabContentSelector) {
    let containers = document.querySelectorAll(containerSelector);

    containers.forEach(function (container) {
        let tabs = container.querySelectorAll(tabSelector);
        let tabContents = container.querySelectorAll(tabContentSelector);

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                tabs.forEach(function (t) {
                    t.classList.remove('active-tab');
                });
                tab.classList.add('active-tab');

                let tabName = tab.getAttribute('data-tab');

                tabContents.forEach(function (content) {
                    content.classList.remove('active-content');
                });

                let targetContent = container.querySelector(`#${tabName}`);
                if (targetContent) {
                    targetContent.classList.add('active-content');
                }
            });
        });
    });
}

initializeTabs('.i-product', '.tabs-custom__tab', '.tabs-custom__tab-content');


function initializeGalleryOpen(iconSelector, gallerySelector) {
    document.addEventListener('DOMContentLoaded', function () {
        let zoomIcon = document.querySelector(iconSelector);
        let firstGalleryItem = document.querySelector(`${gallerySelector} a[data-fslightbox]`);

        if (!zoomIcon || !firstGalleryItem) return;

        zoomIcon.addEventListener('click', function (event) {
            event.preventDefault();
            refreshFsLightbox();
            setTimeout(() => {
                firstGalleryItem.click();
            }, 100);
        });
    });
}

initializeGalleryOpen('.product__slider-zoom', '.product');


document.addEventListener('DOMContentLoaded', function (event) {
    function easeScroll() {
        const links = document.querySelectorAll('a[href^="#"]');
        links.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();

                const target = document.querySelector(link.getAttribute('href'));
                const targetOffset = target.getBoundingClientRect().top + window.pageYOffset;
                const startOffset = 0;
                const scrollOffset = 90;
                const scrollToOffset = startOffset + (targetOffset - startOffset) - scrollOffset;
                window.scrollTo({
                    top: scrollToOffset,
                    behavior: 'smooth'
                });
            });
        });

    }

    easeScroll()
})



document.addEventListener('DOMContentLoaded', () => {
    const headerMain = document.querySelector('.main-header');
    let lastScrollY = 0;

    const handleScroll = () => {
        const scrollY = window.scrollY;
        headerMain.classList.toggle('fixed', scrollY > 200);
        lastScrollY = scrollY;
    };

    window.addEventListener("scroll", handleScroll, { passive: true });
});


document.addEventListener("DOMContentLoaded", function () {
    const actionButtons = document.querySelectorAll('[data-target]');
    const overlay = document.querySelector('[data-observ]');
    const closeButtons = document.querySelectorAll('[data-close="close"]');
    const searchInputs = document.querySelectorAll('.search-index');
    const searchFields = document.querySelectorAll('.modal-search[data-window="search"]');
    const mobileMenuSearch = document.querySelector('.mobile-menu__search'); // Контейнер поиска

    function toggleWindow(target) {
        const windowElement = document.querySelector(`[data-window="${target}"]`);
        if (!windowElement) return;

        const isActive = windowElement.classList.toggle('is--active');
        if (overlay) overlay.classList.toggle('is-active', isActive);

        document.querySelectorAll("[data-window]").forEach((el) => {
            if (el !== windowElement) el.classList.remove('is--active');
        });

        actionButtons.forEach((btn) => {
            if (btn.getAttribute('data-target') !== target) {
                btn.classList.remove('is--active');
            }
        });

        document.body.classList.toggle("b--open", isActive);
    }

    function closeWindows() {
        document.querySelectorAll("[data-window]").forEach(el => el.classList.remove("is--active"));
        if (overlay) overlay.classList.remove('is-active');
        actionButtons.forEach(btn => btn.classList.remove('is--active'));

        document.body.classList.remove("b--open");
    }

    actionButtons.forEach((button) => {
        button.addEventListener('click', function (event) {
            event.stopPropagation();
            const target = button.getAttribute('data-target');

            button.classList.toggle('is--active');
            toggleWindow(target);
        });
    });

    searchInputs.forEach((searchInput) => {
        const input = searchInput.querySelector("input");

        if (input) {
            input.addEventListener("focus", function (event) {
                event.stopPropagation();

                if (mobileMenuSearch && mobileMenuSearch.contains(event.target)) {
                    return;
                }

                const target = 'search';
                toggleWindow(target);
                searchFields.forEach(field => field.classList.add("is--active"));
                document.body.classList.add("b--open");
            });

            input.addEventListener("click", function (event) {
                event.stopPropagation();

                if (mobileMenuSearch && mobileMenuSearch.contains(event.target)) {
                    return;
                }
            });
        }
    });

    document.addEventListener('click', function (event) {
        if (
            ![...actionButtons].some(btn => btn.contains(event.target)) &&
            ![...document.querySelectorAll('[data-window]')].some(win => win.contains(event.target)) &&
            ![...searchInputs].some(input => input.contains(event.target))
        ) {
            closeWindows();
        }
    });

    closeButtons.forEach(closeBtn => {
        closeBtn.addEventListener("click", function (event) {
            event.stopPropagation();
            closeWindows();
        });
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const mobileWrapper = document.querySelector('.mobile-menu__catalog-list');

    function cloneList(sourceSelector) {
        const sourceList = document.querySelector(sourceSelector);
        if (sourceList && mobileWrapper) {
            const clonedList = sourceList.cloneNode(true);
            const mobileMenuBlock = document.createElement('div');
            mobileMenuBlock.classList.add('mobile-menu__catalog-list-cloned');

            mobileMenuBlock.appendChild(clonedList);
            mobileWrapper.appendChild(mobileMenuBlock);
        }
    }

    cloneList('.data-dropdown ul');
});


if (document.querySelector('[data-slider="slider-banner"]')) {

    const sliderBanner = new Splide('[data-slider="slider-banner"]', {
        type: 'slide',
        gap: 16,
        pagination: false,
        arrows: false,
        cover: true,
        mediaQuery: 'min',
        breakpoints: {
            991.98: {}
        }
    });

    sliderBanner.mount();

    document.querySelectorAll('.slider-banner__prev').forEach(button => {
        button.addEventListener('click', () => sliderBanner.go('<'));
    });

    document.querySelectorAll('.slider-banner__next').forEach(button => {
        button.addEventListener('click', () => sliderBanner.go('>'));
    });

}


function validateForm(form) {
    if (!form) return;

    const submitButton = form.querySelector('.btn-submit');
    if (!submitButton) return;

    const fields = Array.from(form.querySelectorAll('.form-field input, .form-field textarea'))
        .filter(input => !input.disabled);

    function validateFields() {
        let isValid = true;

        fields.forEach(field => {
            const parentField = field.closest('.form-field');
            if (!parentField) return;

            if (field.hasAttribute('required') && !field.value.trim()) {
                field.classList.add('is-error');
                parentField.classList.add('is-error');
                isValid = false;
            } else {
                field.classList.remove('is-error');
                parentField.classList.remove('is-error');
            }
        });

        return isValid;
    }

    function handleFieldInput(event) {
        const field = event.target;
        const parentField = field.closest('.form-field');

        if (field.value.trim()) {
            field.classList.remove('is-error');
            if (parentField) parentField.classList.remove('is-error');
        }
    }

    fields.forEach(field => {
        field.addEventListener('input', handleFieldInput);
    });


    function validateFormHandler() {
        let isFormValid = validateFields();

        return isFormValid;
    }

    submitButton.addEventListener('click', function (event) {
        if (validateFormHandler()) {
            event.preventDefault();

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

                    if (form.querySelector('.success')) {
                        form.querySelector('.success').remove();
                    }

                    if (!data.success) {
                        data.errors.forEach(inputName => {
                            let input = form.querySelector('[name="' + inputName + '"]');
                            if (input) {
                                input.classList.add('is-error');
                                if (input.closest('.form-field')) {
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

                        form.querySelector('[data-success]').appendChild(div)
                        form.reset();
                    }
                })
        }
    });
}

document.querySelectorAll('.v-form').forEach(form => {
    validateForm(form);
});


document.querySelectorAll('form').forEach(form => {
    //const {MaskInput} = Mask
    new MaskInput("[data-maska]")
});


document.addEventListener("DOMContentLoaded", function () {
    const API_YMAPS = 'https://api-maps.yandex.ru/2.1/?lang=ru_RU';
    let ymapsLoaded = typeof window.ymaps !== 'undefined';
    let ymapsCallbacks = [];

    async function loadApiYmaps() {
        if (ymapsLoaded) {
            return window.ymaps;
        } else {
            return new Promise((resolve, reject) => {
                ymapsCallbacks.push(resolve);
                const script = document.createElement('script');
                script.src = API_YMAPS;
                script.onload = () => {
                    ymapsLoaded = true;
                    ymapsCallbacks.forEach(cb => cb(window.ymaps));
                    ymapsCallbacks = [];
                };
                script.onerror = reject;
                document.head.append(script);
            });
        }
    }

    async function initMap(mapContainer) {
        const coordinates = JSON.parse(mapContainer.getAttribute('data-coord'));
        const ymaps = await loadApiYmaps();
        ymaps.ready(function () {
            const mapInstance = new ymaps.Map(mapContainer.id, {
                center: coordinates,
                zoom: 18,
                type: 'yandex#map',
                controls: ['zoomControl'],
            }, {
                searchControlProvider: 'yandex#search',
                suppressMapOpenBlock: true,
                zoomControlPosition: {
                    right: 32,
                    top: 32
                },
            });


            const placemark = new ymaps.Placemark(coordinates, {}, {
                iconLayout: 'default#image',
                iconImageHref: 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjgiIHZpZXdCb3g9IjAgMCA2MCA2OCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4NCjxnIGNsaXAtcGF0aD0idXJsKCNjbGlwMF81MDdfNTYzMykiPg0KPGcgZmlsdGVyPSJ1cmwoI2ZpbHRlcjBfZl81MDdfNTYzMykiPg0KPHBhdGggZD0iTTMwLjUxIDU2LjUyM0MzMC41MDQxIDU2LjY1MTYgMzAuNDQ4OCA1Ni43NzI5IDMwLjM1NTcgNTYuODYxOEMzMC4yNjI1IDU2Ljk1MDYgMzAuMTM4NyA1Ny4wMDAxIDMwLjAxIDU3QzI5LjcyIDU3IDI5LjUgNTYuNzkgMjkuNDkgNTYuNTIzQzI5LjM0NSA1My4zNTUgMjcuNzM0IDUxLjMwNiAyNC42NTggNTAuMzc2QzE0LjUzIDQ3Ljk2OCA3IDM4Ljg2MyA3IDI4QzcgMTUuMjk3IDE3LjI5NyA1IDMwIDVDNDIuNzAzIDUgNTMgMTUuMjk3IDUzIDI4QzUzIDM4Ljg2MyA0NS40NyA0Ny45NjggMzUuMzQyIDUwLjM3NkMzMi4yNjYgNTEuMzA2IDMwLjY1NSA1My4zNTYgMzAuNTEyIDU2LjUyM0gzMC41MVoiIGZpbGw9IiNGRjAwMDAiLz4NCjwvZz4NCjxwYXRoIGQ9Ik0zMC41MSA1Ni41MjNDMzAuNTA0MSA1Ni42NTE2IDMwLjQ0ODggNTYuNzcyOSAzMC4zNTU3IDU2Ljg2MThDMzAuMjYyNSA1Ni45NTA2IDMwLjEzODcgNTcuMDAwMSAzMC4wMSA1N0MyOS43MiA1NyAyOS41IDU2Ljc5IDI5LjQ5IDU2LjUyM0MyOS4zNDUgNTMuMzU1IDI3LjczNCA1MS4zMDYgMjQuNjU4IDUwLjM3NkMxNC41MyA0Ny45NjggNyAzOC44NjMgNyAyOEM3IDE1LjI5NyAxNy4yOTcgNSAzMCA1QzQyLjcwMyA1IDUzIDE1LjI5NyA1MyAyOEM1MyAzOC44NjMgNDUuNDcgNDcuOTY4IDM1LjM0MiA1MC4zNzZDMzIuMjY2IDUxLjMwNiAzMC42NTUgNTMuMzU2IDMwLjUxMiA1Ni41MjNIMzAuNTFaIiBmaWxsPSIjRkYwMDAwIi8+DQo8cGF0aCBkPSJNMzAgNjhDMjcuNzkgNjggMjYgNjYuMjEgMjYgNjRDMjYgNjEuNzkgMjcuNzkgNjAgMzAgNjBDMzIuMjEgNjAgMzQgNjEuNzkgMzQgNjRDMzQgNjYuMjEgMzIuMjEgNjggMzAgNjhaIiBmaWxsPSJ3aGl0ZSIvPg0KPHBhdGggZD0iTTI5Ljk5OTcgNjZDMzAuMjY2IDY2LjAwNiAzMC41MzA5IDY1Ljk1ODggMzAuNzc4NyA2NS44NjFDMzEuMDI2NiA2NS43NjMzIDMxLjI1MjQgNjUuNjE3IDMxLjQ0MjkgNjUuNDMwOEMzMS42MzM0IDY1LjI0NDYgMzEuNzg0OCA2NS4wMjIyIDMxLjg4ODIgNjQuNzc2NkMzMS45OTE2IDY0LjUzMTEgMzIuMDQ0OSA2NC4yNjc0IDMyLjA0NDkgNjQuMDAxQzMyLjA0NSA2My43MzQ2IDMxLjk5MTggNjMuNDcwOCAzMS44ODg2IDYzLjIyNTNDMzEuNzg1MyA2Mi45Nzk3IDMxLjYzNCA2Mi43NTcyIDMxLjQ0MzYgNjIuNTcwOUMzMS4yNTMyIDYyLjM4NDYgMzEuMDI3NCA2Mi4yMzgyIDMwLjc3OTcgNjIuMTQwM0MzMC41MzE5IDYyLjA0MjUgMzAuMjY3IDYxLjk5NTEgMzAuMDAwNyA2Mi4wMDFDMjkuNDc4MSA2Mi4wMTI1IDI4Ljk4MDkgNjIuMjI4MiAyOC42MTUzIDYyLjYwMThDMjguMjQ5OCA2Mi45NzU0IDI4LjA0NTEgNjMuNDc3MyAyOC4wNDQ5IDY0QzI4LjA0NDggNjQuNTIyNyAyOC4yNDkzIDY1LjAyNDYgMjguNjE0NiA2NS4zOTg0QzI4Ljk4IDY1Ljc3MjIgMjkuNDc3MiA2NS45ODgyIDI5Ljk5OTcgNjZaIiBmaWxsPSJibGFjayIvPg0KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0zMCAzNC4yVjM5SDQxLjRDNDEuNDc4OCAzOSA0MS41NTY4IDM4Ljk4NDUgNDEuNjI5NiAzOC45NTQzQzQxLjcwMjQgMzguOTI0MiA0MS43Njg1IDM4Ljg4IDQxLjgyNDMgMzguODI0M0M0MS44OCAzOC43Njg1IDQxLjkyNDIgMzguNzAyNCA0MS45NTQzIDM4LjYyOTZDNDEuOTg0NSAzOC41NTY4IDQyIDM4LjQ3ODggNDIgMzguNFYyNC42QzQyIDI0LjUyMTIgNDEuOTg0NSAyNC40NDMyIDQxLjk1NDMgMjQuMzcwNEM0MS45MjQyIDI0LjI5NzYgNDEuODggMjQuMjMxNSA0MS44MjQzIDI0LjE3NTdDNDEuNzY4NSAyNC4xMiA0MS43MDI0IDI0LjA3NTggNDEuNjI5NiAyNC4wNDU3QzQxLjU1NjggMjQuMDE1NSA0MS40Nzg4IDI0IDQxLjQgMjRIMzYuNDQ2TDM2LjI4OCAyNkg0MFYyN0gzNi4yMUwzNi4wNTEgMjlINDBWMzBIMzUuOTcyTDM1LjU5OSAzNC43MTVDMzUuNTk2NiAzNC43NTQ5IDM1LjU4NjMgMzQuNzkzOSAzNS41Njg3IDM0LjgyOTlDMzUuNTUxMiAzNC44NjU4IDM1LjUyNjcgMzQuODk3OCAzNS40OTY2IDM0LjkyNDJDMzUuNDY2NiAzNC45NTA2IDM1LjQzMTcgMzQuOTcwOCAzNS4zOTM4IDM0Ljk4MzdDMzUuMzU1OSAzNC45OTY1IDM1LjMxNTkgMzUuMDAxNyAzNS4yNzYgMzQuOTk5QzM1LjE5OTYgMzQuOTkxNSAzNS4xMjg5IDM0Ljk1NTUgMzUuMDc3OCAzNC44OTgzQzM1LjAyNjYgMzQuODQxMSAzNC45OTg5IDM0Ljc2NjcgMzUgMzQuNjlWMTguNEMzNSAxOC4yOTM5IDM0Ljk1NzkgMTguMTkyMiAzNC44ODI4IDE4LjExNzJDMzQuODA3OCAxOC4wNDIxIDM0LjcwNjEgMTggMzQuNiAxOEgzNFYxNy40QzM0IDE3LjI5MzkgMzMuOTU3OSAxNy4xOTIyIDMzLjg4MjggMTcuMTE3MkMzMy44MDc4IDE3LjA0MjEgMzMuNzA2MSAxNyAzMy42IDE3SDIzLjRDMjMuMjkzOSAxNyAyMy4xOTIyIDE3LjA0MjEgMjMuMTE3MiAxNy4xMTcyQzIzLjA0MjEgMTcuMTkyMiAyMyAxNy4yOTM5IDIzIDE3LjRWMThIMjIuNEMyMi4yOTM5IDE4IDIyLjE5MjIgMTguMDQyMSAyMi4xMTcyIDE4LjExNzJDMjIuMDQyMSAxOC4xOTIyIDIyIDE4LjI5MzkgMjIgMTguNFYzOC40QzIyIDM4LjU1OTEgMjIuMDYzMiAzOC43MTE3IDIyLjE3NTcgMzguODI0M0MyMi4yODgzIDM4LjkzNjggMjIuNDQwOSAzOSAyMi42IDM5SDI3VjM0LjJDMjcgMzQuMDkgMjcuMDkgMzQgMjcuMiAzNEgyOS44QzI5LjkxIDM0IDMwIDM0LjA5IDMwIDM0LjJaTTI1LjUgMzFWMjVIMjcuNVYzMUgyNS41Wk0yOS41IDI1VjMxSDMxLjVWMjVIMjkuNVpNMjUuNSAyM1YyMEgyNy41VjIzSDI1LjVaTTI5LjUgMjBWMjNIMzEuNVYyMEgyOS41Wk0zNyAzM1YzMkg0MFYzM0gzN1oiIGZpbGw9IndoaXRlIi8+DQo8cGF0aCBkPSJNMzYuNTI1NCAyM0wzNi42MDQ0IDIySDM5LjU5OTRDMzkuODE5NCAyMiAzOS45OTk0IDIyLjE4IDM5Ljk5OTQgMjIuNFYyM0gzNi41MjU0WiIgZmlsbD0id2hpdGUiLz4NCjwvZz4NCjxkZWZzPg0KPGZpbHRlciBpZD0iZmlsdGVyMF9mXzUwN181NjMzIiB4PSIxIiB5PSItMSIgd2lkdGg9IjU4IiBoZWlnaHQ9IjY0IiBmaWx0ZXJVbml0cz0idXNlclNwYWNlT25Vc2UiIGNvbG9yLWludGVycG9sYXRpb24tZmlsdGVycz0ic1JHQiI+DQo8ZmVGbG9vZCBmbG9vZC1vcGFjaXR5PSIwIiByZXN1bHQ9IkJhY2tncm91bmRJbWFnZUZpeCIvPg0KPGZlQmxlbmQgbW9kZT0ibm9ybWFsIiBpbj0iU291cmNlR3JhcGhpYyIgaW4yPSJCYWNrZ3JvdW5kSW1hZ2VGaXgiIHJlc3VsdD0ic2hhcGUiLz4NCjxmZUdhdXNzaWFuQmx1ciBzdGREZXZpYXRpb249IjMiIHJlc3VsdD0iZWZmZWN0MV9mb3JlZ3JvdW5kQmx1cl81MDdfNTYzMyIvPg0KPC9maWx0ZXI+DQo8Y2xpcFBhdGggaWQ9ImNsaXAwXzUwN181NjMzIj4NCjxyZWN0IHdpZHRoPSI2MCIgaGVpZ2h0PSI2OCIgZmlsbD0id2hpdGUiLz4NCjwvY2xpcFBhdGg+DQo8L2RlZnM+DQo8L3N2Zz4NCg==',
                iconImageSize: [60, 68],
                iconImageOffset: [-30, -60]
            });

            mapInstance.geoObjects.add(placemark);
        });
    }

    async function initializeMaps() {
        const mapContainers = document.querySelectorAll('.yandex-map');
        for (const [index, mapContainer] of mapContainers.entries()) {
            mapContainer.id = `yandex-map-${index}`;
            await initMap(mapContainer);
        }
    }

    initializeMaps();
});

class Preloader {

    constructor() {
        this.$el = this.init()
        this.state = false
    }

    init() {
        const el = document.createElement('div')
        el.classList.add('loading')
        el.innerHTML = '<div class="indeterminate"></div>';
        document.body.append(el)
        return el;
    }

    load() {

        this.state = true;

        setTimeout(() => {
            if (this.state) this.$el.classList.add('load')
        }, 300)
    }

    stop() {

        this.state = false;

        setTimeout(() => {
            if (this.$el.classList.contains('load'))
                this.$el.classList.remove('load')
        }, 200)
    }

}

window.preloader = new Preloader();

document.addEventListener('DOMContentLoaded', function (event) {


    if (document.querySelector('.formated img')) {

        function openGalleryProduct(index, e) {
            const img = e.target.closest('.formated').querySelectorAll('img')
            const arrImage = [];

            img.forEach(image => {
                arrImage.push(image.getAttribute('src'))
            })

            const instance = new FsLightbox();
            instance.props.dots = true;
            instance.props.type = "image";
            instance.props.sources = arrImage;
            instance.open(index)
        }

        document.querySelectorAll('.formated img').forEach((item, index) => {
            item.addEventListener('click', e => openGalleryProduct(index, e))
        })

    }

    /* =========================================
    scroll to transcript
    =========================================*/

    if (document.querySelector('[href="#tabs-custom"]')) {


        document.querySelector('[href="#tabs-custom"]').addEventListener('click', e => {
            document.querySelectorAll('.tabs-custom__tab').forEach(item => {
                if (item.querySelector('span').innerText.trim().toLowerCase() == 'расшифровка') {
                    item.dispatchEvent(new Event('click', { bubbles: true }));
                }
            })
        })


    }

});

