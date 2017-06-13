<?php
	session_start();
	$_SESSION["loggued_on_user"] = "";
	$_SESSION["admin"] = FALSE;
	$_SESSION["cart"] = NULL;
	header("Location: ../index.html");
?>
