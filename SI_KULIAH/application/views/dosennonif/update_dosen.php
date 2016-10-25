<link href="<?php echo base_url('assets/js/plugins/forms/select2/select2.css');?>" rel="stylesheet" />
<script src="<?php echo base_url('js/plugins/forms/validation/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/forms/select2/select2.js');?>"></script>
<script src="<?php echo base_url('assets/js/dosen/dosen_valid.js')?>"></script>
<noscript><div><center><i class="icon20 i-warning"></i>&nbsp Aktifkan javascript Anda, untuk tampilan lebih baik. Klik <a href="http://www.enable-javascript.com" target="_blank"> cara mengaktifkan javascript</a></center></div></noscript>
<div class="crumb"> 
	<ul class="breadcrumb"> 
		<li><a href="#">Kelola Data</a> <span class="divider">/</span></li> 
		<li><a href="#">Dosen</a> <span class="divider">/</span></li> 
		<li><a href="#">Dosen Non IF</a> <span class="divider">/</span></li> 
		<li class="active">Edit Dosen Non IF</li>
</ul> </div>
<div class="container-fluid">
   <div id="heading" class="page-header">
      <h1><i class="icon20 i-file-7"></i>Form Dosen Non IF</h1>
   </div>
   <div class="row-fluid">
      <!-- Start page from here -->
	
	<div class='span12'>
		<div class='widget'>
			<div class='widget-title'>
				<div class='icon'>
				   <i class='icon20 i-stack-checkmark'></i>
				</div>
				<h4> Data Dosen Non IF</h4>
				<a href='#' class='minimize'></a>
			</div>
			<div class='widget-content'>
				<form  action='<?php echo site_url("con_dosennonif/save_update_data/".$hasil->id_dosen)?>' method='post' id='formdosen' class='form-horizontal'>
				<div class='control-group'>
					<label class='control-label' for='id_dosen'>ID_Dosen</label>
						<div class='controls controls-row'>
							<input type='text' name='id_dosen' id='id_dosen' class='required span12' value='<?php echo $hasil->id_dosen?>' readonly> 
						</div>
				</div>
				<div class='control-group'>
					<label class='control-label' for='nip'>NIP </label>
					<div class='controls controls-row'>
						<input type='text' name='nip' id='nip' class="required span12" placeholder='e.g: 19820309 200604 1 002' value='<?php echo $hasil->nip?>'>
						<div id='cek_nip'>
							<?php echo form_error('nip'); ?>
						</div>
					</div>
				</div>
				<div class='control-group'>
					<label class='control-label' for='nama_dosen'>Nama Dosen</label>
					<div class='controls controls-row'>
						<input type='text' name='nama_dosen' id='nama_dosen' class='required span12' placeholder='masukan nama dosen' value='<?php echo $hasil->nama_dosen?>'> 
						<div id='cek_namadosen'>
							<?php echo form_error('nama_dosen'); ?>
						</div>
					</div>
				</div>
				<div class='control-group'>
					<label class='control-label' for='nidn'>NIDN</label>
					<div class='controls controls-row'>
						<input type='text' name='nidn' id='nidn' class='required span12' placeholder='masukan NIDN' value='<?php echo $hasil->nidn?>'>
						<div id='cek_nidn'>
							<?php echo form_error('nidn'); ?>
						</div>
					</div>
				</div>
				<div class='control-group'>
					<label class='control-label' for='pangkat'>Pangkat</label>
					<div class='controls controls-row'>
						<div class='span8'>
							<select name='pangkat' id='pangkat' class='select2' style='width:100%;'>
							<option></option>
							<optgroup label='Golongan I'>
							   <option value='Juru Muda / I A' <?php if($hasil->pangkat==='Juru Muda / I A'){echo 'selected';}?>>			
							      Juru Muda / I A		
							   </option>    
							   <option value='Juru Muda Tk I / I B' <?php if($hasil->pangkat==='Juru Muda Tk I / I B'){echo 'selected';}?>>	
							      Juru Muda Tk I / I B	
							   </option>    
							   <option value='Juru / I C' <?php if($hasil->pangkat==='Juru / I C'){echo 'selected';}?>>				
							      Juru / I C				
							   </option>    
							   <option value='Juru Tk I / I D' <?php if($hasil->pangkat==='Juru Tk I / I D'){echo 'selected';}?>>			
							      Juru Tk I / I D		
							   </option>    
							</optgroup>
							<optgroup label='Golongan II'>
								<option value='Pengatur Muda / II A' <?php if($hasil->pangkat==='Pengatur Muda / II A'){echo 'selected';}?>>			
								   Pengatur Muda / II A     	
								</option>
							   <option value='Pengatur Muda Tk I / II B' <?php if($hasil->pangkat==='Pengatur Muda Tk I / II B'){echo 'selected';}?>>	
							     Pengatur Muda Tk I / II B	
							   </option>   
							   <option value='Pengatur / II C' <?php if($hasil->pangkat==='Pengatur / II C'){echo 'selected';}?>>					
							      Pengatur / II C            
							   </option>
							   <option value='Pengatur Tk I / II D' <?php if($hasil->pangkat==='Pengatur Tk I / II D'){echo 'selected';}?>>			
							      Pengatur Tk I / II D    	
							   </option>
							</optgroup>
							<optgroup label='Golongan III'>
								<option value='Penata Muda / III A' <?php if($hasil->pangkat==='Penata Muda / III A'){echo 'selected';}?>>			
								   Penata Muda / III A     	
								</option>
								<option value='Penata Muda Tk I / III B' <?php if($hasil->pangkat==='Penata Muda Tk I / III B'){echo 'selected';}?>>		
								   Penata Muda Tk I / III B	
								</option>
								<option value='Penata / III C' <?php if($hasil->pangkat==='Penata / III C'){echo 'selected';}?>>					
								   Penata / III C            
								</option>
								<option value='Penata Tk I / III D' <?php if($hasil->pangkat==='Penata Tk I / III D'){echo 'selected';}?>>			
								   Penata Tk I / III D    	
								</option>
							</optgroup>
							<optgroup label='Golongan IV'>
                        <option value='Pembina / IV A' <?php if($hasil->pangkat==='Pembina / IV A'){echo 'selected';}?>>         
                           Pembina / IV A        
                        </option>
                        <option value='Pembina Tk I / IV B' <?php if($hasil->pangkat==='Pembina Tk I / IV B'){echo 'selected';}?>>    
                           Pembina Tk I / IV B   
                        </option>
                        <option value='Pembina Utama Muda / IV C' <?php if($hasil->pangkat==='Pembina Utama Muda / IV C'){echo 'selected';}?>>              
                           Pembina Utama Muda / IV C            
                        </option>
                        <option value='Pembina Utama Madya / IV D' <?php if($hasil->pangkat==='Pembina Utama Madya / IV D'){echo 'selected';}?>>        
                           Pembina Utama Madya / IV D     
                        </option>
                        <option value='Pembina Utama / IV E' <?php if($hasil->pangkat==='Pembina Utama / IV E'){echo 'selected';}?>>         
                           Pembina Utama / IV E     
                        </option>
                     </optgroup>
							</select>
						</div>
						<div id='cek_pangkat'>
							<?php echo form_error('pangkat'); ?>
						</div>
					</div>
				</div>
				
				<div class='control-group'>
					<label class='control-label' for='jabatan'>Jabatan</label>
					<div class='controls controls-row'>
					   <div class='span6'>
					      <select name='jabatan' id='jabatan' class='select2' style='width:100%;'>
					         <option></option>
					         <option value='Lektor' <?php if($hasil->jabatan==='Lektor'){echo 'selected';}?>>Lektor</option>
					         <option value='Lektor Kepala' <?php if($hasil->jabatan==='Lektor Kepala'){echo 'selected';}?>>Lektor Kepala</option>
					         <option value='Asisten Ahli' <?php if($hasil->jabatan==='Asisten Ahli'){echo 'selected';}?>>Asisten Ahli</option>
					      </select>
					   </div>
						<div id='cek_jabatan'>
							<?php echo form_error('jabatan'); ?>
						</div>
					</div>
				</div>
				
				<!--
				<div class='control-group'>
					<label class='control-label' for=''></label>
					<div class='controls controls-row'>
						<input type='text' name='' id='' class='required span12' >
						<div id=''>
							<?php echo form_error(''); ?>
						</div>
					</div>
				</div>
				-->
				
				<div class='form-actions'>
					<button type='submit' name='submit_dosen' id='submit_dosen' class='btn btn-primary'> 
						Ubah
					</button>
					<?php echo anchor ('dosennonif/add',form_button('back','Cancel','class="btn btn-danger"'));?>
				</div>
				
				</form>
		   </div>
		</div>
	</div>
   </div><!-- End .row-fluid -->
</div>
<!-- End .container-fluid -->
