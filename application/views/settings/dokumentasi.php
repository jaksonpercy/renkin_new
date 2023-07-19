<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo lang('settings') ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item active"><?php echo lang('settings') ?></li>
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



        <div class="card-header">
          <h3 class="card-title">Perangkat Daerah</h3>
        </div>

        <?php echo form_open_multipart('settings/dokumentasiUpdate', [ 'class' => 'form-validate', 'autocomplete' => 'off', 'method' => 'post' ]); ?>
        <div class="card-body">

          <div class="form-group">
            <label for="formSetting-Company-Name">URL Video</label>
            <input type="text" class="form-control" name="url_video_pd" value="<?php echo setting('url_video_pd') ?>" placeholder="URL Video" autofocus />
          </div>

          <div class="form-group">
            <label for="formSetting-Company-Email">URL Panduan </label>
            <input type="text" class="form-control" name="url_panduan_pd" value="<?php echo setting('url_panduan_pd') ?>" placeholder="URL Panduan" autofocus />
          </div>
<br>
          <h3 class="card-title">Asisten Pemerintahan</h3> <br><br>

          <div class="form-group">
            <label for="formSetting-Company-Name">URL Video</label>
            <input type="text" class="form-control" name="url_video_asisten" value="<?php echo setting('url_video_asisten') ?>" placeholder="URL Video" autofocus />
          </div>

          <div class="form-group">
            <label for="formSetting-Company-Email">URL Panduan </label>
            <input type="text" class="form-control" name="url_panduan_asisten" value="<?php echo setting('url_panduan_asisten') ?>" placeholder="URL Panduan" autofocus />
          </div>

          <br>
                    <h3 class="card-title">Super Admin & Administrator Bidang</h3> <br><br>

                    <div class="form-group">
                      <label for="formSetting-Company-Name">URL Video</label>
                      <input type="text" class="form-control" name="url_video_super" value="<?php echo setting('url_video_super') ?>" placeholder="URL Video" autofocus />
                    </div>

                    <div class="form-group">
                      <label for="formSetting-Company-Email">URL Panduan </label>
                      <input type="text" class="form-control" name="url_panduan_super" value="<?php echo setting('url_panduan_super') ?>" placeholder="URL Panduan" autofocus />
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
