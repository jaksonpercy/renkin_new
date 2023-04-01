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

            <li class="nav-item"><a class="nav-link" href="<?php echo url('realisasi/edit/'.$User->id) ?>">Edit</a></li>


              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
				  <div class="row">

      		<div class="col-sm-12">
      			<table class="table table-bordered table-striped">
      				<tbody>
      					<tr>
      						<td width="160"><strong>Tanggal Realisasi</strong>:</td>
      						<td>5 Januari 2023</td>
      					</tr>
      					<tr>
      						<td><strong>Judul</strong>:</td>
      					  <td> Perubahan titik Jakwifi salah satunya didasari hasil survei</td>
      					</tr>
                <tr>
      						<td><strong>Media dan Tautan</strong>:</td>
      					  <td> Instagram : <br> Facebook :</td>
      					</tr>
                <tr>
      						<td><strong>Dokumentasi</strong>:</td>
      					  <td> <a href="#">Download Dokumentasi</a></td>
      					</tr>

      				</tbody>
      			</table>
      		</div>
      	</div>
                  </div>
                  <!-- /.tab-pane -->





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
