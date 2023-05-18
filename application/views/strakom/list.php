<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>

<style media="screen">
</style>

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
        <?php if ($roles->role->role_id==1):?>
        <div class="row">
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Strategi Komunikasi Unggulan</span>
                <span class="info-box-number">

                  <?php
                  if ($roles->role->role_id==1){
                  echo $countstrakombyid;
                } else {
                  echo $countstrakom;
                }
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="far fa-flag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Strategi Komunikasi Unggulan Disetujui</span>
                <span class="info-box-number">
                  <?php
                  if ($roles->role->role_id==1){
                  echo $countstrakombyidApproved;
                } else {
                  echo $countstrakomApproved;
                }
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Strategi Komunikasi Unggulan Ditolak</span>
                <span class="info-box-number">
                  <?php
                  if ($roles->role->role_id==1){
                  echo $countstrakombyidRejected;
                } else {
                  echo $countstrakomRejected;
                }
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- /.col -->
        </div>
      <?php endif ?>


        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Strategi Komunikasi Unggulan</h3>
                  <?php if ($roles->role->role_id==1){
                    if ($periode->status_input_data == 1) {
                      // code...

                  ?>

                <div class="ml-auto p-2">

                      <a href="<?php echo url('StrakomUnggulan/add') ?>" class="btn btn-primary btn-sm"><span class="pr-1"><i class="fa fa-plus"></i></span> Tambah Strategi Komunikasi Unggulan</a>

                </div>
              <?php }
              } ?>
              </div>

              <?php if ($roles->role->role_id==1):?>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-striped">
                  <thead>
                  <tr>
                    <th rowspan="2" style="vertical-align:middle;text-align:center;">No</th>
                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Nama Program/Kegiatan Strategi Komunikasi Unggulan</th>
                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Kategori Program</th>
                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Deskripsi Singkat Kegiatan</th>
                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Identifikasi Masalah / Isu Utama</th>
                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Narasi Utama Publikasi Program</th>
                    <th colspan="2" style="vertical-align:middle;text-align:center;">Target Audiens</th>
                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Rencana Media/Kanal Publikasi</th>
                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Status</th>
                    <th rowspan="2" style="width:11%;vertical-align:middle;text-align:center;"><?php echo lang('action') ?></th>
                  </tr>
                  <tr>
                    <th>Pro</th>
                    <th>Kontra</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    foreach ($strakom as $row):
                    $no++;
                      if ($row->user_id == $this->session->userdata('logged')['id']) {
                        // code...

                    ?>

                    <tr>
                      <td><?php echo $no ?></td>
                      <td>
                        <?php if ($row->ksd_id > 0){
                          foreach ($ksd as $rows):
                            if ($rows->id == $row->ksd_id ) {
                              echo $rows->nama;
                            }
                         endforeach;
                        } else {
                            echo $row->nama_program;
                        }
                        ?>

                      </td>
                      <td>
                        <?php
                        foreach ($jeniskegiatan as $rows):
                          if ($rows->id == $row->jenis_kegiatan ) {
                            echo $rows->nama;
                          }
                       endforeach
                        ?>

                      </td>
                      <td><?php echo $row->deskripsi ?></td>
                      <td><?php echo $row->identifikasi_masalah ?></td>
                      <td><?php echo $row->narasi_utama ?></td>
                      <td><?php echo $row->target_pro ?></td>
                      <td><?php echo $row->target_kontra ?></td>
                      <td>
                        <?php
                        $namaRencana = array();
                        $my_array1 = explode(",", $row->kanal_publikasi);
                        foreach ($my_array1 as $rowss){
                          foreach ($rencanamedia as $rows){
                            if ($rows->id == $rowss ) {
                              array_push($namaRencana,$rows->nama);
                            }
                         }
                      }
                      echo implode(", ",$namaRencana);
                       ?>
                      </td>

                      <td>

                        <?php if ($row->status == 0) {
                          echo '<p class="text-warning"><strong>Menunggu Finalisasi</strong></p>';
                        } else if ($row->status == 1) {
                          echo '<p class="text-primary"><strong>Finalisasi</strong></p>';
                        } else if ($row->status == 2) {
                          echo '<p class="text-success"><strong>Disetujui</strong></p>';
                        } else {
                          echo '<p class="text-danger"><strong>Ditolak</strong></p>';
                        } ?>
                      </td>
                      <td>
                        <?php if ($roles->role->role_id==1){
                          if ($periode->status_input_data == 1) {
                            if ($row->status == 0) {
                        ?>
                        <a href="<?php echo url('StrakomUnggulan/edit/'.$row->id) ?>" class="btn btn-sm btn-primary" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo url('StrakomUnggulan/delete/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini ?')" title="Hapus" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                      <?php }}} ?>
                        <a href="<?php echo url('StrakomUnggulan/view/'.$row->id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo url() ?>" class="btn btn-sm btn-secondary" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>

                      </td>
                    </tr>

                  <?php
                  }
                  endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            <?php else:?>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-striped">
                  <thead>
                  <tr>
                    <th rowspan="2" style="vertical-align:middle;text-align:center;"><?php echo lang('id') ?></th>
                    <th rowspan="2" style="vertical-align:middle;text-align:center;">SKPD/UKPD</th>
                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Nama Program/Kegiatan Strategi Komunikasi Unggulan</th>
                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Kategori Program</th>
                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Deskripsi Singkat Kegiatan</th>
                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Identifikasi Masalah / Isu Utama</th>
                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Narasi Utama Publikasi Program</th>
                    <th colspan="2" style="vertical-align:middle;text-align:center;">Target Audiens</th>
                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Rencana Media/Kanal Publikasi</th>
                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Status</th>
                    <th rowspan="2" style="vertical-align:middle;text-align:center;"><?php echo lang('action') ?></th>
                  </tr>
                  <tr>
                    <th>Pro</th>
                    <th>Kontra</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($strakom as $row):
                    ?>

                    <tr>
                      <td><?php echo $row->id ?></td>
                      <td>
                        <?php
                        foreach ($user as $rows):
                          if ($rows->id == $row->user_id ) {
                            echo $rows->name;
                          }
                       endforeach;
                        ?>
                      </td>
                      <td>
                        <?php if ($row->ksd_id > 0){
                          foreach ($ksd as $rows):
                            if ($rows->id == $row->ksd_id ) {
                              echo $rows->nama;
                            }
                         endforeach;
                        } else {
                            echo $row->nama_program;
                        }
                        ?>

                      </td>
                      <td>
                        <?php
                        foreach ($jeniskegiatan as $rows):
                          if ($rows->id == $row->jenis_kegiatan ) {
                            echo $rows->nama;
                          }
                       endforeach
                        ?>

                      </td>
                      <td><?php echo $row->deskripsi ?></td>
                      <td><?php echo $row->identifikasi_masalah ?></td>
                      <td><?php echo $row->narasi_utama ?></td>
                      <td><?php echo $row->target_pro ?></td>
                      <td><?php echo $row->target_kontra ?></td>
                      <td>
                        <?php
                        $namaRencana = array();
                        $my_array1 = explode(",", $row->kanal_publikasi);
                        foreach ($my_array1 as $rowss){
                          foreach ($rencanamedia as $rows){
                            if ($rows->id == $rowss ) {
                              array_push($namaRencana,$rows->nama);
                            }
                         }
                      }
                      echo implode(", ",$namaRencana);
                       ?>
                      </td>
                      <td>

                        <?php if ($row->status == 0) {
                          echo '<p class="text-warning"><strong>Menunggu Finalisasi</strong></p>';
                        } else if ($row->status == 1) {
                          echo '<p class="text-primary"><strong>Finalisasi</strong></p>';
                        } else if ($row->status == 2) {
                          echo '<p class="text-success"><strong>Disetujui</strong></p>';
                        } else {
                          echo '<p class="text-danger"><strong>Ditolak</strong></p>';
                        } ?>
                      </td>
                      <td>
                        <a href="<?php echo url('StrakomUnggulan/view/'.$row->id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>

                      </td>
                    </tr>

                  <?php

                  endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            <?php endif ?>

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
