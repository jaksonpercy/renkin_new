<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KSD extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title = 'Kelola KSD';
		$this->page_data['page']->menu = 'ksd';
	}

	public function index()
	{

		// ifPermissions('permissions_list');

		$this->page_data['ksd'] = $this->KSD_model->get();
		$this->load->view('ksd/list', $this->page_data);
	}

	public function add()
	{

		// ifPermissions('permissions_add');

		$this->load->view('ksd/add', $this->page_data);
	}

	public function edit($id)
	{

		// ifPermissions('permissions_edit');

		$this->page_data['ksd'] = $this->KSD_model->getById($id);
		$this->load->view('ksd/edit', $this->page_data);

	}

	public function save()
	{

		postAllowed();

		// ifPermissions('permissions_add');

		$permission = $this->KSD_model->create([
			'nama' => $this->input->post('name'),
			'code' => $this->input->post('code'),
			'status' => $this->input->post('status'),
		]);

		$this->activity_model->add("Menambahkan KSD Baru #$permission oleh User: #".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Menambahkan KSD Baru Berhasil');

		redirect('KSD');

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

		$permission = $this->KSD_model->update($id, $data);

		$this->activity_model->add("Mengubah KSD #$id oleh User: #".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Mengubah KSD Berhasil');

		redirect('KSD');

	}

	public function delete($id)
	{

		// ifPermissions('permissions_delete');

		$this->KSD_model->delete($id);

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Menghapus KSD Berhasil');

		$this->activity_model->add("Menghapus KSD #$permission Oleh User: #".logged('name'));

		redirect('KSD');

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
		$this->KSD_model->update($id, ['status' => get('status') == 'true' ? 1 : 0 ]);
		echo 'done';
	}

}

/* End of file Permissions.php */
/* Location: ./application/controllers/Permissions.php */
