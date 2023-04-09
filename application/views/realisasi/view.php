<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Publikasi Layanan JakWifi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo lang('home') ?></a></li>
              <li class="breadcrumb-item"><a href="<?php echo url('/Realisasi') ?>">Realisasi</a></li>
              <li class="breadcrumb-item active"><?php echo $User->id ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->

<!-- Main content -->
<section class="content">

<div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Detail</h3>
                <ul class="nav nav-pills ml-auto p-2">

					<li class="nav-item active"><a class="nav-link active" href="#tab_1" data-toggle="tab">Detail</a></li>
					<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Daftar Realisasi</a></li>

                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
				  <div class="row">

      		<div class="col-sm-12">
      			<table class="table table-bordered table-striped">
      				<tbody>
      					<tr>
      						<td width="160"><strong>Nama Program/Kegiatan</strong>:</td>
      						<td>Publikasi Layanan JakWifi</td>
      					</tr>
                <tr>
                  <td width="160"><strong>No Lampiran</strong>:</td>
                  <td>Lamp-001</td>
                </tr>
                <tr>
                  <td width="160"><strong>Nama Lampiran</strong>:</td>
                  <td>Lampiran 1</td>
                </tr>
                <tr>
                  <td width="160"><strong>Tanggal Lampiran</strong>:</td>
                  <td>03-04-2023</td>
                </tr>
      					<tr>
      						<td><strong>Nota Dinas</strong>:</td>
      					  <td> <a href="#">Download File Nota Dinas</a> </td>
      					</tr>

      				</tbody>
      			</table>
      		</div>
      	</div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
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
              <th>Media dan Tautan</th>
              <th>Dokumentasi</th>
              <th><?php echo lang('action') ?></th>
            </tr>
            </thead>
					<tbody>


						<tr>
              <td>1</td>
              <td>5 Januari 2023</td>
              <td>Perubahan titik Jakwifi salah satunya didasari hasil survei</td>
              <td>Instagram : <br> Facebook : </td>
              <td></td>

              <td>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-ubah"> <span class="pr-1"><i class="fa fa-edit"></i></span></button>
                <!-- <a href="<?php echo url('realisasi/edit/') ?>" class="btn btn-sm btn-primary" title="Edit" data-toggle="tooltip"><i class="fa fa-edit"></i></a> -->
                <!-- <a href="<?php echo url('realisasi/realisasiview/') ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a> -->
                <a href="<?php echo url('Realisasi/delete/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini ?')" title="Hapus" data-toggle="tooltip"><i class="fa fa-trash"></i></a>

              </td>
						</tr>


					</tbody>
				</table>
                  </div>




                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>

          <!-- /.col -->
        </div>


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
                                <label for="formClient-Contact">Nama Rencana Kinerja*</label>
                                <select name="jenisKegiatan" id="formClient-Role" class="form-control" required>
                                  <option value="-">Pilih Rencana Kinerja</option>
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
                                <label for="formClient-Address">Media dan Tautan*</label>
                                <textarea type="text" class="form-control" name="mediatautan" id="formClient-Address" placeholder="Media dan Tautan" rows="5"></textarea>
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
                          <label for="formClient-Contact">Nama Rencana Kinerja*</label>
                          <select name="jenisKegiatan" id="formClient-Role" class="form-control" required>
                            <option value="-">Pilih Rencana Kinerja</option>
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
                          <label for="formClient-Address">Media dan Tautan*</label>
                          <textarea type="text" class="form-control" name="mediatautan" id="formClient-Address" placeholder="Media dan Tautan" rows="5"></textarea>
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
        <!-- /.row -->
        <!-- END CUSTOM TABS -->

</section>

<?php include viewPath('includes/footer'); ?>

<script>
	$('#dataTable1').DataTable({
    "order": []
  });
</script>
