<?php 
if(!defined("BASEPATH")) exit("");
require_once ("Aktor.php");
class Ghost extends Aktor {
	function __construct(){
		parent::__construct();
		$this->setLibrary('session');
		$this->setLibrary('inputjaservfilter');
	}
	//checking component
	public function getCheckUserName($value="",$cat=0){
		if(($value=="") || ($value == null)){
			return $this->setCategoryPrintMessage($cat, false, "nilai tidak boleh kosong");
		}
		if(!preg_match("/^[A-Za-z]*$/",$value))
			return $this->setCategoryPrintMessage($cat,false,"username mengandung karakter yang tidak diizinkan");
		if(!$this->inputjaservfilter->isContainAlphabetUpper($value))
			return $this->setCategoryPrintMessage($cat, false, "Username tidak valid");
		return $this->setCategoryPrintMessage($cat, true, "valid");
	}
	public function getCheckUserPassword($value="",$cat=0){
		if(($value=="") || ($value == null)){
			return $this->setCategoryPrintMessage($cat, false, "nilai tidak boleh kosong");
		}
		$temp = $this->inputjaservfilter->passwordFiltering($value);
		return $this->setCategoryPrintMessage($cat, $temp[0], $temp[1]);
		
	}
	//encrypt
	private function encrypt($string=""){
		return sha1(md5($string."-jaservFilterGhost"));
	}
	//logout function - valid 
	public function setStatusLogOutGhost(){
		if(!$this->getStatusLoginGhost())
			return false;
		$this->session->unset_userdata('GHOST');
		$this->session->unset_userdata('GHOST-KODE');
		$this->session->sess_destroy();
		return true;
	}
	//check is login koordinator function - valid 
	public function getStatusLoginGhost(){
		$error = 0;
		if(!$this->session->has_userdata('GHOST'))
			return false;
		if($this->session->userdata('GHOST') != 'true')
			return false;
		if(!$this->session->has_userdata('GHOST-KODE'))
			return false;
		if($this->session->userdata('GHOST-KODE') != $this->encrypt('GHOST'))
			return false;
		return true;
	}
	public function setLoginGhost($tempUserName,$tempUserPassword,$cat){
		if($this->getStatusLoginGhost()){
			redirect(base_url()."Ghostarea.aspx/");
		}
		if(!$this->getCheckUserName($tempUserName,1)[0]){ return $this->setCategoryPrintMessage($cat,false,"Sorry Your Username doesn't exist"); }
		if(!$this->getCheckUserPassword($tempUserPassword,1)[0]){ return $this->setCategoryPrintMessage($cat,false,"Sorry Your Password doesn't exist"); }
		$this->setModel('air_ghost_account');
		$this->air_ghost_account->resetValue();
		$this->air_ghost_account->setUserName($tempUserName);
		$this->air_ghost_account->setUserPassword($tempUserPassword);
		if(!$this->air_ghost_account->getRule1()){ return $this->setCategoryPrintMessage($cat,false,"Sorry Your account, doesn't exist"); }
		if($this->air_ghost_account->getUserName() != $tempUserName){ return $this->setCategoryPrintMessage($cat,false,"Sorry Your Username get wrong"); }
		if($this->air_ghost_account->getUserPassword() != $tempUserPassword){ return $this->setCategoryPrintMessage($cat,false,"Sorry Your Password get wrong"); }
		$this->session->set_userdata('GHOST',"true");
		$this->session->set_userdata('GHOST-KODE',$this->encrypt('GHOST'));
		return $this->setCategoryPrintMessage($cat,true,"Ghostarea.aspx");
	}
}