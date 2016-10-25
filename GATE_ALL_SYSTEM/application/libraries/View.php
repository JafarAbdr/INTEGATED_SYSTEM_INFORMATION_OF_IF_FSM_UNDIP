<?php
/*
This Class has been rebuild revision build v3.0 Gateinout.php
Author By : Jafar Abdurrahman Albasyir
Since : 17/5/2016
Work : Home on 08:05 PM
*/
defined('BASEPATH') OR exit('What Are You Looking For ?');
class View {
	public function __CONSTRUCT(){
		$this->CI = &get_instance();
	}
	//check any post is NULL , and if not NULL will be return - valid
	public function isNullPost($a){
		if($this->CI->input->post($a)===NULL)
			exit('0anda melakukan percobaan terhadap halaman, jangan lakukan itu');
		return $this->CI->input->post($a);
	}
	public function getYearNow(){ 
		$year = DATE("Y"); 
		$month = DATE("m"); 
		if(intval($month) >= 1 && intval($month)<=6){
			return intval((intval($year)-1)."2");
		}else{
			return intval($year."1");
		}
	}
}