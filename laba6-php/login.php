<?php
namespace model;

use model\Member;

session_start();

require_once "Classes/Authentication.php";
require_once "Classes/Util.php";

$auth = new Authentication();
$db_handle = new DBController();
$util = new Util();

require_once "Classes/authenticationCookieSessionValidate.php";

if ($isLoggedIn) {
    $util->redirect("home.php");
}

if (!empty($_POST["login"])) {

    $isAuthenticated = false;

    $username = $_POST["member_name"];
    $password = $_POST["member_password"];
    $user = $auth->getMemberByUsername($username);
    if (password_verify($password, $user[0]["member_password"])) {
        $isAuthenticated = true;
    }

    if ($isAuthenticated) {

        $_SESSION["member_name"] = $user[0]["member_name"]; //Запис у сесію ім'я

        $_SESSION["member_id"] = $user[0]["member_id"];

        // Set Authentication Cookies if 'Remember Me' checked
        if (!empty($_POST["remember"])) {
            setcookie("member_login", $username, $cookie_expiration_time);

            $random_password = $util->getToken(16);
            setcookie("random_password", $random_password, $cookie_expiration_time);

            $random_selector = $util->getToken(32);
            setcookie("random_selector", $random_selector, $cookie_expiration_time);

            $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
            $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);

            $expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);

            // mark existing token as expired
            $userToken = $auth->getTokenByUsername($username, 0);
            if (!empty($userToken[0]["id"])) {
                $auth->markAsExpired($userToken[0]["id"]);
            }
            // Insert new token
            $auth->insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date);
        } else {
            $util->clearAuthCookie();
        }

        session_write_close();
        $util->redirect("home.php");
    } else {
        $message = "Invalid username or password";
    }
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
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;700&display=swap"
          rel="stylesheet">
    <title>Login</title>
    <!-- ======== Style ======== -->
    <link rel="stylesheet" href="style/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="container">
<div class="phppot-container">
    <div class="sign-up-container">

        <div class="signup-align">
            <form name="login" action="" id="frmLogin" method="post"
                  onsubmit="return loginValidation()">

                <div class="signup-heading">Login</div>

                <div class="signup-subheading"> Please enter your login and password!</div>

                <div class="error-message"><?php if (isset($message)) {
                        echo $message;
                    } ?></div>

                <div class="row">
                    <div class="inline-block">
                        <div class="form-label">
                            Username<span class="required error" id="username-info"></span>
                        </div>

                        <input name="member_name" type="text" id="username"
                               value="<?php if (isset($_COOKIE["member_login"])) {
                                   echo $_COOKIE["member_login"];
                               } ?>"
                               class="input-field">
                    </div>
                </div>
                <div class="row">
                    <div class="inline-block">
                        <div class="form-label">
                            Password<span class="required error" id="login-password-info"></span>
                        </div>
                        <input name="member_password" type="password" id="login-password"
                               value="<?php if (isset($_COOKIE["member_password"])) {
                                   echo $_COOKIE["member_password"];
                               } ?>"
                               class="input-field">
                    </div>
                </div>

                <div class="row">
                    <div class="checkbox-block">
                        <input type="checkbox" name="remember" id="remember"
                            <?php if (isset($_COOKIE["member_login"])) { ?> checked
                            <?php } ?>
                        />
                        <label for="remember-me">Remember me</label>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="login" value="Login" id="login-btn"
                           class="form-submit-button">
                </div>
                <div class="row">
                    <div class="login-signup">
                        <p>
                            Don't have an account?
                            <a href="user-registration.php">Sign Up</a>
                        </p>
                    </div>
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
            $("#username-info").html("required.").css("color", "#6a11cb").show();
            $("#username").addClass("error-field");
            valid = false;
        }
        if (Password.trim() == "") {
            $("#login-password-info").html("required.").css("color", "#6a11cb").show();
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
