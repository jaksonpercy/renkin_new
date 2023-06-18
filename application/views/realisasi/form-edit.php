<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>

<link rel="stylesheet" href="<?php echo $url->assets ?>plugins/jquery-file-upload/css/jquery.fileupload.css" />
    <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/jquery-file-upload/css/jquery.fileupload-ui.css" />

    <style>
    .error {
    	color:#ff0000;
    }
    #dropzone {
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
            <h1>Realisasi Strategi Komunikasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo url('/Realisasi') ?>">Realisasi Strategi Komunikasi</a></li>
              <li class="breadcrumb-item">Ubah</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->

<section class="content">

  <?php echo validation_errors(); ?>
  <?php echo form_open_multipart('Realisasi/updateNota/'.$strakom->id, [ 'class' => 'form-validate', 'autocomplete' => 'off', 'onsubmit' => 'return validateForm()' ]); ?>

<div class="row">
  <div class="col-sm-12">
    <!-- Default card -->
    <div class="card">

      <div class="card-body">

        <div class="form-group">
          <label for="formClient-Contact">Nama Program/Kegiatan Strategi Komunikasi<label class="text-danger">*</label></label>
          <select name="namaProgram" id="formClient-NamaProgram" class="form-control select2" style ="width:100%" disabled>
            <?php
                  echo '<option value="'.$strakom->id.'">'. $strakom->nama_program .'</option>';

            ?>


          </select>
        </div>

        <div class="form-group">
          <label for="formClient-Name">Nota Dinas<label class="text-danger">*</label></label>
            <input type="file" class="form-control" name="fileNotaDinas" accept="application/pdf"/>

        </div>

        <div class="form-group">
          <label for="formClient-Contact">No Nota Dinas / Surat<label class="text-danger">*</label></label>
          <input type="text" class="form-control" name="noLampiran" id="formClient-NoLampiran" placeholder="No Nota Dinas / Surat" value="<?php echo $strakom->no_nota_dinas ?>" autofocus />
        </div>

        <div class="form-group">
          <label for="formClient-Contact">Perihal Nota Dinas /Surat<label class="text-danger">*</label></label>
          <input type="text" class="form-control" name="namaLampiran" id="formClient-NamaLampiran" placeholder="Perihal Nota Dinas/Surat" value="<?php echo $strakom->perihal_nota ?>" autofocus />
        </div>

        <div class="form-group">
          <label for="formClient-Contact">Tanggal Nota Dinas /Surat<label class="text-danger">*</label></label>
          <input type="date" class="form-control" name="tanggalLampiran" id="formClient-TanggalLampiran" placeholder="Tanggal Lampiran" value="<?php echo $strakom->tanggal_nota ?>" autofocus />
        </div>

      </div>
      <!-- /.card-body -->

    </div>
    <!-- /.card -->

    <!-- Default card -->

    <div class="card">
      <div class="card-footer">
        <div class="row">
          <div class="col" style="display:none;"><a href="<?php echo url('/strakomunggulan') ?>" onclick="return confirm('Are you sure you want to leave?')" class="btn btn-flat btn-danger"><?php echo lang('cancel') ?></a></div>
          <div class="col text-right"><button type="submit" class="btn btn-flat btn-primary"><?php echo lang('submit') ?></button></div>
        </div>
      </div>
      <!-- /.card-footer-->

    </div>
    <!-- /.card -->

  <?php echo form_close(); ?>
    <!-- /.card -->

  </div>
</div>
  <div class="row">
    <div class="col-sm-12">
      <!-- Default card -->
      <div class="card">

        <div class="card-body">
          <div class="form-group">
            <div class="d-flex p-0">
              <div class="ml-auto p-2">
                <?php if ($roles->role->role_id==1){
                  if ($periode->status_realisasi == 1) {
                ?>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah"> <span class="pr-1"><i class="fa fa-plus"></i></span>
              Tambah Data
            </button>
              <?php }} ?>
          </div>
            </div>
            <table id="dataTable1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th style="vertical-align:middle;text-align:center;">No</th>
                <th style="vertical-align:middle;text-align:center;">Tanggal Realisasi</th>
                <th style="vertical-align:middle;text-align:center;">Judul</th>
                <th style="vertical-align:middle;text-align:center;">Kanal Publikasi</th>
                <th style="vertical-align:middle;text-align:center;">Link Tautan</th>
                <th style="vertical-align:middle;text-align:center;">Dokumentasi</th>
                <?php if ($roles->role->role_id==1){
                  if ($periode->status_realisasi == 1) {
                ?>
                <th style="vertical-align:middle;text-align:center;"><?php echo lang('action') ?></th>
                  <?php }} ?>
              </tr>
              </thead>
              <tbody>
                <?php
                $no=0;
                foreach ($datarealisasi as $row):
                $no++;
                  if ($row->user_id == $this->session->userdata('logged')['id']) {
                ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $row->tanggal_realisasi ?></td>
                  <td><?php echo $row->judul_publikasi ?></td>
                  <td>
                    <?php
                      foreach ($rencanamedia as $rows):
                        if ($rows->id == $row->kanal_publikasi ) {
                          echo $rows->nama;
                        }
                     endforeach;
                    ?>
                  </td>
                  <td> <a href="<?php echo $row->link_tautan ?>" target="_blank"><?php echo $row->link_tautan ?></a> </td>
                 <td>

                   <?php if(!empty($row->file_dokumentasi)) { ?>
                  <a href="<?php echo url('/uploads/datarealiasi/'.$row->file_dokumentasi); ?>" target="_blank">Lihat Dokumen</a>
                  <?php } ?>
                </td>
                  <td>
                    <?php if ($roles->role->role_id==1){
                      if ($periode->status_realisasi == 1) {
                    ?>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-ubah<?php echo $row->id ?>"><span class="pr-1"><i class="fa fa-edit"></i></span></button>
                    <a href="<?php echo url('Realisasi/deleteData/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini ?')" title="Hapus" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                  <?php }} ?>
                    <!-- <a href="<?php echo url('Mitigasi/view/'.$row->id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a> -->

                  </td>
                </tr>
                <div class="modal fade" id="modal-ubah<?php echo $row->id ?>">
                <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">Ubah Data</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>

                     <?php echo form_open_multipart('Realisasi/updateData/'.$row->id, ['class' => 'form-validate-edit','autocomplete' => 'off' ]); ?>
                   <div class="">
                       <div class="row">
                         <div class="col-sm-12">
                           <!-- Default card -->
                           <div class="card">

                             <div class="card-body">
                               <input type="hidden" class="form-control" name="idUser" required value="<?php echo $row->user_id; ?>" />
                               <input type="hidden" class="form-control" name="idPeriode" required value="<?php echo $row->periode_id; ?>" />
                               <input type="hidden" class="form-control" name="idOPD" required value="<?php echo $row->opd_id; ?>" />
                               <input type="hidden" class="form-control" name="namaProgramData" required value="<?php echo $row->strakom_id; ?>" />



                                <div class="form-group">
                                  <label for="formClient-Name">Tanggal Realisasi<label class="text-danger">*</label></label>
                                  <input type="date" class="form-control" name="tglRealisasi" id="formClient-Tgl" required title="Bagian ini wajib diisi" value="<?php echo $row->tanggal_realisasi; ?>" placeholder="Tanggal Realisasi" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
                                </div>

                                <div class="form-group">
                                  <label for="formClient-Name">Judul Publikasi<label class="text-danger">*</label></label>
                                  <input type="text" class="form-control" name="judulPublikasi" id="formClient-Name" required title="Bagian ini wajib diisi" value="<?php echo $row->judul_publikasi; ?>" placeholder="Judul Publikasi" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
                                </div>

                                <div class="form-group">
                                  <label for="formClient-Address">Kanal Publikasi<label class="text-danger">*</label></label>
                                  <select name="kanalpublikasi" id="kanalpublikasiedit" class="form-control" data-placeholder="Pilih Rencana Media/Kanal Publikasi" style="width: 100%;" required title="Bagian ini wajib diisi">
                                    <?php foreach ($rencanamedia as $rows):
                                      if ($row->kanal_publikasi == $rows->id) {
                                    ?>
                                      <option value="<?php echo $rows->id ?>" selected><?php echo $rows->nama ?></option>
                                    <?php } else { ?>
                                      <option value="<?php echo $rows->id ?>"><?php echo $rows->nama ?></option>

                                    <?php }
                                    endforeach ?>
                                  </select>
                                  <input type="text" class="form-control" name="textlainnya" id="textlainnyaedit" value="<?php echo $row->text_lainnya; ?>" placeholder="Lainnya" style="display:none; margin-top:1%;" autofocus />

                                </div>
                                <?php if($row->kanal_publikasi == 1 || $row->kanal_publikasi == 2 || $row->kanal_publikasi == 3 || $row->kanal_publikasi == 7){ ?>
                                  <div class="form-group" id="divDokumentasiEdit">
                                    <label for="formClient-Name">Dokumentasi<label class="text-danger">*</label></label>
                                    <!-- <div class="custom-file"> -->
                                      <input type="file" class="form-control" required title="Bagian ini wajib diisi" name="fileDokumentasi" id="fileDokumentasiedit" accept="image/*"/>

                                    <!-- </div> -->
                                  </div>
                                  <div class="form-group" id="divLinkTautanEdit" style="display:none;">
                                    <label for="formClient-Name" >Link Tautan</label> (<label class="text-danger">*</label>Wajib diisi ketika memilih Kanal Publikasi Media Sosial dan Website)

                                    <input type="text" class="form-control" name="linktautan" id="linktautanedit" value="<?php echo $row->link_tautan; ?>" placeholder="Link Tautan" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
                                  </div>

                                <?php } else { ?>
                                  <div class="form-group" id="divDokumentasiEdit" style="display:none">
                                    <label for="formClient-Name">Dokumentasi<label class="text-danger">*</label></label>
                                    <!-- <div class="custom-file"> -->
                                      <input type="file" class="form-control"  name="fileDokumentasi" id="fileDokumentasiedit" accept="image/*"/>

                                    <!-- </div> -->
                                  </div>
                                <div class="form-group" id="divLinkTautanEdit">
                                  <label for="formClient-Name" >Link Tautan</label> (<label class="text-danger">*</label>Wajib diisi ketika memilih Kanal Publikasi Media Sosial dan Website)

                                  <input type="text" class="form-control" name="linktautan" id="linktautanedit" value="<?php echo $row->link_tautan; ?>" placeholder="Link Tautan" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
                                </div>

                              <?php } ?>


                             </div>
                             <!-- /.card-body -->

                           </div>
                           <!-- /.card -->

                           <!-- Default card -->

                           <!-- /.card -->

                         </div>
                       </div>
                   </div>
                   <div class="modal-footer text-right">
                     <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> -->
                     <button type="submit" class="btn btn-primary">Simpan</button>
                   </div>

                  <?php echo form_close(); ?>
                 </div>
                 <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
                </div>
                <?php
                }
                endforeach ?>
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
         <?php echo form_open_multipart('Realisasi/addData', ['class' => 'form-validates','autocomplete' => 'off' ]); ?>

         <div class="">


             <div class="row">
               <div class="col-sm-12">
                 <!-- Default card -->
                 <div class="card">

                   <div class="card-body">
                     <input type="hidden" class="form-control" name="idUser" required value="<?php echo $user->id; ?>" />
                     <input type="hidden" class="form-control" name="idPeriode" required value="<?php echo $periode->id; ?>" />
                     <input type="hidden" class="form-control" name="idOPD" required value="<?php echo $user->opd_upd; ?>" />
                     <input type="hidden" class="form-control" name="namaProgramData" required value="<?php echo $strakom->id; ?>" />



                     <div class="form-group">
                       <label for="formClient-Name">Tanggal Realisasi<label class="text-danger">*</label></label>
                       <input type="date" class="form-control" name="tglRealisasi" id="formClient-tglRealisasi" required title="Bagian ini wajib diisi" placeholder="Tanggal Realisasi" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
                     </div>

                     <div class="form-group">
                       <label for="formClient-Name">Judul Publikasi<label class="text-danger">*</label></label>
                       <input type="text" class="form-control" name="judulPublikasi" id="formClient-judulPublikasi" required title="Bagian ini wajib diisi" placeholder="Judul Publikasi" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
                     </div>

                     <div class="form-group">
                       <label for="formClient-Address">Kanal Publikasi<label class="text-danger">*</label></label>
                       <select name="kanalpublikasi" id="kanalpublikasi" class="form-control" required title="Bagian ini wajib diisi" data-placeholder="Pilih Rencana Media/Kanal Publikasi" style="width: 100%;" required>
                         <option value="0">Pilih Kanal Publikasi</option>
                         <?php foreach ($rencanamedia as $row): ?>
                           <option value="<?php echo $row->id ?>"><?php echo $row->nama ?></option>
                         <?php endforeach ?>
                       </select>
                       <input type="text" class="form-control" name="textlainnya" id="textlainnya" placeholder="Lainnya" style="display:none; margin-top:1%;" autofocus />

                     </div>

                     <div class="form-group" style="display:none;" id="divLinkTautan">
                       <label for="formClient-Name">Link Tautan</label> (<label class="text-danger">*</label>Wajib diisi ketika memilih Kanal Publikasi Media Sosial dan Website)

                       <input type="text" class="form-control" name="linktautan" id="linktautan" placeholder="Link Tautan" onkeyup="$('#formClient-Username').val(createUsername(this.value))" autofocus />
                     </div>

                     <div class="form-group" style="display:none;" id="divFileDokumentasi">
                       <label for="formClient-Name">Dokumentasi<label class="text-danger">*</label></label>

                         <input type="file" class="form-control" required title="Bagian ini wajib diisi" name="fileDokumentasi" id="fileDokumentasi" accept="image/*"/>


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
         <div class="modal-footer text-right">
           <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> -->
           <button type="submit" class="btn btn-primary">Simpan</button>
         </div>

         <?php echo form_close(); ?>
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


</section>
<!-- /.content -->

<script type="text/javascript">
   const el = document.getElementById('kanalpublikasi');
   const etLainnya = document.getElementById('textlainnya');
   const etLinkTautan = document.getElementById('divLinkTautan');
   const etFileDokumentasi = document.getElementById('divFileDokumentasi');
   // const divNamaKSD = document.getElementById('divNamaKSD');

   el.addEventListener('change', function handleChange(event) {
     if (event.target.value == '1' || event.target.value == '2' || event.target.value == '3' || event.target.value == '7') {
       etLinkTautan.style.display = 'none';
       etFileDokumentasi.style.display = 'block';
       etLainnya.style.display = 'none';
     }
      else if (event.target.value == '9') {
         etLainnya.style.display = 'block';
         etLinkTautan.style.display = 'block';
         etFileDokumentasi.style.display = 'none';
       } else {
         etLinkTautan.style.display = 'block';
         etFileDokumentasi.style.display = 'none';
         etLainnya.style.display = 'none';
      }
   });
</script>

<script type="text/javascript">
   const eledit = document.getElementById('kanalpublikasiedit');
   const etLainnyaedit = document.getElementById('textlainnyaedit');
   const etLinkTautanEdit = document.getElementById('divLinkTautanEdit');
   const etFileDokumentasiEdit = document.getElementById('divFileDokumentasiEdit');
   // const divNamaKSD = document.getElementById('divNamaKSD');

   eledit.addEventListener('change', function handleChange(event) {
     if (event.target.value == '1' || event.target.value == '2' || event.target.value == '3' || event.target.value == '7') {
       etLinkTautanEdit.style.display = 'none';
       etFileDokumentasiEdit.style.display = 'block';
       etLainnyaedit.style.display = 'none';
     }
      else if (event.target.value == '9') {
         etLainnyaedit.style.display = 'block';
         etLinkTautanEdit.style.display = 'block';
         etFileDokumentasiEdit.style.display = 'none';
       } else {
         etLinkTautanEdit.style.display = 'block';
         etFileDokumentasiEdit.style.display = 'none';
         etLainnyaedit.style.display = 'none';
      }
   });
</script>


<script>
  $(document).ready(function() {
    $('.form-validates').validate();
    $('.form-validate').validate();
    $('.form-validate-edit').validate();

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
