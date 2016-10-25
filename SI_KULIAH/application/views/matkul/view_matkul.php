<link href="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/pages/data-tables.js');?>"></script>
<div class="container-fluid">
	<div id="heading" class="page-header">
		<h1><i class="icon20 i-file-7"></i>Daftar Mata Kuliah</h1>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="widget">
				<div class="widget-title">
					<div class="icon">
						<i class="icon20 i-table"></i>
					</div>
					<h4>Daftar Mata Kuliah</h4><a href="#" class="minimize"></a>
					<?php echo $msg; ?>
				</div><!-- End .widget-title -->
				<div class="widget-content">
					<?php
					if (empty($hasil)) {
						echo "<h3>Tidak ada data matkul </h3>";
						$lvl = $this->session->userdata('level');
						if($lvl == 99){
						echo anchor('matakuliah/add', 'Tambah Data','class="btn btn-success"');
						}
					}
					else {
					?>
					<h1><?php $lvl = $this->session->userdata('level'); if($lvl == 99){ echo anchor('matakuliah/add', 'Tambah Data','class="btn btn-success"');}?></h1>
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="dataTable">
						<thead>
							<tr>
								<th>No</th><th>Kode Mata Kuliah</th><th>Nama Mata Kuliah</th><th>SKS</th><th>Semester Ke</th><th>Semester</th><?php $lvl = $this->session->userdata('level'); if($lvl == 99){?><th>Aksi</th><?php }?>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($hasil as $data):
							?>
							<tr>
								<td> <?php echo $no; ?> </td>
								<td> <?php echo $data->kode_matkul; ?> </td>
								<td> <?php echo $data->nama_matkul; ?> </td>
								<td> <?php echo $data->sks; ?> </td>
								<td> <?php echo $data->semesterke; ?> </td>
								<td> <?php echo $data->semester; ?> </td>
								<?php $lvl = $this->session->userdata('level'); if($lvl == 99){?>
								<td> <?php echo anchor('matakuliah/edit/'.$data->id_matkul,'Edit','class="btn btn-info"'); ?> 
									 <?php echo anchor('matakuliah/delete/'.$data->id_matkul,'Delete',
													array('class'=>"btn btn-danger",'onclick'=>"return confirm('apakah anda ingin menghapus data matakuliah ?')"));?></td>
								<?php }?>
							</tr>
							<?php
							$no++;
							endforeach;
							?>
						</tbody>
					</table>
					<?php
					}
					?>
				</div><!-- End .widget-content -->
			</div><!-- End .widget -->
		</div><!-- End .span12 -->
	</div>
</div>
