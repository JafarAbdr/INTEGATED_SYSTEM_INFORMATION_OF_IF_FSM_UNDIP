<link href="<?php echo base_url('assets/js/plugins/forms/select2/select2.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('assets/js/plugins/forms/validation/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/forms/select2/select2.js');?>"></script>
<script src="<?php echo base_url('assets/js/profil/profile_valid.js')?>"></script>
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
<div class="container-fluid">
	<div id="heading" class="page-header">
			<h1><i class="icon20 i-file-7"></i>Settings Akun</h1>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="widget">
				<div class="widget-title">
					<div class="icon">
						<i class="icon20 i-table"></i>
					</div>
					<h4>Settings</h4><a href="#" class="minimize"></a>
					<?php echo $msg;?>
				</div><!-- End .widget-title -->
									<div class="widget-content noPadding">
										<ul class="nav nav-tabs">
											<li class='tabmenu' id='tab1'>
												<a href="#tab1-content" data-toggle="tab">Edit Profil</a>
											</li>
											<?php $lvl = $this->session->userdata('level'); if($lvl == 1){?>
											<li class='tabmenu' id='tab2'>
												<a href="#tab2-content" data-toggle="tab">Tambah User</a>
											</li>
											<li class='tabmenu' id='tab3'>
												<a href="#tab3-content" data-toggle="tab">Lihat Daftar Akun</a>
											</li>
											<?php }?>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade in" id="tab1-content">
												<form id="formeditprofil" class="form-horizontal" action="<?php echo site_url('home/save_edit_profile/'.$data['id_user']);?>" method="POST">
													<div class="control-group">
														<label class="control-label" for="nama">Nama</label>
														<div class="controls controls-row">
															<input type="text" id="" name="nama" class="required span12" value='<?php echo $data['nama_user']?>'>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label" for="username">Username</label>
														<div class="controls controls-row">
															<input type="text" id="" name="username" class="required span12" value='<?php echo $data['username']?>'>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label" for="oldpassword">Password Lama</label>
														<div class="controls controls-row">
															<input type="password" id="" name="oldpassword" class="required span12" value=''>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label" for="password">Password Baru</label>
														<div class="controls controls-row">
															<input type="password" id="password" name="password" class="required span12" value=''>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label" for="confirm_password">Konfirmasi Password</label>
														<div class="controls controls-row">
															<input type="password" id="confirm_password" name="confirm_password" class="required span12" value=''>
														</div>
													</div>
													<?php if(isset($message_error) && $message_error){
													echo '<div class="alert alert-error">';
														echo '<a class="close" data-dismiss="alert">×</a>';
														echo 'Tolong cek lagi';
													echo '</div>';             
													}?>
													<div class="form-actions">
														<?php echo form_submit('submit', 'Ubah','class="btn btn-primary"'); ?> 
														<?php echo anchor ('home',form_button('back','Cancel','class="btn btn-danger"'));?>
													</div>
												</form>
											</div>
											<?php $lvl = $this->session->userdata('level'); if($lvl == 1){?>
											<div class="tab-pane fade in" id='tab2-content'>
												<form id="formeditprofil2" class="form-horizontal" action="<?php echo site_url('con_user/add_user');?>" method="POST">
													<div class="control-group">
														<label class="control-label" for="nama">Nama</label>
														<div class="controls controls-row">
															<input type="text" id="" name="nama" class="required span12" value=''>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label" for="username">Username</label>
														<div class="controls controls-row">
															<input type="text" id="" name="username" class="required span12" value=''>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label" for="password2">Password</label>
														<div class="controls controls-row">
															<input type="password" id="password2" name="password" class="required span12" value=''>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label" for="confirm_password">Konfirmasi Password</label>
														<div class="controls controls-row">
															<input type="password" id="confirm_password" name="confirm_password" class="required span12" value=''>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label" for="email">Email</label>
														<div class="controls controls-row">
															<input type="text" id="" name="email" class="required span12" value=''>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label" for="jabatan">Jabatan</label>
														<div class='controls controls-row'>
															<div class='span6'>
																<select name='jabatan' id='jabatan' class='select2' style='width:100%;' required>
																	<option></option>
																	<option value='1'>Jurusan</option>
																	<option value='2'>Bagian Administrasi</option>
																	<option value='3'>Dosen</option>
																</select>
															</div>
														</div>
													</div>
													<?php if(isset($message_error) && $message_error){
													echo '<div class="alert alert-error">';
														echo '<a class="close" data-dismiss="alert">×</a>';
														echo 'Tolong cek lagi';
													echo '</div>';             
													}?>
													<div class="form-actions">
														<?php echo form_submit('submit', 'Tambah','class="btn btn-primary"'); ?> 
														<?php echo anchor ('home',form_button('back','Cancel','class="btn btn-danger"'));?>
													</div>
												</form>
											</div>
											<div class="tab-pane fade in" id='tab3-content'>
											<?php 
															//foreach($daftar as $data):
															//$jumlahadmin = array($data->level);
															//print_r($jumlahadmin);
															//echo count ($jumlahadmin,1);?>
															<?php //endforeach;?>
												<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="dataTable">
													<thead>
														<tr>
															<th>No</th><th>Nama User</th><th>Username</th><th>Email</th><th>Jabatan</th><th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$no = 1;
														foreach ($daftar as $data):
														?>
														<tr>
															
															<td> <?php echo $no; ?> </td>
															<td> <?php echo $data->nama_user; ?> </td>
															<td> <?php echo $data->username; ?> </td>
															<td> <?php echo $data->email; ?> </td>
															<td> <?php if($data->level == 1){ echo 'Jurusan';}elseif($data->level == 2){ echo "Bagian Administrasi";}elseif($data->level == 3){ echo "Dosen";}?> </td>
															<?php if (($data->level == 1)&&($jurusan=='1')){?>
															<td> <?php echo anchor('con_user/update_user/'.$data->id_user,'Edit','class="btn btn-info"'); ?> </td>
															<?php } else {?>		
															<td> <?php echo anchor('con_user/update_user/'.$data->id_user,'Edit','class="btn btn-info"'); ?> 
																<?php echo anchor('con_user/delete_user/'.$data->id_user,'Delete', array('class'=>"btn btn-danger",'onclick'=>"return confirm('apakah anda ingin menghapus data User ?')"));?>															
															</td>
															<?php }?>
														</tr>
														<?php
														$no++;
														endforeach;
														?>
													</tbody>
												</table>
											</div>
											<?php }?>
										</div>
									</div>				
			</div><!-- End .widget -->
		</div><!-- End .span12 -->
	</div>
</div>		 
