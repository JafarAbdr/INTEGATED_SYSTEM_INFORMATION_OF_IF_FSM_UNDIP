<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_upload extends CI_Model {

	function get_nama($data){
		$this->db->insert('upload',$data);
	}
	
	function get_data(){
		$this->db->order_by("no", "desc");
		$this->db->where('jenis_file','jurnal');
		$query=$this->db->get('upload');
		return $query->result();
	}
	function get_data2(){
		$this->db->order_by("no", "desc");
		$this->db->where('jenis_file','prosiding');
		$query=$this->db->get('upload');
		return $query->result();
	}
	
	function get_data3(){
		$this->db->order_by("no", "desc");
		//$this->db->where('jenis_file','jurnal');
		$query=$this->db->get('upload'); 
			//return $query->result();
			return $this->db->query("SELECT * FROM upload WHERE ((jenis_file = 'jurnal') AND (upload_user <> 'Admin Jurusan'))")->result();
			//return $this->db->query("SELECT * FROM upload WHERE upload_user regexp '^[B-Z]'")->result_array();
		}
		
	function get_data4(){
		$this->db->order_by("no", "desc");
		//$this->db->where('jenis_file','prosiding');
		$query=$this->db->get('upload');
		    //return $query->result();
			return $this->db->query("SELECT * FROM upload WHERE ((jenis_file = 'prosiding') AND (upload_user <> 'Admin Jurusan'))")->result();
			//return $this->db->query("SELECT * FROM upload WHERE upload_user regexp '^[B-Z]'")->result_array();
		}
	
	/*
	function get_data3($nip){
		$this->db->order_by("no", "desc");
		$this->db->where('jenis_file','jurnal');
		$query=$this->db->get('upload');
		return $query->result();
		//return $this->db->query("SELECT *FROM upload WHERE(ketua like '%$nip%' OR anggota like '%$nip%')")->result_array();
	}
	
	function get_data4($nip){
		$this->db->order_by("no", "desc");
		$this->db->where('jenis_file','prosiding');
		$query=$this->db->get('upload');
		return $query->result();
		//return $this->db->query("SELECT *FROM upload WHERE(ketua like '%$nip%' OR anggota like '%$nip%')")->result_array();
	}
	*/
	
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