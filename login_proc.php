<?php
	
	session_start();

	require_once("functions.php");
	require_once("model/model_user.php");


	$username = $_POST['username'];
	$password = $_POST['password'];


//	$data = array("username"=>"halim","fullname"=>"abdhalim","email"=>"doelhalimov@gmail.com","password"=>"iwannabe77");
//	$user->add($data);

	$validate = $user->validate($username,$password);
	if($validate){
		$_SESSION['username'] = $username;
		$_SESSION['user_status'] = $validate->status;
		$_SESSION['user_id'] = $validate->id;
		header("location: ".base_url());
	}else{
		$_SESSION['notif_error']="Maaf, username/password anda salah!!";
		header("location: login.php");
	}

?>