<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Panitia extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("ASIA/JAKARTA");
        $this->load->helper(array('form', 'url', 'tgl_indo'));
        if ($this->session->userdata('jabatan') != "panitia") {
            redirect('auth/panitia');
        }
    }

    public function index()
    {
        $data['dbinfo'] = $this->m_ppdb->getinfo();
        $data['dbuser'] = $this->m_ppdb->getuserdas();
        $data['content'] = 'panitia/dasboard';

        $this->load->view('panitia/templating', $data);
    }

    public function jumlah()
	{
		$data['dbklsmts'] = $this->m_ppdb->getkls_mts();
		// $data['dbklsma'] = $this->admin_model->getkls_ma();
		// $data['dbklssmp'] = $this->admin_model->getkls_smp();
		// $data['dbklssmk'] = $this->admin_model->getkls_smk();
        $data['content'] = 'panitia/jumlah';

        $this->load->view('panitia/templating', $data);
	}

    public function logout()
    {
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Log Out',text: 'Anda telah metu'}");
        redirect('auth/panitia');
        $this->session->sess_destroy();
    }

    public function datamts()
	{
		$data['dbmts'] = $this->m_ppdb->getmts();
        $data['content'] = 'panitia/datamts';

		$this->load->view('panitia/templating', $data);
	}

    public function user_panitia()
	{
		$data['dbuser'] = $this->m_ppdb->getuser();
        $data['content'] = 'panitia/data_panitia';

		$this->load->view('panitia/templating', $data);
	}

}

/* End of file Controllername.php */
