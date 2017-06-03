<?php

require_once(base_url()."/dbConfig.php");

class model_tempat extends dbConfig{

	public function __construct(){
		parent::__construct();
	}

	public function get_listKota($pr=""){

		$query = $this->db->query("select * from tbl_kota order by nama asc");
		if($pr!="") $query = $this->db->query("select * from tbl_kota where id_provinsi='$pr' order by nama asc");
		
		while($res = $query->fetch_object()){
			$result[] = $res;
		}

		return $result;
	}

	public function get_listProvinsi(){

		$query = $this->db->query("select * from tbl_provinsi order by nama asc");

		while($res = $query->fetch_object()){
			$result[] = $res;
		}

		return $result;
	}

	public function get_tempat($id){

		$query = $this->db->query("select * from tbl_tempat where id_pt=$id");

		if($query){
			$result[] = $query->fetch_object();
			return $result[0];
		}

		return false;
	}

	public function get($id){

		$query = $this->db->query("select a.*,b.nama as kota,c.nama as provinsi from tbl_tempat as a
								   join tbl_kota as b on a.id_kota=b.id_kota
								   join tbl_provinsi as c on a.id_provinsi=c.id_provinsi 
								   where id_pt=$id");

		$result[] = $query->fetch_object();
		return $result[0];
	}

	public function add($data){
		$data = "'".implode("','",$data)."'";
		
		$query = $this->db->query("insert into tbl_tempat (id_pt,alamat,id_kota,id_provinsi,lat,lng) values($data);");

		if($query) return true;
		else return false;

	}

	public function update($id,$data){

		$q = "update tbl_tempat set alamat='".$data['alamat']."',id_kota='".$data['id_kota']."',id_provinsi='".$data['id_provinsi']."',lat='".$data['lat']."',lng='".$data['lng']."' where id_pt=".$id;

		$query = $this->db->query($q);
		if($query) return true;
		return false;
	}

}

$tempat = new model_tempat();

?>