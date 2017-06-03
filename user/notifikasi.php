<?php
	
	require_once("../functions.php");
	require_once("../header.php");
	require_once("../model/model_user.php");

	$user_id = $_SESSION['user_id'];
?>

	<div class="col-sm-offset-2 col-sm-10 content">
		<div class="col-sm-offset-1 col-sm-10 konten">
			<div class="title"><h4>Notifikasi</h4></div>

			<?php 
				$result = $user->notif_get($user_id);
				if($result):
					foreach($result as $res){
					$usr = $user->getNama($res->user_id); ?>

				<div style="overflow: hidden;" class="title">
					<h4 style="font-weight: normal !important;font-size: 14px;color: #777">
						<?=$res->tgl;?>
						<?=$res->new==1?"<span class='badge'> Baru</span>":"";?>
					</h4>
					<div class="col-sm-12 alert alert-info" style="border-radius: 1px;opacity: .8">
						<span class="glyphicon glyphicon-info-sign"></span> &nbsp; 
						<?=$res->isi;?>
					</div>
				</div>

			<?php } else: ?>
				<div class="title" style="overflow: hidden;">
					<h4>-</h4>
					<div class="col-sm-12 alert alert-danger" style="border-radius: 1px;opacity: .8">
						<span><span class="glyphicon glyphicon-exclamation-sign"></span> &nbsp;Tidak ada notifikasi</span>
					</div>
				</div>

			<?php endif;?>


<?php 

	$user->notif_setOld($user_id);
	require_once("../footer.php");
?>