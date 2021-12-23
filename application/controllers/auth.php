<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
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
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $telp = $this->input->post('telp');

        $ceklog = $this->cek->login($email, $telp);

        if ($ceklog) {
            foreach ($ceklog as $row);
            $this->session->set_userdata('id', $row->id);
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('telp', $row->telp);
            $this->session->set_userdata('nama', $row->nama);
            $this->session->set_userdata('foto', $row->foto);
            $this->session->set_userdata('status', $row->status);

            if ($this->session->userdata('status') == "NON AKTIF") {
                $this->session->set_flashdata('pesan', '<a class="btn btn-warning"><i class="fa fa-check"> Username anda belum AKTIF, silahkan hubungi admin</i></a>');
                redirect('auth');
                $this->session->sess_destroy();
                // } elseif ($this->session->userdata('jabatan') == "admin") {
                //     $id             = $this->session->userdata('id');
                //     $data['last']     = date('Y-m-d H:i:s');
                //     $this->admin_model->updateuser($data, $id);
                //     redirect('admin');
            } else {
                echo "Mohon maaf, Halaman Belum tersedia";
            }
        } else {
            $this->session->set_flashdata('pesan', '<a class="btn btn-danger"><i class="fa fa-check"> Username / Password Salah</i></a>');
            redirect('page');
        }
        // $user = $this->db->get_where('db_mts', ['email' => $email])->row_array();
        // if ($user['status'] == 'NON AKTIF') {
        //     if (password_verify($email, $user['email'])) {
        //     }
        // } else {
        //     $this->session->set_flashdata(
        //         'massage',
        //         '<div class="alert  alert-danger" role="alert">Email Tidak Ada !</div>'
        //     );
        //     redirect('auth');
        // }
    }

    public function register()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data = $this->input->post();
            $data['status']     = "NON AKTIF";

            $this->db->insert('db_user_pendaftar', $data);


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
