<?php 

	require_once("../header.php");
	require_once("../model/model_pt.php");
	require_once("../model/model_jurusan.php");
	require_once("../model/model_tempat.php");

?>

	<div class="col-sm-offset-2 col-sm-10 content">
		<div class="col-sm-offset-1 col-sm-10 konten">
			<div class="title"><h4>Edit data</h4></div>

					<?php 
						$id = $_GET['id'];
						$data_pt = $pt->get_detail($id);
					?>

			<form class="form-horizontal" method="post" action="<?=base_url();?>/user/edit_proc.php?id=<?=$id;?>">
				<div class="col-sm-7">
					<div><h5>General</h5></div><hr>
					<div class="form-group">
						<label class="control-label col-sm-5" for="nama_pt">Nama Perguruan Tinggi</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="nama_pt" name="nama_pt" value="<?=$data_pt->nama_pt;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-5" for="status_pt">Status</label>
						<div class="col-sm-7">
							<select name="status_pt" class="form-control">
								<option>-</option>
								<option value="NEGERI" <?=$data_pt->status_pt=='NEGERI'?'selected':'';?>>NEGERI</option>
								<option value="SWASTA" <?=$data_pt->status_pt=='SWASTA'?'selected':'';?>>SWASTA</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-5" for="akreditasi">Akreditasi</label>
						<div class="col-sm-7">
							<select name="akreditasi" class="form-control">
								<option>-</option>
								<option value="A" <?=$data_pt->akreditasi=='A'?'selected':'';?>>A</option>
								<option value="B" <?=$data_pt->akreditasi=='B'?'selected':'';?>>B</option>
								<option value="C" <?=$data_pt->akreditasi=='C'?'selected':'';?>>C</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-5" for="website">Website</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="website" value="<?=$data_pt->website;?>" name="website">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-5" for="no_telp">No. Telpon</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="telpon" name="no_telp" value="<?=$data_pt->no_telp;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-5" for="fax">Fax</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="fax" name="fax" value="<?=$data_pt->fax;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-5" for="Email">Email</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="Email" name="email" value="<?=$data_pt->email;?>">
						</div>
					</div>
				</div>
				<div class="col-sm-5">
					<div><h5>Jurusan dan Akreditasi<span class="pull-right"><a data-toggle="modal" data-target="#mymodal" href="javascript:void(0)">Tambah Jurusan</a></span></h5> </div><hr>
					<div class="jurusan-input col-sm-12">

						<?php
							$i=1;
							$data_jrs = $jurusan->get_jurusan($id);
							if($data_jrs):
								foreach($data_jrs as $jrs){
						?>
							<div class="form-group">
								<input type="hidden" name="id_jrs<?=$i;?>" value="<?=$jrs->id_jurusan;?>">							
								<div class="col-xs-1">
									<a href="javascript:void(0)" onclick="remove()" id_jr="<?=$jrs->id_jurusan;?>" class="remove-jrs"><span id="remove-jrs" class="glyphicon glyphicon-remove"></span></a>
								</div>
								<label class="col-xs-7" style="font-weight: normal;font-size:12px"><?=$jrs->jurusan;?></label>
								<div class="col-xs-3">
									<select class="form-control input-sm" name="jrs<?=$i++;?>">
										<option>-</option>
										<option value="A" <?=$jrs->akr_jurusan=='A'?'selected':'';?>>A</option>
										<option value="B" <?=$jrs->akr_jurusan=='B'?'selected':'';?>>B</option>
										<option value="C" <?=$jrs->akr_jurusan=='C'?'selected':'';?>>C</option>
									</select>
								</div>
							</div>

						<?php } endif; ?>
						
						<input type="hidden" id="jml_jrs" value="<?=$i-1;?>" name="jml_jrs">

					</div>
				</div>
				<div class="col-sm-12">
					<div>
						<h5>Lokasi  &nbsp;<!--
							<button class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-plus" title="Tambah form lokasi"></button>-->
						</h5>
					</div><hr>
					<div class="col-sm-6 lokasi-input">
						<?php 
							$data_kota = $tempat->get_listKota();
							$data_prov = $tempat->get_listProvinsi();
							$data_tmp  = $tempat->get_tempat($id);
						?>
						<input type="hidden" name="id_tempat" value="<?=$data_tmp->id_tempat;?>">
						<div class="form-group">
							<label class="control-label col-sm-4" for="alamat">Alamat</label>
							<div class="col-sm-8">
								<textarea class="form-control" name="alamat" id="alamat">
									<?=$data_tmp->alamat;?>
								</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">Provinsi</label>
							<div class="col-sm-8">
								<select name="provinsi" class="form-control">
									<option>-</option>
								
								<?php
									if($data_prov):
										foreach($data_prov as $prov){ ?>
											<option value="<?=$prov->id_provinsi;?>" name="prov" <?=$prov->id_provinsi==$data_tmp->id_provinsi?'selected':'';?>>
												<?=$prov->nama;?>
											</option>
								<?php } endif; ?>

								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">Kota/Kabupaten</label>
							<div class="col-sm-8">
								<select name="kota" class="form-control">
									<option>-</option>
								
								<?php
									if($data_kota):
										foreach($data_kota as $kota){ ?>
											<option value="<?=$kota->id_kota;?>" name="kota" <?=$kota->id_kota==$data_tmp->id_kota?'selected':'';?>>
												<?=$kota->nama;?>
											</option>
								<?php } endif; ?>
								
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="lat">Lat</label>
							<div class="col-sm-8">
								<input type="text" name="lat" id="lat" class="form-control" value="<?=$data_tmp->lat;?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="lng" >Lng</label>
							<div class="col-sm-8">
								<input type="text" name="lng" id="lng" class="form-control" value="<?=$data_tmp->lng;?>" required>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 pull-right save-button">
					<button class="btn btn-primary"><span class="glyphicon"></span> Simpan</button>
				</div>
			</form>

			<div class="clearfix"></div>
			<div class="modal fade" id="mymodal" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header bg-primary">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Tambah Jurusan</h4>
						</div>
						<div style="overflow-y: scroll;height: 330px;" class="modal-body">
							<form id="form_addJrs">
								<div class="form-group">

								<?php
									$data_jrs = $jurusan->get_list();
									if($data_jrs):
										$i=1;
										foreach($data_jrs as $res){
								?>

									<div class="col-sm-12" style="margin:-5px 0">
										<div class="checkbox form_jr">
											<label>
												<input type="checkbox" name="<?=$i++;?>" value="<?=$res->kode_jurusan;?>">
												<?=$res->nama;?>
											</label>
										</div>
									</div>

								<?php } else: ?>
									<div class="col-sm-12">Tidak ada data tersedia</div>
								<?php endif; ?>
									
									<input type="hidden" name="id_pt" value="<?=$id;?>">
									<input type="hidden" id="jml_jr" name="jml_jr">
									<script type="text/javascript">
										var ini="";
										$(document).ready(function(){
											$(".form_jr input").change(function(){
												var $in = $(this);
												if($in.is(":checked")){
													x = $in.attr("name");
													ini = ini+","+x;
													$("#jml_jr").val(ini);
												}
											});
										})
									</script>
								
								</div>
							</form>
						</div>
						<div class="modal-footer bg-info">
							<button type="button" id="addJr" class="btn btn-sm btn-primary pull-right">Tambah</button>
						</div>

						<script type="text/javascript">
							$("#addJr").click(function(){
								$.ajax({
									url: 'add_jrs.php',
									type: 'post',
									data: $("#form_addJrs").serialize(),
									success: function(html){
										location.reload();
									}
								})
							})
							$(".remove-jrs").click(function(){
								var id_jrs = $(this).attr('id_jr');
								$.ajax({
									url: 'delete_jrs.php',
									type: 'post',
									data: 'id='+id_jrs,
									success: function(html){
										location.reload();
									}
								})
							})
						</script>

					</div>
				</div>
			</div>

		</div>
	</div>
