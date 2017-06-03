<?php
	require_once("dbConfig.php");

	function base_url(){
		return "http://localhost/adpti";
	}

	function getInit(){
		
		$ret = new dbConfig();
		return $ret->getRet();

	}

	$myInit = getInit();
?>
