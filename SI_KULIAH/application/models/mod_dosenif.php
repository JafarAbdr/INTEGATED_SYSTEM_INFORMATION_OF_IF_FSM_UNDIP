<?php
   class Mod_dosenif extends CI_Model{
      function get_all_dosen(){
         return $this->db->get('tb_dosen_if')->result();
      }
      function tambah_dosen($data){
         return $this->db->insert('tb_dosen_if',$data);
      }
		function get_id_dosen(){
			
			$idMax = $this->db->query("SELECT max(id_dosen) as id_dosen_max from tb_dosen_if")->row()->id_dosen_max; 
			$noUrut = (int) substr($idMax, 2, 3);
			  
			$noUrut++;
			 
			$newID = 'IF' . sprintf("%03s", $noUrut);
			return $newID;
			
		}
      function update($id_dosen,$data) {
        $this->db->where('id_dosen', $id_dosen);
        $this->db->update('tb_dosen_if', $data);
      }
      function getById($id_dosen){
         return $this->db->get_where('tb_dosen_if', array('id_dosen' => $id_dosen))->row();
      }
      function delete_data($id_dosen){
         $kal = 'DELETE FROM `tb_dosen_if` WHERE id_dosen="'.$id_dosen.'"';
         $this->db->query($kal);
         $kal = 'DELETE FROM `tb_pengampu` WHERE dosen_1="'.$id_dosen.'" OR dosen_2="'.$id_dosen.'"';
         $this->db->query($kal);
         $kal = 'DELETE FROM `tb_beban_non_if` WHERE dosen_1="'.$id_dosen.'" OR dosen_2="'.$id_dosen.'"';
         $this->db->query($kal);
         $kal = 'DELETE FROM `tb_beban_non_fsm` WHERE dosen_1="'.$id_dosen.'" OR dosen_2="'.$id_dosen.'"';
         $this->db->query($kal);
         $kal = 'DELETE FROM `tb_jadwal_kuliah` WHERE dosen_1="'.$id_dosen.'" OR dosen_2="'.$id_dosen.'"';
         $this->db->query($kal);
         $kal = 'DELETE FROM `tb_jadwal_ujian` WHERE dosen_1="'.$id_dosen.'" OR dosen_2="'.$id_dosen.'"';
         $this->db->query($kal);
      }
		
		function upload_data($excel_data)
		{	    
			for($i = 1; $i < count($excel_data); $i++)
			  {            
					if( ! $this->is_exist($excel_data[$i]['nip']) == TRUE)
					{
						 $data = array(
									'id_dosen' => $excel_data[$i]['id_dosen'],
									'nip'     => $excel_data[$i]['nip'],
									'nama_dosen'    => $excel_data[$i]['nama_dosen'],
									'nidn' 	  => $excel_data[$i]['nidn'],                        
									'pangkat' => $excel_data[$i]['pangkat'],                        
									'jabatan' => $excel_data[$i]['jabatan']                                                
									);
						 $this->db->insert('tb_dosen_if', $data);
					}
					else
					{
						 $data = array(                   
									'nama_dosen'    => $excel_data[$i]['nama_dosen'],
									'nidn' 	  => $excel_data[$i]['nidn'],                        
									'pangkat' => $excel_data[$i]['pangkat'],                        
									'jabatan' => $excel_data[$i]['jabatan']
									);
						 $this->db->where('nip', $excel_data[$i]['nip']);
						 $this->db->update('tb_dosen_if', $data);
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
		 private function is_exist($nip)
		 {
			  $this->db->where('nip', $nip);
			  $result = $this->db->count_all_results('tb_dosen_if');
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