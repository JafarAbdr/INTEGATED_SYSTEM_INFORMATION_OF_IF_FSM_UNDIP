<?php
if(!defined('BASEPATH')) exit("you don't have access to this part");
require_once 'CI_Model_modified.php';
class Air_list_dose extends CI_Model_modified {
	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->tableName = 'air_list_dose';
		$this->resetValue();
		$this->tempResultArray = null;
	}
	public function resetValue(){
		$this->dosenNip = null;
		$this->dosenNIDN = null;
		$this->dosenRiset = null;
		$this->dosenInternalOrExternal = null;
	}
	//setter
	public function setDosenNip($temp){$this->dosenNip = $temp;}
	public function setDosenNIDN($temp){$this->dosenNIDN = $temp;}
	public function setDosenRiset($temp){$this->dosenRiset = $temp;}
	public function setDosenInternalOrExternal($temp){$this->dosenInternalOrExternal = $temp;}
	//getter
	public function getDosenNip(){$temp = $this->dosenNip; return $temp;}
	public function getDosenNIDN(){$temp = $this->dosenNIDN; return $temp;}
	public function getDosenRiset(){$temp = $this->dosenRiset; return $temp;}
	public function getDosenInternalOrExternal(){$temp = $this->dosenInternalOrExternal; return $temp;}
	//control - default
	protected function isPrimaryNotNull(){
		if($this->getDosenNip() == null){
			return $this->getFailedResult();
		}
		return $this->getSuccessResult();
	}
	//-auto set content
	protected function automaSetContent($tempArray){
		$this->resetValue();
		if(count($tempArray) < 1){ return $this->getFailedResult();}
		foreach($tempArray as $tempIndexArray => $tempValue){
			switch($tempIndexArray){
				case 'ld_nip' : $this->setDosenNip($tempArray['ld_nip']);break;
				case 'ld_nidn' : $this->setDosenNIDN($tempArray['ld_nidn']);break;
				case 'ld_intern' : $this->setDosenInternalOrExternal($tempArray['ld_intern']);break;
				case 'ld_riset_skill' : $this->setDosenRiset($tempArray['ld_riset_skill']);break;
			}
		}
		return $this->getSuccessResult();
	}
	//-get format query builder 
	protected function getQueryBuilder(){
		$tempQuery = "";
		if($this->getDosenNip() != null) $tempQuery.="ld_nip='".$this->getDosenNip()."',";
		if($this->getDosenNIDN() != null) $tempQuery.="ld_nidn='".$this->getDosenNIDN()."',";
		if($this->getDosenRiset() != null) $tempQuery.="ld_riset_skill='".$this->getDosenRiset()."',";
		if($this->getDosenInternalOrExternal() != null) $tempQuery.="ld_intern='".$this->getDosenInternalOrExternal()."',";
		if($tempQuery != "")
			return substr($tempQuery,0,strlen($tempQuery)-1);
		else
			return null;
	}
	//-get format array builder
	protected function getArrayBuilder(){
		$tempQuery = null;
		if($this->getDosenNip() != null) $tempQuery["ld_nip"] = $this->getDosenNip();
		if($this->getDosenInternalOrExternal() != null) $tempQuery["ld_intern"] = $this->getDosenInternalOrExternal();
		if($this->getDosenRiset() != null) $tempQuery["ld_riset_skill"] = $this->getDosenRiset();
		if($this->getDosenNIDN() != null) $tempQuery["ld_nidn"] = $this->getDosenNIDN();
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
	public function getRule1($caseData = 0, $result = false){
		if(!is_bool($result)){ return $this->getFailedResult(); }
		if($this->getDosenNip() == null){return $this->getFailedResult();}
		return $this->getFinalResultOperation($caseData,"ld_nip='".$this->getDosenNip()."'",$result);
	}
	//control - create function
	public function deleteRule1(){
		if($this->getDosenNip() == null){return $this->getFailedResult();}
		return $this->setDelete("ld_nip='".$this->getDosenNip()."'");
	}
	
}