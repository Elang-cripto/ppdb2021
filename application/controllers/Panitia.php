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

    // ========================== Get Siswa ==========================
    public function datamts()
    {
        $data['dbmts'] = $this->m_ppdb->getmts();
        $data['content'] = 'panitia/datamts';

        $this->load->view('panitia/templating', $data);
    }
    public function datama()
    {
        $data['dbma'] = $this->m_ppdb->getma();
        $data['content'] = 'panitia/datama';

        $this->load->view('panitia/templating', $data);
    }
    public function datasmk()
    {
        $data['dbsmk'] = $this->m_ppdb->getsmk();
        $data['content'] = 'panitia/datasmk';

        $this->load->view('panitia/templating', $data);
    }
    public function datasmp()
    {
        $data['dbsmp'] = $this->m_ppdb->getsmp();
        $data['content'] = 'panitia/datasmp';

        $this->load->view('panitia/templating', $data);
    }

    // ========================== View Siswa ==========================
    public function view()
    {
        $pilih            = 'db_' . strtolower($this->uri->segment(3));
        $data['cari']       = $this->db->get_where($pilih, ["id_enc" => $this->uri->segment(4)])->row();
        $data['content']    = 'panitia/view';

        $this->load->view('panitia/templating', $data);
    }
	
	// ========================== edit Siswa ==========================
    public function edit()
    {
        $pilih                = 'db_' . strtolower($this->uri->segment(3));
        $data['cari']         = $this->db->get_where($pilih, ["id_enc" => $this->uri->segment(4)])->row();
        $data['content']      = 'panitia/edit';

        $this->load->view('panitia/templating', $data);
    }

    // ========================== User Panitia ==========================
    public function user_panitia()
	{
	$data['dbuser'] = $this->m_ppdb->getuser();
        $data['content'] = 'panitia/data_panitia';

	$this->load->view('panitia/templating', $data);
	}

    public function adduser()
	{
	$ceknik     = $this->input->post('nik');
        $jmlnik     = $this->db->get_where('db_panitia', array("nik" => $ceknik))->num_rows();
        
        if ($jmlnik !=0) {
            $this->session->set_flashdata('pesan', "{icon: 'error', title: 'Simpan Gagal',text: 'Data sudah terdaftar sebelumnya'}");
            redirect('panitia/user_panitia', 'refresh');
        } else {
            $data 				    = $this->input->post();
            $data['jabatan'] 		= 'user';
            $data['status'] 		= 'AKTIF';
            $data['echo'] 		    = '0';
            $data['last'] 	        = date("Y-m-d H:i:s");

            $this->m_ppdb->adduser($data);
            $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: 'Tambah data berhasil'}");
            redirect('panitia/user_panitia', 'refresh');
        }
	}

    public function edituser()
	{
        $data 				    = $this->input->post();
		$id 					= $this->input->post('id');
		$data['jabatan'] 		= 'user';
        $data['last'] 	        = date("Y-m-d H:i:s");

		$this->m_ppdb->updateuserpes($data, $id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: 'Edit data berhasil'}");
		redirect('panitia/user_panitia', 'refresh');
	}

    public function deluser($id)
	{
		$this->m_ppdb->deluser_pes($id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'Data telah di hapus'}");
		redirect('panitia/user_panitia', 'refresh');
	}

    // ========================== User Peserta ==========================
    public function user_peserta()
	{
		$data['dbuser_pes'] = $this->m_ppdb->getuser_pes();
        $data['content'] = 'panitia/data_peserta';

		$this->load->view('panitia/templating', $data);
	}

    public function adduser_pes()
	{
		$ceknik     = $this->input->post('nik');
        $jmlnik     = $this->db->get_where('db_user_pendaftar', array("nik" => $ceknik))->num_rows();
        
        if ($jmlnik !=0) {
            $this->session->set_flashdata('pesan', "{icon: 'error', title: 'Simpan Gagal',text: 'Data sudah terdaftar sebelumnya'}");
            redirect('panitia/user_peserta', 'refresh');
        } else {
            $data 				    = $this->input->post();
            $data['jabatan'] 		= 'user';
            $data['status'] 		= 'AKTIF';
            $data['echo'] 		    = '0';
            $data['last'] 	        = date("Y-m-d H:i:s");

            $this->m_ppdb->adduser_pes($data);
            $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: 'Tambah data berhasil'}");
            redirect('panitia/user_peserta', 'refresh');
        }
	}

    public function edituser_pes()
	{
        $data 				    = $this->input->post();
		$id 					= $this->input->post('id');
		$data['jabatan'] 		= 'user';
        $data['last'] 	        = date("Y-m-d H:i:s");

		$this->m_ppdb->updateuserpes($data, $id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: 'Edit data berhasil'}");
		redirect('panitia/user_peserta', 'refresh');
	}

    public function deluser_pes($id)
	{
		$this->m_ppdb->deluser_pes($id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'Data telah di hapus'}");
		redirect('panitia/user_peserta', 'refresh');
	}
}

/* End of file Controllername.php */
