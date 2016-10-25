<?php
$anggota=explode("//",$data['anggota']);
for($i=0;$i<count($anggota);$i++){
	$pecah[$i]=explode('--',$anggota[$i]);
}

$ketua=explode('--',$data['ketua']);
?>

<div class="row-fluid">
	<div class="span12">
	<table class="table table-hover" >
		<tr>
			<td class="span2">Judul</td>
			<td class="span1">:</td>
			<td><?php echo $data['judul']?></td>
		</tr>
		<tr>
			<td>Nama Makalah</td>
			<td>:</td>
			<td><?php echo $data['nama_makalah']?></td>
		</tr>
		<tr>
			<td>Sertifikat</td>
			<td>:</td>
			<td><?php echo $data['sertifikat']?></td>
		</tr>
		<tr>
			<td>ISBN</td>
			<td>:</td>
			<td><?php echo $data['isbn']?></td>
		</tr>
		<tr>
			<td>URL</td>
			<td>:</td>
			<td><?php echo $data['url']?></td>
		</tr>
		<tr>
			<td>Penerbit</td>
			<td>:</td>
			<td><?php echo $data['penerbit']?></td>
		</tr>
		<tr>
			<td>Halaman</td>
			<td>:</td>
			<td><?php echo $data['halaman']?></td>
		</tr>
		<tr>
			<td>Tahun</td>
			<td>:</td>
			<td><?php echo $data['tahun']?></td>
		</tr>
		<tr>
			<td>Semester</td>
			<td>:</td>
			<td><?php echo $data['semester']?></td>
		</tr>
		<tr>
			<td>Ketua</td>
			<td>:</td>
			<td><?php echo $ketua[0]?></td>
		</tr>
		<tr>
			<td>Anggota</td>
			<td>:</td>
			<td><?php 
				for($i=0;$i<count($pecah);$i++){
					echo $pecah[$i][0]."<br>";
				}
			?></td>
		</tr>
		<tr>
			<td>Kategori</td>
			<td>:</td>
			<td><?php echo $data['kategori']?></td>
		</tr>

		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
	</div>
</div>