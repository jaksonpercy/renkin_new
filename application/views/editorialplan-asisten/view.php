<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editorial Plan #1</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo lang('home') ?></a></li>
              <li class="breadcrumb-item"><a href="<?php echo url('/editorialplan') ?>">Editorial Plan</a></li>
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
      						<td width="160"><strong>Tanggal Rencana Tayang</strong>:</td>
      						<td>5 Januari 2023</td>
      					</tr>
      					<tr>
      						<td><strong>Pesan Utama</strong>:</td>
      						<td>Perubahan titik Jakwifi salah satunya didasari hasil survei</td>
      					</tr>
      					<tr>
      						<td><strong>Produk Komunikasi</strong>:</td>
      						<td>Artikel</td>
      					</tr>
      					<tr>
      						<td><strong>Khalayak</strong>:</td>
      						<td>- Pengurangan anggaran JakWifi yang berdampak berkurangnya jumlah titik JakWifi dari 3500 menjadi 1200 titik <br>
- Telah berubahnya status Pandemi menjadi Endemi <br>
- Sekolah dan Kantor sudah kembali melaksanakan kegiatan tatap muka 100%</td>
      					</tr>
      					<tr>
      						<td><strong>Kanal Komunikasi</strong>:</td>
      						<td>Instagram</td>
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
