<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Publikasi Layanan JakWifi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo lang('home') ?></a></li>
              <li class="breadcrumb-item"><a href="<?php echo url('/strakomunggulan') ?>">Strategi Komunikasi Unggulan</a></li>
              <li class="breadcrumb-item active"><?php echo $User->id ?></li>
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
					<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Editorial Plan</a></li>
          <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Uraian Mitigasi</a></li>
          <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Realisasi</a></li>



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
      						<td width="160"><strong>Nama Program/Kegiatan</strong>:</td>
      						<td>Publikasi Layanan JakWifi</td>
      					</tr>
      					<tr>
      						<td><strong>Program Prioritas</strong>:</td>
      						<td>Program Unggulan Dinas Kominfotik</td>
      					</tr>
      					<tr>
      						<td><strong>Deskripsi Singkat Kegiatan</strong>:</td>
      						<td>"Penyediaan internet untuk publik (JAKWIFI) <br>
Kegiatan ini berjalan selama satu tahun anggaran, terus menerus dengan tujuan memberikan layanan internet untuk aparatur dan publik. Layanan internet gratis untuk publik dikenal dengan JAKWIFI dengan sasaran awal RW kumuh dan akan bertambah untuk seluruh RW di Jakarta dengan sasaran masyarakat kelas menengah dan bawah."
</td>
      					</tr>
      					<tr>
      						<td><strong>Analisis Situasi</strong>:</td>
      						<td>- Pengurangan anggaran JakWifi yang berdampak berkurangnya jumlah titik JakWifi dari 3500 menjadi 1200 titik <br>
- Telah berubahnya status Pandemi menjadi Endemi <br>
- Sekolah dan Kantor sudah kembali melaksanakan kegiatan tatap muka 100%</td>
      					</tr>
      					<tr>
      						<td><strong>Identifikasi Masalah/Isu Utama</strong>:</td>
      						<td>- Pengurangan anggaran DKI Jakarta untuk JakWifi & titik pengurangan JakWifi <br>
- Isu - isu politis</td>
      					</tr>
      					<tr>
      						<td><strong>Narasi Utama Publikasi Program</strong>:</td>
      						<td>Penyesuaian JakWifi berdasarkan hasil survei kepuasan pengguna</td>
      					</tr>
                <tr>
                  <td><strong>Target Audiens</strong>:</td>
                  <td>Pro : 1. Legislatif <br> Kontra :
                  1. Masyarakat terdampak</td>
                </tr>
                <tr>
                  <td><strong>Rencana Media/Kanal Publikasi</strong>:</td>
                  <td>Media Sosial, Rapat Koordinasi, Website Pemda, FAQ, WA grup</td>
                </tr>
      				</tbody>
      			</table>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-nilai-strakom">Nilai</button>
      		</div>



      	</div>

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
				  <table id="dataTable1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Rencana Tayang</th>
              <th>Pesan Utama</th>
              <th>Produk Komunikasi</th>
              <th>Khalayak</th>
              <th>Kanal Komunikasi</th>
              <th><?php echo lang('action') ?></th>
            </tr>
            </thead>
					<tbody>


						<tr>
              <td>1</td>
              <td>5 Januari 2023</td>
              <td>Perubahan titik Jakwifi salah satunya didasari hasil survei</td>
              <td>Artikel</td>
              <td>- Pengurangan anggaran DKI Jakarta untuk JakWifi & titik pengurangan JakWifi <br>
                  - Isu - isu politis</td>
              <td>Instagram</td>
						<td>
							<a href="<?php echo url('penilaian/detaileditorial/'.$row->id) ?>" class="btn btn-sm btn-default" title="Lihat Data" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
              	<a href="<?php echo url('') ?>" class="btn btn-sm btn-success" title="Accept Data" data-toggle="tooltip"><i class="fa fa-check"></i></a>
                <a href="<?php echo url('') ?>" class="btn btn-sm btn-danger" title="Reject Data" data-toggle="tooltip"><i class="fa fa-times"></i></a>
						</td>
						</tr>


					</tbody>
				</table>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-nilai-editorial">Nilai</button>

                  </div>


                  <div class="tab-pane" id="tab_3">
				  <table id="dataTable1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th><?php echo lang('id') ?></th>
              <th>Nama Kegiatan</th>
              <th>Stakeholder Pro Pemprov DKI Jakarta</th>
              <th>Stakeholder Kontra Pemprov DKI Jakarta</th>
              <th>Juru Bicara</th>
              <th>PIC Kegiatan yang Dapat Dihubungi</th>
              <th><?php echo lang('action') ?></th>
            </tr>
            </thead>
					<tbody>


						<tr>
              <td>1</td>
              <td>Publikasi Layanan JakWifi</td>
              <td>Masyarakat umum</td>
              <td>- Masyarakat yang belum dapat memanfaatkan jaringan internet gratis yang disediakan Pemprov DKI Jakarta <br>
- Masyarakat yang merasakan kualitas internet yang disediakan pemda tidak sesuai dengan harapan <br>
- Anggota legislatif yang melihat bahwa manfaat tidak sebanding dengan biaya yang dikeluarkan pemda"
</td>
              <td>Plt. Kepala Dinas Kominfotik Provinsi DKI Jakarta</td>
              <td>Aditya Prana (Kabid JKD) 08128748447 <br>
Dema (Kasie ) 08161431790 <br>
Service desk +62 852-1654-1900 <br>
</td>
						<td>
							<a href="<?php echo url('penilaian/detailmitigasi/'.$row->id) ?>" class="btn btn-sm btn-default" title="Lihat Data" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
						</td>
						</tr>


					</tbody>
				</table>

          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-nilai-mitigasi">Nilai</button>

                  </div>

                  <div class="tab-pane" id="tab_4">
                    <div class="col-sm-12">
                			<table class="table table-bordered table-striped">
                				<tbody>
                					<tr>
                						<td width="160"><strong>Nama Program/Kegiatan</strong>:</td>
                						<td>Publikasi Layanan JakWifi</td>
                					</tr>
                          <tr>
                            <td width="160"><strong>No Lampiran</strong>:</td>
                            <td>Lamp-001</td>
                          </tr>
                          <tr>
                            <td width="160"><strong>Nama Lampiran</strong>:</td>
                            <td>Lampiran 1</td>
                          </tr>
                          <tr>
                            <td width="160"><strong>Tanggal Lampiran</strong>:</td>
                            <td>03-04-2023</td>
                          </tr>
                					<tr>
                						<td><strong>Nota Dinas</strong>:</td>
                					  <td> <a href="#">Download File Nota Dinas</a> </td>
                					</tr>

                				</tbody>
                			</table>
                		</div>

                    <table id="dataTable1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal Realisasi</th>
                        <th>Judul</th>
                        <th>Media dan Tautan</th>
                        <th>Dokumentasi</th>
                        <!-- <th><?php echo lang('action') ?></th> -->
                      </tr>
                      </thead>
                   <tbody>


                     <tr>
                        <td>1</td>
                        <td>5 Januari 2023</td>
                        <td>Perubahan titik Jakwifi salah satunya didasari hasil survei</td>
                        <td>Instagram : <br> Facebook : </td>
                        <td></td>

                        <!-- <td>
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-ubah"> <span class="pr-1"><i class="fa fa-edit"></i></span></button> -->
                          <!-- <a href="<?php echo url('realisasi/edit/') ?>" class="btn btn-sm btn-primary" title="Edit" data-toggle="tooltip"><i class="fa fa-edit"></i></a> -->
                          <!-- <a href="<?php echo url('realisasi/realisasiview/') ?>" class="btn btn-sm btn-info" title="Lihat" data-toggle="tooltip"><i class="fa fa-eye"></i></a> -->
                          <!-- <a href="<?php echo url('realisasi/delete/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini ?')" title="Hapus" data-toggle="tooltip"><i class="fa fa-trash"></i></a> -->

                        <!-- </td> -->
                     </tr>


                   </tbody>
                 </table>

          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-nilai-mitigasi">Nilai</button>

                  </div>

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <div class="modal-footer justify-content-between">
            <a href="<?php echo url('/'); ?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-approve">Approve</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-reject">Tolak</button>
          </div>
          <!-- /.col -->
        </div>

        <div class="modal fade" id="modal-approve">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Approve Rencana Kinerja</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-12">
                <!-- Default card -->


                    <div class="form-group">
                      <label for="formClient-Name">Alasan</label>
                      <textarea type="text" class="form-control" name="alasan" id="formClient-Alasan" placeholder="Alasan" rows="5"></textarea>
                    </div>
              </div>
            </div>
          </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary">Submit</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


      <div class="modal fade" id="modal-reject">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tolak Rencana Kinerja</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12">
              <!-- Default card -->


                  <div class="form-group">
                    <label for="formClient-Name">Alasan</label>
                    <textarea type="text" class="form-control" name="alasan" id="formClient-Alasan" placeholder="Alasan" rows="5"></textarea>
                  </div>
            </div>
          </div>
        </form>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Submit</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>


        <!-- /.row -->
        <!-- END CUSTOM TABS -->

        <div class="modal fade" id="modal-nilai-strakom">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Nilai Strategi Komunikasi Unggulan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-12">
                <!-- Default card -->
                <div class="form-group col-sm-2">
                  <label for="formClient-Name">Beri Nilai</label>
                  <input type="text" class="form-control" name="nilai" id="formClient-Nilai" value="30%"></input>
                </div>

                    <div class="form-group">
                      <label for="formClient-Name">Alasan</label>
                      <textarea type="text" class="form-control" name="alasan" id="formClient-Alasan" placeholder="Alasan" rows="5"></textarea>
                    </div>
              </div>
            </div>
          </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary">Submit</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="modal-nilai-editorial">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Nilai Editorial Plan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12">
              <!-- Default card -->
              <div class="form-group col-sm-2">
                <label for="formClient-Name">Beri Nilai</label>
                <input type="text" class="form-control" name="nilai" id="formClient-Nilai" value="30%"></input>
              </div>

                  <div class="form-group">
                    <label for="formClient-Name">Alasan</label>
                    <textarea type="text" class="form-control" name="alasan" id="formClient-Alasan" placeholder="Alasan" rows="5"></textarea>
                  </div>
            </div>
          </div>
        </form>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Submit</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-nilai-mitigasi">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Nilai Uraian Mitigasi Krisis</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-sm-12">
            <!-- Default card -->
            <div class="form-group col-sm-2">
              <label for="formClient-Name">Beri Nilai</label>
              <input type="text" class="form-control" name="nilai" id="formClient-Nilai" value="30%"></input>
            </div>

                <div class="form-group">
                  <label for="formClient-Name">Alasan</label>
                  <textarea type="text" class="form-control" name="alasan" id="formClient-Alasan" placeholder="Alasan" rows="5"></textarea>
                </div>
          </div>
        </div>
      </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
</section>

<?php include viewPath('includes/footer'); ?>

<script>
	$('#dataTable1').DataTable({
    "order": []
  });
</script>
