<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Content-Cross-Linker</title>
</head>
<body>
<div class="container text-center">
    <h1>CCL - Content-Cross-Linker</h1>
    <form id="ccl" class="mt-5">
        <div class="form-group">
            <label for="text">Исходный текст</label>
            <textarea class="shadow form-control" id="text" aria-describedby="text"></textarea>
        </div>
        <div class="form-group">
            <label for="termins">Список терминов</label>
            <input type="text" class="form-control shadow" id="termins">
            <small class="form-text text-muted">Термины в формате: термин|ссылка,термин|ссылка"</small>
        </div>
        <button type="button" class="btn btn-primary" onclick="sendRequest()">Получить</button>
    </form>
    <pre class="result mt-5 bg-dark text-light" id="msg">
        <p>Тут будет результат!</p>
    </pre>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
<script>
    function sendRequest() {
        let text = $('#text').val();
        let termins = $('#termins').val();
        $.ajax({
            type: "POST",
            url: "ccl.php",
            data: {text: text, termins: termins}
        }).done(function (result) {
            $("#msg").html(result);
        });
    }
</script>
</body>
</html>