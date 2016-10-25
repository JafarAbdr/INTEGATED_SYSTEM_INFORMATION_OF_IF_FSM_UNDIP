<?php
   class Mod_beban_non_if extends CI_Model{
      function tambah_data($data){
         $this->db->insert('tb_beban_non_if',$data);
         //$this->db->insert('tb_beban_non_if_rel',$data);
      }
      function get_all_beban(){
         return $this->db->get('tb_beban_non_if')->result();
      }
      function get_beban_by_id($id_beban_non_if){
         return $this->db->get_where('tb_beban_non_if', array('id_beban_non_if' => $id_beban_non_if))->row();
      }
      function delete_data($id_beban_non_if){
         $this->db->where('id_beban_non_if',$id_beban_non_if);
         $this->db->delete('tb_beban_non_if');
      }
      function update($id_beban_non_if,$data) {
        $this->db->where('id_beban_non_if', $id_beban_non_if);
        $this->db->update('tb_beban_non_if', $data);
      }
      function get_beban_for_view(){
         $q = $this->db->query('SELECT id_beban_non_if, thn_ajar, semester, semesterke, sks, jurusan, matkul, jumlah_kelas
               FROM tb_beban_non_if ');
         return $q->result_array();
      }
      function get_dosen_1(){
         $q = $this->db->query('SELECT tb_dosen_if.nama_dosen
               FROM tb_beban_non_if INNER JOIN tb_dosen_if
               on tb_beban_non_if.dosen_1 = tb_dosen_if.id_dosen
               ');
         return $q->result_array();
      }
      function get_dosen_2(){
         $q = $this->db->query('SELECT tb_dosen_if.nama_dosen
               FROM tb_beban_non_if INNER JOIN tb_dosen_if
               on tb_beban_non_if.dosen_2 = tb_dosen_if.id_dosen
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