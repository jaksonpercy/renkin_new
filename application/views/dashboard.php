<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>
<link rel="stylesheet" href="<?php echo $url->assets ?>plugins/ekko-lightbox/ekko-lightbox.css">

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
      <?php if ($roles->role->role_id==1 || $roles->role->role_id==3):?>
        <div class="row">
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><img src="<?php echo str_replace("/index.php","", base_url('assets/img/icon/Jumlah-Renkin.png'))?>" width="30px" /></span>

              <div class="info-box-content">
                  <a href="<?php echo url('StrakomUnggulan') ?>" style="color:black">
                <span class="info-box-text">Jumlah Strakom</span>

                <span class="info-box-number"><?php echo $countstrakombyid ?></span>
                    </a>
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
                <a href="<?php echo url('Realisasi') ?>" style="color:black">
                <span class="info-box-text">Jumlah Realisasi</span>


                <span class="info-box-number"><?php echo $countrealisasi ?></span>
                  </a>
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
                <span class="info-box-number"><?php
                if(empty($periodeCount[0])){
                  echo '-';
                } else {
                echo $periodeCount[0]->periode_aktif . " ".$periodeCount[0]->tahun;
                }
                ?></span>
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
                <span class="info-box-number"> <?php echo $listopdcount ?> </span>
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
                <span class="info-box-number"><?php echo $countstrakombylistopd ?></span>
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
                <span class="info-box-number"><?php echo ($listopdcount-$countstrakombylistopd) ?></span>
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
                <?php if ($roles->role->role_id==1 ){ ?>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Program/Kegiatan Unggulan</th>
                    <th>Tahapan Pelaksanaan Kegiatan</th>
                    <th>Tanggal Buat</th>
                    <th>Status</th>
                    <th><?php echo lang('action') ?></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    foreach ($listrakomopd as $row):
                      $no++;
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><b><?php echo $row->nama_program; ?></b></td>
                      <td><?php echo $row->periode_aktif . " ". $row->tahun ?></td>
                      <td><?php echo $row->created_date ?></td>
                      <td>
                        <?php if ($row->status == 0) {
                          echo '<p class="text-warning"><strong>Belum Dikirim</strong></p>';
                        } else if ($row->status == 1) {
                          echo '<p class="text-primary"><strong>Dikirim</strong></p>';
                        } else if ($row->status == 2) {
                          echo '<p class="text-success"><strong>Disetujui</strong></p>';
                        } else if ($row->status == 5 || $row->status == 6) {
                          echo '<p class="text-success"><strong>Dinilai</strong></p>';
                        } else {
                          echo '<p class="text-danger"><strong>Perlu Diperbaiki</strong></p>';
                        } ?></td>
                      <td>
                        <a href="<?php echo url('StrakomUnggulan/view/'.$row->strakom_id) ?>" class="btn btn-sm btn-primary" title="Lihat" data-toggle="tooltip">Lihat</a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                </table>
              </div><!-- /.card-body -->

            <?php } else {?>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>SKPD/UKPD</th>
                    <th>Nama Program/Kegiatan Unggulan</th>
                    <th>Tahapan Pelaksanaan Kegiatan</th>
                    <th>Tanggal Buat</th>
                    <th>Tanggal Kirim</th>
                    <th>Status</th>
                    <th><?php echo lang('action') ?></th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php 
                      $no=0;
                      foreach ($listrakom as $row): 
                      $no++;
                      ?>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row->name ?></td>
                      <td><b><?php echo $row->nama_program ?></b></td>
                      <td><?php echo $row->periode_aktif . " ". $row->tahun ?></td>
                      <td><?php echo $row->created_date ?></td>
                        <td>
                        <?php 
                        if($row->send_date == null){
                          echo "-"; 
                        } else {
                          $newDate = date("d-m-Y H:i:s ", strtotime($row->send_date));

                        echo $newDate; 
                        }
                        ?></td>
                      <td>  
                      <?php if ($row->status == 0) {
                          echo '<p class="text-warning"><strong>Belum Dikirim</strong></p>';
                        } else if ($row->status == 1) {
                          if($row->EditorialCountRejected > 0 || $row->MitigasiCountRejected > 0){
                            echo  "<p class='text-danger'><strong>Perlu Diperbaiki ($row->alasan) </strong></p>";
                          } else {
                          echo '<p class="text-primary"><strong>Dikirim</strong></p>';
                          }
                        } else if ($row->status == 2) {
                          if($row->EditorialCountRejected > 0 || $row->MitigasiCountRejected > 0){
                            if($row->EditorialCountRejected > 0 && $row->MitigasiCountRejected > 0){
                              echo  "<p class='text-danger'><strong>Perlu Diperbaiki ($row->EditorialCountRejected Editorial Plan & $row->MitigasiCountRejected Uraian Mitigasi ) </strong></p>";
                            } else if ($row->EditorialCountRejected > 0){
                            echo  "<p class='text-danger'><strong>Perlu Diperbaiki ($row->EditorialCountRejected Editorial Plan) </strong></p>";
                            } else {
                              echo  "<p class='text-danger'><strong>Perlu Diperbaiki ($row->MitigasiCountRejected Uraian Mitigasi) </strong></p>";
                            }
                          } else {
                            echo '<p class="text-success"><strong>Disetujui</strong></p>';
                          }
                          
                        } else if ($row->status == 5 || $row->status == 6) {
                          echo '<p class="text-success"><strong>Dinilai</strong></p>';
                        } else {
                          echo "<p class='text-danger'><strong>Perlu Diperbaiki ($row->alasan) </strong></p>";
                        } ?>
                      
                    </td>
                      <td>
                        <?php if($row->status == 1){ ?>
                        <a href="<?php echo url('ReviewStrakomUnggulan/view/'.$row->id) ?>" class="btn btn-sm btn-primary" title="Lihat" data-toggle="tooltip">Lihat</a>
                      <?php } else { ?>
                        <a href="<?php echo url('Penilaian/view/'.$row->id) ?>" class="btn btn-sm btn-primary" title="Lihat" data-toggle="tooltip">Lihat</a>

                      <?php } ?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                </table>
              </div><!-- /.card-body -->
            <?php } ?>
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
              <div class="row" style="margin:1%">
                <?php foreach ($pemberitahuan as $row): ?>
                <div class="col-sm-4">
                  <a href="<?php echo url('/uploads/bannerpemberitahuan/'.$row->lokasi_file);?>" data-toggle="lightbox" data-title="<?php echo $row->nama_pemberitahuan ?>" data-gallery="gallery">
                    <!-- <a href="<?php echo $row->url; ?>" target="_blank"> -->
                    <img src="<?php echo url('/uploads/bannerpemberitahuan/'.$row->lokasi_file);?>" class="img-fluid mb-2" alt="white sample"/>
                    <!-- </a> -->
                  </a>
                </div>
              <?php endforeach ?>
              </div>
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
                  Daftar OPD
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
                    <?php
                    $no =0;
                    foreach ($listopd as $row):
                      $no++;
                    ?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td ><?php echo $row->name;?></td>
                    </tr>
                  <?php endforeach ?>
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


            <?php if ($roles->role->role_id==4): ?>
          <section class="col-lg-4 connectedSortable">

            <!-- Map card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  Daftar OPD Belum Input
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover table-striped" style="overflow-x: scroll;max-width:fit-content">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>SKPD/UKPD</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no =0;
                    foreach ($listopdnotinput as $row):
                      $no++;
                    ?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $row->opd_upd_name;?></td>
                    </tr>
                  <?php endforeach ?>
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
    <script src="<?php echo $url->assets ?>plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

    <!-- Filterizr-->
    <script src="<?php echo $url->assets ?>plugins/filterizr/jquery.filterizr.min.js"></script>

    <script>
    $(function () {
      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });

      $('.filter-container').filterizr({gutterPixels: 3});
      $('.btn[data-filter]').on('click', function() {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
      });
    })
    </script>

<?php include viewPath('includes/footer'); ?>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $url->assets ?>js/pages/dashboard.js"></script>
