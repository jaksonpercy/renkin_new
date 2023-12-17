<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>

<style>
.error {
	color:#ff0000;
}
</style>

<?php
	$countData =0; ?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
            Detail Strategi Komunikasi Unggulan
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo lang('home') ?></a></li>
              <li class="breadcrumb-item"><a href="<?php echo url('/HistoryStrakom') ?>">History Strategi Komunikasi Unggulan</a></li>

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


                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
				  <div class="row">
          <?php if ($roles->role->role_id==1):
						?>
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
									<?php if ($strakom->kategori_program == 1){ ?>
      						<td width="160"><strong>Nama Program/Kegiatan</strong>:</td>
								<?php } else if ($strakom->kategori_program == 2) { ?>
										<td width="160"><strong>Nama KSD</strong>:</td>
								<?php } else { ?>
										<td width="160"><strong>Nama Program Unggulan</strong>:</td>
								<?php } ?>
      						<td>
										<?php
									// 	if ($strakom->ksd_id > 0){
                  //   foreach ($ksd as $rows):
                  //     if ($rows->id == $strakom->ksd_id ) {
                  //       echo $rows->nama;
                  //     }
                  //  endforeach;
                  // } else {
                      echo $strakom->nama_program;
                  // }
                  ?></td>
      					</tr>
                <?php if (!empty($strakom->jenis_kegiatan)) {

                ?>
      					<tr>
      						<td><strong>Jenis Kegiatan</strong>:</td>
      						<td><?php
                  foreach ($jeniskegiatan as $rows):
                      if ($rows->id == $strakom->jenis_kegiatan ) {
                        echo $rows->nama;
                      }
                   endforeach ?></td>
      					</tr>
              <?php } ?>
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
                        if($row == 9){
                          array_push($namaRencana,$rows->nama." ( ".$strakom->kanal_publikasi_lainnya." )");
                        
                        } else {
                          array_push($namaRencana,$rows->nama);
                        }
                      }
                   }
                }
                echo implode(", ",$namaRencana);
                 ?>
                </td>
                </tr>
                <tr>
                  <td><strong>Status</strong>:</td>
                  <td>
                    <?php if ($strakom->status == 0) {
                      echo '<p class="text-warning"><strong>Belum Dikirim</strong></p>';
                    } else if ($strakom->status == 1) {
											if($counteditorialrejected > 1 || $countmitigasirejected > 1){
												echo "<p class='text-danger'><strong>Perlu Diperbaiki </strong></p>";
											} else {
                      echo '<p class="text-primary"><strong>Dikirim</strong></p>';
										}
                    } else if ($strakom->status == 2) {
                      echo '<p class="text-success"><strong>Disetujui</strong></p>';
                    } else if ($strakom->status == 5 ||$strakom->status == 6 ) {
                      echo '<p class="text-success"><strong>Dinilai</strong></p>';
                    }
										else {
                      echo "<p class='text-danger'><strong>Perlu Diperbaiki ($strakom->alasan) </strong></p>";
                    } ?>
                  </td>
                </tr>
      				</tbody>
      			</table>
      		</div>


          <?php else:?>
            <div class="col-sm-12">
              <table class="table table-bordered table-striped">
								<tbody>
	                <tr>
	                  <td width="160"><strong>Kategori Program/Kegiatan</strong>:</td>
	                  <td>
	                    <?php if ($strakom->kategori_kegiatan == 1){
	                      echo "Janji Gubernur";
	                    } else if ($strakom->kategori_kegiatan == 2) {
	                      echo "Kegiatan Strategis Daerah";
	                    } else if ($strakom->kategori_kegiatan == 3) {
	                      echo "Rencana Strategis";
	                    } else {
	                        echo $strakom->ket_kategori_kegiatan ;
	                    } ?>
	                  </td>
	                </tr>
	      					<tr>
											<td width="160"><strong>Nama Program/Kegiatan</strong>:</td>

	      						<td><?php

										// if ($strakom->ksd_id > 0){
	                  //   foreach ($ksd as $rows):
	                  //     if ($rows->id == $strakom->ksd_id ) {
	                  //       echo $rows->nama;
	                  //     }
	                  //  endforeach;
	                  // } else {
	                      echo $strakom->nama_kegiatan;
	                  // }
	                  ?></td>
	      					</tr>

	      					<tr>
	      						<td><strong>Deskripsi Singkat Kegiatan</strong>:</td>
	      						<td><?php

										echo $strakom->deskripsi_kegiatan ?></td>
	      					</tr>
	      					<tr>
	      						<td><strong>Analisis Situasi</strong>:</td>
	      						<td><?php

										echo $strakom->poin_poin_utama ?></td>
	      					</tr>
	      					<tr>
	      						<td><strong>Identifikasi Masalah/Isu Utama</strong>:</td>
	      						<td><?php

										echo $strakom->isu_utama ?></td>
	      					</tr>
	      					<tr>
	      						<td><strong>Narasi Utama Publikasi Program</strong>:</td>
	      						<td><?php

										echo $strakom->narasi_utama ?></td>
	      					</tr>
	                <tr>
	                  <td><strong>Target Audiens</strong>:</td>
	                  <td>
	                  <?php

										echo $strakom->target_audiens ?></td>
	                </tr>
	                <tr>
	                  <td><strong>Rencana Media/Kanal Publikasi</strong>:</td>
	                  <td><?php
										echo $strakom->ket_rencana_media_komunikasi;
	                 ?>
	                </td>
	                </tr>
									<tr>
									 <td><strong>Tanggal Dibuat</strong>:</td>
									 <td><?php
									 echo $strakom->d_created_date;
									?>
								 </td>
								 </tr>
	                <tr>

	                </tr>
	      				</tbody>
              </table>
            </div>
          <?php endif ?>
      	</div>
                  </div>
                  <!-- /.tab-pane -->









                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->

              <div class="modal-footer justify-content-between">

                <a href="<?php echo url('/HistoryStrakomNow') ?>" class="btn btn-flat btn-secondary">Kembali</a>
              </div>
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
    "order": [],
    "pageLength": 25,
  });
</script>
