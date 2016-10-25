<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_ak extends CI_Model {
	
	// insert data ke database   //
	
	function add($data) {
		return $this->db->insert('ak',$data);
	}
	
	public function reset_ak($data){
			return $this->db->update('ak_jurnal', $data);
		    //return $this->db->update('ak_jurnal',array('internasional'=>$internasional), array ('nasional_terakreditasi'=>$nasional_terakreditasi), array ('nasional_tidak_terakreditasi'=>$nasional_tidak_terakreditasi));
		    //return $this->db->query("update ak_jurnal SET internasional='$internasional', nasional_terakreditasi='$nasional_terakreditasi', nasional_tidak_terakreditasi='$nasional_tidak_terakreditasi'")->result_array;
	}
	public function reset_ak_prosiding($data){
			return $this->db->update('ak_prosiding', $data);
	}
	public function get_ak_jurnal(){
		    //return $this->db->update('ak_jurnal',array('internasional'=>$id), array ('nasional_terakreditasi'=> $id), array ('nasional_tidak_terakreditasi'=> $id));
		    return $this->db->query("select * FROM ak_jurnal")->result_array();
	}
	public function get_ak_prosiding(){
		    //return $this->db->update('ak_jurnal',array('internasional'=>$id), array ('nasional_terakreditasi'=> $id), array ('nasional_tidak_terakreditasi'=> $id));
		    return $this->db->query("select * FROM ak_prosiding")->result_array();
	}

}