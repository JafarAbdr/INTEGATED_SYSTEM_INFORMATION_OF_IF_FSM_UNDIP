<?php
/*
This Class has been rebuild revision build v3.0 Gateinout.php
Author By : Jafar Abdurrahman Albasyir
Since : 17/5/2016
Work : Home on 08:05 PM
*/
defined('BASEPATH') OR exit('What Are You Looking For ?');
require APPPATH."controllers/CI_Controller_Modified.php";
class Gateinout extends CI_Controller_Modified {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('Ghost');
		$this->load->library('Employee');
		if($this->ghost->getStatusLoginGhost()){
			redirect(base_url()."Ghostarea.aspx");
		}
		if($this->employee->getStatusLoginEmployee()){
			redirect(base_url()."Employeearea.aspx");
		}
	}
	// default - valid
	public function index($tempInput=null){
		$TEMP_ARRAY['url_script'] = array(
				"resources/mystyle/js/gateinout.js",
				"resources/LibraryJaserv/js/jaserv.min.dev.js"
		);
		$TEMP_ARRAY['url_link'] = array(
				"resources/mystyle/css/gateinout.css",
				"resources/mystyle/css/global-style.css"
		);
		if($tempInput == null)
			$TEMP_ARRAY['backtobaseroom'] = false;
		else if($tempInput == "baseroom")
			$TEMP_ARRAY['backtobaseroom'] = true;
		else{
			$TEMP_ARRAY['backtobaseroom'] = false;
		}
		$this->load->view('Gateinout_layout',$TEMP_ARRAY);
	}
	//sign session - valid
	public function getSignIn(){
		//$_POST['login-akun'] = 'emp';
		//$_POST['login-nim'] = "197805162003121001";
		//$_POST['login-password'] = "dosenif56NEW"; 
		$tempUserCategory = $this->isNullPost('login-akun');
		$tempUserName = $this->isNullPost('login-nim');
		if(!$this->ghost->getCheckUserName($tempUserName,1)[0]){
			if(!$this->employee->getCheckEmployeeNip($tempUserName,1)[0]){
				exit("0Username cannot be approve");
			}
		}	
		$tempUserPassword = $this->isNullPost('login-password');
		if(!$this->ghost->getCheckUserPassword($tempUserPassword,1)[0]){
			if(!$this->employee->getCheckEmployeePassword($tempUserPassword,1)[0]){
				exit("0Password cannot be approve");
			}
		}
		switch ($tempUserCategory){
			case 'ghs' :
				$this->ghost->setLoginGhost($tempUserName,$tempUserPassword,0);
				break;
			case 'emp' :
				$this->employee->setLoginEmployee($tempUserName,$tempUserPassword,0);
				break;
			default : 
				echo "0Code cannot be approve";
				break;
		}
	}
}