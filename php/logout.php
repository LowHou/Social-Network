<?php
	session_start();
	session_unset();
	session_destroy();
	session_start();
	$_SESSION["login_status"] = -1;
	header('Location: ../index.php');  
?>
