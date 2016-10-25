<?php
require_once 'DBConn.php';
class LoginStyle {
	private $style;
	private $statusDBConn;
	private $hostageDB;
	private $connect;
	private $temp;
	//tipe login
	//  0 username(word without symbol and space 1 password default
	//  1 username(email style or word withhout space password default)
	//  2 username(KODE)password (KODE)
	//  3 +chapta number
	function __construct($typeStyle=1){
		$this->style = $typeStyle;
		$this->statusDBConn = false;
		$this->temp['us']="";
		$this->temp['pa']="";
	}
	
	function setDBConnectTable($host="localhost",$user="root",$pass="",$db = "admin",$table="admin"){
		$this->hostageDB['hostdomain']=$host;
		$this->hostageDB['username']=$user;
		$this->hostageDB['password']=$pass;
		$this->hostageDB['database']=$db;
		$this->hostageDB['table']=$table;
		$this->statusDBConn = true;
	}
	function getInfoExisting($user,$pass){
		if($this->statusDBConn){
			$query = "SELECT * FROM ".$this->hostageDB['table'];
			$connect = new DBConn(true,$this->hostageDB['hostdomain'],$this->hostageDB['username'],$this->hostageDB['password'],$this->hostageDB['database']);
			$connect->setQuery("temp", $query);
			while ($row = $connect->getQueryArray("temp")->fetch_object()){
				if(($user == $row->username) && ($pass == $row->password))
				{
					return true;
				}	
			}
			return false;
		}
	}
}