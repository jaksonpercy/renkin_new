<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pemberitahuan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item active">Pemberitahuan</li>
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
      <h3 class="card-title">List Pemberitahuan</h3>

      <div class="card-tools pull-right">
        <!-- <?php if (hasPermissions('permissions_add')): ?> -->
          <a href="<?php echo url('Pemberitahuan/add') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Pemberitahuan</a>
        <!-- <?php endif ?> -->
      </div>

    </div>
    <div class="card-body">
      <table id="dataTable1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul Pemberitahuan</th>
            <th>Lokasi File</th>
            <th>URL</th>
            <th>Status</th>
            <th><?php echo lang('action') ?></th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($pemberitahuan as $row): ?>
            <tr>
              <td width="60"><?php echo $row->id ?></td>
              <td>
                <?php echo $row->nama_pemberitahuan ?>
              </td>
              <td>
                <a href="<?php echo url('/uploads/bannerpemberitahuan/'.$row->lokasi_file); ?>" target="_blank">Lihat File</a>
                <!-- <?php echo $row->lokasi_file ?> -->
              </td>
              <td>
                <?php echo $row->url ?>
              </td>
              <td>

                <input type="checkbox" name="my-checkbox"  onchange="updateKategoriStatus('<?php echo $row->id ?>', $(this).is(':checked') )" <?php echo ($row->status) ? 'checked' : '' ?> data-bootstrap-switch  data-off-color="secondary" data-on-color="success"  data-off-text="<?php echo lang('user_inactive') ?>" data-on-text="<?php echo lang('user_active') ?>">

              </td>
              <td>
                <!-- <?php if (hasPermissions('permissions_edit')): ?> -->
                  <a href="<?php echo url('Pemberitahuan/edit/'.$row->id) ?>" class="btn btn-sm btn-default" title="<?php echo lang('edit_permission') ?>" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                <!-- <?php endif ?> -->
                <!-- <?php if (hasPermissions('permissions_delete')): ?> -->
                  <a href="<?php echo url('Pemberitahuan/delete/'.$row->id) ?>" class="btn btn-sm btn-default" onclick='return confirm("Do you really want to delete this permissions ? \nIt may cause errors where it is currently being used !!")' title="<?php echo lang('delete_permission') ?>" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
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

window.updateKategoriStatus = (id, status) => {
  $.get( '<?php echo url('Pemberitahuan/change_status') ?>/'+id, {
    status: status
  }, (data, status) => {
    if (data=='done') {
      // code
    }else{
      // alert('<?php echo lang('user_unable_change_status') ?>');
    }
  })
}

</script>
<script>
  $('#dataTable1').DataTable()
</script>
