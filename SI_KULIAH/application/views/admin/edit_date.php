<link href="<?php echo base_url('assets/js/plugins/forms/select2/select2.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('js/plugins/forms/validation/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/forms/select2/select2.js');?>"></script>
<script src="<?php echo base_url('assets/js/profil/date_valid.js')?>"></script>
<div class="container-fluid">
   <div id="heading" class="page-header">
      <h1><i class="icon20 i-file-7"></i>Edit Date</h1>
   </div>
   <div class="row-fluid">
      <!-- Start page from here -->
	
	<div class='span12'>
		<div class='widget'>
			<div class='widget-title'>
				<div class='icon'>
				   <i class='icon20 i-stack-checkmark'></i>
				</div>
				<h4> Date </h4>
				<a href='#' class='minimize'></a>
			</div>
			<div class='widget-content'>
				<form  action='<?php echo site_url("home/save_edit_date")?>' method='post' id='form_edit_date' class='form-horizontal'>
				
				
				<div class="control-group">
					<label class="control-label" for="pilihan">Pilih Mode</label>
					<div class="controls controls-row">
						<?php echo form_dropdown('pilihan',$dropdownPilihan,$selectedPilihan,'class="select2" id="pilihan"');?>
						<div id='cek_semester'>
							<?php echo form_error('pilihan');?>
						</div>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="pilihan">Tahun Ajar</label>
					<div class="controls controls-row">
						<?php echo form_dropdown('thn_ajar',$dropdownYear,$selectedYear,'class="select2" id="thn_ajar"');?>
						<div id='cek_semester'>
							<?php echo form_error('thn_ajar');?>
						</div>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="pilihan">Semester</label>
					<div class="controls controls-row">
						<?php echo form_dropdown('semester',$dropdownSemester,$selectedSemester,'class="select2" id="semester"');?>
						<div id='cek_semester'>
							<?php echo form_error('semester');?>
						</div>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="pilihan">UTS/UAS</label>
					<div class="controls controls-row">
						<?php echo form_dropdown('uts_uas',$dropdownuts_uas,$selecteduts_uas,'class="select2" id="uts_uas"');?>
					</div>
				</div>
				
				<div class='form-actions'>
					<button type='submit' name='submit_dosen' class='btn btn-primary'> 
						Tambah
					</button>
				</div>
				
				</form>
		   </div>
		</div>
	</div>
   </div><!-- End .row-fluid -->
</div>
<!-- End .container-fluid -->
