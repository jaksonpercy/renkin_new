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
        <?php if($roles->role->role_id == 4){ ?>
        <h1>Rekomendasi Penilaian</h1>
      <?php } else { ?>
        <h1>Penilaian</h1>
      <?php } ?>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/') ?>"><?php echo lang('home') ?></a></li>
          <?php if($roles->role->role_id == 4){ ?>
          <li class="breadcrumb-item active">Rekomendasi Penilaian</li>
          <?php } else { ?>
              <li class="breadcrumb-item active">Penilaian</li>

            <?php } ?>
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

              <?php echo form_open_multipart('Penilaian/strakom', [ 'class' => 'form-validate', 'autocomplete' => 'off','method'=> 'GET' ]); ?>
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
                <!-- <?php if ($roles->role->role_id>1){ ?>
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

          <?php } ?> -->
                  <div class="col-3">
                    <div class="card-body">
                    <div class="form-group">
                      <label for="formClient-Contact">Pilih Triwulan</label>
                      <select name="triwulan_periode" id="triwulan_periode" class="form-control">
                        <option value="">Pilih Triwulan</option>

                        <option <?php if(!empty($_GET['triwulan_periode']) && $_GET['triwulan_periode'] == "Triwulan I"){echo "selected";} ?> value="Triwulan I">Triwulan I</option>
                        <option <?php if(!empty($_GET['triwulan_periode']) && $_GET['triwulan_periode'] == "Triwulan II"){echo "selected";} ?> value="Triwulan II">Triwulan II</option>
                        <option <?php if(!empty($_GET['triwulan_periode']) && $_GET['triwulan_periode'] == "Triwulan III"){echo "selected";} ?> value="Triwulan III">Triwulan III</option>
                        <option <?php if(!empty($_GET['triwulan_periode']) && $_GET['triwulan_periode'] == "Triwulan IV"){echo "selected";} ?> value="Triwulan IV">Triwulan IV</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col"><button type="submit" class="btn btn-flat btn-primary">Tampilkan</button></div>



                <!-- /.card-footer-->
                <?php echo form_close(); ?>
              </div>

              <div class="card-header p-0">
                <h3 class="card-title p-3">Strategi Komunikasi Unggulan</h3>
                <a href="<?php echo url('Penilaian/download/') ?>" target="_blank" class="btn btn-success" style="float:right; margin-top:7px">Download Penilaian</a>
              </div>


              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover table-striped">
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
                    foreach ($strakom as $row):
                    if(($row->EditorialApprove >= 15 && $row->MitigasiApprove > 0) || ($row->EditorialNilai >= 15 && $row->MitigasiNilai > 0)){
                    $no++;
                    ?>

                    <tr>
                      <td><?php echo $no ?></td>
                      <td>
                        <?php
                            echo $row->nama_program;
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

                        <?php if ($row->status_strakom == 2) {
                          echo '<p class="text-warning"><strong>Menunggu Penilaian</strong></p>';
                        } else if ($row->status_strakom == 5) {
                          if($roles->role->role_id == 2){
                          echo '<p class="text-primary"><strong>Rekomendasi Administrator Bidang</strong></p>';
                        } else {
                          echo '<p class="text-success"><strong>Sudah Dinilai</strong></p>';
                        }
                        }
                        else {
                         if($roles->role->role_id == 2){
                          echo '<p class="text-success"><strong>Sudah Dinilai</strong></p>';
                        } else {
                          echo '<p class="text-primary"><strong>Dinilai Asisten</strong></p>';
                        }
                        } ?>
                      </td>
                      <td>

                        <a href="<?php echo url('Penilaian/view/'.$row->strakom_id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo url('Penilaian/downloadByIdStrakom/'.$row->strakom_id) ?>" target="_blank" class="btn btn-sm btn-secondary" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>

                      </td>

                    </tr>

                  <?php
                }
                  endforeach ?>
                  </tbody>
                </table>
              </div>

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
