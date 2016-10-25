<link href="<?php echo base_url('assets/js/plugins/forms/select2/select2.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('assets/js/plugins/forms/validation/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/forms/select2/select2.js');?>"></script>
<script src="<?php echo base_url('assets/js/profil/profile_valid.js')?>"></script>
<div class="container-fluid">
	<div id="heading" class="page-header">
			<h1><i class="icon20 i-file-7"></i>Update Data Akun</h1>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="widget">
				<div class="widget-title">
					<div class="icon">
						<i class="icon20 i-table"></i>
					</div>
					<h4>Update Data Akun</h4><a href="#" class="minimize"></a>
				</div><!-- End .widget-title -->
				<div class="widget-content">
					<form id="formeditprofil2" class="form-horizontal" action="<?php echo site_url('con_user/edit_user/'.$hasil['id_user']);?>" method="POST">
													<div class="control-group">
														<label class="control-label" for="nama">Nama</label>
														<div class="controls controls-row">
															<input type="text" id="" name="nama" class="required span12" value='<?php echo $hasil['nama_user'] ?>'>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label" for="username">Username</label>
														<div class="controls controls-row">
															<input type="text" id="" name="username" class="required span12" value='<?php echo $hasil['username']?>'>
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
															<input type="text" id="" name="email" class="required span12" value='<?php echo $hasil['email']?>'>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label" for="jabatan">Jabatan</label>
														<div class='controls controls-row'>
															<div class='span6'>
																<select name='jabatan' id='jabatan' class='select2' style='width:100%;' required>
																	<option></option>
																	<option value='1' <?php if($hasil['level'] == '1'){echo 'selected';};?>>Jurusan</option>
																	<option value='2' <?php if($hasil['level'] == '2'){echo 'selected';};?>>Bagian Administrasi</option>
																	<option value='3' <?php if($hasil['level'] == '3'){echo 'selected';};?>>Dosen</option>
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
														<?php echo form_submit('submit', 'Ubah','class="btn btn-primary"'); ?> 
														<?php echo anchor ('home/edit_profile',form_button('back','Cancel','class="btn btn-danger"'));?>
													</div>
												</form>
				</div><!-- End .widget-content -->
			</div><!-- End .widget -->
		</div><!-- End .span12 -->
	</div>
</div>		 
