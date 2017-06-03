<?php 
	$n = $_POST['n'];
	require_once("../functions.php");
	require_once("../model/model_tempat.php");
?>

					<div class="col-sm-6 lokasi-input">
						<?php 
							$data_kota = $tempat->get_listKota();
							$data_prov = $tempat->get_listProvinsi();
						?>
						<div class="form-group">
							<label class="control-label col-sm-4" for="alamat">Alamat</label>
							<div class="col-sm-8">
								<textarea class="form-control" name="alamat<?=$n;?>" id="alamat" required></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">Provinsi</label>
							<div class="col-sm-8">
								<select name="provinsi<?=$n;?>" id="prov<?=$n;?>" class="form-control" required>
									<option>-</option>
								
								<?php
									if($data_prov):
										foreach($data_prov as $prov){ ?>
											<option value="<?=$prov->id_provinsi;?>" name="prov<?=$n;?>"><?=$prov->nama;?></option>
								<?php } endif; ?>

								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">Kota/Kabupaten</label>
							<div class="col-sm-8">
								<select name="kota<?=$n;?>" class="form-control" id="kota<?=$n;?>" required>
									<option>-</option>
								
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="lat">Latitude</label>
							<div class="col-sm-8">
								<input type="text" name="lat<?=$n;?>" id="lat" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="lng">Longitude</label>
							<div class="col-sm-8">
								<input type="text" name="lng<?=$n;?>" id="lng" class="form-control" required>
							</div>
						</div>
					</div>


			<script type="text/javascript" src="<?=base_url()?>/assets/js/jquery.min.js"></script>

			<script type="text/javascript">
				$(document).ready(function(){
					$("#listPt").DataTable();
				})
				$("#prov").change(function(){
					var prov = $("select#prov1 option:selected").val();
					$.ajax({
						url: '../kota.php',
						type: 'post',
						data: 'prov='+prov,
						success: function(respond){
							$("#kota1").html(respond);
						}
					})
				})
			</script>