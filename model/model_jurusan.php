<?php

	require_once(base_url()."/dbConfig.php");

	class model_jurusan extends dbConfig{

		public function __construct(){
			parent::__construct();
		}

		public function get_list($lim=0){

			$q = "select * from tbl_list_jurusan";
			if($lim!=0) $q = "select * from tbl_list_jurusan limit $lim";
			
			$query = $this->db->query($q);
			while($res = $query->fetch_object()){
				$result[] = $res;
			}

			return $result;
		}

		public function get_jurusan($id){

			$query = $this->db->query("select a.id as id_jurusan,a.kode_jurusan,a.akreditasi AS akr_jurusan,b.nama AS jurusan from tbl_jurusan AS a JOIN tbl_list_jurusan AS b ON a.kode_jurusan = b.kode_jurusan where a.id_pt=".$id.";");
			$result = array();
			while($res = $query->fetch_object()){
				$result[] = $res;
			}

			return $result;
		}

		public function add($data){

			$data = "'".implode("','",$data)."'";
			$query = $this->db->query("insert into tbl_jurusan values('',".$data.");");

			if($query) return true;
			else return false;
		}

		public function update($id,$data){

			$q = "update tbl_jurusan set akreditasi='$data' where id=".$id;
			$query = $this->db->query($q);

			if($query) return true;
			return false;
		}

		public function delete($id){
			$query = $this->db->query("delete from tbl_jurusan where id=$id");
			if($query) return true;
			return false;
		}

	}
									
	$jurusan = new model_jurusan();

?>