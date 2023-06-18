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
            <h1>Uraian Materi Mitigasi Krisis</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo url('/Mitigasi') ?>">Uraian Materi Mitigasi Krisis</a></li>
              <li class="breadcrumb-item active">Ubah</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->

<section class="content">

<?php echo form_open_multipart('Mitigasi/update/'.$mitigasi->id, [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>


<div class="row">
  <div class="col-sm-6">
    <!-- Default card -->
    <div class="card">

      <div class="card-body">
        <input type="hidden" class="form-control" name="idUser" required value="<?php echo $mitigasi->user_id; ?>" />
        <input type="hidden" class="form-control" name="idPeriode" required value="<?php echo $mitigasi->periode_id; ?>" />
        <input type="hidden" class="form-control" name="idOPD" required value="<?php echo $mitigasi->opd_id; ?>" />

        <div class="form-group">
          <label for="formClient-Contact">Nama Program/Kegiatan Strategi Komunikasi Unggulan<label class="text-danger">*</label></label>
          <select name="namaProgram" id="formClient-NamaProgram" class="form-control select2" style ="width:100%" required title="Bagian ini wajib diisi">
            <option value="">Pilih Nama Program/Kegiatan</option>
            <?php foreach ($strakom as $rows):


              // if ($rows->ksd_id > 0){
							//
              //   foreach ($ksd as $rowss):
							//
              //     if ($rowss->id == $rows->ksd_id ) {
              //       if ($mitigasi->strakom_id == $rows->id) {
              //           echo '<option value="'.$rows->id.'" selected>'. $rowss->nama .'</option>';
              //       } else {
              //          echo '<option value="'.$rows->id.'">'. $rowss->nama .'</option>';
              //        }
              //     }
							//
              //  endforeach;
              // } else {
                $sel ="";
                if ($mitigasi->strakom_id == $rows->id) {
                    echo '<option value="'.$rows->id.'" selected>'. $rows->nama_program .'</option>';
                } else {
                  echo '<option value="'.$rows->id.'">'. $rows->nama_program .'</option>';
                }

            // }
            ?>

            <?php endforeach ?>
          </select>
        </div>

        <div class="form-group" style="display:none">
          <label for="formClient-Name">Nama Kegiatan*</label>
          <input type="text" class="form-control" name="namaKegiatan" id="formClient-Name" required title="Bagian ini wajib diisi" placeholder="Nama Kegiatan" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
        </div>

        <div class="form-group">
          <label for="formClient-Address">Uraian Potensi Krisis<label class="text-danger">*</label></label>
          <textarea type="text" class="form-control" name="uraianPotensi" id="formClient-Uraian" required title="Bagian ini wajib diisi" placeholder="Uraian Potensi Krisis" rows="5"><?php echo $mitigasi->uraian_potensi ?></textarea>
        </div>

        <div class="form-group">
          <label for="formClient-Address">Stakeholder Pro Pemprov DKI Jakarta<label class="text-danger">*</label></label>
          <textarea type="text" class="form-control" name="stakeholderPro" id="formClient-StakeholderPro" required title="Bagian ini wajib diisi" placeholder="Stakeholder Pro Pemprov DKI Jakarta" rows="5"><?php echo $mitigasi->stakeholder_pro ?></textarea>
        </div>

        <div class="form-group">
          <label for="formClient-Address">Stakeholder Kontra Pemprov DKI Jakarta<label class="text-danger">*</label></label>
          <textarea type="text" class="form-control" name="stakeholderKontra" id="formClient-StakeholderKontra" required title="Bagian ini wajib diisi" placeholder="Stakeholder Kontra Pemprov DKI Jakarta" rows="3"><?php echo $mitigasi->stakeholder_kontra ?></textarea>
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
            <label for="formClient-Name">Juru Bicara<label class="text-danger">*</label></label>
            <input type="text" class="form-control" name="juruBicara" id="formClient-Juru" required title="Bagian ini wajib diisi" placeholder="Juru Bicara" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus value="<?php echo $mitigasi->juru_bicara ?>" />
          </div>


          <div class="form-group">
            <label for="formClient-Address">PIC Kegiatan yang Dapat Dihubungi<label class="text-danger">*</label></label>
            <textarea type="text" class="form-control" name="picKegiatan" id="formClient-PIC" required title="Bagian ini wajib diisi" placeholder="PIC Kegiatan yang Dapat Dihubungi" rows="3"><?php echo $mitigasi->pic_kegiatan ?></textarea>
          </div>

          <div class="form-group">
            <label for="formClient-Name">Data Pendukung Kegiatan<label class="text-danger">*</label></label>
              <textarea type="text" class="form-control" name="dataPendukung" id="formClient-dataPendukung" placeholder="Data pendukung kegiatan (cth: standby statement, press release, talking point, FAQ, Data Teknis, Dll)" rows="3"><?php echo $mitigasi->data_pendukung_text ?></textarea>
            <!-- <div class="custom-file" style="margin-top:3%"> -->
              <input type="file" class="form-control" name="filePendukung" style="margin-top:2%" accept="application/msword,application/msexcel,application/pdf,.ppt,.pptx"/>
              <!-- <label class="custom-file-label" for="exampleInputFile">Choose file</label> -->
            <!-- </div> -->
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
        <div class="col" style="display:none"><a href="<?php echo url('/Mitigasi') ?>" onclick="return confirm('Are you sure you want to leave?')" class="btn btn-flat btn-danger"><?php echo lang('cancel') ?></a></div>
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
