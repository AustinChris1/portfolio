<?php
	require_once '../databases/db_connect.php';

	if ($_SESSION['auth_role'] == ''){
		$_SESSION['message'] = "You are not Authorized As Admin";
		header('location: ../user/home');

	exit();
    
    }
?>