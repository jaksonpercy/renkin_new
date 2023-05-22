<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>
<style media="screen">
th {
text-align: center;
vertical-align: center;
}
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">    <?php echo lang('dashboard');?>
</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo lang('home');?></a></li>
              <li class="breadcrumb-item active"><?php echo lang('dashboard');?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      <?php if ($roles->role->role_id==1):?>
        <div class="row">
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><img src="<?php echo str_replace("/index.php","", base_url('assets/img/icon/Jumlah-Renkin.png'))?>" width="30px" /></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Renkin</span>
                <span class="info-box-number"><?php echo $countstrakombyid ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><img src="<?php echo str_replace("/index.php","", base_url('assets/img/icon/Jumlah-Realisasi(1).png'))?>" width="30px" /></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Realisasi</span>
                <span class="info-box-number">53</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><img src="<?php echo str_replace("/index.php","", base_url('assets/img/icon/Periode-Dipilih.png'))?>" width="30px" /></span>

              <div class="info-box-content">
                <span class="info-box-text">Periode Dipilih</span>
                <span class="info-box-number">Triwulan I - 2023</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- /.col -->
        </div>
        <!-- /.row -->
      <?php else :?>
        <div class="row">
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah SKPD/UKPD</span>
                <span class="info-box-number">54 </span>
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
                <span class="info-box-text">Jumlah SKPD/UKPD Sudah Input</span>
                <span class="info-box-number">53</span>
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
                <span class="info-box-text">Jumlah SKPD/UKPD Belum Input</span>
                <span class="info-box-number">25</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- /.col -->
        </div>
      <?php endif ?>
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-8 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas mr-1"></i>
                  Rencana Kinerja Terbaru
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-striped">
                  <thead>
                  <tr>
                    <th>SKPD/UKPD</th>
                    <th>Nama Program/Kegiatan Unggulan</th>
                    <th>Tahapan Pelaksanaan Kegiatan</th>
                    <th>Tanggal Buat</th>
                    <th>Status</th>
                    <th><?php echo lang('action') ?></th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Badan Pengembangan Sumber Daya Manusia</td>
                      <td><b>Pengembangan Sumber Daya Aparatur</b></td>
                      <td>Triwulan I - 2023</td>
                      <td>07 Maret 2023 11:00:00</td>
                      <td>Disetujui</td>
                      <td>
                        <a href="<?php echo url('Penilaian/view') ?>" class="btn btn-sm btn-primary" title="Lihat" data-toggle="tooltip">Lihat</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title">Pemberitahuan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <!-- /.card-body -->

              <!-- /.card-footer-->
            </div>
          </div>
            <!--/.direct-chat -->

            <!-- TO DO List -->

            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <?php if ($roles->role->role_id==2): ?>
          <section class="col-lg-4 connectedSortable">

            <!-- Map card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  Daftar OPD yang belum input
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>SKPD/UKPD</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Badan Pengembangan Sumber Daya Manusia</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Biro Pendidikan dan Mental Spiritual</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->

            <!-- solid sales graph -->


            <!-- Calendar -->

            <!-- /.card -->
          </section>
            <?php endif ?>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<?php include viewPath('includes/footer'); ?>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $url->assets ?>js/pages/dashboard.js"></script>
