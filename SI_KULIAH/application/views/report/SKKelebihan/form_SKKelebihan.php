<link href="<?php echo base_url('assets/js/plugins/forms/select2/select2.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('js/plugins/forms/validation/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/forms/select2/select2.js');?>"></script>
<script src="<?php echo base_url('assets/js/report/SKKelebihan.js')?>"></script>
<!--<script src="<?php echo base_url('assets/js/pages/data-tables.js');?>"></script>-->
<div class="crumb"> 
	<ul class="breadcrumb"> 
		<li><a href="#">Report</a> <span class="divider">/</span></li> 
		<li class="active">SK Kelebihan</li> 
	</ul> 
</div>
<div class="container-fluid">
   <div id="heading" class="page-header">
      <h1><i class="icon20 i-file-3"></i>Surat Keputusan Kelebihan Jam Mengajar</h1>
   </div>
   <div class="row-fluid">
      <div class="span12">
         
         <div class="widget">
            <div class="widget-title">
               <div class="icon">
                  <i class="icon20 i-database-2"></i>
               </div>
               <h4>Data Beban Mengajar</h4><a href="#" class="minimize"></a>
            </div><!-- End .widget-title -->
            <div class="widget-content">
               <form class="form-horizontal" method="post" action="<?php echo site_url('report/SKKelebihan_view');?>" id='formSKDekan'>
                  <div class="control-group">
                     <label class="control-label">Silahkan Pilih</label>
                     <div class="controls controls-row">
                        <div class='span3'>
                           <?php echo form_dropdown('thn_ajar', $dropdownYear, $selectedYear,'class="select2" id="thn_ajar"');?>
                        </div>
                        <div class='span3'>
                           <?php echo form_dropdown('semester',$dropdownSemester,$selectedSemester,'class="select2" id="semester"');?>
                        </div>
                        <div class='span3'>
                        <input type='text' name='skswajib' id='skswajib' class='required' placeholder='SKS wajib' value='<?php echo isset($sks_wajib)?$sks_wajib:8;?>'>
                        </div>
                        <button type="submit" class="span3 btn btn-primary" id='tampil_data'>Tampilkan Data</button>                       
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