	<link rel="stylesheet" href="assets/css/datepicker.css" />
	<?php if (validation_errors()) { ?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></button>
		<h4>Error</h4>
		<?php echo validation_errors(); ?>
	</div>	
	<?php } ?>
	
	
	<script type="text/javascript"> 
	  $(this).ready( function(){ 
	  
		  $(".auto").autocomplete({ 
		  minLength:1, 
		  source: 
		  function(req, add){ 
		   $.ajax({ 
		   url:"c_lookup/lookup", 
		  dataType:'json', 
		  type:'POST', 
		  data: req, 
		  success: 
		   function(data){ 
		   if(data.response =="true"){ 
		   add(data.message); 
		   } 
		   }, 
		   }); 
		  }, 
		  select: 
		  function(event, ui){ 
		  }, 
		 }); 
	  }); 
	  </script> 
	
	
	<?php $attributes = array('class' => 'form-horizontal');
	echo form_open('c_admin/add_data_prosiding', $attributes);?>
	
		<div class="control-group">
				<label class="control-label" for="judul">Judul</label>
				<div class="controls">
					<textarea name="judul" class="autosize-transition span8"></textarea>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="nama_makalah">Nama Makalah</label>
				<div class="controls">
					<textarea name="nama_makalah" class="autosize-transition span8"></textarea>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="sertifikat">Sertifikat</label>
				<div class="controls">
					<input type="text" name="sertifikat"/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="isbn">ISBN</label>
				<div class="controls">
					<input type="text" name="isbn"/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="url">URL</label>
				<div class="controls">
					<input type="text" name="url"/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="Penerbit">Penerbit</label>
				<div class="controls">
					<input type="text" name="penerbit"/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="halaman">Halaman</label>
				<div class="controls">
					<input type="text" name="halaman"/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="tahun">Tahun</label>
				<div class="controls">
					<input type="text" name="tahun"/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Semester</label>

				<div class="controls">
					<label>
						<input name="semester" type="radio" id="ganjil" value="ganjil" />
						<span class="lbl">Ganjil</span>
					</label>

					<label>
						<input name="semester" type="radio" id="genap" value="genap" />
						<span class="lbl">Genap</span>
					</label>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Kategori</label>

				<div class="controls">
					<label>
						<input name="kategori" type="radio" id="id-disable-check" value="Internasional"checked />
						<span class="lbl">Internasional</span>
					</label>

					<label>
						<input name="kategori" type="radio" id="id-enable-check" value="Nasional" />
						<span class="lbl">Nasional</span>
					</label>
				</div>
			</div>
			
			
			
			<div class="control-group">
				<label class="control-label" for="ketua">Ketua</label>
				<div class="controls"><?php
				  echo form_input('ketua[]','','class="auto"');
				?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="anggota">Anggota</label>
				<div class="controls">
					<table class="table-common">
					  <tr id="item"><td><input type="text" class="auto" name="anggota[]"></td><td></td>
					  
					  </tr>
					</table>
				    <a onclick="tambah()" style="cursor:pointer;text-decoration:underline;">Tambah form</a>&nbsp; &nbsp; &nbsp;
				    <a onclick="hapus()" style="cursor:pointer;text-decoration:underline;">hapus</a><br/><br/>
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
			