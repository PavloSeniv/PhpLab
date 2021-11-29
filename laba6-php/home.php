<?php
session_start();

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}

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
    <link rel="stylesheet" href="../style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;700&display=swap"
          rel="stylesheet">
    <title>Home</title>
    <!-- ======== Style ======== -->
    <link href="/style/user-registration.css" type="text/css"
          rel="stylesheet"/>
</head>
<body>
<div>

    <main id="Main" class="phppot-container" style="padding: 0">

        <div class="home">
            <div class="page-header">
                <span class="login-signup"><a href="logout.php">Logout</a></span>
            </div>
            <div class="page-content">Welcome <?php echo $username; ?></div>
        </div>

    </main>
</div>

<script src="js/three.min.js"></script>
<script src="js/vanta.birds.min.js"></script>
<script src="js/Vanta.js"></script>
</body>
</html>
