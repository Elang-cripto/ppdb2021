<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getdata extends CI_Model {

	public function mts_db()
	{
		$datamts = $this->db->query('select * from db_mts');
		return $datamts->result_array();
	}

	public function ma_db()
	{
		$datamts = $this->db->query('select * from db_ma');
		return $datamts->result_array();
	}

	public function smp_db()
	{
		$datamts = $this->db->query('select * from db_smp');
		return $datamts->result_array();
	}

	public function smk_db()
	{
		$datamts = $this->db->query('select * from db_smk');
		return $datamts->result_array();
	}
}

/* End of file usermodel.php */
/* Location: ./application/models/usermodel.php */