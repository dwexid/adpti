<?php 
	require_once("../header.php");
?>

	<div class="col-sm-offset-2 col-sm-10 content">
		<div class="col-sm-offset-1 col-sm-10 konten">
			<div class="title"><h4>List Data Provinsi</h4></div>
			<div>
				<table class="table table-striped" id="listProv">
					<thead>
						<tr>
							<th>#</th>
							<th>Kode Provinsi</th>
							<th>Nama Provinsi</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php

						require_once("../model/model_tempat.php");

						$data = $tempat->get_listProvinsi();
						$i=1;
						if($data):
							foreach($data as $prov){ ?>

							<tr>
								<td><?=$i++;?></td>
								<td><?=$prov->id_provinsi;?></td>
								<td><?=$prov->nama;?></td>
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
			$("#listProv").DataTable();
		})
	</script>
<?php 
?>