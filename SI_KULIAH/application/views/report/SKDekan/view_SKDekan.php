<link href="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.min.js');?>"></script>
<!--<script src="<?php echo base_url('assets/js/pages/data-tables.js');?>"></script>-->
<div class="row-fluid">
   <div class="span12">
	<div class='widget'>
      <div class="widget-title">
         <div class="icon">
            <i class="icon20 i-file-4"></i>
         </div>
         <h4>SK Dekan <?php echo $thn_ajar.' '.$semester;?></h4><a href="#" class="minimize"></a>
      </div><!-- End .widget-title -->
      <div class="widget-content">
         <?php 
         if($level!=3):
         ?>
         <h1>
            <?php $export_address='con_ekspor_SKDekan/export_SKDekan?thn_ajar='.$thn_ajar.'&semester='.$semester;?>
            <a href="<?php echo site_url($export_address);?>">
            <button type="button" class="btn btn-primary">
               <i class="icon20 i-file-excel"></i>
               Export Data SKDekan
            </button>
            </a>
         </h1>
         <?php 
            endif;
            echo $hasil_tabel;
         ?>
	</div><!-- End .widget-content -->
</div>
</div>
</div>       
                  