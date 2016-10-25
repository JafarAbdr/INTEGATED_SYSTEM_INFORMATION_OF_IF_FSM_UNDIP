<?php 
if(isset($error)){
echo $error;
}
?>

<?php echo form_open_multipart('c_upload/do_upload');?>

<h3>Upload file "doc, docx, rar, zip max 25 MB" </h3>

<input type="file" name="userfile" id="id-input-file-2"/>

<div class="control-group">
				<label class="control-label">Jenis file</label>

				<div class="controls">
					<label>
						<input name="jenis_file" type="radio" id="id-disable-check" value="Proposal"checked />
						<span class="lbl">Proposal</span>
					</label>

					<label>
						<input name="jenis_file" type="radio" id="id-enable-check" value="Laporan" />
						<span class="lbl">Laporan</span>
					</label>
				</div>
			</div>
<br>

<div class="control-group">
				<label class="control-label">Status</label>

				<div class="controls">
					<label>
						<input name="status" type="radio" id="id-disable-check" value="Usulan"checked />
						<span class="lbl">Usulan</span>
					</label>

					<label>
						<input name="status" type="radio" id="id-enable-check" value="Diterima" />
						<span class="lbl">Diterima</span>
					</label>

					<label>
						<input name="status" type="radio" id="id-disable-check-2" value="Ditolak" />
						<span class="lbl">Ditolak</span>
					</label>
				</div>
			</div>
<br>
<button class="btn btn-info" type="submit">
	<i class="icon-ok bigger-110"></i>
	Upload
</button>
