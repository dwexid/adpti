<?php

require_once(base_url()."/dbConfig.php");

class model_pt extends dbConfig{

	public function __construct(){
		parent::__construct();
	}

	public function get_all($p=1){

		$q = "select * from tbl_pt where publish_status='$p'";
		if($p==-1) $q="select * from tbl_pt where publish_status!='1'";

		$query = $this->db->query($q);

		if($query){
			$result = array();
			while($res = $query->fetch_object()){
				$result[] = $res;
			}
			return $result;
		}

		return false;
	}

	public function cari($data){

		$q = "select distinct a.* from tbl_pt a LEFT JOIN tbl_jurusan b ON a.id_pt=b.id_pt
			  LEFT JOIN tbl_tempat c ON a.id_pt=c.id_pt
			  where a.nama_pt like '%".$data['nama_pt']."%' AND a.status_pt like '%".$data['status_pt']."%' 
			  AND a.akreditasi like '%".$data['akreditasi']."%'";

		if($data['jurusan']!="") $q.=" AND b.kode_jurusan like '%".$data['jurusan']."%'";

		if($data['provinsi']!="") $q.= "AND c.id_kota like '%".$data['kota']."%' AND c.id_provinsi like '%".$data['provinsi']."%'";

		$query = $this->db->query($q);
		if($query){

			$result = array();
			while($res = $query->fetch_object()){
				$result[] = $res;
			}

			return $result;
		}
		return false;
	}

	public function verifikasi($id){

		$query = $this->db->query("update tbl_pt set publish_status='1' where id_pt=$id");
		if($query) return true;
		return false;
	}

	public function get_detail($id){

		$query = $this->db->query("select * from tbl_pt where id_pt=$id");

		if($query){

			$result[] = $query->fetch_object();
			return $result[0];
		}

		return false;
	}

	public function add($data){

		$data = "'".implode("','",$data)."'";
		$q = "insert into tbl_pt (nama_pt,status_pt,akreditasi,website,email,no_telp,fax,publish_status)
			  values(".$data.");";

		$query = $this->db->query($q);

		if($query) return true;
		else return false;

	}

	public function getInsertId(){
		return $this->db->insert_id;
	}

	public function delete($id){

		$q = "delete from tbl_pt where id_pt=$id";

		$query = $this->db->query($q);

		if($query) return true;
		return false;
	}

	public function update($id,$data){

		$q = "update tbl_pt set nama_pt='".$data['nama_pt']."',status_pt='".$data['status_pt']."',akreditasi='".$data['akreditasi']."',
			  email='".$data['email']."',website='".$data['website']."',no_telp='".$data['no_telp']."',fax='".$data['fax']."' where id_pt=$id";

		$query = $this->db->query($q);

		if($query) return true;
		return false;
	}

}

$pt = new model_pt();


?>