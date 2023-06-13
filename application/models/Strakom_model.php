<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Strakom_model extends MY_Model {

	public $table = 'tbl_strakom_unggulan';

	public function __construct()
	{
		parent::__construct();
	}

	public function getListStrakomByStatus($status)
	{
		$query = $this->db->query("SELECT *,tbl_strakom_unggulan.id as strakom_id from tbl_strakom_unggulan join tbl_periode on tbl_periode.id = tbl_strakom_unggulan.periode_id where tbl_periode.status_periode = 1 AND status = '".$status."'")->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

}

/* End of file Permissions_model.php */
/* Location: ./application/models/Permissions_model.php */
