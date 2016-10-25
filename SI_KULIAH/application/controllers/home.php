<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->library('form_validation');
	   // helper yang dibutuhkan
       $this->load->helper(array('form', 'url', 'html'));
		$this->load->model('db_home');
		$this->load->model('mod_user');
	}

	public function index()
	{
		$u1 = $this->session->userdata('username');
		$u2 = $this->session->userdata('id_user');
		$u3 = $this->session->userdata('level');
		if(ISSET($u1) && ISSET($u2) && ISSET($u3)  && ($u1 != "")  && ($u2 != "")  && ($u3 != "")){
			$data['sub'] = 0;
			$data['main_content'] = $this->load->view('template/home','',true);
			$this->load->view('template/template',$data);
		}else{
			redirect('home/login');
		}	
	}
	
	public function login(){
		
		$data['msg'] = $this->session->flashdata('message');
		$this->load->view('admin/login',$data);
	}
	
	public function process_login(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['message_error'] = TRUE;
			//redirect('home/login',$data);
			$this->load->view('admin/login', $data);
		}
		else{
			$u = $this->input->post('username');
			$p = $this->input->post('password');
			$p = md5(sha1(md5($p)));
			$a = $this->db_home->get_login($u,$p);
			
			if($a->num_rows() > 0){
				$dt = $a->row_array();
				$this->session->set_userdata('username',$dt['username']);
				$this->session->set_userdata('level',$dt['level']);
				$this->session->set_userdata('nama_user',$dt['nama_user']);
				$this->session->set_userdata('id_user',$dt['id_user']);
				$temp = $this->_getDate();
				$this->session->set_userdata('thn_ajar',$temp['thn_ajar']);
				$this->session->set_userdata('semester',$temp['semester']);
				$this->session->set_userdata('uts_uas',$temp['uts_uas']);
				$this->session->set_userdata('auto_date', true);
				redirect('home/');
			}else{
				$data['message_error'] = TRUE;
				//redirect('home/login',$data);
				$this->load->view('admin/login', $data);
			}
		
		}
	}
	public function reset_password()
	{

		$data['pesan']='';
		
		$this->form_validation->set_rules('email', 'email', 'strtolower|required|valid_email');
		$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/form_reset_password',$data);  
		}
		else
		{
			$email = $this->input->post('email');
			$sum_email = $this->mod_user->get_email($email);
			if($sum_email >= 1)
			{
				$pass_dummy = rand(100000,999999);
				$pass = md5(sha1(md5($pass_dummy)));

				$this->mod_user->update_password($pass, $email);
				
				// kirim email
				$config = Array(
			   'protocol'  => 'smtp',
			   'smtp_host'    => 'ssl://smtp.googlemail.com',
			   'smtp_port'    => 465,
			   'smtp_user'    => 'fachrizallukman17@gmail.com',
			   'smtp_pass'    => 'Alhambra1.',
			   'mailtype'     => 'html', 
			   'charset'      => 'iso-8859-1',
			   'newline'   => "\r\n"
				);
				$this->load->library('email', $config);
				 
				$this->email->from('fachrizallukman17@gmail.com', 'Administrator ');
				$this->email->to($email);
				 
				$this->email->subject('Password Baru');
				$this->email->message('new password : '.$pass_dummy.'\n
										Terima kasih');
				$this->email->send();
				
				$data['pesan'] = 'Password baru telah dikirim ke email anda. Silahkan cek email Anda.'; 
				$this->load->view('admin/pesan',$data); 
				
			}
			else
			{
				$data['pesan']='Maaf, email tidak valid';
				$this->load->view('admin/form_reset_password',$data);
			}
		}	
	}
	public function edit_profile(){
		$u1 = $this->session->userdata('username');
		$u2 = $this->session->userdata('id_user');
		$u3 = $this->session->userdata('level');
		if(ISSET($u1) && ISSET($u2) && ISSET($u3) && ($u1 != "")  && ($u2 != "")  && ($u3 != "")){
			$sdata['data'] = $this->db_home->get_profile();
			$sdata['daftar'] = $this->mod_user->getall();
			$sdata['jurusan'] = $this->mod_user->get_jmljurusan();
			//print_r($sdata['jurusan']);
			$sdata['msg'] = $this->session->flashdata('message');
			$data['sub'] = 0;
			$data['main_content'] = $this->load->view("admin/edit_profile",$sdata,true);
			$this->load->view('template/template',$data);
		}else{
			redirect("home/login");
		}	
	}
	
	public function edit_date(){
		$u1 = $this->session->userdata('username');
		$u2 = $this->session->userdata('id_user');
		$u3 = $this->session->userdata('level');
		if(ISSET($u1) && ISSET($u2) && ISSET($u3) && ($u1 != "")  && ($u2 != "")  && ($u3 != "")){
			//$data 
			$data['sub'] = 0;
			$temp =$this->_dropdownAll();
			//print_r($temp);
			$data['dropdownPilihan'] = $temp['dropdownPilihan'];
			$data['selectedPilihan'] = $this->session->userdata('auto_date');
			$data['dropdownSemester'] = $temp['dropdownSemester'];
			$data['selectedSemester'] = $this->session->userdata('semester');
			$data['selectedYear'] = $this->session->userdata('thn_ajar');
			$data['dropdownYear'] = $temp['dropdownYear'];
			$data['selecteduts_uas'] = $this->session->userdata('uts_uas');
			$data['dropdownuts_uas'] = $temp['dropdownuts_uas'];
			$sdata['main_content'] = $this->load->view("admin/edit_date",$data,true);
			$this->load->view('template/template',$sdata);
		}else{
			redirect('home/login');
		}
	}
	
	public function save_edit_date(){
		$u1 = $this->session->userdata('username');
		$u2 = $this->session->userdata('id_user');
		$u3 = $this->session->userdata('level');
		if(ISSET($u1) && ISSET($u2) && ISSET($u3) && ($u1 != "")  && ($u2 != "")  && ($u3 != "")){
			$au = $this->input->post('pilihan');
			$thn_ajar = $this->input->post('thn_ajar');
			$semester = $this->input->post('semester');
			$uts_uas = $this->input->post('uts_uas');
			if($au){
				$this->session->set_userdata('auto_date',$au);
				$this->session->set_userdata('thn_ajar',$thn_ajar);
				$this->session->set_userdata('semester',$semester);
				$this->session->set_userdata('uts_uas',$uts_uas);
			}else{
				$this->session->set_userdata('auto_date',$au);
				$this->session->set_userdata('thn_ajar','');
				$this->session->set_userdata('semester','');
				$this->session->set_userdata('uts_uas','');
			}
			$data['sub'] = 0;
			redirect('home');
		}else{
			redirect('home/login');
		}
	}
	
	public function save_edit_profile(){
		$this->form_validation->set_rules('nama', 'Nama User', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('message', "<div class='info-box error-bg'>".validation_errors()."</div>");
			redirect('home/edit_profile/'.$id);
		}
		else
		{
			$a['nama_user'] = $this->input->post('nama');
			$a['username'] = $this->input->post('username');
			
			$session_data = $this->session->userdata('id_user');
			
			$query1 = "select password from user where id_user=".$session_data;
			$query=$this->db->query($query1)->row()->password;
			//print_r($query);
			//print_r($query1);
			if ((md5(sha1(md5($this->input->post('oldpassword'))))) === $query){
				$d = $this->input->post('password');
				$a['password'] = md5(sha1(md5($this->input->post('password'))));
				$this->db_home->edit_profile($a);
				$this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Diupdate</div>");
				redirect('home/edit_profile');
			} else{
				$this->session->set_flashdata('message', "<div class='badge badge-important'>Password Lama Salah</div>");
				redirect('home/edit_profile');
			}
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect("home/login");
	}
	
	function _getDate(){
      $return = array();
      $year = date('Y');
      $month = date('n');
      if($month<=6){
         $return['thn_ajar'] = ($year-1).'/'.($year);
         $return['semester'] = 'Genap';
         $return['uts_uas'] = 'UTS';
		 
      }else{
         $return['thn_ajar'] = ($year).'/'.($year+1);
         $return['semester'] = 'Ganjil';
         $return['uts_uas'] = 'UAS';
      }
      return $return;    
   }
	
	function _getDate_2(){
      $return = array();
      $year = date('Y');
      $month = date('n');
		$return['thn_ajar'] = ($year+2).'/'.($year+3); 
      return $return;    
   }
	
	function _dropdownAll(){
		//pilihan		
		$dropdown[''] = '';
		$dropdown[true] = 'Automatic';
      $dropdown[false] = 'Manual';
      $data['dropdownPilihan'] = $dropdown;
		
		//semester
		$dropdown = null;
		$dropdown[''] = '';
		$dropdown['Ganjil'] = 'Ganjil';
		$dropdown['Genap'] = 'Genap';
		$data['dropdownSemester'] = $dropdown;
	  
		//semester
		$dropdown = null;
		$dropdown[''] = '';
		$dropdown['UTS'] = 'UTS';
		$dropdown['UAS'] = 'UAS';
		$data['dropdownuts_uas'] = $dropdown;
		
		//tahun ajar
		$dropdown = null;
		$dropdown[''] = '';
		$year = 2004;
		$ttt = $this->_getDate_2();
		$condA = $ttt['thn_ajar'];
		
		while(true){
			$dropdown[($year).'/'.($year+1)] = $condB = ($year).'/'.($year+1);
			$year++;
			if($condA===$condB){
				break;
			}
			$condB = null;
		}
		$data['dropdownYear'] = $dropdown;
		return $data;		
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */