<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Classes/FileService.php';
if (isset($_GET['file_name'])) {
$array = (new FileService())->show($_GET['file_name']);

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
    <h3 class="text-center mt-4 mb-4 store-title">Ваша таблиця</h3>
    <table class="table">
        <thead>
        <tr>

            <th scope="col">#</th>
            <?php
            foreach ($array[0] as $data) {
                echo "<th scope='col'>$data</th>";
            }
            ?>
            <th scope="col">Дія</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($array as $key => $data) {
            if ($key > 0) {
                $string = "<tr><th scope='row'>$key</th>";
                foreach ($data as $value) {
                    $string .= "<td>$value</td>";
                }
                echo $string;

                echo "<th scope='row'>
                <a class='btn btn-warning' href='edit.php?table={$_GET['file_name']}&row=$key'>Редагування</a>
                <a class='btn btn-danger'  href='destroy.php?table={$_GET['file_name']}&row=$key'>Видалення</a>
        </th>
        </tr>";
            }
        }
        ?>

        </tbody>
    </table>
    <?php

    } else {
        die('Something wrong =)');
    }
    ?>

</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
</html>