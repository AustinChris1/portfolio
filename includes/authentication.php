<?php
session_start();
require_once "../databases/db_connect.php";

if (!isset($_SESSION["auth"])) {
    $_SESSION["message"] = "Login To Access Here";
    header("location: ../login");
    // if ($_SESSION['auth_role'] == ''){
    // 	$_SESSION['message'] = "You are not Authorized As Admin";
    // 	header('location: user/home');

    // exit();

    // }
}

?>
