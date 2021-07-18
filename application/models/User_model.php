<?php 
	class User_model extends CI_Model{
		public function store($data){
			$this->db->insert('user',$data);
			return true;
		}
	}


?>
