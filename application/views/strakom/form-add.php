<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>

<style>
.error {
	color:#ff0000;
}
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

<?php echo form_open_multipart('StrakomUnggulan/save', [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>


  <div class="row">
    <div class="col-sm-6">
      <!-- Default card -->
      <div class="card">

        <div class="card-body">
          <input type="hidden" class="form-control" name="idUser" required value="<?php echo $user->id; ?>" />
          <input type="hidden" class="form-control" name="idPeriode" required value="<?php echo $periode->id; ?>" />
          <input type="hidden" class="form-control" name="idOPD" required value="<?php echo $user->opd_upd; ?>" />

          <div class="form-group">
            <label for="formClient-Contact">Kategori Program<label class="text-danger">*</label></label>
            <select name="kategoriProgram" id="kategoriProgram" class="form-control" required title="Bagian ini wajib diisi" oninvalid="'this.style.color='#FF0000'">
              <option value="">Pilih Kategori Program</option>
              <?php foreach ($kategoriprogram as $row): ?>
                <option value="<?php echo $row->id ?>"><?php echo $row->nama ?></option>
              <?php endforeach ?>
            </select>
          </div>

          <div class="form-group" style="display:none" id="divNoKSD">
            <label for="formClient-Contact" class="col-sm-12">Nama KSD<label class="text-danger">*</label></label>
            <input type="text" class="form-control" name="namaKSD" id="formClient-namaKSD" title="Bagian ini wajib diisi" onfocus="'this.style.color='#FF0000'" placeholder="Nama KSD" />

            <!-- <select name="ksd" id="formClient-ksd" class="form-control select2" style="width:100%" required>
              <?php foreach ($ksd as $row): ?>
                <option value="<?php echo $row->id ?>"><?php echo $row->code ?> - <?php echo $row->nama ?></option>
              <?php endforeach ?>
            </select> -->
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
            <label for="formClient-Name">Nama Program/Kegiatan<label class="text-danger">*</label></label>
            <input type="text" class="form-control" name="namaProgram" id="formClient-namaProgram" title="Bagian ini wajib diisi" onfocus="'this.style.color='#FF0000'" placeholder="Nama Program/Kegiatan" />
          </div>

          <div class="form-group"  style="display:none" id="divJenisProgram">
            <label for="formClient-Contact" class="col-sm-12">Jenis Program/Kegiatan<label class="text-danger">*</label></label>
            <select name="jenisKegiatan" id="formClient-jenisKegiatan" class="form-control select2" style="width:100%" required>
              <option value="-">Pilih Jenis Kegiatan</option>
              <?php foreach ($jeniskegiatan as $row): ?>
                <option value="<?php echo $row->id ?>"><?php echo $row->nama ?></option>
              <?php endforeach ?>

            </select>
          </div>

          <div class="form-group"  style="display:none" id="divNamaUnggulan">
            <label for="formClient-Address">Nama Program Unggulan<label class="text-danger">*</label></label>
            <textarea type="text" class="form-control" name="namaProgramUnggulan" id="formClient-NamaProgram" required title="Bagian ini wajib diisi" onfocus="'this.style.color='#FF0000'" placeholder="Nama Program Unggulan" rows="5"></textarea>
          </div>

        </div>
        <!-- /.card-body -->

      </div>
      <!-- /.card -->

      <!-- Default card -->
      <div class="card">
        <div class="card-body">

          <div class="form-group">
            <label for="formClient-Address">Deskripsi Singkat Kegiatan<label class="text-danger">*</label></label>
            <textarea type="text" class="form-control" name="deskripsiKegiatan" id="formClient-Address" required title="Bagian ini wajib diisi" onfocus="'this.style.color='#FF0000'" placeholder="Deskripsi Kegiatan" rows="5"></textarea>
          </div>

          <div class="form-group">
            <label for="formClient-Address">Analisis Situasi<label class="text-danger">*</label></label>
            <textarea type="text" class="form-control" name="analisisSituasi" id="formClient-Analisis" required title="Bagian ini wajib diisi" onfocus="'this.style.color='#FF0000'" placeholder="Analisis Situasi" rows="3"></textarea>
          </div>

          <div class="form-group">
            <label for="formClient-Address">Identifikasi Masalah / Isu Utama<label class="text-danger">*</label></label>
            <textarea type="text" class="form-control" name="identifikasiMasalah" id="formClient-Identifikasi" required title="Bagian ini wajib diisi" onfocus="'this.style.color='#FF0000'" placeholder="Identifikasi Masalah" rows="3"></textarea>
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
            <label for="formClient-Address">Narasi Utama Publikasi Program<label class="text-danger">*</label></label>
            <textarea type="text" class="form-control" name="narasiUtama" id="formClient-Narasi" required title="Bagian ini wajib diisi" onfocus="'this.style.color='#FF0000'" placeholder="Narasi Utama Publikasi Program" rows="5"></textarea>
          </div>

          <div class="form-group">
            <label for="formClient-Address">Target Audiens (per Triwulan)</label><br>
            <label for="formClient-Address">Pro<label class="text-danger">*</label></label>
            <textarea type="text" class="form-control" name="targetAudiensPro" id="formClient-Pro" required title="Bagian ini wajib diisi" onfocus="'this.style.color='#FF0000'" placeholder="Pro" rows="3"></textarea><br>
            <label for="formClient-Address">Kontra<label class="text-danger">*</label></label>
            <textarea type="text" class="form-control" name="targetAudiensKontra" id="formClient-Kontra" required title="Bagian ini wajib diisi" onfocus="'this.style.color='#FF0000'" placeholder="Kontra" rows="3"></textarea>

          </div>

          <div class="form-group">
            <label for="formClient-Address">Rencana Media/Kanal Publikasi<label class="text-danger">*</label></label>
            <select id="kanal" class="select2" multiple="multiple" name="rencanaMedia[]" required title="Bagian ini wajib diisi" data-placeholder="Pilih Rencana Media/Kanal Publikasi" style="width: 100%;">
              <?php foreach ($rencanamedia as $row): ?>
                <option value="<?php echo $row->id ?>"><?php echo $row->nama ?></option>
              <?php endforeach ?>
            </select>
          </div>
		  <input type="text" class="form-control" name="textlainnya" id="textlainnya" value="" placeholder="Lainnya" style="display:none; margin-top:1%;" autofocus />

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
        <!-- <div class="col"><a href="<?php echo url('/StrakomUnggulan') ?>" onclick="return confirm('Are you sure you want to leave?')" class="btn btn-flat btn-danger"><?php echo lang('cancel') ?></a></div> -->
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
      if (event.target.value == '1') {
         divNamaProgram.style.display = 'block';
          divJenisProgram.style.display = 'block';
          document.getElementById('divNoKSD').style.display = 'none';
          divNamaUnggulan.style.display = 'none';
           // document.getElementById('divNamaKSD').style.display = 'none';
      } else if (event.target.value == '2') {
        divNamaProgram.style.display = 'none';
         divJenisProgram.style.display = 'none';
        document.getElementById('divNoKSD').style.display = 'block';
        divNamaUnggulan.style.display = 'none';
         // document.getElementById('divNamaKSD').style.display = 'block';
      } else if (event.target.value == '3') {
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

   $(function() {
    $('#kanal').change(function(e) {
        var selected = $(e.target).val();
        if (selected.includes('9') == true) {
			$('#textlainnya').css("display", "block");
		}
    });
});
</script>



<?php include viewPath('includes/footer'); ?>
