<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_User extends CI_Model {
	
	// insert data ke database   //
	
	function add($data) {
		return $this->db->insert('user',$data);
	}
	public function get_by_id($id){
		    return $this->db->query("select * FROM user where iduser='$id'")->row_array();
		}	
	public function get_all(){
		    return $this->db->query("select * FROM user")->result_array();
		}
	public function delete($id){
		    return $this->db->delete('user', array ('iduser'=> $id));
		}
	public function reset_password($id){
		    return $this->db->update('user',array('password'=>MD5(12345678)), array ('iduser'=> $id));
	}
	public function update_user($data, $id){
		    return $this->db->update('user', $data, array ('iduser'=> $id));
	}

}