<?php
defined('BASEPATH') OR exit('What Are You Looking For ?');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ghost Informathics | Masuk</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url();?>resources/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>resources/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url();?>resources/plugins/iCheck/square/blue.css">
	<link rel="sortcut icon" href="resources/mystyle/image/ghost.jpg">
	<script>
	<?php
	if($backtobaseroom){
		echo "var baseroomGoNow = true;";
		echo "var baseroomGoTarget = '".base_url()."';";
	}else{
		echo "var baseroomGoNow = false;";
	}
	
		echo "var base_url = '".base_url()."';";
	?>
	</script>
	<?php
		for($i=0;array_key_exists($i,$url_link);$i++)
			echo link_tag($url_link[$i]); 
	?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->
  </head>
  <body class="">
    <div class="login-box">
      <div class="login-logo">
        <a class="white-blur"><b>CORE</b> - INFORMATIKA</a>
      </div><!-- /.login-logo -->
      <div id="signInLayout"  class="login-box-body">
        <p class="login-box-msg">Login as Member</p>
        <form target='frame-layout' id="masuk-form-validation" action="<?php echo htmlspecialchars(base_url()."Gateinout/getSignIn.aspx");?>" method="post" >
          <div class="form-group has-feedback">
          	<div>
          		
          	</div>
            <select class="form-control" id="login-akun" name="login-akun" placeholder="pilih hak akses">
            	<option value="mhs" selected>Student</option>
            	<option value="emp" selected>Employee</option>
            	<option value="ghs">Ghost</option>
            </select>
          </div>
          <div class="form-group has-feedback">
          <div></div>
            <input type="text" class="form-control" id="login-nim" name="login-nim" placeholder="Nim/Nip/User name">
            <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
          	<div></div>
            <input type="password" class="form-control" placeholder="Password" id="login-password" name="login-password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
          <div class="col-xs-8">
          <!-- 
              <div class="checkbox icheck">
                <label >
                  <input type="checkbox"> Ingatkan saya
                </label>
              </div>
              -->
            </div><!-- /.col -->
           
            <div class="col-xs-4">
              <button type="button" class="btn btn-primary btn-block btn-flat" id="login-exe">Login</button>
            </div><!-- /.col -->
          </div>
        </form>
        <a class="text-center pointer" data-toggle="modal" data-target="#user-forgot">forget password</a><br>
      </div>  
      <p class="login-box-msg"><a class="text-center pointer" id="panduan-style" data-toggle="modal" data-target="#user-panduan">panduan</a></p>
    </div>
    
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url();?>resources/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url();?>resources/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url();?>resources/plugins/iCheck/icheck.min.js"></script>
    
	<?php
		for($i=0;array_key_exists($i,$url_script);$i++)
			echo "<script type='text/javascript' src='".base_url().$url_script[$i]."'></script>";
	?>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    
  <div class="modal fade" id="user-term" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title center">Peraturan</h4>
        </div>
        <div class="modal-body">
          <h3>Peraturan yang berlaku sebelum anda melakukan daftar akun</h3>
          <div>
			<p>Sisi Pendidikan</p>
			<ol>
				<li>Anda mengambal mata kuliah tugas akhir</li>
				<li>Berlaku untuk TA lama, TA baru</li>
				<li>Gunakan data yang valid dan terdaftar pada akademik institusi</li>
				<li>Dilarang mendaftarkan akun yang bukan akun anda</li>
				<li>Lakukan sesuai dengan grade kuliah anda terhadap sistem ini</li>
			</ol>
			<p>Sisi Developer</p>
			<ol>
				<li>Jangan melakukan hhal yang diluar akal logika pada segala macam proses yang terjadi pada sistem</li>
				<li>Sangat mendukung banyak umpan balik, agar sistem lebih nyaman digunakan</li>
				<li>Melakukan tindakan yang diluar developer merupakan pelanggaran tanpa seizin pihak institusi</li>
			</ol>
          </div>
        </div>
        <div class="modal-footer bottom-space">
        </div>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="user-forgot" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title center">Forget Password</h4>
        </div>
        <div class="modal-body">
			
        </div>
        <div class="modal-footer bottom-space">
        </div>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="user-alert" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title center">Attention</h4>
        </div>
        <div class="modal-body" id="user-alert-message">
			
        </div>
        <div class="modal-footer bottom-space">
        	<button class="btn btn-primary btn-flat" data-dismiss='modal' id="user-alert-close" >Tutup</button>
        </div>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="user-panduan" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title center">Panduan</h3>
        </div>
        <div class="modal-body">
			<div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h5 class="center">Dosen login :</h5>
					</div>
					<div class="panel-body">
						<ol>
							<li>pilih kategori dosen </li>
							<li>Masukan Nip yang didaftarkan sebagai username</li>
							<li>Masukan Password yang didaftarkan</li>
							<li>Pilih masuk</li>
						</ol>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h5 class="center">Dosen daftar :</h5>
					</div>
					<div class="panel-body">
						<ol>
							<li>hubungi admin if, di ruang jurusan </li>
							<li>berikan nip, email dan nama anda</li>
							<li>saat sudah selesai akan kami kirimkan pesan konfirmasi ke email anda</li>
							<li>Dalam waktu 24 jam jika akun tidak di konfirmasi, akan siste hapus secara auto</li>
						</ol>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h5 class="center">Mahasiswa login(belum diintegrasikan) :</h5>
					</div>
					<div class="panel-body">
						<ol>
							<li>pilih kategori mahasiswa </li>
							<li>Masukan Nim yang didaftarkan sebagai username</li>
							<li>Masukan Password yang didaftarkan</li>
							<li>Pilih masuk</li>
						</ol>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h5 class="center">Mahasiswa daftar :(belum diintegrasikan)</h5>
					</div>
					<div class="panel-body">
						<ol>
							<li>Klik ingin mendaftar pada halaman utama</li>
							<li>Lengkapi form yang tersedi . (Semua wajib dilengkapi termasuk foto diri dan krs)</li>
							<li>Masukan Password yang didaftarkan</li>
							<li>Berhasil</li>
						</ol>
					</div>
				</div>
			</div>
        </div>
        <div class="modal-footer bottom-space">
        </div>
      </div>
      
    </div>
  </div>
      <footer>
        <div class="pull-right hidden-xs">
          <b>Version</b> 3.0.1 Beta
        </div>
        <strong>Copyright &copy; 2014-<?php echo DATE('Y')?> <a>Jaserv Studio</a>.</strong> All rights reserved.
      </footer>
      <div class="background-page">
      	<div class="layer-background-page"></div>
      	<div class="image-background-page"></div>
      </div>
      <iframe class="hidden" id="frame-layout" name="frame-layout"></iframe>
  </body>
</html>
