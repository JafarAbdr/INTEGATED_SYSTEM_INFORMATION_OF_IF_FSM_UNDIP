<?php
   class Mod_pimpinan extends CI_Model{
      function get_all_pimpinan(){
         return $this->db->get('tb_pimpinan')->result();   
      }
      
      function get_pimpinan_by_id($id_pimpinan){
         return $this->db->get_where('tb_pimpinan', array('id_pimpinan' => $id_pimpinan))->row();   
      }
      
      function get_id_nama_nip_dosen_if(){
         return $this->db->query('SELECT id_dosen,nama_dosen,nip FROM tb_dosen_if')->result();
      }
      function get_id_nama_nip_dosen_if_by_id($id_dosen){
         $q = 'SELECT id_dosen,nama_dosen,nip FROM tb_dosen_if WHERE id_dosen="'.$id_dosen.'"';
         return $this->db->query($q)->row();
      }
      function get_id_dosen_if_by_nama($nama_pimpinan){
         $q = "SELECT id_dosen FROM tb_dosen_if WHERE nama_dosen='".$nama_pimpinan."'";
         return $this->db->query($q)->row();
      }
      function update($id_pimpinan,$data) {
        $this->db->where('id_pimpinan', $id_pimpinan);
        $this->db->update('tb_pimpinan', $data);
      }
   }
?>