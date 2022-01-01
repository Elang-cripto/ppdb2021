<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_ppdb extends CI_Model {

    public function get_kode($dbcek)
    {
        $query = $this->db->query("SELECT MAX(no_reg) as kode from $dbcek");
        $hasil = $query->row();
        return $hasil->kode;
    }

}

/* End of file ModelName.php */
