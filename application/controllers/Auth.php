<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_ppdb");
        $this->load->library('form_validation');
        date_default_timezone_set("ASIA/JAKARTA");
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
            $this->session->set_userdata('echo', $row->echo);

            if ($this->session->userdata('status') != "AKTIF") {
                $this->session->set_flashdata('pesan', "{icon: 'error', title: 'Akun Belum aktif',text: 'Silahkan Hubungi admin'}");
                redirect('auth');
                $this->session->sess_destroy();
            } elseif ($this->session->userdata('par') == '0') {
                $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Selamat Datang',text: 'Silahkan mengisi Formulir yang telah disediakan'}");
                $tabel          = "db_user_pendaftar";
                $this->m_ppdb->update_last($tabel);
                redirect('user');
            } else {
                $tabel          = "db_user_pendaftar";
                $this->m_ppdb->update_last($tabel);
                redirect('user');
            }
        } else {
            $this->session->set_flashdata('pesan', "{icon: 'error', title: 'Login Gagal',text: 'Kesalahan Username/Password yang anda masukkan'}");
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
                $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Berhasil registrasi',text: 'Aktifasi akun dengan menghubungi admin'}");
                redirect('auth');
            } else {
                $this->load->view('auth/registration');
                redirect('auth/registration');
            }
        } else {
            $this->load->view('auth/registration');
            $this->session->set_flashdata('pesan', "{icon: 'error', title: 'Data Ganda',text: 'Data anda telah terdaftar sebelumnya, silahkan melakukan LogIn'}");
            redirect('auth/registration');
        }
    }

    public function registration()
    {
        $this->load->view('auth/registration');
    }

    public function admin()
    {
        $this->load->view('admin/login');
    }

    public function cek_admin()
    {
        $username   = md5($this->input->post('username'));
        $password   = md5($this->input->post('password'));
        $ceklog     = $this->cek->admin($username, $password);

        if ($ceklog) {
            foreach ($ceklog as $row);
            $this->session->set_userdata('id', $row->id);
            $this->session->set_userdata('codex', $row->codex);
            $this->session->set_userdata('nama', $row->nama);
            $this->session->set_userdata('username', $row->username);
            $this->session->set_userdata('jabatan', $row->jabatan);
            $this->session->set_userdata('status', $row->status);
            $this->session->set_userdata('last', $row->last);

            $tabel  = "db_panitia";
            $nama   = 'Hai ' . $this->session->userdata('nama') . ', Anda log in sebagai ' . $this->session->userdata('jabatan');

            if ($this->session->userdata('status') != "1") {
                $this->session->set_flashdata('pesan', "{icon: 'error', title: 'Akun Anda Telah Di Suspend',text: 'Silahkan Hubungi admin'}");
                redirect('auth/admin');
                $this->session->sess_destroy();
            } elseif ($this->session->userdata('jabatan') == "admin") {
                $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Selamat Datang',text: '$nama'}");
                $this->m_ppdb->update_last($tabel);
                redirect('admin');
            } elseif ($this->session->userdata('jabatan') == "panitia") {
                $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Selamat Datang',text: '$nama'}");
                $this->m_ppdb->update_last($tabel);
                redirect('panitia');
            } elseif ($this->session->userdata('jabatan') == "mgm") {
                $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Selamat Datang',text: '$nama'}");
                $this->m_ppdb->update_last($tabel);
                redirect('mgm');
            } else {
                $this->session->set_flashdata('pesan', "{icon: 'error', title: 'Mohon Maaf',text: 'Terjadi Kesalahan Setting akun'}");
                redirect('auth/admin');
            }
        } else {
            $this->session->set_flashdata('pesan', "{icon: 'error', title: 'Maaf!',text: 'Username atau Password Salah'}");
            redirect('auth/admin');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}
