<?php
	
	session_start();
	require_once("functions.php");

?>

<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="<?=base_url();?>/style.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/bootstrap.min.css">
	<script type="text/javascript" src="<?=base_url();?>/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>/assets/js/bootstrap.min.js"></script>

	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div id="header">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-targe="#navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?=base_url();?>"><i class="fa fa-home">&nbsp;</i>Home</a>
				</div>
				<div class="collapse navbar-collapse" id="navbar">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?=base_url();?>/contact.php">Contact us</a></li>
						<li><a href="<?=base_url();?>/login.php">Login</a></li>
						<li><a href="<?=base_url();?>/register.php">Register</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<div class="container">
		<div class="col-sm-offset-4 col-sm-4" id="register-form">
			<div class="register-caption title"><h4><span class="glyphicon glyphicon-user"></span>&nbsp; Silakan Mendaftar</h4></div>
			<div class="register-naon">
				<form class="form-horizontal col-xs-12" method="post" action="<?=base_url();?>/reg_proc.php">
					<div class="form-group">
						<div class="">
							<input placeholder="Username" type="text" class="form-control" id="username" name="username">
						</div>
					</div>
					<div class="form-group">
						<div class="">
							<input placeholder="Fullname" type="text" class="form-control" id="fullname" name="fullname">
						</div>
					</div>
					<div class="form-group">
						<div class="">
							<input placeholder="Email" type="text" class="form-control" id="email" name="email">
						</div>
					</div>
					<div class="form-group">
						<div class="">
							<input placeholder="Retype Password" type="password" class="form-control" id="password" name="password">
						</div>
					</div>
					<div class="form-group">
						<div class="">
							<input placeholder="Password" type="password" class="form-control" id="re-password" name="re-password">
						</div>
					</div>
					<div class="form-group">
						<div class="">
							<button class="btn btn-primary">Mendaftar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
