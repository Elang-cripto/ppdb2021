<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mgm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("ASIA/JAKARTA");
        $this->load->helper(array('form', 'url', 'tgl_indo'));
        if ($this->session->userdata('jabatan') != "mgm") {
            redirect('auth/mgm');
        }
    }

    public function index()
    {
        $data['dbinfo'] = $this->m_ppdb->getinfo();
        $data['dbuser'] = $this->m_ppdb->getuserdas();
        $data['dbuserpan'] = $this->m_ppdb->getuserdaspan();
        $data['content'] = 'mgm/dasboard';

        $this->load->view('mgm/templating', $data);
    }

    public function logout()
    {
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Log Out',text: 'Anda telah metu'}");
        redirect('/');
        $this->session->sess_destroy();
    }

    // ========================== Get Siswa ==========================
    public function data($par)
    {
        $tabel              = 'db_' . $par;
        $data['tabel_cek']  = $par;
        $data['cari']       = $this->db->get_where($tabel, array("status" => 'AKTIF', "mgm" => $this->session->userdata('nama')))->result();
        $data['content']    = 'mgm/dataview';

        $this->load->view('mgm/templating', $data);
    }

    // ========================== View Siswa ==========================
    public function form()
    {
        $pilih                = 'db_setting';
        $id                   = 1;
        $data['cari']         = $this->db->get_where($pilih, ["id" => $id])->row();
        $data['content']    = 'mgm/form-add';

        $this->load->view('mgm/templating', $data);
    }

    public function view()
    {
        $pilih = 'db_' . strtolower($this->uri->segment(3));
        $data['cari']         = $this->m_ppdb->view_peserta();
        $data['content']    = 'mgm/view';

        $this->load->view('mgm/templating', $data);
    }

    // ========================== Tambah Siswa Baru dari Panitia ==========================
    public function save_pan($par)
    {
        // $par 	= $this->session->userdata('par');
        $dbcek      = 'db_' . $par;
        $dariDB     = $this->m_ppdb->get_kode($dbcek);
        $urut       = (int)substr($dariDB, 11, 3);
        $nikqr      = md5($this->input->post('nik'));
        $this->m_ppdb->qrcode($nikqr, $par);

        if ($par == "MTS") {
            $nus = "538";
        } elseif ($par == "MA") {
            $nus = "510";
        } elseif ($par == "SMP") {
            $nus = "209";
        } else {
            $nus = "265";
        }

        //Fungsi db_mts
        date_default_timezone_set("ASIA/JAKARTA");
        $data               = $this->input->post();
        $data['id_enc']     = md5($this->input->post('nik'));
        $data['No_Reg']     = $nus . "-" . date("ymd") . "-" . sprintf('%03d', $urut + 1);
        $data['progres']    = date("Y-m-d H:i:s");
        $data['editor']     = $this->session->userdata('nama');
        $data['jalur']      = $this->m_ppdb->getset();
        $data['status']     = 'RESIDU';
        $data['mgm']        = $this->session->userdata('nama');

        $this->db->insert('db_' . $par, $data);

        //Fungsi db_user_pengguna
        $data2['nik']        = $this->input->post('nik');
        $data2['nama']        = $this->input->post('nama');
        $data2['email']        = $this->input->post('email');
        $data2['telp']        = $this->input->post('telp');
        $data2['par']        = strtoupper($par);
        $data2['status']    = 'NON AKTIF';
        $data2['jabatan']    = 'user';
        $data2['echo']        = '1';
        $data2['last']        = date("Y-m-d H:i:s");
        $this->db->insert('db_user_pendaftar', $data2);

        //==============================================================================

        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Data residu berhasil ditambahkan'}");
        redirect('mgm/data/' . $par, 'refresh');
    }

    // ========================== cetak bukti ==========================
    public function bukti()
    {
        $data['data']       = $this->m_ppdb->view_peserta();
        $data['form']       = 'bukti';
        $data['content']    = 'border';

        $this->load->view('mgm/templating', $data);
    }
}

/* End of file Mgm.php */
