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
          <li class="breadcrumb-item active">Pengaturan Periode</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
  <!-- Default card -->
  <div class="card">
    <div class="card-header with-border">
      <h3 class="card-title">List Periode</h3>

      <div class="card-tools pull-right">
        <!-- <?php if (hasPermissions('permissions_add')): ?> -->
          <a href="<?php echo url('PengaturanPeriode/add') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Periode</a>
        <!-- <?php endif ?> -->
      </div>

    </div>
    <div class="card-body">
      <table id="dataTable1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th><?php echo lang('id') ?></th>
            <th>Nama Periode</th>
            <th>Periode Input Data</th>
            <th>Periode Realisasi</th>
            <th>Periode Penilaian</th>
            <th>Status</th>
            <th><?php echo lang('action') ?></th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($periode as $row): ?>
            <tr>
              <td width="60"><?php echo $row->id ?></td>
              <td>
                <?php echo $row->periode_aktif . $row->tahun ?>
              </td>
              <td>
                <?php
                if($row->status_input_data == 1):
                  echo 'Ya';
                else :
                  echo 'Tidak';
                endif
                 ?>
              </td>
              <td>
                <?php
                if($row->status_realisasi == 1):
                  echo 'Ya';
                else :
                  echo 'Tidak';
                endif
                 ?>
              </td>
              <td>
                <?php
                if($row->status_penilaian == 1):
                  echo 'Ya';
                else :
                  echo 'Tidak';
                endif
                 ?>
              </td>
              <td width="200">
                <input type="checkbox" name="my-checkbox" onchange="updatePeriodeStatus('<?php echo $row->id ?>', $(this).is(':checked') )" <?php echo ($row->status_periode) ? 'checked' : '' ?> data-bootstrap-switch  data-off-color="secondary" data-on-color="success"  data-off-text="<?php echo lang('user_inactive') ?>" data-on-text="<?php echo lang('user_active') ?>">

              </td>
              <td>
                <!-- <?php if (hasPermissions('permissions_edit')): ?> -->
                  <a href="<?php echo url('PengaturanPeriode/edit/'.$row->id) ?>" class="btn btn-sm btn-default" title="<?php echo lang('edit_permission') ?>" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                <!-- <?php endif ?> -->
                <!-- <?php if (hasPermissions('permissions_delete')): ?> -->
                  <a href="<?php echo url('PengaturanPeriode/delete/'.$row->id) ?>" class="btn btn-sm btn-default" onclick='return confirm("Do you really want to delete this permissions ? \nIt may cause errors where it is currently being used !!")' title="<?php echo lang('delete_permission') ?>" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                <!-- <?php endif ?> -->
              </td>
            </tr>
          <?php endforeach ?>

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
<!-- /.card-body -->
</div>
</div>
  <!-- /.card -->

</section>
<!-- /.content -->

<?php include viewPath('includes/footer'); ?>

<script>
  $('#dataTable1').DataTable()
</script>

<script>

window.updatePeriodeStatus = (id, status_periode) => {
  $.get( '<?php echo url('PengaturanPeriode/change_status') ?>/'+id, {
    status_periode: status_periode
  }, (data, status_periode) => {
    if (data=='done') {
      // code
    }else{
      // alert('<?php echo lang('user_unable_change_status') ?>');
    }
  })
}

</script>
