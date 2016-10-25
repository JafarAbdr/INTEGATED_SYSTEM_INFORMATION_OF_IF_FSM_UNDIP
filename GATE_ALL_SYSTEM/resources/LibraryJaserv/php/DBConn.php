<?php
	class DBConn {
		private $serverDomain;
		private $usernameDB;
		private $passWord;
		private $databaseNm;
		private $conn;
		private $queryArray;
		function __construct($start = true,$database = "localhost",$username = "root",$password = "",$dbName = "db_university"){
			$this->serverDomain = $database;
			$this->usernameDB = $username;
			$this->passWord = $password;
			$this->databaseNm = $dbName;
			if($start)
				$this->getStartConnection();
		}
		function getQueryArray($data){
			return $this->queryArray[$data];
		}
		function getServerDomain(){
			return $this->serverDomain;
		}
		function getUsernameDatabase() {
			return $this->usernameDB;
		}
		function getPasswordDatabase() {
			return $this->passWord;
		}
		function getDatabaseName() {
			return $this->databaseNm;
		}
		function getConnection(){
			return $this->conn;
		}
		function getStartConnection() {
			$this->conn = new mysqli($this->serverDomain,$this->usernameDB,$this->passWord,$this->databaseNm);
			if($this->conn->connect_error)
				die("failed error code : ".$this->conn->connect_error);
		}
		function setQuery($data,$query){
			$this->queryArray[$data] = $this->conn->query($query);
			if(!$this->queryArray[$data])
				die("failed load query");
            return true;
		}
		function setFreeQuery($data) {
			$this->queryArray[$data]->free();
		}
	}