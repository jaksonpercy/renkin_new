<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriProgram extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title = 'Kelola Kategori Program';
		$this->page_data['page']->menu = 'kategoriprogram';
	}

	public function index()
	{

		// ifPermissions('permissions_list');

		$this->page_data['kategoriprogram'] = $this->KategoriProgram_model->get();
		$this->load->view('kategoriprogram/list', $this->page_data);
	}

	public function add()
	{

		// ifPermissions('permissions_add');

		$this->load->view('kategoriprogram/add', $this->page_data);
	}

	public function edit($id)
	{

		// ifPermissions('permissions_edit');

		$this->page_data['kategoriprogram'] = $this->KategoriProgram_model->getById($id);
		$this->load->view('kategoriprogram/edit', $this->page_data);

	}

	public function save()
	{

		postAllowed();

		// ifPermissions('permissions_add');

		$permission = $this->KategoriProgram_model->create([
			'nama' => $this->input->post('name'),
			'code' => $this->input->post('code'),
			'status' => $this->input->post('status'),
		]);

		$this->activity_model->add("Menambahkan Kategori Program / Kegiatan Baru #$permission oleh User: #".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Menambahkan Kategori Program / Kegiatan Baru Berhasil');

		redirect('KategoriProgram');

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

		$permission = $this->KategoriProgram_model->update($id, $data);

		$this->activity_model->add("Mengubah Kategori Program / Kegiatan #$id oleh User: #".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Mengubah Kategori Program / Kegiatan Berhasil');

		redirect('KategoriProgram');

	}

	public function delete($id)
	{

		// ifPermissions('permissions_delete');

		$this->KategoriProgram_model->delete($id);

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Menghapus Kategori Program / Kegiatan Berhasil');

		$this->activity_model->add("Menghapus Kategori Program / Kegiatan #$permission Oleh User: #".logged('name'));

		redirect('KategoriProgram');

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
		$this->KategoriProgram_model->update($id, ['status' => get('status') == 'true' ? 1 : 0 ]);
		echo 'done';
	}

}

/* End of file Permissions.php */
/* Location: ./application/controllers/Permissions.php */
