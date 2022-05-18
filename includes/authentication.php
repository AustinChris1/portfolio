<?php
	session_start();
	require_once '../databases/db_connect.php';

	if (!isset($_COOKIE['logincookie'])){
	  $_SESSION['message'] = "Login To Access Here";
    header('location: ../login');
	exit();	
	if(!isset($_SESSION['auth_user']['id'])){
		$_SESSION['auth_user']['id'] = $_COOKIE['logincookie'];
		$cookiename = $_COOKIE['logincookie_name'];
	}
	// if ($_SESSION['auth_role'] == ''){
	// 	$_SESSION['message'] = "You are not Authorized As Admin";
	// 	header('location: user/home');

	// exit();
    
    // }

	}
	
	
?>