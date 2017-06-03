<?php 
	require_once("functions.php");
	require_once("header.php"); 
	require_once("model/model_pt.php");
	require_once("model/model_jurusan.php");
	require_once("model/model_tempat.php");

	if(isset($_GET['cari'])){

		$st = $_GET['status'];
		$ak = $_GET['akreditasi'];
		$pr = $_GET['prov'];
		$kt = $_GET['kota'];
		$jr = $_GET['jrs'];
		$nm = $_GET['cari'];

		$data = array(
			'nama_pt'		=> $nm,
			'status_pt'		=> $st,
			'akreditasi'	=> $ak,
			'provinsi'	=> $pr,
			'kota'		=> $kt,
			'jurusan'	=> $jr
		);
	}
?>

			<div class="col-sm-offset-2 col-sm-10 content">
				<div>
					<div class="col-sm-2 searchbox">
						<div class="title-top"><h4>Pencarian</h4></div>
						<form id="form-cari" action="">
							<div class="form-group">
								<select class="form-control input-sm" name="status">
									<option selected value="">Status</option>
									<option value="NEGERI" <?=isset($_GET['status']) && $_GET['status']=='NEGERI'?'selected':'';?>>NEGERI</option>
									<option value="SWASTA" <?=isset($_GET['status']) && $_GET['status']=='SWASTA'?'selected':'';?>>SWASTA</option>
								</select>
							</div>
							<div class="form-group">
								<select class="form-control input-sm" name="akreditasi">
									<option selected value="">Akreditasi</option>
									<option value="A" <?=isset($_GET['akreditasi']) && $_GET['akreditasi']=='A'?'selected':'';?>>A</option>
									<option value="B" <?=isset($_GET['akreditasi']) && $_GET['akreditasi']=='B'?'selected':'';?>>B</option>
									<option value="C" <?=isset($_GET['akreditasi']) && $_GET['akreditasi']=='C'?'selected':'';?>>C</option>
								</select>
							</div>
							<div class="form-group">
								<select class="form-control input-sm" id="prov" name="prov">
									<option value="">Provinsi</option>

									<?php
									$data_prov = $tempat->get_listProvinsi();
									if($data_prov):
										foreach($data_prov as $res){ 
									?>
										<option value="<?=$res->id_provinsi;?>" <?=isset($_GET['prov']) && $_GET['prov']==$res->id_provinsi?'selected':'';?>><?=$res->nama;?></option>

									<?php } endif; ?>
								</select>
							</div>
							<div class="form-group" id="kota">
								<select class="form-control input-sm" name="kota">
									<option value="">Kota</option>
									<?php
										$id = $_POST['prov'];
										$data_kota = $tempat->get_listKota();
										if($data_kota):
										foreach($data_kota as $res){ 
									?>
										<option value="<?=$res->id_kota;?>" <?=isset($_GET['kota']) && $_GET['kota']==$res->id_kota?'selected':'';?>><?=$res->nama;?></option>
									<?php } endif; ?>
								</select>
							</div>
							<div class="form-group">
								<select class="form-control input-sm" name="jrs">
									<option selected value="">Jurusan</option>

									<?php
									$data_jrs = $jurusan->get_list();
									if($data_jrs):
										foreach($data_jrs as $res){ 
									?>
										<option value="<?=$res->kode_jurusan;?>" <?=isset($_GET['jrs']) && $_GET['jrs']==$res->kode_jurusan?'selected':'';?>><?=$res->nama;?></option>

									<?php } endif; ?>
								</select>
							</div>
							<div class="form-group">
								<input type="text" placeholder="Nama PT" class="form-control input-sm" name="cari" <?=isset($_GET['cari'])?'value='.$_GET['cari']:'';?>>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-sm btn-primary" id="cari"><i class="fa fa-search"></i> &nbsp;Cari</button>
							</div>
						</form>
					</div>
					<div class="col-sm-10" id="isi">
						<div class="title"><h4>Daftar Perguruan Tinggi Indonesia</h4><i class="" aria-hidden="true"></i></div>

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
								if(isset($_GET['cari'])) $data_pt = $pt->cari($data);
								else $data_pt = $pt->get_all();
								if($data_pt):
									foreach($data_pt as $res){  
							?>

							<tr>
								<td align="center"><?=$i++;?></td>
								<td style="overflow:hidden;font-size: 12px"><?=substr(strtoupper($res->nama_pt),0,30);?></td>
								<td style="font-size:12px"><?=$res->status_pt;?></td>
								<td align="center"><?=$res->akreditasi;?></td>
								<td>
									<?=$res->website;?>&nbsp;
									<a href="<?=$res->website[0]!='h'?'http://'.$res->website:$res->website;?>" target="_blank"><i style="font-size: 13px" class="fa fa-external-link"></i></a>
								</td>
								<td align="center">
									<a href="<?=base_url();?>/detail?id=<?=$res->id_pt;?>" title="detail" class="text-info">
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
						</table>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
					$("#listPt").DataTable({
						"pageLength": 15
					});
				})
				$("#prov").change(function(){
					var prov = $("select#prov option:selected").val();
					$.ajax({
						url: 'kota.php',
						type: 'post',
						data: 'prov='+prov,
						success: function(respond){
							$("#kota").html(respond);
						}
					})
				})
			</script>
<?php require_once("footer.php");?>
