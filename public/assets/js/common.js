class HttpClient {
    postJson(url, body, callback) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.onreadystatechange = function () {
            if (xhr.readyState != 3) return;
            callback(JSON.parse(xhr.responseText));
        };
        xhr.send(JSON.stringify(body));
    }

    getJson(url,  callback) {
        let xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState != 3) return;
            callback(JSON.parse(xhr.responseText));
        };
        xhr.send();
    }

    putJson(url, body, callback) {
        let xhr = new XMLHttpRequest();
        xhr.open("PUT", url, true);
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.onreadystatechange = function () {
            if (xhr.readyState != 3) return;
            callback(JSON.parse(xhr.responseText));
        };
        xhr.send(JSON.stringify(body));
    }
}
