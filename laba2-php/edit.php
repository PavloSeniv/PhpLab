<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Classes/FileService.php';

$data = (new FileService())->edit($_GET['table'], $_GET['row']);

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
    <title>lab-2-php</title>
    <!-- ======== Style ======== -->
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container">

    <div class="edit-wrapper">
        <h4 class="text-center edit-title">Редагування рядка №<?= $_GET['row'] ?></h4>
        <form method="post" action="update.php?table=<?= $_GET['table'] ?>&row=<?= $_GET['row'] ?>"
              enctype="multipart/form-data">
            <div class="form-group form-group-edit container">

                <?php
                foreach ($data as $value) {
                    echo "<input class='form-control mt-3' name='data[]' value='$value'>";
                }
                ?>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-3">Зберегти</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
</html>

