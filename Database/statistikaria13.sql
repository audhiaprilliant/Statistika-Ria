-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2018 at 10:05 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u4285823_statistikaria13`
--
-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(3) UNSIGNED ZEROFILL NOT NULL,
  `tanggal` date NOT NULL,
  `media` varchar(100) NOT NULL,
  `isi_berita` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kompetisi`
--

CREATE TABLE `kompetisi` (
  `no_urut` int(3) UNSIGNED ZEROFILL NOT NULL,
  `id_pendaftaran` varchar(20) NOT NULL,
  `no_peserta1` int(3) UNSIGNED ZEROFILL NOT NULL,
  `no_peserta2` int(3) UNSIGNED ZEROFILL NOT NULL,
  `kode_lomba` int(1) NOT NULL,
  `urutan_lomba` int(3) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kompetisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `no_peserta` int(3) UNSIGNED ZEROFILL NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `asal_univ` varchar(50) NOT NULL,
  `asal_daerah` varchar(50) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nim` varchar(30) NOT NULL,
  `file_ktm` varchar(100) NOT NULL,
  `file_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

-- --------------------------------------------------------

--
-- Table structure for table `peserta_ken`
--

CREATE TABLE `peserta_ken` (
  `no_lomba` varchar(15) NOT NULL,
  `status_pembayaran` tinyint(1) NOT NULL,
  `file_esai` varchar(50) NOT NULL,
  `bukti_bayar` varchar(50) NOT NULL,
  `id_upload` int(3) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta_ken`
--

-- --------------------------------------------------------

--
-- Table structure for table `peserta_kis`
--

CREATE TABLE `peserta_kis` (
  `no_lomba` varchar(15) NOT NULL,
  `status_pembayaran` tinyint(1) NOT NULL,
  `file_karya1` varchar(30) NOT NULL,
  `file_karya2` varchar(30) NOT NULL,
  `bukti_bayar` varchar(50) NOT NULL,
  `id_upload` int(3) UNSIGNED ZEROFILL NOT NULL,
  `jml_karya` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta_kis`
--

-- --------------------------------------------------------

--
-- Table structure for table `peserta_ksn`
--

CREATE TABLE `peserta_ksn` (
  `no_lomba` varchar(15) NOT NULL,
  `file_soal` varchar(30) NOT NULL,
  `file_jawaban` varchar(30) NOT NULL,
  `sandi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta_ksn`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `email` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `no_lomba` varchar(15) NOT NULL,
  `file_soal` varchar(30) NOT NULL,
  `sandi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `kompetisi`
--
ALTER TABLE `kompetisi`
  ADD PRIMARY KEY (`no_urut`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`no_peserta`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `peserta_ken`
--
ALTER TABLE `peserta_ken`
  ADD PRIMARY KEY (`no_lomba`);

--
-- Indexes for table `peserta_kis`
--
ALTER TABLE `peserta_kis`
  ADD PRIMARY KEY (`no_lomba`);

--
-- Indexes for table `peserta_ksn`
--
ALTER TABLE `peserta_ksn`
  ADD PRIMARY KEY (`no_lomba`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`no_lomba`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kompetisi`
--
ALTER TABLE `kompetisi`
  MODIFY `no_urut` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `no_peserta` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
