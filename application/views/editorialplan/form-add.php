<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>


<?php

$data2 = "

";
?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editorial Plan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo url('/editorialplan') ?>">Editorial Plan</a></li>
              <li class="breadcrumb-item active">Tambah</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->

<section class="content">

<?php echo form_open_multipart('users/save', [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>

    <form action="" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col-sm-6">
      <!-- Default card -->
      <div class="card">

        <div class="card-body">

          <div class="form-group">
            <label for="formClient-Name">Tanggal Rencana Tayang</label>
            <input type="date" class="form-control" name="tanggalRencanaTayang[]" required placeholder="Tanggal Rencana Tayang" autofocus />
          </div>


          <div class="form-group">
            <label for="formClient-Contact">Produk Komunikasi</label>
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
            <label for="formClient-Contact">Kanal Komunikasi</label>
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
            <label for="formClient-Address">Pesan Utama</label>
            <textarea type="text" class="form-control" name="pesanUtama[]" id="formClient-Address" placeholder="Deskripsi Kegiatan" rows="5"></textarea>
          </div>

          <div class="form-group">
            <label for="formClient-Address">Khalayak</label>
            <textarea type="text" class="form-control" name="khalayak[]" id="formClient-Address" placeholder="Analisis Situasi" rows="3"></textarea>
          </div>

        </div>
        <!-- /.card-body -->

      </div>
    </div>
  </div>
</form>

  <!-- Default card -->
  <div class="card">
    <div class="card-footer">
      <div class="row">
        <div class="col"><a href="<?php echo url('/editorialplan') ?>" onclick="return confirm('Are you sure you want to leave?')" class="btn btn-flat btn-danger"><?php echo lang('cancel') ?></a></div>
        <div class="col text-right"><button type="submit" class="btn btn-flat btn-primary"><?php echo lang('submit') ?></button></div>
      </div>
    </div>
    <!-- /.card-footer-->

  </div>
  <!-- /.card -->

<?php echo form_close(); ?>

</section>
<!-- /.content -->


<script>
  $(document).ready(function() {
    $('.form-validate').validate();

      //Initialize Select2 Elements
    $('.select2').select2()

  })

  function previewImage(input, previewDom) {

    if (input.files && input.files[0]) {

      $(previewDom).show();

      var reader = new FileReader();

      reader.onload = function(e) {
        $(previewDom).find('img').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }else{
      $(previewDom).hide();
    }

  }

  function createUsername(name) {
      return name.toLowerCase()
        .replace(/ /g,'_')
        .replace(/[^\w-]+/g,'')
        ;;
  }

</script>

<?php include viewPath('includes/footer'); ?>
