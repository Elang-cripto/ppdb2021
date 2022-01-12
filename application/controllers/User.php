<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("m_ppdb");
		$this->load->helper(array('form', 'url', 'tgl_indo'));

		if ($this->session->userdata('jabatan') != "user") {
			redirect('auth/proses');
		}
	}

	public function index()
	{
		$data['dbinfo'] = $this->m_ppdb->getinfo();
		$data['dbuser'] = $this->m_ppdb->getuserdas();
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
			$pilih			= 'db_' . strtolower($this->uri->segment(3));
			$cari['data'] 	= $this->db->get_where($pilih, ["id_enc" => $this->uri->segment(4)])->row();

			$this->load->view('user/form-lck', $cari);
		}
	}

	public function save()
	{
		$par 	= $this->session->userdata('par');
		$dbcek	= 'db_' . strtolower($par);
		$dariDB = $this->m_ppdb->get_kode($dbcek);
		$urut 	= (int)substr($dariDB, 11, 3);

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
		$data 				= $this->input->post();
		$data['id_enc']		= md5($this->session->userdata('nik'));
		$data['No_Reg']		= $nus . "-" . date("ymd") . "-" . sprintf('%03d', $urut + 1);
		$data['nama']		= $this->session->userdata('nama');
		$data['nik']		= $this->session->userdata('nik');
		$data['jalur']		= $this->m_ppdb->getset();
		$data['progres'] 	= date("Y-m-d H:i:s");
		$data['editor']		= $this->session->userdata('nama');
		$this->db->insert('db_' . $par, $data);


		//Fungsi db_user_pengguna
		$id 			= $this->session->userdata('id');
		$nik 			= $this->session->userdata('nik');
		$data2['echo']	= "1";
		$this->db->update('db_user_pendaftar', $data2, array('id' => $id));

		//==============================================================================
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Formulir berhasil di kirim'}");
		redirect('user/form/' . $par . '/' . md5($nik), 'refresh');
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
		redirect('/');
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
