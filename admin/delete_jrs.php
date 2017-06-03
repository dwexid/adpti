<?php

	require_once("../functions.php");
	require_once("../model/model_jurusan.php");

	$id = $_POST['id'];
	$jurusan->delete($id);
?>