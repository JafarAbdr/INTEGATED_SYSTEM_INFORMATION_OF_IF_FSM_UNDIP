<link href="<?php echo base_url('assets/js/plugins/forms/select2/select2.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('js/plugins/forms/validation/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/forms/select2/select2.js');?>"></script>
<script src="<?php echo base_url('assets/js/beban/beban_nonfsmvalid.js')?>"></script>
<link href="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/pages/data-tables.js');?>"></script>
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
		<li class="active">Beban Non FSM</li>
</ul> </div>
 <div class="container-fluid">
	<div id="heading" class="page-header">
			<h1><i class="icon20 i-file-7"></i>Beban Mengajar Non FSM</h1>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="widget">
				<div class="widget-title">
					<div class="icon">
						<i class="icon20 i-table"></i>
					</div>
					<h4>Tambah dan Tampil Beban Mengajar Non FSM</h4><a href="#" class="minimize"></a>
				</div><!-- End .widget-title -->
									<div class="widget-content noPadding">
										<ul id="myTab" class="nav nav-tabs">
											<li class="active">
												<a href="#tambah" data-toggle="tab">Tambah Beban Mengajar</a>
											</li>
											<li>
												<a href="#view" data-toggle="tab">Lihat Daftar Beban Mengajar</a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade in active" id="tambah">
												<form  action='<?php echo site_url("beban_non_fsm/save_add")?>' method='post' name='formbebannonfsm' id='formbebannonfsm' class='form-horizontal'>
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
														<label class='control-label' for='matkul'>Mata Kuliah </label>
														<div class='controls controls-row'>
															<div class='span8'>   
																<input type='text' name='matkul' id='matkul' class='required span12' placeholder='masukan jumlah kelas'>
															</div>
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
																	<option value='I'>1 (Satu)</option>
																	<option value='II'>2 (Dua)</option>
																	<option value='III'>3 (Tiga)</option>
																	<option value='IV'>4 (Empat)</option>
																	<option value='V'>5 (Lima)</option>
																	<option value='VI'>6 (Enam)</option>
																	<option value='VII'>7 (Tujuh)</option>
																	<option value='VIII'>8 (Delapan)</option>
																	<option value='Pilihan'>Pilihan</option>
																</select>
															</div>
														</div>
													</div>
													<div class='control-group'>
														<label class='control-label' for='sks'>SKS</label>
														<div class='controls controls-row'><div class="span3">
															<input type='text' name='sks' id='sks' class='required span12' placeholder='masukan sks'>
															<div id='cek_sks'>
																<?php echo form_error('sks'); ?>
															</div></div>
														</div>
													</div>
													<div class='control-group'>
														<label class='control-label' for='fakultas'>Fakultas</label>
														<div class='controls controls-row'>
															<div class='span6'>
																<select name='fakultas' id='fakultas' onchange="javascript: dropdownlist(this.options[this.selectedIndex].value);" class='select2' style='width:100%;' required>
																	<option></option>
																	<option value='Hukum'>Fakultas Hukum</option>
																	<option value='Ekonomi'>Fakultas Ekonomi</option>
																	<option value='Teknik'>Fakultas Teknik</option>
																	<option value='Kedokteran'>Fakultas Kedokteran</option>
																	<option value='Peternakan'>Fakultas Peternakan</option>
																	<option value='Ilmu Budaya'>Fakultas Ilmu Budaya</option>
																	<option value='FISIP'>Fakultas Ilmu Sosial dan Ilmu Politik</option>
																	<option value='FKM'>Fakultas Kesehatan Masyarakat</option>
																	<option value='FSM'>Fakultas Sains dan Matematika</option>
																	<option value='FPIK'>Fakultas Ilmu Perikanan dan Ilmu Kelautan</option>
																	<option value='Psikologi'>Fakultas Psikologi</option>
																</select>
															</div>
														</div>
													</div>
													<div class='control-group'>
														<label class='control-label' for='jurusan'>Jurusan</label>
														<div class='controls controls-row'>
															<div class='span6'>
																<noscript>
																	<select name="jurusan" id="jurusan" >
																		<option value="">Pilih Jurusan/ Prodi</option>
																	</select>
																</noscript>
																<script type="text/javascript" language="JavaScript">
																	document.write('<select name="jurusan" id="jurusan" class="select2" style="width:100%;" required><option value=""></option></select>')
																</script>
															</div>
														</div>
													</div>
													<div class='control-group'>
														<label class='control-label' for='jumlah_kelas'>Jumlah Kelas</label>
														<div class='controls controls-row'>
															<input type='text' name='jumlah_kelas' id='jumlah_kelas' class='required span3' placeholder='masukan jumlah kelas'>
															<div id='cek_jumlah_kelas'>
																<?php echo form_error('jumlah_kelas'); ?>
															</div>
														</div>
													</div>
													<div class='control-group'>
														<label class='control-label' for='dosen_1'>Nama Dosen 1</label>
														<div class='controls controls-row'>
															<?php echo form_dropdown('dosen_1',$dropdownDosen,'','class="select2" id="dosen_1"');?> 
															<div id='cek_nama_dosen_1'>
																<?php echo form_error('dosen_1'); ?>
															</div>
														</div>
													</div>
													<div class='control-group'>
														<label class='control-label' for='dosen_2'>Nama Dosen 2</label>
														<div class='controls controls-row'>
															<?php echo form_dropdown('dosen_2',$dropdownDosen,'','class="select2" id="dosen_2"');?> 
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
															Tambah
														</button>
													</div>
													
												</form>
											</div>
											<div class="tab-pane fade" id="view">
												<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="dataTable">
													<thead>
														<tr>
															<th>No.</th>
															<th>Tahun Ajar</th>
															<th>Semester</th>
															<th>Mata Kuliah</th>
															<th>SKS</th>
															<th>Fakultas</th>
															<th>Jurusan</th>
															<th>Kelas</th>
															<th>Dosen 1</th>
															<th>Dosen 2</th>
															<th width = "140px">Aksi</th>
														</tr>
													</thead>
													<tbody>
														
														<?php
															$no = 1;
															for($i=0;$i<count($q);$i++):
														?>
														<tr>
															<td> <?php echo $no; ?> </td>
															<td> <?php echo $q[$i]['thn_ajar']; ?> </td>
															<td> <?php echo $q[$i]['semester']; ?> </td>
															<td> <?php echo $q[$i]['matkul']; ?> </td>
															<td> <?php echo $q[$i]['sks']; ?> </td>
															<td> <?php echo $q[$i]['fakultas']; ?> </td>
															<td> <?php echo $q[$i]['jurusan']; ?> </td>
															<td> <?php echo $q[$i]['jumlah_kelas']; ?> </td>
															<td> <?php echo $dos1[$i]['nama_dosen']; ?> </td>
															<td> <?php echo ($dos2[$i]['nama_dosen'] != $dos1[$i]['nama_dosen']) ? $dos2[$i]['nama_dosen']: '-'; ?> </td>
															<td> 
																<?php echo anchor('beban_non_fsm/edit/'.$q[$i]['id_beban_non_fsm'],'Edit','class="btn btn-primary"'); ?> 
																<a href="#myModal" role="button" class="btn btn-danger" data-toggle="modal">Delete</a>
																	<!-- Modal -->
																	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																	  <div class="modal-header">
																		 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
																		 <h3 id="myModalLabel">Hapus Data</h3>
																	  </div>
																	  <div class="modal-body">
																		 <p>Apakah Anda yakin ingin menghapus data ini ?</p>
																	  </div>
																	  <div class="modal-footer">
																		 <?php echo anchor('con_beban_non_fsm/delete_data/'.$q[$i]['id_beban_non_fsm'],'Delete',
																						array('class'=>"btn btn-danger"));?>
																		 <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
																	  </div>
																	</div>
																	<!-- Modal -->
															</td>
														</tr>
														<?php
															$no++;
															endfor;
														?>
														
													</tbody>
												</table>
											</div>
										</div>
									</div>				
			</div><!-- End .widget -->
		</div><!-- End .span12 -->
	</div>
</div>		 
