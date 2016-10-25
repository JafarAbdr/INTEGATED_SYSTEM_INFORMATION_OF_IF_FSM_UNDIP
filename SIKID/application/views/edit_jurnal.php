<link rel="stylesheet" href="assets/css/datepicker.css" />

<?php
$anggota=explode("//",$data['anggota']);
?>

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
			echo form_open('c_dosen/edit_data/'.$data['idjurnal'], $attributes);
	?>
			
			<div class="control-group">
				<label class="control-label" for="judul">Judul</label>
				<div class="controls">
				  <textarea name="judul" class="autosize-transition span8"><?php echo "$data[judul]";?></textarea>	
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="nama_jurnal">Nama Jurnal</label>
				<div class="controls">
					<input type="text" name="nama_jurnal" class="span9" value="<?php echo "$data[nama_jurnal]"?>"/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="nomor_volume">Nomor/ Volume</label>
				<div class="controls">
					<input type="text" name="nomor_volume" value="<?php echo "$data[nomor_volume]"?>"/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="issn">ISSN</label>
				<div class="controls">
					<input type="text" name="issn" value="<?php echo "$data[issn]"?>"/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="edisi">Edisi</label>
				<div class="controls">
					<input type="text" name="edisi" value="<?php echo "$data[edisi]"?>"/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="penerbit">Penerbit</label>
				<div class="controls">
					<input type="text" name="penerbit" value="<?php echo "$data[penerbit]"?>"/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="url">URL</label>
				<div class="controls">
					<input type="text" name="url" value="<?php echo "$data[url]"?>"/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="halaman">Halaman</label>
				<div class="controls">
					<input type="text" name="halaman" value="<?php echo "$data[halaman]"?>"/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="Tahun">Tahun</label>
				<div class="controls">
					<input type="text" name="tahun" class="auto" value="<?php echo "$data[tahun]"?>"/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Semester</label>

				<div class="controls">
					<label>
						<input name="semester" type="radio" id="id-enable-check-2" value="ganjil" <?php echo ((ISSET($data['semester'])) && ($data['semester'] == 'ganjil'))?'checked':''; ?> />
						<span class="lbl">Ganjil</span>
					</label>
					<label>
						<input name="semester" type="radio" id="id-disable-check-3" value="genap" <?php echo ((ISSET($data['semester'])) && ($data['semester'] == 'genap'))?'checked':''; ?> />
						<span class="lbl">Genap</span>
					</label>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Kategori</label>

				<div class="controls">
					<label>
						<input name="kategori" type="radio" id="id-disable-check" value="Internasional" <?php echo ((ISSET($data['kategori'])) && ($data['kategori'] == 'Internasional'))?'checked':''; ?> />
						<span class="lbl">Internasional</span>
					</label>

					<label>
						<input name="kategori" type="radio" id="id-enable-check" value="Nasional Terakreditasi" <?php echo ((ISSET($data['kategori'])) && ($data['kategori'] == 'Nasional Terakreditasi'))?'checked':''; ?> />
						<span class="lbl">Nasional Terakreditasi</span>
					</label>

					<label>
						<input name="kategori" type="radio" id="id-disable-check-2" value="Nasional Tidak Terakreditasi" <?php echo ((ISSET($data['kategori'])) && ($data['kategori'] == 'Nasional Tidak Terakreditasi'))?'checked':''; ?> />
						<span class="lbl">Nasional Tidak Terakreditasi</span>
					</label>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="ketua">Ketua</label>
				<div class="controls">
					<input type="text" class="auto" name="ketua[]" value="<?php echo "$data[ketua]"?>"/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="anggota">Anggota</label>
				<div class="controls">
					<table class="table-common">
					  <?php for($i=0;$i < count($anggota) ;$i++) { ?>
					  <tr>
						<td><input type="text" class="auto" name="anggota[]" value="<?php echo $anggota[$i]?>"> </td>
					  </tr>
					  <?php } ?>
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
			