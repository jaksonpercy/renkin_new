<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>

<link rel="stylesheet" href="<?php echo $url->assets ?>plugins/jquery-file-upload/css/jquery.fileupload.css" />
    <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/jquery-file-upload/css/jquery.fileupload-ui.css" />

    <style>#dropzone {
    background: white;
    width: 100%;
    height: 200px;
    line-height: 200px;
    text-align: center;
    font-weight: bold;
    border: 1px dashed rgb(0 0 0 / 30%);
    margin: 20px 10px;
    cursor: pointer;
    color: #999;
    font-size: 1.2rem;
    font-weight: normal;
}
#dropzone.in {
    width: 100%;
    height: 200px;
    line-height: 200px;
    font-size: larger;
}
#dropzone.hover {
    background: #eee;
}
#dropzone.fade {
    -webkit-transition: all 0.3s ease-out;
    -moz-transition: all 0.3s ease-out;
    -ms-transition: all 0.3s ease-out;
    -o-transition: all 0.3s ease-out;
    transition: all 0.3s ease-out;
    opacity: 1;
}</style>

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Realisasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo url('/realisasi') ?>">Realisasi</a></li>
              <li class="breadcrumb-item active">Tambah</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->

<section class="content">

  <?php echo form_open('adminlte/ci_examples/multi_file_uploads', [ 'id' => 'fileupload', 'enctype' => 'multipart/form-data' ])  ?>


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
           <div class="custom-file">
            <input type="file" class="custom-file-input" name="file" accept=".pdf" required id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
          </div>
        </div>

        <div class="form-group">
          <label for="formClient-Contact">No Nota Dinas / Surat*</label>
          <input type="text" class="form-control" name="noLampiran" id="formClient-NoLampiran" required placeholder="No Lampiran" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
        </div>

        <div class="form-group">
          <label for="formClient-Contact">Perihal Nota Dinas /Surat*</label>
          <input type="text" class="form-control" name="namaLampiran" id="formClient-NamaLampiran" required placeholder="Nama Lampiran" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
        </div>

        <div class="form-group">
          <label for="formClient-Contact">Tanggal Nota Dinas /Surat*</label>
          <input type="date" class="form-control" name="tanggalLampiran" id="formClient-TanggalLampiran" required placeholder="Tanggal Lampiran" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
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

  <div class="row">
    <div class="col-sm-12">
      <!-- Default card -->
      <div class="card">

        <div class="card-body">
          <div class="form-group">
            <div class="d-flex p-0">
              <div class="ml-auto p-2">

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah"> <span class="pr-1"><i class="fa fa-plus"></i></span>
              Tambah Data
            </button>
          </div>
            </div>
            <table id="dataTable1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Realisasi</th>
                <th>Judul</th>
                <th>Kanal Publikasi</th>
                <th>Link Tautan</th>
                <th>Dokumentasi</th>
                <th><?php echo lang('action') ?></th>
              </tr>
              </thead>
           <tbody>


             <tr>
                <td>1</td>
                <td>5 Januari 2023</td>
                <td>Perubahan titik Jakwifi salah satunya didasari hasil survei</td>
                <td>Instagram </td>
                <td><a href="#">http://www.google.com</a></td>
                <td></td>

                <td>
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-ubah"> <span class="pr-1"><i class="fa fa-edit"></i></span></button>
                  <!-- <a href="<?php echo url('realisasi/edit/') ?>" class="btn btn-sm btn-primary" title="Edit" data-toggle="tooltip"><i class="fa fa-edit"></i></a> -->
                  <!-- <a href="<?php echo url('realisasi/realisasiview/') ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a> -->
                  <a href="<?php echo url('realisasi/delete/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini ?')" title="Hapus" data-toggle="tooltip"><i class="fa fa-trash"></i></a>

                </td>
             </tr>


           </tbody>
         </table>


         <div class="modal fade" id="modal-tambah">
     <div class="modal-dialog modal-lg">
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title">Tambah Data</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="">
           <?php echo form_open_multipart('users/save', [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>

               <form action="" method="post" enctype="multipart/form-data">
             <div class="row">
               <div class="col-sm-12">
                 <!-- Default card -->
                 <div class="card">

                   <div class="card-body">

                     <div class="form-group">
                        <label for="formClient-Contact">Nama Judul Strategi Komunikasi*</label>
                        <select name="jenisKegiatan" id="formClient-Role" class="form-control" required>
                          <option value="-">Pilih Judul Strategi Komunikasi</option>
                          <option value="Publikasi Layanan JakWifi">Publikasi Layanan JakWifi</option>

                        </select>
                      </div>
                      <div class="form-group">
                        <label for="formClient-Name">Tanggal Realisasi*</label>
                        <input type="date" class="form-control" name="tglRealisasi" id="formClient-Tgl" required placeholder="Tanggal Realisasi" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
                      </div>

                      <div class="form-group">
                        <label for="formClient-Name">Judul*</label>
                        <input type="text" class="form-control" name="judul" id="formClient-Name" required placeholder="Judul" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
                      </div>

                      <div class="form-group">
                        <label for="formClient-Address">Kanal Publikasi*</label>
                        <select name="jenisKegiatan" id="formClient-Role" class="form-control" required>
                          <option value="-">Pilih Kanal Publikasi</option>
                          <option value="Publikasi Layanan JakWifi">TV</option>
                          <option value="Publikasi Layanan JakWifi">Radio</option>
                          <option value="Publikasi Layanan JakWifi">Media Cetak</option>
                          <option value="Publikasi Layanan JakWifi">Instagram</option>
                          <option value="Publikasi Layanan JakWifi">Facebook</option>
                          <option value="Publikasi Layanan JakWifi">LinkedIn</option>
                          <option value="Publikasi Layanan JakWifi">Rapat/Audiensi/Workshop/Bintek</option>

                        </select>
                      </div>

                      <div class="form-group">
                        <label for="formClient-Name">Link Tautan*</label>
                        <input type="text" class="form-control" name="linktautan" id="formClient-Name" required placeholder="Link Tautan" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
                      </div>

                      <div class="form-group">
                        <label for="formClient-Name">Dokumentasi*</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="file" accept="image/*" required id="exampleInputFile">
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

   <div class="modal fade" id="modal-ubah">
<div class="modal-dialog modal-lg">
 <div class="modal-content">
   <div class="modal-header">
     <h4 class="modal-title">Ubah Data</h4>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
   <div class="">
     <?php echo form_open_multipart('users/save', [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>

         <form action="" method="post" enctype="multipart/form-data">
       <div class="row">
         <div class="col-sm-12">
           <!-- Default card -->
           <div class="card">

             <div class="card-body">

               <div class="form-group">
                  <label for="formClient-Contact">Judul Strategi Komunikasi*</label>
                  <select name="jenisKegiatan" id="formClient-Role" class="form-control" required>
                    <option value="-">Pilih Judul Strategi Komunikasi</option>
                    <option value="Publikasi Layanan JakWifi">Publikasi Layanan JakWifi</option>

                  </select>
                </div>
                <div class="form-group">
                  <label for="formClient-Name">Tanggal Realisasi*</label>
                  <input type="date" class="form-control" name="tglRealisasi" id="formClient-Tgl" required placeholder="Tanggal Realisasi" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
                </div>

                <div class="form-group">
                  <label for="formClient-Name">Judul*</label>
                  <input type="text" class="form-control" name="judul" id="formClient-Name" required placeholder="Judul" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
                </div>

                <div class="form-group">
                  <label for="formClient-Address">Kanal Publikasi*</label>
                  <select name="jenisKegiatan" id="formClient-Role" class="form-control" required>
                    <option value="-">Pilih Kanal Publikasi</option>
                    <option value="Publikasi Layanan JakWifi">TV</option>
                    <option value="Publikasi Layanan JakWifi">Radio</option>
                    <option value="Publikasi Layanan JakWifi">Media Cetak</option>
                    <option value="Publikasi Layanan JakWifi">Instagram</option>
                    <option value="Publikasi Layanan JakWifi">Facebook</option>
                    <option value="Publikasi Layanan JakWifi">LinkedIn</option>
                    <option value="Publikasi Layanan JakWifi">Rapat/Audiensi/Workshop/Bintek</option>

                  </select>
                </div>

                <div class="form-group">
                  <label for="formClient-Name">Link Tautan*</label>
                  <input type="text" class="form-control" name="linktautan" id="formClient-Name" required placeholder="Link Tautan" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
                </div>

                <div class="form-group">
                  <label for="formClient-Name">Dokumentasi*</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file" accept="image/*" required id="exampleInputFile">
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
        </div>
        <!-- /.card-body -->

      </div>
      <!-- /.card -->

      <!-- Default card -->
      <!-- /.card -->

    </div>
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

<script>
	$('#dataTable1').DataTable({
    "order": []
  });
</script>
