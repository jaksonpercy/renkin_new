<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReviewStrakom extends MY_Controller {

  public function __construct() {

    parent::__construct();
    $this->page_data['page']->title = 'Review Strategi Komunikasi Unggulan';
    $this->page_data['page']->menu = 'rencanakinerja';
    // load base_url
  }

  public function index(){
    	$this->strakom();

  }

  public function strakom()
	{
	$tahun = $this->input->get('tahun_periode');
    $triwulan = $this->input->get('triwulan_periode');
    $filtered_get = array_filter($_POST);
    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
    $this->page_data['user'] = $this->users_model->get();
    if ($this->page_data['roles']->role->role_id == 1) {
        $this->page_data['strakom'] = $this->Strakom_model->getDataByUserId($this->session->userdata('logged')['id'],$tahun,$triwulan);
    } else {
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
		$this->page_data['page']->submenu = 'reviewstrakom';
    $this->load->view('reviewstrakom/list', $this->page_data);
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
    $this->page_data['page']->submenu = 'reviewstrakom';
    $this->load->view('reviewstrakom/view', $this->page_data);

  }

  public function change_status_finalisasi($id)
  {
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
    $namaStrakom = $this->input->post('nama_strakom');
    $this->page_data['user'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $namaOpd = $this->page_data['user']->name;
    $this->Strakom_model->update($id, ['status' => 1 ]);
    $this->activity_model->add("Mengubah Status Strategi Komunikasi Unggulan menjadi Final oleh User: #".logged('name'));
    $uuid = uniqid();
    $periode = $this->Notifikasi_model->create([
      'notifikasi_id' => $uuid,
      'judul_notifikasi' => "Strategi Komunikasi Unggulan dengan Judul $namaStrakom milik SKPD $namaOpd sudah dilakukan Finalisasi",
      'user_id' => $this->session->userdata('logged')['id'],
      'periode_id' => $this->page_data['periode']->id,
      'opd_id' => $this->page_data['user']->opd_upd,
    ]);

    redirect('ReviewStrakom/view/'.$id);
  }

  public function change_status_finalisasi_list($id)
  {
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
    $namaStrakom = $this->input->post('nama_strakom');
    $this->page_data['user'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $namaOpd = $this->page_data['user']->name;
    $this->Strakom_model->update($id, ['status' => 1 ]);
    $this->activity_model->add("Mengubah Status Strategi Komunikasi Unggulan menjadi Final oleh User: #".logged('name'));
    $uuid = uniqid();
    $periode = $this->Notifikasi_model->create([
      'notifikasi_id' => $uuid,
      'judul_notifikasi' => "Strategi Komunikasi Unggulan dengan Judul $namaStrakom milik SKPD $namaOpd sudah dilakukan Finalisasi",
      'user_id' => $this->session->userdata('logged')['id'],
      'periode_id' => $this->page_data['periode']->id,
      'opd_id' => $this->page_data['user']->opd_upd,
    ]);

    redirect('ReviewStrakom');
  }

}
