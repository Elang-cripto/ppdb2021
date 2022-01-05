<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek extends CI_Model
{
	public function login($email, $telp)
	{
		$this->db->select('*');
		$this->db->from('db_user_pendaftar');
		$this->db->where('email', $email);
		$this->db->where('telp', $telp);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function admin($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('db_panitia');

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
}

/* End of file my_model.php */
/* Location: ./application/models/my_model.php */