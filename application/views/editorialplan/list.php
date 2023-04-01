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
                    <tr>
                      <td>1</td>
                      <td>5 Januari 2023</td>
                      <td>Perubahan titik Jakwifi salah satunya didasari hasil survei</td>
                      <td>Artikel</td>
                      <td>- Pengurangan anggaran DKI Jakarta untuk JakWifi & titik pengurangan JakWifi <br>
                          - Isu - isu politis</td>
                      <td>Instagram</td>
                      <td>
                        <button class="btn btn-sm btn-primary" title="Edit" data-toggle="modal" data-target="#modal-lg-edit"><i class="fas fa-edit"></i></button>
                        <a href="<?php echo url('editorialplan/view/') ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo url('editorialplan/delete/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini ?')" title="Hapus" data-toggle="tooltip"><i class="fa fa-trash"></i></a>

                      </td>
                    </tr>
                  <!-- <?php foreach ($users as $row): ?>
                    <tr>
                      <td width="60"><?php echo $row->id ?></td>
                      <td width="50" class="text-center">
                        <img src="<?php echo userProfile($row->id) ?>" width="40" height="40" alt="" class="img-avtar">

                      </td>
                      <td>
                        <?php echo $row->name ?>
                      </td>
                      <td><?php echo $row->email ?></td>
                      <td><?php echo ucfirst($this->roles_model->getById($row->role)->title) ?></td>
                      <td><?php echo ($row->last_login!='0000-00-00 00:00:00')?date( setting('date_format'), strtotime($row->last_login)):'No Record' ?></td>
                      <td>
                        <?php if (logged('id')!==$row->id): ?>
                          <input type="checkbox" name="my-checkbox"  onchange="updateUserStatus('<?php echo $row->id ?>', $(this).is(':checked') )" <?php echo ($row->status) ? 'checked' : '' ?> data-bootstrap-switch  data-off-color="secondary" data-on-color="success"  data-off-text="<?php echo lang('user_inactive') ?>" data-on-text="<?php echo lang('user_active') ?>">
                        <?php else: ?>
                          <input type="checkbox" name="my-checkbox" disabled data-bootstrap-switch  data-off-color="secondary" data-on-color="success"  data-off-text="<?php echo lang('user_inactive') ?>" data-on-text="<?php echo lang('user_active') ?>">
                        <?php endif ?>
                      </td>
                      <td>
                        <?php if (hasPermissions('users_edit')): ?>
                          <a href="<?php echo url('users/edit/'.$row->id) ?>" class="btn btn-sm btn-primary" title="<?php echo lang('edit_user') ?>" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                        <?php endif ?>
                        <?php if (hasPermissions('users_view')): ?>
                          <a href="<?php echo url('users/view/'.$row->id) ?>" class="btn btn-sm btn-info" title="<?php echo lang('view_user') ?>" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                        <?php endif ?>
                        <?php if (hasPermissions('users_delete')): ?>
                          <?php if ($row->id!=1 && logged('id')!=$row->id): ?>
                            <a href="<?php echo url('users/delete/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Do you really want to delete this user ?')" title="<?php echo lang('delete_user') ?>" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                          <?php else: ?>
                            <a href="#" class="btn btn-sm btn-danger" title="<?php echo lang('delete_user_cannot') ?>" data-toggle="tooltip" disabled><i class="fa fa-trash"></i></a>
                          <?php endif ?>
                        <?php endif ?>
                      </td>
                    </tr>
                  <?php endforeach ?> -->
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
                        <input type="date" class="form-control" name="tanggalRencanaTayang[]" required placeholder="Tanggal Rencana Tayang" autofocus />
                      </div>


                      <div class="form-group">
                        <label for="formClient-Contact">Produk Komunikasi*</label>
                        <select name="produkKomunikasi[]" id="formClient-Produk" class="form-control select2" required>
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
                        <select name="kanalKomunikasi[]" id="formClient-Role" class="form-control select2" required>
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
                        <textarea type="text" class="form-control" name="pesanUtama[]" id="formClient-Address" placeholder="Deskripsi Kegiatan" rows="5"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="formClient-Address">Khalayak*</label>
                        <textarea type="text" class="form-control" name="khalayak[]" id="formClient-Address" placeholder="Analisis Situasi" rows="3"></textarea>
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
                  <input type="date" class="form-control" name="tanggalRencanaTayang[]" required placeholder="Tanggal Rencana Tayang" autofocus />
                </div>


                <div class="form-group">
                  <label for="formClient-Contact">Produk Komunikasi*</label>
                  <select name="produkKomunikasi[]" id="formClient-Produk" class="form-control select2" required>
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
                  <select name="kanalKomunikasi[]" id="formClient-Role" class="form-control select2" required>
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
                  <textarea type="text" class="form-control" name="pesanUtama[]" id="formClient-Address" placeholder="Deskripsi Kegiatan" rows="5"></textarea>
                </div>

                <div class="form-group">
                  <label for="formClient-Address">Khalayak*</label>
                  <textarea type="text" class="form-control" name="khalayak[]" id="formClient-Address" placeholder="Analisis Situasi" rows="3"></textarea>
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
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>



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
