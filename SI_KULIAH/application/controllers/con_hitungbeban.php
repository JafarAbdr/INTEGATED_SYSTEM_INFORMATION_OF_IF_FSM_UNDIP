<?php
   class Con_hitungbeban extends CI_Controller{
      public function __construct(){
         parent::__construct();
         $this->load->model('mod_hitungbeban');
      }
      function index(){
         $sdata = $this->_get_drop_down();
         //load View
         $data['main_content'] = $this->load->view('hitungbeban/form_hitungbeban',$sdata,TRUE);
         $data['sub'] = 13;
         $this->load->view('template/template',$data);
      }
      function view(){
         $thn_ajar = $this->input->post('thn_ajar');
         $semester = $this->input->post('semester');
         if($semester==='Semua'){
            $sdata = $this->_get_drop_down();
            
            //$sdata['thn_ajar'] = $thn_ajar;
            $sdata['thn_ajar'] = $thn_ajar;
            $sdata['selectedYear'] = $thn_ajar;
            //$thn_ajar = '\''.$thn_ajar.'\'';
            $sdata['semester'] = $semester;
            $sdata['selectedSemester'] = 'Semua';
            $sem_1 = 'Ganjil';
            $sem_2 = 'Genap';
            //$sdata = $this->_get_drop_down();
            $sdata['Ganjil'] = $this->_view_ganjil_genap($thn_ajar, $sem_1);
            $sdata['Genap'] = $this->_view_ganjil_genap($thn_ajar, $sem_2);
			$sdata['dosen'] = $sdata['Ganjil']['dosen'];
            unset($sdata['Ganjil']['dropdownYear']);
            unset($sdata['Ganjil']['selectedYear']);
            unset($sdata['Ganjil']['dropdownSemester']);
            unset($sdata['Ganjil']['selectedSemester']);
            unset($sdata['Ganjil']['dosen']);
            unset($sdata['Ganjil']['thn_ajar']);
            unset($sdata['Ganjil']['semester']);
            unset($sdata['Genap']['dropdownYear']);
            unset($sdata['Genap']['selectedYear']);
            unset($sdata['Genap']['dropdownSemester']);
            unset($sdata['Genap']['selectedSemester']);
            unset($sdata['Genap']['dosen']);
            unset($sdata['Genap']['thn_ajar']);
            unset($sdata['Genap']['semester']);

            
            //print_r($sdata);
            //$this->load->view('hitungbeban/tabel_hitung_semua',$sdata);
				$ssdata['tabel_SKDekan'] = $this->load->view('hitungbeban/tabel_hitung_semua',$sdata,TRUE);
				$sssdata['hasil_report'] = $this->load->view('hitungbeban/view_hitungbeban',$ssdata, TRUE);
				$data['main_content'] = $this->load->view('hitungbeban/form_hitungbeban',$sssdata,TRUE);
				$data['sub'] = 13;
				$this->load->view('template/template',$data);
         }else{
            $sdata = $this->_view_ganjil_genap($thn_ajar, $semester);
				//print_r($sdata);
				//$this->load->view('hitungbeban/tabel_hitung_semester',$sdata);
				$ssdata['tabel_SKDekan'] = $this->load->view('hitungbeban/tabel_hitung_semester',$sdata,TRUE);
				$sssdata['hasil_report'] = $this->load->view('hitungbeban/view_hitungbeban',$ssdata, TRUE);
				$data['main_content'] = $this->load->view('hitungbeban/form_hitungbeban',$sssdata,TRUE);
				$data['sub'] = 13;
				$this->load->view('template/template',$data);
         }            
      }
      
      function _view_ganjil_genap($thn_ajar, $semester){
         $data = $this->_get_drop_down();
         $data['thn_ajar'] = $thn_ajar;
         $data['selectedYear'] = $thn_ajar;
         $thn_ajar = '\''.$thn_ajar.'\'';
         $data['semester'] = $semester;
         $data['selectedSemester'] = $semester;
         $semester = '\''.$semester.'\'';
         $dosen = $this->_get_all_dosen($thn_ajar,$semester);
			//untuk informatika
         $matkul[0] = array();
			for($i=0;$i<count($dosen['id_dosen']);$i++){
				$id_dosen = $dosen['id_dosen'][$i];
				$matkul[0][$id_dosen] = $this->_get_kelas_nama_matkul($id_dosen,$thn_ajar,$semester);
			}
			$data['dosen'] = $dosen;
			
			//untuk fsm
			$matkul[1] = array();
			for($i=0;$i<count($dosen['id_dosen']);$i++){
				$id_dosen = $dosen['id_dosen'][$i];
				$matkul[1][$id_dosen] = $this->_get_kelas_nama_matkul_fsm($id_dosen,$thn_ajar,$semester);
			}
			
			//untuk non fsm
			$matkul[2] = array();
			for($i=0;$i<count($dosen['id_dosen']);$i++){
				$id_dosen = $dosen['id_dosen'][$i];
				$matkul[2][$id_dosen] = $this->_get_kelas_nama_matkul_non_fsm($id_dosen,$thn_ajar,$semester);
			}
			
			//print_r($matkul);
			//pemrosesan data
			$banyakdata = count($dosen['id_dosen']);
         for($i=0;$i<$banyakdata;$i++){
				//informatika
				$id_dosen = $dosen['id_dosen'][$i];
            $m = $matkul[0][$id_dosen]['banyak_matakuliah'];
            $sks_real = array();
            for($j=0;$j<$m;$j++){
               $temp_sksmatkul = $matkul[0][$id_dosen]['sks'][$j];
               $temp_jmldosen = $matkul[0][$id_dosen]['jumlah_dosen'][$j];
              
               $temp_jmlkls = $matkul[0][$id_dosen]['jumlah_kelas'][$j];
               $sks_real[$j] = $temp_sksmatkul*$temp_jmlkls/$temp_jmldosen;
               //echo $sks_real[$j];
            }
				$sks_keseluruhan[0][$id_dosen] = array_sum($sks_real);
				
            //fsm
            $sks_real_fsm = array();
            if(isset($matkul[1][$id_dosen]['banyak_matakuliah'])){
               $m = $matkul[1][$id_dosen]['banyak_matakuliah'];
               for($j=0;$j<$m;$j++){
						$temp_sksmatkul = $matkul[1][$id_dosen]['sks'][$j];
						$temp_jmldosen = $matkul[1][$id_dosen]['jumlah_dosen'][$j];
						$temp_jmlkls = $matkul[1][$id_dosen]['jumlah_kelas'][$j];
						$sks_real_fsm[$j] = $temp_sksmatkul*$temp_jmlkls/$temp_jmldosen;
						//echo $sks_real_fsm[$j];
               }
            }
			$sks_keseluruhan[1][$id_dosen] = array_sum($sks_real_fsm);
				
				//non fsm
            $sks_real_non_fsm = array();
            if(isset($matkul[2][$id_dosen]['banyak_matakuliah'])){
               $m = $matkul[2][$id_dosen]['banyak_matakuliah'];
               for($j=0;$j<$m;$j++){
						$temp_sksmatkul = $matkul[2][$id_dosen]['sks'][$j];
						$temp_jmldosen = $matkul[2][$id_dosen]['jumlah_dosen'][$j];
						$temp_jmlkls = $matkul[2][$id_dosen]['jumlah_kelas'][$j];
						$sks_real_non_fsm[$j] = $temp_sksmatkul*$temp_jmlkls/$temp_jmldosen;
						//echo $sks_real_non_fsm[$j];
               }
            }
				$sks_keseluruhan[2][$id_dosen] = array_sum($sks_real_non_fsm);
			}
			//print_r($sks_keseluruhan);
			$data['sks_keseluruhan'] = $sks_keseluruhan;
			return $data;
				
			
      }
   
	//function get all data dosen
	function _get_all_dosen(){
		$temp = $this->mod_hitungbeban->get_id_nama_nip_dosen();
		//print_r($temp);
		$i=0;
		foreach($temp as $hasil){
			$data['id_dosen'][$i] = $hasil->id_dosen;
			$data['nama_dosen'][$i] = $hasil->nama_dosen;
			$data['nip'][$i] = $hasil->nip;
			$i++;
		}
		//print_r($data);
		return $data;
	}

   
	
	function _get_kelas_nama_matkul($id_dosen,$thn_ajar,$semester){
		$array_alphabet = range('A','Z');
      //print_r($array_alphabet);
      $temp = $this->mod_hitungbeban->get_kelas_matkul_by_id_dosen($id_dosen,$thn_ajar,$semester);
		//print_r($temp);
		if(empty($temp)){
			$matkul['banyak_matakuliah'] = 0;
			$matkul['sks'][0] = 0;
         $matkul['jumlah_dosen'][0] = 0;
         $matkul['jumlah_kelas'][0] = 0;
			return $matkul;
		}else{
			$m = count($temp);
			$matkul['banyak_matakuliah'] = $m;
			for($i=0;$i<$m;$i++){
				$n = $temp[$i]['jumlah_kelas'];
				//$jumlah_matkul += $n;
				$q1 = $this->mod_hitungbeban->get_nama_sks_semesterke_matkul_by_id($temp[$i]['matkul']);
				$id_pengampu = $temp[$i]['id_pengampu'];
				$q2 = $this->mod_hitungbeban->get_dosen1_dosen2_by_id_pengampu($id_pengampu);
				$sks = $q1->sks;
				if($q2->dosen_1===$q2->dosen_2){
					$jumlah_dosen = 1;   
				}else{
					$jumlah_dosen = 2;
				}
				$matkul['sks'][$i] = $sks;
				$matkul['jumlah_dosen'][$i] = $jumlah_dosen;
				$matkul['jumlah_kelas'][$i] = $n;
			}
			return $matkul;
		}
	}

	function _get_kelas_nama_matkul_fsm($id_dosen,$thn_ajar,$semester){
		$array_alphabet = range('A','Z');
      //print_r($array_alphabet);
      $temp = $this->mod_hitungbeban->get_kelas_matkul_by_id_dosen_fsm($id_dosen,$thn_ajar,$semester);
		//print_r($temp);
		if(empty($temp)){
			$matkul['banyak_matakuliah'] = 0;
			$matkul['sks'][0] = 0;
         $matkul['jumlah_dosen'][0] = 0;
         $matkul['jumlah_kelas'][0] = 0;
			return $matkul;
		}else{
			$m = count($temp);
			$matkul['banyak_matakuliah'] = $m;
			for($i=0;$i<$m;$i++){
				$n = $temp[$i]['jumlah_kelas'];
				//$jurusan = $temp[$i]['jurusan'];
				$id_pengampu = $temp[$i]['id_beban_non_if'];
				$q2 = $this->mod_hitungbeban->get_dosen1_dosen2_by_id_beban_fsm($id_pengampu);
				$sks = $temp[$i]['sks'];
				if($q2->dosen_1===$q2->dosen_2){
					$jumlah_dosen = 1;   
				}else{
					$jumlah_dosen = 2;
				}
				$matkul['sks'][$i] = $sks;
				$matkul['jumlah_dosen'][$i] = $jumlah_dosen;
				$matkul['jumlah_kelas'][$i] = $n;
			}
			return $matkul;
		}
	}
	
   function _get_kelas_nama_matkul_non_fsm($id_dosen,$thn_ajar,$semester){
		$array_alphabet = range('A','Z');
      //print_r($array_alphabet);
      $temp = $this->mod_hitungbeban->get_kelas_matkul_by_id_dosen_non_fsm($id_dosen,$thn_ajar,$semester);
		//print_r($temp);
		if(empty($temp)){
			$matkul['banyak_matakuliah'] = 0;
			$matkul['sks'][0] = 0;
         $matkul['jumlah_dosen'][0] = 0;
         $matkul['jumlah_kelas'][0] = 0;
			return $matkul;
		}else{
			$m = count($temp);
			$matkul['banyak_matakuliah'] = $m;
			for($i=0;$i<$m;$i++){
				$n = $temp[$i]['jumlah_kelas'];
				//$jurusan = $temp[$i]['jurusan'];
				$id_pengampu = $temp[$i]['id_beban_non_fsm'];
				$q2 = $this->mod_hitungbeban->get_dosen1_dosen2_by_id_beban_non_fsm($id_pengampu);
				$sks = $temp[$i]['sks'];
				if($q2->dosen_1===$q2->dosen_2){
					$jumlah_dosen = 1;   
				}else{
					$jumlah_dosen = 2;
				}
				$matkul['sks'][$i] = $sks;
				$matkul['jumlah_dosen'][$i] = $jumlah_dosen;
				$matkul['jumlah_kelas'][$i] = $n;
			}
			return $matkul;
		}
	}
	
   function _get_drop_down(){
      //SELECT TAHUN
      $dropdownYear[''] = '';
      $year = date('Y');
      $month = date('n');
      if($month<=6){
         $dropdownYear[($year-1).'/'.($year)] = ($year-1).'/'.($year);
         $selectedYear = ($year-1).'/'.($year);
      }else{
         $dropdownYear[($year).'/'.($year+1)] = ($year).'/'.($year+1);
         $selectedYear = ($year).'/'.($year+1);
      }
      
      $q = $this->mod_hitungbeban->get_thn_ajar_pengampu();
      foreach($q as $hasil){
         $dropdownYear[$hasil->thn_ajar] = $hasil->thn_ajar;
      }
      $sdata['dropdownYear'] = $dropdownYear;
      $sdata['selectedYear'] = $selectedYear;
      
      //SELECT SEMESTER
      $dropdownSemester[''] = '';
      $dropdownSemester['Ganjil'] = 'Ganjil';
      $dropdownSemester['Genap'] = 'Genap';
      $dropdownSemester['Semua'] = 'Semua';
      $sdata['dropdownSemester'] = $dropdownSemester;
      if($month<=6){
         $sdata['selectedSemester'] = 'Genap';
      }else{
         $sdata['selectedSemester'] = 'Ganjil';
      }
      return $sdata;
   }
      
   }
?>