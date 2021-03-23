-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 06:28 AM
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
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('pending','accept','decline') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `id_profile`, `nama_event`, `deskripsi_event`, `tanggal_event`, `foto`, `lokasi`, `jenis_event`, `update_at`, `created_at`, `status`) VALUES
(1, 1, 'Temu Kangen angkatan 18', 'Temu kangen angkatan 19 yang akan di selenggarakan guna membantu saudara kita yang lagi kesusahan dan mendapatkan bencana alam di sumatra dan sulawesi utara', '2021-03-02', 'unnamed.jpg', 'jombang', 'free', '2021-03-22 21:42:30', '0000-00-00 00:00:00', 'accept'),
(2, 1, 'Jumpa fans', 'Jumpa fans241', '2021-03-05', '', 'Malang', 'pay', '2021-03-22 21:44:35', '0000-00-00 00:00:00', 'accept');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id_forum` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `id_vacancy` int(11) NOT NULL,
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
-- Table structure for table `information_employee`
--

CREATE TABLE `information_employee` (
  `id_employee` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `jenis_kelamin` enum('l','p','','') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `no_telfon` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `no_induk` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information_employee`
--

INSERT INTO `information_employee` (`id_employee`, `id_profile`, `nama`, `email`, `jenis_kelamin`, `tanggal_lahir`, `tempat_lahir`, `no_telfon`, `alamat`, `updated_at`, `created_at`, `no_induk`) VALUES
(1, 1, 'Dwi Nur Cahyo', '', 'l', '2021-03-15', 'Malang', '089', 'JL.Perumahan Griyaasri blok', '2021-03-14 17:21:25', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `information_general`
--

CREATE TABLE `information_general` (
  `id_general` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `nama_informasi` varchar(100) NOT NULL,
  `deskripsi_informasi` varchar(255) NOT NULL,
  `status` enum('accept','pending','decline') NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `foto` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information_general`
--

INSERT INTO `information_general` (`id_general`, `id_profile`, `nama_informasi`, `deskripsi_informasi`, `status`, `update_at`, `created_at`, `foto`) VALUES
(1, 1, 'SBMPTN 2020', 'Informasi Perkuliahan tahun 2020212141', 'pending', '2021-03-22 20:19:24', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `information_student`
--

CREATE TABLE `information_student` (
  `id_student` int(11) NOT NULL,
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
-- Dumping data for table `information_student`
--

INSERT INTO `information_student` (`id_student`, `id_profile`, `nama`, `alamat`, `tanggal_lahir`, `tempat_lahir`, `jurusan`, `email`, `no_telfon`, `foto`, `nis`, `tahun_lulus`, `jenis_kelamin`, `verifikasi_alumni`, `update_at`, `created_at`) VALUES
(2, 4, 'Ika Wahyu Febriany', 'Jalan Jombang Ploso', '2021-02-16', 'Jombang', 'ipa', 'ika@gmail.com', '0547276223', 'produk3.jpg', '18317100321', 2019, 'perempuan', 'pengajuan', '2021-03-22 17:32:57', '0000-00-00 00:00:00'),
(4, 6, 'Aisyah Laduni', 'Jl Industri Barat No 25 Blimbing', '2000-02-26', 'Malang', 'ipa', 'aisyahladuni7@gmail.com', '08990307782', 'users-vector-icon-png_260862.jpg', '1868135063', 2015, 'perempuan', 'null', '2021-03-22 17:26:46', '0000-00-00 00:00:00'),
(5, 7, 'Adi Dharma', 'Jalan Jamrud 3 no 34 Pondok Permata Suci , Gresik', '2000-05-07', 'Gresik', 'ipa', 'slkpon@gmail.com', '087854253957', '', '1831710015', 2018, 'laki', 'null', '0000-00-00 00:00:00', '2021-03-22 17:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `job_vacancy`
--

CREATE TABLE `job_vacancy` (
  `id_vacancy` int(11) NOT NULL,
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
-- Dumping data for table `job_vacancy`
--

INSERT INTO `job_vacancy` (`id_vacancy`, `id_profile`, `nama_pekerjaan`, `alamat`, `deskripsi_pekerjaan`, `foto`, `update_at`, `created_at`, `status`) VALUES
(5, 1, 'Lowongan Kerja IT Flutter Developer', 'Gresik', 'Mampu bekerja dalam team dan tidak individualis, menguasai javascript dan bidang teknologi, pengalaman di bidang flutter 2 tahun tidak pernah membantah', '', '0000-00-00 00:00:00', '2021-03-22 18:48:19', 'pending');

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
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(4, '18317100321', '$2y$10$iszbCLmIncWzo2g5YDXkbu3iep3PNdReUu4aM2m8IeOTBTMJctG1e', 'siswa', '2021-03-19 08:17:42'),
(6, '1868135063', '$2y$10$XftRe54n9e4YkogdW/xI0.4tEOaHg0bvXvs0HyX6YbliuVMmj8Swy', 'siswa', '2021-03-20 05:39:51'),
(7, '1831710015', '$2y$10$poQCAmf2vOGMvDEPOvKSSuua//CtRLvecGyj1SD4uIHOAdaFt6iAm', 'siswa', '2021-03-22 17:31:30');

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
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `information_employee`
--
ALTER TABLE `information_employee`
  ADD PRIMARY KEY (`id_employee`);

--
-- Indexes for table `information_general`
--
ALTER TABLE `information_general`
  ADD PRIMARY KEY (`id_general`);

--
-- Indexes for table `information_student`
--
ALTER TABLE `information_student`
  ADD PRIMARY KEY (`id_student`);

--
-- Indexes for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  ADD PRIMARY KEY (`id_vacancy`);

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
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `information_employee`
--
ALTER TABLE `information_employee`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `information_general`
--
ALTER TABLE `information_general`
  MODIFY `id_general` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `information_student`
--
ALTER TABLE `information_student`
  MODIFY `id_student` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  MODIFY `id_vacancy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `setting_email`
--
ALTER TABLE `setting_email`
  MODIFY `id_email` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tracer_kerja`
--
ALTER TABLE `tracer_kerja`
  MODIFY `id_kerja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tracer_kuliah`
--
ALTER TABLE `tracer_kuliah`
  MODIFY `id_kuliah` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
