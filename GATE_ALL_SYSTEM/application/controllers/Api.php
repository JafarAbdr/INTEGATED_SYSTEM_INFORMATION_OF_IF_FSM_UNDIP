<?php
require_once APPPATH."controllers/CI_Controller_Modified.php";
class Api extends CI_Controller_Modified {
	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->load->model('air_api_registered');
		$this->load->library('controlapi');
	}
	public function index(){
		$this->load->helper('Url');
		redirect(base_url()."Gateinout.aspx");
	}
	public function apiKey($key=null,$getType=null){
		if($this->isNull($key)) redirect(base_url());
		$url = $this->isNullPost('domain'," ");
		$this->air_api_registered = new Air_api_registered('JASERV-CONTROL-API-GHOST');
		$this->air_api_registered->resetValue();
	}
	public function getKey($url){
		$url = str_ireplace(":::","://",$url);
		$url = str_ireplace("%7C",".",$url);
		$kodeServer = $this->controlapi->encryptKode($url);
		if(is_bool($kodeServer)) redirect(base_url());
		
	}
	//check if any login registered on domain return level kode and nip
	//return 
	/*
	packet = {
		"kode" : "level registered om domain",
		"main kode nip" for employee and nim for mahasiswa
		"status" : "1" for success and "0" for failed
	}
	*/
	public function isLoginMyMember(){
		$url = $this->isNullPost("domain");
		$urlKey = $this->isNullPost("domainKeyStore");
		$kode = $this->controlapi->encryptKode($url);
		if(is_bool($kode)) {
			exit(json_encode(array("errorMessage":"this Domain Does'nt Registered","status" => 404)));
		}
		if($kode != $urlKey){
			exit(json_encode(array("errorMessage":"this DomainkeyStore Does'nt Recognized","status" => 505)));
		}
		$this->load->library("ghost");
		$this->load->library("employee");
		//$this->load->library("mahasiwa");
		if($this->ghost->getStatusLoginGhost()){
			$this->logOutAnythingLogInInThisIp();
			exit(json_encode(array("status" => 0)));
		}
		if($this->ghost->getStatusLoginGhost()){
			$this->logOutAnythingLogInInThisIp();
			exit(json_encode(array("status" => 0)));
		}
		if($this->ghost->getStatusLoginGhost()){
			$this->logOutAnythingLogInInThisIp();
			exit(json_encode(array("status" => 0)));
		}
	}
	private function logOutAnythingLogInInThisIp(){
		$this->ghost->setStatusLogOutGhost();
		$this->employee->setStatusLogOutEmployee();
		//$this->mahasiswa->setStatusLogOutMahasiswa();
	}  
	//check log out
}