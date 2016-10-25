<?php
if(!defined('BASEPATH')) header("location:http://www.google.com");
class CI_Controller_Modified extends CI_Controller{
	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->load->helper('url');
	}
	protected function isNullPost($tempName,$messageError = null){
		if($this->input->post($tempName) === NULL){
			if($messageError == null){
				exit("3".$tempName." bernilai null<script>window.location = '".base_url()."'</script>");
			}else{
				exit("3".$messageError."<script>window.location = '".base_url()."'</script>");
			}
		}
		return $this->input->post($tempName);
	}
	
	/*form-session*/
	protected function isNull($var){ return is_null($var); }
	protected function isArray($var){ return is_array($var); }
}