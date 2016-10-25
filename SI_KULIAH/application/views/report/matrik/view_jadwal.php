<link href="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.min.js');?>"></script>

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
					<?php echo $table_jadwal;?>
				</div>
			</div><!-- End .widget -->
      </div><!-- End .span12 -->
   </div><!-- End .row-fluid -->
