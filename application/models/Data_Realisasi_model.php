<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Realisasi_model extends MY_Model {

	public $table = 'tbl_data_realisasi';

	public function __construct()
	{
		parent::__construct();
	}

	public function getListDataRealisasiByStrakomId($id)
	{
		$query = $this->db->query("SELECT * from tbl_data_realisasi where strakom_id = '".$id."'")->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

}

/* End of file Permissions_model.php */
/* Location: ./application/models/Permissions_model.php */
