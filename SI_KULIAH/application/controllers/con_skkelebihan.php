<?php
	class Con_skkelebihan extends CI_Controller{
	   public function __construct(){
         parent::__construct();
         $u1 = $this->session->userdata('username');
         $u2 = $this->session->userdata('id_user');
         $u3 = $this->session->userdata('level');
         $this->u3a = $this->session->userdata('level');
         if(ISSET($u1) && ISSET($u2) && ISSET($u3) && ($u1 != "") && ($u2 != "") && ($u3 != "")){
            $this->load->model('mod_skkelebihan'); 
         }else{
            redirect('home/login');
         }
         
      }
		function index(){
      	$sdata = $this->_get_drop_down();
      	//Load View
      	$data['main_content'] = $this->load->view('report/SKKelebihan/form_SKKelebihan',$sdata,TRUE);
      	$data['sub'] = 15;
      	$this->load->view('template/template',$data);
   	}
      
      function view(){
      $sdata = $this->_get_drop_down(); 
      $thn_ajar = $this->input->post('thn_ajar');
      $sdata['thn_ajar'] = $thn_ajar;
      $ssdata['thn_ajar'] = $thn_ajar;
      $sdata['selectedYear'] = $thn_ajar;
      $thn_ajar = '\''.$thn_ajar.'\'';
      $semester = $this->input->post('semester');
      $sdata['semester'] = $semester;
      $ssdata['semester'] = $semester;
      $sdata['selectedSemester'] = $semester;
      $semester = '\''.$semester.'\'';
      //echo '<script>alert("'.$thn_ajar.'")</script>';
      //echo $thn_ajar;
      //echo $semester;
		
		//dosen informatika
      $dosen = $this->_get_nama_dosen($thn_ajar,$semester);
      //print_r($dosen);
     
		//dosen fsm		
      if((!isset($dosen['id_dosen'])) || (empty($dosen['id_dosen'])) || ($dosen==null)){
         $sdata['hasil_report'] = '
            <div class="row-fluid">
            <div class="span12">
            <div class="widget">
               <div class="widget-title">
                  <div class="icon">
                   <i class="icon20 i-table"></i>
                  </div>
               <h4>SKKelebihan Mengajar '.$sdata['thn_ajar'].' '.$sdata['semester'].'</h4><a href="#" class="minimize"></a>
               </div><!-- End .widget-title -->
               <div class="widget-content">
                  Tidak Ada Data Beban Mengajar pada waktu yang dipilih.
               </div>
         ';
         $data['main_content'] = $this->load->view('report/SKKelebihan/form_SKKelebihan',$sdata,TRUE);
         $data['sub'] = 15;
         $this->load->view('template/template',$data);
      }else{
         $matkul[0]=array();
         for($i=0;$i<count($dosen['id_dosen']);$i++){
            $id_dosen = $dosen['id_dosen'][$i];
            $matkul[0][$id_dosen] = $this->_get_kelas_nama_matkul($id_dosen,$thn_ajar,$semester);
         }
         //print_r($dosen);
        //  echo '<br>';
         //print_r($matkul);
         $sdata['dosen'] = $dosen;      
			$dosenfsm = $this->_get_nama_dosen_fsm($thn_ajar,$semester);
			$matkul[1]=array();
			for($i=0;$i<count($dosenfsm['id_dosen']);$i++){
            $id_dosen = $dosenfsm['id_dosen'][$i];
            $matkul[1][$id_dosen] = $this->_get_kelas_nama_matkul_fsm($id_dosen,$thn_ajar,$semester);
			}
			//print_r($matkul);
			//print_r($matkul[1]);
		   /*$rowspanDosen = $matkul[0][1]['banyak_matakuliah'];
               if(isset($matkul[1][1]['banyak_matakuliah'])){
                  $rowspanDosen += $matkul[1][1]['banyak_matakuliah'];
               }
         echo $rowspanDosen;*/
		
		   $sdata['matkul'] = $matkul;
         $sdata['sks_wajib'] = $this->input->post('skswajib');
         //$this->load->view('report/SKKelebihan/tabel_SKKelebihan',$sdata);
         
         $ssdata['hasil_tabel'] = $this->load->view('report/SKKelebihan/tabel_SKKelebihan',$sdata,TRUE);
         $ssdata['level'] = $this->session->userdata('level'); 
         $sssdata['hasil_report'] = $this->load->view('report/SKKelebihan/view_SKKelebihan',$ssdata, TRUE);
         $data['main_content'] = $this->load->view('report/SKKelebihan/form_SKKelebihan',$sssdata,TRUE);
         $data['sub'] = 15;
         $this->load->view('template/template',$data);
          
		}
		
   }
   
   function export_all_data(){
      $thn_ajar = $this->input->get('thn_ajar');
      $sdata['thn_ajar'] = $thn_ajar;
      $ssdata['thn_ajar'] = $thn_ajar;
      $thn_ajar = '\''.$thn_ajar.'\'';
      $semester = $this->input->get('semester');
      $sdata['semester'] = $semester;
      $ssdata['semester'] = $semester;
      $semester = '\''.$semester.'\'';
      
		//dosen informatika
      $dosen = $this->_get_nama_dosen($thn_ajar,$semester);
      $matkul[0]=array();
      for($i=0;$i<count($dosen['id_dosen']);$i++){
         $id_dosen = $dosen['id_dosen'][$i];
         $matkul[0][$id_dosen] = $this->_get_kelas_nama_matkul($id_dosen,$thn_ajar,$semester);
      }
      $sdata['dosen'] = $dosen;      
		$dosenfsm = $this->_get_nama_dosen_fsm($thn_ajar,$semester);
		$matkul[1]=array();
		for($i=0;$i<count($dosenfsm['id_dosen']);$i++){
         $id_dosen = $dosenfsm['id_dosen'][$i];
			$matkul[1][$id_dosen] = $this->_get_kelas_nama_matkul_fsm($id_dosen,$thn_ajar,$semester);
		}
		$sdata['matkul'] = $matkul;
      $sdata['sks_wajib'] = $this->input->get('skswajib');
      $ssdata['hasil_table'] = $this->load->view('report/SKKelebihan/tabel_SKKelebihan',$sdata,TRUE);
      $this->load->view('export/SKKelebihanExcel',$ssdata);
   }
   
   function export_tanpa_nol(){
      $thn_ajar = $this->input->get('thn_ajar');
      $sdata['thn_ajar'] = $thn_ajar;
      $ssdata['thn_ajar'] = $thn_ajar;
      $thn_ajar = '\''.$thn_ajar.'\'';
      $semester = $this->input->get('semester');
      $sdata['semester'] = $semester;
      $ssdata['semester'] = $semester;
      $semester = '\''.$semester.'\'';
      
      //dosen informatika
      $dosen = $this->_get_nama_dosen($thn_ajar,$semester);
      $matkul[0]=array();
      for($i=0;$i<count($dosen['id_dosen']);$i++){
         $id_dosen = $dosen['id_dosen'][$i];
         $matkul[0][$id_dosen] = $this->_get_kelas_nama_matkul($id_dosen,$thn_ajar,$semester);
      }
      $sdata['dosen'] = $dosen;      
      $dosenfsm = $this->_get_nama_dosen_fsm($thn_ajar,$semester);
      $matkul[1]=array();
      for($i=0;$i<count($dosenfsm['id_dosen']);$i++){
         $id_dosen = $dosenfsm['id_dosen'][$i];
         $matkul[1][$id_dosen] = $this->_get_kelas_nama_matkul_fsm($id_dosen,$thn_ajar,$semester);
      }
      $sdata['matkul'] = $matkul;
      $sdata['sks_wajib'] = $this->input->get('skswajib');
      $ssdata['hasil_table'] = $this->load->view('report/SKKelebihan/tabel_SKKelebihan_tanpa_nol',$sdata,TRUE);
      $this->load->view('export/SKKelebihanExcel',$ssdata);       
   }
   
	// data dosen jurusan informatika
   function _get_nama_dosen($thn_ajar,$semester){
      //get dosen 1
      //simpan ke dalam array
      $temp = $this->mod_skkelebihan->get_distinct_dosen_1($thn_ajar,$semester);
      if(!isset($temp)){
         return;
      }else{
      //print_r($temp);
      $i = 0;
      $d1 = array();
      foreach($temp as $hasil){
         $d1[$i] = $hasil->dosen_1;
         $i++;
      }
      //get dosen 2
      //simpan ke dalam array
      $temp = $this->mod_skkelebihan->get_distinct_dosen_2($thn_ajar,$semester);
      $i = 0;
      $d2 = array();
      foreach($temp as $hasil){
         $d2[$i] = $hasil->dosen_2;
         $i++;
      }
      //gabung dan sort dosen;
      $dosen = array_merge($d1,$d2);
      if((empty($dosen[0])) || (empty($dosen)) || (!isset($dosen))){
         //echo "tes";
         return null;
      }
      unset($d1);
      unset($d2);
      sort($dosen, SORT_NATURAL | SORT_FLAG_CASE);
      $nama_dosen = array();
      $nip = array();
      $pangkat = array();
      $jabatan = array();
      for($inc=0;$inc<count($dosen);$inc++){
         $q = $this->mod_skkelebihan->get_nama_nip_pangkat_jabatan_dosen_by_id($dosen[$inc]);   
         $nama_dosen[$inc] = $q->nama_dosen;
         $nip[$inc] = $this->_pemecah_nip($q->nip);
         $pangkat[$inc] = substr($q->pangkat, strpos($q->pangkat, "/") + 2);
         $jabatan[$inc] = $q->jabatan;
         unset($q);         
               
      }
      $data['id_dosen'] = $dosen;
      $data['nama_dosen'] = $nama_dosen;
      $data['nip'] = $nip;
      $data['pangkat'] = $pangkat;
      $data['jabatan'] = $jabatan;
      return $data;}
   }
	
	// get beban oleh id_dosen jurusan informatika
   function _get_kelas_nama_matkul($id_dosen,$thn_ajar,$semester){
      $array_alphabet = range('A','Z');
      //print_r($array_alphabet);
      $temp = $this->mod_skkelebihan->get_kelas_matkul_by_id_dosen($id_dosen,$thn_ajar,$semester);
      //echo count($temp);
     // echo '<br/>';
     // print_r($temp);
      //echo '<br/>';
      $m = count($temp);
      $matkul['banyak_matakuliah'] = $m;
      //$jumlah_matkul = 0;
      for($i=0;$i<$m;$i++){
         $n = $temp[$i]['jumlah_kelas'];
         $kelas = '(';
			for($j=0;$j<$n;$j++){
				$kelas .= $array_alphabet[$j];
				if($j+1!=$n){
					$kelas .= ',';
				}
			}
			$kelas .= ')';
         //$jumlah_matkul += $n;
         $q1 = $this->mod_skkelebihan->get_nama_sks_semesterke_matkul_by_id($temp[$i]['matkul']);
         $id_pengampu = $temp[$i]['id_pengampu'];
         $q2 = $this->mod_skkelebihan->get_dosen1_dosen2_by_id_pengampu($id_pengampu);
         $nama_matkul = $q1->nama_matkul;
         $sks = $q1->sks;
         $semesterke = $q1->semesterke;
         if($semesterke==='Pilihan'){
            $semesterke = 'PIL';
         }
         if($q2->dosen_1===$q2->dosen_2){
            $tim_pengampu = 'MANDIRI';
            $jumlah_dosen = 1;   
         }else{
            $tim_pengampu = 'TIM';
            $jumlah_dosen = 2;
         }
         
         $matkul['semesterke'][$i] = $semesterke;
         $matkul['nama_matkul'][$i] = $nama_matkul;
         $matkul['jurusan_kelas'][$i] = 'Ilmu Komputer / Informatika '.$kelas;
         $matkul['tim_pengampu'][$i] = $tim_pengampu;
         $matkul['jumlah_kelas'][$i] = $n;
         $matkul['sks'][$i] = $sks;
         $matkul['jumlah_dosen'][$i] = $jumlah_dosen;
         $matkul['jumlah_kelas'][$i] = $n;
      }
      //$matkul['jumlah_matkul'] = $jumlah_matkul;
      //echo $matkul['kelas'][0][2];
      //echo $matkul['sks'][1][0];
      //print_r($matkul);
      //echo '<br/>';
      return $matkul;
   }
	
	//get dosen fsm
	function _get_nama_dosen_fsm($thn_ajar,$semester){
		$temp = $this->mod_skkelebihan->get_distinct_dosen_1_fsm($thn_ajar,$semester);
      if(!isset($temp)){
         return;
      }else{
      //print_r($temp);
      $i = 0;
      $d1 = array();
      foreach($temp as $hasil){
         $d1[$i] = $hasil->dosen_1;
         $i++;
      }
      //get dosen 2
      //simpan ke dalam array
      $temp = $this->mod_skkelebihan->get_distinct_dosen_2_fsm($thn_ajar,$semester);
      $i = 0;
      $d2 = array();
      foreach($temp as $hasil){
         $d2[$i] = $hasil->dosen_2;
         $i++;
      }
      //gabung dan sort dosen;
      $dosen = array_merge($d1,$d2);
      unset($d1);
      unset($d2);
      sort($dosen, SORT_NATURAL | SORT_FLAG_CASE);
		$data['id_dosen'] = $dosen;
		//print_r($data);
		
      return $data;
		}
	}
	
	//get beban fsm
	function _get_kelas_nama_matkul_fsm($id_dosen,$thn_ajar,$semester){
      $array_alphabet = range('A','Z');
      //print_r($array_alphabet);
      $temp = $this->mod_skkelebihan->get_kelas_matkul_by_id_dosen_fsm($id_dosen,$thn_ajar,$semester);
      //echo count($temp);
     // echo '<br/>';
     // print_r($temp);
      //echo '<br/>';
      $m = count($temp);
      $matkul['banyak_matakuliah'] = $m;
      //$jumlah_matkul = 0;
      for($i=0;$i<$m;$i++){
         $n = $temp[$i]['jumlah_kelas'];
			$kelas = '(';
			for($j=0;$j<$n;$j++){
				$kelas .= $array_alphabet[$j];
				if($j+1!=$n){
					$kelas .= ',';
				}
			}
			$kelas .= ')';
         //$jumlah_matkul += $n;
			$jurusan = $temp[$i]['jurusan'];
         $id_pengampu = $temp[$i]['id_beban_non_if'];
         $q2 = $this->mod_skkelebihan->get_dosen1_dosen2_by_id_beban_fsm($id_pengampu);
         $nama_matkul = $temp[$i]['matkul'];//$q1->nama_matkul;
         $sks = $temp[$i]['sks'];//$q1->sks;
         $semesterke = $temp[$i]['semesterke'];
         if($semesterke==='Pilihan'){
            $semesterke = 'PIL';
         }
         if($q2->dosen_1===$q2->dosen_2){
            $tim_pengampu = 'MANDIRI';
            $jumlah_dosen = 1;   
         }else{
            $tim_pengampu = 'TIM';
            $jumlah_dosen = 2;
         }
         
         $matkul['semesterke'][$i] = $semesterke;
         $matkul['nama_matkul'][$i] = $nama_matkul;
         $matkul['jurusan_kelas'][$i] = $jurusan.' '.$kelas;
         $matkul['tim_pengampu'][$i] = $tim_pengampu;
         //$matkul['jumlah_kelas'][$i] = $n;
         $matkul['sks'][$i] = $sks;
         $matkul['jumlah_dosen'][$i] = $jumlah_dosen;
         $matkul['jumlah_kelas'][$i] = $n;
         
      }
      //$matkul['jumlah_matkul'] = $jumlah_matkul;
      //echo $matkul['kelas'][0][2];
      //echo $matkul['sks'][1][0];
      //print_r($matkul);
      //echo '<br/>';
      return $matkul;
   }
		
	function _pemecah_nip($nip){
      $a = substr($nip,0,8);            
      $b = substr($nip,8,6);            
      $c = substr($nip,14,1);            
      $d = substr($nip,15);
      return $a.' '.$b.' '.$c.' '.$d;            
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
      
      $q = $this->mod_skkelebihan->get_thn_ajar_pengampu();
      foreach($q as $hasil){
         $dropdownYear[$hasil->thn_ajar] = $hasil->thn_ajar;
      }
      $sdata['dropdownYear'] = $dropdownYear;
      $sdata['selectedYear'] = $selectedYear;
      
      //SELECT SEMESTER
      $dropdownSemester[''] = '';
      $dropdownSemester['Ganjil'] = 'Ganjil';
      $dropdownSemester['Genap'] = 'Genap';
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