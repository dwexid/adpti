<?php
session_start();
require_once("functions.php");
require_once("model/model_pt.php");
//$pt = $
$st = $_POST['status'];
$ak = $_POST['akreditasi'];
$pr = $_POST['prov'];
$kt = $_POST['kota'];
$jr = $_POST['jrs'];

$data = array(
	'status_pt'		=> $st,
	'akreditasi'	=> $ak,
	'id_provinsi'	=> $pr,
	'id_kota'		=> $kt,
	'kode_jurusan'	=> $jr
	);

?>

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
								$data_pt = $pt->cari($data);
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
									<a href="<?=base_url();?>/detail.php?id=<?=$res->id_pt;?>" title="detail" class="text-info">
										<span class="glyphicon glyphicon-ok"></span>
									</a>&nbsp;

								<?php if(isset($_SESSION['username']) && $_SESSION['user_status']==1): ?>
									
									<a href="<?=base_url();?>/admin/edit.php?id=<?=$res->id_pt;?>" title="edit">
										<span class="glyphicon glyphicon-pencil"></span>
									</a>&nbsp;
									<a href="<?=base_url();?>/admin/delete.php?id=<?=$res->id_pt;?>" title="delete" onclick="return confirm('apakah anda tidak yakin?')" class="text-danger">
										<span class="glyphicon glyphicon-remove"></span>
									</a>&nbsp;

								<?php endif; ?>

								</td>
							</tr>

							<?php } else: ?>

							<tr><td align="center" colspan="6">Maaf, data tidak ditemukan :((</td></tr>

							<?php endif;?>
							</tbody>
							<script type="text/javascript">
				$(document).ready(function(){
					$("#listPt").DataTable();
				})
							</script>