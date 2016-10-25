<?php
   class Con_pimpinan extends CI_Controller{
      public function __construct(){
         parent:: __construct();
         $this->load->model('mod_pimpinan');    
      }
      
      function index(){
         $q = $this->mod_pimpinan->get_all_pimpinan();
         $sdata['query'] = $q;
         $data['main_content'] = $this->load->view('pimpinan/view_pimpinan',$sdata, TRUE);
         $data['sub'] = 0;
         $this->load->view('template/template',$data); 
                    
      }
      
      function update_data($id_pimpinan){
         $hasil = $this->mod_pimpinan->get_pimpinan_by_id($id_pimpinan);;
         $sdata['hasil'] = $hasil;
         $jabatan = $hasil->jabatan;
         if(($jabatan==='Ketua Jurusan') || ($jabatan==='Sekretaris Jurusan') || ($jabatan==='Koordinator Prodi')){
            $temp = $this->_get_all_dosen_informatika($id_pimpinan);   
            $sdata['dropdownDosen'] = $temp['dropdownDosen'];
            $sdata['selectedDosen'] = $temp['selectedDosen'];
            //print_r($sdata);
            $data['main_content'] = $this->load->view('pimpinan/update_pimpinan_jurusan', $sdata, TRUE);            
         }else{
            //$sdata['nama_pimpinan'] = $hasil['nama_pimpinan'];
            //$sdata['nip'] = $hasil['nip'];
            $data['main_content'] = $this->load->view('pimpinan/update_pimpinan_fakultas', $sdata, TRUE);
         }
         $data['sub'] = 0;
         $this->load->view('template/template',$data);
      }
      
      function save_update_jurusan($id_pimpinan){
         //$this->_formvalidation;
         //if($this->form_validation->run()==false){
           // redirect('pimpinan/edit/'.$id_pimpinan);
         //}else{
            $id_dosen = $this->input->post('nama_pimpinan');
            $q = $this->mod_pimpinan->get_id_nama_nip_dosen_if_by_id($id_dosen);
            $nama_pimpinan = $q->nama_dosen;
            $nip = $q->nip;
            $data = array(
               'nama_pimpinan' => $nama_pimpinan,
               'nip'  => $nip
            );
            //print_r($data);
            $this->mod_pimpinan->update($id_pimpinan,$data);
            redirect('pimpinan');
         //}
         
      }
      
      function save_update_fakultas($id_pimpinan){
         //$this->_formvalidation;
         //if($this->form_validation->run()==false){
           // redirect('pimpinan/edit/'.$id_pimpinan);
         //}else{
            $nama_pimpinan = $this->input->post('nama_pimpinan');
            $nip = $this->input->post('nip');
            $data = array(
               'nama_pimpinan' => $nama_pimpinan,
               'nip'  => $nip
            );
            //print_r($data);
            $this->mod_pimpinan->update($id_pimpinan,$data);
            redirect('pimpinan');
         //}
      }
      
      function _get_all_dosen_informatika($id_pimpinan){
         $q = $this->mod_pimpinan->get_id_nama_nip_dosen_if();
         $dropdown[''] = '';
         $data = array();
         foreach($q as $hasil){
            $dropdown[$hasil->id_dosen] = $hasil->nama_dosen;
         }
         $temp_nama = $this->mod_pimpinan->get_pimpinan_by_id($id_pimpinan)->nama_pimpinan;
         $selectedDosen = $this->mod_pimpinan->get_id_dosen_if_by_nama($temp_nama);
         $data['dropdownDosen'] = $dropdown;
         $data['selectedDosen'] = $selectedDosen->id_dosen;
         return $data;
      }
   }
?>