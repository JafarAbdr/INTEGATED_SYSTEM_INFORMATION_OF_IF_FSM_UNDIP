<link href="<?php echo base_url('assets/js/plugins/forms/select2/select2.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('js/plugins/forms/validation/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/forms/select2/select2.js');?>"></script>
<script src="<?php echo base_url('assets/js/beban/beban_nonifvalid.js')?>"></script>
<div class="crumb"> 
	<ul class="breadcrumb"> 
		<li><a href="#">Kelola Data</a> <span class="divider">/</span></li> 
		<li><a href="#">Beban</a> <span class="divider">/</span></li> 
		<li><a href="#">Beban Non IF</a> <span class="divider">/</span></li> 
		<li class="active">Edit Beban Non IF</li>
</ul> </div>
<div class="container-fluid">
   <div id="heading" class="page-header">
      <h1><i class="icon20 i-file-7"></i>Form Beban Mengajar</h1>
   </div>
   <div class="row-fluid">
      <!-- Start page from here -->
   
   <div class='span12'>
      <div class='widget'>
         <div class='widget-title'>
            <div class='icon'>
               <i class='icon20 i-stack-checkmark'></i>
            </div>
            <h4> Data Beban Mengajar </h4>
            <a href='#' class='minimize'></a>
         </div>
         <div class='widget-content'>
            <form  action='<?php echo site_url("beban_non_if/save_edit/".$id_beban_non_if)?>' method='post' id='formbebannonif' class='form-horizontal'>
				<?php $temp=$this->session->userdata('auto_date');if(!$temp):?>
            <div class='control-group'>
               <label class='control-label' for='thn_ajar'>Tahun Ajaran </label>
               <div class='controls controls-row'>
                  <div class='span8'>   
                     <?php echo form_dropdown('thn_ajar', $dropdownYear, $selectedYear,'class="select2" id="thn_ajar"');?>
                  </div>
                  <div id='cek_thn_ajar'>
                     <?php echo form_error('thn_ajar'); ?>
                  </div>
               </div>
            </div>
            <div class='control-group'>
               <label class='control-label' for='semester'>Semester </label>
               <div class='controls controls-row'>
                  <div class='span8'>   
                     <?php echo form_dropdown('semester',$dropdownSemester,$selectedSemester,'class="select2" id="semester"');?>
                  </div>
                  <div id='cek_semester'>
                     <?php echo form_error('semester'); ?>
                  </div>
               </div>
            </div>
            <?php endif;?>
				<div class='control-group'>
               <label class='control-label' for='matkul'>Mata Kuliah</label>
               <div class='controls controls-row'>
                  <input type='text' name='matkul' id='matkul' class='required span12' placeholder='masukan jumlah kelas' value='<?php echo $matkul?>'>
                  <div id='cek_matkul'>
                     <?php echo form_error('matkul'); ?>
                  </div>
               </div>
            </div>
				<div class='control-group'>
					<label class='control-label' for='semesterke'>Semester ke-</label>
					<div class='controls controls-row'>
						<div class='span3'>
							<select name='semesterke' id='semesterke' class='select2' style='width:100%;' required>
								<option></option>
								<option value='I' <?php if($semesterke == 'I'){echo 'selected';};?>>1 (Satu)</option>
								<option value='II'<?php if($semesterke == 'II'){echo 'selected';};?>>2 (Dua)</option>
								<option value='III'<?php if($semesterke == 'III'){echo 'selected';};?>>3 (Tiga)</option>
								<option value='IV'<?php if($semesterke == 'IV'){echo 'selected';};?>>4 (Empat)</option>
								<option value='V'<?php if($semesterke == 'V'){echo 'selected';};?>>5 (Lima)</option>
								<option value='VI'<?php if($semesterke == 'VI'){echo 'selected';};?>>6 (Enam)</option>
								<option value='VII'<?php if($semesterke == 'VII'){echo 'selected';};?>>7 (Tujuh)</option>
								<option value='VIII'<?php if($semesterke == 'VIII'){echo 'selected';};?>>8 (Delapan)</option>
								<option value='Pilihan'<?php if($semesterke == 'Pilihan'){echo 'selected';};?>>Pilihan</option>
							</select>
						</div>
					</div>
				</div>
				<div class='control-group'>
               <label class='control-label' for='sks'>SKS</label>
               <div class='controls controls-row'>
                  <input type='text' name='sks' id='sks' class='required span12' placeholder='masukan jumlah kelas' value='<?php echo $sks?>'>
                  <div id='cek_sks'>
                     <?php echo form_error('sks'); ?>
                  </div>
               </div>
            </div>
				
				<div class='control-group'>
               <label class='control-label' for='jurusan'>Jurusan</label>
               <div class='controls controls-row'>
                  <div class='span3'>
							<select name='jurusan' id='jurusan' class='select2' style='width:100%;' required>
								<option></option>
								<option value='Ilkom/ Informatika' <?php if($jurusan == 'Ilkom/ Informatika'){echo 'selected';};?>>Ilmu Komputer/ Informatika</option>
								<option value='Statistika' <?php if($jurusan == 'Statistika'){echo 'selected';};?>>Statistika</option>
								<option value='Fisika' <?php if($jurusan == 'Fisika'){echo 'selected';};?>>Fisika</option>
								<option value='Kimia' <?php if($jurusan == 'Kimia'){echo 'selected';};?>>Kimia</option>
								<option value='Matematika' <?php if($jurusan == 'Matematika'){echo 'selected';};?>>Matematika</option>
								<option value='Biologi' <?php if($jurusan == 'Biologi'){echo 'selected';};?>>Biologi</option>
								<option value='D3 Insel' <?php if($jurusan == 'D3 Insel'){echo 'selected';};?>>D3 Insel</option>
							</select>
						</div>
               </div>
            </div>
				<div class='control-group'>
               <label class='control-label' for='jumlah_kelas'>Jumlah Kelas</label>
               <div class='controls controls-row'>
                  <input type='text' name='jumlah_kelas' id='jumlah_kelas' class='required span12' placeholder='masukan jumlah kelas' value='<?php echo $jumlah_kelas?>'>
                  <div id='cek_jumlah_kelas'>
                     <?php echo form_error('jumlah_kelas'); ?>
                  </div>
               </div>
            </div>
            <div class='control-group'>
               <label class='control-label' for='dosen_1'>Nama Dosen 1</label>
               <div class='controls controls-row'>
                  <?php echo form_dropdown('dosen_1',$dropdownDosen,$selectedDosen1,'class="select2" id="dosen_1"');?> 
                  <div id='cek_nama_dosen_1'>
                     <?php echo form_error('dosen_1'); ?>
                  </div>
               </div>
            </div>
            <div class='control-group'>
               <label class='control-label' for='dosen_2'>Nama Dosen 2</label>
               <div class='controls controls-row'>
                  <?php echo form_dropdown('dosen_2',$dropdownDosen,(isset($selectedDosen2)) ? $selectedDosen2 : '','class="select2" id="dosen_2"');?> 
                  <div id='cek_nama_dosen_2'>
                     <?php echo form_error('dosen_2'); ?>
                  </div>
               </div>
            </div>
            
            <!--
            <div class='control-group'>
               <label class='control-label' for=''></label>
               <div class='controls controls-row'>
                  <input type='text' name='' id='' class='required span12' >
                  <div id=''>
                     <?php echo form_error(''); ?>
                  </div>
               </div>
            </div>
            -->
            
            <div class='form-actions'>
               <button type='submit' name='submit_beban' class='btn btn-primary'> 
                  Update
               </button>
					<?php echo anchor ('beban_non_if/add',form_button('back','Cancel','class="btn btn-danger"'));?>
            </div>
            
            </form>
         </div>
      </div>
   </div>
   </div><!-- End .row-fluid -->
</div>
<!-- End .container-fluid -->
