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
		$config['allowed_types'] = 'doc|docx|rar|zip';
		$config['max_size']	= '25000';
		// $config['max_width']  = '1024';
		// $config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('level2/upload_form', $error);
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
				'status'=>$this->input->post('status'));
			$this->m_upload->get_nama($data);
			
			if($level==1){
				redirect('c_dosen/view_upload');
			}else if($level==2){
				redirect('c_admin/view_upload');
			}	
		}
	}
	function delete_upload($no){
		$file_name=$this->m_upload->get_namas($no);
		unlink(APPPATH.'../uploads/'.$file_name[0]->nama);
		$this->m_upload->delete($no);
		redirect('c_admin/view_upload');
	}
}
?>