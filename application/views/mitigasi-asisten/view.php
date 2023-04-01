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
              <li class="breadcrumb-item"><a href="<?php echo url('/mitigasi') ?>">Uraian Materi Mitigasi Krisis</a></li>
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
      						<td width="160"><strong>Nama Kegiatan</strong>:</td>
      						<td>Publikasi Layanan JakWifi</td>
      					</tr>
      					<tr>
      						<td><strong>Uraian Potensi Krisis</strong>:</td>
      						<td>1. Kecepatan jaringan tidak sesuai harapan users <br>
2. Jaringan sulit diakses <br>
3. Jumlah Jaringan Wifi untuk publik belum banyak secara jumlah <br>
4. Jaringan mati <br>
5. Respon time terhadap troubleshooting lama <br>
6. Pembiayaan per titik jaringan <br>
7. Pengurangan jumlah titik <br>
</td>
      					</tr>
      					<tr>
      						<td><strong>Stakeholder Pro Pemprov DKI Jakarta</strong>:</td>
      						<td>Masyarakat umum</td>
      					</tr>
                <tr>
      						<td><strong>Stakeholder Kontra Pemprov DKI Jakarta</strong>:</td>
      						<td>- Masyarakat yang belum dapat memanfaatkan jaringan internet gratis yang disediakan Pemprov DKI Jakarta <br>
- Masyarakat yang merasakan kualitas internet yang disediakan pemda tidak sesuai dengan harapan <br>
- Anggota legislatif yang melihat bahwa manfaat tidak sebanding dengan biaya yang dikeluarkan pemda
</td>
      					</tr>
                <tr>
      						<td><strong>Juru Bicara</strong>:</td>
      						<td>Plt. Kepala Dinas Kominfotik Provinsi DKI Jakarta</td>
      					</tr>
                <tr>
                  <td><strong>Data Pendukung Kegiatan / Bahan Komunikasi</strong>:</td>
                  <td></td>
                </tr>
                <tr>
                  <td><strong>PIC Kegiatan yang Dapat Dihubungi</strong>:</td>
                  <td>Aditya Prana (Kabid JKD) 08128748447 <br>
Dema (Kasie ) 08161431790 <br>
Service desk +62 852-1654-1900
</td>
                </tr>
      				</tbody>
      			</table>
      		</div>
      	</div>
                  </div>
                  <!-- /.tab-pane -->
                  <d

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
