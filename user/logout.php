<?php
	session_start();
	setcookie('logincookie', $_SESSION['auth_user']['id'], time()-1000000, "/");
	setcookie('logincookie_name', $_SESSION['auth_user']['username'], time()-1000000, "/");

	unset($_SESSION['auth']);
	unset($_SESSION['auth_role']);
	unset($_SESSION['auth_user']);
	$_SESSION['message'] = "You have logged out successfully";
	header('Location: ../login');
	exit();



?>