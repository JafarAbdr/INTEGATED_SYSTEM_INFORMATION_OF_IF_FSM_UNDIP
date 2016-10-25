<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
inspire class from moment.js
create by Jafar Abdurrahman ALbasyir
founder Jaserv Tech 
*/
class Datejaservfilter {
	/*
	source function nice_date codeigniter versi 3.0
	*/
	private $isBefore;
	private $isAfter;
	private $isAfterAndNow;
	private $isBeforeAndNow;
	private $baseDate;
	private $next;
	private $isDistanceHour;
	private $isDistanceMinute;
	private $isDistanceSecond;
	public function __CONSTRUCT(){
		$this->neutral();
		$this->isDistanceNormalize();
	}
	public function isDistanceNormalize(){
	$this->isDistanceHour=0;
	$this->isDistanceMinute=0;
	$this->isDistanceSecond=0;
	}
	public function setPlusOrMinHour($INT){
		if($this->nice_date($this->baseDate) == "Invalid Date")
			return true;
		$INT = intval($INT);
		$INT *= (60*60);
		$this->baseDate = $this->unix_to_human(human_to_unix($this->baseDate)+$INT,true,"id");
		return true;
	}
	public function getDate($FORMAT = NULL,$default=true){
		if($default){
			if($FORMAT==NULL){
				return $this->nice_date($this->baseDate,"Y-m-d H:i:s:a");
			}else{
				return $this->nice_date($this->baseDate,$FORMAT);
			}	
		}else{
			//exit($this->getMonthID(nice_date($this->baseDate,"m")));
			$FORMAT = str_ireplace("Y",$this->nice_date($this->baseDate,"Y"),$FORMAT);
			$FORMAT = str_ireplace("i",$this->nice_date($this->baseDate,"i"),$FORMAT);
			$FORMAT = str_ireplace("H",$this->nice_date($this->baseDate,"H"),$FORMAT);
			$FORMAT = str_ireplace("h",$this->nice_date($this->baseDate,"h"),$FORMAT);
			$FORMAT = str_ireplace("s",$this->nice_date($this->baseDate,"s"),$FORMAT);
			$FORMAT = str_ireplace("a",$this->nice_date($this->baseDate,"a"),$FORMAT);
			$FORMAT = str_ireplace("VDD",$this->nice_date($this->baseDate,"d"),$FORMAT);
			$FORMAT = str_ireplace("WDD",$this->getDayID($this->nice_date($this->baseDate,"d")),$FORMAT);
			$FORMAT = str_ireplace("WMM",$this->getMonthID($this->nice_date($this->baseDate,"m")),$FORMAT);
			$FORMAT = str_ireplace("VMM",$this->nice_date($this->baseDate,"m"),$FORMAT);
			return $FORMAT;
		}
	}
	public function setPlusOrMinMinute($INT){
		if($this->nice_date($this->baseDate) == "Invalid Date")
			return true;
		$INT = intval($INT);
		$INT *= 60;
		$this->baseDate = $this->unix_to_human(human_to_unix($this->baseDate)+$INT,true,"id");
		return true;
	}
	public function setPlusOrMinSecond($INT){
		if($this->nice_date($this->baseDate) == "Invalid Date")
			return true;
		$INT = intval($INT);
		$this->baseDate = $this->unix_to_human(human_to_unix($this->baseDate)+$INT,true,"id");
		return true;
	}
	public function setDate($TEMP_DATE,$NEXT=false){
		if($this->nice_date($TEMP_DATE,"Y-m-d H:i:s") == "Invalid Date"){
			$this->neutral();
			if($NEXT)
				return $this;
			else
			return false;
		}
		$TEMP_DATE = $this->nice_date($TEMP_DATE,"Y-m-d H:i:s");
		$this->baseDate = $TEMP_DATE;
		$this->isBefore = true;
		$this->isAfter = true;
		$this->isBeforeAndNow = true;
		$this->isAfterAndNow = true;
		if($NEXT)
				return $this;
			else
			return true;
	}
	private function neutral(){
		$this->next = true;
		$this->isBefore = false;
		$this->isAfter = false;
		$this->isBeforeAndNow = false;
		$this->isAfterAndNow = false;
	}
	public function isBeforeAndNow($TEMP_DATE,$NEXT=false){
		return $this->isBefore($TEMP_DATE,$NEXT,true);
	}
	
	public function isBefore($TEMP_DATE,$NEXT=false,$FORCE_NOW=false){
		if(!$this->isBefore){
			return $this->returnIs($NEXT,false);
		}
		if($this->nice_date($TEMP_DATE,"Y-m-d H:i:s") == "Invalid Date"){
			$this->neutral();
			return $this->returnIs($NEXT,false);
		}
		$TEMP_DATE = $this->nice_date($TEMP_DATE,"Y-m-d H:i:s");
		//var_dump(human_to_unix($TEMP_DATE));
		$TEMP_DATE = unix_to_human(human_to_unix($TEMP_DATE)-(($this->isDistanceHour*60*60)+($this->isDistanceMinute*60)+$this->isDistanceSecond),true,"id");
		
		
		$TEMP_BASE_YEAR = intval($this->nice_date($TEMP_DATE,"Y"));
		$TEMP_BASE_MONTH = intval($this->nice_date($TEMP_DATE,"m"));
		$TEMP_BASE_DAY = intval($this->nice_date($TEMP_DATE,"d"));
		$TEMP_BASE_HOUR = intval($this->nice_date($TEMP_DATE,"H"));
		$TEMP_BASE_MINUTE = intval($this->nice_date($TEMP_DATE,"i"));
		$TEMP_BASE_SECOND = intval($this->nice_date($TEMP_DATE,"s"));
		
		$TEMP_COM_YEAR = intval($this->nice_date($this->baseDate,"Y"));
		$TEMP_COM_MONTH = intval($this->nice_date($this->baseDate,"m"));
		$TEMP_COM_DAY = intval($this->nice_date($this->baseDate,"d"));
		$TEMP_COM_HOUR = intval($this->nice_date($this->baseDate,"H"));
		$TEMP_COM_MINUTE = intval($this->nice_date($this->baseDate,"i"));
		$TEMP_COM_SECOND = intval($this->nice_date($this->baseDate,"s"));
		
		
		if($TEMP_BASE_YEAR > $TEMP_COM_YEAR){
			return $this->returnIs($NEXT,true);
		}else if($TEMP_BASE_YEAR < $TEMP_COM_YEAR){
			return $this->returnIs($NEXT,false);
		}else{
			if($TEMP_BASE_MONTH > $TEMP_COM_MONTH){
				return $this->returnIs($NEXT,true);
			}else if($TEMP_BASE_MONTH < $TEMP_COM_MONTH){
				return $this->returnIs($NEXT,false);
			}else{
				if($TEMP_BASE_DAY > $TEMP_COM_DAY){
					return $this->returnIs($NEXT,true);
				}else if($TEMP_BASE_DAY < $TEMP_COM_DAY){
					return $this->returnIs($NEXT,false);
				}else{
					if($TEMP_BASE_HOUR > $TEMP_COM_HOUR){
						return $this->returnIs($NEXT,true);
					}else if($TEMP_BASE_HOUR < $TEMP_COM_HOUR){
						return $this->returnIs($NEXT,false);
					}else{
						if($TEMP_BASE_MINUTE > $TEMP_COM_MINUTE){
							return $this->returnIs($NEXT,true);
						}else if($TEMP_BASE_MINUTE < $TEMP_COM_MINUTE){
							return $this->returnIs($NEXT,false);
						}else{
							if($TEMP_BASE_SECOND > $TEMP_COM_SECOND){
								return $this->returnIs($NEXT,true);
							}else if($TEMP_BASE_SECOND< $TEMP_COM_SECOND){
								return $this->returnIs($NEXT,false);
							}else{
								if($FORCE_NOW)
									return $this->returnIs($NEXT,true);
								else
									return $this->returnIs($NEXT,false);
							}
						}
					}
				}
			}
		}
		$this->neutral();
		return true;
	}
	private function returnIs($NEXT,$BOOL){
		if($NEXT){
			$this->next = ($this->next && $BOOL);
			return $this;
		}else{
			$TEMP_REST = ($this->next && $BOOL);
			$this->neutral();
			return $TEMP_REST;
		}
	}
	public function isMinimumDistanceTime($kode,$value){
		switch($kode){
			case "H" :$this->isDistanceHour = intval($value); break;
			case "i" :$this->isDistanceMinute = intval($value); break;
			case "s" :$this->isDistanceSecond = intval($value); break;
			default :break;
		}
	}
	public function isAfterAndNow($TEMP_DATE,$NEXT=false){
		return $this->isAfter($TEMP_DATE,$NEXT,true);
	}
	public function isAfter($TEMP_DATE,$NEXT=false,$FORCE_NOW=false){
		if(!$this->isAfter){
			return $this->returnIs($NEXT,false);
		}
		if($this->nice_date($TEMP_DATE,"Y-m-d H:i:s") == "Invalid Date"){
			$this->neutral();
			return $this->returnIs($NEXT,false);
		}
		$TEMP_DATE = $this->nice_date($TEMP_DATE,"Y-m-d H:i:s");
		$TEMP_DATE = unix_to_human(human_to_unix($TEMP_DATE)+(($this->isDistanceHour*60*60)+($this->isDistanceMinute*60)+$this->isDistanceSecond),true,"id");
		$TEMP_BASE_YEAR = intval($this->nice_date($TEMP_DATE,"Y"));
		$TEMP_BASE_MONTH = intval($this->nice_date($TEMP_DATE,"m"));
		$TEMP_BASE_DAY = intval($this->nice_date($TEMP_DATE,"d"));
		$TEMP_BASE_HOUR = intval($this->nice_date($TEMP_DATE,"H"));
		$TEMP_BASE_MINUTE = intval($this->nice_date($TEMP_DATE,"i"));
		$TEMP_BASE_SECOND = intval($this->nice_date($TEMP_DATE,"s"));
		
		$TEMP_COM_YEAR = intval($this->nice_date($this->baseDate,"Y"));
		$TEMP_COM_MONTH = intval($this->nice_date($this->baseDate,"m"));
		$TEMP_COM_DAY = intval($this->nice_date($this->baseDate,"d"));
		$TEMP_COM_HOUR = intval($this->nice_date($this->baseDate,"H"));
		$TEMP_COM_MINUTE = intval($this->nice_date($this->baseDate,"i"));
		$TEMP_COM_SECOND = intval($this->nice_date($this->baseDate,"s"));
		
		
		
		if($TEMP_BASE_YEAR < $TEMP_COM_YEAR){
			return $this->returnIs($NEXT,true);
		}else if($TEMP_BASE_YEAR > $TEMP_COM_YEAR){
			return $this->returnIs($NEXT,false);
		}else{
			//echo "ello1";
			if($TEMP_BASE_MONTH < $TEMP_COM_MONTH){
				return $this->returnIs($NEXT,true);
			}else if($TEMP_BASE_MONTH > $TEMP_COM_MONTH){
				return $this->returnIs($NEXT,false);
			}else{
				if($TEMP_BASE_DAY < $TEMP_COM_DAY){
					return $this->returnIs($NEXT,true);
				}else if($TEMP_BASE_DAY > $TEMP_COM_DAY){
					return $this->returnIs($NEXT,false);
				}else{
					if($TEMP_BASE_HOUR < $TEMP_COM_HOUR){
						return $this->returnIs($NEXT,true);
					}else if($TEMP_BASE_HOUR > $TEMP_COM_HOUR){
						return $this->returnIs($NEXT,false);
					}else{
						if($TEMP_BASE_MINUTE < $TEMP_COM_MINUTE){
							return $this->returnIs($NEXT,true);
						}else if($TEMP_BASE_MINUTE > $TEMP_COM_MINUTE){
							return $this->returnIs($NEXT,false);
						}else{
							if($TEMP_BASE_SECOND < $TEMP_COM_SECOND){
								return $this->returnIs($NEXT,true);
							}else if($TEMP_BASE_SECOND > $TEMP_COM_SECOND){
								return $this->returnIs($NEXT,false);
							}else{
								if($FORCE_NOW)
									return $this->returnIs($NEXT,true);
								else
									return $this->returnIs($NEXT,false);
							}
						}
					}
				}
			}
		}
		$this->neutral();
		return true;
	}
	//if wrong code, will root to this month
	private function getDayID($kode=0){
		$kode = intval($kode);
		if($kode > 7 || $kode < 1){
			$kode = intval(date("m"));
		}
		$month="";
		switch($kode){
			case 1 : $month = "Senin"; break;
			case 2 : $month = "Selasa"; break;
			case 3 : $month = "Rabu"; break;
			case 4 : $month = "Kamis"; break;
			case 5 : $month = "Jum'at"; break;
			case 6 : $month = "Sabtu"; break;
			case 7 : $month = "Minggu"; break;
		}
		return $month;
	}
	private function getMonthID($kode=0){
		$kode = intval($kode);
		if($kode > 12 || $kode < 1){
			$kode = intval(date("m"));
		}
		$month="";
		switch($kode){
			case 1 : $month = "Januari"; break;
			case 2 : $month = "Februari"; break;
			case 3 : $month = "Maret"; break;
			case 4 : $month = "April"; break;
			case 5 : $month = "Mei"; break;
			case 6 : $month = "Juni"; break;
			case 7 : $month = "Juli"; break;
			case 8 : $month = "Agustus"; break;
			case 9 : $month = "September"; break;
			case 10 : $month = "Oktober"; break;
			case 11 : $month = "November"; break;
			case 12 : $month = "Desember"; break;
		}
		return $month;
	}
	private function nice_date($bad_date = '', $format = FALSE)
	{
		if (empty($bad_date))
		{
			return 'Unknown';
		}
		elseif (empty($format))
		{
			$format = 'U';
		}

		// Date like: YYYYMM
		if (preg_match('/^\d{6}$/i', $bad_date))
		{
			if (in_array(substr($bad_date, 0, 2), array('19', '20')))
			{
				$year  = substr($bad_date, 0, 4);
				$month = substr($bad_date, 4, 2);
			}
			else
			{
				$month  = substr($bad_date, 0, 2);
				$year   = substr($bad_date, 2, 4);
			}

			return date($format, strtotime($year.'-'.$month.'-01'));
		}

		// Date Like: YYYYMMDD
		if (preg_match('/^(\d{2})\d{2}(\d{4})$/i', $bad_date, $matches))
		{
			return date($format, strtotime($matches[1].'/01/'.$matches[2]));
		}

		// Date Like: MM-DD-YYYY __or__ M-D-YYYY (or anything in between)
		if (preg_match('/^(\d{1,2})-(\d{1,2})-(\d{4})$/i', $bad_date, $matches))
		{
			return date($format, strtotime($matches[3].'-'.$matches[1].'-'.$matches[2]));
		}

		// Any other kind of string, when converted into UNIX time,
		// produces "0 seconds after epoc..." is probably bad...
		// return "Invalid Date".
		if (date('U', strtotime($bad_date)) === '0')
		{
			return 'Invalid Date';
		}

		// It's probably a valid-ish date format already
		return date($format, strtotime($bad_date));
	}
	function human_to_unix($datestr = '')
	{
		if ($datestr === '')
		{
			return FALSE;
		}

		$datestr = preg_replace('/\040+/', ' ', trim($datestr));

		if ( ! preg_match('/^(\d{2}|\d{4})\-[0-9]{1,2}\-[0-9]{1,2}\s[0-9]{1,2}:[0-9]{1,2}(?::[0-9]{1,2})?(?:\s[AP]M)?$/i', $datestr))
		{
			return FALSE;
		}

		sscanf($datestr, '%d-%d-%d %s %s', $year, $month, $day, $time, $ampm);
		sscanf($time, '%d:%d:%d', $hour, $min, $sec);
		isset($sec) OR $sec = 0;

		if (isset($ampm))
		{
			$ampm = strtolower($ampm);

			if ($ampm[0] === 'p' && $hour < 12)
			{
				$hour += 12;
			}
			elseif ($ampm[0] === 'a' && $hour === 12)
			{
				$hour = 0;
			}
		}

		return mktime($hour, $min, $sec, $month, $day, $year);
	}
	function unix_to_human($time = '', $seconds = FALSE, $fmt = 'us')
	{
		$r = date('Y', $time).'-'.date('m', $time).'-'.date('d', $time).' ';

		if ($fmt === 'us')
		{
			$r .= date('h', $time).':'.date('i', $time);
		}
		else
		{
			$r .= date('H', $time).':'.date('i', $time);
		}

		if ($seconds)
		{
			$r .= ':'.date('s', $time);
		}

		if ($fmt === 'us')
		{
			return $r.' '.date('A', $time);
		}

		return $r;
	}
}