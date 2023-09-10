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
        <h1>Review Strategi Komunikasi Unggulan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item active">Review Strategi Komunikasi Unggulan</li>
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
              <span class="info-box-icon bg-info"><img src="<?php echo str_replace("/index.php","", base_url('assets/img/icon/Jumlah-Renkin.png'))?>" width="30px" /></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Strakom</span>
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
              <span class="info-box-icon bg-success"><img src="<?php echo str_replace("/index.php","", base_url('assets/img/icon/Jumlah-Strakom-Disetujui.png'))?>" width="30px" /></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Strakom Disetujui</span>
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
              <span class="info-box-icon bg-danger"><img src="<?php echo str_replace("/index.php","", base_url('assets/img/icon/Jumlah-Strakom-Ditolak.png'))?>" width="30px" /></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Strakom Ditolak</span>
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
              <div class="card-header">

                <?php echo form_open_multipart('ReviewStrakom/strakom', [ 'class' => 'form-validate', 'autocomplete' => 'off','method'=> 'GET' ]); ?>
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
                <?php if ($roles->role->role_id>1){ ?>
                  <div class="col-3">
                    <div class="card-body">
                    <div class="form-group">
                      <label for="formClient-Contact">Pilih SKPD/UKPD</label>
                      <select name="user_id" id="user_id" class="form-control select2">
                        <option value="">Pilih SKPD/UKPD</option>
                        <?php foreach ($user as $row): ?>
                          <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                </div>
              <?php } ?>
                  <div class="col-3">
                    <div class="card-body">
                    <div class="form-group">
                      <label for="formClient-Contact">Pilih Triwulan</label>
                      <select name="triwulan_periode" id="triwulan_periode" class="form-control">
                        <option value="">Pilih Triwulan</option>
                        <option <?php if($_GET['triwulan_periode'] == "Triwulan I"){echo "selected";} ?> value="Triwulan I">Triwulan I</option>
                        <option <?php if($_GET['triwulan_periode'] == "Triwulan II"){echo "selected";} ?> value="Triwulan II">Triwulan II</option>
                        <option <?php if($_GET['triwulan_periode'] == "Triwulan III"){echo "selected";} ?> value="Triwulan III">Triwulan III</option>
                        <option <?php if($_GET['triwulan_periode'] == "Triwulan IV"){echo "selected";} ?> value="Triwulan IV">Triwulan IV</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col"><button type="submit" class="btn btn-flat btn-primary">Tampilkan</button></div>



                <!-- /.card-footer-->
                <?php echo form_close(); ?>
              </div>

              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Review Strategi Komunikasi Unggulan</h3>
                  <?php if ($roles->role->role_id==1){
                    if ($periode->status_input_data == 1) {
                      // code...

                  ?>


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
                    $count=0;
                    foreach ($strakom as $row):
                    $no++;
                      if ($row->user_id == $this->session->userdata('logged')['id']) {
                        // code...

                    ?>

                    <tr>
                      <td><?php echo $no ?></td>
                      <td>
                        <?php
                        if(!empty($row->nama_program)){
                          $count++;
                        }
                            echo $row->nama_program;
                        ?>

                      </td>
                      <td><?php
                      if(!empty($row->deskripsi)){
                        $count++;
                      }
                      echo $row->deskripsi ?></td>
                      <td><?php
                      if(!empty($row->identifikasi_masalah)){
                        $count++;
                      }
                      echo $row->identifikasi_masalah ?></td>
                      <td><?php
                      if(!empty($row->narasi_utama)){
                        $count++;
                      }
                      echo $row->narasi_utama ?></td>
                      <td><?php
                      if(!empty($row->target_pro)){
                        $count++;
                      }
                      echo $row->target_pro ?></td>
                      <td><?php
                      if(!empty($row->target_kontra)){
                        $count++;
                      }
                      echo $row->target_kontra ?></td>
                      <td>
                        <?php
                        if(!empty($row->kanal_publikasi)){
                          $count++;
                        }
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
                          echo '<p class="text-warning"><strong>Belum Dikirim</strong></p>';
                        } else if ($row->status == 1) {
                          if($row->EditorialCountRejected > 0 || $row->MitigasiCountRejected > 0){
                           echo "<p class='text-danger'><strong>Perlu Diperbaiki ($row->alasan) </strong></p>";
                          } else if($row->EditorialCountBR > 0 || $row->MitigasiCountBR > 0){
                            echo '<p class="text-warning"><strong>Belum Dikirim</strong></p>';
                          } else {
                          echo '<p class="text-primary"><strong>Dikirim</strong></p>';
                          }
                        } else if ($row->status == 2) {
                          if($row->EditorialCountRejected > 0 || $row->MitigasiCountRejected > 0){
                            echo "<p class='text-danger'><strong>Perlu Diperbaiki ($row->EditorialCountRejected Editorial Plan & $row->MitigasiCountRejected Uraian Mitigasi ) </strong></p>";
                           } else if($row->EditorialCountBR > 0 || $row->MitigasiCountBR > 0){
                             echo '<p class="text-warning"><strong>Belum Dikirim</strong></p>';
                           } else {
                           echo '<p class="text-primary"><strong>Disetujui</strong></p>';
                           }
                         
                        } else if ($row->status == 5 || $row->status == 6) {
                          echo '<p class="text-success"><strong>Telah Dinilai</strong></p>';
                        } else {
                         echo "<p class='text-danger'><strong>Perlu Diperbaiki ($row->alasan) </strong></p>";
                        } ?>
                      </td>
                      <td>
                        <?php 
                          if($row->EditorialCountBR > 0 || $row->MitigasiCountBR > 0){
                          if($count >=7){
                          if(($row->EditorialCount) >= 15){
                            if(($row->MitigasiCount ) > 0){ ?>
                          <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-finalisasi<?php echo $row->strakom_id ?>"><i class="fa fa-paper-plane" title="Finalisasi"></i></button>
                        <?php }}}} ?>
                        <a href="<?php echo url('ReviewStrakom/view/'.$row->strakom_id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo url('StrakomUnggulan/download/'.$row->strakom_id).'?date='.date("Ymis") ?>" class="btn btn-sm btn-secondary" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>

                      </td>

                    </tr>
                    <div class="modal fade" id="modal-finalisasi<?php echo $row->strakom_id ?>">
                      <?php echo form_open_multipart('ReviewStrakom/change_status_finalisasi_list/'.$row->strakom_id, [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>

                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Perhatian!</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <input type="hidden" name="nama_strakom" value="<?php echo $row->nama_program; ?>">
                              <p>Apakah Anda yakin mengirimkan strategi komunikasi <b><?php echo $row->nama_program ?> </b> ?</p>
                            </div>
                            <div class="modal-footer text-right">
                              <button type="button" style ="display:none" class="btn btn-default" data-dismiss="modal">Tidak</button>
                              <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                          <?php echo form_close(); ?>
                      </div>
                  <?php
                  }
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
