<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('auth/login');
    }

    public function proses()
    {
        $email  = $this->input->post('email');
        $telp   = $this->input->post('password');
        $ceklog = $this->cek->login($email, $telp);

        if ($ceklog) {
            foreach ($ceklog as $row);
            $this->session->set_userdata('id', $row->id);
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('telp', $row->telp);
            $this->session->set_userdata('nama', $row->nama);
            $this->session->set_userdata('par', $row->par);
            $this->session->set_userdata('nik', $row->nik);
            $this->session->set_userdata('status', $row->status);
            $this->session->set_userdata('jabatan', $row->jabatan);

            if ($this->session->userdata('status') == "NON AKTIF") {
                $this->session->set_flashdata('nonaktif', 'Akun anda belum di aktif, silahkan menghubungi panitia');
                redirect('auth');
                $this->session->sess_destroy();
            } elseif ($this->session->userdata('par') == "MTS") {
                $this->session->set_flashdata('berhasil', 'Berhasil login');
                redirect('user/mts');
            } elseif ($this->session->userdata('par') == "MA") {
                $this->session->set_flashdata('berhasil', 'Berhasil login');
                redirect('user/ma');
            } elseif ($this->session->userdata('par') == "SMK") {
                $this->session->set_flashdata('berhasil', 'Berhasil login');
                redirect('user/smk');
            } elseif ($this->session->userdata('par') == "SMP") {
                $this->session->set_flashdata('berhasil', 'Berhasil login');
                redirect('user/smp');
            } else {
                echo "Mohon maaf, Halaman Belum tersedia";
            }
        } else {
            $this->session->set_flashdata('gagal', 'Username/Password Salah');
            redirect('auth');
        }
    }

    public function register()
    {
        $ceknik     = $this->input->post('nik');
        $jmlnik     = $this->db->get_where('db_user_pendaftar', array("nik" => $ceknik))->num_rows();

        if ($jmlnik == 0) {
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->input->post();
                $data['status']     = "NON AKTIF";
                $data['jabatan']    = "user";
                $data['echo']       = 0;

                $this->db->insert('db_user_pendaftar', $data);
                $this->session->set_flashdata('sukses', 'Berhasil registrasi, Silahkan Login!');
                redirect('auth');
            } else {
                $this->load->view('auth/registration');
                redirect('auth/registration');
            }
        } else {
            $this->load->view('auth/registration');
            $this->session->set_flashdata('error', 'Data anda telah terdaftar sebelumnya, silahkan melakukan LogIn');
            redirect('auth/registration');
        }
    }

    public function registration()
    {
        $this->load->view('auth/registration');
    }

    public function panitia()
    {
        $this->load->view('panitia/login');
    }

    public function cek_panitia()
    {
        $username  = $this->input->post('username');
        $password   = $this->input->post('password');
        $ceklog = $this->cek->panitia($username, $password);

        if ($ceklog) {
            foreach ($ceklog as $row);
            $this->session->set_userdata('id', $row->id);
            $this->session->set_userdata('codex', $row->codex);
            $this->session->set_userdata('nama', $row->nama);
            $this->session->set_userdata('username', $row->username);
            $this->session->set_userdata('jabatan', $row->jabatan);
            $this->session->set_userdata('last', $row->last);

            $nama = 'Anda log in sebagai ' . $this->session->userdata('nama');
            $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Selamat Datang',text: '$nama'}");
            redirect('panitia');
        } else {
            $this->session->set_flashdata('pesan', "{icon: 'error', title: 'Maaf!',text: 'Username atau Password Salah'}");
            redirect('auth/panitia');
        }
    }
}
