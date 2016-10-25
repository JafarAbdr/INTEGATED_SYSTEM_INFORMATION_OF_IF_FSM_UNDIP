<link href="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/jquery.dataTables.min.js');?>"></script>

   <div class="row-fluid">
      <div class="span12">
         <div class="widget">
            <div class="widget-title">
               <div class="icon">
                  <i class="icon20 i-table"></i>
               </div>
               <h4>Data Jadwal Ujian</h4><a href="#" class="minimize"></a>
            </div><!-- End .widget-title -->
            <div class="widget-content">
					<?php $lvl = $this->session->userdata('level'); if(($lvl == 1)||($lvl == 2)){?>
					<h1><?php echo anchor('con_ekspor_jadwal_ujian/export_Jadwal?thn_ajar='.$thn_ajar.'&semester='.$semester.'&utsuas='.$uts_uas, 'Export Data Excel','class="btn btn-primary"');?></h1>
					<?php }?>
					<?php echo $table_jadwal;?>
				</div>
			</div><!-- End .widget -->
      </div><!-- End .span12 -->
   </div><!-- End .row-fluid -->
