<?php
		if($_SESSION['auth_role'] != "super"){
            $_SESSION['message'] = "You are not Authorized As Super-Admin";
            header('location: index.php');
    
        exit();
        }  
?>