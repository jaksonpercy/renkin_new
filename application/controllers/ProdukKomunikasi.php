<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukKomunikasi extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title = 'Kelola Produk Komunikasi';
		$this->page_data['page']->menu = 'produkkomunikasi';
	}

	public function index()
	{

		// ifPermissions('permissions_list');

		$this->page_data['produkkomunikasi'] = $this->ProdukKomunikasi_model->get();
		$this->load->view('produkkomunikasi/list', $this->page_data);
	}

	public function add()
	{

		// ifPermissions('permissions_add');

		$this->load->view('produkkomunikasi/add', $this->page_data);
	}

	public function edit($id)
	{

		// ifPermissions('permissions_edit');

		$this->page_data['produkkomunikasi'] = $this->ProdukKomunikasi_model->getById($id);
		$this->load->view('produkkomunikasi/edit', $this->page_data);

	}

	public function save()
	{

		postAllowed();

		// ifPermissions('permissions_add');

		$permission = $this->ProdukKomunikasi_model->create([
			'nama' => $this->input->post('name'),
			'code' => $this->input->post('code'),
			'status' => $this->input->post('status'),
		]);

		$this->activity_model->add("Menambahkan Produk Komunikasi Baru #$permission oleh User: #".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Menambahkan Produk Komunikasi Baru Berhasil');

		redirect('ProdukKomunikasi');

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

		$permission = $this->ProdukKomunikasi_model->update($id, $data);

		$this->activity_model->add("Mengubah Produk Komunikasi #$id oleh User: #".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Mengubah Produk Komunikasi Berhasil');

		redirect('ProdukKomunikasi');

	}

	public function delete($id)
	{

		// ifPermissions('permissions_delete');

		$this->ProdukKomunikasi_model->delete($id);

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Menghapus Produk Komunikasi Berhasil');

		$this->activity_model->add("Menghapus Produk Komunikasi #$permission Oleh User: #".logged('name'));

		redirect('ProdukKomunikasi');

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
		$this->ProdukKomunikasi_model->update($id, ['status' => get('status') == 'true' ? 1 : 0 ]);
		echo 'done';
	}

}

/* End of file Permissions.php */
/* Location: ./application/controllers/Permissions.php */
