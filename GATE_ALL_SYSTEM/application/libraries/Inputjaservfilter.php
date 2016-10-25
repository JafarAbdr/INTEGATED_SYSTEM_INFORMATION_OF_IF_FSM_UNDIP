<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inputjaservfilter {
	function __CONSTRUCT(){
		
	}

	public function emailFiltering($email){
		$email.="";
		$email = $this->stringFiltering($email);
		if(($email == "") || ($email == " "))
			return (array(false,"tidak boleh kosong"));
		if(!preg_match("/^[a-zA-Z0-9@.]*$/",$email))
			return (array(false,"email mengandung karakter yang tidak diizinkan"));
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return (array(true,"valid"));
		}else
			return (array(false,"email tidak valid"));
	}
	
	public function domainFiltering($domain){
		$domain.="";
		$domain = $this->stringFiltering($domain);
		if(($domain == "") || ($domain == " "))
			return (array(false,"tidak boleh kosong"));
		if (filter_var($domain, FILTER_VALIDATE_URL)) { //, FILTER_FLAG_PATH_REQUIRED
			return (array(true,"valid"));
		}else
			return (array(false,"email tidak valid"));
	}
	/*
	test : true
	stringFiltering adalah methode string filter dari beberapa karakter seperti spasi dan tag 
	html_entity_decode
	src : http://www.w3schools.com/php/php_form_validation.asp
	input 
		string
	output
		string ter-filter
	*/
	public function stringFiltering($variabel){
		return htmlspecialchars(stripcslashes(trim($variabel)));
	}
	/*
	test : true
	usernameFiltering adalah methode yang digunakan untuk memfilter username
	kontex nya ini adalah sebuah nama lengkap maupun nama panggilan, tidak mengndung number atau karakter 
	lain.
	contoh :
	valid -> "Jafar Abdurrahman ALbasyir"
	tidak valid -> "Jafar Abdurrahman Al-basyir" mengandung (karakter negatif)
	tidak valid -> "Jafar Abdurrahman Albasyir " mengandung (spasi di akhir string)
	tidak valid -> " Jafar Abdurrahman Albasyir" mengandung (spasi di awal string)
	tidak valid -> "Jafar  Abdurrahman Albasyir" mengandung (multiple spasi)
	input
		string
	output array
		valid 0 -> true
		tidak valid 0 -> false
		valid 1 -> "valid"
		tidak valid 1 -> "pesan eror"
		
	*/
	public function usernameFiltering($username){
		$username.="";
		$username=$this->stringFiltering($username);
		if($username == "" || $username == " ")
			return(array(false,"tidak boleh kosong"));
		if($this->isContainMoreSpace($username))
			return (array(false,"mengandung konten spasi berganda"));
		//if(preg_match("/^[a-zA-Z]{3}[a-zA-Z ]*$/",$username)) username
		//if(preg_match("/^([a-zA-Z]+)([a-zA-Z0-9 @?]{8,16})$/",$username)) password
		if(preg_match("/^([a-zA-Z]+)([a-zA-Z ]*)([a-zA-Z]+)$/",$username))
			return (array(true,"valid"));
		else
			return (array(false,"hanya alphabet dan spasi secukupnya yang diizinkan"));
	}
	/*
	test : true
	isContainMoreSpace adalah metode yang mendeteksi kandungan multiple spasi didalam suatu string
	input
		string
	output
		ya -> true
		tidak -> false
	
	*/
	public function isContainMoreSpace($variabel){
		$variabel.="";
		$variabel=$this->stringFiltering($variabel);
		$error=0;
		$temp[0] = strlen($variabel);
		for($i=0;$i<$temp[0];$i++){
			if($variabel[$i] == " "){
				$com=0;
				for($j=$i+1;$j<$temp[0];$j++){
					if($variabel[$j] == " ")
					{
						$com++;
					}
					else{
						$i=$j-1;
						if($com>0)
							$error++;
						break;
					}
				}
				if($j==$temp[0]){
					if($com>0)
						$error++;
				}
			}
		}
		if($error > 0){
			return true;
		}else{
			return false;
		}
	}
	/*
	test : true
	passwordFilteringSecure adalah filter password yang ditetapkan oleh jaserv logic sebagai keamanan dari injection terhadap database
	pembatasan karakter dapat meminimumkan injeksi, masih dalam tahap pngembangan sampai ditemukan pola tertentu
	input 
		string
	output
		valid 0 -> true
		tidak valid 0 -> false
		valid 1 -> "valid"
		tidak valid 1 -> "pesan eror"
	*/
	public function passwordFilteringSecure($password){
		$password.="";
		if($password == ""||$password==" ")
			return (array(false,"password tidak boleh kosong"));
		$f=strlen($password);
		if(($f<8)||($f>18))
			return (array(false,"karakter minimal adalah 8 dan maksimal 18"));
		if(!preg_match("/^[a-zA-Z0-9 @]+$/",$password))
			return (array(false,"password terdiri dari huruf(besar,kecil), angka, karakter ('spasi,@')"));
		if(!strpos($password," ")){
			if($password[0]!=" ")
				return (array(false,"harus   mengandung spasi"));
		}
		if(!strpos($password,"@")){
			return (array(false,"harus   mengandung '@'"));
		}
		if(!$this->isContainNumber($password)){
			return (array(false,"harus   mengandung angka"));
		}
		if(!$this->isContainAlphabetUpper($password))
			return (array(false,"harus mengandung huruf besar"));
		if(!$this->isContainAlphabetLower($password))
			return (array(false,"harus mengandung huruf kecil"));
		return (array(true,"valid"));
	}
	/*
	test : true
	passwordFiltering adalah filter password yang ditetapkan oleh jaserv logic sebagai keamanan dari injection setelah 
	passwordFilteringSecure terhadap database pembatasan karakter dapat meminimumkan injeksi, masih dalam tahap 
	pngembangan sampai ditemukan pola tertentu
	input 
		string
	output
		valid 0 -> true
		tidak valid 0 -> false
		valid 1 -> "valid"
		tidak valid 1 -> "pesan eror"
	*/
	public function passwordFiltering($password){
		if($this->isContentMySqlInjection($password)){
			return (array(false,"konten mungkin mengandung injeksi ke database"));
		}
		$f=strlen($password);
		if(($f > 18)||($f < 8)){
			return (array(false,"minimal karakter 8 dan maksimal 18 "));
		}
		if(!preg_match("/^[a-zA-Z0-9]+$/",$password))
			return (array(false,"password terdiri dari huruf(besar,kecil), angka, karakter ('spasi,@')"));
		if(!$this->isContainNumber($password)){
			return (array(false,"harus   mengandung angka"));
		}
		if(!$this->isContainLowerUpper($password))
			return (array(false,"harus   mengandung hurup besar dan kecil"));
		return (array(true,"valid"));
	}
	/*
	isInListMyASCII adalah metode pegecekan apakah mengandung karakter yang didefinisikan atau dalam bentuk interval
	input 
		string
		char start berupa kode asci awal
		char end berupa kode asci awal
		catatan : jika satu karakter maka char start == char end
	output
		ya -> true
		tidak -> false
	*/
	public function isInListMyASCII($variabel,$start,$end){
		$variabel.="";
		$start=ord($start);
		$end=ord($end);
		if($start>$end)
			return false;
		for($i=0;$i<strlen($variabel);$i++){
			for($k=$start;$k<=$end;$k++){
				if(ord($variabel[$i]) == $k)
					return true;
			}
		}		
		return false;
	}
	/*
	isContainLowerUpper metode fast dari isInListMyASCII memperoleh informasi kontent string mengandung huruf besar dan kecil
	input 
		string
	output
		ya -> true
		tidak -> false
	*/
	public function isContainLowerUpper($variabel){
		return ($this->isInListMyASCII($variabel,'A','Z') && $this->isInListMyASCII($variabel,'a','z'));
	}
	/*
	isContainAlphabetUpper metode fast dari isInListMyASCII memperoleh informasi kontent string mengandung huruf besar
	input 
		string
	output
		ya -> true
		tidak -> false
	*/
	public function isContainAlphabetUpper($variabel){
		return $this->isInListMyASCII($variabel,'A','Z');
	}
	/*
	isContainAlphabetLower metode fast dari isInListMyASCII memperoleh informasi kontent string mengandung huruf kecil
	input 
		string
	output
		ya -> true
		tidak -> false
	*/
	public function isContainAlphabetLower($variabel){
		return $this->isInListMyASCII($variabel,'a','z');
	}
	/*
	isContainNumber metode fast dari isInListMyASCII memperoleh informasi kontent string mengandung number
	input 
		string
	output
		ya -> true
		tidak -> false
	*/
	public function isContainNumber($variabel){
		return $this->isInListMyASCII($variabel,0,9);
	}
	/*
	isContentMySqlInjection adalah metode pegecekan apakah mengandung injeksi yang didipkan, dan berdampak negatif terhadap database
	input 
		string
	output
		ya -> true
		tidak -> false
	*/
	public function isContentMySqlInjection($variabel){
		if((strpos($variabel," OR "))||(strpos($variabel," or ")) || (strpos($variabel," Or ")) || (strpos($variabel," oR ")))
			return true;
		$temp = strlen($variabel);
		for($i=0;$i<$temp;$i++){
			if($variabel[$i]=="'") return true;
			if($variabel[$i]=="=") return true;
			if($variabel[$i]=="-") return true;
			if($variabel[$i]==")") return true;
			if($variabel[$i]=="(") return true;
			if($variabel[$i]=="#") return true;
			if($variabel[$i]=='"') return true;
		}
		return false;
	}
	/*
	test : true
	numberFiltering adalah menceck apakah komponen suatu string adalah number
	input 
		string
	output
		valid 0 -> true
		tidak valid 0 -> false
		valid 1 -> "valid"
		tidak valid 1 -> "pesan eror"
	*/
	public function numberFiltering($variabel){
		if(!preg_match("/^[0-9]+$/",$variabel))
			return (array(false,"mengandung karakter lain selain angka"));
		return (array(true,"valid"));
	}
	/*
	test : true
	titleFiltering adalah mencek apakah komponen suatu string adalah format judul yang benar
	input 
		string
	output
		valid 0 -> true
		tidak valid 0 -> false
		valid 1 -> "valid"
		tidak valid 1 -> "pesan eror"
	*/
	public function titleFiltering($variabel){
		if($this->isContainMoreSpace($variabel))
			return (array(false,"mengandung konten spasi berganda"));
		if(!preg_match("/^([a-zA-Z0-9]+)([a-zA-Z0-9 ]*)([a-zA-Z0-9]+)$/",$variabel))
			return (array(false,"mengandung karakter lain yang tidak diizinkan dalam judul"));
		return (array(true,"valid"));
	}
	public function textFiltering($variabel){
		if($this->isContainMoreSpace($variabel))
			return (array(false,"mengandung konten spasi berganda"));
		if(!preg_match("/^([a-zA-Z0-9]+)([a-zA-Z0-9 ,.:]*)([a-zA-Z0-9 ,.:.]+)$/",$variabel))
			return (array(false,"mengandung karakter lain yang tidak diizinkan dalam judul"));
		return (array(true,"valid"));
	}
	/*
	test : true
	nameLevelFiltering adalah mencek apakah komponen suatu string adalah format nama seseorang dengan gelar yang benar
	input 
		string
	output
		valid 0 -> true
		tidak valid 0 -> false
		valid 1 -> "valid"
		tidak valid 1 -> "pesan eror"
	*/
	public function nameLevelFiltering($variabel){
		if($this->isContainMoreSpace($variabel))
			return (array(false,"mengandung konten spasi berganda"));
		if(!preg_match("/^([a-zA-Z]+)([a-zA-Z., ]*)([a-zA-Z.]+)$/",$variabel))
			return (array(false,"mengandung karakter lain yang tidak diizinkan dalam judul"));
		return (array(true,"valid"));
	}
}