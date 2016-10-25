<link href="<?php echo base_url('assets/js/plugins/forms/select2/select2.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('js/plugins/forms/validation/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/forms/select2/select2.js');?>"></script>
<script src="<?php echo base_url('assets/js/matkul/matkul_valid.js')?>"></script>
<noscript><div><center><i class="icon20 i-warning"></i>&nbsp Aktifkan javascript Anda, untuk tampilan lebih baik. Klik <a href="http://www.enable-javascript.com" target="_blank"> cara mengaktifkan javascript</a></center></div></noscript>
<div class="crumb"> 
	<ul class="breadcrumb"> 
		<li><a href="#">Kelola Data</a> <span class="divider">/</span></li> 
		<li><a href="#">Mata Kuliah</a> <span class="divider">/</span></li> 
		<li class="active">Edit Mata Kuliah</li> 
</ul> </div>
<div class="container-fluid">
	<div id="heading" class="page-header">
			<h1><i class="icon20 i-file-7"></i>Update Data matkul</h1>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="widget">
				<div class="widget-title">
					<div class="icon">
						<i class="icon20 i-table"></i>
					</div>
					<h4>Update Data matkul</h4><a href="#" class="minimize"></a>
				</div><!-- End .widget-title -->
				<div class="widget-content">
					<form id='formmatkul' class="form-horizontal" action="<?php echo site_url('matakuliah/save_edit/'.$hasil->id_matkul);?>" method="POST">
						<div class="control-group">
							<label class="control-label" for="kode_matkul">Kode Mata Kuliah</label>
							<div class="controls controls-row">
								<input type="text" id="kode_matkul" name="kode_matkul" class="required span12" maxlength="7" value='<?php echo $hasil->kode_matkul; ?>'>
							</div>
                  </div>
						<div class="control-group">
							<label class="control-label" for="nama_matkul">Nama Mata Kuliah</label>
							<div class="controls controls-row">
								<input type="text" id="nama_matkul" name="nama_matkul" class="required span12" value='<?php echo $hasil->nama_matkul; ?>'>
							</div>
                  </div>
						<div class="control-group">
							<label class="control-label" for="sks">SKS</label>
							<div class="controls controls-row">
								<input class="span12" id="sks" name="sks" type="text" value='<?php echo $hasil->sks; ?>'/>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='semester'>Semester</label>
							<div class='controls controls-row'>
								<div class='span6'>
									<select name='semester' id='semester' class='select2' style='width:100%;' required>
										<option></option>
										<option value='Ganjil' <?php if($hasil->semester == 'Ganjil'){echo 'selected';};?> >Ganjil</option>
										<option value='Genap' <?php if($hasil->semester == 'Genap'){echo 'selected';};?> >Genap</option>
									</select>
								</div>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='semesterke'>Semester ke-</label>
							<div class='controls controls-row'>
								<div class='span3'>
									<select name='semesterke' id='semesterke' class='select2' style='width:100%;' required>
										<option></option>
										<option value='I' <?php if($hasil->semesterke == 'I'){echo 'selected';};?>>1 (Satu)</option>
										<option value='II'<?php if($hasil->semesterke == 'II'){echo 'selected';};?>>2 (Dua)</option>
										<option value='III'<?php if($hasil->semesterke == 'III'){echo 'selected';};?>>3 (Tiga)</option>
										<option value='IV'<?php if($hasil->semesterke == 'IV'){echo 'selected';};?>>4 (Empat)</option>
										<option value='V'<?php if($hasil->semesterke == 'V'){echo 'selected';};?>>5 (Lima)</option>
										<option value='VI'<?php if($hasil->semesterke == 'VI'){echo 'selected';};?>>6 (Enam)</option>
										<option value='VII'<?php if($hasil->semesterke == 'VII'){echo 'selected';};?>>7 (Tujuh)</option>
										<option value='VIII'<?php if($hasil->semesterke == 'VIII'){echo 'selected';};?>>8 (Delapan)</option>
										<option value='Pilihan'<?php if($hasil->semesterke == 'Pilihan'){echo 'selected';};?>>Pilihan</option>
									</select>
								</div>
							</div>
						</div>						
						<div class="form-actions">
							<?php echo form_submit('submit', 'ubah','class="btn btn-primary"'); ?> 
							<?php echo anchor ('matakuliah/add',form_button('back','Cancel','class="btn btn-danger"'));?>
						</div>
					</form>
				</div><!-- End .widget-content -->
			</div><!-- End .widget -->
		</div><!-- End .span12 -->
	</div>
</div>		 
