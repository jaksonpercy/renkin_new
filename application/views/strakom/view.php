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
              <li class="breadcrumb-item"><a href="<?php echo url('/StrakomUnggulan') ?>">Strategi Komunikasi Unggulan</a></li>
              <li class="breadcrumb-item active"><?php echo $strakom->id ?></li>
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
					<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Editorial Plan</a></li>
          <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Uraian Mitigasi</a></li>

						<li class="nav-item"><a class="nav-link" href="<?php echo url('StrakomUnggulan/edit/'.$strakom->id) ?>">Edit</a></li>


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
                  <td width="160"><strong>Kategori Program/Kegiatan</strong>:</td>
                  <td>
                    <?php if ($strakom->kategori_program == 1){
                      echo "Isu Prioritas";
                    } else if ($strakom->kategori_program == 2) {
                      echo "KSD";
                    } else {
                        echo "Program Unggulan Perangkat Daerah";
                    } ?>
                  </td>
                </tr>
      					<tr>
      						<td width="160"><strong>Nama Program/Kegiatan</strong>:</td>
      						<td><?php if ($strakom->ksd_id > 0){
                    foreach ($ksd as $rows):
                      if ($rows->id == $strakom->ksd_id ) {
                        echo $rows->nama;
                      }
                   endforeach;
                  } else {
                      echo $strakom->nama_program;
                  }
                  ?></td>
      					</tr>
      					<tr>
      						<td><strong>Jenis Kegiatan</strong>:</td>
      						<td><?php
                  foreach ($jeniskegiatan as $rows):
                      if ($rows->id == $strakom->jenis_kegiatan ) {
                        echo $rows->nama;
                      }
                   endforeach ?></td>
      					</tr>
      					<tr>
      						<td><strong>Deskripsi Singkat Kegiatan</strong>:</td>
      						<td><?php echo $strakom->deskripsi ?></td>
      					</tr>
      					<tr>
      						<td><strong>Analisis Situasi</strong>:</td>
      						<td><?php echo $strakom->analisis_situasi ?></td>
      					</tr>
      					<tr>
      						<td><strong>Identifikasi Masalah/Isu Utama</strong>:</td>
      						<td><?php echo $strakom->identifikasi_masalah ?></td>
      					</tr>
      					<tr>
      						<td><strong>Narasi Utama Publikasi Program</strong>:</td>
      						<td><?php echo $strakom->narasi_utama ?></td>
      					</tr>
                <tr>
                  <td><strong>Target Audiens</strong>:</td>
                  <td>Pro : <?php echo $strakom->target_pro ?> <br> Kontra :
                  <?php echo $strakom->target_kontra ?></td>
                </tr>
                <tr>
                  <td><strong>Rencana Media/Kanal Publikasi</strong>:</td>
                  <td><?php
                  $namaRencana = array();
                  $my_array1 = explode(",", $strakom->kanal_publikasi);
                  foreach ($my_array1 as $row){
                    foreach ($rencanamedia as $rows){
                      if ($rows->id == $row ) {
                        array_push($namaRencana,$rows->nama);
                      }
                   }
                }
                echo implode(", ",$namaRencana);
                 ?>
                </td>
                </tr>
      				</tbody>
      			</table>
      		</div>
      	</div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
				  <table id="dataTable1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Rencana Tayang</th>
              <th>Pesan Utama</th>
              <th>Produk Komunikasi</th>
              <th>Khalayak</th>
              <th>Kanal Komunikasi</th>
              <th><?php echo lang('action') ?></th>
            </tr>
            </thead>
					<tbody>


						<tr>
              <td>1</td>
              <td>5 Januari 2023</td>
              <td>Perubahan titik Jakwifi salah satunya didasari hasil survei</td>
              <td>Artikel</td>
              <td>- Pengurangan anggaran DKI Jakarta untuk JakWifi & titik pengurangan JakWifi <br>
                  - Isu - isu politis</td>
              <td>Instagram</td>
						<td>
							<a href="<?php echo url('EditorialPlan/view/'.$row->id) ?>" class="btn btn-sm btn-default" title="Lihat Data" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
						</td>
						</tr>


					</tbody>
				</table>
                  </div>


                  <div class="tab-pane" id="tab_3">
				  <table id="dataTable1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th><?php echo lang('id') ?></th>
              <th>Nama Kegiatan</th>
              <th>Stakeholder Pro Pemprov DKI Jakarta</th>
              <th>Stakeholder Kontra Pemprov DKI Jakarta</th>
              <th>Juru Bicara</th>
              <th>PIC Kegiatan yang Dapat Dihubungi</th>
              <th><?php echo lang('action') ?></th>
            </tr>
            </thead>
					<tbody>


						<tr>
              <td>1</td>
              <td>Publikasi Layanan JakWifi</td>
              <td>Masyarakat umum</td>
              <td>- Masyarakat yang belum dapat memanfaatkan jaringan internet gratis yang disediakan Pemprov DKI Jakarta <br>
- Masyarakat yang merasakan kualitas internet yang disediakan pemda tidak sesuai dengan harapan <br>
- Anggota legislatif yang melihat bahwa manfaat tidak sebanding dengan biaya yang dikeluarkan pemda"
</td>
              <td>Plt. Kepala Dinas Kominfotik Provinsi DKI Jakarta</td>
              <td>Aditya Prana (Kabid JKD) 08128748447 <br>
Dema (Kasie ) 08161431790 <br>
Service desk +62 852-1654-1900 <br>
</td>
						<td>
							<a href="<?php echo url('Mitigasi/view/'.$row->id) ?>" class="btn btn-sm btn-default" title="Lihat Data" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
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
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-finalisasi">Finalisasi</button>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END CUSTOM TABS -->

        <div class="modal fade" id="modal-finalisasi">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Finalisasi</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Apakah kamu yakin untuk melakukan finalisasi Rencana Kinerja ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                  <button type="button" class="btn btn-primary">Ya, Saya Yakin</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
</section>

<?php include viewPath('includes/footer'); ?>

<script>
	$('#dataTable1').DataTable({
    "order": []
  });
</script>
