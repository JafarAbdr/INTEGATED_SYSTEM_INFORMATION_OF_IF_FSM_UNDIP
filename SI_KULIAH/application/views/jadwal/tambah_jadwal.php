<link href="<?php echo base_url('assets/js/plugins/forms/select2/select2.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('js/plugins/forms/validation/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/forms/select2/select2.js');?>"></script>
<script src="<?php echo base_url('assets/js/jadwal/jadwal_valid.js');?>"></script>

<link href="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/pages/data-tables.js');?>"></script>
<script src="<?php echo base_url('assets/js/pages/data-tables2.js');?>"></script>

<link href="<?php echo base_url('assets/bootstrap-timepicker/compiled/timepicker.css');?>" rel="stylesheet" type="text/css"/> 
<script src="<?php echo base_url('assets/breakpoints/breakpoints.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap-timepicker/js/bootstrap-timepicker.js');?>"></script>
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
		<li class="active">Jadwal</li>  
</ul> </div>
<div class="container-fluid">
	<div id="heading" class="page-header">
			<h1><i class="icon20 i-file-7"></i>Jadwal</h1>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="widget">
				<div class="widget-title">
					<div class="icon">
						<i class="icon20 i-table"></i>
					</div>
					<h4>Tambah dan Tampil Jadwal</h4><a href="#" class="minimize"></a>
					&nbsp&nbsp <?php echo $msg?>
					
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
											<div class='span8'>
														<div class='widget'>
															<div class='widget-title'>
																<div class='icon'>
																	<i class='icon20 i-stack-checkmark'></i>
																</div>
																<h4> Data jadwal </h4>
															</div>
															<div class='widget-content'>
																<form  action='<?php echo site_url("jadwal/save_add")?>' method='post' id='formjadwal' class='form-horizontal'>
																	<?php $temp=$this->session->userdata('auto_date');if(!$temp):?>
																	<div class='control-group'>
																		<label class='control-label' for='thn_ajar'>Tahun Ajaran </label>
																		<div class='controls controls-row'>
																			<div class='span4'>   
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
																			<div class='span3'>   
																				<?php echo form_dropdown('semester',$dropdownSemester,$selectedSemester,'class="select2" id="semester"');?>
																			</div>
																			<div id='cek_semester'>
																				<?php echo form_error('semester'); ?>
																			</div>
																		</div>
																	</div>
																	<?php endif;?>
																	<div class='control-group'>
																		<label class='control-label' for='hari'>Hari</label>
																		<div class='controls controls-row'>
																			<div class='span3'>
																				<select name='hari' id='hari' class='select2' style='width:100%;' required>
																					<option></option>
																					<option value='1'>Senin</option>
																					<option value='2'>Selasa</option>
																					<option value='3'>Rabu</option>
																					<option value='4'>Kamis</option>
																					<option value='5'>Jumat</option>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="control-group">
																		<label class="control-label">Jam Mulai</label>
																		<div class="controls">
																			  <div class="input-append bootstrap-timepicker-component">
																					<span class="add-on"><i class="icon-time"></i></span>
																					<input class="m-wrap m-ctrl-small timepicker-default" type="text" name='jammulai' id='jammulai'/>
																				</div>
																		</div>
																	</div>
																	<div class="control-group">
																		<label class="control-label">Jam Selesai</label>
																		<div class="controls">
																			  <div class="input-append bootstrap-timepicker-component">
																					<span class="add-on"><i class="icon-time"></i></span>
																					<input class="m-wrap m-ctrl-small timepicker-default" type="text" name='jamselesai' id='jamselesai'/>
																				</div>
																		</div>
																	</div>
																	<div class='control-group'>
																		<label class='control-label' for='ruang'>Ruang</label>
																		<div class='controls controls-row'>
																			<div class='span8'>   
																				<?php echo form_dropdown('ruang',$dropdownRuang,'','class="select2" id="ruang"');?>
																			</div>
																		</div>
																	</div>
																	<div class='control-group'>
																		<label class='control-label' for='matkul'>Mata Kuliah </label>
																		<div class='controls controls-row'>
																			<div class='span8'>   
																				<?php echo form_dropdown('matkul',$dropdownMatkul,'','class="select2" id="matkul"');?>
																			</div>
																			<div id='cek_matkul'>
																				<?php echo form_error('matkul'); ?>
																			</div>
																		</div>
																	</div>
																	<!--
																	<div class='control-group'>
																		<label class='control-label' for='kelas'>Kelas</label>
																		<div class='controls controls-row'>
																			<div class='span4'>
																				<select name='kelas[]' id='kelas' class='select2' style='width:100%;' multiple required>
																					<option></option>
																					<option value='A'>A</option>
																					<option value='B'>B</option>
																					<option value='C'>C</option>
																				</select>
																			</div>
																		</div>
																	</div>
																	-->
																	<div class='form-actions'>
																		<button type='submit' name='submit_jadwal' class='btn btn-primary'> 
																			Tambah
																		</button>
																		<?php echo anchor ('jadwal',form_button('back','Cancel','class="btn btn-danger"'));?>
																	</div>
																	
																</form>
															</div>
														</div>
													</div>
													<div class='span4'>
														<div class='widget'>
															<div class='widget-title'>
																<div class='icon'>
																	<i class='icon20 i-stack-checkmark'></i>
																</div>
																<h4> Info Jam Kuliah </h4>
																<a href='#' class='minimize'></a>
															</div>
															<div class='widget-content'>
																<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover">
																	<thead>
																		<tr>
																			<th rowspan ='2' width="20px"><center>No.</center></th>
																			<th colspan='2'><center>Jam</center></th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr class="success">
																			<td></td>
																			<td><center>Senin - Kamis</center></td>
																			<td><center>Jumat</center></td>
																		</tr>
																		<tr>
																			<td><center>1</center></td>
																			<td><center>07.30 - 08.20</center></td>
																			<td><center>08.00 - 08.50</center></td>
																		</tr>
																		<tr>
																			<td><center>2</center></td>
																			<td><center>08.20 - 09.10</center></td>
																			<td><center>08.50 - 09.40</center></td>
																		</tr>
																		<tr>
																			<td><center>3</center></td>
																			<td><center>09.10 - 10.00</center></td>
																			<td><center>09.40 - 10.30</center></td>
																		</tr>
																		<tr>
																			<td colspan="3"><center>Jeda 10 Menit</center></td>
																		</tr>
																		<tr>
																			<td><center>4</center></td>
																			<td colspan='2'><center>10.10 - 11.00</center></td>
																		</tr>
																		<tr>
																			<td><center>5</center></td>
																			<td colspan='2'><center>11.00 - 11.50</center></td>
																		</tr>
																		<tr>
																			<td><center>6</center></td>
																			<td colspan='2'><center>11.50 - 12.40</center></td>
																		</tr>
																		<tr>
																			<td colspan="3"><center>Jeda 20 Menit</center></td>
																		</tr>
																		<tr>
																			<td><center>7</center></td>
																			<td colspan='2'><center>13.00 - 13.50</center></td>
																		</tr>
																		<tr>
																			<td><center>8</center></td>
																			<td colspan='2'><center>13.50 - 14.40</center></td>
																		</tr>
																		<tr>
																			<td><center>9</center></td>
																			<td colspan='2'><center>14.40 - 15.30</center></td>
																		</tr>
																		<tr>
																			<td colspan="3"><center>Jeda 10 Menit</center></td>
																		</tr>
																		<tr>
																			<td><center>10</center></td>
																			<td colspan='2'><center>15.40 - 16.30</center></td>
																		</tr>
																		<tr>
																			<td><center>11</center></td>
																			<td colspan='2'><center>16.30 - 17.20</center></td>
																		</tr>
																		<tr>
																			<td><center>12</center></td>
																			<td colspan='2'><center>17.20 - 18.10</center></td>
																		</tr>
																	</tbody>
																</table>
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
															<th>Hari</th>
															<th>Jam</th>
															<th>Ruang</th>
															<th>Kode</th>
															<th>Mata Kuliah</th>
															<th>SKS</th>
															<th>SMT</th>
															<th>KLS</th>
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
															<td> <?php echo $q[$i]['nama_hari']; ?> </td>
															<td> <?php $mulai=$q[$i]['jammulai'];
																		  $selesai=$q[$i]['jamselesai'];
																			echo substr($mulai,0,2).'.'.substr($mulai,3,2).' - '.substr($selesai,0,2).'.'.substr($selesai,3,2);?>
															</td>
															<td> <?php echo $q[$i]['nama_ruang']; ?> </td>
															<td> <?php echo $q[$i]['kode_matkul']; ?> </td>
															<td> <?php echo $q[$i]['nama_matkul']; ?> </td>
															<td> <?php echo $q[$i]['sks']; ?> </td>
															<td> <?php echo $q[$i]['semesterke']; ?> </td>
															<td> <?php echo $q[$i]['kelas']; ?> </td>
															
															<td> 
																<?php echo anchor('jadwal/edit/'.$q[$i]['id_jadwal'],'Edit','class="btn btn-primary"');?>
																<?php echo anchor('jadwal/delete/'.$q[$i]['id_jadwal'],'Delete',
																array('class'=>"btn btn-danger",'onclick'=>"return confirm('apakah anda ingin menghapus data Jadwal Kuliah ?')"));?>	
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
