<link href="<?php echo base_url('assets/js/plugins/forms/select2/select2.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('js/plugins/forms/validation/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/forms/select2/select2.js');?>"></script>
<script src="<?php echo base_url('assets/js/pimpinan/pimpinan_jurusan.js')?>"></script>
<div class="container-fluid">
   <div id="heading" class="page-header">
      <h1><i class="icon20 i-file-7"></i>Form Pimpinan</h1>
   </div>
   <div class="row-fluid">
      <!-- Start page from here -->
   
   <div class='span12'>
      <div class='widget'>
         <div class='widget-title'>
            <div class='icon'>
               <i class='icon20 i-stack-checkmark'></i>
            </div>
            <h4> <?php echo $hasil->jabatan;?> </h4>
            <a href='#' class='minimize'></a>
         </div>
         <div class='widget-content'>
            <form  action='<?php echo site_url("pimpinan/save_edit_jurusan/".$hasil->id_pimpinan)?>' method='post' id='formpimpinanjurusan' class='form-horizontal'>
            <div class='control-group'>
               <label class='control-label' for='nama_pimpinan'>Nama</label>
               <div class='controls controls-row'>
                  <div class='span8'>
                  <?php echo form_dropdown('nama_pimpinan',$dropdownDosen,$selectedDosen,'class="select2" id="nama_pimpinan"');?> 
                  <div id='cek_nama_pimpinan'>
                     <?php echo form_error('nama_pimpinan'); ?>
                  </div>
                  </div>
                  <button type="submit" class="span4 btn btn-primary" id='tampil_data'>Simpan Perubahan</button>
               </div>
            </div>
            
            </form>
         </div>
      </div>
   </div>
   </div><!-- End .row-fluid -->
</div>
<!-- End .container-fluid -->
