<link href="<?php echo base_url('assets/js/plugins/forms/select2/select2.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('js/plugins/forms/validation/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/forms/select2/select2.js');?>"></script>
<script src="<?php echo base_url('assets/js/pimpinan/pimpinan_fakultas.js')?>"></script>
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
            <form  action='<?php echo site_url("pimpinan/save_edit_fakultas/".$hasil->id_pimpinan)?>' method='post' id='formpimpinanfakultas' class='form-horizontal'>
            <div class='control-group'>
               <label class='control-label' for='nama_pimpinan'>Nama Pimpinan</label>
               <div class='controls controls-row'>
                  <input type='text' name='nama_pimpinan' id='nama_pimpinan' class='required span12' placeholder='masukan nama pimpinan' value='<?php echo $hasil->nama_pimpinan?>'> 
                  <div id='cek_namapimpinan'>
                     <?php echo form_error('nama_pimpinan'); ?>
                  </div>
               </div>
            </div>
            <div class='control-group'>
               <label class='control-label' for='nip'>NIP </label>
               <div class='controls controls-row'>
                  <input type='text' name='nip' id='nip' class="required span12" placeholder='e.g: 198203092006041002' value='<?php echo $hasil->nip?>'>
                  <div id='cek_nip'>
                     <?php echo form_error('nip'); ?>
                  </div>
               </div>
            </div>
            <div class='form-actions'>
               <button type='submit' name='submit_pimpinan' id='submit_pimpinan' class='btn btn-primary'> 
                  Simpan Perubahan
               </button>
            </div>
            </form>
         </div>
      </div>
   </div>
   </div><!-- End .row-fluid -->
</div>
<!-- End .container-fluid -->
