<!DOCTYPE html>
<html lang="en">
<head>
	 <title>Login - Dashboard Open Data Jakarta</title>
     <link rel="shortcut icon" href="<?php echo base_url('ASSETS/ckan.ico')?>" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('ASSETS')?>/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('ASSETS')?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('ASSETS')?>/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('ASSETS')?>/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('ASSETS')?>/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('ASSETS')?>/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('ASSETS')?>/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('ASSETS')?>/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('ASSETS')?>/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('ASSETS')?>/css/mainlogin.css">
<!--===============================================================================================-->
 <link rel="stylesheet" href="<?php echo base_url('ASSETS')?>/plugins/iCheck/square/blue.css">
<style>
#popup_this {
    top: 20%;
    left: 20%;
    text-align:center;
    margin-top: -50px;
    margin-left: -50px;
    position: fixed;
    background: #fff;
    padding: 30px;
}
.b-close {
    position: absolute;
    right: 0;
    top: 0;
    cursor: pointer;
    color: #fff;
    background: #ff0000;
    padding: 5px 10px;
}
.img-responsive {
    max-width: 50%;
    display:block;
    height: auto;
}
</style>
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
         <div id="popup_this">
         <span class="button b-close"><span>X</span></span>
             <img src="https://jakita.jakarta.go.id/media/share/upload/banner/images_banner.jpg" alt="">
	     <img src="https://jakita.jakarta.go.id/media/share/upload/banner/images_banner.jpeg" alt="">
	     <img src="https://jakita.jakarta.go.id/media/share/upload/banner/images_banner.png" alt="">
         </div>
         <p class="login-box-msg"></p>

    <?php if($this->session->flashdata('login')){?>
            <div class="alert alert-danger" role="alert">
              <b>Gagal Login !</b><br /><?php echo $this->session->flashdata('login');?>
            </div>
    <?php }?>
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(<?php echo base_url();?>ASSETS/images/bg-login.jpeg);">

				</div>

				<form class="login100-form validate-form" action="" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    	<!--<span class="label-input100">Username</span>-->
						<input required="required" name="username" placeholder="Entry Username"><br />
						<span  class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                    <br />
						<!--<span class="label-input100">Password</span>-->
						<input type="password" required="required" name="password" placeholder="Entry Password">
						<span class="focus-input100"></span>
					</div>


					<div class="container-login100-form-btn">
						   <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                	</div>
				</form>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="<?php echo base_url('ASSETS')?>/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('ASSETS')?>/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('ASSETS')?>/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url('ASSETS')?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('ASSETS')?>/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('ASSETS')?>/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url('ASSETS')?>/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('ASSETS')?>/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('ASSETS')?>/js/mainlogin.js"></script>

<!-- jQuery 3 -->
<script src="<?php echo base_url('ASSETS')?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('ASSETS')?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url('ASSETS')?>/plugins/iCheck/icheck.min.js"></script>
 <script src="<?php echo base_url('ASSETS')?>/js/jquery.bpopup.min.js"></script>
    <script>
    $( document ).ready(function() {
        $('#popup_this').bPopup();
    });
    </script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
