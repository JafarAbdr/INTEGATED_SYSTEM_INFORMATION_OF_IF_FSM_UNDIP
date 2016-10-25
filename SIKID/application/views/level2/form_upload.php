<?php 
//if(isset($error)){
//echo $error;
//}
?>

<?php if ($this->session->flashdata('message')==1) { ?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
		<h4>Error</h4>
		<?php echo $this->session->flashdata('alert')?>
	</div>	
<?php } ?>

<?php echo form_open_multipart('c_upload/do_upload');?>

<h3>Upload file "extensi .pdf" </h3>

<input type="file" name="userfile" id="id-input-file-2"/>

<div class="control-group">
				<label class="control-label">Jenis File</label>

				<div class="controls">
					<label>
						<input name="jenis_file" type="radio" id="id-disable-check" value="Jurnal"checked />
						<span class="lbl">Jurnal</span>
					</label>

					<label>
						<input name="jenis_file" type="radio" id="id-enable-check" value="Prosiding" />
						<span class="lbl">Prosiding</span>
					</label>
				</div>
			</div>
<br>

<div class="control-group">
				<label class="control-label">Kategori</label>

				<div class="controls">
					<label>
						<input name="kategori" type="radio" id="id-disable-check" value="Internasional"checked />
						<span class="lbl">Internasional</span>
					</label>

					<label>
						<input name="kategori" type="radio" id="id-enable-check" value="Nasional Terakreditasi" />
						<span class="lbl">Nasional Terakreditasi</span>
					</label>

					<label>
						<input name="kategori" type="radio" id="id-disable-check-2" value="Nasional Tidak Terakreditasi" />
						<span class="lbl">Nasional Tidak Terakreditasi</span>
					</label>
				</div>
			</div>
<br>
<button class="btn btn-info" type="submit">
	<i class="icon-ok bigger-110"></i>
	Upload
</button>
