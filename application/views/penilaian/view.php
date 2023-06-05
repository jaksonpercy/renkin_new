<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>

<?php
$nilaiStrakom = 0;
$nilaiEditorial =0;
$nilaiMitigasi =0;
 ?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
            <?php if ($strakom->ksd_id > 0){
              foreach ($ksd as $rows):
                if ($rows->id == $strakom->ksd_id ) {
                  echo $rows->nama;
                }
             endforeach;
            } else {
                echo $strakom->nama_program;
            }
            ?>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo lang('home') ?></a></li>
              <li class="breadcrumb-item"><a href="<?php echo url('/StrakomUnggulan') ?>">Strategi Komunikasi Unggulan</a></li>
              <!-- <li class="breadcrumb-item active"><?php echo $User->id ?></li> -->
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

                <ul class="nav nav-pills ml-auto p-2">

					<li class="nav-item active"><a class="nav-link active" href="#tab_1" data-toggle="tab">Detail</a></li>
					<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Editorial Plan</a></li>
          <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Uraian Mitigasi</a></li>
          <!-- <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Realisasi</a></li> -->



                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
				  <div class="row">
          <?php if ($roles->role->role_id==1):?>
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
                        array_push($namaRencana,$rows->nama);
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
                      echo '<p class="text-warning"><strong>Menunggu Finalisasi</strong></p>';
                    } else if ($strakom->status == 1) {
                      echo '<p class="text-primary"><strong>Finalisasi</strong></p>';
                    } else if ($strakom->status == 2) {
                      echo '<p class="text-success"><strong>Disetujui</strong></p>';
                    } else {
                      echo '<p class="text-danger"><strong>Ditolak</strong></p>';
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
                    <td width="160"><strong>Nama OPD</strong>:</td>
                    <td><?php
                    foreach ($user as $rows):
                      if ($rows->id == $strakom->user_id ) {
                        echo $rows->name;
                      }
                   endforeach;
                    ?></td>
                  </tr>
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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-nilai-strakom">Nilai</button>

            </div>
          <?php endif ?>
      	</div>
                  </div>


                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <table id="example2" class="table table-bordered table-hover table-striped">
                      <thead>
                        <tr>
                          <th style="vertical-align:middle;text-align:center;">No</th>
                          <th style="vertical-align:middle;text-align:center;">Tanggal Rencana Tayang</th>
                          <th style="vertical-align:middle;text-align:center;">Pesan Utama</th>
                          <th style="vertical-align:middle;text-align:center;">Produk Komunikasi</th>
                          <th style="vertical-align:middle;text-align:center;">Khalayak</th>
                          <th style="vertical-align:middle;text-align:center;">Kanal Komunikasi</th>
                          <th style="vertical-align:middle;text-align:center;"><?php echo lang('action') ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no=0;
                        foreach ($editorialplan as $row):

                        $no++;
                        ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $row->tanggal_rencana ?></td>
                          <td><?php echo $row->pesan_utama ?></td>
                          <td>
                            <?php
                              foreach ($produkkomunikasi as $rows):
                                if ($rows->id == $row->produk_komunikasi ) {
                                  echo $rows->nama;
                                }
                             endforeach;
                            ?>
                          </td>
                          <td><?php echo $row->khalayak ?></td>
                          <td>
                            <?php
                              foreach ($rencanamedia as $rows):
                                if ($rows->id == $row->kanal_komunikasi ) {
                                  echo $rows->nama;
                                }
                             endforeach;
                            ?>
                          </td>
                          <td>
                          <a href="<?php echo url('EditorialPlan/view/'.$row->id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>

                          </td>
                        </tr>
                        <?php

                        endforeach ?>
                      </tbody>
                    </table>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-nilai-editorial">Nilai</button>

                  </div>


                  <div class="tab-pane" id="tab_3">
                    <table id="example3" class="table table-bordered table-hover table-striped">
                      <thead>
                        <tr>
                          <th style="vertical-align:middle;text-align:center;">No</th>
                          <th style="vertical-align:middle;text-align:center;">Nama Program/Kegiatan Strategi Komunikasi Unggulan</th>
                          <th style="vertical-align:middle;text-align:center;">Uraian Potensi Krisis</th>
                          <th style="vertical-align:middle;text-align:center;">Stakeholder Pro Pemprov DKI Jakarta</th>
                          <th style="vertical-align:middle;text-align:center;">Stakeholder Kontra Pemprov DKI Jakarta</th>
                          <th style="vertical-align:middle;text-align:center;">Juru Bicara</th>
                          <th style="vertical-align:middle;text-align:center;">PIC Kegiatan yang Dapat Dihubungi</th>
                          <th style="vertical-align:middle;text-align:center;">Data Pendukung Kegiatan</th>
                          <th style="width:10%;vertical-align:middle;text-align:center;"><?php echo lang('action') ?></th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $no=0;
                        foreach ($mitigasi as $row):
                          $no++;
                        ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $row->nama_program ?></td>
                          <td><?php echo $row->uraian_potensi ?></td>
                          <td><?php echo $row->stakeholder_pro ?></td>
                          <td><?php echo $row->stakeholder_kontra ?></td>
                          <td><?php echo $row->juru_bicara ?></td>
                          <td><?php echo $row->pic_kegiatan ?></td>
                          <td>
                          <?php if(empty($row->data_pendukung_text)){ ?>
                          <a href="<?php echo url('/uploads/mitigasifile/'.$row->data_pendukung_file); ?>">Lihat Dokumen</a>
                        <?php } else { ?>
                          <a href="<?php echo url('/uploads/mitigasifile/'.$row->data_pendukung_text); ?>">Lihat Dokumen</a>
                        <?php } ?>
                          </td>
                          <td>
                            <a href="<?php echo url('Mitigasi/view/') ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>

                          </td>
                        </tr>
                        <?php

                        endforeach ?>
                        </tbody>
                    </table>

          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-nilai-mitigasi">Nilai</button>

                  </div>

                  <div class="tab-pane" id="tab_4">
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

                    <table id="dataTable1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal Realisasi</th>
                        <th>Judul</th>
                        <th>Media dan Tautan</th>
                        <th>Dokumentasi</th>
                        <!-- <th><?php echo lang('action') ?></th> -->
                      </tr>
                      </thead>
                   <tbody>


                     <tr>
                        <td>1</td>
                        <td>5 Januari 2023</td>
                        <td>Perubahan titik Jakwifi salah satunya didasari hasil survei</td>
                        <td>Instagram : <br> Facebook : </td>
                        <td></td>

                        <!-- <td>
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-ubah"> <span class="pr-1"><i class="fa fa-edit"></i></span></button> -->
                          <!-- <a href="<?php echo url('realisasi/edit/') ?>" class="btn btn-sm btn-primary" title="Edit" data-toggle="tooltip"><i class="fa fa-edit"></i></a> -->
                          <!-- <a href="<?php echo url('realisasi/realisasiview/') ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a> -->
                          <!-- <a href="<?php echo url('realisasi/delete/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini ?')" title="Hapus" data-toggle="tooltip"><i class="fa fa-trash"></i></a> -->

                        <!-- </td> -->
                     </tr>


                   </tbody>
                 </table>

          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-nilai-mitigasi">Nilai</button>

                  </div>

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <div class="modal-footer justify-content-between">
            <a href="<?php echo url('/'); ?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
          </div>
          <!-- /.col -->
        </div>




        <!-- /.row -->
        <!-- END CUSTOM TABS -->

        <div class="modal fade" id="modal-nilai-strakom">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Nilai Strategi Komunikasi Unggulan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-12">
                <!-- Default card -->
                <div class="form-group col-sm-2">
                  <label for="formClient-Name">Beri Nilai (%)</label>
                  <input type="text" class="form-control" name="nilai" id="formClient-Nilai" value="30"></input>
                </div>

                    <div class="form-group">
                      <label for="formClient-Name">Catatan</label>
                      <textarea type="text" class="form-control" name="alasan" id="formClient-Alasan" placeholder="Catatan" rows="5"></textarea>
                    </div>
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

      <div class="modal fade" id="modal-nilai-editorial">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Nilai Editorial Plan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12">
              <!-- Default card -->
              <div class="form-group col-sm-2">
                <label for="formClient-Name">Beri Nilai (%)</label>
                <input type="text" class="form-control" name="nilai" id="formClient-Nilai" value="30"></input>
              </div>

                  <div class="form-group">
                    <label for="formClient-Name">Catatan</label>
                    <textarea type="text" class="form-control" name="alasan" id="formClient-Alasan" placeholder="Catatan" rows="5"></textarea>
                  </div>
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

    <div class="modal fade" id="modal-nilai-mitigasi">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Nilai Uraian Mitigasi Krisis</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-sm-12">
            <!-- Default card -->
            <div class="form-group col-sm-2">
              <label for="formClient-Name">Beri Nilai (%)</label>
              <input type="text" class="form-control" name="nilai" id="formClient-Nilai" value="30"></input>
            </div>

                <div class="form-group">
                  <label for="formClient-Name">Catatan</label>
                  <textarea type="text" class="form-control" name="alasan" id="formClient-Alasan" placeholder="Catatan" rows="5"></textarea>
                </div>
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
</section>

<?php include viewPath('includes/footer'); ?>

<script>
	$('#dataTable1').DataTable({
    "order": []
  });
</script>
