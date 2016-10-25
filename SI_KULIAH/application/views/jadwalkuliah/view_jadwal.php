<link href="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/pages/data-tables.js');?>"></script>
<div class="container-fluid">
   <div id="heading" class="page-header">
      <h1><i class="icon20 i-table-2"></i> Data Tables</h1>
   </div>
   <div class="row-fluid">
      <div class="span12">
         <div class="widget">
            <div class="widget-title">
               <div class="icon">
                  <i class="icon20 i-table"></i>
               </div>
               <h4>Data Jadwal</h4><a href="#" class="minimize"></a>
            </div><!-- End .widget-title -->
            <div class="widget-content">
               <h1><?php $lvl = $this->session->userdata('level'); if($lvl == 99){ echo anchor('jadwal/add', 'Tambah Data','class="btn btn-success"');}?></h1>
               <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="dataTable">
						<thead>
							<tr>
								<th>No.</th>
								<th>Hari</th>
								<th>Jam</th>
								<th>Ruang</th>
								<th>Kode</th>
								<th>Mata Kuliah</th>
								<th>SKS</th>
								<th>SMT</th>
								<th>KLS</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							
							<?php
								$no = 1;
								for($i=0;$i<count($q);$i++):
							?>
							<tr>
								<td> <?php echo $no; ?> </td>
								
								<td> <?php echo $q[$i]['nama_hari']; ?> </td>
								<td> <?php $mulai=$q[$i]['jammulai'];
											  $selesai=$q[$i]['jamselesai'];
												echo substr($mulai,0,2).'.'.substr($mulai,3,2).' - '.substr($selesai,0,2).'.'.substr($selesai,3,2);?>
								</td>
								<td> <?php echo $q[$i]['ruang']; ?> </td>
								<td> <?php echo $q[$i]['kode_matkul']; ?> </td>
								<td> <?php echo $q[$i]['nama_matkul']; ?> </td>
								<td> <?php echo $q[$i]['sks']; ?> </td>
								<td> <?php echo $q[$i]['semesterke']; ?> </td>
								<td> <?php echo $q[$i]['kelas']; ?> </td>
								<?php $lvl = $this->session->userdata('level'); if($lvl == 99){?>
								<td> 
									<?php echo anchor('jadwal/edit/'.$q[$i]['id_jadwal'],'Edit','class="btn btn-primary btn-mini i-pencil"'); echo "<br/>"?> 
									<?php echo anchor('jadwal/delete/'.$q[$i]['id_jadwal'],'Delete',
									array('class'=>"btn btn-mini btn-danger i-remove",'onclick'=>"return confirm('apakah anda ingin menghapus data jadwal ?')"));?>
								</td><?php }?>
							</tr>
							<?php
								$no++;
								endfor;
							?>
							
						</tbody>
					</table>
				</div><!-- End .widget-content -->
         </div><!-- End .widget -->
      </div><!-- End .span12 -->
   </div><!-- End .row-fluid -->
</div>
