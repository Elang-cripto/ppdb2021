<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Walikelas extends CI_Controller {
	private $filename = "import_data";

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','tgl_indo'));
	    $this->load->model("admin_model");
        $this->load->library(array('form_validation','session'));
		if($this->session->userdata('jabatan')!="walikelas")
		{
			redirect('page/proses_log');
		}
	}

//==============================================================

	public function index()
	{
		$data['set'] = $this->admin_model->getset2();
		$data['dbinfo'] = $this->admin_model->getinfo();
		$this->load->view('walikelas/dasboard',$data);
	}

//==============================================================

	public function frame($form,$param,$id)
	{
		$data["form"] = $form;
		$data['set'] = $this->admin_model->getset(1);
		$data['dbkls'] = $this->admin_model->getkls_V($param,$id);
		$data['baca'] = $this->admin_model->getById($param,$id);
		$this->load->view('border',$data);
	}

//============================================================

	public function cekdata($param,$id)
	{
		$data['dbkls'] = $this->admin_model->getkls_V($param,$id);
		$this->load->view('walikelas/cekdata',$data);
	}

// =====================================================================================================================================

	public function perangkat()
	{
		$data['dblink'] = $this->admin_model->getlink();
		$data['dblink_a'] = $this->admin_model->getlink_a();
		$this->load->view('walikelas/perangkat',$data);
	}

//==============================================================

	public function cekpr()
	{
		$this->load->view('cekprunt');
	}

//==============================================================

	public function jumlah()
	{
		$data['dbklsmts'] = $this->admin_model->getkls_mts();
		$data['dbklsma'] = $this->admin_model->getkls_ma();
		$data['dbklssmp'] = $this->admin_model->getkls_smp();
		$data['dbklssmk'] = $this->admin_model->getkls_smk();
		$this->load->view('walikelas/jumlah',$data);
	}

//==============================================================

	public function user()
	{
		$data['dbuser'] = $this->admin_model->getuser();
		$this->load->view('walikelas/user',$data);
	}

	public function edituser($id)
	{
		$data['cats'] 	= $this->admin_model->getkls();
		$data['dbuser'] = $this->admin_model->getByIduser($id);
		$this->load->view('walikelas/user-edit',$data);
	}

	public function updateuser()
	{
  		$this->form_validation->set_rules('username','username','required');
		// $this->form_validation->set_rules('password','password','required');
		if ($this->form_validation->run()==true)
        {
			$config['upload_path']          = './asset/dist/img/';
			$config['allowed_types'] 		= 'jpg|png|jpeg';
			$config['max_size']				= 2048;
			$config['remove_space'] 		= TRUE;
			$config['overwrite'] 			= TRUE;
			$config['file_name'] 			= $this->input->post('id');
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('foto'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('walikelas/user-edit', $error);
			}
			 	$id 				= $this->input->post('id');
			 	$data['username'] 	= $this->input->post('username');
				$data['nama'] 		= $this->input->post('nama');
				$data['telp'] 		= $this->input->post('telp');
				$data['email'] 		= $this->input->post('email');
				
				if (!empty($_FILES['foto']['name'])){
					$data['foto'] = $this->input->post('id').$this->upload->data('file_ext');
				} else {
					$data['foto'] = $this->input->post('foto_old');
				}

				$this->admin_model->updateuser($data,$id);
				$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Update',text: 'User ".$this->input->post('nama')." diperbarui'}");
				redirect('walikelas/edituser/'.base64_encode($id));
		}
		else
		{
			$id = $this->input->post('id');
			$data['dbuser'] = $this->admin_model->getByIduser($id);
			$this->load->view('walikelas/user-edit',$data);
		}
	}

//==============================================================

	public function dataklsmts($kelas)
	{
		$data['dbkls'] = $this->admin_model->filvalid_mts($kelas);
		$this->load->view('walikelas/datakls_mts',$data);
	}

	public function dataklsma($kelas)
	{
		$data['dbkls'] = $this->admin_model->filvalid_ma($kelas);
		$this->load->view('walikelas/datakls_ma',$data);
	}

	public function dataklssmp($kelas)
	{
		$data['dbkls'] = $this->admin_model->filvalid_smp($kelas);
		$this->load->view('walikelas/datakls_smp',$data);
	}

	public function dataklssmk($kelas)
	{
		$data['dbkls'] = $this->admin_model->filvalid_smk($kelas);
		$this->load->view('walikelas/datakls_smk',$data);
	}

//-------------------------------------------------------------
	
	public function vervalmts()
	{
		$data['dbmts'] = $this->admin_model->getvalid_mts();
		$this->load->view('walikelas/verval_mts',$data);
	}

	public function vervalma()
	{
		$data['dbma'] = $this->admin_model->getvalid_ma();
		$this->load->view('walikelas/verval_ma',$data);
	}

	public function vervalsmp()
	{
		$data['dbsmp'] = $this->admin_model->getvalid_smp();
		$this->load->view('walikelas/verval_smp',$data);
	}

	public function vervalsmk()
	{
		$data['dbsmk'] = $this->admin_model->getvalid_smk();
		$this->load->view('walikelas/verval_smk',$data);
	}
//-------------------------------------------------------------
	
	public function waliklsmts($kelas)
	{
		$data['dbkls'] = $this->admin_model->fil_mts($kelas);
		$this->load->view('walikelas/walikls_mts',$data);
	}

	public function waliklsma($kelas)
	{
		$data['dbkls'] = $this->admin_model->fil_ma($kelas);
		$this->load->view('walikelas/walikls_ma',$data);
	}

	public function waliklssmp($kelas)
	{
		$data['dbkls'] = $this->admin_model->fil_smp($kelas);
		$this->load->view('walikelas/walikls_smp',$data);
	}

	public function waliklssmk($kelas)
	{
		$data['dbkls'] = $this->admin_model->fil_smk($kelas);
		$this->load->view('walikelas/walikls_smk',$data);
	}

//-------------------------------------------------------------
	public function datamts()
	{
		$data['dbmts'] = $this->admin_model->getmts();
		$this->load->view('walikelas/datamts',$data);
	}

	public function datama()
	{
		$data['dbma'] = $this->admin_model->getma();
		$this->load->view('walikelas/datama',$data);
	}

	public function datasmp()
	{
		$data['dbsmp'] = $this->admin_model->getsmp();
		$this->load->view('walikelas/datasmp',$data);
	}

	public function datasmk()
	{
		$data['dbsmk'] = $this->admin_model->getsmk();
		$this->load->view('walikelas/datasmk',$data);
	}

//-------------------------------------------------------------
	public function dataoutmts()
	{
		$data['dbmts'] = $this->admin_model->getmts_out();
		$this->load->view('walikelas/outdatamts',$data);
	}

	public function dataoutma()
	{
		$data['dbma'] = $this->admin_model->getma_out();
		$this->load->view('walikelas/outdatama',$data);
	}

	public function dataoutsmp()
	{
		$data['dbsmp'] = $this->admin_model->getsmp_out();
		$this->load->view('walikelas/outdatasmp',$data);
	}

	public function dataoutsmk()
	{
		$data['dbsmk'] = $this->admin_model->getsmk_out();
		$this->load->view('walikelas/outdatasmk',$data);
	}

//-------------------------------------------------------------
	public function walioutmts($kelas)
	{
		$data['dbmts'] = $this->admin_model->fil_mts_out($kelas);
		$this->load->view('walikelas/outwalimts',$data);
	}

	public function walioutma($kelas)
	{
		$data['dbma'] = $this->admin_model->fil_ma_out($kelas);
		$this->load->view('walikelas/outwalima',$data);
	}

	public function walioutsmp($kelas)
	{
		$data['dbsmp'] = $this->admin_model->fil_smp_out($kelas);
		$this->load->view('walikelas/outwalismp',$data);
	}

	public function walioutsmk($kelas)
	{
		$data['dbsmk'] = $this->admin_model->fil_smk_out($kelas);
		$this->load->view('walikelas/outwalismk',$data);
	}
//-------------------------------------------------------------
	public function klsmts()
	{
		$data['cats'] = $this->admin_model->getuser();
		$data['dbkls'] = $this->admin_model->getkls_mts();
		$this->load->view('walikelas/klsmts',$data);
	}

	public function klsma()
	{
		$data['cats'] = $this->admin_model->getuser();
		$data['dbkls'] = $this->admin_model->getkls_ma();
		$this->load->view('walikelas/klsma',$data);
	}

	public function klssmp()
	{
		$data['cats'] = $this->admin_model->getuser();
		$data['dbkls'] = $this->admin_model->getkls_smp();
		$this->load->view('walikelas/klssmp',$data);
	}

	public function klssmk()
	{
		$data['cats'] = $this->admin_model->getuser();
		$data['dbkls'] = $this->admin_model->getkls_smk();
		$this->load->view('walikelas/klssmk',$data);
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
		$this->load->view('walikelas/profill',$data);
	}

//-------------------------------------------------------------
	public	function viewmts($id)
	{
		$data['dbmts'] = $this->admin_model->getByIdmts($id);
		$this->load->view('walikelas/view-mts',$data);
	}

	public	function viewma($id)
	{
		$data['dbma'] = $this->admin_model->getByIdma($id);
		$this->load->view('walikelas/view-ma',$data);
	}

	public	function viewsmp($id)
	{
		$data['dbsmp'] = $this->admin_model->getByIdsmp($id);
		$this->load->view('walikelas/view-smp',$data);
	}

	public	function viewsmk($id)
	{
		$data['dbsmk'] = $this->admin_model->getByIdsmk($id);
		$this->load->view('walikelas/view-smk',$data);
	}

//-------------------------------------------------------------
	public function editmts($id)
	{
		$data['dbmts'] = $this->admin_model->getByIdmts($id);
		$data['cats'] = $this->admin_model->getkls_mts();
		$this->load->view('walikelas/edit-mts-rev',$data);
	}

	public function editsmp($id)
	{
		$data['dbsmp'] = $this->admin_model->getByIdsmp($id);
		$data['cats'] = $this->admin_model->getkls_smp();
		$this->load->view('walikelas/edit-smp-rev',$data);
	}

	public function editma($id)
	{
		$data['dbma'] = $this->admin_model->getByIdma($id);
		$data['cats'] = $this->admin_model->getkls_ma();
		$this->load->view('walikelas/edit-ma-rev',$data);
	}

	public function editsmk($id)
	{
		$data['dbsmk'] = $this->admin_model->getByIdsmk($id);
		$data['cats'] = $this->admin_model->getkls_smk();
		$this->load->view('walikelas/edit-smk-rev',$data);
	}

//-------------------------------------------------------------

	public function editkls()
	{
		$id 					= $this->input->post('id');
		$data['par'] 			= $this->session->userdata('par');;
		$data['validasi'] 		= $this->input->post('validasi');
		// $data['keterangan'] 	= $this->input->post('keterangan');
		date_default_timezone_set('Asia/Jakarta');
		$data['lastupdate'] 	= date("Y-m-d H:i:s");
				
		$this->admin_model->updatekls($data,$id);
		$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Validasi',text: 'Pengajuan validasi berhasil',}");
		redirect('walikelas/cekdata/'.$this->session->userdata('par').'/'.$this->session->userdata('kelas'));

	}

// =====================================================================================================================================

	public function uploadmts()
	{
		$this->load->view('walikelas/upload-mts');
	}

	public function uploadma()
	{
		$this->load->view('walikelas/upload-ma');
	}

	public function uploadsmp()
	{
		$this->load->view('walikelas/upload-smp');
	}

	public function uploadsmk()
	{
		$this->load->view('walikelas/upload-smk');
	}

// =====================================================================================================================================

	public function updatemts()
	{
  		// $this->form_validation->set_rules('nis','nis','required');
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
				$this->load->view('walikelas/edit-mts-rev', $error);
			}
			 	$id = $this->input->post('id');
			 	// $data['nis'] = $this->input->post('nis');
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
				// redirect('walikelas/editmts/'.$id);

				$kelas = $this->session->userdata('kelas');
  				$par = $this->session->userdata('par');
  				$role = $this->session->userdata('jabatan');
				redirect($role.'/datakls'.$par.'/'.$kelas);
		}
		else
		{
			$id = $this->input->post('id');
			$data['dbmts'] = $this->admin_model->getByIdmts($id);
			$data['cats'] = $this->admin_model->getkls_mts();
			$this->load->view('walikelas/edit-mts-rev',$data);
		}
	}

	public function updatesmp()
	{
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
				$this->load->view('walikelas/edit-smp-rev', $error);
			}
			 	$id = $this->input->post('id');
			 	// $data['nis'] = $this->input->post('nis');
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

				$kelas = $this->session->userdata('kelas');
  				$par = $this->session->userdata('par');
  				$role = $this->session->userdata('jabatan');
				redirect($role.'/datakls'.$par.'/'.$kelas);
		}
		else
		{
			$id = $this->input->post('id');
			$data['dbsmp'] = $this->admin_model->getByIdsmp($id);
			$data['cats'] = $this->admin_model->getkls_smp();
			$this->load->view('walikelas/edit-smp-rev',$data);
		}
	}

	public function updatema()
	{
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
				$this->load->view('walikelas/edit-mts-rev', $error);
			}
			 	$id = $this->input->post('id');
			 	// $data['nis'] = $this->input->post('nis');
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

				$kelas = $this->session->userdata('kelas');
  				$par = $this->session->userdata('par');
  				$role = $this->session->userdata('jabatan');
				redirect($role.'/datakls'.$par.'/'.$kelas);
		}
		else
		{
			$id = $this->input->post('id');
			$data['dbma'] = $this->admin_model->getByIdma($id);
			$data['cats'] = $this->admin_model->getkls_ma();
			$this->load->view('walikelas/edit-ma-rev',$data);
		}
	}

	public function updatesmk()
	{
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
				$this->load->view('walikelas/edit-smk-rev', $error);
			}
			 	$id = $this->input->post('id');
			 	// $data['nis'] = $this->input->post('nis');
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

				$kelas = $this->session->userdata('kelas');
  				$par = $this->session->userdata('par');
  				$role = $this->session->userdata('jabatan');
				redirect($role.'/datakls'.$par.'/'.$kelas);
		}
		else
		{
			$id = $this->input->post('id');
			$data['dbsmk'] = $this->admin_model->getByIdsmk($id);
			$data['cats'] = $this->admin_model->getkls_smk();
			$this->load->view('walikelas/edit-smk-rev',$data);
		}
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

}