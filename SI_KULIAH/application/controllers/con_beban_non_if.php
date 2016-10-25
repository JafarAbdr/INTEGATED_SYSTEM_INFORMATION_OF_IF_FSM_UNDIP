<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Con_beban_non_if extends CI_Controller{
   public function __construct(){
         parent:: __construct();
			$u1 = $this->session->userdata('username');
			$u2 = $this->session->userdata('id_user');
			$u3 = $this->session->userdata('level');
			$this->u3a = $this->session->userdata('level');
			if(ISSET($u1) && ISSET($u2) && ISSET($u3) && ($u1 != "") && ($u2 != "") && ($u3 != "")){
				$this->load->model('mod_beban_non_if');    
			}else{
				redirect('home/login');
			}
   }
	
	function index(){
		$this->tambahdata();
	}
   function view_bebannonif(){
      $sdata['q'] = $this->mod_beban_non_if->get_beban_for_view();
      $sdata['dos1'] = $this->mod_beban_non_if->get_dosen_1();
      $sdata['dos2'] = $this->mod_beban_non_if->get_dosen_2();
	  $sdata['msg'] = $this->session->flashdata('message');
      $data['main_content'] = $this->load->view('beban_non_if/view_bebannonif',$sdata,true);
      $data['sub'] = 5;
      $this->load->view('template/template',$data);
   }
	function delete_data($id_beban_non_if){
		if(($this->u3a == 1)||($this->u3a == 2)){
			$this->mod_beban_non_if->delete_data($id_beban_non_if);
			$this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Dihapus</div>");
			redirect('beban_non_if/add');
		}else {
			redirect('home/');
		}
	}
	function update_data($id_beban_non_if){
		if(($this->u3a == 1)||($this->u3a == 2)){
			$sdata = $this->_valueUpdate($id_beban_non_if);
			$data['main_content'] = $this->load->view('beban_non_if/form_bebannonif',$sdata,TRUE);
			$data['sub'] = 5;
			$this->load->view('template/template',$data);      
		}else {
			redirect('home/');
		}
   }

	function save_update_data($id_beban_non_if){
	  // $this->_formvalidation();
      //if($this->form_validation->run()==false){
      //   redirect('beban_non_if/add');
      //}else{    
         $temp = $this->session->userdata('auto_date');
			if($temp){
				$thn_ajar = $this->session->userdata('thn_ajar');
				$semester = $this->session->userdata('semester');
				$semesterke = $this->input->post('semesterke');
				//kalo semesterke dan semester ga sama
				//echo $semester;
				//echo $semesterke;
				//echo $temp;
				//echo 'masuk';
				if(($semester==="Ganjil") && (($semesterke==='II') || ($semesterke==='IV') || ($semesterke==='VI') || ($semesterke==='VIII') || ($semesterke==='PILGENAP'))){
					$sdata = $this->_valueTambah();
					$sdata['salah'] = true;
					$sdata['id_beban_non_if'] = $id_beban_non_if;
					$sdata['semesterke'] = $this->input->post('semesterke');
					$sdata['matkul'] = $this->input->post('matkul');
         		$sdata['sks'] = $this->input->post('sks');
         		$sdata['jurusan'] = $this->input->post('jurusan');
         		$sdata['jumlah_kelas'] = $this->input->post('jumlah_kelas');
         		$sdata['selectedDosen1'] = $this->input->post('dosen_1');
         		$sdata['selectedDosen2'] = $this->input->post('dosen_2');
        			$data['main_content'] = $this->load->view('beban_non_if/form_bebannonif',$sdata,TRUE);
					$data['sub'] = 5;
					$this->load->view('template/template',$data);
					return;
				}
				if(($semester==="Genap") && (($semesterke==='I') || ($semesterke==='III') || ($semesterke==='V') || ($semesterke==='VII') || ($semesterke==='PILGANJIL'))){
					
					$sdata = $this->_valueTambah();
					$sdata['salah'] = true;
					$sdata['id_beban_non_if'] = $id_beban_non_if;
					$sdata['semesterke'] = $this->input->post('semesterke');
					$sdata['matkul'] = $this->input->post('matkul');
         		$sdata['sks'] = $this->input->post('sks');
         		$sdata['jurusan'] = $this->input->post('jurusan');
         		$sdata['jumlah_kelas'] = $this->input->post('jumlah_kelas');
         		$sdata['selectedDosen1'] = $this->input->post('dosen_1');
         		$sdata['selectedDosen2'] = $this->input->post('dosen_2');
        			$data['main_content'] = $this->load->view('beban_non_if/form_bebannonif',$sdata,TRUE);
					$data['sub'] = 5;
					$this->load->view('template/template',$data);
					return;
				}			
				if(($semesterke==="PILGANJIL") || ($semesterke==="PILGENAP")){
					$semesterke="PIL";
				}
			}else{
				$thn_ajar = $this->input->post('thn_ajar');
				$semesterke = $this->input->post('semesterke');
				if(($semesterke==='I') || ($semesterke==='III') || ($semesterke==='V') || ($semesterke==='VII') || ($semesterke==='PILGANJIL')){
					$semester = "GANJIL";
				}else{
					$semester = "GENAP";
				}
				if(($semesterke==='PILGANJIL') || ($semesterke==='PILGENAP')){
					$semesterke = 'PIL';
				}
			}
			
			
         $matkul = $this->input->post('matkul');
         $sks = $this->input->post('sks');
         $jurusan = $this->input->post('jurusan');
         $jumlah_kelas = $this->input->post('jumlah_kelas');
         $dosen_1 = $this->input->post('dosen_1');
         $dosen_2 = $this->input->post('dosen_2');
         if($dosen_2===''){
            $dosen_2 = $dosen_1;
         }
         $data = array(
            'thn_ajar' => $thn_ajar,
            'semester'  => $semester,
            'semesterke'  => $semesterke,
            'matkul' => $matkul,
            'sks' => $sks,
            'jurusan' => $jurusan,
            'jumlah_kelas' => $jumlah_kelas,
            'dosen_1' => $dosen_1,
				'dosen_2' => $dosen_2
         );
         //print_r($data);
         $this->mod_beban_non_if->update($id_beban_non_if,$data);
		 $this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Diupdate</div>");
         redirect('beban_non_if/add');
      //}
   }
   function tambahdata(){
		if(($this->u3a == 1)||($this->u3a == 2)){
			$sdata = $this->_valueTambah();
			$sdata['q'] = $this->mod_beban_non_if->get_beban_for_view();
			$sdata['dos1'] = $this->mod_beban_non_if->get_dosen_1();
			$sdata['dos2'] = $this->mod_beban_non_if->get_dosen_2();
			$sdata['msg'] = $this->session->flashdata('message');
			$data['main_content'] = $this->load->view('beban_non_if/view_bebannonif',$sdata,TRUE);
			$data['sub'] = 5;
			$this->load->view('template/template',$data);
		}else {
			redirect('home/');
		}
   }
   function validate_tambahdata(){
      //$this->_formvalidation();
      //if($this->form_validation->run()==false){
      //   redirect('beban_non_if/add');
      //}else{
         $temp = $this->session->userdata('auto_date');
			if($temp){
				$thn_ajar = $this->session->userdata('thn_ajar');
				$semester = $this->session->userdata('semester');
				$semesterke = $this->input->post('semesterke');
				if(($semesterke==="PILGANJIL") || ($semesterke==="PILGENAP")){
					$semesterke="PIL";
				}
			}else{
				$thn_ajar = $this->input->post('thn_ajar');
				$semesterke = $this->input->post('semesterke');
				if(($semesterke==='I') || ($semesterke==='III') || ($semesterke==='V') || ($semesterke==='VII') || ($semesterke==='PILGANJIL')){
					$semester = "GANJIL";
					
				}else{
					$semester = "GENAP";
				}
				if(($semesterke==='PILGANJIL') || ($semesterke==='PILGENAP')){
					$semesterke = 'PIL';
				}
			}
         
         $matkul = $this->input->post('matkul');
         $sks = $this->input->post('sks');
         $jurusan = $this->input->post('jurusan');
         $jumlah_kelas = $this->input->post('jumlah_kelas');
         $dosen_1 = $this->input->post('dosen_1');
         $dosen_2 = $this->input->post('dosen_2');
         if($dosen_2===''){
            $dosen_2 = $dosen_1;
         }
         $inp = array(
            'thn_ajar' => $thn_ajar,
            'semester' => $semester,
            'semesterke' => $semesterke,
            'matkul' => $matkul,
            'sks' => $sks,
            'jurusan' => $jurusan,
            'jumlah_kelas' => $jumlah_kelas,
            'dosen_1' => $dosen_1,
            'dosen_2' => $dosen_2
         );
         $this->mod_beban_non_if->tambah_data($inp);
         echo '<script>alert("Success")</script>';
		 $this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Ditambahkan</div>");
         redirect('beban_non_if/add');
      //}
   }
	
   /*-- fungsi untuk view update data --*/
   function _valueUpdate($id_beban_non_if){
      $q = $this->mod_beban_non_if->get_beban_by_id($id_beban_non_if);
         
      //id
      $data['id_beban_non_if'] = $q->id_beban_non_if;
      
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
		/*
		//SEMESTER
		$semester = $q->semester;
		$dropdown = null;
		$dropdown['Ganjil'] = 'Ganjil';
		$dropdown['Genap'] = 'Genap';
		$selected = $semester;
		$data['dropdownSemester'] = $dropdown;
		$data['selectedSemester'] = $selected;
		*/

		// semester ke dan semester 
		$semesterke = $q->semesterke;
		$semester = $q->semester;
		if($semesterke==="PIL"){
			if($semester==='GANJIL'){
				$semesterke = 'PILGANJIL';
			}else{
				$semesterke = 'PILGENAP';
			}			
		}

		//jumlah_kelas
		$data['jumlah_kelas'] = $q->jumlah_kelas;
		
		//sks
		$data['sks'] = $q->sks;
		
		//jumlah_kelas
		$data['jurusan'] = $q->jurusan;
		
		//jumlah_kelas
		$data['matkul'] = $q->matkul;
		
		//semesterke
		$data['semesterke'] = $semesterke;
		$data['semester'] = $semester;
 		//Dosen
		$dropdown = null;
		$dosen1 = $q->dosen_1;
      $selectedDosen1 = $dosen1;
		$dosen2 = $q->dosen_2;
      if($dosen2!=$dosen1){
         $selectedDosen2 = $dosen2;
         $data['selectedDosen2'] = $selectedDosen2;
      };
		$qd = $this->mod_beban_non_if->get_id_nama_dosen();
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
		
		//dropdownDosen 1
		$dropdown= null;
		$q = null;
		$q = $this->mod_beban_non_if->get_id_nama_dosen();
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
      $this->form_validation->set_rules('sks','sks','required');
      $this->form_validation->set_rules('jurusan','jurusan','required');
      $this->form_validation->set_rules('jumlah_kelas','Jumlah Kelas','required' );
      $this->form_validation->set_rules('dosen_1','nama_dosen_1','required');
      //$this->form_validation->set_rules('dosen_2','nama_dosen_2','required');
   }
}

?>