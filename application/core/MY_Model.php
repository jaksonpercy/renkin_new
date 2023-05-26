<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	/**
	  * Default Table Primary Key
	  */
	public $table_key = 'id';

	public $role_id = 'role_id';

	public $user_id = 'user_id';

	/**
	  * Get Data from table
	  *
	  * @return array Data
	  */
	public function get()
	{
		return $this->db->get($this->table)->result();
	}

	/**
	  * Get Data from table by id
	  *
	  * @return object Data Ex. {}
	  */
	public function getById($id)
	{
		return $this->db->get_where($this->table, [ $this->table_key => $id ])->row();
	}


	public function getByRole($id)
	{
		return $this->db->get_where($this->table, [ $this->role_id => $id ])->row();
	}

	public function getByUserId($id)
	{
		return $this->db->get_where($this->table, [ $this->user_id => $id ])->row();
	}

	public function getByStatusActive($id)
	{
		return $this->db->get_where($this->table, [ "status" => $id ])->result();
	}

	/**
	  * Get a particular field/row from table by its primary key eg. id
	  *
	  * @param int $id Primary Key Example - id
	  * @param string $row coloumn name Example - name
	  *
	  * @return string
	  *
	  */

	public function getRowById($id, $row)
	{
		return $this->db->get_where($this->table, [ $this->table_key => $id ])->row()->{$row};
	}

	/**
	  * Create/Insert the row in Table
	  *
	  * @param array $data
	  *
	  * @return int Inserted Id
	  */
	function create($data)
	{

		$this->db->insert($this->table, $data);
		return $this->db->insert_id();

	}

	/**
	  * Create/Insert the multiple rows in Table
	  *
	  * @param array $data
	  *
	  * @return int Inserted Id
	  */
	function create_batch($data)
	{

		$this->db->insert_batch($this->table, $data);
		return $this->db->insert_id();

	}

	/**
	  * Update the row in Table by id
	  *
	  * @param array $data
	  *
	  * @return int Updated Id
	  */
	function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
		return $id;
	}

	/**
	  * Delete the row in Table by id
	  *
	  * @param int $id
	  *
	  * @return boolean true
	  */
	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
		return true;
	}


	/**
	  * Get Data Using Where condition from Table
	  * Quick Function to extract information from table
	  *
	  * @param array $whereArg
	  * @param array $args Other conditions like order
	  *
	  * @return boolean true
	  */
	public function getByWhere($whereArg, $args = [])
	{

		if(isset($args['order']))
			$this->db->order_by($args['order'][0], $args['order'][1]);

		return $this->db->get_where($this->table, $whereArg)->result();
	}

	/**
	  * Predict Id of table using simple algo
	  *
	  * @return int
	  */
	public function predictId()
	{
		$this->db->order_by($this->table_key, 'desc');
		return ($query = $this->db->get_where($this->table)) && $query->num_rows() > 0 ? $query->row()->id + 1 : 1;
	}

	/**
	  * Return the total number of rows in the table
	  *
	  * @return int
	  */
	public function countAll()
	{
		return $this->db->count_all_results($this->table);
	}

	public function countAllByUserId($id)
	{
		$query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return count($query);
	}

	public function countAllByStatus($id)
	{
		$query = $this->db->query("SELECT * FROM $this->table WHERE status =  '".$id."'")->result()	;
		return count($query);
	}

	public function countAllByUserIdAndStatus($id,$status)
	{
		$query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."' AND status = '".$status."'")->result()	;
		return count($query);
	}

	public function getDataJoinThreeTableByUserId($id)
	{
		$query = $this->db->query("SELECT tbl_mitigasi.id, tbl_mitigasi.strakom_id, tbl_mitigasi.uraian_potensi, tbl_mitigasi.juru_bicara, tbl_mitigasi.data_pendukung_text, tbl_mitigasi.data_pendukung_file, tbl_mitigasi.stakeholder_pro, tbl_mitigasi.stakeholder_kontra, tbl_mitigasi.pic_kegiatan, tbl_mitigasi.user_id, tbl_mitigasi.opd_id, tbl_mitigasi.periode_id, tbl_strakom_unggulan.nama_program, tbl_ksd.nama from $this->table join tbl_strakom_unggulan on tbl_mitigasi.strakom_id = tbl_strakom_unggulan.id left outer join tbl_ksd on tbl_strakom_unggulan.ksd_id = tbl_ksd.id where tbl_mitigasi.user_id = '".$id."'")->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

	public function getDataJoinThreeTable()
	{
		$query = $this->db->query("SELECT tbl_mitigasi.id, tbl_mitigasi.strakom_id, tbl_mitigasi.uraian_potensi, tbl_mitigasi.juru_bicara, tbl_mitigasi.data_pendukung_text, tbl_mitigasi.data_pendukung_file, tbl_mitigasi.stakeholder_pro, tbl_mitigasi.stakeholder_kontra, tbl_mitigasi.pic_kegiatan, tbl_mitigasi.user_id, tbl_mitigasi.opd_id, tbl_mitigasi.periode_id, tbl_strakom_unggulan.nama_program, tbl_ksd.nama from $this->table join tbl_strakom_unggulan on tbl_mitigasi.strakom_id = tbl_strakom_unggulan.id left outer join tbl_ksd on tbl_strakom_unggulan.ksd_id = tbl_ksd.id")->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

	public function getDataByUserId($id)
	{

		$query = $this->db->query("SELECT tbl_strakom_unggulan.id as strakom_id,tbl_strakom_unggulan.kategori_program, tbl_strakom_unggulan.nama_program, tbl_strakom_unggulan.ksd_id, tbl_strakom_unggulan.jenis_kegiatan, tbl_strakom_unggulan.deskripsi, tbl_strakom_unggulan.analisis_situasi, tbl_strakom_unggulan.identifikasi_masalah, tbl_strakom_unggulan.narasi_utama, tbl_strakom_unggulan.target_pro, tbl_strakom_unggulan.target_kontra, tbl_strakom_unggulan.kanal_publikasi, tbl_strakom_unggulan.kanal_publikasi_lainnya, tbl_strakom_unggulan.user_id, tbl_strakom_unggulan.periode_id, tbl_strakom_unggulan.opd_id, tbl_strakom_unggulan.status FROM $this->table join tbl_periode on tbl_strakom_unggulan.periode_id = tbl_periode.id WHERE tbl_periode.status_periode = 1 AND user_id =  '".$id."'")->result()	;
		return $query;
	}

	public function getDataByStrakomId($id)
	{

		$query = $this->db->query("SELECT * FROM $this->table WHERE strakom_id =  '".$id."'")->result()	;
		return $query;
	}

	public function getDataJoinThreeTableByStrakom($id,$idStrakom)
	{
		$query = $this->db->query("SELECT tbl_mitigasi.id, tbl_mitigasi.strakom_id, tbl_mitigasi.uraian_potensi, tbl_mitigasi.juru_bicara, tbl_mitigasi.data_pendukung_text, tbl_mitigasi.data_pendukung_file, tbl_mitigasi.stakeholder_pro, tbl_mitigasi.stakeholder_kontra, tbl_mitigasi.pic_kegiatan, tbl_mitigasi.user_id, tbl_mitigasi.opd_id, tbl_mitigasi.periode_id, tbl_strakom_unggulan.nama_program, tbl_ksd.nama from $this->table join tbl_strakom_unggulan on tbl_mitigasi.strakom_id = tbl_strakom_unggulan.id left outer join tbl_ksd on tbl_strakom_unggulan.ksd_id = tbl_ksd.id where tbl_mitigasi.user_id = '".$id."' AND tbl_mitigasi.strakom_id = '".$idStrakom."' ")->result()	;
		// $query = $this->db->query("SELECT * FROM $this->table WHERE user_id =  '".$id."'")->result()	;
		return $query;
	}

	public function getDataLimit($id,$limit)
	{

		$query = $this->db->query("SELECT * FROM $this->table ORDER BY id =  '".$id."' LIMIT 1")->result()	;
		return $query;
	}

	public function getFilterPeriodeByYearnName($year,$name)
	{
		if (empty($year)) {
			if (empty($name)) {
				$query = $this->db->query("SELECT * FROM $this->table where status_periode = 1")->result()	;
				return $query;
			} else {
				$query = $this->db->query("SELECT * FROM $this->table where periode_aktif =  '".$name."'  LIMIT 1")->result()	;
				return $query;
			}
		} else {
			if (empty($name)) {
				$query = $this->db->query("SELECT * FROM $this->table where tahun =  '".$year."' LIMIT 1")->result()	;
				return $query;
			} else {
				$query = $this->db->query("SELECT * FROM $this->table where tahun =  '".$year."' AND periode_aktif =  '".$name."'  LIMIT 1")->result()	;
				return $query;
			}
		}

	}

	public function getFilterByPeriodeNUser($filtered_get)
	{
		$query='';
		$queryNew = "SELECT * FROM $this->table";
		if (count($filtered_get)) { // not empty
    $queryNew .= " WHERE";

    $keynames = array_keys($filtered_get); // make array of key names from $filtered_get

    foreach($filtered_get as $key => $value)
    {
       $queryNew .= " $keynames[$key] = '$value'";  // $filtered_get keyname = $filtered_get['keyname'] value
       if (count($filtered_get) > 1 && (count($filtered_get)-1 > $key)) { // more than one search filter, and not the last
          $queryNew .= " AND";
       }
    }
}
$queryNew .= ";";
$query = $this->db->query($queryNew)->result();
return $query;

	}


}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */
