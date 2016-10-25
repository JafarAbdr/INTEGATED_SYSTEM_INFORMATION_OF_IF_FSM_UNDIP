<?php
if(!defined('BASEPATH')) exit("you don't have access to this part");
require_once 'CI_Model_modified.php';
class Air_ghost_account extends CI_Model_modified {
	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->tableName = 'air_ghost_account';
		$this->resetValue();
		$this->tempResultArray = null;
	}
	public function resetValue(){
		$this->userName = null;
		$this->userPassword = null;
		$this->userLevel = null;
		$this->userControlRegistrasiStudent = null;
		$this->userControlRegistrasiEmployee = null;
	}
	//setter
	public function setUserName($temp){$this->userName = $temp;}
	public function setUserPassword($temp){$this->userPassword = $temp;}
	public function setUserLevel($temp){$this->userLevel = $temp;}
	public function setUserControlRegistrasiEmployee($temp){$this->userControlRegistrasiEmployee = $temp;}
	public function setUserControlRegistrasiStudent($temp){$this->userControlRegistrasiStudent = $temp;}
	//getter
	public function getUserName(){$temp = $this->userName; return $temp;}
	public function getUserPassword(){$temp = $this->userPassword; return $temp;}
	public function getUserLevel(){$temp = $this->userLevel; return $temp;}
	public function getUserControlRegistrasiEmployee(){$temp = $this->userControlRegistrasiEmployee; return $temp;}
	public function getUserControlRegistrasiStudent(){$temp = $this->userControlRegistrasiStudent; return $temp;}
	//control - default
	//-auto set content
	protected function automaSetContent($tempArray){
		$this->resetValue();
		if(count($tempArray) < 1){ return $this->getFailedResult();}
		foreach($tempArray as $tempIndexArray => $tempValue){
			switch($tempIndexArray){
				case 'ga_username' : $this->setUserName($tempArray['ga_username']);break;
				case 'ga_password' : $this->setUserPassword($tempArray['ga_password']);break;
				case 'ga_level' : $this->setUserLevel($tempArray['ga_level']);break;
				case 'ga_open_reg_mem' : $this->setUserControlRegistrasiEmployee($tempArray['ga_open_reg_mem']);break;
				case 'ga_open_reg_stu' : $this->setUserControlRegistrasiStudent($tempArray['ga_open_reg_stu']);break;
			}
		}
		return $this->getSuccessResult();
	}
	//-get format query builder 
	protected function getQueryBuilder(){
		$tempQuery = "";
		if($this->getUserName() != null) $tempQuery.="ga_username='".$this->getUserName()."',";
		if($this->getUserPassword() != null) $tempQuery.="ga_password='".$this->getUserPassword()."',";
		if($this->getUserLevel() != null) $tempQuery.="ga_level='".$this->getUserLevel()."',";
		if($this->getUserControlRegistrasiEmployee() != null) $tempQuery.="ga_open_reg_mem='".$this->getUserControlRegistrasiEmployee()."',";
		if($this->getUserControlRegistrasiStudent() != null) $tempQuery.="ga_open_reg_stu='".$this->getUserControlRegistrasiStudent()."',";
		if($tempQuery != "")
			return substr($tempQuery,0,strlen($tempQuery)-1);
		else
			return null;
	}
	//-get format array builder
	protected function getArrayBuilder(){
		$tempQuery = null;
		if($this->getUserName() != null) $tempQuery["ga_username"] = $this->getUserName();
		if($this->getUserPassword() != null) $tempQuery["ga_password"] = $this->getUserPassword();
		if($this->getUserLevel() != null) $tempQuery['ga_level'] = $this->getUserLevel();
		if($this->getUserControlRegistrasiEmployee() != null) $tempQuery['ga_open_reg_mem'] = $this->getUserControlRegistrasiEmployee();
		if($this->getUserControlRegistrasiStudent() != null) $tempQuery['ga_open_reg_stu'] = $this->getUserControlRegistrasiStudent();
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
	//control - create function
	public function getRule1($caseData = 0, $result = false){
		if($this->getUserName() == null) return $this->getFailedResult();
		if($this->getUserPassword() == null) return $this->getFailedResult();
		return $this->getFinalResultOperation($caseData,"ga_username='".$this->getUserName()."' AND ga_password='".$this->getUserPassword()."'",$result);
	}
}