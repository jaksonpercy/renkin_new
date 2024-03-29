<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitigasi extends MY_Controller {

  public function __construct() {

    parent::__construct();
    $this->page_data['page']->title = 'Uraian Materi Mitigasi Krisis';
    $this->page_data['page']->menu = 'rencanakinerja';
    // load base_url
  }

  public function index(){
    // load view
    $this->mitigasi();

  }

  public function mitigasi()
  {
	$tahun = $this->input->get('tahun_periode');
  $userId = $this->input->get('user_id');
    $triwulan = $this->input->get('triwulan_periode');
    $this->page_data['page']->submenu = 'mitigasi';
    $this->page_data['user'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['periodeCount'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ]);
    if(count($this->page_data['periodeCount']) > 0){
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
  }
    $this->page_data['userall'] = $this->users_model->get();
    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];
    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->page_data['strakom'] = $this->Strakom_model->get();
    if ($this->page_data['roles']->role->role_id == 1) {
    $this->page_data['mitigasi'] = $this->Mitigasi_model->getDataJoinThreeTableByUserId($this->session->userdata('logged')['id'],$tahun,$triwulan);
    } else {
    $this->page_data['mitigasi'] = $this->Mitigasi_model->getDataJoinThreeTableAdmin($userId,$tahun,$triwulan);
    }
    $this->load->view('mitigasi/list', $this->page_data);
  }

  public function add(){
    // load view
    $this->page_data['page']->submenu = 'mitigasi';
    $this->page_data['user'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];

    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->page_data['strakom'] = $this->Strakom_model->getListStrakomByUserId($this->session->userdata('logged')['id']);
    
    $this->load->view('mitigasi/form-add', $this->page_data);

  }

  public function edit($id){
    // load view
    $this->page_data['page']->submenu = 'mitigasi';
    $this->page_data['user'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];

    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->page_data['strakom'] = $this->Strakom_model->getListStrakomByUserId($this->session->userdata('logged')['id']);
    $this->page_data['mitigasi'] = $this->Mitigasi_model->getById($id);
    $this->load->view('mitigasi/form-edit', $this->page_data);

  }

  public function view($id){
    // load view
    $this->page_data['page']->submenu = 'mitigasi';
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
    $this->load->view('mitigasi/view', $this->page_data);

  }

  public function delete($id)
  {

    // ifPermissions('users_delete');
    if($id!==1 && $id!=logged($id)){ }else{
      redirect('/','refresh');
      return;
    }

    $id = $this->Mitigasi_model->delete($id);

    $this->activity_model->add("Uraian Materi Mitigasi Krisis #$id Dihapus oleh:".logged('name'));

    $this->session->set_flashdata('alert-type', 'success');
    $this->session->set_flashdata('alert', 'Uraian Materi Mitigasi Krisis Berhasil Di Hapus');

    redirect('Mitigasi');

  }

  public function save()
	{

		postAllowed();

    if (!empty($this->input->post('dataPendukung'))) {
    if ($_FILES['filePendukung']['size'] == 0) {
      // code...

		$uuid = uniqid();
		$periode = $this->Mitigasi_model->create([
			'id' => $uuid,
			'strakom_id' => $this->input->post('namaProgram'),
			'nama_kegiatan' => $this->input->post('namaKegiatan'),
      'uraian_potensi' => $this->input->post('uraianPotensi'),
			'juru_bicara' => $this->input->post('juruBicara'),
      'data_pendukung_text' => $this->input->post('dataPendukung'),
			// 'data_pendukung_file' => $this->input->post('file'),
      'stakeholder_pro' => $this->input->post('stakeholderPro'),
      'stakeholder_kontra' => $this->input->post('stakeholderKontra'),
      'pic_kegiatan' => $this->input->post('picKegiatan'),
      'status' => "0",
      'user_id' => $this->input->post('idUser'),
      'periode_id' => $this->input->post('idPeriode'),
      'opd_id' => $this->input->post('idOPD'),

		]);

		$this->activity_model->add("Menambahkan Data Mitigasi #$periode oleh User: #".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Menambahkan Data Mitigasi Berhasil');

		redirect('Mitigasi');
  } else {
    $target_dir = "./uploads/mitigasifile/";
    $target_file = $target_dir . basename($_FILES["filePendukung"]["name"]);
    $uploadOk = 1;
    $namaFile='';
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
      $idfile = uniqid();
      $namaFile = "Copy-".$idfile.htmlspecialchars( basename( $_FILES["filePendukung"]["name"]));
      $uploadOk = 1;
    }

    // Check file size
    if ($_FILES["filePendukung"]["size"] > 20000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["filePendukung"]["tmp_name"], $target_file)) {
    $namaFile = htmlspecialchars( basename( $_FILES["filePendukung"]["name"]));
    // echo "The file ". htmlspecialchars( basename( $_FILES["filePendukung"]["name"])). " has been uploaded.";
    $uuid = uniqid();
    $periode = $this->Mitigasi_model->create([
      'id' => $uuid,
      'strakom_id' => $this->input->post('namaProgram'),
      'nama_kegiatan' => $this->input->post('namaKegiatan'),
      'uraian_potensi' => $this->input->post('uraianPotensi'),
      'juru_bicara' => $this->input->post('juruBicara'),
      'data_pendukung_text' => $this->input->post('dataPendukung'),
      'data_pendukung_file' => $namaFile,
      'stakeholder_pro' => $this->input->post('stakeholderPro'),
      'stakeholder_kontra' => $this->input->post('stakeholderKontra'),
      'pic_kegiatan' => $this->input->post('picKegiatan'),
      'user_id' => $this->input->post('idUser'),
      'status' => "0",
      'periode_id' => $this->input->post('idPeriode'),
      'opd_id' => $this->input->post('idOPD'),

    ]);

    $this->activity_model->add("Menambahkan Data Mitigasi #$periode oleh User: #".logged('name'));

    $this->session->set_flashdata('alert-type', 'success');
    $this->session->set_flashdata('alert', 'Menambahkan Data Mitigasi Berhasil');

    redirect('Mitigasi');
  } else {
    echo "Sorry, there was an error uploading your file.";
    redirect($_SERVER['HTTP_REFERER']);
  }
  }
}
  } else if ($_FILES['filePendukung']['size'] > 0) {
    $target_dir = "./uploads/mitigasifile/";
    $target_file = $target_dir . basename($_FILES["filePendukung"]["name"]);
    $uploadOk = 1;
    $namaFile='';
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
      $idfile = uniqid();
      $namaFile = "Copy-".$idfile.htmlspecialchars( basename( $_FILES["filePendukung"]["name"]));
      $uploadOk = 1;
    }

    // Check file size
    if ($_FILES["filePendukung"]["size"] > 20000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
      redirect($_SERVER['HTTP_REFERER']);
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["filePendukung"]["tmp_name"], $target_file)) {
    $namaFile = htmlspecialchars( basename( $_FILES["filePendukung"]["name"]));
    // echo "The file ". htmlspecialchars( basename( $_FILES["filePendukung"]["name"])). " has been uploaded.";
    $uuid = uniqid();
    $periode = $this->Mitigasi_model->create([
      'id' => $uuid,
      'strakom_id' => $this->input->post('namaProgram'),
      'nama_kegiatan' => $this->input->post('namaKegiatan'),
      'uraian_potensi' => $this->input->post('uraianPotensi'),
      'juru_bicara' => $this->input->post('juruBicara'),
      'data_pendukung_text' => $this->input->post('dataPendukung'),
      'data_pendukung_file' => $namaFile,
      'stakeholder_pro' => $this->input->post('stakeholderPro'),
      'stakeholder_kontra' => $this->input->post('stakeholderKontra'),
      'pic_kegiatan' => $this->input->post('picKegiatan'),
      'user_id' => $this->input->post('idUser'),
      'status' => "0",
      'periode_id' => $this->input->post('idPeriode'),
      'opd_id' => $this->input->post('idOPD'),

    ]);

    $this->activity_model->add("Menambahkan Data Mitigasi #$periode oleh User: #".logged('name'));

    $this->session->set_flashdata('alert-type', 'success');
    $this->session->set_flashdata('alert', 'Menambahkan Data Mitigasi Berhasil');

    redirect('Mitigasi');
  } else {
    echo "Sorry, there was an error uploading your file.";
    redirect($_SERVER['HTTP_REFERER']);
  }
}

  }
}

public function update($id)
{

  postAllowed();

  if (!empty($this->input->post('dataPendukung'))) {
  if ($_FILES['filePendukung']['size'] == 0) {
    // code...

  $uuid = uniqid();

  $data = [
    'strakom_id' => $this->input->post('namaProgram'),
    'nama_kegiatan' => $this->input->post('namaKegiatan'),
    'uraian_potensi' => $this->input->post('uraianPotensi'),
    'juru_bicara' => $this->input->post('juruBicara'),
    'data_pendukung_text' => $this->input->post('dataPendukung'),
    // 'data_pendukung_file' => $this->input->post('file'),
    'stakeholder_pro' => $this->input->post('stakeholderPro'),
    'stakeholder_kontra' => $this->input->post('stakeholderKontra'),
    'pic_kegiatan' => $this->input->post('picKegiatan'),
    'status' => "0",
    'user_id' => $this->input->post('idUser'),
    'periode_id' => $this->input->post('idPeriode'),
    'opd_id' => $this->input->post('idOPD'),
  ];

  $permission = $this->Mitigasi_model->update($id, $data);

  $this->activity_model->add("Mengubah Data Mitigasi #$permission oleh User: #".logged('name'));

  $this->session->set_flashdata('alert-type', 'success');
  $this->session->set_flashdata('alert', 'Mengubah Data Mitigasi Berhasil');

  redirect('Mitigasi');
} else {
  $target_dir = "./uploads/mitigasifile/";
  $target_file = $target_dir . basename($_FILES["filePendukung"]["name"]);
  $uploadOk = 1;
  $namaFile='';
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if (file_exists($target_file)) {
    $idfile = uniqid();
    $namaFile = "Copy-".$idfile.htmlspecialchars( basename( $_FILES["filePendukung"]["name"]));
    $uploadOk = 1;
  }

  // Check file size
  if ($_FILES["filePendukung"]["size"] > 20000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
if (move_uploaded_file($_FILES["filePendukung"]["tmp_name"], $target_file)) {
  $namaFile = htmlspecialchars( basename( $_FILES["filePendukung"]["name"]));
  // echo "The file ". htmlspecialchars( basename( $_FILES["filePendukung"]["name"])). " has been uploaded.";
  $uuid = uniqid();
  $data = [
    'strakom_id' => $this->input->post('namaProgram'),
    'nama_kegiatan' => $this->input->post('namaKegiatan'),
    'uraian_potensi' => $this->input->post('uraianPotensi'),
    'juru_bicara' => $this->input->post('juruBicara'),
    'data_pendukung_text' => $this->input->post('dataPendukung'),
    'data_pendukung_file' => $namaFile,
    'stakeholder_pro' => $this->input->post('stakeholderPro'),
    'stakeholder_kontra' => $this->input->post('stakeholderKontra'),
    'pic_kegiatan' => $this->input->post('picKegiatan'),
      'status' => "0",
    'user_id' => $this->input->post('idUser'),
    'periode_id' => $this->input->post('idPeriode'),
    'opd_id' => $this->input->post('idOPD'),
  ];

  $permission = $this->Mitigasi_model->update($id, $data);

  $this->activity_model->add("Mengubah Data Mitigasi #$permission oleh User: #".logged('name'));

  $this->session->set_flashdata('alert-type', 'success');
  $this->session->set_flashdata('alert', 'Mengubah Data Mitigasi Berhasil');


  redirect('Mitigasi');
} else {
  echo "Sorry, there was an error uploading your file.";
  redirect($_SERVER['HTTP_REFERER']);
}
}
}
} else if ($_FILES['filePendukung']['size'] > 0) {
  $target_dir = "./uploads/mitigasifile/";
  $target_file = $target_dir . basename($_FILES["filePendukung"]["name"]);
  $uploadOk = 1;
  $namaFile='';
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if (file_exists($target_file)) {
    $idfile = uniqid();
    $namaFile = "Copy-".$idfile.htmlspecialchars( basename( $_FILES["filePendukung"]["name"]));
    $uploadOk = 1;
  }

  // Check file size
  if ($_FILES["filePendukung"]["size"] > 20000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
echo "Sorry, your file was not uploaded.";
    redirect($_SERVER['HTTP_REFERER']);
// if everything is ok, try to upload file
} else {
if (move_uploaded_file($_FILES["filePendukung"]["tmp_name"], $target_file)) {
  $namaFile = htmlspecialchars( basename( $_FILES["filePendukung"]["name"]));
  // echo "The file ". htmlspecialchars( basename( $_FILES["filePendukung"]["name"])). " has been uploaded.";
  $uuid = uniqid();
  $data = [
    'strakom_id' => $this->input->post('namaProgram'),
    'nama_kegiatan' => $this->input->post('namaKegiatan'),
    'uraian_potensi' => $this->input->post('uraianPotensi'),
    'juru_bicara' => $this->input->post('juruBicara'),
    'data_pendukung_text' => $this->input->post('dataPendukung'),
    'data_pendukung_file' => $namaFile,
    'stakeholder_pro' => $this->input->post('stakeholderPro'),
    'stakeholder_kontra' => $this->input->post('stakeholderKontra'),
    'pic_kegiatan' => $this->input->post('picKegiatan'),
    'user_id' => $this->input->post('idUser'),
      'status' => "0",
    'periode_id' => $this->input->post('idPeriode'),
    'opd_id' => $this->input->post('idOPD'),
  ];

  $permission = $this->Mitigasi_model->update($id, $data);

  $this->activity_model->add("Mengubah Data Mitigasi #$permission oleh User: #".logged('name'));

  $this->session->set_flashdata('alert-type', 'success');
  $this->session->set_flashdata('alert', 'Mengubah Data Mitigasi Berhasil');

  redirect('Mitigasi');
} else {
  echo "Sorry, there was an error uploading your file.";
  redirect($_SERVER['HTTP_REFERER']);
}
}

} else {
  $uuid = uniqid();
  $data = [
    'strakom_id' => $this->input->post('namaProgram'),
    'nama_kegiatan' => $this->input->post('namaKegiatan'),
    'uraian_potensi' => $this->input->post('uraianPotensi'),
    'juru_bicara' => $this->input->post('juruBicara'),
    'stakeholder_pro' => $this->input->post('stakeholderPro'),
    'stakeholder_kontra' => $this->input->post('stakeholderKontra'),
    'pic_kegiatan' => $this->input->post('picKegiatan'),
    'user_id' => $this->input->post('idUser'),
      'status' => "0",
    'periode_id' => $this->input->post('idPeriode'),
    'opd_id' => $this->input->post('idOPD'),
  ];

  $permission = $this->Mitigasi_model->update($id, $data);

  $this->activity_model->add("Mengubah Data Mitigasi #$permission oleh User: #".logged('name'));

  $this->session->set_flashdata('alert-type', 'success');
  $this->session->set_flashdata('alert', 'Mengubah Data Mitigasi Berhasil');
    redirect('Mitigasi');
}
}

public function downloadFile($name)
{
 redirect(str_replace("/index.php","", base_url('/uploads/mitigasifile/'.$name))); //showing the path to the server where the file is to be download
}

	// }

}
