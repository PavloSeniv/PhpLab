<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/lab2/Classes/FileService.php';

$data = (new FileService())->edit($_GET['table'], $_GET['row']);

?>


<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Lab2</title>
</head>
<body>

<h4 class="mt-3 text-center">Edit row №<?= $_GET['row'] ?></h4>
<form method="post" action="update.php?table=<?= $_GET['table']?>&row=<?= $_GET['row'] ?>" enctype="multipart/form-data">
    <div class="form-group container">

    <?php
    foreach ($data as $value) {
echo "<input class='form-control mt-3' name='data[]' value='$value'>";
    }
    ?>
        <div class="text-center">
     <button type="submit" style="width:10%" class="btn btn-info mt-3">Save</button>
        </div>
    </div>
</form>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
</html>

