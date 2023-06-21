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
        <h1>Editorial Plan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item active">Editorial Plan</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
							<div class="card-header">

                <?php echo form_open_multipart('EditorialPlan/editorialplan', [ 'class' => 'form-validate', 'autocomplete' => 'off','method'=> 'GET' ]); ?>
                <div class="row">
                  <div class="col-2">
                    <div class="card-body">
                    <div class="form-group">
                      <label for="formClient-Contact">Pilih Tahun</label>
                      <select name="tahun_periode" id="tahun_periode" class="form-control">
                        <option value="">Pilih Tahun</option>
						<?php
						for ($i=date('Y'); $i>2000; $i--){
							if($i==$_GET['tahun_periode']){
							echo '<option selected value="'.$i.'">'.$i.'</option>';
							} else {
							echo '<option value="'.$i.'">'.$i.'</option>';
							}
						}
						?>

                      </select>
                    </div>
                  </div>
                </div>
								<?php if ($roles->role->role_id>1){ ?>
									<div class="col-3">
										<div class="card-body">
										<div class="form-group">
											<label for="formClient-Contact">Pilih SKPD/UKPD</label>
											<select name="user_id" id="user_id" class="form-control select2">
												<option value="">Pilih SKPD/UKPD</option>
												<?php foreach ($userall as $row): ?>
													<option  <?php if(!empty($_GET['user_id']) && $_GET['user_id'] == $row->id){echo "selected";} ?> value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
								</div>
							<?php } else { ?>
							<div class="col-3" style="display:none">
								<div class="card-body">
								<div class="form-group">
									<label for="formClient-Contact">Pilih SKPD/UKPD</label>
									<select name="user_id" id="user_id"  class="form-control select2">
										<option value="">Pilih SKPD/UKPD</option>
										<?php foreach ($userall as $row): ?>
											<option <?php if(!empty($_GET['user_id']) && $_GET['user_id'] == $row->id){echo "selected";} ?>  value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
						</div>

					<?php } ?>
                  <div class="col-3">
                    <div class="card-body">
                    <div class="form-group">
                      <label for="formClient-Contact">Pilih Triwulan</label>
											<select name="triwulan_periode" id="triwulan_periode" class="form-control">
												<option value="">Pilih Triwulan</option>

												<option <?php if(!empty($_GET['triwulan_periode']) && $_GET['triwulan_periode'] == "Triwulan I"){echo "selected";} ?> value="Triwulan I">Triwulan I</option>
												<option <?php if(!empty($_GET['triwulan_periode']) && $_GET['triwulan_periode'] == "Triwulan II"){echo "selected";} ?> value="Triwulan II">Triwulan II</option>
												<option <?php if(!empty($_GET['triwulan_periode']) && $_GET['triwulan_periode'] == "Triwulan III"){echo "selected";} ?> value="Triwulan III">Triwulan III</option>
												<option <?php if(!empty($_GET['triwulan_periode']) && $_GET['triwulan_periode'] == "Triwulan IV"){echo "selected";} ?> value="Triwulan IV">Triwulan IV</option>
											</select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col"><button type="submit" class="btn btn-flat btn-primary">Tampilkan</button></div>



                <!-- /.card-footer-->
                <?php echo form_close(); ?>
              </div>
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Editorial Plan</h3>
                <div class="ml-auto p-2">
                  <?php
									if(count($periodeCount) > 0){
									if ($roles->role->role_id==1){
                    if ($periode->status_input_data == 1) {
                      // code...

                  ?>
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg"> <span class="pr-1"><i class="fa fa-plus"></i></span>
                Tambah Materi
              </button>
            <?php }
					}
            } ?>
                </div>
              </div>

                <?php if ($roles->role->role_id==1){?>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-striped">
                  <thead>
                  <tr>
                    <th style="vertical-align:middle;text-align:center;">No</th>
										<th style="vertical-align:middle;text-align:center;">Nama Strategi Komunikasi Unggulan</th>
                    <th style="vertical-align:middle;text-align:center;">Tanggal Rencana Tayang</th>
                    <th style="width:60%;vertical-align:middle;text-align:center;">Pesan Utama</th>
                    <th style="vertical-align:middle;text-align:center;">Produk Komunikasi</th>
                    <th style="vertical-align:middle;text-align:center;">Khalayak</th>
                    <th style="vertical-align:middle;text-align:center;">Kanal Komunikasi</th>
                    <th style="vertical-align:middle;text-align:center;">Status</th>
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
											<td><?php echo $row->nama_program ?></td>
                      <td><?php echo $row->tanggal_rencana ?></td>
                      <td><?php echo $row->pesan_utama ?></td>
                      <td>
                        <?php
                          foreach ($produkkomunikasi as $rows):
                            if ($rows->id == $row->produk_komunikasi ) {
															if ($row->produk_komunikasi == 11) {
																echo $rows->nama . '('.$row->txtLainProdukKomunikasi.')';
															} else {
                              echo $rows->nama;
															}
                            }
                         endforeach;
                        ?>
                      </td>
                      <td><?php echo $row->khalayak ?></td>
                      <td>
                        <?php
                          foreach ($rencanamedia as $rows):
                            if ($rows->id == $row->kanal_komunikasi ) {
															if ($row->kanal_komunikasi == 9) {
																echo $rows->nama . '('.$row->txtLainKanalKomunikasi.')';
															} else {
															echo $rows->nama;
															}
                            }
                         endforeach;
                        ?>
                      </td>
                      <td>

												<?php if ($row->status == 0) {
                          echo '<p class="text-warning"><strong>Belum Dikirim</strong></p>';
                        } else if ($row->status == 1) {
                          echo '<p class="text-primary"><strong>Dikirim</strong></p>';
                        } else if ($row->status == 2) {
                          echo '<p class="text-success"><strong>Disetujui</strong></p>';
                        } else {
                           echo "<p class='text-danger'><strong>Perlu Diperbaiki ($row->alasan) </strong></p>";
                        } ?>
                      </td>
                      <td>
                        <?php
												if(count($periodeCount)>0){
												if ($roles->role->role_id==1){
                          if ($periode->status_input_data == 1) {
                            if ($row->status == 0 || $row->status == 3) {
                        ?>
                        <button class="btn btn-sm btn-primary" title="Edit" data-toggle="modal" data-target="#modal-lg-edit<?php echo $row->id ?>"><i class="fas fa-edit"></i></button>
                        <a href="<?php echo url('EditorialPlan/delete/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini ?')" title="Hapus" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
											<?php }}}} ?>
                        <a href="<?php echo url('EditorialPlan/view/'.$row->id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>

                      </td>
											<section class="content">
	                      <?php echo form_open_multipart('EditorialPlan/updateData/'.$row->id, [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>

	                      <div class="container-fluid">
	                        <div class="row">
	                    <div class="modal fade" id="modal-lg-edit<?php echo $row->id ?>">
	                    <div class="modal-dialog modal-xl">
	                    <div class="modal-content">
	                    <div class="modal-header">
	                      <h4 class="modal-title">Edit Materi</h4>
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
																<input type="hidden" class="form-control" name="idOPD" required value="<?php echo $row->id; ?>" />


	                              <div class="card-body">

	                                <div class="form-group">
	                                  <label for="formClient-Contact">Nama Strategi Komunikasi Unggulan<label class="text-danger">*</label></label>
	                                  <select name="namaProgram" id="formClient-NamaProgram" class="form-control select2" required title="Bagian ini wajib diisi">
	                                    <?php foreach ($strakom as $rows):


	                                      // if ($rows->ksd_id > 0){
																				//
	                                      //   foreach ($ksd as $rowss):
																				//
	                                      //     if ($rowss->id == $rows->ksd_id ) {
	                                      //       if ($row->strakom_id == $rows->id) {
	                                      //           echo '<option value="'.$rows->id.'" selected>'. $rowss->nama .'</option>';
	                                      //       } else {
	                                      //          echo '<option value="'.$rows->id.'">'. $rowss->nama .'</option>';
	                                      //        }
	                                      //     }
																				//
	                                      //  endforeach;
	                                      // } else {
	                                        // $sel ="";
	                                        // if ($row->strakom_id == $rows->id) {
	                                        //     echo '<option value="'.$rows->id.'" selected>'. $rows->nama_program .'</option>';
	                                        // }
																					// else {
	                                          echo '<option value="'.$rows->id.'">'. $rows->nama_program .'</option>';
	                                        // }

	                                    // }
	                                    ?>

	                                    <?php endforeach ?>
	                                  </select>
	                                </div>

																	<div class="form-group">
																		<label for="formClient-Contact">Produk Komunikasi<label class="text-danger">*</label></label>
																		<select name="produkKomunikasi" id="formClient-produkKomunikasiEdit" class="form-control select2" style="width:100%" required title="Bagian ini wajib diisi">
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
																		<input type="text" style="display:block;margin-top:1%" class="form-control" name="txtLainnyaProdukKomunikasi" id="txtLainnyaProdukKomunikasiEdit" required placeholder="Lainnya 1, Lainnya 2, Lainnya 3, ..." value="<?php echo $row->txtLainProdukKomunikasi ?>" autofocus />
																	<?php } else {?>
																		<input type="text" style="display:none;margin-top:1%" class="form-control" name="txtLainnyaProdukKomunikasi" id="txtLainnyaProdukKomunikasiEdit" required placeholder="Lainnya 1, Lainnya 2, Lainnya 3, ..." value="<?php echo $row->txtLainProdukKomunikasi ?>" autofocus />

																	<?php } ?>
																	</div>

	                                <div class="form-group">
	                                  <label for="formClient-Name">Tanggal Rencana Tayang<label class="text-danger">*</label></label>
	                                  <input type="date" class="form-control" name="tanggalRencanaTayang" id="formClient-Tanggal" required title="Bagian ini wajib diisi" placeholder="Tanggal Rencana Tayang" autofocus value="<?php echo $row->tanggal_rencana;?>" />
	                                </div>

	                                <div class="form-group">
	                                  <label for="formClient-Address">Pesan Utama<label class="text-danger">*</label></label>
	                                  <textarea type="text" class="form-control" name="pesanUtama" id="formClient-Pesan" required title="Bagian ini wajib diisi" placeholder="Deskripsi Kegiatan" rows="5"><?php echo $row->pesan_utama; ?></textarea>
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
	                                      <label for="formClient-Address">Khalayak<label class="text-danger">*</label></label>
	                                      <textarea type="text" class="form-control" name="khalayak" id="formClient-Khalayak" required title="Bagian ini wajib diisi" placeholder="Khalayak" rows="3"><?php echo $row->khalayak; ?></textarea>
	                                    </div>


	                                <div class="form-group">
	                                  <label for="formClient-Contact">Kanal Komunikasi<label class="text-danger">*</label></label>
	                                  <select name="kanalKomunikasi" id="formClient-kanalKomunikasiEdit" class="form-control" required title="Bagian ini wajib diisi">

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
	                                  <input type="text" style="display:block;margin-top:1%" class="form-control" name="txtLainnyaKanalKomunikasi" id="txtLainnyaKanalKomunikasiEdit" placeholder="Lainnya" value="<?php echo $row->txtLainKanalKomunikasi ?>" autofocus />
	                                <?php } else {?>
	                                  <input type="text" style="display:none;margin-top:1%" class="form-control" name="txtLainnyaKanalKomunikasi" id="txtLainnyaKanalKomunikasiEdit" placeholder="Lainnya" value="<?php echo $row->txtLainKanalKomunikasi ?>" autofocus />

	                                <?php } ?>
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

	                  </div>
	                  <!-- /.row -->
	                </div>
	                  <?php echo form_close(); ?>
	                <!-- /.container-fluid -->
	                </section>
                    </tr>



                    <?php
                  }
                    endforeach ?>
                  </tbody>
                </table>
              </div>
            <?php } else { ?>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                      <th style="vertical-align:middle;text-align:center;">No</th>
											<th style="vertical-align:middle;text-align:center;">Nama Strategi Komunikasi Unggulan</th>
                      <th style="vertical-align:middle;text-align:center;">Tanggal Rencana Tayang</th>
                      <th style="width:60%;vertical-align:middle;text-align:center;">Pesan Utama</th>
                      <th style="vertical-align:middle;text-align:center;">Produk Komunikasi</th>
                      <th style="vertical-align:middle;text-align:center;">Khalayak</th>
                      <th style="vertical-align:middle;text-align:center;">Kanal Komunikasi</th>
                      <th style="vertical-align:middle;text-align:center;">Status</th>
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
											<td><?php echo $row->nama_program ?></td>
                      <td><?php echo $row->tanggal_rencana ?></td>
                      <td><?php echo $row->pesan_utama ?></td>
                      <td>
                        <?php
												foreach ($produkkomunikasi as $rows):
													if ($rows->id == $row->produk_komunikasi ) {
														if ($row->produk_komunikasi == 11) {
															echo $rows->nama . '('.$row->txtLainProdukKomunikasi.')';
														} else {
														echo $rows->nama;
														}
													}
											 endforeach;
                        ?>
                      </td>
                      <td><?php echo $row->khalayak ?></td>
                      <td>
                        <?php
												foreach ($rencanamedia as $rows):
													if ($rows->id == $row->kanal_komunikasi ) {
														if ($row->kanal_komunikasi == 9) {
															echo $rows->nama . '('.$row->txtLainKanalKomunikasi.')';
														} else {
														echo $rows->nama;
														}
													}
											 endforeach;
                        ?>
                      </td>
											<td>

                        <?php if ($row->status == 0) {
                          echo '<p class="text-warning"><strong>Menunggu Penilaian</strong></p>';
                        } else if ($row->status == 1) {
                          echo '<p class="text-primary"><strong>Finalisasi</strong></p>';
                        } else if ($row->status == 2) {
                          echo '<p class="text-success"><strong>Disetujui</strong></p>';
                        } else {
                         echo "<p class='text-danger'><strong>Perlu Diperbaiki ($row->alasan) </strong></p>";
                        } ?>
                      </td>
                      <td>
                      <a href="<?php echo url('EditorialPlan/view/'.$row->id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>

                      </td>
                    </tr>
                    <?php

                    endforeach ?>
                  </tbody>
                </table>
              </div>
            <?php } ?>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <section class="content">
      <?php echo form_open_multipart('EditorialPlan/save', [ 'class' => 'form-validates', 'autocomplete' => 'off' ]); ?>

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
                <input type="hidden" class="form-control" name="idUser" required value="<?php echo $user->id; ?>" />
                <input type="hidden" class="form-control" name="idPeriode" required value="<?php echo $periode->id; ?>" />
                <input type="hidden" class="form-control" name="idOPD" required value="<?php echo $user->opd_upd; ?>" />

                <div class="col-sm-6">
                  <!-- Default card -->
                  <div class="card">

                    <div class="card-body">

                      <div class="form-group">
                        <label for="formClient-Contact">Nama Strategi Komunikasi Unggulan<label class="text-danger">*</label></label>
                        <select name="namaProgram" id="formClient-NamaProgram" class="form-control select2" style="width:100%;" required title="Bagian ini wajib diisi">
                          <option value="">Pilih Nama Strategi Komunikasi Unggulan</option>
                          <?php foreach ($strakom as $row):
                            // if ($row->ksd_id > 0){
                            //   foreach ($ksd as $rows):
                            //     if ($rows->id == $row->ksd_id ) {
                            //       echo '<option value="'.$row->id.'">'. $rows->nama .'</option>';
                            //     }
                            //  endforeach;
                            // } else {
                                echo '<option value="'.$row->id.'">'. $row->nama_program .'</option>';
                            // }
                          ?>

                          <?php endforeach ?>
                          <br>
                        </select>
                      </div>

											<div class="form-group">
												<label for="formClient-Contact">Produk Komunikasi<label class="text-danger">*</label></label>
												<select name="produkKomunikasi" id="formClient-produkKomunikasi" class="form-control" style="width:100%" required title="Bagian ini wajib diisi">
													<option value="-">Pilih Produk Komunikasi</option>
													<?php foreach ($produkkomunikasi as $row): ?>
														<option value="<?php echo $row->id ?>"><?php echo $row->nama ?></option>
													<?php endforeach ?>

												</select>
												<input type="text" style="display:none;margin-top:1%" class="form-control" name="txtLainnyaProdukKomunikasi" id="txtLainnyaProdukKomunikasi" placeholder="Lainnya" autofocus />

											</div>

                      <div class="form-group">
                        <label for="formClient-Name">Tanggal Rencana Tayang<label class="text-danger">*</label></label>
                        <input type="date" class="form-control" name="tanggalRencanaTayang" id="formClient-Tanggal" required title="Bagian ini wajib diisi" placeholder="Tanggal Rencana Tayang (DD-MM-YYYY)" autofocus />
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
                        <label for="formClient-Address">Khalayak<label class="text-danger">*</label></label>
                        <textarea type="text" class="form-control" name="khalayak" required title="Bagian ini wajib diisi" id="formClient-Khalayak" placeholder="Khalayak" rows="3"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="formClient-Contact">Kanal Komunikasi<label class="text-danger">*</label></label>
                        <select name="kanalKomunikasi" id="formClient-kanalKomunikasi" required title="Bagian ini wajib diisi" class="form-control" style="width:100%">
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
    <script>
    $(document).ready(function() {
      $('.form-validates').validate();
      $('.form-validate').validate();

        // Initialize Select2 Elements
      $('.select2').select2()

    })
    window.updateUserStatus = (id, status) => {
      $.get( '<?php echo url('users/change_status') ?>/'+id, {
        status: status
      }, (data, status) => {
        if (data=='done') {
          // code
        }else{
          alert('<?php echo lang('user_unable_change_status') ?>');
        }
      })
    }

    </script>

    <script type="text/javascript">
       const publikasiKomunikasi = document.getElementById('formClient-produkKomunikasi');
       const txtpublikasiKomunikasi = document.getElementById('txtLainnyaProdukKomunikasi');
       const kanalKomunikasi = document.getElementById('formClient-kanalKomunikasi');
       const txtkanalKomunikasi = document.getElementById('txtLainnyaKanalKomunikasi');
       const publikasiKomunikasiEdit = document.getElementById('formClient-produkKomunikasiEdit');
       const txtpublikasiKomunikasiEdit = document.getElementById('txtLainnyaProdukKomunikasiEdit');
       const kanalKomunikasiEdit = document.getElementById('formClient-kanalKomunikasiEdit');
       const txtkanalKomunikasiEdit = document.getElementById('txtLainnyaKanalKomunikasiEdit');
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

<?php include viewPath('includes/footer'); ?>
