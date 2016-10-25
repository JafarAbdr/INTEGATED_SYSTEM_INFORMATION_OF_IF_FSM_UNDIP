<?php

   class Mod_jadwal extends CI_Model{
	
      function tambah_data($data){
         $this->db->insert('tb_jadwal',$data);
         //$this->db->insert('tb_jadwal_rel',$data);
      }
      function get_all_jadwal(){
         return $this->db->get('tb_jadwal')->result();
      }
      function get_jadwal_by_id($id_jadwal){
         return $this->db->get_where('tb_jadwal', array('id_jadwal' => $id_jadwal))->row();
      }
      function delete_data($id_jadwal){
         $this->db->where('id_jadwal',$id_jadwal);
         $this->db->delete('tb_jadwal');
      }
      function update($id_jadwal,$data) {
        $this->db->where('id_jadwal', $id_jadwal);
        $this->db->update('tb_jadwal', $data);
      }
            function get_dosen_1(){
         $q = $this->db->query('SELECT all_dosen.nama_dosen
					FROM tb_jadwal INNER JOIN (
						SELECT * 
						FROM tb_dosen_if 
						UNION ALL 
						SELECT * 
						FROM tb_dosen_non_if 
						) as all_dosen
					ON tb_jadwal.dosen_1 = all_dosen.id_dosen
               ');
         return $q->result_array();
      }
      function get_dosen_2(){
         $q = $this->db->query('SELECT all_dosen.nama_dosen
					FROM tb_jadwal INNER JOIN (
						SELECT * 
						FROM tb_dosen_if 
						UNION ALL 
						SELECT * 
						FROM tb_dosen_non_if 
						) as all_dosen
					ON tb_jadwal.dosen_2 = all_dosen.id_dosen
               ');
         return $q->result_array();
      }
      
      function get_id_nama_dosen(){
         $kal = "
            SELECT id_dosen,nama_dosen
            FROM (
               SELECT * 
               FROM tb_dosen_if 
               UNION ALL 
               SELECT * 
               FROM tb_dosen_non_if 
               ) as all_dosen";
			$q = $this->db->query($kal);
         return $q->result();
      }
      function get_jadwal_for_view(){
         $q = $this->db->query('SELECT b.id_jadwal, b.thn_ajar, h.nama_hari, b.semester, b.jammulai, b.jamselesai, k.nama_ruang, mk.nama_matkul, mk.sks, mk.kode_matkul, mk.semesterke, b.kelas
               FROM tb_jadwal as b inner join tb_matkul as mk inner join tb_hari as h inner join tb_ruang as k
               on b.matkul = mk.id_matkul and
					b.hari=h.id_hari and b.ruang = k.id_ruang');
         return $q->result_array();
      }
      
      function get_all_pengampu_by_id($id_pengampu){
         $q = $this->db->query('SELECT * FROM tb_pengampu WHERE id_pengampu='.$id_pengampu);
         return $q->row();
      }

      function get_nama_matkul_by_id($matkul){
         $q = $this->db->query('SELECT nama_matkul FROM tb_matkul WHERE id_matkul='.$matkul);
         return $q->row();
      } 
      
      function get_id_nama_matkul(){
         $q = $this->db->query('SELECT id_matkul,nama_matkul FROM tb_matkul');
         return $q->result();
      }

      function get_id_nama_matkul_from_pengampu($thn_ajar, $semester){
         $kal = 'SELECT id_pengampu,matkul 
                  FROM tb_pengampu 
                  WHERE thn_ajar="'.$thn_ajar.'" 
                  AND semester="'.$semester.'" 
               ';
         $q = $this->db->query($kal);
         return $q->result();   
      }

      function get_semester_by_thn_ajar($thn_ajar){
         $kal = 'SELECT DISTINCT semester FROM tb_pengampu WHERE thn_ajar="'.$thn_ajar.'"';
         $q = $this->db->query($kal);
         return $q->result();   
      }

      function get_matkul_from_pengampu_by_id($pengampu){
         $kal = 'SELECT matkul 
                  FROM tb_pengampu 
                  WHERE id_pengampu='.$pengampu;
         $q = $this->db->query($kal);
         return $q->row();   
      }

      function get_thnajar_from_pengampu(){
         $kal = 'SELECT DISTINCT thn_ajar FROM tb_pengampu';
         $q = $this->db->query($kal);
         return $q->result();
      }

		function get_id_nama_ruang(){
         $q = $this->db->query('SELECT id_ruang,nama_ruang FROM tb_ruang');
         return $q->result();
      }
		
		function cek_sama($thn_ajar, $semester, $hari, $jammulai, $jamselesai, $ruang, $matkul, $dosen_1, $dosen_2){
         $kal = "SELECT * 
                  FROM tb_jadwal
                  WHERE
                  (thn_ajar='".$thn_ajar."'
                  AND
                  semester='".$semester."'
                  AND
                  hari=".$hari."
				  ) AND (
                  ruang=".$ruang."
                  OR
                  matkul=".$matkul."
                  OR
                  dosen_1='".$dosen_1."'
                  OR
                  dosen_2='".$dosen_2."'
                  )
               ";
         $q = $this->db->query($kal);
         return $q->result();
      }

      function cek_sama_id($id_jadwal, $thn_ajar, $semester, $hari, $jammulai, $jamselesai, $ruang, $matkul, $dosen_1, $dosen_2){
         $kal = "SELECT * 
                  FROM tb_jadwal
                  WHERE
                  (thn_ajar='".$thn_ajar."'
                  AND
                  semester='".$semester."'
                  AND
                  hari=".$hari."
                  AND
                  jammulai='".$jammulai."'
                  AND
				  jamselesai='".$jamselesai."'
				  ) AND (
                  ruang=".$ruang."
                  OR
                  matkul=".$matkul."
                  OR
                  dosen_1='".$dosen_1."'
                  OR
                  dosen_2='".$dosen_2."'
                  ) AND
                  id_jadwal!=".$id_jadwal
                  ;
         $q = $this->db->query($kal);
         return $q->result();
      }
   }
?>