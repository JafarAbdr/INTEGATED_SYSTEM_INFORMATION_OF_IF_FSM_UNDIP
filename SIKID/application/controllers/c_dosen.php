<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class c_dosen extends CI_Controller {
	public function __construct() { 
		parent::__construct();
		$level =$this->session->userdata('level');
		if($level != 1){
			redirect('c_login/');
		}
		$this->load->model('m_jurnal');
		$this->load->model('m_prosiding');
		$this->load->model('m_user');
		$this->load->model('m_auto');
		$this->load->model('m_upload');
	}
	
// fungsi index saat controller pertamakali dijalankan //
	function index() {
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "";
		$this->data['box_name'] = "Karya Ilmiah Dosen";
		$this->data['page'] = 'home';
		//$this->data['page'] = 'form_jurnal';
		$this->load->view('template_dosen', $this->data);
	}

//********************* JURNAL **********************//	
	function jurnal(){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "Daftar Baru";
	  $this->data['box_name'] = "Jurnal";
	  $this->data['page'] = 'form_jurnal';
	  $this->load->view('template_dosen', $this->data);
	}
	
	function view_jurnal(){
	  $id = $this->session->userdata('iduser');
	  $nip = $this->session->userdata('nip');
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "Jurnal";
	  $this->data['box_name'] = "Data Jurnal";
	  $this->data['page'] = 'tabel_jurnal';
	  //$this->data['query']= $this->m_jurnal->get_by_user($id);
	  $this->data['query']= $this->m_jurnal->get_all_data($nip);
	  $this->data['ketua']= $this->m_jurnal->get_data_ketua($nip);$this->data['anggota']= $this->m_jurnal->get_data_anggota($nip);
	  $this->load->view('template_dosen', $this->data);
	}
	
	function detail($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "";
	  $this->data['box_name'] = "Jurnal";
	  $this->data['data']= $this->m_jurnal->get_by_id($id);
	  $this->data['page'] = 'detail_jurnal';  
	  $this->load->view('template_dosen', $this->data);
	}
	
	function update($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "";
	  $this->data['box_name'] = "Edit Jurnal";
	  $this->data['page'] = 'edit_jurnal';
	  $this->data['data'] = $this->m_jurnal->get_by_id($id);
	  $this->load->view('template_dosen', $this->data);
	}
	
	function delete($id){
	  $this->m_jurnal->delete($id);
	  redirect('c_dosen/view_jurnal');
	}
	
//********************* PROSIDING **********************//
	function prosiding(){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "Daftar Baru";
	  $this->data['box_name'] = "Prosiding";
	  $this->data['page'] = 'form_prosiding';
	  $this->load->view('template_dosen', $this->data);
	}
	
	function view_prosiding(){
	  $id = $this->session->userdata('iduser');
	  $nip = $this->session->userdata('nip');
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "Prosiding";
	  $this->data['box_name'] = "Data Prosiding";
	  $this->data['page'] = 'tabel_prosiding';
	  $this->data['query']= $this->m_prosiding->get_all_data($nip);
	  $this->data['ketua']= $this->m_prosiding->get_data_ketua($nip);$this->data['anggota']= $this->m_prosiding->get_data_anggota($nip);
	  //$this->data['query']= $this->m_prosiding->get_by_user($id);
	  $this->load->view('template_dosen', $this->data);
	}
	
	function detail_prosiding($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "";
	  $this->data['box_name'] = "Prosiding";
	  $this->data['data']= $this->m_prosiding->get_by_id($id);
	  $this->data['page'] = 'detail_prosiding';  
	  $this->load->view('template_dosen', $this->data);
	}
	
	function update_prosiding($id){
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "";
	  $this->data['box_name'] = "Edit Prosiding";
	  $this->data['page'] = 'edit_prosiding';
	  $this->data['data'] = $this->m_prosiding->get_by_id($id);
	  $this->load->view('template_dosen', $this->data);
	}
	
	function delete_prosiding($id){
	  $this->m_prosiding->delete($id);
	  redirect('c_dosen/view_prosiding');
	}


//********************* UPLOAD **********************//	
	function form_upload(){
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "Upload";
		$this->data['box_name'] = "Upload File";
		$this->data['page'] = 'level2/form_upload';
		$this->load->view('template_dosen', $this->data);
	}
	
	function view_upload(){
		$id = $this->session->userdata('iduser');
		$nip = $this->session->userdata('nip');
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "Upload";
		$this->data['box_name'] = "Data Upload";
		$this->data['page'] = 'data_upload';
		//$this->data['list']=$this->m_upload->get_data(); //buat semua
		//$this->data['list2']=$this->m_upload->get_data2(); //buat semua
		//$this->data['list']=$this->m_upload->get_data2();
		//$this->data['list2']=$this->m_upload->get_data2();
		$this->data['list']=$this->m_upload->get_data3();
		$this->data['list2']=$this->m_upload->get_data4();
		$this->load->view('template_dosen', $this->data);
	}

//********************* REPORT **************************//
	function ak_jurnal(){
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "Angka Kredit (AK)";
		$this->data['box_name'] = "AK Jurnal";
		$this->data['page'] = 'ak_jurnal';
		$this->data['query']=$this->m_user->get_dosen();
		//$this->load->model('m_ak','m_report');
		$this->load->view('template_dosen', $this->data);
	}
	
	function ak_prosiding(){
		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['page_name'] = "Angka Kredit (AK)";
		$this->data['box_name'] = "AK Prosiding";
		$this->data['page'] = 'ak_prosiding';
		$this->data['query']=$this->m_user->get_dosen();
		//$this->load->model('m_ak','m_report');
		$this->load->view('template_dosen', $this->data);
	}
	
//********************* UBAH PASSWORD **********************//	
   function ubah_password(){
      
	  $this->data['nama'] = $this->session->userdata('nama');
	  $this->data['page_name'] = "AKUN";
	  $this->data['box_name'] = "Ubah Password";
	  $this->data['page'] = 'form_ubah_password';
	 // $this->data['data'] = $this->m_prosiding->get_by_id($id);
	  $this->load->view('template_dosen', $this->data);
	}

	
//********************* KELOLA DATA **********************//		
	function add_data()
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
			$this->jurnal();
		
		}else{
		 $ketua=$this->input->post('ketua');
		 $id = $this->session->userdata('iduser');
		 $data=array(
		  'judul'=>$this->input->post('judul'),
		  'tahun'=>$this->input->post('tahun'),
		  'nama_jurnal'=>$this->input->post('nama_jurnal'),
		  'nomor_volume'=>$this->input->post('nomor_volume'),
		  'issn'=>$this->input->post('issn'),
		  'edisi'=>$this->input->post('edisi'),
		  'penerbit'=>$this->input->post('penerbit'),
		  'halaman'=>$this->input->post('halaman'),
		  'ketua'=>$ketua[0],
		  'anggota'=>implode("//",$this->input->post('anggota')),
		  'semester'=>$this->input->post('semester'),
		  'kategori'=>$this->input->post('kategori'),
		  'user_iduser'=> $id	
		  );
		  
		  $this->m_jurnal->add($data);
		  $this->session->set_flashdata('message','sukses');
		  $this->session->set_flashdata('alert','Data berhasil ditambah');
		  redirect('c_dosen/view_jurnal');

		}
	}
	
	function add_prosiding()
	{ 
	  $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
	  //$this->form_validation->set_rules('nama_makalah', 'Nama Makalah', 'trim|required');
	  //$this->form_validation->set_rules('isbn', 'ISBN', 'trim|required');
	  //$this->form_validation->set_rules('sertifikat', 'Sertifikat', 'trim|required');
	  //$this->form_validation->set_rules('halaman', 'Halaman', 'trim|required');
	  //$this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required');
	  //$this->form_validation->set_rules('url', 'URL', 'trim|required');
	  $this->form_validation->set_rules('semester', 'Semester', 'trim|required');
	  $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
	  //$this->form_validation->set_rules('ketua[]', 'Ketua', 'trim|required');
	  //$this->form_validation->set_rules('anggota[]', 'Anggota', 'trim|required');
	  
	  if($this->form_validation->run() == FALSE){
	  		$this->prosiding();
		
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
		  'anggota'=>implode("//",$this->input->post('anggota')),
		  'semester'=>$this->input->post('semester'),
		  'kategori'=>$this->input->post('kategori'),
		  'user_iduser'=> $id	
		  );
		  
		  $this->m_prosiding->add($data);
		  $this->session->set_flashdata('message','sukses');
		  $this->session->set_flashdata('alert','Data berhasil ditambah');
		  redirect('c_dosen/view_prosiding');
		  
		}
	}
	
	function edit_data($id){
		if ($id == NULL) {
			redirect('c_dosen');
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
		  'anggota'=>implode("//",$this->input->post('anggota')),
		  'semester'=>$this->input->post('semester'),
		  'kategori'=>$this->input->post('kategori'),
		  
		  
        );
		
        $this->m_jurnal->update_form($data,$id);
		$this->session->set_flashdata('message','sukses');
   	    $this->session->set_flashdata('alert','Data berhasil diperbarui');
        redirect("c_dosen/view_jurnal");
    }
	
	function edit_prosiding($id){
		if ($id == NULL) {
			redirect('c_dosen');
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
		  'anggota'=>implode("//",$this->input->post('anggota')),
		  'semester'=>$this->input->post('semester'),
		  'kategori'=>$this->input->post('kategori'),
		  
        );
		
        $this->m_prosiding->update_form($data,$id);
		$this->session->set_flashdata('message','sukses');
   	    $this->session->set_flashdata('alert','Data berhasil diperbarui');
        redirect("c_dosen/view_prosiding");
    }
	
	  
	function update_password(){  
		$id = $this->session->userdata('iduser');
		if ($id == NULL) {
			redirect('c_dosen');
		}
	 
		$user = $this->m_user->get_by_id($id);
	  
		if ($user['password']==MD5($this->input->post('ps_lama'))){
			$this->form_validation->set_rules('ps_baru','Password Baru', 'required|min_length[5]');
			//$this->form_validation->set_rules('kp_baru','Konfirmasi Password', 'required|min_length[5]|matches[ps_baru]');
			
			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('message',1);
				$this->session->set_flashdata('alert','Password harus lebih dari 4 karakter');
				//$this->session->set_flashdata('alert','Konfirmasi Password salah');
				redirect('c_dosen/ubah_password');
			}
			else if ($this->input->post('kp_baru') != $this->input->post('ps_baru')){
				$this->session->set_flashdata('message',2);
				$this->session->set_flashdata('alert','Konfirmasi Password salah');
				//return 0;
				redirect('c_dosen/ubah_password');
				//$this->load->view('form_ubah_password');
			}
			else{
				$data = array('password'=>MD5($this->input->post('ps_baru')));
				$this->m_user->update_user($data,$id);
				$this->session->set_flashdata('message','sukses');
				$this->session->set_flashdata('alert','Password berhasil diperbarui');
				redirect('c_dosen/ubah_password');
			}	
		}
		else{
			$this->session->set_flashdata('message',1);
			$this->session->set_flashdata('alert','Password Lama tidak sesuai');
			redirect('c_dosen/ubah_password');
		}
	}
}