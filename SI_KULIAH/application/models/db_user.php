<?php
	class Db_user extends CI_Model{
		public function __Construct(){
			parent:: __Construct();
		}
		
		public function save_user($data){
			return $this->db->insert('user',$data);
		}
		
		public function get_user_id($id){
			return $this->db->query("SELECT * FROM user WHERE id_user='$id'")->row_array();
		}
		
		public function edit_user($data,$id){
			return $this->db->update('user',$data,$id);
		}
		
		//public function get_user(){
		//	return $this->db->query("SELECT * FROM user WHERE flag='0'")->result_array();
		//}
		
		
		
		function getall() {
		 $ambildata = $this->db->get('user');
			  //jika data ada (lebih dari 0)
			  if ($ambildata->num_rows() > 0 ) {
					foreach ($ambildata->result() as $data) {
						 $hasil[] = $data;
					}
					return $hasil;
				}
		}
		
		public function get_email($email)
  	    {
			$q = $this->db->query("SELECT COUNT(*) as sum
									FROM user
									where email = '$email' ");
			foreach($q->result() as $row)
			{
				$value = $row->sum;
			}
			return $value;	
	    }
   
	    public function update_password($pass, $email)
	    {
			$q = $this->db->query(" UPDATE user 
									SET password='$pass'
									WHERE email = '$email'
			");
			
			return $q;
	    }
	}
?>