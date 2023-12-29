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
              <li class="breadcrumb-item"><a href="<?php echo url('/HistoryStrakomNow') ?>">History Strategi Komunikasi Unggulan</a></li>

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
					<li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Realisasi</a></li>
            </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                  <div class="row">
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
                          if($row == 9){
                            array_push($namaRencana,$rows->nama." ( ".$strakom->kanal_publikasi_lainnya." )");
                          
                          } else {
                            array_push($namaRencana,$rows->nama);
                          }
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
      	</div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                   
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
                          <a href="<?php echo url('HistoryStrakomNow/viewEditorial/'.$row->id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>

                          </td>
                        </tr>
                        <?php

                        endforeach ?>
                      </tbody>
                    </table>
                  </div>


                  <div class="tab-pane" id="tab_3">
									
                    
                          <table id="example2" class="table table-bordered table-hover table-striped">
                            <thead>
                              <tr>
                                <th style="vertical-align:middle;text-align:center;">No</th>
                                <th style="vertical-align:middle;text-align:center;">Nama Program/Kegiatan Strategi Komunikasi Unggulan</th>
                                <th style="vertical-align:middle;text-align:center;">Uraian Potensi Krisis</th>
                                <th style="vertical-align:middle;text-align:center;">Stakeholder Pro</th>
                                <th style="vertical-align:middle;text-align:center;">Stakeholder Kontra</th>
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
                                  <a href="<?php echo base_url('HistoryStrakomNow/viewMitigasi/'.$row->id) ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a>

                                </td>
                              </tr>
                              <?php

                              endforeach ?>
                              </tbody>
                          </table>
                  </div>

									  <div class="tab-pane" id="tab_4">
										
										
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
												 <td><?php echo $row->link_tautan ?></td>
												<td>
													<?php if(!empty($row->file_dokumentasi)){ ?>
												 <a href="<?php echo base_url('/uploads/datarealiasi/'.$row->file_dokumentasi); ?>" target="_blank">Lihat Dokumen</a>
											 <?php } ?>
												 </td>
											 </tr>

											 <?php

											 endforeach ?>
											 </tbody>

								</table>
										</div>

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
              
            </div>

            <!-- ./card -->
          </div>
					<div class="modal-footer justify-content-between">
						<a href="<?php echo url('/HistoryStrakomNow') ?>" class="btn btn-flat btn-secondary">Kembali</a>
					</div>
          <!-- /.col -->
        </div>
                          
        <!-- /.row -->
        <!-- END CUSTOM TABS -->


</section>



<?php include viewPath('includes/footer'); ?>


<script>
	$('#dataTable1').DataTable({
    "order": [],
    "pageLength": 25,
  });
  $("#ep").DataTable({
      order: [[0, 'asc']],
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
