<?php

class con_ekspor_SKDekan extends CI_Controller{
	public function __construct(){
	   parent::__construct();
      $this->load->model('mod_report_skdekan');
	}
   
   function export_SKDekan(){
      $thn_ajar = $this->input->get('thn_ajar');
      $sdata['thn_ajar'] = $thn_ajar;
      $sdata['thn_ajar'] = $thn_ajar;
      $thn_ajar = '\''.$thn_ajar.'\'';
      
	  $semester = $this->input->get('semester');
      $sdata['semester'] = $semester;
      $ssdata['semester'] = $semester;
      $semester = '\''.$semester.'\'';
      
	  $dosen = $this->_get_nama_dosen($thn_ajar,$semester);
      //print_r($dosen);
		$matkul=array();
			for($i=0;$i<count($dosen['id_dosen']);$i++){
				$id_dosen = $dosen['id_dosen'][$i];
				$matkul[$id_dosen] = $this->_get_kelas_nama_matkul($id_dosen,$thn_ajar,$semester);
         }
		$sdata['dosen'] = $dosen;
		$sdata['matkul'] = $matkul;
		$tempo = $this->_get_tgl_dekan();
		$sdata['nama_dekan'] = $tempo['nama_dekan'];
		$sdata['nip'] = $tempo['nip'];
		$sdata['tanggal'] = $tempo['tanggal'];
		$ssdata['hasil_table'] = $this->load->view('report/SKDekan/tabel_SKDekan',$sdata,TRUE);
      $this->load->view('export/SKDekanExcel',$ssdata);
   }
   
   function _get_tgl_dekan(){
      $q = $this->mod_report_skdekan->get_nama_nip_dekan();
      //print_r($q);
      $temp = date("m");
      //echo $temp;   
      switch ($temp) {
         case 1:
            $bulan = "Januari";
            break;
         case 2:
            $bulan = "Februari";
            break;
         case 3:
            $bulan = "Maret";
            break;
         case 4:
            $bulan = "April";
            break;
         case 5:
            $bulan = "Mei";
            break;
         case 6:
            $bulan = "Juni";
            break;
         case 7:
            $bulan = "Juli";
            break;
         case 8:
            $bulan = "Agustus";
            break;
         case 9:
            $bulan = "September";
            break;         
         case 10:
            $bulan = "Oktober";
            break;
         case 11:
            $bulan = "November";
            break;
         case 12:
            $bulan = "Desember";
            break;            
         default:
            break;
      }
      $tanggal = date("d").' '.$bulan.' '.date("Y");
      //echo $tanggal;
      $return['nama_dekan'] = $q->nama_pimpinan;
      $return['nip'] = $this->_pemecah_nip($q->nip);
      $return['tanggal'] = $tanggal;
		return $return;
   }
   
   function _get_nama_dosen($thn_ajar,$semester){
      //get dosen 1
      //simpan ke dalam array
      $temp = $this->mod_report_skdekan->get_distinct_dosen_1($thn_ajar,$semester);
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
      $temp = $this->mod_report_skdekan->get_distinct_dosen_2($thn_ajar,$semester);
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
         $q = $this->mod_report_skdekan->get_nama_nip_pangkat_jabatan_dosen_by_id($dosen[$inc]);   
         $nama_dosen[$inc] = $q->nama_dosen;
         $nip[$inc] = $this->_pemecah_nip($q->nip);
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

   function _get_kelas_nama_matkul($id_dosen,$thn_ajar,$semester){
      $array_alphabet = range('A','Z');
      //print_r($array_alphabet);
      $temp = $this->mod_report_skdekan->get_kelas_matkul_by_id_dosen($id_dosen,$thn_ajar,$semester);
      //echo count($temp);
     // echo '<br/>';
     // print_r($temp);
      //echo '<br/>';
      $m = count($temp);
      $matkul['m'] = $m;
      for($i=0;$i<$m;$i++){
         $n = $temp[$i]['jumlah_kelas'];
         $q1 = $this->mod_report_skdekan->get_nama_sks_matkul_by_id($temp[$i]['matkul']);
         $id_pengampu = $temp[$i]['id_pengampu'];
         $q2 = $this->mod_report_skdekan->get_dosen1_dosen2_by_id_pengampu($id_pengampu);
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
   
   function _pemecah_nip($nip){
      $a = substr($nip,0,8);            
      $b = substr($nip,8,6);            
      $c = substr($nip,14,1);            
      $d = substr($nip,15);
      return $a.''.$b.''.$c.''.$d;            
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
      
      $q = $this->mod_report_skdekan->get_thn_ajar_pengampu();
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