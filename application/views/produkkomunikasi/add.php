<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Produk Komunikasi</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item"><a href="<?php echo url('/ProdukKomunikasi') ?>"> Produk Komunikasi</a></li>
          <li class="breadcrumb-item active"> Tambah</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default card -->
  <div class="card">
    <div class="card-header with-border">
      <h3 class="card-title"> Tambah Produk Komunikasi </h3>

      <div class="card-tools pull-right">
        <a href="<?php echo url('ProdukKomunikasi') ?>" class="btn btn-flat btn-default btn-sm"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;  Produk Komunikasi </a>
      </div>

    </div>

    <?php echo form_open('ProdukKomunikasi/save', [ 'class' => 'form-validate' ]); ?>
    <div class="card-body">

      <div class="form-group">
        <label for="formClient-Name"> Nama Produk Komunikasi</label>
        <input type="text" class="form-control" name="name" id="formClient-Name" required placeholder="Enter Name" autofocus />
      </div>

      <div class="form-group">
        <label for="formClient-Code"> <?php echo lang('permission_code') ?></label>
        <input type="text" class="form-control" name="code" id="formClient-Code" required placeholder="Enter Code" autofocus />
        <p style="color: red;"> <?php echo lang('permission_code_unique') ?></p>
      </div>

      <div class="form-group">
        <label for="formClient-Status"><?php echo lang('user_status') ?></label>
        <select name="status" id="formClient-Status" class="form-control">
          <option value="1" selected><?php echo lang('user_active') ?></option>
          <option value="0"><?php echo lang('user_inactive') ?></option>
        </select>
      </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <div class="row">
        <div class="col"><a href="<?php echo url('/ProdukKomunikasi') ?>" onclick="return confirm('Are you sure you want to leave?')" class="btn btn-flat btn-danger"> <?php echo lang('cancel') ?></a></div>
        <div class="col text-right"><button type="submit" class="btn btn-flat btn-primary"> <?php echo lang('submit') ?></button></div>
      </div>
    </div>
    <!-- /.card-footer-->

    <?php echo form_close(); ?>

  </div>
  <!-- /.card -->

</section>
<!-- /.content -->

<script>
  $(document).ready(function() {
    $('.form-validate').validate({
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });

    $('.check-select-all-p').on('change', function() {

      $('.check-select-p').attr('checked', $(this).is(':checked'));

    })

    $('.table-DT').DataTable({
      "ordering": false,
    });
  })

</script>

<?php include viewPath('includes/footer'); ?>

<script>
      //Initialize Select2 Elements
    $('.select2').select2()
</script>
