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
    $tahun = $this->input->get('tahun_periode');
    $triwulan = $this->input->get('triwulan_periode');
    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];
    $this->page_data['countrealisasi'] = count($this->Data_Realisasi_model->get());
    if ($this->page_data['roles']->role->role_id == 1) {
      $this->page_data['listrealisasi'] = $this->Realisasi_model->getListStrakomByRealisasiAndUserId($tahun,$triwulan,$this->session->userdata('logged')['id']);
    } else if ($this->page_data['roles']->role->role_id == 4) {
      if(empty($this->page_data['userbyid']->skpd_renkin)){
        $this->page_data['listrealisasi'] = [];
      } else {
        $this->page_data['listrealisasi'] = $this->Realisasi_model->getListStrakomByRealisasiAndOpdId($tahun,$triwulan,"(".$this->page_data['userbyid']->skpd_renkin.")");
      }
    } else {
        $this->page_data['listrealisasi'] = $this->Realisasi_model->getListStrakomByRealisasi($tahun,$triwulan);
    }
    $this->page_data['userall'] = $this->users_model->get();
    $this->page_data['user'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];

    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->page_data['strakom'] = $this->Strakom_model->get();
    $this->load->view('realisasi/list', $this->page_data);
	}

  public function downloadFile($name)
  {

clearstatcache();
    //Define header information
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.basename(str_replace("/index.php","", base_url('/uploads/datanotadinas/'.$name))).'"');
header('Content-Length: ' . filesize(str_replace("/index.php","", base_url('/uploads/datanotadinas/'.$name))));
header('Pragma: public');
   flush();
   readfile(str_replace("/index.php","", base_url('/uploads/datanotadinas/'.$name))); //showing the path to the server where the file is to be download
   die();
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
    $this->page_data['strakom'] = $this->Realisasi_model->getListStrakomByStatusAndUserId($this->session->userdata('logged')['id'],2);

    $this->page_data['datarealisasi'] = [];
    $this->load->view('realisasi/form-add', $this->page_data);

  }

  public function printExport(){
    // load view
    $this->load->view('realisasi/export', $this->page_data);

  }

  public function tambah($id){
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
    $this->page_data['strakom'] = $this->Strakom_model->getById($id);

    $this->page_data['datarealisasi'] = $this->Data_Realisasi_model->getListDataRealisasiByStrakomId($id);

    $this->load->view('realisasi/form-tambah', $this->page_data);

  }

  public function edit($id){
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
    $this->page_data['strakom'] = $this->Strakom_model->getById($id);

    $this->page_data['datarealisasi'] = $this->Data_Realisasi_model->getListDataRealisasiByStrakomId($id);

    $this->load->view('realisasi/form-edit', $this->page_data);

  }

  public function view($id){
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
    $this->page_data['strakom'] = $this->Strakom_model->getById($id);

    $this->page_data['datarealisasi'] = $this->Data_Realisasi_model->getListDataRealisasiByStrakomId($id);

    $this->load->view('realisasi/view', $this->page_data);

  }

  public function export($id){
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
    $this->page_data['strakom'] = $this->Strakom_model->getById($id);

    $this->page_data['datarealisasi'] = $this->Data_Realisasi_model->getListDataRealisasiByStrakomId($id);

    ///////////////////////////////////////////////////////////////
    require_once(APPPATH.'libraries/xlsxwriter.class.php');
	  $fname='uploads/realisasi_strakom.xlsx';

    $realisasi = array(
      array('REALISASI STRAKOM'),
      array('Strakom',$this->page_data['strakom']->nama_program),
      array('Nomor Nota Dinas',$this->page_data['strakom']->no_nota_dinas),
      array('Tanggal Nota Dinas',$this->page_data['strakom']->tanggal_nota),
      array('Perihal Nota Dinas',$this->page_data['strakom']->perihal_nota),
      array(''),
      array('NO.','TANGGAL','JUDUL','MEDIA DAN TAUTAN','DOKUMENTASI'),
    );

    $no=0;
    foreach ($this->page_data['datarealisasi'] as $row){
      $no++;

      $kanalkomunikasi='';
      foreach ($this->page_data['rencanamedia'] as $rows){
        if ($rows->id == $row->kanal_publikasi ) {
          $kanalkomunikasi = $rows->nama;
        }
      }

      array_push($realisasi,
      array(
        $no,
        $row->tanggal_realisasi,
        $row->judul_publikasi,
        $kanalkomunikasi,
        empty($row->file_dokumentasi)?'':str_replace("/index.php","", base_url('/uploads/datarealisasi/'.$row->file_dokumentasi))
      )
    );
    }

    $writer = new XLSXWriter();
    $styles7 = array( 'border'=>'left,right,top,bottom');

    foreach($realisasi as $row)
	    $writer->writeSheetRow('Rekap Realisasi', $row, $styles7);

      $writer->writeToFile($fname);   // creates XLSX file (in current folder)
      redirect($fname.'?date='.date('Ymdis'));

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

  public function delete($id)
  {

    // ifPermissions('users_delete');
    $data = [
    'no_nota_dinas' => '',
    'perihal_nota' => '',
    'tanggal_nota' => '',
    'url_nota_dinas' => '',
    ];

    $permission = $this->Strakom_model->update($id, $data);
    $deleteData = $this->Data_Realisasi_model->deleteDataByStrakomId($id);

    $this->activity_model->add("Data Nota Dinas #$id Dihapus oleh:".logged('name'));

    $this->session->set_flashdata('alert-type', 'success');
    $this->session->set_flashdata('alert', 'Data Nota Dinas Berhasil Di Hapus');
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
      $idfile = uniqid();
      $namaFile = "Copy-".$idfile.htmlspecialchars( basename( $_FILES["fileDokumentasi"]["name"]));
      $uploadOk = 1;
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
      $idfile = uniqid();
      $namaFile = "Copy-".$idfile.htmlspecialchars( basename( $_FILES["fileDokumentasi"]["name"]));
      $uploadOk = 1;
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


  public function updateNota($id)
  {

    postAllowed();

    if ($_FILES['fileNotaDinas']['size'] == 0) {
      // code...

    $uuid = uniqid();

    $data = [
    'no_nota_dinas' => $this->input->post('noLampiran'),
    'perihal_nota' => $this->input->post('namaLampiran'),
    'tanggal_nota' => $this->input->post('tanggalLampiran'),
    ];

    $permission = $this->Strakom_model->update($id, $data);

    $this->activity_model->add("Menambahkan Data Nota Dinas #$permission oleh User: #".logged('name'));

    $this->session->set_flashdata('alert-type', 'success');
    $this->session->set_flashdata('alert', 'Menambahkan Data Nota Dinas Berhasil');

    redirect($_SERVER['HTTP_REFERER']);
  } else {
    $target_dir = "./uploads/datanotadinas/";
    $target_file = $target_dir . basename($_FILES["fileNotaDinas"]["name"]);
    $uploadOk = 1;
    $namaFile='';
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
      $idfile = uniqid();
      $namaFile = "Copy-".$idfile.htmlspecialchars( basename( $_FILES["fileNotaDinas"]["name"]));
      $uploadOk = 1;
    }

    // Check file size
    if ($_FILES["fileNotaDinas"]["size"] > 20000000) {
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
  if (move_uploaded_file($_FILES["fileNotaDinas"]["tmp_name"], $target_file)) {
    $namaFile = htmlspecialchars( basename( $_FILES["fileNotaDinas"]["name"]));
    // echo "The file ". htmlspecialchars( basename( $_FILES["filePendukung"]["name"])). " has been uploaded.";
    $uuid = uniqid();
    $data = [
      'no_nota_dinas' => $this->input->post('noLampiran'),
      'perihal_nota' => $this->input->post('namaLampiran'),
      'tanggal_nota' => $this->input->post('tanggalLampiran'),
      'url_nota_dinas' => $namaFile,
    ];

    $permission = $this->Strakom_model->update($id, $data);

    $this->activity_model->add("Menambahkan Data Nota Dinas #$permission oleh User: #".logged('name'));

    $this->session->set_flashdata('alert-type', 'success');
    $this->session->set_flashdata('alert', 'Menambahkan Data Nota Dinas Berhasil');


    redirect($_SERVER['HTTP_REFERER']);
  } else {
    echo "Sorry, there was an error uploading your file.";
    redirect($_SERVER['HTTP_REFERER']);
  }
  }
  }
  }

}
