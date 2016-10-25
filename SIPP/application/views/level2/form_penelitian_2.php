	<link rel="stylesheet" href="assets/css/datepicker.css" />
	<?php if (validation_errors()) { ?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">x</button>
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
	echo form_open('c_admin/add_data_penelitian', $attributes);?>
	
		<div class="control-group">
				<label class="control-label" for="judul">Judul</label>
				<div class="controls">
					<textarea name="judul" class="autosize-transition span8"></textarea>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="tahun">Tahun</label>
				<div class="controls">
					<input type="text" name="tahun"/>
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
	
			<div class="control-group">
				<label class="control-label" for="sumber">Sumber Dana</label>
				<div class="controls">
					<select name="sumber">
						<option/>
						<option/>DIPA FSM
						<option/>DIPA UNDIP
						<option/>DIPA DIKTI
						<option/>Lainnya
					</select>					
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="jenis_dana">Jenis Dana</label>
				<div class="controls">
					<input type="text" name="jenis_dana"/>
				</div>
			</div>
	
			<div class="control-group">
				<label class="control-label" for="dana">Alokasi Dana</label>
				<div class="controls">
					<input type="text" name="dana" placeholder="contoh: 1000000" />
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="tempat">Tempat</label>
				<div class="controls">
					<input type="text" name="tempat"/>
				</div>
			</div>
			
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
		
			<div class="control-group">
				<label class="control-label" for="nomor">Nomor Kontrak / Surat Tugas</label>
				<div class="controls">
					<input id="form1" type="text" name="nomor"disabled>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="tgl_k">Tanggal Kontrak</label>
				<div class="controls">
				<div class="row-fluid input-append">
					<input class="date-picker" name="tgl_k" type="text" data-date-format="dd-mm-yyyy" id="form2" disabled readonly />
					<span class="add-on">
						<i class="icon-calendar"></i>
					</span>
				</div>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="bts_k">Batas Kontrak (tgl berakhir)</label>
				<div class="controls">
				<div class="row-fluid input-append">	
					<input id="form3" class="date-picker" name="bts_k" type="text"  data-date-format="dd-mm-yyyy" disabled readonly />
					<span class="add-on">
						<i class="icon-calendar"></i>
					</span>
				</div>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="nama_ttd">Nama Penandatangan Kontrak</label>
				<div class="controls">
					<input  id="form4" type="text" name="nama_ttd" disabled/>
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
			