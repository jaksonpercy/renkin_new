<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends MY_Controller {

  public function __construct() {

    parent::__construct();
    $this->page_data['page']->title = 'Strategi Komunikasi Unggulan';
    $this->page_data['page']->menu = 'strakom';
    // load base_url
  }

  public function index(){
    // load view
    $this->page_data['strakom'] = $this->users_model->get();

  }


  public function view(){
    // load view
    $this->load->view('penilaian/view', $this->page_data);

  }

  public function detaileditorial(){
    // load view
    $this->load->view('penilaian/detail-editorial-plan', $this->page_data);

  }

  public function detailmitigasi(){
    // load view
    $this->load->view('penilaian/detail-mitigasi', $this->page_data);

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
    redirect('penilaian');

  }

}
