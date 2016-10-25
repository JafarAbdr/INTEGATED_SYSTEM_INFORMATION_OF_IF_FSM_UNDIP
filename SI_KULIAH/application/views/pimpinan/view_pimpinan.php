<link href="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/pages/data-tables.js');?>"></script>
<div class="container-fluid">
   <div id="heading" class="page-header">
      <h1><i class="icon20 i-table-2"></i> Data Pimpinan</h1>
   </div>
   <div class="row-fluid">
      <div class="span12">
         <div class="widget">
            <div class="widget-title">
               <div class="icon">
                  <i class="icon20 i-table"></i>
               </div>
               <h4>Data Pimpinan</h4><a href="#" class="minimize"></a>
            </div><!-- End .widget-title -->
            <div class="widget-content">
               <?php
               if (empty($query)) {
                  echo "<h3>Tidak ada data Pimpinan</h3>";                  
               }
               else {
               ?>
               <!--<h1><?php echo anchor('dosen/add', 'Tambah Data','class="btn btn-success"');?></h1>-->
               <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="dataTable">
               <thead>
                  <tr>
                     <th>No.</th>
                     <th>Jabatan</th>
                     <th>Nama</th>
                     <th>NIP</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     $no = 1;
                     foreach ($query as $hasil):
                  ?>
                  <tr>
                     <td> <?php echo $no; ?> </td>
                     <td> <?php echo $hasil->jabatan; ?> </td>
                     <td> <?php echo $hasil->nama_pimpinan==null?'-':$hasil->nama_pimpinan; ?> </td>
                     <td> <?php echo $hasil->nip==null?'-':$hasil->nip; ?> </td>
                     <td> 
                        <?php echo anchor('pimpinan/edit/'.$hasil->id_pimpinan,'Edit','class="btn btn-primary"'); ?>
                     </td>
                  </tr>
                  <?php
                     $no++;
                     endforeach;
                  ?>
               </tbody>
               <tfoot>
                  <tr>
                     <th>No.</th>
                     <th>Jabatan</th>
                     <th>Nama</th>
                     <th>NIP</th>
                     <th>Aksi</th>                  
                  </tr>
               </tfoot>
            </table>
            <?php
            }
            ?>
         </div><!-- End .widget-content -->
                        </div><!-- End .widget -->
                     </div><!-- End .span12 -->
                  </div><!-- End .row-fluid -->
               </div>
               <!-- End .container-fluid -->
            </div>
            <!-- End .wrapper -->
         </section>
      </div><!-- End .main -->
   </body>
</html>