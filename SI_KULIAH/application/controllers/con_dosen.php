<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Con_dosen extends CI_Controller{
		public function __construct(){
			parent:: __construct();
			$u1 = $this->session->userdata('username');
			$u2 = $this->session->userdata('id_user');
			$u3 = $this->session->userdata('level');
			$this->u3a = $this->session->userdata('level');
			if(ISSET($u1) && ISSET($u2) && ISSET($u3) && ($u1 != "") && ($u2 != "") && ($u3 != "")){
				$this->load->model('mod_dosen'); 
			}else{
				redirect('home/login');
			}			
		}
      function index(){
         $sdata['query'] = $this->mod_dosen->get_all_dosen();
         $data['main_content'] = $this->load->view('dosen/view_dosen',$sdata,TRUE);
         $data['sub'] = 6;
         $this->load->view('template/template',$data);         
      }
      
      function tambah_data(){
			if(($this->u3a == 1)||($this->u3a == 2)){
				$sdata['id_dosen'] = $this->mod_dosen->get_id_dosen();
				$sdata['query'] = $this->mod_dosen->get_all_dosen();
				$sdata['msg'] = $this->session->flashdata('message');
				$data['main_content'] = $this->load->view('dosen/form_add',$sdata,TRUE);
				$data['sub'] = 2;
				$this->load->view('template/template',$data);
			}else{
					redirect('home');
			}
      }
		
      
      function update_data($id_dosen){
			if(($this->u3a == 1)||($this->u3a == 2)){
				$sdata['hasil'] = $this->mod_dosen->getById($id_dosen);
				$data['sub'] = 2;
				$data['main_content'] = $this->load->view('dosen/update_dosen', $sdata, TRUE);
				$this->load->view('template/template',$data);
			}else{
					redirect('home');
			}	
      }
      
      function save_update_data($id_dosen){
			
				$id_dosen = $this->input->post('id_dosen');
				$nip = $this->input->post('nip');
				$nama_dosen  = $this->input->post('nama_dosen');
				$nidn = $this->input->post('nidn');
				$pangkat = $this->input->post('pangkat');
				$jabatan = $this->input->post('jabatan');
				$data = array(
					'id_dosen' => $id_dosen,
					'nip' => $nip,
					'nama_dosen'  => $nama_dosen,
					'nidn' => $nidn,
					'pangkat' => $pangkat,
					'jabatan' => $jabatan
				);
				//print_r($data);
				$this->mod_dosen->update($id_dosen,$data);
				$this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Diupdate</div>");
				redirect('dosen/add');
			
      }
      
		function save_add_dosen(){
				$id_dosen = $this->input->post('id_dosen');
			   $nip = $this->input->post('nip');
			   $nama_dosen = $this->input->post('nama_dosen');
			   $nidn = $this->input->post('nidn');
			   $pangkat = $this->input->post('pangkat');
			   $jabatan = $this->input->post('jabatan');
				$inp = array(
					'id_dosen' => $id_dosen,
					'nip' => $nip,
					'nama_dosen' => $nama_dosen,
					'nidn' => $nidn,
					'pangkat' => $pangkat,
					'jabatan' => $jabatan,
				);
				$this->mod_dosen->tambah_dosen($inp);
				$this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Ditambahkan</div>");
				redirect('dosen/add');
		}
      function hapus_data($id_dosen){
			if(($this->u3a == 1)||($this->u3a == 2)){
				$this->mod_dosen->delete_data($id_dosen);
				$this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Dihapus</div>");
				redirect('dosen/add');
			}else{
					redirect('home');
			}
      }
		
		function _formvalidation(){
			
			$this->form_validation->set_rules('nip','NIP','required');
			$this->form_validation->set_rules('nama_dosen','Nama Dosen','required');
			$this->form_validation->set_rules('nidn','NIDN','required');
			$this->form_validation->set_rules('pangkat','Pangkat','required');
			$this->form_validation->set_rules('jabatan','Jabatan','required');
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
				redirect('dosen');
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
						 $excel_data[$i-1]['id_dosen'] = $this->_prosesidmax($i);
						 $excel_data[$i-1]['nip']  = $data['cells'][$i][1];
						 $excel_data[$i-1]['nama_dosen']   = $data['cells'][$i][2];
						 $excel_data[$i-1]['nidn'] = $data['cells'][$i][3];                
						 $excel_data[$i-1]['pangkat'] = $data['cells'][$i][4];                
						 $excel_data[$i-1]['jabatan'] = $data['cells'][$i][5];                
				}            
				delete_files($upload['file_path']);
				$this->mod_dosen->upload_data($excel_data);            
				$this->session->set_flashdata('message', "<div class='badge badge-success'>File berhasil diupload</div>");
				redirect('dosen/add');
			}
		 }
		 
		function _prosesidmax($i){
			$idMax = $this->mod_dosen->get_id_dosen();
			$noUrut = (int) substr($idMax, 2, 3);
			  
			$noUrut = $noUrut + $i -1;
			 
			$newID = 'IF' . sprintf("%03s", $noUrut);
			return $newID;
		}
		 
		
   }
?>