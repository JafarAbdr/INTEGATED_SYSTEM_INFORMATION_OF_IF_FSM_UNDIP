<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Con_ekspor_jadwal_kuliah extends CI_Controller{
   public function __construct(){
         parent:: __construct();
			$u1 = $this->session->userdata('username');
			$u2 = $this->session->userdata('id_user');
			$u3 = $this->session->userdata('level');
			$this->u3a = $this->session->userdata('level');
			if(ISSET($u1) && ISSET($u2) && ISSET($u3) && ($u1 != "") && ($u2 != "") && ($u3 != "")){
				$this->load->model('mod_report_jadwal_kuliah'); 
			}else{
				redirect('home/login');
			}			
   }
	function export_Jadwal(){
		if(($this->u3a == 1)||($this->u3a == 2)){
	//		$sdata = $this->_getDropDown(); 
			$thn_ajar = $this->input->get('thn_ajar');
			$sdata['thn_ajar'] = $thn_ajar;
			$sdata['thn_ajar'] = $thn_ajar;
			
			$thn_ajar = '\''.$thn_ajar.'\'';
			$semester = $this->input->get('semester');
			$sdata['semester'] = $semester;
			$ssdata['semester'] = $semester;
			
			$semester = '\''.$semester.'\'';
			$hari = $this->mod_report_jadwal_kuliah->get_hari($thn_ajar, $semester);
			$tabel_hari = array();
				for($i=0;$i<count($hari);$i++){
					$tabel_hari['hari'][$i] = $this->mod_report_jadwal_kuliah->get_hari_by_id($hari[$i]['hari'])->hari;
				}
				//print_r($tabel_hari);
				for($i=0;$i<count($tabel_hari['hari']);$i++){
					$jadwal[$tabel_hari['hari'][$i]] = $this->_getJadwal($thn_ajar, $semester, $tabel_hari['hari'][$i]);
				}
				$sdata['tabel_hari'] = $tabel_hari;
				$sdata['jadwal'] = $jadwal;
			$ssdata['table_jadwal'] = $this->load->view('report/jadwalkuliah/table_jadwal',$sdata,TRUE);
			$this->load->view('export/JadwalExcel',$ssdata);
		}else {
			redirect('home/');
		}
	}
	
	function _getJadwal($thn_ajar, $semester, $hari){
		$jadwal = $this->mod_report_jadwal_kuliah->get_all_by_thn_ajar_smt_hari($thn_ajar, $semester, $hari);
		for($i=0;$i<count($jadwal);$i++){
			$hasil_jadwal['id_jadwal'][$i] = $jadwal[$i]['id_jadwal'];
			//$hasil_jadwal['thn_ajar'][$i] = $jadwal[$i]['thn_ajar'];
			//$hasil_jadwal['hari'][$i] = $jadwal[$i]['hari'];
			$hasil_jadwal['jammulai'][$i] = $jadwal[$i]['jammulai'];
			$hasil_jadwal['jamselesai'][$i] = $jadwal[$i]['jamselesai'];
			$hasil_jadwal['ruang'][$i] = $this->mod_report_jadwal_kuliah->get_ruang_by_id($jadwal[$i]['ruang'])[0];
			$hasil_jadwal['matkul'][$i] = $this->mod_report_jadwal_kuliah->get_matkul_by_id($jadwal[$i]['matkul'])[0];
			$hasil_jadwal['kelas'][$i] = $jadwal[$i]['kelas'];
			$hasil_jadwal['dosen_1'][$i] = $this->mod_report_jadwal_kuliah->get_dosen_by_id($jadwal[$i]['dosen_1'])[0];
			$hasil_jadwal['dosen_2'][$i] = $this->mod_report_jadwal_kuliah->get_dosen_by_id($jadwal[$i]['dosen_2'])[0];
		}
		return $hasil_jadwal;
	}
	
   /*-- end of fungsi --*/
}

?>