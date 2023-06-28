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

                <?php echo form_open_multipart('ReviewEditorialPlan/editorialplan', [ 'class' => 'form-validate', 'autocomplete' => 'off','method'=> 'GET' ]); ?>
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
                          echo '<p class="text-warning"><strong>Belum Dikirim</strong></p>';
                        } else if ($row->status == 1) {
                          echo '<p class="text-primary"><strong>Dikirim</strong></p>';
                        } else if ($row->status == 2) {
                          echo '<p class="text-success"><strong>Telah Direview</strong></p>';
                        } else if ($row->status == 5 || $row->status == 6) {
                          echo '<p class="text-success"><strong>Telah Dinilai</strong></p>';
                        } else {
                         echo "<p class='text-danger'><strong>Perlu Diperbaiki ($row->alasan) </strong></p>";
                        } ?>
                      </td>
                      <td>
												<?php
													if($periode->status_verifikasi == 1){
													if($roles->role->role_id==4){
													if($row->status==1){ ?>
														<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-approveeditorial<?php echo $row->id ?>"><i class="fa fa-check" title="Setujui"></i></button>
														<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-rejecteditorial<?php echo $row->id ?>"><i class="fa fa-times" title="Tolak"></i></button>

												<?php }}} ?>
                      <a href="<?php echo url('ReviewEditorialPlan/view/'.$row->id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>

                      </td>
                    </tr>
										<div class="modal fade" id="modal-approveeditorial<?php echo $row->id ?>">
											<?php echo form_open_multipart('ReviewEditorialPlan/change_status_editorial/'.$row->id, [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>

												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title">Setujui Editorial Plan</h4>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<input type="hidden" name="userId" value="<?php echo $row->user_id; ?>">
															<input type="hidden" name="strakomId" value="<?php echo $row->strakom_id; ?>">
															<input type="hidden" name="idEditorial" value="<?php echo $row->id; ?>">
															<input type="hidden" name="opdId" value="<?php echo $row->opd_id; ?>">
															<input type="hidden" name="status_strakom" value="2">
															<div class="form-group" style="display:none">
																<label for="formClient-Name">Alasan</label>
																<textarea type="text" class="form-control" name="alasan" id="formClient-Alasan" placeholder="Alasan" rows="5"></textarea>
															</div>
															<p>Apakah kamu yakin untuk menyetujui Editorial Plan ini ?</p>
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


										<div class="modal fade" id="modal-rejecteditorial<?php echo $row->id ?>">
											<?php echo form_open_multipart('ReviewEditorialPlan/change_status_editorial/'.$row->id, [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>

										<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">Tolak Editorial Plan</h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<input type="hidden" name="userId" value="<?php echo $row->user_id; ?>">
												<input type="hidden" name="opdId" value="<?php echo $row->opd_id; ?>">
													<input type="hidden" name="strakomId" value="<?php echo $row->strakom_id; ?>">
												<input type="hidden" name="status_strakom" value="3">
												<div class="form-group">
													<label for="formClient-Name">Catatan</label>
													<textarea type="text" class="form-control" name="alasan" id="formClient-Alasan" placeholder="Catatan" rows="5"></textarea>
												</div>
												</div>
											<div class="modal-footer justify-content-between">
													<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
												<button type="submit" class="btn btn-primary">Simpan</button>
											</div>
										</div>
										<!-- /.modal-content -->
										</div>
											<?php echo form_close(); ?>
										<!-- /.modal-dialog -->
										</div>
                    <?php

                    endforeach ?>
                  </tbody>
                </table>
              </div>
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
