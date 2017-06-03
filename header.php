<?php
	
	session_start();
	require_once("functions.php");
	require_once("model/model_user.php");

?>

<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="<?=base_url();?>/style.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/bootstrap.min.css">
<!--	<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/jquery.dataTables.min.css"> -->
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/font-awesome.css">
	<script type="text/javascript" src="<?=base_url();?>/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>/assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>/assets/js/dataTables.bootstrap.min.js"></script>

	<meta name="viewport" content="width=device-width,initial-scale=1.0"><!--1. Memanggil google Maps API-->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
 
<script type='text/javascript'>
//<![CDATA[
var Nanobar=function(){var c,d,e,f,g,h,k={width:"100%",height:"3px",zIndex:9999,top:"0"},l={width:0,height:"100%",clear:"both",transition:"height .3s"};c=function(a,b){for(var c in b)a.style[c]=b[c];a.style["float"]="left"};f=function(){var a=this,b=this.width-this.here;0.1>b&&-0.1<b?(g.call(this,this.here),this.moving=!1,100==this.width&&(this.el.style.height=0,setTimeout(function(){a.cont.el.removeChild(a.el)},100))):(g.call(this,this.width-b/4),setTimeout(function(){a.go()},16))};g=function(a){this.width=
a;this.el.style.width=this.width+"%"};h=function(){var a=new d(this);this.bars.unshift(a)};d=function(a){this.el=document.createElement("div");this.el.style.backgroundColor=a.opts.bg;this.here=this.width=0;this.moving=!1;this.cont=a;c(this.el,l);a.el.appendChild(this.el)};d.prototype.go=function(a){a?(this.here=a,this.moving||(this.moving=!0,f.call(this))):this.moving&&f.call(this)};e=function(a){a=this.opts=a||{};var b;a.bg=a.bg||"#3D8EB9";this.bars=[];b=this.el=document.createElement("div");c(this.el,
k);a.id&&(b.id=a.id);b.style.position=a.target?"relative":"fixed";a.target?a.target.insertBefore(b,a.target.firstChild):document.getElementsByTagName("body")[0].appendChild(b);h.call(this)};e.prototype.go=function(a){this.bars[0].go(a);100==a&&h.call(this)};return e}();
var nanobar = new Nanobar();nanobar.go(30);nanobar.go(60);nanobar.go(100);
//]]>
</script>

	<div id="header">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" id="klik" class="navbar-toggle collapsed" data-toggle="collapse" data-targe="#navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?=base_url();?>"><i class="fa fa-home">&nbsp;</i>Home</a>
				</div>
				<div class="collapse navbar-collapse" id="navbar">
					<ul class="nav navbar-nav navbar-right">
					
					<?php if(!isset($_SESSION['username'])): ?>
						<li><a href="<?=base_url();?>/login">Login</a></li>
						<li><a href="<?=base_url();?>/register">Register</a></li>
					<?php else: ?>
						<li>
							<a href="<?=base_url()?>/user/notifikasi"><span class="glyphicon glyphicon-bell"></span>

							<?php $notif=$user->notif_getNew($_SESSION['user_id']); if($notif>0):?>
								<span style="position: absolute;top: 5px;left: 23px;background: red;font-size: 11px;font-weight: normal;border-radius: 2px;padding: 2px 4px" class="badge"><?=$notif;?></span>
							<?php endif;?>

						</a>
						<li><a href="<?=base_url();?>/logout">Logout</a></li>
					<?php endif; ?>

					</ul>
				</div>
			</div>
		</nav>
	</div>
	<div class="container-fluid" id="main">
		<div class="row">
			<div class="col-xs-2 sidebar">

			<?php if(!isset($_SESSION['username'])):?>
				<div class="login-widget">
					<h4> Silakan login</h4><hr>
					<form class="" action="<?=base_url();?>/login_proc" method="post">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
							<input type="text" class="form-control" placeholder="Username" name="username">
						</div>
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
							<input type="password" class="form-control" placeholder="Password" name="password">
						</div>
						<button class="btn btn-primary" type="submit">Login</button>
					</form>
				</div>
			<?php else: ?>
				<div class="login-widget">
					<h4><i style="font-size: 20px" class="fa fa-user-circle"></i> &nbsp;<?=$_SESSION['username'];?></h4>
					<span>&nbsp;Edit profile </span>
				</div>
			<?php endif;?>
				<h4><i class="fa fa-cog"></i> &nbsp;Menu</h4><hr>
				<div class="list-group row">

				<?php if(isset($_SESSION['username']) && $_SESSION['user_status']==1): ?>

					<a href="<?=base_url();?>/admin/jurusan" class="list-group-item"><i class="fa fa-hdd-o fa-lg"></i>&nbsp; Master Jurusan</a>
					<a href="<?=base_url();?>/admin/kota" class="list-group-item"><i class="fa fa-hdd-o fa-lg"></i>&nbsp; Master Kota</a>
					<a href="<?=base_url();?>/admin/provinsi" class="list-group-item"><i class="fa fa-hdd-o fa-lg"></i>&nbsp; Master Provinsi</a>
					<a href="<?=base_url();?>/admin/add" class="list-group-item"><i class="fa fa-plus-square fa-lg"></i>&nbsp; Tambah baru</a>
					<a href="<?=base_url();?>/admin/usulan" class="list-group-item"><i class="fa fa-tags fa-lg"></i>&nbsp; Usulan member</a>
					<a href="<?=base_url();?>" class="list-group-item"><i class="fa fa-th-list fa-lg"></i>&nbsp; Lihat data</a>
					
				<?php elseif(isset($_SESSION['username']) && $_SESSION['user_status']==0): ?>
					<a href="<?=base_url();?>/user/add_usulan" class="list-group-item">
						<i class="fa fa-lg fa-tag"></i>&nbsp;&nbsp;Usulan baru
					</a>
					<a href="<?=base_url();?>/user/usulan" class="list-group-item">
						<i class="fa fa-lg fa-tags"></i>&nbsp;&nbsp;Usulan saya
					</a>
					<!--
					<a href="<?=base_url();?>/user/notifikasi" class="list-group-item">
						<i class="fa fa-bel"></i>&nbsp; Notifikasi
					</a>-->
				<?php endif;?>

				</div>
			</div>