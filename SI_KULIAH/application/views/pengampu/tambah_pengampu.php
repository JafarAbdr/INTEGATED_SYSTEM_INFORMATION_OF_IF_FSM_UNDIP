<link href="<?php echo base_url('assets/js/plugins/forms/select2/select2.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('js/plugins/forms/validation/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/forms/select2/select2.js');?>"></script>
<script src="<?php echo base_url('assets/js/pengampu/pengampu_valid.js')?>"></script>
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
<div class="crumb"> 
	<ul class="breadcrumb"> 
		<li><a href="#">Kelola Data</a> <span class="divider">/</span></li> 
		<li class="active">Pengampu</li>
</ul> </div>
<div class="container-fluid">
	<div id="heading" class="page-header">
			<h1><i class="icon20 i-file-7"></i>Pengampu</h1>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="widget">
				<div class="widget-title">
					<div class="icon">
						<i class="icon20 i-table"></i>
					</div>
					<h4>Tambah dan Tampil Pengampu</h4><a href="#" class="minimize"></a>
					<?php echo $msg;?>
				</div><!-- End .widget-title -->
									<div class="widget-content noPadding">
										<ul class="nav nav-tabs">
											<li class='tabmenu' id='tab1'>
												<a href="#tab1-content" data-toggle="tab">Tambah Pengampu</a>
											</li>
											<li class='tabmenu' id='tab2'>
												<a href="#tab2-content" data-toggle="tab">Lihat Daftar Pengampu</a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade in" id="tab1-content">
												<form  action='<?php echo site_url("pengampu/save_add")?>' method='post' id='formpengampu' class='form-horizontal'>
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
														  <div class='span8'>   
															 <?php echo form_dropdown('semester',$dropdownSemester,$selectedSemester,'class="select2" id="semester"');?>
														  </div>
														  <div id='cek_semester'>
															 <?php echo form_error('semester'); ?>
														  </div>
													   </div>
													</div>
													<?php endif;?>
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
														<div class='control-group'>
													   <label class='control-label' for='jumlah_kelas'>Jumlah Kelas</label>
													   <div class='controls controls-row'>
														  <input type='text' name='jumlah_kelas' id='jumlah_kelas' class='required span12' placeholder='masukan jumlah kelas'>
														  <div id='cek_jumlah_kelas'>
															 <?php echo form_error('jumlah_kelas'); ?>
														  </div>
													   </div>
													</div>
													<div class='control-group'>
													   <label class='control-label' for='dosen_1'>Nama Dosen 1</label>
													   <div class='controls controls-row'>
														  <?php echo form_dropdown('dosen_1',$dropdownDosen,'','class="select2" id="dosen_1"');?> 
														  <div id='cek_nama_dosen_1'>
															 <?php echo form_error('dosen_1'); ?>
														  </div>
													   </div>
													</div>
													<div class='control-group'>
													   <label class='control-label' for='dosen_2'>Nama Dosen 2</label>
													   <div class='controls controls-row'>
														  <?php echo form_dropdown('dosen_2',$dropdownDosen,'','class="select2" id="dosen_2"');?> 
														  <div id='cek_nama_dosen_2'>
															 <?php echo form_error('dosen_2'); ?>
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
													   <button type='submit' name='submit_pengampu' class='btn btn-primary'> 
														  Tambah
													   </button>
													</div>
												</form>
											</div>
											<div class="tab-pane fade in" id="tab2-content">
												<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="dataTable">
												   <thead>
													  <tr>
														 <th>No.</th>
														 <th>Tahun Ajar</th>
														 <th>Semester</th>
														 <th>Mata Kuliah</th>
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
														 <td> <?php echo $q[$i]['thn_ajar']; ?> </td>
														 <td> <?php echo $q[$i]['semester']; ?> </td>
														 <td> <?php echo $q[$i]['nama_matkul']; ?> </td>
														 <td> <?php echo $q[$i]['jumlah_kelas']; ?> </td>
														 <td> <?php echo $dos1[$i]; ?> </td>
														 <td> <?php echo ($dos2[$i] !== $dos1[$i]) ? $dos2[$i]: '-'; ?> </td>
														 <td> 
															<?php echo anchor('pengampu/edit/'.$q[$i]['id_pengampu'],'Edit','class="btn btn-primary"'); ?> 
															<?php echo anchor('pengampu/delete/'.$q[$i]['id_pengampu'],'Delete',
															array('class'=>"btn btn-danger",'onclick'=>"return confirm('apakah anda ingin menghapus data Pengampu ?')"));?>
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