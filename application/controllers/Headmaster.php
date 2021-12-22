<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Headmaster extends CI_Controller {
	private $filename = "import_data";

	public function __construct()
	{
		parent::__construct();
	    $this->load->model("admin_model");
        $this->load->library('form_validation');
        $this->load->helper(array('form','url','tgl_indo'));
		if($this->session->userdata('jabatan')!="headmaster")
		{
			redirect('page/proses_log');
		}
	}
	
	public function index()
	{
		$data['dbinfo'] = $this->admin_model->getinfo();
		$data['dbuser'] = $this->admin_model->getuserdas();
		$this->load->view('headmaster/dasboard',$data);
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
		redirect('headmaster');
	}

//==============================================================

	public function sk_mts($id)
	{
		$data['set'] = $this->admin_model->getset(1);
		$data['baca'] = $this->admin_model->getByIdmts($id);
		$this->load->view('border',$data);
	}

	public function sk_ma($id)
	{
		$data['set'] = $this->admin_model->getset(1);
		$data['baca'] = $this->admin_model->getByIdma($id);
		$this->load->view('border',$data);
	}

	public function sk_smp($id)
	{
		$data['set'] = $this->admin_model->getset(1);
		$data['baca'] = $this->admin_model->getByIdsmp($id);
		$this->load->view('border',$data);
	}

	public function sk_smk($id)
	{
		$data['set'] = $this->admin_model->getset(1);
		$data['baca'] = $this->admin_model->getByIdsmk($id);
		$this->load->view('border',$data);
	}

//==============================================================

	public function jumlah()
	{
		$data['dbklsmts'] = $this->admin_model->getkls_mts();
		$data['dbklsma'] = $this->admin_model->getkls_ma();
		$data['dbklssmp'] = $this->admin_model->getkls_smp();
		$data['dbklssmk'] = $this->admin_model->getkls_smk();
		$this->load->view('headmaster/jumlah',$data);
	}
//-------------------------------------------------------------

	public function master()
	{
		$this->load->view('headmaster/master');
	}

//-------------------------------------------------------------
	public function user()
	{
		$data['dbuser'] = $this->admin_model->getuser_h();
		$this->load->view('headmaster/user',$data);
	}

	public function edituser($id)
	{
		$data['cats'] 	= $this->admin_model->getkls();
		$data['dbuser'] = $this->admin_model->getByIduser($id);
		$this->load->view('headmaster/user-edit',$data);
	}

	public function adduser()
	{
		$data['cats'] 	= $this->admin_model->getkls();
		$this->load->view('headmaster/user-form',$data);
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
					$this->load->view('headmaster/user-form',$ambil);
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
					redirect('headmaster/user',$ambil);
					// $ambil['dbuser'] = $this->admin_model->getuser();
					// $this->load->view('headmaster/user',$ambil);
		}
		else
		{
			$ambil['dbuser'] = $this->admin_model->getuser();
			$this->load->view('headmaster/user',$ambil);
		}
	}

	public function updateuser()
	{
  		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
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
				$this->load->view('headmaster/user-edit', $error);
			}
			 	$id 				= $this->input->post('id');
			 	$data['username'] 	= $this->input->post('username');
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
				redirect('headmaster/user');
		}
		else
		{
			$id = $this->input->post('id');
			$data['dbuser'] = $this->admin_model->getByIduser($id);
			$this->load->view('headmaster/user-edit',$data);
		}
	}

//-------------------------------------------------------------
	public function dataklsmts($kelas)
	{
		$data['dbkls'] = $this->admin_model->fil_mts($kelas);
		$this->load->view('headmaster/datakls_mts',$data);
	}

	public function dataklsma($kelas)
	{
		$data['dbkls'] = $this->admin_model->fil_ma($kelas);
		$this->load->view('headmaster/datakls_ma',$data);
	}

	public function dataklssmp($kelas)
	{
		$data['dbkls'] = $this->admin_model->fil_smp($kelas);
		$this->load->view('headmaster/datakls_smp',$data);
	}

	public function dataklssmk($kelas)
	{
		$data['dbkls'] = $this->admin_model->fil_smk($kelas);
		$this->load->view('headmaster/datakls_smk',$data);
	}

//-------------------------------------------------------------
	
	public function vervalmts()
	{
		$data['dbmts'] = $this->admin_model->getvalid_mts();
		$this->load->view('headmaster/verval_mts',$data);
	}

	public function vervalma()
	{
		$data['dbma'] = $this->admin_model->getvalid_ma();
		$this->load->view('headmaster/verval_ma',$data);
	}

	public function vervalsmp()
	{
		$data['dbsmp'] = $this->admin_model->getvalid_smp();
		$this->load->view('headmaster/verval_smp',$data);
	}

	public function vervalsmk()
	{
		$data['dbsmk'] = $this->admin_model->getvalid_smk();
		$this->load->view('headmaster/verval_smk',$data);
	}

//-------------------------------------------------------------
	
	public function datamts()
	{
		$data['dbmts'] = $this->admin_model->getmts();
		$this->load->view('headmaster/datamts',$data);
	}

	public function datama()
	{
		$data['dbma'] = $this->admin_model->getma();
		$this->load->view('headmaster/datama',$data);
	}

	public function datasmp()
	{
		$data['dbsmp'] = $this->admin_model->getsmp();
		$this->load->view('headmaster/datasmp',$data);
	}

	public function datasmk()
	{
		$data['dbsmk'] = $this->admin_model->getsmk();
		$this->load->view('headmaster/datasmk',$data);
	}

//-------------------------------------------------------------
	public function dataoutmts()
	{
		$data['dbmts'] = $this->admin_model->getmts_out();
		$this->load->view('headmaster/outdatamts',$data);
	}

	public function dataoutma()
	{
		$data['dbma'] = $this->admin_model->getma_out();
		$this->load->view('headmaster/outdatama',$data);
	}

	public function dataoutsmp()
	{
		$data['dbsmp'] = $this->admin_model->getsmp_out();
		$this->load->view('headmaster/outdatasmp',$data);
	}

	public function dataoutsmk()
	{
		$data['dbsmk'] = $this->admin_model->getsmk_out();
		$this->load->view('headmaster/outdatasmk',$data);
	}

//-------------------------------------------------------------
	public function klsmts()
	{
		$data['cats'] = $this->admin_model->getuser();
		$data['dbkls'] = $this->admin_model->getkls_mts();
		$this->load->view('headmaster/klsmts',$data);
	}

	public function klsma()
	{
		$data['cats'] = $this->admin_model->getuser();
		$data['dbkls'] = $this->admin_model->getkls_ma();
		$this->load->view('headmaster/klsma',$data);
	}

	public function klssmp()
	{
		$data['cats'] = $this->admin_model->getuser();
		$data['dbkls'] = $this->admin_model->getkls_smp();
		$this->load->view('headmaster/klssmp',$data);
	}

	public function klssmk()
	{
		$data['cats'] = $this->admin_model->getuser();
		$data['dbkls'] = $this->admin_model->getkls_smk();
		$this->load->view('headmaster/klssmk',$data);
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
		$this->load->view('headmaster/profill',$data);
	}

//-------------------------------------------------------------
	public	function viewmts($id)
	{
		$data['dbmts'] = $this->admin_model->getByIdmts($id);
		$this->load->view('headmaster/view-mts',$data);
	}

	public	function viewma($id)
	{
		$data['dbma'] = $this->admin_model->getByIdma($id);
		$this->load->view('headmaster/view-ma',$data);
	}

	public	function viewsmp($id)
	{
		$data['dbsmp'] = $this->admin_model->getByIdsmp($id);
		$this->load->view('headmaster/view-smp',$data);
	}

	public	function viewsmk($id)
	{
		$data['dbsmk'] = $this->admin_model->getByIdsmk($id);
		$this->load->view('headmaster/view-smk',$data);
	}

//-------------------------------------------------------------
	public function editmts($id)
	{
		$data['dbmts'] = $this->admin_model->getByIdmts($id);
		$data['cats'] = $this->admin_model->getkls_mts();
		$this->load->view('headmaster/edit-mts',$data);
	}

	public function editsmp($id)
	{
		$data['dbsmp'] = $this->admin_model->getByIdsmp($id);
		$data['cats'] = $this->admin_model->getkls_smp();
		$this->load->view('headmaster/edit-smp',$data);
	}

	public function editma($id)
	{
		$data['dbma'] = $this->admin_model->getByIdma($id);
		$data['cats'] = $this->admin_model->getkls_ma();
		$this->load->view('headmaster/edit-ma',$data);
	}

	public function editsmk($id)
	{
		$data['dbsmk'] = $this->admin_model->getByIdsmk($id);
		$data['cats'] = $this->admin_model->getkls_smk();
		$this->load->view('headmaster/edit-smk',$data);
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
				redirect('headmaster/klsmts','refresh');
			} else if($data['par']=="smp"){
				redirect('headmaster/klssmp','refresh');
			} else if($data['par']=="ma"){
				redirect('headmaster/klsma','refresh');
			} else if($data['par']=="smk"){
				redirect('headmaster/klssmk','refresh');
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
				redirect('headmaster/klsmts','refresh');
			} else if($data['par']=="smp"){
				redirect('headmaster/klssmp','refresh');
			} else if($data['par']=="ma"){
				redirect('headmaster/klsma','refresh');
			} else if($data['par']=="smk"){
				redirect('headmaster/klssmk','refresh');
			}
	}

// =====================================================================================================================================

	public function setting()
	{
		$data['set'] = $this->admin_model->getset(1);
		$this->load->view('headmaster/setting',$data);
	}

	public function saveset()
	{
	 	$data['tapel'] 				= $this->input->post('tapel');
	 	$data['semester'] 			= $this->input->post('semester');

		$this->admin_model->savkls($data);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Berhasil disimpan',}");
		redirect('headmaster/setting');
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
		redirect('headmaster/setting');
	}

	public function set_pengumuman()
	{
		$id 					= 1;
		$data['pengumuman'] 	= $this->input->post('pengumuman');
				
		$this->admin_model->editset($data,$id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Pengumuman diperbarui'}");
		
		redirect('headmaster/setting');
	}


// =====================================================================================================================================

	function del_user($id)
	{
		$this->admin_model->deluser($id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'user telah di hapus'}");
		redirect('headmaster/user');
	}

	function del_kls($id)
	{
		$this->admin_model->delkls($id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'kelas telah di hapus'}");
		redirect('headmaster/klsmts');
	}

	function del_info($id)
	{
		$this->admin_model->delinfo($id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'Info telah di hapus'}");
		redirect('admin');
	}

// =====================================================================================================================================

	public function uploadmts()
	{
		$this->load->view('headmaster/upload-mts');
	}

	public function uploadma()
	{
		$this->load->view('headmaster/upload-ma');
	}

	public function uploadsmp()
	{
		$this->load->view('headmaster/upload-smp');
	}

	public function uploadsmk()
	{
		$this->load->view('headmaster/upload-smk');
	}

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
				$this->load->view('headmaster/edit-mts', $error);
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
				$data['jns_tinggal'] = $this->input->post('jns_tinggal');
				$data['alat_trans'] = $this->input->post('alat_trans');
				$data['telp'] = $this->input->post('telp');
				$data['email'] = $this->input->post('email');
				$data['anak_ke'] = $this->input->post('anak_ke');
				$data['jml_sdr'] = $this->input->post('jml_sdr');
				$data['nm_ayh'] = $this->input->post('nm_ayh');
				$data['lahir_ayh'] = $this->input->post('lahir_ayh');
				$data['pend_ayh'] = $this->input->post('pend_ayh');
				$data['kerja_ayh'] = $this->input->post('kerja_ayh');
				$data['hasil_ayh'] = $this->input->post('hasil_ayh');
				$data['nik_ayh'] = $this->input->post('nik_ayh');
				$data['nm_ibu'] = $this->input->post('nm_ibu');
				$data['lahir_ibu'] = $this->input->post('lahir_ibu');
				$data['pend_ibu'] = $this->input->post('pend_ibu');
				$data['kerja_ibu'] = $this->input->post('kerja_ibu');
				$data['hasil_ibu'] = $this->input->post('hasil_ibu');
				$data['nik_ibu'] = $this->input->post('nik_ibu');
				$data['nm_wl'] = $this->input->post('nm_wl');
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
				redirect('headmaster/datamts');
		}
		else
		{
			$id = $this->input->post('id');
			$data['dbmts'] = $this->admin_model->getByIdmts($id);
			$data['cats'] = $this->admin_model->getkls_mts();
			$this->load->view('headmaster/edit-mts',$data);
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
				$this->load->view('headmaster/edit-smp', $error);
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
				$data['jns_tinggal'] = $this->input->post('jns_tinggal');
				$data['alat_trans'] = $this->input->post('alat_trans');
				$data['telp'] = $this->input->post('telp');
				$data['email'] = $this->input->post('email');
				$data['anak_ke'] = $this->input->post('anak_ke');
				$data['jml_sdr'] = $this->input->post('jml_sdr');
				$data['nm_ayh'] = $this->input->post('nm_ayh');
				$data['lahir_ayh'] = $this->input->post('lahir_ayh');
				$data['pend_ayh'] = $this->input->post('pend_ayh');
				$data['kerja_ayh'] = $this->input->post('kerja_ayh');
				$data['hasil_ayh'] = $this->input->post('hasil_ayh');
				$data['nik_ayh'] = $this->input->post('nik_ayh');
				$data['nm_ibu'] = $this->input->post('nm_ibu');
				$data['lahir_ibu'] = $this->input->post('lahir_ibu');
				$data['pend_ibu'] = $this->input->post('pend_ibu');
				$data['kerja_ibu'] = $this->input->post('kerja_ibu');
				$data['hasil_ibu'] = $this->input->post('hasil_ibu');
				$data['nik_ibu'] = $this->input->post('nik_ibu');
				$data['nm_wl'] = $this->input->post('nm_wl');
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
				redirect('headmaster/datasmp');
		}
		else
		{
			$id = $this->input->post('id');
			$data['dbsmp'] = $this->admin_model->getByIdsmp($id);
			$data['cats'] = $this->admin_model->getkls_smp();
			$this->load->view('headmaster/edit-smp',$data);
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
				$this->load->view('headmaster/edit-ma', $error);
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
				$data['jns_tinggal'] = $this->input->post('jns_tinggal');
				$data['alat_trans'] = $this->input->post('alat_trans');
				$data['telp'] = $this->input->post('telp');
				$data['email'] = $this->input->post('email');
				$data['anak_ke'] = $this->input->post('anak_ke');
				$data['jml_sdr'] = $this->input->post('jml_sdr');
				$data['nm_ayh'] = $this->input->post('nm_ayh');
				$data['lahir_ayh'] = $this->input->post('lahir_ayh');
				$data['pend_ayh'] = $this->input->post('pend_ayh');
				$data['kerja_ayh'] = $this->input->post('kerja_ayh');
				$data['hasil_ayh'] = $this->input->post('hasil_ayh');
				$data['nik_ayh'] = $this->input->post('nik_ayh');
				$data['nm_ibu'] = $this->input->post('nm_ibu');
				$data['lahir_ibu'] = $this->input->post('lahir_ibu');
				$data['pend_ibu'] = $this->input->post('pend_ibu');
				$data['kerja_ibu'] = $this->input->post('kerja_ibu');
				$data['hasil_ibu'] = $this->input->post('hasil_ibu');
				$data['nik_ibu'] = $this->input->post('nik_ibu');
				$data['nm_wl'] = $this->input->post('nm_wl');
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
				redirect('headmaster/datama');
		}
		else
		{
			$id = $this->input->post('id');
			$data['dbma'] = $this->admin_model->getByIdma($id);
			$data['cats'] = $this->admin_model->getkls_ma();
			$this->load->view('headmaster/edit-ma',$data);
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
				$this->load->view('headmaster/edit-smk', $error);
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
				$data['jns_tinggal'] = $this->input->post('jns_tinggal');
				$data['alat_trans'] = $this->input->post('alat_trans');
				$data['telp'] = $this->input->post('telp');
				$data['email'] = $this->input->post('email');
				$data['anak_ke'] = $this->input->post('anak_ke');
				$data['jml_sdr'] = $this->input->post('jml_sdr');
				$data['nm_ayh'] = $this->input->post('nm_ayh');
				$data['lahir_ayh'] = $this->input->post('lahir_ayh');
				$data['pend_ayh'] = $this->input->post('pend_ayh');
				$data['kerja_ayh'] = $this->input->post('kerja_ayh');
				$data['hasil_ayh'] = $this->input->post('hasil_ayh');
				$data['nik_ayh'] = $this->input->post('nik_ayh');
				$data['nm_ibu'] = $this->input->post('nm_ibu');
				$data['lahir_ibu'] = $this->input->post('lahir_ibu');
				$data['pend_ibu'] = $this->input->post('pend_ibu');
				$data['kerja_ibu'] = $this->input->post('kerja_ibu');
				$data['hasil_ibu'] = $this->input->post('hasil_ibu');
				$data['nik_ibu'] = $this->input->post('nik_ibu');
				$data['nm_wl'] = $this->input->post('nm_wl');
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
				redirect('headmaster/datasmk');
		}
		else
		{
			$id = $this->input->post('id');
			$data['dbsmk'] = $this->admin_model->getByIdsmk($id);
			$this->load->view('headmaster/edit-smk',$data);
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
					$data['jns_tinggal'] = $this->input->post('jns_tinggal');
					$data['alat_trans'] = $this->input->post('alat_trans');
					$data['telp'] = $this->input->post('telp');
					$data['email'] = $this->input->post('email');
					$data['anak_ke'] = $this->input->post('anak_ke');
					$data['jml_sdr'] = $this->input->post('jml_sdr');
					$data['nm_ayh'] = $this->input->post('nm_ayh');
					$data['lahir_ayh'] = $this->input->post('lahir_ayh');
					$data['pend_ayh'] = $this->input->post('pend_ayh');
					$data['kerja_ayh'] = $this->input->post('kerja_ayh');
					$data['hasil_ayh'] = $this->input->post('hasil_ayh');
					$data['nik_ayh'] = $this->input->post('nik_ayh');
					$data['nm_ibu'] = $this->input->post('nm_ibu');
					$data['lahir_ibu'] = $this->input->post('lahir_ibu');
					$data['pend_ibu'] = $this->input->post('pend_ibu');
					$data['kerja_ibu'] = $this->input->post('kerja_ibu');
					$data['hasil_ibu'] = $this->input->post('hasil_ibu');
					$data['nik_ibu'] = $this->input->post('nik_ibu');
					$data['nm_wl'] = $this->input->post('nm_wl');
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

					redirect('headmaster/datamts');
		}
		else
		{
				$data['dbmts'] = $this->admin_model->getmts();
				$this->load->view('headmaster/datamts',$data);
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
					$data['jns_tinggal'] = $this->input->post('jns_tinggal');
					$data['alat_trans'] = $this->input->post('alat_trans');
					$data['telp'] = $this->input->post('telp');
					$data['email'] = $this->input->post('email');
					$data['anak_ke'] = $this->input->post('anak_ke');
					$data['jml_sdr'] = $this->input->post('jml_sdr');
					$data['nm_ayh'] = $this->input->post('nm_ayh');
					$data['lahir_ayh'] = $this->input->post('lahir_ayh');
					$data['pend_ayh'] = $this->input->post('pend_ayh');
					$data['kerja_ayh'] = $this->input->post('kerja_ayh');
					$data['hasil_ayh'] = $this->input->post('hasil_ayh');
					$data['nik_ayh'] = $this->input->post('nik_ayh');
					$data['nm_ibu'] = $this->input->post('nm_ibu');
					$data['lahir_ibu'] = $this->input->post('lahir_ibu');
					$data['pend_ibu'] = $this->input->post('pend_ibu');
					$data['kerja_ibu'] = $this->input->post('kerja_ibu');
					$data['hasil_ibu'] = $this->input->post('hasil_ibu');
					$data['nik_ibu'] = $this->input->post('nik_ibu');
					$data['nm_wl'] = $this->input->post('nm_wl');
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

					redirect('headmaster/datama');
		}
		else
		{
				$data['dbma'] = $this->admin_model->getma();
				$this->load->view('headmaster/datama',$data);
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
					$data['jns_tinggal'] = $this->input->post('jns_tinggal');
					$data['alat_trans'] = $this->input->post('alat_trans');
					$data['telp'] = $this->input->post('telp');
					$data['email'] = $this->input->post('email');
					$data['anak_ke'] = $this->input->post('anak_ke');
					$data['jml_sdr'] = $this->input->post('jml_sdr');
					$data['nm_ayh'] = $this->input->post('nm_ayh');
					$data['lahir_ayh'] = $this->input->post('lahir_ayh');
					$data['pend_ayh'] = $this->input->post('pend_ayh');
					$data['kerja_ayh'] = $this->input->post('kerja_ayh');
					$data['hasil_ayh'] = $this->input->post('hasil_ayh');
					$data['nik_ayh'] = $this->input->post('nik_ayh');
					$data['nm_ibu'] = $this->input->post('nm_ibu');
					$data['lahir_ibu'] = $this->input->post('lahir_ibu');
					$data['pend_ibu'] = $this->input->post('pend_ibu');
					$data['kerja_ibu'] = $this->input->post('kerja_ibu');
					$data['hasil_ibu'] = $this->input->post('hasil_ibu');
					$data['nik_ibu'] = $this->input->post('nik_ibu');
					$data['nm_wl'] = $this->input->post('nm_wl');
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

					redirect('headmaster/datasmp');
		}
		else
		{
				$data['dbsmp'] = $this->admin_model->getsmp();
				$this->load->view('headmaster/datasmp',$data);
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
					$data['jns_tinggal'] = $this->input->post('jns_tinggal');
					$data['alat_trans'] = $this->input->post('alat_trans');
					$data['telp'] = $this->input->post('telp');
					$data['email'] = $this->input->post('email');
					$data['anak_ke'] = $this->input->post('anak_ke');
					$data['jml_sdr'] = $this->input->post('jml_sdr');
					$data['nm_ayh'] = $this->input->post('nm_ayh');
					$data['lahir_ayh'] = $this->input->post('lahir_ayh');
					$data['pend_ayh'] = $this->input->post('pend_ayh');
					$data['kerja_ayh'] = $this->input->post('kerja_ayh');
					$data['hasil_ayh'] = $this->input->post('hasil_ayh');
					$data['nik_ayh'] = $this->input->post('nik_ayh');
					$data['nm_ibu'] = $this->input->post('nm_ibu');
					$data['lahir_ibu'] = $this->input->post('lahir_ibu');
					$data['pend_ibu'] = $this->input->post('pend_ibu');
					$data['kerja_ibu'] = $this->input->post('kerja_ibu');
					$data['hasil_ibu'] = $this->input->post('hasil_ibu');
					$data['nik_ibu'] = $this->input->post('nik_ibu');
					$data['nm_wl'] = $this->input->post('nm_wl');
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

					redirect('headmaster/datasmk');
		}
		else
		{
				$data['dbsmk'] = $this->admin_model->getsmk();
				$this->load->view('headmaster/datasmk',$data);
		}
	}

// =====================================================================================================================================
	
	function deletemts($id)
	{
		$this->admin_model->delmts($id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'data berhasil di hapus'}");
		redirect('headmaster/datamts');
	}

	function deletema($id)
	{
		$this->admin_model->delma($id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'data berhasil di hapus'}");
		redirect('headmaster/datama');
	}

	function deletesmp($id)
	{
		$this->admin_model->delsmp($id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'data berhasil di hapus'}");
		redirect('headmaster/datasmp');
	}

	function deletesmk($id)
	{
		$this->admin_model->delsmk($id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'data berhasil di hapus'}");
		redirect('headmaster/datasmk');
	}

// =====================================================================================================================================

	public function export_mts()
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('My Notes Code')
							   ->setLastModifiedBy('My Notes Code')
							   ->setTitle("Data Siswa MTS")
							   ->setSubject("Siswa")
							   ->setDescription("Data Siswa MTS")
							   ->setKeywords("Data Siswa MTS");

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
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA MTS"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIS"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "JENIS KELAMIN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "KELAS"); // Set kolom E3 dengan tulisan "KELAS"

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$siswa = $this->admin_model->getmts();

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($siswa as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nis);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jk);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->kelas);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Data Siswa MTS");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Siswa MTS.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function export_ma()
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('My Notes Code')
							   ->setLastModifiedBy('My Notes Code')
							   ->setTitle("Data Siswa MA")
							   ->setSubject("Siswa")
							   ->setDescription("Data Siswa MA")
							   ->setKeywords("Data Siswa MA");

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
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA MA"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIS"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "JENIS KELAMIN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "ALAMAT"); // Set kolom E3 dengan tulisan "ALAMAT"

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$siswa = $this->admin_model->getma();

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($siswa as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nis);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jk);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->alamat);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Data Siswa MA");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Siswa MA.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function export_smp()
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('My Notes Code')
							   ->setLastModifiedBy('My Notes Code')
							   ->setTitle("Data Siswa SMP")
							   ->setSubject("Siswa")
							   ->setDescription("Data Siswa SMP")
							   ->setKeywords("Data Siswa SMP");

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
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA SMP"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIS"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "JENIS KELAMIN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "ALAMAT"); // Set kolom E3 dengan tulisan "ALAMAT"

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$siswa = $this->admin_model->getsmp();

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($siswa as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nis);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jk);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->alamat);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Data Siswa SMP");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Siswa SMP.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function export_smk()
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('My Notes Code')
							   ->setLastModifiedBy('My Notes Code')
							   ->setTitle("Data Siswa SMK")
							   ->setSubject("Siswa")
							   ->setDescription("Data Siswa SMK")
							   ->setKeywords("Data Siswa SMK");

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
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA SMK"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIS"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "JENIS KELAMIN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "ALAMAT"); // Set kolom E3 dengan tulisan "ALAMAT"

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$siswa = $this->admin_model->getsmk();

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($siswa as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nis);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jk);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->alamat);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Data Siswa SMK");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Siswa SMK.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

// =====================================================================================================================================
	
	public function ex_kls_mts($kelas)
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('My Notes Code')
							   ->setLastModifiedBy('My Notes Code')
							   ->setTitle("Data Siswa")
							   ->setSubject("Siswa")
							   ->setDescription("Data Siswa MTS")
							   ->setKeywords("Data Siswa");

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
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIS"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "JENIS KELAMIN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "ALAMAT"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "KELAS"); // Set kolom E3 dengan tulisan "ALAMAT"

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan data siswanya dengan kriteria
		// $siswa = $this->db->get_where('db_mts',array('kelas_aktf'=>'Kelas 7A'))->result();
		$siswa = $this->admin_model->fil_mts($kelas);

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($siswa as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nis);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jk);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->alamat);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->kelas_aktf);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom F
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Data Siswa MTS");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Siswa Kelas '.$kelas.'.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function ex_kls_ma($kelas)
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('My Notes Code')
							   ->setLastModifiedBy('My Notes Code')
							   ->setTitle("Data Siswa")
							   ->setSubject("Siswa")
							   ->setDescription("Data Siswa MA")
							   ->setKeywords("Data Siswa");

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
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIS"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "JENIS KELAMIN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "ALAMAT"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "KELAS"); // Set kolom E3 dengan tulisan "ALAMAT"

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan data siswanya dengan kriteria
		// $siswa = $this->db->get_where('db_ma',array('kelas_aktf'=>'Kelas 7A'))->result();
		$siswa = $this->admin_model->fil_ma($kelas);

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($siswa as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nis);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jk);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->alamat);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->kelas_aktf);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom F
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Data Siswa MA");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Siswa Kelas '.$kelas.'.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function ex_kls_smp($kelas)
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('My Notes Code')
							   ->setLastModifiedBy('My Notes Code')
							   ->setTitle("Data Siswa")
							   ->setSubject("Siswa")
							   ->setDescription("Data Siswa SMP")
							   ->setKeywords("Data Siswa");

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
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIS"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "JENIS KELAMIN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "ALAMAT"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "KELAS"); // Set kolom E3 dengan tulisan "ALAMAT"

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan data siswanya dengan kriteria
		// $siswa = $this->db->get_where('db_SMP',array('kelas_aktf'=>'Kelas 7A'))->result();
		$siswa = $this->admin_model->fil_smp($kelas);

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($siswa as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nis);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jk);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->alamat);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->kelas_aktf);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom F
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Data Siswa SMP");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Siswa Kelas '.$kelas.'.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function ex_kls_smk($kelas)
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('My Notes Code')
							   ->setLastModifiedBy('My Notes Code')
							   ->setTitle("Data Siswa")
							   ->setSubject("Siswa")
							   ->setDescription("Data Siswa SMK")
							   ->setKeywords("Data Siswa");

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
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIS"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "JENIS KELAMIN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "ALAMAT"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "KELAS"); // Set kolom E3 dengan tulisan "ALAMAT"

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan data siswanya dengan kriteria
		// $siswa = $this->db->get_where('db_SMP',array('kelas_aktf'=>'Kelas 7A'))->result();
		$siswa = $this->admin_model->fil_smk($kelas);

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($siswa as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nis);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jk);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->alamat);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->kelas_aktf);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom F
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Data Siswa SMK");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Siswa Kelas '.$kelas.'.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
// =====================================================================================================================================

	public function form_mts()
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
		$this->load->view('headmaster/upload-mts',$data);
	}

	public function form_ma()
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
		$this->load->view('headmaster/upload-ma',$data);
	}

	public function form_smp()
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
		$this->load->view('headmaster/upload-smp',$data);
	}

	public function form_smk()
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
		$this->load->view('headmaster/upload-smk',$data);
	}

// =====================================================================================================================================

	public function import_mts()
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
					'jns_tinggal'=>$row['R'],
					'alat_trans'=>$row['S'],
					'telp'=>$row['T'],
					'email'=>$row['U'],
					'anak_ke'=>$row['V'],
					'jml_sdr'=>$row['W'],
					'nm_ayh'=>$row['X'],
					'lahir_ayh'=>$row['Y'],
					'pend_ayh'=>$row['Z'],
					'kerja_ayh'=>$row['AA'],
					'hasil_ayh'=>$row['AB'],
					'nik_ayh'=>$row['AC'],
					'nm_ibu'=>$row['AD'],
					'lahir_ibu'=>$row['AE'],
					'pend_ibu'=>$row['AF'],
					'kerja_ibu'=>$row['AG'],
					'hasil_ibu'=>$row['AH'],
					'nik_ibu'=>$row['AI'],
					'nm_wl'=>$row['AJ'],
					'lahir_wl'=>$row['AK'],
					'pend_wl'=>$row['AL'],
					'kerja_wl'=>$row['AM'],
					'hasil_wl'=>$row['AN'],
					'nik_wl'=>$row['AO'],
					'no_un'=>$row['AP'],
					'no_skhun'=>$row['AQ'],
					'no_ijazah'=>$row['AR'],
					'no_kps'=>$row['AS'],
					'no_kip'=>$row['AT'],
					'no_kis'=>$row['AU'],
					'no_pkh'=>$row['AV'],
					'beasiswa'=>$row['AW'],
					'kelas_7'=>$row['AX'],
					'kelas_8'=>$row['AY'],
					'kelas_9'=>$row['AZ'],
					'kelas_aktf'=>$row['BA'],
					'kelas_dig'=>$row['BB'],
					'skl_asal'=>$row['BC'],
					'almt_skl'=>$row['BD'],
					'jns_masuk'=>$row['BE'],
					'tgl_masuk'=>$row['BF'],
					'ket_out'=>$row['BG'],
					'tgl_out'=>$row['BH'],
					'alasan_out'=>$row['BI'],
					'nosrt_out'=>$row['BJ'],
					'status'=>$row['BK'],
					'foto'=>$row['BL'],
					'progres'=>date("d/m/Y h:i:s"),
					'editor'=>$this->session->userdata('nama'),
				));
			}
			
			$numrow++; 
		}

		$this->admin_model->insert_multi_mts($data);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Import data',text: 'data berhasil di tambahkan'}");
		redirect("headmaster/uploadmts");
	}

	public function import_ma()
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
					'jns_tinggal'=>$row['R'],
					'alat_trans'=>$row['S'],
					'telp'=>$row['T'],
					'email'=>$row['U'],
					'anak_ke'=>$row['V'],
					'jml_sdr'=>$row['W'],
					'nm_ayh'=>$row['X'],
					'lahir_ayh'=>$row['Y'],
					'pend_ayh'=>$row['Z'],
					'kerja_ayh'=>$row['AA'],
					'hasil_ayh'=>$row['AB'],
					'nik_ayh'=>$row['AC'],
					'nm_ibu'=>$row['AD'],
					'lahir_ibu'=>$row['AE'],
					'pend_ibu'=>$row['AF'],
					'kerja_ibu'=>$row['AG'],
					'hasil_ibu'=>$row['AH'],
					'nik_ibu'=>$row['AI'],
					'nm_wl'=>$row['AJ'],
					'lahir_wl'=>$row['AK'],
					'pend_wl'=>$row['AL'],
					'kerja_wl'=>$row['AM'],
					'hasil_wl'=>$row['AN'],
					'nik_wl'=>$row['AO'],
					'no_un'=>$row['AP'],
					'no_skhun'=>$row['AQ'],
					'no_ijazah'=>$row['AR'],
					'no_kps'=>$row['AS'],
					'no_kip'=>$row['AT'],
					'no_kis'=>$row['AU'],
					'no_pkh'=>$row['AV'],
					'beasiswa'=>$row['AW'],
					'kelas_7'=>$row['AX'],
					'kelas_8'=>$row['AY'],
					'kelas_9'=>$row['AZ'],
					'kelas_aktf'=>$row['BA'],
					'kelas_dig'=>$row['BB'],
					'skl_asal'=>$row['BC'],
					'almt_skl'=>$row['BD'],
					'jns_masuk'=>$row['BE'],
					'tgl_masuk'=>$row['BF'],
					'ket_out'=>$row['BG'],
					'tgl_out'=>$row['BH'],
					'alasan_out'=>$row['BI'],
					'nosrt_out'=>$row['BJ'],
					'status'=>$row['BK'],
					'foto'=>$row['BL'],
					'progres'=>date("d/m/Y h:i:s"),
					'editor'=>$this->session->userdata('nama'),
				));
			}
			
			$numrow++; 
		}

		$this->admin_model->insert_multi_ma($data);
		$this->session->set_flashdata('notif', "{icon: 'success', title: 'Import data',text: 'data berhasil di tambahkan'}");
		redirect("headmaster/uploadma");
	}

	public function import_smp()
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
					'jns_tinggal'=>$row['R'],
					'alat_trans'=>$row['S'],
					'telp'=>$row['T'],
					'email'=>$row['U'],
					'anak_ke'=>$row['V'],
					'jml_sdr'=>$row['W'],
					'nm_ayh'=>$row['X'],
					'lahir_ayh'=>$row['Y'],
					'pend_ayh'=>$row['Z'],
					'kerja_ayh'=>$row['AA'],
					'hasil_ayh'=>$row['AB'],
					'nik_ayh'=>$row['AC'],
					'nm_ibu'=>$row['AD'],
					'lahir_ibu'=>$row['AE'],
					'pend_ibu'=>$row['AF'],
					'kerja_ibu'=>$row['AG'],
					'hasil_ibu'=>$row['AH'],
					'nik_ibu'=>$row['AI'],
					'nm_wl'=>$row['AJ'],
					'lahir_wl'=>$row['AK'],
					'pend_wl'=>$row['AL'],
					'kerja_wl'=>$row['AM'],
					'hasil_wl'=>$row['AN'],
					'nik_wl'=>$row['AO'],
					'no_un'=>$row['AP'],
					'no_skhun'=>$row['AQ'],
					'no_ijazah'=>$row['AR'],
					'no_kps'=>$row['AS'],
					'no_kip'=>$row['AT'],
					'no_kis'=>$row['AU'],
					'no_pkh'=>$row['AV'],
					'beasiswa'=>$row['AW'],
					'kelas_7'=>$row['AX'],
					'kelas_8'=>$row['AY'],
					'kelas_9'=>$row['AZ'],
					'kelas_aktf'=>$row['BA'],
					'kelas_dig'=>$row['BB'],
					'skl_asal'=>$row['BC'],
					'almt_skl'=>$row['BD'],
					'jns_masuk'=>$row['BE'],
					'tgl_masuk'=>$row['BF'],
					'ket_out'=>$row['BG'],
					'tgl_out'=>$row['BH'],
					'alasan_out'=>$row['BI'],
					'nosrt_out'=>$row['BJ'],
					'status'=>$row['BK'],
					'foto'=>$row['BL'],
					'progres'=>date("d/m/Y h:i:s"),
					'editor'=>$this->session->userdata('nama'),
				));
			}
			
			$numrow++; 
		}

		$this->admin_model->insert_multi_smp($data);
		$this->session->set_flashdata('notif', "{icon: 'success', title: 'Import data',text: 'data berhasil di tambahkan'}");
		redirect("headmaster/uploadsmp");
	}

	public function import_smk()
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
					'jns_tinggal'=>$row['R'],
					'alat_trans'=>$row['S'],
					'telp'=>$row['T'],
					'email'=>$row['U'],
					'anak_ke'=>$row['V'],
					'jml_sdr'=>$row['W'],
					'nm_ayh'=>$row['X'],
					'lahir_ayh'=>$row['Y'],
					'pend_ayh'=>$row['Z'],
					'kerja_ayh'=>$row['AA'],
					'hasil_ayh'=>$row['AB'],
					'nik_ayh'=>$row['AC'],
					'nm_ibu'=>$row['AD'],
					'lahir_ibu'=>$row['AE'],
					'pend_ibu'=>$row['AF'],
					'kerja_ibu'=>$row['AG'],
					'hasil_ibu'=>$row['AH'],
					'nik_ibu'=>$row['AI'],
					'nm_wl'=>$row['AJ'],
					'lahir_wl'=>$row['AK'],
					'pend_wl'=>$row['AL'],
					'kerja_wl'=>$row['AM'],
					'hasil_wl'=>$row['AN'],
					'nik_wl'=>$row['AO'],
					'no_un'=>$row['AP'],
					'no_skhun'=>$row['AQ'],
					'no_ijazah'=>$row['AR'],
					'no_kps'=>$row['AS'],
					'no_kip'=>$row['AT'],
					'no_kis'=>$row['AU'],
					'no_pkh'=>$row['AV'],
					'beasiswa'=>$row['AW'],
					'kelas_7'=>$row['AX'],
					'kelas_8'=>$row['AY'],
					'kelas_9'=>$row['AZ'],
					'kelas_aktf'=>$row['BA'],
					'kelas_dig'=>$row['BB'],
					'skl_asal'=>$row['BC'],
					'almt_skl'=>$row['BD'],
					'jns_masuk'=>$row['BE'],
					'tgl_masuk'=>$row['BF'],
					'ket_out'=>$row['BG'],
					'tgl_out'=>$row['BH'],
					'alasan_out'=>$row['BI'],
					'nosrt_out'=>$row['BJ'],
					'status'=>$row['BK'],
					'foto'=>$row['BL'],
					'progres'=>date("d/m/Y h:i:s"),
					'editor'=>$this->session->userdata('nama'),
				));
			}
			
			$numrow++; 
		}

		$this->admin_model->insert_multi_smk($data);
		$this->session->set_flashdata('notif', "{icon: 'success', title: 'Import data',text: 'data berhasil di tambahkan'}");
		redirect("headmaster/uploadsmk");
	}
	
// =====================================================================================================================================

	public function report_detail($param)
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		$kata = explode("+", $param);
		$kelas = $kata[0];
		$lembaga = strtoupper($kata[1]);
		$user = $this->session->userdata('nama');

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Mukhammad Yasin')
							   ->setLastModifiedBy($user)
							   ->setTitle("Data Siswa ".$lembaga)
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



		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA DETAIL SISWA ".$lembaga." KELAS ".$kelas); // Set kolom A1 dengan tulisan "DATA SISWA"
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
			$excel->setActiveSheetIndex(0)->setCellValue('R4', "JENIS TINGGAL");
			$excel->setActiveSheetIndex(0)->setCellValue('S4', "ALAT TRANSPORTASI");
			$excel->setActiveSheetIndex(0)->setCellValue('T4', "TELP");
			$excel->setActiveSheetIndex(0)->setCellValue('U4', "EMAIL");
			$excel->setActiveSheetIndex(0)->setCellValue('V4', "ANAK KE");
			$excel->setActiveSheetIndex(0)->setCellValue('W4', "JUMLAH SAUDARA");
			$excel->setActiveSheetIndex(0)->setCellValue('X4', "NAMA AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('Y4', "TAHUN AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('Z4', "PENDIDIKAN AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AA4', "KERJA AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AB4', "HASIL AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AC4', "NIK AYAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AD4', "NAMA IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AE4', "TAHUN IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AF4', "PENDIDIKAN IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AG4', "KERJA IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AH4', "HASIL IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AI4', "NIK IBU");
			$excel->setActiveSheetIndex(0)->setCellValue('AJ4', "NAMA WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AK4', "TAHUN WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AL4', "PENDIDIKAN WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AM4', "KERJA WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AN4', "HASIL WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AO4', "NIK WALI");
			$excel->setActiveSheetIndex(0)->setCellValue('AP4', "NO UN");
			$excel->setActiveSheetIndex(0)->setCellValue('AQ4', "NO SKHUN");
			$excel->setActiveSheetIndex(0)->setCellValue('AR4', "NO IJAZAH");
			$excel->setActiveSheetIndex(0)->setCellValue('AS4', "NO KPS");
			$excel->setActiveSheetIndex(0)->setCellValue('AT4', "NO KIP");
			$excel->setActiveSheetIndex(0)->setCellValue('AU4', "NO KIS");
			$excel->setActiveSheetIndex(0)->setCellValue('AV4', "NO PKH");
			$excel->setActiveSheetIndex(0)->setCellValue('AW4', "BEASISWA");
			$excel->setActiveSheetIndex(0)->setCellValue('AX4', "KELAS 7");
			$excel->setActiveSheetIndex(0)->setCellValue('AY4', "KELAS 8");
			$excel->setActiveSheetIndex(0)->setCellValue('AZ4', "KELAS 9");
			$excel->setActiveSheetIndex(0)->setCellValue('BA4', "KELAS AKTIF");
			$excel->setActiveSheetIndex(0)->setCellValue('BB4', "KELAS DIGITAL");
			$excel->setActiveSheetIndex(0)->setCellValue('BC4', "KELAS SEKOLAH ASAL");
			$excel->setActiveSheetIndex(0)->setCellValue('BD4', "ALAMAT SEKOLAH ASAL");
			$excel->setActiveSheetIndex(0)->setCellValue('BE4', "JENIS MASUK");
			$excel->setActiveSheetIndex(0)->setCellValue('BF4', "TANGGAL MASUK");
			$excel->setActiveSheetIndex(0)->setCellValue('BG4', "KET KELUAR");
			$excel->setActiveSheetIndex(0)->setCellValue('BH4', "TANGGAL KELUAR");
			$excel->setActiveSheetIndex(0)->setCellValue('BI4', "ALASAN KELUAR");
			$excel->setActiveSheetIndex(0)->setCellValue('BJ4', "NO SURAT KELUAR");
			$excel->setActiveSheetIndex(0)->setCellValue('BK4', "STATUS");

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A4:BK4')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		// $siswa = $this->admin_model->getmts();


		$siswa = $this->admin_model->filter_kelas($param);

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
			$excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->jns_tinggal);
			$excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->alat_trans);
			$excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->telp);
			$excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->email);
			$excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->anak_ke);
			$excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->jml_sdr);
			$excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $data->nm_ayh);
			$excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $data->lahir_ayh);
			$excel->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $data->pend_ayh);
			$excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $data->kerja_ayh);
			$excel->setActiveSheetIndex(0)->setCellValue('AB'.$numrow, $data->hasil_ayh);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('AC'.$numrow, $data->nik_ayh,PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('AD'.$numrow, $data->nm_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('AE'.$numrow, $data->lahir_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('AF'.$numrow, $data->pend_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('AG'.$numrow, $data->kerja_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('AH'.$numrow, $data->hasil_ibu);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('AI'.$numrow, $data->nik_ibu,PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('AJ'.$numrow, $data->nm_wl);
			$excel->setActiveSheetIndex(0)->setCellValue('AK'.$numrow, $data->lahir_wl);
			$excel->setActiveSheetIndex(0)->setCellValue('AL'.$numrow, $data->pend_wl);
			$excel->setActiveSheetIndex(0)->setCellValue('AM'.$numrow, $data->kerja_wl);
			$excel->setActiveSheetIndex(0)->setCellValue('AN'.$numrow, $data->hasil_wl);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('AO'.$numrow, $data->nik_wl,PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('AP'.$numrow, $data->no_un);
			$excel->setActiveSheetIndex(0)->setCellValue('AQ'.$numrow, $data->no_skhun);
			$excel->setActiveSheetIndex(0)->setCellValue('AR'.$numrow, $data->no_ijazah);
			$excel->setActiveSheetIndex(0)->setCellValue('AS'.$numrow, $data->no_kps);
			$excel->setActiveSheetIndex(0)->setCellValue('AT'.$numrow, $data->no_kip);
			$excel->setActiveSheetIndex(0)->setCellValue('AU'.$numrow, $data->no_kis);
			$excel->setActiveSheetIndex(0)->setCellValue('AV'.$numrow, $data->no_pkh);
			$excel->setActiveSheetIndex(0)->setCellValue('AW'.$numrow, $data->beasiswa);
			$excel->setActiveSheetIndex(0)->setCellValue('AX'.$numrow, $data->kelas_7);
			$excel->setActiveSheetIndex(0)->setCellValue('AY'.$numrow, $data->kelas_8);
			$excel->setActiveSheetIndex(0)->setCellValue('AZ'.$numrow, $data->kelas_9);
			$excel->setActiveSheetIndex(0)->setCellValue('BA'.$numrow, $data->kelas_aktf);
			$excel->setActiveSheetIndex(0)->setCellValue('BB'.$numrow, $data->kelas_dig);
			$excel->setActiveSheetIndex(0)->setCellValue('BC'.$numrow, $data->skl_asal);
			$excel->setActiveSheetIndex(0)->setCellValue('BD'.$numrow, $data->almt_skl);
			$excel->setActiveSheetIndex(0)->setCellValue('BE'.$numrow, $data->jns_masuk);
			$excel->setActiveSheetIndex(0)->setCellValue('BF'.$numrow, $data->tgl_masuk);
			$excel->setActiveSheetIndex(0)->setCellValue('BG'.$numrow, $data->ket_out);
			$excel->setActiveSheetIndex(0)->setCellValue('BH'.$numrow, $data->tgl_out);
			$excel->setActiveSheetIndex(0)->setCellValue('BI'.$numrow, $data->alasan_out);
			$excel->setActiveSheetIndex(0)->setCellValue('BJ'.$numrow, $data->nosrt_out);
			$excel->setActiveSheetIndex(0)->setCellValue('BK'.$numrow, $data->status);


			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow.':BK'.$numrow)->applyFromArray($style_row);
			
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
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Data Siswa ".$kelas);
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Siswa '.$lembaga.' '.$kelas.'.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}	
	
}