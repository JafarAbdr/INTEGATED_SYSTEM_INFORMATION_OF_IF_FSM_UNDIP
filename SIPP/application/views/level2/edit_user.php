	<?php $attributes = array('class' => 'form-horizontal');
		echo form_open('c_admin/edit_user/'.$data['iduser'], $attributes);
	?>
	
	<div class="control-group">
		<label class="control-label" for="nip">NIP</label>
		<div class="controls">
			<input type="text" name="nip" value="<?php echo "$data[nip]"?>"/>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="nama">Nama</label>
		<div class="controls">
			<input type="text" name="nama" value="<?php echo "$data[nama]"?>"/>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="level">Level</label>
		<div class="controls">
			<select name="level">
				<option/>
				<option value="1" <?php echo ((ISSET($data['level'])) && ($data['level'] == '1'))?'selected':''; ?>/>1
				<option value="2" <?php echo ((ISSET($data['level'])) && ($data['level'] == '2'))?'selected':''; ?>/>2
				<option value="3" <?php echo ((ISSET($data['level'])) && ($data['level'] == '3'))?'selected':''; ?>/>3
			</select>     
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