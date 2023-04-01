<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Strakom</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $assets ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo $assets ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $assets ?>/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition <?php echo !isset($body_classes)?'login-page':$body_classes ?>">


<div >
  <div class="login-logo" style="display:none">
    <a href="<?php echo url('/') ?>"><?php echo setting('company_name') ?></a>
  </div>
  <?php if(isset($message)): ?>
      <div class="alert alert-<?php echo $message_type ?>">
        <p><?php echo $message ?></p>
      </div>
    <?php endif; ?>

    <?php if(!empty($this->session->flashdata('message'))): ?>
      <div class="alert alert-<?php echo $this->session->flashdata('message_type'); ?>">
        <p><?php echo $this->session->flashdata('message') ?></p>
      </div>
    <?php endif; ?>
  <!-- /.login-logo -->
  <div class="" style="width:400px;">
    <img src="<?php echo base_url('assets/img/bg-login.png')?>" width="404" height="100">
    <div class="login-card-body">

      <p class="login-box-msg" style="display:none"><?php echo lang('sign_in_session') ?></p>

      <?php echo form_open('/login/check', ['method' => 'POST', 'autocomplete' => 'off']); ?>
      <div class="input-group mb-3">
          <input type="text" name="username" required class="form-control" placeholder="<?php echo lang('username_or_email') ?>" value="<?php echo post('username') ?>" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <?php echo form_error('username', '<span style="display:block" class="error invalid-feedback">', '</span>'); ?>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" required class="form-control" placeholder="<?php echo lang('user_password') ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <?php echo form_error('password', '<span style="display:block" class="error invalid-feedback">', '</span>'); ?>
        </div>

      <?php if (setting('google_recaptcha_enabled') == '1'): ?>

      <script src="https://www.google.com/recaptcha/api.js" async defer></script>

      <div class="form-group">
        <div class="g-recaptcha" data-sitekey="<?php echo setting('google_recaptcha_sitekey') ?>"></div>
        <?php echo form_error('g-recaptcha-response', '<span style="display:block" class="error invalid-feedback">', '</span>'); ?>
      </div>

      <?php endif ?>

      <div class="row">
        <div class="col-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" <?php echo post('remember_me')?'checked':'' ?> name="remember_me" /> Ingat Saya
            </label>
          </div>
        </div>
        <!-- /.col -->

        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close(); ?>


      <p class="mb-1" style="display:none">
        <a href="<?php echo url('login/forget?username='.post('username')) ?>"><?php echo lang('forget_password_?') ?></a><br>
      </p>
      <p class="mb-0">
        <!-- <a href="register.html" class="text-center">Register a new membership</a> -->
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


<!-- jQuery -->
<script src="<?php echo $assets ?>/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $assets ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $assets ?>/js/adminlte.min.js"></script>


<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script type="text/javascript">
var hours = new Date().getHours();
if (document.body) {
  if (5 <= hours && hours < 15) {
      document.body.style.backgroundImage = "url(<?php echo base_url('assets/img/jakarta-pagi.jpg')?>)";
  }
  else {
      document.body.style.backgroundImage = "url(<?php echo base_url('assets/img/jakarta-night.jpg')?>)";
  }
}
</script>
</body>
</html>
