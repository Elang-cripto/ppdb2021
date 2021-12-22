<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	    $this->load->model("admin_model");
	}

	public function index()
	{
		
		$this->load->view('login');
	}
	public function proses_log()
	{
		$user = $this->input->post('username');
		$pass = md5($this->input->post('password'));

		date_default_timezone_set("ASIA/JAKARTA");
		$ceklog = $this->cek->login($user,$pass);
		if($ceklog)
		{
			foreach ($ceklog as $row);
			$this->session->set_userdata('id', $row->id );
			$this->session->set_userdata('username', $row->username );
			$this->session->set_userdata('jabatan', $row->jabatan );
			$this->session->set_userdata('nama', $row->nama );
			$this->session->set_userdata('par', $row->par );
			$this->session->set_userdata('kelas', $row->kelas );
			$this->session->set_userdata('foto', $row->foto );
			$this->session->set_userdata('status', $row->status );
			
			if($this->session->userdata('status')=="NON AKTIF")
			{
				$this->session->set_flashdata('pesan', '<a class="btn btn-warning"><i class="fa fa-check"> Username anda belum AKTIF, silahkan hubungi admin</i></a>');
				redirect('page');
				$this->session->sess_destroy();
			}
			elseif($this->session->userdata('jabatan')=="admin")
			{
				$id 			= $this->session->userdata('id');
				$data['last'] 	= date('Y-m-d H:i:s');
				$this->admin_model->updateuser($data,$id);
				redirect('admin');
			}
			elseif ($this->session->userdata('jabatan')=="headmaster") 
			{
				$id 			= $this->session->userdata('id');
				$data['last'] 	= date('Y-m-d H:i:s');
				$this->admin_model->updateuser($data,$id);				
				redirect('headmaster');
			}
			elseif ($this->session->userdata('jabatan')=="guru") 
			{
				$id 			= $this->session->userdata('id');
				$data['last'] 	= date('Y-m-d H:i:s');
				$this->admin_model->updateuser($data,$id);
				redirect('guru');
			}
			elseif ($this->session->userdata('jabatan')=="walikelas") 
			{
				$id 			= $this->session->userdata('id');
				$data['last'] 	= date('Y-m-d H:i:s');
				$this->admin_model->updateuser($data,$id);
				redirect('walikelas');
			}
			elseif ($this->session->userdata('jabatan')=="tatausaha") 
			{
				$id 			= $this->session->userdata('id');
				$data['last'] 	= date('Y-m-d H:i:s');
				$this->admin_model->updateuser($data,$id);
				redirect('tatausaha');
			}
			elseif ($this->session->userdata('jabatan')=="ict") 
			{
				$id 			= $this->session->userdata('id');
				$data['last'] 	= date('Y-m-d H:i:s');
				$this->admin_model->updateuser($data,$id);
				redirect('ict');
			}
			else
			{
				echo "Mohon maaf, Halaman Belum tersedia";
			}
		}
		else
		{
			$this->session->set_flashdata('pesan', '<a class="btn btn-danger"><i class="fa fa-check"> Username / Password Salah</i></a>');
			redirect('page');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('page');
	}

	public function registrasi()
	{
		$set = $this->admin_model->getset2(1);
		if($set->register==1){
			$this->load->view('reg_form');
		}else{
			$this->load->view('close');
		}
		
		//$this->load->view('close');
	}

	public function savereg()
	{
		$data['username'] 	= $this->input->post('username');
		$data['password'] 	= md5($this->input->post('password'));
		$data['nama'] 		= $this->input->post('nama');
		$data['jabatan'] 	= $this->input->post('jabatan');
		$data['par'] 		= $this->input->post('par');
		$data['kelas'] 		= $this->input->post('kelas');
		$data['telp'] 		= $this->input->post('telp');
		$data['email'] 		= $this->input->post('email');
		$data['status'] 	= "NON AKTIF";
		$data['foto'] 		= "none.png";

		$this->admin_model->saveuser($data);
		$this->session->set_flashdata('pesan2', '<a class="btn btn-warning"><i class="fa fa-check"> Akun berhasil didaftarkan</i></a>');
		redirect('../');
	}

}

