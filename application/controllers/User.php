<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'tgl_indo'));
		if ($this->session->userdata('jabatan') != "user") {
			redirect('auth/proses');
		}
	}

	public function index()
	{
		$data['dbinfo'] = $this->admin_model->getinfo();
		$data['dbuser'] = $this->admin_model->getuserdas();
		$this->load->view('user/dasboard', $data);
	}

	public function form()
	{
		$id		= $this->session->userdata('id');
		$nik	= $this->session->userdata('nik');
		$cek 	= $this->db->get_where('db_user_pendaftar', ["id" => $id])->row();
		$prin 	= $cek->echo;

		if ($prin == 0) {
			$this->load->view('user/form-add');
		} else {
<<<<<<< HEAD
			$pilih			= 'db_' . strtolower($this->uri->segment(3));
=======
			$pilih		= 'db_'.strtolower($this->uri->segment(3));
>>>>>>> 39aa736a4bc5ed15a53f61edbb6de37ea2a4b056
			$cari['data'] 	= $this->db->get_where($pilih, ["id_enc" => $this->uri->segment(4)])->row();
			$this->load->view('user/form-lck', $cari);
		}
	}

	public function save_MTS()
	{
		//Fungsi db_mts
		$jml = $this->db->query("SELECT * FROM db_mts")->num_rows();
		$urut = $jml + 1;

		$data 				= $this->input->post();
		$data['id_enc']		= md5($this->session->userdata('nik'));
		$data['No_Reg']		= "538-" . date("ymd") . "-" . sprintf('%03d', $urut);
		$data['nama']		= $this->session->userdata('nama');
		$data['nik']		= $this->session->userdata('nik');
		$data['progres'] 	= date('Y-m-d H:i:s');
		$data['editor']		= $this->session->userdata('nama');
		$this->db->insert('db_mts', $data);

		//Fungsi db_user_pengguna
		$id 			= $this->session->userdata('id');
		$nik 			= $this->session->userdata('nik');
		$data2['echo']	= "1";
		$this->db->update('db_user_pendaftar', $data2, array('id' => $id));

		//==============================================================================
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Formulir berhasil di kirim'}");
		redirect('user/form/MTS/' . md5($nik), 'refresh');
	}
	public function save_MA()
	{
		//Fungsi db_ma
		$jml = $this->db->query("SELECT * FROM db_ma")->num_rows();
		$urut = $jml + 1;

		$data 				= $this->input->post();
		$data['id_enc']		= md5($this->session->userdata('nik'));
		$data['No_Reg']		= "538-" . date("ymd") . "-" . sprintf('%03d', $urut);
		$data['nama']		= $this->session->userdata('nama');
		$data['nik']		= $this->session->userdata('nik');
		$data['progres'] 	= date('Y-m-d H:i:s');
		$data['editor']		= $this->session->userdata('nama');
		$this->db->insert('db_ma', $data);

		//Fungsi db_user_pengguna
		$id 			= $this->session->userdata('id');
		$nik 			= $this->session->userdata('nik');
		$data2['echo']	= "1";
		$this->db->update('db_user_pendaftar', $data2, array('id' => $id));

		//==============================================================================
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Formulir berhasil di kirim'}");
		redirect('user/form/MA/' . md5($nik), 'refresh');
	}
	public function save_SMK()
	{
		//Fungsi db_smk
		$jml = $this->db->query("SELECT * FROM db_smk")->num_rows();
		$urut = $jml + 1;

		$data 				= $this->input->post();
		$data['id_enc']		= md5($this->session->userdata('nik'));
		$data['No_Reg']		= "265-" . date("ymd") . "-" . sprintf('%03d', $urut);
		$data['nama']		= $this->session->userdata('nama');
		$data['nik']		= $this->session->userdata('nik');
		$data['progres'] 	= date('Y-m-d H:i:s');
		$data['editor']		= $this->session->userdata('nama');
		$this->db->insert('db_smk', $data);

		//Fungsi db_user_pengguna
		$id 			= $this->session->userdata('id');
		$nik 			= $this->session->userdata('nik');
		$data2['echo']	= "1";
		$this->db->update('db_user_pendaftar', $data2, array('id' => $id));

		//==============================================================================
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Formulir berhasil di kirim'}");
		redirect('user/form/SMK/' . md5($nik), 'refresh');
	}
	public function save_SMP()
	{
		//Fungsi db_smp
		$jml = $this->db->query("SELECT * FROM db_smp")->num_rows();
		$urut = $jml + 1;

		$data 				= $this->input->post();
		$data['id_enc']		= md5($this->session->userdata('nik'));
		$data['No_Reg']		= "209-" . date("ymd") . "-" . sprintf('%03d', $urut);
		$data['nama']		= $this->session->userdata('nama');
		$data['nik']		= $this->session->userdata('nik');
		$data['progres'] 	= date('Y-m-d H:i:s');
		$data['editor']		= $this->session->userdata('nama');
		$this->db->insert('db_smp', $data);

		//Fungsi db_user_pengguna
		$id 			= $this->session->userdata('id');
		$nik 			= $this->session->userdata('nik');
		$data2['echo']	= "1";
		$this->db->update('db_user_pendaftar', $data2, array('id' => $id));

		//==============================================================================
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Formulir berhasil di kirim'}");
		redirect('user/form/SMP/' . md5($nik), 'refresh');
	}

	public function cetak($form, $param, $id)
	{
		$cari['form'] 	= $form;
		$pilih			= 'db_' . $param;
		$cari['data'] 	= $this->db->get_where($pilih, ["id_enc" => $id])->row();
		$this->load->view('user/cetak', $cari);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
