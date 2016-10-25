<link href="<?php echo base_url('assets/js/plugins/forms/select2/select2.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('js/plugins/forms/validation/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/forms/select2/select2.js');?>"></script>
<script src="<?php echo base_url('assets/js/beban/beban_nonfsmvalid.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/jquery-cookie/jquery.cookie.js');?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		if($.cookie('tab_position') == null){
			$.cookie("tab_position", 'tab1');
		}
		$('#'+$.cookie('tab_position')).addClass("active");
		$('#'+$.cookie('tab_position')+'-content').addClass("active");
		var active = '#'+$.cookie('tab_position');
		
		$('.tabmenu').click(function(){
			var id = $(this).attr('id');
			
			$.removeCookie("tab_position");
			$.cookie("tab_position", id);
			
			
			
			$(active).removeClass("active");
			$(active+'-content').removeClass("active");
		})
		
	})
</script>
<script language="javascript" type="text/javascript">
	 function dropdownlist(listindex)
	 {
	 
	document.formbebannonfsm.jurusan.options.length = 0;
	 switch (listindex)
	 {
	 
	 case "Hukum" :

	 document.formbebannonfsm.jurusan.options[1]=new Option("Hukum","Hukum");
	 
	 break;
	 
	 case "Ekonomi" :

	 document.formbebannonfsm.jurusan.options[1]=new Option("Akuntansi","Akuntansi");
	 document.formbebannonfsm.jurusan.options[2]=new Option("Ekonomi dan Studi Pembangunan","Ekonomi dan Studi Pembangunan");
	 document.formbebannonfsm.jurusan.options[3]=new Option("Manajemen","Manajemen");
	 
	 break;
	 
	 case "Teknik" :

	 document.formbebannonfsm.jurusan.options[1]=new Option("Teknik Arsitektur","Teknik Arsitektur");
	 document.formbebannonfsm.jurusan.options[2]=new Option("Teknik Kimia","Teknik Kimia");
	 document.formbebannonfsm.jurusan.options[3]=new Option("Teknik Sipil","Teknik Sipil");
	 document.formbebannonfsm.jurusan.options[4]=new Option("Teknik Perkapalan","Teknik Perkapalan");
	 document.formbebannonfsm.jurusan.options[5]=new Option("Teknik Elektro","Teknik Elektro");
	 document.formbebannonfsm.jurusan.options[6]=new Option("Teknik Lingkungan","Teknik Lingkungan");
	 document.formbebannonfsm.jurusan.options[7]=new Option("Teknik Geodesi","Teknik Geodesi");
	 document.formbebannonfsm.jurusan.options[8]=new Option("Teknik Geologi","Teknik Geologi");
	 document.formbebannonfsm.jurusan.options[9]=new Option("Teknik Industri","Teknik Industri");
	 document.formbebannonfsm.jurusan.options[10]=new Option("Teknik Mesin","Teknik Mesin");
	 document.formbebannonfsm.jurusan.options[11]=new Option("Teknik Perencanaan Wilayah dan Kota","Teknik Perencanaan Wilayah dan Kota");
	 document.formbebannonfsm.jurusan.options[12]=new Option("Teknik Komputer/ Sistem Komputer","Teknik Komputer/ Sistem Komputer");
	 
	 break;
	 
	 case "Kedokteran" :

	 document.formbebannonfsm.jurusan.options[1]=new Option("Pendidikan Dokter","Pendidikan Dokter");
	 document.formbebannonfsm.jurusan.options[2]=new Option("Keperawatan","Keperawatan");
	 document.formbebannonfsm.jurusan.options[3]=new Option("Ilmu Gizi","Ilmu Gizi");
	 
	 break;
	 
	 case "Peternakan" :

	 document.formbebannonfsm.jurusan.options[1]=new Option("Ilmu Peternakan","Ilmu Peternakan");
	 
	 break;
	 
	 case "Ilmu Budaya" :

	 document.formbebannonfsm.jurusan.options[1]=new Option("Sastra Inggris","Sastra Inggris");
	 document.formbebannonfsm.jurusan.options[2]=new Option("Ilmu Sejarah","Ilmu Sejarah");
	 document.formbebannonfsm.jurusan.options[3]=new Option("Sastra Indonesia","Sastra Indonesia");
	 document.formbebannonfsm.jurusan.options[4]=new Option("Ilmu Perpustakaan","Ilmu Perpustakaan");
	 
	 break;
	 
	 case "FISIP" :

	 document.formbebannonfsm.jurusan.options[1]=new Option("Ilmu Pemerintahan","Ilmu Pemerintahan");
	 document.formbebannonfsm.jurusan.options[2]=new Option("Administrasi Bisnis","Administrasi Bisnis");
	 document.formbebannonfsm.jurusan.options[3]=new Option("Administrasi Publik","Administrasi Publik");
	 document.formbebannonfsm.jurusan.options[4]=new Option("Komunikasi","Komunikasi");
	 
	 break;
	 
	 case "FKM" :

	 document.formbebannonfsm.jurusan.options[1]=new Option("Kesehatan Masyarakat","Kesehatan Masyarakat");
	 
	 break;
	 
	 case "FSM" :

	 document.formbebannonfsm.jurusan.options[1]=new Option("Biologi","Biologi");
	 document.formbebannonfsm.jurusan.options[2]=new Option("Kimia","Kimia");
	 document.formbebannonfsm.jurusan.options[3]=new Option("Ilmu Komputer/ Informatika","Ilmu Komputer/ Informatika");
	 document.formbebannonfsm.jurusan.options[4]=new Option("Fisika","Fisika");
	 document.formbebannonfsm.jurusan.options[5]=new Option("Matematika","Matematika");
	 document.formbebannonfsm.jurusan.options[6]=new Option("Statistika","Statistika");
	 
	 break;
	 
	 case "FPIK" :

	 document.formbebannonfsm.jurusan.options[1]=new Option("Ilmu Perikanan","Ilmu Perikanan");
	 document.formbebannonfsm.jurusan.options[2]=new Option("Ilmu Kelautan","Ilmu Kelautan");
	 
	 break;
	 
	 case "Psikologi" :

	 document.formbebannonfsm.jurusan.options[1]=new Option("Psikologi","Psikologi");
	 
	 break;
	 }
	 return true;
	 }
</script>
<div class="crumb"> 
	<ul class="breadcrumb"> 
		<li><a href="#">Kelola Data</a> <span class="divider">/</span></li> 
		<li><a href="#">Beban</a> <span class="divider">/</span></li> 
		<li><a href="#">Beban Non FSM</a> <span class="divider">/</span></li> 
		<li class="active">Edit Beban Non FSM</li>
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
             &nbsp&nbsp
            <span class="badge badge-important"><?php if(isset($salah)){ echo "Semesterke dan pengaturan date semester tidak sama";}?></span>
            <a href='#' class='minimize'></a>
			<?php $msg;?>
         </div>
         <div class='widget-content'>
            <form  action='<?php echo site_url("beban_non_fsm/save_edit/".$id_beban_non_fsm)?>' method='post' name='formbebannonfsm' id='formbebannonfsm' class='form-horizontal'>
				<?php $temp=$this->session->userdata('auto_date');if(!$temp):?>
            <div class='control-group'>
               <label class='control-label' for='thn_ajar'>Tahun Ajar</label>
               <div class='controls controls-row'>
                  <div class='span6'>   
                     <?php echo form_dropdown('thn_ajar', $dropdownYear, $selectedYear,'class="select2" id="thn_ajar"');?>
                  </div>
                  <div id='cek_thn_ajar'>
                     <?php echo form_error('thn_ajar'); ?>
                  </div>
               </div>
            </div>
            <?php endif;?>
			<div class='control-group'>
				<label class='control-label' for='semesterke'>Semester ke-</label>
				<div class='controls controls-row'>
					<div class="span6">
						<select name='semesterke' id='semesterke' class='select2' style='width:100%;' required>
							<option></option>
							<option value='I' <?php if($semesterke === 'I'){echo 'selected';};?>>1 (Satu) / Ganjil</option>
							<option value='II'<?php if($semesterke === 'II'){echo 'selected';};?>>2 (Dua) / Genap</option>
							<option value='III'<?php if($semesterke === 'III'){echo 'selected';};?>>3 (Tiga) / Ganjil</option>
							<option value='IV'<?php if($semesterke === 'IV'){echo 'selected';};?>>4 (Empat) / Genap</option>
							<option value='V'<?php if($semesterke === 'V'){echo 'selected';};?>>5 (Lima) / Ganjil</option>
							<option value='VI'<?php if($semesterke === 'VI'){echo 'selected';};?>>6 (Enam) / Genap</option>
							<option value='VII'<?php if($semesterke === 'VII'){echo 'selected';};?>>7 (Tujuh) / Ganjil</option>
							<option value='VIII'<?php if($semesterke === 'VIII'){echo 'selected';};?>>8 (Delapan) / Genap</option>
							<option value='PILGANJIL'<?php if($semesterke === 'PILGANJIL'){echo 'selected';};?>>Pilihan / Ganjil</option>
							<option value='PILGENAP'<?php if($semesterke === 'PILGENAP'){echo 'selected';};?>>Pilihan / Genap</option>
						</select>
					</div>
				</div>
			</div>
			<div class='control-group'>
					<label class='control-label' for='fakultas'>Fakultas</label>
					<div class='controls controls-row'>
						<div class='span6'>
							<select name='fakultas' id='fakultas' onchange="javascript: dropdownlist(this.options[this.selectedIndex].value);" class='select2' style='width:100%;' required>
								<option></option>
								<option value='Hukum' <?php if($fakultas == 'Hukum'){echo 'selected';}?>>Fakultas Hukum</option>
								<option value='Ekonomi' <?php if($fakultas == 'Ekonomi'){echo 'selected';}?>>Fakultas Ekonomi</option>
								<option value='Teknik' <?php if($fakultas == 'Teknik'){echo 'selected';}?>>Fakultas Teknik</option>
								<option value='Kedokteran' <?php if($fakultas == 'Kedokteran'){echo 'selected';}?>>Fakultas Kedokteran</option>
								<option value='Peternakan' <?php if($fakultas == 'Peternakan'){echo 'selected';}?>>Fakultas Peternakan</option>
								<option value='Ilmu Budaya' <?php if($fakultas == 'Ilmu Budaya'){echo 'selected';}?>>Fakultas Ilmu Budaya</option>
								<option value='FISIP' <?php if($fakultas == 'FISIP'){echo 'selected';}?>>Fakultas Ilmu Sosial dan Ilmu Politik</option>
								<option value='FKM' <?php if($fakultas == 'FKM'){echo 'selected';}?>>Fakultas Kesehatan Masyarakat</option>
								<option value='FSM' <?php if($fakultas == 'FSM'){echo 'selected';}?>>Fakultas Sains dan Matematika</option>
								<option value='FPIK'<?php if($fakultas == 'FPIK'){echo 'selected';}?>>Fakultas Ilmu Perikanan dan Ilmu Kelautan</option>
								<option value='Psikologi' <?php if($fakultas == 'Psikologi'){echo 'selected';}?>>Fakultas Psikologi</option>
							</select>
						</div>
					</div>
				</div>
				<div class='control-group'>
					<label class='control-label' for='jurusan'>Jurusan</label>
					<div class='controls controls-row'>
						<div class='span6'>
							<select name='jurusan' id='jurusan' class='select2' style='width:100%;' required>
								<option></option>
								<?php if($fakultas == 'Hukum'){?>
								<option value='Hukum' <?php if($jurusan == 'Hukum'){echo 'selected';}?> >Hukum</option>
								<?php }?>
								<?php if($fakultas == 'Ekonomi'){?>
								<option value='Akuntansi' <?php if($jurusan == 'Akuntansi'){echo 'selected';}?> >Akuntansi</option>
								<option value='Ekonomi dan Studi Pembangunan' <?php if($jurusan == 'Ekonomi dan Studi Pembangunan'){echo 'selected';}?> >Ekonomi dan Studi Pembangunan</option>
								<option value='Manajemen' <?php if($jurusan == 'Manajemen'){echo 'selected';}?> >Manajemen</option>
								<?php }?>
								<?php if($fakultas == 'Teknik'){?>
								<option value='Teknik Arsitektur' <?php if($jurusan == 'Teknik Arsitektur'){echo 'selected';}?> >Teknik Arsitektur</option>
								<option value='Teknik Kimia' <?php if($jurusan == 'Teknik Kimia'){echo 'selected';}?> >Teknik Kimia</option>
								<option value='Teknik Sipil' <?php if($jurusan == 'Teknik Sipil'){echo 'selected';}?> >Teknik Sipil</option>
								<option value='Teknik Perkapalan' <?php if($jurusan == 'Teknik Perkapalan'){echo 'selected';}?> >Teknik Perkapalan</option>
								<option value='Teknik Elektro' <?php if($jurusan == 'Teknik Elektro'){echo 'selected';}?> >Teknik Elektro</option>
								<option value='Teknik Lingkungan' <?php if($jurusan == 'Teknik Lingkungan'){echo 'selected';}?> >Teknik Lingkungan</option>
								<option value='Teknik Geodesi' <?php if($jurusan == 'Teknik Geodesi'){echo 'selected';}?> >Teknik Geodesi</option>
								<option value='Teknik Industri' <?php if($jurusan == 'Teknik Industri'){echo 'selected';}?> >Teknik Industri</option>
								<option value='Teknik Mesin' <?php if($jurusan == 'Teknik Mesin'){echo 'selected';}?> >Teknik Mesin</option>
								<option value='Teknik Perencanaan Wilayah dan Kota' <?php if($jurusan == 'Teknik Perencanaan Wilayah dan Kota'){echo 'selected';}?> >Teknik Perencanaan Wilayah dan Kota</option>
								<option value='Teknik Komputer/ Sistem Komputer' <?php if($jurusan == 'Teknik Komputer/ Sistem Komputer'){echo 'selected';}?> >Teknik Komputer/ Sistem Komputer</option>
								<?php }?>
								<?php if($fakultas == 'Kedokteran'){?>
								<option value='Pendidikan Dokter' <?php if($jurusan == 'Pendidikan Dokter'){echo 'selected';}?> >Pendidikan Dokter</option>
								<option value='Keperawatan' <?php if($jurusan == 'Keperawatan'){echo 'selected';}?> >Keperawatan</option>
								<option value='Ilmu Gizi' <?php if($jurusan == 'Ilmu Gizi'){echo 'selected';}?> >Ilmu Gizi</option>
								<?php }?>
								<?php if($fakultas == 'Peternakan'){?>
								<option value='Ilmu Peternakan' <?php if($jurusan == 'Ilmu Peternakan'){echo 'selected';}?> >Ilmu Peternakan</option>
								<?php }?>
								<?php if($fakultas == 'Ilmu Budaya'){?>
								<option value='Sastra Inggris' <?php if($jurusan == 'Sastra Inggris'){echo 'selected';}?> >Sastra Inggris</option>
								<option value='Ilmu Sejarah' <?php if($jurusan == 'Ilmu Sejarah'){echo 'selected';}?> >Ilmu Sejarah</option>
								<option value='Ilmu Perpustakaan' <?php if($jurusan == 'Ilmu Perpustakaan'){echo 'selected';}?> >Ilmu Perpustakaan</option>
								<?php }?>
								<?php if($fakultas == 'FISIP'){?>
								<option value='Ilmu Pemerintahan' <?php if($jurusan == 'Ilmu Pemerintahan'){echo 'selected';}?> >Ilmu Pemerintahan</option>
								<option value='Administrasi Bisnis' <?php if($jurusan == 'Administrasi Bisnis'){echo 'selected';}?> >Administrasi Bisnis</option>
								<option value='Administrasi Publik' <?php if($jurusan == 'Administrasi Publik'){echo 'selected';}?> >Administrasi Publik</option>
								<option value='Komunikasi' <?php if($jurusan == 'Komunikasi'){echo 'selected';}?> >Komunikasi</option>
								<?php }?>
								<?php if($fakultas == 'FKM'){?>
								<option value='Kesehatan Masyarakat' <?php if($jurusan == 'Kesehatan Masyarakat'){echo 'selected';}?> >Kesehatan Masyarakat</option>
								<?php }?>
								<?php if($fakultas == 'FSM'){?>
								<option value='Biologi' <?php if($jurusan == 'Biologi'){echo 'selected';}?> >Biologi</option>
								<option value='Kimia' <?php if($jurusan == 'Kimia'){echo 'selected';}?> >Kimia</option>
								<option value='Ilmu Komputer/ Informatika' <?php if($jurusan == 'Ilmu Komputer/ Informatika'){echo 'selected';}?> >Ilmu Komputer/ Informatika</option>
								<option value='Fisika' <?php if($jurusan == 'Fisika'){echo 'selected';}?> >Fisika</option>
								<option value='Matematika' <?php if($jurusan == 'Matematika'){echo 'selected';}?> >Matematika</option>
								<option value='Statistika' <?php if($jurusan == 'Statistika'){echo 'selected';}?> >Statistika</option>
								<?php }?>
								<?php if($fakultas == 'FPIK'){?>
								<option value='Ilmu Perikanan' <?php if($jurusan == 'Ilmu Perikanan'){echo 'selected';}?> >Ilmu Perikanan</option>
								<option value='Ilmu Kelautan' <?php if($jurusan == 'Ilmu Kelautan'){echo 'selected';}?> >Ilmu Kelautan</option>
								<?php }?>
								<?php if($fakultas == 'Psikologi'){?>
								<option value='Psikologi' <?php if($jurusan == 'Psikologi'){echo 'selected';}?> >Psikologi</option>
								<?php }?>
							</select>
						</div>
					</div>
				</div>
			<div class='control-group'>
            <label class='control-label' for='matkul'>Matkul</label>
            <div class='controls controls-row'>
               <input type='text' name='matkul' id='matkul' class='required span6' placeholder='masukan jumlah kelas' value='<?php echo $matkul?>'>
               <div id='cek_matkul'>
                  <?php echo form_error('matkul'); ?>
               </div>
            </div>
         </div>
			
			<div class='control-group'>
            <label class='control-label' for='sks'>SKS</label>
            <div class='controls controls-row'>
               <input type='text' name='sks' id='sks' class='required span6' placeholder='masukan jumlah kelas' value='<?php echo $sks?>'>
               <div id='cek_sks'>
                  <?php echo form_error('sks'); ?>
               </div>
            </div>
         </div>
				
				
			<div class='control-group'>
            <label class='control-label' for='jumlah_kelas'>Jumlah Kelas</label>
            <div class='controls controls-row'>
               <input type='text' name='jumlah_kelas' id='jumlah_kelas' class='required span6' placeholder='masukan jumlah kelas' value='<?php echo $jumlah_kelas?>'>
               <div id='cek_jumlah_kelas'>
                  <?php echo form_error('jumlah_kelas'); ?>
               </div>
            </div>
         </div>
         <div class='control-group'>
            <label class='control-label' for='dosen_1'>Nama Dosen 1</label>
            <div class='controls controls-row'>
            <div class="span6">
               <?php echo form_dropdown('dosen_1',$dropdownDosen,$selectedDosen1,'class="select2" id="dosen_1"');?> 
               <div id='cek_nama_dosen_1'>
                  <?php echo form_error('dosen_1'); ?>
               </div>
               </div>
            </div>
         </div>
         <div class='control-group'>
            <label class='control-label' for='dosen_2'>Nama Dosen 2</label>
            <div class='controls controls-row'>
            <div class="span6">
               <?php echo form_dropdown('dosen_2',$dropdownDosen,(isset($selectedDosen2)) ? $selectedDosen2 : '','class="select2" id="dosen_2"');?> 
               <div id='cek_nama_dosen_2'>
                  <?php echo form_error('dosen_2'); ?>
               </div>
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
				<?php echo anchor ('beban_non_fsm/add',form_button('back','Cancel','class="btn btn-danger"'));?>
         </div>
         
         </form>
         </div>
      </div>
   </div>
   </div><!-- End .row-fluid -->
</div>
<!-- End .container-fluid -->
