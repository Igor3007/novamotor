document.addEventListener("DOMContentLoaded", function () {

    /********************************************
     * ajax request
     ********************************************/

    function ajax(params, btn, response) {
        let xhr = new XMLHttpRequest();
        xhr.open('POST', params.url)
        xhr.send(params.data)

        xhr.onload = function () {
            response(xhr.status, xhr.response)
        };

        xhr.onerror = function () {
            console.error('Ошибка соединения');
        };

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 3) {
                btn.classList.add('btn-loading')
            }

            if (xhr.readyState === 4) {
                setTimeout(function () {
                    btn.classList.remove('btn-loading')
                }, 300)
            }
        };
    }

    /* Вывод сообщений */
    function state(type_err, message) {
        if (!document.querySelector('#status')) {
            var elem = document.createElement("div");
            elem.setAttribute('id', 'status');
            document.body.append(elem)
        }

        document.querySelector('#status').classList.remove('complete')
        document.querySelector('#status').classList.remove('error')

        if (type_err) {
            document.querySelector('#status').classList.add('complete')
            document.querySelector('#status').innerHTML = message
        } else {
            document.querySelector('#status').classList.add('error')
            document.querySelector('#status').innerHTML = message
        }

        setTimeout(function () {
            document.querySelector('#status').classList.remove('complete')
            document.querySelector('#status').classList.remove('error')
        }, 8000);
    }


    window.initSendForm = function (el, onclose) {
        el.querySelectorAll('[data-form]').forEach(function (item) {

        })
    }

});


document.addEventListener("DOMContentLoaded", () => {
    const searchContainers = document.querySelectorAll('[data-search-id]');
    searchContainers.forEach(container => {
        const searchInput = container.querySelector('.search-index__input input');
        const resultsList = container.querySelector('.search-results__list ul');
        const resultsBlock = container.querySelector('.search-results');
        const moreResultsBtn = container.querySelector('.search-results__more');

        searchInput.addEventListener('input', async () => {
            const query = searchInput.value.trim();
            if (query.length < 2) {
                resultsBlock.style.display = "none";
                return;
            }

            try {
                const response = await fetch(`/search/list?q=${encodeURIComponent(query)}`);
                if (!response.ok) throw new Error('response error');
                const results = await response.json();

                renderResults(results.slice(0, 5));
                resultsBlock.style.display = results.length ? "block" : "none";

                if (results.length > 5) {
                    moreResultsBtn.style.display = "flex";
                    moreResultsBtn.onclick = () => renderResults(results);
                } else {
                    moreResultsBtn.style.display = "none";
                }
            } catch (err) {
                console.error('error:', err);
            }
        });

        function renderResults(results) {
            resultsList.innerHTML = results.map(item => `
                <li><a href="${item.url}">${item.title}</a></li>
            `).join('');
            moreResultsBtn.style.display = "none";
        }
    });
});
