<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReviewMitigasi extends MY_Controller {

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
    $this->page_data['page']->submenu = 'mitigasi';

    $tahun = $this->input->get('tahun_periode');
    // $skpd = $this->input->post('user_id');
    $triwulan = $this->input->get('triwulan_periode');

    $userId = $this->input->get('user_id');
    $this->page_data['user'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['periodeCount'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ]);
    if(count($this->page_data['periodeCount']) > 0){
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
  }
  $this->page_data['userall'] = $this->users_model->getListUserByAsisten("(".$this->page_data['user']->skpd_renkin.")");
    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];
    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->page_data['strakom'] = $this->Strakom_model->get();
    if ($this->page_data['roles']->role->role_id == 1) {
    $this->page_data['mitigasi'] = $this->Mitigasi_model->getDataJoinThreeTableByUserId($this->session->userdata('logged')['id']);
    } else {
    $this->page_data['mitigasi'] = $this->Mitigasi_model->getDataJoinThreeTableByOpd("(".$this->page_data['user']->skpd_renkin.")", $tahun, $triwulan,$userId);
    }
    $this->load->view('reviewmitigasiadministrator/list', $this->page_data);
  }

  public function change_status_mitigasi($id)
  {
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
    $status = "";
    $statusstrakom = $this->input->post('status_strakom');
    $this->page_data['user'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $namaOpd = $this->page_data['user']->name;
    $mitigasi = $this->Mitigasi_model->getById($id);

    $this->Mitigasi_model->update($id, ['status' => $statusstrakom, 'review_user_id' =>$this->session->userdata('logged')['id'], 'alasan' => $this->input->post('alasan')]);
    if ($statusstrakom == 1) {
      $status = "Final";
    } else if ($statusstrakom == 2) {
      $status = "Disetujui";
    } else if ($statusstrakom == 3) {
      $status = "Ditolak dengan alasan ".$this->input->post('alasan');
    } else {
      $status = "Menunggu Finalisasi";
    }
    $this->activity_model->add("Mengubah Status Uraian Mitigasi Krisis menjadi $status oleh User: #".logged('name'));
    $uuid = uniqid();
    $periode = $this->Notifikasi_model->create([
      'notifikasi_id' => $uuid,
      'judul_notifikasi' => "Uraian Mitigasi Krisis dengan Id $id milik SKPD $namaOpd $status oleh ".logged('name'),
      'user_id' => $mitigasi->user_id,
      'periode_id' =>  $mitigasi->periode_id,
      'opd_id' =>  $mitigasi->opd_id,
    ]);

    redirect('ReviewMitigasi');
  }

  public function change_status_mitigasi_detail($id)
  {
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
    $status = "";
    $statusstrakom = $this->input->post('status_strakom');
    $this->page_data['user'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $namaOpd = $this->page_data['user']->name;
    $mitigasi = $this->Mitigasi_model->getById($id);

    $this->Mitigasi_model->update($id, ['status' => $statusstrakom, 'review_user_id' =>$this->session->userdata('logged')['id'], 'alasan' => $this->input->post('alasan')]);
    if ($statusstrakom == 1) {
      $status = "Final";
    } else if ($statusstrakom == 2) {
      $status = "Disetujui";
    } else if ($statusstrakom == 3) {
      $status = "Ditolak dengan alasan ".$this->input->post('alasan');
    } else {
      $status = "Menunggu Finalisasi";
    }
    $this->activity_model->add("Mengubah Status Uraian Mitigasi Krisis menjadi $status oleh User: #".logged('name'));
    $uuid = uniqid();
    $periode = $this->Notifikasi_model->create([
      'notifikasi_id' => $uuid,
      'judul_notifikasi' => "Uraian Mitigasi Krisis dengan Id $id milik SKPD $namaOpd $status oleh ".logged('name'),
      'user_id' => $mitigasi->user_id,
      'periode_id' =>  $mitigasi->periode_id,
      'opd_id' =>  $mitigasi->opd_id,
    ]);

    redirect('ReviewMitigasi/view/'.$id);
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
    $this->page_data['strakom'] = $this->Strakom_model->get();
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
    $this->page_data['strakom'] = $this->Strakom_model->get();
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
    $this->load->view('reviewmitigasiadministrator/view', $this->page_data);

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
      echo "Sorry, file already exists.";
      $uploadOk = 0;
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
    echo "Sorry, file already exists.";
    $uploadOk = 0;
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

	// }

}
