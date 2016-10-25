<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Con_report_jadwal extends CI_Controller{
   public function __construct(){
         parent:: __construct();
			$u1 = $this->session->userdata('username');
			$u2 = $this->session->userdata('id_user');
			$u3 = $this->session->userdata('level');
			$this->u3a = $this->session->userdata('level');
			if(ISSET($u1) && ISSET($u2) && ISSET($u3) && ($u1 != "") && ($u2 != "") && ($u3 != "")){
				$this->load->model('mod_report_jadwal'); 
			}else{
				redirect('home/login');
			}			
   }
   function index(){
      $sdata['q'] = $this->mod_report_jadwal->get_jadwal_for_view();
		$data['sub'] = 10;
      $data['main_content'] = $this->load->view('report/jadwal/view_jadwal',$sdata,true);
      $this->load->view('template/template',$data);
   }

	function jadwal(){
      $sdata = $this->_getDropDown();
      //Load View
      $data['main_content'] = $this->load->view('report/jadwal/form_jadwal',$sdata,TRUE);
      $data['sub'] = 10;
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
		
		$hari = $this->mod_report_jadwal->get_hari($thn_ajar, $semester);
		if(!isset($hari) or empty($hari)){
         $sdata['hasil_report'] = '
            <div class="row-fluid">
            <div class="span12">
            <div class="widget">
               <div class="widget-title">
                  <div class="icon">
                   <i class="icon20 i-table"></i>
                  </div>
               <h4>Data Jadwal Kuliah</h4><a href="#" class="minimize"></a>
               </div><!-- End .widget-title -->
               <div class="widget-content">
                  Tidak Ada Data Jadwal Kuliah
               </div>
			';
			$data['main_content'] = $this->load->view('report/jadwal/form_jadwal',$sdata,TRUE);
			$data['sub'] = 10;
			$this->load->view('template/template',$data);
		}else{
			$tabel_hari = array();
			for($i=0;$i<count($hari);$i++){
				$tabel_hari['id_hari'][$i] = $this->mod_report_jadwal->get_hari_by_id($hari[$i]['hari'])->id_hari;
				$tabel_hari['nama_hari'][$i] = $this->mod_report_jadwal->get_hari_by_id($hari[$i]['hari'])->nama_hari;
			}
			//print_r($tabel_hari);
			for($i=0;$i<count($tabel_hari['id_hari']);$i++){
				$jadwal[$tabel_hari['id_hari'][$i]] = $this->_getJadwal($thn_ajar, $semester, $tabel_hari['id_hari'][$i]);
			}
			
			$sdata['tabel_hari'] = $tabel_hari;
			$sdata['jadwal'] = $jadwal;
			$ssdata['table_jadwal'] = $this->load->view('report/jadwal/table_jadwal',$sdata, TRUE);
			$sssdata['hasil_report'] = $this->load->view('report/jadwal/view_jadwal',$ssdata, TRUE);
			$data['main_content'] = $this->load->view('report/jadwal/form_jadwal',$sssdata,TRUE);
			$data['sub'] = 10;
			$this->load->view('template/template',$data);
		}
		
	}
	function export_Jadwal(){
		if(($this->u3a == 1)||($this->u3a == 2)){
			$sdata = $this->_getDropDown(); 
			$thn_ajar = $this->input->get('thn_ajar');
			$sdata['thn_ajar'] = $thn_ajar;
			$sdata['thn_ajar'] = $thn_ajar;
			
			$thn_ajar = '\''.$thn_ajar.'\'';
			$semester = $this->input->get('semester');
			$sdata['semester'] = $semester;
			$ssdata['semester'] = $semester;
			
			$semester = '\''.$semester.'\'';
			$hari = $this->mod_report_jadwal->get_hari($thn_ajar, $semester);
			$tabel_hari = array();
				for($i=0;$i<count($hari);$i++){
					$tabel_hari['id_hari'][$i] = $this->mod_report_jadwal->get_hari_by_id($hari[$i]['hari'])->id_hari;
					$tabel_hari['nama_hari'][$i] = $this->mod_report_jadwal->get_hari_by_id($hari[$i]['hari'])->nama_hari;
				}
				//print_r($tabel_hari);
				for($i=0;$i<count($tabel_hari['id_hari']);$i++){
					$jadwal[$tabel_hari['id_hari'][$i]] = $this->_getJadwal($thn_ajar, $semester, $tabel_hari['id_hari'][$i]);
				}
				$sdata['tabel_hari'] = $tabel_hari;
				$sdata['jadwal'] = $jadwal;
			$ssdata['table_jadwal'] = $this->load->view('report/jadwal/table_jadwal',$sdata,TRUE);
			$this->load->view('export/JadwalExcel',$ssdata);
		}else {
			redirect('home/');
		}
	}
	
	function _getJadwal($thn_ajar, $semester, $hari){
		$jadwal = $this->mod_report_jadwal->get_all_by_thn_ajar_smt_hari($thn_ajar, $semester, $hari);
		for($i=0;$i<count($jadwal);$i++){
			$hasil_jadwal['id_jadwal'][$i] = $jadwal[$i]['id_jadwal'];
			//$hasil_jadwal['thn_ajar'][$i] = $jadwal[$i]['thn_ajar'];
			//$hasil_jadwal['hari'][$i] = $jadwal[$i]['hari'];
			$hasil_jadwal['jammulai'][$i] = $jadwal[$i]['jammulai'];
			$hasil_jadwal['jamselesai'][$i] = $jadwal[$i]['jamselesai'];
			$hasil_jadwal['ruang'][$i] = $this->mod_report_jadwal->get_ruang_by_id($jadwal[$i]['ruang'])[0];
			$hasil_jadwal['matkul'][$i] = $this->mod_report_jadwal->get_matkul_by_id($jadwal[$i]['matkul'])[0];
			$hasil_jadwal['kelas'][$i] = $jadwal[$i]['kelas'];
			$hasil_jadwal['dosen_1'][$i] = $this->mod_report_jadwal->get_dosen_by_id($jadwal[$i]['dosen_1'])[0];
			$hasil_jadwal['dosen_2'][$i] = $this->mod_report_jadwal->get_dosen_by_id($jadwal[$i]['dosen_2'])[0];
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
      
      $q = $this->mod_report_jadwal->get_thn_ajar_jadwal();
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