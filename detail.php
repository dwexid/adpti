<?php 

	require_once("header.php");
	require_once("model/model_pt.php");
	require_once("model/model_jurusan.php");
	require_once("model/model_tempat.php");

?>
	<div class="col-sm-offset-2 col-sm-10 content">
		<div class="col-sm-offset-1 col-sm-10 konten">
			<div class="title"><h4>Detail data</h4></div>
				<div class="col-sm-7">
					<div><h5>General</h5></div><hr>

					<?php
					
						$id = $_GET['id']; 
						$data_pt = $pt->get_detail($id);
						if($data_pt):

					?>

					<div class="detail-group">
						<div class="col-sm-5">
							<label>Nama Perguruan Tinggi :</label>
						</div>
						<div class="col-sm-7" id="nama_pt"> 
							<?=strtoupper($data_pt->nama_pt);?>
						</div>
					</div>
					<div class="detail-group">
						<div class="col-sm-5">
							<label>Status :</label>
						</div>
						<div class="col-sm-7">
							<?=$data_pt->status_pt;?>
						</div>
					</div>
					<div class="detail-group">
						<div class="col-sm-5">
							<label>Akreditasi :</label>
						</div>
						<div class="col-sm-7">
							<?=$data_pt->akreditasi;?>
						</div>
					</div>
					<div class="detail-group">
						<div class="col-sm-5">
							<label>Website :</label>
						</div>
						<div class="col-sm-7">
							<?=$data_pt->website;?>
						</div>
					</div>
					<div class="detail-group">
						<div class="col-sm-5">
							<label>No. Telpon :</label>
						</div>
						<div class="col-sm-7">
							<?=$data_pt->no_telp;?>
						</div>
					</div>
					<div class="detail-group">
						<div class="col-sm-5">
							<label>Fax :</label>
						</div>
						<div class="col-sm-7">
							<?=$data_pt->fax;?>
						</div>
					</div>
					<div class="detail-group">
						<div class="col-sm-5">
							<label>Email :</label>
						</div>
						<div class="col-sm-7">
							<?=$data_pt->email;?>
						</div>
					</div>

					<?php endif; ?>

				</div>
				<div class="col-sm-5">
					<div><h5>Jurusan dan Akreditasi</h5></div><hr>
					<div class="jurusan-input col-sm-12">
						<table class="table no-brd table-triped">
						<tr>
							<th>#</th>
							<th>Jurusan</th>
							<th>Akr</th>
						</tr>
						<?php
							$i=1;
							$data_jrs = $jurusan->get_jurusan($id);
							if($data_jrs):
								foreach($data_jrs as $jrs){
						?>

							<tr>
								<td align="center"><?=$i++;?>.</td>
								<td><?=$jrs->jurusan;?></td>
								<td align="center"><?=$jrs->akr_jurusan;?></td>
							</tr>

						<?php } endif; ?>
						</table>
					</div>
				</div>
				<div class="col-sm-12">
					<div><h5>Lokasi</h5></div><hr>
					
					<?php 
						$data_tmp = $tempat->get($id);
						if($data_tmp):
					?>

					<div class="col-sm-6 lokasi-input">
						<div class="detail-group">
							<div class="col-sm-4">
								<label class="">Alamat :</label>
							</div>
							<div class="col-sm-8"><?=$data_tmp->alamat;?></div>
						</div>
						<div class="detail-group">
							<div class="col-sm-4">
								<label class="">Kota/Kab :</label>
							</div>
							<div class="col-sm-8"><?=$data_tmp->kota;?></div>
						</div>
						<div class="detail-group">
							<div class="col-sm-4">
								<label class="">Provinsi :</label>
							</div>
							<div class="col-sm-8"><?=$data_tmp->provinsi;?></div>
						</div>
					</div>	
					<div class="col-sm-6" id="jarak">
					</div>

					<?php if($data_tmp->lat!=0.000000 && $data_tmp->lng!=0.000000){?>
					<div class="col-sm-12 peta" id="tempat_peta" >
						</div>
						<div id="latNow" style="display: none;"></div>
						<div id="lngNow" style="display: none;"></div>
		
						<script>var x = document.getElementById("latNow");
							var y = document.getElementById("lngNow");

							function getLocation() {
							    if (navigator.geolocation) {
							        navigator.geolocation.getCurrentPosition(showPosition);
							    } else {
							        view.innerHTML = "Yah browsernya ngga support Geolocation bro!";
							    }
							}
							function showPosition(position) {
							    x.innerHTML = position.coords.latitude;
							    y.innerHTML = position.coords.longitude;
							}
							getLocation();
						</script>

						<script type="text/javascript">
							$(window).load(function(){
								var lat=document.getElementById("latNow").innerHTML;
								var lng=document.getElementById("lngNow").innerHTML;
						        $.ajax({
						           	url  :'jarak.php',
						           	type :'post',
						           	data :'lat='+lat+'&lng='+lng+'&ptlat='+ptlat+'&ptlng='+ptlng,
						           	beforeSend:function(){
						                $("#jarak").html('loading...');
						           	},
						            success:function(respon){
						               	$("#jarak").html(respon);
						           	}
						        });
						    })
						</script>
							
							
				        <script src="http://maps.googleapis.com/maps/api/js"></script>
				        <span style="display: none;" id="ptlat"><?=$data_tmp->lat;?></span>
				        <span style="display: none;" id="ptlng"><?=$data_tmp->lng;?></span>
				        <script>
				 			  var ptlat = document.getElementById('ptlat').innerHTML;
				 			  var ptlng = document.getElementById('ptlng').innerHTML;
				 			  ptlat = parseFloat(ptlat);
				 			  ptlng = parseFloat(ptlng);
				 		function initMap() {
							  var myLatLng = {lat: ptlat, lng: ptlng};
							  var pt = document.getElementById('nama_pt').innerHTML;

							  var map = new google.maps.Map(document.getElementById('tempat_peta'), {
							    zoom: 15,
							    mapTypeId: google.maps.MapTypeId.ROADMAP,
							    center: myLatLng
							  });

							  var marker = new google.maps.Marker({
							    position: myLatLng,
							    map: map,
							    title: pt
							  });
						}
				        </script>
				        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6PlhfzWlcQ-I0FVpNli-p4cR92yaaby8&callback=initMap"
				    async defer></script>    
	    <!-- end of pemanggilan peta -->
					<?php } ?>

			<?php else: ?>
				<div style="padding:20px">
				<span class="alert alert-danger">
					<span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;Belum ada lokasi yang ditambahkan!!
				</span>
				</div>
			<?php endif;?>

			</div>
		</div>
	</div>
