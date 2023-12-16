<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengaturanPeriode extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title = 'Pengaturan Periode';
		$this->page_data['page']->menu = 'periode';
	}

	public function index()
	{

		// ifPermissions('permissions_list');

		$this->page_data['periode'] = $this->Periode_model->get();
		$this->load->view('periode/list', $this->page_data);
	}

	public function add()
	{

		// ifPermissions('permissions_add');

		$this->load->view('periode/add', $this->page_data);
	}

	public function edit($id)
	{

		// ifPermissions('permissions_edit');

		$this->page_data['periode'] = $this->Periode_model->getById($id);
		$this->load->view('periode/edit', $this->page_data);

	}

	public function save()
	{

		postAllowed();

		// ifPermissions('permissions_add');
		$year = date("Y");

		$periode = $this->Periode_model->create([
			'periode_aktif' => $this->input->post('periode_aktif'),
			'tahun' => $this->input->post('tahun_periode'),
			'status_periode' => 0,
			'status_penilaian' => $this->input->post('periode_penilaian'),
			'status_realisasi' => $this->input->post('periode_realisasi'),
			'status_input_data' => $this->input->post('periode_input_data'),
		]);

		$this->activity_model->add("Menambahkan Data Periode #$periode oleh User: #".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Menambahkan data Periode Berhasil');

		redirect('PengaturanPeriode');

	}

	public function update($id)
	{

		postAllowed();

		// ifPermissions('permissions_edit');
		$year = date("Y");
		$data = [
			'periode_aktif' => $this->input->post('periode_aktif'),
				'tahun' => $this->input->post('tahun_periode'),
			'status_periode' => $this->input->post('status'),
			'status_penilaian' => $this->input->post('periode_penilaian'),
			'status_realisasi' => $this->input->post('periode_realisasi'),
			'status_input_data' => $this->input->post('periode_input_data'),
		];

		$permission = $this->Periode_model->update($id, $data);

		$this->activity_model->add("Mengubah Data Periode #$periode oleh User: #".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Mengubah data Periode Berhasil');

		redirect('PengaturanPeriode');

	}

	public function delete($id)
	{

		// ifPermissions('permissions_delete');

		$this->Periode_model->delete($id);

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Pengaturan Periode Berhasil Dihapus');

		$this->activity_model->add("Pengaturan Periode #$permission Dihapur oleh User: #".logged('id'));

		redirect('PengaturanPeriode');

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
		$this->Periode_model->update($id, ['status_periode' => get('status_periode') == 'true' ? 1 : 0 ]);
		echo 'done';
	}

}

/* End of file Permissions.php */
/* Location: ./application/controllers/Permissions.php */
