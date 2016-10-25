<link href="<?php echo base_url('assets/js/plugins/forms/select2/select2.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('js/plugins/forms/validation/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/forms/select2/select2.js');?>"></script>
<script src="<?php echo base_url('assets/js/dosen/dosen_valid.js')?>"></script>
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
		<li><a href="#">Dosen</a> <span class="divider">/</span></li> 
		<li class="active">Dosen IF</li>
</ul> </div>
<div class="container-fluid">
	<div id="heading" class="page-header">
			<h1><i class="icon20 i-file-7"></i>Dosen IF</h1>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="widget">
				<div class="widget-title">
					<div class="icon">
						<i class="icon20 i-table"></i>
					</div>
					<h4>Tambah dan Tampil Dosen</h4><a href="#" class="minimize"></a>
					<?php echo $msg;?>
				</div><!-- End .widget-title -->
									<div class="widget-content noPadding">
										<ul id="myTab" class="nav nav-tabs">
											<li class="tabmenu" id="tab1">
												<a href="#tab1-content" data-toggle="tab">Tambah Dosen</a>
											</li>
											<li class="tabmenu" id="tab2">
												<a href="#tab2-content" data-toggle="tab">Lihat Data Dosen</a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade in" id="tab1-content">
												<div>
													<div class="widget-title">
														<h4>Import Excel</h4>
													</div><!-- End .widget-title -->
													<div class="widget-content">
															<?php echo form_open_multipart('con_dosenif/upload/');?>
															<?php echo form_upload('file', 'Browse File');?>
															</br>
															<?php echo form_submit('button', 'Import', 'class="btn btn-primary"');     ?>  
															<?php echo form_close();?>
													</div><!-- End .widget-content -->
												</div><!-- End .widget -->
												<div>
													<div class="widget-title">
														<h4>Input Data	Dosen Manual</h4>
													</div>
													<div class="widget-content">
														<form  action='<?php echo site_url("dosenif/save_add")?>' method='post' id='formdosen' class='form-horizontal'>
															<div class='control-group'>
																<label class='control-label' for='id_dosen'>ID_Dosen</label>
																<div class='controls controls-row'>
																	<input type='text' name='id_dosen' id='id_dosen' class='required span12' value='<?php echo $id_dosen?>' readonly> 

																</div>
															</div>
															<div class='control-group'>
																<label class='control-label' for='nip'>NIP </label>
																<div class='controls controls-row'>
																	<input type='text' name='nip' id='nip' class="required span12" placeholder='e.g: 19820309 200604 1 002'>
																	<div id='cek_nip'>
																		<?php echo form_error('nip'); ?>
																	</div>
																</div>
															</div>
															<div class='control-group'>
																<label class='control-label' for='nama_dosen'>Nama Dosen</label>
																<div class='controls controls-row'>
																	<input type='text' name='nama_dosen' id='nama_dosen' class='required span12' placeholder='masukan nama dosen'> 
																	<div id='cek_namadosen'>
																		<?php echo form_error('namadosen'); ?>
																	</div>
																</div>
															</div>
															<div class='control-group'>
																<label class='control-label' for='nidn'>NIDN</label>
																<div class='controls controls-row'>
																	<input type='text' name='nidn' id='nidn' class='required span12' placeholder='masukan NIDN'>
																	<div id='cek_nidn'>
																		<?php echo form_error('nidn'); ?>
																	</div>
																</div>
															</div>
															<div class='control-group'>
																<label class='control-label' for='pangkat'>Pangkat</label>
																<div class='controls controls-row'>
																	<div class='span8'>
																		<select name='pangkat' id='pangkat' class='select2' style='width:100%;'>
																		<option></option>
																		<optgroup label='Golongan I'>
																			<option value='Juru Muda / I A'>			Juru Muda / I A		</option>    
																			<option value='Juru Muda Tk I / I B'>	Juru Muda Tk I / I B	</option>    
																			<option value='Juru / I C'>				Juru / I C				</option>    
																			<option value='Juru Tk I / I D'>			Juru Tk I / I D		</option>    
																		</optgroup>
																		<optgroup label='Golongan II'>
																			<option value='Pengatur Muda / II A'>			Pengatur Muda / II A     	</option>
																			<option value='Pengatur Muda Tk I / II B'>	Pengatur Muda Tk I / II B	</option>   
																			<option value='Pengatur / II C'>					Pengatur / II C            </option>
																			<option value='Pengatur Tk I / II D'>			Pengatur Tk I / II D    	</option>
																		</optgroup>
																		<optgroup label='Golongan III'>
																			<option value='Penata Muda / III A'>			Penata Muda / III A     	</option>
																			<option value='Penata Muda Tk I / III B'>		Penata Muda Tk I / III B	</option>
																			<option value='Penata / III C'>					Penata / III C            </option>
																			<option value='Penata Tk I / III D'>			Penata Tk I / III D    	</option>
																		</optgroup>
																		<optgroup label='Golongan IV'>
																			<option value='Pembina / IV A'>         Pembina / IV A        </option>
																			<option value='Pembina Tk I / IV B'>    Pembina Tk I / IV B   </option>
																			<option value='Pembina Utama Muda / IV C'>              Pembina Utama Muda / IV C            </option>
																			<option value='Pembina Utama Madya / IV D'>        Pembina Utama Madya / IV D     </option>
																			<option value='Pembina Utama / IV E'>         Pembina Utama / IV E     </option>
																		</optgroup>
																		</select>
																	</div>
																	<div id='cek_pangkat'>
																		<?php echo form_error('pangkat'); ?>
																	</div>
																</div>
															</div>
															
															<div class='control-group'>
																<label class='control-label' for='jabatan'>Jabatan</label>
																<div class='controls controls-row'>
																	<div class='span6'>
																		<select name='jabatan' id='jabatan' class='select2' style='width:100%;'>
																			<option></option>
																			<option value='Lektor'>Lektor</option>
																			<option value='Lektor Kepala'>Lektor Kepala</option>
																			<option value='Asisten Ahli'>Asisten Ahli</option>
																		</select>
																	</div>
																	<div id='cek_jabatan'>
																		<?php echo form_error('jabatan'); ?>
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
																<button type='submit' name='submit_dosen' class='btn btn-primary'> 
																	Tambah
																</button>
															</div>
															
														</form>
													</div>
												</div>
											</div>
											<div class="tab-pane fade in" id="tab2-content">
												<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="dataTable">
													<thead>
														<tr>
															<th>No.</th>
															<th>NIP</th>
															<th>Nama</th>
															<th>NIDN</th>
															<th>Pangkat</th>
															<th>Jabatan</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														
																											
														<?php
															$no = 0;
															foreach ($query as $hasil):
														?>
														<?php if ($hasil->nama_dosen != 'Team Dosen'):?>
														<tr>
															<td> <?php echo $no; ?> </td>
															<td> <?php echo $hasil->nip; ?> </td>
															<td> <?php echo $hasil->nama_dosen; ?> </td>
															<td> <?php echo $hasil->nidn; ?> </td>
															<td> <?php echo $hasil->pangkat; ?> </td>
															<td> <?php echo $hasil->jabatan; ?> </td>
															<td> 
																<?php echo anchor('con_dosenif/update_data/'.$hasil->id_dosen,'Edit','class="btn btn-primary"'); ?> 
																<?php echo anchor('dosenif/delete/'.$hasil->id_dosen,'Delete',
																array('class'=>"btn btn-danger",'onclick'=>"return confirm('apakah anda ingin menghapus data Dosen IF ?')"));?>
															</td>
														</tr>
														<?php endif;?>
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
