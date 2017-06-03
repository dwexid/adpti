<?php

require_once("../functions.php");
require_once("../model/model_tempat.php");

	$alamat = $_POST['alamat'];
	$kota = $_POST['kota'];
	$prov = $_POST['provinsi'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$id_pt = $_POST['id_pt'];

	$data_tempat = array(
		'id_pt'		=> $id_pt,
		'alamat'	=> $alamat,
		'kota'		=> $kota,
		'provinsi'	=> $prov,
		'lat'		=> $lat,
		'lng'		=> $lng
		);

	$tempat->add($data_tempat);

?>