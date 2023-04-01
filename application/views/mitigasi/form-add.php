<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Uraian Materi Mitigasi Krisis</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo url('/mitigasi') ?>">Uraian Materi Mitigasi Krisis</a></li>
              <li class="breadcrumb-item active">Tambah</li>
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
            <label for="formClient-Contact">Nama Program/Kegiatan Strategi Komunikasi Unggulan*</label>
            <select name="namaProgram" id="formClient-NamaProgram" class="form-control select2" required>
              <option value="-">Pilih Program/Kegiatan</option>
              <option value="Publikasi Layanan JakWifi">Publikasi Layanan JakWifi</option>
            </select>
          </div>

          <div class="form-group">
            <label for="formClient-Name">Nama Kegiatan*</label>
            <input type="text" class="form-control" name="namaKegiatan" id="formClient-Name" required placeholder="Nama Kegiatan" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
          </div>

          <div class="form-group">
            <label for="formClient-Address">Uraian Potensi Krisis*</label>
            <textarea type="text" class="form-control" name="uraianPotensi" id="formClient-Uraian" placeholder="Uraian Potensi Krisis" rows="5"></textarea>
          </div>

          <div class="form-group">
            <label for="formClient-Name">Juru Bicara*</label>
            <input type="text" class="form-control" name="juruBicara" id="formClient-Juru" required placeholder="Juru Bicara" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
          </div>

          <div class="form-group">
            <label for="formClient-Name">Data Pendukung Kegiatan / Bahan Komunikasi*</label>
              <textarea type="text" class="form-control" name="dataPendukung" id="formClient-PIC" placeholder="Data Pendukung Kegiatan / Bahan Komunikasi" rows="3"></textarea>
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
    <div class="col-sm-6">
      <!-- Default card -->
       <div class="card">
          <div class="card-body">

            <div class="form-group">
              <label for="formClient-Address">Stakeholder Pro Pemprov DKI Jakarta*</label>
              <textarea type="text" class="form-control" name="stakeholderPro" id="formClient-StakeholderPro" placeholder="Stakeholder Pro Pemprov DKI Jakarta" rows="5"></textarea>
            </div>

            <div class="form-group">
              <label for="formClient-Address">Stakeholder Kontra Pemprov DKI Jakarta*</label>
              <textarea type="text" class="form-control" name="stakeholderKontra" id="formClient-StakeholderKontra" placeholder="Stakeholder Kontra Pemprov DKI Jakarta" rows="3"></textarea>
            </div>

            <div class="form-group">
              <label for="formClient-Address">PIC Kegiatan yang Dapat Dihubungi*</label>
              <textarea type="text" class="form-control" name="picKegiatan" id="formClient-PIC" placeholder="PIC Kegiatan yang Dapat Dihubungi" rows="3"></textarea>
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
