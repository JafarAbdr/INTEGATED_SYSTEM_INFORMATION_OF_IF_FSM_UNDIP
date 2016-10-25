<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_prosiding extends CI_Model {
	
	// insert data ke database   //
	
	function add($data) {
		return $this->db->insert('prosiding',$data);
	}
	public function get_ak_prosiding(){
		    //return $this->db->update('ak_jurnal',array('internasional'=>$id), array ('nasional_terakreditasi'=> $id), array ('nasional_tidak_terakreditasi'=> $id));
		    return $this->db->query("select * FROM ak_prosiding")->result_array();
	}
	public function get_all(){
		    return $this->db->query("select * FROM prosiding order by tahun desc")->result_array();
		}
	public function get_tahun(){
		    return $this->db->query("select distinct tahun FROM prosiding order by tahun asc")->result_array();
		}
	public function get_all_name(){
		    return $this->db->query("SELECT p.*, u.nama FROM prosiding as p inner join user AS u WHERE u.iduser=p.user_iduser")->result_array();
		}
	public function get_data_ketua($nip){
		    return $this->db->query("SELECT *FROM prosiding WHERE ketua like '%$nip%' order by tahun desc")->result_array();
		}
	public function get_data_ketua1($id){
		    return $this->db->query("SELECT *FROM prosiding WHERE idprosiding like '%$id%' order by tahun desc")->result_array();
		}
	public function get_data_anggota($nip){
		    return $this->db->query("SELECT *FROM prosiding WHERE anggota like '%$nip%' order by tahun desc")->result_array();
		}
	public function get_data_anggota1($id){
		    return $this->db->query("SELECT *FROM jurnal WHERE idprosiding like '%$id%' order by tahun desc")->result_array();
		}
	public function get_all_data($nip){
		    return $this->db->query("SELECT *FROM prosiding WHERE(ketua like '%$nip%' OR anggota like '%$nip%')")->result_array();
		}
	public function get_by_id($id){
		    return $this->db->query("select * FROM prosiding where idprosiding='$id'")->row_array();
		}
	public function get_by_user($id){
		    return $this->db->query("select * FROM prosiding where user_iduser='$id'")->result_array();
		}
	public function update_form($data, $id){
		    return $this->db->update('prosiding', $data, array ('idprosiding'=> $id));
		}
	public function delete($id){
		    return $this->db->delete('prosiding', array ('idprosiding'=> $id));
		}
}