	<?php $attributes = array('class' => 'form-horizontal');
		echo form_open('c_admin/add_user', $attributes);
	?>
	
	<div class="control-group">
		<label class="control-label" for="nama">NIP</label>
		<div class="controls">
			<input type="text" name="nip"/>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="nama">Nama</label>
		<div class="controls">
			<input type="text" name="nama"/>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="level">Level</label>
		<div class="controls">
			<select name="level">
				<option/>1
				
				<option/>3
			</select> 
			<br>*Level: 1=Dosen & 3=Jurusan
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