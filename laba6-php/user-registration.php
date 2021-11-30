<?php

use model\Member;

if (!empty($_POST["signup-btn"])) {
    require_once './Model/Member.php';
    $member = new Member();
    $registrationResponse = $member->registerMember();
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600;700&display=swap"
          rel="stylesheet">
    <title>Registration</title>
    <!-- ======== Style ======== -->
    <link rel="stylesheet" href="style/style.css">

</head>
<body class="container">
<div class="phppot-container">
    <div class="sign-up-container">
        <div class="">
            <form name="sign-up" action="" method="post"
                  onsubmit="return signupValidation()">
                <div class="signup-heading">Registration</div>
                <?php
                if (!empty($registrationResponse["status"])) {
                    ?>
                    <?php
                    if ($registrationResponse["status"] == "error") {
                        ?>
                        <div class="server-response error-msg"><?php echo $registrationResponse["message"]; ?></div>
                        <?php
                    } else if ($registrationResponse["status"] == "success") {
                        ?>
                        <div class="server-response success-msg"><?php echo $registrationResponse["message"]; ?></div>
                        <?php
                    }
                    ?>
                    <?php
                }
                ?>
                <div class="error-msg" id="error-msg"></div>
                <div class="row">
                    <div class="inline-block">
                        <div class="form-label">
                            Username<span class="required error" id="username-info"></span>
                        </div>
                        <input type="text" name="username"
                               id="username">
                    </div>
                </div>
                <div class="row">
                    <div class="inline-block">
                        <div class="form-label">
                            Email<span class="required error" id="email-info"></span>
                        </div>
                        <input type="email" name="email" id="email">
                    </div>
                </div>
                <div class="row">
                    <div class="inline-block">
                        <div class="form-label">
                            Password<span class="required error" id="signup-password-info"></span>
                        </div>
                        <input type="password"
                               name="signup-password" id="signup-password">
                    </div>
                </div>
                <div class="row">
                    <div class="inline-block">
                        <div class="form-label">
                            Confirm Password<span class="required error"
                                                  id="confirm-password-info"></span>
                        </div>
                        <input class="" type="password"
                               name="confirm-password" id="confirm-password">
                    </div>
                </div>
                <div class="row">
                    <input class="btn" type="submit" name="signup-btn"
                           id="signup-btn" value="Sign up">
                </div>

                <div class="row">
                    <div class="login-signup">
                        <p>
                            Already registered?
                            <a href="index.php">Login</a>
                        </p>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    function signupValidation() {
        var valid = true;

        $("#username").removeClass("error-field");
        $("#email").removeClass("error-field");
        $("#password").removeClass("error-field");
        $("#confirm-password").removeClass("error-field");

        var UserName = $("#username").val();
        var email = $("#email").val();
        var Password = $('#signup-password').val();
        var ConfirmPassword = $('#confirm-password').val();
        var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

        $("#username-info").html("").hide();
        $("#email-info").html("").hide();

        if (UserName.trim() == "") {
            $("#username-info").html("required.").css("color", "#6a11cb").show();
            $("#username").addClass("error-field");
            valid = false;
        }
        if (email == "") {
            $("#email-info").html("required").css("color", "#6a11cb").show();
            $("#email").addClass("error-field");
            valid = false;
        } else if (email.trim() == "") {
            $("#email-info").html("Invalid email address.").css("color", "#6a11cb").show();
            $("#email").addClass("error-field");
            valid = false;
        } else if (!emailRegex.test(email)) {
            $("#email-info").html("Invalid email address.").css("color", "#6a11cb")
                .show();
            $("#email").addClass("error-field");
            valid = false;
        }
        if (Password.trim() == "") {
            $("#signup-password-info").html("required.").css("color", "#6a11cb").show();
            $("#signup-password").addClass("error-field");
            valid = false;
        }
        if (ConfirmPassword.trim() == "") {
            $("#confirm-password-info").html("required.").css("color", "#6a11cb").show();
            $("#confirm-password").addClass("error-field");
            valid = false;
        }
        if (Password != ConfirmPassword) {
            $("#error-msg").html("Both passwords must be same.").show();
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