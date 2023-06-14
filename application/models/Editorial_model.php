<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editorial_model extends MY_Model {

	public $table = 'tbl_editorial_plan';

	public function __construct()
	{
		parent::__construct();
	}

	public function getDataJoinStrakomId($userid, $tahun = null, $triwulan = null)
	{
		$filter = "";
		if (!empty($tahun)) {
			$filter .= " AND tahun_periode = '".$tahun."' ";
		}

		if (!empty($triwulan)) {
			$filter .= " AND triwulan_periode = '".$triwulan."' ";
		}
		$query = $this->db->query("SELECT tbl_editorial_plan.tanggal_rencana, tbl_editorial_plan.produk_komunikasi, tbl_editorial_plan.txtLainProdukKomunikasi,tbl_editorial_plan.opd_id,tbl_editorial_plan.periode_id, tbl_editorial_plan.kanal_komunikasi, tbl_editorial_plan.txtLainKanalKomunikasi, tbl_editorial_plan.pesan_utama, tbl_editorial_plan.khalayak,tbl_editorial_plan.user_id,tbl_editorial_plan.id, tbl_editorial_plan.status,tbl_strakom_unggulan.nama_program FROM tbl_editorial_plan join tbl_strakom_unggulan on tbl_editorial_plan.strakom_id = tbl_strakom_unggulan.id WHERE tbl_editorial_plan.user_id = '".$userid."'".$filter)->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

	public function getDataJoinStrakomById($userid)
	{
		$query = $this->db->query("SELECT tbl_editorial_plan.tanggal_rencana, tbl_editorial_plan.strakom_id,tbl_editorial_plan.opd_id,tbl_editorial_plan.periode_id,tbl_editorial_plan.alasan, tbl_editorial_plan.produk_komunikasi, tbl_editorial_plan.txtLainProdukKomunikasi, tbl_editorial_plan.kanal_komunikasi, tbl_editorial_plan.txtLainKanalKomunikasi, tbl_editorial_plan.pesan_utama, tbl_editorial_plan.khalayak,tbl_editorial_plan.user_id,tbl_editorial_plan.id, tbl_editorial_plan.status,tbl_strakom_unggulan.nama_program FROM tbl_editorial_plan join tbl_strakom_unggulan on tbl_editorial_plan.strakom_id = tbl_strakom_unggulan.id WHERE tbl_editorial_plan.id = '".$userid."'")->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

	public function getDataEditorialByStrakomIdAndStatus($userid,$status)
	{
		$query = $this->db->query("SELECT * FROM tbl_editorial_plan join tbl_strakom_unggulan on tbl_editorial_plan.strakom_id = tbl_strakom_unggulan.id WHERE tbl_editorial_plan.status = '".$status."' AND tbl_editorial_plan.strakom_id = '".$userid."'")->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

	public function getDataJoinStrakomIdAll($userid=null, $tahun = null, $triwulan = null)
	{
		$filter = "";
		if (!empty($tahun)) {
			$filter .= " AND tahun_periode = '".$tahun."' ";
		}

		if (!empty($triwulan)) {
			$filter .= " AND triwulan_periode = '".$triwulan."' ";
		}

		if (!empty($userid)) {
			$filter .= " AND tbl_editorial_plan.user_id = '".$userid."' ";
		}

		$query = $this->db->query("SELECT tbl_editorial_plan.id,tbl_editorial_plan.strakom_id,tbl_editorial_plan.tanggal_rencana, tbl_editorial_plan.produk_komunikasi, tbl_editorial_plan.txtLainProdukKomunikasi, tbl_editorial_plan.kanal_komunikasi, tbl_editorial_plan.txtLainKanalKomunikasi, tbl_editorial_plan.pesan_utama, tbl_editorial_plan.khalayak,tbl_editorial_plan.user_id,tbl_editorial_plan.opd_id,tbl_editorial_plan.id, tbl_editorial_plan.status,tbl_strakom_unggulan.nama_program FROM tbl_editorial_plan join tbl_strakom_unggulan on tbl_editorial_plan.strakom_id = tbl_strakom_unggulan.id join tbl_periode on tbl_editorial_plan.periode_id = tbl_periode.id where tbl_periode.status_periode > 0".$filter)->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

}

/* End of file Permissions_model.php */
/* Location: ./application/models/Permissions_model.php */
