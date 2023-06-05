<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditorialPlan extends MY_Controller {

  public function __construct() {

    parent::__construct();
    $this->page_data['page']->title = 'Editorial Plan';
    $this->page_data['page']->menu = 'rencanakinerja';
    // load base_url
  }

  public function index(){
    // load view
    $this->editorialplan();

  }

  public function editorialplan()
	{
		$this->page_data['page']->submenu = 'editorialplan';
    // load view
	$tahun = $this->input->get('tahun_periode');
    $triwulan = $this->input->get('triwulan_periode');
    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];
    $this->page_data['strakom'] = $this->Strakom_model->get();
    if ($this->page_data['roles']->role->role_id == 1) {
    $this->page_data['editorialplan'] = $this->Editorial_model->getDataJoinStrakomId($this->session->userdata('logged')['id'],$tahun,$triwulan);
  } else {
    $this->page_data['editorialplan'] = $this->Editorial_model->getDataJoinStrakomIdAll();
  }
    $this->page_data['rencanamedia'] = $this->KanalPublikasi_model->getByStatusActive(1);
    $this->page_data['produkkomunikasi'] = $this->ProdukKomunikasi_model->getByStatusActive(1);
    $this->page_data['userall'] = $this->users_model->get();
    $this->page_data['user'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
      $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->load->view('editorialplan/list', $this->page_data);
	}

  public function add(){

    $this->load->view('editorialplan/form-add', $this->page_data);

  }

  public function edit(){
    // load view
    $this->load->view('editorialplan/form-edit', $this->page_data);

  }

  public function view($id){
    // load view
    $this->page_data['page']->submenu = 'editorialplan';
    // load view
    $this->page_data['strakom'] = $this->Strakom_model->get();
    $this->page_data['editorialplan'] = $this->Editorial_model->getById($id);
    $this->page_data['rencanamedia'] = $this->KanalPublikasi_model->getByStatusActive(1);
    $this->page_data['produkkomunikasi'] = $this->ProdukKomunikasi_model->getByStatusActive(1);
    $this->page_data['user'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];

    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];
      $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->load->view('editorialplan/view', $this->page_data);

  }

  public function delete($id)
  {

    // ifPermissions('users_delete');

    if($id!==1 && $id!=logged($id)){ }else{
      redirect('/','refresh');
      return;
    }

    $id = $this->Editorial_model->delete($id);

    $this->activity_model->add("Editorial Plan #$id Dihapus oleh:".logged('name'));

    $this->session->set_flashdata('alert-type', 'success');
    $this->session->set_flashdata('alert', 'Editorial Plan Berhasil Di Hapus');

    redirect('EditorialPlan');

  }

  public function save()
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

		redirect('EditorialPlan');

	}

  public function updateData($id)
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

		redirect('EditorialPlan');

	}

  public function updateDataView($id)
	{

		postAllowed();

		// ifPermissions('permissions_edit');
    $uuid = uniqid();


		$data = [
			'strakom_id' => $this->input->post('namaProgram'),
			'tanggal_rencana' => $this->input->post('tanggalRencanaTayang'),
      'produk_komunikasi' => $this->input->post('produkKomunikasi'),
			'kanal_komunikasi' => $this->input->post('kanalKomunikasi'),
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

		redirect('EditorialPlan/view/'.$id);

	}

}
