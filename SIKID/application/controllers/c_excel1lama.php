<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Excel extends CI_Controller {
	function __construct() { 
		parent::__construct();
		
		$this->load->model('m_penelitian');
		$this->load->model('m_pengabdian');
		$this->load->model('m_user');
		$this->load->model('m_report');
	}

function export($tahun){
		
		$jenis=$this->session->flashdata('jenis');
		$stt=$this->session->flashdata('status');
		$usr=$this->session->flashdata('user');
		$dosen=$this->session->flashdata('nama');
		$nip=$this->session->flashdata('nip');
		
		
		
		
		$this->load->library('PHPExcel');
		$sheet = $this->phpexcel->getActiveSheet();
		$sheet->getColumnDimension('A')->setWidth(4);
		$sheet->getColumnDimension('B')->setWidth(40);
		$sheet->getColumnDimension('C')->setWidth(8);
		$sheet->getColumnDimension('D')->setWidth(15);
		$sheet->getColumnDimension('E')->setWidth(30);
		$sheet->getColumnDimension('F')->setWidth(12);
		/*
		$sheet->getColumnDimension('G')->setWidth(15);
		$sheet->getColumnDimension('H')->setWidth(13);
		$sheet->getColumnDimension('I')->setWidth(13);
		$sheet->getColumnDimension('J')->setWidth(20);
		$sheet->getColumnDimension('K')->setWidth(15);
		$sheet->getColumnDimension('L')->setWidth(14);
		$sheet->getColumnDimension('M')->setWidth(13);
		$sheet->getColumnDimension('N')->setWidth(24);
		*/
		$sheet->getStyle('E1')->getFont()->setSize(20);
		$sheet->mergeCells('E1:G1');
		$sheet->setCellValue('E1',$jenis.' Dosen Informatika');
		
		$sheet->setCellValue('A3','No');
		$sheet->setCellValue('B3','Dosen');
		$sheet->setCellValue('C3','NIP');
		$sheet->setCellValue('D3','Jurnal');
		$sheet->setCellValue('E3','Prosiding');
		$sheet->setCellValue('F3','AK');
		/*
		$sheet->setCellValue('G3','Jenis Dana');
		$sheet->setCellValue('H3','Alokasi Dana');
		$sheet->setCellValue('I3','Status');
		$sheet->setCellValue('J3','Tempat');
		$sheet->setCellValue('K3','Nomor Kontrak');
		$sheet->setCellValue('L3','Tangal Kontrak');
		$sheet->setCellValue('M3','Batas Kontrak');
		$sheet->setCellValue('N3','Nama Penandatangan');
		*/
		
		$sheet->getStyle('A3')->getFont()->setBold(true);
		$sheet->getStyle('B3')->getFont()->setBold(true);
		$sheet->getStyle('C3')->getFont()->setBold(true);
		$sheet->getStyle('D3')->getFont()->setBold(true);
		$sheet->getStyle('E3')->getFont()->setBold(true);
		$sheet->getStyle('F3')->getFont()->setBold(true);
		/*
		$sheet->getStyle('G3')->getFont()->setBold(true);
		$sheet->getStyle('H3')->getFont()->setBold(true);
		$sheet->getStyle('I3')->getFont()->setBold(true);
		$sheet->getStyle('J3')->getFont()->setBold(true);
		$sheet->getStyle('K3')->getFont()->setBold(true);
		$sheet->getStyle('L3')->getFont()->setBold(true);
		$sheet->getStyle('M3')->getFont()->setBold(true);
		$sheet->getStyle('N3')->getFont()->setBold(true);
		*/
		
		$sheet->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('B3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('D3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('E3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('F3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/*
		$sheet->getStyle('G3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('H3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('I3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('J3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('K3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('L3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('M3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('N3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		*/
		
		//database
//		if ($dosen=='')
	/*	
		if ($jenis=='Penelitian'){
			if($usr=='jurusan'){
				if($tahun=='All'&&$stt=='Status'){ 
					$query = $this->m_penelitian->get_all_name();
				}else if ($tahun=='All'&&$stt!='Status'){
					$query = $this->db->$this->db->query("select * FROM penelitian where status='$stt' order by tahun desc")->result_array();
				}else if ($tahun!='All'&&$stt=='Status'){
					$query = $this->db->query("select * FROM penelitian WHERE tahun=$tahun")->result_array();
				}else if ($tahun!='All'&&$stt!='Status'){
					$query = $this->db->query("select * FROM penelitian WHERE tahun=$tahun and status='$stt'")->result_array();
				}
			}
			if ($usr!='jurusan'){
				if($tahun=='All'){ 
					$query = $this->m_penelitian->get_all_name();
				} else if ($tahun!='All'){
					$thn=$tahun;
					$query = $this->db->query("select * FROM penelitian WHERE tahun=$thn")->result_array();
				}
			}
		}
		
		if ($jenis=='Pengabdian'){
			if($usr=='jurusan'){
				if($tahun=='All'&&$stt=='Status'){ 
					$query = $this->m_pengabdian->get_all_name();
				}else if ($tahun=='All'&&$stt!='Status'){
					$query = $this->db->$this->db->query("select * FROM pengabdian where status='$stt' order by tahun desc")->result_array();
				}else if ($tahun!='All'&&$stt=='Status'){
					$query = $this->db->query("select * FROM pengabdian WHERE tahun=$tahun")->result_array();
				}else if ($tahun!='All'&&$stt!='Status'){
					$query = $this->db->query("select * FROM pengabdian WHERE tahun=$tahun and status='$stt'")->result_array();
				}
			}if($usr!='jurusan'){
				if($tahun=='All'){ 
				$query = $this->m_pengabdian->get_all_name();
				} else if ($tahun!='All'){
					$thn=$tahun;
					$query = $this->db->query("select * FROM pengabdian WHERE tahun=$thn")->result_array();
				}
			}
		}
		//end database
		*/
		
		
		//border
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
			
			$nama_anggota=implode(', ',$nama[$i]);
			
			*/
			
			
			
			//error_reporting(E_ALL^(E_NOTICE | E_WARNING));
			$query1 = $this->m_user->get_dosen();
			$jumlah = count($query1);
			for ($i=0;  $i<$jumlah; $i++){
				$data = $query1[$i];
				
				
		$tbl = $this->m_report->get_Jurnal_by_NIP($data['nip']);
						//print_r($tbl);
						$judul = "";
						$nilai = 0;
						foreach($tbl as $row){
							$judul = $judul . $row['judul'] . "<br><br>";
							if ($row['anggota'] == ""){
							//mandiri
								if(strtolower($row['status']) == "internasional"){
									$nilai = $nilai + 25;
								}else if (strtolower($row['status']) == "nasional terakreditasi"){
									$nilai = $nilai + 15;
								}else if (strtolower($row['status']) == "nasional tidak terakreditasi"){
									$nilai = $nilai + 10;
								}
							} else {
								//ketua
								if(strtolower($row['status']) == "internasional"){
									$nilai = $nilai + ((60/100)*25);
								}else if (strtolower($row['status']) == "nasional terakreditasi"){
									$nilai = $nilai + ((60/100)*15);
								}else if (strtolower($row['status']) == "nasional tidak terakreditasi"){
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
								if(strtolower($row['status']) == "internasional"){
									$nilai2 = $nilai2 + ((40/100)*25);
								}else if (strtolower($row['status']) == "nasional terakreditasi"){
									$nilai2 = $nilai2 + ((40/100)*15);
								}else if (strtolower($row['status']) == "nasional tidak terakreditasi"){
									$nilai2 = $nilai2 + ((40/100)*10);
								}
							} else if (count($anggota) == 2) {
								if(strtolower($row['status']) == "internasional"){
									$nilai2 = $nilai2 + ((20/100)*25);
								}else if (strtolower($row['status']) == "nasional terakreditasi"){
									$nilai2 = $nilai2 + ((20/100)*25);
								}else if (strtolower($row['status']) == "nasional tidak terakreditasi"){
									$nilai2 = $nilai2 + ((20/100)*25);
								}
							} else if (count($anggota) == 3) {
								if(strtolower($row['status']) == "internasional"){
									$nilai2 = $nilai2 + ((13.3/100)*25);
								}else if (strtolower($row['status']) == "nasional terakreditasi"){
									$nilai2 = $nilai2 + ((13.3/100)*25);
								}else if (strtolower($row['status']) == "nasional tidak terakreditasi"){
									$nilai2 = $nilai2 + ((13.3/100)*25);
								}
							} 
							
						}
		}
		
		
			$sheet->setCellValue('A'.($i+4).'',($i+1));
			$sheet->setCellValue('B'.($i+4).'',$data['nama']);
			$sheet->setCellValue('C'.($i+4).'',$data['nip']);
			$sheet->setCellValue('D'.($i+4).'',$judul, $judul2);
			//$sheet->setCellValue('E'.($i+4).'',$judul3 $judul4);
			//$sheet->setCellValue('F'.($i+4).'',$total);
			/*
			$sheet->setCellValue('G'.($i+4).'',$data['jenis_dana']);
			$sheet->setCellValue('H'.($i+4).'',$data['alokasi_dana']);
			$sheet->setCellValue('I'.($i+4).'',$data['status']);
			$sheet->setCellValue('J'.($i+4).'',$data['tempat']);
			$sheet->setCellValue('K'.($i+4).'',$data['no_kontrak']);
			$sheet->setCellValue('L'.($i+4).'',$data['tgl_kontrak']);
			$sheet->setCellValue('M'.($i+4).'',$data['batas_kontrak']);
			$sheet->setCellValue('N'.($i+4).'',$data['nama_ttd']);
			*/
		}
		
		$writer = new PHPExcel_Writer_Excel5($this->phpexcel);
		header('Content-type: application/vnd.ms-excel');
		$writer->save('php://output');
	}
	
}