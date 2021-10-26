<?php
	session_start();
	unset($_SESSION['user_id']);
	unset($_SESSION['nickname']);
	unset($_SESSION['email']);
	session_destroy();
	$myuser = $_SESSION['username'];
	header("location:../");
?>
