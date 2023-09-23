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
		$query = $this->db->query("SELECT * from tbl_data_realisasi where strakom_id = '".$id."' ORDER BY tbl_data_realisasi.created_date DESC")->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

	public function getListDataRealisasiByStrakomAndUser($id, $tahun=null, $triwulan = null, $userId = null)
	{
		$filter = "";
		if (!empty($tahun)) {
			$filter .= " AND tbl_periode.tahun = '".$tahun."' ";
		}

		if (!empty($triwulan)) {
			$filter .= " AND tbl_periode.periode_aktif = '".$triwulan."' ";
		}

		if (!empty($userId)) {
			$filter .= " AND tbl_data_realisasi.user_id = '".$userId."' ";
		}

		$filter .= " ORDER BY tbl_data_realisasi.created_date DESC";

		$query = $this->db->query("SELECT tbl_data_realisasi.id, tbl_data_realisasi.strakom_id, tbl_data_realisasi.tanggal_realisasi, tbl_data_realisasi.judul_publikasi, tbl_data_realisasi.kanal_publikasi, tbl_data_realisasi.text_lainnya, tbl_data_realisasi.link_tautan, tbl_data_realisasi.file_dokumentasi, tbl_data_realisasi.status, tbl_data_realisasi.user_id, tbl_data_realisasi.opd_id, tbl_data_realisasi.periode_id, tbl_strakom_unggulan.nama_program, tbl_users.name from tbl_data_realisasi join tbl_strakom_unggulan on tbl_data_realisasi.strakom_id = tbl_strakom_unggulan.id join tbl_users on tbl_data_realisasi.user_id = tbl_users.id join tbl_periode on tbl_data_realisasi.periode_id = tbl_periode.id where tbl_data_realisasi.opd_id IN ".$id."".$filter)->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

	public function getListDataRealisasiByOpd($id, $tahun=null, $triwulan = null, $userId = null)
	{
		$filter = "";
		if (!empty($tahun)) {
			$filter .= " AND tbl_periode.tahun = '".$tahun."' ";
		}

		if (!empty($triwulan)) {
			$filter .= " AND tbl_periode.periode_aktif = '".$triwulan."' ";
		}

		if (!empty($userId)) {
			$filter .= " AND tbl_data_realisasi.user_id = '".$userId."' ";
		}

		$query = $this->db->query("SELECT * FROM $this->table join tbl_periode on tbl_data_realisasi.periode_id = tbl_periode.id WHERE tbl_data_realisasi.opd_id IN ".$id."".$filter)->result()	;
		return $query;
	}

	public function deleteDataByStrakomId($id)
	{
		$this->db->where('strakom_id', $id);
		$this->db->delete($this->table);
		return true;
	}
}

/* End of file Permissions_model.php */
/* Location: ./application/models/Permissions_model.php */
