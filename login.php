<?php
	
	session_start();
	require_once("functions.php");

	if(isset($_SESSION['username'])){
		header("location: ".base_url());
	}

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
		<div class="col-sm-offset-4 col-sm-4" id="login-form">

		<!-- temporary -->
		<?php if(isset($_SESSION['notif_error'])){ ?>
			<div style="position: absolute;z-index: 3;top:-70px;"><span style="width:380px;display: block;margin-left:-17px" class="alert alert-danger"><span class="glyphicon glyphicon-exclamation-sign"></span> Maaf username/password salah!</span></div>
		<?php } ?>
		<!-- temporary -->



			<div class="login-caption title"><h4><span class="glyphicon glyphicon-user"></span>&nbsp; Silakan login</h4></div>
			<div class="login-naon">
				<form class="form-horizontal col-xs-12" method="post" action="<?=base_url();?>/login_proc.php">
					<div class="input-group">
						<span class="input-group-addon" id="username"><span class="glyphicon glyphicon-user"></span></span>
						<input type="text" class="form-control" placeholder="Username" name="username">
					</div>
					<div class="input-group">
						<span class="input-group-addon" id="password"><span class="glyphicon glyphicon-lock"></span></span>
						<input type="password" class="form-control" placeholder="Password" name="password">
					</div>
					<div class="">
						<button type="submit" class="btn btn-primary">Login</button>
					</div>
					<a style="margin: 10px 0;display: block;" href="<?=base_url();?>/register.php">Mendaftar?</a>
				</form>
			</div>
		</div>
	</div>
<?php if(isset($_SESSION['notif'])) echo $_SESSION['notif'];session_destroy();?>