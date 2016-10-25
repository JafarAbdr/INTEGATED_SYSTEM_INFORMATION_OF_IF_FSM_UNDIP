<?php 
if(!defined("BASEPATH")) exit("");
require_once ("Aktor.php");
class Employee extends Aktor {
	function __construct(){
		parent::__construct();
		$this->setLibrary('session');
		$this->setLibrary('inputjaservfilter');
	}
	//checking component
	public function getCheckEmployeeName($value="",$cat=0){
		if(($value=="") || ($value == null)){
			return $this->setCategoryPrintMessage($cat, false, "nilai tidak boleh kosong");
		}
		if(!preg_match("/^[A-Z a-z.,]*$/",$value))
			return $this->setCategoryPrintMessage($cat,false,"username mengandung karakter yang tidak diizinkan");
		return $this->setCategoryPrintMessage($cat, true, "valid");
	}
	public function getCheckEmployeePassword($value="",$cat=0){
		if(($value=="") || ($value == null)){
			return $this->setCategoryPrintMessage($cat, false, "nilai tidak boleh kosong");
		}
		$temp = $this->inputjaservfilter->passwordFiltering($value);
		return $this->setCategoryPrintMessage($cat, $temp[0], $temp[1]);
	}
	public function getCheckEmployeeNip($nip="",$cat=0){
		if($nip == "")
			return $this->setCategoryPrintMessage($cat, false, "nip tidak boleh kosong");
		if(!$this->inputjaservfilter->numberFiltering($nip)[0])
			return $this->setCategoryPrintMessage($cat, false, "nip mengandng karakter lain");
		if((strlen($nip)>=17)&&(strlen($nip) <= 20)){
			$tempData= array (0,0,0,0,0,0,0,0,0,0);
			for($i = 0; $i< strlen($nip); $i++){
				$tempData[intval($nip[$i])]++;
			}
			$tempNumDiffer = 0;
			for($i = 0; $i <= 9; $i++){
				if($tempData[$i] > 0){
					$tempNumDiffer++;
				}
			}
			if($tempNumDiffer > 3)
				return $this->setCategoryPrintMessage($cat, true, "valid");
			else
				return $this->setCategoryPrintMessage($cat, false, "nip tidak valid");
		}else 
			return $this->setCategoryPrintMessage($cat, false, "nip tidak valid");
	} 
	/*
	if pegawai not registered will return false
	if registered will return kode number range 1 - 3
	where
	1 : dosen if
	2 : dosen non if
	3 : only pegawai
	active defaut is true, so all data if non active then will return false, if override to false ,
	will return kode number range 1 - 3 like the top of sentence
	wrong format nip will return false 
	*/
	public function isWhatPegawai($nip = null, $active = true,$cat=0){
		$tempResult = $this->getCheckEmployeeNip($nip,1);
		if(!$tempResult[0]){
			return $this->setCategoryPrintMessage($cat,false,$tempResult[1]);
		}
		$this->setModel('air_tab_mem');
		$this->setModel('air_list_dose');
		$this->air_tab_mem->resetValue();
		$this->air_tab_mem->setEmployeeNip($nip);
		if(!$this->air_tab_mem->getRule1()){
			return $this->setCategoryPrintMessage($cat,false,"Nip Not Registered");
		}
		if($this->air_tab_mem->getEmployeeStatus() == "2"){
			if($active){
				return $this->setCategoryPrintMessage($cat,false,"Nip Not active");
			}
		}
		$this->air_list_dose->resetValue();
		$this->air_list_dose->setDosenNip();
	}
	//encrypt
	private function encrypt($string=""){
		return sha1(md5($string."-jaservFilterEmployee"));
	}
	//logout function - valid 
	public function setStatusLogOutEmployee(){
		if(!$this->getStatusLoginEmployee())
			return false;
		$this->session->unset_userdata('Employee');
		$this->session->unset_userdata('Employee-KODE');
		$this->session->unset_userdata('Employee-Nip');
		$this->session->sess_destroy();
		return true;
	}
	//check is login koordinator function - valid 
	public function getStatusLoginEmployee(){
		$error = 0;
		if(!$this->session->has_userdata('Employee'))
			return false;
		if($this->session->userdata('Employee') != 'true')
			return false;
		if(!$this->session->has_userdata('Employee-KODE'))
			return false;
		if($this->session->userdata('Employee-KODE') != $this->encrypt('Employee'))
			return false;
		if(!$this->session->has_userdata('Employee-Nip'))
			return false;
		if(!$this->getCheckEmployeeNip($this->session->userdata('Employee-Nip'),1)[0])
			return false;
		return true;
	}
	public function setLoginEmployee($tempEmployeeNip,$tempEmployeePassword,$cat){
		if($this->getStatusLoginEmployee()){
			return $this->setCategoryPrintMessage($cat,true,"Employeearea.aspx");
		}
		if(!$this->getCheckEmployeeNip($tempEmployeeNip,1)[0]){ return $this->setCategoryPrintMessage($cat,false,"Sorry Your Nip doesn't exist"); }
		if(!$this->getCheckEmployeePassword($tempEmployeePassword,1)[0]){ return $this->setCategoryPrintMessage($cat,false,"Sorry Your Password doesn't exist"); }
		$this->setModel('air_tab_mem');
		$this->air_tab_mem->resetValue();
		$this->air_tab_mem->setEmployeeNip($tempEmployeeNip);
		$this->air_tab_mem->setEmployeePassword($tempEmployeePassword);

		if(!$this->air_tab_mem->getRule5()){ return $this->setCategoryPrintMessage($cat,false,"Sorry Your account, doesn't exist"); }
		if($this->air_tab_mem->getEmployeeNip() != $tempEmployeeNip){ return $this->setCategoryPrintMessage($cat,false,"Sorry Your Nip get wrong"); }
		if($this->air_tab_mem->getEmployeePassword() != $tempEmployeePassword){ return $this->setCategoryPrintMessage($cat,false,"Sorry Your Password get wrong"); }
		$this->session->set_userdata('Employee',"true");
		$this->session->set_userdata('Employee-KODE',$this->encrypt('Employee'));
		$this->session->set_userdata('Employee-Nip',$this->air_tab_mem->getEmployeeNip());
		return $this->setCategoryPrintMessage($cat,true,"Employeearea.aspx");
	}
	/*
	*/
}