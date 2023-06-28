<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editorial Plan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo lang('home') ?></a></li>
              <li class="breadcrumb-item"><a href="<?php echo url('/ReviewEditorialPlan') ?>">Editorial Plan</a></li>

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

					<?php if ($roles->role->role_id==1){
          if ($periode->status_input_data == 1) {
            if ($editorialplan->status == 0) {
            ?>
            <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#modal-lg-edit<?php echo $editorialplan->id ?>">Edit</a></li>
          <?php }}}?>


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
                  <td><strong>Nama Strategi Komunikasi Unggulan</strong></td>
                  <td><?php echo $editorialplan->nama_program ?></td>
                </tr>
      					<tr>
      						<td width="160"><strong>Tanggal Rencana Tayang</strong>:</td>
      						<td><?php
                  $date=date_create($editorialplan->tanggal_rencana);
                  echo date_format($date,"d F Y ");
                  ?></td>
      					</tr>
      					<tr>
      						<td><strong>Pesan Utama</strong>:</td>
      						<td><?php echo $editorialplan->pesan_utama ?></td>
      					</tr>
      					<tr>
      						<td><strong>Produk Komunikasi</strong>:</td>
      						<td>
                    <?php
                      foreach ($produkkomunikasi as $rows):
                        if ($rows->id == $editorialplan->produk_komunikasi ) {
                          echo $rows->nama;
                        }
                     endforeach;
                    ?>
                  </td>
      					</tr>
      					<tr>
      						<td><strong>Khalayak</strong>:</td>
      						<td><?php echo $editorialplan->khalayak ?></td>
      					</tr>
      					<tr>
      						<td><strong>Kanal Komunikasi</strong>:</td>
      						<td>
                    <?php
                      foreach ($rencanamedia as $rows):
                        if ($rows->id == $editorialplan->kanal_komunikasi ) {
                          echo $rows->nama;
                        }
                     endforeach;
                    ?>
                  </td>
      					</tr>
                <tr>
                  <td><strong>Status</strong></td>
                  <td>

                    <?php if ($editorialplan->status == 0) {
                      echo '<p class="text-warning"><strong>Belum Dikirim</strong></p>';
                    } else if ($editorialplan->status == 1) {
                      echo '<p class="text-primary"><strong>Dikirim</strong></p>';
                    } else if ($editorialplan->status == 2) {
                      echo '<p class="text-success"><strong>Telah Direview</strong></p>';
                    } else if ($editorialplan->status == 5 || $editorialplan->status == 6) {
                      echo '<p class="text-success"><strong>Telah Dinilai</strong></p>';
                    } else {
                       echo "<p class='text-danger'><strong>Perlu Diperbaiki ($editorialplan->alasan) </strong></p>";
                    } ?>
                  </td>
                </tr>
      				</tbody>
      			</table>
      		</div>
      	</div>
                  </div>
                  <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
                <?php
                  if($periode->status_input_data == 1){
                  if($roles->role->role_id==4 || $roles->role->role_id == 2){ ?>

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-approveeditorial">Setujui</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-rejecteditorial">Tolak</button>
              <?php }} ?>
              </div><!-- /.card-body -->

              <div class="modal-footer justify-content-between">

                <a href="<?php echo url('/ReviewEditorialPlan') ?>" class="btn btn-flat btn-secondary">Kembali</a>
              </div>
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END CUSTOM TABS -->

</section>

<div class="modal fade" id="modal-approveeditorial">
  <?php echo form_open_multipart('ReviewEditorialPlan/change_status_editorial_detail/'.$editorialplan->id, [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Setujui Editorial Plan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="userId" value="<?php echo $editorialplan->user_id; ?>">
          <input type="hidden" name="strakomId" value="<?php echo $editorialplan->strakom_id; ?>">
          <input type="hidden" name="idEditorial" value="<?php echo $editorialplan->id; ?>">
          <input type="hidden" name="opdId" value="<?php echo $editorialplan->opd_id; ?>">
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


<div class="modal fade" id="modal-rejecteditorial">
  <?php echo form_open_multipart('ReviewEditorialPlan/change_status_editorial_detail/'.$editorialplan->id, [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>

<div class="modal-dialog modal-lg">
<div class="modal-content">
  <div class="modal-header">
    <h4 class="modal-title">Tolak Editorial Plan</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <input type="hidden" name="userId" value="<?php echo $editorialplan->user_id; ?>">
    <input type="hidden" name="opdId" value="<?php echo $editorialplan->opd_id; ?>">
      <input type="hidden" name="strakomId" value="<?php echo $editorialplan->strakom_id; ?>">
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

<section class="content">
  <?php echo form_open_multipart('EditorialPlan/updateDataView/'.$editorialplan->id, [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>

  <div class="container-fluid">
    <div class="row">
<div class="modal fade" id="modal-lg-edit<?php echo $editorialplan->id ?>">
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
          <input type="hidden" class="form-control" name="idUser" required value="<?php echo $editorialplan->user_id; ?>" />
          <input type="hidden" class="form-control" name="idPeriode" required value="<?php echo $editorialplan->periode_id; ?>" />
          <input type="hidden" class="form-control" name="idOPD" required value="<?php echo $editorialplan->opd_id; ?>" />


          <div class="card-body">

            <div class="form-group">
              <label for="formClient-Contact">Nama Kegiatan*</label>
              <select name="namaProgram" id="formClient-NamaProgram" class="form-control select2" required>
                <?php foreach ($strakom as $rows):


                  if ($rows->ksd_id > 0){

                    foreach ($ksd as $rowss):

                      if ($rowss->id == $rows->ksd_id ) {
                        if ($editorialplan->strakom_id == $rows->id) {
                            echo '<option value="'.$rows->id.'" selected>'. $rowss->nama .'</option>';
                        } else {
                           echo '<option value="'.$rows->id.'">'. $rowss->nama .'</option>';
                         }
                      }

                   endforeach;
                  } else {
                    $sel ="";
                    if ($editorialplan->strakom_id == $rows->id) {
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
              <label for="formClient-Name">Tanggal Rencana Tayang*</label>
              <input type="text" class="form-control" name="tanggalRencanaTayang" required placeholder="Tanggal Rencana Tayang" autofocus value="<?php echo $editorialplan->tanggal_rencana;?>" />
            </div>

            <div class="form-group">
              <label for="formClient-Address">Pesan Utama*</label>
              <textarea type="text" class="form-control" name="pesanUtama" id="formClient-Address" placeholder="Deskripsi Kegiatan" rows="5"><?php echo $editorialplan->pesan_utama; ?></textarea>
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
              <label for="formClient-Contact">Produk Komunikasi*</label>
              <select name="produkKomunikasi" id="formClient-Produk" class="form-control select2" required>
                <?php foreach ($produkkomunikasi as $rows):
                  if ($editorialplan->produk_komunikasi == $rows->id) {
                ?>
                  <option value="<?php echo $rows->id ?>" selected><?php echo $rows->nama ?></option>
                <?php } else { ?>
                  <option value="<?php echo $rows->id ?>"><?php echo $rows->nama ?></option>

                <?php }
                endforeach ?>

              </select>
            </div>


                <div class="form-group">
                  <label for="formClient-Address">Khalayak*</label>
                  <textarea type="text" class="form-control" name="khalayak" id="formClient-Address" placeholder="Analisis Situasi" rows="3"><?php echo $editorialplan->khalayak; ?></textarea>
                </div>


            <div class="form-group">
              <label for="formClient-Contact">Kanal Komunikasi*</label>
              <select name="kanalKomunikasi" id="formClient-Role" class="form-control select2" required>

                <?php foreach ($rencanamedia as $rows):
                  if ($editorialplan->kanal_komunikasi == $rows->id) {
                ?>
                  <option value="<?php echo $rows->id ?>" selected><?php echo $rows->nama ?></option>
                <?php } else { ?>
                  <option value="<?php echo $rows->id ?>"><?php echo $rows->nama ?></option>

                <?php }
                endforeach ?>

              </select>
            </div>


          </div>
          <!-- /.card-body -->

        </div>
      </div>
    </div>
</div>
<div class="modal-footer justify-content-between">
  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
  <button type="submit" class="btn btn-primary">Submit</button>
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


<?php include viewPath('includes/footer'); ?>

<script>
	$('#dataTable1').DataTable({
    "order": [],
    "pageLength": 25,
  });
</script>
