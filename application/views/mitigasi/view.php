<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $mitigasi->nama_kegiatan; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo lang('home') ?></a></li>
              <li class="breadcrumb-item"><a href="<?php echo url('/Mitigasi') ?>">Uraian Materi Mitigasi Krisis</a></li>
              <li class="breadcrumb-item active"><?php echo $mitigasi->id; ?></li>
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
						<li class="nav-item"><a class="nav-link" href="<?php echo url('Mitigasi/edit/'.$mitigasi->id) ?>">Edit</a></li>


                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
				  <div class="row">

      		<div class="col-sm-12">
            <?php if ($roles->role->role_id==1):?>
      			<table class="table table-bordered table-striped">
      				<tbody>
      					<tr>
      						<td width="160"><strong>Nama Kegiatan</strong>:</td>
      						<td><?php echo $mitigasi->nama_kegiatan ?></td>
      					</tr>
      					<tr>
      						<td><strong>Uraian Potensi Krisis</strong>:</td>
      						<td><?php echo $mitigasi->uraian_potensi ?></td>
      					</tr>
      					<tr>
      						<td><strong>Stakeholder Pro Pemprov DKI Jakarta</strong>:</td>
      						<td><?php echo $mitigasi->stakeholder_pro ?></td>
      					</tr>
                <tr>
      						<td><strong>Stakeholder Kontra Pemprov DKI Jakarta</strong>:</td>
      						<td><?php echo $mitigasi->stakeholder_kontra ?></td>
      					</tr>
                <tr>
      						<td><strong>Juru Bicara</strong>:</td>
      						<td><?php echo $mitigasi->juru_bicara ?></td>
      					</tr>
                <tr>
                  <td><strong>Data Pendukung Kegiatan / Bahan Komunikasi</strong>:</td>
                  <td>  <?php if(empty($mitigasi->data_pendukung_text)){ ?>
                    <a href="<?php echo url('/uploads/mitigasifile/'.$mitigasi->data_pendukung_file); ?>" target="_blank">Lihat Dokumen</a>
                  <?php } else { ?>
                    <a href="<?php echo url($mitigasi->data_pendukung_text); ?>" target="_blank">Lihat Dokumen</a>
                  <?php } ?></td>
                </tr>
                <tr>
                  <td><strong>PIC Kegiatan yang Dapat Dihubungi</strong>:</td>
                  <td><?php echo $mitigasi->pic_kegiatan ?></td>
                </tr>
      				</tbody>
      			</table>
            <?php else:?>
              <table class="table table-bordered table-striped">
        				<tbody>
                  <tr>
        						<td width="160"><strong>Nama OPD</strong>:</td>
        						<td><?php
                    foreach ($user as $rows):
                      if ($rows->id == $mitigasi->user_id ) {
                        echo $rows->name;
                      }
                   endforeach;
                    ?></td>
        					</tr>
        					<tr>
        						<td width="160"><strong>Nama Kegiatan</strong>:</td>
        						<td><?php echo $mitigasi->nama_kegiatan ?></td>
        					</tr>
        					<tr>
        						<td><strong>Uraian Potensi Krisis</strong>:</td>
        						<td><?php echo $mitigasi->uraian_potensi ?></td>
        					</tr>
        					<tr>
        						<td><strong>Stakeholder Pro Pemprov DKI Jakarta</strong>:</td>
        						<td><?php echo $mitigasi->stakeholder_pro ?></td>
        					</tr>
                  <tr>
        						<td><strong>Stakeholder Kontra Pemprov DKI Jakarta</strong>:</td>
        						<td><?php echo $mitigasi->stakeholder_kontra ?></td>
        					</tr>
                  <tr>
        						<td><strong>Juru Bicara</strong>:</td>
        						<td><?php echo $mitigasi->juru_bicara ?></td>
        					</tr>
                  <tr>
                    <td><strong>Data Pendukung Kegiatan / Bahan Komunikasi</strong>:</td>
                    <td>  <?php if(empty($mitigasi->data_pendukung_text)){ ?>
                      <a href="<?php echo url('/uploads/mitigasifile/'.$mitigasi->data_pendukung_file); ?>" target="_blank">Lihat Dokumen</a>
                    <?php } else { ?>
                      <a href="<?php echo url($mitigasi->data_pendukung_text); ?>" target="_blank">Lihat Dokumen</a>
                    <?php } ?></td>
                  </tr>
                  <tr>
                    <td><strong>PIC Kegiatan yang Dapat Dihubungi</strong>:</td>
                    <td><?php echo $mitigasi->pic_kegiatan ?></td>
                  </tr>
        				</tbody>
        			</table>
            <?php endif ?>
      		</div>
      	</div>
                  </div>
                  <!-- /.tab-pane -->
                  <div>

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
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
    "order": []
  });
</script>
