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
		<td>Tahun</td>
		<td>:</td>
		<td><?php echo $data['tahun']?></td>
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
		<td>Sumber Dana</td>
		<td>:</td>
		<td><?php echo "$data[sumber_dana]"?></td>
	</tr>
	<tr>
		<td>Jenis Dana</td>
		<td>:</td>
		<td><?php echo "$data[jenis_dana]"?></td>
	</tr>
	<tr>
		<td>Alokasi Dana</td>
		<td>:</td>
		<td><?php echo 'Rp ' .number_format( $data['alokasi_dana'] , 2 , ',' , '.' )?></td>
	</tr>
	<tr>
		<td>Tempat</td>
		<td>:</td>
		<td><?php echo "$data[tempat]"?></td>
	</tr>
	<tr>
		<td>Nomor Kontrak</td>
		<td>:</td>
		<td><?php echo "$data[no_kontrak]"?></td>
	</tr>
	<tr>
		<td>Tanggal Kontrak</td>
		<td>:</td>
		<td><?php echo "$data[tgl_kontrak]"?></td>
	</tr>
	<tr>
		<td>Batas Kontrak</td>
		<td>:</td>
		<td><?php echo "$data[batas_kontrak]"?></td>
	</tr>
	<tr>
		<td>Nama Penandatangan</td>
		<td>:</td>
		<td><?php echo "$data[nama_ttd]"?></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	
	
</table>

 </div>
</div>