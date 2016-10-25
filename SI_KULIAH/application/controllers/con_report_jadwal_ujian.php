<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Con_report_jadwal_ujian extends CI_Controller{
   public function __construct(){
         parent:: __construct();
			$u1 = $this->session->userdata('username');
			$u2 = $this->session->userdata('id_user');
			$u3 = $this->session->userdata('level');
			$this->u3a = $this->session->userdata('level');
			if(ISSET($u1) && ISSET($u2) && ISSET($u3) && ($u1 != "") && ($u2 != "") && ($u3 != "")){
				$this->load->model('mod_report_jadwal_ujian'); 
			}else{
				redirect('home/login');
			}			
   }
   function index(){
      $sdata['q'] = $this->mod_report_jadwal_ujian->get_jadwal_for_view();
		$data['sub'] = 16;
      $data['main_content'] = $this->load->view('report/jadwalujian/view_jadwal',$sdata,true);
      $this->load->view('template/template',$data);
   }

	function jadwal(){
      $sdata = $this->_getDropDown();
      //Load View
      $data['main_content'] = $this->load->view('report/jadwalujian/form_jadwal',$sdata,TRUE);
      $data['sub'] = 16;
      $this->load->view('template/template',$data);
   }   
	
	function jadwal_view(){
		
		
	  $sdata = $this->_getDropDown(); 
	  $thn_ajar = $this->input->post('thn_ajar');
	  //echo '<br/><br/><br/><br/>';
	  //echo $thn_ajar;
      $sdata['thn_ajar'] = $thn_ajar;
      $ssdata['thn_ajar'] = $thn_ajar;
      $sdata['selectedYear'] = $thn_ajar;
      $thn_ajar = '\''.$thn_ajar.'\'';
	  
	  $semester = $this->input->post('semester');
	  //echo $semester;
      $sdata['semester'] = $semester;
      $ssdata['semester'] = $semester;
      $sdata['selectedSemester'] = $semester;
      $semester = '\''.$semester.'\'';
	
	  $uts_uas = $this->input->post('uts_uas');
	  //echo $semester;
      $sdata['uts_uas'] = $uts_uas;
      $ssdata['uts_uas'] = $uts_uas;
      $sdata['selecteduts_uas'] = $uts_uas;
      $uts_uas = '\''.$uts_uas.'\'';
	  
		$tanggal = $this->mod_report_jadwal_ujian->get_tanggal($thn_ajar, $semester, $uts_uas);
		
		if(!isset($tanggal) or empty($tanggal)){
		 $sdata['hasil_report'] = '
            <div class="row-fluid">
            <div class="span12">
            <div class="widget">
               <div class="widget-title">
                  <div class="icon">
                   <i class="icon20 i-table"></i>
                  </div>
               <h4>Data Jadwal Ujian</h4><a href="#" class="minimize"></a>
               </div><!-- End .widget-title -->
               <div class="widget-content">
                  Tidak Ada Data Jadwal Ujian
               </div>
			';
			$data['main_content'] = $this->load->view('report/jadwalujian/form_jadwal',$sdata,TRUE);
			$data['sub'] = 16;
			$this->load->view('template/template',$data);
		}else{
			//$tabel_hari = array();
			$tabel_tanggal = array();
			//print_r($tanggal);
			for($i=0;$i<count($tanggal);$i++){
				$tabel_tanggal[$i] = $tanggal[$i]['tanggal'];
			}
			//echo 'tanggal';
			//print_r($tabel_tanggal);
			//print_r($tabel_hari);
			
			for($i=0;$i<count($tabel_tanggal);$i++){
				$jadwal[$tabel_tanggal[$i]] = $this->_getJadwal($thn_ajar, $semester, $uts_uas, $tabel_tanggal[$i]);
			}
			//print_r($jadwal);
			$sdata['tabel_tanggal'] = $tabel_tanggal;
			$sdata['jadwal'] = $jadwal;
			
			$tempo = $this->_get_tgl_kajur();
			$sdata['nama_kajur'] = $tempo['nama_kajur'];
			$sdata['nip'] = $tempo['nip'];
			
			$temporar = $this->_get_tgl_koorprodi();
			$sdata['nama_koorprodi'] = $temporar['nama_koorprodi'];
			$sdata['nip3'] = $temporar['nip3'];
			
			$tempor = $this->_get_tgl_pd1();
			$sdata['nama_pd1'] = $tempor['nama_pd1'];
			$sdata['nip2'] = $tempor['nip2'];
			
			$sdata['tanggal'] = $tempo['tanggal'];
			
			$ssdata['table_jadwal'] = $this->load->view('report/jadwalujian/table_jadwal',$sdata, TRUE);
			$sssdata['hasil_report'] = $this->load->view('report/jadwalujian/view_jadwal',$ssdata, TRUE);
			$data['main_content'] = $this->load->view('report/jadwalujian/form_jadwal',$sssdata,TRUE);
			$data['sub'] = 16;
			$this->load->view('template/template',$data);
		}
		
	}
	
	function _get_tgl_pd1(){
      $q = $this->mod_report_jadwal_ujian->get_nama_nip_pd1();
      $return['nama_pd1'] = $q->nama_pimpinan;
      $return['nip2'] = $this->_pemecah_nip($q->nip);
	  return $return;
   }
   function _get_tgl_koorprodi(){
      $q = $this->mod_report_jadwal_ujian->get_nama_nip_koorprodi();
      $return['nama_koorprodi'] = $q->nama_pimpinan;
      $return['nip3'] = $this->_pemecah_nip($q->nip);
	  return $return;
   }
	
	function _get_tgl_kajur(){
      $q = $this->mod_report_jadwal_ujian->get_nama_nip_kajur();
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
      $return['nama_kajur'] = $q->nama_pimpinan;
      $return['nip'] = $this->_pemecah_nip($q->nip);
      $return['tanggal'] = $tanggal;
		return $return;
   }
   
   function _pemecah_nip($nip){
      $a = substr($nip,0,8);            
      $b = substr($nip,8,6);            
      $c = substr($nip,14,1);            
      $d = substr($nip,15);
      return $a.''.$b.''.$c.''.$d;            
   }
	
	function _getJadwal($thn_ajar, $semester, $uts_uas, $tanggal){
		$jadwal = 'a';
		$jadwal = $this->mod_report_jadwal_ujian->get_all_by_thn_ajar_smt_tanggal($thn_ajar, $semester, $uts_uas, $tanggal);
		//print_r($jadwal); echo "</br>";
		for($i=0;$i<count($jadwal);$i++){
			$hasil_jadwal['id_jadwal'][$i] = $jadwal[$i]['id_jadwal'];
			//$hasil_jadwal['thn_ajar'][$i] = $jadwal[$i]['thn_ajar'];
			//$hasil_jadwal['hari'][$i] = $jadwal[$i]['hari'];
			$hasil_jadwal['jammulai'][$i] = $jadwal[$i]['jammulai'];
			$hasil_jadwal['jamselesai'][$i] = $jadwal[$i]['jamselesai'];
			//$hasil_jadwal['ruang'][$i] = $this->mod_report_jadwal_ujian->get_ruang_by_id($jadwal[$i]['ruang'])[0];
			$hasil_jadwal['matkul'][$i] = $this->mod_report_jadwal_ujian->get_matkul_by_id($jadwal[$i]['matkul'])[0];
			$hasil_jadwal['kelas'][$i] = $jadwal[$i]['kelas'];
			$hasil_jadwal['tanggal'][$i] = $jadwal[$i]['tanggal'];
			$hasil_jadwal['peserta'][$i] = $jadwal[$i]['peserta'];
			$hasil_jadwal['dosen_1'][$i] = $this->mod_report_jadwal_ujian->get_dosen_by_id($jadwal[$i]['dosen_1'])[0];
			$hasil_jadwal['dosen_2'][$i] = $this->mod_report_jadwal_ujian->get_dosen_by_id($jadwal[$i]['dosen_2'])[0];
		}
		return $hasil_jadwal;
	}
	
   /*-- end of fungsi --*/
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
      
      $q = $this->mod_report_jadwal_ujian->get_thn_ajar_jadwal();
      foreach($q as $hasil){
         $dropdownYear[$hasil->thn_ajar] = $hasil->thn_ajar;
      }
      $sdata['dropdownYear'] = $dropdownYear;
      $sdata['selectedYear'] = $selectedYear;
      
	  //SELECT UTS UAS
      $dropdownuts_uas[''] = '';
      $dropdownuts_uas['UTS'] = 'UTS';
      $dropdownuts_uas['UAS'] = 'UAS';
      $sdata['dropdownuts_uas'] = $dropdownuts_uas;
      if($month<=4){
         $sdata['selecteduts_uas'] = 'UTS';
      }else{
         $sdata['selecteduts_uas'] = 'UAS';
      }
	  
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