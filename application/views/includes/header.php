<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="<?php echo getUserlang() ?>">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $page->title ?> | STRAKOM RENKIN </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf_token_name" content="<?php echo $this->security->get_csrf_token_name(); ?>" />
  <meta name="csrf_token_hash" content="<?php echo $this->security->get_csrf_hash(); ?>" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/toastr/toastr.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/jqvmap/jqvmap.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/summernote/summernote-bs4.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/select2/css/select2.min.css" />

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>css/adminlte.min.css">


  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>css/app.css">

  <!-- Google Font: Source Sans Pro -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->


<!-- jQuery -->
<script src="<?php echo $url->assets ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo $url->assets ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo $url->assets ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>
<body class="hold-transition sidebar-mini <?php echo isset($page->body_classes) ? $page->body_classes : 'layout-fixed' ?>">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

  <!-- Left navbar links -->
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->

      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?php echo count(getNewNotif()); ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?php echo count(getNewNotif()); ?> <?php echo lang('notifications') ?></span>
          <?php
          $new_notif = getNewNotif();
          for($i=0;$i<count(getNewNotif());$i++){
            if($i<3){
            echo '
            <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <p>'.$new_notif[$i]->judul_notifikasi.'</p>
            <span class="float-right text-muted text-sm">'.getTimeAgo($new_notif[$i]->created_date).'</span>
          </a>
            ';
            }
          }
          ?>
          <div class="dropdown-divider"></div>
          <a href="<?php echo url('Dashboard/notification') ?>" class="dropdown-item dropdown-footer"><?php echo lang('see_all_notifications') ?></a>
        </div>
      </li>
      
      <!-- User Account: style can be found in dropdown.less -->
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="<?php echo userProfile(logged('id')) ?>" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline"><?php echo logged('name') ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="<?php echo userProfile(logged('id')) ?>" class="img-circle elevation-2" alt="User Image">

            <p>
              <?php echo logged('name') ?>
              <!-- <small>Member since Nov. 2012</small> -->
            </p>
          </li>
          <!-- Menu Body -->
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="<?php echo url('profile') ?>" class="btn btn-default btn-flat"><?php echo lang('profile') ?></a>
            <a href="<?php echo url('/logout') ?>" class="btn btn-default btn-flat float-right"><?php echo lang('signout') ?></a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo url('/') ?>" class="brand-link">

      <span class="brand-text font-weight-light"><center>STRAKOM RENKIN</center></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <?php include 'nav_new.php' ?>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <?php include 'notifications.php'; ?>
