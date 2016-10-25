<!DOCTYPE html>
<html lang="en">
	<head>
			<base href="<?php echo base_url()?>">
            <meta charset="utf-8" />
            <title> Penelitan dan Pengabdian</title>
            <meta name="description" content="" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />

            <!--basic styles-->

            <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
            <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="assets/css/font-awesome.min.css" />

            <!--[if IE 7]>
              <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
            <![endif]-->

            <!--page specific plugin styles-->

            <!--fonts-->
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

            <!--ace styles-->

            <link rel="stylesheet" href="assets/css/ace.min.css" />
            <link rel="stylesheet" href="assets/css/ace-responsive.min.css" />
            <link rel="stylesheet" href="assets/css/ace-skins.min.css" />

            <!--[if lte IE 8]>
              <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
            <![endif]-->

            <!--inline styles related to this page-->
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			
			<link rel="stylesheet" href="jquery/jquery-ui-1.8.20.custom.css" type="text/css" media="all"/> 
		    <script src="jquery/jquery-1.7.2.min.js" type="text/javascript"></script> 
		    <script src="jquery/jquery-ui-1.8.20.custom.min.js" type="text/javascript"></script> 
			
			
 
 </head>

	<body style class="navbar-fixed">
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a href="<?php echo site_url('c_jurusan')?>" class="brand">
						<small>
							<i class="icon-laptop"></i>
							Penelitian dan Pengabdian Dosen
                                                        Informatika
						</small>
					</a><!--/.brand-->

					<ul class="nav ace-nav pull-right">
						<li class="light-blue">
							<a class="dropdown-caret">
                                                            <i class="icon-user"></i>
								<?php echo $nama?>	
		
							</a>
						</li>
					</ul><!--/.ace-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>

		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar fixed" id="sidebar">
				<ul class="nav nav-list">
					<li>
						<a href="<?php echo site_url('c_jurusan')?>">
							<i class="icon-home"></i>
							<span class="menu-text"> Home </span>
						</a>
					</li>
		
					<li>
						<a href="<?php echo site_url('c_jurusan/dashboard')?>">
							<i class="icon-dashboard"></i>
							<span class="menu-text"> Dashboard </span>
						</a>
					</li>
					
					<li>
						<a href="<?php echo site_url('c_jurusan/view_penelitian')?>">
							<i class="icon-book"></i>
							<span class="menu-text"> Penelitian </span>
						</a>
					</li>

					<li>
						<a href="<?php echo site_url('c_jurusan/view_pengabdian')?>">
							<i class="icon-group"></i>
							<span class="menu-text"> Pengabdian </span>

						</a>
					</li>
					
					<li>
						<a href="#"class="dropdown-toggle">
							<i class="icon-cloud-upload"></i>
							<span class="menu-text"> Upload </span>

						</a>
						<ul class="submenu">
						 <li>
						   <a href="<?php echo site_url('c_jurusan/view_upload')?>">
							<i class="icon-double-angle-right"></i>
							Data Upload
						   </a>
						 </li>
						 
						 
						</ul>
					</li>
					
					<li>
						<a href="<?php echo site_url('c_jurusan/ubah_password')?>">
							<i class="icon-key"></i>
							<span class="menu-text">Ubah Password</span>
						</a>
					</li>

					<li>
						<a href="<?php echo site_url('c_login/keluar')?>">
							<i class="icon-circle-arrow-right"></i>
							<span class="menu-text"> Keluar </span>
						</a>
					</li>
				</ul><!--/.nav-list-->
			</div>

			<div class="main-content">
				<div class="page-content">
					<div class="page-header position-relative">
					<h1><?php echo $page_name?></h1>
				</div><!--/.page-header-->
				<div class="row-fluid">
					<div class="span12">
					<!--PAGE CONTENT BEGINS
					<form class="form-horizontal" />-->
						<div class="widget-box">
							<div class="widget-header header-color-dark">
								<h5 class="bigger lighter"><?php echo $box_name?></h5>
							</div>
							<div class="widget-body">
								<div class="widget-main padding-16">
								
									<?php $this->load->view($page)?> 
								
								</div>
							</div>
						</div>							
					</div>
				</div>
				
									
				</div><!--/.page-content-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->
                
            <!--basic scripts-->

            <!--[if !IE]>--

            <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

            <!--<![endif]-->

            <!--[if IE]>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
            <![endif]-->

            <!--[if !IE]>-->

            <script type="text/javascript">
                    window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
            </script>

            <!--<![endif]-->

            <!--[if IE]>
            <script type="text/javascript">
             window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
            </script>
            <![endif]-->

            <script type="text/javascript">
                    if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
            </script>
            <script src="assets/js/bootstrap.min.js"></script>

            <!--page specific plugin scripts-->
			<!--page specific plugin scripts
			<script src="assets/js/f.js"></script>-->
			<script src="assets/js/script.js"></script>
			
			<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
			<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
			<script src="assets/js/chosen.jquery.min.js"></script>
			<script src="assets/js/fuelux/fuelux.spinner.min.js"></script>
			<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>
			<script src="assets/js/date-time/bootstrap-timepicker.min.js"></script>
			<script src="assets/js/date-time/moment.min.js"></script>
			<script src="assets/js/date-time/daterangepicker.min.js"></script>
			<script src="assets/js/bootstrap-colorpicker.min.js"></script>
			<script src="assets/js/jquery.knob.min.js"></script>
			<script src="assets/js/jquery.dataTables.min.js"></script>
			<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
			<script src="assets/js/jquery.autosize-min.js"></script>
			<script src="assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
			<script src="assets/js/jquery.maskedinput.min.js"></script>
			<script src="assets/js/bootstrap-tag.min.js"></script>
            <!--ace scripts-->

            <script src="assets/js/ace-elements.min.js"></script>
            <script src="assets/js/ace.min.js"></script>

            <!--inline scripts related to this page-->
			<?php include 'fungsi.php'?>
			
	</body>
</html>
