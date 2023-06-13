<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StrakomUnggulan extends MY_Controller {

  public function __construct() {

    parent::__construct();
    $this->page_data['page']->title = 'Strategi Komunikasi Unggulan';
    $this->page_data['page']->menu = 'rencanakinerja';
    // load base_url
  }

  public function index(){
    	$this->strakom();

  }

  public function strakom()
	{

    $tahun = $this->input->get('tahun_periode');
    // $skpd = $this->input->post('user_id');
    $triwulan = $this->input->get('triwulan_periode');
    //$filtered_get = array_filter($_POST);
    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
    $this->page_data['user'] = $this->users_model->get();
    $this->page_data['userbyid'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    if ($this->page_data['roles']->role->role_id == 1) {
        $this->page_data['strakom'] = $this->Strakom_model->getDataByUserId($this->session->userdata('logged')['id'],$tahun,$triwulan);
    } else if ($this->page_data['roles']->role->role_id == 2) {
        $this->page_data['strakom'] = $this->Strakom_model->getListStrakomByOpd("(".$this->page_data['userbyid']->skpd_renkin.")");
    } else  {
      $this->page_data['strakom'] = $this->Strakom_model->get();
    }
    $this->page_data['countstrakom'] = $this->Strakom_model->countAll();
    $this->page_data['countstrakomApproved'] = $this->Strakom_model->countAllByStatus(2);
    $this->page_data['countstrakomRejected'] = $this->Strakom_model->countAllByStatus(3);
    $this->page_data['countstrakombyid'] = $this->Strakom_model->countAllByUserId($this->session->userdata('logged')['id']);
    $this->page_data['countstrakombyidApproved'] = $this->Strakom_model->countAllByUserIdAndStatus($this->session->userdata('logged')['id'],2);
    $this->page_data['countstrakombyidRejected'] = $this->Strakom_model->countAllByUserIdAndStatus($this->session->userdata('logged')['id'],3);

    $this->page_data['jeniskegiatan'] = $this->JenisKegiatan_model->getByStatusActive(1);
    $this->page_data['rencanamedia'] = $this->KanalPublikasi_model->getByStatusActive(1);

    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
		$this->page_data['page']->submenu = 'strakom';
    $this->load->view('strakom/list', $this->page_data);
	}

  public function add(){
    // load view
    $this->page_data['kategoriprogram'] = $this->KategoriProgram_model->getByStatusActive(1);
    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->page_data['jeniskegiatan'] = $this->JenisKegiatan_model->getByStatusActive(1);
    $this->page_data['rencanamedia'] = $this->KanalPublikasi_model->getByStatusActive(1);
    $this->page_data['user'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
    $this->page_data['page']->submenu = 'strakom';
    $this->load->view('strakom/form-add', $this->page_data);

  }

  public function edit($id){
    // load view
    $this->page_data['kategoriprogram'] = $this->KategoriProgram_model->getByStatusActive(1);
    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->page_data['jeniskegiatan'] = $this->JenisKegiatan_model->getByStatusActive(1);
    $this->page_data['rencanamedia'] = $this->KanalPublikasi_model->getByStatusActive(1);
    $this->page_data['strakom'] = $this->Strakom_model->getById($id);

    $this->page_data['page']->submenu = 'strakom';
    $this->load->view('strakom/form-edit', $this->page_data);

  }

  public function view($id){
    // load view
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];
    $this->page_data['user'] = $this->users_model->get();
    $this->page_data['jeniskegiatan'] = $this->JenisKegiatan_model->getByStatusActive(1);
    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->page_data['rencanamedia'] = $this->KanalPublikasi_model->getByStatusActive(1);
    $this->page_data['strakom'] = $this->Strakom_model->getById($id);

    $this->page_data['strakomList'] = $this->Strakom_model->get();
    $this->page_data['editorialplan'] = $this->Editorial_model->getDataByStrakomId($id);
    $this->page_data['mitigasi'] = $this->Mitigasi_model->getDataJoinThreeTable($this->session->userdata('logged')['id'],$id);

    $this->page_data['produkkomunikasi'] = $this->ProdukKomunikasi_model->getByStatusActive(1);
    $this->page_data['page']->submenu = 'strakom';
    $this->load->view('strakom/view', $this->page_data);

  }
  
  public function download($id){
	//$this->load->library('pdfgenerator');
    // load view
	
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];
    $this->page_data['user'] = $this->users_model->get();
    $this->page_data['jeniskegiatan'] = $this->JenisKegiatan_model->getByStatusActive(1);
    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->page_data['rencanamedia'] = $this->KanalPublikasi_model->getByStatusActive(1);
    $this->page_data['strakom'] = $this->Strakom_model->getById($id);

    $this->page_data['strakomList'] = $this->Strakom_model->get();
    $this->page_data['editorialplan'] = $this->Editorial_model->getDataByStrakomId($id);
    $this->page_data['mitigasi'] = $this->Mitigasi_model->getDataJoinThreeTable($this->session->userdata('logged')['id'],$id);

    $this->page_data['produkkomunikasi'] = $this->ProdukKomunikasi_model->getByStatusActive(1);
    $this->page_data['page']->submenu = 'strakom';
    
	
        
   /*     
    // title dari pdf
    $this->data['title_pdf'] = $this->page_data['strakom']->nama_program;
        
    // filename dari pdf ketika didownload
    $file_pdf = 'laporan_penjualan_toko_kita';
    // setting paper
    $paper = 'A4';
    //orientasi paper potrait / landscape
    $orientation = "portrait";
	
	$html = $this->load->view('strakom/download', $this->data, true);
        
	$this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
	*/
	require_once(APPPATH.'libraries/xlsxwriter.class.php');
	 $fname='uploads/strakom_unggulan.xlsx';
   $strakom = array();
   array_push($strakom, array('STRATEGI KOMUNIKASI'));
   array_push($strakom, array($this->page_data['strakom']->nama_program));
   array_push($strakom, array(''));
   array_push(
    $strakom,
    array('Kategori Program/Kegiatan',$this->page_data['strakom']->kategori_program == '1'?'Isu Prioritas':($this->page_data['strakom']->kategori_program == '2'?'KSD':'Program Unggulan Perangkat Daerah')),
    array('Nama Program/Kegiatan',$this->page_data['strakom']->nama_program),
    array('Jenis Kegiatan',$this->page_data['strakom']->jenis_kegiatan),
    array('Deskripsi Singkat Kegiatan',$this->page_data['strakom']->deskripsi),
    array('Analisis Situasi',$this->page_data['strakom']->analisis_situasi),
    array('Identifikasi Masalah/Isu Utama',$this->page_data['strakom']->identifikasi_masalah),
    array('Narasi Utama Publikasi Program',$this->page_data['strakom']->narasi_utama),
    array('Target Audiens','Pro : '.$this->page_data['strakom']->target_pro.'. Kontra : '.$this->page_data['strakom']->target_kontra),
    array('Rencana Media/Kanal Publikasi',$this->page_data['strakom']->kanal_publikasi),
    array('Status',$this->page_data['strakom']->status)
   );

   $editorialplan = array();
   array_push($editorialplan, array('EDITORIAL PLAN'));
   array_push($editorialplan,
   array(''),
   array('No.','Tanggal Rencana Tayang','Pesan Utama','Produk Komunikasi','Khalayak','Kanal Komunikasi')
  );

  $no=0;
  foreach ($this->page_data['editorialplan'] as $row){
    $no++;
    $produkkomunikasi='';
    foreach ($this->page_data['produkkomunikasi'] as $rows){
      if ($rows->id == $row->produk_komunikasi ) {
        $produkkomunikasi = $rows->nama;
      }
    }
    $kanalkomunikasi='';
    foreach ($this->page_data['rencanamedia'] as $rows){
      if ($rows->id == $row->kanal_komunikasi ) {
        $kanalkomunikasi = $rows->nama;
      }
    }

    array_push($editorialplan,
    array(
      $no,
      $row->tanggal_rencana,
      $row->pesan_utama,
      $produkkomunikasi,
      $row->khalayak,
      $kanalkomunikasi
    )
  );
  }


  //////////////////////////////// Uraian Materi Mitigasi ////////////////////////////////////

  $mitigasi = array();
   array_push($mitigasi, array('URAIAN MATERI MITIGASI KRISIS'));
   array_push($mitigasi,
   array(''),
   array('No.','Nama Program/Kegiatan Strategi Komunikasi Unggulan','Uraian Potensi Krisis','Stakeholder Pro Pemprov DKI Jakarta','Stakeholder Kontra Pemprov DKI Jakarta','Juru Bicara','PIC Kegiatan yang Dapat Dihubungi')
  );

  $no=0;
  foreach ($this->page_data['mitigasi'] as $row){
    $no++;
    $namaprogram='';
    if (is_null($row->nama)) {
      $namaprogram = $row->nama_program;
    } else {
      $namaprogram=$row->nama;
    }                          

    array_push($mitigasi,
    array(
      $no,
      $namaprogram,
      $row->uraian_potensi,
      $row->stakeholder_pro,
      $row->stakeholder_kontra,
      $row->juru_bicara,
      $row->pic_kegiatan
    )
  );
  }

	 $writer = new XLSXWriter();
	 $writer->setAuthor('Diskominfo DKI Jakarta');
	 $writer->writeSheet($strakom,'1. Strakom Unggulan');  // with headers
	 $writer->writeSheet($editorialplan,'2. Editorial Plan');            // no headers
   $writer->writeSheet($mitigasi,'3. Uraian Materi Mitigasi Krisis');
	 $writer->writeToFile($fname);   // creates XLSX file (in current folder) 
	 redirect($fname.'?date='.date('Ymdis'));

  }

  public function delete($id)
  {

    // ifPermissions('users_delete');

    if($id!==1 && $id!=logged($id)){ }else{
      redirect('/','refresh');
      return;
    }

    $id = $this->Strakom_model->delete($id);

    $this->activity_model->add("Strategi Komunikasi Unggulan #$id Dihapus oleh:".logged('name'));

    $this->session->set_flashdata('alert-type', 'success');
    $this->session->set_flashdata('alert', 'Strategi Komunikasi Unggulan Berhasil Di Hapus');

    redirect('StrakomUnggulan');

  }

  public function save()
	{

		postAllowed();
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
		// ifPermissions('permissions_add');
		$uuid = uniqid();
    $namaProgram ='';
    $jenisKegiatan='';

    if ($this->input->post('kategoriProgram')==1){
        $namaProgram = $this->input->post('namaProgram');
        $jenisKegiatan = $this->input->post('jenisKegiatan');
    }else if ($this->input->post('kategoriProgram')==2) {
      // code...
      $namaProgram = $this->input->post('namaKSD');
    } else {
      $namaProgram = $this->input->post('namaProgramUnggulan');
    }

		$periode = $this->Strakom_model->create([
			'id' => $uuid,
			'kategori_program' => $this->input->post('kategoriProgram'),
			'nama_program' => $namaProgram,
      'ksd_id' => $namaProgram,
			'jenis_kegiatan' => $jenisKegiatan,
      'deskripsi' => $this->input->post('deskripsiKegiatan'),
			'analisis_situasi' => $this->input->post('analisisSituasi'),
			'identifikasi_masalah' => $this->input->post('identifikasiMasalah'),
			'narasi_utama' => $this->input->post('narasiUtama'),
			'target_pro' => $this->input->post('targetAudiensPro'),
			'target_kontra' => $this->input->post('targetAudiensKontra'),
			'kanal_publikasi' => implode(", ",$this->input->post('rencanaMedia')),
      'kanal_publikasi_lainnya' => $this->input->post('textlainnya'),
			'user_id' => $this->input->post('idUser'),
			'periode_id' => $this->input->post('idPeriode'),
			'opd_id' => $this->input->post('idOPD'),
		]);

		$this->activity_model->add("Menambahkan Data Strategi Komunikasi Unggulan #$periode oleh User: #".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Menambahkan data Strategi Komunikasi Unggulan Berhasil');

		redirect('StrakomUnggulan');

	}

  public function updateData($id)
	{

		postAllowed();

		// ifPermissions('permissions_edit');
    $uuid = uniqid();
    $namaProgram ='';
    $jenisKegiatan='';

    if ($this->input->post('kategoriProgram') == 1){
        $namaProgram = $this->input->post('namaProgram');
        $jenisKegiatan = $this->input->post('jenisKegiatan');
    }else if ($this->input->post('kategoriProgram')==2) {
      // code...
      $namaProgram = $this->input->post('namaKSD');
    } else {
      $namaProgram = $this->input->post('namaProgramUnggulan');
    }

		$data = [
      'id' => $uuid,
      'kategori_program' => $this->input->post('kategoriProgram'),
      'nama_program' => $namaProgram,
      'ksd_id' => $namaProgram,
      'jenis_kegiatan' => $jenisKegiatan,
      'deskripsi' => $this->input->post('deskripsiKegiatan'),
      'analisis_situasi' => $this->input->post('analisisSituasi'),
      'identifikasi_masalah' => $this->input->post('identifikasiMasalah'),
      'narasi_utama' => $this->input->post('narasiUtama'),
      'target_pro' => $this->input->post('targetAudiensPro'),
      'target_kontra' => $this->input->post('targetAudiensKontra'),
      'kanal_publikasi' => implode(", ",$this->input->post('rencanaMedia')),
      'kanal_publikasi_lainnya' => $this->input->post('textlainnya'),
      'status' => "0",
      'user_id' => $this->input->post('idUser'),
      'periode_id' => $this->input->post('idPeriode'),
      'opd_id' => $this->input->post('idOPD'),
		];

		$permission = $this->Strakom_model->update($id, $data);

		$this->activity_model->add("Mengubah Data Strategi Komunikasi Unggulan #$permission oleh User: #".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Mengubah Data Strategi Komunikasi Unggulan Berhasil');

      redirect('StrakomUnggulan');

	}

  public function deleteEditorialPlan($id)
  {

    // ifPermissions('users_delete');

    $this->page_data['editorialplan'] = $this->Editorial_model->getById($id);


    if($id!==1 && $id!=logged($id)){ }else{
      redirect('/','refresh');
      return;
    }

    $id = $this->Editorial_model->delete($id);

    $this->activity_model->add("Editorial Plan #$id Dihapus oleh:".logged('name'));

    $this->session->set_flashdata('alert-type', 'success');
    $this->session->set_flashdata('alert', 'Editorial Plan Berhasil Di Hapus');

    redirect('StrakomUnggulan/view/'.$this->page_data['editorialplan']->strakom_id);

  }


  public function updateDataEditorialPlan($id)
	{

		postAllowed();

		// ifPermissions('permissions_edit');
    $uuid = uniqid();


    $data = [
      'strakom_id' => $this->input->post('namaProgram'),
      'tanggal_rencana' => $this->input->post('tanggalRencanaTayang'),
      'produk_komunikasi' => $this->input->post('produkKomunikasi'),
      'txtLainProdukKomunikasi' => $this->input->post('txtLainnyaProdukKomunikasi'),
      'kanal_komunikasi' => $this->input->post('kanalKomunikasi'),
      'txtLainKanalKomunikasi' => $this->input->post('txtLainnyaKanalKomunikasi'),
      'pesan_utama' => $this->input->post('pesanUtama'),
      'khalayak' => $this->input->post('khalayak'),
      'user_id' => $this->input->post('idUser'),
      'periode_id' => $this->input->post('idPeriode'),
      'opd_id' => $this->input->post('idOPD'),
    ];

		$permission = $this->Editorial_model->update($id, $data);

		$this->activity_model->add("Mengubah Data Editorial Plan #$permission oleh User: #".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Mengubah Data Editorial Plan Berhasil');

		redirect('StrakomUnggulan/view/'. $this->input->post('namaProgram') );

	}

  public function change_status($id)
	{
		$permission = $this->Strakom_model->update($id, ['status' => 1]);
    $this->activity_model->add("Mengubah Status Strakom Unggulan #$permission oleh User: #".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Mengubah Status Strakom Unggulan Berhasil');

		redirect('StrakomUnggulan/view/'. $id );
	}

  public function saveEditorialPlan($id)
	{

		postAllowed();

		// ifPermissions('permissions_add');
		$uuid = uniqid();
    $periode = $this->Editorial_model->create([
      'id' => $uuid,
      'strakom_id' => $this->input->post('namaProgram'),
      'tanggal_rencana' => $this->input->post('tanggalRencanaTayang'),
      'produk_komunikasi' => $this->input->post('produkKomunikasi'),
      'txtLainProdukKomunikasi' => $this->input->post('txtLainnyaProdukKomunikasi'),
      'kanal_komunikasi' => $this->input->post('kanalKomunikasi'),
      'txtLainKanalKomunikasi' => $this->input->post('txtLainnyaKanalKomunikasi'),
      'pesan_utama' => $this->input->post('pesanUtama'),
      'khalayak' => $this->input->post('khalayak'),
      'user_id' => $this->input->post('idUser'),
      'periode_id' => $this->input->post('idPeriode'),
      'opd_id' => $this->input->post('idOPD'),

    ]);

		$this->activity_model->add("Menambahkan Data Editorial Plan #$periode oleh User: #".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Menambahkan data Editorial Plan Berhasil');

		redirect('StrakomUnggulan/view/'. $id );

	}

  public function change_status_strakom($id)
  {
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
    $status = "";
    $namaStrakom = $this->input->post('nama_strakom');
    $statusstrakom = $this->input->post('status_strakom');
    $this->page_data['user'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $namaOpd = $this->page_data['user']->name;
    $this->Strakom_model->update($id, ['status' => $statusstrakom, 'review_user_id' =>$this->session->userdata('logged')['id'], 'alasan' => $this->input->post('alasan')]);
    if ($statusstrakom == 1) {
      $status = "Final";
    } else if ($statusstrakom == 2) {
      $status = "Disetujui";
    } else if ($statusstrakom == 3) {
      $status = "Ditolak dengan alasan ".$this->input->post('alasan');
    } else {
      $status = "Menunggu Finalisasi";
    }
    $this->activity_model->add("Mengubah Status Strategi Komunikasi Unggulan menjadi $status oleh User: #".logged('name'));
    $uuid = uniqid();
    $periode = $this->Notifikasi_model->create([
      'notifikasi_id' => $uuid,
      'judul_notifikasi' => "Strategi Komunikasi Unggulan dengan Judul $namaStrakom milik SKPD $namaOpd sudah disetujui oleh ".logged('name'),
      'user_id' => $this->session->userdata('logged')['id'],
      'periode_id' =>  $this->input->post('userId'),
      'opd_id' =>  $this->input->post('opdId'),
    ]);

    redirect('StrakomUnggulan/view/'.$id);
  }

  public function change_status_strakom_list($id)
  {
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
    $status = "";
    $namaStrakom = $this->input->post('nama_strakom');
    $statusstrakom = $this->input->post('status_strakom');
    $this->page_data['user'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $namaOpd = $this->page_data['user']->name;
    $this->Strakom_model->update($id, ['status' => $statusstrakom, 'review_user_id' =>$this->session->userdata('logged')['id'], 'alasan' => $this->input->post('alasan')]);
    if ($statusstrakom == 1) {
      $status = "Final";
    } else if ($statusstrakom == 2) {
      $status = "Disetujui";
    } else if ($statusstrakom == 3) {
      $status = "Ditolak dengan alasan ".$this->input->post('alasan');
    } else {
      $status = "Menunggu Finalisasi";
    }
    $this->activity_model->add("Mengubah Status Strategi Komunikasi Unggulan menjadi $status oleh User: #".logged('name'));
    $uuid = uniqid();
    $periode = $this->Notifikasi_model->create([
      'notifikasi_id' => $uuid,
      'judul_notifikasi' => "Strategi Komunikasi Unggulan dengan Judul $namaStrakom milik SKPD $namaOpd sudah disetujui oleh ".logged('name'),
      'user_id' => $this->session->userdata('logged')['id'],
      'periode_id' =>  $this->input->post('userId'),
      'opd_id' =>  $this->input->post('opdId'),
    ]);

    redirect('StrakomUnggulan');
  }

}
