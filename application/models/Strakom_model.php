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
		$query = $this->db->query("SELECT * from tbl_strakom_unggulan where status = '".$status."'")->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

}

/* End of file Permissions_model.php */
/* Location: ./application/models/Permissions_model.php */
