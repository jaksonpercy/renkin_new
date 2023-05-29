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

                <?php echo form_open_multipart('StrakomUnggulan/strakom', [ 'class' => 'form-validate', 'autocomplete' => 'off','method'=> 'GET' ]); ?>
                <div class="row">
                  <div class="col-2">
                    <div class="card-body">
                    <div class="form-group">
                      <label for="formClient-Contact">Pilih Tahun</label>
                      <select name="tahun_periode" id="tahun_periode" class="form-control">
                        <option value="">Pilih Tahun</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>

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
                          <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
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
                        <option value="Triwulan I">Triwulan I</option>
                        <option value="Triwulan II">Triwulan II</option>
                        <option value="Triwulan III">Triwulan III</option>
                        <option value="Triwulan IV">Triwulan IV</option>
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
                  <?php if ($roles->role->role_id==1){
                    if ($periode->status_input_data == 1) {
                  ?>
                <div class="ml-auto p-2">

                      <a href="<?php echo url('Mitigasi/add') ?>" class="btn btn-primary btn-sm"><span class="pr-1"><i class="fa fa-plus"></i></span> Tambah Uraian Mitigasi Krisis</a>

                </div>
              <?php }
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
                      <?php if(empty($row->data_pendukung_text)){ ?>
                      <a href="<?php echo str_replace("/index.php","", base_url('/uploads/mitigasifile/'.$row->data_pendukung_file)); ?>" target="_blank">Lihat Dokumen</a>
                    <?php } else {
                        echo $row->data_pendukung_text;
                      }
                     ?>
                      </td>
                      <td>
                        <?php if ($roles->role->role_id==1){
                          if ($periode->status_input_data == 1) {
                        ?>
                        <a href="<?php echo url('Mitigasi/edit/'.$row->id) ?>" class="btn btn-sm btn-primary" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo url('Mitigasi/delete/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini ?')" title="Hapus" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                      <?php }} ?>
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
                          <?php if(empty($row->data_pendukung_text)){ ?>
                          <a href="<?php echo str_replace("/index.php","", base_url('/uploads/mitigasifile/'.$row->data_pendukung_file)); ?>" target="_blank">Lihat Dokumen</a>
                        <?php } else {
                            echo $row->data_pendukung_text;
                          }
                         ?>
                          </td>
                          <td>
                            <a href="<?php echo url('Mitigasi/view/') ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>

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
