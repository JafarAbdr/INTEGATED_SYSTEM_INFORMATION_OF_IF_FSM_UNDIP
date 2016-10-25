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
			echo form_open('c_admin/edit_pengabdian/'.$data['idpengabdian'], $attributes);
	?>
			
			<div class="control-group">
				<label class="control-label" for="judul">Judul</label>
				<div class="controls">
					<textarea name="judul" class="autosize-transition span8"><?php echo "$data[judul]";?></textarea>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="Tahun">Tahun</label>
				<div class="controls">
					<input type="text" name="tahun" class="auto" value="<?php echo "$data[tahun]"?>"/>
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
	
			<div class="control-group">
				<label class="control-label" for="sumber">Sumber Dana</label>
				<div class="controls">
					<select name="sumber">
						<option/>
						<option value="DIPA FSM" <?php echo ((ISSET($data['sumber_dana'])) && ($data['sumber_dana'] == 'DIPA FSM'))?'selected':''; ?>/>DIPA FSM
						<option value="DIPA UNDIP" <?php echo ((ISSET($data['sumber_dana'])) && ($data['sumber_dana'] == 'DIPA UNDIP'))?'selected':''; ?>/>DIPA UNDIP
						<option value="DIPA DIKTI" <?php echo ((ISSET($data['sumber_dana'])) && ($data['sumber_dana'] == 'DIPA DIKTI'))?'selected':''; ?>/>DIPA DIKTI
						<option value="Lainnya" <?php echo ((ISSET($data['sumber_dana'])) && ($data['sumber_dana'] == 'Lainnya'))?'selected':''; ?>/>Lainnya
					</select>     
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="jenis_dana">Jenis Dana</label>
				<div class="controls">
					<input type="text" name="jenis_dana" value="<?php echo "$data[jenis_dana]"?>" />
				</div>
			</div>
	
			<div class="control-group">
				<label class="control-label" for="dana">Alokasi Dana</label>
				<div class="controls">
					<input type="text" name="dana" placeholder="contoh: 1000000" value="<?php echo "$data[alokasi_dana]"?>" />
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="tempat">Tempat</label>
				<div class="controls">
					<input type="text" name="tempat" value="<?php echo "$data[tempat]"?>"/>
				</div>
			</div>
			
			
			<div class="control-group">
				<label class="control-label">Status</label>

				<div class="controls">
					<label>
						<input name="status" type="radio" id="id-disable-check" value="Usulan" <?php echo ((ISSET($data['status'])) && ($data['status'] == 'Usulan'))?'checked':''; ?> />
						<span class="lbl">Usulan</span>
					</label>

					<label>
						<input name="status" type="radio" id="id-enable-check" value="Diterima" <?php echo ((ISSET($data['status'])) && ($data['status'] == 'Diterima'))?'checked':''; ?> />
						<span class="lbl">Diterima</span>
					</label>

					<label>
						<input name="status" type="radio" id="id-disable-check-2" value="Ditolak" <?php echo ((ISSET($data['status'])) && ($data['status'] == 'Ditolak'))?'checked':''; ?> />
						<span class="lbl">Ditolak</span>
					</label>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="nomor">Nomor Kontrak / Surat Tugas</label>
				<div class="controls">
					<input id="form1" type="text" name="nomor" value="<?php echo "$data[no_kontrak]"?>"
					<?php echo ((ISSET($data['status'])) && ($data['status'] != 'Diterima'))?'disabled':''; ?>/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="tgl_k">Tanggal Kontrak</label>
				<div class="controls">
				<div class="row-fluid input-append">
					<input id="form2" class="date-picker" name="tgl_k" type="text" data-date-format="dd-mm-yyyy" value="<?php echo "$data[tgl_kontrak]"?>"
					<?php echo ((ISSET($data['status'])) && ($data['status'] != 'Diterima'))?'disabled':''; ?>/>
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
					<input id="form3" class="date-picker" name="bts_k" type="text" data-date-format="dd-mm-yyyy" value="<?php echo "$data[batas_kontrak]"?>"
					<?php echo ((ISSET($data['status'])) && ($data['status'] != 'Diterima'))?'disabled':''; ?>/>
					<span class="add-on">
						<i class="icon-calendar"></i>
					</span>
				</div>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="nama_ttd">Nama Penandatangan Kontrak</label>
				<div class="controls">
					<input id="form4" type="text" name="nama_ttd" value="<?php echo "$data[nama_ttd]"?>"
					<?php echo ((ISSET($data['status'])) && ($data['status'] != 'Diterima'))?'disabled':''; ?>/>
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
			