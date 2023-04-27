<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Editorial Plan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item active">Editorial Plan</li>
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
                <h3 class="card-title p-3">Editorial Plan</h3>
                <div class="ml-auto p-2">

                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg"> <span class="pr-1"><i class="fa fa-plus"></i></span>
                Tambah Editorial Plan
              </button>
                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Rencana Tayang</th>
                    <th>Pesan Utama</th>
                    <th>Produk Komunikasi</th>
                    <th>Khalayak</th>
                    <th>Kanal Komunikasi</th>
                    <th><?php echo lang('action') ?></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    foreach ($editorialplan as $row):
                    $no++;
                    ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $row->tanggal_rencana ?></td>
                      <td><?php echo $row->pesan_utama ?></td>
                      <td>
                        <?php
                          foreach ($produkkomunikasi as $rows):
                            if ($rows->id == $row->produk_komunikasi ) {
                              echo $rows->nama;
                            }
                         endforeach;
                        ?>
                      </td>
                      <td><?php echo $row->khalayak ?></td>
                      <td>
                        <?php
                          foreach ($rencanamedia as $rows):
                            if ($rows->id == $row->kanal_komunikasi ) {
                              echo $rows->nama;
                            }
                         endforeach;
                        ?>
                      </td>
                      <td>
                        <button class="btn btn-sm btn-primary" title="Edit" data-toggle="modal" data-target="#modal-lg-edit"><i class="fas fa-edit"></i></button>
                        <a href="<?php echo url('EditorialPlan/view/'.$row->id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo url('EditorialPlan/delete/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini ?')" title="Hapus" data-toggle="tooltip"><i class="fa fa-trash"></i></a>

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

    <section class="content">
      <?php echo form_open_multipart('EditorialPlan/save', [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>

      <div class="container-fluid">
        <div class="row">

          <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Editorial Plan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">


              <div class="row">
                <input type="hidden" class="form-control" name="idUser" required value="<?php echo $user->id; ?>" />
                <input type="hidden" class="form-control" name="idPeriode" required value="<?php echo $periode->id; ?>" />
                <input type="hidden" class="form-control" name="idOPD" required value="<?php echo $user->opd_upd; ?>" />

                <div class="col-sm-6">
                  <!-- Default card -->
                  <div class="card">

                    <div class="card-body">

                      <div class="form-group">
                        <label for="formClient-Contact">Nama Program/Kegiatan*</label>
                        <select name="namaProgram" id="formClient-NamaProgram" class="form-control select2" required>
                          <option value="">Pilih Nama Program/Kegiatan</option>
                          <?php foreach ($strakom as $row):
                            if ($row->ksd_id > 0){
                              foreach ($ksd as $rows):
                                if ($rows->id == $row->ksd_id ) {
                                  echo '<option value="'.$row->id.'">'. $rows->nama .'</option>';
                                }
                             endforeach;
                            } else {
                                echo '<option value="'.$row->id.'">'. $row->nama_program .'</option>';
                            }
                          ?>

                          <?php endforeach ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="formClient-Name">Tanggal Rencana Tayang*</label>
                        <input type="date" class="form-control" name="tanggalRencanaTayang" required placeholder="Tanggal Rencana Tayang" autofocus />
                      </div>


                      <div class="form-group">
                        <label for="formClient-Contact">Produk Komunikasi*</label>
                        <select name="produkKomunikasi" id="formClient-Produk" class="form-control select2" required>
                          <option value="-">Pilih Produk Komunikasi</option>
                          <?php foreach ($produkkomunikasi as $row): ?>
                            <option value="<?php echo $row->id ?>"><?php echo $row->nama ?></option>
                          <?php endforeach ?>

                        </select>
                      </div>

                      <div class="form-group">
                        <label for="formClient-Contact">Kanal Komunikasi*</label>
                        <select name="kanalKomunikasi" id="formClient-Role" class="form-control select2" required>
                          <option value="-">Pilih Kanal Komunikasi</option>
                          <?php foreach ($rencanamedia as $row): ?>
                            <option value="<?php echo $row->id ?>"><?php echo $row->nama ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>

                    </div>
                    <!-- /.card-body -->

                  </div>
                  <!-- /.card -->

                  <!-- Default card -->

                  <!-- /.card -->

                </div>
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">

                      <div class="form-group">
                        <label for="formClient-Address">Pesan Utama*</label>
                        <textarea type="text" class="form-control" name="pesanUtama" id="formClient-Address" placeholder="Deskripsi Kegiatan" rows="5"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="formClient-Address">Khalayak*</label>
                        <textarea type="text" class="form-control" name="khalayak" id="formClient-Address" placeholder="Analisis Situasi" rows="3"></textarea>
                      </div>

                    </div>
                    <!-- /.card-body -->

                  </div>
                </div>
              </div>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>


          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <?php echo form_close(); ?>
      <!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
    <div class="modal fade" id="modal-lg-edit">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Edit Editorial Plan</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <?php echo form_open_multipart('users/save', [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>

          <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-sm-6">
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
                  <label for="formClient-Name">Tanggal Rencana Tayang*</label>
                  <input type="date" class="form-control" name="tanggalRencanaTayang" required placeholder="Tanggal Rencana Tayang" autofocus />
                </div>


                <div class="form-group">
                  <label for="formClient-Contact">Produk Komunikasi*</label>
                  <select name="produkKomunikasi" id="formClient-Produk" class="form-control select2" required>
                    <option value="-">Pilih Produk Komunikasi</option>
                    <option value="Artikel">Artikel</option>
                    <option value="Video">Video</option>
                    <option value="Infografis">Infografis</option>
                    <option value="Foto">Foto</option>
                    <option value="Press Release">Press Release</option>
                    <option value="Motiongrafis">Motiongrafis</option>
                    <option value="Media Luar Ruang">Media Luar Ruang</option>
                    <option value="Sosialisasi">Sosialisasi</option>
                    <option value="Aktivitas">Aktivitas</option>
                    <option value="Berita">Berita</option>
                    <option value="Lainnya">Lainnya</option>

                  </select>
                </div>

                <div class="form-group">
                  <label for="formClient-Contact">Kanal Komunikasi*</label>
                  <select name="kanalKomunikasi" id="formClient-Role" class="form-control select2" required>
                    <option value="-">Pilih Kanal Komunikasi</option>
                    <option value="Instagram">Instagram</option>
                    <option value="Facebook">Facebook</option>
                    <option value="Lainnya">Lainnya</option>

                  </select>
                </div>

              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->

            <!-- Default card -->

            <!-- /.card -->

          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">

                <div class="form-group">
                  <label for="formClient-Address">Pesan Utama*</label>
                  <textarea type="text" class="form-control" name="pesanUtama" id="formClient-Address" placeholder="Deskripsi Kegiatan" rows="5"></textarea>
                </div>

                <div class="form-group">
                  <label for="formClient-Address">Khalayak*</label>
                  <textarea type="text" class="form-control" name="khalayak" id="formClient-Address" placeholder="Analisis Situasi" rows="3"></textarea>
                </div>

              </div>
              <!-- /.card-body -->

            </div>
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

  </div>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>

<?php include viewPath('includes/footer'); ?>

<script>
$(document).ready(function() {
  $('.form-validate').validate();

    // Initialize Select2 Elements
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
