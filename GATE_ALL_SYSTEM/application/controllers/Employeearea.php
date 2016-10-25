<?php
/*
This Class has been rebuild revision build v3.0 Gateinout.php
Author By : Jafar Abdurrahman Albasyir
Since : 17/5/2016
Work : Home on 08:05 PM
*/
defined('BASEPATH') OR exit('What Are You Looking For ?');
class Employeearea extends CI_Controller{
	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->load->library('Employee');
		$this->load->helper('Url');
		if(!$this->employee->getStatusLoginEmployee()) redirect(base_url()."Gateinout.aspx");
	}
	public function index(){
		$this->load->view("Employeearea/Employeearea_header");
	}
	public function logOut(){
		$this->employee->setStatusLogOutEmployee();
		if(!$this->employee->getStatusLoginEmployee()) redirect(base_url()."Gateinout.aspx");
	}
}