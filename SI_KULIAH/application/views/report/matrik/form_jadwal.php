<link href="<?php echo base_url('assets/js/plugins/forms/select2/select2.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('js/plugins/forms/validation/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/forms/select2/select2.js');?>"></script>
<script src="<?php echo base_url('assets/js/report/jadwal.js')?>"></script>
<!--<script src="<?php echo base_url('assets/js/pages/data-tables.js');?>"></script>-->
<noscript><div><center><i class="icon20 i-warning"></i>&nbsp Aktifkan javascript Anda, untuk tampilan lebih baik. Klik <a href="http://www.enable-javascript.com" target="_blank"> cara mengaktifkan javascript</a></center></div></noscript>
<div class="crumb"> 
	<ul class="breadcrumb"> 
		<li><a href="#">Kelola Data</a> <span class="divider">/</span></li> 
		<li class="active">Jadwal</li> 
	</ul> 
</div>
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
               <form class="form-horizontal" method="post" action="<?php echo site_url('jadwal/jadwal_view');?>" id='formSKDekan'>
                  <div class="control-group">
                     <label class="control-label">Silahkan Pilih</label>
                     <div class="controls controls-row">
                        <div class='span4'>
                        <?php echo form_dropdown('thn_ajar', $dropdownYear, $selectedYear,'class="select2" id="thn_ajar"');?>
                        </div>
                        <div class='span4'>
                        <?php echo form_dropdown('semester',$dropdownSemester,$selectedSemester,'class="select2" id="semester"');?>
                        </div>
                        
                        <button type="submit" class="span4 btn btn-primary" id='tampil_data'>Tampilkan Data</button>
                       
                     </div>
                  </div>
                  

               </form>

            </div><!-- End .widget-content -->
         </div><!-- End .widget -->
         
         
      </div><!-- End .span12 -->
   </div><!-- End .row-fluid -->
   <?php
      if(isset($hasil_report)){
         echo $hasil_report;
      }
   ?>
</div>
<!-- End .container-fluid -->
</div>
<!-- End .wrapper -->
</section>
</div><!-- End .main -->
</body>
</html>