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

	public function getListStrakomForReview($tahun = null, $triwulan = null, $userId = null)
	{
		$filter = "";
		if (!empty($tahun)) {
			$filter .= " AND tahun_periode = '".$tahun."' ";
		}

		if (!empty($triwulan)) {
			$filter .= " AND triwulan_periode = '".$triwulan."' ";
		}

		if (!empty($userId)) {
			$filter .= " AND user_id = '".$userId."' ";
		}

		$query = $this->db->query("SELECT tbl_strakom_unggulan.id as strakom_id,tbl_strakom_unggulan.kategori_program, tbl_strakom_unggulan.nama_program, tbl_strakom_unggulan.ksd_id, tbl_strakom_unggulan.jenis_kegiatan, tbl_strakom_unggulan.deskripsi, tbl_strakom_unggulan.analisis_situasi, tbl_strakom_unggulan.identifikasi_masalah, tbl_strakom_unggulan.narasi_utama, tbl_strakom_unggulan.target_pro, tbl_strakom_unggulan.target_kontra, tbl_strakom_unggulan.kanal_publikasi, tbl_strakom_unggulan.kanal_publikasi_lainnya, tbl_strakom_unggulan.user_id, tbl_strakom_unggulan.periode_id, tbl_strakom_unggulan.opd_id, tbl_strakom_unggulan.status,tbl_strakom_unggulan.alasan, (select COUNT(tbl_editorial_plan.id) from tbl_editorial_plan where tbl_editorial_plan.strakom_id=tbl_strakom_unggulan.id) EditorialCount, (select COUNT(tbl_mitigasi.id) from tbl_mitigasi where tbl_mitigasi.strakom_id=tbl_strakom_unggulan.id) MitigasiCount,(select COUNT(tbl_editorial_plan.id) from tbl_editorial_plan where tbl_editorial_plan.strakom_id=tbl_strakom_unggulan.id AND tbl_editorial_plan.status = 3) EditorialCountRejected,(select COUNT(tbl_editorial_plan.id) from tbl_editorial_plan where tbl_editorial_plan.strakom_id=tbl_strakom_unggulan.id AND tbl_editorial_plan.status = 0) EditorialCountBR,(select COUNT(tbl_mitigasi.id) from tbl_mitigasi where tbl_mitigasi.strakom_id=tbl_strakom_unggulan.id AND tbl_mitigasi.status = 3) MitigasiCountRejected,(select COUNT(tbl_mitigasi.id) from tbl_mitigasi where tbl_mitigasi.strakom_id=tbl_strakom_unggulan.id AND tbl_mitigasi.status = 0) MitigasiCountBR from tbl_strakom_unggulan join tbl_periode on tbl_strakom_unggulan.periode_id = tbl_periode.id WHERE tbl_periode.status_periode = 1".$filter)->result()	;
		return $query;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

	public function getListStrakomOrderByLimit()
	{
		$query = $this->db->query("SELECT *,tbl_strakom_unggulan.id as strakom_id from tbl_strakom_unggulan join tbl_periode on tbl_periode.id = tbl_strakom_unggulan.periode_id where tbl_periode.status_periode = 1 ORDER BY `tbl_strakom_unggulan`.`created_date` DESC LIMIT 5")->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

}

/* End of file Permissions_model.php */
/* Location: ./application/models/Permissions_model.php */
