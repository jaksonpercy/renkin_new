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
          <!-- <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><img src="<?php echo str_replace("/index.php","", base_url('assets/img/icon/Jumlah-Renkin.png'))?>" width="30px" /></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Realisasi</span>
                <span class="info-box-number"><?php echo $countrealisasi ?></span>
              </div> -->
              <!-- /.info-box-content -->
            <!-- </div> -->
            <!-- /.info-box -->
          <!-- </div> -->
          <!-- /.col -->
          <!-- <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><img src="<?php echo str_replace("/index.php","", base_url('assets/img/icon/Jumlah-Strakom-Disetujui.png'))?>" width="30px" /></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Realisasi Disetujui</span>
                <span class="info-box-number">0</span>
              </div> -->
              <!-- /.info-box-content -->
            <!-- </div> -->
            <!-- /.info-box -->
          <!-- </div> -->
          <!-- /.col -->
          <!-- <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><img src="<?php echo str_replace("/index.php","", base_url('assets/img/icon/Jumlah-Strakom-Ditolak.png'))?>" width="30px" /></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Realisasi Ditolak</span>
                <span class="info-box-number">0</span>
              </div>
              /.info-box-content
            </div>
            /.info-box
          </div> -->
          <!-- /.col -->

          <!-- /.col -->
        </div>
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
              } else if ($roles->role->role_id == 3){
                $periodeAktif = null;
                $tahun = null;
                if(!empty($_GET['triwulan_periode'])){
                  $periodeAktif = $_GET['triwulan_periode'];
                }
    
                if(!empty($_GET['tahun_periode'])){
                  $tahun = $_GET['tahun_periode'];
                }
              ?>
    <div class="ml-auto p-2">
    
    <a href="<?php echo url('Realisasi/downloadAllStrakom?triwulan_aktif='.$periodeAktif.'&tahun_aktif='.$tahun) ?>" class="btn btn-success btn-sm"><span class="pr-1"><i class="fa fa-download"></i></span> Download Realisasi</a>
    
    </div>
               <?php } ?>
                </div>
              </div>
              <?php if ($roles->role->role_id==1):?>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-striped">
                  <thead>
                  <tr>
                    <th style="vertical-align:middle;text-align:center;">No</th>
                    <th style="vertical-align:middle;text-align:center;">Nama Program/Kegiatan Strategi Komunikasi Unggulan</th>
                    <th style="vertical-align:middle;text-align:center;">No Nota Dinas / Surat</th>
                    <th style="vertical-align:middle;text-align:center;">Perihal Nota Dinas /Surat</th>
                    <th style="vertical-align:middle;text-align:center;">Tanggal Nota Dinas /Surat</th>
                    <th style="vertical-align:middle;text-align:center;">Lampiran Nota Dinas</th>
                    <th style="vertical-align:middle;text-align:center;"><?php echo lang('action') ?></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no =0;
                    foreach ($listrealisasi as $row):
                      $no++; ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $row->nama_program ?></td>
                      <td><?php echo $row->no_nota_dinas ?></td>
                      <td><?php echo $row->perihal_nota ?></td>
                      <td><?php echo $row->tanggal_nota ?></td>
                      <td>
                        <?php if(!empty($row->url_nota_dinas)){
                        ?>
                        <a href="<?php echo base_url('/uploads/datanotadinas/'.$row->url_nota_dinas); ?>">Download File Nota Dinas</a>

                      <?php }  ?>
                    </td>
                      <td>
                        <a href="<?php echo url('Realisasi/edit/'.$row->id) ?>" class="btn btn-sm btn-primary" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo url('Realisasi/view/'.$row->id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo url('Realisasi/delete/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini ?')" title="Hapus" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                        <a href="<?php echo url('Realisasi/export/'.$row->id) ?>" target="_blank" class="btn btn-sm btn-secondary" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>

                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <?php else:?>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th style="vertical-align:middle;text-align:center;">No</th>
                        <th style="vertical-align:middle;text-align:center;">Nama SKPD</th>
                        <th style="vertical-align:middle;text-align:center;">Nama Program/Kegiatan Strategi Komunikasi Unggulan</th>
                        <th style="vertical-align:middle;text-align:center;">No Nota Dinas / Surat</th>
                        <th style="vertical-align:middle;text-align:center;">Perihal Nota Dinas /Surat</th>
                        <th style="vertical-align:middle;text-align:center;">Tanggal Nota Dinas /Surat</th>
                        <th style="vertical-align:middle;text-align:center;">Lampiran Nota Dinas</th>
                        <th style="vertical-align:middle;text-align:center;"><?php echo lang('action') ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no =0;
                      foreach ($listrealisasi as $row):
                        $no++; ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $row->name ?></td>
                        <td><?php echo $row->nama_program ?></td>
                        <td><?php echo $row->no_nota_dinas ?></td>
                        <td><?php echo $row->perihal_nota ?></td>
                        <td><?php echo $row->tanggal_nota ?></td>
                        <td>
                          <?php if(!empty($row->url_nota_dinas)){
                          ?>
                          <a href="<?php echo base_url('/uploads/datanotadinas/'.$row->url_nota_dinas); ?>">Download File Nota Dinas</a>

                        <?php }  ?>
                      </td>
                        <td>
                          <a href="<?php echo url('Realisasi/view/'.$row->strakom_id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                          <a href="<?php echo url('Realisasi/export/'.$row->id) ?>" target="_blank" class="btn btn-sm btn-secondary" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>

                        </td>
                      </tr>
                    <?php endforeach; ?>
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

      <div class="modal fade" id="modal-tambah">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Nota Dinas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('users/save', [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>

            <form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12">
              <!-- Default card -->
              <div class="card">

                <div class="card-body">

                  <div class="form-group">
                    <label for="formClient-Contact">Nama Program/Kegiatan*</label>
                    <select name="namaProgram" id="formClient-NamaProgram" class="form-control select2" required>
                      <option value="-">Pilih Program/Kegiatan</option>
                      <option value="Publikasi Layanan JakWifi">Publikasi Layanan JakWifi</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="formClient-Name">Nota Dinas*</label>
                    <input type="text" class="form-control" name="notadinas" id="formClient-NotaDinas" required placeholder="Nota Dinas" onkeyup="$('#formClient-NotaDinas').val(createUsername(this.value))" autofocus />
                    <div class="custom-file" style="margin-top:3%">
                      <input type="file" class="custom-file-input" name="file" required id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

              </div>
              <!-- /.card -->

              <!-- Default card -->

              <!-- /.card -->

            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-edit">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
  <h4 class="modal-title">Ubah Nota Dinas</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <?php echo form_open_multipart('users/save', [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>

      <form action="" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-sm-12">
        <!-- Default card -->
        <div class="card">

          <div class="card-body">

            <div class="form-group">
              <label for="formClient-Contact">Nama Program/Kegiatan*</label>
              <select name="namaProgram" id="formClient-NamaProgram" class="form-control select2" required>
                <option value="-">Pilih Program/Kegiatan</option>
                <option value="Publikasi Layanan JakWifi">Publikasi Layanan JakWifi</option>
              </select>
            </div>

            <div class="form-group">
              <label for="formClient-Name">Nota Dinas*</label>
              <input type="text" class="form-control" name="notadinas" id="formClient-NotaDinas" required placeholder="Nota Dinas" onkeyup="$('#formClient-NotaDinas').val(createUsername(this.value))" autofocus />
              <div class="custom-file" style="margin-top:3%">
                <input type="file" class="custom-file-input" name="file" required id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
            </div>

          </div>
          <!-- /.card-body -->

        </div>
        <!-- /.card -->

        <!-- Default card -->

        <!-- /.card -->

      </div>
    </div>
  </form>
</div>
<div class="modal-footer justify-content-between">
  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
  <button type="button" class="btn btn-primary">Submit</button>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
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
