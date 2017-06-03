<?php

class dbConfig{

	protected $host = "localhost";
	protected $user = "root";
	protected $pass = "";
	protected $dbase = "adpti";
	protected $db;

	public function __construct(){

		$this->db = new mysqli($this->host,$this->user,$this->pass,$this->dbase);
	
	}

	public function getRet(){
		return $this->db;
	}
}

?>