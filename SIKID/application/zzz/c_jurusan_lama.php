<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Jurusan extends CI_Controller {
	function __construct() { 
		parent::__construct();
		$level =$this->session->userdata('level');
		if($level != 3){
			redirect('c_login/');
		}
		$this->load->model('m_penelitian');
		$this->load->model('m_pengabdian');
		$this->load->model('m_user');
		$this->load->model('m_upload');
	}
	
	
	function index() {
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "";
		$this->data['box_name'] = "Sistem Informasi Jurnal dan Prosiding";
		$this->data['page'] = 'home';
		$this->load->view('level3/template_jurusan', $this->data);
	}
	
	
	//********************* DASHBOARD **********************//
	function dashboard() {
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "Dashboard";
		$this->data['box_name'] = "View Dashboard";
		$this->data['page'] = 'level3/dashboard';
		$this->load->view('level3/template_jurusan', $this->data);
	}
	//********************* END DASHBOARD **********************//
	
	//********************* PENELITIAN **********************//	
	function view_penelitian(){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "Jurnal";
	  $this->data['box_name'] = "Data Jurnal";
	  $this->data['page'] = 'level3/tabel_penelitian_3';
	  $this->data['query']= $this->m_penelitian->get_all();
	  $this->data['tahun']= $this->m_penelitian->get_tahun();
	  $this->load->view('level3/template_jurusan', $this->data);
	}
	
	function detail_penelitian($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "";
	  $this->data['box_name'] = "Jurnal";
	  $this->data['data']= $this->m_penelitian->get_by_id($id);
	  $this->data['page'] = 'detail';  
	  $this->load->view('level3/template_jurusan', $this->data);
	}
	//*********************END PENELITIAN **********************//	

	//********************* PENGABDIAN **********************//	
	function view_pengabdian(){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "Prosiding";
	  $this->data['box_name'] = "Data Prosiding";
	  $this->data['page'] = 'level3/tabel_pengabdian_3';
	  $this->data['query']= $this->m_pengabdian->get_all();
	  $this->data['tahun']= $this->m_pengabdian->get_tahun();
	 $this->load->view('level3/template_jurusan', $this->data);
	}
	
	function detail_pengabdian($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "";
	  $this->data['box_name'] = "Prosiding";
	  $this->data['data']= $this->m_pengabdian->get_by_id($id);
	  $this->data['page'] = 'detail';  
	 $this->load->view('level3/template_jurusan', $this->data);
	}
	
	//********************* END PENGABDIAN **********************//	
	
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
	//********************* END UPLOAD **********************//	
	
	//********************* UBAH PASSWORD **********************//	

	function ubah_password(){
      
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "AKUN";
	  $this->data['box_name'] = "Ubah Password";
	  $this->data['page'] = 'level3/form_ubah_password_3';
	 $this->load->view('level3/template_jurusan', $this->data);
	}
	//*********************END UBAH PASSWORD **********************//	

	
	
	
	
	
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
}