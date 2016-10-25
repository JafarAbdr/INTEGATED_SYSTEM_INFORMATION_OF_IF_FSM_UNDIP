<?php 
if(!defined("BASEPATH")) exit("");
class Ghoststudent extends CI_Controller {
	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->load->helper('Url');
		$this->load->library('Ghost');
		if(!$this->ghost->getStatusLoginGhost()){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		//$this->load->library('View');
		//if($this->input->post('ID') == null){
		//	exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		//}
		//if($this->input->post('ID') != 'ghostJaservTech'){
			//exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		//}
	}
	public function index(){
		$koko = array(
			"jojo3" => "lolo",
			"jojo2" => "lolo",
			"jojo1" => "lolo",
			"jojo0" => "lolo"
		);
		foreach($koko as $g => $b){
			echo $g." ".$b."<br>";
		}
		echo "1";
		//$this->load->view("Ghostarea/Content/Student");
	}
	public function addNewEmployee(){
		if($this->input->post('IDF') == null){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		if($this->input->post('IDF') != 'ghostAddEmployee'){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		$this->load->library('Employee');
		$tempEmployeeNip = $this->view->isNullPost("nip");
		if(!$this->employee->getCheckEmployeeNip($tempEmployeeNip,1)[0])
			exit("0Employee nip doesnt approve");
		$tempEmployeeName = $this->view->isNullPost("name");
		if(!$this->employee->getCheckEmployeeName($tempEmployeeName,1)[0])
			exit("0Employee name doesnt approve");
		$tempEmployeeMentorId = intval($this->view->isNullPost("mentorid"));
		if($tempEmployeeMentorId < 1 || $tempEmployeeMentorId > 2)
			exit("0Employee id doesnt approve");
		$this->load->model("air_tab_mem");
		$this->load->model("air_list_dose");
		$this->air_tab_mem->resetValue();
		$this->air_tab_mem->setEmployeeNip($nip);
		$this->air_tab_mem->setEmployeeName($name);
		$this->air_tab_mem->setEmployeePassword("dosenif56NEW");
		$this->air_tab_mem->setEmployeeStatue("1");
		exit("1Successfull");
	}
	
}