<?php 

	require_once("../header.php");
	require_once("../model/model_pt.php");
	require_once("../model/model_jurusan.php");
	require_once("../model/model_tempat.php");

	if(!isset($_SESSION['username']) || $_SESSION['user_status']!=0){
		die(header("location: ".base_url()."/404.php"));
	}

	$user_id = $_SESSION['user_id'];

?>

	<div class="col-sm-offset-2 col-sm-10 content">
		<div class="col-sm-offset-1 col-sm-10 konten">
			<div class="title"><h4>Tambah usulan baru</h4></div>
			<form class="form-horizontal" action="<?=base_url();?>/user/add_proc.php" method="post">
				<div class="col-sm-7">
					<div><h5>General</h5></div><hr>
					<div class="form-group">
						<label class="control-label col-sm-5" for="nama_pt">Nama Perguruan Tinggi</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="nama_pt" name="nama_pt">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-5" for="status">Status</label>
						<div class="col-sm-7">
							<select name="status" class="form-control">
								<option>-</option>
								<option value="NEGERI">NEGERI</option>
								<option value="SWASTA">SWASTA</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-5" for="akreditasi">Akreditasi</label>
						<div class="col-sm-7">
							<select name="akreditasi" class="form-control">
								<option>-</option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-5" for="website">Website</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="website" name="web">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-5" for="no_telp">No. Telpon</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="no_telp" name="telpon">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-5" for="fax">Fax</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="fax" name="fax">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-5" for="Email">Email</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="Email" name="email">
						</div>
					</div>
				</div>
				<div class="col-sm-5">
					<div><h5>Jurusan</h5></div><hr>
					<div class="jurusan-input col-sm-12">
						<div class="form-group">

						<?php
							$data_jrs = $jurusan->get_list();
							if($data_jrs):
								$i=1;
								foreach($data_jrs as $res){
						?>

							<div class="col-sm-12">
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
					</div>
				</div>
				<div class="col-sm-12">
					<div>
						<h5>Lokasi  &nbsp;
							<button class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-plus" title="Tambah form lokasi"></button>
						</h5>
					</div><hr>
					<div class="col-sm-6 lokasi-input">
						<?php 
							$data_kota = $tempat->get_listKota();
							$data_prov = $tempat->get_listProvinsi();
						?>
						<div class="form-group">
							<label class="control-label col-sm-4" for="alamat">Alamat</label>
							<div class="col-sm-8">
								<textarea class="form-control" name="alamat" id="alamat"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">Provinsi</label>
							<div class="col-sm-8">
								<select name="provinsi" id="prov" class="form-control" required>
									<option>-</option>
								
								<?php
									if($data_prov):
										foreach($data_prov as $prov){ ?>
											<option value="<?=$prov->id_provinsi;?>" name="prov"><?=$prov->nama;?></option>
								<?php } endif; ?>

								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">Kota/Kabupaten</label>
							<div class="col-sm-8" id="kota">
								<select name="kota" class="form-control" required>
									<option>-</option>
								
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="lat">Latitude</label>
							<div class="col-sm-8">
								<input type="text" name="lat" id="lat" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="lng">Longitude</label>
							<div class="col-sm-8">
								<input type="text" name="lng" id="lng" class="form-control" required>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 pull-right save-button">
					<input type="hidden" name="publisher" value="<?=$user_id;?>">
					<button class="btn btn-primary"><span class="glyphicon"></span> Tambahkan data</button>
				</div>
			</form>
		</div>
	</div>

	<script type="text/javascript">
		
				$("#prov").change(function(){
					var prov = $("select#prov option:selected").val();
					$.ajax({
						url: '../kota.php',
						type: 'post',
						data: 'prov='+prov,
						success: function(respond){
							$("#kota").html(respond);
						}
					})
				})
				
	</script>