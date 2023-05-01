<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Uraian Materi Mitigasi Krisis</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item active">Uraian Materi Mitigasi Krisis</li>
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
                <h3 class="card-title p-3">Uraian Materi Mitigasi Krisis</h3>
                  <?php if ($roles->role->role_id==1):?>
                <div class="ml-auto p-2">

                      <a href="<?php echo url('Mitigasi/add') ?>" class="btn btn-primary btn-sm"><span class="pr-1"><i class="fa fa-plus"></i></span> Tambah Uraian Mitigasi Krisis</a>

                </div>
                  <?php endif ?>
              </div>

              <?php if ($roles->role->role_id==1):?>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-striped">
                  <thead>
                  <tr>
                    <th><?php echo lang('id') ?></th>
                    <th>Nama Kegiatan</th>
                    <th>Stakeholder Pro Pemprov DKI Jakarta</th>
                    <th>Stakeholder Kontra Pemprov DKI Jakarta</th>
                    <th>Juru Bicara</th>
                    <th>PIC Kegiatan yang Dapat Dihubungi</th>
                    <th>Dokumen Pendukung</th>
                    <th><?php echo lang('action') ?></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($mitigasi as $row):
                      if ($row->user_id == $this->session->userdata('logged')['id']) {
                        // code...

                    ?>
                    <tr>
                      <td><?php echo $row->id ?></td>
                      <td><?php echo $row->nama_kegiatan ?></td>
                      <td><?php echo $row->stakeholder_pro ?></td>
                      <td><?php echo $row->stakeholder_kontra ?></td>
                      <td><?php echo $row->juru_bicara ?></td>
                      <td><?php echo $row->pic_kegiatan ?></td>
                      <td>
                      <?php if(empty($row->data_pendukung_text)){ ?>
                      <a href="<?php echo url('/uploads/mitigasifile/'.$row->data_pendukung_file); ?>" target="_blank">Lihat Dokumen</a>
                    <?php } else { ?>
                      <a href="<?php echo url($row->data_pendukung_text); ?>" target="_blank">Lihat Dokumen</a>
                    <?php } ?>
                      </td>
                      <td>
                        <a href="<?php echo url('Mitigasi/edit/'.$row->id) ?>" class="btn btn-sm btn-primary" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo url('Mitigasi/view/'.$row->id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo url('Mitigasi/delete/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini ?')" title="Hapus" data-toggle="tooltip"><i class="fa fa-trash"></i></a>

                      </td>
                    </tr>
                    <?php
                    }
                    endforeach ?>
                    </tbody>
                </table>
              </div>
                <?php else:?>
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-striped">
                      <thead>
                      <tr>
                        <th><?php echo lang('id') ?></th>
                        <th>Nama Kegiatan</th>
                        <th>Stakeholder Pro Pemprov DKI Jakarta</th>
                        <th>Stakeholder Kontra Pemprov DKI Jakarta</th>
                        <th>Juru Bicara</th>
                        <th>PIC Kegiatan yang Dapat Dihubungi</th>
                        <th>Dokumen Pendukung</th>
                        <th><?php echo lang('action') ?></th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($mitigasi as $row):
                          if ($row->user_id == $this->session->userdata('logged')['id']) {
                            // code...

                        ?>
                        <tr>
                          <td><?php echo $row->id ?></td>
                          <td><?php echo $row->nama_kegiatan ?></td>
                          <td><?php echo $row->stakeholder_pro ?></td>
                          <td><?php echo $row->stakeholder_kontra ?></td>
                          <td><?php echo $row->juru_bicara ?></td>
                          <td><?php echo $row->pic_kegiatan ?></td>
                          <td>
                          <?php if(empty($row->data_pendukung_text)){ ?>
                          <a href="<?php echo url('/uploads/mitigasifile/'.$row->data_pendukung_file); ?>">Lihat Dokumen</a>
                        <?php } else { ?>
                          <a href="<?php echo url('/uploads/mitigasifile/'.$row->data_pendukung_text); ?>">Lihat Dokumen</a>
                        <?php } ?>
                          </td>
                          <td>
                            <a href="<?php echo url('Mitigasi/view/') ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>

                          </td>
                        </tr>
                        <?php
                        }
                        endforeach ?>
                        </tbody>
                    </table>
                  </div>
                <?php endif ?>
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
