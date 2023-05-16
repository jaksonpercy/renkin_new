<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Realisasi extends MY_Controller {

  public function __construct() {

    parent::__construct();
    $this->page_data['page']->title = 'Realisasi';
    $this->page_data['page']->menu = 'rencanakinerja';
    // load base_url
  }

  public function index(){
    	$this->realisasi();

  }

  public function realisasi()
	{
		$this->page_data['page']->submenu = 'realisasi';
    $this->page_data['realisasi'] = $this->users_model->get();
    $this->page_data['user'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];
    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->page_data['strakom'] = $this->Strakom_model->get();
    $this->load->view('realisasi/list', $this->page_data);
	}

  public function add(){
    // load view
  	$this->page_data['page']->submenu = 'realisasi';
    $this->page_data['rencanamedia'] = $this->KanalPublikasi_model->getByStatusActive(1);
    $this->page_data['user'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];
    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->page_data['strakom'] = $this->Strakom_model->get();

    $this->page_data['datarealisasi'] = $this->Data_Realisasi_model->getDataByUserId($this->session->userdata('logged')['id']);
    $this->load->view('realisasi/form-add', $this->page_data);

  }

  public function printExport(){
    // load view
    $this->load->view('realisasi/export', $this->page_data);

  }

  public function edit(){
    // load view
    $this->load->view('realisasi/form-edit', $this->page_data);

  }

  public function view(){
    // load view
    $this->load->view('realisasi/view', $this->page_data);

  }

  public function realisasiview(){
    // load view
    $this->load->view('realisasi/realisasi-view', $this->page_data);

  }

  public function deleteData($id)
  {

    // ifPermissions('users_delete');

    if($id!==1 && $id!=logged($id)){ }else{
      redirect('/','refresh');
      return;
    }

    $id = $this->Data_Realisasi_model->delete($id);

    $this->activity_model->add("Data Realisasi #$id Dihapus oleh:".logged('name'));

    $this->session->set_flashdata('alert-type', 'success');
    $this->session->set_flashdata('alert', 'Data Realisasi Berhasil Di Hapus');
    redirect($_SERVER['HTTP_REFERER']);
  }


  public function addData()
	{

    postAllowed();

    if ($_FILES['fileDokumentasi']['size'] == 0) {
      // code...

    $uuid = uniqid();
    $periode = $this->Data_Realisasi_model->create([
      'id' => $uuid,
      'strakom_id' => $this->input->post('namaProgramData'),
      'tanggal_realisasi' => $this->input->post('tglRealisasi'),
      'judul_publikasi' => $this->input->post('judulPublikasi'),
      'kanal_publikasi' => $this->input->post('kanalpublikasi'),
      'link_tautan' => $this->input->post('linktautan'),
      // 'data_pendukung_file' => $this->input->post('file'),
      'user_id' => $this->input->post('idUser'),
      'periode_id' => $this->input->post('idPeriode'),
      'opd_id' => $this->input->post('idOPD'),

    ]);

    $this->activity_model->add("Menambahkan Data Realisasi #$periode oleh User: #".logged('name'));

    $this->session->set_flashdata('alert-type', 'success');
    $this->session->set_flashdata('alert', 'Menambahkan Data Realisasi Berhasil');
      redirect($_SERVER['HTTP_REFERER']);

  } else {
    $target_dir = "./uploads/datarealisasi/";
    $target_file = $target_dir . basename($_FILES["fileDokumentasi"]["name"]);
    $uploadOk = 1;
    $namaFile='';
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Check file size
    if ($_FILES["fileDokumentasi"]["size"] > 20000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
    redirect($_SERVER['HTTP_REFERER']);
  // if everything is ok, try to upload file
  } else {
  if (move_uploaded_file($_FILES["fileDokumentasi"]["tmp_name"], $target_file)) {
    $namaFile = htmlspecialchars( basename( $_FILES["fileDokumentasi"]["name"]));
    // echo "The file ". htmlspecialchars( basename( $_FILES["filePendukung"]["name"])). " has been uploaded.";
    $uuid = uniqid();
    $periode = $this->Data_Realisasi_model->create([
      'id' => $uuid,
      'strakom_id' => $this->input->post('namaProgramData'),
      'tanggal_realisasi' => $this->input->post('tglRealisasi'),
      'judul_publikasi' => $this->input->post('judulPublikasi'),
      'kanal_publikasi' => $this->input->post('kanalpublikasi'),
      'link_tautan' => $this->input->post('linktautan'),
      'file_dokumentasi' => $namaFile,
      'user_id' => $this->input->post('idUser'),
      'periode_id' => $this->input->post('idPeriode'),
      'opd_id' => $this->input->post('idOPD'),

    ]);

    $this->activity_model->add("Menambahkan Data Realisasi #$periode oleh User: #".logged('name'));

    $this->session->set_flashdata('alert-type', 'success');
    $this->session->set_flashdata('alert', 'Menambahkan Data Realisasi Berhasil');
      redirect($_SERVER['HTTP_REFERER']);
  } else {
    echo "Sorry, there was an error uploading your file.";
    redirect($_SERVER['HTTP_REFERER']);
  }
  }
  }
	}

  public function updateData($id)
  {

    postAllowed();

    if ($_FILES['fileDokumentasi']['size'] == 0) {
      // code...

    $uuid = uniqid();

    $data = [
    'strakom_id' => $this->input->post('namaProgramData'),
    'tanggal_realisasi' => $this->input->post('tglRealisasi'),
    'judul_publikasi' => $this->input->post('judulPublikasi'),
    'kanal_publikasi' => $this->input->post('kanalpublikasi'),
    'link_tautan' => $this->input->post('linktautan'),
    'file_dokumentasi' => $namaFile,
    'user_id' => $this->input->post('idUser'),
    'periode_id' => $this->input->post('idPeriode'),
    'opd_id' => $this->input->post('idOPD'),
    ];

    $permission = $this->Data_Realisasi_model->update($id, $data);

    $this->activity_model->add("Mengubah Data Realisasi #$permission oleh User: #".logged('name'));

    $this->session->set_flashdata('alert-type', 'success');
    $this->session->set_flashdata('alert', 'Mengubah Data Realisasi Berhasil');

    redirect($_SERVER['HTTP_REFERER']);
  } else {
    $target_dir = "./uploads/datarealisasi/";
    $target_file = $target_dir . basename($_FILES["fileDokumentasi"]["name"]);
    $uploadOk = 1;
    $namaFile='';
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;

      redirect($_SERVER['HTTP_REFERER']);
    }

    // Check file size
    if ($_FILES["fileDokumentasi"]["size"] > 20000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;

      redirect($_SERVER['HTTP_REFERER']);
    }

    // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

  redirect($_SERVER['HTTP_REFERER']);
  // if everything is ok, try to upload file
  } else {
  if (move_uploaded_file($_FILES["fileDokumentasi"]["tmp_name"], $target_file)) {
    $namaFile = htmlspecialchars( basename( $_FILES["fileDokumentasi"]["name"]));
    // echo "The file ". htmlspecialchars( basename( $_FILES["filePendukung"]["name"])). " has been uploaded.";
    $uuid = uniqid();
    $data = [
      'strakom_id' => $this->input->post('namaProgramData'),
      'tanggal_realisasi' => $this->input->post('tglRealisasi'),
      'judul_publikasi' => $this->input->post('judulPublikasi'),
      'kanal_publikasi' => $this->input->post('kanalpublikasi'),
      'link_tautan' => $this->input->post('linktautan'),
      'file_dokumentasi' => $namaFile,
      'user_id' => $this->input->post('idUser'),
      'periode_id' => $this->input->post('idPeriode'),
      'opd_id' => $this->input->post('idOPD'),
    ];

    $permission = $this->Data_Realisasi_model->update($id, $data);

    $this->activity_model->add("Mengubah Data Realisasi #$permission oleh User: #".logged('name'));

    $this->session->set_flashdata('alert-type', 'success');
    $this->session->set_flashdata('alert', 'Mengubah Data Realisasi Berhasil');


    redirect($_SERVER['HTTP_REFERER']);
  } else {
    echo "Sorry, there was an error uploading your file.";
    redirect($_SERVER['HTTP_REFERER']);
  }
  }
  }
  }

}
