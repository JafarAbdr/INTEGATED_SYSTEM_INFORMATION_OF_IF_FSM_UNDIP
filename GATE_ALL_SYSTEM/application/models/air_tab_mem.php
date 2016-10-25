<?php
if(!defined('BASEPATH')) exit("you don't have access to this part");
require_once 'CI_Model_modified.php';
class Air_tab_mem extends CI_Model_modified {
	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->tableName = 'air_tab_mem';
		$this->resetValue();
		$this->tempResultArray = null;
	}
	public function resetValue(){
		$this->employeeNip = null;
		$this->employeePassword = null;
		$this->employeeEmail = null;
		$this->employeePhone = null;
		$this->employeeAddress = null;
		$this->employeeStatue = null;
		$this->employeeName = null;
		$this->employeePhoto = null;
		$this->employeeGender = null;
		$this->employeePosition = null;
		$this->employeeDateRegister = null;
	}
	//setter
	public function setEmployeeNip($temp){$this->employeeNip = $temp;}
	public function setEmployeePassword($temp){$this->employeePassword = $temp;}
	public function setEmployeeEmail($temp){$this->employeeEmail = $temp;}
	public function setEmployeePhone($temp){$this->employeePhone = $temp;}
	public function setEmployeeAddress($temp){$this->employeeAddress = $temp;}
	public function setEmployeeStatue($temp){$this->employeeStatue = $temp;}
	public function setEmployeeName($temp){$this->employeeName = $temp;}
	public function setEmployeePhoto($temp){$this->employeePhoto = $temp;}
	public function setEmployeeGender($temp){$this->employeeGender = $temp;}
	public function setEmployeePosition($temp){$this->employeePosition = $temp;}
	public function setEmployeeDateRegister($temp){$this->employeeDateRegister = $temp;}
	//getter
	public function getEmployeeNip(){$temp = $this->employeeNip; return $temp;}
	public function getEmployeePassword(){$temp = $this->employeePassword; return $temp;}
	public function getEmployeeEmail(){$temp = $this->employeeEmail; return $temp;}
	public function getEmployeePhone(){$temp = $this->employeePhone; return $temp;}
	public function getEmployeeAddress(){$temp = $this->employeeAddress; return $temp;}
	public function getEmployeeStatue(){$temp = $this->employeeStatue; return $temp;}
	public function getEmployeeName(){$temp = $this->employeeName; return $temp;}
	public function getEmployeePhoto(){$temp = $this->employeePhoto; return $temp;}
	public function getEmployeeGender(){$temp = $this->employeeGender; return $temp;}
	public function getEmployeePosition(){$temp = $this->employeePosition; return $temp;}
	public function getEmployeeDateRegister(){$temp = $this->employeeDateRegister; return $temp;}
	//control - default
	//-auto set content
	protected function isPrimaryNotNull(){
		if($this->getEmployeeNip() == null){
			return $this->getFailedResult();
		}
		if($this->getEmployeeName() == null){
			return $this->getFailedResult();
		}
		return $this->getSuccessResult();
	}
	protected function automaSetContent($tempArray){
		$this->resetValue();
		if(count($tempArray) < 1){ return $this->getFailedResult();}
		foreach($tempArray as $tempIndexArray => $tempValue){
			switch($tempIndexArray){
				case 'tm_nip' : $this->setEmployeeNip($tempArray['tm_nip']);break;
				case 'tm_password' : $this->setEmployeePassword($tempArray['tm_password']);break;
				case 'tm_email' : $this->setEmployeeEmail($tempArray['tm_email']);break;
				case 'tm_phone' : $this->setEmployeePhone($tempArray['tm_phone']);break;
				case 'tm_address' : $this->setEmployeeAddress($tempArray['tm_address']);break;
				case 'tm_statue' : $this->setEmployeeStatue($tempArray['tm_statue']);break;
				case 'tm_name' : $this->setEmployeeName($tempArray['tm_name']);break;
				case 'tm_photo' : $this->setEmployeePhoto($tempArray['tm_photo']);break;
				case 'tm_gender' : $this->setEmployeeGender($tempArray['tm_gender']);break;
				case 'tm_position' : $this->setEmployeePosition($tempArray['tm_position']);break;
				case 'tm_date_register' : $this->setEmployeeDateRegister($tempArray['tm_date_register']);break;
			}
		}
		return $this->getSuccessResult();
	}
	protected function automaGetWhereBuilder($string){
		//$this->resetValue();
		if(count($tempArray) < 1){ return $string;}
		$string = str_ireplace('<%nip%>',"tm_nip",$string);
		$string = str_ireplace('<%password%>',"tm_password",$string);
		$string = str_ireplace('<%email%>',"tm_email",$string);
		$string = str_ireplace('<%phone%>',"tm_phone",$string);
		$string = str_ireplace('<%address%>',"tm_address",$string);
		$string = str_ireplace('<%statue%>',"tm_statue",$string);
		$string = str_ireplace('<%name%>',"tm_name",$string);
		$string = str_ireplace('<%photo%>',"tm_photo",$string);
		$string = str_ireplace('<%gender%>',"tm_gender",$string);
		$string = str_ireplace('<%position%>',"tm_position",$string);
		$string = str_ireplace('<%datein%>',"tm_date_register",$string);
		return $string;
	}
	//-get format query builder 
	protected function getQueryBuilder(){
		$tempQuery = "";
		if($this->getEmployeeNip() != null) $tempQuery.="tm_nip='".$this->getEmployeeNip()."',";
		if($this->getEmployeePassword() != null) $tempQuery.="tm_password='".$this->getEmployeePassword()."',";
		if($this->getEmployeeEmail() != null) $tempQuery.="tm_email='".$this->getEmployeeEmail()."',";
		if($this->getEmployeePhone() != null) $tempQuery.="tm_phone='".$this->getEmployeePhone()."',";
		if($this->getEmployeeAddress() != null) $tempQuery.="tm_address='".$this->getEmployeeAddress()."',";
		if($this->getEmployeeStatue() != null) $tempQuery.="tm_statue='".$this->getEmployeeStatue()."',";
		if($this->getEmployeeName() != null) $tempQuery.="tm_name='".$this->getEmployeeName()."',";
		if($this->getEmployeePhoto() != null) $tempQuery.="tm_photo='".$this->getEmployeePhoto()."',";
		if($this->getEmployeeGender() != null) $tempQuery.="tm_gender='".$this->getEmployeeGender()."',";
		if($this->getEmployeePosition() != null) $tempQuery.="tm_position='".$this->getEmployeePosition()."',";
		if($this->getEmployeeDateRegister() != null) $tempQuery.="tm_date_register='".$this->getEmployeeDateRegister()."',";
		if($tempQuery != "")
			return substr($tempQuery,0,strlen($tempQuery)-1);
		else
			return null;
	}
	//-get format array builder
	protected function getArrayBuilder(){
		$tempQuery = null;
		if($this->getEmployeeNip() != null) $tempQuery["tm_nip"] = $this->getEmployeeNip();
		if($this->getEmployeePassword() != null) $tempQuery["tm_password"] = $this->getEmployeePassword();
		if($this->getEmployeeEmail() != null) $tempQuery["tm_email"] = $this->getEmployeeEmail();
		if($this->getEmployeePhone() != null) $tempQuery["tm_phone"] = $this->getEmployeePhone();
		if($this->getEmployeeAddress() != null) $tempQuery["tm_address"] = $this->getEmployeeAddress();
		if($this->getEmployeeStatue() != null) $tempQuery["tm_statue"] = $this->getEmployeeStatue();
		if($this->getEmployeeName() != null) $tempQuery["tm_name"] = $this->getEmployeeName();
		if($this->getEmployeePhoto() != null) $tempQuery["tm_photo"] = $this->getEmployeePhoto();
		if($this->getEmployeeGender() != null) $tempQuery["tm_gender"] = $this->getEmployeeGender();
		if($this->getEmployeePosition() != null) $tempQuery["tm_position"] = $this->getEmployeePosition();
		if($this->getEmployeeDateRegister() != null) $tempQuery["tm_date_register"] = $this->getEmployeeDateRegister();
		if(count($tempQuery) > 0)
			return $tempQuery;
		else
			return null;
	}
	//control - create function
	protected function getCaseData($kode){
		switch($kode){
			case 0 : return "*";
			default : return "*";
		}
	}
	//update
	public function updateRule1(){
		if($this->getEmployeeNip() == null) return $this->getFailedResult();
		return $this->setUpdate($this->getQueryBuilder(),"tm_nip='".$this->getEmployeeNip()."'");
	}
	//get
	public function getRule1($caseData = 0, $result = false){
		if(!is_bool($result)){ return $this->getFailedResult(); }
		if($this->getEmployeeNip() == null){return $this->getFailedResult();}
		return $this->getFinalResultOperation($caseData,"tm_nip='".$this->getEmployeeNip()."'",$result);
	}
	public function getRule2($caseData = 0, $result = true){
		if(!is_bool($result)){ return $this->getFailedResult(); }
		if($this->getEmployeeNip() == null){return $this->getFailedResult();}
		if($this->getEmployeeStatue() == null){return $this->getFailedResult();}
		return $this->getFinalResultOperation($caseData,"tm_nip='".$this->getEmployeeNip()."' AND tm_statue='".$this->getEmployeeStatue()."'",$result);
	}
	public function getRule3($caseData = 0, $result = true){
		if(!is_bool($result)){ return $this->getFailedResult(); }
		if($this->getEmployeeName() == null){return $this->getFailedResult();}
		if($this->getEmployeeName() == "*")
			return $this->getFinalResultOperation($caseData,"",$result);
		else
			return $this->getFinalResultOperation($caseData,"tm_name like '%".$this->getEmployeeName()."%'",$result);
	}
	public function getRule4($caseData = 0, $result = true){
		if(!is_bool($result)){ return $this->getFailedResult(); }
		if($this->getEmployeeName() == null){return $this->getFailedResult();}
		if($this->getEmployeeStatue() == null){return $this->getFailedResult();}
		if($this->getEmployeeName() == "*")
			return $this->getFinalResultOperation($caseData,"tm_statue='".$this->getEmployeeStatue()."'",$result);
		else
			return $this->getFinalResultOperation($caseData,"tm_name like '%".$this->getEmployeeName()."%' AND tm_statue='".$this->getEmployeeStatue()."'",$result);
	}
	public function getRule5($caseData = 0, $result = false){
		if(!is_bool($result)){ return $this->getFailedResult(); }
		if($this->getEmployeeNip() == null){return $this->getFailedResult();}
		if($this->getEmployeePassword() == null){return $this->getFailedResult();}
		return $this->getFinalResultOperation($caseData,"tm_nip='".$this->getEmployeeNip()."' AND tm_password='".$this->getEmployeePassword()."'",$result);
	}
	//delete
	public function deleteRule1(){
		if($this->getEmployeeNip() == null){return $this->getFailedResult();}
		return $this->setDelete("tm_nip='".$this->getEmployeeNip()."'");
	}
}