<?php

use model\Member;

if (!empty($_POST["login-btn"])) {
    require_once __DIR__ . '/Model/Member.php';
    $member = new Member();
    $loginResult = $member->loginMember();
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
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;700&display=swap"
          rel="stylesheet">
    <title>Login</title>
    <!-- ======== Style ======== -->
    <link href="style/user-registration.css" type="text/css"
          rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="container">
<div class="phppot-container">
    <div class="sign-up-container">
        <div class="login-signup">
            <a href="user-registration.php">Sign up</a>
        </div>
        <div class="signup-align">
            <form name="login" action="" method="post"
                  onsubmit="return loginValidation()">
                <div class="signup-heading">Login</div>
                <?php if (!empty($loginResult)) { ?>
                    <div class="error-msg"><?php echo $loginResult; ?></div>
                <?php } ?>
                <div class="row">
                    <div class="inline-block">
                        <div class="form-label">
                            Username<span class="required error" id="username-info"></span>
                        </div>
                        <input class="input-box-330" type="text" name="username"
                               id="username">
                    </div>
                </div>
                <div class="row">
                    <div class="inline-block">
                        <div class="form-label">
                            Password<span class="required error" id="login-password-info"></span>
                        </div>
                        <input class="input-box-330" type="password"
                               name="login-password" id="login-password">
                    </div>
                </div>
                <div class="row">
                    <input class="btn" type="submit" name="login-btn"
                           id="login-btn" value="Login">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function loginValidation() {
        var valid = true;
        $("#username").removeClass("error-field");
        $("#password").removeClass("error-field");

        var UserName = $("#username").val();
        var Password = $('#login-password').val();

        $("#username-info").html("").hide();

        if (UserName.trim() == "") {
            $("#username-info").html("required.").css("color", "#ee0000").show();
            $("#username").addClass("error-field");
            valid = false;
        }
        if (Password.trim() == "") {
            $("#login-password-info").html("required.").css("color", "#ee0000").show();
            $("#login-password").addClass("error-field");
            valid = false;
        }
        if (valid == false) {
            $('.error-field').first().focus();
            valid = false;
        }
        return valid;
    }
</script>
</body>
</html>
