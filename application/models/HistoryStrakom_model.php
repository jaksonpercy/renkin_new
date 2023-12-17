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

	public function getListStrakomByCreatedBy($id,$tahun, $triwulan)
	{
		$filter = "";
		if (!empty($tahun)) {
			$filter .= " AND year(d_created_date) = '".$tahun."' ";
		}
		if (!empty($triwulan)) {
			$filter .= " AND tahapan_kegiatan = '".$triwulan."' ";
		}
		$query = $this->db->query("SELECT * from $this->table where d_created_by ='".$id."'".$filter)->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}


	public function getListStrakomNowByCreatedBy($id,$tahun, $triwulan)
	{
		$filter = "";
		if (!empty($tahun)) {
			$filter .= " AND tbl_strakom_unggulan.tahun_periode = '".$tahun."' ";
		}
		if (!empty($triwulan)) {
			$filter .= " AND tbl_strakom_unggulan.triwulan_periode = '".$triwulan."' ";
		}
		$query = $this->db->query("SELECT *,tbl_strakom_unggulan.id as strakom_id from tbl_strakom_unggulan join tbl_periode on tbl_strakom_unggulan.periode_id = tbl_periode.id where tbl_periode.status_periode != '1' and user_id ='".$id."'".$filter)->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

	public function getListStrakomFilterByCreatedBy($id,$tahun, $triwulan)
	{
		$filter = "";
		if (!empty($id)) {
			$filter .= " where d_created_by = '".$id."' ";
		}
		if (!empty($tahun)) {
			$filter .= " AND year(d_created_date) = '".$tahun."' ";
		}
		if (!empty($triwulan)) {
			$filter .= " AND tahapan_kegiatan = '".$triwulan."' ";
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
