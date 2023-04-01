<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditorialPlan extends MY_Controller {

  public function __construct() {

    parent::__construct();
    $this->page_data['page']->title = 'Editorial Plan';
    $this->page_data['page']->menu = 'rencanakinerja';
    // load base_url
  }

  public function index(){
    // load view
    $this->editorialplan();

  }

  public function editorialplan()
	{
		$this->page_data['page']->submenu = 'rencanakinerja';
    $this->page_data['editorialplan'] = $this->users_model->get();
    $this->load->view('editorialplan/list', $this->page_data);
	}

  public function add(){
    // load view
    $this->load->view('editorialplan/form-add', $this->page_data);

  }

  public function edit(){
    // load view
    $this->load->view('editorialplan/form-edit', $this->page_data);

  }

  public function view(){
    // load view
    $this->load->view('editorialplan/view', $this->page_data);

  }

  public function delete($id)
  {

    // ifPermissions('users_delete');

    if($id!==1 && $id!=logged($id)){ }else{
      redirect('/','refresh');
      return;
    }

    // $id = $this->users_model->delete($id);
    //
    // $this->activity_model->add("User #$id Deleted by User:".logged('name'));
    //
    // $this->session->set_flashdata('alert-type', 'success');
    // $this->session->set_flashdata('alert', 'User has been Deleted Successfully');
    //
    redirect('editorialplan');

  }

}
