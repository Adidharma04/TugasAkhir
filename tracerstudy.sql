-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 12:46 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracerstudy`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `nama_event` varchar(100) NOT NULL,
  `deskripsi_event` varchar(255) NOT NULL,
  `tanggal_event` date NOT NULL,
  `foto` varchar(75) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `jenis_event` enum('pay','free') NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','accept','decline') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `id_profile`, `nama_event`, `deskripsi_event`, `tanggal_event`, `foto`, `lokasi`, `jenis_event`, `update_at`, `created_at`, `status`) VALUES
(5, 1, 'Smanis Campus Fair', 'Berbagi informasi mengenai dunia kampus', '2021-07-11', 'contohevent.JPG', 'Lapangan SMA Negeri Ploso', 'free', '2021-04-04 15:19:08', '2021-04-04 13:13:10', 'accept'),
(6, 1, 'Safari Campus ke 17', 'Berbagi Informasi mengenai kampus kampus yang ada di seluruh Indonesia dengan alumni', '2021-07-11', 'contohevent1.JPG', 'Parkiran SMA Negeri Ploso', 'free', '2021-04-13 07:29:00', '2021-04-04 13:37:41', 'accept'),
(7, 11, 'Smanis Melody Competition', 'Acara lomba musik di sma ploso', '2021-07-11', 'button.png', 'Lapangan Basket SMANIS', 'pay', '2021-04-13 07:30:43', '2021-04-06 08:57:57', 'pending'),
(9, 10, 'Lomba Basket', 'Lomba basket tingkat SMA seluruh jombang', '2021-05-12', 'unnamed1.png', 'Kodim', 'pay', '2021-04-13 09:09:33', '2021-04-13 09:09:14', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id_forum` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `id_loker` int(11) NOT NULL,
  `nama_forum` varchar(70) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_forum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_detail`
--

CREATE TABLE `forum_detail` (
  `id_detail_forum` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `id_forum` int(11) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `informasi_umum`
--

CREATE TABLE `informasi_umum` (
  `id_umum` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `nama_informasi` varchar(100) NOT NULL,
  `deskripsi_informasi` varchar(255) NOT NULL,
  `status` enum('accept','pending','decline') NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi_umum`
--

INSERT INTO `informasi_umum` (`id_umum`, `id_profile`, `nama_informasi`, `deskripsi_informasi`, `status`, `update_at`, `created_at`, `foto`) VALUES
(4, 1, 'SBMPTN 2021', 'Seleksi masuk perguruan tinggi Jalur SBMPTN', 'accept', '2021-04-04 14:47:44', '2021-04-04 13:28:27', 'sbm.jpg'),
(5, 1, 'SNMPN', 'Seleksi masuk Politeknik Negeri Jalur Raport', 'accept', '2021-04-13 07:11:04', '2021-04-04 13:29:00', 'snmpn.png'),
(6, 11, 'Pendaftaraan Bintara AD', 'Pendaftaran Bintara AD Tahun 2021, Gelombang Pertama', 'accept', '2021-04-13 07:10:32', '2021-04-06 08:59:51', 'download.png'),
(7, 11, 'Beasiswa PPA', 'Beasiswa siswa berprestasi untuk lulusan SMA dan mahasiswa', 'accept', '2021-04-13 07:10:40', '2021-04-10 12:32:59', 'eea5ade72af458384feae189bd53f439.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `id_loker` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `nama_pekerjaan` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `deskripsi_pekerjaan` varchar(255) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','accept','decline') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`id_loker`, `id_profile`, `nama_pekerjaan`, `alamat`, `deskripsi_pekerjaan`, `foto`, `update_at`, `created_at`, `status`) VALUES
(7, 11, 'Lowongan Kerja BUMN', 'Lowongan Kerja BUMN', 'Kementrian BUMN Buka Rekruitmen untuk lulusan SMA dan mahasiswa', 'contohloker1.JPG', '2021-04-13 08:03:19', '2021-04-04 13:39:01', 'accept'),
(8, 1, 'Pertamina', 'Cepu', 'Pertamina buka lowongan baru lulusan SMA', 'download_(2).png', '2021-04-13 08:02:45', '2021-04-13 08:02:04', 'accept');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `kritik` text NOT NULL,
  `saran` text NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_profile`, `kritik`, `saran`, `update_at`, `created_at`) VALUES
(5, 11, 'InsyaAllah sudah baik', 'Semoga semakin baik', '2021-04-06 08:58:48', '2021-04-04 13:42:18'),
(6, 10, 'Tracer study nya kurang menarik', 'semoga SMAN Ploso semakin baik', '0000-00-00 00:00:00', '2021-04-13 09:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `username` varchar(75) NOT NULL,
  `password` varchar(70) NOT NULL,
  `level` enum('staff','bk','siswa','alumni') NOT NULL,
  `last_logged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id_profile`, `username`, `password`, `level`, `last_logged`) VALUES
(1, 'superadmin', '$2y$10$rvcAAK.dXrHa0.2kimTKa.HBOAjAmuY4HORluZzVMOqyaaBEVARfS', 'staff', '2021-03-15 15:10:26'),
(2, 'bk', '$2y$10$rvcAAK.dXrHa0.2kimTKa.HBOAjAmuY4HORluZzVMOqyaaBEVARfS', 'bk', '2021-03-15 15:10:48'),
(8, '9998557523', '$2y$10$oypDWpXSMGCySYp30fnaS.DtPlzC0yQ4ipLSoGEvOzlcgM.PTXKzy', 'alumni', '2021-04-13 16:44:15'),
(9, '0009264886', '$2y$10$9Kh1HHpjnd6YO80ZvZa7gOFkO1RYhneysgF3crtqxie3qJvNmuh8e', 'alumni', '2021-04-13 14:37:36'),
(10, '0000099977', '$2y$10$iTx1eaaSaMZAs30invaS6ugH/pWicZcJpL52cjwjXAjEcOa3f0ryi', 'siswa', '2021-04-13 17:04:35'),
(11, '0008857884', '$2y$10$IbnX.cLGHYHmpy4T6eXzZ.kHCYCSUip.04IrtvE9oNsTddoikB70y', 'alumni', '2021-04-04 13:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `profil_pegawai`
--

CREATE TABLE `profil_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `jenis_kelamin` enum('l','p','','') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `no_telfon` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `no_induk` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil_pegawai`
--

INSERT INTO `profil_pegawai` (`id_pegawai`, `id_profile`, `nama`, `email`, `jenis_kelamin`, `tanggal_lahir`, `tempat_lahir`, `no_telfon`, `alamat`, `updated_at`, `created_at`, `no_induk`) VALUES
(1, 1, 'Dodik Yuniarto Nugroho', 'smanegeri_ploso@yahoo.co.id', 'l', '1985-03-15', 'Jombang', '085678767564', 'Jl Raya Ploso-Babat, No. 230, Ploso', '2021-04-04 13:17:18', '0000-00-00 00:00:00', ''),
(2, 2, 'Titik Romziati', 'titik@gmail.com', 'p', '1978-04-08', 'Jombang', '087676565878', 'Ploso', '0000-00-00 00:00:00', '2021-04-04 12:53:33', '196501282008012001');

-- --------------------------------------------------------

--
-- Table structure for table `profil_siswa`
--

CREATE TABLE `profil_siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `jurusan` enum('ipa','ips') NOT NULL,
  `email` varchar(150) NOT NULL,
  `no_telfon` varchar(15) NOT NULL,
  `foto` varchar(75) DEFAULT NULL,
  `nis` varchar(15) NOT NULL,
  `tahun_lulus` int(10) DEFAULT NULL,
  `jenis_kelamin` enum('laki','perempuan') NOT NULL,
  `verifikasi_alumni` enum('null','pengajuan','diterima') NOT NULL DEFAULT 'null',
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil_siswa`
--

INSERT INTO `profil_siswa` (`id_siswa`, `id_profile`, `nama`, `alamat`, `tanggal_lahir`, `tempat_lahir`, `jurusan`, `email`, `no_telfon`, `foto`, `nis`, `tahun_lulus`, `jenis_kelamin`, `verifikasi_alumni`, `update_at`, `created_at`) VALUES
(6, 8, 'ALDINO GILBERT TAMBUNAN', 'Jl. R.A. KARTINI No. 57, Kec. Sentul, Kab. Jombang', '1999-09-05', 'Surabaya', 'ipa', 'tambunan.aldinogilbert@yahoo.co.id', '085696773862', 'ALDINO_GILBERT.JPG', '9998557523', 2018, 'laki', 'diterima', '2021-04-15 21:46:16', '2021-04-04 13:20:39'),
(7, 9, 'ALIFIA BELQIS', 'Jl. Timur Terminal, Kec. Ploso, Kab. Jombang', '2000-05-05', 'Jombang', 'ipa', 'alifiabilqis05@gmail.com', '085604984787', 'ALIFIA_BELQIS.JPG', '0009264886', 2018, 'perempuan', 'diterima', '2021-04-13 14:37:36', '2021-04-04 13:22:38'),
(8, 10, 'AULIA ERIKASARI', 'Dsn. Kedung Glagah, Ds. Kedung Dowo, Kec. Ploso, Kab. jombang', '2000-06-25', 'Jombang', 'ipa', 'auliaericha33@gmail.com', '085732834690', 'AULIA_ERIKASARI.JPG', '0000099977', 2018, 'perempuan', 'null', '0000-00-00 00:00:00', '2021-04-04 13:24:16'),
(9, 11, 'IKA WAHYU FEBRIANY', 'Dsn. Kedung Glagah, Ds. Kedung Dowo, Kec. Ploso, Kab. jombang', '2000-02-17', 'Jombang', 'ipa', 'ikawahyujoe87@gmail.com', '085733209701', 'IKA_WAHYU_F.JPG', '0008857884', 2018, 'perempuan', 'null', '2021-04-13 16:29:54', '2021-04-04 13:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `setting_email`
--

CREATE TABLE `setting_email` (
  `id_email` int(11) NOT NULL,
  `email_host` varchar(50) NOT NULL,
  `port_number` varchar(10) NOT NULL,
  `security` enum('ssl','tls') NOT NULL,
  `account` varchar(75) NOT NULL,
  `password` varchar(75) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tracer_kerja`
--

CREATE TABLE `tracer_kerja` (
  `id_kerja` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `nama_perusahaan` varchar(70) NOT NULL,
  `jenis_perusahaan` varchar(70) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tahun_masuk` date NOT NULL,
  `alamat_perusahaan` varchar(100) NOT NULL,
  `tahun_keluar` date DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracer_kerja`
--

INSERT INTO `tracer_kerja` (`id_kerja`, `id_profile`, `nama_perusahaan`, `jenis_perusahaan`, `jabatan`, `tahun_masuk`, `alamat_perusahaan`, `tahun_keluar`, `status`, `update_at`, `created_at`) VALUES
(1, 11, 'Bank BTN', 'BUMN', 'Teller', '2019-04-01', 'Jl. Soekarno Hatta, Malang', '0000-00-00', 'active', '2021-04-10 12:29:47', '2021-04-10 12:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `tracer_kuliah`
--

CREATE TABLE `tracer_kuliah` (
  `id_kuliah` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `nama_kampus` varchar(100) NOT NULL,
  `program_studi` varchar(50) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `tahun_masuk` int(10) NOT NULL,
  `tahun_lulus` int(10) NOT NULL,
  `jalur_penerimaan` enum('snmptn','sbmptn','snmpn','sbmpn','mandiri','ikatan_dinas','kedinasan') NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracer_kuliah`
--

INSERT INTO `tracer_kuliah` (`id_kuliah`, `id_profile`, `nama_kampus`, `program_studi`, `jurusan`, `tahun_masuk`, `tahun_lulus`, `jalur_penerimaan`, `update_at`, `created_at`) VALUES
(1, 11, 'Politeknik Negeri Malang', 'D3 Akuntansi Manajemen', 'Tata Niaga', 2014, 2017, 'snmpn', '0000-00-00 00:00:00', '2021-04-10 12:16:41'),
(2, 10, 'Poltekes Malang', 'Kebidanan', 'Analisis', 2014, 2018, 'snmpn', '0000-00-00 00:00:00', '2021-04-13 08:59:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_forum`);

--
-- Indexes for table `forum_detail`
--
ALTER TABLE `forum_detail`
  ADD PRIMARY KEY (`id_detail_forum`);

--
-- Indexes for table `informasi_umum`
--
ALTER TABLE `informasi_umum`
  ADD PRIMARY KEY (`id_umum`);

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id_loker`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `profil_pegawai`
--
ALTER TABLE `profil_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `profil_siswa`
--
ALTER TABLE `profil_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `setting_email`
--
ALTER TABLE `setting_email`
  ADD PRIMARY KEY (`id_email`);

--
-- Indexes for table `tracer_kerja`
--
ALTER TABLE `tracer_kerja`
  ADD PRIMARY KEY (`id_kerja`);

--
-- Indexes for table `tracer_kuliah`
--
ALTER TABLE `tracer_kuliah`
  ADD PRIMARY KEY (`id_kuliah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id_forum` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_detail`
--
ALTER TABLE `forum_detail`
  MODIFY `id_detail_forum` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `informasi_umum`
--
ALTER TABLE `informasi_umum`
  MODIFY `id_umum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `id_loker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `profil_pegawai`
--
ALTER TABLE `profil_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profil_siswa`
--
ALTER TABLE `profil_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `setting_email`
--
ALTER TABLE `setting_email`
  MODIFY `id_email` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tracer_kerja`
--
ALTER TABLE `tracer_kerja`
  MODIFY `id_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tracer_kuliah`
--
ALTER TABLE `tracer_kuliah`
  MODIFY `id_kuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
