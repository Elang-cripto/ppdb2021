<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_ppdb extends CI_Model
{

    public function get_kode($dbcek)
    {
        $query = $this->db->query("SELECT MAX(no_reg) as kode from $dbcek");
        $hasil = $query->row();
        return $hasil->kode;
    }

    public function update_last($tabel)
    {
        $id             = $this->session->userdata('id');
        $data['last']     = date('Y-m-d H:i:s');
        return $this->db->update($tabel, $data, array('id' => $id));
    }

    //=========================================== Dasboard =================================
    public function getinfo()
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit(5);
        return $this->db->get("db_info")->result();
    }

    public function getuserdas()
    {
        $this->db->order_by('last', 'desc');
        $this->db->limit(8);
        return $this->db->get("db_user")->result();
    }

    //=========================================== GET SISWA =================================
    public function getkls_mts()
    {
        $this->db->order_by('kelas', 'asc');
        return $this->db->get_where('db_kls', array("par" => 'mts'))->result();
    }

    public function getdata($tabel)
    {
        $this->db->order_by('id', 'asc');
        $this->db->where('status', 'AKTIF');
        return $this->db->get($tabel)->result();
    }
    public function getresidu($tabel)
    {
        $this->db->order_by('id', 'asc');
        $this->db->where('status', 'RESIDU');
        return $this->db->get($tabel)->result();
    }
    public function getnonaktif($tabel)
    {
        $this->db->order_by('id', 'asc');
        $this->db->where('status', 'NON AKTIF');
        return $this->db->get($tabel)->result();
    }

    public function updatedata($data, $id, $pilih)
    {
        return $this->db->update($pilih, $data, array('id_enc' => $id));
    }


    // ===========================GET USER ==============================
    public function getuser()
    {
        //$this->db->order_by('last', 'desc');
        return $this->db->get('db_panitia')->result();
    }

    //  ========================== CRUD User ==========================
    public function getuser_pes()
    {
        //$this->db->order_by('last', 'desc');
        return $this->db->get('db_user_pendaftar')->result();
    }

    public function adduser_pes($data)
    {
        return $this->db->insert('db_user_pendaftar', $data);
    }

    public function updateuserpes($data, $id)
    {
        return $this->db->update('db_user_pendaftar', $data, array('id' => $id));
    }

    public function deluser_pes($id)
    {
        return $this->db->delete('db_user_pendaftar', array("id" => $id));
    }

    public function view_peserta()
    {
        $pilih = 'db_' . strtolower($this->uri->segment(3));
        return $this->db->get_where($pilih, ["id_enc" => $this->uri->segment(4)])->row();
    }

    //============================= SETTING ============================
    public function updateset($data, $id)
    {
        return $this->db->update('db_setting', $data, array('id' => $id));
    }

    public function getset()
    {
        // $this->db->select('kelas');
        // return $this->db->get_where('db_setting', ["id" => 1])->result();
        $query = $this->db->query("SELECT jalur as ambil from db_setting");
        $hasil = $query->row();
        return $hasil->ambil;
    }
}

/* End of file ModelName.php */
