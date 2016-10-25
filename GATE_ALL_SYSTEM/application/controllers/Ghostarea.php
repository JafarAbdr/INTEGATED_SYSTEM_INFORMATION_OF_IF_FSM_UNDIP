<?php
/*
This Class has been rebuild revision build v3.0 Ghostarea.php
Author By : Jafar Abdurrahman Albasyir
Since : 17/5/2016
Work : Home on 08:05 PM
*/
defined('BASEPATH') OR exit('What Are You Looking For ?');
class Ghostarea extends CI_Controller{
	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->load->library('Ghost');
		$this->load->helper('Url');
		if(!$this->ghost->getStatusLoginGhost()) redirect(base_url()."Gateinout.aspx");
	}
	public function index(){
		$this->load->view("Ghostarea/Ghostarea_header");
	}
	public function logOut(){
		$this->ghost->setStatusLogOutGhost();
		if(!$this->ghost->getStatusLoginGhost()) redirect(base_url()."Gateinout.aspx");
	}
}