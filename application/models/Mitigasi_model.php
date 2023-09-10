<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitigasi_model extends MY_Model {

	public $table = 'tbl_mitigasi';

	public function __construct()
	{
		parent::__construct();
	}

	public function getDataMitigasiJoinStrakomById($userid)
	{
		$query = $this->db->query("SELECT tbl_mitigasi.id, tbl_mitigasi.strakom_id, tbl_mitigasi.uraian_potensi, tbl_mitigasi.juru_bicara, tbl_mitigasi.data_pendukung_text, tbl_mitigasi.data_pendukung_file, tbl_mitigasi.stakeholder_pro, tbl_mitigasi.stakeholder_kontra, tbl_mitigasi.pic_kegiatan, tbl_mitigasi.user_id, tbl_mitigasi.opd_id, tbl_mitigasi.periode_id, tbl_mitigasi.status, tbl_mitigasi.alasan, tbl_strakom_unggulan.nama_program from tbl_mitigasi join tbl_strakom_unggulan on tbl_mitigasi.strakom_id = tbl_strakom_unggulan.id where tbl_mitigasi.id = '".$userid."'")->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

	public function getDataMitigasiByStrakomIdAndStatus($userid,$status)
	{
		$query = $this->db->query("SELECT * from tbl_mitigasi join tbl_strakom_unggulan on tbl_mitigasi.strakom_id = tbl_strakom_unggulan.id where tbl_mitigasi.strakom_id = '".$userid."' AND tbl_mitigasi.status in ('".$status."')")->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

}

/* End of file Permissions_model.php */
/* Location: ./application/models/Permissions_model.php */
