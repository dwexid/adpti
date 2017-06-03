<?php 
	require_once("../header.php");
?>

	<div class="col-sm-offset-2 col-sm-10 content">
		<div class="col-sm-offset-1 col-sm-10 konten">
			<div class="title"><h4>List Data Jurusan</h4></div>
			<div>
				<table class="table table-striped" id="listJrs">
					<thead>
						<tr>
							<th>#</th>
							<th>Kode Jurusan</th>
							<th>Nama Jurusan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php

						require_once("../model/model_jurusan.php");

						$data_jrs = $jurusan->get_list();
						$i=1;
						if($data_jrs):
							foreach($data_jrs as $jrs){ ?>

							<tr>
								<td><?=$i++;?></td>
								<td><?=$jrs->kode_jurusan;?></td>
								<td><?=$jrs->nama;?></td>
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
			$("#listJrs").DataTable();
		})
	</script>
<?php 
?>