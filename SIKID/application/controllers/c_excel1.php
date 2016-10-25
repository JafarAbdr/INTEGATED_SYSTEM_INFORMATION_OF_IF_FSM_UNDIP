<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class c_excel1 extends CI_Controller {
	function __construct() { 
		parent::__construct();
		$this->load->model('m_jurnal');
		$this->load->model('m_prosiding');
		$this->load->model('m_user');
		$this->load->model('m_upload');
		$this->load->model('m_report');
	}

	
	function export(){
	//error_reporting(E_ALL^(E_NOTICE | E_WARNING));
		$this->load->library("PHPExcel");
		
			$objPHPExcel = new PHPExcel();
		
            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A2', 'No')
                                        ->setCellValue('B2', 'Nama')
                                        ->setCellValue('C2', 'NIM')
                                        ->setCellValue('D2', 'Jurnal')
                                        ->setCellValue('E2', 'Prosiding')
                                        ->setCellValue('F2', 'AK');
            $objPHPExcel->getActiveSheet()->setTitle('Excel Pertama');
			$objActiveSheet = $objPHPExcel->setActiveSheetIndex(0);
			$tblDosen =$this->m_user->get_dosen();
			$no = 0;
			foreach($tblDosen as $rowDosen)
			{
			$no = $no + 1;
				$tblJurnal = $this->m_report->get_Jurnal_by_NIP($rowDosen['nip']);
				
						//isi isi jurnal
						$judul = "";
						$nilai = 0;
						foreach($tblJurnal as $row){
							$judul = $judul . $row['judul'] . " ; ";
							if ($row['anggota'] == ""){
							//mandiri
								if(strtolower($row['kategori']) == "internasional"){
									$nilai = $nilai + 25;
								}else if (strtolower($row['kategori']) == "nasional terakreditasi"){
									$nilai = $nilai + 15;
								}else if (strtolower($row['kategori']) == "nasional tidak terakreditasi"){
									$nilai = $nilai + 10;
								}
							} else {
								//ketua
								if(strtolower($row['kategori']) == "internasional"){
									$nilai = $nilai + ((60/100)*25);
								}else if (strtolower($row['kategori']) == "nasional terakreditasi"){
									$nilai = $nilai + ((60/100)*15);
								}else if (strtolower($row['kategori']) == "nasional tidak terakreditasi"){
									$nilai = $nilai + ((60/100)*10);
								}
							}
							
						}
						
						
				$tblJurnal2 = $this->m_report->get_Jurnal2_by_NIP($rowDosen['nip']);
						//anggota
						$anggota=explode("//",'anggota');
						
						$judul2 = "";
						$nilai2 = 0;
						foreach($tblJurnal2 as $row){
							$judul2 = $judul2 . $row['judul'] . " ; ";
							
							//1 anggota
							if (count($anggota) == 1) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai2 = $nilai2 + ((40/100)*25);
								}else if (strtolower($row['kategori']) == "nasional terakreditasi"){
									$nilai2 = $nilai2 + ((40/100)*15);
								}else if (strtolower($row['kategori']) == "nasional tidak terakreditasi"){
									$nilai2 = $nilai2 + ((40/100)*10);
								}
							} else if (count($anggota) == 2) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai2 = $nilai2 + ((20/100)*25);
								}else if (strtolower($row['kategori']) == "nasional terakreditasi"){
									$nilai2 = $nilai2 + ((20/100)*25);
								}else if (strtolower($row['kategori']) == "nasional tidak terakreditasi"){
									$nilai2 = $nilai2 + ((20/100)*25);
								}
							} else if (count($anggota) == 3) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai2 = $nilai2 + ((13.3/100)*25);
								}else if (strtolower($row['kategori']) == "nasional terakreditasi"){
									$nilai2 = $nilai2 + ((13.3/100)*25);
								}else if (strtolower($row['kategori']) == "nasional tidak terakreditasi"){
									$nilai2 = $nilai2 + ((13.3/100)*25);
								}
							} 
							
						}
						
						
				$tblJurnal3 = $this->m_report->get_Prosiding_by_NIP($rowDosen['nip']);
						$judul3 = "";
						$nilai3 = 0;
						foreach($tblJurnal3 as $row){
							$judul3 = $judul3 . $row['judul'] . " ; ";
							if ($row['anggota'] == ""){
							//mandiri
								if(strtolower($row['kategori']) == "internasional"){
									$nilai3 = $nilai3 + 25;
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai3 = $nilai3 + 10;
								}
							} else {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai3 = $nilai3 + ((60/100)*25);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai3 = $nilai3 + ((60/100)*10);
								}
							}
						}
				$tblJurnal4 = $this->m_report->get_Prosiding2_by_NIP($rowDosen['nip']);
						$anggota2=explode("//",'anggota');
					
						$judul4 = "";
						$nilai4 = 0;
						foreach($tblJurnal4 as $row){
							$judul4 = $judul4 . $row['judul'] . " ; ";
							//$jum = mysql_num_row('anggota');
							//if ($jum== ""){
							
							//1 anggota
							if (count($anggota2) == 1) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai4 = $nilai4 + ((40/100)*25);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai4 = $nilai4 + ((40/100)*10);
								}
							} else if (count($anggota2) == 2) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai4 = $nilai4 + ((20/100)*25);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai4 = $nilai4 + ((20/100)*10);
								}
							} else if (count($anggota2) == 3) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai4 = $nilai4 + ((13.3/100)*25);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai4 = $nilai4 + ((13.3/100)*10);
								}
							}
						}		
						
						$total = $nilai + $nilai2 + $nilai3 + $nilai4;
					if ($rowDosen['nip'] !=""){
						$objActiveSheet->setCellValue('A'.($no+2), $no);
						$objActiveSheet->setCellValue('B'.($no+2), $rowDosen['nama']);
						$objActiveSheet->setCellValueExplicit('C'.($no+2), $rowDosen['nip'],PHPExcel_Cell_DataType::TYPE_STRING);
						$objActiveSheet->setCellValue('D'.($no+2), $judul.$judul2);
						$objActiveSheet->setCellValue('E'.($no+2), $judul3.$judul4);
						$objActiveSheet->setCellValue('F'.($no+2), $total);
					}
			}
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="hasilExcel.xlsx"');
            $objWriter->save("php://output");
	}
	
}