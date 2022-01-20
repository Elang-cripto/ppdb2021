<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("ASIA/JAKARTA");
        $this->load->helper(array('form', 'url', 'tgl_indo'));
        if ($this->session->userdata('jabatan') != "admin") {
            redirect('auth/admin');
        }
    }

    public function index()
    {
        $data['dbinfo'] = $this->m_ppdb->getinfo();
        $data['dbuser'] = $this->m_ppdb->getuserdas();
        $data['dbuserpan'] = $this->m_ppdb->getuserdaspan();
        $data['content'] = 'admin/dasboard';

        $this->load->view('admin/templating', $data);
    }

    public function jumlah()
    {
        // $data['dbklsmts'] = $this->m_ppdb->getkls_mts();
        // $data['dbklsma'] = $this->admin_model->getkls_ma();
        // $data['dbklssmp'] = $this->admin_model->getkls_smp();
        // $data['dbklssmk'] = $this->admin_model->getkls_smk();
        $data['content'] = 'admin/jumlah';

        $this->load->view('admin/templating', $data);
    }

    public function logout()
    {
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Log Out',text: 'Anda telah metu'}");
        redirect('auth/admin');
        $this->session->sess_destroy();
    }

    // ========================== Get Siswa ==========================
    public function data($par)
    {
        $tabel              = 'db_' . $par;
        $data['tabel_cek']  = $par;
        $data['cari']       = $this->m_ppdb->getdata($tabel);
        $data['content']    = 'admin/dataview';

        $this->load->view('admin/templating', $data);
    }
    // ========================== Get RESIDU Siswa ==========================
    public function residu($par)
    {
        $tabel              = 'db_' . $par;
        $data['tabel_cek']  = $par;
        $data['cari']       = $this->m_ppdb->getresidu($tabel);
        $data['content']    = 'admin/residuview';

        $this->load->view('admin/templating', $data);
    }
    // ========================== Get NON AKTIF Siswa ==========================
    public function nonaktif($par)
    {
        $tabel              = 'db_' . $par;
        $data['tabel_cek']  = $par;
        $data['cari']       = $this->m_ppdb->getnonaktif($tabel);
        $data['content']    = 'admin/nonaktifview';

        $this->load->view('admin/templating', $data);
    }

    // ========================== View Siswa ==========================
    public function form()
    {
        $pilih                = 'db_setting';
        $id                   = 1;
        $data['cari']         = $this->db->get_where($pilih, ["id" => $id])->row();
        $data['content']    = 'admin/form-add';

        $this->load->view('admin/templating', $data);
    }

    public function view()
    {
        $data['cari']         = $this->m_ppdb->view_peserta();
        $data['content']    = 'admin/view';

        $this->load->view('admin/templating', $data);
    }

    // ========================== Tambah Siswa Baru dari Panitia ==========================
    public function save_pan($par)
    {
        // $par 	= $this->session->userdata('par');
        $dbcek    = 'db_' . $par;
        $dariDB = $this->m_ppdb->get_kode($dbcek);
        $urut     = (int)substr($dariDB, 11, 3);
        $nikqr  = md5($this->input->post('nik'));
        $this->m_ppdb->qrcode($nikqr, $par);

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
        $data                 = $this->input->post();
        $data['id_enc']        = md5($this->input->post('nik'));
        $data['No_Reg']        = $nus . "-" . date("ymd") . "-" . sprintf('%03d', $urut + 1);
        $data['progres']     = date("Y-m-d H:i:s");
        $data['editor']        = $this->session->userdata('nama');
        $data['jalur']         = $this->m_ppdb->getset();
        $data['status']         = 'RESIDU';

        $this->db->insert('db_' . $par, $data);

        //Fungsi db_user_pengguna
        $data2['nik']        = $this->input->post('nik');
        $data2['nama']        = $this->input->post('nama');
        $data2['email']        = $this->input->post('email');
        $data2['telp']        = $this->input->post('telp');
        $data2['par']        = strtoupper($par);
        $data2['status']    = 'NON AKTIF';
        $data2['jabatan']    = 'user';
        $data2['echo']        = '1';
        $data2['last']        = date("Y-m-d H:i:s");
        $this->db->insert('db_user_pendaftar', $data2);

        //==============================================================================

        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Data residu berhasil ditambahkan'}");
        redirect('admin/data/' . $par, 'refresh');
    }

    // ========================== edit Siswa ==========================
    public function edit()
    {
        $data['cari']         = $this->m_ppdb->view_peserta();
        $data['content']      = 'admin/edit';

        $this->load->view('admin/templating', $data);
    }

    public function editsave($par, $id)
    {
        $pilih                  = 'db_' . $par;
        $data                   = $this->input->post();
        $data['editor']         = $this->session->userdata('nama');
        $data['progres']        = date("Y-m-d H:i:s");
        $nikqr                  = md5($this->input->post('nik'));
        $this->m_ppdb->qrcode($nikqr, $par);

        $uricek = $this->uri->segment(2);
        $this->m_ppdb->updatedata($data, $id, $pilih);
        $kirim  =   'Data ' . $this->input->post('nama') . ' berhasil di edit';
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: '$kirim'}");
        // redirect('admin/'.$uricek.'/'.$par, 'refresh');
        redirect('admin/data/' . $par, 'refresh');
    }

    public function delete($par, $id)
    {
        $tabel  = 'db_' . $par;
        $this->m_ppdb->del_pd($tabel, $id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'Data telah di hapus'}");
        redirect('admin/data/' . $par, 'refresh');
    }

    // ========================== cetak bukti ==========================
    public function bukti()
    {
        $data['data']       = $this->m_ppdb->view_peserta();
        $data['form']       = 'bukti';
        $data['content']    = 'border';

        $this->load->view('admin/templating', $data);
    }

    // ========================== User admin ==========================
    public function user_admin()
    {
        $data['dbuser'] = $this->m_ppdb->getuser();
        $data['content'] = 'admin/data_admin';

        $this->load->view('admin/templating', $data);
    }

    public function user_mgm()
    {
        $data['dbuser'] = $this->m_ppdb->getmgm();
        $data['content'] = 'admin/data_mgm';

        $this->load->view('admin/templating', $data);
    }

    public function adduser()
    {
        $dariDB                   = $this->m_ppdb->get_kodepan();
        $data                     = $this->input->post();
        $data['codex']            = md5($dariDB + 1);
        $data['status']           = '1';
        $data['last']             = date("Y-m-d H:i:s");

        $this->m_ppdb->adduser($data);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: 'Tambah data berhasil'}");
        redirect('admin/user_admin', 'refresh');
    }

    public function edituser()
    {
        $id                     = $this->input->post('id');
        $data                   = $this->input->post();
        $data['last']           = date("Y-m-d H:i:s");

        $this->m_ppdb->updateuser($data, $id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: 'Edit data berhasil'}");
        redirect('admin/user_admin', 'refresh');
    }

    public function deluser($id)
    {
        $this->m_ppdb->deluser($id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'Data telah di hapus'}");
        redirect('admin/user_admin', 'refresh');
    }

    // ========================== User Peserta ==========================
    public function user_peserta()
    {
        $data['dbuser_pes'] = $this->m_ppdb->getuser_pes();
        $data['content'] = 'admin/data_peserta';

        $this->load->view('admin/templating', $data);
    }

    public function adduser_pes()
    {
        $ceknik     = $this->input->post('nik');
        $jmlnik     = $this->db->get_where('db_user_pendaftar', array("nik" => $ceknik))->num_rows();

        if ($jmlnik != 0) {
            $this->session->set_flashdata('pesan', "{icon: 'error', title: 'Simpan Gagal',text: 'Data sudah terdaftar sebelumnya'}");
            redirect('admin/user_peserta', 'refresh');
        } else {
            $data                     = $this->input->post();
            $data['jabatan']         = 'user';
            $data['status']         = 'AKTIF';
            $data['echo']             = '0';
            $data['last']             = date("Y-m-d H:i:s");

            $this->m_ppdb->adduser_pes($data);
            $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: 'Tambah data berhasil'}");
            redirect('admin/user_peserta', 'refresh');
        }
    }

    public function edituser_pes()
    {
        $data                     = $this->input->post();
        $id                     = $this->input->post('id');
        $data['jabatan']         = 'user';
        $data['last']             = date("Y-m-d H:i:s");

        $this->m_ppdb->updateuserpes($data, $id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: 'Edit data berhasil'}");
        redirect('admin/user_peserta', 'refresh');
    }

    public function deluser_pes($id)
    {
        $this->m_ppdb->deluser_pes($id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'Data telah di hapus'}");
        redirect('admin/user_peserta', 'refresh');
    }

    // =============================== SETTING =======================================

    public function setting()
    {
        $pilih                = 'db_setting';
        $id                   = 1;
        $data['cari']         = $this->db->get_where($pilih, ["id" => $id])->row();
        $data['content']      = 'admin/setting';

        $this->load->view('admin/templating', $data);
    }

    public function updatesetting()
    {
        $id                        = 1;
        $data['jalur']             = $this->input->post('jalur');
        $this->m_ppdb->updateset($data, $id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Berhasil disimpan',}");
        redirect('admin/setting', 'refresh');
    }

    // =============================== sekolah asal SD / MI =======================================

    public function sdmi()
    {
        $data['dbsdmi'] = $this->m_ppdb->getsdmi();
        $data['content']      = 'admin/sdmi';

        $this->load->view('admin/templating', $data);
    }

    public function addsdmi()
    {
        $data                     = $this->input->post();
        $this->m_ppdb->addsdmi($data);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: 'Tambah data berhasil'}");
        redirect('admin/sdmi', 'refresh');
    }

    public function editsdmi()
    {
        $id                     = $this->input->post('id');
        $data                   = $this->input->post();

        $this->m_ppdb->updatesdmi($data, $id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: 'Edit data berhasil'}");
        redirect('admin/sdmi', 'refresh');
    }

    public function delsdmi($id)
    {
        $this->m_ppdb->delsdmi($id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'Data telah di hapus'}");
        redirect('admin/sdmi', 'refresh');
    }

    // =============================== sekolah asal SMP / MTs =======================================
    public function smpmts()
    {
        $data['dbsmpmts'] = $this->m_ppdb->getsmpmts();
        $data['content']      = 'admin/smpmts';

        $this->load->view('admin/templating', $data);
    }

    public function addsmpmts()
    {
        $data                     = $this->input->post();
        $this->m_ppdb->addsmpmts($data);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: 'Tambah data berhasil'}");
        redirect('admin/smpmts', 'refresh');
    }

    public function editsmpmts()
    {
        $id                     = $this->input->post('id');
        $data                   = $this->input->post();

        $this->m_ppdb->updatesdmi($data, $id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: 'Edit data berhasil'}");
        redirect('admin/smpmts', 'refresh');
    }

    public function delsmpmts($id)
    {
        $this->m_ppdb->delsmpmts($id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'Data telah di hapus'}");
        redirect('admin/smpmts', 'refresh');
    }

    // =============================== Download =======================================
    public function master()
    {
        $data['content']      = 'admin/master';

        $this->load->view('admin/templating', $data);
    }

    // =============================== Upload =======================================
    public function uploadsdmi()
    {
        if (isset($_FILES["file"]["name"])) {
            // upload
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads

            $object = PHPExcel_IOFactory::load($file_tmp);

            foreach ($object->getWorksheetIterator() as $worksheet) {

                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();

                for ($row = 4; $row <= $highestRow; $row++) {

                    $npsn = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $lembaga = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $alamat = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

                    $data[] = array(
                        'npsn'          => $npsn,
                        'lembaga'          => $lembaga,
                        'alamat'          => $alamat,
                    );
                }
            }

            $this->db->insert_batch('db_sdmi', $data);
            $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Berhasil',text: 'Data Berhasil Di Upload'}");
            redirect('admin/sdmi');
        } else {
            $this->session->set_flashdata('pesan', "{icon: 'error', title: 'Gagal',text: 'Upload Gagal'}");
            redirect('admin/sdmi');
        }
    }
    public function uploadsmpmts()
    {
        if (isset($_FILES["file"]["name"])) {
            // upload
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads

            $object = PHPExcel_IOFactory::load($file_tmp);

            foreach ($object->getWorksheetIterator() as $worksheet) {

                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();

                for ($row = 4; $row <= $highestRow; $row++) {

                    $npsn = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $lembaga = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $alamat = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

                    $data[] = array(
                        'npsn'          => $npsn,
                        'lembaga'          => $lembaga,
                        'alamat'          => $alamat,
                    );
                }
            }

            $this->db->insert_batch('db_smpmts', $data);
            $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Berhasil',text: 'Data Berhasil Di Upload'}");
            redirect('admin/smpmts');
        } else {
            $this->session->set_flashdata('pesan', "{icon: 'error', title: 'Gagal',text: 'Upload Gagal'}");
            redirect('admin/smpmts');
        }
    }
    // =============================== Info =======================================
    public function saveinfo()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data['tanggal']     = date("Y/m/d");
        $data['waktu']         = date("h:i:s");
        $data['user']         = $this->input->post('user');
        $data['jabatan']     = $this->input->post('jabatan');
        $data['status']     = $this->input->post('status');

        $this->m_ppdb->savinfo($data);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Berhasil',text: 'Info Berhasil Di Tambahkan'}");
        redirect('admin');
    }

    function del_info($id)
    {
        $this->m_ppdb->delinfo($id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'Info telah di hapus'}");
        redirect('admin');
    }

    // Export
    public function export($par)
    {
        // Load plugin PHPExcel nya
        // include(APPPATH . 'third_party/PHPExcel/PHPExcel/autoloader.php');
        // include(APPPATH . 'third_party/PHPExcel/PHPExcel.php');

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        $lembaga = strtoupper($par);
        $user = $this->session->userdata('nama');

        // Settingan awal fil excel
        $excel->getProperties()->setCreator('Mukhammad Yasin')
            ->setLastModifiedBy($user)
            ->setTitle("Data Siswa Aktif" . $lembaga)
            ->setSubject("Siswa")
            ->setDescription("Data Siswa " . $lembaga)
            ->setKeywords("Data Siswa " . $lembaga);

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

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATABASE SISWA " . $lembaga); // Set kolom A1 dengan tulisan "DATA SISWA"
        date_default_timezone_set('Asia/Jakarta');
        $excel->setActiveSheetIndex(0)->setCellValue('A2', "Diunduh oleh " . $user . " pada " . date("d/m/Y H:i:s"));
        // $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(13); // Set font size 15 untuk kolom A1
        // $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A4', "NO");
        $excel->setActiveSheetIndex(0)->setCellValue('B4', "NOMOR REGISTRASI");
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
        $excel->setActiveSheetIndex(0)->setCellValue('BQ4', "JALUR");
        $excel->setActiveSheetIndex(0)->setCellValue('BR4', "UPDATED");
        $excel->setActiveSheetIndex(0)->setCellValue('BS4', "EDITOR");
        $excel->setActiveSheetIndex(0)->setCellValue('BT4', "MGM");
        $excel->setActiveSheetIndex(0)->setCellValue('BU4', "KETERANGAN");



        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A4:BR4')->applyFromArray($style_col);

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        // $siswa = $this->admin_model->getmts();


        $siswa = $this->m_ppdb->get_data($par);

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($siswa as $data) { // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValueExplicit('B' . $numrow, $data->no_reg, PHPExcel_Cell_DataType::TYPE_STRING);
            $excel->setActiveSheetIndex(0)->setCellValueExplicit('C' . $numrow, $data->nisn, PHPExcel_Cell_DataType::TYPE_STRING);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->nama);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->jk);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->tmp_lahir);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->tgl_lahir);
            $excel->setActiveSheetIndex(0)->setCellValueExplicit('H' . $numrow, $data->nik, PHPExcel_Cell_DataType::TYPE_STRING);
            $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->agama);
            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->alamat);
            $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->rt);
            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data->rw);
            $excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $data->dusun);
            $excel->setActiveSheetIndex(0)->setCellValue('N' . $numrow, $data->kelurahan);
            $excel->setActiveSheetIndex(0)->setCellValue('O' . $numrow, $data->kecamatan);
            $excel->setActiveSheetIndex(0)->setCellValue('P' . $numrow, $data->kabupaten);
            $excel->setActiveSheetIndex(0)->setCellValue('Q' . $numrow, $data->propinsi);
            $excel->setActiveSheetIndex(0)->setCellValue('R' . $numrow, $data->sts_tinggal);
            $excel->setActiveSheetIndex(0)->setCellValue('S' . $numrow, $data->jns_tinggal);
            $excel->setActiveSheetIndex(0)->setCellValue('T' . $numrow, $data->alat_trans);
            $excel->setActiveSheetIndex(0)->setCellValue('U' . $numrow, $data->telp);
            $excel->setActiveSheetIndex(0)->setCellValue('V' . $numrow, $data->email);
            $excel->setActiveSheetIndex(0)->setCellValue('W' . $numrow, $data->anak_ke);
            $excel->setActiveSheetIndex(0)->setCellValue('X' . $numrow, $data->jml_sdr);
            $excel->setActiveSheetIndex(0)->setCellValueExplicit('Y' . $numrow, $data->no_kk, PHPExcel_Cell_DataType::TYPE_STRING);
            $excel->setActiveSheetIndex(0)->setCellValue('Z' . $numrow, $data->nm_ayh);
            $excel->setActiveSheetIndex(0)->setCellValue('AA' . $numrow, $data->tlahir_ayh);
            $excel->setActiveSheetIndex(0)->setCellValue('AB' . $numrow, $data->lahir_ayh);
            $excel->setActiveSheetIndex(0)->setCellValue('AC' . $numrow, $data->pend_ayh);
            $excel->setActiveSheetIndex(0)->setCellValue('AD' . $numrow, $data->kerja_ayh);
            $excel->setActiveSheetIndex(0)->setCellValue('AE' . $numrow, $data->hasil_ayh);
            $excel->setActiveSheetIndex(0)->setCellValueExplicit('AF' . $numrow, $data->nik_ayh, PHPExcel_Cell_DataType::TYPE_STRING);
            $excel->setActiveSheetIndex(0)->setCellValue('AG' . $numrow, $data->nm_ibu);
            $excel->setActiveSheetIndex(0)->setCellValue('AH' . $numrow, $data->tlahir_ibu);
            $excel->setActiveSheetIndex(0)->setCellValue('AI' . $numrow, $data->lahir_ibu);
            $excel->setActiveSheetIndex(0)->setCellValue('AJ' . $numrow, $data->pend_ibu);
            $excel->setActiveSheetIndex(0)->setCellValue('AK' . $numrow, $data->kerja_ibu);
            $excel->setActiveSheetIndex(0)->setCellValue('AL' . $numrow, $data->hasil_ibu);
            $excel->setActiveSheetIndex(0)->setCellValueExplicit('AM' . $numrow, $data->nik_ibu, PHPExcel_Cell_DataType::TYPE_STRING);
            $excel->setActiveSheetIndex(0)->setCellValue('AN' . $numrow, $data->nm_wl);
            $excel->setActiveSheetIndex(0)->setCellValue('AO' . $numrow, $data->tlahir_wl);
            $excel->setActiveSheetIndex(0)->setCellValue('AP' . $numrow, $data->lahir_wl);
            $excel->setActiveSheetIndex(0)->setCellValue('AQ' . $numrow, $data->pend_wl);
            $excel->setActiveSheetIndex(0)->setCellValue('AR' . $numrow, $data->kerja_wl);
            $excel->setActiveSheetIndex(0)->setCellValue('AS' . $numrow, $data->hasil_wl);
            $excel->setActiveSheetIndex(0)->setCellValueExplicit('AT' . $numrow, $data->nik_wl, PHPExcel_Cell_DataType::TYPE_STRING);
            $excel->setActiveSheetIndex(0)->setCellValue('AU' . $numrow, $data->no_un);
            $excel->setActiveSheetIndex(0)->setCellValue('AV' . $numrow, $data->no_skhun);
            $excel->setActiveSheetIndex(0)->setCellValue('AW' . $numrow, $data->no_ijazah);
            $excel->setActiveSheetIndex(0)->setCellValue('AX' . $numrow, $data->no_kps);
            $excel->setActiveSheetIndex(0)->setCellValue('AY' . $numrow, $data->no_kip);
            $excel->setActiveSheetIndex(0)->setCellValue('AZ' . $numrow, $data->no_kis);
            $excel->setActiveSheetIndex(0)->setCellValue('BA' . $numrow, $data->no_pkh);
            $excel->setActiveSheetIndex(0)->setCellValue('BB' . $numrow, $data->beasiswa);
            $excel->setActiveSheetIndex(0)->setCellValue('BC' . $numrow, $data->kelas_7);
            $excel->setActiveSheetIndex(0)->setCellValue('BD' . $numrow, $data->kelas_8);
            $excel->setActiveSheetIndex(0)->setCellValue('BE' . $numrow, $data->kelas_9);
            $excel->setActiveSheetIndex(0)->setCellValue('BF' . $numrow, $data->kelas_aktf);
            $excel->setActiveSheetIndex(0)->setCellValue('BG' . $numrow, $data->kelas_dig);
            $excel->setActiveSheetIndex(0)->setCellValue('BH' . $numrow, $data->skl_asal);
            $excel->setActiveSheetIndex(0)->setCellValue('BI' . $numrow, $data->almt_skl);
            $excel->setActiveSheetIndex(0)->setCellValue('BJ' . $numrow, $data->jns_masuk);
            $excel->setActiveSheetIndex(0)->setCellValue('BK' . $numrow, $data->tgl_masuk);
            $excel->setActiveSheetIndex(0)->setCellValue('BL' . $numrow, $data->ket_out);
            $excel->setActiveSheetIndex(0)->setCellValue('BM' . $numrow, $data->tgl_out);
            $excel->setActiveSheetIndex(0)->setCellValue('BN' . $numrow, $data->alasan_out);
            $excel->setActiveSheetIndex(0)->setCellValue('BO' . $numrow, $data->nosrt_out);
            $excel->setActiveSheetIndex(0)->setCellValue('BP' . $numrow, $data->status);
            $excel->setActiveSheetIndex(0)->setCellValue('BQ' . $numrow, $data->jalur);
            $excel->setActiveSheetIndex(0)->setCellValue('BR' . $numrow, $data->progres);
            $excel->setActiveSheetIndex(0)->setCellValue('BS' . $numrow, $data->editor);
            $excel->setActiveSheetIndex(0)->setCellValue('BT' . $numrow, $data->mgm);
            $excel->setActiveSheetIndex(0)->setCellValue('BU' . $numrow, $data->ket);



            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A' . $numrow . ':BU' . $numrow)->applyFromArray($style_row);

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
        $excel->getActiveSheet()->getColumnDimension('BS')->setWidth(25);
        $excel->getActiveSheet()->getColumnDimension('BT')->setWidth(25);
        $excel->getActiveSheet()->getColumnDimension('BU')->setWidth(25);

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Data Siswa");
        $excel->setActiveSheetIndex(0);

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Siswa Aktif ' . $lembaga . '.xls"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }
    // Backup
    public function backup($par)
    {
        // Load plugin PHPExcel nya
        // include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        $lembaga = strtoupper($par);
        $user = $this->session->userdata('nama');

        // Settingan awal fil excel
        $excel->getProperties()->setCreator('Mukhammad Yasin')
            ->setLastModifiedBy($user)
            ->setTitle("Backup Database " . $lembaga)
            ->setSubject("Siswa")
            ->setDescription("Data Siswa " . $lembaga)
            ->setKeywords("Data Siswa " . $lembaga);

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

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATABASE SISWA " . $lembaga); // Set kolom A1 dengan tulisan "DATA SISWA"
        date_default_timezone_set('Asia/Jakarta');
        $excel->setActiveSheetIndex(0)->setCellValue('A2', "Diunduh oleh " . $user . " pada " . date("d/m/Y H:i:s"));
        // $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(13); // Set font size 15 untuk kolom A1
        // $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A4', "NO");
        $excel->setActiveSheetIndex(0)->setCellValue('B4', "NOMOR REGISTRASI");
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
        $excel->setActiveSheetIndex(0)->setCellValue('BQ4', "JALUR");
        $excel->setActiveSheetIndex(0)->setCellValue('BR4', "UPDATED");
        $excel->setActiveSheetIndex(0)->setCellValue('BS4', "EDITOR");
        $excel->setActiveSheetIndex(0)->setCellValue('BT4', "MGM");
        $excel->setActiveSheetIndex(0)->setCellValue('BU4', "KETERANGAN");

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A4:BU4')->applyFromArray($style_col);

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        // $siswa = $this->admin_model->getmts();

        $siswa = $this->m_ppdb->get_backup($par);

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($siswa as $data) { // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValueExplicit('B' . $numrow, $data->no_reg, PHPExcel_Cell_DataType::TYPE_STRING);
            $excel->setActiveSheetIndex(0)->setCellValueExplicit('C' . $numrow, $data->nisn, PHPExcel_Cell_DataType::TYPE_STRING);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->nama);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->jk);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->tmp_lahir);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->tgl_lahir);
            $excel->setActiveSheetIndex(0)->setCellValueExplicit('H' . $numrow, $data->nik, PHPExcel_Cell_DataType::TYPE_STRING);
            $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->agama);
            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->alamat);
            $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->rt);
            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data->rw);
            $excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $data->dusun);
            $excel->setActiveSheetIndex(0)->setCellValue('N' . $numrow, $data->kelurahan);
            $excel->setActiveSheetIndex(0)->setCellValue('O' . $numrow, $data->kecamatan);
            $excel->setActiveSheetIndex(0)->setCellValue('P' . $numrow, $data->kabupaten);
            $excel->setActiveSheetIndex(0)->setCellValue('Q' . $numrow, $data->propinsi);
            $excel->setActiveSheetIndex(0)->setCellValue('R' . $numrow, $data->sts_tinggal);
            $excel->setActiveSheetIndex(0)->setCellValue('S' . $numrow, $data->jns_tinggal);
            $excel->setActiveSheetIndex(0)->setCellValue('T' . $numrow, $data->alat_trans);
            $excel->setActiveSheetIndex(0)->setCellValue('U' . $numrow, $data->telp);
            $excel->setActiveSheetIndex(0)->setCellValue('V' . $numrow, $data->email);
            $excel->setActiveSheetIndex(0)->setCellValue('W' . $numrow, $data->anak_ke);
            $excel->setActiveSheetIndex(0)->setCellValue('X' . $numrow, $data->jml_sdr);
            $excel->setActiveSheetIndex(0)->setCellValueExplicit('Y' . $numrow, $data->no_kk, PHPExcel_Cell_DataType::TYPE_STRING);
            $excel->setActiveSheetIndex(0)->setCellValue('Z' . $numrow, $data->nm_ayh);
            $excel->setActiveSheetIndex(0)->setCellValue('AA' . $numrow, $data->tlahir_ayh);
            $excel->setActiveSheetIndex(0)->setCellValue('AB' . $numrow, $data->lahir_ayh);
            $excel->setActiveSheetIndex(0)->setCellValue('AC' . $numrow, $data->pend_ayh);
            $excel->setActiveSheetIndex(0)->setCellValue('AD' . $numrow, $data->kerja_ayh);
            $excel->setActiveSheetIndex(0)->setCellValue('AE' . $numrow, $data->hasil_ayh);
            $excel->setActiveSheetIndex(0)->setCellValueExplicit('AF' . $numrow, $data->nik_ayh, PHPExcel_Cell_DataType::TYPE_STRING);
            $excel->setActiveSheetIndex(0)->setCellValue('AG' . $numrow, $data->nm_ibu);
            $excel->setActiveSheetIndex(0)->setCellValue('AH' . $numrow, $data->tlahir_ibu);
            $excel->setActiveSheetIndex(0)->setCellValue('AI' . $numrow, $data->lahir_ibu);
            $excel->setActiveSheetIndex(0)->setCellValue('AJ' . $numrow, $data->pend_ibu);
            $excel->setActiveSheetIndex(0)->setCellValue('AK' . $numrow, $data->kerja_ibu);
            $excel->setActiveSheetIndex(0)->setCellValue('AL' . $numrow, $data->hasil_ibu);
            $excel->setActiveSheetIndex(0)->setCellValueExplicit('AM' . $numrow, $data->nik_ibu, PHPExcel_Cell_DataType::TYPE_STRING);
            $excel->setActiveSheetIndex(0)->setCellValue('AN' . $numrow, $data->nm_wl);
            $excel->setActiveSheetIndex(0)->setCellValue('AO' . $numrow, $data->tlahir_wl);
            $excel->setActiveSheetIndex(0)->setCellValue('AP' . $numrow, $data->lahir_wl);
            $excel->setActiveSheetIndex(0)->setCellValue('AQ' . $numrow, $data->pend_wl);
            $excel->setActiveSheetIndex(0)->setCellValue('AR' . $numrow, $data->kerja_wl);
            $excel->setActiveSheetIndex(0)->setCellValue('AS' . $numrow, $data->hasil_wl);
            $excel->setActiveSheetIndex(0)->setCellValueExplicit('AT' . $numrow, $data->nik_wl, PHPExcel_Cell_DataType::TYPE_STRING);
            $excel->setActiveSheetIndex(0)->setCellValue('AU' . $numrow, $data->no_un);
            $excel->setActiveSheetIndex(0)->setCellValue('AV' . $numrow, $data->no_skhun);
            $excel->setActiveSheetIndex(0)->setCellValue('AW' . $numrow, $data->no_ijazah);
            $excel->setActiveSheetIndex(0)->setCellValue('AX' . $numrow, $data->no_kps);
            $excel->setActiveSheetIndex(0)->setCellValue('AY' . $numrow, $data->no_kip);
            $excel->setActiveSheetIndex(0)->setCellValue('AZ' . $numrow, $data->no_kis);
            $excel->setActiveSheetIndex(0)->setCellValue('BA' . $numrow, $data->no_pkh);
            $excel->setActiveSheetIndex(0)->setCellValue('BB' . $numrow, $data->beasiswa);
            $excel->setActiveSheetIndex(0)->setCellValue('BC' . $numrow, $data->kelas_7);
            $excel->setActiveSheetIndex(0)->setCellValue('BD' . $numrow, $data->kelas_8);
            $excel->setActiveSheetIndex(0)->setCellValue('BE' . $numrow, $data->kelas_9);
            $excel->setActiveSheetIndex(0)->setCellValue('BF' . $numrow, $data->kelas_aktf);
            $excel->setActiveSheetIndex(0)->setCellValue('BG' . $numrow, $data->kelas_dig);
            $excel->setActiveSheetIndex(0)->setCellValue('BH' . $numrow, $data->skl_asal);
            $excel->setActiveSheetIndex(0)->setCellValue('BI' . $numrow, $data->almt_skl);
            $excel->setActiveSheetIndex(0)->setCellValue('BJ' . $numrow, $data->jns_masuk);
            $excel->setActiveSheetIndex(0)->setCellValue('BK' . $numrow, $data->tgl_masuk);
            $excel->setActiveSheetIndex(0)->setCellValue('BL' . $numrow, $data->ket_out);
            $excel->setActiveSheetIndex(0)->setCellValue('BM' . $numrow, $data->tgl_out);
            $excel->setActiveSheetIndex(0)->setCellValue('BN' . $numrow, $data->alasan_out);
            $excel->setActiveSheetIndex(0)->setCellValue('BO' . $numrow, $data->nosrt_out);
            $excel->setActiveSheetIndex(0)->setCellValue('BP' . $numrow, $data->status);
            $excel->setActiveSheetIndex(0)->setCellValue('BQ' . $numrow, $data->jalur);
            $excel->setActiveSheetIndex(0)->setCellValue('BR' . $numrow, $data->progres);
            $excel->setActiveSheetIndex(0)->setCellValue('BS' . $numrow, $data->editor);
            $excel->setActiveSheetIndex(0)->setCellValue('BT' . $numrow, $data->mgm);
            $excel->setActiveSheetIndex(0)->setCellValue('BU' . $numrow, $data->ket);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A' . $numrow . ':BU' . $numrow)->applyFromArray($style_row);

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
        $excel->getActiveSheet()->getColumnDimension('BS')->setWidth(25);
        $excel->getActiveSheet()->getColumnDimension('BT')->setWidth(25);
        $excel->getActiveSheet()->getColumnDimension('BU')->setWidth(25);

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Data Siswa");
        $excel->setActiveSheetIndex(0);

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Backup Database ' . $lembaga . '.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }
}

/* End of file Admin.php */
