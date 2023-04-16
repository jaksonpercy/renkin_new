<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
		$this->page_data['roles']->role = $this->roles_model->getByWhere([
			'role_id'=> $this->page_data['roles']->role
		])[0];
		$this->load->view('dashboard', $this->page_data);
	}

	public function notification(){
    // load view
    $this->load->view('notification/notification', $this->page_data);

  }

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
