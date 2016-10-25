<link href="<?php echo base_url('assets/js/plugins/forms/select2/select2.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('assets/js/plugins/forms/validation/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/forms/select2/select2.js');?>"></script>
<script src="<?php echo base_url('assets/js/ruang/ruang_valid.js')?>"></script>
<link href="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/pages/data-tables.js');?>"></script>
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
<noscript><div><center><i class="icon20 i-warning"></i>&nbsp Aktifkan javascript Anda, untuk tampilan lebih baik. Klik <a href="http://www.enable-javascript.com" target="_blank"> cara mengaktifkan javascript</a></center></div></noscript>
<div class="crumb"> 
	<ul class="breadcrumb"> 
		<li><a href="#">Kelola Data</a> <span class="divider">/</span></li> 
		<li class="active">Ruang</li> 
</ul> </div>

<div class="container-fluid">
	<div id="heading" class="page-header">
			<h1><i class="icon20 i-file-7"></i>Ruang</h1>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="widget">
				<div class="widget-title">
					<div class="icon">
						<i class="icon20 i-table"></i>
					</div>
					<h4>Tambah dan Tampil Ruang</h4><a href="#" class="minimize"></a>
					<?php echo $msg;?>
				</div><!-- End .widget-title -->
									<div class="widget-content noPadding">
										<ul id="myTab" class="nav nav-tabs">
											<li class="tabmenu" id="tab1">
												<a href="#tab1-content" data-toggle="tab">Tambah Ruang</a>
											</li>
											<li class="tabmenu" id="tab2">
												<a href="#tab2-content" data-toggle="tab">Lihat Ruang</a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade in" id="tab1-content">
												<div>
													<div class="widget-title">
														<h4>Import Excel</h4>
													</div><!-- End .widget-title -->
													<div class="widget-content">
															<?php echo form_open_multipart('con_ruang/upload/');?>
															<?php echo form_upload('file', 'Browse File');?>
															</br>
															<?php echo form_submit('button', 'Import', 'class="btn btn-primary"');     ?>  
															<?php echo form_close();?>
													</div><!-- End .widget-content -->
												</div><!-- End .widget -->
												<div>
													<div class="widget-title">
														<h4>Input Data	Ruang Manual</h4>
													</div>
													<div class="widget-content">
														<form id='formruang' class="form-horizontal" action="<?php echo site_url('ruang/save_add');?>" method="POST">
															<div class="control-group">
																<label class="control-label" for="nama_ruang">Nama Ruang</label>
																<div class="controls controls-row">
																	<input type="text" id="nama_ruang" name="nama_ruang" class="required span5" maxlength="4" placeholder='e.g: B123'>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label" for="kapasitas_kuliah">Kapasitas Kuliah</label>
																<div class="controls controls-row">
																	<input class="required span5" id="kapasitas_kuliah" name="kapasitas_kuliah" type="text" placeholder='e.g: 160'/>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label" for="kapasitas_ujian">Kapasitas Ujian</label>
																<div class="controls controls-row">
																	<input class="required span5" id="kapasitas_ujian" name="kapasitas_ujian" type="text" placeholder='e.g: 60'/>
																</div>
															</div>
															<div class="form-actions">
																<?php echo form_submit('submit', 'Tambah','class="btn btn-primary"'); ?> 
															</div>	
														</form>
													</div>
												</div>
											</div>
											<div class="tab-pane fade in" id="tab2-content">
												<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="dataTable">
													<thead>
														<tr>
															<th>No</th><th>Nama Ruang</th><th>Kapasitas Kuliah</th><th>Kapasitas Ujian</th><th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$no = 1;
														foreach ($hasil as $data):
														?>
														<tr>
															<td> <?php echo $no; ?> </td>
															<td> <?php echo $data->nama_ruang; ?> </td>
															<td> <?php echo $data->kapasitas_kuliah; ?> </td>
															<td> <?php echo $data->kapasitas_ujian; ?> </td>
															<td> <?php echo anchor('ruang/edit/'.$data->id_ruang,'Edit','class="btn btn-primary"'); ?>
																<?php echo anchor('ruang/delete/'.$data->id_ruang,'Delete',
																array('class'=>"btn btn-danger",'onclick'=>"return confirm('apakah anda ingin menghapus data Ruang ?')"));?>
															</td>
															
														</tr>
														
														<?php
														$no++;
														endforeach;
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
