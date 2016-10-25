<?php
if(!defined('BASEPATH')) exit("you don't have access to this part");
require_once 'CI_Model_modified.php';
class Air_tab_stu extends CI_Model_modified {
	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->tableName = 'air_tab_stu';
		$this->resetValue();
		$this->tempResultArray = null;
	}
	public function resetValue(){
		$this->studentNim = null;
		$this->studentPassword = null;
		$this->studentEmail = null;
		$this->studentGraduate = null;
		$this->studentInterestResearch = null;
		$this->studentPhone = null;
		$this->studentParentPhone = null;
		$this->studentAddress = null;
		$this->studentStatue = null;
		$this->studentName = null;
		$this->studentParentName = null;
		$this->studentPhoto = null;
	}
	//setter
	public function setStudentNim($temp){$this->studentNim = $temp;}
	public function setStudentPassword($temp){$this->studentPassword = $temp;}
	public function setStudentEmail($temp){$this->studentEmail = $temp;}
	public function setStudentGraduate($temp){$this->studentGraduate = $temp;}
	public function setStudentInterestResearch($temp){$this->studentInterestResearch = $temp;}
	public function setStudentPhone($temp){$this->studentPhone = $temp;}
	public function setStudentParentPhone($temp){$this->studentParentPhone = $temp;}
	public function setStudentAddress($temp){$this->studentAddress = $temp;}
	public function setStudentStatue($temp){$this->studentStatue = $temp;}
	public function setStudentName($temp){$this->studentName = $temp;}
	public function setStudentParentName($temp){$this->studentParentName = $temp;}
	public function setStudentPhoto($temp){$this->studentPhoto = $temp;}
	//getter
	public function getStudentNim(){$temp = $this->studentNim; return $temp;}
	public function getStudentPassword(){$temp = $this->studentPassword; return $temp;}
	public function getStudentEmail(){$temp = $this->studentEmail; return $temp;}
	public function getStudentGraduate(){$temp = $this->studentGraduate; return $temp;}
	public function getStudentInterestResearch(){$temp = $this->studentInterestResearch; return $temp;}
	public function getStudentPhone(){$temp = $this->studentPhone; return $temp;}
	public function getStudentParentPhone(){$temp = $this->studentParentPhone; return $temp;}
	public function getStudentAddress(){$temp = $this->studentAddress; return $temp;}
	public function getStudentStatue(){$temp = $this->studentStatue; return $temp;}
	public function getStudentName(){$temp = $this->studentName; return $temp;}
	public function getStudentParentName(){$temp = $this->studentParentName; return $temp;}
	public function getStudentPhoto(){$temp = $this->studentPhoto; return $temp;}
	//control - default
	//-auto set content
	protected function automaSetContent($tempArray){
		$this->resetValue();
		if(count($tempArray) < 1){ return $this->getFailedResult();}
		foreach($tempArray as $tempIndexArray => $tempValue){
			switch($tempIndexArray){
				case 'ts_nim' : $this->setStudentNim($tempArray['ts_nim']);break;
				case 'ts_password' : $this->setStudentPassword($tempArray['ts_password']);break;
				case 'ts_email' : $this->setStudentEmail($tempArray['ts_email']);break;
				case 'ts_graduate' : $this->setStudentGraduate($tempArray['ts_graduate']);break;
				case 'ts_interest_research' : $this->setStudentInterestResearch($tempArray['ts_interest_research']);break;
				case 'ts_phone' : $this->setStudentPhone($tempArray['ts_phone']);break;
				case 'ts_parent_phone' : $this->setStudentParentPhone($tempArray['ts_parent_phone']);break;
				case 'ts_address' : $this->setStudentAddress($tempArray['ts_address']);break;
				case 'ts_statue' : $this->setStudentStatue($tempArray['ts_statue']);break;
				case 'ts_name' : $this->setStudentName($tempArray['ts_name']);break;
				case 'ts_parent_name' : $this->setStudentParentName($tempArray['ts_parent_name']);break;
				case 'ts_photo' : $this->setStudentPhoto($tempArray['ts_photo']);break;
			}
		}
		return $this->getSuccessResult();
	}
	//-get format query builder 
	protected function getQueryBuilder(){
		$tempQuery = "";
		if($this->getStudentNim() != null) $tempQuery.="ts_nim='".$this->getStudentNim()."',";
		if($this->getStudentPassword() != null) $tempQuery.="ts_password='".$this->getStudentPassword()."',";
		if($this->getStudentEmail() != null) $tempQuery.="ts_email='".$this->getStudentEmail()."',";
		if($this->getStudentGraduate() != null) $tempQuery.="ts_graduate='".$this->getStudentGraduate()."',";
		if($this->getStudentInterestResearch() != null) $tempQuery.="ts_interest_research='".$this->getStudentInterestResearch()."',";
		if($this->getStudentPhone() != null) $tempQuery.="ts_phone='".$this->getStudentPhone()."',";
		if($this->getStudentParentPhone() != null) $tempQuery.="ts_parent_phone='".$this->getStudentParentPhone()."',";
		if($this->getStudentAddress() != null) $tempQuery.="ts_address='".$this->getStudentAddress()."',";
		if($this->getStudentStatue() != null) $tempQuery.="ts_statue='".$this->getStudentStatue()."',";
		if($this->getStudentName() != null) $tempQuery.="ts_name='".$this->getStudentName()."',";
		if($this->getStudentParentName() != null) $tempQuery.="ts_parent_name='".$this->getStudentParentName()."',";
		if($this->getStudentPhoto() != null) $tempQuery.="ts_photo='".$this->getStudentPhoto()."',";
		if($tempQuery != "")
			return substr($tempQuery,0,strlen($tempQuery)-1);
		else
			return null;
	}
	//-get format array builder
	protected function getArrayBuilder(){
		$tempQuery = null;
		if($this->getStudentNim() != null) $tempQuery["ts_nim"] = $this->getStudentNim();
		if($this->getStudentPassword() != null) $tempQuery["ts_password"] = $this->getStudentPassword();
		if($this->getStudentEmail() != null) $tempQuery["ts_email"] = $this->getStudentEmail();
		if($this->getStudentGraduate() != null) $tempQuery["ts_graduate"] = $this->getStudentGraduate();
		if($this->getStudentInterestResearch() != null) $tempQuery["ts_interest_research"] = $this->getStudentInterestResearch();
		if($this->getStudentPhone() != null) $tempQuery["ts_phone"] = $this->getStudentPhone();
		if($this->getStudentParentPhone() != null) $tempQuery["ts_parent_phone"] = $this->getStudentParentPhone();
		if($this->getStudentAddress() != null) $tempQuery["ts_address"] = $this->getStudentAddress();
		if($this->getStudentStatue() != null) $tempQuery["ts_statue"] = $this->getStudentStatue();
		if($this->getStudentName() != null) $tempQuery["ts_name"] = $this->getStudentName();
		if($this->getStudentParentName() != null) $tempQuery["ts_parent_name"] = $this->getStudentParentName();
		if($this->getStudentPhoto() != null) $tempQuery["ts_photo"] = $this->getStudentPhoto();
		if(count($tempQuery) > 0)
			return $tempQuery;
		else
			return null;
	}
	//control - create function
	protected function getCaseData($kode){
		switch($kode){
			case 0 : return "*"; break;
			default : return "*"; break;
		}
	}
	public function getRule1($caseData = 0, $result = true){
		if(!is_bool($result)){ return $this->getFailedResult(); }
		return $this->getFinalResultOperation($caseData,"",$result);
	}
	
}