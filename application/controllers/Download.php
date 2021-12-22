<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	    $this->load->model("admin_model");
        $this->load->library('form_validation');
        $this->load->helper(array('form','url','tgl_indo'));
	}

// =====================================================================================================================================

	public function form_absen($par,$kls)
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Elang')
							   ->setLastModifiedBy('M Yasin')
							   ->setTitle("Data Siswa MTS")
							   ->setSubject("Siswa")
							   ->setDescription("Data Siswa MTS")
							   ->setKeywords("Data Siswa MTS");

		$style_col = array(
			'font' => array('bold' => true),
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
			)
		);

		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
			)
		);

		if ($par=="mts") {
            $ks = "Moh. Nasir. S.Pd, M.Pd.I";
            $skl = "MTs Al Amien";
          } elseif ($par=="ma") {
            $ks =  "Zaenal Arifin, S.Pd.I";
            $skl = "MA Al Amien";
          } elseif ($par=="smk") {
            $ks = "Muhammad Yazid Ma'sum, S.Pd";
            $skl = "SMKS Al Amien";
          } elseif ($par=="smp"){
            $ks = "I'ah Maslikah, S.Pd.I";
            $skl = "SMPS Plus Al Amien";
          } else{
          	$ks = "-";
            $skl = "-";
          }

        $setting = $this->admin_model->getset();

        foreach($setting as $set){
			$excel->setActiveSheetIndex(0)->setCellValue('A1', "DAFTAR HADIR SISWA");
			$excel->setActiveSheetIndex(0)->setCellValue('A3', "lembaga");
			$excel->setActiveSheetIndex(0)->setCellValue('C3', ": ".$skl);
			$excel->setActiveSheetIndex(0)->setCellValue('A4', "Kelas");
			$excel->setActiveSheetIndex(0)->setCellValue('C4', ": ".$kls);
			$excel->setActiveSheetIndex(0)->setCellValue('M3', "Tahun Pelajaran");
			$excel->setActiveSheetIndex(0)->setCellValue('R3', ": ".$set->tapel);
			$excel->setActiveSheetIndex(0)->setCellValue('M4', "Semester");
			$excel->setActiveSheetIndex(0)->setCellValue('R4', ": ".$set->semester);
			$excel->getActiveSheet()->mergeCells('A1:U1');
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(13);
			$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		}

		$excel->setActiveSheetIndex(0)->setCellValue('A6', "NO");
		$excel->getActiveSheet()->mergeCells('A6:A7');
		$excel->setActiveSheetIndex(0)->setCellValue('B6', "NIS");
		$excel->getActiveSheet()->mergeCells('B6:B7');
		$excel->setActiveSheetIndex(0)->setCellValue('C6', "NAMA");
		$excel->getActiveSheet()->mergeCells('C6:C7');
		$excel->setActiveSheetIndex(0)->setCellValue('D6', "PERTEMUAN KE-");
		$excel->getActiveSheet()->mergeCells('D6:R6');
		$excel->setActiveSheetIndex(0)->setCellValue('D7', "1");
		$excel->setActiveSheetIndex(0)->setCellValue('E7', "2");
		$excel->setActiveSheetIndex(0)->setCellValue('F7', "3");
		$excel->setActiveSheetIndex(0)->setCellValue('G7', "4");
		$excel->setActiveSheetIndex(0)->setCellValue('H7', "5");
		$excel->setActiveSheetIndex(0)->setCellValue('I7', "6");
		$excel->setActiveSheetIndex(0)->setCellValue('J7', "7");
		$excel->setActiveSheetIndex(0)->setCellValue('K7', "8");
		$excel->setActiveSheetIndex(0)->setCellValue('L7', "9");
		$excel->setActiveSheetIndex(0)->setCellValue('M7', "10");
		$excel->setActiveSheetIndex(0)->setCellValue('N7', "11");
		$excel->setActiveSheetIndex(0)->setCellValue('O7', "12");
		$excel->setActiveSheetIndex(0)->setCellValue('P7', "13");
		$excel->setActiveSheetIndex(0)->setCellValue('Q7', "14");
		$excel->setActiveSheetIndex(0)->setCellValue('R7', "15");
		$excel->setActiveSheetIndex(0)->setCellValue('S6', "JUMLAH");
		$excel->getActiveSheet()->mergeCells('S6:U6');
		$excel->setActiveSheetIndex(0)->setCellValue('S7', "S");
		$excel->setActiveSheetIndex(0)->setCellValue('T7', "I");
		$excel->setActiveSheetIndex(0)->setCellValue('U7', "A");

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A6:A7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B6:B7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C6:C7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D6:R6')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('S6:U6')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Q7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('R7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('S7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('T7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('U7')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$siswa = $this->admin_model->filter_kelas($par,$kls);

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 8; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($siswa as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('B'.$numrow, $data->nis, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}
			$excel->setActiveSheetIndex(0)->setCellValue('N'.($numrow+1), "Guru Mapel");
			$excel->setActiveSheetIndex(0)->setCellValue('N'.($numrow+5), $this->session->userdata('nama'));
			date_default_timezone_set('Asia/Jakarta');
			$excel->setActiveSheetIndex(0)->setCellValue('A'.($numrow+5), "Sumber www.db.alamienjember.ac.id ".date('d M Y H:i:s'));
			$excel->getActiveSheet()->getStyle('A'.($numrow+5))->getFont()->setItalic(TRUE);

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(3);
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(19);
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(28);
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('N')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('R')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('S')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('T')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('U')->setWidth(4);
		
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		$excel->getActiveSheet(0)->setTitle("Daftar Hadir");
		$excel->setActiveSheetIndex(0);

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Daftar Hadir '.strtoupper($par).' '.$kls.'.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

// =====================================================================================================================================

	public function form_nilai($par,$kls)
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Elang')
							   ->setLastModifiedBy('M Yasin')
							   ->setTitle("Data Siswa MTS")
							   ->setSubject("Siswa")
							   ->setDescription("Data Siswa MTS")
							   ->setKeywords("Data Siswa MTS");

		$style_col = array(
			'font' => array('bold' => true),
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
			)
		);

		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
			)
		);

		if ($par=="mts") {
            $ks = "Moh. Nasir. S.Pd, M.Pd.I";
            $skl = "MTs Al Amien";
          } elseif ($par=="ma") {
            $ks =  "Zaenal Arifin, S.Pd.I";
            $skl = "MA Al Amien";
          } elseif ($par=="smk") {
            $ks = "Muhammad Yazid Ma'sum, S.Pd";
            $skl = "SMKS Al Amien";
          } elseif ($par=="smp"){
            $ks = "I'ah Maslikah, S.Pd.I";
            $skl = "SMPS Plus Al Amien";
          } else{
          	$ks = "-";
            $skl = "-";
          }

        $setting = $this->admin_model->getset();

        foreach($setting as $set){
			$excel->setActiveSheetIndex(0)->setCellValue('A1', "FORM PENILAIAN SISWA");
			$excel->setActiveSheetIndex(0)->setCellValue('A3', "lembaga");
			$excel->setActiveSheetIndex(0)->setCellValue('C3', ": ".$skl);
			$excel->setActiveSheetIndex(0)->setCellValue('A4', "Kelas");
			$excel->setActiveSheetIndex(0)->setCellValue('C4', ": ".$kls);
			$excel->setActiveSheetIndex(0)->setCellValue('M3', "Tahun Pelajaran");
			$excel->setActiveSheetIndex(0)->setCellValue('R3', ": ".$set->tapel);
			$excel->setActiveSheetIndex(0)->setCellValue('M4', "Semester");
			$excel->setActiveSheetIndex(0)->setCellValue('R4', ": ".$set->semester);
			$excel->getActiveSheet()->mergeCells('A1:U1');
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(13);
			$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		}

		$excel->setActiveSheetIndex(0)->setCellValue('A6', "NO");
		$excel->getActiveSheet()->mergeCells('A6:A7');
		$excel->setActiveSheetIndex(0)->setCellValue('B6', "NIS");
		$excel->getActiveSheet()->mergeCells('B6:B7');
		$excel->setActiveSheetIndex(0)->setCellValue('C6', "NAMA");
		$excel->getActiveSheet()->mergeCells('C6:C7');
		$excel->setActiveSheetIndex(0)->setCellValue('D6', "PENGETAHUAN");
		$excel->getActiveSheet()->mergeCells('D6:K6');
		$excel->setActiveSheetIndex(0)->setCellValue('D7', "1");
		$excel->setActiveSheetIndex(0)->setCellValue('E7', "2");
		$excel->setActiveSheetIndex(0)->setCellValue('F7', "3");
		$excel->setActiveSheetIndex(0)->setCellValue('G7', "4");
		$excel->setActiveSheetIndex(0)->setCellValue('H7', "5");
		$excel->setActiveSheetIndex(0)->setCellValue('I7', "6");
		$excel->setActiveSheetIndex(0)->setCellValue('J7', "7");
		$excel->setActiveSheetIndex(0)->setCellValue('K7', "8");
		$excel->setActiveSheetIndex(0)->setCellValue('L6', "∑");
		$excel->getActiveSheet()->mergeCells('L6:L7');
		$excel->setActiveSheetIndex(0)->setCellValue('M6', "KETERAMPILAN");
		$excel->getActiveSheet()->mergeCells('M6:T6');
		$excel->setActiveSheetIndex(0)->setCellValue('M7', "1");
		$excel->setActiveSheetIndex(0)->setCellValue('N7', "2");
		$excel->setActiveSheetIndex(0)->setCellValue('O7', "3");
		$excel->setActiveSheetIndex(0)->setCellValue('P7', "4");
		$excel->setActiveSheetIndex(0)->setCellValue('Q7', "5");
		$excel->setActiveSheetIndex(0)->setCellValue('R7', "6");
		$excel->setActiveSheetIndex(0)->setCellValue('S7', "7");
		$excel->setActiveSheetIndex(0)->setCellValue('T7', "8");
		$excel->setActiveSheetIndex(0)->setCellValue('U6', "∑");
		$excel->getActiveSheet()->mergeCells('U6:U7');

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A6:A7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B6:B7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C6:C7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D6:K6')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L6:L7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M6:T6')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('U6:U7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Q7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('R7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('S7')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('T7')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$siswa = $this->admin_model->filter_kelas($par,$kls);

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 8; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($siswa as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValueExplicit('B'.$numrow, $data->nis, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}
			$excel->setActiveSheetIndex(0)->setCellValue('N'.($numrow+1), "Guru Mapel");
			$excel->setActiveSheetIndex(0)->setCellValue('N'.($numrow+5), $this->session->userdata('nama'));
			date_default_timezone_set('Asia/Jakarta');
			$excel->setActiveSheetIndex(0)->setCellValue('A'.($numrow+5), "Sumber www.db.alamienjember.ac.id ".date('d M Y H:i:s'));
			$excel->getActiveSheet()->getStyle('A'.($numrow+5))->getFont()->setItalic(TRUE);

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(3);
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(19);
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(28);
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('N')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('R')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('S')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('T')->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension('U')->setWidth(4);
		
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		$excel->getActiveSheet(0)->setTitle("Form Nilai");
		$excel->setActiveSheetIndex(0);

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Form Nilai '.strtoupper($par).' '.$kls.'.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}



}

/* End of file Download.php */
/* Location: ./application/controllers/Download.php */