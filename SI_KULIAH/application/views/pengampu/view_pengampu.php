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
            </div><!-- End .widget-title -->
            <div class="widget-content">
               <h1><?php echo anchor('bebanif/add', 'Tambah Data','class="btn btn-success"');?></h1>
               <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="dataTable">
               <thead>
                  <tr>
                     <th>No.</th>
                     <th>Tahun Ajar</th>
                     <th>Semester</th>
                     <th>Mata Kuliah</th>
                     <th>Kelas</th>
                     <th>Dosen 1</th>
                     <th>Dosen 2</th>
                     <th width = "140px">Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  
                  <?php
                     $no = 1;
                     for($i=0;$i<count($q);$i++):
                  ?>
                  <tr>
                     <td> <?php echo $no; ?> </td>
                     <td> <?php echo $q[$i]['thn_ajar']; ?> </td>
                     <td> <?php echo $q[$i]['semester']; ?> </td>
                     <td> <?php echo $q[$i]['nama_matkul']; ?> </td>
                     <td> <?php echo $q[$i]['jumlah_kelas']; ?> </td>
                     <td> <?php echo $dos1[$i]; ?> </td>
                     <td> <?php echo ($dos2[$i] !== $dos1[$i]) ? $dos2[$i]: '-'; ?> </td>
                     <td> 
                        <?php echo anchor('bebanif/edit/'.$q[$i]['id_beban'],'Edit','class="btn btn-info"'); ?> 
                        <?php echo anchor('bebanif/delete/'.$q[$i]['id_beban'],'Delete',
                        array('class'=>"btn btn-danger",'onclick'=>"return confirm('apakah anda ingin menghapus data dosen ?')"));?>
                     </td>
                  </tr>
                  <?php
                     $no++;
                     endfor;
                  ?>
                  
               </tbody>
               <tfoot>
                  <tr>
                     <th>No.</th>
                     <th>Tahun Ajar</th>
                     <th>Semester</th>
                     <th>Mata Kuliah</th>
                     <th>Kelas</th>
                     <th>Dosen 1</th>
                     <th>Dosen 2</th>
                     <th>Aksi</th>         
                  </tr>
               </tfoot>
            </table>
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