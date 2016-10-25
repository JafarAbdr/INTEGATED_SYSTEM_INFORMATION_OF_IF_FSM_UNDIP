<?php
	class Db_home extends CI_Model{
		public function __Construct(){
			parent:: __Construct();
		}
		
		public function get_login($username,$password){
			return $this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
		}
		
		public function get_profile(){
			$id = $this->session->userdata('id_user');
			return $this->db->query("SELECT * FROM user WHERE id_user='$id'")->row_array();
		}
		
		public function edit_profile($a){
			$id = array('id_user' => $this->session->userdata('id_user'));
			return $this->db->update('user',$a,$id);
		}
		
		
	}

?>