<?php

	session_start();

	require_once("../functions.php");
	require_once("../model/model_tempat.php");
	require_once("../model/model_pt.php");
	require_once("../model/model_jurusan.php");

	if(!isset($_SESSION['username']) || $_SESSION['user_status']!=1){
		die(header("location: ".base_url()."/404.php"));
	}
	
	//proses update data perguruan tinggi
	$id = $_GET['id'];
	$data_pt = array(
			'nama_pt'	=> $_POST['nama_pt'],
			'status_pt'		=> $_POST['status_pt'],
			'akreditasi'	=> $_POST['akreditasi'],
			'email'			=> $_POST['email'],
			'website'		=> $_POST['website'],
			'no_telp'		=> $_POST['no_telp'],
			'fax'			=> $_POST['fax']
		);

	$edit_pt = $pt->update($id,$data_pt);


	//proses update data tempat
	$id_tempat = $_POST['id_tempat'];
	$data_tmp = array(
			'alamat'	=> $_POST['alamat'],
			'id_kota'	=> $_POST['kota'],
			'id_provinsi'	=> $_POST['provinsi'],
			'lat'		=> $_POST['lat'],
			'lng'		=> $_POST['lng']
			);
	$edit_tempat = $tempat->update($id,$data_tmp);

	//proses update daja jurusan
	$jml_jrs = $_POST['jml_jrs'];

	for($i=1;$i<=$jml_jrs;$i++){
		$id_jrs = $_POST['id_jrs'.$i];
		$akr_jrs = $_POST['jrs'.$i];

		$edit_jrs = $jurusan->update($id_jrs,$akr_jrs);	
	}

	if($edit_jrs)
	header("location: ".base_url()."/admin/edit.php?id=".$id);
	else print_r($akr_jrs);
?>