<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_upload');	
	}

	function do_upload()
	{
		$level =$this->session->userdata('level');
		$user=$this->session->userdata('nama');
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['min_size']	= '10'; //10 KB
		$config['max_size']	= '2000'; //2 MB
		// $config['max_width']  = '1024';
		// $config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()){
			//$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message',1);
			$this->session->set_flashdata('alert','File tidak ada atau tidak sesuai');
			//$this->load->view('level2/form_upload', $error);
			if($level==1){
				redirect('c_dosen/form_upload');
			}else if($level==2){
				redirect('c_admin/form_upload');
			}
		}
		else
		{
			
			$data = array('upload_data' => $this->upload->data());
			$data_upload=$this->upload->data();
			$nama= $data_upload['file_name'];
			$data=array(
				'nama'=>$nama,
				'upload_user'=>$user,
				'jenis_file'=>$this->input->post('jenis_file'),
				'kategori'=>$this->input->post('kategori'));
			$this->m_upload->get_nama($data);
			
			if($level==1){
				redirect('c_dosen/view_upload');
			}else if($level==2){
				redirect('c_admin/view_upload');
			}	
		}
	}
	
	function delete_upload($no){
		$level =$this->session->userdata('level');
		$user=$this->session->userdata('nama');
		
		$file_name=$this->m_upload->get_namas($no);
		unlink(APPPATH.'../uploads/'.$file_name[0]->nama);
		$this->m_upload->delete($no);
		if($level==1){
			redirect('c_dosen/view_upload');
		}else if($level==2){
			redirect('c_admin/view_upload');
		}
	}
}
?>