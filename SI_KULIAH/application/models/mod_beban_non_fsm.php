<?php
   class Mod_beban_non_fsm extends CI_Model{
      function tambah_data($data){
         $this->db->insert('tb_beban_non_fsm',$data);
         //$this->db->insert('tb_beban_non_fsm_rel',$data);
      }
      function get_all_beban(){
         return $this->db->get('tb_beban_non_fsm')->result();
      }
      function get_beban_by_id($id_beban_non_fsm){
         return $this->db->get_where('tb_beban_non_fsm', array('id_beban_non_fsm' => $id_beban_non_fsm))->row();
      }
      function delete_data($id_beban_non_fsm){
         $this->db->where('id_beban_non_fsm',$id_beban_non_fsm);
         $this->db->delete('tb_beban_non_fsm');
      }
      function update($id_beban_non_fsm,$data) {
        $this->db->where('id_beban_non_fsm', $id_beban_non_fsm);
        $this->db->update('tb_beban_non_fsm', $data);
      }
      function get_beban_for_view(){
         $q = $this->db->query('SELECT id_beban_non_fsm, thn_ajar, semester, semesterke, sks, jurusan, fakultas, matkul, jumlah_kelas
               FROM tb_beban_non_fsm ');
         return $q->result_array();
      }
      function get_dosen_1(){
         $q = $this->db->query('SELECT tb_dosen_if.nama_dosen
               FROM tb_beban_non_fsm INNER JOIN tb_dosen_if
               on tb_beban_non_fsm.dosen_1 = tb_dosen_if.id_dosen
               ');
         return $q->result_array();
      }
      function get_dosen_2(){
         $q = $this->db->query('SELECT tb_dosen_if.nama_dosen
               FROM tb_beban_non_fsm INNER JOIN tb_dosen_if
               on tb_beban_non_fsm.dosen_2 = tb_dosen_if.id_dosen
               ');
         return $q->result_array();
      }
      
      function get_id_nama_dosen(){
         $q = $this->db->query('SELECT id_dosen,nama_dosen FROM tb_dosen_if');
         return $q->result();
      }
      function get_id_nama_kode_matkul(){
         $q = $this->db->query('SELECT id_matkul,nama_matkul,kode_matkul FROM tb_matkul');
         return $q->result();
      }
   }
?>