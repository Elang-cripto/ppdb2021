<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
	private $filename = "import_data";

	public function __construct()
	{
		parent::__construct();
	    $this->load->helper(array('form','url','tgl_indo'));
	    $this->load->model("admin_model");
        $this->load->library(array('form_validation','session'));
		if($this->session->userdata('jabatan')!="guru")
		{
			redirect('page/proses_log');
		}
	}
	
	public function index()
	{
		$data['set'] = $this->admin_model->getset2();
		$data['dbinfo'] = $this->admin_model->getinfo();
		$this->load->view('guru/dasboard',$data);
	}

//==============================================================

	public function jumlah()
	{
		$data['dbklsmts'] = $this->admin_model->getkls_mts();
		$data['dbklsma'] = $this->admin_model->getkls_ma();
		$data['dbklssmp'] = $this->admin_model->getkls_smp();
		$data['dbklssmk'] = $this->admin_model->getkls_smk();
		$this->load->view('guru/jumlah',$data);
	}

// =====================================================================================================================================

	public function perangkat()
	{
		$data['dblink'] = $this->admin_model->getlink();
		$data['dblink_a'] = $this->admin_model->getlink_a();
		$this->load->view('guru/perangkat',$data);
	}

//-------------------------------------------------------------
	public function user()
	{
		$data['dbuser'] = $this->admin_model->getuser();
		$this->load->view('guru/user',$data);
	}

	public function edituser($id)
	{
		$data['cats'] 	= $this->admin_model->getkls();
		$data['dbuser'] = $this->admin_model->getByIduser($id);
		$this->load->view('guru/user-edit',$data);
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
			$config['file_name'] 			= $this->input->post('username');
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('foto'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('guru/user-edit', $error);
			}
			 	$id 				= $this->input->post('id');
			 	$data['username'] 	= $this->input->post('username');
				$data['nama'] 		= $this->input->post('nama');
				$data['telp'] 		= $this->input->post('telp');
				$data['email'] 		= $this->input->post('email');
				
				if (!empty($_FILES['foto']['name'])){
					$data['foto'] = $this->input->post('username').$this->upload->data('file_ext');
				} else {
					$data['foto'] = $this->input->post('foto_old');
				}

				$this->admin_model->updateuser($data,$id);
				$this->session->set_flashdata('pesan', "{icon: 'success', title: 'Update',text: 'User ".$this->input->post('nama')." diperbarui'}");
				redirect('guru/edituser/'.base64_encode($id));
		}
		else
		{
			$id = $this->input->post('id');
			$data['dbuser'] = $this->admin_model->getByIduser($id);
			$this->load->view('guru/user-edit',$data);
		}
	}

//-------------------------------------------------------------
	public function dataklsmts($kelas)
	{
		$data['dbkls'] = $this->admin_model->fil_mts($kelas);
		$this->load->view('guru/datakls_mts',$data);
	}

	public function dataklsma($kelas)
	{
		$data['dbkls'] = $this->admin_model->fil_ma($kelas);
		$this->load->view('guru/datakls_ma',$data);
	}

	public function dataklssmp($kelas)
	{
		$data['dbkls'] = $this->admin_model->fil_smp($kelas);
		$this->load->view('guru/datakls_smp',$data);
	}

	public function dataklssmk($kelas)
	{
		$data['dbkls'] = $this->admin_model->fil_smk($kelas);
		$this->load->view('guru/datakls_smk',$data);
	}


//-------------------------------------------------------------
	public function datamts()
	{
		$data['dbmts'] = $this->admin_model->getmts();
		$this->load->view('guru/datamts',$data);
	}

	public function datama()
	{
		$data['dbma'] = $this->admin_model->getma();
		$this->load->view('guru/datama',$data);
	}

	public function datasmp()
	{
		$data['dbsmp'] = $this->admin_model->getsmp();
		$this->load->view('guru/datasmp',$data);
	}

	public function datasmk()
	{
		$data['dbsmk'] = $this->admin_model->getsmk();
		$this->load->view('guru/datasmk',$data);
	}

//-------------------------------------------------------------
	public function dataoutmts()
	{
		$data['dbmts'] = $this->admin_model->getmts_out();
		$this->load->view('guru/outdatamts',$data);
	}

	public function dataoutma()
	{
		$data['dbma'] = $this->admin_model->getma_out();
		$this->load->view('guru/outdatama',$data);
	}

	public function dataoutsmp()
	{
		$data['dbsmp'] = $this->admin_model->getsmp_out();
		$this->load->view('guru/outdatasmp',$data);
	}

	public function dataoutsmk()
	{
		$data['dbsmk'] = $this->admin_model->getsmk_out();
		$this->load->view('guru/outdatasmk',$data);
	}

//-------------------------------------------------------------
	public function klsmts()
	{
		$data['cats'] = $this->admin_model->getuser();
		$data['dbkls'] = $this->admin_model->getkls_mts();
		$this->load->view('guru/klsmts',$data);
	}

	public function klsma()
	{
		$data['cats'] = $this->admin_model->getuser();
		$data['dbkls'] = $this->admin_model->getkls_ma();
		$this->load->view('guru/klsma',$data);
	}

	public function klssmp()
	{
		$data['cats'] = $this->admin_model->getuser();
		$data['dbkls'] = $this->admin_model->getkls_smp();
		$this->load->view('guru/klssmp',$data);
	}

	public function klssmk()
	{
		$data['cats'] = $this->admin_model->getuser();
		$data['dbkls'] = $this->admin_model->getkls_smk();
		$this->load->view('guru/klssmk',$data);
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
		$this->load->view('guru/profill',$data);
	}

//-------------------------------------------------------------
	public	function viewmts($id)
	{
		$data['dbmts'] = $this->admin_model->getByIdmts($id);
		$this->load->view('guru/view-mts',$data);
	}

	public	function viewma($id)
	{
		$data['dbma'] = $this->admin_model->getByIdma($id);
		$this->load->view('guru/view-ma',$data);
	}

	public	function viewsmp($id)
	{
		$data['dbsmp'] = $this->admin_model->getByIdsmp($id);
		$this->load->view('guru/view-smp',$data);
	}

	public	function viewsmk($id)
	{
		$data['dbsmk'] = $this->admin_model->getByIdsmk($id);
		$this->load->view('guru/view-smk',$data);
	}

//-------------------------------------------------------------
	public function editmts($id)
	{
		$data['dbmts'] = $this->admin_model->getByIdmts($id);
		$data['cats'] = $this->admin_model->getkls_mts();
		$this->load->view('guru/edit-mts-rev',$data);
	}

	public function editsmp($id)
	{
		$data['dbsmp'] = $this->admin_model->getByIdsmp($id);
		$data['cats'] = $this->admin_model->getkls_smp();
		$this->load->view('guru/edit-smp-rev',$data);
	}

	public function editma($id)
	{
		$data['dbma'] = $this->admin_model->getByIdma($id);
		$data['cats'] = $this->admin_model->getkls_ma();
		$this->load->view('guru/edit-ma-rev',$data);
	}

	public function editsmk($id)
	{
		$data['dbsmk'] = $this->admin_model->getByIdsmk($id);
		$data['cats'] = $this->admin_model->getkls_smk();
		$this->load->view('guru/edit-smk-rev',$data);
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
		$this->load->view('guru/upload-mts',$data);
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
		$this->load->view('guru/upload-ma',$data);
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
		$this->load->view('guru/upload-smp',$data);
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
		$this->load->view('guru/upload-smk',$data);
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
		$this->session->set_flashdata('notif', '<h4 class="btn btn-success toastrDefaultSuccess"><i class="fa fa-check"> Data berhasil ditambahkan</i></h4>');
		redirect("guru/uploadmts");
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
		$this->session->set_flashdata('notif', '<h4 class="btn btn-success toastrDefaultSuccess"><i class="fa fa-check"> Data berhasil ditambahkan</i></h4>');
		redirect("guru/uploadmts");
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
		$this->session->set_flashdata('notif', '<h4 class="btn btn-success toastrDefaultSuccess"><i class="fa fa-check"> Data berhasil ditambahkan</i></h4>');
		redirect("guru/uploadmts");
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
		$this->session->set_flashdata('notif', '<h4 class="btn btn-success toastrDefaultSuccess"><i class="fa fa-check"> Data berhasil ditambahkan</i></h4>');
		redirect("guru/uploadmts");
	}
}