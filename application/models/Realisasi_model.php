<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Realisasi_model extends MY_Model {

	public $table = 'tbl_realisasi';

	public function __construct()
	{
		parent::__construct();
	}

	public function getListStrakomByStatusAndUserId($id,$status)
	{
		$query = $this->db->query("SELECT *,tbl_strakom_unggulan.id as strakom_id from tbl_strakom_unggulan join tbl_periode on tbl_periode.id = tbl_strakom_unggulan.periode_id where tbl_periode.status_periode = 1 AND tbl_strakom_unggulan.user_id = '".$id."'  AND status = '".$status."'")->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

	public function getListStrakomByRealisasi($tahun = null, $triwulan = null)
	{
		$filter = "";
		if (!empty($tahun)) {
			$filter .= " AND tahun_periode = '".$tahun."' ";
		}

		if (!empty($triwulan)) {
			$filter .= " AND triwulan_periode = '".$triwulan."' ";
		}

		$filter .= " ORDER BY tbl_strakom_unggulan.created_date DESC";

		$query = $this->db->query("SELECT * from tbl_strakom_unggulan where (no_nota_dinas != '' OR url_nota_dinas != '' OR perihal_nota != '' OR tanggal_nota != '') $filter ")->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

}

/* End of file Permissions_model.php */
/* Location: ./application/models/Permissions_model.php */
