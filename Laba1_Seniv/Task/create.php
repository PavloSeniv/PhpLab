<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Lab1</title>
</head>
<body>
<?php
session_start();
?>
<p class="text-center text-success h5"><?= $_SESSION['success'] ?? ''?></p>
<h4 class="mt-1 text-center">Select date and enter task</h4>
<form method="post" action="store.php">
    <div class="text-center">
    <input type="date" class="mt-3 mb-4" name="date">
    </div>
    <textarea class="form-control w-25 mx-auto" name="task" rows="2"></textarea>
    <div class="text-center mt-3">
    <button type="submit" class="btn btn-primary">Confirm</button>
    </div>
</form>
<div class="text-center mt-3"><a href="show.php">Show tasks in json</a></div>
<?php
session_destroy();
?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</html>