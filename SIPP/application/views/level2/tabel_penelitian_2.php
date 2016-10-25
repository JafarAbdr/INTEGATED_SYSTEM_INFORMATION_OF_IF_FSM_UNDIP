<?php if ($this->session->flashdata('message')=="sukses") { ?>
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
		<h4>Sukses</h4>
		<?php echo $this->session->flashdata('alert')?>
	</div>	
<?php } ?>

<?php echo form_open('');?>
	<div class="control-group">
		
		<div class="controls">
		<label class="control-label" for="tahun">Tahun</label>
			<select name="tahun">
				<option/>All
				<?php
				for ($i=0; $i<count($tahun); $i++){
				  $data=$tahun[$i];
				  echo"
					<option/>$data[tahun]
				  ";
				}
				?>
			</select>
			<input class="btn btn-info" type="submit" value="go"/>					
		</div>		
	</div>
	
<?php 
$datanya=$query;

if(isset($_POST['tahun'])&&$_POST['tahun']=='All'){ 
	$datanya=$query;
} else if (isset($_POST['tahun'])&&$_POST['tahun']!='All'){
	$thn=$_POST['tahun'];
	$datanya = $this->db->query("select * FROM penelitian WHERE tahun=$thn")->result_array();
}
?>

<?php if(isset($_POST['tahun'])){
$this->session->set_flashdata('jenis','Penelitian');
?>
	<input type="button" value="EXPORT EXCEL" class="btn btn-mini btn-success" onclick="window.location.href='<?php echo site_url('c_excel/export/'.$_POST['tahun'])?>'">
<?php }?>

<hr>


<?php if (isset($datanya)||$query>0){?>
	<table class="table table-striped table-bordered example">
		<thead>
			<tr>
				<th>No</th>
				<th>JUDUL</th>
				<th>KETUA</th>
				<th>TAHUN</th>
				<th>STATUS</th>
				<th>MANAGE</th>
			</tr>
		</thead>
			
		<tbody>
			<?php
			$jumlah = count($datanya);
			//print_r($datanya);
			$jml=0;
			$usl=0;
			$dtr=0;
			$dtl=0;
			for ($i=0;  $i<$jumlah; $i++){
				$data = $datanya[$i];
				$ketua=explode('--',$data['ketua']);
				if ($data['status']=="Usulan"){
				$usl=$usl+1;
				}
				if ($data['status']=="Diterima"){
				$dtr=$dtr+1;
				}
				if ($data['status']=="Ditolak"){
				$dtl=$dtl+1;
				}
				$jml=$jml+$data['alokasi_dana'];
					echo "<tr>
						 <td>".($i+1)."</td>
						 <td>$data[judul]</td>
						 <td>$ketua[0]</td>
						 <td>$data[tahun]</td>
						 <td>$data[status]</td>
						 <td>
						 
						 <a class='btn btn-minier  btn-info' href='".site_url('c_admin/detail/'.$data['idpenelitian'])."'>Detail</a>
						 
						 <a class='btn btn-minier  btn-warning' href='".site_url('c_admin/update/'.$data['idpenelitian'])."'>Update</a>
						 
						 <a class='btn btn-minier  btn-danger' href='".site_url('c_admin/delete_penelitian/'.$data['idpenelitian'])."'  onClick=\"return confirm('Apakah Anda Yakin Akan Menghapus Data ini?')\">Delete</a>
						 
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;
						 </td>
						 
						 </tr>
					";
			}
			?>
		</tbody>
	</table>


<br>
<div class="row-fluid">
<div class="span12">
<table class="table table-hover" >
	<tr>
		<td class="span2">Total Dana</td>
		<td class="span1">:</td>
		<td><?php echo 'Rp ' .number_format( $jml, 2 , ',' , '.')?></td>
	</tr>
	<tr>
		<td>Usulan</td>
		<td>:</td>
		<td><?php echo $usl?></td>
	</tr>
	<tr>
		<td>Diterima</td>
		<td>:</td>
		<td><?php echo $dtr?></td>
	</tr>
	<tr>
		<td>Ditolak</td>
		<td>:</td>
		<td><?php echo $dtl?></td>
	</tr>
</table>
</div>
</div>
<?php } ?>