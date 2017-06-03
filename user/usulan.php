<?php 
	require_once("../header.php");
	require_once("../model/model_pt.php");

	$user_id = $_SESSION['user_id'];
?>

	<div class="col-sm-offset-2 col-sm-10 content">
		<div class="col-sm-offset-1 col-sm-10 konten">
			<div class="title"><h4>List Data Jurusan</h4></div>
			<div>
				<table class="table table-striped" id="listPt">
					<thead>
						<tr>
							<th style="text-align: center;">#</th>
							<th>Nama PT</th>
							<th>Status</th>
							<th>Akreditasi</th>
							<th>Website</th>
							<th style="text-align: center;">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$i=1;

						$data_pt = $pt->get_all($user_id);								
						if($data_pt):
							foreach($data_pt as $res){  
						?>

					<tr>
						<td align="center"><?=$i++;?></td>
						<td><?=$res->nama_pt;?></td>
						<td><?=$res->status_pt;?></td>
						<td align="center"><?=$res->akreditasi;?></td>
						<td><?=$res->website;?></td>
						<td align="center">
							<a href="<?=base_url();?>/detail.php?id=<?=$res->id_pt;?>" class="btn btn-xs btn-info" >Detail</a>									
							<a href="<?=base_url();?>/user/edit.php?id=<?=$res->id_pt;?>" class="btn btn-xs btn-primary" >Edit</a>
							<a href="<?=base_url();?>/user/delete.php?id=<?=$res->id_pt;?>" class="btn btn-xs btn-danger" onclick="return confirm('apakah anda tidak yakin?')">Delete</a>

						</td>
					</tr>

				<?php } else: ?>

					<tr><td align="center" colspan="6">Maaf, data tidak ditemukan :((</td></tr>

				<?php endif;?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#listJrs").DataTable();
		})
	</script>
<?php 
?>