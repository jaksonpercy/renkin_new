<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pengaturan Periode</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item"><a href="<?php echo url('/PengaturanPeriode') ?>"> Pengaturan Periode</a></li>
          <li class="breadcrumb-item active"> Tambah Periode</li>
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
      <h3 class="card-title"> Tambah Periode</h3>

      <div class="card-tools pull-right">
        <a href="<?php echo url('permissions') ?>" class="btn btn-flat btn-default btn-sm"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;  Pengaturan Periode</a>
      </div>

    </div>

    <?php echo form_open('PengaturanPeriode/save', [ 'class' => 'form-validate' ]); ?>
    <div class="row">
      <div class="col-sm-6">
        <!-- Default card -->
        <div class="card">
          <div class="card-body">

            <div class="form-group">
              <label for="formClient-Name">Periode Aktif</label>
              <select name="periode_aktif" id="formClient-Status" class="form-control select2" required>
                <option value="Triwulan I">Triwulan I</option>
                <option value="Triwulan II">Triwulan II</option>
                <option value="Triwulan III">Triwulan III</option>
                <option value="Triwulan IV">Triwulan IV</option>
              </select>
            </div>

            <div class="form-group">
              <label for="formClient-Contact">Pilih Tahun</label>
              <select name="tahun_periode" class="form-control">
                <option value="">Pilih Tahun</option>
    <?php
    for ($i=date('Y'); $i>2000; $i--){

      echo '<option value="'.$i.'">'.$i.'</option>';
      
    }
    ?>

              </select>
            </div>

            <div class="form-group">
              <label for="formSetting-Company-Name">Periode Penginputkan Data</label>
              <select name="periode_input_data" class="form-control select2">
              <option value="Yes">Yes</option>
              <option value="No">No</option>
              </select>
            </div>


            <div class="form-group">
              <label for="formSetting-Company-Name">Periode Realisasi</label>
              <select name="periode_realisasi" class="form-control select2">
              <option value="No">No</option>
              <option value="Yes">Yes</option>
              </select>
            </div>

          </div>
          <!-- /.card-body -->

        </div>
        <!-- /.card -->


        <!-- /.card -->

      </div>
      <div class="col-sm-6">
        <!-- Default card -->
        <div class="card">
          <div class="card-body">

            <div class="form-group">
              <label for="formSetting-Company-Name">Periode Penilaian</label>
              <select name="periode_penilaian" class="form-control select2">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
              </select>
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

        </div>
        <!-- /.card -->



      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <div class="row">
        <div class="col"><a href="<?php echo url('/PengaturanPeriode') ?>" onclick="return confirm('Are you sure you want to leave?')" class="btn btn-flat btn-danger"> <?php echo lang('cancel') ?></a></div>
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
      "pageLength": 25,
    });
  })

</script>

<?php include viewPath('includes/footer'); ?>

<script>
      //Initialize Select2 Elements
    $('.select2').select2()
</script>
