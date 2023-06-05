<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>

<style>
.error {
	color:#ff0000;
}
</style>
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
					<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Detail</a></li>
					<li class="nav-item"><a id="tabeditorial" class="nav-link" href="#tab_2" data-toggle="tab">Editorial Plan</a></li>
          <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Uraian Mitigasi</a></li>
          <?php if ($roles->role->role_id==1){
          if ($periode->status_input_data == 1) {
            if ($strakom->status == 0 || $strakom->status == 3) {
            ?>
						<li class="nav-item"><a class="nav-link" href="<?php echo url('StrakomUnggulan/edit/'.$strakom->id) ?>">Edit</a></li>
          <?php }}}?>

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
                      echo "<p class='text-danger'><strong>Ditolak ($strakom->alasan) </strong></p>";
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
            </div>
          <?php endif ?>
      	</div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <?php if ($roles->role->role_id==1){?>
                      <div class="d-flex p-0">
                      <div class="ml-auto p-2">
                        <?php if ($roles->role->role_id==1){
                          if ($periode->status_input_data == 1) {
                            // code...

                        ?>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg"> <span class="pr-1"><i class="fa fa-plus"></i></span>
                      Tambah Materi
                    </button>
                  <?php }
                  } ?>
                      </div>
                        </div>
                  <!-- /.card-header -->
                    <table id="ep" class="table table-bordered table-hover table-striped">
                      <thead>
                      <tr>
                        <th style="vertical-align:middle;text-align:center;">No</th>
                        <th style="vertical-align:middle;text-align:center;">Tanggal Rencana Tayang</th>
                        <th style="width:60%;vertical-align:middle;text-align:center;">Pesan Utama</th>
                        <th style="vertical-align:middle;text-align:center;">Produk Komunikasi</th>
                        <th style="vertical-align:middle;text-align:center;">Khalayak</th>
                        <th style="vertical-align:middle;text-align:center;">Kanal Komunikasi</th>
                        <th style="width:10%;vertical-align:middle;text-align:center;"><?php echo lang('action') ?></th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no=0;
                        foreach ($editorialplan as $row):
                        if ($row->user_id == $this->session->userdata('logged')['id']) {

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
                            <?php if ($periode->status_input_data == 1) {
															if($strakom->status == 0){
                              // code...
                            ?>
                            <button class="btn btn-sm btn-primary" title="Edit" data-toggle="modal" data-target="#modal-lg-edit<?php echo $row->id ?>"><i class="fas fa-edit"></i></button>
                            <a href="<?php echo url('StrakomUnggulan/deleteEditorialPlan/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini ?')" title="Hapus" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                          <?php }} ?>
                            <a href="<?php echo url('EditorialPlan/view/'.$row->id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>

                          </td>
                        </tr>
                        <section class="content">
                          <?php echo form_open_multipart('StrakomUnggulan/updateDataEditorialPlan/'.$row->id, [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>

                          <div class="container-fluid">
                            <div class="row">
                        <div class="modal fade" id="modal-lg-edit<?php echo $row->id ?>">
                        <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Editorial Plan</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">


                            <div class="row">
                              <div class="col-sm-6">
                                <!-- Default card -->
                                <div class="card">
                                  <input type="hidden" class="form-control" name="idUser" required value="<?php echo $row->user_id; ?>" />
                                  <input type="hidden" class="form-control" name="idPeriode" required value="<?php echo $row->periode_id; ?>" />
                                  <input type="hidden" class="form-control" name="idOPD" required value="<?php echo $row->opd_id; ?>" />


                                  <div class="card-body">

                                    <div class="form-group">
                                      <label for="formClient-Contact">Nama Kegiatan<label class="text-danger">*</label></label>
                                      <select name="namaProgram" id="formClient-NamaProgram" class="form-control select2" required title="Bagian ini wajib diisi">
                                        <?php foreach ($strakomList as $rows):


                                          if ($rows->ksd_id > 0){

                                            foreach ($ksd as $rowss):

                                              if ($rowss->id == $rows->ksd_id ) {
                                                if ($row->strakom_id == $rows->id) {
                                                    echo '<option value="'.$rows->id.'" selected>'. $rowss->nama .'</option>';
                                                } else {
                                                   echo '<option value="'.$rows->id.'">'. $rowss->nama .'</option>';
                                                 }
                                              }

                                           endforeach;
                                          } else {
                                            $sel ="";
                                            if ($row->strakom_id == $rows->id) {
                                                echo '<option value="'.$rows->id.'" selected>'. $rows->nama_program .'</option>';
                                            } else {
                                              echo '<option value="'.$rows->id.'">'. $rows->nama_program .'</option>';
                                            }

                                        }
                                        ?>

                                        <?php endforeach ?>
                                      </select>
                                    </div>

                                    <div class="form-group">
                                      <label for="formClient-Name">Tanggal Rencana Tayang<label class="text-danger">*</label></label>
                                      <input type="text" class="form-control" name="tanggalRencanaTayang" id="formClient-Tanggal" required title="Bagian ini wajib diisi" placeholder="Tanggal Rencana Tayang" autofocus value="<?php echo $row->tanggal_rencana;?>" />
                                    </div>

                                    <div class="form-group">
                                      <label for="formClient-Address">Pesan Utama<label class="text-danger">*</label></label>
                                      <textarea type="text" class="form-control" name="pesanUtama" id="formClient-Pesan" placeholder="Deskripsi Kegiatan" rows="5"><?php echo $row->pesan_utama; ?></textarea>
                                    </div>



                                  </div>
                                  <!-- /.card-body -->

                                </div>
                                <!-- /.card -->

                                <!-- Default card -->

                                <!-- /.card -->

                              </div>
                              <div class="col-sm-6">
                                <div class="card">
                                  <div class="card-body">
                                    <div class="form-group">
                                      <label for="formClient-Contact">Produk Komunikasi<label class="text-danger">*</label></label>
                                      <select name="produkKomunikasi" required title="Bagian ini wajib diisi" id="produkKomunikasiEdit" class="form-control select2" required>
                                        <?php foreach ($produkkomunikasi as $rows):
                                          if ($row->produk_komunikasi == $rows->id) {
                                        ?>
                                          <option value="<?php echo $rows->id ?>" selected><?php echo $rows->nama ?></option>
                                        <?php } else { ?>
                                          <option value="<?php echo $rows->id ?>"><?php echo $rows->nama ?></option>

                                        <?php }
                                        endforeach ?>

                                      </select>
                                      <?php
                                      if($row->produk_komunikasi == 11){
                                      ?>
                                      <input type="text" style="display:block;margin-top:1%" class="form-control" name="txtLainnyaProdukKomunikasi" id="txtLainnyaProdukKomunikasiEdit" required placeholder="Lainnya" value="<?php echo $row->txtLainProdukKomunikasi ?>" autofocus />
                                    <?php } else {?>
                                      <input type="text" style="display:none;margin-top:1%" class="form-control" name="txtLainnyaProdukKomunikasi" id="txtLainnyaProdukKomunikasiEdit" required placeholder="Lainnya" value="<?php echo $row->txtLainProdukKomunikasi ?>" autofocus />

                                    <?php } ?>
                                    </div>


                                        <div class="form-group">
                                          <label for="formClient-Address">Khalayak<label class="text-danger">*</label></label>
                                          <textarea type="text" class="form-control" name="khalayak" required title="Bagian ini wajib diisi" id="formClient-Khalayak" placeholder="Analisis Situasi" rows="3"><?php echo $row->khalayak; ?></textarea>
                                        </div>


                                    <div class="form-group">
                                      <label for="formClient-Contact">Kanal Komunikasi<label class="text-danger">*</label></label>
                                      <select name="kanalKomunikasi" id="kanalKomunikasiEdit"required title="Bagian ini wajib diisi"  class="form-control" required>

                                        <?php foreach ($rencanamedia as $rows):
                                          if ($row->kanal_komunikasi == $rows->id) {
                                        ?>
                                          <option value="<?php echo $rows->id ?>" selected><?php echo $rows->nama ?></option>
                                        <?php } else { ?>
                                          <option value="<?php echo $rows->id ?>"><?php echo $rows->nama ?></option>

                                        <?php }
                                        endforeach ?>

                                      </select>
                                      <?php
                                      if($row->kanal_komunikasi == 9){
                                      ?>
                                      <input type="text" style="display:block;margin-top:1%" class="form-control" name="txtLainnyaKanalKomunikasi" id="txtLainnyaKanalKomunikasiEdit" required placeholder="Lainnya" value="<?php echo $row->txtLainKanalKomunikasi ?>" autofocus />
                                    <?php } else {?>
                                      <input type="text" style="display:none;margin-top:1%" class="form-control" name="txtLainnyaKanalKomunikasi" id="txtLainnyaKanalKomunikasiEdit" required placeholder="Lainnya" value="<?php echo $row->txtLainKanalKomunikasi ?>" autofocus />

                                    <?php } ?>
                                    </div>


                                  </div>
                                  <!-- /.card-body -->

                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer text-right">
                          <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> -->
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                        </div>

                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                    </section>

                    <?php echo form_close(); ?>
                        <?php
                      }
                        endforeach ?>
                      </tbody>
                    </table>
                <?php } else { ?>
                    <table id="ep" class="table table-bordered table-hover table-striped">
                      <thead>
                        <tr>
                          <th style="vertical-align:middle;text-align:center;">No</th>
                          <th style="vertical-align:middle;text-align:center;">Tanggal Rencana Tayang</th>
                          <th style="width:60%;vertical-align:middle;text-align:center;">Pesan Utama</th>
                          <th style="vertical-align:middle;text-align:center;">Produk Komunikasi</th>
                          <th style="vertical-align:middle;text-align:center;">Khalayak</th>
                          <th style="vertical-align:middle;text-align:center;">Kanal Komunikasi</th>
                          <th style="width:10%;vertical-align:middle;text-align:center;"><?php echo lang('action') ?></th>
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
                <?php } ?>
                  </div>


                  <div class="tab-pane" id="tab_3">
                    <?php if ($roles->role->role_id==1):?>
                      <table id="example1" class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                          <th style="vertical-align:middle;text-align:center;">No</th>
                          <th style="vertical-align:middle;text-align:center;">Nama Program/Kegiatan Strategi Komunikasi Unggulan</th>
                          <th style="vertical-align:middle;text-align:center;">Uraian Potensi Krisis</th>
                          <th style="vertical-align:middle;text-align:center;">Stakeholder Pro Pemprov DKI Jakarta</th>
                          <th style="vertical-align:middle;text-align:center;">Stakeholder Kontra Pemprov DKI Jakarta</th>
                          <th style="vertical-align:middle;text-align:center;">Juru Bicara</th>
                          <th style="vertical-align:middle;text-align:center;">PIC Kegiatan yang Dapat Dihubungi</th>
                          <th style="width:10%;vertical-align:middle;text-align:center;"><?php echo lang('action') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no=0;
                          foreach ($mitigasi as $row):
                          $no++;
                            if ($row->user_id == $this->session->userdata('logged')['id']) {
                              // code...

                          ?>
                          <tr>
                            <td><?php echo $no ?></td>
                            <td>
                              <?php
                              if (is_null($row->nama)) {
                                  echo $row->nama_program;
                              } else {
                                  echo $row->nama;
                              }
                            ?>
                            </td>
                            <td><?php echo $row->uraian_potensi ?></td>
                            <td><?php echo $row->stakeholder_pro ?></td>
                            <td><?php echo $row->stakeholder_kontra ?></td>
                            <td><?php echo $row->juru_bicara ?></td>
                            <td><?php echo $row->pic_kegiatan ?></td>
                            <!-- <td>
                            <?php if(empty($row->data_pendukung_text)){ ?>
                            <a href="<?php echo url('/uploads/mitigasifile/'.$row->data_pendukung_file); ?>" target="_blank">Lihat Dokumen</a>
                          <?php } else { ?>
                            <a href="<?php echo url($row->data_pendukung_text); ?>" target="_blank">Lihat Dokumen</a>
                          <?php } ?>
                            </td> -->
                            <td>
                              <?php if ($roles->role->role_id==1){
                                if ($periode->status_input_data == 1) {
																	if($strakom->status == 0){
                              ?>
                              <a href="<?php echo url('Mitigasi/edit/'.$row->id) ?>" class="btn btn-sm btn-primary" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                              <a href="<?php echo url('Mitigasi/delete/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini ?')" title="Hapus" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                            <?php }}} ?>
                              <a href="<?php echo url('Mitigasi/view/'.$row->id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>

                            </td>
                          </tr>
                          <?php
                          }
                          endforeach ?>
                          </tbody>
                      </table>
                      <?php else:?>
                          <table id="example1" class="table table-bordered table-hover table-striped">
                            <thead>
                              <tr>
                                <th style="vertical-align:middle;text-align:center;">No</th>
                                <th style="vertical-align:middle;text-align:center;">Nama Program/Kegiatan Strategi Komunikasi Unggulan</th>
                                <th style="vertical-align:middle;text-align:center;">Uraian Potensi Krisis</th>
                                <th style="vertical-align:middle;text-align:center;">Stakeholder Pro Pemprov DKI Jakarta</th>
                                <th style="vertical-align:middle;text-align:center;">Stakeholder Kontra Pemprov DKI Jakarta</th>
                                <th style="vertical-align:middle;text-align:center;">Juru Bicara</th>
                                <th style="vertical-align:middle;text-align:center;">PIC Kegiatan yang Dapat Dihubungi</th>
                                <th style="width:10%;vertical-align:middle;text-align:center;"><?php echo lang('action') ?></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($mitigasi as $row):
                                if ($row->user_id == $this->session->userdata('logged')['id']) {
                                  // code...

                              ?>
                              <tr>
                                <td><?php echo $row->id ?></td>
                                <td><?php echo $row->nama_kegiatan ?></td>
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
                              }
                              endforeach ?>
                              </tbody>
                          </table>
                      <?php endif ?>
                  </div>

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-primary">Download Strategi Komunikasi Unggulan</button>

              </div>

            </div>

            <!-- ./card -->
          </div>
					<div class="modal-footer justify-content-between">
						<a href="<?php echo url('/StrakomUnggulan') ?>" class="btn btn-flat btn-secondary">Kembali</a>
						<?php
							if($periode->status_verifikasi == 1){
							if($roles->role->role_id==2){
							if($strakom->status==1){ ?>

						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-approve">Setujui</button>
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-reject">Tolak</button>
					<?php }}} ?>
					</div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END CUSTOM TABS -->


</section>

<div class="modal fade" id="modal-approve">
	<?php echo form_open_multipart('StrakomUnggulan/change_status_strakom/'.$strakom->id, [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>

		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Setujui Strategi Komunikasi Unggulan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="nama_strakom" value="<?php echo $strakom->nama_program; ?>">
					<input type="hidden" name="userId" value="<?php echo $strakom->user_id; ?>">
					<input type="hidden" name="opdId" value="<?php echo $strakom->opd_id; ?>">
					<input type="hidden" name="status_strakom" value="2">
					<div class="form-group" style="display:none">
						<label for="formClient-Name">Alasan</label>
						<textarea type="text" class="form-control" name="alasan" id="formClient-Alasan" placeholder="Alasan" rows="5"></textarea>
					</div>
					<p>Apakah kamu yakin untuk menyetujui Strategi Komunikasi Unggulan untuk Judul <b><?php echo $strakom->nama_program ?> </b> ini ?</p>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
					<button type="submit" class="btn btn-primary">Ya, Saya Yakin</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
			<?php echo form_close(); ?>
	</div>


<div class="modal fade" id="modal-reject">
	<?php echo form_open_multipart('StrakomUnggulan/change_status_strakom/'.$strakom->id, [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>

<div class="modal-dialog modal-lg">
<div class="modal-content">
	<div class="modal-header">
		<h4 class="modal-title">Tolak Strategi Komunikasi Unggulan</h4>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<input type="hidden" name="nama_strakom" value="<?php echo $strakom->nama_program; ?>">
		<input type="hidden" name="userId" value="<?php echo $strakom->user_id; ?>">
		<input type="hidden" name="opdId" value="<?php echo $strakom->opd_id; ?>">
		<input type="hidden" name="status_strakom" value="3">
		<div class="form-group">
			<label for="formClient-Name">Alasan</label>
			<textarea type="text" class="form-control" name="alasan" id="formClient-Alasan" placeholder="Alasan" rows="5"></textarea>
		</div>
		</div>
	<div class="modal-footer justify-content-between">
		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
		<button type="submit" class="btn btn-primary">Simpan</button>
	</div>
</div>
<!-- /.modal-content -->
</div>
	<?php echo form_close(); ?>
<!-- /.modal-dialog -->
</div>

<section class="content">
  <?php echo form_open_multipart('StrakomUnggulan/saveEditorialPlan/'.$strakom->id, [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>

  <div class="container-fluid">
    <div class="row">

      <div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Materi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


          <div class="row">
            <input type="hidden" class="form-control" name="idUser" required value="<?php echo $strakom->user_id; ?>" />
            <input type="hidden" class="form-control" name="idPeriode" required value="<?php echo $strakom->periode_id; ?>" />
            <input type="hidden" class="form-control" name="idOPD" required value="<?php echo $strakom->opd_id; ?>" />

            <div class="col-sm-6">
              <!-- Default card -->
              <div class="card">

                <div class="card-body">

                  <div class="form-group">
                    <label for="formClient-Contact">Nama Kegiatan<label class="text-danger">*</label></label>
                    <select name="namaProgram" id="formClient-NamaProgram" class="form-control select2" style="width:100%;" required title="Bagian ini wajib diisi">
                      <option value="">Pilih Nama Program/Kegiatan</option>
                      <?php foreach ($strakomList as $row):
                        if ($row->ksd_id > 0){
                          foreach ($ksd as $rows):
                            if ($rows->id == $row->ksd_id ) {
                              echo '<option value="'.$row->id.'">'. $rows->nama .'</option>';
                            }
                         endforeach;
                        } else {
                            echo '<option value="'.$row->id.'">'. $row->nama_program .'</option>';
                        }
                      ?>

                      <?php endforeach ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="formClient-Name">Tanggal Rencana Tayang<label class="text-danger">*</label></label>
                    <input type="text" class="form-control" name="tanggalRencanaTayang" id="formClient-Tanggal" required title="Bagian ini wajib diisi" placeholder="Tanggal Rencana Tayang (DD-MM-YYYY)" autofocus />
                  </div>

                  <div class="form-group">
                    <label for="formClient-Address">Pesan Utama<label class="text-danger">*</label></label>
                    <textarea type="text" class="form-control" name="pesanUtama" id="formClient-Pesan" required title="Bagian ini wajib diisi" placeholder="Pesan Utama" rows="5"></textarea>
                  </div>


                </div>
                <!-- /.card-body -->

              </div>
              <!-- /.card -->

              <!-- Default card -->

              <!-- /.card -->

            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">

                  <div class="form-group">
                    <label for="formClient-Contact">Produk Komunikasi<label class="text-danger">*</label></label>
                    <select name="produkKomunikasi" id="produkKomunikasi" required title="Bagian ini wajib diisi" class="form-control" style="width:100%" required>
                      <option value="-">Pilih Produk Komunikasi</option>
                      <?php foreach ($produkkomunikasi as $row): ?>
                        <option value="<?php echo $row->id ?>"><?php echo $row->nama ?></option>
                      <?php endforeach ?>

                    </select>
                    <input type="text" style="display:none;margin-top:1%" class="form-control" name="txtLainnyaProdukKomunikasi" id="txtLainnyaProdukKomunikasi" placeholder="Lainnya" autofocus />

                  </div>
                  <div class="form-group">
                    <label for="formClient-Address">Khalayak<label class="text-danger">*</label></label>
                    <textarea type="text" class="form-control" name="khalayak" id="formClient-Khalayak" required title="Bagian ini wajib diisi" placeholder="Khalayak" rows="3"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="formClient-Contact">Kanal Komunikasi<label class="text-danger">*</label></label>
                    <select name="kanalKomunikasi" id="kanalKomunikasi" required title="Bagian ini wajib diisi" class="form-control" style="width:100%" required>
                      <option value="-">Pilih Kanal Komunikasi</option>
                      <?php foreach ($rencanamedia as $row): ?>
                        <option value="<?php echo $row->id ?>"><?php echo $row->nama ?></option>
                      <?php endforeach ?>
                    </select>
                    <input type="text" style="display:none;margin-top:1%" class="form-control" name="txtLainnyaKanalKomunikasi" id="txtLainnyaKanalKomunikasi" placeholder="Lainnya" autofocus />

                  </div>



                </div>
                <!-- /.card-body -->

              </div>
            </div>
          </div>

      </div>
      <div class="modal-footer text-right">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <?php echo form_close(); ?>
  <!-- /.container-fluid -->
</section>

<?php include viewPath('includes/footer'); ?>
<script type="text/javascript">
   const publikasiKomunikasi = document.getElementById('produkKomunikasi');
   const txtpublikasiKomunikasi = document.getElementById('txtLainnyaProdukKomunikasi');
   const kanalKomunikasi = document.getElementById('kanalKomunikasi');
   const txtkanalKomunikasi = document.getElementById('txtLainnyaKanalKomunikasi');
   const publikasiKomunikasiEdit = document.getElementById('produkKomunikasiEdit');
   const txtpublikasiKomunikasiEdit = document.getElementById('txtLainnyaProdukKomunikasiEdit');
   const kanalKomunikasiEdit = document.getElementById('kanalKomunikasiEdit');
   const txtkanalKomunikasiEdit = document.getElementById('txtLainnyaKanalKomunikasiEdit');
   const tabEditorial = document.getElementById('tabeditorial');
   // const divNamaKSD = document.getElementById('divNamaKSD');

   publikasiKomunikasi.addEventListener('change', function handleChange(event) {
      if (event.target.value == '11') {
         txtpublikasiKomunikasi.style.display = 'block';
       } else {
        txtpublikasiKomunikasi.style.display = 'none';
      }
   });

   kanalKomunikasi.addEventListener('change', function handleChange(event) {
      if (event.target.value == '9') {
         txtkanalKomunikasi.style.display = 'block';
       } else {
        txtkanalKomunikasi.style.display = 'none';
      }
   });

   publikasiKomunikasiEdit.addEventListener('change', function handleChange(event) {
      if (event.target.value == '11') {
         txtpublikasiKomunikasiEdit.style.display = 'block';
       } else {
        txtpublikasiKomunikasiEdit.style.display = 'none';
      }
   });

   kanalKomunikasiEdit.addEventListener('change', function handleChange(event) {
      if (event.target.value == '9') {
         txtkanalKomunikasiEdit.style.display = 'block';
       } else {
        txtkanalKomunikasiEdit.style.display = 'none';
      }
   });
</script>
<script>
	$('#dataTable1').DataTable({
    "order": []
  });
  $("#ep").DataTable({
      order: [[0, 'asc']]
    });
</script>
