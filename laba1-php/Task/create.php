<?php
session_start();
?>
    <!doctype html>
    <html lang="uk">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="author" content="Seniv Pavlo, https://github.com/PavloSeniv">
        <meta name="copyright" content="Seniv Pavlo">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
              crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;700&display=swap"
              rel="stylesheet">
        <title>lab-1-php</title>
        <!-- ======== Style ======== -->
        <link rel="stylesheet" href="/css/style.css">
    </head>

    <body>

    <div class="container">
        <div class="wrapper">

        <p class=""><?= $_SESSION['success'] ?? '' ?></p>
        <form method="post" action="store.php">
            <h2 class="input">
                <label class="" for="input">Виберіть дату</label>
                <input id="input" type="date" class="" name="date">
            </h2>

            <label class="" for="textarea">Запишіть завдання</label>
            <textarea id="textarea" class="form-control" name="task" rows="2"></textarea>

            <button type="submit" class="btn btn-dark">Прийняти</button>

        </form>
        <p class=""><a class="link-light" href="show.php">Переглянути завдання у json файлі</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
            crossorigin="anonymous">
    </script>

    </body>
    </html>
<?php
session_destroy();
?>