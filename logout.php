<?php
	session_start();
	$_SESSION['txt_email']='';
	$_SESSION['txt_password']='';
	$_SESSION['txt_user_name']='';
	unset($_SESSION['txt_email']);
	unset($_SESSION['txt_password']);
	unset($_SESSION['txt_user_name']);
	session_unset();
	session_destroy();
	header("location:index.php");
?>