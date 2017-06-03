
					<?php
						$latNow = $_POST['lat'];
						$lngNow = $_POST['lng'];
						$ptlat = $_POST['ptlat'];
						$ptlng = $_POST['ptlng'];

						$data = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=$latNow,$lngNow&destinations=$ptlat,$ptlng&language=id-ID&sensor=false");
						$data = json_decode($data);

						$time = 0;
						$distance = 0;

						foreach($data->rows[0]->elements as $road) {
						    $time += $road->duration->value;
						    $distance += $road->distance->value;
						}
					?>        
						<div class="detail-group">
							<div class="col-sm-5">
								<label class="">Jarak : </label>
							</div>
							<div class="col-sm-7"><?=number_format($distance)." meter / ".floor($distance / 1000). " km";?></div>
						</div>
						<div class="detail-group">
							<div class="col-sm-5">
								<label class="">Waktu tempuh :</label>
							</div>
							<div class="col-sm-7"><?=gmdate('H',$time)." jam ".gmdate('i',$time)." menit";?></div>
						</div>
						<div class="detail-group">
							<div class="col-sm-5">
								<label class="">Asal :</label>
							</div>
							<div class="col-sm-7"><?=$data->origin_addresses[0];?></div>
						</div>
						<div class="detail-group">
							<div class="col-sm-5">
								<label class="">Tujuan :</label>
							</div>
							<div class="col-sm-7"><?=$data->destination_addresses[0];?></div>
						</div>