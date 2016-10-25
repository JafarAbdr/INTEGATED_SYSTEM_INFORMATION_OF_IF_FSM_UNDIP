
<?php
$upload_path = './uploads/';
?>
<h4>PROPOSAL</h4>
<table class="table table-striped table-bordered example">
<thead>
	<tr>
		<th>NO</th>
		<th>JUDUL</th>
		<th>JENIS FILE</th>
		<th>STATUS</th>
		<th>USER UPLOAD</th>
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
		<?php echo $list[$i]->status?>
	</td>
	<td>
		<?php echo $list[$i]->upload_user?>
	</td>

</tr>
<?php }?>
</table>
<br>

<h4>LAPORAN</h4>
<table class="table table-striped table-bordered example">
<thead>
	<tr>
		<th>NO</th>
		<th>JUDUL</th>
		<th>JENIS FILE</th>
		<th>STATUS</th>
		<th>USER UPLOAD</th>
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
		<?php echo $list2[$i]->status?>
	</td>
	<td>
		<?php echo $list2[$i]->upload_user?>
	</td>
</tr>
<?php }?>
</table>