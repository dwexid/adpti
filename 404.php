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
					<a class="navbar-brand" href="<?=base_url();?>">Home</a>
				</div>
				<div class="collapse navbar-collapse" id="navbar">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?=base_url();?>/contact">Contact us</a></li>
						<li><a href="<?=base_url();?>/login">Login</a></li>
						<li><a href="<?=base_url();?>/register">Register</a></li>					
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<div class="container">
		<div id="not-found">
			<h1>404 NOT FOUND :((</h1>
		</div>
	</div>
<?php
	require_once("footer.php");
?>