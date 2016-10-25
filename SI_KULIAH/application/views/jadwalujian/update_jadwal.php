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
<script type="text/javascript" src="<?php echo base_url('assets/datepicker/js/bootstrap-datepicker.js');?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap-datepicker/css/datepicker.css');?>" />
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.js');?>"></script>

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
		<li class="active">Edit Jadwal</li>
</ul> </div>
<div class="container-fluid">
	<div id="heading" class="page-header">
			<h1><i class="icon20 i-file-7"></i>Update Data jadwal</h1>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="widget">
				<div class="widget-title">
					<div class="icon">
						<i class="icon20 i-table"></i>
					</div>
					<h4>Update Data jadwal</h4><a href="#" class="minimize"></a>
					<?php echo $msg; ?>
				</div><!-- End .widget-title -->
				<div class="widget-content">
					<form  action='<?php echo site_url("jadwalujian/save_edit/".$id_jadwal)?>' method='post' id='formjadwal' class='form-horizontal'>
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
								<div class='span3'>   
									<?php echo form_dropdown('semester',$dropdownSemester,$selectedSemester,'class="select2" id="semester"');?>
								</div>
								<div id='cek_semester'>
									<?php echo form_error('semester'); ?>
								</div>
							</div>
						</div>
						<div class='span3'>
							<label class='control-label' for='uts_uas'>UTS/ UAS </label>
							<select name='uts_uas' id='uts_uas' class='select2' style='width:100%;' required>
								<option></option>
								<option value='UTS' <?php if($hasil->uts_uas == 'UTS'){echo 'selected';};?>>UTS</option>
								<option value='UAS' <?php if($hasil->uts_uas == 'UAS'){echo 'selected';};?>>UAS</option>
							</select>
						</div>
						<?php endif;?>
						<div class='control-group'>
							<label class='control-label' for='tanggal'>Tanggal</label>
							<div class='controls controls-row'>
								<div class='span2'>   
									<div class="input-append date" id="dp3" >
										<input class="m-wrap m-ctrl-medium date-picker" name="tanggal" id="tanggal" size="16" type="text" placeholder="Isikan Tanggal" value='<?php 
																			$tanggalan= $hasil->tanggal; 
																			$parts = explode('-',$tanggalan);
																			$date  = "$parts[1]/$parts[2]/$parts[0]";
																			echo $date; ?>'/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
								</div>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='matkul'>Mata Kuliah </label>
							<div class='controls controls-row'>
								<div class='span6'>   
									<?php echo form_dropdown('matkul',$dropdownMatkul,$selectedMatkul,'class="select2" id="matkul"');?>
								</div>
								<div id='cek_matkul'>
									<?php echo form_error('matkul'); ?>
								</div>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Jam Mulai</label>
							<div class="controls">
								  <div class="input-append bootstrap-timepicker-component">
										<span class="add-on"><i class="icon-time"></i></span>
										<input class="m-wrap m-ctrl-small timepicker-default" type="text" name='jammulai' id='jammulai' value='<?php echo $hasil->jammulai; ?>'/>
									</div>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Jam Selesai</label>
							<div class="controls">
								  <div class="input-append bootstrap-timepicker-component">
										<span class="add-on"><i class="icon-time"></i></span>
										<input class="m-wrap m-ctrl-small timepicker-default" type="text" name='jamselesai' id='jamselesai' value='<?php echo $hasil->jamselesai; ?>'/>
									</div>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='peserta'>Jumlah Peserta</label>
							<div class='controls controls-row'>	
								<div class='span2'>
									<input type='text' name='peserta' id='peserta' class='required' placeholder='Jumlah Peserta' style="width:135px;" value="<?php echo $hasil->peserta;?>">
								</div>
							</div>
						</div>
						
						<div class='form-actions'>
							<button type='submit' name='submit_jadwal' class='btn btn-primary'> 
								Update
							</button>
							<?php echo anchor ('jadwal/add',form_button('back','Cancel','class="btn btn-danger"'));?>
						</div>
					</form>
				</div><!-- End .widget-content -->
			</div><!-- End .widget -->
		</div><!-- End .span12 -->
	</div>
</div>		 
