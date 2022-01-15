-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Jan 2022 pada 10.12
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
(7, '2022-01-14', '06:22:59', 'Yasin', 'admin', '<p>Update Hari Ini :</p><ul><li>Pendaftaran Jalur Prestasi Telah Dibuka<br>Silahkan isi formulir dari hari ini tanggal 15 Januari - 15 Februari 2022</li></ul>');

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
  `editor` varchar(50) NOT NULL,
  `mgm` varchar(50) NOT NULL,
  `ket` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_ma`
--

INSERT INTO `db_ma` (`id`, `id_enc`, `no_reg`, `nisn`, `nama`, `jk`, `tmp_lahir`, `tgl_lahir`, `nik`, `agama`, `alamat`, `rt`, `rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `propinsi`, `sts_tinggal`, `jns_tinggal`, `alat_trans`, `telp`, `email`, `anak_ke`, `jml_sdr`, `nm_ayh`, `tlahir_ayh`, `lahir_ayh`, `pend_ayh`, `kerja_ayh`, `hasil_ayh`, `nik_ayh`, `nm_ibu`, `tlahir_ibu`, `lahir_ibu`, `pend_ibu`, `kerja_ibu`, `hasil_ibu`, `nik_ibu`, `nm_wl`, `lahir_wl`, `tlahir_wl`, `pend_wl`, `kerja_wl`, `hasil_wl`, `nik_wl`, `no_kk`, `no_un`, `no_skhun`, `no_ijazah`, `no_kps`, `no_kip`, `no_kis`, `no_pkh`, `beasiswa`, `kelas_7`, `kelas_8`, `kelas_9`, `kelas_aktf`, `kelas_dig`, `skl_asal`, `almt_skl`, `jns_masuk`, `tgl_masuk`, `ket_out`, `tgl_out`, `alasan_out`, `nosrt_out`, `status`, `jalur`, `foto`, `progres`, `editor`, `mgm`, `ket`) VALUES
(1, 'b47c29ab66c06dd671c6b6950c0eadad', '538-211230-001', '0002545415', 'adjsajdas dsad', 'P', 'nabire', '2021-12-01', '3198627361726123', 'Islam', 'Jl.hbadbas asjbdkasbdbaskdbaskb723623', '2', '1', 'kebonsari', 'sabrang', 'ambulu', 'jember', 'jawa timur', 'Milik Sendiri', 'Dusun', 'Angkutan umum/bus/pete-pete', '086235623243', 'anashasd@gmail.com', '1', '2', 'sadas', 'ndfdg', '2021-12-09', 'SD Sederajad', 'Buruh', 'Rp. 5,000,000 - Rp. 20,000,000', '432432434324234', 'asdadad', 'ndfgsfasda', '2021-12-21', 'SMP Sederajad', 'Pensiunan', 'Tidak Berpenghasilan', '234324324324', '', '0000-00-00', '', '', '', '', '', '35056756465456', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sdn sumberejo 7', 'sumberejo', 'Siswa Baru', '0000-00-00', '', '0000-00-00', '', '', '', '', '', '0', 'adjsajdas dsad', '', '');

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
  `progres` datetime NOT NULL,
  `editor` varchar(50) NOT NULL,
  `mgm` varchar(50) NOT NULL,
  `ket` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_mts`
--

INSERT INTO `db_mts` (`id`, `id_enc`, `no_reg`, `nisn`, `nama`, `jk`, `tmp_lahir`, `tgl_lahir`, `nik`, `agama`, `alamat`, `rt`, `rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `propinsi`, `sts_tinggal`, `jns_tinggal`, `alat_trans`, `telp`, `email`, `anak_ke`, `jml_sdr`, `nm_ayh`, `tlahir_ayh`, `lahir_ayh`, `pend_ayh`, `kerja_ayh`, `hasil_ayh`, `nik_ayh`, `nm_ibu`, `tlahir_ibu`, `lahir_ibu`, `pend_ibu`, `kerja_ibu`, `hasil_ibu`, `nik_ibu`, `nm_wl`, `lahir_wl`, `tlahir_wl`, `pend_wl`, `kerja_wl`, `hasil_wl`, `nik_wl`, `no_kk`, `no_un`, `no_skhun`, `no_ijazah`, `no_kps`, `no_kip`, `no_kis`, `no_pkh`, `beasiswa`, `kelas_7`, `kelas_8`, `kelas_9`, `kelas_aktf`, `kelas_dig`, `skl_asal`, `almt_skl`, `jns_masuk`, `tgl_masuk`, `ket_out`, `tgl_out`, `alasan_out`, `nosrt_out`, `status`, `jalur`, `foto`, `progres`, `editor`, `mgm`, `ket`) VALUES
(1, '22f1be4f5fde5aeb023b634b107cdd0a', '510-211230-001', '0051093586', 'Mukhammad Yasin', 'L', 'Nabire', '2021-12-30', '3509120603900001', 'L', 'Krajan Kidul, Sumberejo', '001', '017', 'Krajan Kidul', 'SUMBEREJO', 'Ambulu', 'Jember', 'JAWA TIMUR', 'Milik Sendiri', 'Dusun', 'Jalan kaki', '085232996671', 'achin.clink@gmail.com', '1', '2', 'Miseri', 'Jember', '2021-12-14', 'S3', 'PNS/TNI/POLRI', 'Lebih dari Rp. 20,000,000', '3509181703710001', 'Rufiah', 'Jember', '2021-12-17', 'S2', '', 'Lebih dari Rp. 20,000,000', '3509184806790002', '', '0000-00-00', '', '', '', 'Lebih dari Rp. 20,000,000', '', '3509112203110014', '3509123423123123', 'A', '0156/034-84202/S1/I/2016', '', '', '', '', '', '', '', '', '', '', 'SDN SUMBEREJO 01', 'Sumberejo', 'Siswa Baru', '2021-12-22', '', '0000-00-00', '', '', 'NON AKTIF', 'INDEN', '', '2022-01-11 08:20:04', 'Yasin', '', ''),
(16, 'cc05d99fdee34411aed5565fc794bbd1', '538-220101-004', '0064942605', 'anisa anis', 'L', 'Jember', '2022-01-14', '674567642324', 'L', 'Krajan Kidul, Sumberejo', '', '', 'Krajan Kidul', 'SUMBEREJO', 'Ambulu', 'Jember', 'JAWA TIMUR', 'Milik Sendiri', 'Dusun', 'Jalan kaki', '', '', '', '', 'Miseri', '', '0000-00-00', '', '', '', '', 'Rufiah', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '3509112203110014', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Siswa Baru', '0000-00-00', '', '0000-00-00', '', '', 'NON AKTIF', 'PRESTASI', '', '2022-01-06 12:10:58', 'Anash', '', ''),
(28, 'a4e30929d05968204d05ec558401df9f', '538-220102-005', '0051093586', 'anash herdiansyah', 'L', 'Jember', '2022-01-12', '24864548645', 'L', '', '', '', 'Krajan Kidul', 'Sumberejo', 'Ambulu', 'Jember', 'Jawa Timur', 'Milik Sendiri', 'Dusun', 'Jalan kaki', '', '', '', '', 'Miseri', '', '0000-00-00', '', '', '', '', 'Rufiah', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '3509112203110014', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Siswa Baru', '0000-00-00', '', '0000-00-00', '', '', 'AKTIF', 'PRESTASI', '', '2022-01-06 12:11:05', 'Anash', '', ''),
(29, '2dd39678bc306c7444c551bc4b55ee93', '538-220108-006', '1561561231', 'anisa anis', 'L', 'nabire', '2021-12-30', '6745676423245645', 'Katholik', 'Krajan Kidul, RT 01/RW06, Sumberejo, Ambulu, Jember', '2', '1', 'kebonsari', 'sabrang', 'ambulu', 'jember', 'jawa timur', 'Rumah Orang Tua', 'Salaf Putri', 'Angkutan umum/bus/pete-pete', '086235623243', '', '1', '2', 'mc leren', 'ndfdg', '2022-01-06', 'SMP Sederajad', 'Buruh', 'Rp. 1,000,000 - Rp. 1,999,999', '432432434324234', 'mamak', 'ndfgsfasda', '2022-01-14', 'SD Sederajad', 'Wirausaha', 'Rp. 1,000,000 - Rp. 1,999,999', '234324324324', '', '0000-00-00', '', '', '', '', '', '35056756465456', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sdn sumberejo 7', 'sumberejo', 'Siswa Baru', '0000-00-00', '', '0000-00-00', '', '', '', 'REGULER', '', '2022-01-08 11:43:41', 'anisa anis', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_panitia`
--

CREATE TABLE `db_panitia` (
  `id` int(11) NOT NULL,
  `codex` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL,
  `last` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_panitia`
--

INSERT INTO `db_panitia` (`id`, `codex`, `nama`, `username`, `password`, `jabatan`, `status`, `last`) VALUES
(1, 'c4ca4238a0b923820dcc509a6f75849b', 'Yasin', 'admin', 'admin', 'admin', '1', '2022-01-15 13:14:17'),
(9, 'c81e728d9d4c2f636f067f89cc14862c', 'Anash', 'Nvyh', 'nvyh', 'admin', '1', '2022-01-10 08:29:26'),
(10, 'd3d9446802a44259755d38e6d163e820', 'irwanto', 'wanto', 'wanto', 'mgm', '0', '2022-01-06 13:25:21'),
(11, '6512bd43d9caa6e02c990b0a82652dca', 'anash herdiansyah', 'admin', 'anash', 'panitia', '1', '2022-01-06 14:08:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_sdmi`
--

CREATE TABLE `db_sdmi` (
  `id` int(11) NOT NULL,
  `npsn` varchar(10) NOT NULL,
  `lembaga` varchar(128) NOT NULL,
  `alamat` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `db_sdmi`
--

INSERT INTO `db_sdmi` (`id`, `npsn`, `lembaga`, `alamat`) VALUES
(787, ' 69994656', 'MI TAHFID ADZ-DZIKIR', 'JL. YOS SUDARSO NO. 08 RT 002 RW 002 ROWO INDAH AJUNG JEMBER'),
(788, ' 69975762', 'MI UNGGULAN ANNUR', 'JL. SUNAN KALIJAGA 09 KESILIR WULUHAN JEMBER'),
(789, ' 60715707', 'MIN 4 Jember', 'JL. K. ARIFIN NO.72 PASAR ALAS'),
(790, ' 60715708', 'MIN 5 Jember', 'JL.OLAH RAGA NO.20 SEMPOLAN'),
(791, ' 60715840', 'MIS ABBASIYYAH', 'JL. PAHLAWAN GG. ABBAS WULUHAN JEMBER'),
(792, ' 60715709', 'MIS AL - AMIN', 'JL. BANYUWANGI GARAHAN JATI'),
(793, ' 60715710', 'MIS AL - FAGIRI', 'Dusun Krajan'),
(794, ' 60715724', 'MIS AL - ISHLAH', 'HARJOMULYO'),
(795, ' 69819594', 'MIS AL HIKMAH', 'Jl. Imam Bonjol No. 128'),
(796, ' 60715531', 'MIS AL HUDA', 'JL. PB. SUDIRMAN N0 04 PURWOASRI'),
(797, ' 60715532', 'MIS AL ISHLAH', 'DUSUN JATIAGUNG 02/19'),
(798, ' 60715671', 'MIS AL ISLAMIYYAH', 'JL.SUMODIHARJO NO.83 KAUMAN PUGER KULON'),
(799, ' 60715672', 'MIS AL KHOIRIYAH', 'JL. AHMAD YANI NO. 82'),
(800, ' 60715535', 'MIS AL MA`ARIF 01', 'JLN. GARUDA NO 093 KARANGANYAR'),
(801, ' 60715533', 'MIS AL MA`ARIF 02 MENAMPU', 'JL. KALIMALANG 02 KAPITAN MENAMPU'),
(802, ' 60715534', 'MIS AL MA`ARIF III', 'JL GARUDA 93 DESA KARANGREJO KEC. GUMUKMAS'),
(803, ' 60715530', 'MIS AL MUJAHIDI', 'JL. HAYAM WURUK NO.11'),
(804, ' 69881891', 'MIS AL QODIRI ASRO', 'Jl. Kota Blater No. 57 Sidodadi'),
(805, ' 60715844', 'MIS AR RAHMAN', 'JL. MAELANG SEBANEN LOJEJER'),
(806, ' 60715595', 'MIS ASSUNNIYYAH', 'JL.SENGAN GUMUKTOPI'),
(807, ' 60715596', 'MIS ASSUNNIYYAH 45', 'JL. PANTAI PASEBAN'),
(808, ' 60715603', 'MIS AS-SYAFIIYYAH 01', 'JL. KARTINI 144 WONOREJO'),
(809, ' 60715604', 'MIS AS-SYAFIIYYAH 02', 'JL. KARTINI 144 WONOREJO'),
(810, ' 69819595', 'MIS BABUS SALAM', 'Dsn. Sumber Pakem Desa Silo'),
(811, ' 69819593', 'MIS BAITUN NAIM', 'Jl. Ky. Syahid No.12 Dusun Krajan'),
(812, ' 60715546', 'MIS BUSTANUL ULUM', 'JL. AHMAD YANI NO. 326 KREBET'),
(813, ' 60715711', 'MIS BUSTANUL ULUM', 'JL.PDP.SUMBER WADUNG KARANG HARJO'),
(814, ' 60715712', 'MIS BUSTANUL ULUM', 'JL. PTPN XII SILO SANEN MULYOREJO'),
(815, ' 60715673', 'MIS BUSTANUL ULUM 01 MLOKOREJO', 'JL. KH. ABDULLAH YAQIN NO.5 MLOKOREJO PUGER JEMBER'),
(816, ' 60715674', 'MIS BUSTANUL ULUM 02 MLOKOREJO', 'JL.PANJAITAN NO.71 MLOKOREJO'),
(817, ' 60715675', 'MIS BUSTANUL ULUM 03', 'JL.KH.HAROMAIN NO.29 KASIYAN'),
(818, ' 60715676', 'MIS BUSTANUL ULUM 04', 'JL PUGER GG 1 NO 08 KASIYAN TIMUR KEC. PUGER KAB. JEMBER'),
(819, ' 60715677', 'MIS BUSTANUL ULUM 05', 'TAMBAK SARI KALIMALANG'),
(820, ' 60715828', 'MIS DARUL HIDAYAH', 'JL SUNAN BONANG POMO'),
(821, ' 60715536', 'MIS DARUL HUDA', 'JL.BUYA HAMKA NO: 08'),
(822, ' 60715537', 'MIS DARUL INAYAH 02', 'JLN.TAMBAK INDONUSA KALIMALANG MAYANGAN'),
(823, ' 60715690', 'MIS DARUL ULUM', 'JADUGAN MOJOSARI'),
(824, ' 60715678', 'MIS DARUSSALAM 01', 'JL. FLAMBOYAN NO 07 DUSUN SULING - BAGON'),
(825, ' 60715679', 'MIS DARUSSALAM 02', 'JL. H. SOELAIMAN NO.239 KEDUNG SUMUR DESA BAGON PUGER JEMBER'),
(826, ' 60715680', 'MIS DEWI MASYITHOH', 'JL RAYA PUGER NO.307'),
(827, ' 60715681', 'MIS HASANUDDIN', 'JL KH MOCHAMMAD THOHIR NO 54'),
(828, ' 60715597', 'MIS HASYIM ASYARI', 'JLN.ANJASMARA NO.3B KENCONG'),
(829, ' 60715806', 'MIS HIDAYATUL MUBTADIIN', 'JL.Kotta Blater Gg.3 No.140 Sidodadi Tempurejo'),
(830, ' 60726987', 'MIS HIDAYATUL MUNAWWAROH', 'DUSUN KEBUN LANGSEP RT 02 RW 06'),
(831, ' 60715682', 'MIS IBNU KHOLDUN', 'JLN.PP ALFALAH KALIMALANG-MOJOMULYO-PUGER-JEMBER'),
(832, ' 69894662', 'MIS INAYATUR ROHMAN', 'Jl. Menur No. 70 Dusun Krajan I'),
(833, ' 60715683', 'MIS IRSYADUN NASYI`IN', 'JALAN BAGON 05 KASIYAN TIMUR PUGER'),
(834, ' 60715598', 'MIS JAWAHIRUL ULUM', 'JALAN PANTAI PASEBAN NO. 15 CAKRU, KENCONG - JEMBER'),
(835, ' 60715841', 'MIS MA 38 HIDAYATUL MUBTADIIN', 'JL. G. WATANGAN NO 29 RT.06 RW.09 KEPEL'),
(836, ' 60715842', 'MIS MA 75 AL HIDAYAH', 'JL. SULTAN AGUNG NO.7'),
(837, ' 60715810', 'MIS MAARIF 56 SALAFIYAH SYAFIIYAH', 'JL. KH. ABDURRAHMAN 31 TEMPUREJO - JEMBER'),
(838, ' 60715538', 'MIS MAMBAUL HIDAYAH', 'DUSUN PULOREJO'),
(839, ' 60715713', 'MIS MAMBAUL ULUM', 'Dusun Darungan'),
(840, ' 60715714', 'MIS MAMBAUL ULUM III', 'DUSUN BABAN TENGAH RT,002 RW,018'),
(841, ' 60715539', 'MIS MATHLABUL ULUM AL FALAH', 'PANGGUL MLATI JL. KH. RASYAD NO. 01'),
(842, ' 60715684', 'MIS MIDRARUL ULUM', 'JL.PUGER NO.88 PDK.SADENGAN KASIYAN TIMUR'),
(843, ' 60715831', 'MIS MIFTAHUL HIDAYAH', 'JL. KAKAK TUA 04 GLUNDENGAN'),
(844, ' 60715685', 'MIS MIFTAHUL HUDA', 'JL.MELATI NO.17'),
(845, ' 60715686', 'MIS MIFTAHUL ULUM', 'JL. ADE IRMA SURYANI 103 WRINGINTELU PUGER JEMBER'),
(846, ' 60715807', 'MIS MIFTAHUL ULUM', 'JL. MARZUKI ZAENAB NO 205. RT/RW.003/018. KODE POS 68173. CURAHTAKIR - TEMPUREJ'),
(847, ' 60715808', 'MIS MIFTAHUL ULUM', 'JL.KENITU NO 18 KAUMAN TEMPUREJO'),
(848, ' 60715715', 'MIS MIFTAHUL ULUM', 'Jl. Al-Mubarokah No.04 Baban Barat'),
(849, ' 60715541', 'MIS MIFTAHUL ULUM 01 KEPANJEN', 'JL. TAMBAK NO.57 KEPANJEN GUMUKMAS-JEMBER'),
(850, ' 60715544', 'MIS MIFTAHUL ULUM 03', 'JALAN MIFTADA NO 35 SUMBERSARI'),
(851, ' 60715543', 'MIS MIFTAHUL ULUM I', 'JL. PUGER 187 MENAMPU'),
(852, ' 60715542', 'MIS MIFTAHUL ULUM I', 'Jl. Kongsen Muneng Mayangan'),
(853, ' 60715540', 'MIS MIFTAHUL ULUM PURWOASRI', 'JLN. UMBULSARI SAMBILEREN'),
(854, ' 60715466', 'MIS MIMA 22 AL IKHLAS', 'JL. ANGGREK KEBONSARI'),
(855, ' 60715471', 'MIS MIMA 23 SUNAN AMPEL', 'JL. WATU ULO NO.65 SABRANG'),
(856, ' 60715472', 'MIS MIMA 24 MIFTAHUL ULUM', 'TEGALREJO'),
(857, ' 60715473', 'MIS MIMA 25 GOTONG ROYONG', 'JATIREJO'),
(858, ' 60715474', 'MIS MIMA 26 AL FALAH', 'JL. IMAM HANAFI KRAJAN LOR'),
(859, ' 60715475', 'MIS MIMA 27 SUNAN GIRI', 'JL. SUKUN KRAJAN KIDUL'),
(860, ' 60715476', 'MIS MIMA 28 MIFTAHUL ULUM', 'JL. WATU ULO 112 BEDENGAN'),
(861, ' 60715477', 'MIS MIMA 29 MIFTAHUL ULUM', 'JL. DIPONEGORO GG. V KAUMAN'),
(862, ' 60715478', 'MIS MIMA 30 BUSTANUL ULUM', 'JL. KAMBOJA 16 TUTUL'),
(863, ' 60715467', 'MIS MIMA 31 AL HIKAM', 'JL. K.H. HASYIM ASYARI 56 LANGON'),
(864, ' 60715479', 'MIS MIMA 32 SALAFIYAH SYAFIIYAH', 'JLN. CANDRADIMUKA, NO. 13 KRAJAN KARANGANYAR'),
(865, ' 60715469', 'MIS MIMA 33 TARBIYATUL ISLAMIYAH', 'JL. IMAM BONJOL NO.105 SENTONG'),
(866, ' 60715480', 'MIS MIMA 34 HASYIM ASYARI PONTANG', 'JL.BRAWIJAYA NO.16 PONTANG AMBULU JEMBER JAWA TIMUR'),
(867, ' 60715481', 'MIS MIMA 35 NURUL ULUM', 'JL. POROS KIDUL NO. 96 ANDONGSARI AMBULU'),
(868, ' 60715482', 'MIS MIMA 36 NURUL HIDAYAH', 'JL. KOTTA BLATER GANG MANGGA NO. 10 DUSUN KARANGTEMPLEK'),
(869, ' 60715483', 'MIS MIMA 37 SUNAN KALIJOGO', 'JALAN MASJID BAROKALLOH NO.3'),
(870, ' 60715843', 'MIS MIMA 39 HIDAYATUL MURID', 'Jl. KH Dewantara 176'),
(871, ' 60715839', 'MIS MIMA 41 TARBIYATUL ISLAMIYAH', 'GONDOSARI RT 003 RW 018 TAMANSARI'),
(872, ' 60715830', 'MIS MIMA 42 HIDAYATUD DINIYAH', 'JL. A. YANI NO. 56 GAWOK WULUHAN JEMBER'),
(873, ' 60715829', 'MIS MIMA DARUS SALAM', 'JL.KARTINI II/47 SUMBEREJO, GLUNDENGAN - WULUHAN'),
(874, ' 60715599', 'MIS MIMA MIFTAHUL HUDA', 'DUSUN JATISARI'),
(875, ' 60715600', 'MIS MIMA NURUL HUDA', 'DUSUN GONDANGREJO RT:01 RW:13'),
(876, ' 60715691', 'MIS MIMA NURUL HUDA', 'JL.PASAR MANYUK KRAJAN'),
(877, ' 60715601', 'MIS MIMA SALAFIYAH', 'Jl. Kepanjen no. 10 Kedunglangkap RT 01 RW 11'),
(878, ' 60715612', 'MIS MIMA TEMPURAN', 'RT.04 RW.04 TEMPURAN CAKRU'),
(879, ' 60715610', 'MIS MINU 01 KENCONG', 'JL. KH. ABD. KHOLIQ 14 PONJEN KENCONG'),
(880, ' 60715611', 'MIS MINU 02 KENCONG', 'JL.PISANG AGUNG GUMUK BANJI KENCONG'),
(881, ' 60715716', 'MIS MISBAHUL FALAH', 'JL.PP.MISBAHUL FALAH DESA PACE'),
(882, ' 60715605', 'MIS MUHAMMADIYAH 01 CAKRU', 'JLN. K.H HASYIM NO.1 CAKRU'),
(883, ' 60715832', 'MIS MUHAMMADIYAH 01 TANJUNGREJO', 'JL. AMBULU NO. 78 TANJUNGREJO'),
(884, ' 60715468', 'MIS MUHAMMADIYAH 01 WATUKEBO', 'JALAN KOTTA BLATER KM 03 WATUKEBO'),
(885, ' 60715606', 'MIS MUHAMMADIYAH 02 CAKRU', 'JL. PANTAI PASEBAN IGIR-IGIR'),
(886, ' 60715470', 'MIS MUHAMMADIYAH 02 PONTANG', 'JL. BRAWIJAYA GG.2 NO.97 PONTANG'),
(887, ' 60715833', 'MIS MUHAMMADIYAH 02 TAMANSARI', 'JL. A. YANI NO. 64 GONDOSARI - TAMANSARI - WULUHAN'),
(888, ' 60715607', 'MIS MUHAMMADIYAH 03 CAKRU', 'JL.MASJID AL-MUJAHIDDIN GONDANGREJO'),
(889, ' 60715834', 'MIS MUHAMMADIYAH 03 DUKUHDEMPOK', 'JL. FLAMBOYAN NO.26'),
(890, ' 60715809', 'MIS MUHAMMADIYAH 03 WONOASRI', 'JL. MAJAPAHIT GG. 7'),
(891, ' 60715835', 'MIS MUHAMMADIYAH 04 AMPEL', 'JL. KH MANSYUR SHOLEH NO.62'),
(892, ' 60715608', 'MIS MUHAMMADIYAH 04 CAKRU', 'JL. PANTAI PASEBAN DUSUN BALEKAMBANG DESA PASEBAN KECAMATAN KENCONG '),
(893, ' 60715836', 'MIS MUHAMMADIYAH 05 AMPEL', 'JL.SUNAN MURIA 48 AMPEL'),
(894, ' 60715609', 'MIS MUHAMMADIYAH 05 CAKRU', 'JLN. PANTAI PASEBAN SIDONGANTI KRATON'),
(895, ' 60715717', 'MIS MUQADDIMATUL AKHLAQ', 'JL. K. MAHMUD THAYYIB NO. 142'),
(896, ' 60715837', 'MIS NAHDLATUTH THALABAH', 'JL. Kenanga kesilir'),
(897, ' 60715687', 'MIS NURUL HAROMAIN', 'JL. KH. ANWAR HAROMAIN NO. 18'),
(898, ' 60715725', 'MIS NURUL HIDAYAH 2', 'KRAJAN PACE'),
(899, ' 60715719', 'MIS NURUL ISLAM', 'Jl. KH. Agus Salim No.01'),
(900, ' 60728842', 'MIS NURUL ISLAM', 'JL KH ROFIADDIN NO. 01 SILO JEMBER'),
(901, ' 60715838', 'MIS NURUL ISLAM LOJEJER', 'JL. DIPONEGORO NO. 133 LOJEJER WULUHAN JEMBER'),
(902, ' 60715718', 'MIS NURUL-HIDAYAH 01', 'JL-PTPN XII SILOSANEN'),
(903, ' 70010533', 'MIS NURUS SALAM', 'JL. PTPN XII KEBUN SILOSANEN Dusun Baban Tengah'),
(904, ' 60728848', 'MIS NURUSSALAM', 'JL. MAJAPAHIT GANG V DSN. KRATON'),
(905, ' 60715545', 'MIS PERWANIDA 01', 'JL.RAYA PUGER KAPITAN MENAMPU GUMUKMAS JEMBER JATIM'),
(906, ' 69983006', 'MIS PLUS ISTIQOMAH', 'DUSUN PASUNDAN, DESA KARANGANYAR'),
(907, ' 60715720', 'MIS PUNCAK AL - IBRAHIMY', 'JATIAN'),
(908, ' 60715688', 'MIS RAUDLATUL HUDA', 'JL. NUSA INDAH NO. 13 WONOSARI PUGER'),
(909, ' 60715726', 'MIS RAUDLOTUL JANNAH', 'PTPN XII SILOSANEN BABAN TENGAH MULYOREJO SILOSANEN'),
(910, ' 60715602', 'MIS SUNAN AMPEL', 'JL. H. ABDUL KARIM 03 SIDOMULYO RT.02 RW.01 PASEBAN KENCONG'),
(911, ' 60715811', 'MIS SUNAN GIRI', 'JL.KOTTA BLATER NO. 09 DSN. JATIREJO DS. SIDODADI KEC. TEMPUREJO KAB. JEMBER'),
(912, ' 60715721', 'MIS TARBIYATUL IHSAN', 'JL.KH. SUNA SUMBER LANAS TIMUR'),
(913, ' 60715722', 'MIS THOYYIBUL BAROKAH', 'GLUGUH KARANGHARJO SILO JEMBER'),
(914, ' 60715689', 'MIS WAHID HASYIM', 'JL. MADRASAH 035 KEDUNG SUMUR'),
(915, ' 60715723', 'MIS ZAINUL HASAN', 'BABAN BARAT MULYOREJO'),
(916, 'NPSN', 'NAMA LEMBAGA', 'ALAMAT'),
(917, ' 70012859', 'SD DAFA AL-AMIEN', 'Jl.Lapangan Sabrang Ambulu'),
(918, ' 20525037', 'SD ISLAM NU 07', 'Jl. Hos Cokroaminoto No. 37 Tanjungrejo'),
(919, ' 69996228', 'SD IT BINA UMAT', 'Dusun Krajan RT 03 RW 01'),
(920, ' 20525027', 'SD KATOLIK YOS SUDARSO', 'Jl. Candradimuka No. 4'),
(921, ' 20525023', 'SD NU 01', 'Jl. Pasar Kesilir No.12'),
(922, ' 20525024', 'SD NU 02 DIPONEGORO', 'Jl. Hos. Cokroaminoto No. 33'),
(923, ' 20554021', 'SD NU 03 NURUL HUDA', 'Jl. Cempaka No. 13'),
(924, ' 20525025', 'SD NU 04 AMPEL', 'Jl. Pasir Putih'),
(925, ' 20525040', 'SD NU 05 HIDAYUTUL MURID AMPEL', 'Jl. Kh Dewantara No. 176'),
(926, ' 20554253', 'SD NU 06 MIFTAHUL ULUM', 'Jl. Watu Ulo Rt. 06 Rw. 02 Grobyok'),
(927, ' 20524924', 'SD NU 08 MAARIF', 'Jl. H. Moh. Sholeh No. 1 Kepel'),
(928, ' 20524939', 'SD NU 09 RIYADLATUL UQUL', 'KH. Zuhdi Zain No. 150 Kepel'),
(929, ' 20524940', 'SD NU 10', 'Jl. Sulawesi 75'),
(930, ' 20554024', 'SD NU 12 DARUN NAJAH', 'Jl. Masjid Al Musthofa No. 03'),
(931, ' 20554025', 'SD NU 13 ROUDLOTUL MUBTADIIN', 'Jl. Balai Desa No. 184 Dusun Tamanrejo'),
(932, ' 20554026', 'SD NU 18 DARUS SHOLAH', 'Jl. Pb. Sudirman 133'),
(933, ' 20554252', 'SD NU XI NAHDLATUTH THALABAH', 'Jl. Kh Im Buchori Po Box 10 Kesilir'),
(934, ' 20524944', 'SD PLUS AL MUTHOHHIRIN', 'Jl. KH. Ahmad Thohir No. 1, Dusun Krajan'),
(935, ' 20525017', 'SD SALAFIYAH SYAFIIYAH', 'Jl. Candradimuka No. 95'),
(936, ' 20524947', 'SD SDIT AL IKHLAS', 'Jl. Anggrek No. 80'),
(937, ' 70002409', 'SD WAHIDIYAH', 'JL. TEUKU UMAR No. 125, Rt. 03 Rw. 03, DUSUN KRAJAN'),
(938, ' 20524971', 'SDN AMBULU 01', 'Jl. Raya Suyitman 127'),
(939, ' 20524972', 'SDN AMBULU 02', 'Jl. Imam Bonjol No.23 Krajan'),
(940, ' 20524975', 'SDN AMBULU 03', 'Jl. Candradimuka No. 103 Ambulu'),
(941, ' 20524974', 'SDN AMBULU 04', 'JL.KH.Hasyim Asyari no.13 Langon - Ambulu'),
(942, ' 20524976', 'SDN AMPEL 01', 'Jl. Watangan No. 185 Kepel'),
(943, ' 20524977', 'SDN AMPEL 02', 'Jl. Puger No. 247'),
(944, ' 20524967', 'SDN AMPEL 03', 'Jl. Ki Hajar Dewantoro No. 9 Pomo'),
(945, ' 20524979', 'SDN AMPEL 04', 'Jl. Sunan Muria'),
(946, ' 20524966', 'SDN ANDONGREJO 01', 'Jln. Bandealit No. 132'),
(947, ' 20554219', 'SDN ANDONGREJO 02', 'Jln. Bandealit No. 51'),
(948, ' 20524955', 'SDN ANDONGREJO 03', 'Jln. Bandealit'),
(949, ' 20524956', 'SDN ANDONGREJO 04', 'Ptps. Afd. Sumbersalak, Kebun Bandealit'),
(950, ' 20524957', 'SDN ANDONGSARI 01', 'Karang Templek'),
(951, ' 20524958', 'SDN ANDONGSARI 02', 'Jl. Kotta Blater No. 162'),
(952, ' 20524959', 'SDN ANDONGSARI 03', 'Dusun Krajan'),
(953, ' 20524962', 'SDN ANDONGSARI 04', 'Dusun Tirtoasri'),
(954, ' 20524961', 'SDN ANDONGSARI 05', 'Jl. Durian No. 04 Karang Templek'),
(955, ' 20524963', 'SDN ANDONGSARI 06', 'Jl. Durian No. 61 Karangtemplek'),
(956, ' 20525126', 'SDN BAGON 01', 'Jl. Kedungsumur No. 01'),
(957, ' 20525127', 'SDN BAGON 02', 'Dusun Suling'),
(958, ' 20525114', 'SDN BAGON 03', 'Bagon'),
(959, ' 20551854', 'SDN BAGOREJO 01', 'Jl. Soekarno - Hatta No. 195'),
(960, ' 20525100', 'SDN BAGOREJO 02', 'Jl. Setia Budi No. 05 Bagorejo, Gumukmas, Jember'),
(961, ' 20525101', 'SDN BAGOREJO 03', 'Jl. Ponpes. Darul Muhajirin No. 100'),
(962, ' 20525102', 'SDN BAGOREJO 04', 'Jl A.Yani 168 Ampeldento'),
(963, ' 20525067', 'SDN CAKRU 01', 'Jl Diponegoro No 14'),
(964, ' 20525068', 'SDN CAKRU 02', 'Jl. Pasar Anyar Igir-igir'),
(965, ' 20525056', 'SDN CAKRU 03', 'Dusun Gondangrejo'),
(966, ' 20525055', 'SDN CAKRU 04', 'Dusun Tempuran'),
(967, ' 20525092', 'SDN CURAHNONGKO 01', 'Jln. Bandealit No. 05'),
(968, ' 20553996', 'SDN CURAHNONGKO 02', 'PTPN XII, Kebun Kotta Blater'),
(969, ' 20525093', 'SDN CURAHNONGKO 03', 'Ptpn. Xii, Kebun Kotta Blater'),
(970, ' 20553997', 'SDN CURAHNONGKO 04', 'Jl. Cangak Indah No.3 PTPN XII Kebun Kotta Blater'),
(971, ' 20525095', 'SDN CURAHNONGKO 06', 'Jln. Bandealit No. 90'),
(972, ' 20525096', 'SDN CURAHNONGKO 07', 'Jln. Dahlia No. 40'),
(973, ' 20525097', 'SDN CURAHNONGKO 08', 'Ptpn. Xii, Afd. Trate, Kebun Kotta Blater'),
(974, ' 20525085', 'SDN CURAHTAKIR 01', 'PTPN XII , Kebun Kalisanen'),
(975, ' 20525084', 'SDN CURAHTAKIR 02', 'Jln. Pb. Sudirman No. 6'),
(976, ' 20525072', 'SDN CURAHTAKIR 03', 'PTPN XII, Afd. Kalibajing, Kebun Glantangan Tempurejo'),
(977, ' 20525073', 'SDN CURAHTAKIR 04', 'Jln. Marzuki Zaenab No. 40'),
(978, ' 20525075', 'SDN CURAHTAKIR 06', 'Dusun Curahrejo'),
(979, ' 20525076', 'SDN CURAHTAKIR 07', 'Dusun Punco'),
(980, ' 20524763', 'SDN DUKUHDEMPOK 01', 'Jl Pahlawan 63'),
(981, ' 20524764', 'SDN DUKUHDEMPOK 02', 'Jl. Pahlawan 117'),
(982, ' 20524765', 'SDN DUKUHDEMPOK 03', 'Jl. Kh. Dewantara No. 09'),
(983, ' 20524766', 'SDN DUKUHDEMPOK 04', 'Jl. Pahlawan 151'),
(984, ' 20524768', 'SDN DUKUHDEMPOK 05', 'Jl. Bali 02'),
(985, ' 20524769', 'SDN DUKUHDEMPOK 06', 'Jl. A. Yani No. 36'),
(986, ' 20524774', 'SDN GARAHAN 01', 'Jl. Banyuwangi No. 30 Krajan'),
(987, ' 20524759', 'SDN GARAHAN 02', 'Pasar Alas'),
(988, ' 20524784', 'SDN GLUNDENGAN 01', 'Jl. Ambulu 304'),
(989, ' 20524785', 'SDN GLUNDENGAN 02', 'Jl. Kemuning Sari 134'),
(990, ' 20524786', 'SDN GLUNDENGAN 03', 'Jl. Kemuningsari 262'),
(991, ' 20524790', 'SDN GLUNDENGAN 04', 'Jl. Garuda 262'),
(992, ' 20524783', 'SDN GLUNDENGAN 05', 'Jl. Sedap Malam No. 231'),
(993, ' 20524788', 'SDN GLUNDENGAN 06', 'Jl. Nogosari Tanjungsari 231'),
(994, ' 20524805', 'SDN GRENDEN 01', 'Jl. Raya Puger No. 17 Grenden - Puger'),
(995, ' 20524705', 'SDN GRENDEN 02', 'Jl. Karetan No. 68'),
(996, ' 20524706', 'SDN GRENDEN 03', 'Grenden'),
(997, ' 20524707', 'SDN GRENDEN 04', 'Jl. Karetan Karangsono'),
(998, ' 20524709', 'SDN GRENDEN 05', 'Jl. Gunung Sadeng'),
(999, ' 20524714', 'SDN GUMUKMAS 01', 'Jl. A. Yani No 220 Gumukmas'),
(1000, ' 20524715', 'SDN GUMUKMAS 02', 'Jl. Jatiagung Gumukmas'),
(1001, ' 20524716', 'SDN GUMUKMAS 03', 'Ds. Jatiagung No. 91 Rt. 002 Rw. 019'),
(1002, ' 20524704', 'SDN GUMUKMAS 04', 'Jl. A.Yani 362 Krebet'),
(1003, ' 20524703', 'SDN GUMUKMAS 05', 'Jatiagung'),
(1004, ' 20524719', 'SDN HARJOMULYO 01', 'PDP. Sumber wadung'),
(1005, ' 20524717', 'SDN HARJOMULYO 02', 'JL.PDP Sumber Wadung'),
(1006, ' 20524718', 'SDN HARJOMULYO 03', 'Sumber Lanas Timur'),
(1007, ' 20524734', 'SDN HARJOMULYO 04', 'Jl. PDP Sumber Wadung No. 34'),
(1008, ' 20524737', 'SDN JAMBEARUM 01', 'Jl. Raya Puger Jambearum'),
(1009, ' 20524736', 'SDN JAMBEARUM 02', 'JL. PUGER NO.33'),
(1010, ' 20524738', 'SDN JAMBEARUM 03', 'Jl. Bagon No. 1'),
(1011, ' 20524830', 'SDN KARANGANYAR 01', 'Jl. Kopral Sutomo No. 260'),
(1012, ' 20524831', 'SDN KARANGANYAR 02', 'Sumberan'),
(1013, ' 20524821', 'SDN KARANGANYAR 03', 'Jl. Mangun Sarkoro No. 12'),
(1014, ' 20524832', 'SDN KARANGANYAR 04', 'Jln. Raden Patah No. 18 Karanganyar - Ambulu'),
(1015, ' 20524833', 'SDN KARANGANYAR 05', 'Jl. Untung Suropati'),
(1016, ' 20524813', 'SDN KARANGHARJO 01', 'Jalan PDP Sumberwadung'),
(1017, ' 20524814', 'SDN KARANGHARJO 02', 'Dusun Sumber Pinang RT 01 RW 30'),
(1018, ' 20524834', 'SDN KARANGREJO 01', 'Jl. Rajawali No. 238 Karangrejo'),
(1019, ' 20524835', 'SDN KARANGREJO 02', 'Jl. Nanas'),
(1020, ' 20524836', 'SDN KARANGREJO 03', 'Jalan Mangga Nomor 01'),
(1021, ' 20524851', 'SDN KARANGREJO 04', 'Jln. Bendorejo No. 32'),
(1022, ' 20524841', 'SDN KASIYAN 01', 'Jl. Mlokorekesan No. 754'),
(1023, ' 20524842', 'SDN KASIYAN 02', 'Jln. Mataram'),
(1024, ' 20524843', 'SDN KASIYAN 03', 'Jl.Mataram No.477'),
(1025, ' 20524844', 'SDN KASIYAN 04', 'Jl. Sriwijaya No. 106'),
(1026, ' 20524845', 'SDN KASIYAN TIMUR 01', 'Jl. Gatot Subroto No. 71'),
(1027, ' 20524846', 'SDN KASIYAN TIMUR 02', 'Jl. Urip Sumoharjo No. 122'),
(1028, ' 20524848', 'SDN KASIYAN TIMUR 03', 'Jl. Wijaya Kusuma No. 150'),
(1029, ' 20523566', 'SDN KENCONG 01', 'Jl. Krakatau 31'),
(1030, ' 20523570', 'SDN KENCONG 02', 'Jl. Krakatau No.03'),
(1031, ' 20523569', 'SDN KENCONG 03', 'Jl. Kh. Kholiq Ponjen'),
(1032, ' 20523603', 'SDN KENCONG 04', 'Jl. A. Yani No. 11'),
(1033, ' 20523571', 'SDN KENCONG 05', 'Jln. Dusun Pondok Waluh'),
(1034, ' 20523588', 'SDN KENCONG 06', 'Jl. Pisang Agung'),
(1035, ' 20523587', 'SDN KENCONG 07', 'Jl. Lawu No.01 Wunguan'),
(1036, ' 20553952', 'SDN KENCONG 08', 'Pangonan'),
(1037, ' 20523604', 'SDN KEPANJEN 01', 'Ds. Panggul Melati'),
(1038, ' 20523605', 'SDN KEPANJEN 02', 'Ds. Panggul Melati'),
(1039, ' 20523606', 'SDN KEPANJEN 03', 'Jl. Pansela Kepanjen No. 01'),
(1040, ' 20523519', 'SDN KESILIR 01', 'Jl. Ambulu No. 135 Demangan'),
(1041, ' 20523515', 'SDN KESILIR 02', 'Jl. Ambulu 91'),
(1042, ' 20523520', 'SDN KESILIR 03', 'Jl. Kh. Dewantara No. 20'),
(1043, ' 20523517', 'SDN KESILIR 04', 'Jl. Kh Dewantara N0. 23'),
(1044, ' 20523518', 'SDN KESILIR 05', 'Tegal Banteng'),
(1045, ' 20523546', 'SDN KRATON 01', 'Jl. Desa Kraton No. 136'),
(1046, ' 20523547', 'SDN KRATON 02', 'Jl. Pantai Paseban No.102 dusun sidonganti'),
(1047, ' 20523548', 'SDN KRATON 03', 'Jl. Pelajar No. 04 Kedunglangkap'),
(1048, ' 20523549', 'SDN KRATON 04', 'Jl. Sukmajaya 120 Muneng'),
(1049, ' 20523541', 'SDN LOJEJER 01', 'Jl. Pb. Sudirman No. 01'),
(1050, ' 20523691', 'SDN LOJEJER 02', 'Jl. Puger No. 5'),
(1051, ' 20523616', 'SDN LOJEJER 03', 'Jl. Brawijaya No. 2'),
(1052, ' 20523692', 'SDN LOJEJER 04', 'Jl. Pb. Sudirman No. 133'),
(1053, ' 20523693', 'SDN LOJEJER 05', 'Jl. Puskesmas No. 2'),
(1054, ' 20523694', 'SDN LOJEJER 06', 'Jl. PAPUMA GRINTINGAN NO 59'),
(1055, ' 20523687', 'SDN MAYANGAN 01', 'Muneng Mayangan'),
(1056, ' 20523684', 'SDN MAYANGAN 02', 'Sumbersari'),
(1057, ' 20523685', 'SDN MAYANGAN 03', 'Jl.tambak Udang Pentung Waru'),
(1058, ' 20523686', 'SDN MAYANGAN 04', 'Jl. Tambak No.05'),
(1059, ' 20523688', 'SDN MAYANGAN 05', 'Kalimalang'),
(1060, ' 20523703', 'SDN MENAMPU 01', 'Jl. Puger No. 109 Menampu'),
(1061, ' 20523704', 'SDN MENAMPU 02', 'Jl.puger No.36'),
(1062, ' 20523721', 'SDN MENAMPU 03', 'Jl. Puger No. 60'),
(1063, ' 20523720', 'SDN MENAMPU 04', 'Pulorejo'),
(1064, ' 20523722', 'SDN MENAMPU 05', 'Jl. Puger No.411 Kapitan'),
(1065, ' 20523723', 'SDN MENAMPU 06', 'Pulorejo'),
(1066, ' 20523724', 'SDN MLOKOREJO 01', 'Jl. Kencong 6'),
(1067, ' 20523725', 'SDN MLOKOREJO 02', 'Jl. Kencong'),
(1068, ' 20523726', 'SDN MLOKOREJO 03', 'Jl. Lapangan'),
(1069, ' 20523727', 'SDN MLOKOREJO 04', 'Jl. Raya Kencong'),
(1070, ' 20523728', 'SDN MLOKOREJO 05', 'Mlokorejo'),
(1071, ' 20523731', 'SDN MOJOMULYO 01', 'Jl. Kalimalang No. 65'),
(1072, ' 20523719', 'SDN MOJOMULYO 02', 'Jl. Pantai Getem'),
(1073, ' 20523715', 'SDN MULYOREJO 01', 'PTPN XII Kebun Silosanen Mulyorejo'),
(1074, ' 20523716', 'SDN MULYOREJO 02', 'Jln. TANGKI NOL MULYOREJO SILO'),
(1075, ' 20523717', 'SDN MULYOREJO 03', 'Dusun Baban Tengah Rt. 01 Rw. 02'),
(1076, ' 20523732', 'SDN MULYOREJO 04', 'Baban Barat'),
(1077, ' 20523617', 'SDN MULYOREJO 05', 'Dusun Batu Ampar'),
(1078, ' 20523624', 'SDN PACE 01', 'Jl. K. Mahmud Thoyyib No. 32 Dusun Curahwungkal'),
(1079, ' 20523629', 'SDN PACE 02', 'Jl. Ponpes Karang Tengah Pace'),
(1080, ' 20523626', 'SDN PACE 03', 'Jl. K. Syamsuddin No. 147'),
(1081, ' 20523627', 'SDN PACE 04', 'Jl. PTPN XII Kebun Silosanen'),
(1082, ' 20523628', 'SDN PACE 05', 'Dusun Sukmo Ilang Rt. 05 Rw. 25'),
(1083, ' 20523658', 'SDN PASEBAN 01', 'Jl. Makam Bulurejo Paseban'),
(1084, ' 20523674', 'SDN PASEBAN 02', 'Jl. Pantai Paseban'),
(1085, ' 20523399', 'SDN PASEBAN 03', 'Bulurejo Paseban'),
(1086, ' 20553993', 'SDN PONDOKREJO 01', 'Ptpn Xii Kebun Glantangan'),
(1087, ' 20553994', 'SDN PONDOKREJO 02', 'Jl. Imam Bonjol No. 66'),
(1088, ' 20553995', 'SDN PONDOKREJO 03', 'Jl. Ptpn Xii Kebun Glantangan'),
(1089, ' 20523262', 'SDN PONDOKREJO 04', 'Pondokrejo'),
(1090, ' 20523263', 'SDN PONDOKREJO 05', 'Dusun Pondokmiri'),
(1091, ' 20523264', 'SDN PONTANG 01', 'Jl. Kotta Blater No. 75'),
(1092, ' 20523265', 'SDN PONTANG 02', 'Jl. Brawijaya XI'),
(1093, ' 20523266', 'SDN PONTANG 03', 'Jl. Brawijaya No. 65'),
(1094, ' 20523267', 'SDN PONTANG 04', 'Jln. Brawijaya Gg. III'),
(1095, ' 20523268', 'SDN PONTANG 05', 'Jl. Brawijaya Gg. 14'),
(1096, ' 20523272', 'SDN PURWOASRI 01', 'Jalan Yos Sudarso No. 39'),
(1097, ' 20523184', 'SDN PURWOASRI 02', 'Jl. Umbulsari'),
(1098, ' 20523172', 'SDN PURWOASRI 03', 'Sambileren'),
(1099, ' 20523185', 'SDN SABRANG 01', 'Jln. Watuulo No. 24'),
(1100, ' 20523202', 'SDN SABRANG 02', 'Tegalrejo No. 2'),
(1101, ' 20523201', 'SDN SABRANG 03', 'Jl. Raya Watu Ulo No. 47'),
(1102, ' 20523203', 'SDN SABRANG 04', 'Jalan Sabrang'),
(1103, ' 20523204', 'SDN SABRANG 05', 'Jl. Cangak Indah Ungkalan'),
(1104, ' 20523205', 'SDN SABRANG 06', 'Jl. Suprapto No.49'),
(1105, ' 20523206', 'SDN SANENREJO 01', 'Jln. Meru Betiri No. 76'),
(1106, ' 20523207', 'SDN SANENREJO 02', 'Krajan III'),
(1107, ' 20523208', 'SDN SANENREJO 03', 'Jln. Betiri No. 08 Mandillis'),
(1108, ' 20523209', 'SDN SANENREJO 04', 'Jln. Gajahmada No. 20'),
(1109, ' 20523210', 'SDN SANENREJO 05', 'Jl. Damrejo No.87 Mandilis'),
(1110, ' 20523196', 'SDN SEMPOLAN 01', 'Jalan Olahraga Dusun Krajan'),
(1111, ' 20523362', 'SDN SIDODADI 01', 'Jl. Nusa Indah 137'),
(1112, ' 20523363', 'SDN SIDODADI 02', 'Jl. Ahmad Yani No. 106'),
(1113, ' 20523364', 'SDN SIDODADI 03', 'Jln. Pb. Sudirman No. 20'),
(1114, ' 20523365', 'SDN SIDODADI 04', 'Jln. Melati No.18'),
(1115, ' 20523366', 'SDN SIDODADI 05', 'Jln. Argopuro No.213 Mandiku Sidodadi'),
(1116, ' 20523367', 'SDN SIDODADI 06', 'Jln. Argapura Gg. VI, Madiku'),
(1117, ' 20524062', 'SDN SUMBEREJO 01', 'Jl. Watu Ulo No. 144'),
(1118, ' 20524071', 'SDN SUMBEREJO 02', 'Sidomulyo'),
(1119, ' 20524061', 'SDN SUMBEREJO 03', 'Jl. Payangan, Bregoh'),
(1120, ' 20524058', 'SDN SUMBEREJO 04', 'Krajan Kidul'),
(1121, ' 20524059', 'SDN SUMBEREJO 05', 'Dusun Curahrejo'),
(1122, ' 20551780', 'SDN SUMBEREJO 06', 'Payangan Watuulo'),
(1123, ' 20524060', 'SDN SUMBEREJO 07', 'Krajan Kidul'),
(1124, ' 20524063', 'SDN SUMBEREJO 08', 'Jl. Lapangan No 89 Krajan Kidul'),
(1125, ' 20524064', 'SDN SUMBEREJO 09', 'JL. WATU ULO NO. 11'),
(1126, ' 20524065', 'SDN SUMBEREJO 10', 'Krajan Kidul'),
(1127, ' 20524018', 'SDN TAMANSARI 01', 'Jl. Lojejer'),
(1128, ' 20524016', 'SDN TAMANSARI 02', 'Jl. A. Yani No. 17'),
(1129, ' 20524021', 'SDN TAMANSARI 03', 'Jl. Ambulu No. 89'),
(1130, ' 20524022', 'SDN TAMANSARI 04', 'Jl. Pb. Sudirman No. 50 Gondosari'),
(1131, ' 20524009', 'SDN TANJUNGREJO 01', 'Jl. Diponegoro No. 181 Tanjungrejo'),
(1132, ' 20524160', 'SDN TANJUNGREJO 02', 'Jl. Sunan Gunungjati 191'),
(1133, ' 20524011', 'SDN TANJUNGREJO 03', 'Jl. Watangan Grobyog'),
(1134, ' 20524027', 'SDN TANJUNGREJO 04', 'Krajan Wetan'),
(1135, ' 20524085', 'SDN TANJUNGREJO 05', 'Jl. Mawar No. 10 Krajan Wetan'),
(1136, ' 20524145', 'SDN TANJUNGREJO 06', 'Jl. Grobyog Gg. 05'),
(1137, ' 20524171', 'SDN TEGALSARI 01', 'Jl. Melinjo No. 90 TEGALSARI AMBULU'),
(1138, ' 20524146', 'SDN TEGALSARI 02', 'Jl. Mawar No. 30'),
(1139, ' 20524148', 'SDN TEGALSARI 03', 'Jl. Melinjo No. 04'),
(1140, ' 20524147', 'SDN TEGALSARI 04', 'Jl. Watu Ulo No.22 Bedengan'),
(1141, ' 20524189', 'SDN TEMBOKREJO 01', 'Jl. Melati No. 30 Tembokrejo'),
(1142, ' 20524174', 'SDN TEMBOKREJO 02', 'Jalan Gajah Mada No.50'),
(1143, ' 20524190', 'SDN TEMBOKREJO 03', 'Jl. Cendrawasih no:42'),
(1144, ' 20524191', 'SDN TEMBOKREJO 04', 'Jl. Bengawan Solo 46'),
(1145, ' 20524192', 'SDN TEMBOKREJO 05', 'Jl.Bromo Kebonsari Tembokrejo'),
(1146, ' 20524193', 'SDN TEMPUREJO 01', 'Jln. Ki.Dewantara No. 04'),
(1147, ' 20524194', 'SDN TEMPUREJO 02', 'Jl. Dr. Soebandi No. 25'),
(1148, ' 20553988', 'SDN TEMPUREJO 03', 'Jln. Ki Hajar Dewantara No. 36'),
(1149, ' 20553989', 'SDN TEMPUREJO 04', 'Jln. Moh. Seruji No. 157'),
(1150, ' 20524195', 'SDN TEMPUREJO 05', 'Jl. K.H. Abdul Aziz No 56 Gg Koramil Dsn Kauman'),
(1151, ' 20553990', 'SDN TEMPUREJO 06', 'Jln. Padang Golf. Dusun Wonojati'),
(1152, ' 20553992', 'SDN TEMPUREJO 07', 'Krajan, Tempurejo'),
(1153, ' 20524113', 'SDN WONOASRI 01', 'Jln. Mojopahit Gg. III No. 60'),
(1154, ' 20524110', 'SDN WONOASRI 02', 'Jln. Mojopahit Gg. Iii No. 74'),
(1155, ' 20524112', 'SDN WONOASRI 03', 'Jln. PTP Nusantara XII Kebun Kalisanen, Dusun Curahlele'),
(1156, ' 20554342', 'SDN WONOREJO 01', 'Jl. Kartini 38 Wonorejo'),
(1157, ' 20524089', 'SDN WONOREJO 02', 'Jl Yos Sudarso 04'),
(1158, ' 20524090', 'SDN WONOREJO 03', 'Jl. Jatisari'),
(1159, ' 20524091', 'SDN WONOREJO 04', 'Jl Panjaitan No 03'),
(1160, ' 20524092', 'SDN WONOREJO 05', 'Jl Sukoreno Dusun Gumukbanji Wonorejo No 51'),
(1161, ' 20524094', 'SDN WONOREJO 06', 'Dusun Krajan A'),
(1162, ' 20554122', 'SDS AL FATCH', 'Jln. Imam Bonjol No 02'),
(1163, ' 20525031', 'SDS AL IBRAHIMY', 'Jl. K. Mansyur No. 35 Karang Timur'),
(1164, ' 69902144', 'SDS ASSUNNIYYAH', 'Jln Patok Krajan I Kencong'),
(1165, ' 69921445', 'SDS DARUS SHOLIHIN', 'JL MAKAM RAUDLATUL JANNAH'),
(1166, ' 69988517', 'SDS HIDAYATUL MURID FULL DAY', 'JL KI HAJAR DEWANTARA NO.121'),
(1167, ' 20524946', 'SDS I MIFTAHUL ULUM', 'Gluguh'),
(1168, ' 69979475', 'SDS ISLAM BAHRUL FALAH', 'JL. K. SYAFA`AH NO. 01'),
(1169, ' 20525035', 'SDS ISLAM BUSTANUL ULUM', 'Jl. Payangan Dusun Bregoh'),
(1170, ' 69758984', 'SDS ISLAM MENAMPU', 'DSN. KEDUNGLENGKONG DS.MENAMPU - GUMUKMAS'),
(1171, ' 69757219', 'SDS ISLAM NURUL FALAH', 'JL. SUMBER LANAS TIMUR HARJOMULYO'),
(1172, ' 69984460', 'SDS ISLAM NURUL ULUM PACE', 'Jln K. Syamsyuddin No. 1 Pace Silo'),
(1173, ' 20554042', 'SDS ISLAM TERPADU AT TAQWA', 'Jl. Apel No. 44, Tutul'),
(1174, ' 20525014', 'SDS KRISTEN PHILIA', 'Jl. Pendidikan no.22'),
(1175, ' 20525016', 'SDS MIFTAHUL FALAH', 'Jalan Sumber Lanas Barat No.01'),
(1176, ' 20525020', 'SDS MUHAMMADIYAH', 'Jl. Mataram No. 481'),
(1177, ' 20554179', 'SDS MUHAMMADIYAH', 'Jl. dr. Soetomo No. 15'),
(1178, ' 20554029', 'SDS MUHAMMADIYAH 01', 'Jl. Ki Hajar Dewantoro No 72 Wuluhan'),
(1179, ' 20525018', 'SDS MUHAMMADIYAH KENCONG', 'Jl. Diponegoro 164 Kencong'),
(1180, ' 69757938', 'SDS NU 22 FULL DAY AL-HIKMAH', 'Jl. Kenanga 33/35 Dusun Demangan'),
(1181, ' 20524117', 'SDS NU BAGOREJO 01', 'Jl. Soekarno Hatta No. 95 Bagorejo Kode POS 68165'),
(1182, ' 20524941', 'SDS NU GRENDEN', 'Jalan Raya Puger Nomor 32'),
(1183, ' 20524121', 'SDS NU GUMUKMAS 01', 'Jl. Mayangan No. 22 Jatiagung'),
(1184, ' 20524119', 'SDS NU KARANGREJO 01', 'Jl. Bendorejo No.01'),
(1185, ' 20524120', 'SDS NU KARANGREJO 02', 'Jl. Bendorejo No. 03'),
(1186, ' 20524118', 'SDS NU KARANGREJO 03', 'Jl. Garuda No. 20'),
(1187, ' 20524183', 'SDS NU KENCONG', 'Jl Kh Agus Salim No 11 Kencong'),
(1188, ' 20524184', 'SDS NU KRATON', 'Jl. Desa Kraton'),
(1189, ' 20524942', 'SDS NU WONOSARI', 'Jl. Kasiyan No. 45'),
(1190, ' 20549886', 'SDS PLUS AL MUBAROKAH', 'Panggul Melati Desa Kepanjen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_setting`
--

CREATE TABLE `db_setting` (
  `id` int(5) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `register` varchar(10) NOT NULL,
  `pengumuman` varchar(1000) NOT NULL,
  `jalur` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_setting`
--

INSERT INTO `db_setting` (`id`, `tapel`, `semester`, `register`, `pengumuman`, `jalur`) VALUES
(1, '2021-2022', 'Ganjil', '0', '                                                                                                                                                                                                                                                                                                                                <p style="text-align: center; "><font color="#0000ff"><b>Wali kelas mohon segera melakukan Validasi Data dan mengajukan Bukti Verval ke Kepala Sekolah/Madrasah masing-masing.</b></font></p><p style="text-align: center; "><font color="#0000ff"><b>Update Versi Selesai dilakukan mohon bapak ibu cek kembali data yang telah di perbaiki.</b></font></p><p style="text-align: center; "><u>SalamSatuDataAlAmien</u></p>                                                                                                                                                                                                                                                                             ', 'REGULER');

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
  `editor` varchar(50) NOT NULL,
  `mgm` varchar(50) NOT NULL,
  `ket` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_smk`
--

INSERT INTO `db_smk` (`id`, `id_enc`, `no_reg`, `nisn`, `nama`, `jk`, `tmp_lahir`, `tgl_lahir`, `nik`, `agama`, `alamat`, `rt`, `rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `propinsi`, `sts_tinggal`, `jns_tinggal`, `alat_trans`, `telp`, `email`, `anak_ke`, `jml_sdr`, `nm_ayh`, `tlahir_ayh`, `lahir_ayh`, `pend_ayh`, `kerja_ayh`, `hasil_ayh`, `nik_ayh`, `nm_ibu`, `tlahir_ibu`, `lahir_ibu`, `pend_ibu`, `kerja_ibu`, `hasil_ibu`, `nik_ibu`, `nm_wl`, `lahir_wl`, `tlahir_wl`, `pend_wl`, `kerja_wl`, `hasil_wl`, `nik_wl`, `no_kk`, `no_un`, `no_skhun`, `no_ijazah`, `no_kps`, `no_kip`, `no_kis`, `no_pkh`, `beasiswa`, `kelas_7`, `kelas_8`, `kelas_9`, `kelas_aktf`, `kelas_dig`, `skl_asal`, `almt_skl`, `jns_masuk`, `tgl_masuk`, `ket_out`, `tgl_out`, `alasan_out`, `nosrt_out`, `status`, `jalur`, `foto`, `progres`, `editor`, `mgm`, `ket`) VALUES
(1, '6b54d6df88f7bc34cbcf9e4222cd9096', '265-220105-001', '0058299979', 'anash herdiansyah', 'L', 'Jember', '2022-01-18', '248645486453', 'Islam', 'Krajan Kidul, Sumberejo', '001', '017', 'Krajan Kidul', 'SUMBEREJO', 'Ambulu', 'Jember', 'JAWA TIMUR', 'Rumah Orang Tua', 'Salaf Putri', 'Kereta api', '086235623243', '', '1', '', 'Miseri', 'Jember', '2022-01-12', 'Tidak Sekolah', 'Buruh', 'Rp. 2,000,000 - Rp. 4,999,999', '3509181703710001', 'Rifiah', 'Jember', '2021-12-28', 'SD Sederajad', 'Wirausaha', 'Lebih dari Rp. 20,000,000', '3509184806790002', '', '0000-00-00', '', '', '', '', '', '3509112203110014', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Siswa Baru', '0000-00-00', '', '0000-00-00', '', '', '', 'INDEN', '', '2022-01-05', 'anash herdiansyah', '', '');

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
  `editor` varchar(50) NOT NULL,
  `mgm` varchar(50) NOT NULL,
  `ket` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_smpmts`
--

CREATE TABLE `db_smpmts` (
  `id` int(11) NOT NULL,
  `npsn` varchar(10) NOT NULL,
  `lembaga` varchar(128) NOT NULL,
  `alamat` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `db_smpmts`
--

INSERT INTO `db_smpmts` (`id`, `npsn`, `lembaga`, `alamat`) VALUES
(11, ' 69977757', 'MTS AR RIYADH', 'KRAJAN SELATAN KERTONEGORO JENGGAWAH JEMBER'),
(12, ' 60728767', 'MTS DARUL HIKAM', 'JL. KEMBANG SORE No 87'),
(13, ' 69994801', 'MTs MAMBAUL HIDAYAH', 'Dusun Kebonsari Desa Tamansari'),
(14, ' 69994773', 'MTs NAHDLATUL ARIFIN', 'Jl.watu ulo kedungkaji sumberejo'),
(15, ' 69995127', 'MTs TAHFIDHUL QURAN NURUSSALAM', 'Jalan Majapahit Gang V'),
(16, ' 20581617', 'MTSS ABBASIYYAH', 'JLN.PAHLAWAN GG.ABBAS WULUHAN JEMBER'),
(17, ' 20581445', 'MTSS ADDIMYATHI', 'JL.R.PATAH NO.43 KRAJAN KARANGANYAR AMBULU JEMBER'),
(18, ' 20581443', 'MTSS AL - AZHAR', 'JL. RAUNG GG. AL-AZHAR GUMUK KERANG'),
(19, ' 69941489', 'MTSS AL - BAROKAH AN - NUR', 'Jl. Raung Klanceng Timur'),
(20, ' 20581482', 'MTSS AL - ISHLAH', 'JL. MATARAM NO. 7 RT. 18 RW. 02'),
(21, ' 20581449', 'MTSS AL AMIEN', 'Jl. K. Masduqi Kebonsari'),
(22, ' 20581441', 'MTSS AL FALAH', 'JL.ARGUPURO 28 DURENAN AJUNG'),
(23, ' 20581486', 'MTSS AL HAMIDI', 'JLN. KOTTA BLATER GG. V NO. 6 CURAHREJO CANGKRING'),
(24, ' 60727481', 'MTSS AL MAARIF', 'JL PAHLAWAN 127'),
(25, ' 20581481', 'MTSS AR - RAUDLAH', 'JL. WALISONGO NO. 05 SUKOSARI'),
(26, ' 20581442', 'MTSS AR-RIDLWAN PONPES DARUL ULUM', 'JL. MH. THAMRIN NO. 140 AJUNG'),
(27, ' 60728611', 'MTSS AS SHOBIER', 'JL TEMPUREJO NO. 54'),
(28, ' 20581609', 'MTSS BAITUL HIKMAH', 'JL. CUT NYA`DIEN NO. 2 TEMPUREJO'),
(29, ' 20581616', 'MTSS DARUL HIDAYAH', 'Jl. Sunan Bonang Pomo'),
(30, ' 20581444', 'MTSS DARUL HUDA', 'JL. KOTTA BLATER GANG MANGGA NO. 10 AMBULU'),
(31, ' 20581439', 'MTSS DARUN NAJAH', 'JL H.MOH NOER 63 ROWOINDAH - AJUNG'),
(32, ' 20581488', 'MTSS DARUSSALAM SRUNI', 'JL. K. KHUSNAN NO 4 SRUNI JENGGAWAH'),
(33, ' 20581440', 'MTSS FATHUS SALAFI', 'JL. MOH. THOHIR 48 LIMBUNGSARI AJUNG'),
(34, ' 20581611', 'MTSS HIDAYATUL MUBTADIIN', 'JL. KOTTA BLATER GG.III/160 SIDODADI'),
(35, ' 20581448', 'MTSS MA`ARIF AL ISLAH', 'JL. WATU ULO NO. 08 SUMBEREJO'),
(36, ' 20581446', 'MTSS MA`ARIF AMBULU', 'JL. KH. HASYIM ASYARI NO 4 LANGON AMBULU'),
(37, ' 20581619', 'MTSS MA`ARIF ANNUR', 'JL. KI HAJAR DEWANTARA NO. 70'),
(38, ' 60728766', 'MTSS MA`ARIF NU JENGGAWAH', 'JL. KH. WAHID HASYIM NO 18'),
(39, ' 20581485', 'MTSS MAFTAHUL HUDA', 'JL.SAHARA NO. 05 KERTONEGORO'),
(40, ' 20581483', 'MTSS MAMBAUL ULUM', 'JL. TEMPUREJO NO. 27'),
(41, ' 20581435', 'MTSS MIFTAHUL HUDA', 'JL. PONPES SALAFIYAH CURAHKATES KLOMPANGAN AJUNG JEMBER'),
(42, ' 20581447', 'MTSS MIFTAHUL HUDA', 'JL PAYANGAN BREGOH SUMBEREJO AMBULU JEMBER'),
(43, ' 20581437', 'MTSS MIFTAHUL ULUM', 'JL. R.S. PRAWIRO 01 WIROWONGSO'),
(44, ' 20581438', 'MTSS MIFTAHUL ULUM', 'PONDOKLABU KLOMPANGAN AJUNG'),
(45, ' 20581610', 'MTSS MIFTAHUL ULUM', 'JL.MARZUKI ZAENAB NO.205 CURAH TAKIR TEMPUREJO JEMBER'),
(46, ' 69883323', 'MTSS MIFTAHUL ULUM AT TAUFIQ', 'Jl. KH. Syamsul Arifin'),
(47, ' 20581621', 'MTSS NAHDLATUTH THALABAH', 'JL. KH. IMAM BUKHORI KESILIR WULUHAN JEMBER'),
(48, ' 20581618', 'MTSS NURUL ISLAM WULUHAN', 'JL. PB. SUDIRMAN NO. 133'),
(49, ' 60728765', 'MTSS SA AL FALAH', 'JL. H. SHOLIH NO. 01 KEPEL'),
(50, ' 20581450', 'MTSS SA BUSTANUT THOLABAH', 'JL. BRAWIJAYA NO. 15 PONTANG UTARA'),
(51, ' 20581612', 'MTSS SA MIFTAHUL ULUM AL-KHAIRIYAH', 'JL. KH. ABD. AZIS NO. 66 DUSUN KAUMAN'),
(52, ' 20581620', 'MTSS SA TAHSINUL KHULUQ', 'JL.PASAR KESILIR NO.12 KESILIR WULUHAN JEMBER'),
(53, ' 20581489', 'MTSS SYIRKAH SALAFIYAH', 'JL. A. YANI 164 PONDOKLALANG WONOJATI JENGGAWAH'),
(54, ' 20581484', 'MTSS TARBIYATUL HUDA', 'JL. KARTINI NO. 57 KEMUNINGSARI KIDUL JENGGAWAH - JEMBER'),
(55, ' 20581436', 'MTSS TRIBAKTI', 'JL.SEMERU NO.36 AJUNG JEMBER'),
(56, ' 70008580', 'MTSS UNGGULAN INAYATUR ROHMAN', 'JL. MENUR 68 DUSUN KRAJAN'),
(57, ' 20581487', 'MTSS WAHID HASYIM', 'JL. KOTTA BLATER NO. 77 DARUSSALAM JATIMULYO JENGGAWAH JEMBER'),
(58, ' 20523735', 'SMP 02 ISLAM 45', 'Jl. Watu Ulo No.112'),
(59, ' 20523737', 'SMP 06 DIPONEGORO', 'Jl. Pahlawan No 127 Wuluhan - Jember'),
(60, ' 20523738', 'SMP 07 MAARIF PERINTIS', 'Jl.kh.abd.rahman No.31'),
(61, ' 20523850', 'SMP 09 MAARIF NU AMBULU', 'Jl. Kamboja No 108'),
(62, ' 20567109', 'SMP ADZ DZIKIR', 'Jl. Yos Sudarso No. 08 Rowo Indah'),
(63, ' 69758985', 'SMP AINUL YAQIN', 'Jl. Ottista No. 13 Dusun Klanceng Ajung'),
(64, ' 20523782', 'SMP BUSTANUL ULUM', 'Jl. Seruni 03'),
(65, ' 20523784', 'SMP DAERAH', 'Jl Ki Hajar Dewantoro No.18'),
(66, ' 20574490', 'SMP Islam Alhikmah', 'Jl. PTPN X No. 83 Sumuran'),
(67, ' 20523791', 'SMP ISLAM AMBULU', 'Jalan Kedung Bunder No.64 Ambulu'),
(68, ' 20554185', 'SMP ISLAM DAERAH JENGGAWAH', 'Jl. PERUMNAS Wonojati 133 Jenggawah Jember'),
(69, ' 20523766', 'SMP ISLAM WALISONGO JENGGAWAH', 'Jl. Raya Ambulu No.65 Kertonegoro Jenggawah'),
(70, ' 20523767', 'SMP KARTIKA IV-6 AMBULU', 'Jl. Suyitman No. 125 Ambulu'),
(71, ' 20523944', 'SMP LAB JENGGAWAH', 'Jl. Diponegoro No. 3'),
(72, ' 20523775', 'SMP MAARIF 13 TEMPUREJO', 'Jl. Marzuki Zaenab No. 205'),
(73, ' 20554190', 'SMP MADINATUL ULUM', 'Jl. Tempurejo No 20 - 24 Cangkring'),
(74, ' 20523933', 'SMP MUHAMMADIYAH 11 WULUHAN', 'Jl. Pahlawan No. 303'),
(75, ' 20523935', 'SMP MUHAMMADIYAH 15 AMBULU', 'Jl. Candradimuka No.41 Ambulu Jember'),
(76, ' 20523911', 'SMP MUHAMMADIYAH 6 WULUHAN', 'Jl. Ambulu No. 5'),
(77, ' 20523912', 'SMP MUHAMMADIYAH 7 WULUHAN', 'Jl. A. Yani No 42 Tamansari Wuluhan'),
(78, ' 20523913', 'SMP MUHAMMADIYAH 9 WATUKEBO', 'Jl. Kotta Blater Km. 3 Watukebo,'),
(79, ' 20523917', 'SMP PGRI 1 TEMPUREJO', 'JL. Mojopahit No.58 Wonoasri'),
(80, ' 20554183', 'SMP PGRI 3 TEMPUREJO', 'Jl Bandealit No 5'),
(81, ' 20554314', 'SMP PGRI AMBULU', 'Jl Semeru 148 Tegalsari'),
(82, ' 20523938', 'SMP PGRI JENGGAWAH', 'Jl. Raya Kawi'),
(83, ' 20523955', 'SMP PGRI KESILIR', 'Jl Ambulu No 10 Kesilir'),
(84, ' 20554201', 'SMP PLUS AL AMIEN', 'JL. K. Masduki No.1'),
(85, ' 20549655', 'SMP PLUS AL ISLAH', 'Jl PTP Nusantara XII No 03 Curah Kendal'),
(86, ' 20568296', 'SMP Plus Al Munawaroh', 'Jln. Mojopahit Gang 2 No. 139 Kraton'),
(87, ' 20554199', 'SMP PLUS ASRAMA PEMBINA MASYARAKAT', 'Jl.Dewi Sartika No.50 Darussalam Jatimulyo'),
(88, ' 20554195', 'SMP PLUS DARUL HIKMAH', 'Cangkring Baru Jenggawah Jember Jatim'),
(89, ' 20555452', 'SMP PLUS DARUL HIKMAH II WULUHAN', 'Jl. Nogosari No, 04 Tanjungsari Glundengan Wuluhan'),
(90, ' 20555468', 'SMP PLUS SUNAN DRAJAT', 'Jl.sunan Drajat No.9'),
(91, ' 20567112', 'SMP PLUS ZAINUL ULUM', 'Klompangan'),
(92, ' 20555397', 'SMP S NAHDLATUTH THALABAH', 'Jalan KH. Imam Bukhori'),
(93, ' 20523919', 'SMP S PGRI 2 TEMPUREJO', 'Jl. PB. SUDIRMAN NO. 133'),
(94, ' 20554184', 'SMP SALAFIYAH MIFTAHUL HUDA', 'Jl. Kh Abdurrahman'),
(95, ' 20523858', 'SMPN 1 AJUNG', 'Jl. Semeru 141 Pancakarya'),
(96, ' 20523949', 'SMPN 1 AMBULU', 'Jln. Kotta Blater No. 05'),
(97, ' 20523866', 'SMPN 1 JENGGAWAH', 'Jl. Tempurejo No. 63 Jenggawah'),
(98, ' 20523852', 'SMPN 1 TEMPUREJO', 'Jl Padang Golf No. 2 Glantangan'),
(99, ' 20523882', 'SMPN 1 WULUHAN', 'Jl. Puger No. 290 Ampel Wuluhan'),
(100, ' 20549893', 'SMPN 2 AJUNG', 'Jl. Nusa Indah No 100'),
(101, ' 20523886', 'SMPN 2 AMBULU', 'Jl. Watu Ulo No. 57'),
(102, ' 20558461', 'SMPN 2 JENGGAWAH', 'Jl. Flamboyan'),
(103, ' 20523897', 'SMPN 2 TEMPUREJO', 'Jl. Sultan Agung 78 Sanenrejo'),
(104, ' 20523889', 'SMPN 2 WULUHAN', 'Jl. Kemuningsari Kidul 157'),
(105, ' 20583911', 'SMPN 3 AMBULU', 'Jalan Puger Gang I Sidomulyo'),
(106, ' 20548793', 'SMPN 3 TEMPUREJO', 'Jl. Bandealit No. 31 Kalicawang'),
(107, ' 20583906', 'SMPN 4 TEMPUREJO', 'JL CANGAK INDAH NO 81 AFD. TERATE PTPN XII KEBUN KOTTA BLATER'),
(108, ' 20554329', 'SMPS 08 MAARIF AMPEL', 'Jl. Kh. Zuhdi Zain No. 197 Kepel'),
(109, ' 69955458', 'SMPS AL - MUTHOHHIRIN', 'DESA KESILIR'),
(110, ' 69888400', 'SMPS AL BAITUR ROHIM', 'DUSUN CURAH BUNTU'),
(111, ' 69958431', 'SMPS AL BUKHORI', 'JL. KH ABDUL KARIM NO. 18'),
(112, ' 69827636', 'SMPS AL HIDAYAH', 'JL PESANTREN 10'),
(113, ' 69889043', 'SMPS AL MAUFI TEMPUREJO', 'JL KH ABD QUDDUS NO 105,DUSUN JATIREJO'),
(114, ' 70007655', 'SMPS DARUL MUTTAQIEN', 'Jl. Sulawesi No. 08 Dusun Purwojati RT 001 RW 012'),
(115, ' 69956793', 'SMPS DARUNNAJAH', 'DUSUN KRAJAN WETAN'),
(116, ' 69980128', 'SMPS DARUSSA`ADAH', 'JL. R.S PRAWIRO'),
(117, ' 20571628', 'SMPS Islam Terpadu Ibnu Sina Wuluhan', 'Wuluhan'),
(118, ' 69733856', 'SMPS NURUL ULUM', 'Jl. RS. Prawiro No.1A Ajung'),
(119, ' 69968458', 'SMPS NURUS SALAM WULUHAN', 'DUSUN TAMAN REJO RT/RW 02/02'),
(120, ' 69959817', 'SMPS NURUSSALAM AMBULU', 'JL. Imam Syafii No. 07 Krajan Lor'),
(121, ' 20523956', 'SMPS PGRI LOJEJER', 'Jl.Puskesmas No.02'),
(122, ' 69968889', 'SMPS PLUS ISTIQOMAH', 'DUSUN PASUNDAN'),
(123, ' 20549712', 'SMPS PLUS RAUDLATUT THOLABAH JENGGAWAH', 'Jl. Balung Kebonsadeng'),
(124, ' 69980381', 'SMPS PLUS ROYATUL ISLAM', 'JL. K.H. ZAINUDIN'),
(125, ' 20523953', 'SMPS PLUS WALISONGO', 'Jl. Curah Udang No. 5 Jember'),
(126, ' 69931821', 'SMPS SALAFIYAH SYAFI IYAH', 'JL. CENDRAWASIH NO. 39'),
(127, ' 69990043', 'SMPS UNGGULAN AL HIKMAH', 'JL. KENANGA NO 33-35'),
(128, ' 69956898', 'SMPS UNGGULAN ASTRA NAWA', 'Jl Payangan Sumberejo Ambulu');

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
  `echo` varchar(2) NOT NULL,
  `last` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `db_user_pendaftar`
--

INSERT INTO `db_user_pendaftar` (`id`, `nik`, `nama`, `email`, `telp`, `par`, `status`, `jabatan`, `echo`, `last`) VALUES
(4, '3198627361726123', 'anis nurbaningrum', 'anashd@gmail.com', '086235623243', 'MA', 'AKTIF', 'user', '1', '2022-01-14 19:58:40'),
(5, '3509120603900001', 'Mukhammad Yasin', 'achin.clink@gmail.com', '082141632876', 'MTS', 'AKTIF', 'user', '1', '2022-01-11 14:38:50'),
(7, '674567642324', 'anis bashwedan', 'anisa@yahoo.com', '081256565412', 'MTS', 'AKTIF', 'user', '1', '2022-01-01 23:00:10'),
(8, '24864548645', 'anash herdiansyah', 'usertest@gmail.com', '086234423243', 'MTS', 'AKTIF', 'user', '1', '2022-01-02 21:44:15'),
(9, '248645486453', 'anash herdiansyah', 'usersmk@gmail.com', '086234423243', 'SMK', 'AKTIF', 'user', '1', '2022-01-14 18:23:29'),
(10, '6745676423245645', 'anisa anis', 'anisa@yahoo.com', '086235623243', 'MTS', 'AKTIF', 'user', '1', '2022-01-14 19:50:58');

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
-- Indexes for table `db_panitia`
--
ALTER TABLE `db_panitia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_sdmi`
--
ALTER TABLE `db_sdmi`
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
-- Indexes for table `db_smpmts`
--
ALTER TABLE `db_smpmts`
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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `db_panitia`
--
ALTER TABLE `db_panitia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `db_sdmi`
--
ALTER TABLE `db_sdmi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1191;
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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `db_smpmts`
--
ALTER TABLE `db_smpmts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `db_user`
--
ALTER TABLE `db_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `db_user_pendaftar`
--
ALTER TABLE `db_user_pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
