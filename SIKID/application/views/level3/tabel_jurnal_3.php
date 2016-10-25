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
			<select name="kategori">
				<option/>Kategori
				<option/>Internasional
				<option/>Nasional Terakreditasi
				<option/>Nasional Tidak Terakreditasi
			</select>
			<input class="btn btn-info" type="submit" value="go"/>					
		</div>		
	</div>
	



<?php 
$datanya=$query;
if(isset($_POST['tahun'])&&$_POST['tahun']=='All'&&isset($_POST['kategori'])&&$_POST['kategori']=='kategori'){ 
	$datanya=$query;
}else if(isset($_POST['tahun'])&&$_POST['tahun']=='All'&&isset($_POST['kategori'])&&$_POST['kategori']!='kategori'){ 
	$st=$_POST['kategori'];
	$datanya = $this->db->query("select * FROM jurnal where kategori='$st' order by tahun desc")->result_array();
}else if (isset($_POST['tahun'])&&$_POST['tahun']!='All'&&isset($_POST['kategori'])&&$_POST['kategori']=='kategori'){
	$thn=$_POST['tahun'];
	$datanya = $this->db->query("select * FROM jurnal WHERE tahun=$thn")->result_array();
}else if (isset($_POST['tahun'])&&$_POST['tahun']!='All'&&isset($_POST['kategori'])&&$_POST['kategori']!='kategori'){
	$thn=$_POST['tahun'];
	$st=$_POST['kategori'];
	$datanya = $this->db->query("select * FROM jurnal WHERE tahun=$thn and kategori='$st'")->result_array();
}
?>
<?php if(isset($_POST['tahun'])){
$this->session->set_flashdata('jenis','jurnal');
$this->session->set_flashdata('user','jurusan');
$this->session->set_flashdata('kategori',$_POST['kategori']);
?>
	<input type="button" value="EXPORT EXCEL" class="btn btn-mini btn-success" onclick="window.location.href='<?php echo site_url('c_excel/export/'.$_POST['tahun'])?>'">
<?php } ?>

<hr>
<?php if (isset($datanya)||$query>0){?>
	<table class="table table-striped table-bordered example">
		<thead>
			<tr>
				<th>No</th>
				<th>JUDUL</th>
				<th>TAHUN</th>
				<th>KATEGORI</th>
				<th>KETUA</th>
				<th>ANGGOTA</th>
				<th>MANAGE</th>
			</tr>
		</thead>
			
		<tbody>
			<?php
			$jumlah = count($datanya);
			$jml=0;
			$usl=0;
			$dtr=0;
			$dtl=0;
			for ($i=0;  $i<$jumlah; $i++){
				$data = $datanya[$i];
				$ketua=explode('--',$data['ketua']);
				$an[$i]=explode('//',$data['anggota']);
				for($j=0; $j<count($an[$i]); $j++){
					$ang[$i][$j]=explode('--',$an[$i][$j]);
					
				}
				
				for($k=0; $k<count($ang[$i]);$k++){
					$nm[$i][$k]=$ang[$i][$k][0];
				}
				
				$nm_angg=implode('<br><br>',$nm[$i]);
				
				
				if ($data['kategori']=="Internasional"){
				$usl=$usl+1;
				}
				if ($data['kategori']=="Nasional Terakreditasi"){
				$dtr=$dtr+1;
				}
				if ($data['kategori']=="Nasional Tidak Terakreditasi"){
				$dtl=$dtl+1;
				}
				
					echo "<tr>
						 <td>".($i+1)."</td>
						 <td>$data[judul]</td>
						 <td>$data[tahun]</td>
						 <td>$data[kategori]</td>
						 <td>$ketua[0]</td>
						 <td>$nm_angg</td>
					
						 <td>
						 
						 <a class='btn btn-minier  btn-info' href='".site_url('c_jurusan/detail_jurnal/'.$data['idjurnal'])."'>Detail</a>
						
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
		<td>Internasional</td>
		<td>:</td>
		<td><?php echo $usl?></td>
	</tr>
	<tr>
		<td>Nasional Terakreditasi</td>
		<td>:</td>
		<td><?php echo $dtr?></td>
	</tr>
	<tr>
		<td>Nasional Tidak Terakreditasi</td>
		<td>:</td>
		<td><?php echo $dtl?></td>
	</tr>
</table>
</div>
</div>
<?php } ?>