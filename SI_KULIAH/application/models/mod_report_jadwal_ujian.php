<?php

   class Mod_report_jadwal_ujian extends CI_Model{
		
		/*function get_hari($thn_ajar, $semester, $uts_uas){
			$kal = '
					SELECT DISTINCT hari
					FROM tb_jadwal_ujian 
					WHERE thn_ajar='.$thn_ajar.'
					 AND semester='.$semester.' 
					 AND uts_uas='.$uts_uas.' 
					  ORDER BY hari
					';
			$q = $this->db->query($kal);
			return $q->result_array();
		}*/
		
		function get_tanggal($thn_ajar, $semester, $uts_uas){
			$kal = '
					SELECT DISTINCT tanggal 
					FROM tb_jadwal_ujian 
					WHERE thn_ajar='.$thn_ajar.'
					 AND semester='.$semester.' 
					 AND uts_uas='.$uts_uas.' 
					  ORDER BY tanggal
					';
			$q = $this->db->query($kal);
			return $q->result_array();
		}
		
		function get_hari_by_id($id_hari){
			$kal = '
				SELECT *
				FROM tb_hari
				WHERE id_hari='.$id_hari
			;
			$q = $this->db->query($kal);
			return $q->row();
		}	
		
		function get_dosen_by_id($id_dosen){
			$kal = '
				SELECT all_dosen.nama_dosen
					FROM tb_jadwal_ujian INNER JOIN (
						SELECT * 
						FROM tb_dosen_if 
						UNION ALL 
						SELECT * 
						FROM tb_dosen_non_if 
						) as all_dosen
					WHERE id_dosen="'.$id_dosen.'"'
			;
			$q = $this->db->query($kal);
			return $q->result_array();
		}
		
		function get_matkul_by_id($id_matkul){
			$kal = '
				SELECT id_matkul, kode_matkul, sks, nama_matkul,semesterke
				FROM tb_matkul
				WHERE id_matkul='.$id_matkul
				;
			$q = $this->db->query($kal);
			return $q->result_array();
		}
		
		function get_ruang_by_id($id_ruang){
			$kal = '
				SELECT id_ruang, nama_ruang
				FROM tb_ruang
				WHERE id_ruang='.$id_ruang
				;
			$q = $this->db->query($kal);
			return $q->result_array();
		}
		
		function get_all_by_thn_ajar_smt_tanggal($thn_ajar,$semester,$uts_uas,$tanggal){
			//echo $thn_ajar;echo $semester;echo $uts_uas;echo $tanggal;
			$kal ='
					SELECT *
					FROM tb_jadwal_ujian
					WHERE thn_ajar='.$thn_ajar.'
					 AND semester='.$semester.'
					 AND uts_uas='.$uts_uas.'
					 AND tanggal="'.$tanggal.'"' 
			;
			//echo $kal;
			$q = $this->db->query($kal);
			return $q->result_array();
		}
		
      function get_all_jadwal(){
         return $this->db->get('tb_jadwal_ujian')->result();
      }
      function get_jadwal_for_view(){
         $q = $this->db->query('SELECT b.id_jadwal, b.thn_ajar, b.jammulai, b.peserta, b.jamselesai, k.nama_ruang, mk.nama_matkul, mk.sks, mk.kode_matkul, mk.semesterke, b.kelas
               FROM tb_jadwal_ujian as b inner join tb_matkul as mk inner join tb_ruang as k
               on b.matkul = mk.id_matkul and b.ruang = k.id_ruang order by tanggal, jammulai, jamselesai');
         return $q->result_array();
      }
      function get_dosen_1(){
         $q = $this->db->query('SELECT all_dosen.nama_dosen
					FROM tb_jadwal_ujian INNER JOIN (
						SELECT * 
						FROM tb_dosen_if 
						UNION ALL 
						SELECT * 
						FROM tb_dosen_non_if 
						) as all_dosen
					ON tb_jadwal_ujian.dosen_1 = all_dosen.id_dosen
               ');
         return $q->result_array();
      }
      function get_dosen_2(){
         $q = $this->db->query('SELECT all_dosen.nama_dosen
					FROM tb_jadwal_ujian INNER JOIN (
						SELECT * 
						FROM tb_dosen_if 
						UNION ALL 
						SELECT * 
						FROM tb_dosen_non_if 
						) as all_dosen
					ON tb_jadwal_ujian.dosen_2 = all_dosen.id_dosen
               ');
         return $q->result_array();
      }
		function get_thn_ajar_jadwal(){
         $kal = 'SELECT DISTINCT thn_ajar FROM tb_jadwal_ujian';
         $q = $this->db->query($kal);
         return $q->result();
      }
	  
	  function get_nama_nip_kajur(){
         $kal = 'SELECT nama_pimpinan, nip FROM tb_pimpinan WHERE id_pimpinan=6';
         $q = $this->db->query($kal);
         return $q->row();
      }
	  
	  function get_nama_nip_pd1(){
         $kal = 'SELECT nama_pimpinan, nip FROM tb_pimpinan WHERE id_pimpinan=2';
         $q = $this->db->query($kal);
         return $q->row();
      }
	  function get_nama_nip_koorprodi(){
         $kal = 'SELECT nama_pimpinan, nip FROM tb_pimpinan WHERE id_pimpinan=8';
         $q = $this->db->query($kal);
         return $q->row();
      }
   }
?>