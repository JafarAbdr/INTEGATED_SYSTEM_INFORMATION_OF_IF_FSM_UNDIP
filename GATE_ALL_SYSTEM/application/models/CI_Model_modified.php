<?php
if(!defined('BASEPATH')) exit("you don't have access to this part");
class CI_Model_modified extends CI_Model {
	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->load->database();
	}
	//caseData interface
	//-iterate next cursor
	public function getNextCursor(){
		if(is_array($this->tempResultArray)){
			if(array_key_exists($this->tempIndexResultArray, $this->tempResultArray)){
				$this->automaSetContent($this->tempResultArray[$this->tempIndexResultArray]);
				$this->tempIndexResultArray += 1;
				return $this->getSuccessResult();
			}else{
				return $this->getFailedResult();
			}
		}else{
			return $this->getFailedResult();
		}
	}
	public function getFinalResultOperation($caseData,$where,$result){
		if($result){
			//kode
			$this->tempResultArray = $this->setQuery($this->getCaseData($caseData),$where)->result_array();
			return $this->neutralizedResultArray();
		}else{
			//kode
			$tempArray = $this->setQuery($this->getCaseData($caseData),$where)->row_array();
			return $this->automaSetContent($tempArray);
		}
	}
	public function addNewRow(){
		if($this->getArrayBuilder() == null){return $this->getFailedResult();}
		if(!$this->isPrimaryNotNull()){return $this->getFailedResult();}
		return $this->setInsert($this->getArrayBuilder());
	}
	//-update
	protected function setUpdate($set="",$where=""){
		$query="UPDATE `".$this->tableName."` SET ".$set;
		if($where!="")
			$query=$query." WHERE ".$where;
		return $this->db->query($query);
	}
	protected function setDelete($where = ''){
		$query="DELETE FROM `".$this->tableName."`";
		if($where!="")
			$query=$query." WHERE ".$where;
		return $this->db->query($query);
	}
	//-insert
	protected function setInsert($data){
		return $this->db->insert($this->tableName,$data);
	}
	//-query 
	protected function setQuery($select='*',$where=""){
		$query="SELECT ".$select." FROM ".$this->tableName;
		if($where!="")
			$query=$query." WHERE ".$where;
		return $this->db->query($query);
	}
	//-prepare to use cursor next
	protected function neutralizedResultArray(){
		$this->tempIndexResultArray = 0;
		if(!is_array($this->tempResultArray)){
			$this->tempResultArray = null;
			return $this->getFailedResult();
		}
		if(count($this->tempResultArray) <= 0){
			$this->tempResultArray = null;
			return $this->getFailedResult();
		}
		return $this->getSuccessResult();
	}
	//-result true
	protected function getSuccessResult(){
		return true;
	}
	//-result false
	protected function getFailedResult(){
		$this->resetValue();
		return false;
	}
	protected function isNull($var){
		return is_null($var);
	}
}