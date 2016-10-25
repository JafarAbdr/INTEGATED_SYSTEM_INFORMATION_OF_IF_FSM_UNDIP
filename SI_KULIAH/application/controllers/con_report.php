<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class con_report extends CI_Controller{
	public function __construct(){
	   parent::__construct();
		$u1 = $this->session->userdata('username');
		$u2 = $this->session->userdata('id_user');
		$u3 = $this->session->userdata('level');
		$this->u3a = $this->session->userdata('level');
		if(ISSET($u1) && ISSET($u2) && ISSET($u3) && ($u1 != "") && ($u2 != "") && ($u3 != "")){
			$this->load->model('mod_report');
		}else{
			redirect('home/login');
		}
	}
   function SKDekan(){
      $sdata = $this->_getDropDown();
      //Load View
      $data['main_content'] = $this->load->view('report/SKDekan/form_SKDekan',$sdata,TRUE);
      $data['sub'] = 9;
      $this->load->view('template/template',$data);
   }   
	
	function SKDekan_view(){
	   $sdata = $this->_getDropDown(); 
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
	   $dosen = $this->_getNamaDosen($thn_ajar,$semester);
      //print_r($dosen);
     
      if(!isset($dosen['id_dosen']) or empty($dosen['id_dosen'])){
         $sdata['hasil_report'] = '
            <div class="row-fluid">
            <div class="span12">
            <div class="widget">
               <div class="widget-title">
                  <div class="icon">
                   <i class="icon20 i-table"></i>
                  </div>
               <h4>Data Dosen</h4><a href="#" class="minimize"></a>
               </div><!-- End .widget-title -->
               <div class="widget-content">
                  Tidak Ada Data beban 
               </div>
			';
			$data['main_content'] = $this->load->view('report/SKDekan/form_SKDekan',$sdata,TRUE);
			$data['sub'] = 9;
			$this->load->view('template/template',$data);
		}else{
			$matkul=array();
			for($i=0;$i<count($dosen['id_dosen']);$i++){
				$id_dosen = $dosen['id_dosen'][$i];
				$matkul[$id_dosen] = $this->_getKelasNamaMatkul($id_dosen,$thn_ajar,$semester);
         }
			//print_r($dosen);
			//echo '<br>';
         //print_r($matkul);
			$sdata['dosen'] = $dosen;
			$sdata['matkul'] = $matkul;
			$ssdata['table_SKDekan'] = $this->load->view('report/SKDekan/table_SKDekan',$sdata,TRUE);
          
			$sssdata['hasil_report'] = $this->load->view('report/SKDekan/view_SKDekan',$ssdata, TRUE);
			$data['main_content'] = $this->load->view('report/SKDekan/form_SKDekan',$sssdata,TRUE);
			$data['sub'] = 9;
			$this->load->view('template/template',$data);
    }
	}
   
	public function exportpdfSK()
    {
    
	    //Load the library
	    $this->load->library('html2pdf');
	    
	    //Set folder to save PDF to
	    //$this->html2pdf->folder('./assets/pdfs/');
	    
	    //Set the filename to save/download as
	    $this->html2pdf->filename('SKDekan.pdf');
	    
	    //Set the paper defaults
	    $this->html2pdf->paper('a4', 'landscape');
	    
	    $data = array(
	    	'title' => 'PDF Created',
	    	'message' => 'Hello World!'
	    );
	    
	    //Load html view
		 $sdata = $this->_getDropDown(); 
      $thn_ajar = $this->input->get('thn_ajar');
      $sdata['thn_ajar'] = $thn_ajar;
      $sdata['thn_ajar'] = $thn_ajar;
      $thn_ajar = '\''.$thn_ajar.'\'';
      $semester = $this->input->get('semester');
      $sdata['semester'] = $semester;
      $ssdata['semester'] = $semester;
      
      $semester = '\''.$semester.'\'';
      $dosen = $this->_getNamaDosen($thn_ajar,$semester);
		$matkul=array();
			for($i=0;$i<count($dosen['id_dosen']);$i++){
				$id_dosen = $dosen['id_dosen'][$i];
				$matkul[$id_dosen] = $this->_getKelasNamaMatkul($id_dosen,$thn_ajar,$semester);
         }
		$sdata['dosen'] = $dosen;
			$sdata['matkul'] = $matkul;
			$this->html2pdf->html($this->load->view('report/SKDekan/table_SKDekan',$sdata,TRUE));
			
	    //$this->html2pdf->html($this->load->view('pdf', $sdata, true));
	    
	    $this->html2pdf->create();
		
	    
    }
	
   function export_SKDekan(){
		if(($this->u3a == 1)||($this->u3a == 2)){
			$sdata = $this->_getDropDown(); 
			$thn_ajar = $this->input->get('thn_ajar');
			$sdata['thn_ajar'] = $thn_ajar;
			$sdata['thn_ajar'] = $thn_ajar;
			//$sdata['selectedYear'] = $thn_ajar;
			$thn_ajar = '\''.$thn_ajar.'\'';
			$semester = $this->input->get('semester');
			$sdata['semester'] = $semester;
			$ssdata['semester'] = $semester;
			//$sdata['selectedSemester'] = $semester;
			$semester = '\''.$semester.'\'';
			//echo '<script>alert("'.$thn_ajar.'")</script>';
			//echo $thn_ajar;
			//echo $semester;
			$dosen = $this->_getNamaDosen($thn_ajar,$semester);
			//print_r($dosen);
			$matkul=array();
				for($i=0;$i<count($dosen['id_dosen']);$i++){
					$id_dosen = $dosen['id_dosen'][$i];
					$matkul[$id_dosen] = $this->_getKelasNamaMatkul($id_dosen,$thn_ajar,$semester);
				}
			$sdata['dosen'] = $dosen;
				$sdata['matkul'] = $matkul;
				$ssdata['table_SKDekan'] = $this->load->view('report/SKDekan/table_SKDekan',$sdata,TRUE);
			$this->load->view('export/SKDekanExcel',$ssdata);
		}else {
			redirect('home/');
		}
	}
   
   function _getNamaDosen($thn_ajar,$semester){
      //get dosen 1
      //simpan ke dalam array
      $temp = $this->mod_report->get_distinct_dosen_1($thn_ajar,$semester);
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
      $temp = $this->mod_report->get_distinct_dosen_2($thn_ajar,$semester);
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
      $nama_dosen = array();
      $nip = array();
      $pangkat = array();
      $jabatan = array();
      for($inc=0;$inc<count($dosen);$inc++){
         $q = $this->mod_report->get_nama_nip_pangkat_jabatan_dosen_by_id($dosen[$inc]);   
         $nama_dosen[$inc] = $q->nama_dosen;
         $nip[$inc] = $q->nip;
         $pangkat[$inc] = $q->pangkat;
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

   function _getKelasNamaMatkul($id_dosen,$thn_ajar,$semester){
      $array_alphabet = range('A','Z');
      //print_r($array_alphabet);
      $temp = $this->mod_report->get_kelas_matkul_by_id_dosen($id_dosen,$thn_ajar,$semester);
      //echo count($temp);
     // echo '<br/>';
     // print_r($temp);
      //echo '<br/>';
      $m = count($temp);
      $matkul['m'] = $m;
      for($i=0;$i<$m;$i++){
         $n = $temp[$i]['jumlah_kelas'];
         $q1 = $this->mod_report->get_nama_sks_matkul_by_id($temp[$i]['matkul']);
         $id_beban = $temp[$i]['id_beban'];
         $q2 = $this->mod_report->get_dosen1_dosen2_by_id_dosen($id_beban);
         $nama_matkul = $q1->nama_matkul;
         $sks = $q1->sks;
         if($q2->dosen_1===$q2->dosen_2){
            $tim_pengampu = 1;   
         }else{
            $tim_pengampu = 2;
         }
         
         $matkul['jumlah_kelas'][$i] = $n;
         for($j=0;$j<$n;$j++){
            $matkul['nama_matkul'][$i][$j] = $nama_matkul;   
            $matkul['sks'][$i][$j] = $sks;   
            $matkul['kelas'][$i][$j] = $array_alphabet[$j];
            $matkul['tim_pengampu'][$i][$j] = $tim_pengampu;
         }
         
      }
      //echo $matkul['kelas'][0][2];
      //echo $matkul['sks'][1][0];
      //print_r($matkul);
      //echo '<br/>';
      return $matkul;
   }

   function _getDropDown(){
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
      
      $q = $this->mod_report->get_thn_ajar_bebanif();
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