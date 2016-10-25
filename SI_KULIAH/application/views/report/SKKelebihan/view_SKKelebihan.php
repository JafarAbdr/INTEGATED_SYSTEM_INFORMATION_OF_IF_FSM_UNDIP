<link href="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/pages/data-tables.js');?>"></script>
<div class="row-fluid">
   <div class="span12">
	<div class='widget'>
      <div class="widget-title">
         <div class="icon">
            <i class="icon20 i-file-4"></i>
         </div>
         <h4>SK Kelebihan Mengajar <?php echo $thn_ajar.' '.$semester;?></h4><a href="#" class="minimize"></a>
      </div><!-- End .widget-title -->
      <div class="widget-content">
         <?php 
         if($level!=3):
         ?>
         <h1>
            <?php 
               $export_address_semua_data = 'con_SKKelebihan/export_all_data?thn_ajar='.$thn_ajar.'&semester='.$semester.'&skswajib='.$sks_wajib;
               $export_address_tanpa_nol = 'con_SKKelebihan/export_tanpa_nol?thn_ajar='.$thn_ajar.'&semester='.$semester.'&skswajib='.$sks_wajib;
            ?>
            <a href="<?php echo site_url($export_address_semua_data)?>">
            <button type="button" class="btn btn-primary">
               <i class="icon20 i-file-excel"></i>
               Export Semua Data
            </button>
            </a>
            <a href="<?php echo site_url($export_address_tanpa_nol)?>">
            <button type="button" class="btn btn-success">
               <i class="icon20 i-file-excel"></i>
               Export Kelebihan SKS > 0
            </button>
            </a>
         </h1>

         <?php 
            endif;
            echo $hasil_tabel;?>
	</div><!-- End .widget-content -->
</div>
</div>
</div>       
                  