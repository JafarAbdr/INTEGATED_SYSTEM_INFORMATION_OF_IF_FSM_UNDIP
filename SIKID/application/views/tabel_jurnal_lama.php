<?php if ($this->session->flashdata('message')=="sukses") { ?>
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
		<h4>Sukses</h4>
		<?php echo $this->session->flashdata('alert')?>
	</div>	
<?php } ?>
<h4>
KETUA
</h4>
<table class="table table-striped table-bordered example">
		<thead>
			<tr>
				<th>No</th>
				<th>JUDUL</th>
				<th>TAHUN</th>
				<th>KATEGORI</th>
				<th>AK</th>
				<th>MANAGE</th>
				
			</tr>
		</thead>
			
		<tbody>
			<?php
			$jumlah = count($ketua);
			for ($i=0; $i<$jumlah; $i++){
					$data = $ketua[$i];
						echo "<tr>
							 <td>".($i+1)."</td>
							 <td>$data[judul]</td>
							 <td>$data[tahun]</td>
							 <td>$data[kategori]</td>
							 <td>
							 <a class='btn btn-minier  btn-info' href='".site_url('c_dosen/detail/'.$data['idjurnal'])."'>Detail</a>
							 
							 <a class='btn btn-minier  btn-warning' href='".site_url('c_dosen/update/'.$data['idjurnal'])."'>Update</a> 
							 
							 <a class='btn btn-minier  btn-danger' href='".site_url('c_dosen/delete/'.$data['idjurnal'])."' onClick=\"return confirm('Apakah Anda Yakin Akan Menghapus Data ini?')\">
							 Delete</a>
							 </td>
							 </tr>
				    ";
			}
			?>
		</tbody>
	</table>
	
	<hr>
	
	<h4>
	ANGGOTA
	</h4>
	<table class="table table-striped table-bordered example">
		<thead>
			<tr>
				<th>No</th>
				<th>JUDUL</th>
				<th>TAHUN</th>
				<th>KATEGORI</th>
				<th>MANAGE</th>
				
			</tr>
		</thead>
			
		<tbody>
			<?php
			$jumlah = count($anggota);
			for ($i=0; $i<$jumlah; $i++){
					$data = $anggota[$i];
						echo "<tr>
							 <td>".($i+1)."</td>
							 <td>$data[judul]</td>
							 <td>$data[tahun]</td>
							 <td>$data[kategori]</td>
							 <td>
							 <a class='btn btn-minier  btn-info' href='".site_url('c_dosen/detail/'.$data['idjurnal'])."'>Detail</a>
							 
							 </td>
							 </tr>
				    ";
			}
			?>
		</tbody>
	</table>