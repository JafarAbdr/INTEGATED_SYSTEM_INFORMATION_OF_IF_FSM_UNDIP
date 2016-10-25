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
<!--[if lt IE 9]> <link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" /> <link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" /> <link href="http://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet" type="text/css" /> <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" /> <link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" /> <![endif]-->
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
<script type="text/javascript" src="<?php echo base_url('../ASSET_TOGETHER_FOR_ALL/js/jquery/jquery.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap/bootstrap.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/conditionizr.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/core/nicescroll/jquery.nicescroll.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/core/jrespond/jRespond.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.genyxAdmin.js')?>"></script>
<!-- Form plugins -->
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/uniform/jquery.uniform.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/validation/jquery.validate.js')?>"></script>
<!-- Init plugins -->
<script type="text/javascript" src="<?php echo base_url('assets/js/app.js')?>"></script>
<!-- Core js functions -->
<script type="text/javascript" src="<?php echo base_url('assets/js/pages/login.js')?>"></script>
<!-- Init plugins only for page -->
</head>
<body bgcolor="#E6E6FA">
<div class="container-fluid">
  <div id="login">
    <div class="login-wrapper" data-active="log"><img src="" alt=""></a>
      <div id="log">
        <div id=""> <img src="" alt=""> </div>
        <div class="page-header">
          <h3 class="center">Sistem Informasi Perkuliahan</h3>
        </div>
        <?php
			echo form_open('home/reset_password');
			echo validation_errors();
		?>
          <div class="row-fluid">
            <!-- End .control-group -->
            <div class="control-group">
              <div class="controls-row">
				Silahkan Masukkan akun email yang Anda pakai. Password baru akan di kirim ke email Anda. </br>
              </div>
            </div>
          </div>
		  <div class="row-fluid">
            <!-- End .control-group -->
            <div class="control-group">
              <div class="controls-row">
				
                <div class="icon"><i class="icon20 i-envelop-2"></i></div>
                <input class="span12" type="email" name="email" placeholder="Masukkan Email" value="">
              </div>
            </div>
			<font color = "red"><?php echo $pesan;?></font>	
            <div class="form-actions full">
			  <button type="submit" class="btn btn-primary pull-right span5" value="update" name="save">Kirim</button>
            </div>
          </div>
          <!-- End .row-fluid -->
        <?php echo form_close();?>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
</body>
</html>