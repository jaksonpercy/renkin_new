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
              <span class="info-box-icon bg-info"><img src="<?php echo str_replace("/index.php","", base_url('assets/img/icon/Jumlah-Renkin.png'))?>" width="30px" /></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Strakom</span>
                <span class="info-box-number">

                  <?php
                  if ($roles->role->role_id==1){
                    if(count($periodeCount)>0){
                  echo $countstrakombyid;
                } else {
                  echo "0";
                }
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
                      if(count($periodeCount)>0){
                  echo $countstrakombyidApproved;
                } else {
                  echo "0";
                }
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
                      if(count($periodeCount)>0){
                  echo $countstrakombyidRejected;
                } else {
                  echo "0";
                }
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

                <?php echo form_open_multipart('StrakomUnggulan/strakom', [ 'class' => 'form-validate', 'autocomplete' => 'off','method'=> 'GET' ]); ?>
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

              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Strategi Komunikasi Unggulan</h3>
                  <?php if ($roles->role->role_id==1){
                    if(count($periodeCount) > 0 ){
                    if ($periode->status_input_data == 1) {
                      // code...

                  ?>

                <div class="ml-auto p-2">

                      <a href="<?php echo url('StrakomUnggulan/add') ?>" class="btn btn-primary btn-sm"><span class="pr-1"><i class="fa fa-plus"></i></span> Tambah Strategi Komunikasi Unggulan</a>

                </div>
              <?php }
            }
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
                    foreach ($strakom as $row):
                    $no++;
                      if ($row->user_id == $this->session->userdata('logged')['id']) {
                        // code...

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

                        <?php if ($row->status == 0) {
                          echo '<p class="text-warning"><strong>Belum Dikirim</strong></p>';
                        } else if ($row->status == 1) {
                          if($row->EditorialCountRejected > 0 || $row->MitigasiCountRejected > 0){
                            echo '<p class="text-danger"><strong>Perlu Diperbaiki</strong></p>';
                          } else {
                          echo '<p class="text-primary"><strong>Dikirim</strong></p>';
                          }
                        } else if ($row->status == 2) {
                          echo '<p class="text-success"><strong>Disetujui</strong></p>';
                        } else {
                          echo '<p class="text-danger"><strong>Perlu Diperbaiki</strong></p>';
                        } ?>
                      </td>
                      <td>
                        <?php if ($roles->role->role_id==1){
                          if(count($periodeCount) > 0){
                          if ($periode->status_input_data == 1) {
                            if ($row->status == 0 || $row->status == 3) {
                        ?>
                        <a href="<?php echo url('StrakomUnggulan/edit/'.$row->strakom_id) ?>" class="btn btn-sm btn-primary" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo url('StrakomUnggulan/delete/'.$row->strakom_id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini ?')" title="Hapus" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                      <?php }}}} ?>
                        <a href="<?php echo url('StrakomUnggulan/view/'.$row->strakom_id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
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
                    <th rowspan="2" style="vertical-align:middle;text-align:center;">No</th>
                    <th rowspan="2" style="vertical-align:middle;text-align:center;">SKPD/UKPD</th>
                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Nama Program/Kegiatan Strategi Komunikasi Unggulan</th>
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
                    <?php
                    $no=0;
                    foreach ($strakom as $row):
                    $no++;
                    ?>

                    <tr>
                      <td><?php echo $no ?></td>
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

                        <?php if ($row->status == 0) {
                          echo '<p class="text-warning"><strong>Belum Dikirim</strong></p>';
                        } else if ($row->status == 1) {
                          if($row->EditorialCountRejected > 0 || $row->MitigasiCountRejected > 0){
                            echo '<p class="text-danger"><strong>Perlu Diperbaiki</strong></p>';
                          } else {
                           echo '<p class="text-primary"><strong>Dikirim</strong></p>';
                          }
                        } else if ($row->status == 2) {
                          echo '<p class="text-success"><strong>Disetujui</strong></p>';
                        } else {
                          echo '<p class="text-danger"><strong>Perlu Diperbaiki</strong></p>';
                        } ?>
                      </td>
                      <td>
                        <?php
                        if($periode->status_verifikasi == 1){
                        if($roles->role->role_id==2){
                          if($row->status == 1){ ?>
                          <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-approve<?php echo $row->id ?>"><i class="fa fa-paper-plane" title="Disetujui"></i></button>
                          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-reject<?php echo $row->id ?>"><i class="fa fa-times" title="Ditolak"></i></button>

                        <?php }}} ?>
                        <a href="<?php echo url('StrakomUnggulan/view/'.$row->id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>

                      </td>
                    </tr>

                    <div class="modal fade" id="modal-approve<?php echo $row->id ?>">
                    	<?php echo form_open_multipart('StrakomUnggulan/change_status_strakom_list/'.$row->id, [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>

                    		<div class="modal-dialog">
                    			<div class="modal-content">
                    				<div class="modal-header">
                    					<h4 class="modal-title">Setujui Strategi Komunikasi Unggulan</h4>
                    					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    						<span aria-hidden="true">&times;</span>
                    					</button>
                    				</div>
                    				<div class="modal-body">
                    					<input type="hidden" name="nama_strakom" value="<?php echo $row->nama_program; ?>">
                    					<input type="hidden" name="userId" value="<?php echo $row->user_id; ?>">
                    					<input type="hidden" name="opdId" value="<?php echo $row->opd_id; ?>">
                    					<input type="hidden" name="status_strakom" value="2">
                    					<div class="form-group" style="display:none">
                    						<label for="formClient-Name">Alasan</label>
                    						<textarea type="text" class="form-control" name="alasan" id="formClient-Alasan" placeholder="Alasan" rows="5"></textarea>
                    					</div>
                    					<p>Apakah kamu yakin untuk menyetujui Strategi Komunikasi Unggulan untuk Judul <b><?php echo $row->nama_program ?> </b> ini ?</p>
                    				</div>
                    				<div class="modal-footer justify-content-between">
                    					<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    					<button type="submit" class="btn btn-primary">Ya, Saya Yakin</button>
                    				</div>
                    			</div>
                    			<!-- /.modal-content -->
                    		</div>
                    		<!-- /.modal-dialog -->
                    			<?php echo form_close(); ?>
                    	</div>


                    <div class="modal fade" id="modal-reject<?php echo $row->id ?>">
                    	<?php echo form_open_multipart('StrakomUnggulan/change_status_strakom_list/'.$row->id, [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>

                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    	<div class="modal-header">
                    		<h4 class="modal-title">Tolak Strategi Komunikasi Unggulan</h4>
                    		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    			<span aria-hidden="true">&times;</span>
                    		</button>
                    	</div>
                    	<div class="modal-body">
                    		<input type="hidden" name="nama_strakom" value="<?php echo $row->nama_program; ?>">
                    		<input type="hidden" name="userId" value="<?php echo $row->user_id; ?>">
                    		<input type="hidden" name="opdId" value="<?php echo $row->opd_id; ?>">
                    		<input type="hidden" name="status_strakom" value="3">
                    		<div class="form-group">
                    			<label for="formClient-Name">Alasan</label>
                    			<textarea type="text" class="form-control" name="alasan" id="formClient-Alasan" placeholder="Alasan" rows="5"></textarea>
                    		</div>
                    		</div>
                    	<div class="modal-footer justify-content-between">
                    		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    		<button type="submit" class="btn btn-primary">Simpan</button>
                    	</div>
                    </div>
                    <!-- /.modal-content -->
                    </div>
                    	<?php echo form_close(); ?>
                    <!-- /.modal-dialog -->
                    </div>

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
