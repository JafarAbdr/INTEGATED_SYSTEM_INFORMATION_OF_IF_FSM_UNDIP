<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class C_login extends CI_Controller{
		public function __construct(){
			parent:: __construct();
			$this->load->model('m_login');
			$this->load->helper(array('url', 'form'));
			
		}
		
	function index() {
		$this->load->view('login');
	}
	
	public function masuk(){
		$akun = array(
				'nip' =>$this->input->post('username'),
				'password' =>MD5($this->input->post('password'))  
		); //data loginnya
		$this->m_login->getUser($akun);
		$level = $this->session->userdata('level');
		if($level == 1){
			redirect('c_dosen'); 
		}else if($level == 2){
			redirect('c_admin'); 
		}else if($level == 3){
			redirect('c_jurusan'); 
		}else{
		  redirect('c_login');
		}
	}
	
	public function keluar(){
			$this->session->sess_destroy();
			redirect('c_login/');
		}
	
	
	}
	?>