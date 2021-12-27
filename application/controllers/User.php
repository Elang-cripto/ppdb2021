<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function index()
	{
		$data['dbinfo'] = $this->admin_model->getinfo();
		$data['dbuser'] = $this->admin_model->getuserdas();
		$this->load->view('user/dasboard',$data);	
	}

	public function form()
	{
		
		if (condition) {
			// code...
		} else {
			// code...
		}
		
		$this->load->view('user/form-add');
	
	}

	public function save_MTS()
	{
		//Fungsi db_mts
		$jml = $this->db->query("SELECT * FROM db_mts")->num_rows();
		$urut = $jml+1;

		$data = $this->input->post();
		$data['id_enc']     	= md5($this->input->post('nik'));
		$data['No_Reg']			= "510-".date("ymd")."-".$urut;
		$this->db->insert('db_mts', $data);

		//Fungsi db_user_pengguna
		$id 			= $this->session->userdata('id');
		$data2['echo']	= "2";
        $this->db->update('db_user_pendaftar', $data2, array('id' => $id));

        //==============================================================================
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Formulir berhasil di kirim'}");
		redirect('user/form/MTS','refresh');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */ 