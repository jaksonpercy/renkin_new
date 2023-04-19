<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KanalPublikasi extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title = 'Kelola Rencana Media / Kanal Publikasi';
		$this->page_data['page']->menu = 'rencanamedia';
	}

	public function index()
	{

		// ifPermissions('permissions_list');

		$this->page_data['rencanamedia'] = $this->KanalPublikasi_model->get();
		$this->load->view('rencanamedia/list', $this->page_data);
	}

	public function add()
	{

		// ifPermissions('permissions_add');

		$this->load->view('rencanamedia/add', $this->page_data);
	}

	public function edit($id)
	{

		// ifPermissions('permissions_edit');

		$this->page_data['rencanamedia'] = $this->KanalPublikasi_model->getById($id);
		$this->load->view('rencanamedia/edit', $this->page_data);

	}

	public function save()
	{

		postAllowed();

		// ifPermissions('permissions_add');

		$permission = $this->KanalPublikasi_model->create([
			'nama' => $this->input->post('name'),
			'code' => $this->input->post('code'),
			'status' => $this->input->post('status'),
		]);

		$this->activity_model->add("Menambahkan Kanal Publikasi / Rencana Media Baru #$permission oleh User: #".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Menambahkan Kanal Publikasi / Rencana Media Baru Berhasil');

		redirect('KanalPublikasi');

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

		$permission = $this->KanalPublikasi_model->update($id, $data);

		$this->activity_model->add("Mengubah Kanal Publikasi / Rencana Media #$id oleh User: #".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Mengubah Kanal Publikasi / Rencana Media Berhasil');

		redirect('KanalPublikasi');

	}

	public function delete($id)
	{

		// ifPermissions('permissions_delete');

		$this->KanalPublikasi_model->delete($id);

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Menghapus Kanal Publikasi / Rencana Media Berhasil');

		$this->activity_model->add("Menghapus Kanal Publikasi / Rencana Media #$permission Oleh User: #".logged('name'));

		redirect('KanalPublikasi');

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
		$this->KanalPublikasi_model->update($id, ['status' => get('status') == 'true' ? 1 : 0 ]);
		echo 'done';
	}

}

/* End of file Permissions.php */
/* Location: ./application/controllers/Permissions.php */
