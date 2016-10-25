<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_penelitian extends CI_Model {
	// insert data ke database   //
	
	function add($data) {
		return $this->db->insert('penelitian',$data);
	}
	public function get_all(){
		    return $this->db->query("select * FROM penelitian order by tahun desc")->result_array();
		}
	public function get_tahun(){
		    return $this->db->query("select distinct tahun FROM penelitian order by tahun asc")->result_array();
		}
	public function get_all_name(){
		    return $this->db->query("SELECT p.*, u.nama FROM penelitian as p inner join user AS u WHERE u.iduser=p.user_iduser")->result_array();
		}
	public function get_data_ketua($nip){
		    return $this->db->query("SELECT *FROM penelitian WHERE ketua like '%$nip%' order by tahun desc")->result_array();
		}
	public function get_data_anggota($nip){
		    return $this->db->query("SELECT *FROM penelitian WHERE anggota like '%$nip%' order by tahun desc")->result_array();
		}
	public function get_all_data($nip){
		    return $this->db->query("SELECT *FROM penelitian WHERE(ketua like '%$nip%' OR anggota like '%$nip%')")->result_array();
		}
	public function get_by_id($id){
		    return $this->db->query("select * FROM penelitian where idpenelitian='$id'")->row_array();
		}
	public function get_by_user($id){
		    return $this->db->query("select * FROM penelitian where user_iduser='$id'")->result_array();
		}
	public function update_form($data, $id){
		    return $this->db->update('penelitian', $data, array ('idpenelitian'=> $id));
		}
	public function delete($id){
		    return $this->db->delete('penelitian', array ('idpenelitian'=> $id));
		}
}

