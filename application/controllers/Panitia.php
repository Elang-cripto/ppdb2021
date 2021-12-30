<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panitia extends CI_Controller {

    public function __construct() {
        if($this->session->userdata('jabatan')=="panitia")
		{
			redirect('auth/proses');
		}
    }

    public function index()
    {
        $this->load->view('login');
    }

}

/* End of file Controllername.php */
