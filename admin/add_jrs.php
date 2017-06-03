<?php

		require_once("../functions.php");
		require_once("../model/model_jurusan.php");

		$id_pt = $_POST['id_pt'];
		$jrs = $_POST['jml_jr'];

		if($jrs!=""){

			$jrs = ltrim($jrs,",");
			$jrs = explode(",",$jrs);

			$x=0;
			for($i=0;$i<count($jrs);$i++){
				echo $id_pt;
				$x = $jrs[$i];
				$kode_jr = $_POST[$x];
				echo $kode_jr."<br>";
				if($kode_jr!=''){
					$data_jr = array(
						'id_pt'			=> $id_pt,
						'kode_jurusan'	=> $kode_jr,
						'akreditasi'	=> ''
						);

					$jurusan->add($data_jr);
				}
			}
		}

?>