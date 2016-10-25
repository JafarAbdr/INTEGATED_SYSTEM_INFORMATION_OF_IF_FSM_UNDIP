<?php

   class Mod_jadwal_ujian extends CI_Model{
	
      function tambah_data($data){
         $this->db->insert('tb_jadwal_ujian',$data);
         //$this->db->insert('tb_jadwal_rel',$data);
      }
      function get_all_jadwal(){
         return $this->db->get('tb_jadwal_ujian')->result();
      }
      function get_jadwal_by_id($id_jadwal){
         return $this->db->get_where('tb_jadwal_ujian', array('id_jadwal' => $id_jadwal))->row();
      }
      function delete_data($id_jadwal){
         $this->db->where('id_jadwal',$id_jadwal);
         $this->db->delete('tb_jadwal_ujian');
      }
      function update($id_jadwal,$data) {
        $this->db->where('id_jadwal', $id_jadwal);
        $this->db->update('tb_jadwal_ujian', $data);
      }
      function get_jadwal_for_view(){
         $q = $this->db->query('SELECT b.id_jadwal, b.uts_uas, b.thn_ajar, b.tanggal, b.peserta, b.semester, b.jammulai, b.jamselesai, mk.nama_matkul, mk.sks, mk.kode_matkul, mk.semesterke, b.kelas
               FROM tb_jadwal_ujian as b inner join tb_matkul as mk
               on b.matkul = mk.id_matkul order by tanggal');
         return $q->result_array();
      }
      function get_thnajar_from_pengampu(){
         $kal = 'SELECT DISTINCT thn_ajar FROM tb_pengampu';
         $q = $this->db->query($kal);
         return $q->result();
      }
      function get_all_pengampu_by_id($id_pengampu){
         $q = $this->db->query('SELECT * FROM tb_pengampu WHERE id_pengampu='.$id_pengampu);
         return $q->row();
      }

      function get_nama_matkul_by_id($matkul){
         $q = $this->db->query('SELECT nama_matkul FROM tb_matkul WHERE id_matkul='.$matkul);
         return $q->row();
      } 

      function get_id_nama_matkul_from_pengampu($thn_ajar, $semester, $uts_uas){
         $kal = 'SELECT id_pengampu,matkul 
                  FROM tb_pengampu 
                  WHERE thn_ajar="'.$thn_ajar.'" 
                  AND semester="'.$semester.'" 
                  AND id_pengampu NOT IN 
                     (SELECT pengampu FROM tb_jadwal_ujian WHERE thn_ajar="'.$thn_ajar.'" 
                        AND semester="'.$semester.'" 
                        AND uts_uas="'.$uts_uas.'"   
                        )
               ';
         $q = $this->db->query($kal);
         return $q->result();   
      }
      function get_id_nama_matkul(){
         $q = $this->db->query('SELECT id_matkul,nama_matkul FROM tb_matkul');
         return $q->result();
      }

      function get_matkul_from_pengampu_by_id($pengampu){
         $kal = 'SELECT matkul 
                  FROM tb_pengampu 
                  WHERE id_pengampu='.$pengampu;
         $q = $this->db->query($kal);
         return $q->row();   
      }
      
		function get_id_nama_ruang(){
         $q = $this->db->query('SELECT id_ruang,nama_ruang FROM tb_ruang');
         return $q->result();
      }
	  function cek_sama($thn_ajar, $semester, $tanggal, $jammulai, $uts_uas){
			$kal = "SELECT * 
                  FROM tb_jadwal_ujian 
                  WHERE 
                  (thn_ajar='".$thn_ajar."' 
                     AND semester='".$semester."' 
                     AND tanggal='".$tanggal."' 
                     AND jammulai='".$jammulai."' 
                     AND uts_uas='".$uts_uas."'
                  )
					";
               //print_r($kal);
			$q = $this->db->query($kal);
			return $q;
		}

      function cek_sama_id($id_jadwal, $thn_ajar, $semester, $tanggal, $jammulai, $uts_uas){
         $kal = "SELECT * 
                  FROM tb_jadwal_ujian 
                  WHERE 
                  (thn_ajar='".$thn_ajar."' 
                     AND semester='".$semester."' 
                     AND tanggal='".$tanggal."' 
                     AND jammulai='".$jammulai."' 
                     AND uts_uas='".$uts_uas."'
                     AND id_jadwal!='".$id_jadwal."'
                  )
               ";
               //print_r($kal);
         $q = $this->db->query($kal);
         return $q;
      }

   }
?>