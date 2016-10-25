<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Con_ruang extends CI_Controller {
	 
		 function __construct() {
			parent::__construct();
			$u1 = $this->session->userdata('username');
			$u2 = $this->session->userdata('id_user');
			$u3 = $this->session->userdata('level');
			$this->u3a = $this->session->userdata('level');
			if(ISSET($u1) && ISSET($u2) && ISSET($u3) && ($u1 != "") && ($u2 != "") && ($u3 != "")){
				$this->load->model('mod_ruang');
				$this->load->helper(array('url','form'));
			}else{
				redirect('home/login');
			}
		 }
	 
		 function view_ruang() {
			  $this->tambah_data();
		 }
		
		function tambah_data() {
			if((($this->u3a == 1)||($this->u3a == 2))){
				$sdata['hasil'] = $this->mod_ruang->getall();
				$sdata['msg'] = $this->session->flashdata('message');
				$data['main_content'] = $this->load->view('ruang/tambah_ruang',$sdata,TRUE);
				$data['sub'] = 8;
				$this->load->view('template/template',$data);
					
			}else {
				redirect('home/');
			}
		 }
		 function save_tambahdata(){
				$nama_ruang = $this->input->post('nama_ruang');
				$kapasitas_kuliah  = $this->input->post('kapasitas_kuliah');
				$kapasitas_ujian  = $this->input->post('kapasitas_ujian');
				$data = array (
					'nama_ruang' => $nama_ruang,
					'kapasitas_kuliah'  => $kapasitas_kuliah,
					'kapasitas_ujian'  => $kapasitas_ujian
				);  
				$this->mod_ruang->tambah_data($data);
				$this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Diinputkan</div>");
				redirect('ruang');
		}
			
		function update_data($id_ruang) {
			if(($this->u3a == 1)||($this->u3a == 2)){
			  $sdata['hasil'] = $this->mod_ruang->getByid_ruang($id_ruang);
			  
			  $data['main_content'] = $this->load->view('ruang/update_ruang',$sdata,TRUE);
			  $data['sub'] = 8;
			  $this->load->view('template/template',$data);
			}else{
				redirect('home/');
			}
			
		 }
		function save_update_data($id_ruang){
			
				$nama_ruang = $this->input->post('nama_ruang');
				$kapasitas_kuliah  = $this->input->post('kapasitas_kuliah');
				$kapasitas_ujian  = $this->input->post('kapasitas_ujian');
				
				$data = array (
					'nama_ruang' => $nama_ruang,
					'kapasitas_kuliah'  => $kapasitas_kuliah,
					'kapasitas_ujian'  => $kapasitas_ujian
				);
				//print_r($data);
				$this->mod_ruang->update($id_ruang, $data);
				$this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Diupdate</div>");
				redirect('ruang');
			
		}
		function delete_data($id_ruang) {
			if(($this->u3a == 1)||($this->u3a == 2)){
			  $this->mod_ruang->delete_data($id_ruang);
			  $this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Dihapus</div>");
			  redirect('ruang');
			}else{
				redirect('home/');
			}
		}
		
		function validasi_ruang()
		{
			$this->load->library('form_validation');
			
			// field name, error message, validation rules
			$this->form_validation->set_rules('nama_ruang', 'nama ruang', 'trim|required');
			$this->form_validation->set_rules('kapasitas_kuliah', 'Kapasitas Kuliah', 'trim|required');
			$this->form_validation->set_rules('kapasitas_Ujian', 'Kapasitas Ujian', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert"></a><strong>', '</strong></div>');
			
			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('tambah_ruang');
			}
			
			else
			{				
					$this->mod_ruang->tambah();
					redirect('ruang');
			}
		}
		
		function upload()
		{
			$this->load->helper('file');
						 
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'xls';
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('file'))
			{
					$this->session->set_flashdata('message', "<div class='badge badge-important'>File yang harus diupload harus berformat xls</div>");
					redirect('ruang');
			}
			else
			{
				$data = array('error' => false);
				$upload = $this->upload->data();

				$this->load->library('excel_reader');
				$this->excel_reader->setOutputEncoding('CP1251');

				$file = $upload['full_path'];
				$this->excel_reader->read($file);

				$data      = $this->excel_reader->sheets[0];
				$excel_data = Array();
				for ($i = 1; $i <= $data['numRows']; $i++)
					{
						 if($data['cells'][$i][1] == '') break;
						 $excel_data[$i-1]['nama_ruang']    = $data['cells'][$i][1];
						 $excel_data[$i-1]['kapasitas_kuliah']   = $data['cells'][$i][2];
						 $excel_data[$i-1]['kapasitas_ujian'] = $data['cells'][$i][3];           
				}            
				delete_files($upload['file_path']);
				$this->mod_ruang->upload_data($excel_data);            
				$this->session->set_flashdata('message', "<div class='badge badge-success'>File berhasil diupload</div>");
				redirect('ruang');
			}
		 }
	}
?>