<?php
//defined('BASEPATH') OR exit('What Are You Looking For ?');
class CI_Library_Modified{
	public function setModel($a,$arrayData=null){
		$this->CI->load->model($a);
		if($this->isArray($arrayData)){
			$x = strtoupper($a[0]).substr($a,1,strlen($a)-1);
			$this->$a = new $x();
		}else
			$this->$a = $this->CI->$a;
	}
	public function setHelper($a){$this->CI->load->helper($a);}
	public function setLibrary($a){	$this->CI->load->library($a);$this->$a = $this->CI->$a;}
	public function __CONSTRUCT(){
		$this->CI = &get_instance();
		$this->setLibrary("inputjaservfilter");
	}
	/*form-session*/
	protected function isNull($var){ return is_null($var); }
	protected function isArray($var){ return is_array($var); }
	protected function setCategoryPrintMessage($cat,$status,$message){if($cat==0){if($status){echo "1".$message;return ;}else{echo "0".$message;	return ;}}else{	return array($status,$message);}}
	/*private*/
}