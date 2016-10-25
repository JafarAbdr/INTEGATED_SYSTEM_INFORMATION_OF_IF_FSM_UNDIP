<?php 
  class M_Auto extends CI_Model{ 
 
   function __construct(){ 
   parent::__construct(); 
   }
   
   function find($keyword){
    $this->db->like('nip', $keyword,'after');
    $this->db->or_like('nama', $keyword,'after');
	$query=$this->db->get('user');
	return $query->result();
   }
  }  
