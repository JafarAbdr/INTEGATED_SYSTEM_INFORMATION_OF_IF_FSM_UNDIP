<?php
class Con_pengampu extends CI_Controller{
   public function __construct(){
         parent:: __construct();
		 $u1 = $this->session->userdata('username');
			$u2 = $this->session->userdata('id_user');
			$u3 = $this->session->userdata('level');
			$this->u3a = $this->session->userdata('level');
			if(ISSET($u1) && ISSET($u2) && ISSET($u3) && ($u1 != "") && ($u2 != "") && ($u3 != "")){
				$this->load->model('mod_pengampu');    
			}else{
				redirect('home/login');
			}
   }
   function view_pengampu(){
      $this->tambah_data();
   }
	function delete_data($id_pengampu){
		$this->mod_pengampu->delete_data($id_pengampu);
		$this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Dihapus</div>");
      redirect('pengampu');
	}
	function update_data($id_pengampu){
      $sdata = $this->_valueUpdate($id_pengampu);
      $data['main_content'] = $this->load->view('pengampu/update_pengampu',$sdata,TRUE);
      $data['sub'] = 9;
      $this->load->view('template/template',$data);      
   }
	function save_update_data($id_pengampu){
	  // $this->_formvalidation();
      //if($this->form_validation->run()==false){
      //   redirect('pengampu/add');
      //}else{
			$temp = $this->session->userdata('auto_date');
			if($temp){
				$thn_ajar = $this->session->userdata('thn_ajar');
				$semester = $this->session->userdata('semester');
			}else{
				$thn_ajar = $this->input->post('thn_ajar');
				$semester = $this->input->post('semester');
			}
         $matkul = $this->input->post('matkul');
         $jumlah_kelas = $this->input->post('jumlah_kelas');
         $dosen_1 = $this->input->post('dosen_1');
         $dosen_2 = $this->input->post('dosen_2');
         if($dosen_2===''){
            $dosen_2 = $dosen_1;
         }
         $data = array(
            'thn_ajar' => $thn_ajar,
            'semester'  => $semester,
            'matkul' => $matkul,
            'jumlah_kelas' => $jumlah_kelas,
            'dosen_1' => $dosen_1,
			'dosen_2' => $dosen_2
         );
		 $datajadwal = array(
            'thn_ajar' => $thn_ajar,
            'semester'  => $semester,
            'matkul' => $matkul,
            'dosen_1' => $dosen_1,
			'dosen_2' => $dosen_2
         );
         //print_r($data);
         $this->mod_pengampu->update($id_pengampu,$data,$datajadwal);
		 $this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Diupdate</div>");
         redirect('pengampu/add');
      //}
   }
   function tambah_data(){
	  if(($this->u3a == 1)||($this->u3a == 2)){
		  $sdata = $this->_valueTambah();
		  $sdata['q'] = $this->mod_pengampu->get_pengampu_for_view();
		  $temp_dosen_1 = $this->mod_pengampu->get_dosen_1();
		  $temp_dosen_2 = $this->mod_pengampu->get_dosen_2();
		  //print_r($temp_dosen_1);
		  $dos1 = array();
		  $dos2 = array();
		  $i = 0;
		  for($i=0;$i<count($temp_dosen_1);$i++){
			 $dos1[$i] = $this->mod_pengampu->get_all_nama_dosen_by_id($temp_dosen_1[$i]['dosen_1'])->nama_dosen;
			 $dos2[$i] = $this->mod_pengampu->get_all_nama_dosen_by_id($temp_dosen_2[$i]['dosen_2'])->nama_dosen;
		  }
		  //print_r($dos1);
		  //print_r($dos2);
		  $sdata['dos1'] = $dos1;
		  $sdata['dos2'] = $dos2;
		  $sdata['msg'] = $this->session->flashdata('message');
		  $data['main_content'] = $this->load->view('pengampu/tambah_pengampu',$sdata,TRUE);
		  $data['sub'] = 3;
		  $this->load->view('template/template',$data);
	  }else {
		  redirect('home/');
	  }
   }
   function save_tambahdata(){
      //$this->_formvalidation();
      //if($this->form_validation->run()==false){
      //   redirect('pengampu/add');
      //}else{
         $temp = $this->session->userdata('auto_date');
			if($temp){
				$thn_ajar = $this->session->userdata('thn_ajar');
				$semester = $this->session->userdata('semester');
			}else{
				$thn_ajar = $this->input->post('thn_ajar');
				$semester = $this->input->post('semester');
			}
         $matkul = $this->input->post('matkul');
         $jumlah_kelas = $this->input->post('jumlah_kelas');
         $dosen_1 = $this->input->post('dosen_1');
         $dosen_2 = $this->input->post('dosen_2');
         if($dosen_2===''){
            $dosen_2 = $dosen_1;
         }
         $inp = array(
            'thn_ajar' => $thn_ajar,
            'semester' => $semester,
            'matkul' => $matkul,
            'jumlah_kelas' => $jumlah_kelas,
            'dosen_1' => $dosen_1,
            'dosen_2' => $dosen_2
         );
         $this->mod_pengampu->tambah_data($inp);
         echo '<script>alert("Success")</script>';
		 $this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Diupdate</div>");
         redirect('pengampu/add');
      //}
   }
	
   /*-- fungsi untuk view update data --*/
   function _valueUpdate($id_pengampu){
      $q = $this->mod_pengampu->get_pengampu_by_id($id_pengampu);
         
      //id
      $data['id_pengampu'] = $q->id_pengampu;
      
      //tahun ajar
		$tahun_ajar = $q->thn_ajar;
		$thn1 = substr($tahun_ajar,0,4);
		$thn2 = substr($tahun_ajar,5);
		$a = -2;
		$n = abs($a*2);
		for($i=0;$i<=$n;$i++){
			$dropdown[($thn1+$a+$i).'/'.($thn2+$a+$i)] = ($thn1+$a+$i).'/'.($thn2+$a+$i);
		} 
		$selected = $tahun_ajar; 
		$data['dropdownYear'] = $dropdown;
		$data['selectedYear'] = $selected;
		
		//SEMESTER
		$semester = $q->semester;
		$dropdown = null;
		$dropdown['Ganjil'] = 'Ganjil';
		$dropdown['Genap'] = 'Genap';
		$selected = $semester;
		$data['dropdownSemester'] = $dropdown;
		$data['selectedSemester'] = $selected;
		
		//Mata Kuliah
		$makul = $q->matkul;
		$dropdown = null;
		$qmk = $this->mod_pengampu->get_id_nama_kode_matkul();
		$dropdown[''] = '';
		foreach($qmk as $hasil){
			$dropdown[$hasil->id_matkul] = $hasil->nama_matkul.' ('.$hasil->kode_matkul.')';
		}
		$selected = $makul;
		$data['dropdownMatkul'] = $dropdown;
		$data['selectedMatkul'] = $selected;
		
		//jumlah_kelas
		$data['jumlah_kelas'] = $q->jumlah_kelas;
		
		//Dosen
		$dropdown = null;
		$dosen1 = $q->dosen_1;
      $selectedDosen1 = $dosen1;
		$dosen2 = $q->dosen_2;
      if($dosen2!=$dosen1){
         $selectedDosen2 = $dosen2;
         $data['selectedDosen2'] = $selectedDosen2;
      };
		$qd = $this->mod_pengampu->get_id_nama_dosen();
		$dropdown[''] = '';
		foreach($qd as $hasil){
			$dropdown[$hasil->id_dosen] = $hasil->nama_dosen;
		}
		
		
		$data['dropdownDosen'] = $dropdown;
		$data['selectedDosen1'] = $selectedDosen1;
		
		
		//return nilai
		return $data;
   }
   /*-- end of fungsi --*/
	
	
   /*-- fungsi untuk view tambah data --*/
	function _valueTambah(){
		//dropdown YEar
		$year = date('Y');
		$month = date('n');
		if($month<=6){
			$a = -2;
			$n = abs($a*2);
			for($i=0;$i<=$n;$i++){
				$dropdown[($year+$a+$i-1).'/'.($year+$a+$i)] = ($year+$a+$i-1).'/'.($year+$a+$i);
				if($i==abs($a)){
					$data['selectedYear'] = ($year+$a+$i-1).'/'.($year+$a+$i);
				}              
			}
			$data['dropdownYear'] = $dropdown;
		}else{
			$a = -2;
			$n = abs($a*2);
			for($i=0;$i<=$n;$i++){
				$dropdown[($year+$a+$i).'/'.($year+$a+$i+1)] = ($year+$a+$i).'/'.($year+$a+$i+1);
				if($i==abs($a)){
              $data['selectedYear'] = ($year+$a+$i).'/'.($year+$a+$i+1);
				}              
			}
			$data['dropdownYear'] = $dropdown;
		}
		
		//dropdown semester
		$dropdown = null;
		$month = date('n');
      if($month<=6){
         $dropdown['Ganjil'] = 'Ganjil';
         $dropdown['Genap'] = 'Genap';
         $data['dropdownSemester'] = $dropdown;
         $data['selectedSemester'] = 'Genap';
      }else{
         $dropdown['Ganjil'] = 'Ganjil';
         $dropdown['Genap'] = 'Genap';
         $data['dropdownSemester'] = $dropdown;
         $data['selectedSemester'] = 'Ganjil';
      }
      
		//dropdown matkul
		$dropdown = null;
		$q = $this->mod_pengampu->get_id_nama_kode_matkul();
      $dropdown[''] = '';
      foreach($q as $hasil){
         $dropdown[$hasil->id_matkul] = $hasil->nama_matkul.' ('.$hasil->kode_matkul.')';
      }
      $data['dropdownMatkul'] = $dropdown;
		
		//dropdownDosen 1
		$dropdown= null;
		$q = null;
		$q = $this->mod_pengampu->get_id_nama_dosen();
      $dropdown[''] = '';
      foreach($q as $hasil){
         $dropdown[$hasil->id_dosen] = $hasil->nama_dosen;
      }
      
      $data['dropdownDosen'] = $dropdown;
		
		//return
		return $data;
	}

   /*-- end of fungsi --*/
   
	
	
	
	
   function _formvalidation(){
      $this->form_validation->set_rules('thn_ajar','Tahun Ajar','required');
      $this->form_validation->set_rules('semester','Semester','required');
      $this->form_validation->set_rules('matkul','Mata Kuliah','required');
      $this->form_validation->set_rules('jumlah_kelas','Jumlah Kelas','required' );
      $this->form_validation->set_rules('dosen_1','nama_dosen_1','required');
      //$this->form_validation->set_rules('dosen_2','nama_dosen_2','required');
   }
}

?>