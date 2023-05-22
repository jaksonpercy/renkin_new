<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemberitahuan extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title = 'Kelola Pemberitahuan';
		$this->page_data['page']->menu = 'pemberitahuan';
	}

	public function index()
	{

		// ifPermissions('permissions_list');

		$this->page_data['pemberitahuan'] = $this->Pemberitahuan_model->get();
		$this->load->view('pemberitahuan/list', $this->page_data);
	}

	public function add()
	{

		// ifPermissions('permissions_add');

		$this->load->view('pemberitahuan/add', $this->page_data);
	}

	public function edit($id)
	{

		// ifPermissions('permissions_edit');

		$this->page_data['pemberitahuan'] = $this->Pemberitahuan_model->getById($id);
		$this->load->view('pemberitahuan/edit', $this->page_data);

	}

	public function save()
	{

		postAllowed();

		$target_dir = "./uploads/bannerpemberitahuan/";
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
    $periode = $this->Pemberitahuan_model->create([
      'nama_pemberitahuan' => $this->input->post('judulpemberitahuan'),
      'lokasi_file' => $namaFile,
      'url' => $this->input->post('url'),
      'status' => $this->input->post('status'),
    ]);

    $this->activity_model->add("Menambahkan Data Pemberitahuan #$periode oleh User: #".logged('name'));

    $this->session->set_flashdata('alert-type', 'success');
    $this->session->set_flashdata('alert', 'Menambahkan Data Pemberitahuan Berhasil');

    redirect('Pemberitahuan');
  } else {
    echo "Sorry, there was an error uploading your file.";
    redirect($_SERVER['HTTP_REFERER']);
  }
}

		// redirect('Pemberitahuan');

	}

	public function update($id)
	{

		postAllowed();

		if ($_FILES['filePendukung']['size'] == 0) {
	    // code...

	  $uuid = uniqid();

	  $data = [
			'nama_pemberitahuan' => $this->input->post('judulpemberitahuan'),
			'url' => $this->input->post('url'),
			'status' => $this->input->post('status'),
	  ];

	  $permission = $this->Pemberitahuan_model->update($id, $data);

	  $this->activity_model->add("Mengubah Data Pemberitahuan #$permission oleh User: #".logged('name'));

	  $this->session->set_flashdata('alert-type', 'success');
	  $this->session->set_flashdata('alert', 'Mengubah Data Pemberitahuan Berhasil');

	  redirect('Pemberitahuan');
	} else {
	  $target_dir = "./uploads/bannerpemberitahuan/";
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
			'nama_pemberitahuan' => $this->input->post('judulpemberitahuan'),
      'lokasi_file' => $namaFile,
      'url' => $this->input->post('url'),
      'status' => $this->input->post('status'),
	  ];

	  $permission = $this->Pemberitahuan_model->update($id, $data);

	  $this->activity_model->add("Mengubah Data Pemberitahuan #$permission oleh User: #".logged('name'));

	  $this->session->set_flashdata('alert-type', 'success');
	  $this->session->set_flashdata('alert', 'Mengubah Data Pemberitahuan Berhasil');


	  redirect('Mitigasi');
	} else {
	  echo "Sorry, there was an error uploading your file.";
	  redirect($_SERVER['HTTP_REFERER']);
	}
	}
	}
	}

	public function delete($id)
	{

		// ifPermissions('permissions_delete');

		$this->Pemberitahuan_model->delete($id);

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Menghapus Pemberitahuan Berhasil');

		$this->activity_model->add("Menghapus Pemberitahuan #$permission Oleh User: #".logged('name'));

		redirect('Pemberitahuan');

	}

	public function checkIfUnique()
	{

		$code = get('code');

		if(!$code)
			die('Invalid Request');

		$arg = [ 'code' => $code ];

		if(!empty(get('notId')))
			$arg['id !='] = get('notId');

		$query = $this->permissions_model->getByWhere($arg);

		if(!empty($query))
			die('false');
		else
			die('true');


	}

	public function change_status($id)
	{
		$this->Pemberitahuan_model->update($id, ['status' => get('status') == 'true' ? 1 : 0 ]);
		echo 'done';
	}

}

/* End of file Permissions.php */
/* Location: ./application/controllers/Permissions.php */
