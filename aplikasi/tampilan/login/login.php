<?php
defined('FOLDER_INDEX') OR exit('Halaman Yang Anda Akses Tidak Ditemukan');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Halaman Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo URL;?>/assets/login/img/icon.ico" type="image/x-icon"/>
	<link href="<?php echo URL;?>/themes/inspinia/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL;?>/themes/inspinia/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo URL;?>/themes/inspinia/css/animate.css" rel="stylesheet">
    <link href="<?php echo URL;?>/themes/inspinia/css/style.css" rel="stylesheet">

	<!-- Fonts and icons -->
	<script src="<?php echo URL;?>/assets/login/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo URL;?>/assets/login/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo URL;?>/assets/login/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo URL;?>/assets/login/css/atlantis.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login wrapper-login-full p-0">
		<div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
			<h1 class="title fw-bold text-white mb-3">Halaman Login</h1>
			<p class="subtitle text-white op-7">Jika anda adalah User/Staff Silahkan Login melalui Tombol Ini !</p>
			<button class="btn btn-primary  dim btn-large-dim" type="button" onclick="window.location.href = '<?php echo URL;?>/aplikasi/tampilan/univrab/';">LOGIN</button>
		</div>
		<div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
		
		<form action="" method="post" autocomplete="off">
			<div class="container container-login container-transparent animated fadeIn">
				<?php
				if($error==1){
				
				echo "Error! Username atau Password Anda Salah";
				
				}		
				?>
				<h3 class="text-center">Login</h3>
				<div class="login-form">
					<div class="form-group">
						<label for="username" class="placeholder"><b>Username</b></label>
						<input id="username" name="username" type="text" class="form-control" placeholder="Username" required>
					</div>
					<div class="form-group">
						<label for="password" class="placeholder"><b>Password</b></label>
			
						<div class="position-relative">
							<input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
							<div class="show-password">
								<i class="icon-eye"></i>
							</div>
						</div>
					</div>
					<div class="form-group form-action-d-flex mb-3">
						<div class="custom-control custom-checkbox">
							
						</div>
		
						<input type="submit" name="btnLogin" class="btn btn-secondary col-md-5 float-right mt-3 mt-sm-0 fw-bold" value="Log In" required>
					</div>
					
				</div>
			</div>
		</form>
		</div>
	</div>
	<script src="<?php echo URL;?>/assets/login/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo URL;?>/assets/login/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo URL;?>/assets/login/js/core/popper.min.js"></script>
	<script src="<?php echo URL;?>/assets/login/js/core/bootstrap.min.js"></script>
	<script src="<?php echo URL;?>/assets/login/js/atlantis.min.js"></script>
	 <script src="<?php echo URL;?>/themes/inspinia/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo URL;?>/themes/inspinia/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>/themes/inspinia/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo URL;?>/themes/inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo URL;?>/themes/inspinia/js/inspinia.js"></script>
    <script src="<?php echo URL;?>/themes/inspinia/js/plugins/pace/pace.min.js"></script>
</body>
</html>