<?php
$upload_path = './uploads/';
?>

<h4>JURNAL</h4>
<table class="table table-striped table-bordered example">
	<thead>
		<tr>
			<th>NO</th>
			<th>JUDUL</th>
			<th>JENIS FILE</th>
			<th>KATEGORI</th>
			
			<th>MANAGE</th>
		</tr>
	</thead>

	<?php for ($i=0;$i<count($list);$i++){?>
	<tr>
		<td>
			<?php echo $i+1?>
		</td>
		<td>
			<a href='<?php echo $upload_path.'/'.$list[$i]->nama?>'><?php echo $list[$i]->nama?>
		</td>
		<td>
			<?php echo $list[$i]->jenis_file?>
		</td>
		<td>
			<?php echo $list[$i]->kategori?>
		</td>

		<td>
			<a href='c_upload/delete_upload/<?php echo $list[$i]->no?>' class='btn btn-mini  btn-danger' onClick="return confirm('Apakah Anda Yakin Akan Menghapus Data ini?')"><?php echo "delete"?></a>
		</td>

		
	</tr>
	<?php }?>
</table>
<br>

<h4>PROSIDING</h4>
<table class="table table-striped table-bordered example">
	<thead>
		<tr>
			<th>NO</th>
			<th>JUDUL</th>
			<th>JENIS FILE</th>
			<th>KATEGORI</th>

			<th>MANAGE</th>
		</tr>
	</thead>

	<?php for ($i=0;$i<count($list2);$i++){?>
	<tr>
		<td>
			<?php echo $i+1?>
		</td>
		<td>
			<a href='<?php echo $upload_path.'/'.$list2[$i]->nama?>'><?php echo $list2[$i]->nama?>
		</td>
		<td>
			<?php echo $list2[$i]->jenis_file?>
		</td>
		<td>
			<?php echo $list2[$i]->kategori?>
		</td>

		<td>
			<a href='c_upload/delete_upload/<?php echo $list2[$i]->no?>' class='btn btn-mini  btn-danger' onClick="return confirm('Apakah Anda Yakin Akan Menghapus Data ini?')"><?php echo "delete"?></a>
		</td>
	</tr>
	<?php }?>
</table>