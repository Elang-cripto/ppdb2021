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
        return $this->db->get("db_user_pendaftar")->result();
    }
    public function getuserdaspan()
    {
        $this->db->order_by('last', 'desc');
        $this->db->limit(8);
        return $this->db->get("db_panitia")->result();
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

    public function del_pd($tabel, $id)
    {
        return $this->db->delete($tabel, array("id_enc" => $id));
    }

    // ===========================GET USER PANITIA ==============================
    public function getuser()
    {
        //$this->db->order_by('last', 'desc');
        $this->db->where(array("jabatan !=" => 'mgm'));
        return $this->db->get('db_panitia')->result();
    }

    public function getuser_pan($id_enc)
    {
        return $this->db->get_where('db_panitia', ["codex" => $id_enc])->row();
    }

    public function getmgm()
    {
        $this->db->where('jabatan', 'mgm');
        return $this->db->get('db_panitia')->result();
    }

    public function get_kodepan()
    {
        $query = $this->db->query("SELECT MAX(id) as kode from db_panitia");
        $hasil = $query->row();
        return $hasil->kode;
    }

    public function adduser($data)
    {
        return $this->db->insert('db_panitia', $data);
    }

    public function updateuser($data, $id)
    {
        return $this->db->update('db_panitia', $data, array('id' => $id));
    }

    public function deluser($id)
    {
        return $this->db->delete('db_panitia', array("id" => $id));
    }

    //  ========================== CRUD User PESERTA ==========================
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
        return $this->db->get_where($pilih, ["id_enc" => $this->uri->segment(5)])->row();
    }

    //============================= SETTING ============================
    public function updateset($data, $id)
    {
        return $this->db->update('db_setting', $data, array('id' => $id));
    }

    public function getset()
    {
        $query = $this->db->query("SELECT jalur as ambil from db_setting")->row();
        return $query->ambil;
    }
    public function getsett()
    {
        $query = $this->db->query("SELECT jadwal_ver as sett from db_setting")->row();
        return $query->sett;
    }

    //============================= SD / MI ============================
    public function getsdmi()
    {
        // $this->db->order_by('last', 'desc');
        return $this->db->get('db_sdmi')->result();
    }

    public function addsdmi($data)
    {
        return $this->db->insert('db_sdmi', $data);
    }

    public function updatesdmi($data, $id)
    {
        return $this->db->update('db_sdmi', $data, array('id' => $id));
    }

    public function delsdmi($id)
    {
        return $this->db->delete('db_sdmi', array("id" => $id));
    }

    //============================= SMP / MTs ============================
    public function getsmpmts()
    {
        // $this->db->order_by('last', 'desc');
        return $this->db->get('db_smpmts')->result();
    }

    public function addsmpmts($data)
    {
        return $this->db->insert('db_smpmts', $data);
    }

    public function updatesmpmts($data, $id)
    {
        return $this->db->update('db_smpmts', $data, array('id' => $id));
    }

    public function delsmpmts($id)
    {
        return $this->db->delete('db_smpmts', array("id" => $id));
    }

    public function uploadfile()
    {
        $config['upload_path']      = './asset/upload/';
        $config['allowed_types']    = 'jpg|png|jpeg';
        $config['max_size']         = 2048;
        $config['remove_space']     = TRUE;
        $config['overwrite']        = TRUE;
        $config['file_name']        = $this->input->post('username');
        $this->load->library('upload', $config);
    }

    public function qrcode($nikqr, $par)
    {
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './asset/'; //string, the default is application/cache/
        $config['errorlog']     = './asset/'; //string, the default is application/logs/
        $config['imagedir']     = './asset/qr/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name = $nikqr . '.png'; //buat name dari qr code sesuai dengan nim

        $params['data'] = base_url('') . 'validasi/data/' . $par . '/' . $nikqr; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/qr/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
    }

    public function pil_skl($tbl_skl)
    {
        // $hasil = $this->db->query('select * from ' . $tbl_skl);
        // return $hasil;
        return $this->db->get($tbl_skl);
    }

    public function pil_mgm($kirim)
    {
        return $this->db->get_where($kirim, ["jabatan" => 'mgm']);
    }
    //============================= Info ============================
    public function savinfo($data)
    {
        return $this->db->insert('db_info', $data);
    }

    public function get_almt_sdmi()
    {
        // $query = $this->db->query("SELECT jalur as ambil from db_setting")->row();
        // return $query->ambil;

        return $this->db->get_where('db_sdmi', ["id" => 1])->row();
    }
    public function delinfo($id)
    {
        return $this->db->delete('db_info', array("id" => $id));
    }
    //============================= download ============================
    public function get_data($par)
    {
        $db_pilih = "db_" . $par;
        $this->db->where('status', 'AKTIF');
        return $this->db->get($db_pilih)->result();
    }
    public function get_backup($par)
    {
        $db_pilih = "db_" . $par;
        // $this->db->where('status', 'AKTIF');
        return $this->db->get($db_pilih)->result();
    }
    //============================= cek validasi ============================
    public function view_cek($par, $id)
    {
        $pilih = 'db_' . strtolower($par);
        return $this->db->get_where($pilih, ["id_enc" => $id])->row();
    }
}

/* End of file m_ppdb.php */