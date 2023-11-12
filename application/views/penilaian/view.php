<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>

<?php
$nilaiStrakom = 0;
$nilaiEditorial =0;
$nilaiMitigasi =0;
$nilaiRealisasi =0;
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

					<li class="nav-item active"><a class="nav-link active" href="#tab_1" data-toggle="tab">Strategi Komunikasi Unggulan</a></li>
					<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Editorial Plan</a></li>
          <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Uraian Mitigasi</a></li>
          <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Realisasi</a></li>



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
                    <td>
                    <?php
                        echo $strakom->nama_program;
                  ?>
                  </td>
                  </tr>
                  <!-- <tr>
                    <td><strong>Jenis Kegiatan</strong>:</td>
                    <td><?php
                    foreach ($jeniskegiatan as $rows):
                        if ($rows->id == $strakom->jenis_kegiatan ) {
                          echo $rows->nama;
                        }
                     endforeach ?></td>
                  </tr> -->
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
              <?php
              $countStrakom=0;
              if (!empty($strakom->nama_program)) {
                $countStrakom ++;
              }

              if (!empty($strakom->deskripsi)) {
                $countStrakom ++;
              }

              if (!empty($strakom->analisis_situasi)) {
                $countStrakom ++;
              }

              if (!empty($strakom->identifikasi_masalah)) {
                $countStrakom ++;
              }

              if (!empty($strakom->narasi_utama)) {
                $countStrakom ++;
              }

              if (!empty($strakom->target_pro)) {
                $countStrakom ++;
              }

              if (!empty($strakom->target_kontra)) {
                $countStrakom ++;
              }

              if (!empty($strakom->kanal_publikasi)) {
                $countStrakom ++;
              }

              $nilaiStrakom = ($countStrakom/8)*20;
              ?>

              <?php if($periode->status_penilaian > 0 && ($strakom->status == 2 || $strakom->status == 5 || $strakom->status == 6)){ ?>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-nilai-strakom">Nilai</button>
            <?php } ?>
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
                        if($row->status == 2){
                        $no++;
                        }
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

                        <?php
                        $nilaiEditorial = ($no/15)*20;
                        ?>
                      </tbody>
                    </table>
                      <?php if($periode->status_penilaian > 0&& $no >=15){ ?>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-nilai-editorial">Nilai</button>
        <?php } ?>
                  </div>


                  <div class="tab-pane" id="tab_3">
                    <table id="example3" class="table table-bordered table-hover table-striped">
                      <thead>
                        <tr>
                          <th style="vertical-align:middle;text-align:center;">No</th>
                          <th style="vertical-align:middle;text-align:center;">Nama Program/Kegiatan Strategi Komunikasi Unggulan</th>
                          <th style="vertical-align:middle;text-align:center;">Uraian Potensi Krisis</th>
                          <th style="vertical-align:middle;text-align:center;">Stakeholder Pro Pemprov</th>
                          <th style="vertical-align:middle;text-align:center;">Stakeholder Kontra Pemprov</th>
                          <th style="vertical-align:middle;text-align:center;">Juru Bicara</th>
                          <th style="vertical-align:middle;text-align:center;">PIC Kegiatan yang Dapat Dihubungi</th>
                          <th style="vertical-align:middle;text-align:center;">Data Pendukung Kegiatan</th>
                          <th style="width:10%;vertical-align:middle;text-align:center;"><?php echo lang('action') ?></th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $no=0;
                        $jumlah=0;
                        foreach ($mitigasi as $row):
                          $no++;
                        ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $row->nama_program ?></td>
                          <td><?php
                          if(!empty($row->uraian_potensi)){
                            $jumlah+=5;
                          }
                          echo $row->uraian_potensi
                          ?></td>
                          <td><?php
                          if(!empty($row->stakeholder_pro)){
                            $jumlah+=5;
                          }
                          echo $row->stakeholder_pro
                          ?></td>
                          <td><?php
                          if(!empty($row->stakeholder_kontra)){
                            $jumlah+=5;
                          }
                          echo $row->stakeholder_kontra
                          ?></td>
                          <td><?php
                          if(!empty($row->juru_bicara)){
                            $jumlah+=5;
                          }
                          echo $row->juru_bicara
                          ?></td>
                          <td><?php
                          if(!empty($row->pic_kegiatan)){
                            $jumlah+=5;
                          }
                          echo $row->pic_kegiatan
                          ?></td>
                          <td>
                          <?php
                          if(!empty($row->data_pendukung_text) ||!empty($row->data_pendukung_file)  ){
                            $jumlah+=5;
                          }
                         ?>
                         <?php if(!empty($row->data_pendukung_text) && !empty($row->data_pendukung_file) ){
                           ?>
                         <?php if (!filter_var($row->data_pendukung_text, FILTER_VALIDATE_URL)) { ?>
                           <a href="" onclick="alert('Invalid URL Format')"><?php echo $row->data_pendukung_text ?></a> <br>
                         <?php } else { ?>
                           <a href="<?php echo $row->data_pendukung_text ?>" target="_blank"><?php echo $row->data_pendukung_text ?></a> <br>
                         <?php } ?>
                           <a href="<?php echo url('Mitigasi/downloadFile/'.$row->data_pendukung_file); ?>" target="_blank">Lihat Dokumen</a>
 <!--  -->
                         <!-- <a href="<?php echo str_replace("/index.php","", base_url('/uploads/mitigasifile/'.$row->data_pendukung_file)); ?>" target="_blank">Lihat Dokumen</a> -->
                         <!-- <a href="<?php echo url('Mitigasi/downloadFile/'.$row->data_pendukung_file); ?>">Lihat Dokumen</a> -->
 <!--  -->
                       <?php } else {
                         if(empty($row->data_pendukung_text) && !empty($row->data_pendukung_file)) {
                        ?>
                        <a href="<?php echo url('Mitigasi/downloadFile/'.$row->data_pendukung_file); ?>" target="_blank">Lihat Dokumen</a>

                       <?php
                       } else {

                        ?>
                        <a href="<?php echo $row->data_pendukung_text ?>" target="_blank"><?php echo $row->data_pendukung_text ?></a>
                      <?php }} ?>
                          </td>
                          <td>
                            <a href="<?php echo url('Mitigasi/view/') ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>

                          </td>
                        </tr>
                        <?php

                        endforeach ?>
                        <?php
                        $nilaiMitigasi = $jumlah / $no;
                         ?>
                        </tbody>
                    </table>
  <?php if($periode->status_penilaian > 0 && $no > 0){ ?>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-nilai-mitigasi">Nilai</button>
<?php } ?>
                  </div>

                  <div class="tab-pane" id="tab_4">
                    <div class="col-sm-12">
                			<table class="table table-bordered table-striped">
                				<tbody>
                          <tr>
                						<td width="160"><strong>Nama Program/Kegiatan Strategi Komunikasi</strong>:</td>
                						<td><?php echo $strakom->nama_program ?></td>
                					</tr>
                          <tr>
                            <td width="160"><strong>No Nota Dinas/Surat</strong>:</td>
                            <td><?php echo $strakom->no_nota_dinas ?></td>
                          </tr>
                          <tr>
                            <td width="160"><strong>Perihal Nota Dinas/Surat</strong>:</td>
                            <td><?php echo $strakom->perihal_nota ?></td>
                          </tr>
                          <tr>
                            <td width="160"><strong>Tanggal Nota Dinas/Surat</strong>:</td>
                            <td><?php echo $strakom->tanggal_nota ?></td>
                          </tr>
                					<tr>
                						<td><strong>Nota Dinas</strong>:</td>
                					  <td> <?php if(!empty($strakom->url_nota_dinas)){
                            ?>
                            <a href="<?php echo base_url('Penilaian/downloadFileNotaDinas/'.$strakom->url_nota_dinas); ?>">Download File Nota Dinas</a>

                          <?php }  ?></td>
                					</tr>

                				</tbody>
                			</table>
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


                      </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no=0;
                        foreach ($datarealisasi as $row):
                        $no++;

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
                          <td> <a href="<?php echo $row->link_tautan ?>" target="_blank" rel="noopener noreferrer"><?php echo $row->link_tautan ?></a></td>
                         <td>
                           <?php if(!empty($row->file_dokumentasi)){ ?>
                          <a href="<?php echo url('Penilaian/downloadFileRealisasi/'.$row->file_dokumentasi); ?>" target="_blank">Lihat Dokumen</a>
                        <?php } ?>
                          </td>

                        </tr>

                        <?php
                      endforeach;
                      $nilaiRealisasi = ($no / 15) * 30;
                        ?>
                        </tbody>

                 </table>
                    <?php if($periode->status_penilaian > 0 && $nilaiRealisasi > 0){ ?>
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-nilai-realisasi">Nilai</button>


                    <?php } ?>
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

            <?php if($penilaian==0){ ?>
            <?php echo form_open_multipart('Penilaian/addNilai', [ 'class' => 'form-validate', 'autocomplete' => 'off', 'onsubmit' => 'return validateNilaiStrakom()' ]); ?>
            <div class="modal-header">
              <?php if ($roles->role->role_id==2){?>
              <h4 class="modal-title">Nilai Strategi Komunikasi Unggulan</h4>
            <?php } else if ($roles->role->role_id==4){?>
              <h4 class="modal-title">Rekomendasi Nilai Strategi Komunikasi Unggulan</h4>
            <?php } ?>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


            <div class="row">
              <div class="col-sm-12">
                <!-- Default card -->
                <input type="hidden" name="strakomId" value="<?php echo $strakom->id ?>">
                 <input type="hidden" name="komponen" value="1">
                <div class="form-group col-sm-4">
                  <?php if ($roles->role->role_id==2){?>
                    <label for="formClient-Name">Beri Nilai (0-100)</label>
                <?php } else if ($roles->role->role_id==4){?>
                    <label for="formClient-Name">Rekomendasi Nilai (0-100)</label>
                <?php } ?>

                <?php
                $strakomNilai = ($nilaiStrakom/20) * 100;
                ?>
                  <input type="text" class="form-control" name="nilai" id="formClient-NilaiStrakom" value="<?php echo $strakomNilai; ?>"></input>
                </div>

                    <div class="form-group">
                      <?php if ($roles->role->role_id==2){?>
                        <label for="formClient-Name">Catatan</label>
                    <?php } else if ($roles->role->role_id==4){?>
                        <label for="formClient-Name">Rekomendasi Catatan</label>
                    <?php } ?>
                      <textarea type="text" class="form-control" name="alasan" id="formClient-Alasan" placeholder="Catatan" rows="5"></textarea>
                    </div>
              </div>
            </div>


            </div>
            <div class="modal-footer text-right">
              <button style ="display:none" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Kirim</button>

            </div>
           <?php echo form_close(); ?>

         <?php } else {?>
           <?php echo form_open_multipart('Penilaian/updateNilai/'.$penilaianData[0]->id, [ 'class' => 'form-validate', 'autocomplete' => 'off', 'onsubmit' => 'return validateUpdateNilaiStrakom()' ]); ?>
           <div class="modal-header">
             <?php if ($roles->role->role_id==2){?>
             <h4 class="modal-title">Nilai Strategi Komunikasi Unggulan</h4>
           <?php } else if ($roles->role->role_id==4){?>
             <h4 class="modal-title">Rekomendasi Nilai Strategi Komunikasi Unggulan</h4>
           <?php } ?>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">


           <div class="row">
             <div class="col-sm-12">
                 <input type="hidden" name="strakomId" value="<?php echo $strakom->id ?>">
                  <input type="hidden" name="komponen" value="1">
               <!-- Default card -->
               <div class="form-group col-sm-4">
                 <?php if ($roles->role->role_id==2){?>
                   <label for="formClient-Name">Beri Nilai (0-100)</label> <br>
                     <label for="formClient-Name">Rekomendasi Nilai : <?php echo $penilaianData[0]->nilai_strakom; ?></label>
                     <?php if(empty($administrator_id)){ ?>
                       <input type="text" class="form-control" name="nilai" id="nilaiUpdateStrakom" value="<?php echo $penilaianData[0]->nilai_strakom; ?>"></input>

                     <?php } else {?>
                     <input type="text" class="form-control" name="nilai" id="nilaiUpdateStrakom" value="<?php echo $nilaiStrakom; ?>"></input>
                   <?php } ?>
               <?php } else if ($roles->role->role_id==4){?>
                   <label for="formClient-Name">Rekomendasi Nilai (0-100)</label>
                   <input type="text" class="form-control" name="nilai" id="nilaiUpdateStrakom" value="<?php echo $penilaianData[0]->nilai_strakom; ?>"></input>

               <?php } ?>

              </div>

                   <div class="form-group">
                     <?php if ($roles->role->role_id==2){?>
                       <label for="formClient-Name">Catatan</label> <br>
                       <label for="formClient-Name">Rekomendasi Catatan : <?php echo $penilaianData[0]->catatan; ?></label>
                       <?php if(empty($administrator_id)){ ?>
                       <textarea type="text" class="form-control" name="alasan" id="formClient-Alasan" placeholder="Catatan" rows="5"><?php echo $penilaianData[0]->catatan; ?></textarea>
                     <?php } else {?>
                       <textarea type="text" class="form-control" name="alasan" id="formClient-Alasan" placeholder="Catatan" rows="5"></textarea>

                     <?php } ?>
                   <?php } else if ($roles->role->role_id==4){?>
                       <label for="formClient-Name">Rekomendasi Catatan</label>
                       <textarea type="text" class="form-control" name="alasan" id="formClient-Alasan" placeholder="Catatan" rows="5"><?php echo $penilaianData[0]->catatan; ?></textarea>

                   <?php } ?>
                      </div>
             </div>
           </div>


           </div>
           <div class="modal-footer text-right">
             <button style ="display:none" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
             <button type="submit" class="btn btn-primary">Kirim</button>
           </div>
          <?php echo form_close(); ?>
        <?php } ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="modal-nilai-editorial">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <?php if($penilaian==0){ ?>
          <?php echo form_open_multipart('Penilaian/addNilai', [ 'class' => 'form-validate', 'autocomplete' => 'off', 'onsubmit' => 'return validateNilaiEditorial()' ]); ?>
          <div class="modal-header">
            <?php if ($roles->role->role_id==2){?>
            <h4 class="modal-title">Nilai Editorial Plan</h4>
          <?php } else if ($roles->role->role_id==4){?>
            <h4 class="modal-title">Rekomendasi Nilai Editorial Plan</h4>
          <?php } ?>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">


          <div class="row">
            <div class="col-sm-12">
              <!-- Default card -->
              <input type="hidden" name="strakomId" value="<?php echo $strakom->id ?>">
               <input type="hidden" name="komponen" value="2">
              <div class="form-group col-sm-4">
                <?php if ($roles->role->role_id==2){?>
                  <label for="formClient-Name">Beri Nilai (0-100)</label>
              <?php } else if ($roles->role->role_id==4){?>
                  <label for="formClient-Name">Rekomendasi Nilai (0-100)</label>
              <?php } ?>

              <?php
              $editorialSkor = ($nilaiEditorial/20) * 100;
              ?>
                <input type="text" class="form-control" name="nilaiEditorial" id="nilaiEditorial" value="<?php echo $editorialSkor; ?>"></input>
              </div>

                  <div class="form-group">
                    <?php if ($roles->role->role_id==2){?>
                      <label for="formClient-Name">Catatan</label>
                  <?php } else if ($roles->role->role_id==4){?>
                      <label for="formClient-Name">Rekomendasi Catatan</label>
                  <?php } ?>
                    <textarea type="text" class="form-control" name="alasanEditorial" id="formClient-Alasan" placeholder="Catatan" rows="5"></textarea>
                  </div>
            </div>
          </div>


          </div>
          <div class="modal-footer text-right">
            <button style ="display:none" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <?php if($penilaian > 0){
                  if($penilaian[0]->nilai_strakom == 0){?>
            <button type="button" class="btn btn-primary" onclick="return alert('Lakukan penilaian strategi komunikasi unggulan terlebih dahulu')">Kirim</button>
          <?php } else { ?>
            <button type="submit" class="btn btn-primary">Kirim</button>
          <?php }} else { ?>
            <button type="button" class="btn btn-primary" onclick="return alert('Lakukan penilaian strategi komunikasi unggulan terlebih dahulu')">Kirim</button>

          <?php } ?>
          </div>
         <?php echo form_close(); ?>

       <?php } else {?>
         <?php echo form_open_multipart('Penilaian/updateNilai/'.$penilaianData[0]->id, [ 'class' => 'form-validate', 'autocomplete' => 'off', 'onsubmit' => 'return validateUpdateEditorial()' ]); ?>
         <div class="modal-header">
           <?php if ($roles->role->role_id==2){?>
           <h4 class="modal-title">Nilai Editorial Plan</h4>
         <?php } else if ($roles->role->role_id==4){?>
           <h4 class="modal-title">Rekomendasi Nilai Editorial Plan</h4>
         <?php } ?>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">


         <div class="row">
           <div class="col-sm-12">
               <input type="hidden" name="strakomId" value="<?php echo $strakom->id ?>">
                <input type="hidden" name="komponen" value="2">
             <!-- Default card -->
             <?php if ($roles->role->role_id==2){?>
               <label for="formClient-Name">Beri Nilai (0-100)</label> <br>

                 <label for="formClient-Name">Rekomendasi Nilai : <?php echo $penilaianData[0]->nilai_editorial; ?></label>
                 <?php if(!empty($administrator_id)){
                  $editorialSkor =0;
                   if($nilaiEditorial > 20){
                     $editorialSkor = 100;
                   } else {
                    $editorialSkor = ($nilaiEditorial/20) * 100;
                  }
                  ?>
                 <input type="text" class="form-control" name="nilaiEditorial" id="nilaiUpdateEditorial" value="<?php echo $editorialSkor; ?>"></input>
               <?php } else { ?>
                 <input type="text" class="form-control" name="nilaiEditorial" id="nilaiUpdateEditorial" value="<?php echo $penilaianData[0]->nilai_editorial; ?>"></input>

               <?php } ?>
           <?php } else if ($roles->role->role_id==4){?>
               <label for="formClient-Name">Rekomendasi Nilai (0-100)</label>
               <?php if($penilaianData[0]->nilai_editorial > 0){ ?>
               <input type="text" class="form-control" name="nilaiEditorial" id="nilaiUpdateEditorial" value="<?php echo $penilaianData[0]->nilai_editorial; ?>"></input>
             <?php } else {
               if($nilaiEditorial > 20){
                 $editorialSkor = 100;
               } else {
                $editorialSkor = ($nilaiEditorial/20) * 100;
              }
             ?>
               <input type="text" class="form-control" name="nilaiEditorial" id="nilaiUpdateEditorial" value="<?php echo $editorialSkor ?>"></input>

             <?php } ?>
           <?php } ?>


               <div class="form-group">
                 <?php if ($roles->role->role_id==2){?>
                   <label for="formClient-Name">Catatan</label> <br>
                   <label for="formClient-Name">Rekomendasi Catatan : <?php echo $penilaianData[0]->catatan_editorial; ?></label>
                  <?php if(!empty($administrator_id)){ ?>
                   <textarea type="text" class="form-control" name="alasanEditorial" id="formClient-Alasan" placeholder="Catatan" rows="5"></textarea>
                 <?php } else { ?>
                   <textarea type="text" class="form-control" name="alasanEditorial" id="formClient-Alasan" placeholder="Catatan" rows="5"><?php echo $penilaianData[0]->catatan_editorial; ?></textarea>

                 <?php } ?>
               <?php } else if ($roles->role->role_id==4){?>
                   <label for="formClient-Name">Rekomendasi Catatan</label>
                   <textarea type="text" class="form-control" name="alasanEditorial" id="formClient-Alasan" placeholder="Catatan" rows="5"><?php echo $penilaianData[0]->catatan_editorial; ?></textarea>

               <?php } ?>
                  </div>

                            </div>
           </div>
         </div>


         <div class="modal-footer text-right">
           <button style ="display:none" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
           <button type="submit" class="btn btn-primary">Kirim</button>
         </div>
        <?php echo form_close(); ?>
      <?php } ?>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-nilai-mitigasi">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <?php if($penilaian==0){ ?>
        <?php echo form_open_multipart('Penilaian/addNilai', [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>
        <div class="modal-header">
          <?php if ($roles->role->role_id==2){?>
          <h4 class="modal-title">Nilai Uraian Mitigasi</h4>
        <?php } else if ($roles->role->role_id==4){?>
          <h4 class="modal-title">Rekomendasi Nilai Uraian Mitigasi</h4>
        <?php } ?>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


        <div class="row">
          <div class="col-sm-12">
            <!-- Default card -->
            <input type="hidden" name="strakomId" value="<?php echo $strakom->id ?>">
             <input type="hidden" name="komponen" value="3">
            <div class="form-group col-sm-4">
              <?php if ($roles->role->role_id==2){?>
                <label for="formClient-Name">Beri Nilai (0-100)</label>
            <?php } else if ($roles->role->role_id==4){?>
                <label for="formClient-Name">Rekomendasi Nilai (0-100)</label>
            <?php } ?>

              <input type="text" class="form-control" name="nilaiMitigasi" id="formClient-Nilai" value="<?php echo round($nilaiMitigasi,2); ?>"></input>
            </div>

                <div class="form-group">
                  <?php if ($roles->role->role_id==2){?>
                    <label for="formClient-Name">Catatan</label>
                <?php } else if ($roles->role->role_id==4){?>
                    <label for="formClient-Name">Rekomendasi Catatan</label>
                <?php } ?>
                  <textarea type="text" class="form-control" name="alasanMitigasi" id="formClient-Alasan" placeholder="Catatan" rows="5"></textarea>
                </div>
          </div>
        </div>


        </div>
        <div class="modal-footer text-right">
          <button style ="display:none" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <?php if($penilaian > 0){
                if($penilaian[0]->nilai_editorial == 0){?>
          <button type="button" class="btn btn-primary" onclick="return alert('Lakukan penilaian editorial plan terlebih dahulu')">Kirim</button>
        <?php } else { ?>
          <button type="submit" class="btn btn-primary">Kirim</button>
        <?php }} else { ?>
          <button type="button" class="btn btn-primary" onclick="return alert('Lakukan penilaian editorial plan terlebih dahulu')">Kirim</button>

        <?php } ?>
        </div>
       <?php echo form_close(); ?>

     <?php } else {?>
       <?php echo form_open_multipart('Penilaian/updateNilai/'.$penilaianData[0]->id, [ 'class' => 'form-validate', 'autocomplete' => 'off', 'onsubmit' => 'return validateUpdateMitigasi()' ]); ?>
       <div class="modal-header">
         <?php if ($roles->role->role_id==2){?>
         <h4 class="modal-title">Nilai Uraian Mitigasi</h4>
       <?php } else if ($roles->role->role_id==4){?>
         <h4 class="modal-title">Rekomendasi Nilai Uraian Mitigasi</h4>
       <?php } ?>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">


       <div class="row">
         <div class="col-sm-12">
             <input type="hidden" name="strakomId" value="<?php echo $strakom->id ?>">
              <input type="hidden" name="komponen" value="3">
           <!-- Default card -->
           <?php if ($roles->role->role_id==2){?>
             <label for="formClient-Name">Beri Nilai (0-100)</label> <br>
               <label for="formClient-Name">Rekomendasi Nilai : <?php echo $penilaianData[0]->nilai_mitigasi; ?></label>
               <?php
                $mitigasiNilai = 0;
               if($nilaiMitigasi > 30){
                  $mitigasiNilai = 100;
               } else {
                  $mitigasiNilai = ($nilaiMitigasi/30) * 100;
               }

               ?>
               <input type="text" class="form-control" name="nilaiMitigasi" id="nilaiUpdateMitigasi" value="<?php echo $mitigasiNilai; ?>"></input>

         <?php } else if ($roles->role->role_id==4){?>
             <label for="formClient-Name">Rekomendasi Nilai (0-100)</label>
                <?php if($penilaianData[0]->nilai_mitigasi > 0){ ?>
             <input type="text" class="form-control" name="nilaiMitigasi" id="nilaiUpdateMitigasi" value="<?php echo $penilaianData[0]->nilai_mitigasi; ?>"></input>
           <?php } else {
             $mitigasiNilai = 0;
            if($nilaiMitigasi > 30){
               $mitigasiNilai = 100;
            } else {
               $mitigasiNilai = ($nilaiMitigasi/30) * 100;
            }

            ?>
             <input type="text" class="form-control" name="nilaiMitigasi" id="nilaiUpdateMitigasi" value="<?php echo $mitigasiNilai; ?>"></input>

          <?php } ?>
         <?php } ?>


             <div class="form-group">
               <?php if ($roles->role->role_id==2){?>
                 <label for="formClient-Name">Catatan</label> <br>
                 <label for="formClient-Name">Rekomendasi Catatan : <?php echo $penilaianData[0]->catatan_mitigasi; ?></label>
                 <?php if(empty($penilaianData[0]->catatan_mitigasi)){ ?>
                 <textarea type="text" class="form-control" name="alasanMitigasi" id="formClient-Alasan" placeholder="Catatan" rows="5"></textarea>
               <?php } else { ?>
                 <textarea type="text" class="form-control" name="alasanMitigasi" id="formClient-Alasan" placeholder="Catatan" rows="5"><?php echo $penilaianData[0]->catatan_mitigasi; ?></textarea>

               <?php } ?>
             <?php } else if ($roles->role->role_id==4){?>
                 <label for="formClient-Name">Rekomendasi Catatan</label>
                 <textarea type="text" class="form-control" name="alasanMitigasi" id="formClient-Alasan" placeholder="Catatan" rows="5"><?php echo $penilaianData[0]->catatan_mitigasi; ?></textarea>

             <?php } ?>
                </div>
         </div>
       </div>


       </div>
       <div class="modal-footer text-right">
         <button style ="display:none" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
         <button type="submit" class="btn btn-primary">Kirim</button>
       </div>
      <?php echo form_close(); ?>
    <?php } ?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-nilai-realisasi">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <?php if($penilaian==0){ ?>
        <?php echo form_open_multipart('Penilaian/addNilai', [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>
        <div class="modal-header">
          <?php if ($roles->role->role_id==2){?>
          <h4 class="modal-title">Nilai Realisasi</h4>
        <?php } else if ($roles->role->role_id==4){?>
          <h4 class="modal-title">Rekomendasi Nilai Realisasi</h4>
        <?php } ?>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


        <div class="row">
          <div class="col-sm-12">
            <!-- Default card -->
            <input type="hidden" name="strakomId" value="<?php echo $strakom->id ?>">
             <input type="hidden" name="komponen" value="4">
             <?php if ($roles->role->role_id==2){?>
               <label for="formClient-Name">Beri Nilai (*maks 30)</label> <br>

                 <label for="formClient-Name">Rekomendasi Nilai : <?php echo $penilaianData[0]->nilai_realisasi; ?></label>

                 <input type="text" class="form-control" name="nilaiRealisasi" id="formClient-Nilai" value="<?php echo $nilaiRealisasi ?>"></input>

           <?php } else if ($roles->role->role_id==4){?>
               <label for="formClient-Name">Rekomendasi Nilai (*maks 30)</label>
               <input type="text" class="form-control" name="nilaiRealisasi" id="formClient-Nilai" value="<?php echo $nilaiRealisasi ?>"></input>

           <?php } ?>


               <div class="form-group">
                 <?php if ($roles->role->role_id==2){?>
                   <label for="formClient-Name">Catatan</label> <br>
                   <label for="formClient-Name">Rekomendasi Catatan : <?php echo $penilaianData[0]->catatan_realisasi; ?></label>
                   <textarea type="text" class="form-control" name="alasanRealisasi" id="formClient-Alasan" placeholder="Catatan" rows="5"></textarea>

               <?php } else if ($roles->role->role_id==4){?>
                   <label for="formClient-Name">Rekomendasi Catatan</label>
                   <textarea type="text" class="form-control" name="alasanRealisasi" id="formClient-Alasan" placeholder="Catatan" rows="5"></textarea>

               <?php } ?>
                  </div>
          </div>
        </div>


        </div>
        <div class="modal-footer text-right">
          <button style ="display:none" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <?php if($penilaian > 0){
                if($penilaian[0]->nilai_strakom == 0){?>
          <button type="button" class="btn btn-primary" onclick="return alert('Lakukan penilaian uraian mitigasi terlebih dahulu')">Kirim</button>
        <?php } else { ?>
          <button type="submit" class="btn btn-primary">Kirim</button>
        <?php }} else { ?>
          <button type="button" class="btn btn-primary" onclick="return alert('Lakukan penilaian uraian mitigasi terlebih dahulu')">Kirim</button>

        <?php } ?>
        </div>
       <?php echo form_close(); ?>

     <?php } else {?>
       <?php echo form_open_multipart('Penilaian/updateNilai/'.$penilaianData[0]->id, [ 'class' => 'form-validate', 'autocomplete' => 'off', 'onsubmit' => 'return validateUpdateRealisasi()' ]); ?>
       <div class="modal-header">
         <?php if ($roles->role->role_id==2){?>
         <h4 class="modal-title">Nilai Realisasi</h4>
       <?php } else if ($roles->role->role_id==4){?>
         <h4 class="modal-title">Rekomendasi Nilai Realisasi</h4>
       <?php } ?>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">


       <div class="row">
         <div class="col-sm-12">
             <input type="hidden" name="strakomId" value="<?php echo $strakom->id ?>">
              <input type="hidden" name="komponen" value="4">
           <!-- Default card -->
           <?php if ($roles->role->role_id==2){?>
             <label for="formClient-Name">Beri Nilai (0-100)</label> <br>

               <label for="formClient-Name">Rekomendasi Nilai : <?php echo $penilaianData[0]->nilai_realisasi; ?></label>
               <?php if($penilaianData[0]->nilai_realisasi > 0){ ?>
               <input type="text" class="form-control" name="nilaiRealisasi" id="nilaiUpdateRealisasi" value="<?php echo $penilaianData[0]->nilai_realisasi ?>"></input>
             <?php } else {
               $realisasiNilai = 0;
              if($nilaiRealisasi > 30){
                 $realisasiNilai = 100;
              } else {
                 $realisasiNilai = ($nilaiRealisasi/30) * 100;
              }
            ?>
               <input type="text" class="form-control" name="nilaiRealisasi" id="nilaiUpdateRealisasi" value="<?php echo $realisasiNilai ?>"></input>

             <?php } ?>
         <?php } else if ($roles->role->role_id==4){?>
             <label for="formClient-Name">Rekomendasi Nilai (0-100)</label>
             <?php if($penilaianData[0]->nilai_realisasi > 0){ ?>
             <input type="text" class="form-control" name="nilaiRealisasi" id="nilaiUpdateRealisasi" value="<?php echo $penilaianData[0]->nilai_realisasi ?>"></input>
           <?php } else {
             $realisasiNilai = 0;
            if($nilaiRealisasi > 30){
               $realisasiNilai = 100;
            } else {
               $realisasiNilai = ($nilaiRealisasi/30) * 100;
            }
           ?>
             <input type="text" class="form-control" name="nilaiRealisasi" id="nilaiUpdateRealisasi" value="<?php echo $realisasiNilai ?>"></input>

           <?php } ?>
         <?php } ?>

               <div class="form-group">
                 <?php if ($roles->role->role_id==2){?>
                   <label for="formClient-Name">Catatan</label>
               <?php } else if ($roles->role->role_id==4){?>
                   <label for="formClient-Name">Rekomendasi Catatan</label>
               <?php } ?>
                 <textarea type="text" class="form-control" name="alasanRealisasi" id="formClient-Alasan" placeholder="Catatan" rows="5"><?php echo $penilaianData[0]->catatan_realisasi; ?></textarea>
               </div>
         </div>
       </div>


       </div>
       <div class="modal-footer text-right">
         <button style ="display:none" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
         <button type="submit" class="btn btn-primary">Kirim</button>
       </div>
      <?php echo form_close(); ?>
    <?php } ?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</section>

<?php include viewPath('includes/footer'); ?>

<script type="text/javascript">
  function validateNilaiStrakom(){
    var a = document.getElementById('formClient-NilaiStrakom').value;
    if(a < 0){
      alert("Nilai Tidak Boleh kurang dari 0");
      return false;
    }
    else if (a > 100) {
      alert("Nilai Tidak Boleh melebihi 100");
      return false;
    }
  }

  function validateUpdateNilaiStrakom(){
    var a = document.getElementById('nilaiUpdateStrakom').value;
    if(a < 0){
      alert("Nilai Tidak Boleh kurang dari 0");
      return false;
    }
    else if (a > 100) {
      alert("Nilai Tidak Boleh melebihi 100");
      return false;
    }
  }

  function validateUpdateEditorial(){
    var a = document.getElementById('nilaiUpdateEditorial').value;
    if(a < 0){
      alert("Nilai Tidak Boleh kurang dari 0");
      return false;
    }
    else if (a > 100) {
      alert("Nilai Tidak Boleh melebihi 100");
      return false;
    }
  }

  function validateUpdateMitigasi(){
    var a = document.getElementById('nilaiUpdateMitigasi').value;
    if(a < 0){
      alert("Nilai Tidak Boleh kurang dari 0");
      return false;
    }
    else if (a > 100) {
      alert("Nilai Tidak Boleh melebihi 100");
      return false;
    }
  }

  function validateUpdateRealisasi(){
    var a = document.getElementById('nilaiUpdateRealisasi').value;
    if(a < 0){
      alert("Nilai Tidak Boleh kurang dari 0");
      return false;
    }
    else if (a > 100) {
      alert("Nilai Tidak Boleh melebihi 100");
      return false;
    }
  }
</script>
<script>
	$('#dataTable1').DataTable({
    "order": [],
    "pageLength": 25,
  });
</script>

<script>
    var url = window.location.href;
    var activeTab = url.substring(url.indexOf("#") + 1);
    if(activeTab != url) // check hash tag name for prevent error
    {
        $(".tab-pane").removeClass("active");
        $("#" + activeTab).addClass("active");
        $('a[href="#'+ activeTab +'"]').tab('show');
    }else{
        $(".tab-pane").removeClass("active");
        $("#tab_1").addClass("active");
        $('a[href="#tab_1"]').tab('show');
    }
</script>
