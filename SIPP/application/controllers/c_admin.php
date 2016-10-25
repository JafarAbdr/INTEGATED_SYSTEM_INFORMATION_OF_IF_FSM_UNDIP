<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class c_admin extends CI_Controller {
	function __construct() { 
		parent::__construct();
		$level =$this->session->userdata('level');
		if($level != 2){
			redirect('c_login/');
		}
		$this->load->model('m_penelitian');
		$this->load->model('m_pengabdian');
		$this->load->model('m_user');
		$this->load->model('m_auto');
		$this->load->model('m_upload');
		//$this->load->helper(array('url', 'form'));
	}
	
// fungsi index saat controller pertamakali dijalankan //
	function index() {
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "";
		$this->data['box_name'] = "Sistem Informasi Penelitian dan Pengabdian";
		$this->data['page'] = 'home';
		$this->load->view('level2/template_admin', $this->data);
	}
	
	function add_penelitian(){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "Daftar Baru";
	  $this->data['box_name'] = " Penelitian";
	  $this->data['page'] = 'level2/form_penelitian_2';
	  $this->load->view('level2/template_admin', $this->data);
	}
		
	function view_penelitian(){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "Penelitian";
	  $this->data['box_name'] = "Data Penelitian";
	  $this->data['page'] = 'level2/tabel_penelitian_2';
	  $this->data['query']= $this->m_penelitian->get_all();
	  $this->data['tahun']= $this->m_penelitian->get_tahun();
	  $this->load->view('level2/template_admin', $this->data);
	}
	
	function detail($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "";
	  $this->data['box_name'] = "Penelitian";
	  $this->data['data']= $this->m_penelitian->get_by_id($id);
	  $this->data['page'] = 'detail';  
	  $this->load->view('level2/template_admin', $this->data);
	}
	
	function update($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "";
	  $this->data['box_name'] = "Edit Penelitian";
	  $this->data['page'] = 'level2/edit_penelitian_2';
	  $this->data['data'] = $this->m_penelitian->get_by_id($id);
	  $this->load->view('level2/template_admin', $this->data);
	}
	
	function delete_penelitian($id){
	  $this->m_penelitian->delete($id);
	  redirect('c_admin/view_penelitian');
	}

//********************* PENGABDIAN **********************//	
	function add_pengabdian(){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "Daftar Baru";
	  $this->data['box_name'] = " Pengabdian";
	  $this->data['page'] = 'level2/form_pengabdian_2';
	  $this->load->view('level2/template_admin', $this->data);
	}
	
	function view_pengabdian(){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "Pengabdian";
	  $this->data['box_name'] = "Data Pengabdian";
	  $this->data['page'] = 'level2/tabel_pengabdian_2';
	  $this->data['query']= $this->m_pengabdian->get_all();
	  $this->data['tahun']= $this->m_pengabdian->get_tahun();
	  $this->load->view('level2/template_admin', $this->data);
	}
	
	function detail_pengabdian($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "";
	  $this->data['box_name'] = "Pengabdian";
	  $this->data['data']= $this->m_pengabdian->get_by_id($id);
	  $this->data['page'] = 'detail';  
	 $this->load->view('level2/template_admin', $this->data);
	}
	
	function update_pengabdian($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "";
	  $this->data['box_name'] = "Edit Pengabdian";
	  $this->data['page'] = 'level2/edit_pengabdian_2';
	  $this->data['data'] = $this->m_pengabdian->get_by_id($id);
	 $this->load->view('level2/template_admin', $this->data);
	}
	
	function delete_pengabdian($id){
	  $this->m_pengabdian->delete($id);
	  redirect('c_admin/view_pengabdian');
	}
//********************* END PENGABDIAN **********************//	

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
//********************* END UPLOAD **********************//	


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
//********************* END USER **********************//	

//********************* UBAH PASSWORD **********************//	
   function ubah_password(){
      
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "AKUN";
	  $this->data['box_name'] = "Ubah Password";
	  $this->data['page'] = 'level2/form_ubah_password';
	  $this->load->view('level2/template_admin', $this->data);
	}
//********************* END UBAH PASSWORD **********************//

	function add_data_penelitian()
	{ 
	  
	  $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
	  if($this->form_validation->run() == FALSE){
			$this->add_penelitian();
			
		}else{
		 $ketua=$this->input->post('ketua');
		 $id = $this->session->userdata('iduser');
		 $data=array(
		  'judul'=>$this->input->post('judul'),
		  'tahun'=>$this->input->post('tahun'),
		  'ketua'=>$ketua[0],
		  'anggota'=>implode("//",$this->input->post('anggota')),
		  'sumber_dana'=>$this->input->post('sumber'),
		  'jenis_dana'=>$this->input->post('jenis_dana'),
		  'alokasi_dana'=>$this->input->post('dana'),
		  'tempat'=>$this->input->post('tempat'),
		  'status'=>$this->input->post('status'),
		  'no_kontrak'=>$this->input->post('nomor'),
		  'tgl_kontrak'=>$this->input->post('tgl_k'),
		  'batas_kontrak'=>$this->input->post('bts_k'),
		  'nama_ttd'=>$this->input->post('nama_ttd'),
		  'user_iduser'=> $id	
		  );		  
		  $this->m_penelitian->add($data);
		  $this->session->set_flashdata('message','sukses');
		  $this->session->set_flashdata('alert','Data berhasil ditambah');
		  redirect('c_admin/view_penelitian');		 
		}
	}
	
	function add_data_pengabdian()
	{ 
	  
	  $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
	  if($this->form_validation->run() == FALSE){
			$this->add_pengabdian();
			
		}else{
		 $ketua=$this->input->post('ketua');
		 $id = $this->session->userdata('iduser');
		 $data=array(
		  'judul'=>$this->input->post('judul'),
		  'tahun'=>$this->input->post('tahun'),
		  'ketua'=>$ketua[0],
		  'anggota'=>implode("//",$this->input->post('anggota')),
		  'sumber_dana'=>$this->input->post('sumber'),
		  'jenis_dana'=>$this->input->post('jenis_dana'),
		  'alokasi_dana'=>$this->input->post('dana'),
		  'tempat'=>$this->input->post('tempat'),
		  'status'=>$this->input->post('status'),
		  'no_kontrak'=>$this->input->post('nomor'),
		  'tgl_kontrak'=>$this->input->post('tgl_k'),
		  'batas_kontrak'=>$this->input->post('bts_k'),
		  'nama_ttd'=>$this->input->post('nama_ttd'),
		  'user_iduser'=> $id	
		  );		  
		  $this->m_pengabdian->add($data);
		  $this->session->set_flashdata('message','sukses');
		  $this->session->set_flashdata('alert','Data berhasil ditambah');
		  redirect('c_admin/view_pengabdian');		 
		}
	}
	
	function edit_data($id){
		if ($id == NULL) {
			redirect('c_admin');
		}
        $ketua=$this->input->post('ketua');
        $data=array(
          'judul'=>$this->input->post('judul'),
		  'tahun'=>$this->input->post('tahun'),
		  'ketua'=>$ketua[0],
		  'anggota'=>implode("//",$this->input->post('anggota')),
		  'sumber_dana'=>$this->input->post('sumber'),
		  'jenis_dana'=>$this->input->post('jenis_dana'),
		  'alokasi_dana'=>$this->input->post('dana'),
		  'tempat'=>$this->input->post('tempat'),
		  'status'=>$this->input->post('status'),
		  'no_kontrak'=>$this->input->post('nomor'),
		  'tgl_kontrak'=>$this->input->post('tgl_k'),
		  'batas_kontrak'=>$this->input->post('bts_k'),
		  'nama_ttd'=>$this->input->post('nama_ttd')
        );
        $this->m_penelitian->update_form($data,$id);
		$this->session->set_flashdata('message','sukses');
   	    $this->session->set_flashdata('alert','Data berhasil diperbarui');
        redirect("c_admin/view_penelitian");
    }
	
	function edit_pengabdian($id){
		if ($id == NULL) {
			redirect('c_admin');
		}
        $ketua=$this->input->post('ketua');
        $data=array(
          'judul'=>$this->input->post('judul'),
		  'tahun'=>$this->input->post('tahun'),
		  'ketua'=>$ketua[0],
		  'anggota'=>implode("//",$this->input->post('anggota')),
		  'sumber_dana'=>$this->input->post('sumber'),
		  'jenis_dana'=>$this->input->post('jenis_dana'),
		  'alokasi_dana'=>$this->input->post('dana'),
		  'tempat'=>$this->input->post('tempat'),
		  'status'=>$this->input->post('status'),
		  'no_kontrak'=>$this->input->post('nomor'),
		  'tgl_kontrak'=>$this->input->post('tgl_k'),
		  'batas_kontrak'=>$this->input->post('bts_k'),
		  'nama_ttd'=>$this->input->post('nama_ttd')
        );
        $this->m_pengabdian->update_form($data,$id);
		$this->session->set_flashdata('message','sukses');
   	    $this->session->set_flashdata('alert','Data berhasil diperbarui');
        redirect("c_admin/view_pengabdian");
    }
	
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
	
	function update_password(){  
	  $id = $this->session->userdata('iduser');
	  if ($id == NULL) {
			redirect('c_admin');
	  }
	 
	 $user = $this->m_user->get_by_id($id);
	 
	if ($user['password']== MD5($this->input->post('ps_lama'))){
		$this->form_validation->set_rules('ps_baru','Password Baru', 'required|min_length[5]');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('message',1);
			$this->session->set_flashdata('alert','Password harus lebih dari 4 karakter');
			redirect('c_admin/ubah_password');
		}else{
			$data = array(
			'password'=>MD5($this->input->post('ps_baru'))
		);
		$this->m_user->update_user($data,$id);
		$this->session->set_flashdata('message','sukses');
		$this->session->set_flashdata('alert','Password berhasil diperbarui');
		redirect('c_admin/ubah_password');
		}
	}else{
	   $this->session->set_flashdata('message',1);
	   $this->session->set_flashdata('alert','Password Lama tidak sesuai');
	    redirect('c_admin/ubah_password');
	}  
	}
}