<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_pengabdian extends CI_Model {
	
	// insert data ke database   //
	
	function add($data) {
		return $this->db->insert('pengabdian',$data);
	}
	public function get_all(){
		    return $this->db->query("select * FROM pengabdian order by tahun desc")->result_array();
		}
	public function get_tahun(){
		    return $this->db->query("select distinct tahun FROM pengabdian order by tahun asc")->result_array();
		}
	public function get_all_name(){
		    return $this->db->query("SELECT p.*, u.nama FROM pengabdian as p inner join user AS u WHERE u.iduser=p.user_iduser")->result_array();
		}
	public function get_data_ketua($nip){
		    return $this->db->query("SELECT *FROM pengabdian WHERE ketua like '%$nip%' order by tahun desc")->result_array();
		}
	public function get_data_anggota($nip){
		    return $this->db->query("SELECT *FROM pengabdian WHERE anggota like '%$nip%' order by tahun desc")->result_array();
		}
	public function get_all_data($nip){
		    return $this->db->query("SELECT *FROM pengabdian WHERE(ketua like '%$nip%' OR anggota like '%$nip%')")->result_array();
		}
	public function get_by_id($id){
		    return $this->db->query("select * FROM pengabdian where idpengabdian='$id'")->row_array();
		}
	public function get_by_user($id){
		    return $this->db->query("select * FROM pengabdian where user_iduser='$id'")->result_array();
		}
	public function update_form($data, $id){
		    return $this->db->update('pengabdian', $data, array ('idpengabdian'=> $id));
		}
	public function delete($id){
		    return $this->db->delete('pengabdian', array ('idpengabdian'=> $id));
		}
}