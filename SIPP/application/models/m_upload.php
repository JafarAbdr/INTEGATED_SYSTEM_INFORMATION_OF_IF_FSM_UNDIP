<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_upload extends CI_Model {

	function get_nama($data){
		
		$this->db->insert('upload',$data);
	}
	
	function get_data(){
		$this->db->order_by("no", "desc");
		$this->db->where('jenis_file','proposal');
		$query=$this->db->get('upload');
		return $query->result();
	}
	function get_data2(){
		$this->db->order_by("no", "desc");
		$this->db->where('jenis_file','laporan');
		$query=$this->db->get('upload');
		return $query->result();
	}
	
	function get_namas($no){
		$this->db->select('nama');
		$this->db->where('no',$no);
		$query=$this->db->get("upload");
		return $query->result();
	}
	
	function delete($no){
		$this->db->where('no',$no);
		$hapus=$this->db->delete('upload');
		return $hapus;
	
	}

}