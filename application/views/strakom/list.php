<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Strategi Komunikasi Unggulan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item active">Strategi Komunikasi Unggulan</li>
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
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Strakom Unggulan</h3>
                <div class="ml-auto p-2">

                      <a href="<?php echo url('StrakomUnggulan/add') ?>" class="btn btn-primary btn-sm"><span class="pr-1"><i class="fa fa-plus"></i></span> Tambah Strakom Unggulan</a>

                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-striped">
                  <thead>
                  <tr>
                    <th rowspan="2"><?php echo lang('id') ?></th>
                    <th rowspan="2">Nama Program/Kegiatan</th>
                    <th rowspan="2">Jenis Program/Kegiatan</th>
                    <th rowspan="2">Analisis Situasi</th>
                    <th rowspan="2">Identifikasi Masalah</th>
                    <th rowspan="2">Narasi Utama Publikasi Program</th>
                    <th colspan="2">Target Audiens</th>
                    <th rowspan="2"><?php echo lang('action') ?></th>
                  </tr>
                  <tr>
                    <th>Pro</th>
                    <th>Kontra</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Publikasi Layanan JakWifi</td>
                      <td>Program Unggulan Dinas Kominfotik</td>
                      <td>- Pengurangan anggaran JakWifi yang berdampak berkurangnya jumlah titik JakWifi dari 3500 menjadi 1200 titik <br>
                      - Telah berubahnya status Pandemi menjadi Endemi <br>
                      - Sekolah dan Kantor sudah kembali melaksanakan kegiatan tatap muka 100%</td>
                      <td>- Pengurangan anggaran DKI Jakarta untuk JakWifi & titik pengurangan JakWifi <br>
                          - Isu - isu politis</td>
                      <td>Penyesuaian JakWifi berdasarkan hasil survei kepuasan pengguna</td>
                      <td>1. Legislatif</td>
                      <td>1. Masyarakat terdampak</td>
                      <td>
                        <a href="<?php echo url('StrakomUnggulan/edit/') ?>" class="btn btn-sm btn-primary" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo url('StrakomUnggulan/view/') ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo url('StrakomUnggulan/delete/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini ?')" title="Hapus" data-toggle="tooltip"><i class="fa fa-trash"></i></a>

                      </td>
                    </tr>
                  <!-- <?php foreach ($users as $row): ?>
                    <tr>
                      <td width="60"><?php echo $row->id ?></td>
                      <td width="50" class="text-center">
                        <img src="<?php echo userProfile($row->id) ?>" width="40" height="40" alt="" class="img-avtar">

                      </td>
                      <td>
                        <?php echo $row->name ?>
                      </td>
                      <td><?php echo $row->email ?></td>
                      <td><?php echo ucfirst($this->roles_model->getById($row->role)->title) ?></td>
                      <td><?php echo ($row->last_login!='0000-00-00 00:00:00')?date( setting('date_format'), strtotime($row->last_login)):'No Record' ?></td>
                      <td>
                        <?php if (logged('id')!==$row->id): ?>
                          <input type="checkbox" name="my-checkbox"  onchange="updateUserStatus('<?php echo $row->id ?>', $(this).is(':checked') )" <?php echo ($row->status) ? 'checked' : '' ?> data-bootstrap-switch  data-off-color="secondary" data-on-color="success"  data-off-text="<?php echo lang('user_inactive') ?>" data-on-text="<?php echo lang('user_active') ?>">
                        <?php else: ?>
                          <input type="checkbox" name="my-checkbox" disabled data-bootstrap-switch  data-off-color="secondary" data-on-color="success"  data-off-text="<?php echo lang('user_inactive') ?>" data-on-text="<?php echo lang('user_active') ?>">
                        <?php endif ?>
                      </td>
                      <td>
                        <?php if (hasPermissions('users_edit')): ?>
                          <a href="<?php echo url('users/edit/'.$row->id) ?>" class="btn btn-sm btn-primary" title="<?php echo lang('edit_user') ?>" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                        <?php endif ?>
                        <?php if (hasPermissions('users_view')): ?>
                          <a href="<?php echo url('users/view/'.$row->id) ?>" class="btn btn-sm btn-info" title="<?php echo lang('view_user') ?>" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                        <?php endif ?>
                        <?php if (hasPermissions('users_delete')): ?>
                          <?php if ($row->id!=1 && logged('id')!=$row->id): ?>
                            <a href="<?php echo url('users/delete/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Do you really want to delete this user ?')" title="<?php echo lang('delete_user') ?>" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                          <?php else: ?>
                            <a href="#" class="btn btn-sm btn-danger" title="<?php echo lang('delete_user_cannot') ?>" data-toggle="tooltip" disabled><i class="fa fa-trash"></i></a>
                          <?php endif ?>
                        <?php endif ?>
                      </td>
                    </tr>
                  <?php endforeach ?> -->
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->



<?php include viewPath('includes/footer'); ?>

<script>

window.updateUserStatus = (id, status) => {
  $.get( '<?php echo url('users/change_status') ?>/'+id, {
    status: status
  }, (data, status) => {
    if (data=='done') {
      // code
    }else{
      alert('<?php echo lang('user_unable_change_status') ?>');
    }
  })
}

</script>
