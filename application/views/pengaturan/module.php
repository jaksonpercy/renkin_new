<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pengaturan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item active">Pengaturan</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="row">

    <div class="col-sm-3">

      <?php include 'sidebar.php'; ?>

    </div>
    <div class="col-sm-9">

      <!-- Default card -->
      <div class="card">

        <div class="card-header with-border">
          <h3 class="card-title">Module Settings</h3>
        </div>

        <?php echo form_open_multipart('settings/companyUpdate', [ 'class' => 'form-validate', 'autocomplete' => 'off', 'method' => 'post' ]); ?>
        <div class="card-body">

          <div class="form-group">
            <label for="formSetting-Company-Name">Link Paparan Renkin</label>
            <input type="text" class="form-control" name="paparan_renkin" id="formSetting-Company-Name" value="https://drive.google.com" required placeholder="<?php echo lang('settings_company_name') ?>" autofocus />
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-flat btn-primary"><?php echo lang('submit') ?></button>
        </div>
        <!-- /.card-footer-->

        <?php echo form_close(); ?>

      </div>
      <!-- /.card -->

    </div>
  </div>

</section>
<!-- /.content -->

<script>
  $(document).ready(function() {
    $('.form-validate').validate();

      //Initialize Select2 Elements
    $('.select2').select2()

  })

  function previewImage(input, previewDom) {

    if (input.files && input.files[0]) {

      $(previewDom).show();

      var reader = new FileReader();

      reader.onload = function(e) {
        $(previewDom).find('img').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }else{
      $(previewDom).hide();
    }

  }
</script>

<?php include viewPath('includes/footer'); ?>
