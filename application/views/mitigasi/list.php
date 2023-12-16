<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Uraian Materi Mitigasi Krisis</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item active">Uraian Materi Mitigasi Krisis</li>
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

                <?php echo form_open_multipart('Mitigasi/mitigasi', [ 'class' => 'form-validate', 'autocomplete' => 'off','method'=> 'GET' ]); ?>
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
                <h3 class="card-title p-3">Uraian Materi Mitigasi Krisis</h3>
                <div class="ml-auto p-2">
                  <?php
                  if(count($periodeCount) > 0){
                  if ($roles->role->role_id==1){
                    if ($periode->status_input_data == 1) {
                  ?>
                <div class="ml-auto p-2">

                      <a href="<?php echo url('Mitigasi/add') ?>" class="btn btn-primary btn-sm"><span class="pr-1"><i class="fa fa-plus"></i></span> Tambah Uraian Mitigasi Krisis</a>

                </div>
              <?php }}
              } ?>
              </div>
            </div>

              <?php if ($roles->role->role_id==1):?>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-striped">
                  <thead>
                  <tr>
                    <th style="vertical-align:middle;text-align:center;">No</th>
                    <th style="vertical-align:middle;text-align:center;">Nama Program/Kegiatan Strategi Komunikasi Unggulan</th>
                    <th style="vertical-align:middle;text-align:center;">Uraian Potensi Krisis</th>
                    <th style="vertical-align:middle;text-align:center;">Stakeholder Pro</th>
                    <th style="vertical-align:middle;text-align:center;">Stakeholder Kontra</th>
                    <th style="vertical-align:middle;text-align:center;">Juru Bicara</th>
                    <th style="vertical-align:middle;text-align:center;">PIC Kegiatan yang Dapat Dihubungi</th>
                    <th style="vertical-align:middle;text-align:center;">Data Pendukung Kegiatan</th>
                    <th style="vertical-align:middle;text-align:center;">Status</th>
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
                      <td>
                      <?php if(!empty($row->data_pendukung_text) && !empty($row->data_pendukung_file) ){
                       ?>
                      <!-- <a href="<?php echo str_replace("/index.php","", base_url('/uploads/mitigasifile/'.$row->data_pendukung_file)); ?>" target="_blank">Lihat Dokumen</a> -->
                      <?php if (!filter_var($row->data_pendukung_text, FILTER_VALIDATE_URL)) { ?>
                        <a href="" onclick="alert('Invalid URL Format')"><?php echo $row->data_pendukung_text ?></a> <br>
                      <?php } else { ?>
                        <a href="<?php echo $row->data_pendukung_text ?>" target="_blank"><?php echo $row->data_pendukung_text ?></a> <br>
                      <?php } ?>
                      <a href="<?php echo base_url('/uploads/mitigasifile/'.$row->data_pendukung_file); ?>" target="_blank">Lihat Dokumen</a>

                    <?php } else {
                      if(empty($row->data_pendukung_text) && !empty($row->data_pendukung_file)) {
                     ?>
                     <a href="<?php echo base_url('/uploads/mitigasifile/'.$row->data_pendukung_file); ?>" target="_blank">Lihat Dokumen</a>

                    <?php
                    } else {
                    ?>
                    <?php if (!filter_var($row->data_pendukung_text, FILTER_VALIDATE_URL)) { ?>
                      <a href="" onclick="alert('Invalid URL Format')"><?php echo $row->data_pendukung_text ?></a> <br>
                    <?php } else { ?>
                      <a href="<?php echo $row->data_pendukung_text ?>" target="_blank"><?php echo $row->data_pendukung_text ?></a> <br>
                    <?php } ?>
                      <?php

                      } }
                     ?>
                      </td>
                      <td>

                        <?php if ($row->status == 0) {
                          echo '<p class="text-warning"><strong>Belum Dikirim</strong></p>';
                        } else if ($row->status == 1) {
                          echo '<p class="text-primary"><strong>Dikirim</strong></p>';
                        } else if ($row->status == 2) {
                          echo '<p class="text-success"><strong>Disetujui</strong></p>';
                        } else if ($row->status == 5 || $row->status == 6) {
                          echo '<p class="text-success"><strong>Telah Dinilai</strong></p>';
                        } else {
                           echo "<p class='text-danger'><strong>Perlu Diperbaiki ($row->alasan) </strong></p>";
                        } ?>
                      </td>
                      <td>
                        <?php
                        if(count($periodeCount) > 0){
                        if ($roles->role->role_id==1){
                          if ($periode->status_input_data == 1) {
                             if ($row->status == 0 || $row->status == 3) {
                        ?>
                        <a href="<?php echo url('Mitigasi/edit/'.$row->id) ?>" class="btn btn-sm btn-primary" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo url('Mitigasi/delete/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini ?')" title="Hapus" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                      <?php }}}} ?>
                        <a href="<?php echo url('Mitigasi/view/'.$row->id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>

                      </td>
                    </tr>
                    <?php
                    }
                    endforeach ?>
                    </tbody>
                </table>
              </div>
                <?php else:?>
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-striped">
                      <thead>
                        <tr>
                          <th style="vertical-align:middle;text-align:center;">No</th>
                          <th style="vertical-align:middle;text-align:center;">Nama Program/Kegiatan Strategi Komunikasi Unggulan</th>
                          <th style="vertical-align:middle;text-align:center;">Uraian Potensi Krisis</th>
                          <th style="vertical-align:middle;text-align:center;">Stakeholder Pro</th>
                          <th style="vertical-align:middle;text-align:center;">Stakeholder Kontra</th>
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
                          <td>
                          <?php if(!empty($row->data_pendukung_text) && !empty($row->data_pendukung_file) ){
                            ?>
                          <?php if (!filter_var($row->data_pendukung_text, FILTER_VALIDATE_URL)) { ?>
                            <a href="alert('Invalid URL Format')"><?php echo $row->data_pendukung_text ?></a> <br>
                          <?php } else { ?>
                            <a href="<?php echo $row->data_pendukung_text ?>" target="_blank"><?php echo $row->data_pendukung_text ?></a> <br>
                          <?php } ?>
                            <a href="<?php echo url('Mitigasi/downloadFile/'.$row->data_pendukung_file); ?>">Lihat Dokumen</a>
  <!--  -->
                          <!-- <a href="<?php echo str_replace("/index.php","", base_url('/uploads/mitigasifile/'.$row->data_pendukung_file)); ?>" target="_blank">Lihat Dokumen</a> -->
                          <!-- <a href="<?php echo url('Mitigasi/downloadFile/'.$row->data_pendukung_file); ?>">Lihat Dokumen</a> -->
<!--  -->
                        <?php } else {
                          if(empty($row->data_pendukung_text) && !empty($row->data_pendukung_file)) {
                         ?>
                         <a href="<?php echo url('Mitigasi/downloadFile/'.$row->data_pendukung_file); ?>">Lihat Dokumen</a>

                        <?php
                        } else {

                         ?>
                         <a href="<?php echo $row->data_pendukung_text ?>" target="_blank"><?php echo $row->data_pendukung_text ?></a>
                       <?php }} ?>
                          </td>
                          <td>
                            <a href="<?php echo url('Mitigasi/view/'.$row->id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>

                          </td>
                        </tr>
                        <?php

                        endforeach ?>
                        </tbody>
                    </table>
                  </div>
                <?php endif ?>
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



<?php include viewPath('includes/footer'); ?>

<script>
    $(document).ready(function() {

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
