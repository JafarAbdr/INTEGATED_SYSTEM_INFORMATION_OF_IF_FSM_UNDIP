<?php
   class Mod_pengampu extends CI_Model{
      function tambah_data($data){
         $this->db->insert('tb_pengampu',$data);
         //$this->db->insert('tb_pengampu_rel',$data);
      }
      
      function get_all_pengampu(){
         return $this->db->get('tb_pengampu')->result();
      }
      
      function get_pengampu_by_id($id_pengampu){
         return $this->db->get_where('tb_pengampu', array('id_pengampu' => $id_pengampu))->row();
      }
      
      function delete_data($id_pengampu){
         $kal = 'DELETE FROM tb_pengampu WHERE id_pengampu='.$id_pengampu;
         $this->db->query($kal);
         $kal = 'DELETE FROM tb_jadwal_kuliah WHERE pengampu='.$id_pengampu;
         $this->db->query($kal);
         $kal = 'DELETE FROM tb_jadwal_ujian WHERE pengampu='.$id_pengampu;
         $this->db->query($kal);
      }
      
      
      function update($id_pengampu,$data, $datajadwal) {
        
		$this->db->set('a.thn_ajar', $data['thn_ajar']);
		$this->db->set('a.semester', $data['semester']);
		$this->db->set('a.matkul', $data['matkul']);
		$this->db->set('a.jumlah_kelas', $data['jumlah_kelas']);
		$this->db->set('a.dosen_1', $data['dosen_1']);
		$this->db->set('a.dosen_2', $data['dosen_2']);

		$this->db->set('b.thn_ajar', $datajadwal['thn_ajar']);
		$this->db->set('b.semester', $datajadwal['semester']);
		$this->db->set('b.matkul', $datajadwal['matkul']);
		$this->db->set('b.dosen_1', $datajadwal['dosen_1']);
		$this->db->set('b.dosen_2', $datajadwal['dosen_2']);

		$this->db->set('c.thn_ajar', $datajadwal['thn_ajar']);
		$this->db->set('c.semester', $datajadwal['semester']);
		$this->db->set('c.matkul', $datajadwal['matkul']);
		$this->db->set('c.dosen_1', $datajadwal['dosen_1']);
		$this->db->set('c.dosen_2', $datajadwal['dosen_2']);
		
		$this->db->where('a.id_pengampu', $id_pengampu);
		$this->db->where('a.id_pengampu = b.pengampu = c.pengampu');
		$this->db->update('tb_pengampu as a, tb_jadwal_kuliah as b, tb_jadwal_ujian as c');
      }
	  
	  function get_pengampu_for_view(){
         $q = $this->db->query('SELECT b.id_pengampu, b.thn_ajar, b.semester, mk.nama_matkul, b.jumlah_kelas
               FROM tb_pengampu as b inner join tb_matkul as mk
               on b.matkul = mk.id_matkul');
         return $q->result_array();
      }
      
      function get_dosen_1(){
         $q = $this->db->query('
                  SELECT dosen_1 from tb_pengampu
               ');
         return $q->result_array();
      }
      
      function get_dosen_2(){
         $q = $this->db->query('
                  SELECT dosen_2 from tb_pengampu
               ');
         return $q->result_array();
      }
      
      function get_all_nama_dosen_by_id($id_dosen){
         $kal = "
            SELECT nama_dosen 
            FROM (
               SELECT * 
               FROM tb_dosen_if 
               UNION ALL 
               SELECT * 
               FROM tb_dosen_non_if 
               ) as all_dosen 
            WHERE all_dosen.id_dosen='".$id_dosen."'
         ";
         $q = $this->db->query($kal);
         return $q->row();
      }
      
      function get_id_nama_dosen(){
         $kal = "
               SELECT *
               FROM tb_dosen_if
               UNION ALL
               SELECT *
               FROM tb_dosen_non_if
               WHERE tb_dosen_non_if.id_dosen!='NONIF000'
               ";
         $q = $this->db->query($kal);
         return $q->result();
      }
      
      function get_id_nama_kode_matkul(){
         $q = $this->db->query('SELECT id_matkul,nama_matkul,kode_matkul FROM tb_matkul');
         return $q->result();
      }
   }
?>