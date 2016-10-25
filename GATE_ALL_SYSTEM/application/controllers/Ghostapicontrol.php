<?php
if(!defined("BASEPATH")) exit("");
require APPPATH."controllers/CI_Controller_Modified.php";
class Ghostapicontrol extends CI_Controller_Modified {
    function __CONSTRUCT(){
        parent::__CONSTRUCT();
		$this->load->helper('Url');
		$this->load->library('Ghost');
		if(!$this->ghost->getStatusLoginGhost()){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		/*
		if($this->isNullPost('ID') != 'ghostJaservTech'){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		*/
		$this->load->library('controlapi');
		$this->load->model('air_api_registered');
		$this->load->model('air_api_actor');
		$this->air_api_registered = new Air_api_registered('JASERV-CONTROL-API-GHOST');
		$this->air_api_actor = new Air_api_actor('JASERV-CONTROL-API-GHOST');
    }
    public function index(){
		echo "1";
		$this->load->view("Ghostarea/Content/Apicontrol");
    }
	public function showListApiActor(){
		//$_POST['IDF'] = "ghostShowListApiActor";
		//$_POST['domain'] = "http://siata.if.undip.ac.id";
		if($this->isNullPost('IDF') != 'ghostShowListApiActor'){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		$tempDomain = $this->isNullPost("domain");
		//check api is exist
		if(!$this->controlapi->getCheckDomain($tempDomain,1)[0])
			exit("0Api Domain doesnt approve");
		$this->air_api_registered->resetValue();
		$this->air_api_registered->setDomain($tempDomain);
		if(!$this->air_api_registered->getRule1()) exit("0domain not registered");
		$code = $this->air_api_registered->getKode();
		$this->air_api_actor->resetValue();
		$this->air_api_actor->setDomain($tempDomain);
		$tempListApi['count'] = 0;
		$this->load->model('air_tab_mem');
		/*
		$this->air_tab_mem->resetValue();
		$this->air_tab_mem->setEmployeeName("*");
		$this->air_tab_mem->setEmployeeStatue("1");
		$tempListApi['dosenList'] = "<option value='0'>Choose other</option>";
		if($this->air_tab_mem->getRule4()){
			while($this->air_tab_mem->getNextCursor()){
				$tempListApi['dosenList'] .= "<option value='".$this->air_tab_mem->getEmployeeNip()."'>".$this->air_tab_mem->getEmployeeName()."</option>";
			}
		}
		*/
		$tempListApi['dosenList'] = "<option value='0'>Choose other</option>";
		$dataPegawai = $this->controlapi->getListWithCodeEmployee($code);
		$datamahasiswa = $this->controlapi->getListWithCodeStudent($code);
		$dataArray = array_merge($datamahasiswa,$dataPegawai);
		foreach($dataArray as $value){
			$tempListApi['dosenList'] .= "<option value='".$value['nip']."'>".$value['nama']."</option>";
		}
		//var_dump($dataArray);
		//exit();





		if($this->air_api_actor->getRule2()){
			while($this->air_api_actor->getNextCursor()){
				$tempListApi['count']+=1;
				$tempListApi['data'][$tempListApi['count']]['level'] = $this->air_api_actor->getLevel();
				$this->air_tab_mem->resetValue();
				$this->air_tab_mem->setEmployeeNip($this->air_api_actor->getNip());
				$nama = '';
				if($this->air_tab_mem->getRule1())
					$nama .= $this->air_tab_mem->getEmployeeName();
				else
					$nama .= "Unknown/Deleted Account";
				$tempListApi['data'][$tempListApi['count']]['nama'] = $nama;
				$tempListApi['data'][$tempListApi['count']]['dateregister'] = $this->air_api_actor->getDateRegistered();
				$sourceStatue = '<button type="button" class="btn btn-danger" onclick="deleteThisDomainActor('."'".$this->air_api_registered->getDomain()."'".",'".$this->air_api_actor->getNip()."','".$this->air_api_actor->getLevel()."'".')" data-placement="bottom" data-original-title="remove this api actor">Remove</button>';
				$tempListApi['data'][$tempListApi['count']]['statue'] = $sourceStatue;
			}
		}
		if($tempListApi['count'] == 0){
			$tempListApi['count'] = 1;
			$tempListApi['data'][$tempListApi['count']]['level'] = "-";
			$tempListApi['data'][$tempListApi['count']]['nama'] = "-";
			$tempListApi['data'][$tempListApi['count']]['dateregister'] = "-";
			$tempListApi['data'][$tempListApi['count']]['statue'] = "-";
		}
		echo "1".json_encode($tempListApi);
	}
	public function showListApi(){
		/*
		if($this->isNullPost('IDF') != 'ghostShowApi'){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		*/
		//$_POST['name'] ="si";
		if($this->input->post('name') == null){
			$tempQueryName = "*";
		}else{
			if(!$this->controlapi->getCheckDomainQuery($this->input->post('name'),1)[0]){
				$tempQueryName = "*";
			}else{
				$tempQueryName = $this->input->post('name');
			}
		}
		//echo $tempQueryName;
		$this->load->library('datejaservfilter');
		$this->air_api_registered->resetValue();
		$tempListApi['count'] = 0;
		if($this->air_api_registered->getRule2()){
			while($this->air_api_registered->getNextCursor()){
				if($tempQueryName == "*"){
					$tempListApi['count']+=1;
					$tempListApi['data'][$tempListApi['count']]['domain'] = $this->air_api_registered->getDomain();
					$tempListApi['data'][$tempListApi['count']]['email'] = $this->air_api_registered->getEmail();
					$tempListApi['data'][$tempListApi['count']]['dateregister'] = $this->air_api_registered->getDateRegistered();
					$sourceStatue = '<button type="button" class="btn btn-success" onclick="mailThisDomain('."'".$this->air_api_registered->getDomain()."'".')" data-placement="bottom" data-original-title="send mail this">send key</button>&nbsp;';
					$sourceStatue .= '<button type="button" class="btn btn-danger" onclick="showActorOfThis('."'".$this->air_api_registered->getDomain()."'".')" data-placement="bottom" data-original-title="see this list actor">Actor</button>&nbsp;';
					$sourceStatue .= '<button type="button" class="btn btn-danger" onclick="deleteThisDomain('."'".$this->air_api_registered->getDomain()."'".')" data-placement="bottom" data-original-title="remove this api">Remove</button>';
					$tempListApi['data'][$tempListApi['count']]['statue'] = $sourceStatue;
				}else{
					if(!is_bool(strpos(strtolower($this->air_api_registered->getDomain()),strtolower($tempQueryName)))){
						$tempListApi['count']+=1;
						$tempListApi['data'][$tempListApi['count']]['domain'] = $this->air_api_registered->getDomain();
						$tempListApi['data'][$tempListApi['count']]['email'] = $this->air_api_registered->getEmail();
						$tempListApi['data'][$tempListApi['count']]['dateregister'] = $this->air_api_registered->getDateRegistered();
						$sourceStatue = '<button type="button" class="btn btn-success" onclick="mailThisDomain('."'".$this->air_api_registered->getDomain()."'".')" data-placement="bottom" data-original-title="send mail this">send key</button>&nbsp;';
						$sourceStatue .= '<button type="button" class="btn btn-danger" onclick="showActorOfThis('."'".$this->air_api_registered->getDomain()."'".')" data-placement="bottom" data-original-title="see this list actor">Actor</button>&nbsp;';
						$sourceStatue .= '<button type="button" class="btn btn-danger" onclick="deleteThisDomain('."'".$this->air_api_registered->getDomain()."'".')" data-placement="bottom" data-original-title="remove this api">Remove</button>';
						$tempListApi['data'][$tempListApi['count']]['statue'] = $sourceStatue;
					}
				}
			}
		}
		if($tempListApi['count'] == 0){
			$tempListApi['count'] = 1;
			$tempListApi['data'][$tempListApi['count']]['domain'] = "-";
			$tempListApi['data'][$tempListApi['count']]['email'] = "-";
			$tempListApi['data'][$tempListApi['count']]['dateregister'] = "-";
			$tempListApi['data'][$tempListApi['count']]['statue'] = "-";
		}
		echo "1".json_encode($tempListApi);
	}
	public function addNewApi(){
		if($this->isNullPost('IDF') != 'ghostAddApi'){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		$tempDomain = $this->isNullPost("domain");
		if(!$this->controlapi->getCheckDomain($tempDomain,1)[0])
			exit("0Api Domain doesnt approve");
		$tempEmail = $this->isNullPost("email");
		if(!$this->controlapi->getCheckEmail($tempEmail,1)[0])
			exit("0Api Email doesnt approve");
		$tempMahasiswaId = intval($this->isNullPost("mahasiswaid"));
		if(!$this->controlapi->getCheckMahasiswaId($tempMahasiswaId,1)[0])
			exit("0Api Mahasiswa id doesnt approve");
		$tempEmployeeId = intval($this->isNullPost("employeeid"));
		if(!$this->controlapi->getCheckEmployeeId($tempEmployeeId,1)[0])
			exit("0Api Employee id doesnt approve");
		$this->controlapi->setNewApi(array(
			"domain" => $tempDomain,
			"email" => $tempEmail,
			"mahasiswaid" => $tempMahasiswaId,
			"employeeid" => $tempEmployeeId
		));
	}

	public function addNewApiActor(){
		if($this->isNullPost('IDF') != 'ghostAddApiActor'){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		$tempDomain = $this->isNullPost("domain");
		if(!$this->controlapi->getCheckDomain($tempDomain,1)[0])
			exit("0Api Domain doesnt approve");
		$templevel = intval($this->isNullPost("level"));
	
		if(!$this->controlapi->getCheckActorLevel($templevel,1)[0])
			exit("0Api level doesnt approve");
		$tempEmployee = $this->isNullPost("nip");
		$this->load->library("employee");
	//	$this->load->library("student");
		if(!$this->employee->getCheckEmployeeNip($tempEmployee,1)[0])
	//		if(!$this->student->getCheckStudentNim($tempEmployee,1)[0])
				exit("0Api actor Employee doesnt approve");
		$this->load->model('air_tab_mem');
		$this->air_tab_mem->resetValue();
		$this->air_tab_mem->setEmployeeNip($tempEmployee);
		$this->air_tab_mem->setEmployeeStatue("1");
		if(!$this->air_tab_mem->getRule2()) exit("0Api actor Employee not active or registered");
		$this->air_api_actor->resetValue();
		$this->air_api_actor->setDomain($tempDomain."");
		$this->air_api_actor->setNip($tempEmployee."");
		$this->air_api_actor->setLevel($templevel."");
		if($this->air_api_actor->getRule3()) exit('0Employee has been registered with this level');
		//exit("0succes");
		$this->air_api_actor->resetValue();
		$this->air_api_actor->setDomain($tempDomain."");
		$this->air_api_actor->setNip($tempEmployee."");
		$this->air_api_actor->setLevel($templevel."");
		$this->air_api_actor->setDateRegistered(date("Y-m-d H:i:s"));
		if($this->air_api_actor->addNewRow()) exit("1Successfull add new api actor");
		exit("0Falied add new api actor");
	}
	public function removeApi(){
		if($this->isNullPost('IDF') != 'ghostRemoveApi'){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		$tempDomain = $this->isNullPost("domain");
		if(!$this->controlapi->getCheckDomain($tempDomain,1)[0])
			exit("0Api Domain doesnt approve");
		$this->air_api_registered->resetValue();
		$this->air_api_registered->setDomain($tempDomain);
		if(!$this->air_api_registered->getRule1()) exit("0domain tidak terdaftar");
		$this->air_api_registered->resetValue();
		$this->air_api_registered->setDomain($tempDomain);
		if(!$this->air_api_registered->deleteRule1()) exit("0domain gagal dihapus");
		$this->air_api_actor->resetValue();
		$this->air_api_actor->setDomain($tempDomain);
		if(!$this->air_api_actor->deleteRule1()) exit("0domain gagal dihapus");
		exit("1Berhasil menghapus api");
	}
	public function removeApiActor(){
		if($this->isNullPost('IDF') != 'ghostRemoveApiActor'){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		$tempDomain = $this->isNullPost("domain");
		if(!$this->controlapi->getCheckDomain($tempDomain,1)[0])
			exit("0Api Domain doesnt approve");
		$templevel = intval($this->isNullPost("level"));
		if(!$this->controlapi->getCheckActorLevel($templevel,1)[0])
			exit("0Api level doesnt approve");
		$tempEmployee = $this->isNullPost("nip");
		$this->load->library("employee");
		if(!$this->employee->getCheckEmployeeNip($tempEmployee,1)[0])
			exit("0Api actor Employee doesnt approve");
		$this->air_api_actor->resetValue();
		$this->air_api_actor->setDomain($tempDomain."");
		$this->air_api_actor->setNip($tempEmployee."");
		$this->air_api_actor->setLevel($templevel."");
		if(!$this->air_api_actor->getRule3()) exit('0Employee not registered with this level');
		//exit("0succes");
		$this->air_api_actor->resetValue();
		$this->air_api_actor->setDomain($tempDomain."");
		$this->air_api_actor->setNip($tempEmployee."");
		$this->air_api_actor->setLevel($templevel."");
		if($this->air_api_actor->deleteRule2()) exit("1Successfull delete api actor");
		exit("0Falied delete api actor");
	}
	public function mailThisApi(){
		//$_POST['IDF'] = "ghostMailThisApi";
		//$_POST['domain'] = "http://siata.if.undip.ac.id";
		if($this->isNullPost('IDF') != 'ghostMailThisApi'){
			exit("3Re-loggin<script>window.location = '".base_url()."'</script>");
		}
		$tempDomain = $this->isNullPost("domain");
		if(!$this->controlapi->getCheckDomain($tempDomain,1)[0])
			exit("0Api Domain doesnt approve");
		$this->air_api_registered->resetValue();
		$this->air_api_registered->setDomain($tempDomain);
		if(!$this->air_api_registered->getRule1()) exit("0domain not registered");
		$kode = $this->controlapi->encryptKode($tempDomain);
		if(is_bool($kode)) exit("0api trouble, please create new one");
		$tempHtml = file_get_contents(APPPATH."views/email_template.html");
		$tempArray = array(
			'host' => $tempDomain,
			'key' => $kode
		);
        foreach($tempArray as $key=>$value){
            $tempHtml = str_ireplace("@".$key.";",$value,$tempHtml);
        }
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = "siataifundip.core@gmail.com";
		$config['smtp_pass'] = "greatHONORtoSIATA";
		$config['mailtype']  = 'html';
		$config['charset']='utf-8';
		$config['newline'] = "\r\n";
		$this->load->library('email', $config);
		$this->email->from('siataifundip.core@gmail.com', 'Developer Web');
		$this->email->to($this->air_api_registered->getEmail());
		$this->email->reply_to("siataifundip.core@gmail.com");
		$this->email->subject('Permintaan pengesetan ulang kata kunci');
		$this->email->message($tempHtml);
		if(!$this->email->send()) exit('0key api gagal dikirimkan');
		exit("1Berhasil mengirimkan link ke email yang didaftarkan api ini"); 
		
	}
}