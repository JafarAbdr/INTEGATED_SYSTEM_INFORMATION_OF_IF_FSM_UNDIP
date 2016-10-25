<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Sistem Informasi Perkuliahan</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="SuggeElson" />
      <meta name="description" content="Genyx admin template - new premium responsive admin template. This template is designed to help you build the site administration without losing valuable time.Template contains all the important functions which must have one backend system.Build on great twitter boostrap framework" />
      <meta name="keywords" content="admin, admin template, admin theme, responsive, responsive admin, responsive admin template, responsive theme, themeforest, 960 grid system, grid, grid theme, liquid, jquery, administration, administration template, administration theme, mobile, touch , responsive layout, boostrap, twitter boostrap" />
      <meta name="application-name" content="Genyx admin template" />
      <!-- Headings -->
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700' rel='stylesheet' type='text/css'>
      <!-- Text -->
      <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' />
      <!--[if lt IE 9]> <link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" /> <link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" /> 
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet" type="text/css" /> 
		<link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" /> 
		<link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" /> <![endif]-->
      <!-- Core stylesheets do not remove -->
      <link href="<?php echo base_url('assets/css/bootstrap/bootstrap.css');?>" rel="stylesheet" />
      <link href="<?php echo base_url('assets/css/bootstrap/bootstrap-responsive.css');?>" rel="stylesheet" />
      <link href="<?php echo base_url('assets/css/icons.css')?>" rel="stylesheet" />
      <!-- Plugins stylesheets -->
      <link href="<?php echo base_url('assets/js/plugins/forms/uniform/uniform.default.css')?>" rel="stylesheet" />
      <!-- app stylesheets -->
      <link href="<?php echo base_url('assets/css/app.css');?>" rel="stylesheet" />
      <!-- Custom stylesheets ( Put your own changes here ) -->
      <link href="<?php echo base_url('assets/css/custom.css')?>" rel="stylesheet" />
		<link href="<?php echo base_url('js/plugins/ui/jgrowl/jquery.jgrowl.css')?>" rel="stylesheet" />
      <!--[if IE 8]><link href="css/ie8.css" rel="stylesheet" type="text/css" /><![endif]-->
      <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
      <!--[if lt IE 9]> </script><script src="js/html5shiv.js"></script></script> <![endif]-->
      <!-- Fav and touch icons -->
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('assets/images/ico/apple-touch-icon-144-precomposed.png');?>">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('assets/images/ico/apple-touch-icon-114-precomposed.png');?>">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('assets/images/ico/apple-touch-icon-72-precomposed.png')?>">
      <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('assets/images/ico/apple-touch-icon-57-precomposed.png')?>">
      <link rel="shortcut icon" href="<?php echo base_url('assets/images/ico/favicon.html')?>">
      <!-- Le javascript ================================================== -->
      <!-- Important plugins put in all pages -->
      <script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js')?>"></script>
      <script src="<?php echo base_url('assets/js/jquery-ui.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap/bootstrap.js')?>"></script>
      <script src="<?php echo base_url('assets/js/conditionizr.min.js')?>"></script>
      <script src="<?php echo base_url('assets/js/plugins/core/nicescroll/jquery.nicescroll.min.js')?>"></script>
      <script src="<?php echo base_url('assets/js/plugins/core/jrespond/jRespond.min.js')?>"></script>
      <script src="<?php echo base_url('assets/js/jquery.genyxAdmin.js')?>"></script>
      <!-- Form plugins -->
      <script src="<?php echo base_url('assets/js/plugins/forms/uniform/jquery.uniform.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/validation/jquery.validate.js')?>"></script>
      <!-- Init plugins -->
      <script src="<?php echo base_url('assets/js/app.js')?>"></script><!-- Core js functions -->
      <script src="<?php echo base_url('assets/js/pages/domready.js')?>"></script><!-- Init plugins only for page -->
		<script src="<?php echo base_url('assets/js/plugins/ui/jgrowl/jquery.jgrowl.min.js')?>"></script>
		<style>
			noscript div {
			background-color: #FFF5C7;
			color: black;
			font-family:"lucida grande",tahoma,verdana,arial,sans-serif;
			font-weight:700;
			display: table-cell;
			width: 1200px;
			height: 30px;
			text-align: center;
			vertical-align: middle;
			}
			a { color:3B5998; vertical-align: middle;} 
		</style>
   </head>
<body>
		<header id="header" class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="brand" href="#"><img src="<?php echo base_url('assets/images/logoundip2.png')?>" alt="Ilkom Undip"></a>
					<div class="nav-no-collapse">
						<ul class="nav pull-right">
							<li class="divider-vertical"></li>
							<li class="dropdown user">
								<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="<?php echo base_url('assets/images/gravatar.jpg')?>" alt="Ilkom Undip"><span class="more"></span> 
								<span><?php 
										echo $this->session->userdata('nama_user');
									?></span>
									<i class="icon16 i-arrow-down-2"></i>
								</a>
								<ul class="dropdown-menu">
									<?php 
										$lvl = $this->session->userdata('level');
										if($lvl == 1):
									?>
									<li>
										<a href="<?php echo site_url('home/edit_date');?>" class=""><i class="i-calendar-5"></i> Set Date </a>
									</li>
									<?php endif;?>
									<?php 
										$lvl = $this->session->userdata('level');
										if($lvl == 2):
									?>
									<li>
										<a href="<?php echo site_url('pimpinan');?>" class=""><i class="i-user-7"></i> Set Pimpinan </a>
									</li>
									<?php endif;?>
									<li <?php
										if ($sub == 9){
											echo 'class=""';
										}
									?>>
										<a href="<?php echo site_url('home/edit_profile');?>" class=""><i class="icon-user"></i> Settings </a> <!--isinya form edit username and password-->
									</li>
									<li>
										<a href="<?php echo site_url('home/logout');?>" class=""><i class="icon-off"></i> Logout </a>
									</li>
								</ul>
							</li>
							<li class="divider-vertical"></li>
						</ul>
						<ul class="nav pull-right">
							<?php
								$lvl = $this->session->userdata('level');
								if(($lvl == 1)||($lvl == 2)){
								$auto_date = $this->session->userdata('auto_date');
								$thn_ajar = $this->session->userdata('thn_ajar');
								$semester = $this->session->userdata('semester');
								if($auto_date){
									echo '<p style="color:white">DATE : auto <br>'. $thn_ajar.' '.$semester.'&nbsp&nbsp</style>';
								}else{
									echo '<p style="color:white">DATE : manual &nbsp<br>'. $thn_ajar.' '.$semester.'</style>';
								}
								}
							?>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</header>
		<!-- End #header -->
		<div class="main">
			<aside id="sidebar">
				<div class="side-options">
					<ul>
						<li>
							<a href="#" id="collapse-nav" class="act act-primary tip" title="Collapse navigation"><i class="icon16 i-arrow-left-7"></i></a>
						</li>
					</ul>
				</div>
				<div class="sidebar-wrapper">
					<nav id="mainnav">
						<ul class="nav nav-list">
							<li <?php
									if ($sub == 0){
										echo 'class="current"';
									}else{
										echo 'class=""';
									}
								?>>
								<a class="tables" href="<?php echo site_url('home');?>"> <span class="icon"><i class="icon-home"></i></span> <span class="txt">Home</span> </a>
							</li>
							<?php 
							$lvl = $this->session->userdata('level');
							if(($lvl == 1)||($lvl == 2)){
							?>
							<li <?php
									if ($sub == 1){
										echo 'class="hasSub current"';
									}else if($sub == 2){
										echo 'class="hasSub current"';
									}else if($sub == 3){
										echo 'class="hasSub current"';
									}else if($sub == 4){
										echo 'class="hasSub current"';
									}else if($sub == 5){
										echo 'class="hasSub current"';
									}else if($sub == 6){
										echo 'class="hasSub current"';
									}else if($sub == 7){
										echo 'class="hasSub current"';
									}else if($sub == 8){
										echo 'class="hasSub current"';
									}else if($sub == 11){
										echo 'class="hasSub current"';
									}else{
										echo 'class="hasSub"';
									}
								?>>
								<a href="#"> <span class="icon"><i class="icon-pencil"></i></span> <span class="txt">Kelola Data</span> </a>
								<ul <?php
									if ($sub == 1){
										echo 'class="sub expand show"';
									}else if($sub == 2){
										echo 'class="sub expand show"';
									}else if($sub == 3){
										echo 'class="sub expand show"';
									}else if($sub == 4){
										echo 'class="sub expand show"';
									}else if($sub == 5){
										echo 'class="sub expand show"';
									}else if($sub == 6){
										echo 'class="sub expand show"';
									}else if($sub == 7){
										echo 'class="sub expand show"';
									}else if($sub == 8){
										echo 'class="sub expand show"';
									}else if($sub == 11){
										echo 'class="sub expand show"';
									}else{
										echo 'class="sub"';
									}
								?>>
									<?php 
										$lvl = $this->session->userdata('level');
										if($lvl == 2){
									?>
									<li <?php
												if ($sub == 1){
													echo 'class="current"';
												}else{
													echo 'class=""';
												}
											?>>
										<a href="<?php echo site_url('matakuliah');?>"> <span class="icon"><i class=""></i></span> <span class="txt">Mata Kuliah</span> </a>
									</li>
									<li <?php
												if ($sub == 8){
													echo 'class="current"';
												}else{
													echo 'class=""';
												}
											?>>
										<a href="<?php echo site_url('ruang');?>"> <span class="icon"><i class=""></i></span> <span class="txt">Ruang</span> </a>
									</li>
									<li >
										<a href="#"> <span class="icon"><i class=""></i></span> <span class="txt">Dosen</span> </a>
										<ul <?php
												if ($sub == 2){
													echo 'class="sub expand show"';
												}else if ($sub == 7){
													echo 'class="sub expand show"';
												}else{
													echo 'class="sub"';
												}
											?>>
											<li <?php
														if ($sub == 2){
															echo 'class="current"';
														}else{
															echo 'class=""';
														}
													?>>
												<a href="<?php echo site_url('dosenif');?>"> <span class="icon"><i class=""></i></span> <span class="txt">Dosen IF</span> </a>
											</li>
											<li <?php
														if ($sub == 7){
															echo 'class="current"';
														}else{
															echo 'class=""';
														}
													?>>
												<a href="<?php echo site_url('dosennonif');?>"> <span class="icon"><i class=""></i></span> <span class="txt">Dosen Non IF</span> </a>
											</li>
										</ul>
									</li>
									<?php }?>
									<?php 
										$lvl = $this->session->userdata('level');
										if($lvl == 1){
									?>
									<li <?php
												if ($sub == 3){
													echo 'class="current"';
												}else{
													echo 'class=""';
												}
											?>>
										<a href="<?php echo site_url('pengampu');?>"> <span class="icon"><i class=""></i></span> <span class="txt">Daftar Pengampu</span> </a>
									</li>
									<li >
										<a href="#"> <span class="icon"><i class=""></i></span> <span class="txt">Jadwal</span> </a>
										<ul <?php
												if ($sub == 4){
													echo 'class="sub expand show"';
												}else if ($sub == 11){
													echo 'class="sub expand show"';
												}else if ($sub == 6){
													echo 'class="sub expand show"';
												}else{
													echo 'class="sub"';
												}
											?>>
											<li <?php
												if ($sub == 4){
													echo 'class="current"';
												}else{
													echo 'class=""';
												}
												?>>
												<a href="<?php echo site_url('jadwalkuliah/add');?>"> <span class="icon"><i class=""></i></span> <span class="txt">Jadwal Kuliah</span> </a>
											</li>
											<li <?php
												if ($sub == 11){
													echo 'class="current"';
												}else{
													echo 'class=""';
												}
												?>>
												<a href="<?php echo site_url('jadwalujian/add');?>"> <span class="icon"><i class=""></i></span> <span class="txt">Jadwal Ujian</span> </a>
											</li>
										</ul>
									</li>
									<?php }?>
									<li>
										<a href="#"> <span class="icon"><i class=""></i></span> <span class="txt">Beban Mengajar</span> </a>
										<ul <?php
												if ($sub == 5){
													echo 'class="sub expand show"';
												}else if ($sub == 6){
													echo 'class="sub expand show"';
												}else{
													echo 'class="sub"';
												}
											?>>
											<li <?php
													if ($sub == 5){
														echo 'class="current"';
													}else{
														echo 'class=""';
													}
												?>>
												<a href="<?php echo site_url('beban_non_if/add');?>"> <span class="icon"><i class=""></i></span> <span class="txt">Beban Non IF</span> </a>
											</li>
											<li <?php
													if ($sub == 6){
														echo 'class="current"';
													}else{
														echo 'class=""';
													}
												?>>
												<a href="<?php echo site_url('beban_non_fsm/add');?>"> <span class="icon"><i class=""></i></span> <span class="txt">Beban Non FSM</span> </a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<?php }?>
							<li <?php
									if ($sub == 13){
										echo 'class="current"';
									}else{
										echo 'class=""';
									}
								?>>
								<a class="tables" href="<?php echo site_url('hitungbeban');?>"> <span class="icon"><i class="icon-bullhorn"></i></span> <span class="txt">Perhitungan Beban</span> </a>
							</li>
							<li <?php
									if ($sub == 14){
										echo 'class="hasSub current"';
									}else if ($sub == 10){
										echo 'class="hasSub current"';
									}else if ($sub == 15){
										echo 'class="hasSub current"';
									}else if ($sub == 16){
										echo 'class="hasSub current"';
									}else{
										echo 'class=""';
									}
								?>>
								<a href="#"> <span class="icon"><i class="icon-print"></i></span> <span class="txt">Report</span> </a>
								<ul <?php
										if ($sub == 14){
											echo 'class="sub expand show"';
										}else if ($sub == 10){
											echo 'class="sub expand show"';
										}else if ($sub == 15){
											echo 'class="sub expand show"';
										}else if ($sub == 16){
											echo 'class="sub expand show"';
										}else{
											echo 'class="sub"';
										}
									?>>
                           
						   <li <?php
											if ($sub == 10){
												echo 'class="current"';
											}else{
												echo 'class=""';
											}
										?>>
                              <a href="<?php echo site_url('report/jadwalkuliah')?>"> <span class="icon"><i class=""></i></span> <span class="txt">Jadwal Kuliah</span> </a>
                           </li>
						   <li <?php
											if ($sub == 16){
												echo 'class="current"';
											}else{
												echo 'class=""';
											}
										?>>
                              <a href="<?php echo site_url('report/jadwalujian')?>"> <span class="icon"><i class=""></i></span> <span class="txt">Jadwal Ujian</span> </a>
                           </li>
						   <li <?php
											if ($sub == 14){
												echo 'class="current"';
											}else{
												echo 'class=""';
											}
										?>>
                              <a href="<?php echo site_url('report/SKDekan')?>"> <span class="icon"><i class=""></i></span> <span class="txt">SK Dekan</span> </a>
                           </li>
									<li <?php
											if ($sub == 15){
												echo 'class="current"';
											}else{
												echo 'class=""';
											}
										?>>
                              <a href="<?php echo site_url('report/SKKelebihan')?>"> <span class="icon"><i class=""></i></span> <span class="txt">SK Kelebihan </span> </a>
                           </li>
								</ul>
							</li>
						</ul>
					</nav>
					<!-- End #mainnav -->
				</div>
				<!-- End .sidebar-wrapper -->
			</aside><!-- End #sidebar -->
			<section id="content">
				<div class="wrapper">
					<?php echo $main_content; ?>
					<!-- End .container-fluid -->
				</div>
				<!-- End .wrapper -->
			</section>
		</div><!-- End .main -->
	</body>
</html>