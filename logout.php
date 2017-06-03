<?php
	
	session_start();
	session_destroy();
	require_once("functions.php");

	header("location: ".base_url()."/login.php");

?>