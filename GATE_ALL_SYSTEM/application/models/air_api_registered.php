<?php
if(!defined('BASEPATH')) exit("you don't have access to this part");
require_once APPPATH.'models/CI_Model_modified.php';
class Air_api_registered extends CI_Model_modified {
	public function __CONSTRUCT($kode = null){
		parent::__CONSTRUCT();
        $this->disableAllFunction = false;
        if($this->isNull($kode)) $this->disableAllFunction = true;
        if(md5(sha1($kode)) != md5(sha1("JASERV-CONTROL-API-GHOST"))) $this->disableAllFunction = true;
		$this->tableName = 'air_api_registered';
		$this->resetValue();
		$this->tempResultArray = null;
	}
	public function resetValue(){
		$this->domain = null;
		$this->email = null;
		$this->kode = null;
		$this->dateRegistered = null;
	}
	//setter
	public function setDomain($temp){$this->domain = $temp;}
	public function setEmail($temp){$this->email = $temp;}
	public function setKode($temp){$this->kode = $temp;}
	public function setDateRegistered($temp){$this->dateRegistered = $temp;}
	//getter
	public function getDomain(){$temp = $this->domain; return $temp;}
	public function getEmail(){$temp = $this->email; return $temp;}
	public function getKode(){$temp = $this->kode; return $temp;}
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
				case 'ar_domain' : $this->setDomain($tempArray['ar_domain']);break;
				case 'ar_email' : $this->setEmail($tempArray['ar_email']);break;
				case 'ar_kode' : $this->setKode($tempArray['ar_kode']);break;
				case 'ar_date_registered' : $this->setDateRegistered($tempArray['ar_date_registered']);break;
			}
		}
		return $this->getSuccessResult();
	}
	//-get format query builder 
	protected function getQueryBuilder(){
		$tempQuery = "";
		if($this->getDomain() != null) $tempQuery.="ar_domain='".$this->getDomain()."',";
		if($this->getEmail() != null) $tempQuery.="ar_email='".$this->getEmail()."',";
		if($this->getKode() != null) $tempQuery.="ar_kode='".$this->getKode()."',";
		if($this->getDateRegistered() != null) $tempQuery.="ar_date_registered='".$this->getDateRegistered()."',";
		if($tempQuery != "")
			return substr($tempQuery,0,strlen($tempQuery)-1);
		else
			return null;
	}
	//-get format array builder
	protected function getArrayBuilder(){
		$tempQuery = null;
		if($this->getDomain() != null) $tempQuery["ar_domain"] = $this->getDomain();
		if($this->getEmail() != null) $tempQuery["ar_email"] = $this->getEmail();
		if($this->getKode() != null) $tempQuery['ar_kode'] = $this->getKode();
		if($this->getDateRegistered() != null) $tempQuery['ar_date_registered'] = $this->getDateRegistered();
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
    //Override parent
    public function getFinalResultOperation($caseData,$where,$result){
        if($this->disableAllFunction) return false;
        return parent::getFinalResultOperation($caseData,$where,$result);
    }
	//control - create function
	public function getRule1($caseData = 0, $result = false){
		if($this->getDomain() == null) return $this->getFailedResult();
		return $this->getFinalResultOperation($caseData,"ar_domain='".$this->getDomain()."'",$result);
	}
	public function getRule2($caseData = 0, $result = true){
		return $this->getFinalResultOperation($caseData,"",$result);
	}
	public function deleteRule1(){
		if($this->getDomain() == null) return $this->getFailedResult();
		return $this->setDelete("ar_domain='".$this->getDomain()."'");
	}
}