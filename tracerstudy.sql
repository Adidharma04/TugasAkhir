-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 01:03 AM
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
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','accept','decline') NOT NULL,
  `status_event` enum('berlangsung','kadaluarsa') NOT NULL,
  `pesan_ditolak` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `id_profile`, `nama_event`, `deskripsi_event`, `tanggal_event`, `foto`, `lokasi`, `update_at`, `created_at`, `status`, `status_event`, `pesan_ditolak`) VALUES
(5, 45, 'Smanis Campus Fair', 'Event ini untuk berbagi informasi mengenai kampus', '2021-06-17', 'contohevent2.JPG', 'Lapangan Basket SMANIS', '2021-05-25 23:00:49', '2021-05-25 22:52:22', 'accept', 'berlangsung', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id_forum` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `id_topik` int(11) NOT NULL,
  `nama_forum` varchar(70) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_forum` date NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id_forum`, `id_profile`, `id_topik`, `nama_forum`, `deskripsi`, `tanggal_forum`, `foto`) VALUES
(12, 1, 3, 'Penerbangan lion air', 'Lowongan kerja lion', '2021-05-08', 'img11.PNG'),
(13, 1, 2, 'Beasiswa PPA', 'Beasiswa untuk semuanya', '2021-05-08', ''),
(14, 2, 4, 'Ini forum nyobak guis', 'ya eyaa sichhhh', '2021-05-12', ''),
(15, 11, 4, 'Alumni Angkatan 2018', 'Untuk alumni angkatan 2018 akan diadakan reuni', '0000-00-00', '5f52e79196f04.png');

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

--
-- Dumping data for table `forum_detail`
--

INSERT INTO `forum_detail` (`id_detail_forum`, `id_profile`, `id_forum`, `notes`, `created_at`) VALUES
(24, 2, 14, 'ya eya lah boskuuuww', '2021-05-10 13:56:47'),
(25, 1, 13, 'fsdgsgevesvev', '2021-05-11 15:43:34'),
(26, 1, 13, 'dvsexAD', '2021-05-12 06:07:42'),
(27, 1, 13, 'dvve', '2021-05-12 06:50:17'),
(28, 2, 13, 'cvv', '2021-05-12 06:50:38'),
(30, 11, 14, 'ccccccccs', '2021-05-18 12:04:28'),
(31, 11, 12, 'Bagus', '2021-05-21 01:51:42'),
(32, 11, 12, 'Membantu', '2021-05-21 01:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `forum_topik`
--

CREATE TABLE `forum_topik` (
  `id_topik` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_topik`
--

INSERT INTO `forum_topik` (`id_topik`, `nama`, `created_at`) VALUES
(1, 'Informasi Kuliah', '2021-04-24 04:47:37'),
(2, 'Beasiswa', '2021-04-24 04:50:11'),
(3, 'Informasi Kerja', '2021-04-26 17:18:42'),
(4, 'Event', '2021-05-01 02:49:17');

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
  `foto` varchar(75) DEFAULT NULL,
  `pesan_ditolak` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi_umum`
--

INSERT INTO `informasi_umum` (`id_umum`, `id_profile`, `nama_informasi`, `deskripsi_informasi`, `status`, `update_at`, `created_at`, `foto`, `pesan_ditolak`) VALUES
(11, 45, 'Info SBMPTN', 'Info pendaftaran SBMPTN untuk siswa kelas 12', 'accept', '2021-05-25 23:00:59', '2021-05-25 22:58:12', 'sbm1.jpg', NULL);

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
  `status` enum('pending','accept','decline') NOT NULL,
  `pesan_ditolak` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`id_loker`, `id_profile`, `nama_pekerjaan`, `alamat`, `deskripsi_pekerjaan`, `foto`, `update_at`, `created_at`, `status`, `pesan_ditolak`) VALUES
(12, 45, 'BUMN', 'Jombang', 'Perusahaan BUMN buka lowongan pekerjaan', 'contohloker11.JPG', '2021-05-25 23:01:09', '2021-05-25 23:00:11', 'accept', NULL);

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
(5, 11, 'InsyaAllah sudah baik', 'Semoga lebih banyak informasi', '2021-05-21 01:45:49', '2021-04-04 13:42:18'),
(6, 10, 'ghss', 'bbzbzbzbzbz', '2021-05-12 06:17:28', '2021-04-13 09:10:01'),
(7, 45, 'Informasi yang diberikan kurang banyak', 'Semoga lebih banyak informasi', '0000-00-00 00:00:00', '2021-05-25 22:57:34');

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
(1, 'superadmin', '$2y$10$rvcAAK.dXrHa0.2kimTKa.HBOAjAmuY4HORluZzVMOqyaaBEVARfS', 'staff', '2021-05-10 14:39:20'),
(17, 'gurubk', '$2y$10$rvcAAK.dXrHa0.2kimTKa.HBOAjAmuY4HORluZzVMOqyaaBEVARfS', 'bk', '2021-05-25 13:37:45'),
(18, '9998557523', '$2y$10$qo5mAYVNaln.Dm51omzYLe1c5xqjDske5pevbfGNM.gAEdn4lijCa', 'siswa', '2021-05-25 04:02:15'),
(19, '0009264886', '$2y$10$t.O3uglJGY/tr1v3u.Dm1ehz1uKvRmQRxqoNO9Vwma779r1bYaEc.', 'siswa', '2021-05-25 04:04:16'),
(20, '0000099977', '$2y$10$QH0Xt.gixy9ceGPSNRSnKO77iZa8JPbmSSXDTlazwxH3XgyOqgvzK', 'siswa', '2021-05-25 04:06:41'),
(21, '0008094032', '$2y$10$fhEfki0GSVps60sVWw5NDei9YDyPGFgjSZkKD2B3YKe/DPVxo1cGO', 'siswa', '2021-05-25 04:08:39'),
(22, '9990865752', '$2y$10$Hqzgi3VYC5rpipOlCpazb.nCn//ZaTYQCRU5fTgXKdTOPRHPA4AMq', 'siswa', '2021-05-25 04:10:51'),
(23, '0008857743', '$2y$10$HC58E88yQVpW7cqwVY3CKuu/dadR8DoPD3vWN01M4MPYW14/RKX3O', 'siswa', '2021-05-25 04:12:42'),
(24, '0004897835', '$2y$10$KlWmM9AANfoKCwn6T42C8eHWXcHZ3HZsCg7esvDS6QAAnz5vGEE0m', 'siswa', '2021-05-25 04:17:43'),
(25, '9990865758', '$2y$10$rK/.p9y.UDrtWcdtyTpIEOdQoqVlm9Qwx5au9dI968Dd54KRMk45e', 'siswa', '2021-05-25 04:19:34'),
(26, '0007319253', '$2y$10$/HUp.M0dGnQN6aW7wsAmgeC5X0R3MP4DzZphelHXxxzlEgxTgdnvm', 'siswa', '2021-05-25 04:21:37'),
(27, '0007318483', '$2y$10$mvfuSDgASXNjv37cPlDA9uV00nWjqI139A8xB1jFpHDdK8vT.bPau', 'siswa', '2021-05-25 04:23:41'),
(28, '9998557801', '$2y$10$1WVtRGZH.Gt1SDwZ8S6aJ.sMqfXuvAHdo91FIaAnhu174Jhim3KV.', 'alumni', '2021-05-25 05:21:27'),
(29, '9998531148', '$2y$10$w7sEh9n/brJcaFGXzdVLq.h.YLXz4wiNNh8ShrVZkJOV/DnbR5B7q', 'alumni', '2021-05-25 05:21:31'),
(30, '9990943533', '$2y$10$L6SI8wcphuovpHMbOZgViumgO8wjODM9ccdy6mkSg4x1Ceet0ECSq', 'alumni', '2021-05-25 05:21:34'),
(31, '9988158804', '$2y$10$joy74.eGygL3y4VwY0ppcOxkmqAV2Ucz3I1BWYkoqhvNNc6iKNWni', 'alumni', '2021-05-25 05:21:39'),
(32, '9998555530', '$2y$10$..h.YAnai1GMwUfH.z3hgO0MuKMb1Ha4WK2GrG1nm5zi8BakoKIuq', 'alumni', '2021-05-25 05:21:43'),
(33, '9998557525', '$2y$10$PDCRTHr9vLq6sUrF2gz7eOE2DYcdKMPgajIJpSm31zd7XEA1xiCIS', 'alumni', '2021-05-25 05:21:49'),
(34, '9998576821', '$2y$10$gB8Cmlh54574Dsbgz2JxceCyfRUqCEOZwlgLoGxq5a/LKf7L.Oag6', 'alumni', '2021-05-25 05:21:53'),
(35, '9998575978', '$2y$10$UjTlxxcnurnpktjwPpZ.0e6Eae/fuVLCl2Ohpa/KlIzO43r5bz8TG', 'alumni', '2021-05-25 05:21:56'),
(36, '9999374519', '$2y$10$lWwWAsCjlZiB.pYluL1ks.3HhQ.Yk8V14vfyRsixNvhkhsRy7Ff4S', 'alumni', '2021-05-25 05:22:00'),
(37, '9998576652', '$2y$10$lWb5nF.bBgZNfucFrvpNfevk5n90D.bEt/qCo9xQXckszi2qkFrBm', 'alumni', '2021-05-25 05:22:05'),
(38, '9988158813', '$2y$10$b4u1YNRTaCv9xo.PIpHzyO3vb9eor1TQH56Su06v72jgiVgvzGdly', 'siswa', '2021-05-25 13:18:40'),
(39, '9998557684', '$2y$10$7usOi9ZoX/j0xyqsPrLqKuAMJ6pESHMpm.hZVB63.gRhWapRmYX2y', 'siswa', '2021-05-25 13:20:22'),
(40, '9988134119', '$2y$10$FHFIO3fSxEGBAdD60ak30uE/.udcu5mzJavaXx8SIWGICtC9apLjK', 'siswa', '2021-05-25 13:26:09'),
(41, '9993837322', '$2y$10$JBcGcx1mxXTcCEPg4fvM0.1jQzWv0vGWnLNGnvDYZb2HOJJqU.2yW', 'siswa', '2021-05-25 13:25:54'),
(42, '0008858195', '$2y$10$hdQ59ULhdkZL63deS3A8eeiNWEONAiUcu4OsrSalcdUiRp7LgQzbi', 'siswa', '2021-05-25 13:29:20'),
(43, '0007310124', '$2y$10$p87p92R6kevQfxPGaBspae08TVzzCJjrES.QH2z0WyGuJv40nuQbi', 'siswa', '2021-05-25 13:31:19'),
(44, '9998531025', '$2y$10$U2mWUhd6NrMKFzxJAWCWZ.YR96PIJT8pxCXIgqtrpZYdu2whU5Qqy', 'siswa', '2021-05-25 13:33:39'),
(45, '0008857884', '$2y$10$JD/jscECnw801io8lFao/.HLJ8yZ2g2XUmpD5krw/bdIFD0jZZ3TC', 'alumni', '2021-05-25 13:38:12');

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
(1, 1, 'Superadmin', 'smanegeri_ploso@yahoo.co.id', 'l', '1985-03-15', 'Jombang', '085678767564', 'Jl Raya Ploso-Babat, No. 230, Ploso', '2021-05-25 03:50:58', '0000-00-00 00:00:00', ''),
(4, 17, 'Titik Romziati', 'smanistracerstudy@gmail.com', 'p', '1960-03-25', 'Jombang', '085730301065', 'Sentul, Kec. Tembelang, Kab.Jombang', '0000-00-00 00:00:00', '2021-05-25 03:56:22', '196501282008012001');

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pesan_ditolak` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil_siswa`
--

INSERT INTO `profil_siswa` (`id_siswa`, `id_profile`, `nama`, `alamat`, `tanggal_lahir`, `tempat_lahir`, `jurusan`, `email`, `no_telfon`, `foto`, `nis`, `tahun_lulus`, `jenis_kelamin`, `verifikasi_alumni`, `update_at`, `created_at`, `pesan_ditolak`) VALUES
(14, 18, 'ALDINO GILBERT TAMBUNAN', 'Jl. R.A. KARTINI No. 57, Sentul, Kec. Tembelang, Kab.Jombang', '1999-09-05', 'Surabaya', 'ipa', 'tambunan.aldinogilbert@yahoo.co.id', '085696773862', '9998557523.JPG', '9998557523', 2018, 'laki', 'null', '2021-05-25 04:25:55', '2021-05-25 04:02:15', ''),
(15, 19, 'ALIFIA BELQIS', 'Jl. Timur Terminal, Losari, Kec. Ploso', '2000-06-25', 'Jombang', 'ipa', 'alifiabilqis05@gmail.com', '085604984787', '0009264886.JPG', '0009264886', 2018, 'perempuan', 'null', '2021-05-25 04:25:49', '2021-05-25 04:04:16', ''),
(16, 20, 'AULIA ERIKASARI', 'Dsn. Kedung Glagah, Ds. Kedung Dowo, Kec. Ploso, Kab. jombang', '2000-06-25', 'Jombang', 'ipa', 'ikawf1702@gmail.com', '085732834690', '0000099977.JPG', '0000099977', 2018, 'perempuan', 'null', '2021-05-25 23:02:44', '2021-05-25 04:06:41', ''),
(17, 21, 'AYU PUJI  NINGSIH', 'Perum Sambong Indah, Sambong Dukuh, Jombang', '2000-03-07', 'Jombang', 'ipa', 'ayupuji_ningsih@yahoo.co', '085896012950', '0008094032.JPG', '0008094032', 2018, 'perempuan', 'null', '2021-05-25 04:25:44', '2021-05-25 04:08:39', ''),
(18, 22, 'DHARUL JAHNAH', 'Sambong Permai Q/12, Sambong Dukuh, Jombang', '1999-12-07', 'Jombang', 'ipa', 'dharuldj@gmail.com', '082230342354', '9990865752.JPG', '9990865752', 2018, 'perempuan', 'null', '2021-05-25 04:25:39', '2021-05-25 04:10:51', ''),
(19, 23, 'DODY EKO PRASTYO', 'Dsn. Mojoyanti, Jatibanjar, Kec. Ploso', '2000-06-10', 'Jombang', 'ipa', 'dody.ekoprastyo@gmail.com', '085706233858', '0008857743.JPG', '0008857743', 2018, 'laki', 'null', '2021-05-25 04:25:33', '2021-05-25 04:12:42', ''),
(20, 24, 'DWI AGUSTIN PURNANING', 'Dsn. Balongrejo, Kebonagung, Kec.Ploso', '2000-08-30', 'Jombang', 'ipa', 'twookielf@yahoo.com', '085645977430', '0004897835.JPG', '0004897835', 2018, 'perempuan', 'null', '2021-05-25 04:25:29', '2021-05-25 04:17:43', ''),
(21, 25, 'DWI RANDI RAMADHANI', 'Sambong Permai Blok Q. 06, Sambong Dukuh, Kec. Jombang', '1999-12-14', 'Jombang', 'ipa', 'Rramadhani11@yahoo.com', '082332535694', '9990865758.JPG', '9990865758', 2018, 'laki', 'null', '2021-05-25 04:25:26', '2021-05-25 04:19:34', ''),
(22, 26, 'ENIK STIYO WATI', 'Dsn. Klampisan, Tondowulan, Kec. Plandaan', '2000-05-23', 'Jombang', 'ipa', 'enikstiyowati@gmail.com', '085748583981', '0007319253.JPG', '0007319253', 2018, 'perempuan', 'null', '2021-05-25 04:25:22', '2021-05-25 04:21:37', ''),
(23, 27, 'FAJAR RAMADHAN', 'Ngulaan, Darurejo, Kec. Plandaan', '2000-08-30', 'Jombang', 'ipa', 'fajarrama1630@gmail.com', '081233290337', '0007318483.JPG', '0007318483', 2018, 'laki', 'null', '0000-00-00 00:00:00', '2021-05-25 04:23:41', ''),
(24, 28, 'ANDI YUSUF HIDAYATULLAH', 'Jln. Sigojoyo,  Tembelang, Jombang', '1999-05-29', 'Jombang', 'ipa', 'ayuhanest@gmail.com', '085733597318', '9998557801.JPG', '9998557801', 2017, 'laki', 'diterima', '2021-05-25 05:09:38', '2021-05-25 04:30:53', ''),
(25, 29, 'ANI WAHYUNI', 'Balong, Tanjung Wadung, Kabuh', '1999-06-26', 'Jombang', 'ipa', 'aniwahyuni260699@gmail.com', '085244364154', '9998531148.JPG', '9998531148', 2017, 'perempuan', 'diterima', '2021-05-25 05:09:30', '2021-05-25 04:33:21', ''),
(26, 30, 'ANISAH NOVI USMAMI', 'Lengkong, Jatigedong, Ploso', '1999-11-16', 'Jombang', 'ipa', 'anisahnoviusmami@gmail.com', '085707662531', '9990943533.JPG', '9990943533', 2017, 'perempuan', 'diterima', '2021-05-25 05:09:25', '2021-05-25 04:36:12', ''),
(27, 31, 'ARUM BIL MAUIDHOTIL HASANAH', 'Ds. Pulorejo, Kec. Tembelang, Kab. Jombang', '1998-10-29', 'Jombang', 'ipa', 'arumhasanah35@gmail.com', '085706737025', '9988158804.JPG', '9988158804', 2017, 'perempuan', 'diterima', '2021-05-25 05:09:19', '2021-05-25 04:39:07', ''),
(28, 32, 'BAGUS BISRI SAMSURI', 'Konto, Tembelang, Jombang', '2000-08-07', 'Jombang', 'ipa', 'bagusbisri@gmail.com', '089637680943', '9998555530.JPG', '9998555530', 2017, 'laki', 'diterima', '2021-05-25 05:09:16', '2021-05-25 04:40:35', ''),
(29, 33, 'DANI TRI INDRIATI', 'Jln. Gajahmada, Sentul, Tembelang, Jombang', '1999-07-18', 'Jombang', 'ipa', 'danitri.indri18@gmail.com', '085645022095', '9998557525.JPG', '9998557525', 2017, 'perempuan', 'diterima', '2021-05-25 05:09:12', '2021-05-25 04:43:42', ''),
(30, 34, 'DWI LISNA SEPTIYA TANTRI', 'Ds. Sumberteguh, Kec. Kudu, Kab. Jombang', '1999-09-30', 'Jombang', 'ipa', 'dwilisna067@gmail.com', '085606457931', '9998576821.JPG', '9998576821', 2017, 'perempuan', 'diterima', '2021-05-25 05:09:08', '2021-05-25 04:45:08', ''),
(31, 35, 'EDDO WAHYU RIZKY MULYAWAN', 'Ds. Banjardowo, Kec. Kabuh, Kab. Jombang', '1999-08-23', 'Jombang', 'ipa', 'eddowahyu354.ewr@gmail.com', '085707811413', '9998575978.JPG', '9998575978', 2017, 'laki', 'diterima', '2021-05-25 05:09:03', '2021-05-25 04:46:32', ''),
(32, 36, 'ENDAH ANGGRAENI', 'Ds. Sumberaji, Kec. Kabuh, Kab. Jombang', '1999-09-12', 'Jombang', 'ipa', 'anggraeniendah5@gmail.com', '081332805523', '9999374519.JPG', '9999374519', 2017, 'perempuan', 'diterima', '2021-05-25 05:08:59', '2021-05-25 04:47:52', ''),
(33, 37, 'ERNI DWI SUSANTI', 'Ds. Sumberteguh, Kec. Kudu, Kab. Jombang', '1999-04-09', 'Jombang', 'ipa', 'ernids892@gmail.com', '085708621409', '9998576652.JPG', '9998576652', 2017, 'perempuan', 'diterima', '2021-05-25 05:08:55', '2021-05-25 05:08:31', ''),
(34, 38, 'EVITASARI NURDAYANTI', 'Jl. DR Sutomo, Rejoso Pinggir, Kec. Tembelang', '1998-04-15', 'Jombang', 'ipa', 'evitasarinurdayanti98@gmail.com', '081331848045', '9988158813.JPG', '9988158813', 2017, 'perempuan', 'null', '0000-00-00 00:00:00', '2021-05-25 13:18:40', ''),
(35, 39, 'FITRIANA SEKARNING TYAS', 'Ds. Sentul, Kec. Tembelang, Kab. Jombang', '1999-01-21', 'Singkawang', 'ipa', 'fitrianast21@gmail.com', '085606835192', '9998557684.JPG', '9998557684', 2017, 'perempuan', 'null', '0000-00-00 00:00:00', '2021-05-25 13:20:22', ''),
(36, 40, 'HANAFI AMBAS', 'Ds. Purisemanding, Kec. Plandaan, Kab. jombang', '1998-03-15', 'Jombang', 'ipa', 'ambasse032@gmail.com', '085749403075', '9988134119.JPG', '9988134119', 2017, 'laki', 'null', '2021-05-25 13:26:09', '2021-05-25 13:21:58', ''),
(37, 41, 'HISYAM NUR AYASYI', 'Ds. Dukuharum, Kec. Megaluh, Kab. Jombang', '1999-05-16', 'Jombang', 'ipa', 'ayasyihisyamnur@gmail.com', '082272463252', '9993837322.JPG', '9993837322', 2017, 'laki', 'null', '0000-00-00 00:00:00', '2021-05-25 13:25:54', ''),
(38, 42, 'FATHIKHATU\' ABDATUN NAFIYYAH', 'Dsn. Blole Timur,  Ploso, Kab. Jombang', '2000-01-23', 'Jombang', 'ipa', 'fathikhatunafiyah.fan@gmail.com', '085730827508', '0008858195.JPG', '0008858195', 2018, 'perempuan', 'null', '0000-00-00 00:00:00', '2021-05-25 13:29:20', ''),
(39, 43, 'FITRIA MELIYANA', 'Dsn. Kedung, Kedungrejo, Kec. Megaluh', '2000-01-12', 'Jombang', 'ipa', 'fitriameliyana1201@gmail.com', '085745918734', '0007310124.JPG', '0007310124', 2018, 'perempuan', 'null', '0000-00-00 00:00:00', '2021-05-25 13:31:19', ''),
(40, 44, 'GERY FERNADI', 'Dsn. Bulu Lowo, Ds. Purisemaanding, Kec. Plandaan, Kab. Jombang', '1999-07-31', 'Jombang', 'ipa', 'miasjery@gmail.com', '085748154027', '9998531025.JPG', '9998531025', 2018, 'laki', 'null', '0000-00-00 00:00:00', '2021-05-25 13:33:39', ''),
(41, 45, 'IKA WAHYU FEBRIANY', 'Dsn. Kedung Glagah, Ds. Kedungdowo, Kec. Ploso', '2000-02-17', 'Jombang', 'ipa', 'ikawahyujoe87@gmail.com', '085733209701', '0008857884.JPG', '0008857884', 2018, 'perempuan', 'diterima', '2021-05-25 13:38:12', '2021-05-25 13:34:56', '');

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
  `tahun_masuk` int(4) NOT NULL,
  `alamat_perusahaan` varchar(100) NOT NULL,
  `tahun_keluar` int(4) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracer_kerja`
--

INSERT INTO `tracer_kerja` (`id_kerja`, `id_profile`, `nama_perusahaan`, `jenis_perusahaan`, `jabatan`, `tahun_masuk`, `alamat_perusahaan`, `tahun_keluar`, `status`, `update_at`, `created_at`) VALUES
(4, 28, 'TNI AL', 'Kedinasan', 'Abdi Negara', 2020, 'Surabaya', 0, 'active', '2021-05-25 14:05:22', '2021-05-25 13:46:59');

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
(6, 45, 'Politeknik Negeri Malang', 'D3 Manajemen Informatika', 'Teknologi Informasi', 2018, 2021, 'snmpn', '0000-00-00 00:00:00', '2021-05-25 13:42:13'),
(7, 31, 'Politeknik Negeri Banyuwangi', 'D4 Manajemen Bisnis Pariwisata', 'Manajemen', 2017, 2021, 'sbmpn', '2021-05-25 14:14:21', '2021-05-25 14:12:11'),
(8, 33, 'Universitas Airlangga', 'S1 Biologi', 'Fakultas Sains dan Teknologi', 2017, 2021, 'mandiri', '0000-00-00 00:00:00', '2021-05-25 14:16:35'),
(9, 35, 'Politeknik Negeri Jember', 'D4 Teknik Energi Terbarukan', 'Teknik', 2017, 2021, 'snmpn', '0000-00-00 00:00:00', '2021-05-25 14:18:52'),
(10, 36, 'Institut Teknologi Surabaya', 'D4 Teknik Sipil', 'Teknik Infrastruktur Sipil', 2017, 2021, 'mandiri', '0000-00-00 00:00:00', '2021-05-25 14:20:43'),
(11, 37, 'Politeknik Negeri Banyuwangi', 'D3 Teknik Sipil', 'Teknik Sipil', 2017, 2020, 'snmpn', '0000-00-00 00:00:00', '2021-05-25 14:23:40');

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
-- Indexes for table `forum_topik`
--
ALTER TABLE `forum_topik`
  ADD PRIMARY KEY (`id_topik`);

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
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `forum_detail`
--
ALTER TABLE `forum_detail`
  MODIFY `id_detail_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `forum_topik`
--
ALTER TABLE `forum_topik`
  MODIFY `id_topik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `informasi_umum`
--
ALTER TABLE `informasi_umum`
  MODIFY `id_umum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `id_loker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `profil_pegawai`
--
ALTER TABLE `profil_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profil_siswa`
--
ALTER TABLE `profil_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `setting_email`
--
ALTER TABLE `setting_email`
  MODIFY `id_email` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tracer_kerja`
--
ALTER TABLE `tracer_kerja`
  MODIFY `id_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tracer_kuliah`
--
ALTER TABLE `tracer_kuliah`
  MODIFY `id_kuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
