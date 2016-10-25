<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Excel extends CI_Controller {
	function __construct() { 
		parent::__construct();
		
		$this->load->model('m_jurnal');
		$this->load->model('m_prosiding');
		$this->load->model('m_user');
		$this->load->model('m_report');
	}

	function export(){
			
			$jenis=$this->session->flashdata('jenis');
			$stt=$this->session->flashdata('kategori');
			$usr=$this->session->flashdata('user');
			$dosen=$this->session->flashdata('nama');
			$nip=$this->session->flashdata('nip');
			
			
			
			$this->load->library('PHPExcel');
			$sheet = $this->phpexcel->getActiveSheet();
			$sheet->getColumnDimension('A')->setWidth(4);
			$sheet->getColumnDimension('B')->setWidth(40);
			$sheet->getColumnDimension('C')->setWidth(20);
			$sheet->getColumnDimension('D')->setWidth(40);
			$sheet->getColumnDimension('E')->setWidth(40);
			$sheet->getColumnDimension('F')->setWidth(12);

			$sheet->getRowDimension('4')->setRowHeight(100);
			$sheet->getRowDimension('5')->setRowHeight(100);
			$sheet->getRowDimension('6')->setRowHeight(100);
			$sheet->getRowDimension('7')->setRowHeight(100);
			$sheet->getRowDimension('8')->setRowHeight(100);
			$sheet->getRowDimension('9')->setRowHeight(100);
			
			$sheet->getStyle('D4')->getAlignment('MiddleAlign')->setWrapText(true);
			
			$sheet->getStyle('E1')->getFont()->setSize(20);
			$sheet->mergeCells('E1:G1');
			$sheet->setCellValue('E1',$jenis.' Dosen Informatika');
			
			$sheet->setCellValue('A3','No');
			$sheet->setCellValue('B3','Dosen');
			$sheet->setCellValue('C3','NIP');
			$sheet->setCellValue('D3','Jurnal');
			$sheet->setCellValue('E3','Prosiding');
			$sheet->setCellValue('F3','AK');

			
			$sheet->getStyle('A3')->getFont()->setBold(true);
			$sheet->getStyle('B3')->getFont()->setBold(true);
			$sheet->getStyle('C3')->getFont()->setBold(true);
			$sheet->getStyle('D3')->getFont()->setBold(true);
			$sheet->getStyle('E3')->getFont()->setBold(true);
			$sheet->getStyle('F3')->getFont()->setBold(true);
		
			
			$sheet->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('B3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('D3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('E3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('F3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			
			/*//border
			$styleArray = array(
			  'borders' => array(
				'allborders' => array(
				  'style' => PHPExcel_Style_Border::BORDER_THIN
				)
			  )
			);
			$d=count($query)+3;
			$sheet->getStyle('A3:N'.$d)->applyFromArray($styleArray);
			unset($styleArray);
			//end border
			*/
			
			/*
			for ($i=0;$i<count($query);$i++){
				
				$data=$query[$i];
				$ketua=explode(',',$data['ketua']);
				$anggota[$i]=explode("//",$data['anggota']);
				for($j=0;$j<count($anggota[$i]);$j++){
					if (!empty($anggota[$i])){
						$pecah[$i][$j]=explode('--',$anggota[$i][$j]);
					}
				}
				
				for($k=0;$k<count($pecah[$i]);$k++){
					$nama[$i][$k]=$pecah[$i][$k][0];
					
				}
				*/
				//$anggota=implode(', ',$nama[$i]);
				
				
				
				error_reporting(E_ALL^(E_NOTICE | E_WARNING));
				$query = $this->m_user->get_dosen();
				$jumlah = count($query);
				for ($i=0;  $i<$jumlah; $i++){
					$data = $query[$i];
					
					
					$tbl = $this->m_report->get_Jurnal_by_NIP($data['nip']);
							//print_r($tbl);
							$judul = "";
							$nilai = 0;
							foreach($tbl as $row){
								$judul = $judul . $row['judul'] . "<br><br>";
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
							
							$tbl2 = $this->m_report->get_Jurnal2_by_NIP($data['nip']);
							//anggota
							$anggota=explode("//",$tbl2['anggota']);
							//for($i=0;$i<count($anggota);$i++){
								//$pecah[$i]=explode('--',$anggota[$i]);
							//}
							//$jum = count($pecah[$i]);
							//print_r(".count($anggota).");

							$judul2 = "";
							$nilai2 = 0;
							foreach($tbl2 as $row){
								$judul2 = $judul2 . $row['judul'] . "<br><br>";
								//$jum = mysql_num_row('anggota');
								//if ($jum== ""){
								
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
								
								
								$tbl3 = $this->m_report->get_Prosiding_by_NIP($data['nip']);
						$judul3 = "";
						$nilai3 = 0;
						foreach($tbl3 as $row){
							$judul3 = $judul3 . $row['judul'] . "<br><br>";
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
						$tbl4 = $this->m_report->get_Prosiding2_by_NIP($data['nip']);
						$anggota2=explode("//",$tbl4['anggota']);
						//for($i=0;$i<count($anggota);$i++){
							//$pecah[$i]=explode('--',$anggota[$i]);
						//}
						//$jum = count($pecah[$i]);
						//print_r(".count($anggota).");

						$judul4 = "";
						$nilai4 = 0;
						foreach($tbl4 as $row){
							$judul4 = $judul4 . $row['judul'] . "<br><br>";
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
						
				
			
					
					$sheet->setCellValue('A'.($i+4).'',($i+1));
					$sheet->setCellValue('B'.($i+4).'',$data['nama']);
					$sheet->setCellValue('C'.($i+4).'',$data['nip']);
					$sheet->setCellValue('D'.($i+4).'',$judul, $judul2);
					$sheet->setCellValue('E'.($i+4).'',$judul3, $judul4);
					$sheet->setCellValue('F'.($i+4).'',$total);
				
				}
			
		
				$writer = new PHPExcel_Writer_Excel2007($this->phpexcel);
				header('Content-type: application/vnd.ms-excel');
				$writer->save('php://output');
	}
}	
?>
