<?php
require_once ("CI_Library_Modified.php");
class Controlapi extends CI_Library_Modified{
    public function __CONSTRUCT(){
        parent::__CONSTRUCT();
        //your code
        $this->setModel('air_api_registered');
        $this->air_api_registered = new Air_api_registered("JASERV-CONTROL-API-GHOST");
    }
    public function getCheckEmail($email = "",$cat = 0){
        if($email == "")return $this->setCategoryPrintMessage($cat, false, "email cannot be blank");$temp = $this->inputjaservfilter->emailFiltering($email);	return $this->setCategoryPrintMessage($cat, $temp[0], $temp[1]);
    }
    public function getCheckDomain($domain = "", $cat = 0){
        if($domain == "")return $this->setCategoryPrintMessage($cat, false, "nama cannot be blank");$temp = $this->inputjaservfilter->domainFiltering($domain);	return $this->setCategoryPrintMessage($cat, $temp[0], $temp[1]);
    }
    
    public function getCheckDomainQuery($domain = "", $cat = 0){
        if($domain == "")return $this->setCategoryPrintMessage($cat, false, "nama cannot be blank");$temp = $this->inputjaservfilter->stringFiltering($domain);	return $this->setCategoryPrintMessage($cat, $temp[0], $temp[1]);
    }
    public function getCheckActorLevel($level = null, $cat = 0){
        if($this->isNull($level)) return $this->setCategoryPrintMessage($cat,false,"level cannot be blank");
        if(!is_int($level)) return $this->setCategoryPrintMessage($cat,false,"level must be Integer");
        if($level > 99 || $level < 0) return $this->setCategoryPrintMessage($cat,false,"level not valid");
        return $this->setCategoryPrintMessage($cat,true,"level is valid");
    }
    public function getCheckMahasiswaId($id = null, $cat = 0){
        if($this->isNull($id)) return $this->setCategoryPrintMessage($cat,false,"Mahasiswa id cannot be blank");
        if(!is_int($id)) return $this->setCategoryPrintMessage($cat,false,"Mahasiswa id must be Integer");
        if($id > 2 || $id < 1) return $this->setCategoryPrintMessage($cat,false,"Mahasiswa id is not valid");
        return $this->setCategoryPrintMessage($cat,true,"Mahasiswa id is valid");
    }
    public function getCheckEmployeeId($id = null, $cat = 0){
        if($this->isNull($id)) return $this->setCategoryPrintMessage($cat,false,"Employee id cannot be blank");
        if(!is_int($id)) return $this->setCategoryPrintMessage($cat,false,"Employee id must be Integer");
        if($id > 8 || $id < 1) return $this->setCategoryPrintMessage($cat,false,"Employee id is not valid");
        return $this->setCategoryPrintMessage($cat,true,"Employee id is valid");
    }
    public function setNewApi($data,$cat = 0){
        if(!$this->isArray($data)) return $this->setCategoryPrintMessage($cat, false,"Domain cannot be null");
        $this->air_api_registered->resetValue();
        $this->air_api_registered->setDomain($data['domain']);
        if($this->air_api_registered->getRule1()) return $this->setCategoryPrintMessage($cat,false,"Domain has been registered before");
        $this->air_api_registered->resetValue();
        $this->air_api_registered->setDomain($data['domain']);
        $this->air_api_registered->setEmail($data['email']);
        $this->air_api_registered->setKode($data['mahasiswaid']."".$data['employeeid']);
        $this->air_api_registered->setDateRegistered(date("Y-m-d H:i:s"));
        if($this->air_api_registered->addNewRow()) return $this->setCategoryPrintMessage($cat, true, "Successfully add new api");
         return $this->setCategoryPrintMessage($cat, false, "Failed add new api");
    }
    public function encryptKode($url){
        if(!$this->getCheckDomain($url,1)[0]) return false;
        $this->air_api_registered->resetValue();
        $this->air_api_registered->setDomain($url);
        if(!$this->air_api_registered->getRule1()) return false;
        $kode = $this->getKode($this->air_api_registered->getKode());
        if(is_bool($kode)) return false;
        $this->setHelper('date');
        $year = nice_date($this->air_api_registered->getDateRegistered(),"Y");
        $month = nice_date($this->air_api_registered->getDateRegistered(),"m");
        $day = nice_date($this->air_api_registered->getDateRegistered(),"d");
        $hour = nice_date($this->air_api_registered->getDateRegistered(),"H");
        $minute = nice_date($this->air_api_registered->getDateRegistered(),"i");
        $second = nice_date($this->air_api_registered->getDateRegistered(),"s");
        $a = md5($day.md5(md5(sha1($this->air_api_registered->getEmail()).$year).sha1($day)));
        $b = sha1($hour);
        $c = md5(sha1($minute).sha1($second));
        $tempFinalData = (substr($a,0,8)).($b.substr($a,8,strlen($a)-8)).(substr($b,0,4)).(substr($c,9,strlen($c)-9)).$b.(substr($c,0,9)).(substr($b,4,strlen($b)-4));
        $FINAL_DATA = $tempFinalData."".$kode;
        return $FINAL_DATA;
    }
    public function removeApi($domain){

    }
	public function getListWithCodeStudent($code,$format=1,$status=1){
		$dataArray = array();
        $code = intval($code[0]);
		if($code < 1 || $code > 2)
            return $dataArray;
        $format = intval($format);
        /*
        format
        1 : nim and name 
        2 : full Of Data
        */
		if($format > 1 || $format < 0)
            $format = 1;
         
        $status = intval($status);
         /*
        status
        1 : active account
        2 : not active account
        */
		if($status < 1 || $status > 2)
            $status = 1;
        $this->setModel('air_tab_stu');
        if(!$this->air_tab_stu->getRule1()) return $dataArray;
        $i=0;

        while($this->air_tab_stu->getNextCursor()){
            if($this->air_tab_stu->getStudentStatue() == $status){
                $dataArray[$i]['nama'] = $this->air_tab_stu->getStudentName();
                $dataArray[$i]['nip'] = $this->air_tab_stu->getStudentNim();
                if($format == 2){
                    $dataArray[$i]['email'] = $this->air_tab_stu->getStudentEmail();
                    $dataArray[$i]['angkatan'] = $this->air_tab_stu->getStudentGraduate();
                    $dataArray[$i]['minat'] = $this->air_tab_stu->getStudentInterestResearch();
                    $dataArray[$i]['nohp'] = $this->air_tab_stu->getStudentPhone();
                    $dataArray[$i]['nohportu'] = $this->air_tab_stu->getStudentParentPhone();
                    $dataArray[$i]['alamat'] = $this->air_tab_stu->getStudentAddress();
                    $dataArray[$i]['namaortu'] = $this->air_tab_stu->getStudentParentName();
                    $dataArray[$i]['foto'] = $this->air_tab_stu->getStudentPhoto();
                }
                $i++;
            }
        }
        return $dataArray;
	}
	public function getListWithCodeEmployee($code,$format=1,$status=1){
		$dataArray = array();
        $code = intval($code[1]);
		if($code < 1 || $code > 8)
            return $dataArray;
        $format = intval($format);
        /*
        format
        1 : nim and name 
        2 : full Of Data
        */
		if($format > 1 || $format < 0)
            $format = 1;
         
        $status = intval($status);
         /*
        status
        1 : active account
        2 : not active account
        */
		if($status < 1 || $status > 2)
            $status = 1;
        if($code == 8)
            return $dataArray;
        $this->setModel('air_tab_mem');
        $this->setModel('air_list_dose');
        $this->air_tab_mem->resetValue();
        $this->air_tab_mem->setEmployeeName("*");
        if(!$this->air_tab_mem->getRule3())
            return $dataArray;
        $i=0;
        while($this->air_tab_mem->getNextCursor()){
            if($status == $this->air_tab_mem->getEmployeeStatue()){
                switch($code){
                    case 1 : 
                        $this->air_list_dose->resetValue();
                        $this->air_list_dose->setDosenNip($this->air_tab_mem->getEmployeeNip());
                        if($this->air_list_dose->getRule1()){
                            if($this->air_list_dose->getDosenInternalOrExternal() != 1) break;
                        }
                        $dataArray[$i]['nama'] = $this->air_tab_mem->getEmployeeName();
                        $dataArray[$i]['nip'] = $this->air_tab_mem->getEmployeeNip();
                        if($format == 2){
                            $dataArray[$i]['email'] = $this->air_tab_mem->getEmployeeEmail();
                            $dataArray[$i]['nohp'] = $this->air_tab_mem->getEmployeePhone();
                            $dataArray[$i]['alamat'] = $this->air_tab_mem->getEmployeeAddress();
                            $dataArray[$i]['gender'] = $this->air_tab_mem->getEmployeeGender();
                        }
                        $i++;
                    break;
                    case 2 : 
                        $this->air_list_dose->resetValue();
                        $this->air_list_dose->setDosenNip($this->air_tab_mem->getEmployeeNip());
                        if($this->air_list_dose->getRule1()){
                            if($this->air_list_dose->getDosenInternalOrExternal() == 1) break;
                        }
                        $dataArray[$i]['nama'] = $this->air_tab_mem->getEmployeeName();
                        $dataArray[$i]['nip'] = $this->air_tab_mem->getEmployeeNip();
                        if($format == 2){
                            $dataArray[$i]['email'] = $this->air_tab_mem->getEmployeeEmail();
                            $dataArray[$i]['nohp'] = $this->air_tab_mem->getEmployeePhone();
                            $dataArray[$i]['alamat'] = $this->air_tab_mem->getEmployeeAddress();
                            $dataArray[$i]['gender'] = $this->air_tab_mem->getEmployeeGender();
                        }
                        $i++;
                    break;
                    case 3 : 
                        $this->air_list_dose->resetValue();
                        $this->air_list_dose->setDosenNip($this->air_tab_mem->getEmployeeNip());
                        if($this->air_list_dose->getRule1()){
                            break;
                        }
                        $dataArray[$i]['nama'] = $this->air_tab_mem->getEmployeeName();
                        $dataArray[$i]['nip'] = $this->air_tab_mem->getEmployeeNip();
                        if($format == 2){
                            $dataArray[$i]['email'] = $this->air_tab_mem->getEmployeeEmail();
                            $dataArray[$i]['nohp'] = $this->air_tab_mem->getEmployeePhone();
                            $dataArray[$i]['alamat'] = $this->air_tab_mem->getEmployeeAddress();
                            $dataArray[$i]['gender'] = $this->air_tab_mem->getEmployeeGender();
                        }
                        $i++;
                    break;
                    case 4 : 
                        $dataArray[$i]['nama'] = $this->air_tab_mem->getEmployeeName();
                        $dataArray[$i]['nip'] = $this->air_tab_mem->getEmployeeNip();
                        if($format == 2){
                            $dataArray[$i]['email'] = $this->air_tab_mem->getEmployeeEmail();
                            $dataArray[$i]['nohp'] = $this->air_tab_mem->getEmployeePhone();
                            $dataArray[$i]['alamat'] = $this->air_tab_mem->getEmployeeAddress();
                            $dataArray[$i]['gender'] = $this->air_tab_mem->getEmployeeGender();
                        }
                        $i++;
                    break;
                    case 5 : 
                        $this->air_list_dose->resetValue();
                        $this->air_list_dose->setDosenNip($this->air_tab_mem->getEmployeeNip());
                        if($this->air_list_dose->getRule1()){
                            $dataArray[$i]['nama'] = $this->air_tab_mem->getEmployeeName();
                            $dataArray[$i]['nip'] = $this->air_tab_mem->getEmployeeNip();
                            if($format == 2){
                                $dataArray[$i]['email'] = $this->air_tab_mem->getEmployeeEmail();
                                $dataArray[$i]['nohp'] = $this->air_tab_mem->getEmployeePhone();
                                $dataArray[$i]['alamat'] = $this->air_tab_mem->getEmployeeAddress();
                                $dataArray[$i]['gender'] = $this->air_tab_mem->getEmployeeGender();
                            }
                            $i++;
                        }
                    break;
                    case 6 : 
                        $this->air_list_dose->resetValue();
                        $this->air_list_dose->setDosenNip($this->air_tab_mem->getEmployeeNip());
                        if($this->air_list_dose->getRule1()){
                            if($this->air_list_dose->getDosenInternalOrExternal() == 1){
                                $dataArray[$i]['nama'] = $this->air_tab_mem->getEmployeeName();
                                $dataArray[$i]['nip'] = $this->air_tab_mem->getEmployeeNip();
                                if($format == 2){
                                    $dataArray[$i]['email'] = $this->air_tab_mem->getEmployeeEmail();
                                    $dataArray[$i]['nohp'] = $this->air_tab_mem->getEmployeePhone();
                                    $dataArray[$i]['alamat'] = $this->air_tab_mem->getEmployeeAddress();
                                    $dataArray[$i]['gender'] = $this->air_tab_mem->getEmployeeGender();
                                }
                                $i++;
                            }
                        }
                    break;
                    case 7 : 
                        $this->air_list_dose->resetValue();
                        $this->air_list_dose->setDosenNip($this->air_tab_mem->getEmployeeNip());
                        if($this->air_list_dose->getRule1()){
                            if($this->air_list_dose->getDosenInternalOrExternal() != 1){
                                $dataArray[$i]['nama'] = $this->air_tab_mem->getEmployeeName();
                                $dataArray[$i]['nip'] = $this->air_tab_mem->getEmployeeNip();
                                if($format == 2){
                                    $dataArray[$i]['email'] = $this->air_tab_mem->getEmployeeEmail();
                                    $dataArray[$i]['nohp'] = $this->air_tab_mem->getEmployeePhone();
                                    $dataArray[$i]['alamat'] = $this->air_tab_mem->getEmployeeAddress();
                                    $dataArray[$i]['gender'] = $this->air_tab_mem->getEmployeeGender();
                                }
                                $i++;
                            }
                        }
                    break;
                }
            }
        }
        return $dataArray;
	}
    private function getKode($val){
        intval($val);
        if($val < 11 || $val > 28) return false;
        $val .= "";
        $mhs = array(
            "kode" => array(
                1 => "J24",//=> mahasiswa
                2 => "NJM" //=> !mahasiswa
            ),
            "prefix" => array(
                1 => "_GXCVz",//=> mahasiswa
                2 => "GT_VmN" //=> !mahasiswa
            ),
            "postfix" => array(
                1 => "PCQZzQ",//=> mahasiswa
                2 => "aLlVmN" //=> !mahasiswa
            )
        );
        $pegawai = array(
            "kode" => array(
                1 => "YDI",//=> pegawai->dosen->if
                2 => "NDI",//=> pegawai->dosen->nonIf
                3 => "NDT",//=> pegawai->nonDosen
                4 => "YNN",//=> pegawai->all
                5 => "YND",//=> pegawai->dosen->all
                6 => "YNT",//=> pegawai->dosen->if && !pegawai
                7 => "2NT",//=> pegawai->dosen->nonIf && !pegawai
                8 => "NPA" //=> !pegawai 
            ),
            "prefix" => array(
                1 => "LOoPsS",//=> pegawai->dosen->if
                2 => "6_G0B8",//=> pegawai->dosen->nonIf
                3 => "J75X_C",//=> pegawai->nonDosen
                4 => "Kx99DY",//=> pegawai->all
                5 => "LmoR53",//=> pegawai->dosen->all
                6 => "XloCCk",//=> pegawai->dosen->if && !pegawai
                7 => "EvV45S",//=> pegawai->dosen->nonIf && !pegawai
                8 => "KLbc76" //=> !pegawai 
            ),
            "postfix" => array(
                1 => "5BcdR9",//=> pegawai->dosen->if
                2 => "VVDzz8",//=> pegawai->dosen->nonIf
                3 => "D3C0yS",//=> pegawai->nonDosen
                4 => "QpcD77",//=> pegawai->all
                5 => "B4Y0N3",//=> pegawai->dosen->all
                6 => "Ma551V",//=> pegawai->dosen->if && !pegawai
                7 => "Ft_H_o",//=> pegawai->dosen->nonIf && !pegawai
                8 => "l_09HH" //=> !pegawai 
            )
        );
        if(!array_key_exists(intval($val[0]), $mhs['kode'])) return false;
        if(!array_key_exists(intval($val[1]), $pegawai['kode'])) return false;
        return $mhs['postfix'][intval($val[0])].$pegawai['postfix'][intval($val[1])].$pegawai['kode'][intval($val[1])].$mhs['kode'][intval($val[0])].$mhs['prefix'][intval($val[0])].$pegawai['prefix'][intval($val[1])];
    }
    private function decryptKode($kode){
        
    }
    public function sendToMail($domain){

    }
    private function encryptTempFinal(){
        
    }
}