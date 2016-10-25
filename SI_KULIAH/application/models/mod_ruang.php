<?php
class Mod_ruang extends CI_Model {
    
	function getall() {
    $ambildata = $this->db->get('tb_ruang');
        //jika data ada (lebih dari 0)
        if ($ambildata->num_rows() > 0 ) {
            foreach ($ambildata->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
	
	function tambah_data($data) {
        $this->db->insert('tb_ruang',$data);
	}
	
	function update($id_ruang, $data) {
        
        $this->db->where('id_ruang', $id_ruang);
        $this->db->update('tb_ruang', $data);
    }
	function delete_data($id_ruang){
         $kal = 'DELETE FROM tb_ruang WHERE id_ruang='.$id_ruang;
         $this->db->query($kal);
         $kal = 'DELETE FROM tb_jadwal_kuliah WHERE ruang='.$id_ruang;
         $this->db->query($kal);
         $kal = 'DELETE FROM tb_jadwal_ujian WHERE ruang='.$id_ruang;
         $this->db->query($kal);
    }
    function getByid_ruang($id_ruang) {
        return $this->db->get_where('tb_ruang', array('id_ruang' => $id_ruang))->row();
    }
	
	function upload_data($excel_data)
	{	    
		for($i = 1; $i < count($excel_data); $i++)
        {            
            if( ! $this->is_exist($excel_data[$i]['nama_ruang']) == TRUE)
            {
                $data = array(
                        'nama_ruang'     => $excel_data[$i]['nama_ruang'],
                        'kapasitas_kuliah'    => $excel_data[$i]['kapasitas_kuliah'],
                        'kapasitas_ujian' 	  => $excel_data[$i]['kapasitas_ujian']
                        );
                $this->db->insert('tb_ruang', $data);
            }
            else
            {
                $data = array(                   
                        'kapasitas_kuliah'    => $excel_data[$i]['kapasitas_kuliah'],
                        'kapasitas_ujian' 	  => $excel_data[$i]['kapasitas_ujian']
                        );
                $this->db->where('nama_ruang', $excel_data[$i]['nama_ruang']);
                $this->db->update('tb_ruang', $data);
            }
        }
	}

   /**
    * ------------------------------------------------------------
    * Method   is_exist()
    * @param   string 
    * @return  boolean
    * @access  private 
    * Fungsi untuk mengecek ketersediaan nim dalam tabel mahasiswa
    * ------------------------------------------------------------ 
    */      
    private function is_exist($nama_ruang)
    {
        $this->db->where('nama_ruang', $nama_ruang);
        $result = $this->db->count_all_results('tb_ruang');
        if($result == 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    
}
?>