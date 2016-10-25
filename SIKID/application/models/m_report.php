<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_report extends CI_Model {
	
	// insert data ke database   //
	
	function add($data) {
		return $this->db->insert('jurnal',$data);
	}
	public function get_all_jurnal(){
		    return $this->db->query("select * FROM jurnal")->result_array();
		}
	public function get_all_prosiding(){
		    return $this->db->query("select * FROM prosiding")->result_array();
		}
	public function get_tahun(){
		    return $this->db->query("select distinct tahun FROM jurnal order by tahun asc")->result_array();
		}
	public function get_all_name(){
		    return $this->db->query("SELECT p.*, u.nama FROM jurnal as p inner join user AS u WHERE u.iduser=p.user_iduser")->result_array();
		}
	public function get_data_dosen(){
		    return $this->db->query("SELECT nama FROM user WHERE level=1 order by asc")->result_array();
		}
	public function get_data_nip(){
		  //  return $this->db->query("SELECT *FROM user WHERE anggota like '%$nip%' order by tahun desc")->result_array();
		}
	public function get_all_data_jurnal(){
		    return $this->db->query("SELECT p.judul, u.nama FROM jurnal as p inner join user AS u WHERE u.iduser=p.user_iduser")->result_array();									
		}
	public function get_all_data_prosiding(){
		    return $this->db->query("SELECT p.judul, u.nama FROM prosidingas as p inner join user AS u WHERE u.iduser=p.user_iduser")->result_array();
		}
		
	public function get_Jurnal_by_NIP($nip){
		    return $this->db->query("select * from jurnal where ketua like '%$nip%';")->result_array();
		}		
	public function get_Jurnal2_by_NIP($nip){
		    return $this->db->query("select * from jurnal where anggota like '%$nip%';")->result_array();
		}
	public function get_Prosiding_by_NIP($nip){
		    return $this->db->query("select * from prosiding where ketua like '%$nip%';")->result_array();
		}	
	public function get_Prosiding2_by_NIP($nip){
		    return $this->db->query("select * from prosiding where anggota like '%$nip%';")->result_array();
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
	
	//panggil jurnal semester ganjil
	public function get_Jurnal_by_NIP_semester1($nip){
		    return $this->db->query("select * from jurnal where ketua like '%$nip%' and semester='Ganjil';")->result_array();
		}	
	public function get_Jurnal2_by_NIP_semester1($nip){
		    return $this->db->query("select * from jurnal where anggota like '%$nip%' and semester='Ganjil';")->result_array();
		}	
	//panggil jurnal semester genap	
	public function get_Jurnal_by_NIP_semester2($nip){
		    return $this->db->query("select * from jurnal where ketua like '%$nip%' and semester='genap';")->result_array();
		}
	public function get_Jurnal2_by_NIP_semester2($nip){
		    return $this->db->query("select * from jurnal where anggota like '%$nip%' and semester='genap';")->result_array();
		}
		
	//panggil prosiding semester ganjil
	public function get_Prosiding_by_NIP_semester1($nip){
		    return $this->db->query("select * from prosiding where ketua like '%$nip%' and semester='ganjil';")->result_array();
		}	
	public function get_Prosiding2_by_NIP_semester1($nip){
		    return $this->db->query("select * from prosiding where anggota like '%$nip%' and semester='ganjil';")->result_array();
		}
	//panggil prosiding semester genap
	public function get_Prosiding_by_NIP_semester2($nip){
		    return $this->db->query("select * from prosiding where ketua like '%$nip%' and semester='genap';")->result_array();
		}
	public function get_Prosiding2_by_NIP_semester2($nip){
		    return $this->db->query("select * from prosiding where anggota like '%$nip%' and semester='genap';")->result_array();
		}
}

