<?php
	session_start();
	
	unset($_SESSION['auth']);
	unset($_SESSION['auth_role']);
	unset($_SESSION['auth_user']);
	setcookie('logincookie', $_SESSION['auth_user']['id'], time()-60*60*24*30);
	$_SESSION['message'] = "You have logged out successfully";
	header('Location: ../login');
	exit();



?>