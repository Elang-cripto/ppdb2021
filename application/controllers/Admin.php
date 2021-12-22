<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	private $filename = "import_data";

	public function __construct()
	{
		parent::__construct();
	    $this->load->model("admin_model");
        $this->load->library('form_validation');
        $this->load->helper(array('form','url','tgl_indo'));
		if($this->session->userdata('jabatan')!="admin")
		{
			redirect('page/proses_log');
		}
	}
	
	public function index()
	{
		$data['dbinfo'] = $this->admin_model->getinfo();
		$data['dbuser'] = $this->admin_model->getuserdas();
		$this->load->view('admin/dasboard',$data);
	}

	public function saveinfo()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['tanggal'] 	= date("Y/m/d");
	 	$data['waktu'] 		= date("h:i:s");
		$data['user'] 		= $this->input->post('user');
		$data['jabatan'] 	= $this->input->post('jabatan');
		$data['status'] 	= $this->input->post('status');

		$this->admin_model->savinfo($data);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Info berhasil di update'}");
		redirect('admin');
	}

// =====================================================================================================================================

	public function perangkat()
	{
		$data['dblink'] = $this->admin_model->getlink();
		$data['dblink_a'] = $this->admin_model->getlink_a();
		$this->load->view('admin/perangkat',$data);
	}
//==============================================================

	// public function skm_mts($id)
	// {
	// 	$data['set'] = $this->admin_model->getset(1);
	// 	$data['baca'] = $this->admin_model->getByIdmts($id);
	// 	$this->load->view('border',$data);
	// }

	// public function skm_ma($id)
	// {
	// 	$data['set'] = $this->admin_model->getset(1);
	// 	$data['baca'] = $this->admin_model->getByIdma($id);
	// 	$this->load->view('border',$data);
	// }

	// public function skm_smp($id)
	// {
	// 	$data['set'] = $this->admin_model->getset(1);
	// 	$data['baca'] = $this->admin_model->getByIdsmp($id);
	// 	$this->load->view('border',$data);
	// }

	// public function skm_smk($id)
	// {
	// 	$data['set'] = $this->admin_model->getset(1);
	// 	$data['baca'] = $this->admin_model->getByIdsmk($id);
	// 	$this->load->view('border',$data);
	// }

//==============================================================

	public function frame($form,$param,$id)
	{
		$data["form"] = $form;
		$data['set'] = $this->admin_model->getset2();
		$data['baca'] = $this->admin_model->getById($param,$id);
		$this->load->view('border',$data);
	}

//==============================================================

	public function jumlah()
	{
		$data['dbklsmts'] = $this->admin_model->getkls_mts();
		$data['dbklsma'] = $this->admin_model->getkls_ma();
		$data['dbklssmp'] = $this->admin_model->getkls_smp();
		$data['dbklssmk'] = $this->admin_model->getkls_smk();
		$this->load->view('admin/jumlah',$data);
	}
//-------------------------------------------------------------

	public function master()
	{
		$this->load->view('admin/master');
	}

//-------------------------------------------------------------
	public function user()
	{
		$data['dbuser'] = $this->admin_model->getuser();
		$this->load->view('admin/user',$data);
	}

	public function edituser($id)
	{
		$data['cats'] 	= $this->admin_model->getkls();
		$data['dbuser'] = $this->admin_model->getByIduser($id);
		$this->load->view('admin/user-edit',$data);
	}

	public function adduser()
	{
		$data['cats'] 	= $this->admin_model->getkls();
		$this->load->view('admin/user-form',$data);
	}

	public function saveuser()
	{
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
		if ($this->form_validation->run()==true)
        {
			$config['upload_path']          = './asset/dist/img/';
			$config['allowed_types'] 		= 'jpg|png|jpeg';
			$config['max_size']				= 2048;
			$config['remove_space'] 		= TRUE;
			$config['overwrite'] 			= TRUE;
			$config['file_name'] 			= $this->input->post('username');
			$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('foto'))
				{
					// $error = array('error' => $this->upload->display_errors());
					$ambil['error'] = array('error' => $this->upload->display_errors());
					$this->load->view('admin/user-form',$ambil);
					// $this->load->view('user-form', $error);
				}
				 	$data['username'] 	= $this->input->post('username');
					$data['password'] 	= md5($this->input->post('password'));
					$data['nama'] 		= $this->input->post('nama');
					$data['jabatan'] 	= $this->input->post('jabatan');
					$data['kelas'] 		= $this->input->post('kelas');
					$data['par'] 		= $this->input->post('lembaga');
					$data['telp'] 		= $this->input->post('telp');
					$data['email'] 		= $this->input->post('email');
					$data['status'] 	= "AKTIF";

					if ($_FILES['foto']['name']!=""){
						$data['foto'] = $this->input->post('username').$this->upload->data('file_ext');
					} else {
						$data['foto'] = "none.png";
					}	

					$this->admin_model->saveuser($data);
					$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'User Baru ditambahkan'}");
					$ambil['dbuser'] = $this->admin_model->getuser();
					redirect('admin/user',$ambil);
					// $ambil['dbuser'] = $this->admin_model->getuser();
					// $this->load->view('admin/user',$ambil);
		}
		else
		{
			$ambil['dbuser'] = $this->admin_model->getuser();
			$this->load->view('admin/user',$ambil);
		}
	}
//======================================================================================
	public function updateprofil()
	{
		$this->form_validation->set_rules('username','username','required');
		if ($this->form_validation->run()==true)
        {		

			$config['upload_path']          = './asset/dist/img/';
			$config['allowed_types'] 		= 'jpg|png|jpeg|gif';
			$config['max_size']				= 2048;
			$config['remove_space'] 		= TRUE;
			$config['overwrite'] 			= TRUE;
			$config['file_name'] 			= $this->input->post('username');
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('foto'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('admin/user-edit', $error);
			}
			 	$id 				= $this->input->post('id');
				$data['nama'] 		= $this->input->post('nama');
				$data['jabatan'] 	= $this->input->post('jabatan');
				$data['kelas'] 		= $this->input->post('kelas');
				$data['par'] 		= $this->input->post('par');
				$data['telp'] 		= $this->input->post('telp');
				$data['email'] 		= $this->input->post('email');
				$data['status'] 	= $this->input->post('status');
				
				if (!empty($_FILES['foto']['name'])){
					$data['foto'] = $this->input->post('username').$this->upload->data('file_ext');
				} else {
					$data['foto'] = $this->input->post('foto_old');
				}

				$this->admin_model->updateuser($data,$id);
				$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Update',text: 'User ".$this->input->post('nama')." diperbarui'}");
				redirect('admin/user');
				}
		else
		{
			$id = $this->input->post('id');
			$data['dbuser'] = $this->admin_model->getByIduser($id);
			$this->load->view('admin/user-edit',$data);
		}
	}
//===============================================================================================
	public function updateuspass()
	{
	 	$id 				= $this->input->post('id');
	 	$data['username'] 	= $this->input->post('username');
	 	$data['password'] 	= md5($this->input->post('password'));

		$this->admin_model->updateuser($data,$id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Update',text: 'User ".$this->input->post('nama')." diperbarui'}");
		redirect('admin/user');

	}

//-------------------------------------------------------------
	public function dataklsmts($kelas)
	{
		$data['dbkls'] = $this->admin_model->fil_mts($kelas);
		$this->load->view('admin/datakls_mts',$data);
	}

	public function dataklsma($kelas)
	{
		$data['dbkls'] = $this->admin_model->fil_ma($kelas);
		$this->load->view('admin/datakls_ma',$data);
	}

	public function dataklssmp($kelas)
	{
		$data['dbkls'] = $this->admin_model->fil_smp($kelas);
		$this->load->view('admin/datakls_smp',$data);
	}

	public function dataklssmk($kelas)
	{
		$data['dbkls'] = $this->admin_model->fil_smk($kelas);
		$this->load->view('admin/datakls_smk',$data);
	}

//-------------------------------------------------------------
	
	public function vervalmts()
	{
		$data['dbmts'] = $this->admin_model->getvalid_mts();
		$this->load->view('admin/verval_mts',$data);
	}

	public function vervalma()
	{
		$data['dbma'] = $this->admin_model->getvalid_ma();
		$this->load->view('admin/verval_ma',$data);
	}

	public function vervalsmp()
	{
		$data['dbsmp'] = $this->admin_model->getvalid_smp();
		$this->load->view('admin/verval_smp',$data);
	}

	public function vervalsmk()
	{
		$data['dbsmk'] = $this->admin_model->getvalid_smk();
		$this->load->view('admin/verval_smk',$data);
	}

//-------------------------------------------------------------
	
	public function datamts()
	{
		$data['dbmts'] = $this->admin_model->getmts();
		$this->load->view('admin/datamts',$data);
	}

	public function datama()
	{
		$data['dbma'] = $this->admin_model->getma();
		$this->load->view('admin/datama',$data);
	}

	public function datasmp()
	{
		$data['dbsmp'] = $this->admin_model->getsmp();
		$this->load->view('admin/datasmp',$data);
	}

	public function datasmk()
	{
		$data['dbsmk'] = $this->admin_model->getsmk();
		$this->load->view('admin/datasmk',$data);
	}

//-------------------------------------------------------------
	public function dataoutmts()
	{
		$data['dbmts'] = $this->admin_model->getmts_out();
		$this->load->view('admin/outdatamts',$data);
	}

	public function dataoutma()
	{
		$data['dbma'] = $this->admin_model->getma_out();
		$this->load->view('admin/outdatama',$data);
	}

	public function dataoutsmp()
	{
		$data['dbsmp'] = $this->admin_model->getsmp_out();
		$this->load->view('admin/outdatasmp',$data);
	}

	public function dataoutsmk()
	{
		$data['dbsmk'] = $this->admin_model->getsmk_out();
		$this->load->view('admin/outdatasmk',$data);
	}

//-------------------------------------------------------------
	public function klsmts()
	{
		$data['cats'] = $this->admin_model->getuser();
		$data['dbkls'] = $this->admin_model->getkls_mts();
		$this->load->view('admin/klsmts',$data);
	}

	public function klsma()
	{
		$data['cats'] = $this->admin_model->getuser();
		$data['dbkls'] = $this->admin_model->getkls_ma();
		$this->load->view('admin/klsma',$data);
	}

	public function klssmp()
	{
		$data['cats'] = $this->admin_model->getuser();
		$data['dbkls'] = $this->admin_model->getkls_smp();
		$this->load->view('admin/klssmp',$data);
	}

	public function klssmk()
	{
		$data['cats'] = $this->admin_model->getuser();
		$data['dbkls'] = $this->admin_model->getkls_smk();
		$this->load->view('admin/klssmk',$data);
	}

//-------------------------------------------------------------
	public function formmts()
	{
		$data['cats'] = $this->admin_model->getkls_mts();
		$this->load->view('form-mts',$data);
	}

	public function formma()
	{
		$data['cats'] = $this->admin_model->getkls_ma();
		$this->load->view('form-ma',$data);
	}

	public function formsmp()
	{
		$data['cats'] = $this->admin_model->getkls_smp();
		$this->load->view('form-smp',$data);
	}

	public function formsmk()
	{
		$data['cats'] = $this->admin_model->getkls_smk();
		$this->load->view('form-smk',$data);
	}

//-------------------------------------------------------------
	public function profil($id)
	{
		$data['dbuser'] = $this->admin_model->profiler($id);
		$this->load->view('admin/profill',$data);
	}

//-------------------------------------------------------------
	public	function viewmts($id)
	{
		$data['dbmts'] = $this->admin_model->getByIdmts($id);
		$this->load->view('admin/view-mts',$data);
	}

	public	function viewma($id)
	{
		$data['dbma'] = $this->admin_model->getByIdma($id);
		$this->load->view('admin/view-ma',$data);
	}

	public	function viewsmp($id)
	{
		$data['dbsmp'] = $this->admin_model->getByIdsmp($id);
		$this->load->view('admin/view-smp',$data);
	}

	public	function viewsmk($id)
	{
		$data['dbsmk'] = $this->admin_model->getByIdsmk($id);
		$this->load->view('admin/view-smk',$data);
	}

//-------------------------------------------------------------
	public function editmts($id)
	{
		$data['dbmts'] = $this->admin_model->getByIdmts($id);
		$data['cats'] = $this->admin_model->getkls_mts();
		$this->load->view('admin/edit-mts',$data);
	}

	public function editsmp($id)
	{
		$data['dbsmp'] = $this->admin_model->getByIdsmp($id);
		$data['cats'] = $this->admin_model->getkls_smp();
		$this->load->view('admin/edit-smp',$data);
	}

	public function editma($id)
	{
		$data['dbma'] = $this->admin_model->getByIdma($id);
		$data['cats'] = $this->admin_model->getkls_ma();
		$this->load->view('admin/edit-ma',$data);
	}

	public function editsmk($id)
	{
		$data['dbsmk'] = $this->admin_model->getByIdsmk($id);
		$data['cats'] = $this->admin_model->getkls_smk();
		$this->load->view('admin/edit-smk',$data);
	}

//====================================================================

	public function savelink()
	{
	 	$data['file'] 			= $this->input->post('file');
	 	$data['update'] 		= $this->input->post('update');
		$data['link'] 			= $this->input->post('link');

		$this->admin_model->savlink($data);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Link baru berhasil ditambahkan'}");
			
		redirect('admin/perangkat','refresh');
			
	}
	public function editlink()
	{
		$id 					= $this->input->post('id');
	 	$data['file'] 			= $this->input->post('file');
	 	$data['update'] 		= $this->input->post('update');
		$data['link'] 			= $this->input->post('link');
				
		$this->admin_model->updatelink($data,$id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Berhasil diupdate',}");
		redirect('admin/perangkat','refresh');
	}

	public function del_link($id)
	{
		$this->admin_model->dellink($id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'kelas telah di hapus'}");
		redirect('admin/perangkat','refresh');
	}

//====================================================================

public function savelinka()
{
	 $data['file'] 			= $this->input->post('file');
	 $data['update'] 		= $this->input->post('update');
	$data['link'] 			= $this->input->post('link');

	$this->admin_model->savlinka($data);
	$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Link baru berhasil ditambahkan'}");
		
	redirect('admin/perangkat','refresh');
		
}
public function editlinka()
{
	$id 					= $this->input->post('id');
	 $data['file'] 			= $this->input->post('file');
	 $data['update'] 		= $this->input->post('update');
	$data['link'] 			= $this->input->post('link');
			
	$this->admin_model->updatelinka($data,$id);
	$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Berhasil diupdate',}");
	redirect('admin/perangkat','refresh');
}

public function del_linka($id)
{
	$this->admin_model->dellinka($id);
	$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'kelas telah di hapus'}");
	redirect('admin/perangkat','refresh');
}

//-------------------------------------------------------------

	public function savekls()
	{
	 	$data['kelas'] 			= $this->input->post('nama_kelas');
	 	$data['par'] 			= $this->input->post('paralel');
		$data['wali_kelas'] 	= $this->input->post('wali_kelas');

		$this->admin_model->savkls($data);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Kelas baru berhasil ditambah'}");
			if( $data['par'] =="mts"){ 
				redirect('admin/klsmts','refresh');
			} else if($data['par']=="smp"){
				redirect('admin/klssmp','refresh');
			} else if($data['par']=="ma"){
				redirect('admin/klsma','refresh');
			} else if($data['par']=="smk"){
				redirect('admin/klssmk','refresh');
			}
	}

	public function editkls()
	{
		$id 					= $this->input->post('id');
	 	$data['kelas'] 			= $this->input->post('nama_kelas');
	 	$data['par'] 			= $this->input->post('paralel');
		$data['wali_kelas'] 	= $this->input->post('wali_kelas');
		$data['validasi'] 		= $this->input->post('validasi');
		$data['keterangan'] 	= $this->input->post('keterangan');
		date_default_timezone_set('Asia/Jakarta');
		$data['lastupdate'] 	= date("Y-m-d H:i:s");

				
		$this->admin_model->updatekls($data,$id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Berhasil diupdate',}");
			if( $data['par'] =="mts"){ 
				redirect('admin/klsmts','refresh');
			} else if($data['par']=="smp"){
				redirect('admin/klssmp','refresh');
			} else if($data['par']=="ma"){
				redirect('admin/klsma','refresh');
			} else if($data['par']=="smk"){
				redirect('admin/klssmk','refresh');
			}
	}

// =====================================================================================================================================

	public function setting()
	{
		$data['set'] = $this->admin_model->getset2();
		$this->load->view('admin/setting',$data);
	}

	public function saveset()
	{
	 	$data['tapel'] 				= $this->input->post('tapel');
	 	$data['semester'] 			= $this->input->post('semester');

		$this->admin_model->savkls($data);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Berhasil disimpan',}");
		redirect('admin/setting');
	}

	public function editset()
	{
	 	$id 				= 1;
	 	$data['tapel'] 		= $this->input->post('tapel');
	 	$data['semester'] 	= $this->input->post('semester');
	 	// $data['register'] 	= $this->input->post('register');

	 	if($this->input->post('register')=='ya'){
	 		$data['register']=1;
	 	}else{
	 		$data['register']=0;
	 	}
				
		$this->admin_model->editset($data,$id);
		if ($this->input->post('register')=='ya') {
			$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Formulir dibuka',text: 'Form register dibuka',}");
		} else {
			$this->session->set_flashdata('pesan', "{icon: 'error', title: 'Formulir ditutup',text: 'Form register ditutup',}");
		}
		redirect('admin/setting');
	}

	public function set_pengumuman()
	{
		$id 					= 1;
		$data['pengumuman'] 	= $this->input->post('pengumuman');
				
		$this->admin_model->editset($data,$id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Pengumuman diperbarui'}");
		
		redirect('admin/setting');
	}


// =====================================================================================================================================

	function del_user($id)
	{
		$this->admin_model->deluser($id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'user telah di hapus'}");
		redirect('admin/user');
	}

	function del_kls($id)
	{
		$this->admin_model->delkls($id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'kelas telah di hapus'}");
		redirect('admin/klsmts');
	}


	function del_info($id)
	{
		$this->admin_model->delinfo($id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'Info telah di hapus'}");
		redirect('admin');
	}

// =====================================================================================================================================

	public function upload($par)
	{
		$this->load->view('admin/upload-'.$par);
	}

	// public function uploadma()
	// {
	// 	$this->load->view('admin/upload-ma');
	// }

	// public function uploadsmp()
	// {
	// 	$this->load->view('admin/upload-smp');
	// }

	// public function uploadsmk()
	// {
	// 	$this->load->view('admin/upload-smk');
	// }

// =====================================================================================================================================

	public function updatemts()
	{
  		$this->form_validation->set_rules('nis','nis','required');
		$this->form_validation->set_rules('nama','nama','required');
		if ($this->form_validation->run()==true)
        {
			$config['upload_path']          = './asset/upload/';
			$config['allowed_types'] 		= 'jpg|png|jpeg|gif';
			$config['max_size']				= 2048;
			$config['remove_space'] 		= TRUE;
			$config['overwrite'] 			= TRUE;
			$config['file_name'] 			= $this->input->post('nis');
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('foto'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('admin/edit-mts', $error);
			}
			 	$id = $this->input->post('id');
			 	$data['nis'] = $this->input->post('nis');
			 	$data['nisn'] = $this->input->post('nisn');
				$data['nama'] = $this->input->post('nama');
				$data['jk'] = $this->input->post('jk');
				$data['tmp_lahir'] = $this->input->post('tmp_lahir');
				$data['tgl_lahir'] = $this->input->post('tgl_lahir');
				$data['nik'] = $this->input->post('nik');
				$data['agama'] = $this->input->post('agama');
				$data['alamat'] = $this->input->post('alamat');
				$data['rt'] = $this->input->post('rt');
				$data['rw'] = $this->input->post('rw');
				$data['dusun'] = $this->input->post('dusun');
				$data['kelurahan'] = $this->input->post('kelurahan');
				$data['kecamatan'] = $this->input->post('kecamatan');
				$data['kabupaten'] = $this->input->post('kabupaten');
				$data['propinsi'] = $this->input->post('propinsi');
				$data['sts_tinggal'] = $this->input->post('sts_tinggal');
				$data['jns_tinggal'] = $this->input->post('jns_tinggal');
				$data['alat_trans'] = $this->input->post('alat_trans');
				$data['telp'] = $this->input->post('telp');
				$data['email'] = $this->input->post('email');
				$data['anak_ke'] = $this->input->post('anak_ke');
				$data['jml_sdr'] = $this->input->post('jml_sdr');
				$data['no_kk'] = $this->input->post('no_kk');
				$data['nm_ayh'] = $this->input->post('nm_ayh');
				$data['tlahir_ayh'] = $this->input->post('tlahir_ayh');
				$data['lahir_ayh'] = $this->input->post('lahir_ayh');
				$data['pend_ayh'] = $this->input->post('pend_ayh');
				$data['kerja_ayh'] = $this->input->post('kerja_ayh');
				$data['hasil_ayh'] = $this->input->post('hasil_ayh');
				$data['nik_ayh'] = $this->input->post('nik_ayh');
				$data['nm_ibu'] = $this->input->post('nm_ibu');
				$data['tlahir_ibu'] = $this->input->post('tlahir_ibu');
				$data['lahir_ibu'] = $this->input->post('lahir_ibu');
				$data['pend_ibu'] = $this->input->post('pend_ibu');
				$data['kerja_ibu'] = $this->input->post('kerja_ibu');
				$data['hasil_ibu'] = $this->input->post('hasil_ibu');
				$data['nik_ibu'] = $this->input->post('nik_ibu');
				$data['nm_wl'] = $this->input->post('nm_wl');
				$data['tlahir_wl'] = $this->input->post('tlahir_wl');
				$data['lahir_wl'] = $this->input->post('lahir_wl');
				$data['pend_wl'] = $this->input->post('pend_wl');
				$data['kerja_wl'] = $this->input->post('kerja_wl');
				$data['hasil_wl'] = $this->input->post('hasil_wl');
				$data['nik_wl'] = $this->input->post('nik_wl');
				$data['no_un'] = $this->input->post('no_un');
				$data['no_skhun'] = $this->input->post('no_skhun');
				$data['no_ijazah'] = $this->input->post('no_ijazah');
				$data['no_kps'] = $this->input->post('no_kps');
				$data['no_kip'] = $this->input->post('no_kip');
				$data['no_kis'] = $this->input->post('no_kis');
				$data['no_pkh'] = $this->input->post('no_pkh');
				$data['beasiswa'] = $this->input->post('beasiswa');
				$data['skl_asal'] = $this->input->post('skl_asal');
				$data['almt_skl'] = $this->input->post('almt_skl');
				$data['jns_masuk'] = $this->input->post('jns_masuk');
				$data['tgl_masuk'] = $this->input->post('tgl_masuk');
				$data['ket_out'] = $this->input->post('ket_out');
				$data['tgl_out'] = $this->input->post('tgl_out');
				$data['alasan_out'] = $this->input->post('alasan_out');
				$data['nosrt_out'] = $this->input->post('nosrt_out');
				$data['status'] = $this->input->post('status');
				$data['progres'] = $this->input->post('progres');
				$data['editor'] = $this->input->post('editor');
				
				if ($_FILES['foto']['name']!=""){
					$data['foto'] = $this->input->post('nis').$this->upload->data('file_ext');
				} else {
					$data['foto'] = $this->input->post('foto_old');
				}	

				$this->admin_model->updatemts($data,$id);
				$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Update',text: 'data ".$this->input->post('nama')." berhasil di perbarui'}");
				redirect('admin/datamts');
		}
		else
		{
			$id = $this->input->post('id');
			$data['dbmts'] = $this->admin_model->getByIdmts($id);
			$data['cats'] = $this->admin_model->getkls_mts();
			$this->load->view('admin/edit-mts',$data);
		}
	}

	public function updatesmp()
	{
  		$this->form_validation->set_rules('nis','nis','required');
		$this->form_validation->set_rules('nama','nama','required');
		if ($this->form_validation->run()==true)
        {

			$config['upload_path']          = './asset/upload/';
			$config['allowed_types'] 		= 'jpg|png|jpeg|gif';
			$config['max_size']				= 2048;
			$config['remove_space'] 		= TRUE;
			$config['overwrite'] 			= TRUE;
			$config['file_name'] 			= $this->input->post('nis');
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('foto'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('admin/edit-smp', $error);
			}
			 	$id = $this->input->post('id');
			 	$data['nis'] = $this->input->post('nis');
			 	$data['nisn'] = $this->input->post('nisn');
				$data['nama'] = $this->input->post('nama');
				$data['jk'] = $this->input->post('jk');
				$data['tmp_lahir'] = $this->input->post('tmp_lahir');
				$data['tgl_lahir'] = $this->input->post('tgl_lahir');
				$data['nik'] = $this->input->post('nik');
				$data['agama'] = $this->input->post('agama');
				$data['alamat'] = $this->input->post('alamat');
				$data['rt'] = $this->input->post('rt');
				$data['rw'] = $this->input->post('rw');
				$data['dusun'] = $this->input->post('dusun');
				$data['kelurahan'] = $this->input->post('kelurahan');
				$data['kecamatan'] = $this->input->post('kecamatan');
				$data['kabupaten'] = $this->input->post('kabupaten');
				$data['propinsi'] = $this->input->post('propinsi');
				$data['sts_tinggal'] = $this->input->post('sts_tinggal');
				$data['jns_tinggal'] = $this->input->post('jns_tinggal');
				$data['alat_trans'] = $this->input->post('alat_trans');
				$data['telp'] = $this->input->post('telp');
				$data['email'] = $this->input->post('email');
				$data['anak_ke'] = $this->input->post('anak_ke');
				$data['jml_sdr'] = $this->input->post('jml_sdr');
				$data['no_kk'] = $this->input->post('no_kk');
				$data['nm_ayh'] = $this->input->post('nm_ayh');
				$data['tlahir_ayh'] = $this->input->post('tlahir_ayh');
				$data['lahir_ayh'] = $this->input->post('lahir_ayh');
				$data['pend_ayh'] = $this->input->post('pend_ayh');
				$data['kerja_ayh'] = $this->input->post('kerja_ayh');
				$data['hasil_ayh'] = $this->input->post('hasil_ayh');
				$data['nik_ayh'] = $this->input->post('nik_ayh');
				$data['nm_ibu'] = $this->input->post('nm_ibu');
				$data['tlahir_ibu'] = $this->input->post('tlahir_ibu');
				$data['lahir_ibu'] = $this->input->post('lahir_ibu');
				$data['pend_ibu'] = $this->input->post('pend_ibu');
				$data['kerja_ibu'] = $this->input->post('kerja_ibu');
				$data['hasil_ibu'] = $this->input->post('hasil_ibu');
				$data['nik_ibu'] = $this->input->post('nik_ibu');
				$data['nm_wl'] = $this->input->post('nm_wl');
				$data['tlahir_wl'] = $this->input->post('tlahir_wl');
				$data['lahir_wl'] = $this->input->post('lahir_wl');
				$data['pend_wl'] = $this->input->post('pend_wl');
				$data['kerja_wl'] = $this->input->post('kerja_wl');
				$data['hasil_wl'] = $this->input->post('hasil_wl');
				$data['nik_wl'] = $this->input->post('nik_wl');
				$data['no_un'] = $this->input->post('no_un');
				$data['no_skhun'] = $this->input->post('no_skhun');
				$data['no_ijazah'] = $this->input->post('no_ijazah');
				$data['no_kps'] = $this->input->post('no_kps');
				$data['no_kip'] = $this->input->post('no_kip');
				$data['no_kis'] = $this->input->post('no_kis');
				$data['no_pkh'] = $this->input->post('no_pkh');
				$data['beasiswa'] = $this->input->post('beasiswa');
				$data['skl_asal'] = $this->input->post('skl_asal');
				$data['almt_skl'] = $this->input->post('almt_skl');
				$data['jns_masuk'] = $this->input->post('jns_masuk');
				$data['tgl_masuk'] = $this->input->post('tgl_masuk');
				$data['ket_out'] = $this->input->post('ket_out');
				$data['tgl_out'] = $this->input->post('tgl_out');
				$data['alasan_out'] = $this->input->post('alasan_out');
				$data['nosrt_out'] = $this->input->post('nosrt_out');
				$data['status'] = $this->input->post('status');
				$data['progres'] = $this->input->post('progres');
				$data['editor'] = $this->input->post('editor');
				
				if ($_FILES['foto']['name']!=""){
					$data['foto'] = $this->input->post('nis').$this->upload->data('file_ext');
				} else {
					$data['foto'] = $this->input->post('foto_old');
				}	

				$this->admin_model->updatesmp($data,$id);
				$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Update',text: 'data ".$this->input->post('nama')." berhasil di perbarui'}");
				redirect('admin/datasmp');
		}
		else
		{
			$id = $this->input->post('id');
			$data['dbsmp'] = $this->admin_model->getByIdsmp($id);
			$data['cats'] = $this->admin_model->getkls_smp();
			$this->load->view('admin/edit-smp',$data);
		}
	}

	public function updatema()
	{
  		$this->form_validation->set_rules('nis','nis','required');
		$this->form_validation->set_rules('nama','nama','required');
		if ($this->form_validation->run()==true)
        {

			$config['upload_path']          = './asset/upload/';
			$config['allowed_types'] 		= 'jpg|png|jpeg|gif';
			$config['max_size']				= 2048;
			$config['remove_space'] 		= TRUE;
			$config['overwrite'] 			= TRUE;
			$config['file_name'] 			= $this->input->post('nis');
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('foto'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('admin/edit-ma', $error);
			}
			 	$id = $this->input->post('id');
			 	$data['nis'] = $this->input->post('nis');
			 	$data['nisn'] = $this->input->post('nisn');
				$data['nama'] = $this->input->post('nama');
				$data['jk'] = $this->input->post('jk');
				$data['tmp_lahir'] = $this->input->post('tmp_lahir');
				$data['tgl_lahir'] = $this->input->post('tgl_lahir');
				$data['nik'] = $this->input->post('nik');
				$data['agama'] = $this->input->post('agama');
				$data['alamat'] = $this->input->post('alamat');
				$data['rt'] = $this->input->post('rt');
				$data['rw'] = $this->input->post('rw');
				$data['dusun'] = $this->input->post('dusun');
				$data['kelurahan'] = $this->input->post('kelurahan');
				$data['kecamatan'] = $this->input->post('kecamatan');
				$data['kabupaten'] = $this->input->post('kabupaten');
				$data['propinsi'] = $this->input->post('propinsi');
				$data['sts_tinggal'] = $this->input->post('sts_tinggal');
				$data['jns_tinggal'] = $this->input->post('jns_tinggal');
				$data['alat_trans'] = $this->input->post('alat_trans');
				$data['telp'] = $this->input->post('telp');
				$data['email'] = $this->input->post('email');
				$data['anak_ke'] = $this->input->post('anak_ke');
				$data['jml_sdr'] = $this->input->post('jml_sdr');
				$data['no_kk'] = $this->input->post('no_kk');
				$data['nm_ayh'] = $this->input->post('nm_ayh');
				$data['tlahir_ayh'] = $this->input->post('tlahir_ayh');
				$data['lahir_ayh'] = $this->input->post('lahir_ayh');
				$data['pend_ayh'] = $this->input->post('pend_ayh');
				$data['kerja_ayh'] = $this->input->post('kerja_ayh');
				$data['hasil_ayh'] = $this->input->post('hasil_ayh');
				$data['nik_ayh'] = $this->input->post('nik_ayh');
				$data['nm_ibu'] = $this->input->post('nm_ibu');
				$data['tlahir_ibu'] = $this->input->post('tlahir_ibu');
				$data['lahir_ibu'] = $this->input->post('lahir_ibu');
				$data['pend_ibu'] = $this->input->post('pend_ibu');
				$data['kerja_ibu'] = $this->input->post('kerja_ibu');
				$data['hasil_ibu'] = $this->input->post('hasil_ibu');
				$data['nik_ibu'] = $this->input->post('nik_ibu');
				$data['nm_wl'] = $this->input->post('nm_wl');
				$data['tlahir_wl'] = $this->input->post('tlahir_wl');
				$data['lahir_wl'] = $this->input->post('lahir_wl');
				$data['pend_wl'] = $this->input->post('pend_wl');
				$data['kerja_wl'] = $this->input->post('kerja_wl');
				$data['hasil_wl'] = $this->input->post('hasil_wl');
				$data['nik_wl'] = $this->input->post('nik_wl');
				$data['no_un'] = $this->input->post('no_un');
				$data['no_skhun'] = $this->input->post('no_skhun');
				$data['no_ijazah'] = $this->input->post('no_ijazah');
				$data['no_kps'] = $this->input->post('no_kps');
				$data['no_kip'] = $this->input->post('no_kip');
				$data['no_kis'] = $this->input->post('no_kis');
				$data['no_pkh'] = $this->input->post('no_pkh');
				$data['beasiswa'] = $this->input->post('beasiswa');
				$data['skl_asal'] = $this->input->post('skl_asal');
				$data['almt_skl'] = $this->input->post('almt_skl');
				$data['jns_masuk'] = $this->input->post('jns_masuk');
				$data['tgl_masuk'] = $this->input->post('tgl_masuk');
				$data['ket_out'] = $this->input->post('ket_out');
				$data['tgl_out'] = $this->input->post('tgl_out');
				$data['alasan_out'] = $this->input->post('alasan_out');
				$data['nosrt_out'] = $this->input->post('nosrt_out');
				$data['status'] = $this->input->post('status');
				$data['progres'] = $this->input->post('progres');
				$data['editor'] = $this->input->post('editor');	
				
				if ($_FILES['foto']['name']!=""){
					$data['foto'] = $this->input->post('nis').$this->upload->data('file_ext');
				} else {
					$data['foto'] = $this->input->post('foto_old');
				}	

				$this->admin_model->updatema($data,$id);
				$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Update',text: 'data ".$this->input->post('nama')." berhasil di perbarui'}");
				redirect('admin/datama');
		}
		else
		{
			$id = $this->input->post('id');
			$data['dbma'] = $this->admin_model->getByIdma($id);
			$data['cats'] = $this->admin_model->getkls_ma();
			$this->load->view('admin/edit-ma',$data);
		}
	}

	public function updatesmk()
	{
  		$this->form_validation->set_rules('nis','nis','required');
		$this->form_validation->set_rules('nama','nama','required');
		if ($this->form_validation->run()==true)
        {

			$config['upload_path']          = './asset/upload/';
			$config['allowed_types'] 		= 'jpg|png|jpeg|gif';
			$config['max_size']				= 2048;
			$config['remove_space'] 		= TRUE;
			$config['overwrite'] 			= TRUE;
			$config['file_name'] 			= $this->input->post('nis');
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('foto'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('admin/edit-smk', $error);
			}
			 	$id = $this->input->post('id');
			 	$data['nis'] = $this->input->post('nis');
			 	$data['nisn'] = $this->input->post('nisn');
				$data['nama'] = $this->input->post('nama');
				$data['jk'] = $this->input->post('jk');
				$data['tmp_lahir'] = $this->input->post('tmp_lahir');
				$data['tgl_lahir'] = $this->input->post('tgl_lahir');
				$data['nik'] = $this->input->post('nik');
				$data['agama'] = $this->input->post('agama');
				$data['alamat'] = $this->input->post('alamat');
				$data['rt'] = $this->input->post('rt');
				$data['rw'] = $this->input->post('rw');
				$data['dusun'] = $this->input->post('dusun');
				$data['kelurahan'] = $this->input->post('kelurahan');
				$data['kecamatan'] = $this->input->post('kecamatan');
				$data['kabupaten'] = $this->input->post('kabupaten');
				$data['propinsi'] = $this->input->post('propinsi');
				$data['sts_tinggal'] = $this->input->post('sts_tinggal');
				$data['jns_tinggal'] = $this->input->post('jns_tinggal');
				$data['alat_trans'] = $this->input->post('alat_trans');
				$data['telp'] = $this->input->post('telp');
				$data['email'] = $this->input->post('email');
				$data['anak_ke'] = $this->input->post('anak_ke');
				$data['jml_sdr'] = $this->input->post('jml_sdr');
				$data['no_kk'] = $this->input->post('no_kk');
				$data['nm_ayh'] = $this->input->post('nm_ayh');
				$data['tlahir_ayh'] = $this->input->post('tlahir_ayh');
				$data['lahir_ayh'] = $this->input->post('lahir_ayh');
				$data['pend_ayh'] = $this->input->post('pend_ayh');
				$data['kerja_ayh'] = $this->input->post('kerja_ayh');
				$data['hasil_ayh'] = $this->input->post('hasil_ayh');
				$data['nik_ayh'] = $this->input->post('nik_ayh');
				$data['nm_ibu'] = $this->input->post('nm_ibu');
				$data['tlahir_ibu'] = $this->input->post('tlahir_ibu');
				$data['lahir_ibu'] = $this->input->post('lahir_ibu');
				$data['pend_ibu'] = $this->input->post('pend_ibu');
				$data['kerja_ibu'] = $this->input->post('kerja_ibu');
				$data['hasil_ibu'] = $this->input->post('hasil_ibu');
				$data['nik_ibu'] = $this->input->post('nik_ibu');
				$data['nm_wl'] = $this->input->post('nm_wl');
				$data['tlahir_wl'] = $this->input->post('tlahir_wl');
				$data['lahir_wl'] = $this->input->post('lahir_wl');
				$data['pend_wl'] = $this->input->post('pend_wl');
				$data['kerja_wl'] = $this->input->post('kerja_wl');
				$data['hasil_wl'] = $this->input->post('hasil_wl');
				$data['nik_wl'] = $this->input->post('nik_wl');
				$data['no_un'] = $this->input->post('no_un');
				$data['no_skhun'] = $this->input->post('no_skhun');
				$data['no_ijazah'] = $this->input->post('no_ijazah');
				$data['no_kps'] = $this->input->post('no_kps');
				$data['no_kip'] = $this->input->post('no_kip');
				$data['no_kis'] = $this->input->post('no_kis');
				$data['no_pkh'] = $this->input->post('no_pkh');
				$data['beasiswa'] = $this->input->post('beasiswa');
				$data['skl_asal'] = $this->input->post('skl_asal');
				$data['almt_skl'] = $this->input->post('almt_skl');
				$data['jns_masuk'] = $this->input->post('jns_masuk');
				$data['tgl_masuk'] = $this->input->post('tgl_masuk');
				$data['ket_out'] = $this->input->post('ket_out');
				$data['tgl_out'] = $this->input->post('tgl_out');
				$data['alasan_out'] = $this->input->post('alasan_out');
				$data['nosrt_out'] = $this->input->post('nosrt_out');
				$data['status'] = $this->input->post('status');
				$data['progres'] = $this->input->post('progres');
				$data['editor'] = $this->input->post('editor');				
				
				if ($_FILES['foto']['name']!=""){
					$data['foto'] = $this->input->post('nis').$this->upload->data('file_ext');
				} else {
					$data['foto'] = $this->input->post('foto_old');
				}	

				$this->admin_model->updatesmk($data,$id);
				$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Update',text: 'data ".$this->input->post('nama')." berhasil di perbarui'}");
				redirect('admin/datasmk');
		}
		else
		{
			$id = $this->input->post('id');
			$data['dbsmk'] = $this->admin_model->getByIdsmk($id);
			$this->load->view('admin/edit-smk',$data);
		}
	}

// =====================================================================================================================================

	public function savemts()
	{
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('jk','jk','required');
		if ($this->form_validation->run()==true)
        {
			$config['upload_path']          = './asset/upload/';
			$config['allowed_types'] 		= 'jpg|png|jpeg';
			$config['max_size']				= 2048;
			$config['remove_space'] 		= TRUE;
			$config['overwrite'] 			= TRUE;
			$config['file_name'] 			= $this->input->post('nis');
			$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('foto'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('form-mts', $error);
				}
				 	date_default_timezone_set('Asia/Jakarta');
				 	$data['nis'] = $this->input->post('nis');
				 	$data['nisn'] = $this->input->post('nisn');
					$data['nama'] = $this->input->post('nama');
					$data['jk'] = $this->input->post('jk');
					$data['tmp_lahir'] = $this->input->post('tmp_lahir');
					$data['tgl_lahir'] = $this->input->post('tgl_lahir');
					$data['nik'] = $this->input->post('nik');
					$data['agama'] = $this->input->post('agama');
					$data['alamat'] = $this->input->post('alamat');
					$data['rt'] = $this->input->post('rt');
					$data['rw'] = $this->input->post('rw');
					$data['dusun'] = $this->input->post('dusun');
					$data['kelurahan'] = $this->input->post('kelurahan');
					$data['kecamatan'] = $this->input->post('kecamatan');
					$data['kabupaten'] = $this->input->post('kabupaten');
					$data['propinsi'] = $this->input->post('propinsi');
					$data['sts_tinggal'] = $this->input->post('sts_tinggal');
					$data['jns_tinggal'] = $this->input->post('jns_tinggal');
					$data['alat_trans'] = $this->input->post('alat_trans');
					$data['telp'] = $this->input->post('telp');
					$data['email'] = $this->input->post('email');
					$data['anak_ke'] = $this->input->post('anak_ke');
					$data['jml_sdr'] = $this->input->post('jml_sdr');
					$data['no_kk'] = $this->input->post('no_kk');
					$data['nm_ayh'] = $this->input->post('nm_ayh');
					$data['tlahir_ayh'] = $this->input->post('tlahir_ayh');
					$data['lahir_ayh'] = $this->input->post('lahir_ayh');
					$data['pend_ayh'] = $this->input->post('pend_ayh');
					$data['kerja_ayh'] = $this->input->post('kerja_ayh');
					$data['hasil_ayh'] = $this->input->post('hasil_ayh');
					$data['nik_ayh'] = $this->input->post('nik_ayh');
					$data['nm_ibu'] = $this->input->post('nm_ibu');
					$data['tlahir_ibu'] = $this->input->post('tlahir_ibu');
					$data['lahir_ibu'] = $this->input->post('lahir_ibu');
					$data['pend_ibu'] = $this->input->post('pend_ibu');
					$data['kerja_ibu'] = $this->input->post('kerja_ibu');
					$data['hasil_ibu'] = $this->input->post('hasil_ibu');
					$data['nik_ibu'] = $this->input->post('nik_ibu');
					$data['nm_wl'] = $this->input->post('nm_wl');
					$data['tlahir_wl'] = $this->input->post('tlahir_wl');
					$data['lahir_wl'] = $this->input->post('lahir_wl');
					$data['pend_wl'] = $this->input->post('pend_wl');
					$data['kerja_wl'] = $this->input->post('kerja_wl');
					$data['hasil_wl'] = $this->input->post('hasil_wl');
					$data['nik_wl'] = $this->input->post('nik_wl');
					$data['no_un'] = $this->input->post('no_un');
					$data['no_skhun'] = $this->input->post('no_skhun');
					$data['no_ijazah'] = $this->input->post('no_ijazah');
					$data['no_kps'] = $this->input->post('no_kps');
					$data['no_kip'] = $this->input->post('no_kip');
					$data['no_kis'] = $this->input->post('no_kis');
					$data['no_pkh'] = $this->input->post('no_pkh');
					$data['beasiswa'] = $this->input->post('beasiswa');
					$data['kelas_7'] = $this->input->post('kelas_7');
					$data['kelas_8'] = $this->input->post('kelas_8');
					$data['kelas_9'] = $this->input->post('kelas_9');
					$data['kelas_aktf'] = $this->input->post('kelas_aktf');
					$data['kelas_dig'] = $this->input->post('kelas_dig');
					$data['skl_asal'] = $this->input->post('skl_asal');
					$data['almt_skl'] = $this->input->post('almt_skl');
					$data['jns_masuk'] = $this->input->post('jns_masuk');
					$data['tgl_masuk'] = $this->input->post('tgl_masuk');
					// $data['ket_out'] = $this->input->post('ket_out');
					// $data['tgl_out'] = $this->input->post('tgl_out');
					// $data['alasan_out'] = $this->input->post('alasan_out');
					// $data['nosrt_out'] = $this->input->post('nosrt_out');
					$data['status'] = "AKTIF";
					$data['progres'] = date("d/m/Y H:i:s");
					$data['editor'] = $this->session->userdata('nama');	

					if ($_FILES['foto']['name']!=""){
						$data['foto'] = $this->input->post('nis').$this->upload->data('file_ext');
					} else {
						$data['foto'] = "none.jpg";
					}	

					$this->admin_model->savemts($data);
					$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Tambah User',text: 'data ".$this->input->post('nama')." berhasil di tambahkan'}");

					redirect('admin/datamts');
		}
		else
		{
				$data['dbmts'] = $this->admin_model->getmts();
				$this->load->view('admin/datamts',$data);
		}
	}

	public function savema()
	{
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('jk','jk','required');
		if ($this->form_validation->run()==true)
        {
			$config['upload_path']          = './asset/upload/';
			$config['allowed_types'] 		= 'jpg|png|jpeg';
			$config['max_size']				= 2048;
			$config['remove_space'] 		= TRUE;
			$config['overwrite'] 			= TRUE;
			$config['file_name'] 			= $this->input->post('nis');
			$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('foto'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('form-ma', $error);
				}
				 	date_default_timezone_set('Asia/Jakarta');
				 	$data['nis'] = $this->input->post('nis');
				 	$data['nisn'] = $this->input->post('nisn');
					$data['nama'] = $this->input->post('nama');
					$data['jk'] = $this->input->post('jk');
					$data['tmp_lahir'] = $this->input->post('tmp_lahir');
					$data['tgl_lahir'] = $this->input->post('tgl_lahir');
					$data['nik'] = $this->input->post('nik');
					$data['agama'] = $this->input->post('agama');
					$data['alamat'] = $this->input->post('alamat');
					$data['rt'] = $this->input->post('rt');
					$data['rw'] = $this->input->post('rw');
					$data['dusun'] = $this->input->post('dusun');
					$data['kelurahan'] = $this->input->post('kelurahan');
					$data['kecamatan'] = $this->input->post('kecamatan');
					$data['kabupaten'] = $this->input->post('kabupaten');
					$data['propinsi'] = $this->input->post('propinsi');
					$data['sts_tinggal'] = $this->input->post('sts_tinggal');
					$data['jns_tinggal'] = $this->input->post('jns_tinggal');
					$data['alat_trans'] = $this->input->post('alat_trans');
					$data['telp'] = $this->input->post('telp');
					$data['email'] = $this->input->post('email');
					$data['anak_ke'] = $this->input->post('anak_ke');
					$data['jml_sdr'] = $this->input->post('jml_sdr');
					$data['no_kk'] = $this->input->post('no_kk');
					$data['nm_ayh'] = $this->input->post('nm_ayh');
					$data['tlahir_ayh'] = $this->input->post('tlahir_ayh');
					$data['lahir_ayh'] = $this->input->post('lahir_ayh');
					$data['pend_ayh'] = $this->input->post('pend_ayh');
					$data['kerja_ayh'] = $this->input->post('kerja_ayh');
					$data['hasil_ayh'] = $this->input->post('hasil_ayh');
					$data['nik_ayh'] = $this->input->post('nik_ayh');
					$data['nm_ibu'] = $this->input->post('nm_ibu');
					$data['tlahir_ibu'] = $this->input->post('tlahir_ibu');
					$data['lahir_ibu'] = $this->input->post('lahir_ibu');
					$data['pend_ibu'] = $this->input->post('pend_ibu');
					$data['kerja_ibu'] = $this->input->post('kerja_ibu');
					$data['hasil_ibu'] = $this->input->post('hasil_ibu');
					$data['nik_ibu'] = $this->input->post('nik_ibu');
					$data['nm_wl'] = $this->input->post('nm_wl');
					$data['tlahir_wl'] = $this->input->post('tlahir_wl');
					$data['lahir_wl'] = $this->input->post('lahir_wl');
					$data['pend_wl'] = $this->input->post('pend_wl');
					$data['kerja_wl'] = $this->input->post('kerja_wl');
					$data['hasil_wl'] = $this->input->post('hasil_wl');
					$data['nik_wl'] = $this->input->post('nik_wl');
					$data['no_un'] = $this->input->post('no_un');
					$data['no_skhun'] = $this->input->post('no_skhun');
					$data['no_ijazah'] = $this->input->post('no_ijazah');
					$data['no_kps'] = $this->input->post('no_kps');
					$data['no_kip'] = $this->input->post('no_kip');
					$data['no_kis'] = $this->input->post('no_kis');
					$data['no_pkh'] = $this->input->post('no_pkh');
					$data['beasiswa'] = $this->input->post('beasiswa');
					$data['kelas_7'] = $this->input->post('kelas_7');
					$data['kelas_8'] = $this->input->post('kelas_8');
					$data['kelas_9'] = $this->input->post('kelas_9');
					$data['kelas_aktf'] = $this->input->post('kelas_aktf');
					$data['kelas_dig'] = $this->input->post('kelas_dig');
					$data['skl_asal'] = $this->input->post('skl_asal');
					$data['almt_skl'] = $this->input->post('almt_skl');
					$data['jns_masuk'] = $this->input->post('jns_masuk');
					$data['tgl_masuk'] = $this->input->post('tgl_masuk');
					$data['status'] = "AKTIF";
					$data['progres'] = date("d/m/Y H:i:s");
					$data['editor'] = $this->session->userdata('nama');	

					if ($_FILES['foto']['name']!=""){
						$data['foto'] = $this->input->post('nis').$this->upload->data('file_ext');
					} else {
						$data['foto'] = "none.jpg";
					}	

					$this->admin_model->savema($data);
					$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Tambah User',text: 'data ".$this->input->post('nama')." berhasil di tambahkan'}");

					redirect('admin/datama');
		}
		else
		{
				$data['dbma'] = $this->admin_model->getma();
				$this->load->view('admin/datama',$data);
		}
	}

	public function savesmp()
	{
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('jk','jk','required');
		if ($this->form_validation->run()==true)
        {
			$config['upload_path']          = './asset/upload/';
			$config['allowed_types'] 		= 'jpg|png|jpeg';
			$config['max_size']				= 2048;
			$config['remove_space'] 		= TRUE;
			$config['overwrite'] 			= TRUE;
			$config['file_name'] 			= $this->input->post('nis');
			$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('foto'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('form-smp', $error);
				}
				 	date_default_timezone_set('Asia/Jakarta');
				 	$data['nis'] = $this->input->post('nis');
				 	$data['nisn'] = $this->input->post('nisn');
					$data['nama'] = $this->input->post('nama');
					$data['jk'] = $this->input->post('jk');
					$data['tmp_lahir'] = $this->input->post('tmp_lahir');
					$data['tgl_lahir'] = $this->input->post('tgl_lahir');
					$data['nik'] = $this->input->post('nik');
					$data['agama'] = $this->input->post('agama');
					$data['alamat'] = $this->input->post('alamat');
					$data['rt'] = $this->input->post('rt');
					$data['rw'] = $this->input->post('rw');
					$data['dusun'] = $this->input->post('dusun');
					$data['kelurahan'] = $this->input->post('kelurahan');
					$data['kecamatan'] = $this->input->post('kecamatan');
					$data['kabupaten'] = $this->input->post('kabupaten');
					$data['propinsi'] = $this->input->post('propinsi');
					$data['sts_tinggal'] = $this->input->post('sts_tinggal');
					$data['jns_tinggal'] = $this->input->post('jns_tinggal');
					$data['alat_trans'] = $this->input->post('alat_trans');
					$data['telp'] = $this->input->post('telp');
					$data['email'] = $this->input->post('email');
					$data['anak_ke'] = $this->input->post('anak_ke');
					$data['jml_sdr'] = $this->input->post('jml_sdr');
					$data['no_kk'] = $this->input->post('no_kk');
					$data['nm_ayh'] = $this->input->post('nm_ayh');
					$data['tlahir_ayh'] = $this->input->post('tlahir_ayh');
					$data['lahir_ayh'] = $this->input->post('lahir_ayh');
					$data['pend_ayh'] = $this->input->post('pend_ayh');
					$data['kerja_ayh'] = $this->input->post('kerja_ayh');
					$data['hasil_ayh'] = $this->input->post('hasil_ayh');
					$data['nik_ayh'] = $this->input->post('nik_ayh');
					$data['nm_ibu'] = $this->input->post('nm_ibu');
					$data['tlahir_ibu'] = $this->input->post('tlahir_ibu');
					$data['lahir_ibu'] = $this->input->post('lahir_ibu');
					$data['pend_ibu'] = $this->input->post('pend_ibu');
					$data['kerja_ibu'] = $this->input->post('kerja_ibu');
					$data['hasil_ibu'] = $this->input->post('hasil_ibu');
					$data['nik_ibu'] = $this->input->post('nik_ibu');
					$data['nm_wl'] = $this->input->post('nm_wl');
					$data['tlahir_wl'] = $this->input->post('tlahir_wl');
					$data['lahir_wl'] = $this->input->post('lahir_wl');
					$data['pend_wl'] = $this->input->post('pend_wl');
					$data['kerja_wl'] = $this->input->post('kerja_wl');
					$data['hasil_wl'] = $this->input->post('hasil_wl');
					$data['nik_wl'] = $this->input->post('nik_wl');
					$data['no_un'] = $this->input->post('no_un');
					$data['no_skhun'] = $this->input->post('no_skhun');
					$data['no_ijazah'] = $this->input->post('no_ijazah');
					$data['no_kps'] = $this->input->post('no_kps');
					$data['no_kip'] = $this->input->post('no_kip');
					$data['no_kis'] = $this->input->post('no_kis');
					$data['no_pkh'] = $this->input->post('no_pkh');
					$data['beasiswa'] = $this->input->post('beasiswa');
					$data['kelas_7'] = $this->input->post('kelas_7');
					$data['kelas_8'] = $this->input->post('kelas_8');
					$data['kelas_9'] = $this->input->post('kelas_9');
					$data['kelas_aktf'] = $this->input->post('kelas_aktf');
					$data['kelas_dig'] = $this->input->post('kelas_dig');
					$data['skl_asal'] = $this->input->post('skl_asal');
					$data['almt_skl'] = $this->input->post('almt_skl');
					$data['jns_masuk'] = $this->input->post('jns_masuk');
					$data['tgl_masuk'] = $this->input->post('tgl_masuk');
					$data['status'] = "AKTIF";
					$data['progres'] = date("d/m/Y H:i:s");
					$data['editor'] = $this->session->userdata('nama');	

					if ($_FILES['foto']['name']!=""){
						$data['foto'] = $this->input->post('nis').$this->upload->data('file_ext');
					} else {
						$data['foto'] = "none.jpg";
					}	

					$this->admin_model->savesmp($data);
					$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Tambah User',text: 'data ".$this->input->post('nama')." berhasil di tambahkan'}");

					redirect('admin/datasmp');
		}
		else
		{
				$data['dbsmp'] = $this->admin_model->getsmp();
				$this->load->view('admin/datasmp',$data);
		}
	}

	public function savesmk()
	{
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('jk','jk','required');
		if ($this->form_validation->run()==true)
        {
			$config['upload_path']          = './asset/upload/';
			$config['allowed_types'] 		= 'jpg|png|jpeg';
			$config['max_size']				= 2048;
			$config['remove_space'] 		= TRUE;
			$config['overwrite'] 			= TRUE;
			$config['file_name'] 			= $this->input->post('nis');
			$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('foto'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('form-smk', $error);
				}
				 	date_default_timezone_set('Asia/Jakarta');
				 	$data['nis'] = $this->input->post('nis');
				 	$data['nisn'] = $this->input->post('nisn');
					$data['nama'] = $this->input->post('nama');
					$data['jk'] = $this->input->post('jk');
					$data['tmp_lahir'] = $this->input->post('tmp_lahir');
					$data['tgl_lahir'] = $this->input->post('tgl_lahir');
					$data['nik'] = $this->input->post('nik');
					$data['agama'] = $this->input->post('agama');
					$data['alamat'] = $this->input->post('alamat');
					$data['rt'] = $this->input->post('rt');
					$data['rw'] = $this->input->post('rw');
					$data['dusun'] = $this->input->post('dusun');
					$data['kelurahan'] = $this->input->post('kelurahan');
					$data['kecamatan'] = $this->input->post('kecamatan');
					$data['kabupaten'] = $this->input->post('kabupaten');
					$data['propinsi'] = $this->input->post('propinsi');
					$data['sts_tinggal'] = $this->input->post('sts_tinggal');
					$data['jns_tinggal'] = $this->input->post('jns_tinggal');
					$data['alat_trans'] = $this->input->post('alat_trans');
					$data['telp'] = $this->input->post('telp');
					$data['email'] = $this->input->post('email');
					$data['anak_ke'] = $this->input->post('anak_ke');
					$data['jml_sdr'] = $this->input->post('jml_sdr');
					$data['no_kk'] = $this->input->post('no_kk');
					$data['nm_ayh'] = $this->input->post('nm_ayh');
					$data['tlahir_ayh'] = $this->input->post('tlahir_ayh');
					$data['lahir_ayh'] = $this->input->post('lahir_ayh');
					$data['pend_ayh'] = $this->input->post('pend_ayh');
					$data['kerja_ayh'] = $this->input->post('kerja_ayh');
					$data['hasil_ayh'] = $this->input->post('hasil_ayh');
					$data['nik_ayh'] = $this->input->post('nik_ayh');
					$data['nm_ibu'] = $this->input->post('nm_ibu');
					$data['tlahir_ibu'] = $this->input->post('tlahir_ibu');
					$data['lahir_ibu'] = $this->input->post('lahir_ibu');
					$data['pend_ibu'] = $this->input->post('pend_ibu');
					$data['kerja_ibu'] = $this->input->post('kerja_ibu');
					$data['hasil_ibu'] = $this->input->post('hasil_ibu');
					$data['nik_ibu'] = $this->input->post('nik_ibu');
					$data['nm_wl'] = $this->input->post('nm_wl');
					$data['tlahir_wl'] = $this->input->post('tlahir_wl');
					$data['lahir_wl'] = $this->input->post('lahir_wl');
					$data['pend_wl'] = $this->input->post('pend_wl');
					$data['kerja_wl'] = $this->input->post('kerja_wl');
					$data['hasil_wl'] = $this->input->post('hasil_wl');
					$data['nik_wl'] = $this->input->post('nik_wl');
					$data['no_un'] = $this->input->post('no_un');
					$data['no_skhun'] = $this->input->post('no_skhun');
					$data['no_ijazah'] = $this->input->post('no_ijazah');
					$data['no_kps'] = $this->input->post('no_kps');
					$data['no_kip'] = $this->input->post('no_kip');
					$data['no_kis'] = $this->input->post('no_kis');
					$data['no_pkh'] = $this->input->post('no_pkh');
					$data['beasiswa'] = $this->input->post('beasiswa');
					$data['kelas_7'] = $this->input->post('kelas_7');
					$data['kelas_8'] = $this->input->post('kelas_8');
					$data['kelas_9'] = $this->input->post('kelas_9');
					$data['kelas_aktf'] = $this->input->post('kelas_aktf');
					$data['kelas_dig'] = $this->input->post('kelas_dig');
					$data['skl_asal'] = $this->input->post('skl_asal');
					$data['almt_skl'] = $this->input->post('almt_skl');
					$data['jns_masuk'] = $this->input->post('jns_masuk');
					$data['tgl_masuk'] = $this->input->post('tgl_masuk');
					$data['status'] = "AKTIF";
					$data['progres'] = date("d/m/Y H:i:s");
					$data['editor'] = $this->session->userdata('nama');	

					if ($_FILES['foto']['name']!=""){
						$data['foto'] = $this->input->post('nis').$this->upload->data('file_ext');
					} else {
						$data['foto'] = "none.jpg";
					}	

					$this->admin_model->savesmk($data);
					$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Tambah User',text: 'data ".$this->input->post('nama')." berhasil di tambahkan'}");

					redirect('admin/datasmk');
		}
		else
		{
				$data['dbsmk'] = $this->admin_model->getsmk();
				$this->load->view('admin/datasmk',$data);
		}
	}

// =====================================================================================================================================
	
	function deletemts($id)
	{
		$this->admin_model->delmts($id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'data berhasil di hapus'}");
		redirect('admin/datamts');
	}

	function deletema($id)
	{
		$this->admin_model->delma($id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'data berhasil di hapus'}");
		redirect('admin/datama');
	}

	function deletesmp($id)
	{
		$this->admin_model->delsmp($id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'data berhasil di hapus'}");
		redirect('admin/datasmp');
	}

	function deletesmk($id)
	{
		$this->admin_model->delsmk($id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'data berhasil di hapus'}");
		redirect('admin/datasmk');
	}

// =====================================================================================================================================

	public function export($par)
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		$lembaga = strtoupper($par);
		$user = $this->session->userdata('nama');

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Mukhammad Yasin')
							   ->setLastModifiedBy($user)
							   ->setTitle("Data Siswa Aktif".$lembaga)
							   ->setSubject("Siswa")
							   ->setDescription("Data Siswa ".$lembaga)
							   ->setKeywords("Data Siswa ".$lembaga);

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'numberformat' => array('code' => PHPExcel_Style_NumberFormat::FORMAT_TEXT),
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			),
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATABASE SISWA ".$lembaga); // Set kolom A1 dengan tulisan "DATA SISWA"
		date_default_timezone_set('Asia/Jakarta');
		$excel->setActiveSheetIndex(0)->setCellValue('A2', "Diunduh oleh ".$user." pada ".date("d/m/Y H:i:s"));
		// $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(13); // Set font size 15 untuk kolom A1
		// $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
			$excel->setActiveSheetIndex(0)->setCellValue('A4', "NO");
			$excel->setActiveSheetIndex(0)->setCellValue('B4', "NIS");
			$excel->setActiveSheetIndex(0)->setCellValue('C4', "NISN");
			$excel->setActiveSheetIndex(0)->setCellValue('D4', "NAMA");
			$excel->setActiveSheetIndex(0)->setCellValue('E4', "JK");
			$excel->setActiveSheetIndex(0)->setCellValue('F4', "TEMPAT LAHIR");
			$excel->setActiveSheetIndex(0)->setCellValue('G4', "TANGGAL LAHIR");
			$excel->setActiveSheetIndex(0)->setCellValue('H4', "NIK");
			$excel->setActiveSheetIndex(0)->setCellValue('I4', "AGAMA");
			$excel->setActiveSheetIndex(0)->setCellValue('J4', "ALAMAT");
			$excel->setActiveSheetIndex(0)->setCellValue('K4', "RT");
			$excel->setActiveSheetIndex(0)->setCellValue('L4', "RW");
			$excel->setActiveSheetIndex(0)->setCellValue('M4', "DUSUN");
			$excel->setActiveSheetIndex(0)->setCellValue('N4', "KELURAHAN");
			$excel->setActiveSheetIndex(0)->setCellValue('O4', "KECAMATAN");
			$excel->setActiveSheetIndex(0)->setCellValue('P4', "KABUPATEN");
			$excel->setActiveSheetIndex(0)->setCellValue('Q4', "PROPINSI");
			$excel->setActiveSheetIndex(0)->setCellValue('R4', "STATUS TINGGAL");
			$excel->setActiveSheetIndex(0)->setCellValue('S4', "JENIS TINGGAL");
			$excel->setActiveSheetIndex(0)->setCellValue('T4', "ALAT TRANSPORTASI");
			$excel->setActiveSheetIndex(0)->setCellValue('U4', "TELP");
			$excel->setActiveSheetIndex(0)->setCellValue('V4', "EMAIL");
			$excel->setActiveSheetIndex(0)->setCellValue('W4', "ANAK KE");
			$excel->setActiveSheetIndex(0)->setCellValue('X4', "JUMLAH SAUDARA");
			$excel->setActiveSheetIndex(0)->setCellValue('Y4', "NO KK");
			$excel->setActiveSheetIndex(0)->setCellValue('Z4', "NAMA AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AA4', "TEMPAT LAHIR AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AB4', "LAHIR AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AC4', "PENDIDIKAN AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AD4', "KERJA AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AE4', "HASIL AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AF4', "NIK AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AG4', "NAMA IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AH4', "TEMPAT LAHIR IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AI4', "LAHIR IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AJ4', "PENDIDIKAN IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AK4', "KERJA IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AL4', "HASIL IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AM4', "NIK IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AN4', "NAMA WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AO4', "TEMPAT LAHIR WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AP4', "LAHIR WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AQ4', "PENDIDIKAN WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AR4', "KERJA WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AS4', "HASIL WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AT4', "NIK WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AU4', "NO UN");
			$excel->setActiveSheetIndex(0)->setCellValue('AV4', "NO SKHUN");
			$excel->setActiveSheetIndex(0)->setCellValue('AW4', "NO IJAZAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AX4', "NO KPS");
			$excel->setActiveSheetIndex(0)->setCellValue('AY4', "NO KIP");
			$excel->setActiveSheetIndex(0)->setCellValue('AZ4', "NO KIS");
			$excel->setActiveSheetIndex(0)->setCellValue('BA4', "NO PKH");
			$excel->setActiveSheetIndex(0)->setCellValue('BB4', "BEASISWA");
			$excel->setActiveSheetIndex(0)->setCellValue('BC4', "KELAS 7");
			$excel->setActiveSheetIndex(0)->setCellValue('BD4', "KELAS 8");
			$excel->setActiveSheetIndex(0)->setCellValue('BE4', "KELAS 9");
			$excel->setActiveSheetIndex(0)->setCellValue('BF4', "KELAS AKTIF");
			$excel->setActiveSheetIndex(0)->setCellValue('BG4', "KELAS DIGITAL");
			$excel->setActiveSheetIndex(0)->setCellValue('BH4', "KELAS SEKOLAH ASAL");
			$excel->setActiveSheetIndex(0)->setCellValue('BI4', "ALAMAT SEKOLAH ASAL");
			$excel->setActiveSheetIndex(0)->setCellValue('BJ4', "JENIS MASUK");
			$excel->setActiveSheetIndex(0)->setCellValue('BK4', "TANGGAL MASUK");
			$excel->setActiveSheetIndex(0)->setCellValue('BL4', "KET KELUAR");
			$excel->setActiveSheetIndex(0)->setCellValue('BM4', "TANGGAL KELUAR");
			$excel->setActiveSheetIndex(0)->setCellValue('BN4', "ALASAN KELUAR");
			$excel->setActiveSheetIndex(0)->setCellValue('BO4', "NO SURAT KELUAR");
			$excel->setActiveSheetIndex(0)->setCellValue('BP4', "STATUS");
			$excel->setActiveSheetIndex(0)->setCellValue('BQ4', "UPDATED");
			$excel->setActiveSheetIndex(0)->setCellValue('BR4', "EDITOR");


		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A4:BR4')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		// $siswa = $this->admin_model->getmts();


		$siswa = $this->admin_model->get_data($par);

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($siswa as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('B'.$numrow, $data->nis, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('C'.$numrow, $data->nisn, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->jk);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->tmp_lahir);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->tgl_lahir);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('H'.$numrow, $data->nik,PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->agama);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->alamat);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->rt);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->rw);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->dusun);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->kelurahan);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->kecamatan);
			$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->kabupaten);
			$excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->propinsi);
			$excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->sts_tinggal);
			$excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->jns_tinggal);
			$excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->alat_trans);
			$excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->telp);
			$excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->email);
			$excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->anak_ke);
			$excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $data->jml_sdr);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('Y'.$numrow, $data->no_kk,PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $data->nm_ayh);
			$excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $data->tlahir_ayh);
			$excel->setActiveSheetIndex(0)->setCellValue('AB'.$numrow, $data->lahir_ayh);
			$excel->setActiveSheetIndex(0)->setCellValue('AC'.$numrow, $data->pend_ayh);
			$excel->setActiveSheetIndex(0)->setCellValue('AD'.$numrow, $data->kerja_ayh);
			$excel->setActiveSheetIndex(0)->setCellValue('AE'.$numrow, $data->hasil_ayh);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('AF'.$numrow, $data->nik_ayh,PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('AG'.$numrow, $data->nm_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('AH'.$numrow, $data->tlahir_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('AI'.$numrow, $data->lahir_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('AJ'.$numrow, $data->pend_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('AK'.$numrow, $data->kerja_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('AL'.$numrow, $data->hasil_ibu);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('AM'.$numrow, $data->nik_ibu,PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('AN'.$numrow, $data->nm_wl);
			$excel->setActiveSheetIndex(0)->setCellValue('AO'.$numrow, $data->tlahir_wl);
			$excel->setActiveSheetIndex(0)->setCellValue('AP'.$numrow, $data->lahir_wl);
			$excel->setActiveSheetIndex(0)->setCellValue('AQ'.$numrow, $data->pend_wl);
			$excel->setActiveSheetIndex(0)->setCellValue('AR'.$numrow, $data->kerja_wl);
			$excel->setActiveSheetIndex(0)->setCellValue('AS'.$numrow, $data->hasil_wl);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('AT'.$numrow, $data->nik_wl,PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('AU'.$numrow, $data->no_un);
			$excel->setActiveSheetIndex(0)->setCellValue('AV'.$numrow, $data->no_skhun);
			$excel->setActiveSheetIndex(0)->setCellValue('AW'.$numrow, $data->no_ijazah);
			$excel->setActiveSheetIndex(0)->setCellValue('AX'.$numrow, $data->no_kps);
			$excel->setActiveSheetIndex(0)->setCellValue('AY'.$numrow, $data->no_kip);
			$excel->setActiveSheetIndex(0)->setCellValue('AZ'.$numrow, $data->no_kis);
			$excel->setActiveSheetIndex(0)->setCellValue('BA'.$numrow, $data->no_pkh);
			$excel->setActiveSheetIndex(0)->setCellValue('BB'.$numrow, $data->beasiswa);
			$excel->setActiveSheetIndex(0)->setCellValue('BC'.$numrow, $data->kelas_7);
			$excel->setActiveSheetIndex(0)->setCellValue('BD'.$numrow, $data->kelas_8);
			$excel->setActiveSheetIndex(0)->setCellValue('BE'.$numrow, $data->kelas_9);
			$excel->setActiveSheetIndex(0)->setCellValue('BF'.$numrow, $data->kelas_aktf);
			$excel->setActiveSheetIndex(0)->setCellValue('BG'.$numrow, $data->kelas_dig);
			$excel->setActiveSheetIndex(0)->setCellValue('BH'.$numrow, $data->skl_asal);
			$excel->setActiveSheetIndex(0)->setCellValue('BI'.$numrow, $data->almt_skl);
			$excel->setActiveSheetIndex(0)->setCellValue('BJ'.$numrow, $data->jns_masuk);
			$excel->setActiveSheetIndex(0)->setCellValue('BK'.$numrow, $data->tgl_masuk);
			$excel->setActiveSheetIndex(0)->setCellValue('BL'.$numrow, $data->ket_out);
			$excel->setActiveSheetIndex(0)->setCellValue('BM'.$numrow, $data->tgl_out);
			$excel->setActiveSheetIndex(0)->setCellValue('BN'.$numrow, $data->alasan_out);
			$excel->setActiveSheetIndex(0)->setCellValue('BO'.$numrow, $data->nosrt_out);
			$excel->setActiveSheetIndex(0)->setCellValue('BP'.$numrow, $data->status);
			$excel->setActiveSheetIndex(0)->setCellValue('BQ'.$numrow, $data->progres);
			$excel->setActiveSheetIndex(0)->setCellValue('BR'.$numrow, $data->editor);



			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow.':BR'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(19); 
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(16); 
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(30); 
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(5); 
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(14); 
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(14); 
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(19);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(8);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('N')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('R')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('V')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('W')->setWidth(8);
		$excel->getActiveSheet()->getColumnDimension('X')->setWidth(8);
		$excel->getActiveSheet()->getColumnDimension('Y')->setWidth(17);
		$excel->getActiveSheet()->getColumnDimension('Z')->setWidth(31);
		$excel->getActiveSheet()->getColumnDimension('AA')->setWidth(19);
		$excel->getActiveSheet()->getColumnDimension('AB')->setWidth(11);
		$excel->getActiveSheet()->getColumnDimension('AC')->setWidth(18);
		$excel->getActiveSheet()->getColumnDimension('AD')->setWidth(16);
		$excel->getActiveSheet()->getColumnDimension('AE')->setWidth(27);
		$excel->getActiveSheet()->getColumnDimension('AF')->setWidth(17);
		$excel->getActiveSheet()->getColumnDimension('AG')->setWidth(31);
		$excel->getActiveSheet()->getColumnDimension('AH')->setWidth(19);
		$excel->getActiveSheet()->getColumnDimension('AI')->setWidth(11);
		$excel->getActiveSheet()->getColumnDimension('AJ')->setWidth(18);
		$excel->getActiveSheet()->getColumnDimension('AK')->setWidth(16);
		$excel->getActiveSheet()->getColumnDimension('AL')->setWidth(27);
		$excel->getActiveSheet()->getColumnDimension('AM')->setWidth(17);
		$excel->getActiveSheet()->getColumnDimension('AN')->setWidth(31);
		$excel->getActiveSheet()->getColumnDimension('AO')->setWidth(19);
		$excel->getActiveSheet()->getColumnDimension('AP')->setWidth(11);
		$excel->getActiveSheet()->getColumnDimension('AQ')->setWidth(18);
		$excel->getActiveSheet()->getColumnDimension('AR')->setWidth(16);
		$excel->getActiveSheet()->getColumnDimension('AS')->setWidth(27);
		$excel->getActiveSheet()->getColumnDimension('AT')->setWidth(17);
		$excel->getActiveSheet()->getColumnDimension('AU')->setWidth(22);
		$excel->getActiveSheet()->getColumnDimension('AV')->setWidth(22);
		$excel->getActiveSheet()->getColumnDimension('AW')->setWidth(22);
		$excel->getActiveSheet()->getColumnDimension('AX')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('AY')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('AZ')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BA')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BB')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BC')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BD')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BE')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BF')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BG')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BH')->setWidth(37);
		$excel->getActiveSheet()->getColumnDimension('BI')->setWidth(47);
		$excel->getActiveSheet()->getColumnDimension('BJ')->setWidth(13);
		$excel->getActiveSheet()->getColumnDimension('BK')->setWidth(16);
		$excel->getActiveSheet()->getColumnDimension('BL')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('BM')->setWidth(16);
		$excel->getActiveSheet()->getColumnDimension('BN')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('BO')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('BP')->setWidth(7);
		$excel->getActiveSheet()->getColumnDimension('BQ')->setWidth(18);
		$excel->getActiveSheet()->getColumnDimension('BR')->setWidth(25);
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Data Siswa");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Siswa Aktif '.$lembaga.'.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}


// =====================================================================================================================================

	public function backup($par)
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		$lembaga = strtoupper($par);
		$user = $this->session->userdata('nama');

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Mukhammad Yasin')
							   ->setLastModifiedBy($user)
							   ->setTitle("Backup Database ".$lembaga)
							   ->setSubject("Siswa")
							   ->setDescription("Data Siswa ".$lembaga)
							   ->setKeywords("Data Siswa ".$lembaga);

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'numberformat' => array('code' => PHPExcel_Style_NumberFormat::FORMAT_TEXT),
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			),
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATABASE SISWA ".$lembaga); // Set kolom A1 dengan tulisan "DATA SISWA"
		date_default_timezone_set('Asia/Jakarta');
		$excel->setActiveSheetIndex(0)->setCellValue('A2', "Diunduh oleh ".$user." pada ".date("d/m/Y H:i:s"));
		// $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(13); // Set font size 15 untuk kolom A1
		// $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
			$excel->setActiveSheetIndex(0)->setCellValue('A4', "NO");
			$excel->setActiveSheetIndex(0)->setCellValue('B4', "NIS");
			$excel->setActiveSheetIndex(0)->setCellValue('C4', "NISN");
			$excel->setActiveSheetIndex(0)->setCellValue('D4', "NAMA");
			$excel->setActiveSheetIndex(0)->setCellValue('E4', "JK");
			$excel->setActiveSheetIndex(0)->setCellValue('F4', "TEMPAT LAHIR");
			$excel->setActiveSheetIndex(0)->setCellValue('G4', "TANGGAL LAHIR");
			$excel->setActiveSheetIndex(0)->setCellValue('H4', "NIK");
			$excel->setActiveSheetIndex(0)->setCellValue('I4', "AGAMA");
			$excel->setActiveSheetIndex(0)->setCellValue('J4', "ALAMAT");
			$excel->setActiveSheetIndex(0)->setCellValue('K4', "RT");
			$excel->setActiveSheetIndex(0)->setCellValue('L4', "RW");
			$excel->setActiveSheetIndex(0)->setCellValue('M4', "DUSUN");
			$excel->setActiveSheetIndex(0)->setCellValue('N4', "KELURAHAN");
			$excel->setActiveSheetIndex(0)->setCellValue('O4', "KECAMATAN");
			$excel->setActiveSheetIndex(0)->setCellValue('P4', "KABUPATEN");
			$excel->setActiveSheetIndex(0)->setCellValue('Q4', "PROPINSI");
			$excel->setActiveSheetIndex(0)->setCellValue('R4', "STATUS TINGGAL");
			$excel->setActiveSheetIndex(0)->setCellValue('S4', "JENIS TINGGAL");
			$excel->setActiveSheetIndex(0)->setCellValue('T4', "ALAT TRANSPORTASI");
			$excel->setActiveSheetIndex(0)->setCellValue('U4', "TELP");
			$excel->setActiveSheetIndex(0)->setCellValue('V4', "EMAIL");
			$excel->setActiveSheetIndex(0)->setCellValue('W4', "ANAK KE");
			$excel->setActiveSheetIndex(0)->setCellValue('X4', "JUMLAH SAUDARA");
			$excel->setActiveSheetIndex(0)->setCellValue('Y4', "NO KK");
			$excel->setActiveSheetIndex(0)->setCellValue('Z4', "NAMA AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AA4', "TEMPAT LAHIR AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AB4', "LAHIR AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AC4', "PENDIDIKAN AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AD4', "KERJA AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AE4', "HASIL AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AF4', "NIK AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AG4', "NAMA IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AH4', "TEMPAT LAHIR IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AI4', "LAHIR IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AJ4', "PENDIDIKAN IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AK4', "KERJA IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AL4', "HASIL IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AM4', "NIK IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AN4', "NAMA WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AO4', "TEMPAT LAHIR WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AP4', "LAHIR WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AQ4', "PENDIDIKAN WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AR4', "KERJA WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AS4', "HASIL WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AT4', "NIK WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AU4', "NO UN");
			$excel->setActiveSheetIndex(0)->setCellValue('AV4', "NO SKHUN");
			$excel->setActiveSheetIndex(0)->setCellValue('AW4', "NO IJAZAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AX4', "NO KPS");
			$excel->setActiveSheetIndex(0)->setCellValue('AY4', "NO KIP");
			$excel->setActiveSheetIndex(0)->setCellValue('AZ4', "NO KIS");
			$excel->setActiveSheetIndex(0)->setCellValue('BA4', "NO PKH");
			$excel->setActiveSheetIndex(0)->setCellValue('BB4', "BEASISWA");
			$excel->setActiveSheetIndex(0)->setCellValue('BC4', "KELAS 7");
			$excel->setActiveSheetIndex(0)->setCellValue('BD4', "KELAS 8");
			$excel->setActiveSheetIndex(0)->setCellValue('BE4', "KELAS 9");
			$excel->setActiveSheetIndex(0)->setCellValue('BF4', "KELAS AKTIF");
			$excel->setActiveSheetIndex(0)->setCellValue('BG4', "KELAS DIGITAL");
			$excel->setActiveSheetIndex(0)->setCellValue('BH4', "KELAS SEKOLAH ASAL");
			$excel->setActiveSheetIndex(0)->setCellValue('BI4', "ALAMAT SEKOLAH ASAL");
			$excel->setActiveSheetIndex(0)->setCellValue('BJ4', "JENIS MASUK");
			$excel->setActiveSheetIndex(0)->setCellValue('BK4', "TANGGAL MASUK");
			$excel->setActiveSheetIndex(0)->setCellValue('BL4', "KET KELUAR");
			$excel->setActiveSheetIndex(0)->setCellValue('BM4', "TANGGAL KELUAR");
			$excel->setActiveSheetIndex(0)->setCellValue('BN4', "ALASAN KELUAR");
			$excel->setActiveSheetIndex(0)->setCellValue('BO4', "NO SURAT KELUAR");
			$excel->setActiveSheetIndex(0)->setCellValue('BP4', "STATUS");
			$excel->setActiveSheetIndex(0)->setCellValue('BQ4', "UPDATED");
			$excel->setActiveSheetIndex(0)->setCellValue('BR4', "EDITOR");

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A4:BR4')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		// $siswa = $this->admin_model->getmts();

		$siswa = $this->admin_model->get_backup($par);

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($siswa as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('B'.$numrow, $data->nis, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('C'.$numrow, $data->nisn, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->jk);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->tmp_lahir);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->tgl_lahir);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('H'.$numrow, $data->nik,PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->agama);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->alamat);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->rt);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->rw);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->dusun);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->kelurahan);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->kecamatan);
			$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->kabupaten);
			$excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->propinsi);
			$excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->sts_tinggal);
			$excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->jns_tinggal);
			$excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->alat_trans);
			$excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->telp);
			$excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->email);
			$excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->anak_ke);
			$excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $data->jml_sdr);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('Y'.$numrow, $data->no_kk,PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $data->nm_ayh);
			$excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $data->tlahir_ayh);
			$excel->setActiveSheetIndex(0)->setCellValue('AB'.$numrow, $data->lahir_ayh);
			$excel->setActiveSheetIndex(0)->setCellValue('AC'.$numrow, $data->pend_ayh);
			$excel->setActiveSheetIndex(0)->setCellValue('AD'.$numrow, $data->kerja_ayh);
			$excel->setActiveSheetIndex(0)->setCellValue('AE'.$numrow, $data->hasil_ayh);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('AF'.$numrow, $data->nik_ayh,PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('AG'.$numrow, $data->nm_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('AH'.$numrow, $data->tlahir_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('AI'.$numrow, $data->lahir_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('AJ'.$numrow, $data->pend_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('AK'.$numrow, $data->kerja_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('AL'.$numrow, $data->hasil_ibu);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('AM'.$numrow, $data->nik_ibu,PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('AN'.$numrow, $data->nm_wl);
			$excel->setActiveSheetIndex(0)->setCellValue('AO'.$numrow, $data->tlahir_wl);
			$excel->setActiveSheetIndex(0)->setCellValue('AP'.$numrow, $data->lahir_wl);
			$excel->setActiveSheetIndex(0)->setCellValue('AQ'.$numrow, $data->pend_wl);
			$excel->setActiveSheetIndex(0)->setCellValue('AR'.$numrow, $data->kerja_wl);
			$excel->setActiveSheetIndex(0)->setCellValue('AS'.$numrow, $data->hasil_wl);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('AT'.$numrow, $data->nik_wl,PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('AU'.$numrow, $data->no_un);
			$excel->setActiveSheetIndex(0)->setCellValue('AV'.$numrow, $data->no_skhun);
			$excel->setActiveSheetIndex(0)->setCellValue('AW'.$numrow, $data->no_ijazah);
			$excel->setActiveSheetIndex(0)->setCellValue('AX'.$numrow, $data->no_kps);
			$excel->setActiveSheetIndex(0)->setCellValue('AY'.$numrow, $data->no_kip);
			$excel->setActiveSheetIndex(0)->setCellValue('AZ'.$numrow, $data->no_kis);
			$excel->setActiveSheetIndex(0)->setCellValue('BA'.$numrow, $data->no_pkh);
			$excel->setActiveSheetIndex(0)->setCellValue('BB'.$numrow, $data->beasiswa);
			$excel->setActiveSheetIndex(0)->setCellValue('BC'.$numrow, $data->kelas_7);
			$excel->setActiveSheetIndex(0)->setCellValue('BD'.$numrow, $data->kelas_8);
			$excel->setActiveSheetIndex(0)->setCellValue('BE'.$numrow, $data->kelas_9);
			$excel->setActiveSheetIndex(0)->setCellValue('BF'.$numrow, $data->kelas_aktf);
			$excel->setActiveSheetIndex(0)->setCellValue('BG'.$numrow, $data->kelas_dig);
			$excel->setActiveSheetIndex(0)->setCellValue('BH'.$numrow, $data->skl_asal);
			$excel->setActiveSheetIndex(0)->setCellValue('BI'.$numrow, $data->almt_skl);
			$excel->setActiveSheetIndex(0)->setCellValue('BJ'.$numrow, $data->jns_masuk);
			$excel->setActiveSheetIndex(0)->setCellValue('BK'.$numrow, $data->tgl_masuk);
			$excel->setActiveSheetIndex(0)->setCellValue('BL'.$numrow, $data->ket_out);
			$excel->setActiveSheetIndex(0)->setCellValue('BM'.$numrow, $data->tgl_out);
			$excel->setActiveSheetIndex(0)->setCellValue('BN'.$numrow, $data->alasan_out);
			$excel->setActiveSheetIndex(0)->setCellValue('BO'.$numrow, $data->nosrt_out);
			$excel->setActiveSheetIndex(0)->setCellValue('BP'.$numrow, $data->status);
			$excel->setActiveSheetIndex(0)->setCellValue('BQ'.$numrow, $data->progres);
			$excel->setActiveSheetIndex(0)->setCellValue('BR'.$numrow, $data->editor);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow.':BR'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(19); 
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(16); 
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(30); 
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(5); 
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(14); 
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(14); 
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(19);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(8);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('N')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('R')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('V')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('W')->setWidth(8);
		$excel->getActiveSheet()->getColumnDimension('X')->setWidth(8);
		$excel->getActiveSheet()->getColumnDimension('Y')->setWidth(17);
		$excel->getActiveSheet()->getColumnDimension('Z')->setWidth(31);
		$excel->getActiveSheet()->getColumnDimension('AA')->setWidth(19);
		$excel->getActiveSheet()->getColumnDimension('AB')->setWidth(11);
		$excel->getActiveSheet()->getColumnDimension('AC')->setWidth(18);
		$excel->getActiveSheet()->getColumnDimension('AD')->setWidth(16);
		$excel->getActiveSheet()->getColumnDimension('AE')->setWidth(27);
		$excel->getActiveSheet()->getColumnDimension('AF')->setWidth(17);
		$excel->getActiveSheet()->getColumnDimension('AG')->setWidth(31);
		$excel->getActiveSheet()->getColumnDimension('AH')->setWidth(19);
		$excel->getActiveSheet()->getColumnDimension('AI')->setWidth(11);
		$excel->getActiveSheet()->getColumnDimension('AJ')->setWidth(18);
		$excel->getActiveSheet()->getColumnDimension('AK')->setWidth(16);
		$excel->getActiveSheet()->getColumnDimension('AL')->setWidth(27);
		$excel->getActiveSheet()->getColumnDimension('AM')->setWidth(17);
		$excel->getActiveSheet()->getColumnDimension('AN')->setWidth(31);
		$excel->getActiveSheet()->getColumnDimension('AO')->setWidth(19);
		$excel->getActiveSheet()->getColumnDimension('AP')->setWidth(11);
		$excel->getActiveSheet()->getColumnDimension('AQ')->setWidth(18);
		$excel->getActiveSheet()->getColumnDimension('AR')->setWidth(16);
		$excel->getActiveSheet()->getColumnDimension('AS')->setWidth(27);
		$excel->getActiveSheet()->getColumnDimension('AT')->setWidth(17);
		$excel->getActiveSheet()->getColumnDimension('AU')->setWidth(22);
		$excel->getActiveSheet()->getColumnDimension('AV')->setWidth(22);
		$excel->getActiveSheet()->getColumnDimension('AW')->setWidth(22);
		$excel->getActiveSheet()->getColumnDimension('AX')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('AY')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('AZ')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BA')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BB')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BC')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BD')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BE')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BF')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BG')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BH')->setWidth(37);
		$excel->getActiveSheet()->getColumnDimension('BI')->setWidth(47);
		$excel->getActiveSheet()->getColumnDimension('BJ')->setWidth(13);
		$excel->getActiveSheet()->getColumnDimension('BK')->setWidth(16);
		$excel->getActiveSheet()->getColumnDimension('BL')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('BM')->setWidth(16);
		$excel->getActiveSheet()->getColumnDimension('BN')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('BO')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('BP')->setWidth(7);
		$excel->getActiveSheet()->getColumnDimension('BQ')->setWidth(18);
		$excel->getActiveSheet()->getColumnDimension('BR')->setWidth(25);
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Data Siswa");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Backup Database '.$lembaga.'.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

// =====================================================================================================================================

	public function form($par)
	{
		$data = array(); 
		if(isset($_POST['preview'])){ 
			
			$upload = $this->admin_model->upload_file($this->filename);
			
			
			if($upload['result'] == "success"){ 
				
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); 
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				$data['sheet'] 		= $sheet;
			}else{ 
				$data['upload_error'] = $upload['error']; 
			}
		}
		$this->load->view('admin/upload-'.$par,$data);
	}

// =====================================================================================================================================

	public function import($par)
	{
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx');
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		$data = array();
		
		$numrow = 1;
		foreach($sheet as $row){
			if($numrow > 1){
				array_push($data, array(
					'nis'=>$row['B'],
					'nisn'=>$row['C'],
					'nama'=>$row['D'],
					'jk'=>$row['E'],
					'tmp_lahir'=>$row['F'],
					'tgl_lahir'=>$row['G'],
					'nik'=>$row['H'],
					'agama'=>$row['I'],
					'alamat'=>$row['J'],
					'rt'=>$row['K'],
					'rw'=>$row['L'],
					'dusun'=>$row['M'],
					'kelurahan'=>$row['N'],
					'kecamatan'=>$row['O'],
					'kabupaten'=>$row['P'],
					'propinsi'=>$row['Q'],
					'sts_tinggal'=>$row['R'],
					'jns_tinggal'=>$row['S'],
					'alat_trans'=>$row['T'],
					'telp'=>$row['U'],
					'email'=>$row['V'],
					'anak_ke'=>$row['W'],
					'jml_sdr'=>$row['X'],
					'no_kk' =>$row['Y'],
					'nm_ayh'=>$row['Z'],
					'tlahir_ayh'=>$row['AA'],
					'lahir_ayh'=>$row['AB'],
					'pend_ayh'=>$row['AC'],
					'kerja_ayh'=>$row['AD'],
					'hasil_ayh'=>$row['AE'],
					'nik_ayh'=>$row['AF'],
					'nm_ibu'=>$row['AG'],
					'tlahir_ibu'=>$row['AH'],
					'lahir_ibu'=>$row['AI'],
					'pend_ibu'=>$row['AJ'],
					'kerja_ibu'=>$row['AK'],
					'hasil_ibu'=>$row['AL'],
					'nik_ibu'=>$row['AM'],
					'nm_wl'=>$row['AN'],
					'tlahir_wl'=>$row['AO'],
					'lahir_wl'=>$row['AP'],
					'pend_wl'=>$row['AQ'],
					'kerja_wl'=>$row['AR'],
					'hasil_wl'=>$row['AS'],
					'nik_wl'=>$row['AT'],
					'no_un'=>$row['AU'],
					'no_skhun'=>$row['AV'],
					'no_ijazah'=>$row['AW'],
					'no_kps'=>$row['AX'],
					'no_kip'=>$row['AY'],
					'no_kis'=>$row['AZ'],
					'no_pkh'=>$row['BA'],
					'beasiswa'=>$row['BB'],
					'kelas_7'=>$row['BC'],
					'kelas_8'=>$row['BD'],
					'kelas_9'=>$row['BE'],
					'kelas_aktf'=>$row['BF'],
					'kelas_dig'=>$row['BG'],
					'skl_asal'=>$row['BH'],
					'almt_skl'=>$row['BI'],
					'jns_masuk'=>$row['BJ'],
					'tgl_masuk'=>$row['BK'],
					'ket_out'=>$row['BL'],
					'tgl_out'=>$row['BM'],
					'alasan_out'=>$row['BN'],
					'nosrt_out'=>$row['BO'],
					'status'=>$row['BP'],
					'foto'=>$row['BQ'],
					'progres'=>date("d/m/Y H:i:s"),
					'editor'=>$this->session->userdata('nama'),
				));
			}
			
			$numrow++; 
		}

		$this->admin_model->insert_multi($data,$par);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Import data',text: 'data berhasil di tambahkan'}");
		redirect("admin/upload/".$par);
	}
	
// =====================================================================================================================================

	public function report_detail($par,$kls)
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		$kelas = $kls;
		$lembaga = strtoupper($par);
		$user = $this->session->userdata('nama');

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Mukhammad Yasin')
							   ->setLastModifiedBy($user)
							   ->setTitle("Data Detail Siswa ".$lembaga)
							   ->setSubject("Siswa ".$kelas)
							   ->setDescription("Data Siswa ".$lembaga)
							   ->setKeywords("Data Siswa ".$lembaga);

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'numberformat' => array('code' => PHPExcel_Style_NumberFormat::FORMAT_TEXT),
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			),
		);



		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATABASE SISWA ".$lembaga." KELAS ".$kelas); // Set kolom A1 dengan tulisan "DATA SISWA"
		date_default_timezone_set('Asia/Jakarta');
		$excel->setActiveSheetIndex(0)->setCellValue('A2', "Diunduh oleh ".$user." pada ".date("d/m/Y h:i:s"));
		// $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(13); // Set font size 15 untuk kolom A1
		// $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
			$excel->setActiveSheetIndex(0)->setCellValue('A4', "NO");
			$excel->setActiveSheetIndex(0)->setCellValue('B4', "NIS");
			$excel->setActiveSheetIndex(0)->setCellValue('C4', "NISN");
			$excel->setActiveSheetIndex(0)->setCellValue('D4', "NAMA");
			$excel->setActiveSheetIndex(0)->setCellValue('E4', "JK");
			$excel->setActiveSheetIndex(0)->setCellValue('F4', "TEMPAT LAHIR");
			$excel->setActiveSheetIndex(0)->setCellValue('G4', "TANGGAL LAHIR");
			$excel->setActiveSheetIndex(0)->setCellValue('H4', "NIK");
			$excel->setActiveSheetIndex(0)->setCellValue('I4', "AGAMA");
			$excel->setActiveSheetIndex(0)->setCellValue('J4', "ALAMAT");
			$excel->setActiveSheetIndex(0)->setCellValue('K4', "RT");
			$excel->setActiveSheetIndex(0)->setCellValue('L4', "RW");
			$excel->setActiveSheetIndex(0)->setCellValue('M4', "DUSUN");
			$excel->setActiveSheetIndex(0)->setCellValue('N4', "KELURAHAN");
			$excel->setActiveSheetIndex(0)->setCellValue('O4', "KECAMATAN");
			$excel->setActiveSheetIndex(0)->setCellValue('P4', "KABUPATEN");
			$excel->setActiveSheetIndex(0)->setCellValue('Q4', "PROPINSI");
			$excel->setActiveSheetIndex(0)->setCellValue('R4', "STATUS TINGGAL");
			$excel->setActiveSheetIndex(0)->setCellValue('S4', "JENIS TINGGAL");
			$excel->setActiveSheetIndex(0)->setCellValue('T4', "ALAT TRANSPORTASI");
			$excel->setActiveSheetIndex(0)->setCellValue('U4', "TELP");
			$excel->setActiveSheetIndex(0)->setCellValue('V4', "EMAIL");
			$excel->setActiveSheetIndex(0)->setCellValue('W4', "ANAK KE");
			$excel->setActiveSheetIndex(0)->setCellValue('X4', "JUMLAH SAUDARA");
			$excel->setActiveSheetIndex(0)->setCellValue('Y4', "NO KK");
			$excel->setActiveSheetIndex(0)->setCellValue('Z4', "NAMA AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AA4', "TEMPAT LAHIR AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AB4', "LAHIR AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AC4', "PENDIDIKAN AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AD4', "KERJA AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AE4', "HASIL AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AF4', "NIK AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AG4', "NAMA IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AH4', "TEMPAT LAHIR IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AI4', "LAHIR IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AJ4', "PENDIDIKAN IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AK4', "KERJA IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AL4', "HASIL IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AM4', "NIK IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AN4', "NAMA WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AO4', "TEMPAT LAHIR WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AP4', "LAHIR WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AQ4', "PENDIDIKAN WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AR4', "KERJA WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AS4', "HASIL WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AT4', "NIK WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AU4', "NO UN");
			$excel->setActiveSheetIndex(0)->setCellValue('AV4', "NO SKHUN");
			$excel->setActiveSheetIndex(0)->setCellValue('AW4', "NO IJAZAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AX4', "NO KPS");
			$excel->setActiveSheetIndex(0)->setCellValue('AY4', "NO KIP");
			$excel->setActiveSheetIndex(0)->setCellValue('AZ4', "NO KIS");
			$excel->setActiveSheetIndex(0)->setCellValue('BA4', "NO PKH");
			$excel->setActiveSheetIndex(0)->setCellValue('BB4', "BEASISWA");
			$excel->setActiveSheetIndex(0)->setCellValue('BC4', "KELAS 7");
			$excel->setActiveSheetIndex(0)->setCellValue('BD4', "KELAS 8");
			$excel->setActiveSheetIndex(0)->setCellValue('BE4', "KELAS 9");
			$excel->setActiveSheetIndex(0)->setCellValue('BF4', "KELAS AKTIF");
			$excel->setActiveSheetIndex(0)->setCellValue('BG4', "KELAS DIGITAL");
			$excel->setActiveSheetIndex(0)->setCellValue('BH4', "KELAS SEKOLAH ASAL");
			$excel->setActiveSheetIndex(0)->setCellValue('BI4', "ALAMAT SEKOLAH ASAL");
			$excel->setActiveSheetIndex(0)->setCellValue('BJ4', "JENIS MASUK");
			$excel->setActiveSheetIndex(0)->setCellValue('BK4', "TANGGAL MASUK");
			$excel->setActiveSheetIndex(0)->setCellValue('BL4', "KET KELUAR");
			$excel->setActiveSheetIndex(0)->setCellValue('BM4', "TANGGAL KELUAR");
			$excel->setActiveSheetIndex(0)->setCellValue('BN4', "ALASAN KELUAR");
			$excel->setActiveSheetIndex(0)->setCellValue('BO4', "NO SURAT KELUAR");
			$excel->setActiveSheetIndex(0)->setCellValue('BP4', "STATUS");
			$excel->setActiveSheetIndex(0)->setCellValue('BQ4', "UPDATED");
			$excel->setActiveSheetIndex(0)->setCellValue('BR4', "EDITOR");


		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A4:BR4')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$siswa = $this->admin_model->filter_kelas($par,$kls);

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($siswa as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('B'.$numrow, $data->nis, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('C'.$numrow, $data->nisn, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->jk);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->tmp_lahir);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->tgl_lahir);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('H'.$numrow, $data->nik,PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->agama);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->alamat);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->rt);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->rw);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->dusun);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->kelurahan);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->kecamatan);
			$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->kabupaten);
			$excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->propinsi);
			$excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->sts_tinggal);
			$excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->jns_tinggal);
			$excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->alat_trans);
			$excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->telp);
			$excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->email);
			$excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->anak_ke);
			$excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $data->jml_sdr);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('Y'.$numrow, $data->no_kk,PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $data->nm_ayh);
			$excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $data->tlahir_ayh);
			$excel->setActiveSheetIndex(0)->setCellValue('AB'.$numrow, $data->lahir_ayh);
			$excel->setActiveSheetIndex(0)->setCellValue('AC'.$numrow, $data->pend_ayh);
			$excel->setActiveSheetIndex(0)->setCellValue('AD'.$numrow, $data->kerja_ayh);
			$excel->setActiveSheetIndex(0)->setCellValue('AE'.$numrow, $data->hasil_ayh);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('AF'.$numrow, $data->nik_ayh,PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('AG'.$numrow, $data->nm_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('AH'.$numrow, $data->tlahir_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('AI'.$numrow, $data->lahir_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('AJ'.$numrow, $data->pend_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('AK'.$numrow, $data->kerja_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('AL'.$numrow, $data->hasil_ibu);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('AM'.$numrow, $data->nik_ibu,PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('AN'.$numrow, $data->nm_wl);
			$excel->setActiveSheetIndex(0)->setCellValue('AO'.$numrow, $data->tlahir_wl);
			$excel->setActiveSheetIndex(0)->setCellValue('AP'.$numrow, $data->lahir_wl);
			$excel->setActiveSheetIndex(0)->setCellValue('AQ'.$numrow, $data->pend_wl);
			$excel->setActiveSheetIndex(0)->setCellValue('AR'.$numrow, $data->kerja_wl);
			$excel->setActiveSheetIndex(0)->setCellValue('AS'.$numrow, $data->hasil_wl);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('AT'.$numrow, $data->nik_wl,PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('AU'.$numrow, $data->no_un);
			$excel->setActiveSheetIndex(0)->setCellValue('AV'.$numrow, $data->no_skhun);
			$excel->setActiveSheetIndex(0)->setCellValue('AW'.$numrow, $data->no_ijazah);
			$excel->setActiveSheetIndex(0)->setCellValue('AX'.$numrow, $data->no_kps);
			$excel->setActiveSheetIndex(0)->setCellValue('AY'.$numrow, $data->no_kip);
			$excel->setActiveSheetIndex(0)->setCellValue('AZ'.$numrow, $data->no_kis);
			$excel->setActiveSheetIndex(0)->setCellValue('BA'.$numrow, $data->no_pkh);
			$excel->setActiveSheetIndex(0)->setCellValue('BB'.$numrow, $data->beasiswa);
			$excel->setActiveSheetIndex(0)->setCellValue('BC'.$numrow, $data->kelas_7);
			$excel->setActiveSheetIndex(0)->setCellValue('BD'.$numrow, $data->kelas_8);
			$excel->setActiveSheetIndex(0)->setCellValue('BE'.$numrow, $data->kelas_9);
			$excel->setActiveSheetIndex(0)->setCellValue('BF'.$numrow, $data->kelas_aktf);
			$excel->setActiveSheetIndex(0)->setCellValue('BG'.$numrow, $data->kelas_dig);
			$excel->setActiveSheetIndex(0)->setCellValue('BH'.$numrow, $data->skl_asal);
			$excel->setActiveSheetIndex(0)->setCellValue('BI'.$numrow, $data->almt_skl);
			$excel->setActiveSheetIndex(0)->setCellValue('BJ'.$numrow, $data->jns_masuk);
			$excel->setActiveSheetIndex(0)->setCellValue('BK'.$numrow, $data->tgl_masuk);
			$excel->setActiveSheetIndex(0)->setCellValue('BL'.$numrow, $data->ket_out);
			$excel->setActiveSheetIndex(0)->setCellValue('BM'.$numrow, $data->tgl_out);
			$excel->setActiveSheetIndex(0)->setCellValue('BN'.$numrow, $data->alasan_out);
			$excel->setActiveSheetIndex(0)->setCellValue('BO'.$numrow, $data->nosrt_out);
			$excel->setActiveSheetIndex(0)->setCellValue('BP'.$numrow, $data->status);
			$excel->setActiveSheetIndex(0)->setCellValue('BQ'.$numrow, $data->progres);
			$excel->setActiveSheetIndex(0)->setCellValue('BR'.$numrow, $data->editor);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow.':BR'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(19); 
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(16); 
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(30); 
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(5); 
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(14); 
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(14); 
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(19);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(8);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('N')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('R')->setWidth(23);
		$excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('V')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('W')->setWidth(8);
		$excel->getActiveSheet()->getColumnDimension('X')->setWidth(8);
		$excel->getActiveSheet()->getColumnDimension('Y')->setWidth(17);
		$excel->getActiveSheet()->getColumnDimension('Z')->setWidth(31);
		$excel->getActiveSheet()->getColumnDimension('AA')->setWidth(19);
		$excel->getActiveSheet()->getColumnDimension('AB')->setWidth(11);
		$excel->getActiveSheet()->getColumnDimension('AC')->setWidth(18);
		$excel->getActiveSheet()->getColumnDimension('AD')->setWidth(16);
		$excel->getActiveSheet()->getColumnDimension('AE')->setWidth(27);
		$excel->getActiveSheet()->getColumnDimension('AF')->setWidth(17);
		$excel->getActiveSheet()->getColumnDimension('AG')->setWidth(31);
		$excel->getActiveSheet()->getColumnDimension('AH')->setWidth(19);
		$excel->getActiveSheet()->getColumnDimension('AI')->setWidth(11);
		$excel->getActiveSheet()->getColumnDimension('AJ')->setWidth(18);
		$excel->getActiveSheet()->getColumnDimension('AK')->setWidth(16);
		$excel->getActiveSheet()->getColumnDimension('AL')->setWidth(27);
		$excel->getActiveSheet()->getColumnDimension('AM')->setWidth(17);
		$excel->getActiveSheet()->getColumnDimension('AN')->setWidth(31);
		$excel->getActiveSheet()->getColumnDimension('AO')->setWidth(19);
		$excel->getActiveSheet()->getColumnDimension('AP')->setWidth(11);
		$excel->getActiveSheet()->getColumnDimension('AQ')->setWidth(18);
		$excel->getActiveSheet()->getColumnDimension('AR')->setWidth(16);
		$excel->getActiveSheet()->getColumnDimension('AS')->setWidth(27);
		$excel->getActiveSheet()->getColumnDimension('AT')->setWidth(17);
		$excel->getActiveSheet()->getColumnDimension('AU')->setWidth(22);
		$excel->getActiveSheet()->getColumnDimension('AV')->setWidth(22);
		$excel->getActiveSheet()->getColumnDimension('AW')->setWidth(22);
		$excel->getActiveSheet()->getColumnDimension('AX')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('AY')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('AZ')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BA')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BB')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BC')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BD')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BE')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BF')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BG')->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension('BH')->setWidth(37);
		$excel->getActiveSheet()->getColumnDimension('BI')->setWidth(47);
		$excel->getActiveSheet()->getColumnDimension('BJ')->setWidth(13);
		$excel->getActiveSheet()->getColumnDimension('BK')->setWidth(16);
		$excel->getActiveSheet()->getColumnDimension('BL')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('BM')->setWidth(16);
		$excel->getActiveSheet()->getColumnDimension('BN')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('BO')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('BP')->setWidth(7);
		$excel->getActiveSheet()->getColumnDimension('BQ')->setWidth(18);
		$excel->getActiveSheet()->getColumnDimension('BR')->setWidth(25);

		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Data Siswa ");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Detail Siswa '.$lembaga.' '.$kelas.'.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}	
	
}