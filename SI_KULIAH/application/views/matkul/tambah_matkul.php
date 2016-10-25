<link href="<?php echo base_url('assets/js/plugins/forms/select2/select2.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('assets/js/plugins/forms/validation/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/forms/select2/select2.js');?>"></script>
<script src="<?php echo base_url('assets/js/matkul/matkul_valid.js')?>"></script>
<link href="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/pages/data-tables.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-cookie-master/jquery.cookie.js');?>"></script>
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
<div class="crumb"> 
	<ul class="breadcrumb"> 
		<li><a href="#">Kelola Data</a> <span class="divider">/</span></li> 
		<li class="active">Mata Kuliah</li> 
	</ul> 
</div>
<noscript><div><center><i class="icon20 i-warning"></i>&nbsp Aktifkan javascript Anda, untuk tampilan lebih baik. Klik <a href="http://www.enable-javascript.com" target="_blank"> cara mengaktifkan javascript</a></center></div></noscript>
<div class="container-fluid">
	<div id="heading" class="page-header">
			<h1><i class="icon20 i-file-7"></i>Mata Kuliah</h1>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="widget">
				<div class="widget-title">
					<div class="icon">
						<i class="icon20 i-table"></i>
					</div>
					<h4>Tambah dan Tampil Mata Kuliah</h4><a href="#" class="minimize"></a>
					<?php echo $msg; ?>
				</div><!-- End .widget-title -->
									<div class="widget-content noPadding" id='tabs'>
										<ul class="nav nav-tabs">
											<li class='tabmenu' id='tab1' >
												<a href="#tab1-content" data-toggle="tab">Tambah Mata Kuliah</a>
											</li>
											<li  class='tabmenu' id='tab2'>
												<a href="#tab2-content" data-toggle="tab">Lihat Mata Kuliah</a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade in" id="tab1-content">
												<div>
													<div class="widget-title">
														<h4>Import Excel</h4>
													</div><!-- End .widget-title -->
													<div class="widget-content">
															<?php echo form_open_multipart('con_matkul/upload/');?>
															<?php echo form_upload('file', 'Browse File');?>
															</br>
															<?php echo form_submit('button', 'Import', 'class="btn btn-primary"');     ?>  
															<?php echo form_close();?>
													</div><!-- End .widget-content -->
												</div><!-- End .widget -->
												<div>
													<div class="widget-title">
														<h4>Input Data	Mata Kuliah Manual</h4>
													</div>
													<div class="widget-content">
														<form id='formmatkul' class="form-horizontal" action="<?php echo site_url('matakuliah/save_add');?>" method="POST">
															<div class="control-group">
																<label class="control-label" for="kode_matkul">Kode Mata Kuliah</label>
																<div class="controls controls-row">
																	<input type="text" id="kode_matkul" name="kode_matkul" class="required span12" maxlength="7" placeholder='e.g: ABC123'>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label" for="nama_matkul">Nama Mata Kuliah</label>
																<div class="controls controls-row">
																	<input type="text" id="nama_matkul" name="nama_matkul" class="required span12" placeholder='e.g: Matematika 1'>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label" for="sks">SKS</label>
																<div class="controls controls-row">
																	<input class="span12" id="sks" name="sks" type="text" placeholder='e.g: 3' maxlength='1' />
																</div>
															</div>
															<div class='control-group'>
																<label class='control-label' for='semester'>Semester</label>
																<div class='controls controls-row'>
																	<div class='span6'>
																		<select name='semester' id='semester' class='select2' style='width:100%;' required>
																			<option></option>
																			<option value='Ganjil'>Ganjil</option>
																			<option value='Genap'>Genap</option>
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
															<th>No</th><th>Kode Mata Kuliah</th><th>Nama Mata Kuliah</th><th>SKS</th><th>Semester Ke</th><th>Semester</th><th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$no = 1;
														foreach ($hasil as $data):
														?>
														<tr>
															<td> <?php echo $no; ?> </td>
															<td> <?php echo $data->kode_matkul; ?> </td>
															<td> <?php echo $data->nama_matkul; ?> </td>
															<td> <?php echo $data->sks; ?> </td>
															<td> <?php echo $data->semesterke; ?> </td>
															<td> <?php echo $data->semester; ?> </td>
															<td> <?php echo anchor('matakuliah/edit/'.$data->id_matkul,'Edit','class="btn btn-primary"'); ?> 
																 <?php echo anchor('matakuliah/delete/'.$data->id_matkul,'Delete', array('class'=>"btn btn-danger",'onclick'=>"return confirm('apakah anda ingin menghapus data matakuliah ?')"));?>																
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
