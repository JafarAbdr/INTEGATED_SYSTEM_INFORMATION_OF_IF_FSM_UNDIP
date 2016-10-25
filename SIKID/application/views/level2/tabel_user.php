	
	<?php if ($this->session->flashdata('message')=="sukses") { ?>
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
		<h4>Sukses</h4>
		<?php echo $this->session->flashdata('alert')?>
	</div>	
	<?php } ?>
	

	<table class="table table-striped table-bordered example">
		<thead>
			<tr>
				<th>No</th>
				<th>NIP</th>
				<th>Nama</th>
				<th>Level 
				  <br>(1=Dosen & 3=Jurusan)</th>
				<th>Manage</th>
				
			</tr>
		</thead>
			
		<tbody>
			<?php
			$jumlah = count($query);
			for ($i=0; $i<$jumlah; $i++){
					$data = $query[$i];
						echo "<tr>
							 <td>".($i+1)."</td>
							 <td>$data[nip]</td>
							 <td>$data[nama]</td>
							 <td>$data[level]</td>
							 <td>
							 						 
							 <a class='btn btn-minier  btn-warning' href='".site_url('c_admin/update_user/'.$data['iduser'])."'>Update</a>
							 
							 <a class='btn btn-minier  btn-danger' href='".site_url('c_admin/delete_user/'.$data['iduser'])."'  onClick=\"return confirm('Apakah Anda Yakin Akan Menghapus Data ini?')\">Delete</a>
							 
							 <a class='btn btn-minier  btn-success' href='".site_url('c_admin/reset_password/'.$data['iduser'])."'>Reset Password</a>
							 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							 </td>
							 </tr>
				    ";
			}
			?>
		</tbody>
	</table>