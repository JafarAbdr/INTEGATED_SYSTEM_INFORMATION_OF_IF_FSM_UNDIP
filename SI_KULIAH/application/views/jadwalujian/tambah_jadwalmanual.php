<link href="<?php echo base_url('assets/js/plugins/forms/select2/select2.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('js/plugins/forms/validation/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/forms/select2/select2.js');?>"></script>
<script src="<?php echo base_url('assets/js/jadwal/jadwalujian_valid_manual.js');?>"></script>
<link href="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/pages/data-tables.js');?>"></script>
<script src="<?php echo base_url('assets/js/pages/data-tables2.js');?>"></script>
<link href="<?php echo base_url('assets/bootstrap-timepicker/compiled/timepicker.css');?>" rel="stylesheet" type="text/css"/> 
<script src="<?php echo base_url('assets/breakpoints/breakpoints.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap-timepicker/js/bootstrap-timepicker.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datepicker/js/bootstrap-datepicker.js');?>"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap-datepicker/css/datepicker.css');?>" />
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.js');?>"></script>
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
<script>
   jQuery(document).ready(function() {       
      App.init();
   });
</script>
<script>
function caps(id){
    document.getElementById(id).value = document.getElementById(id).value.toUpperCase();
}
</script>

<noscript><div><center><i class="icon20 i-warning"></i>&nbsp Aktifkan javascript Anda, untuk tampilan lebih baik. Klik <a href="http://www.enable-javascript.com" target="_blank"> cara mengaktifkan javascript</a></center></div></noscript>
<div class="crumb"> 
	<ul class="breadcrumb"> 
		<li><a href="#">Kelola Data</a> <span class="divider">/</span></li> 
		<li><a href="#">Jadwal</a> <span class="divider">/</span></li> 
		<li class="active">Jadwal Ujian</li>  
</ul> </div>
<div class="container-fluid">
	<div id="heading" class="page-header">
			<h1><i class="icon20 i-file-7"></i>Jadwal Ujian</h1>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="widget">
				<div class="widget-title">
					<div class="icon">
						<i class="icon20 i-table"></i>
					</div>
					<h4>Tambah dan Tampil Jadwal Ujian</h4><a href="#" class="minimize"></a>
					<?php echo $msg; ?>
				</div><!-- End .widget-title -->
									<div class="widget-content noPadding">
										<ul id="myTab" class="nav nav-tabs">
											<li class="tabmenu" id="tab1">
												<a href="#tab1-content" data-toggle="tab">Tambah Jadwal</a>
											</li>
											<li class="tabmenu" id="tab2">
												<a href="#tab2-content" data-toggle="tab">Lihat Daftar Jadwal</a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade in" id="tab1-content">
											<div class='span12'>
														<div class='widget'>
															<div class='widget-title'>
																<div class='icon'>
																	<i class='icon20 i-stack-checkmark'></i>
																</div>
																<h4> Data jadwal </h4>
																<a href='#' class='minimize'></a>
																
															</div>
															<div class='widget-content'>
																<form  action='<?php echo site_url("con_jadwal_ujian/validate_tambahdata_manual")?>' method='post' id='formjadwal' class='form-horizontal'>
																	<input type="hidden" id="url_a" name="url_a" value="<?php echo site_url('con_jadwal_ujian/get_all_pengampu')?>">
																	
																	<?php $temp=$this->session->userdata('auto_date');if(!$temp):?>
																	<div class='control-group'>
																		<label class='control-label' for='thn_ajar'>Tahun Ajaran </label>
																		<div class='controls controls-row'>
																			<div class='span4'>   
																				<?php echo form_dropdown('thn_ajar', $dropdownYear,'','class="select2" id="thn_ajar"');?>
																			</div>
																			<div id='cek_thn_ajar'>
																				<?php echo form_error('thn_ajar'); ?>
																			</div>
																		</div>
																	</div>
																	<div class='control-group'>
																		<label class='control-label' for='semester'>Semester </label>
																		<div class='controls controls-row'>
																			<div class='span3'>   
																				<?php echo form_dropdown('semester',$dropdownSemester,'','class="select2" id="semester"');?>
																			</div>
																			<div id='cek_semester'>
																				<?php echo form_error('semester'); ?>
																			</div>
																		</div>
																	</div>
																	<div class='control-group'>
																		<label class='control-label' for='uts_uas'>UTS/ UAS</label>
																		<div class='controls controls-row'>
																			<div class='span3'>
																				<select name='uts_uas' id='uts_uas' class='select2' style='width:100%;' required>
																					<option></option>
																					<option value='UTS'>UTS</option>
																					<option value='UAS'>UAS</option>
																				</select>
																			</div>
																			<div id='cek_semester'>
																				<?php echo form_error('semester'); ?>
																			</div>
																		</div>
																	</div>
																	<?php endif;?>
																	
																	<div class='control-group'>
																		<label class='control-label' for='tanggal'>Tanggal</label>
																		<div class='controls controls-row'>
																			<div class='span2'>   
																				<div class="input-append date" id="dp3" >
																					<input class="m-wrap m-ctrl-medium date-picker" name="tanggal" id="tanggal" size="16" type="text" placeholder="Isikan Tanggal"/>
																					<span class="add-on"><i class="icon-th"></i></span>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class='control-group'>
																		<label class='control-label' for='matkul'>Mata Kuliah</label>
																		<div class='controls controls-row'>
																			<div class='span5'>   
																				<?php echo form_dropdown('matkul',$dropdownMatkul,'','class="select2" id="matkul"');?>
																			</div>
																		</div>
																	</div>
																	<div class='control-group'>
																		<label class='control-label' for='jammulai'>Jam Mulai</label>
																		<div class='controls controls-row'>	
																			<div class="input-append bootstrap-timepicker-component">
																				<span class="add-on"><i class="icon-time"></i></span>
																				<input class="m-wrap m-ctrl-small timepicker-default" type="text" name='jammulai' id='jammulai' style="width:145px;"/>
																			</div> 
																		</div>
																	</div>
																	<div class='control-group'>
																		<label class='control-label' for='jamselesai'>Jam Selesai</label>
																		<div class='controls controls-row'>	
																			<div class="input-append bootstrap-timepicker-component">
																				<span class="add-on"><i class="icon-time"></i></span>
																				<input class="m-wrap m-ctrl-small timepicker-default" type="text" name='jamselesai' id='jamselesai' style="width:145px;"/>
																			</div>
																		</div>
																	</div>
																	<div class='control-group'>
																		<label class='control-label' for='peserta'>Jumlah Peserta</label>
																		<div class='controls controls-row'>	
																			<div class='span2'>
																				<input type='text' name='peserta' id='peserta' class='required' placeholder='Jumlah Peserta' style="width:135px;">
																			</div>
																		</div>
																	</div>
																	<div class='form-actions'>
																		<button type='submit' name='submit_jadwal' class='btn btn-primary'> 
																			Tambah
																		</button>
																		<?php echo anchor ('jadwalujian/add',form_button('back','Cancel','class="btn btn-danger"'));?>
																	</div>
																	
																</form>
															</div>
														</div>
													</div>
											</div>
											<div class="tab-pane fade in" id="tab2-content">
												<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="dataTable">
													<thead>
														<tr>
															<th>No.</th>
															<th>Thn/Smt</th>
															<th>Hari/ Tanggal</th>
															<th>UTS/UAS</th>
															<th>Jam</th>
															<th>Ruang</th>
															<th>Kode</th>
															<th>Mata Kuliah</th>
															<th>KLS</th>
															<th>Peserta</th>
															<th width="140px">Aksi</th>
														</tr>
													</thead>
													<tbody>
														
														<?php
															$no = 1;
															for($i=0;$i<count($q);$i++):
														?>
														<tr>
															<td> <?php echo $no; ?> </td>
															<td> <?php echo $q[$i]['thn_ajar']; echo "</br>"; echo $q[$i]['semester'];?> </td>
															<td> <?php 
																$tanggalan= $q[$i]['tanggal']; 
																$parts = explode('-',$tanggalan);
																$date  = "$parts[2]-$parts[1]-$parts[0]";
																$dayForDate = date("l", mktime(0, 0, 0, $parts[1], $parts[2], $parts[0]));
																if($dayForDate=='Monday'){
																	echo 'Senin';
																}elseif($dayForDate=='Tuesday'){
																	echo 'Selasa';
																}elseif($dayForDate=='Wednesday'){
																	echo 'Rabu';
																}elseif($dayForDate=='Thursday'){
																	echo 'Kamis';
																}elseif($dayForDate=='Friday'){
																	echo 'Jumat';
																}elseif($dayForDate=='Saturday'){
																	echo 'Sabtu';
																}elseif($dayForDate=='Sunday'){
																	echo 'Minggu';
																}
															echo ', '.$date; ?> </td>
															<td> <?php echo $q[$i]['uts_uas']; ?> </td>
															<td> <?php $mulai=$q[$i]['jammulai'];
																		  $selesai=$q[$i]['jamselesai'];
																			echo substr($mulai,0,2).'.'.substr($mulai,3,2).' - '.substr($selesai,0,2).'.'.substr($selesai,3,2);?>
															</td>
															<td> <?php echo "Akademik"; ?> </td>
															<td> <?php echo $q[$i]['kode_matkul']; ?> </td>
															<td> <?php echo $q[$i]['nama_matkul']; ?> </td>
															<td> <?php echo $q[$i]['kelas']; ?> </td>
															<td> <?php echo $q[$i]['peserta']; ?> </td>
															<td> 
																<?php echo anchor('jadwalujian/edit/'.$q[$i]['id_jadwal'],'Edit','class="btn btn-primary"');?> 
																<?php echo anchor('jadwalujian/delete/'.$q[$i]['id_jadwal'],'Delete',
																array('class'=>"btn btn-danger",'onclick'=>"return confirm('apakah anda ingin menghapus data Jadwal Ujian ?')"));?>
																
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
