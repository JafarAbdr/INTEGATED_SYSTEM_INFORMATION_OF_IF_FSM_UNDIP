<?php
if(!defined('BASEPATH')) exit("you don't have access to this part");
require_once APPPATH.'models/CI_Model_modified.php';
class Air_api_actor extends CI_Model_modified {
	public function __CONSTRUCT($kode = null){
		parent::__CONSTRUCT();
        $this->disableAllFunction = false;
        if($this->isNull($kode)) $this->disableAllFunction = true;
        if(md5(sha1($kode)) != md5(sha1("JASERV-CONTROL-API-GHOST"))) $this->disableAllFunction = true;
		$this->tableName = 'air_api_actor';
		$this->resetValue();
		$this->tempResultArray = null;
	}
	public function resetValue(){
		$this->domain = null;
		$this->level = null;
		$this->nip = null;
		$this->dateRegistered = null;
	}
	//setter
	public function setDomain($temp){$this->domain = $temp;}
	public function setLevel($temp){$this->level = $temp;}
	public function setNip($temp){$this->nip = $temp;}
	public function setDateRegistered($temp){$this->dateRegistered = $temp;}
	//getter
	public function getDomain(){$temp = $this->domain; return $temp;}
	public function getLevel(){$temp = $this->level; return $temp;}
	public function getNip(){$temp = $this->nip; return $temp;}
	public function getDateRegistered(){$temp = $this->dateRegistered; return $temp;}
	//control - default
	//-auto set content
	protected function isPrimaryNotNull(){
		if($this->getDomain() == null) return $this->getFailedResult();
		return $this->getSuccessResult();
	}
	protected function automaSetContent($tempArray){
		$this->resetValue();
		if(count($tempArray) < 1){ return $this->getFailedResult();}
		foreach($tempArray as $tempIndexArray => $tempValue){
			switch($tempIndexArray){
				case 'aa_domain' : $this->setDomain($tempArray['aa_domain']);break;
				case 'aa_level' : $this->setLevel($tempArray['aa_level']);break;
				case 'aa_nip' : $this->setNip($tempArray['aa_nip']);break;
				case 'aa_date_registered' : $this->setDateRegistered($tempArray['aa_date_registered']);break;
			}
		}
		return $this->getSuccessResult();
	}
	//-get format query builder 
	protected function getQueryBuilder(){
		$tempQuery = "";
		if($this->getDomain() != null) $tempQuery.="aa_domain='".$this->getDomain()."',";
		if($this->getLevel() != null) $tempQuery.="aa_level='".$this->getLevel()."',";
		if($this->getNip() != null) $tempQuery.="aa_nip='".$this->getNip()."',";
		if($this->getDateRegistered() != null) $tempQuery.="aa_date_registered='".$this->getDateRegistered()."',";
		if($tempQuery != "")
			return substr($tempQuery,0,strlen($tempQuery)-1);
		else
			return null;
	}
	//-get format array builder
	protected function getArrayBuilder(){
		$tempQuery = null;
		if($this->getDomain() != null) $tempQuery["aa_domain"] = $this->getDomain();
		if($this->getLevel() != null) $tempQuery["aa_level"] = $this->getLevel();
		if($this->getNip() != null) $tempQuery['aa_nip'] = $this->getNip();
		if($this->getDateRegistered() != null) $tempQuery['aa_date_registered'] = $this->getDateRegistered();
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
    //Override parent
    public function getFinalResultOperation($caseData,$where,$result){
        if($this->disableAllFunction) return false;
        return parent::getFinalResultOperation($caseData,$where,$result);
    }
	//control - create function
	public function getRule1($caseData = 0, $result = true){
		if($this->getDomain() == null) return $this->getFailedResult();
		return $this->getFinalResultOperation($caseData,"aa_domain='".$this->getDomain()."'",$result);
	}
	public function getRule2($caseData = 0, $result = true){
		return $this->getFinalResultOperation($caseData,"1=1 ORDER BY aa_nip, aa_level ",$result);
	}
	public function getRule3($caseData = 0, $result = false){
		if($this->getDomain() == null) return $this->getFailedResult();
		if($this->getNip() == null) return $this->getFailedResult();
		if($this->getLevel() == null) return $this->getFailedResult();
		return $this->getFinalResultOperation($caseData,"aa_domain='".$this->getDomain()."' AND aa_nip='".$this->getNip()."' AND aa_level='".$this->getLevel()."'",$result);
	}
	public function getRule4($caseData = 0, $result = true){
		if($this->getNip() == null) return $this->getFailedResult();
		return $this->getFinalResultOperation($caseData,"aa_nip='".$this->getNip()."'",$result);
	}
	public function deleteRule1(){
		if($this->getDomain() == null) return $this->getFailedResult();
		return $this->setDelete("aa_domain='".$this->getDomain()."'");
	}
	public function deleteRule2(){
		if($this->getDomain() == null) return $this->getFailedResult();
		if($this->getNip() == null) return $this->getFailedResult();
		if($this->getLevel() == null) return $this->getFailedResult();
		return $this->setDelete("aa_domain='".$this->getDomain()."' AND aa_nip='".$this->getNip()."' AND aa_level='".$this->getLevel()."'");
	}
	public function deleteRule3(){
		if($this->getNip() == null) return $this->getFailedResult();
		return $this->setDelete("aa_nip='".$this->getNip()."'");
	}
}