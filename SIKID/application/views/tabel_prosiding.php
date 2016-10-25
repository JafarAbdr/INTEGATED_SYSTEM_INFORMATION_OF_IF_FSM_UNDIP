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
				<th>SEMESTER</th>
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
							 <td>$data[semester]</td>
							 <td>$data[kategori]</td>
							 <td>";
							 
							 $tbl3 = $this->m_prosiding->get_data_ketua1($data['idprosiding']);
							 //$tbl = $this->m_report->get_Jurnal_by_NIP($data['nip']);
							
							$tb = $this->m_prosiding->get_ak_prosiding();
							$nilai = 0;
							$ak1 = 0;
							$ak2 = 0;
							foreach($tb as $row2){
								$ak1 = $ak1 . $row2['internasional'] . "<br><br>";
								$ak2 = $ak2 . $row2['nasional'] . "<br><br>";
							}
							
							 foreach($tbl3 as $row){
								$nilai = 0;
								if ($row['anggota'] == ""){
								//mandiri
									if(strtolower($row['kategori']) == "internasional"){
										$nilai = $nilai + $ak1;
									}else if (strtolower($row['kategori']) == "nasional"){
										$nilai = $nilai + $ak2;
									}
								} else {
									if(strtolower($row['kategori']) == "internasional"){
										$nilai = $nilai + ((60/100)*$ak1);
									}else if (strtolower($row['kategori']) == "nasional"){
										$nilai = $nilai + ((60/100)*$ak2);
									}
								}
								
							}
							 echo $nilai;
							 echo "<br><br>";
								
								
						echo "</td>
							 <td>
							 <a class='btn btn-minier  btn-info' href='".site_url('c_dosen/detail_prosiding/'.$data['idprosiding'])."'>
							 Detail</a>
							 
							 <a class='btn btn-minier  btn-warning' href='".site_url('c_dosen/update_prosiding/'.$data['idprosiding'])."'>
							 Update</a> 
							 
							 <a class='btn btn-minier  btn-danger' href='".site_url('c_dosen/delete_prosiding/'.$data['idprosiding'])."' onClick=\"return confirm('Apakah Anda Yakin Akan Menghapus Data ini?')\">
							 Delete</a>
							 </td>
							 </tr>
				    ";
			}
			?>
		</tbody>
	</table>
	
<h4>
ANGGOTA
</h4>
<table class="table table-striped table-bordered example">
		<thead>
			<tr>
				<th>No</th>
				<th>JUDUL</th>
				<th>TAHUN</th>
				<th>SEMESTER</th>
				<th>KATEGORI</th>
				<th>AK</th>
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
							 <td>$data[semester]</td>
							 <td>$data[kategori]</td>
							 <td>";
							 $tbl4 = $this->m_prosiding->get_data_anggota1($data['idprosiding']);
							 //anggota
							$anggota1=explode("//",'anggota');
							
							$tb = $this->m_prosiding->get_ak_prosiding();
							//print_r($tbl);
							
							$nilai = 0;
							$ak1 = 0;
							$ak2 = 0;
							foreach($tb as $row2){
									$ak1 = $ak1 . $row2['internasional'] . "<br><br>";
									$ak2 = $ak2 . $row2['nasional'] . "<br><br>";
								}
							 
							 $nilai4 = 0;
							foreach($tbl4 as $row){								
								//1 anggota
								if (count($anggota1) == 1) {
									if(strtolower($row['kategori']) == "internasional"){
										$nilai4 = $nilai4 + ((40/100)*$ak1);
									}else if (strtolower($row['kategori']) == "nasional"){
										$nilai4 = $nilai4 + ((40/100)*$ak2);
									}
								} else if (count($anggota1) == 2) {
									if(strtolower($row['kategori']) == "internasional"){
										$nilai4 = $nilai4 + ((20/100)*$ak1);
									}else if (strtolower($row['kategori']) == "nasional"){
										$nilai4 = $nilai4 + ((20/100)*$ak2);
									}
								} else if (count($anggota1) == 3) {
									if(strtolower($row['kategori']) == "internasional"){
										$nilai4 = $nilai4 + ((13.3/100)*$ak1);
									}else if (strtolower($row['kategori']) == "nasional"){
										$nilai4 = $nilai4 + ((13.3/100)*$ak2);
									}
								}
							}
							 echo $nilai4;
							 echo "<br><br>";
							 
						echo "</td>
							 <td>
							 <a class='btn btn-minier  btn-info' href='".site_url('c_dosen/detail_prosiding/'.$data['idprosiding'])."'>
							 Detail</a>
							
							 </td>
							 </tr>
				    ";
			}
			?>
		</tbody>
	</table>