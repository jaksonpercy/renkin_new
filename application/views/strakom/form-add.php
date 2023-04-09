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
              <li class="breadcrumb-item"><a href="<?php echo url('/StrakomUnggulan') ?>">Strategi Komunikasi Unggulan</a></li>
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
            <label for="formClient-Contact">Kategori Program*</label>
            <select name="kategoriProgram" id="kategoriProgram" class="form-control" required>
              <option value="-">Pilih List Prioritas</option>
              <option value="Isu Prioritas">Isu Prioritas</option>
              <option value="KSD">KSD</option>
              <option value="Program Unggulan Perangkat Daerah">Program Unggulan Perangkat Daerah</option>

            </select>
          </div>

          <div class="form-group" style="display:none" id="divNoKSD">
            <label for="formClient-Contact" class="col-sm-12">List KSD*</label>
            <select name="ksd" id="formClient-ksd" class="form-control select2" style="width:100%" required>
              <option value="-">Pilih KSD</option>
              <option value="Penanggulangan Banjir">001 - KSD 1 </option>
              <option value="Penanganan Kemacetan">002 - KSD 2 </option>
              <option value="Penanganan Stunting">003 - KSD 3</option>
              <option value="Antisipasi Dampak Resesi Ekonomi">004 - KSD 04</option>

            </select>
          </div>

          <!-- <div class="form-group" style="display:none" id="divNoKSD">
            <label for="formClient-Name">No KSD*</label>
            <input type="text" class="form-control" name="noKSD" id="formClient-noKSD" required placeholder="No KSD" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
          </div>

          <div class="form-group" style="display:none" id="divNamaKSD">
            <label for="formClient-Name">Nama KSD*</label>
            <input type="text" class="form-control" name="namaKSD" id="formClient-namaKSD" required placeholder="Nama KSD" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
          </div> -->

          <div class="form-group"  style="display:none" id="divNamaProgram">
            <label for="formClient-Name">Nama Program/Kegiatan*</label>
            <input type="text" class="form-control" name="namaProgram" id="formClient-namaProgram" required placeholder="Nama Program/Kegiatan" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
          </div>

          <div class="form-group"  style="display:none" id="divJenisProgram">
            <label for="formClient-Contact" class="col-sm-12">Jenis Program/Kegiatan*</label>
            <select name="jenisKegiatan" id="formClient-jenisKegiatan" class="form-control select2" style="width:100%" required>
              <option value="-">Pilih Jenis Kegiatan</option>
              <option value="Penanggulangan Banjir">Penanggulangan Banjir</option>
              <option value="Penanganan Kemacetan">Penanganan Kemacetan</option>
              <option value="Penanganan Stunting">Penanganan Stunting</option>
              <option value="Antisipasi Dampak Resesi Ekonomi">Antisipasi Dampak Resesi Ekonomi</option>

            </select>
          </div>

          <div class="form-group"  style="display:none" id="divNamaUnggulan">
            <label for="formClient-Address">Nama Program Unggulan*</label>
            <textarea type="text" class="form-control" name="namaProgramUnggulan" id="formClient-NamaProgram" placeholder="Nama Program Unggulan" rows="5"></textarea>
          </div>

        </div>
        <!-- /.card-body -->

      </div>
      <!-- /.card -->

      <!-- Default card -->
      <div class="card">
        <div class="card-body">

          <div class="form-group">
            <label for="formClient-Address">Deskripsi Singkat Kegiatan*</label>
            <textarea type="text" class="form-control" name="deskripsiKegiatan" id="formClient-Address" placeholder="Deskripsi Kegiatan" rows="5"></textarea>
          </div>

          <div class="form-group">
            <label for="formClient-Address">Analisis Situasi*</label>
            <textarea type="text" class="form-control" name="analisisSituasi" id="formClient-Address" placeholder="Analisis Situasi" rows="3"></textarea>
          </div>

          <div class="form-group">
            <label for="formClient-Address">Identifikasi Masalah / Isu Utama*</label>
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
            <label for="formClient-Address">Narasi Utama Publikasi Program*</label>
            <textarea type="text" class="form-control" name="narasiUtama" id="formClient-Address" placeholder="Deskripsi Kegiatan" rows="5"></textarea>
          </div>

          <div class="form-group">
            <label for="formClient-Address">Target Audiens (per Triwulan)</label><br>
            <label for="formClient-Address">Pro*</label>
            <textarea type="text" class="form-control" name="targetAudiensPro" id="formClient-Address" placeholder="Pro" rows="3"></textarea>
            <label for="formClient-Address">Kontra*</label>
            <textarea type="text" class="form-control" name="targetAudiensKontra" id="formClient-Address" placeholder="Kontra" rows="3"></textarea>

          </div>

          <div class="form-group">
            <label for="formClient-Address">Rencana Media/Kanal Publikasi*</label>
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
        <div class="col"><a href="<?php echo url('/StrakomUnggulan') ?>" onclick="return confirm('Are you sure you want to leave?')" class="btn btn-flat btn-danger"><?php echo lang('cancel') ?></a></div>
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

      // Initialize Select2 Elements
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

<script type="text/javascript">
   const el = document.getElementById('kategoriProgram');
   const divNoKSD = document.getElementById('divNoKSD');
   // const divNamaKSD = document.getElementById('divNamaKSD');
   const divNamaProgram = document.getElementById('divNamaProgram');
   const divJenisProgram = document.getElementById('divJenisProgram');
   const divNamaUnggulan = document.getElementById('divNamaUnggulan');
   el.addEventListener('change', function handleChange(event) {
      if (event.target.value == 'Isu Prioritas') {
         divNamaProgram.style.display = 'block';
          divJenisProgram.style.display = 'block';
          document.getElementById('divNoKSD').style.display = 'none';
           // document.getElementById('divNamaKSD').style.display = 'none';
      } else if (event.target.value == 'KSD') {
        divNamaProgram.style.display = 'none';
         divJenisProgram.style.display = 'none';
        document.getElementById('divNoKSD').style.display = 'block';
         // document.getElementById('divNamaKSD').style.display = 'block';
      } else if (event.target.value == 'Program Unggulan Perangkat Daerah') {
        divNamaProgram.style.display = 'none';
         divJenisProgram.style.display = 'none';
        document.getElementById('divNoKSD').style.display = 'none';
         // document.getElementById('divNamaKSD').style.display = 'none';
           divNamaUnggulan.style.display = 'block';
      } else {
        divNamaProgram.style.display = 'none';
         divJenisProgram.style.display = 'none';
         divNoKSD.style.display = 'none';
          // divNamaKSD.style.display = 'none';
           divNamaUnggulan.style.display = 'none';
      }
   });
</script>



<?php include viewPath('includes/footer'); ?>
