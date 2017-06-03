	<select class="form-control input-sm" name="kota">
		<option selected value="">-</option>
		<?php
			require_once("functions.php");
			require_once("model/model_tempat.php");
			$id = $_POST['prov'];
			$data_kota = $tempat->get_listKota($id);
			if($data_kota):
			foreach($data_kota as $res){ 
		?>
			<option value="<?=$res->id_kota;?>"><?=$res->nama;?></option>
		<?php } endif; ?>
	</select>