<?php
class Mod_matkul extends CI_Model {
    
	function getall() {
    $ambildata = $this->db->get('tb_matkul');
        //jika data ada (lebih dari 0)
        if ($ambildata->num_rows() > 0 ) {
            foreach ($ambildata->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
	
	function tambah_data($data) {
        $this->db->insert('tb_matkul',$data);

    }
	
	function update($id_matkul,$data) {
        
        $this->db->where('id_matkul', $id_matkul);
        $this->db->update('tb_matkul', $data);
    }
	function delete_data($id_matkul){
       $kal = 'DELETE FROM tb_matkul WHERE id_matkul='.$id_matkul;
         $this->db->query($kal);
         $kal = 'DELETE FROM tb_pengampu WHERE matkul='.$id_matkul;
         $this->db->query($kal);
         $kal = 'DELETE FROM tb_jadwal_kuliah WHERE matkul='.$id_matkul;
         $this->db->query($kal);
         $kal = 'DELETE FROM tb_jadwal_ujian WHERE matkul='.$id_matkul;
         $this->db->query($kal);
    }
    function getByid_matkul($id_matkul) {
        return $this->db->get_where('tb_matkul', array('id_matkul' => $id_matkul))->row();
    }
	
	function upload_data($excel_data)
	{	    
		for($i = 1; $i < count($excel_data); $i++)
        {            
            if( ! $this->is_exist($excel_data[$i]['kode_matkul']) == TRUE)
            {
                $data = array(
                        'kode_matkul'     => $excel_data[$i]['kode_matkul'],
                        'nama_matkul'    => $excel_data[$i]['nama_matkul'],
                        'sks' 	  => $excel_data[$i]['sks'],                        
                        'semester' => $excel_data[$i]['semester'],
                        'semesterke' => $excel_data[$i]['semesterke']
                        );
                $this->db->insert('tb_matkul', $data);
            }
            else
            {
                $data = array(                   
                        'nama_matkul'    => $excel_data[$i]['nama_matkul'],
                        'sks' 	  => $excel_data[$i]['sks'],                        
                        'semester' => $excel_data[$i]['semester'],
                        'semesterke' => $excel_data[$i]['semesterke']
                        );
                $this->db->where('kode_matkul', $excel_data[$i]['kode_matkul']);
                $this->db->update('tb_matkul', $data);
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
    private function is_exist($kode_matkul)
    {
        $this->db->where('kode_matkul', $kode_matkul);
        $result = $this->db->count_all_results('tb_matkul');
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