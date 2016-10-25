<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Excel extends CI_Controller {
	function __construct() { 
		parent::__construct();
		
		$this->load->model('m_penelitian');
		$this->load->model('m_pengabdian');
	}

function export($tahun){
		
		$jenis=$this->session->flashdata('jenis');
		$stt=$this->session->flashdata('status');
		$usr=$this->session->flashdata('user');
		
		$this->load->library('PHPExcel');
		$sheet = $this->phpexcel->getActiveSheet();
		$sheet->getColumnDimension('A')->setWidth(4);
		$sheet->getColumnDimension('B')->setWidth(40);
		$sheet->getColumnDimension('C')->setWidth(8);
		$sheet->getColumnDimension('D')->setWidth(15);
		$sheet->getColumnDimension('E')->setWidth(30);
		$sheet->getColumnDimension('F')->setWidth(12);
		$sheet->getColumnDimension('G')->setWidth(15);
		$sheet->getColumnDimension('H')->setWidth(13);
		$sheet->getColumnDimension('I')->setWidth(13);
		$sheet->getColumnDimension('J')->setWidth(20);
		$sheet->getColumnDimension('K')->setWidth(15);
		$sheet->getColumnDimension('L')->setWidth(14);
		$sheet->getColumnDimension('M')->setWidth(13);
		$sheet->getColumnDimension('N')->setWidth(24);
		
		$sheet->getStyle('E1')->getFont()->setSize(20);
		$sheet->mergeCells('E1:G1');
		$sheet->setCellValue('E1',$jenis.' Dosen Informatika');
		
		$sheet->setCellValue('A3','No');
		$sheet->setCellValue('B3','Judul');
		$sheet->setCellValue('C3','Tahun');
		$sheet->setCellValue('D3','Ketua');
		$sheet->setCellValue('E3','Anggota');
		$sheet->setCellValue('F3','Sumber Dana');
		$sheet->setCellValue('G3','Jenis Dana');
		$sheet->setCellValue('H3','Alokasi Dana');
		$sheet->setCellValue('I3','Status');
		$sheet->setCellValue('J3','Tempat');
		$sheet->setCellValue('K3','Nomor Kontrak');
		$sheet->setCellValue('L3','Tangal Kontrak');
		$sheet->setCellValue('M3','Batas Kontrak');
		$sheet->setCellValue('N3','Nama Penandatangan');
		
		$sheet->getStyle('A3')->getFont()->setBold(true);
		$sheet->getStyle('B3')->getFont()->setBold(true);
		$sheet->getStyle('C3')->getFont()->setBold(true);
		$sheet->getStyle('D3')->getFont()->setBold(true);
		$sheet->getStyle('E3')->getFont()->setBold(true);
		$sheet->getStyle('F3')->getFont()->setBold(true);
		$sheet->getStyle('G3')->getFont()->setBold(true);
		$sheet->getStyle('H3')->getFont()->setBold(true);
		$sheet->getStyle('I3')->getFont()->setBold(true);
		$sheet->getStyle('J3')->getFont()->setBold(true);
		$sheet->getStyle('K3')->getFont()->setBold(true);
		$sheet->getStyle('L3')->getFont()->setBold(true);
		$sheet->getStyle('M3')->getFont()->setBold(true);
		$sheet->getStyle('N3')->getFont()->setBold(true);
		
		$sheet->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('B3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('D3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('E3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('F3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('G3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('H3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('I3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('J3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('K3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('L3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('M3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('N3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		//database
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
			
			$sheet->setCellValue('A'.($i+4).'',($i+1));
			$sheet->setCellValue('B'.($i+4).'',$data['judul']);
			$sheet->setCellValue('C'.($i+4).'',$data['tahun']);
			$sheet->setCellValue('D'.($i+4).'',$ketua[0]);
			$sheet->setCellValue('E'.($i+4).'',$nama_anggota);
			$sheet->setCellValue('F'.($i+4).'',$data['sumber_dana']);
			$sheet->setCellValue('G'.($i+4).'',$data['jenis_dana']);
			$sheet->setCellValue('H'.($i+4).'',$data['alokasi_dana']);
			$sheet->setCellValue('I'.($i+4).'',$data['status']);
			$sheet->setCellValue('J'.($i+4).'',$data['tempat']);
			$sheet->setCellValue('K'.($i+4).'',$data['no_kontrak']);
			$sheet->setCellValue('L'.($i+4).'',$data['tgl_kontrak']);
			$sheet->setCellValue('M'.($i+4).'',$data['batas_kontrak']);
			$sheet->setCellValue('N'.($i+4).'',$data['nama_ttd']);
		};
		
		$writer = new PHPExcel_Writer_Excel5($this->phpexcel);
		header('Content-type: application/vnd.ms-excel');
		$writer->save('php://output');
	}
	
}