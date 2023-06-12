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

    <!-- jQuery -->
  <script src="<?php echo $assets ?>plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo $assets ?>plugins/jquery-ui/jquery-ui.min.js"></script>

  <script src="<?php echo $assets ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
    <img src="<?php echo str_replace("/index.php","", base_url('assets/img/bg-login.png'))?>" width="404" height="100">
    <div class="login-card-body">

      <p class="login-box-msg" style="display:none"><?php echo lang('sign_in_session') ?></p>

      <?php echo form_open('/Login/check', ['method' => 'POST', 'autocomplete' => 'off']); ?>
      <?php if(!empty($captchaError)) {?>
      <div class="form-group col-12 text-center">
        <div class="alert text-center <?php echo $captchaError['status']; ?>">
          <?php echo $captchaError['message']; ?>
        </div>
      </div>
    <?php }?>
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

        <div class="input-group mb-3">

          <div class="row">
                 <div class="form-group col-6">
                   <label>Enter Captcha</label>
                   <input type="text" class="form-control" name="captcha" id="captcha">
                 </div>
                 <div class="form-group col-6">
                   <label>Captcha Code</label>
                   <img src="<?php echo $assets ?>plugins/captcha/captcha.php" alt="PHP Captcha">
                 </div>
               </div>

          <!-- <div id="html_element"></div> -->
          <!-- <div class="g-recaptcha" data-sitekey="6LdcBC0mAAAAAHwTiw1FooOXWX1DqVBCLxyOtoSy"></div> -->
          <!-- <?php echo form_error('g-recaptcha-response', '<span style="display:block" class="error invalid-feedback">', '</span>'); ?> -->
        </div>


      <!-- <?php if (setting('google_recaptcha_enabled') == '1'): ?> -->

      <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->



      <!-- <?php endif ?> -->

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
<div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Modal header</h3>
    </div>
    <div class="modal-body">
        <p>One fine body…</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
    </div>
</div>

    <div class="modal fade" id="modal-lg">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <div class="">
            <!-- Default card -->
            <a href="<?php echo $pemberitahuan[0]->url; ?>" target="_blank">
                  <img src="<?php echo url('/uploads/bannerpemberitahuan/'.$pemberitahuan[0]->lokasi_file);?>" style="width:100%;"alt=""/>
            </a>
        </div>

    </div>

  </div>
  <!-- /.modal-content -->



    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>

<script type="text/javascript">
<?php if(count($pemberitahuan)>0){ ?>
  $(window).on('load',function() {
    $('#modal-lg').modal('show');
});
<?php } ?>
</script>

<!-- <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
       async defer> -->
   <!-- </script> -->
<!-- AdminLTE App -->
<!-- <script src="<?php echo $assets ?>/js/adminlte.min.js"></script> -->

<!-- <script type="text/javascript">
     var onloadCallback = function() {
       grecaptcha.render('html_element', {
         'sitekey' : '6LdcBC0mAAAAAHwTiw1FooOXWX1DqVBCLxyOtoSy'
       });
     };
   </script> -->
<!-- <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script> -->

<script type="text/javascript">
var hours = new Date().getHours();
if (document.body) {
  if (5 <= hours && hours < 15) {
      document.body.style.backgroundImage = "url(<?php echo str_replace("/index.php","", base_url('assets/img/jakarta-pagi.jpg'))?>)";
  }
  else {
      document.body.style.backgroundImage = "url(<?php echo str_replace("/index.php","", base_url('assets/img/jakarta-night.jpg'))?>)";
  }
}
</script>
</body>
</html>
