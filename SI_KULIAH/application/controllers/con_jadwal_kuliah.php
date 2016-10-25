<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Con_jadwal_kuliah extends CI_Controller{
		public function __construct(){
				parent:: __construct();
				$u1 = $this->session->userdata('username');
				$u2 = $this->session->userdata('id_user');
				$u3 = $this->session->userdata('level');
				$this->u3a = $this->session->userdata('level');
				if(ISSET($u1) && ISSET($u2) && ISSET($u3) && ($u1 != "") && ($u2 != "") && ($u3 != "")){
					$this->load->model('mod_jadwal_kuliah');    
					$this->load->model('mod_report_jadwal_kuliah');    
				}else{
					redirect('home/login');
				}
		}
		function index(){
			$sdata['q'] = $this->mod_jadwal_kuliah->get_jadwal_for_view();
			
			
			$sdata['msg'] = $this->session->flashdata('message');
			$data['sub'] = 8;
			//$data['main_content'] = $this->load->view('jadwalkuliah/view_jadwal',$sdata,true);
			//$this->load->view('template/template',$data);
		}
		function delete_data($id_jadwal){
			if(($this->u3a == 1)||($this->u3a == 2)){
				$this->mod_jadwal_kuliah->delete_data($id_jadwal);
				$this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Dihapus</div>");
				redirect('jadwalkuliah/add');
			}else{
					redirect('home');
			}
		}

		function tambahdata(){
			$temp = $this->session->userdata('auto_date');
			if($temp){
				$this->tambahdata_auto();
			}else{
				$this->tambahdata_manual();
			}
		}

		function update_data($id_jadwal){
			$temp = $this->session->userdata('auto_date');
			if($temp){
				$this->update_data_auto($id_jadwal);
			}else{
				$this->update_data_manual($id_jadwal);
			}
		}
		function update_data_manual($id_jadwal){
			if(($this->u3a == 1)||($this->u3a == 2)){
			//echo $sdata['hasil'];
				$sdata = $this->_valueupdatemanual($id_jadwal);
				$sdata['hasil'] = $this->mod_jadwal_kuliah->get_jadwal_by_id($id_jadwal);
				$sdata['msg'] = $this->session->flashdata('message');
				$data['sub'] = 4;
				$sdata['id_jadwal'] = $id_jadwal;
				$data['main_content'] = $this->load->view('jadwalkuliah/update_jadwal_manual',$sdata,TRUE);
				$this->load->view('template/template',$data);      
			}else{
					redirect('home');
			}
		}
		function update_data_auto($id_jadwal){
			if(($this->u3a == 1)||($this->u3a == 2)){
			//echo $sdata['hasil'];
				$sdata = $this->_valueUpdate($id_jadwal);
				$sdata['hasil'] = $this->mod_jadwal_kuliah->get_jadwal_by_id($id_jadwal);
				$sdata['msg'] = $this->session->flashdata('message');
				$sdata['id_jadwal'] = $id_jadwal;
				$data['sub'] = 4;
				$data['main_content'] = $this->load->view('jadwalkuliah/update_jadwal',$sdata,TRUE);
				$this->load->view('template/template',$data);      
			}else{
					redirect('home');
			}
		}

		function save_update_data_manual($id_jadwal){
				
				$thn_ajar = $this->input->post('thn_ajar');
				$semester = $this->input->post('semester');
				$hari = $this->input->post('hari');      
				$jammulai = $this->input->post('jammulai');      
				$jamselesai = $this->input->post('jamselesai');      
				$ruang = $this->input->post('ruang');
				$kelas = $this->input->post('kelas');
				$h= implode(', ',$kelas);
				$id_pengampu = $this->input->post('matkul');
				$q = $this->mod_jadwal_kuliah->get_all_pengampu_by_id($id_pengampu);
				$matkul = $q->matkul;
				$dosen_1 = $q->dosen_1;
				$dosen_2 = $q->dosen_2;
				
	//			print_r($kelas);
				$query = $this->mod_jadwal_kuliah->cek_sama_id($id_jadwal, $thn_ajar, $semester, $hari, $jammulai, $jamselesai, $ruang, $matkul, $dosen_1, $dosen_2);
				//print_r($query);
				$inp = array(
					'thn_ajar' => $thn_ajar,
					'semester' => $semester,
					'hari' => $hari,
					'jammulai' => $jammulai,
					'jamselesai' => $jamselesai,
					'ruang' => $ruang,
					'pengampu' => $id_pengampu,
					'kelas' => $h,
					'matkul' => $matkul,
					'dosen_1' => $dosen_1,
					'dosen_2' => $dosen_2
				);
				$temp = null;
				$temp = $this->_cek_kesamaan($query, $inp);
				if($temp['bool']){
					$sdata = $this->_valuetambahmanual_salah($thn_ajar, $semester, $inp['pengampu']);
					$sdata['msg'] = $this->session->flashdata('message');
					//$sdata['q'] = $this->mod_jadwal_kuliah->get_jadwal_for_view();
					$sdata['temp'] = $temp;
					$sdata['inp'] = $inp;
					$sdata['id_jadwal'] = $id_jadwal;
					$data['main_content'] = $this->load->view('jadwalkuliah/update_jadwal_manual_2',$sdata,TRUE);
					$data['sub'] = 4;
					$this->load->view('template/template',$data);
				}else{
					$this->mod_jadwal_kuliah->update($id_jadwal, $inp);
					echo '<script>alert("Success")</script>';
					$this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Diupdate</div>");
					redirect('jadwalkuliah/add');
				}
			}

		function save_update_data($id_jadwal){
				$temp = $this->session->userdata('auto_date');
				$thn_ajar = $this->session->userdata('thn_ajar');
				$semester = $this->session->userdata('semester');
				$hari = $this->input->post('hari');      
				$jammulai = $this->input->post('jammulai');      
				$jamselesai = $this->input->post('jamselesai');      
				$ruang = $this->input->post('ruang');
				$kelas = $this->input->post('kelas');
				$h= implode(', ',$kelas);
				$id_pengampu = $this->input->post('matkul');
				$q = $this->mod_jadwal_kuliah->get_all_pengampu_by_id($id_pengampu);
				$matkul = $q->matkul;
				$dosen_1 = $q->dosen_1;
				$dosen_2 = $q->dosen_2;
				
	//			print_r($kelas);
				$query = $this->mod_jadwal_kuliah->cek_sama_id($id_jadwal, $thn_ajar, $semester, $hari, $jammulai, $jamselesai, $ruang, $matkul, $dosen_1, $dosen_2);
				//print_r($query);
				$inp = array(
					'thn_ajar' => $thn_ajar,
					'semester' => $semester,
					'hari' => $hari,
					'jammulai' => $jammulai,
					'jamselesai' => $jamselesai,
					'ruang' => $ruang,
					'pengampu' => $id_pengampu,
					'kelas' => $h,
					'matkul' => $matkul,
					'dosen_1' => $dosen_1,
					'dosen_2' => $dosen_2
				);
				$temp = null;
				$temp = $this->_cek_kesamaan($query, $inp);
				if($temp['bool']){
					$sdata = $this->_valueUpdate($id_jadwal);
					$sdata['msg'] = $this->session->flashdata('message');
					//$sdata['q'] = $this->mod_jadwal_kuliah->get_jadwal_for_view();
					$sdata['temp'] = $temp;
					$sdata['inp'] = $inp;
					$sdata['id_jadwal'] = $id_jadwal;
					
					$data['main_content'] = $this->load->view('jadwalkuliah/update_jadwal_2',$sdata,TRUE);
					$data['sub'] = 4;
					$this->load->view('template/template',$data);
				}else{
					$this->mod_jadwal_kuliah->update($id_jadwal, $inp);
					echo '<script>alert("Success")</script>';
					$this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Diupdate</div>");
					redirect('jadwalkuliah/add');
				}
			}
		
		function tambahdata_manual(){
			if(($this->u3a == 1)||($this->u3a == 2)){
				$sdata = $this->_valuetambahmanual();
				$sdata['msg'] = $this->session->flashdata('message');
				$sdata['q'] = $this->mod_jadwal_kuliah->get_jadwal_for_view();
				
				$sdata['dos1'] = $this->mod_jadwal_kuliah->get_dosen_1();
				$sdata['dos2'] = $this->mod_jadwal_kuliah->get_dosen_2();
				$sdata['msg'] = $this->session->flashdata('message');
				$data['main_content'] = $this->load->view('jadwalkuliah/tambah_jadwalmanual',$sdata,TRUE);
				$data['sub'] = 4;
				$this->load->view('template/template',$data);
			}else{
					redirect('home');
			}
		}

		function validate_tambahdatamanual(){
				$thn_ajar = $this->input->post('thn_ajar');
				$semester = $this->input->post('semester');
				$hari = $this->input->post('hari');      
				$jammulai = $this->input->post('jammulai');      
				$jamselesai = $this->input->post('jamselesai');      
				$ruang = $this->input->post('ruang');
				$kelas = $this->input->post('kelas');
				$h= implode(', ',$kelas);
				$id_pengampu = $this->input->post('matkul');
				$q = $this->mod_jadwal_kuliah->get_all_pengampu_by_id($id_pengampu);
				$matkul = $q->matkul;
				$dosen_1 = $q->dosen_1;
				$dosen_2 = $q->dosen_2;
				
				//print_r($kelas);
				$query = $this->mod_jadwal_kuliah->cek_sama($thn_ajar, $semester, $hari, $jammulai, $jamselesai, $ruang, $matkul, $dosen_1, $dosen_2);
				//print_r($query);
				$inp = array(
					'thn_ajar' => $thn_ajar,
					'semester' => $semester,
					'hari' => $hari,
					'jammulai' => $jammulai,
					'jamselesai' => $jamselesai,
					'ruang' => $ruang,
					'pengampu' => $id_pengampu,
					'kelas' => $h,
					'matkul' => $matkul,
					'dosen_1' => $dosen_1,
					'dosen_2' => $dosen_2
				);
				//echo $this->_cek_kesamaan($query, $inp);
				$temp = null;
				$temp = $this->_cek_kesamaan($query, $inp);
				if($temp['bool']){
					$sdata = $this->_valuetambahmanual_salah($thn_ajar, $semester, $inp['pengampu']);
					$sdata['msg'] = $this->session->flashdata('message');
					$sdata['q'] = $this->mod_jadwal_kuliah->get_jadwal_for_view();
					$sdata['temp'] = $temp;
					$sdata['inp'] = $inp;
					$data['main_content'] = $this->load->view('jadwalkuliah/tambah_jadwalmanual_2',$sdata,TRUE);
					$data['sub'] = 4;
					$this->load->view('template/template',$data);
				}else{
					$this->mod_jadwal_kuliah->tambah_data($inp);
					echo '<script>alert("Success")</script>';
					$this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Ditambahkan</div>");
					redirect('jadwalkuliah/add');
				}
		}

		function tambahdata_auto(){
			if(($this->u3a == 1)||($this->u3a == 2)){
				$sdata = $this->_valueTambah();
				$sdata['msg'] = $this->session->flashdata('message');
				$sdata['q'] = $this->mod_jadwal_kuliah->get_jadwal_for_view();
				
				$sdata['dos1'] = $this->mod_jadwal_kuliah->get_dosen_1();
				$sdata['dos2'] = $this->mod_jadwal_kuliah->get_dosen_2();
				$sdata['msg'] = $this->session->flashdata('message');
				$data['main_content'] = $this->load->view('jadwalkuliah/tambah_jadwal',$sdata,TRUE);
				$data['sub'] = 4;
				$this->load->view('template/template',$data);
			}else{
					redirect('home');
			}
		}
		
		function validate_tambahdata(){
				$thn_ajar = $this->session->userdata('thn_ajar');
				$semester = $this->session->userdata('semester');
				$hari = $this->input->post('hari');      
				$jammulai = $this->input->post('jammulai');      
				$jamselesai = $this->input->post('jamselesai');      
				$ruang = $this->input->post('ruang');
				$kelas = $this->input->post('kelas');
				$h= implode(', ',$kelas);
				$id_pengampu = $this->input->post('matkul');
				$q = $this->mod_jadwal_kuliah->get_all_pengampu_by_id($id_pengampu);
				$matkul = $q->matkul;
				$dosen_1 = $q->dosen_1;
				$dosen_2 = $q->dosen_2;
				
				//print_r($kelas);
				$query = $this->mod_jadwal_kuliah->cek_sama($thn_ajar, $semester, $hari, $jammulai, $jamselesai, $ruang, $matkul, $dosen_1, $dosen_2);
				//print_r($query);
				$inp = array(
					'thn_ajar' => $thn_ajar,
					'semester' => $semester,
					'hari' => $hari,
					'jammulai' => $jammulai,
					'jamselesai' => $jamselesai,
					'ruang' => $ruang,
					'pengampu' => $id_pengampu,
					'kelas' => $h,
					'matkul' => $matkul,
					'dosen_1' => $dosen_1,
					'dosen_2' => $dosen_2
				);
				/*
				print_r($query);
				print_r($inp);
				foreach ($query as $hasil) {
					$jam1=$inp['jammulai'];
					$jam2=$hasil->jammulai;
					$jam3=$inp['jamselesai'];
					$jam4=$hasil->jamselesai;
					$jamku1 = DateTime::createFromFormat('H:I a', $jam1);
					$jamku2 = DateTime::createFromFormat('H:I a', $jam2);
					$jamku3 = DateTime::createFromFormat('H:I a', $jam3);
					$jamku4 = DateTime::createFromFormat('H:I a', $jam4);
					if(($jamku1<=$jamku2)&&($jamku3>=$jamku4)){
						echo 'sini';
					}
					if(($jamku1<=$jamku2)&&($jamku3>=$jamku2)){
						echo 'as';
					}	
				}*/
				//print_r($inp);
				//echo $this->_cek_kesamaan($query, $inp);
				$temp = null;
				$temp = $this->_cek_kesamaan($query, $inp);
				//print_r($inp);
				
				
				if($temp['bool']){
					$sdata = $this->_valueTambah();
					$sdata['msg'] = $this->session->flashdata('message');
					$sdata['q'] = $this->mod_jadwal_kuliah->get_jadwal_for_view();
					$sdata['temp'] = $temp;
					$kk = explode(", ", $inp['kelas']);
					$inp['kelas']= $kk;
					$sdata['inp'] = $inp;
					//print_r($inp);
					$data['main_content'] = $this->load->view('jadwalkuliah/tambah_jadwal_2',$sdata,TRUE);
					$data['sub'] = 4;
					$this->load->view('template/template',$data);
				}else{
					$this->mod_jadwal_kuliah->tambah_data($inp);
					echo '<script>alert("Success")</script>';
					$this->session->set_flashdata('message', "<div class='badge badge-success'>Data Berhasil Ditambahkan</div>");
					redirect('jadwalkuliah/add');
				}
		}
		
		
		function _cek_kesamaan($query, $inp){
			foreach ($query as $hasil) {
			//print_r($hasil);	
				$jam1 = date('H:i',strtotime($inp['jammulai']));
				$hhmm1 = date('H:i',strtotime($hasil->jammulai));
				$jam2 = date('H:i',strtotime($inp['jamselesai']));
				$hhmm2 = date('H:i',strtotime($hasil->jamselesai));
				/*echo $jam1;
				echo ' ';
				echo $hhmm1;
				echo ' ';

				echo $jam2;
				echo ' ';
				
				echo $hhmm2;
				echo ' ';
				*/
				if(($jam1<=$hhmm1) && ($jam2>=$hhmm1) && ($jam2<=$hhmm2)){
					//echo 'ini';
					if($hasil->ruang===$inp['ruang']){
						$return['bool'] = true;
						$return['salah'] = 'ruang';
						return $return;
					}
					if($hasil->matkul===$inp['matkul']){
						$return['bool'] = true;
						$return['salah'] = 'mata kuliah';
						return $return;
					}
					if($hasil->kelas===$inp['kelas']){
						$return['bool'] = true;
						$return['salah'] = 'kelas';
						return $return;
					}
					if($hasil->dosen_1===$inp['dosen_1']){
						$return['bool'] = true;
						$return['salah'] = 'dosen 1';
						return $return;
					}
					if($hasil->dosen_2===$inp['dosen_2']){
						$return['bool'] = true;
						$return['salah'] = 'dosen 2';
						return $return;
					}
					if($hasil->jamselesai===$inp['jamselesai']){
						$return['bool'] = true;
						$return['salah'] = 'jamselesai';
						return $return;
					}
				}
				if(($jam1<=$hhmm1) && ($jam2>=$hhmm2)){
					//echo 'ini2';
					
					if($hasil->ruang===$inp['ruang']){
						$return['bool'] = true;
						$return['salah'] = 'ruang';
						return $return;
					}
					if($hasil->matkul===$inp['matkul']){
						$return['bool'] = true;
						$return['salah'] = 'mata kuliah';
						return $return;
					}
					if($hasil->kelas===$inp['kelas']){
						$return['bool'] = true;
						$return['salah'] = 'kelas';
						return $return;
					}
					if($hasil->dosen_1===$inp['dosen_1']){
						$return['bool'] = true;
						$return['salah'] = 'dosen 1';
						return $return;
					}
					if($hasil->dosen_2===$inp['dosen_2']){
						$return['bool'] = true;
						$return['salah'] = 'dosen 2';
						return $return;
					}
					if($hasil->jamselesai===$inp['jamselesai']){
						$return['bool'] = true;
						$return['salah'] = 'jamselesai';
						return $return;
					}
				}
				if(($jam1>=$hhmm1) && ($jam1<=$hhmm2) && ($jam2>=$hhmm2)){
					//echo 'ini2';
					
					if($hasil->ruang===$inp['ruang']){
						$return['bool'] = true;
						$return['salah'] = 'ruang';
						return $return;
					}
					if($hasil->matkul===$inp['matkul']){
						$return['bool'] = true;
						$return['salah'] = 'mata kuliah';
						return $return;
					}
					if($hasil->kelas===$inp['kelas']){
						$return['bool'] = true;
						$return['salah'] = 'kelas';
						return $return;
					}
					if($hasil->dosen_1===$inp['dosen_1']){
						$return['bool'] = true;
						$return['salah'] = 'dosen 1';
						return $return;
					}
					if($hasil->dosen_2===$inp['dosen_2']){
						$return['bool'] = true;
						$return['salah'] = 'dosen 2';
						return $return;
					}
					if($hasil->jamselesai===$inp['jamselesai']){
						$return['bool'] = true;
						$return['salah'] = 'jamselesai';
						return $return;
					}
				}
				if(($jam1>=$hhmm1) && ($jam2<=$hhmm2)){
					//echo 'ini4';
					
					if($hasil->ruang===$inp['ruang']){
						$return['bool'] = true;
						$return['salah'] = 'ruang';
						return $return;
					}
					if($hasil->matkul===$inp['matkul']){
						$return['bool'] = true;
						$return['salah'] = 'mata kuliah';
						return $return;
					}
					if($hasil->kelas===$inp['kelas']){
						$return['bool'] = true;
						$return['salah'] = 'kelas';
						return $return;
					}
					if($hasil->dosen_1===$inp['dosen_1']){
						$return['bool'] = true;
						$return['salah'] = 'dosen 1';
						return $return;
					}
					if($hasil->dosen_2===$inp['dosen_2']){
						$return['bool'] = true;
						$return['salah'] = 'dosen 2';
						return $return;
					}
					if($hasil->jamselesai===$inp['jamselesai']){
						$return['bool'] = true;
						$return['salah'] = 'jamselesai';
						return $return;
					}
				}
			}
			$return['bool'] =  false;
			return $return;
		}
		
		
		/*-- fungsi untuk view update data --*/
		function _valueUpdate($id_jadwal){
			$q = $this->mod_jadwal_kuliah->get_jadwal_by_id($id_jadwal);
			//print_r($q);	
			//id
			$data['id_jadwal'] = $q->id_jadwal;
			
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
			//echo $q->pengampu;

			//dropdown matkul dari pengampu
			$dropdown = null;
			$thn_ajar = $q->thn_ajar;
			$semester = $q->semester;
			$pengampu = $q->pengampu;
			$q1 = $this->mod_jadwal_kuliah->get_id_nama_matkul_from_pengampu($thn_ajar, $semester);
			//$q = $this->mod_jadwal_kuliah->get_id_nama_matkul();
			$dropdown[''] = '';
			foreach($q1 as $hasil){
				$dropdown[$hasil->id_pengampu] = $this->mod_jadwal_kuliah->get_nama_matkul_by_id($hasil->matkul)->nama_matkul;
			}

			$tempo = $this->mod_jadwal_kuliah->get_matkul_from_pengampu_by_id($pengampu)->matkul;
			//print_r($pengampu);
			$dropdown[$pengampu] = $this->mod_jadwal_kuliah->get_nama_matkul_by_id($tempo)->nama_matkul;
			$data['dropdownMatkul'] = $dropdown;
			$data['selectedMatkul'] = $pengampu;
			
			//Ruang
			$ruang = $q->ruang;
			//echo $q->ruang;
			//echo $q->ruang;
			$dropdown = null;
			$qr = $this->mod_jadwal_kuliah->get_id_nama_ruang();
			$dropdown[''] = '';
			foreach($qr as $hasil){
				$dropdown[$hasil->id_ruang] = $hasil->nama_ruang;
			}
			$selected = $ruang;
			$data['dropdownRuang'] = $dropdown;
			$data['selectedRuang'] = $selected;

			
			//kelas
			$kelas = $q->kelas;
			$kk = explode(", ", $kelas);
			$data['kelas'] = $kk;
			
			return $data;
		}
		/*-- end of fungsi --*/
		
		function _valueupdatemanual($id_jadwal){
			$q = $this->mod_jadwal_kuliah->get_jadwal_by_id($id_jadwal);
			//print_r($q);	
			//id
			$data['id_jadwal'] = $q->id_jadwal;
			
			//tahun ajar
			$tahun_ajar = $q->thn_ajar;
			$qus = $this->mod_jadwal_kuliah->get_thnajar_from_pengampu();
			foreach ($qus as $hasil) {
				$dropdown[$hasil->thn_ajar] = $hasil->thn_ajar;
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
			//echo $q->pengampu;

			//dropdown matkul dari pengampu
			$dropdown = null;
			$thn_ajar = $q->thn_ajar;
			$semester = $q->semester;
			$pengampu = $q->pengampu;
			$q1 = $this->mod_jadwal_kuliah->get_id_nama_matkul_from_pengampu($thn_ajar, $semester);
			//$q = $this->mod_jadwal_kuliah->get_id_nama_matkul();
			$dropdown[''] = '';
			foreach($q1 as $hasil){
				$dropdown[$hasil->id_pengampu] = $this->mod_jadwal_kuliah->get_nama_matkul_by_id($hasil->matkul)->nama_matkul;
			}

			$tempo = $this->mod_jadwal_kuliah->get_matkul_from_pengampu_by_id($pengampu)->matkul;
			//print_r($pengampu);
			$dropdown[$pengampu] = $this->mod_jadwal_kuliah->get_nama_matkul_by_id($tempo)->nama_matkul;
			$data['dropdownMatkul'] = $dropdown;
			$data['selectedMatkul'] = $pengampu;
			
			//Ruang
			$ruang = $q->ruang;
			//echo $q->ruang;
			//echo $q->ruang;
			$dropdown = null;
			$qr = $this->mod_jadwal_kuliah->get_id_nama_ruang();
			$dropdown[''] = '';
			foreach($qr as $hasil){
				$dropdown[$hasil->id_ruang] = $hasil->nama_ruang;
			}
			$selected = $ruang;
			$data['dropdownRuang'] = $dropdown;
			$data['selectedRuang'] = $selected;

			
			//kelas
			$kelas = $q->kelas;
			$kk = explode(", ", $kelas);
			$data['kelas'] = $kk;
			
			return $data;
		}

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
			
			//dropdown matkul dari pengampu
			$dropdown = null;
			$thn_ajar = $this->session->userdata('thn_ajar');
			$semester = $this->session->userdata('semester');
			$q = $this->mod_jadwal_kuliah->get_id_nama_matkul_from_pengampu($thn_ajar, $semester);
			//$q = $this->mod_jadwal_kuliah->get_id_nama_matkul();
			$dropdown[''] = '';
			foreach($q as $hasil){
				$dropdown[$hasil->id_pengampu] = $this->mod_jadwal_kuliah->get_nama_matkul_by_id($hasil->matkul)->nama_matkul;
			}
			$data['dropdownMatkul'] = $dropdown;
		//	print_r($dropdown);
			//dropdown ruang
			$dropdown = null;
			$q = $this->mod_jadwal_kuliah->get_id_nama_ruang();
			$dropdown[''] = '';
			foreach($q as $hasil){
				$dropdown[$hasil->id_ruang] = $hasil->nama_ruang;
			}
			$data['dropdownRuang'] = $dropdown;
			
			
			
			//return
			return $data;
		}

		/*-- end of fungsi --*/
	

		function _valuetambahmanual(){
			//dropdown YEar
			$q = $this->mod_jadwal_kuliah->get_thnajar_from_pengampu();
			//print_r($q);
			//$dropdown[''] = '';
			foreach ($q as $hasil) {
				$dropdown[$hasil->thn_ajar] = $hasil->thn_ajar;
			}
			$data['dropdownYear'] = $dropdown;
			
			//dropdown semester
			$dropdown = null;
			$month = date('n');
			$dropdown[''] = '';
			$data['dropdownSemester'] = $dropdown;
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
			
			//dropdown matkul dari pengampu
			$dropdown = null;
			/*
			$thn_ajar = $this->session->userdata('thn_ajar');
			$semester = $this->session->userdata('semester');
			$q = $this->mod_jadwal_kuliah->get_id_nama_matkul_from_pengampu($thn_ajar, $semester);
			//$q = $this->mod_jadwal_kuliah->get_id_nama_matkul();
			$dropdown[''] = '';
			foreach($q as $hasil){
				$dropdown[$hasil->id_pengampu] = $this->mod_jadwal_kuliah->get_nama_matkul_by_id($hasil->matkul)->nama_matkul;
			}*/
			$dropdown[''] = '';
			$data['dropdownMatkul'] = $dropdown;
			//print_r($dropdown);
			//dropdown ruang
			$dropdown = null;
			$q = $this->mod_jadwal_kuliah->get_id_nama_ruang();
			$dropdown[''] = '';
			foreach($q as $hasil){
				$dropdown[$hasil->id_ruang] = $hasil->nama_ruang;
			}
			$data['dropdownRuang'] = $dropdown;			
			//return
			return $data;
		}

		function _valuetambahmanual_salah($thn_ajar, $semester, $pengampu){
			//dropdown YEar
			$q = $this->mod_jadwal_kuliah->get_thnajar_from_pengampu();
			//print_r($q);
			//$dropdown[''] = '';
			foreach ($q as $hasil) {
				$dropdown[$hasil->thn_ajar] = $hasil->thn_ajar;
			}
			$data['dropdownYear'] = $dropdown;
			$data['selectedYear'] = $thn_ajar;
			//dropdown semester
			$dropdown = null;
			$month = date('n');
			$dropdown[''] = '';
			$data['dropdownSemester'] = $dropdown;
			if($month<=6){
				$dropdown['Ganjil'] = 'Ganjil';
				$dropdown['Genap'] = 'Genap';
				$data['dropdownSemester'] = $dropdown;
			}else{
				$dropdown['Ganjil'] = 'Ganjil';
				$dropdown['Genap'] = 'Genap';
				$data['dropdownSemester'] = $dropdown;
			}
			$data['selectedSemester'] = $semester;
			
			//dropdown matkul dari pengampu
			$dropdown = null;
			$q = $this->mod_jadwal_kuliah->get_id_nama_matkul_from_pengampu($thn_ajar, $semester);
			//$q = $this->mod_jadwal_kuliah->get_id_nama_matkul();
			$dropdown[''] = '';
			foreach($q as $hasil){
				$dropdown[$hasil->id_pengampu] = $this->mod_jadwal_kuliah->get_nama_matkul_by_id($hasil->matkul)->nama_matkul;
			}
			$data['dropdownMatkul'] = $dropdown;
			$data['selectedMatkul'] = $pengampu;

			//print_r($dropdown);

			//dropdown ruang
			$dropdown = null;
			$q = $this->mod_jadwal_kuliah->get_id_nama_ruang();
			$dropdown[''] = '';
			foreach($q as $hasil){
				$dropdown[$hasil->id_ruang] = $hasil->nama_ruang;
			}
			$data['dropdownRuang'] = $dropdown;			
			//return
			return $data;
		}

		function get_semester(){
			$thn_ajar =	$this->input->get('thn_ajar');
			$q = $this->mod_jadwal_kuliah->get_semester_by_thn_ajar($thn_ajar);
			//$i=0;
			foreach($q as $hasil){
				echo "<option value=$hasil->semester>$hasil->semester</option>";
			}
		}

		function get_all_pengampu(){
			$thn_ajar =	$this->input->get('thn_ajar');
			$semester = $this->input->get('semester');
			$q = $this->mod_jadwal_kuliah->get_id_nama_matkul_from_pengampu($thn_ajar, $semester);
			//$i=0;
			foreach($q as $hasil){
				$a = $hasil->id_pengampu;
				$b = $this->mod_jadwal_kuliah->get_nama_matkul_by_id($hasil->matkul)->nama_matkul;
				echo "<option value=$a>$b</option>";
			}
		}

		/*Untuk menampilkan matriks jadwal*/
		function index2(){
			$sdata['q'] = $this->mod_report_jadwal->get_jadwal_for_view();
			
			$data['sub'] = 4;
			$data['main_content'] = $this->load->view('report/matrik/view_jadwal',$sdata,true);
			$this->load->view('template/template',$data);
		}

		function jadwal(){
			$sdata = $this->_getDropDown();
			//Load View
			$data['main_content'] = $this->load->view('report/matrik/form_jadwal',$sdata,TRUE);
			$data['sub'] = 4;
			$this->load->view('template/template',$data);
		}   
		
		function jadwal_view(){
			$sdata = $this->_getDropDown(); 
			$thn_ajar = $this->input->post('thn_ajar');
			//echo '<br/><br/><br/><br/>';
			//echo $thn_ajar;
			$sdata['thn_ajar'] = $thn_ajar;
			$ssdata['thn_ajar'] = $thn_ajar;
			$sdata['selectedYear'] = $thn_ajar;
			$thn_ajar = '\''.$thn_ajar.'\'';
			$semester = $this->input->post('semester');
			//echo $semester;
			$sdata['semester'] = $semester;
			$ssdata['semester'] = $semester;
			$sdata['selectedSemester'] = $semester;
			$semester = '\''.$semester.'\'';
			
			$hari = $this->mod_report_jadwal->get_hari($thn_ajar, $semester);
			if(!isset($hari) or empty($hari)){
				$sdata['hasil_report'] = '
					<div class="row-fluid">
					<div class="span12">
					<div class="widget">
						<div class="widget-title">
							<div class="icon">
							 <i class="icon20 i-table"></i>
							</div>
						<h4>Data Jadwal</h4><a href="#" class="minimize"></a>
						</div><!-- End .widget-title -->
						<div class="widget-content">
							Tidak Ada Data Jadwal 
						</div>
				';
				$data['main_content'] = $this->load->view('report/matrik/form_jadwal',$sdata,TRUE);
				$data['sub'] = 4;
				$this->load->view('template/template',$data);
			}else{
				$tabel_hari = array();
				for($i=0;$i<count($hari);$i++){
					$tabel_hari['id_hari'][$i] = $this->mod_report_jadwal->get_hari_by_id($hari[$i]['hari'])->id_hari;
					$tabel_hari['nama_hari'][$i] = $this->mod_report_jadwal->get_hari_by_id($hari[$i]['hari'])->nama_hari;
				}
				//print_r($tabel_hari);
				for($i=0;$i<count($tabel_hari['id_hari']);$i++){
					$jadwal[$tabel_hari['id_hari'][$i]] = $this->_getJadwal($thn_ajar, $semester, $tabel_hari['id_hari'][$i]);
				}
				//print_r($jadwal]);
				foreach($jadwal as $key => $jadwalhari){
					//print_r($jadwalhari);
					$banyakdata = count($jadwalhari['id_jadwal']);
					$sama[$key]['ruang'] = array_fill(0,$banyakdata,false);
					$sama[$key]['jammulai'] = array_fill(0,$banyakdata,false);
					//print_r($sama);
					for($i=0;$i<$banyakdata;$i++){
						for($j=$i+1;$j<$banyakdata;$j++){
							if($jadwalhari['ruang'][$i]['id_ruang']==$jadwalhari['ruang'][$j]['id_ruang']){
								$sama[$key]['ruang'][$i] = true;
								$sama[$key]['ruang'][$j] = true;
							}
							if($jadwalhari['jammulai'][$i]==$jadwalhari['jammulai'][$j]){
								$sama[$key]['jammulai'][$i] = true;
								$sama[$key]['jammulai'][$j] = true;
							}
						}
					}
				//	print_r($sama);
				}
				
				$sdata['tabel_hari'] = $tabel_hari;
				$sdata['jadwal'] = $jadwal;
				$sdata['sama'] = $sama;
				$ssdata['table_jadwal'] = $this->load->view('report/matrik/table_jadwal',$sdata, TRUE);
				$sssdata['hasil_report'] = $this->load->view('report/matrik/view_jadwal',$ssdata, TRUE);
				$data['main_content'] = $this->load->view('report/matrik/form_jadwal',$sssdata,TRUE);
				$data['sub'] = 4;
				$this->load->view('template/template',$data);
			}
			
		}
		function export_Jadwal(){
			if(($this->u3a == 1)||($this->u3a == 2)){
				$sdata = $this->_getDropDown(); 
				$thn_ajar = $this->input->get('thn_ajar');
				$sdata['thn_ajar'] = $thn_ajar;
				$sdata['thn_ajar'] = $thn_ajar;
				
				$thn_ajar = '\''.$thn_ajar.'\'';
				$semester = $this->input->get('semester');
				$sdata['semester'] = $semester;
				$ssdata['semester'] = $semester;
				
				$semester = '\''.$semester.'\'';
				$hari = $this->mod_report_jadwal->get_hari($thn_ajar, $semester);
				$tabel_hari = array();
					for($i=0;$i<count($hari);$i++){
						$tabel_hari['id_hari'][$i] = $this->mod_report_jadwal->get_hari_by_id($hari[$i]['hari'])->id_hari;
						$tabel_hari['nama_hari'][$i] = $this->mod_report_jadwal->get_hari_by_id($hari[$i]['hari'])->nama_hari;
					}
					//print_r($tabel_hari);
					for($i=0;$i<count($tabel_hari['id_hari']);$i++){
						$jadwal[$tabel_hari['id_hari'][$i]] = $this->_getJadwal($thn_ajar, $semester, $tabel_hari['id_hari'][$i]);
					}
					$sdata['tabel_hari'] = $tabel_hari;
					$sdata['jadwal'] = $jadwal;
				$ssdata['table_jadwal'] = $this->load->view('report/matrik/table_jadwal',$sdata,TRUE);
				$this->load->view('export/JadwalExcel',$ssdata);
			}else {
				redirect('home/');
			}
		}
		
		function _getJadwal($thn_ajar, $semester, $hari){
			$jadwal = $this->mod_report_jadwal->get_all_by_thn_ajar_smt_hari($thn_ajar, $semester, $hari);
			for($i=0;$i<count($jadwal);$i++){
				$hasil_jadwal['id_jadwal'][$i] = $jadwal[$i]['id_jadwal'];
				//$hasil_jadwal['thn_ajar'][$i] = $jadwal[$i]['thn_ajar'];
				//$hasil_jadwal['hari'][$i] = $jadwal[$i]['hari'];
				$hasil_jadwal['jammulai'][$i] = $jadwal[$i]['jammulai'];
				$hasil_jadwal['jamselesai'][$i] = $jadwal[$i]['jamselesai'];
				$hasil_jadwal['ruang'][$i] = $this->mod_report_jadwal->get_ruang_by_id($jadwal[$i]['ruang'])[0];
				$hasil_jadwal['matkul'][$i] = $this->mod_report_jadwal->get_matkul_by_id($jadwal[$i]['matkul'])[0];
				$hasil_jadwal['kelas'][$i] = $jadwal[$i]['kelas'];
				//$hasil_jadwal['dosen_1'][$i] = $this->mod_report_jadwal->get_dosen_by_id($jadwal[$i]['dosen_1'])[0];
				//$hasil_jadwal['dosen_2'][$i] = $this->mod_report_jadwal->get_dosen_by_id($jadwal[$i]['dosen_2'])[0];
			}
			return $hasil_jadwal;
		}
	
		/*-- end of fungsi --*/
		function _getDropDown(){
			//SELECT TAHUN
			$dropdownYear[''] = '';
			$year = date('Y');
			$month = date('n');
			if($month<=6){
				$dropdownYear[($year-1).'/'.($year)] = ($year-1).'/'.($year);
				$selectedYear = ($year-1).'/'.($year);
			}else{
				$dropdownYear[($year).'/'.($year+1)] = ($year).'/'.($year+1);
				$selectedYear = ($year).'/'.($year+1);
			}
			
			$q = $this->mod_report_jadwal->get_thn_ajar_jadwal();
			foreach($q as $hasil){
				$dropdownYear[$hasil->thn_ajar] = $hasil->thn_ajar;
			}
			$sdata['dropdownYear'] = $dropdownYear;
			$sdata['selectedYear'] = $selectedYear;
			
			//SELECT SEMESTER
			$dropdownSemester[''] = '';
			$dropdownSemester['Ganjil'] = 'Ganjil';
			$dropdownSemester['Genap'] = 'Genap';
			$sdata['dropdownSemester'] = $dropdownSemester;
			if($month<=6){
				$sdata['selectedSemester'] = 'Genap';
			}else{
				$sdata['selectedSemester'] = 'Ganjil';
			}
			return $sdata;
		}
	}

?>