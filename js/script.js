function sendRequest(requestNumber) {
    // Отправка AJAX-запроса на сервер
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            document.getElementById("result").innerHTML = response;
        }
    };

    // Определение URL для отправки запроса на сервер
    var url = "../php/process_request.php?request=" + requestNumber;

    // Отправка AJAX-запроса
    xhr.open("GET", url, true);
    xhr.send();
}
