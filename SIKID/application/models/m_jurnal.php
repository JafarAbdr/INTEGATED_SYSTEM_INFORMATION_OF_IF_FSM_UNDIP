<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_jurnal extends CI_Model {
	
	// insert data ke database   //
	
	function add($data) {
		return $this->db->insert('jurnal',$data);
	}
	public function get_ak_jurnal(){
		    //return $this->db->update('ak_jurnal',array('internasional'=>$id), array ('nasional_terakreditasi'=> $id), array ('nasional_tidak_terakreditasi'=> $id));
		    return $this->db->query("select * FROM ak_jurnal")->result_array();
			//return $this->db->query("SELECT a.*, j.kategori FROM ak_jurnal as a inner join jurnal AS j WHERE a.iduser=p.user_iduser")->result_array();
	}
	
	public function get_all(){
		    return $this->db->query("select * FROM jurnal order by tahun desc")->result_array();
		}
	public function get_tahun(){
		    return $this->db->query("select distinct tahun FROM jurnal order by tahun asc")->result_array();
		}
	public function get_all_name(){
		    return $this->db->query("SELECT p.*, u.nama FROM jurnal as p inner join user AS u WHERE u.iduser=p.user_iduser")->result_array();
		}
	public function get_data_ketua($nip){
		    return $this->db->query("SELECT *FROM jurnal WHERE ketua like '%$nip%' order by tahun desc")->result_array();
		}
	public function get_data_ketua1($id){
		    return $this->db->query("SELECT *FROM jurnal WHERE idjurnal like '%$id%' order by tahun desc")->result_array();
		}
	public function get_data_anggota($nip){
		    return $this->db->query("SELECT *FROM jurnal WHERE anggota like '%$nip%' order by tahun desc")->result_array();
		}
	public function get_data_anggota1($id){
		    return $this->db->query("SELECT *FROM jurnal WHERE idjurnal like '%$id%' order by tahun desc")->result_array();
		}
	public function get_all_data($nip){
		    return $this->db->query("SELECT *FROM jurnal WHERE(ketua like '%$nip%' OR anggota like '%$nip%')")->result_array();
		}
	public function get_by_id($id){
		    return $this->db->query("select * FROM jurnal where idjurnal='$id'")->row_array();
		}
	public function get_by_user($id){
		    return $this->db->query("select * FROM jurnal where user_iduser='$id'")->result_array();
		}
	public function update_form($data, $id){
		    return $this->db->update('jurnal', $data, array ('idjurnal'=> $id));
		}
	public function delete($id){
		    return $this->db->delete('jurnal', array ('idjurnal'=> $id));
		}
}

