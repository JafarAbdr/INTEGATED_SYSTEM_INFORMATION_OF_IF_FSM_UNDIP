<?php
defined('BASEPATH') OR exit('What Are You Looking For ?');
require_once ("CI_Library_Modified.php");
class Aktor extends CI_Library_Modified{
	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
	}
	public function getCheckNuTelphone($telphone="",$cat=0){if($telphone == "")	return $this->setCategoryPrintMessage($cat, false, "nama tidak boleh kosong");	$temp = $this->inputjaservfilter->numberFiltering($telphone);if($temp[0]){if(strlen($telphone) > 9 && strlen($telphone) < 14)return $this->setCategoryPrintMessage($cat, true, "no telefon valid");	else return $this->setCategoryPrintMessage($cat, false, "no telefon tidak valid");}else	return $this->setCategoryPrintMessage($cat, $temp[0], $temp[1]);}
	public function getCheckEmail($email="",$cat=0){if($email == "")return $this->setCategoryPrintMessage($cat, false, "nama tidak boleh kosong");$temp = $this->inputjaservfilter->emailFiltering($email);	return $this->setCategoryPrintMessage($cat, $temp[0], $temp[1]);}
	public function getCheckName($name="",$cat=0){if($name == "")return $this->setCategoryPrintMessage($cat, false, "nama tidak boleh kosong");	$temp = $this->inputjaservfilter->usernameFiltering($name);	return $this->setCategoryPrintMessage($cat, $temp[0], $temp[1]);}
	/*form-session*/
	protected function setCategoryPrintMessage($cat,$status,$message){if($cat==0){if($status){echo "1".$message;return ;}else{echo "0".$message;	return ;}}else{	return array($status,$message);}}
	/*private*/
}