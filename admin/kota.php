<?php 
	require_once("../header.php");
?>

	<div class="col-sm-offset-2 col-sm-10 content">
		<div class="col-sm-offset-1 col-sm-10 konten">
			<div class="title"><h4>List Data Kota</h4></div>
			<div>
				<table class="table table-striped" id="listKota">
					<thead>
						<tr>
							<th>#</th>
							<th>Kode Kota</th>
							<th>Nama Kota</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php

						require_once("../model/model_tempat.php");

						$data = $tempat->get_listKota();
						$i=1;
						if($data):
							foreach($data as $kota){ ?>

							<tr>
								<td><?=$i++;?></td>
								<td><?=$kota->id_kota;?></td>
								<td><?=$kota->nama;?></td>
								<td><a href="#" class="btn btn-danger btn-xs">Delete</a></td>
							</tr>

					<?php } endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#listKota").DataTable();
		})
	</script>

<?php 
?>