<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class con_user extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		/***
		 * 
		 * Load Index
		 * Bagian Inisialisasi Panggilan Awal
		 *
		**/
		
		$u1 = $this->session->userdata('username');
		$u2 = $this->session->userdata('id_user');
		$u3 = $this->session->userdata('level');
		if(ISSET($u1) && ISSET($u2) && ISSET($u3) && ($u1 != "") && ($u2 != "") && ($u3 != "")){
			if(($u3 == 1)){
				$this->load->model('mod_user');
			}else{
				redirect('home/');
			}
			
			//print_r($this->session->all_userdata());
		}else{
			redirect('home/login');
		}
	}
	
	public function index(){
		redirect('home/');
	}
	
	public function form_add_user(){
		$sdata['msg'] = $this->session->flashdata('message');
		$data['sub'] = 0;
		$data['main_content'] = $this->load->view('form/add_user',$sdata,true);
		$this->load->view('template/template.php',$data);
	}
	
	
	public function add_user(){
		$this->form_validation->set_rules('nama', 'Nama User', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('jabatan', 'Level', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('message', "<div class='info-box error-bg'>".validation_errors()."</div>");
			redirect('home/edit_profile');
		}
		else
		{
			$a['nama_user'] = $this->input->post('nama');
			$a['username'] = $this->input->post('username');
			$a['password'] = md5(sha1(md5($this->input->post('password'))));
			$a['email'] = $this->input->post('email');
			$a['level'] = $this->input->post('jabatan');
			
			$this->mod_user->save_user($a);
			
			$this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Diinputkan</div>");
			redirect('home/edit_profile');
		}
	}
	
	public function update_user($id){
		if(!ISSET($id)){
			redirect('home/edit_profile');
		}else{
			$sdata['msg'] = $this->session->flashdata('message');
			$sdata['id'] = $id;
			$sdata['hasil'] = $this->mod_user->get_user_id($id);
			$data['sub'] = 0;
			$data['main_content'] = $this->load->view('admin/update_user',$sdata,true);
			$this->load->view('template/template.php',$data);
		}
	}
	
	public function edit_user($id){
		$this->form_validation->set_rules('nama', 'Nama User', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('jabatan', 'Level', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('message', "<div class='info-box error-bg'>".validation_errors()."</div>");
			redirect('home/edit_profile');
		}
		else
		{
			$a['nama_user'] = $this->input->post('nama');
			$a['username'] = $this->input->post('username');
			$a['email'] = $this->input->post('email');
			$d = $this->input->post('password');
			if(ISSET($d) && $d != ""){
				$a['password'] = md5(sha1(md5($this->input->post('password'))));
			}
			$a['level'] = $this->input->post('jabatan');
			
			$this->mod_user->edit_user($a,$id);
			//print_r($a);
			//print_r($id);
		
			$this->session->set_flashdata('message', "<div class='badge badge-success'>User Berhasil Diupdate</div>");
			redirect('home/edit_profile');
		}
	}
	
	public function delete_user($id){
		if(!ISSET($id)){
			$this->session->set_flashdata('message', "<div class='info-box error-bg'>Error Deleted</div>");
			redirect('home/edit_profile');
		}else{
			$this->session->set_flashdata('message', "<div class='badge badge-success'>User Berhasil Dihapus </div>");
			$this->db->delete('user', array('id_user' => $id));
			redirect('home/edit_profile');
		}
	}
	
	
	
}

?>