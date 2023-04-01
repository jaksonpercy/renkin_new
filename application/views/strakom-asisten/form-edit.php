<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Strategi Komunikasi Unggulan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo url('/strakomunggulan') ?>">Strategi Komunikasi Unggulan</a></li>
              <li class="breadcrumb-item active">Ubah</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->

<section class="content">

<?php echo form_open_multipart('users/save', [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>


  <div class="row">
    <div class="col-sm-6">
      <!-- Default card -->
      <div class="card">

        <div class="card-body">

          <div class="form-group">
            <label for="formClient-Name">No KSD</label>
            <input type="text" class="form-control" name="noKSD" id="formClient-Name" required placeholder="No KSD" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
          </div>

          <div class="form-group">
            <label for="formClient-Name">Nama KSD</label>
            <input type="text" class="form-control" name="namaKSD" id="formClient-Name" required placeholder="Nama KSD" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
          </div>

          <div class="form-group">
            <label for="formClient-Name">Nama Program/Kegiatan</label>
            <input type="text" class="form-control" name="namaProgram" id="formClient-Name" required placeholder="Nama Program/Kegiatan" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
          </div>

          <div class="form-group">
            <label for="formClient-Contact">Jenis Program/Kegiatan</label>
            <select name="jenisKegiatan" id="formClient-Role" class="form-control select2" required>
              <option value="-">Pilih Jenis Kegiatan</option>
              <option value="Penanggulangan Banjir">Penanggulangan Banjir</option>
              <option value="Penanganan Kemacetan">Penanganan Kemacetan</option>
              <option value="Penanganan Stunting">Penanganan Stunting</option>
              <option value="Antisipasi Dampak Resesi Ekonomi">Antisipasi Dampak Resesi Ekonomi</option>

            </select>
          </div>

        </div>
        <!-- /.card-body -->

      </div>
      <!-- /.card -->

      <!-- Default card -->
      <div class="card">
        <div class="card-body">

          <div class="form-group">
            <label for="formClient-Address">Deskripsi Singkat Kegiatan</label>
            <textarea type="text" class="form-control" name="deskripsiKegiatan" id="formClient-Address" placeholder="Deskripsi Kegiatan" rows="5"></textarea>
          </div>

          <div class="form-group">
            <label for="formClient-Address">Analisis Situasi</label>
            <textarea type="text" class="form-control" name="analisisSituasi" id="formClient-Address" placeholder="Analisis Situasi" rows="3"></textarea>
          </div>

          <div class="form-group">
            <label for="formClient-Address">Identifikasi Masalah / Isu Utama</label>
            <textarea type="text" class="form-control" name="identifikasiMasalah" id="formClient-Address" placeholder="Identifikasi Masalah" rows="3"></textarea>
          </div>

        </div>
        <!-- /.card-body -->

      </div>
      <!-- /.card -->

    </div>
    <div class="col-sm-6">
      <!-- Default card -->
      <div class="card">
        <!-- <div class="card-header">
          <h3 class="card-title"><?php echo lang('user_other_details') ?></h3>
        </div> -->
        <div class="card-body">

          <div class="form-group">
            <label for="formClient-Address">Narasi Utama Publikasi Program</label>
            <textarea type="text" class="form-control" name="narasiUtama" id="formClient-Address" placeholder="Deskripsi Kegiatan" rows="5"></textarea>
          </div>

          <div class="form-group">
            <label for="formClient-Address">Target Audiens (per Triwulan)</label><br>
            <label for="formClient-Address">Pro</label>
            <textarea type="text" class="form-control" name="targetAudiensPro" id="formClient-Address" placeholder="Pro" rows="3"></textarea>
            <label for="formClient-Address">Kontra</label>
            <textarea type="text" class="form-control" name="targetAudiensKontra" id="formClient-Address" placeholder="Kontra" rows="3"></textarea>

          </div>

          <div class="form-group">
            <label for="formClient-Address">Rencana Media/Kanal Publikasi</label>
            <input type="text" class="form-control" name="rencanaMedia" id="formClient-Name" required placeholder="Rencana Media/Kanal Publikasi" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
          </div>

        </div>
        <!-- /.card-body -->

      </div>
      <!-- /.card -->

      <!-- Default card -->

      <!-- /.card -->

    </div>
  </div>

  <!-- Default card -->
  <div class="card">
    <div class="card-footer">
      <div class="row">
        <div class="col"><a href="<?php echo url('/strakomunggulan') ?>" onclick="return confirm('Are you sure you want to leave?')" class="btn btn-flat btn-danger"><?php echo lang('cancel') ?></a></div>
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
