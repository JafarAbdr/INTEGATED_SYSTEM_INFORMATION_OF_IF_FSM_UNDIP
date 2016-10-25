<?php
	class Mod_skdekan extends CI_Model{
		function get_distinct_dosen_1($thn_ajar,$semester){
		   $kal = 'SELECT DISTINCT dosen_1 FROM tb_pengampu WHERE thn_ajar='.$thn_ajar.' AND semester='.$semester;
			$q = $this->db->query($kal);
         return $q->result();
		}
      function get_distinct_dosen_2($thn_ajar,$semester){
			$kal ='
               SELECT DISTINCT dosen_2 
               FROM tb_pengampu 
               WHERE 
               (dosen_2 not in (SELECT DISTINCT dosen_1 FROM tb_pengampu)) 
               AND (thn_ajar='.$thn_ajar.' AND semester='.$semester.')
               ';	
			$q = $this->db->query($kal);
         return $q->result();
      }
      function get_nama_nip_pangkat_jabatan_dosen_by_id($id_dosen){
         $kal = "
            SELECT nama_dosen,nip,pangkat,jabatan 
            FROM (
               SELECT * 
               FROM tb_dosen_if 
               UNION ALL 
               SELECT * 
               FROM tb_dosen_non_if 
               ) as all_dosen 
            WHERE all_dosen.id_dosen='".$id_dosen."'";
         $q = $this->db->query($kal);
         return $q->row();
      }
      
      function get_kelas_matkul_by_id_dosen($id_dosen,$thn_ajar,$semester){
         $kal ="
				SELECT id_pengampu, matkul, jumlah_kelas 
				FROM tb_pengampu 
				WHERE 
				(dosen_1='".$id_dosen."' OR dosen_2='".$id_dosen."')
				AND
				(thn_ajar=".$thn_ajar." AND semester=".$semester.")"
				;
         $q = $this->db->query($kal);
         return $q->result_array();
      }
      function get_dosen1_dosen2_by_id_pengampu($id_pengampu){
         $kal = 'SELECT dosen_1,dosen_2 FROM tb_pengampu WHERE id_pengampu='.$id_pengampu;
         $q = $this->db->query($kal);
         return $q->row();
      }
      
      function get_nama_sks_matkul_by_id($id_matkul){
         $kal = 'SELECT nama_matkul,sks FROM tb_matkul WHERE id_matkul='.$id_matkul;
         $q = $this->db->query($kal);
         return $q->row();
      }
      
      function get_thn_ajar_pengampu(){
         $kal = 'SELECT DISTINCT thn_ajar FROM tb_pengampu';
         $q = $this->db->query($kal);
         return $q->result();
      }
      
      function get_nama_nip_dekan(){
         $kal = 'SELECT nama_pimpinan, nip FROM tb_pimpinan WHERE id_pimpinan=1';
         $q = $this->db->query($kal);
         return $q->row();
      }
      
	}
?>