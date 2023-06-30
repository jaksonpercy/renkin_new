<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryStrakom_model extends MY_Model {

	public $table = 'strategi_komunikasi';

	public function __construct()
	{
		parent::__construct();
	}

	public function getStrakomByIdStrakom($id)
	{
		$query = $this->db->query("SELECT * from $this->table where id_strakom = '".$id."'")->row()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

	public function getListStrakomByCreatedBy($id)
	{
		$query = $this->db->query("SELECT * from $this->table where d_created_by ='".$id."'")->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

	public function getListStrakomFilterByCreatedBy($id)
	{
		$filter = "";
		if (!empty($id)) {
			$filter .= " where d_created_by = '".$id."' ";
		}

		$query = $this->db->query("SELECT * from $this->table".$filter)->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}


	public function getStrakomByOpd($id)
	{
		$query = $this->db->query("SELECT * from $this->table where d_created_by in ".$id."")->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}



}

/* End of file Permissions_model.php */
/* Location: ./application/models/Permissions_model.php */
