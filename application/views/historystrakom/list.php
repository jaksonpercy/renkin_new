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
        <h1>History Strategi Komunikasi Unggulan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item active">History Strategi Komunikasi Unggulan</li>
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
              <div class="card-header">

                <?php echo form_open_multipart('HistoryStrakom/strakom', [ 'class' => 'form-validate', 'autocomplete' => 'off','method'=> 'GET' ]); ?>
                <div class="row">

                  <div class="col-2">
                    <div class="card-body">
                    <div class="form-group">
                      <label for="formClient-Contact">Pilih Tahun</label>
                      <select name="tahun_periode" id="tahun_periode" class="form-control">
                        <option value="">Pilih Tahun</option>
						<?php
						for ($i=date('Y'); $i>2000; $i--){
							if($i==$_GET['tahun_periode']){
							echo '<option selected value="'.$i.'">'.$i.'</option>';
							} else {
							echo '<option value="'.$i.'">'.$i.'</option>';
							}
						}
						?>

                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-3">
                  <div class="card-body">
                  <div class="form-group">
                    <label for="formClient-Contact">Pilih Triwulan</label>
                    <select name="triwulan_periode" id="triwulan_periode" class="form-control">
                      <option value="">Pilih Triwulan</option>

                      <option <?php if(!empty($_GET['triwulan_periode']) && $_GET['triwulan_periode'] == "triwulan_1"){echo "selected";} ?> value="triwulan_1">Triwulan I</option>
                      <option <?php if(!empty($_GET['triwulan_periode']) && $_GET['triwulan_periode'] == "triwulan_2"){echo "selected";} ?> value="triwulan_2">Triwulan II</option>
                      <option <?php if(!empty($_GET['triwulan_periode']) && $_GET['triwulan_periode'] == "triwulan_3"){echo "selected";} ?> value="triwulan_3">Triwulan III</option>
                      <option <?php if(!empty($_GET['triwulan_periode']) && $_GET['triwulan_periode'] == "triwulan_4"){echo "selected";} ?> value="triwulan_4">Triwulan IV</option>
                    </select>
                  </div>
                </div>
              </div>

                <?php if ($roles->role->role_id>1){ ?>
                  <div class="col-3">
                    <div class="card-body">
                    <div class="form-group">
                      <label for="formClient-Contact">Pilih SKPD/UKPD</label>
                      <select name="user_id" id="user_id" class="form-control select2">
                        <option value="">Pilih SKPD/UKPD</option>
                        <?php foreach ($user as $row): ?>
                          <option  <?php if(!empty($_GET['user_id']) && $_GET['user_id'] == $row->id){echo "selected";} ?> value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                </div>
              <?php } else { ?>
              <div class="col-3" style="display:none">
                <div class="card-body">
                <div class="form-group">
                  <label for="formClient-Contact">Pilih SKPD/UKPD</label>
                  <select name="user_id" id="user_id"  class="form-control select2">
                    <option value="">Pilih SKPD/UKPD</option>
                    <?php foreach ($userall as $row): ?>
                      <option <?php if(!empty($_GET['user_id']) && $_GET['user_id'] == $row->id){echo "selected";} ?>  value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              </div>

              <?php } ?>

              </div>
              <div class="col"><button type="submit" class="btn btn-flat btn-primary">Tampilkan</button></div>



                <!-- /.card-footer-->
                <?php echo form_close(); ?>
              </div>
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">History Strategi Komunikasi Unggulan</h3>

              </div>

              <?php if ($roles->role->role_id==1):?>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-striped">
                  <thead>
                  <tr>
                    <th style="vertical-align:middle;text-align:center;">No</th>
                    <th style="vertical-align:middle;text-align:center;">Nama Program/Kegiatan Strategi Komunikasi Unggulan</th>
                    <th style="vertical-align:middle;text-align:center;">Identifikasi Masalah / Isu Utama</th>
                    <th style="vertical-align:middle;text-align:center;">Narasi Utama Publikasi Program</th>
                    <th style="vertical-align:middle;text-align:center;">Target Audiens</th>
                    <th style="vertical-align:middle;text-align:center;">Rencana Media/Kanal Publikasi</th>
                    <th style="vertical-align:middle;text-align:center;">Tanggal Dibuat</th>
                    <th style="vertical-align:middle;text-align:center;"><?php echo lang('action') ?></th>
                  </tr>

                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    $count=0;
                    foreach ($strakom as $row):
                    $no++;
                      if ($row->d_created_by == $this->session->userdata('logged')['id']) {
                        // code...

                    ?>

                    <tr>
                      <td><?php echo $no ?></td>
                      <td>
                        <?php
                            echo $row->nama_kegiatan;
                        ?>

                      </td>
                      <td><?php
                      echo $row->isu_utama ?></td>
                      <td><?php
                      echo $row->narasi_utama ?></td>
                      <td><?php
                      echo $row->target_audiens ?></td>

                      <td>
                        <?php
                        echo $row->ket_rencana_media_komunikasi;
                       ?>
                      </td>

                      <td>
                        <?php echo $row->d_created_date ?>
                      </td>
                      <td>
                        <a href="<?php echo url('HistoryStrakom/view/'.$row->id_strakom) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>

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
                    <th style="vertical-align:middle;text-align:center;">No</th>
                    <th style="vertical-align:middle;text-align:center;">Nama Program/Kegiatan Strategi Komunikasi Unggulan</th>
                    <th style="vertical-align:middle;text-align:center;">Identifikasi Masalah / Isu Utama</th>
                    <th style="vertical-align:middle;text-align:center;">Narasi Utama Publikasi Program</th>
                    <th style="vertical-align:middle;text-align:center;">Target Audiens</th>
                    <th style="vertical-align:middle;text-align:center;">Rencana Media/Kanal Publikasi</th>
                    <th style="vertical-align:middle;text-align:center;">Tanggal Dibuat</th>
                    <th style="vertical-align:middle;text-align:center;"><?php echo lang('action') ?></th>
                  </tr>

                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    $count=0;
                    foreach ($strakom as $row):
                    $no++;

                    ?>

                    <tr>
                      <td><?php echo $no ?></td>
                      <td>
                        <?php
                            echo $row->nama_kegiatan;
                        ?>

                      </td>
                      <td><?php
                      echo $row->isu_utama ?></td>
                      <td><?php
                      echo $row->narasi_utama ?></td>
                      <td><?php
                      echo $row->target_audiens ?></td>

                      <td>
                        <?php
                        echo $row->ket_rencana_media_komunikasi;
                       ?>
                      </td>

                      <td>
                        <?php echo $row->d_created_date ?>
                      </td>

                      <td>
                        <a href="<?php echo url('HistoryStrakom/view/'.$row->id_strakom) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>

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
$(document).ready(function() {

  $('.select2').select2()

})
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
