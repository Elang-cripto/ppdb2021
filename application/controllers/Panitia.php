<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Panitia extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('jabatan') != "panitia") {
            redirect('auth/panitia');
        }
    }

    public function index()
    {
        $data['dbinfo'] = $this->admin_model->getinfo();
        $data['dbuser'] = $this->admin_model->getuserdas();
        $this->load->view('panitia/dasboard', $data);
    }

    public function logout()
    {
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Log Out',text: 'Anda telah metu'}");
        redirect('auth/panitia');
        $this->session->sess_destroy();
    }
}

/* End of file Controllername.php */
