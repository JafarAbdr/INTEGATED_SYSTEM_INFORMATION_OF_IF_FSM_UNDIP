<?php
defined('BASEPATH') OR exit('What Are You Looking For ?');
require_once ("Aktor.php");
class Employee extends Aktor {
	function __construct(){
		parent::__construct();
		$this->setModel("sc_sd");
		$this->setModel("air_sd_if");
		$this->setModel("air_sd_nif");
		$this->setLibrary('session');
		$this->setLibrary('inputjaservfilter');
	}
	//checking component
	public function getCheckNip($nip="",$cat=0){
		if($nip == "")
			return $this->setCategoryPrintMessage($cat, false, "nip tidak boleh kosong");
		if(!$this->inputjaservfilter->numberFiltering($nip)[0])
			return $this->setCategoryPrintMessage($cat, false, "nip mengandng karakter lain");
		if((strlen($nip)>=17)&&(strlen($nip) <= 20))
			return $this->setCategoryPrintMessage($cat, true, "valid");
		else 
			return $this->setCategoryPrintMessage($cat, false, "nip tidak valid");
	} 
	public function getCheckPassword($value="",$cat=0){
		if(($value=="") || ($value == null)){
			return $this->setCategoryPrintMessage($cat, false, "nilai tidak boleh kosong");
		}
		$temp = $this->inputjaservfilter->passwordFiltering($value);
		return $this->setCategoryPrintMessage($cat, $temp[0], $temp[1]);
		
	}
	public function getCheckBidang($TEMP_VALUE_LOCATION = "",$TEMP_CATEGORY = 0){
		if($TEMP_VALUE_LOCATION == "")
			return $this->setCategoryPrintMessage($TEMP_CATEGORY, true, "valid"); //boleh kosong tau tidak
		$TEMP_VALUE_LOCATION = $this->inputjaservfilter->textFiltering($TEMP_VALUE_LOCATION);
		return $this->setCategoryPrintMessage($TEMP_CATEGORY, $TEMP_VALUE_LOCATION[0], $TEMP_VALUE_LOCATION[1]);
	}
	public function getCheckLokasi($TEMP_VALUE_LOCATION = "",$TEMP_CATEGORY = 0){
		if($TEMP_VALUE_LOCATION == "")
			return $this->setCategoryPrintMessage($TEMP_CATEGORY, true, "valid"); //boleh kosong tau tidak
		$TEMP_VALUE_LOCATION = $this->inputjaservfilter->textFiltering($TEMP_VALUE_LOCATION);
		return $this->setCategoryPrintMessage($TEMP_CATEGORY, $TEMP_VALUE_LOCATION[0], $TEMP_VALUE_LOCATION[1]);
	}
	//encrypt
	private function encrypt($string=""){
		return sha1(md5($string."jaservFilter"));
	}
	//logout function - valid 
	public function setStatusLogOutDosen(){
		if(!$this->getStatusLoginDosen())
			return false;
		$this->session->unset_userdata("nama");
		$this->session->unset_userdata("nip");
		$this->session->unset_userdata("kode");
		$this->session->unset_userdata("ifkode");
		$this->session->sess_destroy();
		return true;
	}
	//check is login koordinator function - valid 
	public function getStatusLoginDosen(){
		$error = 0;
		if(!$this->session->has_userdata('nama'))
			$error+=0;
		else{
			if($this->session->userdata('nama') != "dosen")
				$error+=1;
		}
		if(!$this->session->has_userdata('ifkode')){
			return false;
		}else{
			$i = intval($this->session->userdata('ifkode'));
			if($i!= 404 && $i != 500)
				$error+=1;
		}
		if(!$this->session->has_userdata('nip'))
			return false;
		if(!$this->session->has_userdata('kode'))
			$error+=1;
		else{
			if($this->session->userdata('kode') != $this->encrypt($this->session->userdata('nip')))
				$error+1;
		}
		if($error == 0)
			return true;
		else 
			return false;
	}
	public function isDosenIf(){
		if(!$this->getStatusLoginDosen()){
			return false;
		}
		if(intval($this->session->userdata('ifkode')) == 500){
			return true;
		}else{
			return false;
		}
	}
	public function setLoginDosen($TEMP_NIP,$TEMP_PASSWORD){
		if($this->getStatusLoginDosen()){
			redirect(base_url()."Dosenroom/");
		}
		if(!$this->getCheckNip($TEMP_NIP,1)[0]){
			return $this->setCategoryPrintMessage(0,false,"Maaf nip anda tidak valid");
		}
		$this->air_sd_if->resetValue();
		$this->air_sd_nif->resetValue();
		$this->air_sd_if->setNip($TEMP_NIP);
		$this->air_sd_nif->setNip($TEMP_NIP);
		if($this->air_sd_if->getDosenInfo()){
			if($this->air_sd_if->getNip() != $TEMP_NIP){
				return $this->setCategoryPrintMessage(0,false,"Nip anda tidak terdaftar");
			}
			if($this->air_sd_if->getPassword() != $TEMP_PASSWORD){
				return $this->setCategoryPrintMessage(0,false,"Nip anda tidak terdaftar");
			}
			$this->session->set_userdata("nama","dosen");
			$this->session->set_userdata("nip",$this->air_sd_if->getNip());
			$this->session->set_userdata("ifkode","500"); //internal so is if dosen heheheh
			$this->session->set_userdata("kode",$this->encrypt($this->session->userdata('nip')));
			if($this->getStatusLoginDosen())
				return $this->setCategoryPrintMessage(0,true, "DOSEN_HOME");
			else
				return $this->setCategoryPrintMessage(0,false,"Terjadi kesalahan saat melakukan login");
		}else if($this->air_sd_nif->getDosenInfo()){
			if($this->air_sd_nif->getNip() != $TEMP_NIP){
				return $this->setCategoryPrintMessage(0,false,"Nip anda tidak terdaftar");
			}
			if($this->air_sd_nif->getPassword() != $TEMP_PASSWORD){
				return $this->setCategoryPrintMessage(0,false,"Nip anda tidak terdaftar");
			}
			$this->session->set_userdata("nama","dosen");
			$this->session->set_userdata("nip",$this->air_sd_nif->getNip());
			$this->session->set_userdata("ifkode","404"); //external so is not dosen if heheheh
			$this->session->set_userdata("kode",$this->encrypt($this->session->userdata('nip')));
			if($this->getStatusLoginDosen())
				return $this->setCategoryPrintMessage(0,true, "DOSEN_HOME");
			else
				return $this->setCategoryPrintMessage(0,false,"Terjadi kesalahan saat melakukan login");
		}else{
			return $this->setCategoryPrintMessage(0,false,"Nip anda tidak terdaftar");
		}
	}
}