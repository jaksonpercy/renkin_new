<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisKegiatan extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title = 'Kelola Jenis Kegiatan';
		$this->page_data['page']->menu = 'jeniskegiatan';
	}

	public function index()
	{

		// ifPermissions('permissions_list');

		$this->page_data['jeniskegiatan'] = $this->JenisKegiatan_model->get();
		$this->load->view('jeniskegiatan/list', $this->page_data);
	}

	public function add()
	{

		// ifPermissions('permissions_add');

		$this->load->view('jeniskegiatan/add', $this->page_data);
	}

	public function edit($id)
	{

		// ifPermissions('permissions_edit');

		$this->page_data['jeniskegiatan'] = $this->JenisKegiatan_model->getById($id);
		$this->load->view('jeniskegiatan/edit', $this->page_data);

	}

	public function save()
	{

		postAllowed();

		// ifPermissions('permissions_add');

		$permission = $this->JenisKegiatan_model->create([
			'nama' => $this->input->post('name'),
			'code' => $this->input->post('code'),
			'status' => $this->input->post('status'),
		]);

		$this->activity_model->add("Menambahkan Jenis Kegiatan Baru #$permission oleh User: #".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Menambahkan Jenis Kegiatan Berhasil');

		redirect('JenisKegiatan');

	}

	public function update($id)
	{

		postAllowed();

		// ifPermissions('permissions_edit');

		$data = [
			'nama' => $this->input->post('name'),
			'code' => $this->input->post('code'),
			'status' => $this->input->post('status'),
		];

		$permission = $this->JenisKegiatan_model->update($id, $data);

		$this->activity_model->add("Mengubah Jenis Kegiatan #$id oleh User: #".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Mengubah Jenis Kegiatan Berhasil');

		redirect('JenisKegiatan');

	}

	public function delete($id)
	{

		// ifPermissions('permissions_delete');

		$this->JenisKegiatan_model->delete($id);

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Menghapus Jenis Kegiatan Berhasil');

		$this->activity_model->add("Menghapus Jenis Kegiatan #$permission Oleh User: #".logged('name'));

		redirect('JenisKegiatan');

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
		$this->JenisKegiatan_model->update($id, ['status' => get('status') == 'true' ? 1 : 0 ]);
		echo 'done';
	}

}

/* End of file Permissions.php */
/* Location: ./application/controllers/Permissions.php */
