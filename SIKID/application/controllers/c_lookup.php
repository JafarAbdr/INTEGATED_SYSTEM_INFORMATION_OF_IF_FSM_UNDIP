<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class c_lookup extends CI_Controller {
		public function __construct() { 
			parent::__construct();
			$this->load->model('m_auto');
			
		}
		
	function lookup() { 
		  $keyword=$this->input->post('term'); 
		  $data['response']='false'; 
		  $query=$this->m_auto->find($keyword); 
		  if(! empty($query)) 
		   { 
			$data['response']='true'; 
			$data['message']= array(); 
			for($i=0;$i<count($query);$i++){
				$show[$i]="".$query[$i]->nama."--".$query[$i]->nip; 
				$data['message'][$i]=$show[$i];
			}
		   } 
		 echo json_encode($data);
		  }
}