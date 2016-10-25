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
					<h4>Data Dosen</h4><a href="#" class="minimize"></a>
					<?php echo $msg; ?>
				</div><!-- End .widget-title -->
				<div class="widget-content">
					<h1><?php $lvl = $this->session->userdata('level'); if($lvl == 99){ echo anchor('dosen/add', 'Tambah Data','class="btn btn-success"');}?></h1>
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="dataTable">
               <thead>
                  <tr>
                     <th>No.</th>
							<th>NIP</th>
							<th>Nama</th>
							<th>Pangkat</th>
							<th>Jabatan</th><?php $lvl = $this->session->userdata('level'); if($lvl == 99){?>
							<th>Aksi</th><?php }?>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     $no = 1;
                     foreach ($query as $hasil):
                  ?>
                  <tr>
                     <td> <?php echo $no; ?> </td>
                     <td> <?php echo $hasil->nip; ?> </td>
                     <td> <?php echo $hasil->nama_dosen; ?> </td>
                     <td> <?php echo $hasil->pangkat; ?> </td>
                     <td> <?php echo $hasil->jabatan; ?> </td><?php $lvl = $this->session->userdata('level'); if($lvl == 99){?>
                     <td> 
                        <?php echo anchor('dosen/edit/'.$hasil->id_dosen,'Edit','class="btn btn-info"'); ?> 
                        <?php echo anchor('dosen/delete/'.$hasil->id_dosen,'Delete',
                        array('class'=>"btn btn-danger",'onclick'=>"return confirm('apakah anda ingin menghapus data dosen ?')"));?>
                     </td><?php }?>
                  </tr>
                  <?php
                     $no++;
                     endforeach;
                  ?>
               </tbody>
               <tfoot>
                  <tr>
							<th>No.</th>
							<th>NIP</th>
							<th>Nama</th>
							<th>Pangkat</th>
							<th>Jabatan</th><?php $lvl = $this->session->userdata('level'); if($lvl == 99){?>
							<th>Aksi</th><?php }?>                  
						</tr>
               </tfoot>
					</table>
				</div><!-- End .widget-content -->
         </div><!-- End .widget -->
      </div><!-- End .span12 -->
   </div><!-- End .row-fluid -->
</div>