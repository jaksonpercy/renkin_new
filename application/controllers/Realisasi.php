<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Realisasi extends MY_Controller {

  public function __construct() {

    parent::__construct();
    $this->page_data['page']->title = 'Realisasi';
    $this->page_data['page']->menu = 'rencanakinerja';
    // load base_url
  }

  public function index(){
    	$this->realisasi();

  }

  public function realisasi()
	{
		$this->page_data['page']->submenu = 'rencanakinerja';
    $this->page_data['realisasi'] = $this->users_model->get();
    $this->load->view('realisasi/list', $this->page_data);
	}

  public function add(){
    // load view
    $this->page_data['rencanamedia'] = $this->KanalPublikasi_model->getByStatusActive(1);
    $this->load->view('realisasi/form-add', $this->page_data);

  }

  public function printExport(){
    // load view
    $this->load->view('realisasi/export', $this->page_data);

  }

  public function edit(){
    // load view
    $this->load->view('realisasi/form-edit', $this->page_data);

  }

  public function view(){
    // load view
    $this->load->view('realisasi/view', $this->page_data);

  }

  public function realisasiview(){
    // load view
    $this->load->view('realisasi/realisasi-view', $this->page_data);

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
    redirect('strakomunggulan');

  }

}
