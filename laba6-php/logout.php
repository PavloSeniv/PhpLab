<?php

namespace model;
//// clear all the session variables and redirect to index
//session_start();
//session_unset();
//session_write_close();
//$url = "./index.php";
//header("Location: $url");

session_start();

require "Classes/Util.php";
$util = new Util();

//Clear Session
$_SESSION["member_id"] = "";
session_destroy();

// clear cookies
$util->clearAuthCookie();

$url = "./index.php";
header("Location: $url");

