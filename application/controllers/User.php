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
		$this->load->view('user/form');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */ 