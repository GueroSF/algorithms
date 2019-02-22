<!DOCTYPE html>
<html lang="en">
<head>
	<title>Сортировка</title>
    <style type="text/css">
        body {
            background-color: darkgray;
        }
        #result {
            margin-top: 15px;
        }
        .error {
            background-color: indianred;
        }
    </style>
    <script type="application/javascript">
        const compareResults = () => {
            const results = {};
            document.querySelectorAll('td[class^="result"]').forEach(elem => {
                if (results[elem.classList.value] === undefined) {
                    results[elem.classList.value] = [];
                }
                results[elem.classList.value].push(elem.innerText);
            });

            for (let key in results) {
                if (results[key][0] !== results[key][1]) {
                    document.querySelectorAll(`.${key}`).forEach(elem => elem.style.background = '#ff00004f');
                }
            }
        };

        window.addEventListener('load', function(ev) {
            document.querySelector('#input-data').addEventListener('submit', function(ev) {
                ev.preventDefault();
                fetch(
                    'controller.php',
                    {
                        method: 'POST',
                        body: new FormData(this)
                    }
                )
                .then(res => {
                    if (!res.ok) {
                        throw new Error(res.statusText);
                    }
                    return res.json();
                })
                .then(data => {
                    const table = document.createElement('table');
                    let text = '', td, className;
                    for (let key in data) {
                        td = '';
                        className = key === 'first' ? 'first' : 'result';
                        (() => data[key].forEach((value, index) => td += `<td class="${className}-${index}">${value}</td>`))();
                        text += `<tr><td>${key}</td>${td}</tr>`;
                    }
                    table.innerHTML = text;
                    const result = document.querySelector('#result');
                    result.innerHTML = '';
                    result.append(table);

                    compareResults();
                })
                .catch(error => {
                    const result = document.querySelector('#result');
                    result.innerHTML = `<div class="error">${error.message}</div>`;
                });
            });
        });
    </script>
</head>
<body>
    <form id="input-data">
        <label>Min:<input type="number" step="1" name="min" value="0"></label>
        <label>Max:<input type="number" step="1" name="max" value="10"></label>
        <label>Count:<input type="number" min="1" step="1" name="amount" value="5"></label>
        <input type="submit">
    </form>
    <div id="result"></div>
</body>
</html>