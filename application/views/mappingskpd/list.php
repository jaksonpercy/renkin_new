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
          <li class="breadcrumb-item"><a href="<?php echo url('/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item active">Mapping OPD</li>
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
      <h3 class="card-title">Daftar Asisten</h3>

     
    </div>
    <div class="card-body">
      <table id="dataTable1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pengguna</th>
            <th><?php echo lang('action') ?></th>
          </tr>
        </thead>
        <tbody>

          <?php 
          $no = 0;
          foreach ($mappingskpd as $row): 
            $no++;
          ?>
            <tr>
              <td width=30><?php echo $no; ?></td>
              <td>
                <?php echo $row->name ?>
              </td>
              <td>
                <!-- <?php if (hasPermissions('roles_edit')): ?> -->
                  <a href="<?php echo url('MappingSkpd/edit/'.$row->id) ?>" class="btn btn-sm btn-default" title="Edit User Role" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                <!-- <?php endif ?> -->
              </td>
            </tr>
          <?php endforeach ?>

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->

<?php include viewPath('includes/footer'); ?>

<script>
  $('#dataTable1').DataTable()
</script>
