<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class c_dosen extends CI_Controller {
	public function __construct() { 
		parent::__construct();
		$level =$this->session->userdata('level');
		if($level != 1){
			redirect('c_login/');
		}
		$this->load->model('m_penelitian');
		$this->load->model('m_pengabdian');
		$this->load->model('m_user');
		$this->load->model('m_auto');
		$this->load->model('m_upload');
	}
	
// fungsi index saat controller pertamakali dijalankan //
	function index() {
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "";
		$this->data['box_name'] = "Sistem Informasi Penelitian dan Pengabdian";
		$this->data['page'] = 'home';
		$this->load->view('template_dosen', $this->data);
	}
	
	function penelitian(){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "Daftar Baru";
	  $this->data['box_name'] = "Penelitian";
	  $this->data['page'] = 'form_penelitian';
	  $this->load->view('template_dosen', $this->data);
	}
	
	function view_penelitian(){
	  $id = $this->session->userdata('iduser');
	  $nip = $this->session->userdata('nip');
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "Penelitian";
	  $this->data['box_name'] = "Data Penelitian";
	  $this->data['page'] = 'tabel_penelitian';
	  //$this->data['query']= $this->m_penelitian->get_by_user($id);
	  $this->data['query']= $this->m_penelitian->get_all_data($nip);
	  $this->data['ketua']= $this->m_penelitian->get_data_ketua($nip);$this->data['anggota']= $this->m_penelitian->get_data_anggota($nip);
	  $this->load->view('template_dosen', $this->data);
	}
	
	function detail($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "";
	  $this->data['box_name'] = "Penelitian";
	  $this->data['data']= $this->m_penelitian->get_by_id($id);
	  $this->data['page'] = 'detail';  
	  $this->load->view('template_dosen', $this->data);
	}
	
	function update($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "";
	  $this->data['box_name'] = "Edit Penelitian";
	  $this->data['page'] = 'edit_penelitian';
	  $this->data['data'] = $this->m_penelitian->get_by_id($id);
	  $this->load->view('template_dosen', $this->data);
	}
	
	function delete($id){
	  $this->m_penelitian->delete($id);
	  redirect('c_dosen/view_penelitian');
	}
	
//********************* PENGABDIAN **********************//
	function pengabdian(){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "Daftar Baru";
	  $this->data['box_name'] = "Pengabdian";
	  $this->data['page'] = 'form_pengabdian';
	  $this->load->view('template_dosen', $this->data);
	}
	
	function view_pengabdian(){
	  $id = $this->session->userdata('iduser');
	  $nip = $this->session->userdata('nip');
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "Pengabdian";
	  $this->data['box_name'] = "Data Pengabdian";
	  $this->data['page'] = 'tabel_pengabdian';
	  $this->data['query']= $this->m_pengabdian->get_all_data($nip);
	  $this->data['ketua']= $this->m_pengabdian->get_data_ketua($nip);$this->data['anggota']= $this->m_pengabdian->get_data_anggota($nip);
	  //$this->data['query']= $this->m_pengabdian->get_by_user($id);
	  $this->load->view('template_dosen', $this->data);
	}
	
	function detail_pengabdian($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "";
	  $this->data['box_name'] = "Pengabdian";
	  $this->data['data']= $this->m_pengabdian->get_by_id($id);
	  $this->data['page'] = 'detail';  
	  $this->load->view('template_dosen', $this->data);
	}
	
	function update_pengabdian($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "";
	  $this->data['box_name'] = "Edit Pengabdian";
	  $this->data['page'] = 'edit_pengabdian';
	  $this->data['data'] = $this->m_pengabdian->get_by_id($id);
	  $this->load->view('template_dosen', $this->data);
	}
	
	function delete_pengabdian($id){
	  $this->m_pengabdian->delete($id);
	  redirect('c_dosen/view_pengabdian');
	}
//********************* END PENGABDIAN **********************//

//********************* UPLOAD **********************//	
	function form_upload(){
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "Upload";
		$this->data['box_name'] = "Upload File";
		$this->data['page'] = 'level2/form_upload';
		$this->load->view('template_dosen', $this->data);
	}
	
	function view_upload(){
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "Upload";
		$this->data['box_name'] = "Data Upload";
		$this->data['page'] = 'data_upload';
		$this->data['list']=$this->m_upload->get_data();
		$this->data['list2']=$this->m_upload->get_data2();
		$this->load->view('template_dosen', $this->data);
	}
//********************* END UPLOAD **********************//	
	
//********************* UBAH PASSWORD **********************//	
   function ubah_password(){
      
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "AKUN";
	  $this->data['box_name'] = "Ubah Password";
	  $this->data['page'] = 'form_ubah_password';
	 // $this->data['data'] = $this->m_pengabdian->get_by_id($id);
	  $this->load->view('template_dosen', $this->data);
	}
//********************* END UBAH PASSWORD **********************//	
	
	
	function add_data()
	{ 
	  
	  $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
	  $this->form_validation->set_rules('tahun', 'Tahun', 'required');
	  $this->form_validation->set_rules('ketua[]', 'Ketua', 'required');
	  $this->form_validation->set_rules('anggota[]', 'Anggota', 'required');
	  $this->form_validation->set_rules('sumber', 'Sumber Dana', 'trim|required');
	  $this->form_validation->set_rules('dana', 'Alokasi Dana', 'trim|required|integer');
	  $this->form_validation->set_rules('tempat', 'Tempat', 'trim|required');
	  if($this->form_validation->run() == FALSE){
	  
			$this->penelitian();
		
		 
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
		  redirect('c_dosen/view_penelitian');
		  
		 
		}
	}
	
	function add_pengabdian()
	{ 
	  $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
	  $this->form_validation->set_rules('tahun', 'Tahun', 'required');
	  $this->form_validation->set_rules('ketua[]', 'Ketua', 'required');
	  $this->form_validation->set_rules('anggota[]', 'Anggota', 'required');
	  $this->form_validation->set_rules('sumber', 'Sumber Dana', 'trim|required');
	  $this->form_validation->set_rules('dana', 'Alokasi Dana', 'trim|required|integer');
	  $this->form_validation->set_rules('tempat', 'Tempat', 'trim|required');
	  if($this->form_validation->run() == FALSE){
	  
			$this->pengabdian();
		
		 
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
		  redirect('c_dosen/view_pengabdian');
		  
		 
		}
	}
	
	function edit_data($id){
		if ($id == NULL) {
			redirect('c_dosen');
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
        redirect("c_dosen/view_penelitian");
    }
	
	function edit_pengabdian($id){
		if ($id == NULL) {
			redirect('c_dosen');
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
        redirect("c_dosen/view_pengabdian");
    }
	
	  
	function update_password(){  
	  $id = $this->session->userdata('iduser');
	  if ($id == NULL) {
			redirect('c_dosen');
	  }
	 
	 $user = $this->m_user->get_by_id($id);
	 
	  if ($user['password']==MD5($this->input->post('ps_lama'))){
		$this->form_validation->set_rules('ps_baru','Password Baru', 'required|min_length[5]');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('message',1);
			$this->session->set_flashdata('alert','Password harus lebih dari 4 karakter');
			redirect('c_dosen/ubah_password');
		}else{
			$data = array(
				'password'=>MD5($this->input->post('ps_baru'))
			);
			$this->m_user->update_user($data,$id);
			$this->session->set_flashdata('message','sukses');
			$this->session->set_flashdata('alert','Password berhasil diperbarui');
			redirect('c_dosen/ubah_password');
		}	
	  }else{
	    $this->session->set_flashdata('message',1);
		$this->session->set_flashdata('alert','Password Lama tidak sesuai');
	    redirect('c_dosen/ubah_password');
	  }
	  
	}
	  
	  
	
}