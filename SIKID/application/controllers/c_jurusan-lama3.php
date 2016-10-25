<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Jurusan extends CI_Controller {
	function __construct() { 
		parent::__construct();
		$level =$this->session->userdata('level');
		if($level != 3){
			redirect('c_login/');
		}
		$this->load->model('m_jurnal');
		$this->load->model('m_prosiding');
		$this->load->model('m_user');
		$this->load->model('m_upload');
		$this->load->model('m_report');
		$this->load->model('m_ak');
	}
	
	
	function index() {
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "";
		$this->data['box_name'] = "Sistem Informasi Karya Ilmiah Dosen";
		$this->data['page'] = 'home';
		$this->load->view('level3/template_jurusan', $this->data);
	}
	
	
	//********************* DASHBOARD **********************//
	function dashboard_jurnal() {
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "Dashboard Jurnal";
		$this->data['box_name'] = "View Dashboard Jurnal";
		$this->data['page'] = 'level3/dashboard_jurnal';
		$this->load->view('level3/template_jurusan', $this->data);
	}

	function dashboard_prosiding() {
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "Dashboard Prosiding";
		$this->data['box_name'] = "View Dashboard Prosiding";
		$this->data['page'] = 'level3/dashboard_prosiding';
		$this->load->view('level3/template_jurusan', $this->data);
	}

	function dashboard_ilmiah() {
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "Dashboard Ilmiah";
		$this->data['box_name'] = "View Dashboard Karya Ilmiah";
		$this->data['page'] = 'level3/dashboard_ilmiah';
		$this->load->view('level3/template_jurusan', $this->data);
	}

	
	//********************* JURNAL **********************//	
	function view_jurnal(){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "Jurnal";
	  $this->data['box_name'] = "Data Jurnal";
	  $this->data['page'] = 'level3/tabel_jurnal_3';
	  $this->data['query']= $this->m_jurnal->get_all();
	  $this->data['tahun']= $this->m_jurnal->get_tahun();
	  $this->load->view('level3/template_jurusan', $this->data);
	}
	
	function detail_jurnal($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "";
	  $this->data['box_name'] = "Jurnal";
	  $this->data['data']= $this->m_jurnal->get_by_id($id);
	  $this->data['page'] = 'detail_jurnal';  
	  $this->load->view('level3/template_jurusan', $this->data);
	}
		

	//********************* PROSIDING **********************//	
	function view_prosiding(){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "Prosiding";
	  $this->data['box_name'] = "Data Prosiding";
	  $this->data['page'] = 'level3/tabel_prosiding_3';
	  $this->data['query']= $this->m_prosiding->get_all();
	  $this->data['tahun']= $this->m_prosiding->get_tahun();
	 $this->load->view('level3/template_jurusan', $this->data);
	}
	
	function detail_prosiding($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "";
	  $this->data['box_name'] = "Prosiding";
	  $this->data['data']= $this->m_prosiding->get_by_id($id);
	  $this->data['page'] = 'detail_prosiding';  
	 $this->load->view('level3/template_jurusan', $this->data);
	}
		
	
	//********************* UPLOAD **********************//	
	function view_upload(){
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "Upload";
		$this->data['box_name'] = "Data Upload";
		$this->data['page'] = 'data_upload';
		$this->data['list']=$this->m_upload->get_data();
		$this->data['list2']=$this->m_upload->get_data2();
		$this->load->view('level3/template_jurusan', $this->data);
	}
	
	
	
	//********************* REPORT **************************//
	function sk_dekan(){
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "Report";
		$this->data['box_name'] = "SK Dekan";
		$this->data['page'] = 'level3/data_report';
		$this->data['query']=$this->m_user->get_dosen();
		$this->load->view('level3/template_jurusan', $this->data);
	}
	
	function ak_jurnal(){
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "Report";
		$this->data['box_name'] = "AK Jurnal";
		$this->data['page'] = 'level3/ak_jurnal';
		$this->data['query']=$this->m_user->get_dosen();
		$this->load->view('level3/template_jurusan', $this->data);
	}
	
	function ak_prosiding(){
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "Report";
		$this->data['box_name'] = "AK Prosiding";
		$this->data['page'] = 'level3/ak_prosiding';
		$this->data['query']=$this->m_user->get_dosen();
		$this->load->view('level3/template_jurusan', $this->data);
	}
	
	//********************* UBAH PASSWORD **********************//	

	function ubah_password(){
      
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "AKUN";
	  $this->data['box_name'] = "Ubah Password";
	  $this->data['page'] = 'level3/form_ubah_password_3';
	 $this->load->view('level3/template_jurusan', $this->data);
	}
	
	
	function update_password(){  
	  $id = $this->session->userdata('iduser');
	  if ($id == NULL) {
			redirect('c_jurusan');
	  }
	 
	 $user = $this->m_user->get_by_id($id);
	 
	  if ($user['password']==MD5($this->input->post('ps_lama'))){
	    $this->form_validation->set_rules('ps_baru','Password Baru', 'required|min_length[5]');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('message',1);
			$this->session->set_flashdata('alert','Password harus lebih dari 4 karakter');
			redirect('c_jurusan/ubah_password');
		}else{
			$data = array(
				'password'=>MD5($this->input->post('ps_baru'))
				);
			$this->m_user->update_user($data,$id);
			$this->session->set_flashdata('message','sukses');
			$this->session->set_flashdata('alert','Password berhasil diperbarui');
			redirect('c_jurusan/ubah_password');
		}	
	  }else{
	   $this->session->set_flashdata('message',1);
	   $this->session->set_flashdata('alert','Password Lama tidak sesuai');
	    redirect('c_jurusan/ubah_password');
	  }
	  
	}
	
	
	//********************* UBAH BOBOT AK **********************//	
	
	function ubah_ak_jurnal(){
      
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "BOBOT AK JURNAL";
	  $this->data['box_name'] = "Ubah Bobot AK Jurnal";
	  $this->data['query']= $this->m_ak->get_ak_jurnal();
	  $this->data['page'] = 'level3/form_ubah_ak';
	 $this->load->view('level3/template_jurusan', $this->data);
	}
	
	
	function update_ak_jurnal(){  
	  $id = $this->session->userdata('iduser');
	  if ($id == NULL) {
			redirect('c_jurusan');
	  }
	 
			$data = array(
				'internasional'=>$this->input->post('internasional'),
				'nasional_terakreditasi'=>$this->input->post('nasional_terakreditasi'),
				'nasional_tidak_terakreditasi'=>$this->input->post('nasional_tidak_terakreditasi')
				);
				$this->m_ak->reset_ak($data);
				
			//$this->m_user->update_user($data,$id);
			$this->session->set_flashdata('message','sukses');
			$this->session->set_flashdata('alert','Bobot Berhasil Diperbarui');
			redirect('c_jurusan/ubah_ak_jurnal');
	}
	 
	
	function ubah_ak_prosiding(){
      
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "BOBOT AK PROSIDING";
	  $this->data['box_name'] = "Ubah Bobot AK Prosiding";
	  $this->data['query']= $this->m_ak->get_ak_prosiding();
	  $this->data['page'] = 'level3/form_ubah_ak_prosiding';
	 $this->load->view('level3/template_jurusan', $this->data);
	}
	
	
	function update_ak_prosiding(){  
	  $id = $this->session->userdata('iduser');
	  if ($id == NULL) {
			redirect('c_jurusan');
	  }
	 
			$data = array(
				'internasional'=>$this->input->post('internasional'),
				'nasional'=>$this->input->post('nasional')
				);
				$this->m_ak->reset_ak_prosiding($data);
				
			//$this->m_user->update_user($data,$id);
			$this->session->set_flashdata('message','sukses');
			$this->session->set_flashdata('alert','Bobot Berhasil Diperbarui');
			redirect('c_jurusan/ubah_ak_prosiding');
	}
	
}
