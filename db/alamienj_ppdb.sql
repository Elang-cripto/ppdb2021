-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2022 at 11:03 AM
-- Server version: 5.7.37
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `db_info`
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
-- Dumping data for table `db_info`
--

INSERT INTO `db_info` (`id`, `tanggal`, `waktu`, `user`, `jabatan`, `status`) VALUES
(7, '2022-01-14', '06:22:59', 'Yasin', 'admin', '<p>Update Hari Ini :</p><ul><li>Pendaftaran Jalur Prestasi Telah Dibuka<br>Silahkan isi formulir dari hari ini tanggal 15 Januari - 15 Februari 2022</li></ul>');

-- --------------------------------------------------------

--
-- Table structure for table `db_ma`
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
-- Dumping data for table `db_ma`
--

INSERT INTO `db_ma` (`id`, `id_enc`, `no_reg`, `nisn`, `nama`, `jk`, `tmp_lahir`, `tgl_lahir`, `nik`, `agama`, `alamat`, `rt`, `rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `propinsi`, `sts_tinggal`, `jns_tinggal`, `alat_trans`, `telp`, `email`, `anak_ke`, `jml_sdr`, `nm_ayh`, `tlahir_ayh`, `lahir_ayh`, `pend_ayh`, `kerja_ayh`, `hasil_ayh`, `nik_ayh`, `nm_ibu`, `tlahir_ibu`, `lahir_ibu`, `pend_ibu`, `kerja_ibu`, `hasil_ibu`, `nik_ibu`, `nm_wl`, `lahir_wl`, `tlahir_wl`, `pend_wl`, `kerja_wl`, `hasil_wl`, `nik_wl`, `no_kk`, `no_un`, `no_skhun`, `no_ijazah`, `no_kps`, `no_kip`, `no_kis`, `no_pkh`, `beasiswa`, `kelas_7`, `kelas_8`, `kelas_9`, `kelas_aktf`, `kelas_dig`, `skl_asal`, `almt_skl`, `jns_masuk`, `tgl_masuk`, `ket_out`, `tgl_out`, `alasan_out`, `nosrt_out`, `status`, `jalur`, `foto`, `progres`, `editor`, `mgm`, `ket`) VALUES
(1, 'db9a9bc3a2a3a1c746faa9157fdbce37', '265-220128-001', '0078306611', 'SAYU MAGFIRAH ROHMI', 'P', 'PALU', '2007-02-02', '7201134202070001', 'L', 'JL TADULAKO', '006', '007', 'TADULAKO', 'SUMBER AGUNG', 'NUHON', 'BANGGAI', 'SULAWESI TENGAH', 'Lainnya', 'AGA PUTRI', 'Jalan kaki', '082139469317', 'sayumaghfir@gmail.com', '03', '03', 'AHMAD SAIPI', 'PALU', '1968-07-01', 'SD Sederajad', 'Wiraswasta', 'Rp. 2,000,000 - Rp. 4,999,999', '7201130107680031', 'SITI KHADIJAH', 'PALU', '1975-12-18', 'SD Sederajad', '', 'Rp. 1,000,000 - Rp. 1,999,999', '7201135812750001', '', '0000-00-00', '', '', '', 'Rp. 1,000,000 - Rp. 1,999,999', '', '7201130602080196', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MTSS AL AMIEN', '', '', '0000-00-00', '', '0000-00-00', '', '', 'RESIDU', 'PRESTASI', '', '2022-01-29 13:00:52', 'MOH ZAMRONI', '', '-- Pilih --'),
(2, 'e145b298f0101e0e6f2180cc4aaa8a31', '265-220129-002', '0072460590', 'FAHMI EKA NUR HIDAYATI', 'P', 'JEMBER', '2007-03-27', '3509126703070002', 'L', 'BREGOH', '002', '030', 'BREGOH', 'SUMBEREJO', 'AMBULU', 'JEMBER', 'JAWA TIMUR', 'Lainnya', 'Salaf Putri', 'Jalan kaki', '085331149096', 'fahmi@gmail.com', '02', '02', 'MISDI', 'JEMBER', '1966-02-08', 'SD Sederajad', 'Petani', 'Rp. 1,000,000 - Rp. 1,999,999', '3509120802660001', 'INSIYAH', 'JEMBER', '1970-02-13', 'SD Sederajad', '', 'Rp. 500,000 - Rp. 999,999', '3509125302700001', '', '0000-00-00', '', '', '', 'Rp. 500,000 - Rp. 999,999', '', '3509120409056462', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MTSS AL AMIEN', '', '', '0000-00-00', '', '0000-00-00', '', '', 'RESIDU', 'PRESTASI', '', '2022-01-29 13:01:34', 'ARIF NURDIANSYAH', '', '-- Pilih --'),
(3, 'e5eff28347f84890ad652339e6962902', '265-220129-003', '0062914143', 'NUFUS FAIQOTUL MASRUROH', 'P', 'JEMBER', '2006-12-22', '3509186212060001', 'L', 'DUSUN KRAJAN II', '002', '006', 'DUSUN KRAJAN II', 'SANENREJO', 'TEMPUREJO', 'JEMBER', 'JAWA TIMUR', 'Rumah Orang Tua', 'Salaf Putri', 'Jalan kaki', '085708779884', 'muhzamroni1605@gmail.com', '2', '', 'JUMARI', 'Jember', '1976-07-11', 'SD Sederajad', 'Wiraswasta', 'Rp. 1,000,000 - Rp. 1,999,999', '3509181107750005', 'SITI AISAH', 'Jember', '1977-05-26', 'SD Sederajad', '', 'Rp. 500,000 - Rp. 999,999', '3509186606770004', '', '0000-00-00', '', '', '', 'Rp. 500,000 - Rp. 999,999', '', '3509180702110139', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MTSS AL AMIEN', '', '', '0000-00-00', '', '0000-00-00', '', '', 'RESIDU', 'REGULER', '', '2022-01-29 12:42:40', 'ARIF NURDIANSYAH', '', '-- Pilih --'),
(4, '39b2bb357bc0b53cb61af14e54ec4e18', '265-220129-004', '0078657070', 'ADE NAYLA SABRINA', 'P', 'JEMBER', '2007-07-03', '3509124307070003', 'L', 'KEBONSARI', '002', '005', 'KEBONSARI', 'SABRANG', 'AMBULU', 'JEMBER', 'JAWA TIMUR', 'Lainnya', 'Rusunnawa', 'Jalan kaki', '+6282245673829', 'adenaila@gmail.com', '01', '02', 'ADAM DJAUHARI', 'JEMBER', '1978-05-23', 'SMP Sederajad', 'Wiraswasta', 'Rp. 2,000,000 - Rp. 4,999,999', '3509122305730002', 'YUYUN NUR FAIDAH', 'JEMBER', '1985-05-25', 'SMP Sederajad', '', 'Rp. 1,000,000 - Rp. 1,999,999', '3509126505850003', '', '0000-00-00', '', '', '', 'Rp. 1,000,000 - Rp. 1,999,999', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MTSS AL AMIEN', '', '', '0000-00-00', '', '0000-00-00', '', '', 'RESIDU', 'PRESTASI', '', '2022-01-29 13:01:24', 'MOH ZAMRONI', '', '-- Pilih --'),
(5, '99b018a592775ba961497468bfba3a23', '265-220129-005', '0067891265', 'SITI KHARIROTUZ ZAKIYA', 'P', 'JEMBER', '2007-12-01', '3509124112070004', 'L', 'LANGON AMBULU', '003', '002', 'LANGON', 'ANDONGSARI', 'AMBULU', 'JEMBER', 'JAWA TIMUR', 'Lainnya', 'AGA PUTRI', 'Jalan kaki', '085607446013', 'kharir@gmail.com', '03', '03', 'NUR SALAM', 'JEMBER', '1961-11-28', 'SMP Sederajad', 'Petani', 'Rp. 2,000,000 - Rp. 4,999,999', '3509122811610001', 'SITI AMINAH', 'JEMBER', '1975-05-05', 'SD Sederajad', '', 'Rp. 1,000,000 - Rp. 1,999,999', '3509124504750001', '', '0000-00-00', '', '', '', 'Rp. 1,000,000 - Rp. 1,999,999', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MTSS AL AMIEN', '', '', '0000-00-00', '', '0000-00-00', '', '', 'RESIDU', 'REGULER', '', '2022-01-29 13:16:52', 'ARIF NURDIANSYAH', '', '-- Pilih --');

-- --------------------------------------------------------

--
-- Table structure for table `db_mts`
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
-- Dumping data for table `db_mts`
--

INSERT INTO `db_mts` (`id`, `id_enc`, `no_reg`, `nisn`, `nama`, `jk`, `tmp_lahir`, `tgl_lahir`, `nik`, `agama`, `alamat`, `rt`, `rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `propinsi`, `sts_tinggal`, `jns_tinggal`, `alat_trans`, `telp`, `email`, `anak_ke`, `jml_sdr`, `nm_ayh`, `tlahir_ayh`, `lahir_ayh`, `pend_ayh`, `kerja_ayh`, `hasil_ayh`, `nik_ayh`, `nm_ibu`, `tlahir_ibu`, `lahir_ibu`, `pend_ibu`, `kerja_ibu`, `hasil_ibu`, `nik_ibu`, `nm_wl`, `lahir_wl`, `tlahir_wl`, `pend_wl`, `kerja_wl`, `hasil_wl`, `nik_wl`, `no_kk`, `no_un`, `no_skhun`, `no_ijazah`, `no_kps`, `no_kip`, `no_kis`, `no_pkh`, `beasiswa`, `kelas_7`, `kelas_8`, `kelas_9`, `kelas_aktf`, `kelas_dig`, `skl_asal`, `almt_skl`, `jns_masuk`, `tgl_masuk`, `ket_out`, `tgl_out`, `alasan_out`, `nosrt_out`, `status`, `jalur`, `foto`, `progres`, `editor`, `mgm`, `ket`) VALUES
(1, '0d971a5f26719c3e72b35405c1312ff6', '265-220125-001', '3099945758', 'HIKMATUR ROFIQOH', 'P', 'JEMBER', '2009-12-18', '3509185812090001', 'L', '', '005', '002', 'KRATON', 'WONOASRI', 'TEMPUREJO', 'JEMBER', 'JAWA TIMUR', 'Rumah Orang Tua', 'Dusun', 'Sepeda motor', '082337798387', '', '02', '', 'AHMAD BASORI', 'JEMBER', '1980-07-01', 'SMP Sederajad', 'Petani', 'Rp. 500,000 - Rp. 999,999', '3509180107800406', 'WINARSIH', 'JEMBER', '1980-08-14', 'SD Sederajad', '', 'Tidak Berpenghasilan', '3509185408800002', 'AHMAD BASORI', '1980-07-01', 'JEMBER', 'SMP Sederajad', '', 'Tidak Berpenghasilan', '3509180107800406', '3509180412100006', '', '', '', '', '35091709009923', '0000689942068', '6032989847890335', '', '', '', '', '', '', 'MIS MUHAMMADIYAH 03 WONOASRI', '', '', '0000-00-00', '', '0000-00-00', '', '', 'RESIDU', 'PRESTASI', '', '2022-01-29 15:29:23', 'MUHAMAD ZAMRONI', '', ''),
(2, '300235da5036c99acecd50dbc0308365', '265-220131-002', '0102761242', 'ANIHLAH ZUHANIT ZAMZAMI', 'P', 'JEMBER', '2010-03-02', '3509114203100001', 'INDEN', 'DUSUN GRINTINGAN', '3', '12', 'GRINTINGAN', 'LOJEJER', 'WULUHAN', 'JEMBER', 'JAWA TIMUR', 'Rumah Orang Tua', '-- Pilih --', 'Lainnya', '082227220035', 'aa@gmail.com', '1', '2', 'ALI MUSTOFA', 'JEMBER', '1985-07-01', 'SD Sederajad', 'Petani', 'Rp. 500,000 - Rp. 999,999', '3509110107850522', 'DEWI FATMAWATI', 'JEMBER', '1988-12-10', 'SD Sederajad', 'Petani', 'Rp. 500,000 - Rp. 999,999', '3509115012880006', '', '0000-00-00', '', '-- Pilih --', '-- Pilih --', '-- Pilih --', '', '3509110209057022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', 'RESIDU', 'REGULER', '', '2022-01-31 11:03:23', 'Moh.Faris Abdillah', '', 'Sains');

-- --------------------------------------------------------

--
-- Table structure for table `db_panitia`
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
-- Dumping data for table `db_panitia`
--

INSERT INTO `db_panitia` (`id`, `codex`, `nama`, `username`, `password`, `jabatan`, `status`, `last`) VALUES
(1, 'c4ca4238a0b923820dcc509a6f75849b', 'ARIF NURDIANSYAH', 'admin', 'panitia2022', 'admin', '1', '2022-01-31 10:32:33'),
(2, 'c81e728d9d4c2f636f067f89cc14862c', 'MUHAMAD ZAMRONI', 'zamroni', 'istanadomba', 'admin', '1', '2022-01-29 14:52:06'),
(3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'ABDUL HAMID', 'adminmts', 'panitia2022', 'admin', '1', '2022-01-31 10:21:53'),
(4, 'a87ff679a2f3e71d9181a67b7542122c', 'Rio Aldinas', 'rioaldinas', 'alamien99', 'panitia', '1', '2022-01-31 10:30:01'),
(5, 'e4da3b7fbbce2345d7772b0674a318d5', 'wiwin lutfiani', 'wiwinlutfiani', 'alamien99', 'panitia', '1', '2022-01-29 14:36:04'),
(6, '1679091c5a880faf6fb5e6087eb1b2dc', 'novan indarto', 'novanindarto', 'alamien99', 'panitia', '1', '2022-01-29 14:50:50'),
(7, '8f14e45fceea167a5a36dedd4bea2543', 'ratna juwita', 'ratnajuwita', 'alamien99', 'panitia', '1', '2022-01-29 14:38:19'),
(8, 'c9f0f895fb98ab9159f51fd0297e236d', 'muawanah', 'muawanah', 'alamien99', 'panitia', '1', '2022-01-29 14:42:38'),
(9, '45c48cce2e2d7fbdea1afc51c7c6ad26', 'elifita', 'elifita', 'alamien99', 'panitia', '1', '2022-01-29 14:43:07'),
(10, 'd3d9446802a44259755d38e6d163e820', 'siti nurhayati', 'sitinurhayati', 'alamien99', 'panitia', '1', '2022-01-29 14:43:48'),
(11, '6512bd43d9caa6e02c990b0a82652dca', 'mia faadah', 'miafaadah', 'alamien99', 'panitia', '1', '2022-01-29 14:45:42'),
(12, 'c20ad4d76fe97759aa27a0c99bff6710', 'Lutfiatul Rohmatin', 'lutfiaturrohmatin', 'alamien99', 'panitia', '1', '2022-01-29 14:47:09'),
(13, 'c51ce410c124a10e0db5e4b97fc2af39', 'hanif muqorrobin', 'hanbin', 'alamien99', 'panitia', '1', '2022-01-29 14:47:54'),
(14, 'aab3238922bcc25a6f606eb525ffdc56', 'Irfan Bayu Anggara', 'irfanbayuanggara', 'alamien99', 'panitia', '1', '2022-01-31 10:27:40'),
(15, '9bf31c7ff062936a96d3c8bd1f8f2ff3', 'Farid Wajdi', 'faridwajdi', 'alamien99', 'panitia', '1', '2022-01-29 14:50:09'),
(16, 'c74d97b01eae257e44aa9d5bade97baf', 'Miftahul Ulum', 'miftahululum', 'alamien99', 'panitia', '1', '2022-01-29 14:58:10'),
(17, '70efdf2ec9b086079795c442636b55fb', 'Siti Alfiyah', 'sitialfiyah', 'alamien99', 'panitia', '1', '2022-01-29 14:59:25'),
(18, '6f4922f45568161a8cdf4ad2299f6d23', 'Arif Sujarwo', 'arifsujarwo', 'alamien99', 'panitia', '1', '2022-01-31 10:32:39'),
(19, '1f0e3dad99908345f7439f8ffabdffc4', 'Moh. Asrofi', 'mohasrofi', 'alamien99', 'panitia', '1', '2022-01-29 15:00:11'),
(20, '98f13708210194c475687be6106a3b84', 'Takeb Irbani', 'takebirbani', 'alamien99', 'panitia', '1', '2022-01-31 10:33:02'),
(21, '3c59dc048e8850243be8079a5c74d079', 'Himmatul Aliyah', 'himmatulaliyah', 'alamien99', 'panitia', '1', '2022-01-29 15:01:19'),
(22, 'b6d767d2f8ed5d21a44b0e5886680cb9', 'muyassaroh', 'muyassaroh', 'alamien99', 'panitia', '1', '2022-01-29 15:02:04'),
(23, '37693cfc748049e45d87b8c7d8b9aacd', 'Nuris Sabilatul Munfida', 'nurissabila', 'alamien99', 'panitia', '1', '2022-01-29 15:02:53'),
(24, '1ff1de774005f8da13f42943881c655f', 'Moh. Ali Mas\'ud', 'mohalimasud', 'alamien99', 'panitia', '1', '2022-01-29 15:03:39'),
(25, '8e296a067a37563370ded05f5a3bf3ec', 'Reni Sulistyani', 'renisulistyani', 'alamien99', 'panitia', '1', '2022-01-29 15:04:18'),
(26, '4e732ced3463d06de0ca9a15b6153677', 'Muhammad Fathur Rohim', 'ato', 'alamien99', 'panitia', '1', '2022-01-31 10:58:53'),
(27, '02e74f10e0327ad868d138f2b4fdd6f0', 'Uswatun Khoiriyah', 'uswatunkhoiriyah', 'alamien99', 'panitia', '1', '2022-01-29 15:07:24'),
(28, '33e75ff09dd601bbe69f351039152189', 'Muhammad David Akhyar', 'ata', 'alamien99', 'panitia', '1', '2022-01-31 10:31:21'),
(29, '6ea9ab1baa0efb9e19094440c317e21b', 'Luqman Hakim', 'coki', 'alamien99', 'panitia', '1', '2022-01-31 11:03:35'),
(30, '34173cb38f07f89ddbebc2ac9128303f', 'Dian Suryawati', 'diansuryawati', 'alamien99', 'panitia', '1', '2022-01-29 15:11:09'),
(31, 'c16a5320fa475530d9583c34fd356ef5', 'Robit El Muttaqin', 'robitelmuttaqin', 'alamien99', 'panitia', '1', '2022-01-31 10:25:05'),
(32, '6364d3f0f495b6ab9dcf8d3b5c6e0b01', 'Slamet Eko Syahroni', 'zlems', 'alamien99', 'panitia', '1', '2022-01-29 15:13:36'),
(33, '182be0c5cdcd5072bb1864cdee4d3d6e', 'Robith Rifqi', 'robithrifqi', 'alamien99', 'panitia', '1', '2022-01-29 15:14:09'),
(34, 'e369853df766fa44e1ed0ff613f563bd', 'Annisa Fitriani', 'hanbin2', 'alamien99', 'panitia', '1', '2022-01-29 15:14:25'),
(35, '1c383cd30b7c298ab50293adfecb7b18', 'Muhammad Noor Sidiq', 'noorsidiq', 'alamien99', 'panitia', '1', '2022-01-31 10:34:33'),
(36, '19ca14e7ea6328a42e0eb13d585e4c22', 'Muslikah', 'muslikah', 'alamien99', 'panitia', '1', '2022-01-29 15:15:30'),
(37, 'a5bfc9e07964f8dddeb95fc584cd965d', 'Putri Arini', 'putriarini', 'alamien99', 'panitia', '1', '2022-01-29 15:16:20'),
(38, 'a5771bce93e200c36f7cd9dfd0e5deaa', 'Ihwan Nur Huda', 'ihwannurhuda', 'alamien99', 'panitia', '1', '2022-01-31 10:30:48'),
(39, 'd67d8ab4f4c10bf22aa353e27879133c', 'Zulfa Maghfiroh', 'ijonk', 'alamien99', 'panitia', '1', '2022-01-29 15:19:05'),
(40, 'd645920e395fedad7bbbed0eca3fe2e0', 'Siti Khoirun Nisa\'', 'nisa', 'alamien99', 'panitia', '1', '2022-01-29 15:19:39'),
(41, '3416a75f4cea9109507cacd8e2f2aefc', 'Huri Sayyidatur Robi\'ah', 'robik', 'alamien99', 'panitia', '1', '2022-01-29 15:20:13'),
(42, 'a1d0c6e83f027327d8461063f4ac58a6', 'Moh.Faris Abdillah', 'faris', 'alamien99', 'panitia', '1', '2022-01-31 10:53:01');

-- --------------------------------------------------------

--
-- Table structure for table `db_sdmi`
--

CREATE TABLE `db_sdmi` (
  `id` int(11) NOT NULL,
  `npsn` varchar(10) NOT NULL,
  `lembaga` varchar(128) NOT NULL,
  `alamat` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_sdmi`
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
-- Table structure for table `db_setting`
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
-- Dumping data for table `db_setting`
--

INSERT INTO `db_setting` (`id`, `tapel`, `semester`, `register`, `pengumuman`, `jalur`) VALUES
(1, '2021-2022', 'Ganjil', '0', '                                                                                                                                                                                                                                                                                                                                <p style=\"text-align: center; \"><font color=\"#0000ff\"><b>Wali kelas mohon segera melakukan Validasi Data dan mengajukan Bukti Verval ke Kepala Sekolah/Madrasah masing-masing.</b></font></p><p style=\"text-align: center; \"><font color=\"#0000ff\"><b>Update Versi Selesai dilakukan mohon bapak ibu cek kembali data yang telah di perbaiki.</b></font></p><p style=\"text-align: center; \"><u>SalamSatuDataAlAmien</u></p>                                                                                                                                                                                                                                                                             ', 'REGULER');

-- --------------------------------------------------------

--
-- Table structure for table `db_smk`
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

-- --------------------------------------------------------

--
-- Table structure for table `db_smp`
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

--
-- Dumping data for table `db_smp`
--

INSERT INTO `db_smp` (`id`, `id_enc`, `no_reg`, `nisn`, `nama`, `jk`, `tmp_lahir`, `tgl_lahir`, `nik`, `agama`, `alamat`, `rt`, `rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `propinsi`, `sts_tinggal`, `jns_tinggal`, `alat_trans`, `telp`, `email`, `anak_ke`, `jml_sdr`, `nm_ayh`, `tlahir_ayh`, `lahir_ayh`, `pend_ayh`, `kerja_ayh`, `hasil_ayh`, `nik_ayh`, `nm_ibu`, `tlahir_ibu`, `lahir_ibu`, `pend_ibu`, `kerja_ibu`, `hasil_ibu`, `nik_ibu`, `nm_wl`, `lahir_wl`, `tlahir_wl`, `pend_wl`, `kerja_wl`, `hasil_wl`, `nik_wl`, `no_kk`, `no_un`, `no_skhun`, `no_ijazah`, `no_kps`, `no_kip`, `no_kis`, `no_pkh`, `beasiswa`, `kelas_7`, `kelas_8`, `kelas_9`, `kelas_aktf`, `kelas_dig`, `skl_asal`, `almt_skl`, `jns_masuk`, `tgl_masuk`, `ket_out`, `tgl_out`, `alasan_out`, `nosrt_out`, `status`, `jalur`, `foto`, `progres`, `editor`, `mgm`, `ket`) VALUES
(1, 'e7d4008ae409df65e7454c9ed00fa06c', '265-220131-001', '0', 'MAULANA ACHMAD RIFA\'I', 'L', 'JEMBER', '2009-05-01', '3509120105090003', 'L', 'GUNUNG IJEN', '002', '010', 'TEGALSARI', 'TEGALSARI', 'AMBULU', 'JEMBER', 'JAWA TIMUR', 'Rumah Orang Tua', 'Dusun', 'Sepeda', '082228180976', 'maulana@gmail.com', '02', '05', 'SUJOKO', 'JEMBER', '1973-01-03', 'SD Sederajad', 'Wiraswasta', 'Rp. 1,000,000 - Rp. 1,999,999', '3509120301730006', 'YULIANTI', 'JEMBER', '1981-07-10', 'SMA Sederajad', '', 'Rp. 500,000 - Rp. 999,999', '3509125007810002', '', '0000-00-00', '', '', '', 'Rp. 500,000 - Rp. 999,999', '', '3509120609050424', '', '', '', '', '', '', '', '', '', '', '', '', '', 'SDN TEGALSARI 02', '', '', '0000-00-00', '', '0000-00-00', '', '', 'RESIDU', 'REGULER', '', '2022-01-31', 'ARIF NURDIANSYAH', '', '-- Pilih --'),
(2, '729fd59c1fb063f40374d41974fa75b2', '265-220131-002', '0', 'MOHAMMAD WILDAN PRATAMA', 'L', 'LUMAJANG', '2009-10-01', '3508100110090005', 'L', 'JL. WATU ULO', '002', '010', 'TEGALSARI', 'TEGALSARI', 'AMBULU', 'JEMBER', 'JAWA TIMUR', 'Rumah Orang Tua', 'Dusun', 'Sepeda', '082228180976', 'wildan@gmail.com', '00', '01', 'WIGNYO', 'LUMAJANG', '1983-09-03', 'SD Sederajad', 'Wiraswasta', 'Rp. 1,000,000 - Rp. 1,999,999', '3508100403830009', 'DIAN AGUSTIN', 'JEMBER', '1987-08-06', 'SMP Sederajad', '', 'Rp. 500,000 - Rp. 999,999', '3508104608870005', '', '0000-00-00', '', '', '', 'Rp. 500,000 - Rp. 999,999', '', '3509121406190006', '', '', '', '', '', '', '', '', '', '', '', '', '', 'SDN TEGALSARI 02', '', '', '0000-00-00', '', '0000-00-00', '', '', 'RESIDU', 'PRESTASI', '', '2022-01-31', 'ARIF NURDIANSYAH', '', '-- Pilih --');

-- --------------------------------------------------------

--
-- Table structure for table `db_smpmts`
--

CREATE TABLE `db_smpmts` (
  `id` int(11) NOT NULL,
  `npsn` varchar(10) NOT NULL,
  `lembaga` varchar(128) NOT NULL,
  `alamat` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_smpmts`
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
-- Table structure for table `db_user_pendaftar`
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
-- Dumping data for table `db_user_pendaftar`
--

INSERT INTO `db_user_pendaftar` (`id`, `nik`, `nama`, `email`, `telp`, `par`, `status`, `jabatan`, `echo`, `last`) VALUES
(1, '3509185812090001', 'HIKMATUR ROFIQOH', 'hikmaturrofiqoh2@gmail.com', '082337798387', 'MTS', 'AKTIF', 'user', '1', '2022-01-25 10:51:51'),
(2, '7201134202070001', 'SAYU MAGFIRAH ROHMI', 'sayumaghfir@gmail.com', '082139469317', 'MA', 'NON AKTIF', 'user', '1', '2022-01-28 09:36:53'),
(3, '3509126703070002', 'FAHMI EKA NUR HIDAYATI', 'fahmi@gmail.com', '085331149096', 'MA', 'NON AKTIF', 'user', '1', '2022-01-29 10:14:38'),
(4, '3509186212060001', 'NUFUS FAIQOTUL MASRUROH', 'muhzamroni1605@gmail.com', '085708779884', 'MA', 'NON AKTIF', 'user', '1', '2022-01-29 12:23:56'),
(5, '3509124307070003', 'ADE NAYLA SABRINA', 'adenaila@gmail.com', '+6282245673829', 'MA', 'NON AKTIF', 'user', '1', '2022-01-29 12:33:20'),
(6, '3509124112070004', 'SITI KHARIROTUZ ZAKIYA', 'kharir@gmail.com', '085607446013', 'MA', 'NON AKTIF', 'user', '1', '2022-01-29 13:16:14'),
(7, '3509120105090003', 'MAULANA ACHMAD RIFA\'I', 'maulana@gmail.com', '082228180976', 'SMP', 'NON AKTIF', 'user', '1', '2022-01-31 09:00:22'),
(8, '3508100110090005', 'MOHAMMAD WILDAN PRATAMA', 'wildan@gmail.com', '082228180976', 'SMP', 'NON AKTIF', 'user', '1', '2022-01-31 09:14:23'),
(9, '3509114203100001', 'ANIHLAH ZUHANIT ZAMZAMI', 'aa@gmail.com', '082227220035', 'MTS', 'NON AKTIF', 'user', '1', '2022-01-31 11:03:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_info`
--
ALTER TABLE `db_info`
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
-- AUTO_INCREMENT for table `db_ma`
--
ALTER TABLE `db_ma`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `db_mts`
--
ALTER TABLE `db_mts`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `db_panitia`
--
ALTER TABLE `db_panitia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_smp`
--
ALTER TABLE `db_smp`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `db_smpmts`
--
ALTER TABLE `db_smpmts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `db_user_pendaftar`
--
ALTER TABLE `db_user_pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
