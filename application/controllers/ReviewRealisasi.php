<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReviewRealisasi extends MY_Controller {

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
		$this->page_data['page']->submenu = 'realisasi';
        $tahun = $this->input->get('tahun_periode');
        // $skpd = $this->input->post('user_id');
        $triwulan = $this->input->get('triwulan_periode');

        $userId = $this->input->get('user_id');

    $this->page_data['user'] = $this->users_model->getById($this->session->userdata('logged')['id']);

    $this->page_data['userall'] = $this->users_model->getListUserByAsisten("(".$this->page_data['user']->skpd_renkin.")");
    $this->page_data['countrealisasi'] = count($this->Data_Realisasi_model->getListDataRealisasiByOpd("(".$this->page_data['user']->skpd_renkin.")",$tahun,$triwulan,$userId));
    $this->page_data['listrealisasi'] = $this->Data_Realisasi_model->getListDataRealisasiByOpd("(".$this->page_data['user']->skpd_renkin.")",$tahun,$triwulan,$userId);

    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];
    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->page_data['rencanamedia'] = $this->KanalPublikasi_model->getByStatusActive(1);

    $this->page_data['strakom'] = $this->Strakom_model->getListStrakomByOpd("(".$this->page_data['user']->skpd_renkin.")", $tahun, $triwulan, $userId);


    $this->page_data['datarealisasi'] = $this->Data_Realisasi_model->getListDataRealisasiByStrakomAndUser("(".$this->page_data['user']->skpd_renkin.")",$tahun,$triwulan,$userId);


    $this->load->view('reviewrealisasi/list', $this->page_data);
	}

  public function downloadFile($name)
  {

clearstatcache();
    //Define header information
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.basename(str_replace("/index.php","", base_url('/uploads/datanotadinas/'.$name))).'"');
header('Content-Length: ' . filesize(str_replace("/index.php","", base_url('/uploads/datanotadinas/'.$name))));
header('Pragma: public');
   flush();
   readfile(str_replace("/index.php","", base_url('/uploads/datanotadinas/'.$name))); //showing the path to the server where the file is to be download
   die();
  }
  public function add(){
    // load view
  	$this->page_data['page']->submenu = 'realisasi';
    $this->page_data['rencanamedia'] = $this->KanalPublikasi_model->getByStatusActive(1);
    $this->page_data['user'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['periode'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ])[0];
    $this->page_data['roles'] = $this->users_model->getById($this->session->userdata('logged')['id']);
    $this->page_data['roles']->role = $this->roles_model->getByWhere([
      'role_id'=> $this->page_data['roles']->role
    ])[0];
    $this->page_data['ksd'] = $this->KSD_model->getByStatusActive(1);
    $this->page_data['strakom'] = $this->Realisasi_model->getListStrakomByStatusAndUserId($this->session->userdata('logged')['id'],2);

    $this->page_data['datarealisasi'] = $this->Data_Realisasi_model->get();
    $this->load->view('realisasi/form-add', $this->page_data);

  }

  public function printExport(){
    // load view
    $this->load->view('realisasi/export', $this->page_data);

  }
}
