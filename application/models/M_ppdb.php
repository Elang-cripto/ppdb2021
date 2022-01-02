<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_ppdb extends CI_Model {

    public function get_kode($dbcek)
    {
        $query = $this->db->query("SELECT MAX(no_reg) as kode from $dbcek");
        $hasil = $query->row();
        return $hasil->kode;
    }

    public function update_last($tabel)
    {
        $id 			= $this->session->userdata('id');
        $data['last'] 	= date('Y-m-d H:i:s');
        return $this->db->update($tabel, $data, array('id' => $id));
    }

    //=========================================================================================
    public function getinfo()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get("db_info")->result();
    }

    public function getuserdas()
    {
        $this->db->order_by('last', 'desc');
        $this->db->limit(8);        
        return $this->db->get("db_user")->result();
    }

    // SumIf db_mts ============================================================================
    public function getkls_mts()
    {
        $this->db->order_by('kelas', 'asc');
        return $this->db->get_where('db_kls',array("par" => 'mts'))->result();
    }

    public function getmts()
    {
        $this->db->order_by('id', 'asc');
        //$this->db->where('status', 'AKTIF');
        return $this->db->get('db_mts')->result();
	}

    public function getuser()
    {
        //$this->db->order_by('last', 'desc');
        return $this->db->get('db_panitia')->result();
    }
}

/* End of file ModelName.php */
