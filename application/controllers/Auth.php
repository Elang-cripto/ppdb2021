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
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('telp', 'Telepon', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $this->login();
        }
    }

    public function proses()
    {
        $email = $this->input->post('email');
        $telp = $this->input->post('password');
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
                redirect('user');
	        } elseif ($this->session->userdata('par') == "MA") {
                $this->session->set_flashdata('berhasil', 'Berhasil login');
                redirect('user');
            } elseif ($this->session->userdata('par') == "SMK") {
                $this->session->set_flashdata('berhasil', 'Berhasil login');
                redirect('user');
            } elseif ($this->session->userdata('par') == "SMP") {
                $this->session->set_flashdata('berhasil', 'Berhasil login');
                redirect('user');
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
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data = $this->input->post();
            $data['status']     = "NON AKTIF";
            $data['jabatan']     = "user";
            $data['echo']       = 0;

            $this->db->insert('db_user_pendaftar', $data);
            $this->session->set_flashdata('sukses', 'Berhasil registrasi, Silahkan Login!');

            redirect('auth');
        } else {
            $this->load->view('auth/registration');
        }
    }

    public function registration()
    {
        $this->load->view('auth/registration');
    }

}
