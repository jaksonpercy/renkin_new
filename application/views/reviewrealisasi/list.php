<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Realisasi Strategi Komunikasi</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item active">Realisasi Strategi Komunikasi</li>
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

                <?php echo form_open_multipart('Realisasi/realisasi', [ 'class' => 'form-validate', 'autocomplete' => 'off','method'=> 'GET' ]); ?>

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
                <h3 class="card-title p-3">Realisasi Strategi Komunikasi</h3>
                <div class="ml-auto p-2">
                  <?php if ($roles->role->role_id==1){
                    if ($periode->status_realisasi == 1) {
                  ?>
                <a href="<?php echo url('Realisasi/add') ?>" class="btn btn-primary btn-sm"><span class="pr-1"><i class="fa fa-plus"></i></span> Tambah Realisasi Strategi Komunikasi</a>
              <?php }
              } ?>
                </div>
              </div>


                <div class="card-body">
                  <table id="dataTable1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th style="vertical-align:middle;text-align:center;">No</th>
                      <th style="vertical-align:middle;text-align:center;">Tanggal Realisasi</th>
                      <th style="vertical-align:middle;text-align:center;">Nama SKPD/UKPD</th>
                      <th style="vertical-align:middle;text-align:center;">Nama Strategi Komunikasi Unggulan</th>
                      <th style="vertical-align:middle;text-align:center;">Judul</th>
                      <th style="vertical-align:middle;text-align:center;">Kanal Publikasi</th>
                      <th style="vertical-align:middle;text-align:center;">Link Tautan</th>
                      <th style="vertical-align:middle;text-align:center;">Dokumentasi</th>

                      <th style="vertical-align:middle;text-align:center;"><?php echo lang('action') ?></th>

                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=0;
                      foreach ($datarealisasi as $row):
                      $no++;

                      ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $row->nama_program ?></td>
                          <td><?php echo $row->name ?></td>
                        <td><?php echo $row->tanggal_realisasi ?></td>
                        <td><?php echo $row->judul_publikasi ?></td>
                        <td>
                          <?php
                            foreach ($rencanamedia as $rows):
                              if ($rows->id == $row->kanal_publikasi ) {
                                echo $rows->nama;
                              }
                           endforeach;
                          ?>
                        </td>
                        <td><?php echo $row->link_tautan ?></td>
                       <td>
                         <?php if(!empty($row->file_dokumentasi)){ ?>
                        <a href="<?php echo base_url('/uploads/datarealiasi/'.$row->file_dokumentasi); ?>" target="_blank">Lihat Dokumen</a>
                      <?php } ?>
                        </td>
                        <td>
                          <a href="<?php echo url('Realisasi/export/'.$row->id) ?>" target="_blank" class="btn btn-sm btn-secondary" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>

                        </td>
                      </tr>
                      <?php

                      endforeach ?>
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
<script>
	$('#dataTable1').DataTable({
    "order": [],
    "pageLength": 25,
  });
  </script>
