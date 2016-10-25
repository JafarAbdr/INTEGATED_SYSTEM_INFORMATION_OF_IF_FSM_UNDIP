<?php 
if(!defined("BASEPATH")) exit("");
require APPPATH."controllers/CI_Controller_Modified.php";
class Ghostemployee extends CI_Controller_Modified {
	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->load->helper('Url');
		$this->load->library('Ghost');
	
		//$_POST['ID'] = "ghostJaservTech";
		//$_POST['IDF'] = "ghostShowEmployee";
		//$_POST['name'] = "";
		//$_POST['IDF'] = "ghostRemoveEmployee";
		//$_POST['IDF'] = "ghostActivateOrDeactivateEmployee";
		//$_POST['nip'] = "9223372036854775807";
		//$_POST['statue'] = "2";
		
			/*
		$_POST['IDF'] = "ghostAddEmployee";
		$_POST['mentorid'] = "1";
		$_POST['nip'] = "9223372036854775807";
		$_POST['name'] = "Jafar Abdurrahman";
		*/
		if(!$this->ghost->getStatusLoginGhost()){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		/*
		if($this->isNullPost('ID') != 'ghostJaservTech'){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		*/
	}
	public function index(){
		echo "1";
		$this->load->view("Ghostarea/Content/Employee");
	}
	public function getDetailEmployee(){
		if($this->isNullPost('IDF') != 'ghostDetailEmployee'){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		$tempEmployeeNip = $this->isNullPost('nip');
		$this->load->library('employee');
		if(!$this->employee->getCheckEmployeeNip($tempEmployeeNip,1)[0]){
			exit('0Employee Nip doesnt approve');
		}$this->load->model("air_tab_mem");
		$this->air_tab_mem->resetValue();
		$this->air_tab_mem->setEmployeeNip($tempEmployeeNip);
		if(!$this->air_tab_mem->getRule1(0,false)){
			exit("0Employee was not found");
		}
		echo "1";
		$data['name'] = $this->air_tab_mem->getEmployeeName();
		$data['position'] = $this->air_tab_mem->getEmployeePosition();
		if($this->air_tab_mem->getEmployeePhoto() == null || $this->air_tab_mem->getEmployeePhoto() == "" || $this->air_tab_mem->getEmployeePhoto() == " "){
			if($this->air_tab_mem->getEmployeeGender() == "1"){
				$sourceFoto = base_url()."resources/mystyle/image/user_unknown.png";
			}else if($this->air_tab_mem->getEmployeeGender() == "2"){
				$sourceFoto = base_url()."resources/mystyle/image/user_man.png";
			}else{
				$sourceFoto = base_url()."resources/mystyle/image/user_woman.png";
			}
		}else{
			$sourceFoto = base_url()."upload/employee/photo/".$this->air_tab_mem->getEmployeePhoto();
		}
		$data['photo'] = $sourceFoto;
		$data['email'] = $this->air_tab_mem->getEmployeeEmail();
		$data['phone'] = $this->air_tab_mem->getEmployeePhone();
		$this->load->view("Ghostarea/Content/Sub-Content/Employeedetail",$data);
	}
	public function showListEmployee(){
		if($this->input->post('IDF') == null){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		if($this->input->post('IDF') != 'ghostShowEmployee'){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		$this->load->library('employee');
		if($this->input->post('name') == null){
			$tempQueryName = "*";
		}else{
			if(!$this->employee->getCheckEmployeeName($this->input->post('name'),1)[0]){
				$tempQueryName = "*";
			}else{
				$tempQueryName = $this->input->post('name');
			}
		}
		$this->load->model('air_tab_mem');
		$this->load->library('datejaservfilter');
		$this->air_tab_mem->resetValue();
		$this->air_tab_mem->setEmployeeName($tempQueryName);
		if($this->air_tab_mem->getRule3()){
			$tempListEmployee['count'] = 0;
			while($this->air_tab_mem->getNextCursor()){
				$tempListEmployee['count']+=1;
				$tempListEmployee['data'][$tempListEmployee['count']]['nip'] = $this->air_tab_mem->getEmployeeNip();
				if($this->air_tab_mem->getEmployeePhoto() == null || $this->air_tab_mem->getEmployeePhoto() == "" || $this->air_tab_mem->getEmployeePhoto() == " "){
					if($this->air_tab_mem->getEmployeeGender() == "1"){
						$sourceFoto = base_url()."resources/mystyle/image/user_unknown.png";
					}else if($this->air_tab_mem->getEmployeeGender() == "2"){
						$sourceFoto = base_url()."resources/mystyle/image/user_man.png";
					}else{
						$sourceFoto = base_url()."resources/mystyle/image/user_woman.png";
					}
				}else{
					$sourceFoto = base_url()."upload/employee/photo/".$this->air_tab_mem->getEmployeePhoto();
				}
				$sourceFoto = "<img class='detail-employee' onclick='detailEmployee(".'"'.$this->air_tab_mem->getEmployeeNip().'"'.")' data-placement='bottom' data-original-title='Click for detail' style='height : 50px; cursor : pointer;' src='".$sourceFoto."'>";
				$tempListEmployee['data'][$tempListEmployee['count']]['photo'] = $sourceFoto;
				$tempListEmployee['data'][$tempListEmployee['count']]['name'] = $this->air_tab_mem->getEmployeeName();
				
				
				$tempDateRegister = '<td class="hidden-phone-portrait">
                                    <p>
                                        <small>
                                            <strong>'.$this->datejaservfilter->setDate($this->air_tab_mem->getEmployeeDateRegister(),true)->getDate("D").'</strong>
                                            '.$this->datejaservfilter->setDate($this->air_tab_mem->getEmployeeDateRegister(),true)->getDate("d F Y").'
                                        </small>
                                    </p>
                                    <p>
                                        <small>
                                            <strong>Pukul:</strong>
                                            &nbsp;'.$this->datejaservfilter->setDate($this->air_tab_mem->getEmployeeDateRegister(),true)->getDate("H:m").' WIB
                                        </small>
                                    </p>
                                </td>';
				
				$tempListEmployee['data'][$tempListEmployee['count']]['dateregister'] = $tempDateRegister;
				
				
				
				if($this->air_tab_mem->getEmployeeStatue() == '1'){
					$sourceStatue = '<button type="button" class="btn btn-success" onclick="deactivateThisEmployee('."'".$this->air_tab_mem->getEmployeeNip()."'".')" data-placement="bottom" data-original-title="deactivate this employee">Active</button>&nbsp;';
					$sourceStatue .= '<button type="button" class="btn btn-danger" onclick="removeThisEmployee('."'".$this->air_tab_mem->getEmployeeNip()."'".')" data-placement="bottom" data-original-title="remove this employee">Remove</button>';
				}else{
					$sourceStatue = '<button type="button" class="btn btn-danger" onclick="activateThisEmployee('."'".$this->air_tab_mem->getEmployeeNip()."'".')" data-placement="bottom" data-original-title="activate this employee">Deactive</button>&nbsp;';
					$sourceStatue .= '<button type="button" class="btn btn-danger" onclick="removeThisEmployee('."'".$this->air_tab_mem->getEmployeeNip()."'".')" data-placement="bottom" data-original-title="remove this employee">Remove</button>';
				}
				$tempListEmployee['data'][$tempListEmployee['count']]['statue'] = $sourceStatue;
			}
		}else{
			$tempListEmployee['count'] = 1;
			$tempListEmployee['data'][$tempListEmployee['count']]['nip'] = "-";
			$tempListEmployee['data'][$tempListEmployee['count']]['photo'] = "-";
			$tempListEmployee['data'][$tempListEmployee['count']]['name'] = "-";
			$tempListEmployee['data'][$tempListEmployee['count']]['dateregister'] = "<td>-</td>";
			$tempListEmployee['data'][$tempListEmployee['count']]['statue'] = "-";
		}
		echo "1".json_encode($tempListEmployee);
	}
	//valid 9 21 2016
	public function addNewEmployee(){
		/*
		if($this->input->post('IDF') == null){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		if($this->input->post('IDF') != 'ghostAddEmployee'){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		*/
		//$_POST['nip'] = '11182918291111111';
		//$_POST['name'] = 'Jafar Abdurrahman A';
		//$_POST['mentorid'] = '2';
		$this->load->library('Employee');
		$tempEmployeeNip = $this->isNullPost("nip");
		if(!$this->employee->getCheckEmployeeNip($tempEmployeeNip,1)[0])
			exit("0Employee nip doesnt approve");
		$tempEmployeeName = $this->isNullPost("name");
		if(!$this->employee->getCheckEmployeeName($tempEmployeeName,1)[0])
			exit("0Employee name doesnt approve");
		$tempEmployeeMentorId = intval($this->isNullPost("mentorid"));
		if($tempEmployeeMentorId < 1 || $tempEmployeeMentorId > 3)
			exit("0Employee id doesnt approve");
		$this->load->model("air_tab_mem");
		$this->load->model("air_list_dose");
		$this->air_tab_mem->resetValue();
		$this->air_tab_mem->setEmployeeNip($tempEmployeeNip);
		if($this->air_tab_mem->getRule1()){
			exit("0Other Employee was found");
		}
		//employe
		$this->air_tab_mem->resetValue();
		$this->air_tab_mem->setEmployeeNip($tempEmployeeNip);
		$this->air_tab_mem->setEmployeeName($tempEmployeeName);
		$this->air_tab_mem->setEmployeePassword("dosenif56NEW");
		$this->air_tab_mem->setEmployeeStatue("1");
		$this->air_tab_mem->setEmployeeDateRegister(date("Y-m-d H:i:s"));
		$this->air_tab_mem->addNewRow();
		//dosen list
		if($tempEmployeeMentorId != 3){
			$this->air_list_dose->resetValue();
			$this->air_list_dose->setDosenNip($tempEmployeeNip);
			$this->air_list_dose->setDosenInternalOrExternal($tempEmployeeMentorId."");
			$this->air_list_dose->addNewRow();	
		}
		exit("1Successfull");
	}
	public function setActivateOrDeactivateEmployee(){
		if($this->input->post('IDF') == null){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		if($this->input->post('IDF') != 'ghostActivateOrDeactivateEmployee'){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		$tempEmployeeNip = $this->isNullPost('nip');
		$this->load->library('employee');
		if(!$this->employee->getCheckEmployeeNip($tempEmployeeNip,1)[0]){
			exit('0Employee Nip doesnt approve');
		}$this->load->model("air_tab_mem");
		$this->air_tab_mem->resetValue();
		$this->air_tab_mem->setEmployeeNip($tempEmployeeNip);
		if(!$this->air_tab_mem->getRule1(0,false)){
			exit("0Employee was not found");
		}
		$tempEmployeeStatue = intval($this->isNullPost('statue'));
		if($tempEmployeeStatue < 1 || $tempEmployeeStatue > 2){
			exit("0Employee statue doesnt approve");
		}
		if($tempEmployeeStatue == intval($this->air_tab_mem->getEmployeeStatue())){
			exit("0Employee statue doesnt approve");
		}
		$this->air_tab_mem->resetValue();
		$this->air_tab_mem->setEmployeeNip($tempEmployeeNip);
		$this->air_tab_mem->setEmployeeStatue($tempEmployeeStatue."");
		if($this->air_tab_mem->updateRule1()){
			exit('1Successfull');
		}else{
			exit('0Failed in change proses');
		}
		
	}
	//valid - 9 21 2016
	public function removeEmployee(){
		if($this->input->post('IDF') == null){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		if($this->input->post('IDF') != 'ghostRemoveEmployee'){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		$tempEmployeeNip = $this->isNullPost('nip');
		$this->load->library('employee');
		if(!$this->employee->getCheckEmployeeNip($tempEmployeeNip,1)[0]){
			exit('0Employee Nip doesnt approve');
		}
		$this->load->model("air_tab_mem");
		$this->load->model("air_list_dose");
		$this->air_tab_mem->resetValue();
		$this->air_tab_mem->setEmployeeNip($tempEmployeeNip);
		if(!$this->air_tab_mem->getRule1()){
			exit("0Employee was not found");
		}
		$this->air_tab_mem->resetValue();
		$this->air_tab_mem->setEmployeeNip($tempEmployeeNip);
		if(!$this->air_tab_mem->deleteRule1()){
			exit('0Failed in change proses');
		}
		$this->air_list_dose->resetValue();
		$this->air_list_dose->setDosenNip($tempEmployeeNip);
		if($this->air_list_dose->getRule1()){
			$this->air_list_dose->resetValue();
			$this->air_list_dose->setDosenNip($tempEmployeeNip);
			$this->air_list_dose->deleteRule1();	
		}
		$this->load->model("air_api_actor");
		$this->air_api_actor->resetValue();
		$this->air_api_actor->setNip($tempEmployeeNip);
		if($this->air_api_actor->getRule4()){
			$this->air_api_actor->resetValue();
			$this->air_api_actor->setNip($tempEmployeeNip);
			$this->air_api_actor->deleteRule3();
		}
		exit("1Successfull");
	}
	
}