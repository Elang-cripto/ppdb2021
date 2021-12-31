-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Des 2021 pada 04.06
-- Versi Server: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alamienj_ppdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_info`
--

CREATE TABLE `db_info` (
  `id` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `user` varchar(20) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `status` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_info`
--

INSERT INTO `db_info` (`id`, `tanggal`, `waktu`, `user`, `jabatan`, `status`) VALUES
(5, '2021-02-02', '09:57:06', 'Mukhammad Yasin', 'admin', '<p>Update Hari ini</p><ul><li>Perbaikan bug kode dan perampingan kode</li><li>kode untuk history setiap edit data</li><li>penambahan Level pengguna</li></ul>'),
(9, '2021-02-24', '10:35:53', 'M. Yasin', 'admin', '<p>Update :</p><ul><li>Cetak absen dan form nilai ada di menu data rombel</li><li>Perbaikan bug cetak surat mutasi</li></ul><p><span style="color: rgb(73, 80, 87);">#SalamSatuDataAlamien</span><br></p>'),
(10, '2021-07-24', '01:59:27', 'M. Yasin', 'admin', '<p>Saat ini sedang dilaksanakan Updating Data Siswa Tahun Pelajaran 2021-2022. Mohon Bapak ibu wali kelas melaporkan ke admin jika ada kesalahan data siswa di kelasnya</p>'),
(11, '2021-09-23', '12:30:40', 'Administrator', 'admin', '<p>M IBNU ROSID Pindah Kelas dari 11 IPS 1 ke 11 IPS 2<br></p>'),
(12, '2021-09-26', '09:28:54', 'Administrator', 'admin', '<p>Update terbaru :</p><ol><li>Penambahan Kolom Status tempat tinggal</li><li>Penambahan Kolom Tempat Lahir Ayah, Ibu, Wali</li><li>Penambahan Kolom Tanggal Lahir Ayah, Ibu, Wali</li><li>Perbaikan Bug error yang terjadi saat pengajuan Validasi</li></ol><p><b><i>#Salam Satu Data Al Amien</i></b></p>'),
(13, '2021-10-12', '02:13:44', 'MOH. NASIR', 'headmaster', '<p>Info Penting ...</p><p>verifikasi berkas terakhir besok nggeh...</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_kls`
--

CREATE TABLE `db_kls` (
  `id` int(5) NOT NULL,
  `par` varchar(5) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `wali_kelas` varchar(50) NOT NULL,
  `validasi` varchar(10) NOT NULL,
  `keterangan` varchar(3000) NOT NULL,
  `lastupdate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_kls`
--

INSERT INTO `db_kls` (`id`, `par`, `kelas`, `wali_kelas`, `validasi`, `keterangan`, `lastupdate`) VALUES
(19, 'mts', '7B', 'MOH ALI MAS''UD', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-10-10 16:16:26'),
(20, 'mts', '7E', 'ARIF SUJARWO', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-11-15 12:42:50'),
(21, 'mts', '9B', 'Dian Suryawati', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-09-29 08:41:18'),
(22, 'mts', '7C', 'Robith Rifqi', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-09-27 18:15:18'),
(23, 'mts', '9D', 'M. Fathur Rohim', 'Finis', 'Data telah tervalidasi Admin', '2021-09-26 22:29:40'),
(24, 'mts', '7A', 'Takeb Irbani', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-11-20 13:52:18'),
(25, 'mts', '7F', 'PUTRI ARINI, S.Pd.', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-09-29 08:35:17'),
(26, 'mts', '8C', 'LUQMAN HAKIM', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-09-27 13:11:57'),
(27, 'mts', '7D', 'Reni sulistyani', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-09-30 13:36:52'),
(28, 'mts', '9C', 'Dra. MUYASSAROH', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-09-30 13:38:12'),
(29, 'mts', '8B', 'Muhammad David Akhyar', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-09-27 14:22:01'),
(30, 'mts', '8A', 'Uswatun Khoiriyah', 'Finis', 'Data telah tervalidasi Admin\r\n\r\n', '2021-09-29 08:40:50'),
(31, 'mts', '8E', 'MUHAMMAD NOOR SIDIQ', 'Revisi', 'Jumlah data Eror = 62<br>\r\nAHMAD ALFI MASHUDI = TELP Kosong<br>\r\nM. CERIL ALFA RAMADANI = TELP Kosong<br>\r\nMOH KHOIRUL ROFIQI = TEMPAT LAHIR IBU Kosong<br>\r\nMUHAMMAD WILDAN IKHSANI = TEMPAT LAHIR IBU Kosong<br>\r\nMUHAMMAD FARKHAN I''BADULLAH = STATUS TINGGAL Kosong<br>\r\nMUHAMMAD FARKHAN I''BADULLAH = NO KK Kosong<br>\r\nMUHAMMAD FARKHAN I''BADULLAH = TEMPAT LAHIR AYAH Kosong<br>\r\nMUHAMMAD FARKHAN I''BADULLAH = TEMPAT LAHIR IBU Kosong<br>\r\nMUHAMMAD FATKHUR ROZI = TELP Kosong<br>\r\nRIZKI RAMADANI = STATUS TINGGAL Kosong<br>\r\nRIZKI RAMADANI = NO KK Kosong<br>\r\nRIZKI RAMADANI = TEMPAT LAHIR AYAH Kosong<br>\r\nRIZKI RAMADANI = TEMPAT LAHIR IBU Kosong<br>\r\nROSALINA SANDRA DEWI = STATUS TINGGAL Kosong<br>\r\nROSALINA SANDRA DEWI = TELP Kosong<br>\r\nROSALINA SANDRA DEWI = NO KK Kosong<br>\r\nROSALINA SANDRA DEWI = TEMPAT LAHIR AYAH Kosong<br>\r\nROSALINA SANDRA DEWI = TEMPAT LAHIR IBU Kosong<br>\r\nSALMAN ALFARIZI = STATUS TINGGAL Kosong<br>\r\nSALMAN ALFARIZI = TELP Kosong<br>\r\nSALMAN ALFARIZI = NO KK Kosong<br>\r\nSALMAN ALFARIZI = TEMPAT LAHIR AYAH Kosong<br>\r\nSALMAN ALFARIZI = TEMPAT LAHIR IBU Kosong<br>\r\nSITI IZZATUL ABIEDAH = STATUS TINGGAL Kosong<br>\r\nSITI IZZATUL ABIEDAH = TELP Kosong<br>\r\nSITI IZZATUL ABIEDAH = NO KK Kosong<br>\r\nSITI IZZATUL ABIEDAH = TEMPAT LAHIR AYAH Kosong<br>\r\nSITI IZZATUL ABIEDAH = TEMPAT LAHIR IBU Kosong<br>\r\nTAHTA NUR IZZATI = STATUS TINGGAL Kosong<br>\r\nTAHTA NUR IZZATI = NO KK Kosong<br>\r\nTAHTA NUR IZZATI = TEMPAT LAHIR AYAH Kosong<br>\r\nTAHTA NUR IZZATI = TEMPAT LAHIR IBU Kosong<br>\r\nYASMIN NUR AZIZAH MAULIDIAH = STATUS TINGGAL Kosong<br>\r\nYASMIN NUR AZIZAH MAULIDIAH = NO KK Kosong<br>\r\nYASMIN NUR AZIZAH MAULIDIAH = TEMPAT LAHIR IBU Kosong<br>\r\nNANDA FIRLI VARADIVA = STATUS TINGGAL Kosong<br>\r\nNANDA FIRLI VARADIVA = JENIS TINGGAL Kosong<br>\r\nNANDA FIRLI VARADIVA = ALAT TRANSPORTASI Kosong<br>\r\nNANDA FIRLI VARADIVA = TELP Kosong<br>\r\nNANDA FIRLI VARADIVA = NO KK Kosong<br>\r\nNANDA FIRLI VARADIVA = TEMPAT LAHIR AYAH Kosong<br>\r\nNANDA FIRLI VARADIVA = HASIL AYAH Kosong<br>\r\nNANDA FIRLI VARADIVA = TEMPAT LAHIR IBU Kosong<br>\r\nNANDA FIRLI VARADIVA = HASIL IBU Kosong<br>\r\nROSI ABDILLAH = NIK Invalid<br>\r\nROSI ABDILLAH = STATUS TINGGAL Kosong<br>\r\nROSI ABDILLAH = JENIS TINGGAL Kosong<br>\r\nROSI ABDILLAH = ALAT TRANSPORTASI Kosong<br>\r\nROSI ABDILLAH = TELP Kosong<br>\r\nROSI ABDILLAH = ANAK KE Kosong<br>\r\nROSI ABDILLAH = JUMLAH SAUDARA Kosong<br>\r\nROSI ABDILLAH = NO KK Kosong<br>\r\nROSI ABDILLAH = TEMPAT LAHIR AYAH Kosong<br>\r\nROSI ABDILLAH = PENDIDIKAN AYAH Kosong<br>\r\nROSI ABDILLAH = KERJA AYAH Kosong<br>\r\nROSI ABDILLAH = HASIL AYAH Kosong<br>\r\nROSI ABDILLAH = NIK AYAH Invalid<br>\r\nROSI ABDILLAH = TEMPAT LAHIR IBU Kosong<br>\r\nROSI ABDILLAH = PENDIDIKAN IBU Kosong<br>\r\nROSI ABDILLAH = KERJA IBU Kosong<br>\r\nROSI ABDILLAH = HASIL IBU Kosong<br>\r\nROSI ABDILLAH = NIK IBU Invalid\r\n', '2021-10-12 15:00:46'),
(32, 'mts', '8D', 'hurry sayyidah robi''ah', 'Revisi', 'Jumlah data Eror = 1<br>\r\nSUBBA LIALMUNA = TELP Kosong\r\n', '2021-10-10 16:17:48'),
(33, 'mts', '9E', 'MOHAMMAD ASROFI', 'Revisi', 'Jumlah data Eror = 8<br>\r\nDEVI AMELIA PUTRI = NIK IBU Invalid<br>\r\nKHALIFAH RAHMAWATI = ALAT TRANSPORTASI Kosong<br>\r\nREVANANDA CITRA SAPUTRI = ALAT TRANSPORTASI Kosong<br>\r\nREVANANDA CITRA SAPUTRI = HASIL AYAH Kosong<br>\r\nREVANANDA CITRA SAPUTRI = HASIL IBU Kosong<br>\r\nSITI MASRUROH = ANAK KE Kosong<br>\r\nSITI MASRUROH = JUMLAH SAUDARA Kosong<br>\r\nTRIO ARIF WIBOWO` = NO SKHUN Kosong\r\n', '2021-03-16 15:29:59'),
(34, 'mts', '9A', 'Isnaini Wahdanawati', 'Revisi', 'Jumlah data Eror = 12<br>\r\nMOHAMMAD ILHAM = TELP Kosong<br>\r\nWIDYA AYU ANGGITA = STATUS TINGGAL Kosong<br>\r\nWIDYA AYU ANGGITA = PENDIDIKAN AYAH Kosong<br>\r\nWIDYA AYU ANGGITA = KERJA AYAH Kosong<br>\r\nWIDYA AYU ANGGITA = HASIL AYAH Kosong<br>\r\nWIDYA AYU ANGGITA = NIK AYAH Invalid<br>\r\nNURIY NAILUL MUKARROMAH = PENDIDIKAN AYAH Kosong<br>\r\nNURIY NAILUL MUKARROMAH = KERJA AYAH Kosong<br>\r\nNURIY NAILUL MUKARROMAH = HASIL AYAH Kosong<br>\r\nNURIY NAILUL MUKARROMAH = NIK AYAH Invalid<br>\r\nAMAI KIREINA = NO SKHUN Kosong<br>\r\nNADIRA  NUR MAHARANI = NIK Invalid\r\n', '2021-10-12 15:01:21'),
(35, 'ma', '11-IPA-1', 'Wiwin Lutfiani', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-09-27 13:13:54'),
(36, 'ma', '12-IPS-2', 'MUHAMAD ZAMRONI', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-09-27 14:52:16'),
(37, 'smp', '7A', 'Siti Alfiah', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-10-10 16:21:05'),
(38, 'ma', '10-IPA-2', 'HANIF MUQORROBIN', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-11-15 12:42:03'),
(39, 'ma', '10-IPS-2', 'ARIF NURDIANSYAH, S.Pd', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-10-10 20:36:03'),
(40, 'smk', '10-TB', 'Annissa Fitriani', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-10-10 16:21:27'),
(41, 'ma', '11-IPS-2', 'IRFAN BAYU ANGGARA', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-09-26 13:46:20'),
(42, 'smk', '11-TB', 'Mia fa''adah alma''mun', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-09-27 21:45:21'),
(43, 'smp', '7B', 'Muawanah, S.Pd', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-11-17 12:17:36'),
(44, 'smp', '8B', 'Abdul Hamid', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-09-27 16:08:39'),
(45, 'smp', '8A', 'Nuris Sabilatul Munfida', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-09-28 06:09:16'),
(46, 'smp', '9A', 'Robit El Muttaqin, S. Pd', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-09-27 16:09:09'),
(47, 'ma', '12-IPS-1', 'Siti Nurhayati', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-09-27 14:54:26'),
(48, 'ma', '12-IPA-2', 'MOHAMMAD FARID WAJDI', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-10-12 15:03:45'),
(49, 'ma', '11-IPS-1', 'ELIFITA', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-09-27 13:15:02'),
(50, 'ma', '10-IPA-1', 'NOVAN INDARTO', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-11-20 11:51:48'),
(51, 'smk', '12-TB', 'Lutfiatul Rohmatin', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-09-27 14:53:35'),
(52, 'ma', '11-IPA-2', 'RATNA JUWITA', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-09-27 13:14:32'),
(54, 'ma', '12-IPA-1', 'RIO ALDINAS', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-10-12 15:03:18'),
(55, 'ma', '10-IPS-1', 'MIFTAHUL ULUM', 'Pengajuan', 'Jumlah data Eror = 4<br>\r\nAHMAD AKBAR WILDAN NUR ROHIM = NIK Invalid<br>\r\nAHMAD AKBAR WILDAN NUR ROHIM = KERJA IBU Kosong<br>\r\nLUSI AYU AMBARWATI = NIK Invalid<br>\r\nSHINTA DWI NUR HIDAYAH = NIK Invalid\r\n', '2021-11-25 14:22:35'),
(56, 'smp', '9B', 'Mohammad aghnis shulkhi', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-10-10 20:37:17'),
(57, 'mts', '8F', 'Ihwan Nur Huda', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-09-28 06:08:32'),
(58, 'smp', '9C', 'Himmatul Aliyah', 'Revisi', 'Jumlah data Eror = 2<br>\r\nRAHMA NUR WULAN = NO SKHUN Kosong<br>\r\nMUHAMMAD ZAYNI = NO SKHUN Kosong\r\n', '2021-10-12 15:04:46'),
(59, 'mts', '7G', 'muslikah', 'Finis', 'Data telah tervalidasi Admin\r\n', '2021-11-20 11:53:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_link_a`
--

CREATE TABLE `db_link_a` (
  `id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `link` varchar(500) NOT NULL,
  `update` date NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `db_link_a`
--

INSERT INTO `db_link_a` (`id`, `file`, `link`, `update`, `ket`) VALUES
(1, 'CONTOH KKM', 'https://brtyl-my.sharepoint.com/:f:/g/personal/yasin_apps365_work/EmXbzxKfkWNMiv5_5_KAXfEBlA9pyQu7wwuXi8I2WHmZyA?e=WaFSGF', '2021-08-05', ''),
(2, 'CONTOH PERANGKAT PEMBELAJARAN', 'https://brtyl-my.sharepoint.com/:f:/g/personal/yasin_apps365_work/EkZNouIHEHlOnXZJQ2zEEkAB80J1c3Na1VKWP26qVaZL6w?e=ScgDxO', '2021-08-20', ''),
(3, 'MATERI SOSIALISASI', 'https://brtyl-my.sharepoint.com/:f:/g/personal/yasin_apps365_work/Ep59zJLDwBJEkJnnzCoQNyQBAtQ2ffRcVtwbJi2fdYQlIg?e=y7Uhfi', '2021-08-20', ''),
(4, 'ADMINISTRASI', 'https://brtyl-my.sharepoint.com/:f:/g/personal/yasin_apps365_work/EoBG8O9MTeBFvtXArzzqlHkBB9Ic3Jbu8Z3v7Z9FlxeRsw?e=wiczol', '2021-08-20', ''),
(5, 'KI KD KONDISI KHUSUS', 'https://brtyl-my.sharepoint.com/:f:/g/personal/yasin_apps365_work/Eptw5UnT6yVDgI84D3pz8NAB4CrqWYVZbELe5nYImbgfwQ?e=ROrepy', '2021-08-20', ''),
(7, 'SEMUA AKUN GURU RDM MTs', 'https://drive.google.com/file/d/1hhQRJQ3W7vbEdMwGy_HCqfF_Sl4urjEq/view?usp=sharing', '2021-12-02', ''),
(8, 'SEMUA AKUN GURU RDM MA', 'https://drive.google.com/file/d/1C2CPYkPYYDBbOuLskVNdf2oPmIkPNUUi/view?usp=sharing', '2021-12-01', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_link_d`
--

CREATE TABLE `db_link_d` (
  `id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `link` varchar(500) NOT NULL,
  `update` date NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `db_link_d`
--

INSERT INTO `db_link_d` (`id`, `file`, `link`, `update`, `ket`) VALUES
(2, 'Link Menuju RDM MTS', 'http://062e-125-166-117-195.ngrok.io ', '2021-12-09', ''),
(6, 'Link Menuju RDM MA', 'http://bb17-125-166-117-195.ngrok.io', '2021-12-09', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_ma`
--

CREATE TABLE `db_ma` (
  `id` int(5) NOT NULL,
  `id_enc` varchar(50) NOT NULL,
  `no_reg` varchar(18) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `tmp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `dusun` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `propinsi` varchar(100) NOT NULL,
  `sts_tinggal` varchar(50) NOT NULL,
  `jns_tinggal` varchar(100) NOT NULL,
  `alat_trans` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `anak_ke` varchar(2) NOT NULL,
  `jml_sdr` varchar(2) NOT NULL,
  `nm_ayh` varchar(100) NOT NULL,
  `tlahir_ayh` varchar(50) NOT NULL,
  `lahir_ayh` date NOT NULL,
  `pend_ayh` varchar(20) NOT NULL,
  `kerja_ayh` varchar(100) NOT NULL,
  `hasil_ayh` varchar(50) NOT NULL,
  `nik_ayh` varchar(16) NOT NULL,
  `nm_ibu` varchar(100) NOT NULL,
  `tlahir_ibu` varchar(50) NOT NULL,
  `lahir_ibu` date NOT NULL,
  `pend_ibu` varchar(20) NOT NULL,
  `kerja_ibu` varchar(100) NOT NULL,
  `hasil_ibu` varchar(50) NOT NULL,
  `nik_ibu` varchar(16) NOT NULL,
  `nm_wl` varchar(100) NOT NULL,
  `lahir_wl` date NOT NULL,
  `tlahir_wl` varchar(50) NOT NULL,
  `pend_wl` varchar(20) NOT NULL,
  `kerja_wl` varchar(100) NOT NULL,
  `hasil_wl` varchar(50) NOT NULL,
  `nik_wl` varchar(16) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `no_un` varchar(30) NOT NULL,
  `no_skhun` varchar(30) NOT NULL,
  `no_ijazah` varchar(30) NOT NULL,
  `no_kps` varchar(25) NOT NULL,
  `no_kip` varchar(25) NOT NULL,
  `no_kis` varchar(25) NOT NULL,
  `no_pkh` varchar(25) NOT NULL,
  `beasiswa` varchar(10) NOT NULL,
  `kelas_7` varchar(10) NOT NULL,
  `kelas_8` varchar(10) NOT NULL,
  `kelas_9` varchar(10) NOT NULL,
  `kelas_aktf` varchar(10) NOT NULL,
  `kelas_dig` varchar(10) NOT NULL,
  `skl_asal` varchar(100) NOT NULL,
  `almt_skl` varchar(100) NOT NULL,
  `jns_masuk` varchar(100) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `ket_out` varchar(100) NOT NULL,
  `tgl_out` date NOT NULL,
  `alasan_out` varchar(100) NOT NULL,
  `nosrt_out` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `jalur` varchar(25) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `progres` varchar(50) NOT NULL,
  `editor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_ma`
--

INSERT INTO `db_ma` (`id`, `id_enc`, `no_reg`, `nisn`, `nama`, `jk`, `tmp_lahir`, `tgl_lahir`, `nik`, `agama`, `alamat`, `rt`, `rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `propinsi`, `sts_tinggal`, `jns_tinggal`, `alat_trans`, `telp`, `email`, `anak_ke`, `jml_sdr`, `nm_ayh`, `tlahir_ayh`, `lahir_ayh`, `pend_ayh`, `kerja_ayh`, `hasil_ayh`, `nik_ayh`, `nm_ibu`, `tlahir_ibu`, `lahir_ibu`, `pend_ibu`, `kerja_ibu`, `hasil_ibu`, `nik_ibu`, `nm_wl`, `lahir_wl`, `tlahir_wl`, `pend_wl`, `kerja_wl`, `hasil_wl`, `nik_wl`, `no_kk`, `no_un`, `no_skhun`, `no_ijazah`, `no_kps`, `no_kip`, `no_kis`, `no_pkh`, `beasiswa`, `kelas_7`, `kelas_8`, `kelas_9`, `kelas_aktf`, `kelas_dig`, `skl_asal`, `almt_skl`, `jns_masuk`, `tgl_masuk`, `ket_out`, `tgl_out`, `alasan_out`, `nosrt_out`, `status`, `jalur`, `foto`, `progres`, `editor`) VALUES
(1, 'b47c29ab66c06dd671c6b6950c0eadad', '538-211230-001', '0002545415', 'adjsajdas dsad', 'P', 'nabire', '2021-12-01', '3198627361726123', 'Islam', 'Jl.hbadbas asjbdkasbdbaskdbaskb723623', '2', '1', 'kebonsari', 'sabrang', 'ambulu', 'jember', 'jawa timur', 'Milik Sendiri', 'Dusun', 'Angkutan umum/bus/pete-pete', '086235623243', 'anashasd@gmail.com', '1', '2', 'sadas', 'ndfdg', '2021-12-09', 'SD Sederajad', 'Buruh', 'Rp. 5,000,000 - Rp. 20,000,000', '432432434324234', 'asdadad', 'ndfgsfasda', '2021-12-21', 'SMP Sederajad', 'Pensiunan', 'Tidak Berpenghasilan', '234324324324', '', '0000-00-00', '', '', '', '', '', '35056756465456', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sdn sumberejo 7', 'sumberejo', 'Siswa Baru', '0000-00-00', '', '0000-00-00', '', '', '', '', '', '0', 'adjsajdas dsad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_mts`
--

CREATE TABLE `db_mts` (
  `id` int(5) NOT NULL,
  `id_enc` varchar(50) NOT NULL,
  `no_reg` varchar(18) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `tmp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `dusun` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `propinsi` varchar(100) NOT NULL,
  `sts_tinggal` varchar(50) NOT NULL,
  `jns_tinggal` varchar(100) NOT NULL,
  `alat_trans` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `anak_ke` varchar(2) NOT NULL,
  `jml_sdr` varchar(2) NOT NULL,
  `nm_ayh` varchar(100) NOT NULL,
  `tlahir_ayh` varchar(50) NOT NULL,
  `lahir_ayh` date NOT NULL,
  `pend_ayh` varchar(20) NOT NULL,
  `kerja_ayh` varchar(100) NOT NULL,
  `hasil_ayh` varchar(50) NOT NULL,
  `nik_ayh` varchar(16) NOT NULL,
  `nm_ibu` varchar(100) NOT NULL,
  `tlahir_ibu` varchar(50) NOT NULL,
  `lahir_ibu` date NOT NULL,
  `pend_ibu` varchar(20) NOT NULL,
  `kerja_ibu` varchar(100) NOT NULL,
  `hasil_ibu` varchar(50) NOT NULL,
  `nik_ibu` varchar(16) NOT NULL,
  `nm_wl` varchar(100) NOT NULL,
  `lahir_wl` date NOT NULL,
  `tlahir_wl` varchar(50) NOT NULL,
  `pend_wl` varchar(20) NOT NULL,
  `kerja_wl` varchar(100) NOT NULL,
  `hasil_wl` varchar(50) NOT NULL,
  `nik_wl` varchar(16) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `no_un` varchar(30) NOT NULL,
  `no_skhun` varchar(30) NOT NULL,
  `no_ijazah` varchar(30) NOT NULL,
  `no_kps` varchar(25) NOT NULL,
  `no_kip` varchar(25) NOT NULL,
  `no_kis` varchar(25) NOT NULL,
  `no_pkh` varchar(25) NOT NULL,
  `beasiswa` varchar(10) NOT NULL,
  `kelas_7` varchar(10) NOT NULL,
  `kelas_8` varchar(10) NOT NULL,
  `kelas_9` varchar(10) NOT NULL,
  `kelas_aktf` varchar(10) NOT NULL,
  `kelas_dig` varchar(10) NOT NULL,
  `skl_asal` varchar(100) NOT NULL,
  `almt_skl` varchar(100) NOT NULL,
  `jns_masuk` varchar(100) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `ket_out` varchar(100) NOT NULL,
  `tgl_out` date NOT NULL,
  `alasan_out` varchar(100) NOT NULL,
  `nosrt_out` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `jalur` varchar(25) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `progres` date NOT NULL,
  `editor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_mts`
--

INSERT INTO `db_mts` (`id`, `id_enc`, `no_reg`, `nisn`, `nama`, `jk`, `tmp_lahir`, `tgl_lahir`, `nik`, `agama`, `alamat`, `rt`, `rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `propinsi`, `sts_tinggal`, `jns_tinggal`, `alat_trans`, `telp`, `email`, `anak_ke`, `jml_sdr`, `nm_ayh`, `tlahir_ayh`, `lahir_ayh`, `pend_ayh`, `kerja_ayh`, `hasil_ayh`, `nik_ayh`, `nm_ibu`, `tlahir_ibu`, `lahir_ibu`, `pend_ibu`, `kerja_ibu`, `hasil_ibu`, `nik_ibu`, `nm_wl`, `lahir_wl`, `tlahir_wl`, `pend_wl`, `kerja_wl`, `hasil_wl`, `nik_wl`, `no_kk`, `no_un`, `no_skhun`, `no_ijazah`, `no_kps`, `no_kip`, `no_kis`, `no_pkh`, `beasiswa`, `kelas_7`, `kelas_8`, `kelas_9`, `kelas_aktf`, `kelas_dig`, `skl_asal`, `almt_skl`, `jns_masuk`, `tgl_masuk`, `ket_out`, `tgl_out`, `alasan_out`, `nosrt_out`, `status`, `jalur`, `foto`, `progres`, `editor`) VALUES
(1, '22f1be4f5fde5aeb023b634b107cdd0a', '510-211230-1', '0051093586', 'Mukhammad Yasin', 'L', 'Jember', '2021-12-30', '3509120603900001', 'Islam', 'Krajan Kidul, Sumberejo', '001', '017', 'Krajan Kidul', 'SUMBEREJO', 'Ambulu', 'Jember', 'JAWA TIMUR', 'Milik Sendiri', 'Dusun', 'obil pribadi', '085232996671', 'achin.clink@gmail.com', '1', '2', 'Miseri', 'Jember', '2021-12-14', 'S3', 'PNS/TNI/POLRI', 'Lebih dari Rp. 20,000,000', '3509181703710001', 'Rufiah', 'Jember', '2021-12-17', 'S2', 'Wiraswasta', 'Lebih dari Rp. 20,000,000', '3509184806790002', '', '0000-00-00', '', '', '', '', '', '3509112203110014', '3509123423123123', 'A', '0156/034-84202/S1/I/2016', '', '', '', '', '', '', '', '', '', '', 'SDN SUMBEREJO 01', 'Sumberejo', 'Siswa Baru', '2021-12-22', '', '0000-00-00', '', '', '', 'Inden', '', '0000-00-00', 'Mukhammad Yasin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_setting`
--

CREATE TABLE `db_setting` (
  `id` int(5) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `register` varchar(10) NOT NULL,
  `pengumuman` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_setting`
--

INSERT INTO `db_setting` (`id`, `tapel`, `semester`, `register`, `pengumuman`) VALUES
(1, '2021-2022', 'Ganjil', '0', '                                                                                                                                                                                                                                                                                                                                <p style="text-align: center; "><font color="#0000ff"><b>Wali kelas mohon segera melakukan Validasi Data dan mengajukan Bukti Verval ke Kepala Sekolah/Madrasah masing-masing.</b></font></p><p style="text-align: center; "><font color="#0000ff"><b>Update Versi Selesai dilakukan mohon bapak ibu cek kembali data yang telah di perbaiki.</b></font></p><p style="text-align: center; "><u>SalamSatuDataAlAmien</u></p>                                                                                                                                                                                                                                                                             ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_smk`
--

CREATE TABLE `db_smk` (
  `id` int(5) NOT NULL,
  `id_enc` varchar(50) NOT NULL,
  `no_reg` varchar(18) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `tmp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `dusun` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `propinsi` varchar(100) NOT NULL,
  `sts_tinggal` varchar(50) NOT NULL,
  `jns_tinggal` varchar(100) NOT NULL,
  `alat_trans` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `anak_ke` varchar(2) NOT NULL,
  `jml_sdr` varchar(2) NOT NULL,
  `nm_ayh` varchar(100) NOT NULL,
  `tlahir_ayh` varchar(50) NOT NULL,
  `lahir_ayh` date NOT NULL,
  `pend_ayh` varchar(20) NOT NULL,
  `kerja_ayh` varchar(100) NOT NULL,
  `hasil_ayh` varchar(50) NOT NULL,
  `nik_ayh` varchar(16) NOT NULL,
  `nm_ibu` varchar(100) NOT NULL,
  `tlahir_ibu` varchar(50) NOT NULL,
  `lahir_ibu` date NOT NULL,
  `pend_ibu` varchar(20) NOT NULL,
  `kerja_ibu` varchar(100) NOT NULL,
  `hasil_ibu` varchar(50) NOT NULL,
  `nik_ibu` varchar(16) NOT NULL,
  `nm_wl` varchar(100) NOT NULL,
  `lahir_wl` date NOT NULL,
  `tlahir_wl` varchar(50) NOT NULL,
  `pend_wl` varchar(20) NOT NULL,
  `kerja_wl` varchar(100) NOT NULL,
  `hasil_wl` varchar(50) NOT NULL,
  `nik_wl` varchar(16) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `no_un` varchar(30) NOT NULL,
  `no_skhun` varchar(30) NOT NULL,
  `no_ijazah` varchar(30) NOT NULL,
  `no_kps` varchar(25) NOT NULL,
  `no_kip` varchar(25) NOT NULL,
  `no_kis` varchar(25) NOT NULL,
  `no_pkh` varchar(25) NOT NULL,
  `beasiswa` varchar(10) NOT NULL,
  `kelas_7` varchar(10) NOT NULL,
  `kelas_8` varchar(10) NOT NULL,
  `kelas_9` varchar(10) NOT NULL,
  `kelas_aktf` varchar(10) NOT NULL,
  `kelas_dig` varchar(10) NOT NULL,
  `skl_asal` varchar(100) NOT NULL,
  `almt_skl` varchar(100) NOT NULL,
  `jns_masuk` varchar(100) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `ket_out` varchar(100) NOT NULL,
  `tgl_out` date NOT NULL,
  `alasan_out` varchar(100) NOT NULL,
  `nosrt_out` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `jalur` varchar(25) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `progres` date NOT NULL,
  `editor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_smp`
--

CREATE TABLE `db_smp` (
  `id` int(5) NOT NULL,
  `id_enc` varchar(50) NOT NULL,
  `no_reg` varchar(18) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `tmp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `dusun` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `propinsi` varchar(100) NOT NULL,
  `sts_tinggal` varchar(50) NOT NULL,
  `jns_tinggal` varchar(100) NOT NULL,
  `alat_trans` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `anak_ke` varchar(2) NOT NULL,
  `jml_sdr` varchar(2) NOT NULL,
  `nm_ayh` varchar(100) NOT NULL,
  `tlahir_ayh` varchar(50) NOT NULL,
  `lahir_ayh` date NOT NULL,
  `pend_ayh` varchar(20) NOT NULL,
  `kerja_ayh` varchar(100) NOT NULL,
  `hasil_ayh` varchar(50) NOT NULL,
  `nik_ayh` varchar(16) NOT NULL,
  `nm_ibu` varchar(100) NOT NULL,
  `tlahir_ibu` varchar(50) NOT NULL,
  `lahir_ibu` date NOT NULL,
  `pend_ibu` varchar(20) NOT NULL,
  `kerja_ibu` varchar(100) NOT NULL,
  `hasil_ibu` varchar(50) NOT NULL,
  `nik_ibu` varchar(16) NOT NULL,
  `nm_wl` varchar(100) NOT NULL,
  `lahir_wl` date NOT NULL,
  `tlahir_wl` varchar(50) NOT NULL,
  `pend_wl` varchar(20) NOT NULL,
  `kerja_wl` varchar(100) NOT NULL,
  `hasil_wl` varchar(50) NOT NULL,
  `nik_wl` varchar(16) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `no_un` varchar(30) NOT NULL,
  `no_skhun` varchar(30) NOT NULL,
  `no_ijazah` varchar(30) NOT NULL,
  `no_kps` varchar(25) NOT NULL,
  `no_kip` varchar(25) NOT NULL,
  `no_kis` varchar(25) NOT NULL,
  `no_pkh` varchar(25) NOT NULL,
  `beasiswa` varchar(10) NOT NULL,
  `kelas_7` varchar(10) NOT NULL,
  `kelas_8` varchar(10) NOT NULL,
  `kelas_9` varchar(10) NOT NULL,
  `kelas_aktf` varchar(10) NOT NULL,
  `kelas_dig` varchar(10) NOT NULL,
  `skl_asal` varchar(100) NOT NULL,
  `almt_skl` varchar(100) NOT NULL,
  `jns_masuk` varchar(100) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `ket_out` varchar(100) NOT NULL,
  `tgl_out` date NOT NULL,
  `alasan_out` varchar(100) NOT NULL,
  `nosrt_out` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `jalur` varchar(25) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `progres` date NOT NULL,
  `editor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_user`
--

CREATE TABLE `db_user` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `par` varchar(10) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `last` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_user`
--

INSERT INTO `db_user` (`id`, `username`, `password`, `nama`, `jabatan`, `par`, `kelas`, `telp`, `email`, `foto`, `status`, `last`) VALUES
(1, 'developper', '002735da79fbd67ee22f0bf3c08b4ef4', 'Administrator', 'admin', '', '', '082141632876', 'achin.clink@gmail.com', 'my.jpg', 'AKTIF', '2021-12-17 09:31:50'),
(22, 'ata13', '96bbd829c2b7cbbc29301386a088e674', 'Muhammad David Akhyar', 'walikelas', 'mts', '8B', '081331919474', 'ata13akhyar@gmail.com', 'ata13.png', 'AKTIF', '2021-12-21 15:17:46'),
(23, 'SIFA0626', 'db80cda28d999e022b219c5a9235c5c2', 'MUHAMMAD NOOR SIDIQ', 'walikelas', 'mts', '8E', '082221646631', 'ashshidiqelqudsy@gmail.com', 'none.png', 'AKTIF', '2021-12-21 10:57:22'),
(24, 'masrobith', 'aaeda1516ae666d930b49c0d615673d8', 'Robith Rifqi', 'walikelas', 'mts', '7C', '082330438273', 'robith.rifqi@gmail.com', 'none.png', 'AKTIF', '2021-12-21 17:14:32'),
(27, 'LUQMAN', 'c6eefc88ca23b1924cc569a6dcbfb4ea', 'LUQMAN HAKIM', 'walikelas', 'mts', '8C', '085258706111', 'luxchoky@gmail.com', 'none.png', 'AKTIF', '2021-12-22 11:43:28'),
(28, '1655758660300022', 'e10adc3949ba59abbe56e057f20f883e', 'Reni sulistyani', 'walikelas', 'mts', '7D', '081336509239', 'sulistyanireni1@gmail.com', '1655758660300022.jpg', 'AKTIF', '2021-12-21 18:25:35'),
(29, 'uswatun khoiriyah', '6ce07395327516601e5b7209a0cc02ad', 'Uswatun Khoiriyah', 'walikelas', 'mts', '8A', '082143267080', 'uswakhoir1980@gmail.com', 'none.png', 'AKTIF', '2021-12-21 15:59:13'),
(30, 'ihwannurhuda', '15d036004256a2fd58e7b5a9cb86fbfc', 'Ihwan Nur Huda', 'walikelas', 'mts', '8F', '081329255872', 'ikhwannurhuda12@gmail.com', 'ihwanhurhuda.jpg', 'AKTIF', '2021-12-21 13:26:48'),
(31, 'huri', '3d3ab9c632d02bc6e6097a50f41c5a37', 'hurry sayyidah robi''ah', 'walikelas', 'mts', '8D', '082237086715', 'royasalma66@gmail.com', 'none.png', 'AKTIF', '2021-12-22 10:57:39'),
(32, 'MUYASSAROH', 'e10adc3949ba59abbe56e057f20f883e', 'Dra. MUYASSAROH', 'walikelas', 'mts', '9C', '081234828777', 'ashshidiqelqudsy@gmail.com', 'MUYASSAROH.jpg', 'AKTIF', '2021-12-21 10:51:19'),
(33, 'ALIMASUD', '870502307ab208af8395ed7647718747', 'MOH ALI MAS''UD', 'walikelas', 'mts', '7B', '082142359637', 'moh.alimasud1977@gmail.com', 'none.png', 'AKTIF', '2021-12-20 18:39:57'),
(34, 'd14nsuryawati', 'de96eee7113bca20166ca04a28971d66', 'Dian Suryawati', 'walikelas', 'mts', '9B', '081358606195', 'd.yansuryawati@gmail.com', 'none.png', 'AKTIF', '2021-12-22 04:45:13'),
(35, 'dana', '45b1c901aa5d4747f1d123a73f9b4482', 'Isnaini Wahdanawati ', 'walikelas', 'mts', '9A', '085735727266', 'isnainiwahdana@gmail.com', 'none.png', 'NON AKTIF', '2021-10-12 10:14:48'),
(37, 'ASROFI', 'e10adc3949ba59abbe56e057f20f883e', 'MOHAMMAD ASROFI', 'walikelas', 'mts', '9E', '082334807242', 'mohasrofi@9.gmail.com', 'none.png', 'AKTIF', '2021-09-25 11:44:57'),
(38, 'takebirbani', '09b1e6c80f8c62f4f7cc0b7e43de2de8', 'Takeb Irbani', 'walikelas', 'mts', '7A', '081358966789', 'takebirbani@gmail.com', 'none.png', 'AKTIF', '2021-12-22 10:35:30'),
(39, 'atoz', '9034e97368210f20c262f9b618e6de9d', 'M. Fathur Rohim', 'walikelas', 'mts', '9D', '082342400508', 'fathur.klik@gmail.com', 'atoz.jpg', 'AKTIF', '2021-12-21 11:48:53'),
(40, 'arifsujarwo', '775fda7b9e793f32febb89cfc308b9be', 'ARIF SUJARWO', 'walikelas', 'mts', '7E', '081233796464', 'arif.talita@gmail.com', 'arifsujarwo.jpeg', 'AKTIF', '2021-12-21 20:39:46'),
(41, 'rio_aldinas', 'cff8df336f6c1a830b1258af5eb6ca3b', 'RIO ALDINAS', 'walikelas', 'ma', '12-IPA-1', '081336423210', 'rioaldinas.ambulu@gmail.com', '4245763664110033.jpeg', 'AKTIF', '2021-12-22 02:53:04'),
(42, 'ALANTUTUT', '196d34272db27b2bdcfa8ba8dacaa33c', 'ARIF NURDIANSYAH, S.Pd', 'walikelas', 'ma', '10-IPS-2', '082233126247', 'alanshidqi1@gmail.com', 'ALANTUTUT.jpg', 'AKTIF', '2021-12-22 12:50:38'),
(43, 'FARISAB', '551ebe11bfa1aacbfa40f73fd8ac393b', 'MOH FARIS ABDILLAH ', 'tatausaha', 'mts', '7B', '085816504892', 'abdillahfaris70@gmail.com', 'FARISAB.jpg', 'AKTIF', '2021-12-21 11:41:10'),
(44, 'mohnasir', '144b12c3c1442224d0080b0ac97e191f', 'MOH. NASIR', 'headmaster', 'mts', '', '081336760670', 'moh77nasir@gmail.com', 'none.png', 'AKTIF', '2021-10-12 14:12:04'),
(47, 'Munfida110399', '8d0b857b26c97077f0b271fa107152c4', 'Nuris Sabilatul Munfida', 'walikelas', 'smp', '8A', '081259099341', 'nurisbintryn@gmail.com', 'Munfida110399.jpg', 'AKTIF', '2021-10-04 07:24:10'),
(48, 'ratnajuwita', '20f451c71ae225eaed411306c2d8f188', 'RATNA JUWITA', 'walikelas', 'ma', '11-IPA-2', '085236027176', 'ratnajuwi1985@gmail.com', 'none.png', 'AKTIF', '2021-12-22 08:03:06'),
(49, 'irfanbayu8', '6f8296b71ffddbe0658c612245a86cf8', 'IRFAN BAYU ANGGARA', 'walikelas', 'ma', '11-IPS-2', '085259923214', 'irfanbayu8@gmail.com', 'none.png', 'AKTIF', '2021-12-22 12:04:01'),
(50, 'putri3112', '006de99ffe9526e5739c7c130687d860', 'PUTRI ARINI', 'walikelas', 'mts', '7F', '081232727723', 'ariniputri60@gmail.com', 'putri3112.jpg', 'AKTIF', '2021-12-21 20:35:52'),
(51, 'zamroni', 'b539209753baa2658d5187f0211cbd4c', 'MUHAMAD ZAMRONI', 'walikelas', 'ma', '12-IPS-2', '082231257168', 'muhzamroni1605@gmail.com', 'zamroni.jpg', 'AKTIF', '2021-12-22 06:06:04'),
(52, 'Mia123', 'fc70f968e46841d3bbbf579ae667eb16', 'Mia fa''adah alma''mun', 'walikelas', 'smk', '11-TB', '085735751445', 'miafaadah60@gmail.com', 'Mia123.jpg', 'AKTIF', '2021-12-13 08:01:17'),
(53, '201699540819@guruku.id', '22997bfaab654f22cdd65944e5e6b320', 'Abdul Hamid', 'walikelas', 'smp', '8B', '085285746828', 'abdhamidmi25@gmail.com', '201699540819@guruku.id.id', 'AKTIF', '2021-12-22 05:07:55'),
(54, 'Mohammadaghnisshulkhi', '71bdd40677add39f29bde9db555be658', 'Mohammad aghnis shulkhi', 'walikelas', 'smp', '9B', '0895327531000', 'aghnissulkhi00@gmail.com', 'Mohammadaghnisshulkhi.jpg', 'AKTIF', '2021-12-22 08:00:26'),
(55, 'Robitelmuttaqin', '2442d660ca919d04c6b9d86475939a00', 'Robit El Muttaqin, S. Pd', 'walikelas', 'smp', '9A', '085749409038', 'Robitelmuttaqin1987@gmail.com', 'Robitelmuttaqin.jpg', 'AKTIF', '2021-11-22 11:58:11'),
(56, 'sitialfiah', '070b702f46169db475bee567a945c71d', 'Siti Alfiah', 'walikelas', 'smp', '7A', '081555306268', 'alfresco289@gmail.com', 'sitialfiah.jpeg', 'AKTIF', '2021-12-20 20:05:06'),
(57, 'MFARID', 'e10adc3949ba59abbe56e057f20f883e', 'MOHAMMAD FARID WAJDI', 'walikelas', 'ma', '12-IPA-2', '085746172007', 'farid.alamien@gmail.com', 'none.png', 'AKTIF', '2021-12-22 12:58:51'),
(58, 'anisafitriani', '4158e7628584a86cf382382ba664feef', 'Annissa Fitriani', 'walikelas', 'smk', '10-TB', '085852679761', 'anisaf009@gmail.com', 'anisafitriani.jpg', 'AKTIF', '2021-11-23 17:13:29'),
(59, 'zulfamaghfiroh', 'e10adc3949ba59abbe56e057f20f883e', 'Zulfa Maghfiroh', 'tatausaha', 'smp', '7B', '081233465561', 'ijoenk_indigo@yahoo.com', 'zulfamaghfiroh.jpg', 'AKTIF', '2021-12-14 08:48:27'),
(60, 'anisnisa', '50c75d6e385baebdef3c4ecc7b106aaa', 'siti khoirunnisa''', 'tatausaha', 'ma', '7B', '085649029635', 'aniez.elek@gmail.com', 'anisnisa.jpeg', 'AKTIF', '2021-12-22 10:41:51'),
(61, 'Qorrobin', '7bd1dc07fe6452711f4bc00c8ed8aaa3', 'HANIF MUQORROBIN', 'walikelas', 'ma', '10-IPA-2', '085755704041', 'hnfmqrrbn@gmail.com', 'Qorrobin.jpg', 'AKTIF', '2021-12-22 04:30:09'),
(62, 'nurhayati', 'e10adc3949ba59abbe56e057f20f883e', 'Siti Nurhayati', 'walikelas', 'ma', '12-IPS-1', 'O85231362069', 'nurhayati.klik@gmail.com', 'none.png', 'AKTIF', '2021-12-22 11:20:24'),
(63, 'wiwinlutfiani', '5227c94e89761695ec3ada5eec4e290f', 'Wiwin Lutfiani', 'walikelas', 'ma', '11-IPA-1', '082132189156', 'wiwinlutfiani541@gmail.com', 'none.png', 'AKTIF', '2021-12-22 11:33:01'),
(64, 'lutfiatulrohmatin', 'a944d3aada843aeb93e11b9b92f5ad5a', 'Lutfiatul Rohmatin, S. Pd', 'walikelas', 'smk', '12-TB', '081230224267', 'lupi.zanzabil22@gmail.com', 'lutfiatulrohmatin.jpg', 'AKTIF', '2021-12-22 13:36:01'),
(65, '123muslikah', '9a3968622c95049d68aafabd68fe434b', 'muslikah', 'walikelas', 'mts', '7G', '082232487369', 'sitimuslikah614@gmail.com', '123muslikah.jpg', 'AKTIF', '2021-12-22 12:05:11'),
(66, 'himmatul123', '2aa97c2f985a60c4b444a2cd3c7da9de', 'Himmatul Aliyah', 'walikelas', 'smp', '9C', '082244493404', 'hima.alamien@gmail.com', 'none.png', 'AKTIF', '2021-12-22 09:08:15'),
(68, 'novanindarto', 'b89dc80fb627dbdcfe7d8e03876985d8', 'NOVAN INDARTO', 'walikelas', 'ma', '10-IPA-1', '085236161313', 'bimantara.erlangga@gmail.com', 'none.png', 'AKTIF', '2021-12-22 12:45:16'),
(70, 'elifita', 'aabf0fec97df0d67aaf05be4b4ed43eb', 'ELIFITA', 'walikelas', 'ma', '11-IPS-1', '08133635027', 'elifita1983@gmail.com', 'elifita.jpg', 'AKTIF', '2021-12-20 14:55:10'),
(71, 'ZaenalArifin', '96bbd829c2b7cbbc29301386a088e674', 'Zaenal Arifin', 'headmaster', 'ma', '', '085235578738', 'azaenal988@gmail.com', 'none.png', 'AKTIF', '2021-12-08 09:20:38'),
(72, 'myasin', '96bbd829c2b7cbbc29301386a088e674', 'Mukhammad Yasin', 'guru', 'smp', '', '082141632876', 'achin.clink@gmail.com', 'none.png', 'AKTIF', '2021-09-26 09:54:20'),
(73, 'iahmaslikah', 'b56a55d9d260725e8d038d2a02fd2498', 'Iah maslikah, S.Pd.i', 'headmaster', 'smp', '', '08213997152', 'imas.abkar@gmail.com', 'none.png', 'AKTIF', '2021-10-18 10:38:53'),
(74, 'Yazid_Ms', 'cd44e505b1daadf3327b5e7914cbe395', 'Mohammad Yazid Masum', 'headmaster', 'smk', '', '085232996671', 'yazidmaksum52@gmail.com', 'none.png', 'AKTIF', '2021-12-21 09:30:54'),
(75, 'miftahul_ulum', '3b640b0326a4b66da97a0f196a45f030', 'MIFTAHUL ULUM', 'walikelas', 'ma', '10-IPS-1', '082141773133', 'maspaul1984@gmail.com', 'miftahul_ulum.jpeg', 'AKTIF', '2021-12-22 08:26:34'),
(76, 'arna050621', 'e10adc3949ba59abbe56e057f20f883e', 'Muawanah, S.Pd', 'walikelas', 'smp', '7B', '081237882932', 'anna.rusdi8@gmail.com', 'none.png', 'AKTIF', '2021-12-21 13:30:41'),
(77, 'dbzlems', '5e32cf16aa428d230e7f21fcf32d4ee1', 'Slamet Eko Syahroni', 'guru', 'mts', '', '081333679976', 'slem.sesok@gmail.com', 'none.png', 'AKTIF', '2021-12-21 20:02:51'),
(78, 'Nvyh17', '6380579d7662b2724f758a7614032008', 'Anash', 'admin', 'ma', '', '081259923621', 'rhinash.11@gmail.com', 'Nvyh17.jpg', 'AKTIF', '2021-12-22 11:21:01'),
(79, 'TEAMICT', '93d7f3026627867cace1572191a1b32c', 'TEAM ICT AL AMIEN', 'ict', '', '', '082141632876', 'ict.alamien@gmail.com', 'none.png', 'AKTIF', '2021-12-04 13:25:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_user_pendaftar`
--

CREATE TABLE `db_user_pendaftar` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `par` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `jabatan` varchar(10) NOT NULL,
  `echo` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `db_user_pendaftar`
--

INSERT INTO `db_user_pendaftar` (`id`, `nik`, `nama`, `email`, `telp`, `par`, `status`, `jabatan`, `echo`) VALUES
(4, '3198627361726123', 'adjsajdas dsad', 'anashasd@gmail.com', '086235623243', 'MA', 'AKTIF', 'user', '1'),
(5, '3509120603900001', 'Mukhammad Yasin', 'achin.clink@gmail.com', '082141632876', 'MTS', 'AKTIF', 'user', '1'),
(7, '674567642324', 'anisa anis', 'anisa@yahoo.com', '081256565412', 'SMP', 'AKTIF', 'user', '0'),
(8, '24864548645', 'anash herdiansyah', 'user@gmail.com', '086234423243', 'SMP', 'AKTIF', 'user', '0'),
(9, '248645486453', 'anash herdiansyaha', 'usersmk@gmail.com', '086234423243', 'SMK', 'AKTIF', 'user', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_info`
--
ALTER TABLE `db_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_kls`
--
ALTER TABLE `db_kls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_link_a`
--
ALTER TABLE `db_link_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_link_d`
--
ALTER TABLE `db_link_d`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_ma`
--
ALTER TABLE `db_ma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_mts`
--
ALTER TABLE `db_mts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_setting`
--
ALTER TABLE `db_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_smk`
--
ALTER TABLE `db_smk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_smp`
--
ALTER TABLE `db_smp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_user_pendaftar`
--
ALTER TABLE `db_user_pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_info`
--
ALTER TABLE `db_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `db_kls`
--
ALTER TABLE `db_kls`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `db_link_a`
--
ALTER TABLE `db_link_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `db_link_d`
--
ALTER TABLE `db_link_d`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `db_ma`
--
ALTER TABLE `db_ma`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `db_mts`
--
ALTER TABLE `db_mts`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `db_setting`
--
ALTER TABLE `db_setting`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `db_smk`
--
ALTER TABLE `db_smk`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `db_smp`
--
ALTER TABLE `db_smp`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `db_user`
--
ALTER TABLE `db_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `db_user_pendaftar`
--
ALTER TABLE `db_user_pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
