<?php

session_start();

require_once("../functions.php");
require_once("../model/model_pt.php");
require_once("../model/model_jurusan.php");
require_once("../model/model_tempat.php");

	if(!isset($_SESSION['username']) || $_SESSION['user_status']!=1){
		die(header("location: ".base_url()."/404.php"));
	}

	$nama_pt = $_POST['nama_pt'];
	$akreditasi = $_POST['akreditasi'];
	$status = $_POST['status'];
	$web = $_POST['web'];
	$email = $_POST['email'];
	$telpon = $_POST['telpon'];
	$fax = $_POST['fax'];


	$data = array(
			'nama_pt'		=> $nama_pt,
			'status'		=> $status,
			'akreditasi'	=> $akreditasi,
			'web'			=> $web,
			'email'			=> $email,
			'no_telp'		=> $telpon,
			'fax'			=> $fax,
			'publish_status' => 1
			);


	$tambah_data = $pt->add($data);
	$id_pt = $pt->getInsertId();

	if($tambah_data){
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
		}else{
			$data_jr = array(
				'id_pt'			=> $id_pt,
				'kode_jurusan'	=> '10925',
				'akreditasi'	=> ''
				);
			$jurusan->add($data_jr);
		}

		$alamat = $_POST['alamat'];
		$kota = $_POST['kota'];
		$prov = $_POST['provinsi'];
		$lat = $_POST['lat'];
		$lng = $_POST['lng'];

		$data_tempat = array(
			'id_pt'		=> $id_pt,
			'alamat'	=> $alamat,
			'kota'		=> $kota,
			'provinsi'	=> $prov,
			'lat'		=> $lat,
			'lng'		=> $lng
			);

		$tempat->add($data_tempat);

		header("location: ".base_url());
	}

?>