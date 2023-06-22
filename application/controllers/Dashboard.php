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
		$role_data = $this->users_model->getById($this->session->userdata('logged')['id']);
		$this->page_data['pemberitahuan'] = $this->Pemberitahuan_model->getDataSort("DESC");
		$this->page_data['periodeCount'] = $this->Periode_model->getByWhere([
      'status_periode'=> 1
    ]);
		$this->page_data['countstrakombyid'] = $this->Strakom_model->countAllByUserId($this->session->userdata('logged')['id']);
		$this->page_data['countrealisasi'] = $this->Data_Realisasi_model->countAllByUserId($this->session->userdata('logged')['id']);
		if($role_data->role == 2 ||$role_data->role == 4 ){
		$this->page_data['listopdcount'] = count($this->users_model->getListUserByAsisten("(".	$this->page_data['roles']->skpd_renkin.")"));
		$this->page_data['countstrakombylistopd'] = count($this->Strakom_model->getCountStrakomByListOpd("(".	$this->page_data['roles']->skpd_renkin.")"));
		$this->page_data['listopd'] = $this->users_model->getListUserByAsisten("(".	$this->page_data['roles']->skpd_renkin.")");
		$this->page_data['listrakom'] = $this->Strakom_model->getListStrakomByListOpd();

		}
		$this->page_data['listrakomopd'] = $this->Strakom_model->getListStrakomOrderByLimit();

		$this->load->view('dashboard', $this->page_data);
	}

	public function notification(){
    // load view
	if(!empty($this->session->userdata('logged')['skpd'])){
		$this->page_data['new_notiff'] = $this->db->query("Select * from tbl_notifikasi where opd_id in (".$this->session->userdata('logged')['skpd'].");")->result();
		$this->page_data['update'] = $this->db->query("update tbl_notifikasi set status_read=1 where opd_id in (".$this->session->userdata('logged')['skpd'].");");
	}else{
		$this->page_data['new_notiff'] = $this->db->query("Select * from tbl_notifikasi where opd_id=".$this->session->userdata('logged')['opd']." and judul_notifikasi not like '%sudah dilakukan finalisasi';")->result();
		$this->page_data['update'] = $this->db->query("update tbl_notifikasi set status_read=1 where opd_id=".$this->session->userdata('logged')['opd'].";");
	}

    $this->load->view('notification/notification', $this->page_data);

  	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
