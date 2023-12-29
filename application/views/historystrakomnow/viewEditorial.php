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
              <li class="breadcrumb-item">Editorial Plan</li>

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
                
      				</tbody>
      			</table>
      		</div>
      	</div>
                  </div>
                  <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
              <div class="modal-footer justify-content-between">
                
                <a href="<?php echo url('/HistoryStrakomNow/view/'.$editorialplan->idstrakom.'#tab_2') ?>" class="btn btn-flat btn-secondary">Kembali</a>
              
              </div>
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END CUSTOM TABS -->

</section>



<?php echo form_close(); ?>


<?php include viewPath('includes/footer'); ?>

<script>
	$('#dataTable1').DataTable({
    "order": [],
    "pageLength": 25,
  });
</script>
