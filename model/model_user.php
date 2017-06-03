<?php

require_once(base_url()."/dbConfig.php");

class model_user extends dbConfig{

	public function __construct(){
		parent::__construct();
	}

	public function validate($user,$pass){

		$res = $this->db->query("select * from tbl_user where username='".$user."' AND password='".$pass."';");

		if($res->num_rows > 0){

			$result[] = $res->fetch_object();
			return $result[0];
		
		}else{
			return false;
		}

	}

	public function add($data){

		$q = "insert into tbl_user (username,fullname,email,password,status) 
			  values('".$data['user']."','".$data['fullname']."','".$data['email']."','".$data['pass']."','".$data['status']."');";
			  
		$query = $this->db->query($q);
		
		if(!$query) echo "gagal input data user";
	
	}

	public function getNama($id){
		$query = $this->db->query("select * from tbl_user where id=$id");
		if($query){
			$temp[] = $query->fetch_object();
			return $temp[0];
		}
		return null;
	}

	public function notif_add($isi,$usr,$tgl){
		$query = $this->db->query("insert into tbl_notif (isi,user_id,tgl) values('".$isi."',$usr,'".$tgl."')");
		if(!$query) echo "notif gagal";
	}

	public function notif_setOld($id){
		$query = $this->db->query("update tbl_notif set new=0 where user_id=$id");
		if(!$query) echo "gagal update";
	}

	public function notif_get($id){
		$query = $this->db->query("select * from tbl_notif where user_id=$id order by id_notif desc");

		if($query){
			$result = array();
			while($res = $query->fetch_object()){
				$result[] = $res;
			}
			return $result;
		}

	}

	public function notif_getNew($id){
		$query = $this->db->query("select * from tbl_notif where user_id=$id and new=1");
		if($query){
			return $query->num_rows;
		}
		return 0;
	}
}

$user = new model_user();

?>