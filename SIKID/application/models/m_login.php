<?php
  class m_login extends CI_Model{
		public function __Construct(){
			parent:: __Construct();
		}
	
	public function getUser($akun){
	  //query datanya cari ada ato tidak di DB.
		$dd = $this->db->query("SELECT * FROM user WHERE nip= '$akun[nip]' and password='$akun[password]' ")->row_array();
		
		if(count($dd) > 0){
			$this->session->set_userdata('iduser',$dd['iduser']);
			$this->session->set_userdata('nama',$dd['nama']);
			$this->session->set_userdata('level',$dd['level']);
			$this->session->set_userdata('nip',$dd['nip']);
			
		}else{
			redirect('c_login/');
		}
		
	}
	
	}
		
?>