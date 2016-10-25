	<?php if ($this->session->flashdata('message')==1) { ?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
		<h4>Error</h4>
		<?php echo $this->session->flashdata('alert')?>
	</div>	
	<?php } ?>
	
	<?php if ($this->session->flashdata('message')=="sukses") { ?>
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
		<h4>Sukses</h4>
		<?php echo $this->session->flashdata('alert')?>
	</div>	
	<?php } ?>
	
	<?php $attributes = array('class' => 'form-horizontal');
		echo form_open('c_admin/update_password', $attributes);
	?>
	
	<div class="control-group">
		<label class="control-label" for="ps_lama">Password Lama</label>
		<div class="controls">
			<input type="password" name="ps_lama"/>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="ps_baru">Password Baru</label>
		<div class="controls">
		 <input type="password" name="ps_baru" placeholder="Minimal 5 Karakter"/>
		</div>
	</div>
	
	<div class="form-actions">
		<button class="btn btn-info" type="submit">
			<i class="icon-ok bigger-110"></i>
			Submit
		</button>

		&nbsp; &nbsp; &nbsp;
		<button class="btn" type="reset">
			<i class="icon-undo bigger-110"></i>
			Reset
		</button>
	</div>