<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Mapping OPD</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/') ?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?php echo url('/roles') ?>">Mapping OPD</a></li>
          <li class="breadcrumb-item active">Edit</li>
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
      <h3 class="card-title">Edit Mapping OPD</h3>
    </div>

    <?php echo form_open('MappingSkpd/update/'.$User->id, [ 'class' => 'form-validate' ]); ?>
    <div class="card-body">

      <div class="form-group">
        <label for="formClient-Name">Nama Pengguna</label>
        <input type="text" class="form-control" name="name" id="formClient-Name" required disabled placeholder="<?php echo lang('role_name') ?>" autofocus value="<?php echo $User->name ?>" />
      </div>

      <div class="form-group">
        <label for="formClient-Table">List OPD</label>
        <div class="row">
          <div class="col-sm-6">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><?php echo lang('role_name') ?></th>
                  <th width="50" class="text-center"><input type="checkbox" class="check-select-all-p"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php if (!empty($permissions = $this->OPD_model->get())): ?>
                    <?php 
                    // echo count($skpd);
                    foreach ($permissions as $row):
                      if($row->id > 1){
                      $isChecked = in_array($row->id, $skpd) ? 'checked' : '';
                    ?>
                     
                      <td><?php echo ucfirst($row->opd_upd_name) ?></td>
                      <td width="50" class="text-center"><input type="checkbox" class="check-select-p" name="opd[]" value="<?php echo $row->id ?>" <?php echo $isChecked ?>></td>
                    </tr>
                    <?php  }endforeach ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="2" class="text-center">No Permissions Found</td>
                    </tr>
                  <?php endif ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>

    </div>
    <!-- /.card-body -->


    <div class="card-footer">
      <div class="row">
        <div class="col"><a href="<?php echo url('/roles') ?>" onclick="return confirm('Are you sure you want to leave?')" class="btn btn-flat btn-danger"><?php echo lang('cancel') ?></a></div>
        <div class="col text-right"><button type="submit" class="btn btn-flat btn-primary"><?php echo lang('submit') ?></button></div>
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
      "ordering": true,
      'order' : true,
      "paging": false,
    });

    var checked = true;
    $('.check-select-p').each(function() {

      if(!$(this).is(':checked'))
        checked = false;

        return checked;

    });

    if(checked){
      $('.check-select-all-p').attr('checked', true);
    }


  })

</script>

<?php include viewPath('includes/footer'); ?>

<script>
      //Initialize Select2 Elements
    $('.select2').select2()
</script>
