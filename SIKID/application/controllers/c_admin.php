<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class c_admin extends CI_Controller {
	function __construct() { 
		parent::__construct();
		$level =$this->session->userdata('level');
		if($level != 2){
			redirect('c_login/');
		}
		$this->load->model('m_jurnal');
		$this->load->model('m_prosiding');
		$this->load->model('m_user');
		$this->load->model('m_auto');
		$this->load->model('m_upload');
		//$this->load->helper(array('url', 'form'));
	}
	
// fungsi index saat controller pertamakali dijalankan //
	function index() {
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "";
		$this->data['box_name'] = "Karya Ilmiah Dosen";
		$this->data['page'] = 'home';
		//$this->data['page'] = 'level2/form_jurnal_2';
		$this->load->view('level2/template_admin', $this->data);
	}
	
//********************* JURNAL **********************//	
	function add_jurnal(){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "Daftar Baru";
	  $this->data['box_name'] = "Jurnal";
	  $this->data['page'] = 'level2/form_jurnal_2';
	  $this->load->view('level2/template_admin', $this->data);
	}
		
	function view_jurnal(){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "Jurnal";
	  $this->data['box_name'] = "Data Jurnal";
	  $this->data['page'] = 'level2/tabel_jurnal_2';
	  $this->data['query']= $this->m_jurnal->get_all();
	  $this->data['tahun']= $this->m_jurnal->get_tahun();
	  $this->load->view('level2/template_admin', $this->data);
	}
	
	function detail($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "";
	  $this->data['box_name'] = "Jurnal";
	  $this->data['data']= $this->m_jurnal->get_by_id($id);
	  $this->data['page'] = 'detail_jurnal';  
	  $this->load->view('level2/template_admin', $this->data);
	}
	
	function update($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "";
	  $this->data['box_name'] = "Edit Jurnal";
	  $this->data['page'] = 'level2/edit_jurnal_2';
	  $this->data['data'] = $this->m_jurnal->get_by_id($id);
	  $this->load->view('level2/template_admin', $this->data);
	}
	
	function delete_jurnal($id){
	  $this->m_jurnal->delete($id);
	  redirect('c_admin/view_jurnal');
	}

//********************* PROSIDING **********************//	
	function add_prosiding(){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "Daftar Baru";
	  $this->data['box_name'] = " Prosiding";
	  $this->data['page'] = 'level2/form_prosiding_2';
	  $this->load->view('level2/template_admin', $this->data);
	}
	
	function view_prosiding(){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "Prosiding";
	  $this->data['box_name'] = "Data Prosiding";
	  $this->data['page'] = 'level2/tabel_prosiding_2';
	  $this->data['query']= $this->m_prosiding->get_all();
	  $this->data['tahun']= $this->m_prosiding->get_tahun();
	  $this->load->view('level2/template_admin', $this->data);
	}
	
	function detail_prosiding($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "";
	  $this->data['box_name'] = "Prosiding";
	  $this->data['data']= $this->m_prosiding->get_by_id($id);
	  $this->data['page'] = 'detail_prosiding';  
	 $this->load->view('level2/template_admin', $this->data);
	}
	
	function update_prosiding($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "";
	  $this->data['box_name'] = "Edit Prosiding";
	  $this->data['page'] = 'level2/edit_prosiding_2';
	  $this->data['data'] = $this->m_prosiding->get_by_id($id);
	 $this->load->view('level2/template_admin', $this->data);
	}
	
	function delete_prosiding($id){
	  $this->m_prosiding->delete($id);
	  redirect('c_admin/view_prosiding');
	}	


//********************* UPLOAD **********************//	
	function form_upload(){
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "Upload";
		$this->data['box_name'] = "Upload File";
		$this->data['page'] = 'level2/form_upload';
		$this->load->view('level2/template_admin', $this->data);
	}
	
	function view_upload(){
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "Upload";
		$this->data['box_name'] = "Data Upload";
		$this->data['page'] = 'level2/data_upload';
		$this->data['list']=$this->m_upload->get_data();
		$this->data['list2']=$this->m_upload->get_data2();
		$this->load->view('level2/template_admin', $this->data);
	}


//********************* USER **********************//	
	function user(){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "User";
	  $this->data['box_name'] = "Tambah User";
	  $this->data['page'] = 'level2/form_user';
	  $this->load->view('level2/template_admin', $this->data);	  
	}
	
	function view_user(){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "User";
	  $this->data['box_name'] = "Data User";
	  $this->data['page'] = 'level2/tabel_user';
	  $this->data['query']= $this->m_user->get_all();
	  $this->load->view('level2/template_admin', $this->data);
	}
	
	function update_user($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "User";
	  $this->data['box_name'] = "Edit User";
	  $this->data['page'] = 'level2/edit_user';
	  $this->data['data']= $this->m_user->get_by_id($id);
	  $this->load->view('level2/template_admin', $this->data);
	}
	
	function delete_user(){
	  $id=$this->uri->segment(3);
	  $this->m_user->delete($id);
	  redirect('c_admin/view_user');
	}
	
	function reset_password($id){
	 $this->m_user->reset_password($id);
	 $this->session->set_flashdata('message','sukses');
	 $this->session->set_flashdata('alert','Password berhasil direset');
	 redirect('c_admin/view_user');  
	}

//********************* UBAH PASSWORD **********************//	
   function ubah_password(){
      
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "AKUN";
	  $this->data['box_name'] = "Ubah Password";
	  $this->data['page'] = 'level2/form_ubah_password';
	  $this->load->view('level2/template_admin', $this->data);
	}

//********************* KELOLA DATA **********************//
	function add_data_jurnal()
	{ 
	  
	  $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
	  //$this->form_validation->set_rules('nama_jurnal', 'Nama Jurnal', 'trim|required');
	  //$this->form_validation->set_rules('nomor_volume', 'Nomor/ Volume', 'trim|required');
	  //$this->form_validation->set_rules('issn', 'ISSN', 'trim|required');
	  //$this->form_validation->set_rules('edisi', 'Edisi', 'trim|required');
	  //$this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required');
	  //$this->form_validation->set_rules('halaman', 'Halaman', 'trim|required');
	  $this->form_validation->set_rules('semester', 'Semester', 'trim|required');
	  $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
	  
	  if($this->form_validation->run() == FALSE){
			$this->add_jurnal();
			
		}else{
		 $ketua=$this->input->post('ketua');
		 $id = $this->session->userdata('iduser');
		 $data=array(
		  'judul'=>$this->input->post('judul'),
		  'nama_jurnal'=>$this->input->post('nama_jurnal'),
		  'nomor_volume'=>$this->input->post('nomor_volume'),
		  'issn'=>$this->input->post('issn'),
		  'edisi'=>$this->input->post('edisi'),
		  'penerbit'=>$this->input->post('penerbit'),
		  'halaman'=>$this->input->post('halaman'),
		  'tahun'=>$this->input->post('tahun'),
		  'ketua'=>$ketua[0],
		  'anggota'=>implode("//",$this->input->post('anggota')), //tambah anggota
		  'semester'=>$this->input->post('semester'),
		  'kategori'=>$this->input->post('kategori'),
		  'user_iduser'=> $id	
		  );		  
		  $this->m_jurnal->add($data);
		  $this->session->set_flashdata('message','sukses');
		  $this->session->set_flashdata('alert','Data berhasil ditambah');
		  redirect('c_admin/view_jurnal');		 
		}
	}
	
	function add_data_prosiding()
	{ 
	  
	  $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
	  //$this->form_validation->set_rules('nama_makalah', 'Nama Makalah', 'trim|required');
	  //$this->form_validation->set_rules('issn', 'ISBN', 'trim|required');
	  //$this->form_validation->set_rules('sertifikat', 'Sertifikat', 'trim|required');
	  //$this->form_validation->set_rules('halaman', 'Halaman', 'trim|required');
	  //$this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required');
	  //$this->form_validation->set_rules('url', 'URL', 'trim|required');
	  $this->form_validation->set_rules('semester', 'Semester', 'trim|required');
	  $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
	  //$this->form_validation->set_rules('ketua[]', 'Ketua', 'trim|required');
	  //$this->form_validation->set_rules('anggota[]', 'Anggota', 'trim|required');
	  
	  if($this->form_validation->run() == FALSE){
			$this->add_prosiding();
			
		}else{
		 $ketua=$this->input->post('ketua');
		 $id = $this->session->userdata('iduser');
		 $data=array(
		  'judul'=>$this->input->post('judul'),
		  'nama_makalah'=>$this->input->post('nama_makalah'),
		  'isbn'=>$this->input->post('isbn'),
		  'sertifikat'=>$this->input->post('sertifikat'),
		  'halaman'=>$this->input->post('halaman'),
		  'penerbit'=>$this->input->post('penerbit'),
		  'url'=>$this->input->post('url'),
		  'tahun'=>$this->input->post('tahun'),
		  'ketua'=>$ketua[0],
		  'anggota'=>implode("//",$this->input->post('anggota')), //tambah anggota
		  'semester'=>$this->input->post('semester'),
		  'kategori'=>$this->input->post('kategori'),
		  'user_iduser'=> $id	
		  );		  
		  $this->m_prosiding->add($data);
		  $this->session->set_flashdata('message','sukses');
		  $this->session->set_flashdata('alert','Data berhasil ditambah');
		  redirect('c_admin/view_prosiding');		 
		}
	}
	
	function edit_data($id){
		if ($id == NULL) {
			redirect('c_admin');
		}
        $ketua=$this->input->post('ketua');
        $data=array(
          'judul'=>$this->input->post('judul'),
          'nama_jurnal'=>$this->input->post('nama_jurnal'),
		  'nomor_volume'=>$this->input->post('nomor_volume'),
		  'issn'=>$this->input->post('issn'),
		  'edisi'=>$this->input->post('edisi'),
		  'penerbit'=>$this->input->post('penerbit'),
		  'halaman'=>$this->input->post('halaman'),
		  'tahun'=>$this->input->post('tahun'),
		  'ketua'=>$ketua[0],
		  'anggota'=>implode("//",$this->input->post('anggota')), //tambah anggota
		  'semester'=>$this->input->post('semester'),
		  'kategori'=>$this->input->post('kategori'),
		  
        );
        $this->m_jurnal->update_form($data,$id);
		$this->session->set_flashdata('message','sukses');
   	    $this->session->set_flashdata('alert','Data berhasil diperbarui');
        redirect("c_admin/view_jurnal");
    }
	
	function edit_prosiding($id){
		if ($id == NULL) {
			redirect('c_admin');
		}
        $ketua=$this->input->post('ketua');
        $data=array(
          'judul'=>$this->input->post('judul'),
          'nama_makalah'=>$this->input->post('nama_makalah'),
		  'isbn'=>$this->input->post('isbn'),
		  'sertifikat'=>$this->input->post('sertifikat'),
		  'halaman'=>$this->input->post('halaman'),
		  'penerbit'=>$this->input->post('penerbit'),
		  'url'=>$this->input->post('url'),
		  'tahun'=>$this->input->post('tahun'),
		  'ketua'=>$ketua[0],
		  'anggota'=>implode("//",$this->input->post('anggota')), //tambah anggota
		  'semester'=>$this->input->post('semester'),
		  'kategori'=>$this->input->post('kategori'),
		  
        );
        $this->m_prosiding->update_form($data,$id);
		$this->session->set_flashdata('message','sukses');
   	    $this->session->set_flashdata('alert','Data berhasil diperbarui');
        redirect("c_admin/view_prosiding");
    }
	
//********************* KELOLA USER **********************//	
	function add_user(){
	  $data=array(
	   'password'=>MD5(12345678),
	   'level'=>$this->input->post('level'),
	   'nama'=>$this->input->post('nama'),
	   'nip'=>$this->input->post('nip'),
	  );
	  $this->m_user->add($data);
	  $this->session->set_flashdata('message','sukses');
	  $this->session->set_flashdata('alert','Data berhasil ditambah');
	  redirect('c_admin/view_user');
	}
	
	function edit_user($id){  
	  if ($id == NULL) {
			redirect('c_admin');
	  }  
	  $data=array(
	   'level'=>$this->input->post('level'),
	   'nama'=>$this->input->post('nama'),
	   'nip'=>$this->input->post('nip'),
	  );
	  $this->m_user->update_user($data,$id);
	  $this->session->set_flashdata('message','sukses');
	  $this->session->set_flashdata('alert','Data berhasil diperbarui');

	  redirect('c_admin/view_user');
	}
	
//********************* KELOLA PASSWORD **********************//
	function update_password(){  
		$id = $this->session->userdata('iduser');
		if ($id == NULL) {
			redirect('c_admin');
		}
	 
		$user = $this->m_user->get_by_id($id);
	  
		if ($user['password']==MD5($this->input->post('ps_lama'))){
			$this->form_validation->set_rules('ps_baru','Password Baru', 'required|min_length[5]');
			//$this->form_validation->set_rules('kp_baru','Konfirmasi Password', 'required|min_length[5]|matches[ps_baru]');
			
			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('message',1);
				$this->session->set_flashdata('alert','Password harus lebih dari 4 karakter');
				//$this->session->set_flashdata('alert','Konfirmasi Password salah');
				redirect('c_admin/ubah_password');
			}
			else if ($this->input->post('kp_baru') != $this->input->post('ps_baru')){
				$this->session->set_flashdata('message',2);
				$this->session->set_flashdata('alert','Konfirmasi Password salah');
				//return 0;
				redirect('c_admin/ubah_password');
				//$this->load->view('form_ubah_password');
			}
			else{
				$data = array('password'=>MD5($this->input->post('ps_baru')));
				$this->m_user->update_user($data,$id);
				$this->session->set_flashdata('message','sukses');
				$this->session->set_flashdata('alert','Password berhasil diperbarui');
				redirect('c_admin/ubah_password');
			}	
		}
		else{
			$this->session->set_flashdata('message',1);
			$this->session->set_flashdata('alert','Password Lama tidak sesuai');
			redirect('c_admin/ubah_password');
		}
	}
}