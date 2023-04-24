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
    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];
    $this->page_data['strakom'] = $this->Strakom_model->get();
    $this->page_data['countstrakom'] = $this->Strakom_model->countAll();

    $this->page_data['jeniskegiatan'] = $this->JenisKegiatan_model->getByStatusActive(1);
    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
		$this->page_data['page']->submenu = 'rencanakinerja';
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
    $this->load->view('strakom/form-add', $this->page_data);

  }

  public function edit($id){
    // load view
    $this->page_data['kategoriprogram'] = $this->KategoriProgram_model->getByStatusActive(1);
    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->page_data['jeniskegiatan'] = $this->JenisKegiatan_model->getByStatusActive(1);
    $this->page_data['rencanamedia'] = $this->KanalPublikasi_model->getByStatusActive(1);
    $this->page_data['strakom'] = $this->Strakom_model->getById($id);

    $this->load->view('strakom/form-edit', $this->page_data);

  }

  public function view($id){
    // load view

    $this->page_data['jeniskegiatan'] = $this->JenisKegiatan_model->getByStatusActive(1);
    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->page_data['rencanamedia'] = $this->KanalPublikasi_model->getByStatusActive(1);
    $this->page_data['strakom'] = $this->Strakom_model->getById($id);

    $this->load->view('strakom/view', $this->page_data);

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

		// ifPermissions('permissions_add');
		$uuid = uniqid();
    $namaProgram ='';
    $jenisKegiatan='';

    if ($this->input->post('kategoriProgram')==1){
        $namaProgram = $this->input->post('namaProgram');
        $jenisKegiatan = $this->input->post('jenisKegiatan');
    }else if ($this->input->post('kategoriProgram')==2) {
      // code...
      $namaProgram = $this->input->post('ksd');
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
      $namaProgram = $this->input->post('ksd');
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

}
