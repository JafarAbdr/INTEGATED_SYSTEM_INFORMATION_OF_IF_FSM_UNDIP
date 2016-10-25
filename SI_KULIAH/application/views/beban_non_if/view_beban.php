<link href="<?php echo base_url('assets/js/plugins/forms/select2/select2.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('js/plugins/forms/validation/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/forms/select2/select2.js');?>"></script>
<script src="<?php echo base_url('assets/js/beban/beban_nonifvalid.js')?>"></script>
<link href="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/pages/data-tables.js');?>"></script>
<div class="crumb"> 
	<ul class="breadcrumb"> 
		<li><a href="#">Kelola Data</a> <span class="divider">/</span></li> 
		<li><a href="#">Beban</a> <span class="divider">/</span></li> 
		<li class="active">Beban Non IF</li>
</ul> </div>
<div class="container-fluid">
	<div id="heading" class="page-header">
			<h1><i class="icon20 i-file-7"></i>Beban Mengajar Non IF</h1>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="widget">
				<div class="widget-title">
					<div class="icon">
						<i class="icon20 i-table"></i>
					</div>
					<h4>Tambah dan Tampil Beban Mengajar Non IF</h4><a href="#" class="minimize"></a>
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
												<form  action='<?php echo site_url("beban_non_if/save_add")?>' method='post' id='formbebannonif' class='form-horizontal'>
													<?php $temp=$this->session->userdata('auto_date');if(!$temp):?>
													<div class='control-group'>
														<label class='control-label' for='thn_ajar'>Tahun Ajaran </label>
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
													<?php if(!$temp){?>
													<div class='control-group'>
														<label class='control-label' for='semesterke'>Semester ke-</label>
														<div class='controls controls-row'>
															<div class='span6'>
																<select name='semesterke' id='semesterke' class='select2' style='width:100%;' required>
																	<option></option>
																	<option value='I'>1 (Satu) / Ganjil</option>
																	<option value='II'>2 (Dua) / Genap</option>
																	<option value='III'>3 (Tiga) / Ganjil</option>
																	<option value='IV'>4 (Empat) / Genap</option>
																	<option value='V'>5 (Lima) / Ganjil</option>
																	<option value='VI'>6 (Enam) / Genap</option>
																	<option value='VII'>7 (Tujuh) / Ganjil</option>
																	<option value='VIII'>8 (Delapan) / Genap</option>
																	<option value='PILGANJIL'>Pilihan / Ganjil</option>
																	<option value='PILGENAP'>Pilihan / Genap</option>
																</select>
															</div>
														</div>
													</div>
													<?php
													}else{
														$temp_sem=$this->session->userdata('semester');
														if($temp_sem==='Ganjil'){
													?>
															<div class='control-group'>
															<label class='control-label' for='semesterke'>Semester ke-</label>
															<div class='controls controls-row'>
																<div class='span6'>
																	<select name='semesterke' id='semesterke' class='select2' style='width:100%;' required>
																		<option></option>
																		<option value='I'>1 (Satu) / Ganjil</option>
																		
																		<option value='III'>3 (Tiga) / Ganjil</option>
																	
																		<option value='V'>5 (Lima) / Ganjil</option>
																		
																		<option value='VII'>7 (Tujuh) / Ganjil</option>
																		
																		<option value='PILGANJIL'>Pilihan / Ganjil</option>
																		
																	</select>
																</div>
															</div>
															</div>
													<?php	}else{
													?>
															<div class='control-group'>
															<label class='control-label' for='semesterke'>Semester ke-</label>
															<div class='controls controls-row'>
																<div class='span6'>
																	<select name='semesterke' id='semesterke' class='select2' style='width:100%;' required>
																		<option></option>
																		
																		<option value='II'>2 (Dua) / Genap</option>
																		
																		<option value='IV'>4 (Empat) / Genap</option>
																		
																		<option value='VI'>6 (Enam) / Genap</option>
																		
																		<option value='VIII'>8 (Delapan) / Genap</option>
																		
																		<option value='PILGENAP'>Pilihan / Genap</option>
																	</select>
																</div>
															</div>
															</div>
													<?php
													}
													}
													?>
													
													<div class='control-group'>
														<label class='control-label' for='jurusan'>Jurusan</label>
														<div class='controls controls-row'>
															<div class='span6'>
																<select name='jurusan' id='jurusan' class='select2' style='width:100%;' required>
																	<option></option>
																	<option value='Ilkom/ Informatika'>Ilmu Komputer/ Informatika</option>
																	<option value='Statistika'>Statistika</option>
																	<option value='Fisika'>Fisika</option>
																	<option value='Kimia'>Kimia</option>
																	<option value='Matematika'>Matematika</option>
																	<option value='Biologi'>Biologi</option>
																	<option value='D3 Insel'>D3 Insel</option>
																</select>
															</div>
														</div>
													</div>
													<div class='control-group'>
														<label class='control-label' for='matkul'>Mata Kuliah </label>
														<div class='controls controls-row'>
															<div class='span6'>   
																<input type='text' name='matkul' id='matkul' class='required span12' placeholder='Masukan mata kuliah'>
															</div>
															<div id='cek_matkul'>
																<?php echo form_error('matkul'); ?>
															</div>
														</div>
													</div>
													<div class='control-group'>
														<label class='control-label' for='sks'>SKS</label>
														<div class='controls controls-row'>
															<input type='text' name='sks' id='sks' class='required span6' placeholder='Masukan sks'>
															<div id='cek_sks'>
																<?php echo form_error('sks'); ?>
															</div>
														</div>
													</div>
													<div class='control-group'>
														<label class='control-label' for='jumlah_kelas'>Jumlah Kelas</label>
														<div class='controls controls-row'>
															<input type='text' name='jumlah_kelas' id='jumlah_kelas' class='required span6' placeholder='Masukan jumlah kelas'>
															<div id='cek_jumlah_kelas'>
																<?php echo form_error('jumlah_kelas'); ?>
															</div>
														</div>
													</div>
													<div class='control-group'>
														<label class='control-label' for='dosen_1'>Nama Dosen 1</label>
														<div class='controls controls-row'>
														<div class='span6'>
															<?php echo form_dropdown('dosen_1',$dropdownDosen,'','class="select2" id="dosen_1"');?> 
															<div id='cek_nama_dosen_1'>
																<?php echo form_error('dosen_1'); ?>
															</div>
															</div>
														</div>
													</div>
													<div class='control-group'>
														<label class='control-label' for='dosen_2'>Nama Dosen 2</label>
														<div class='controls controls-row'>
														<div class='span6'>
															<?php echo form_dropdown('dosen_2',$dropdownDosen,'','class="select2" id="dosen_2"');?> 
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
															<td> <?php echo $q[$i]['thn_ajar'].' '.$q[$i]['semester']; ?> </td>
															<td> <?php echo $q[$i]['semesterke']; ?> </td>
															<td> <?php echo $q[$i]['matkul']; ?> </td>
															<td> <?php echo $q[$i]['sks']; ?> </td>
															<td> <?php echo $q[$i]['jurusan']; ?> </td>
															<td> <?php echo $q[$i]['jumlah_kelas']; ?> </td>
															<td> <?php echo $dos1[$i]['nama_dosen']; ?> </td>
															<td> <?php echo ($dos2[$i]['nama_dosen'] != $dos1[$i]['nama_dosen']) ? $dos2[$i]['nama_dosen']: '-'; ?> </td>
															<td> 
																<?php echo anchor('beban_non_if/edit/'.$q[$i]['id_beban_non_if'],'Edit','class="btn btn-primary"'); ?> 
																<?php echo anchor('beban_non_if/delete/'.$q[$i]['id_beban_non_if'],'Delete',
																array('class'=>"btn btn-danger",'onclick'=>"return confirm('apakah anda ingin menghapus data beban mengajar ?')"));?>
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
