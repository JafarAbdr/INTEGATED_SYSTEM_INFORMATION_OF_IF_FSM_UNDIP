<link href="<?php echo base_url('assets/js/plugins/forms/select2/select2.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('js/plugins/forms/validation/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/forms/select2/select2.js');?>"></script>
<script src="<?php echo base_url('assets/js/ruang/ruang_valid.js')?>"></script>

<noscript><div><center><i class="icon20 i-warning"></i>&nbsp Aktifkan javascript Anda, untuk tampilan lebih baik. Klik <a href="http://www.enable-javascript.com" target="_blank"> cara mengaktifkan javascript</a></center></div></noscript>
<div class="crumb"> 
	<ul class="breadcrumb"> 
		<li><a href="#">Kelola Data</a> <span class="divider">/</span></li> 
		<li><a href="#">Ruang</a> <span class="divider">/</span></li> 
		<li class="active">Edit Ruang</li>
</ul> </div>
<div class="container-fluid">
	<div id="heading" class="page-header">
			<h1><i class="icon20 i-file-7"></i>Update Data ruang</h1>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="widget">
				<div class="widget-title">
					<div class="icon">
						<i class="icon20 i-table"></i>
					</div>
					<h4>Update Data ruang</h4><a href="#" class="minimize"></a>
				</div><!-- End .widget-title -->
				<div class="widget-content">
					<form id='formruang' class="form-horizontal" action="<?php echo site_url('ruang/save_edit/'.$hasil->id_ruang);?>" method="POST">
						<div class="control-group">
							<label class="control-label" for="nama_ruang">Nama Ruang</label>
							<div class="controls controls-row">
								<input type="text" id="nama_ruang" name="nama_ruang" class="required span12" maxlength="7" value='<?php echo $hasil->nama_ruang; ?>'>
							</div>
                  </div>
						<div class="control-group">
							<label class="control-label" for="kapasitas_kuliah">Kapasitas Kuliah</label>
							<div class="controls controls-row">
								<input class="span12" id="kapasitas_kuliah" name="kapasitas_kuliah" type="text" value='<?php echo $hasil->kapasitas_kuliah; ?>'/>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="kapasitas_ujian">Kapasitas Ujian</label>
							<div class="controls controls-row">
								<input class="span12" id="kapasitas_ujian" name="kapasitas_ujian" type="text" value='<?php echo $hasil->kapasitas_ujian; ?>'/>
							</div>
						</div>
												
						<div class="form-actions">
							<?php echo form_submit('submit', 'ubah','class="btn btn-primary"'); ?> 
							<?php echo anchor ('ruang/add',form_button('back','Cancel','class="btn btn-danger"'));?>
						</div>
					</form>
				</div><!-- End .widget-content -->
			</div><!-- End .widget -->
		</div><!-- End .span12 -->
	</div>
</div>		 
