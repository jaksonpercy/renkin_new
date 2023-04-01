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
              <li class="breadcrumb-item"><a href="<?php echo url('/realisasi') ?>">Realisasi</a></li>
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
                    <div class="card-header d-flex p-0">
                    <div class="ml-auto p-2">

                      <a href="<?php echo url('realisasi/add') ?>" class="btn btn-primary btn-sm"><span class="pr-1"><i class="fa fa-plus"></i></span> Tambah Realisasi</a>

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
                <a href="<?php echo url('realisasi/edit/') ?>" class="btn btn-sm btn-primary" title="Edit" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
                <a href="<?php echo url('realisasi/realisasiview/') ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                <a href="<?php echo url('realisasi/delete/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini ?')" title="Hapus" data-toggle="tooltip"><i class="fa fa-trash"></i></a>

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
        <!-- /.row -->
        <!-- END CUSTOM TABS -->

</section>

<?php include viewPath('includes/footer'); ?>

<script>
	$('#dataTable1').DataTable({
    "order": []
  });
</script>
