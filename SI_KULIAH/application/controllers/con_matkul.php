<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Con_matkul extends CI_Controller {
	 
		 function __construct() {
			parent::__construct();
			$u1 = $this->session->userdata('username');
			$u2 = $this->session->userdata('id_user');
			$u3 = $this->session->userdata('level');
			$this->u3a = $this->session->userdata('level');
			if(ISSET($u1) && ISSET($u2) && ISSET($u3) && ($u1 != "") && ($u2 != "") && ($u3 != "")){
				$this->load->model('mod_matkul');
				$this->load->helper(array('url','form'));
			}else{
				redirect('home/login');
			}
		 }
	 
		 function view_matkul() {
			  $this->tambah_data();
		 }
		
		function tambah_data() {
			if((($this->u3a == 1)||($this->u3a == 2))){
				$sdata['hasil'] = $this->mod_matkul->getall();
				$sdata['msg'] = $this->session->flashdata('message');
				$data['main_content'] = $this->load->view('matkul/tambah_matkul',$sdata,TRUE);
				$data['sub'] = 1;
				$this->load->view('template/template',$data);
			}else {
				redirect('home/');
			}
		 }
		 function save_tambahdata(){
				$kode_matkul = $this->input->post('kode_matkul');
				$nama_matkul  = $this->input->post('nama_matkul');
				$sks = $this->input->post('sks');
				$semester = $this->input->post('semester');
				$semesterke = $this->input->post('semesterke');
				
				$data = array (
					'kode_matkul' => $kode_matkul,
					'nama_matkul'  => $nama_matkul,
					'sks'=> $sks,
					'semester' => $semester,
					'semesterke' => $semesterke
				);  
				$this->mod_matkul->tambah_data($data);
				$this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Ditambahkan</div>");
				redirect('matakuliah');
		}

		function update_data($id_matkul) {
			if(($this->u3a == 1)||($this->u3a == 2)){
			  $sdata['hasil'] = $this->mod_matkul->getByid_matkul($id_matkul);
			  
			  $data['main_content'] = $this->load->view('matkul/update_matkul',$sdata,TRUE);
			  $data['sub'] = 1;
			  $this->load->view('template/template',$data);
			}else{
				redirect('home/');
			}
			
		 }
		function save_update_data($id_matkul){
			
				$kode_matkul = $this->input->post('kode_matkul');
				$nama_matkul  = $this->input->post('nama_matkul');
				$sks = $this->input->post('sks');
				$semester = $this->input->post('semester');
				$semesterke = $this->input->post('semesterke');
				
				$data = array (
					'kode_matkul' => $kode_matkul,
					'nama_matkul'  => $nama_matkul,
					'sks'=> $sks,
					'semester' => $semester,
					'semesterke' => $semesterke
				);
				//print_r($data);
				$this->mod_matkul->update($id_matkul,$data);
				$this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Diupdate</div>");
				redirect('matakuliah');
			
		}
		function delete_data($id_matkul) {
			if(($this->u3a == 1)||($this->u3a == 2)){
			  $this->mod_matkul->delete_data($id_matkul);
			  $this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Dihapus</div>");
			  redirect('matakuliah');
			}else{
				redirect('home/');
			}
		}
		
		function validasi_matkul()
		{
			$this->load->library('form_validation');
			
			// field name, error message, validation rules
			$this->form_validation->set_rules('kode_matkul', 'kode matkul', 'trim|required');
			$this->form_validation->set_rules('nama_matkul', 'nama matkul', 'trim|required');
			$this->form_validation->set_rules('sks', 'sks', 'trim|required|is_natural|numeric|max_length[1]');
			$this->form_validation->set_rules('semester', 'semester', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert"></a><strong>', '</strong></div>');
			
			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('tambah_matkul');
			}
			
			else
			{				
					$this->mod_matkul->tambah();
					redirect('matakuliah');
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
				redirect('matakuliah');
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
						 $excel_data[$i-1]['kode_matkul']    = $data['cells'][$i][1];
						 $excel_data[$i-1]['nama_matkul']   = $data['cells'][$i][2];
						 $excel_data[$i-1]['sks'] = $data['cells'][$i][3];                
						 $excel_data[$i-1]['semester'] = $data['cells'][$i][4];                
						 $excel_data[$i-1]['semesterke'] = $data['cells'][$i][5];                
				}            
					delete_files($upload['file_path']);
					$this->mod_matkul->upload_data($excel_data); 
					$this->session->set_flashdata('message', "<div class='badge badge-success'>File berhasil diupload</div>");					
					redirect('matakuliah');
			}
		 }
	}
?>