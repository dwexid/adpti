<?php
	
	require_once("functions.php");
	require_once("model/model_user.php");

	if($_POST['password']==$_POST['re-password']){

		$data = array('user'		=> $_POST['username'],
					  'fullname'	=> $_POST['fullname'],
					  'email'		=> $_POST['email'],
					  'pass'		=> $_POST['password'],
					  'status'		=> 0
					 );

		$user->add($data);
	}

	header("location: login.php");
?>