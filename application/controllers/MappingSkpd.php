<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MappingSkpd extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title = 'Mapping SKPD';
		$this->page_data['page']->menu = 'mappingskpd';
	}

	public function index()
	{
		// ifPermissions('roles_list');
		$this->page_data['mappingskpd'] = $this->users_model->getDataByFilterRole("2");
		$this->load->view('mappingskpd/list', $this->page_data);
	}

	public function add()
	{
		// ifPermissions('roles_add');
		$this->load->view('roles/add', $this->page_data);
	}

	public function save()
	{

		// ifPermissions('roles_add');

		postAllowed();

		$role = $this->roles_model->create([
			'role_name' => $this->input->post('name'),
		]);

		$Data = [];
		foreach (post('permission') as $permission) {
			array_push($Data, [
				'role' => $role,
				'permission' => $permission,
			]);
		}

		$this->role_permissions_model->create_batch($Data);

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'New Role Created Successfully');

		$this->activity_model->add("New Role #$role Created by User: #".logged('id'));

		redirect('roles');

	}

	public function edit($id)
	{

		// ifPermissions('roles_edit');
		$this->page_data['User'] = $this->users_model->getById($id);
		$this->page_data['User']->role = $this->roles_model->getByWhere([
			'role_id'=> $this->page_data['User']->role
		])[0];

		$skpd = $this->page_data['User']->skpd_renkin;

		$this->page_data['opd'] = $this->OPD_model->get();
		$permissions = $this->OPD_model->getListOPDBySkpd("($skpd)");

		$permissions = array_map(function($data)
		{
			return $data->id;
		}, $permissions);

		$this->page_data['skpd'] = $permissions;
		$this->load->view('mappingskpd/edit', $this->page_data);

	}


	public function update($id)
	{

		// ifPermissions('roles_edit');

		postAllowed();
		$Data = implode(", ",post('opd'));
		// foreach (post('opd') as $permission) {
		// 	$Data = implode(", ",$permission);
		// }

		$data = [
			'skpd_renkin' => $Data,
		];

		if(!empty($password = post('password')))
			$data['password'] = hash( "sha256", $password );

		$role = $this->users_model->update($id, $data);


		// Data which will be added
		// $Data = [];
		// foreach (post('permission') as $permission) {
		// 	if( !empty($this->role_permissions_model->getByWhere([ 'role' => $id, 'permission' => $permission ])) ){ }else{
		// 		array_push($Data, [
		// 			'role' => $role,
		// 			'permission' => $permission,
		// 		]);
		// 	}
		// }

		// if(!empty($Data))
		// 	$this->role_permissions_model->create_batch($Data);

		// $all_permissions = $this->role_permissions_model->getByWhere([
		// 	'role' =>  $role
		// ]);

		// if(!empty($all_permissions)){
		// 	// Permissions which will be deleted
		// 	foreach ($all_permissions as $data) {

		// 		if(!in_array($data->permission, post('permission'))){
		// 			$this->role_permissions_model->delete($data->id);
		// 		}

		// 	}
		// }

		$this->activity_model->add("Mapping OPD #$role Updated by User: #".logged('id'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Mapping OPD has been Updated Successfully');

		redirect('MappingSkpd');

	}

}

/* End of file Roles.php */
/* Location: ./application/controllers/Roles.php */
