<?php
   class Mod_hitungbeban extends CI_Model{      
      // jurusan informatika
      function get_kelas_matkul_by_id_dosen($id_dosen,$thn_ajar,$semester){
         $kal ='
            SELECT id_pengampu, matkul, jumlah_kelas 
            FROM tb_pengampu 
            WHERE 
            (dosen_1="'.$id_dosen.'" OR dosen_2="'.$id_dosen.'")
            AND
            (thn_ajar='.$thn_ajar.' AND semester='.$semester.')'
            ;
         $q = $this->db->query($kal);
         return $q->result_array();
      }
      //dosen dosen 2 jurusan informatika
      function get_dosen1_dosen2_by_id_pengampu($id_pengampu){
         $kal = 'SELECT dosen_1,dosen_2 FROM tb_pengampu WHERE id_pengampu='.$id_pengampu;
         $q = $this->db->query($kal);
         return $q->row();
      }
      
      
      //makul2 fsm
      function get_kelas_matkul_by_id_dosen_fsm($id_dosen,$thn_ajar,$semester){
         $kal ='
            SELECT id_beban_non_if, jurusan, matkul, sks, jumlah_kelas, semesterke 
            FROM tb_beban_non_if 
            WHERE 
            (dosen_1="'.$id_dosen.'" OR dosen_2="'.$id_dosen.'")
            AND
            (thn_ajar='.$thn_ajar.' AND semester='.$semester.')'
            ;
         $q = $this->db->query($kal);
         return $q->result_array();
      }
      
      //dosen dosen 2 jurusan fsm
      function get_dosen1_dosen2_by_id_beban_fsm($id_pengampu){
         $kal = 'SELECT dosen_1,dosen_2 FROM tb_beban_non_if WHERE id_beban_non_if='.$id_pengampu;
         $q = $this->db->query($kal);
         return $q->row();
      }
      
      //makul2 non fsm
      function get_kelas_matkul_by_id_dosen_non_fsm($id_dosen,$thn_ajar,$semester){
         $kal ='
            SELECT id_beban_non_fsm, jurusan, fakultas, matkul, sks, jumlah_kelas 
            FROM tb_beban_non_fsm 
            WHERE 
            (dosen_1="'.$id_dosen.'" OR dosen_2="'.$id_dosen.'")
            AND
            (thn_ajar='.$thn_ajar.' AND semester='.$semester.')'
            ;
         $q = $this->db->query($kal);
         return $q->result_array();
      }
      
      //dosen dosen 2 non jurusan fsm
      function get_dosen1_dosen2_by_id_beban_non_fsm($id_pengampu){
         $kal = 'SELECT dosen_1,dosen_2 FROM tb_beban_non_fsm WHERE id_beban_non_fsm='.$id_pengampu;
         $q = $this->db->query($kal);
         return $q->row();
      }
      
		function get_id_nama_nip_dosen(){
			$kal = 'SELECT id_dosen,nama_dosen,nip FROM tb_dosen_if where id_dosen!="IF000"';
         $q = $this->db->query($kal);
         return $q->result();
		} 
      
      function get_nama_sks_semesterke_matkul_by_id($id_matkul){
         $kal = 'SELECT nama_matkul,sks,semesterke FROM tb_matkul WHERE id_matkul='.$id_matkul;
         $q = $this->db->query($kal);
         return $q->row();
      }
      
      function get_thn_ajar_pengampu(){
         $kal = 'SELECT DISTINCT thn_ajar FROM tb_pengampu';
         $q = $this->db->query($kal);
         return $q->result();
      }
      
   }
?>