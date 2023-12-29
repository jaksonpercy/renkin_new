<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryStrakomNow extends MY_Controller {

  public function __construct() {

    parent::__construct();
    $this->page_data['page']->title = 'History Strategi Komunikasi Unggulan Sistem Saat Ini';
    $this->page_data['page']->menu = 'historystrakom';
    // load base_url
  }

  public function index(){
    	$this->strakom();

  }

  public function strakom()
	{

    $this->page_data['page']->submenu = 'historystrakomnow';
    $userId = $this->input->get('user_id');
    $tahun = $this->input->get('tahun_periode');
    $triwulan = $this->input->get('triwulan_periode');
    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];
    $this->page_data['user'] = $this->users_model->get();
    if ($this->page_data['roles']->role->role_id == 1) {
        $this->page_data['strakom'] = $this->HistoryStrakom_model->getListStrakomNowByCreatedBy($this->session->userdata('logged')['id'], $tahun, $triwulan);
    } else {
      $this->page_data['strakom'] = $this->HistoryStrakom_model->getListStrakomFilterByCreatedBy($userId,$tahun, $triwulan);
    }
    $this->page_data['rencanamedia'] = $this->KanalPublikasi_model->getByStatusActive(1);

    $this->load->view('historystrakomnow/list', $this->page_data);
	}


  public function view($id){
    // load view
    $this->page_data['page']->submenu = 'historystrakomnow';
    // $this->page_data['periode'] = $this->Periode_model->getByWhere([
    //   'status_periode'=> 1
    // ])[0];
    $this->page_data['jeniskegiatan'] = $this->JenisKegiatan_model->getByStatusActive(1);
    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->page_data['rencanamedia'] = $this->KanalPublikasi_model->getByStatusActive(1);
    $this->page_data['strakom'] = $this->Strakom_model->getById($id);

    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];

    $this->page_data['user'] = $this->users_model->get();
    $this->page_data['strakom'] = $this->Strakom_model->getById($id);
    
    $this->page_data['editorialplan'] = $this->Editorial_model->getDataByStrakomId($id);

    $this->page_data['mitigasi'] = $this->Mitigasi_model->getDataJoinThreeTableByStrakom($this->session->userdata('logged')['id'],$id);


    $this->page_data['produkkomunikasi'] = $this->ProdukKomunikasi_model->getByStatusActive(1);
    $this->page_data['datarealisasi'] = $this->Data_Realisasi_model->getListDataRealisasiByStrakomId($id);

    $this->load->view('historystrakomnow/view', $this->page_data);

  }

  public function viewMitigasi($id){
    // load view
    $this->page_data['page']->submenu = 'historystrakomnow';
    $this->page_data['user'] = $this->users_model->get();
    $this->page_data['periodeCount'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ]);
    if(count($this->page_data['periodeCount']) > 0){
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
  }
    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];

    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->page_data['strakom'] = $this->Strakom_model->get();
    $this->page_data['mitigasi'] = $this->Mitigasi_model->getDataMitigasiJoinStrakomById($id)[0];
    $this->load->view('historystrakomnow/viewMitigasi', $this->page_data);

  }

  public function viewEditorial($id){
    // load view
    $this->page_data['page']->submenu = 'historystrakomnow';
    // load view
    $this->page_data['strakom'] = $this->Strakom_model->get();
    $this->page_data['editorialplan'] = $this->Editorial_model->getDataJoinStrakomById($id)[0];
    $this->page_data['rencanamedia'] = $this->KanalPublikasi_model->getByStatusActive(1);
    $this->page_data['produkkomunikasi'] = $this->ProdukKomunikasi_model->getByStatusActive(1);
    $this->page_data['user'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['periodeCount'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ]);
    if(count($this->page_data['periodeCount']) > 0){
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
  }

    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];
      $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->load->view('historystrakomnow/viewEditorial', $this->page_data);

  }

}
