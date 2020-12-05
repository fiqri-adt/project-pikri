-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2020 at 12:09 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `denom_kertas`
--

CREATE TABLE `denom_kertas` (
  `id_denom_kertas` int(12) NOT NULL,
  `denom_kertas` bigint(12) NOT NULL,
  `rp1` int(12) NOT NULL,
  `rp2` int(12) NOT NULL,
  `rp3` int(12) NOT NULL,
  `rp4` int(12) NOT NULL,
  `rp5` int(12) NOT NULL,
  `rp6` int(12) NOT NULL,
  `inpak` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `denom_kertas`
--

INSERT INTO `denom_kertas` (`id_denom_kertas`, `denom_kertas`, `rp1`, `rp2`, `rp3`, `rp4`, `rp5`, `rp6`, `inpak`, `created_at`, `updated_at`) VALUES
(1, 100000, 20, 28, 5, 3, 8, -23, 0, '0000-00-00 00:00:00', '2020-11-23 14:23:59'),
(2, 50000, 2, 14, 1, 6, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 20000, 0, 3, 0, 3, 4, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 10000, 1, 13, 0, 4, 4, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 5000, 1, 8, 3, 3, 9, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 2000, 1, 2, 2, 2, 3, 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 1000, 1, 1, 0, 0, 0, 1, 0, '2020-11-23 14:45:46', '2020-11-23 15:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `denom_koin`
--

CREATE TABLE `denom_koin` (
  `id_denom_koin` int(12) NOT NULL,
  `denom_koin` bigint(12) NOT NULL,
  `rp1` int(12) NOT NULL,
  `rp2` int(12) NOT NULL,
  `rp3` int(12) NOT NULL,
  `rp4` int(12) NOT NULL,
  `rp5` int(12) NOT NULL,
  `rp6` int(12) NOT NULL,
  `inpak` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `denom_koin`
--

INSERT INTO `denom_koin` (`id_denom_koin`, `denom_koin`, `rp1`, `rp2`, `rp3`, `rp4`, `rp5`, `rp6`, `inpak`, `created_at`, `updated_at`) VALUES
(1, 1000, 2, 2, 0, 0, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 500, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 200, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 100, 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2020-11-23 14:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `divisi`) VALUES
(1, 'operasional'),
(2, 'logistik');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_divisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `alamat`, `id_divisi`) VALUES
(1, 'raisya', 'surabaya', 1),
(2, 'isyana', 'sidoarjo', 2),
(3, 'ahmad', 'gresik', 1),
(4, 'husein', 'malang', 2),
(7, 'Amalia', 'Surabaya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `level` enum('asmen','karyawan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user`, `pass`, `level`) VALUES
(1, 'admin', 'admin', 'karyawan'),
(2, 'Khotimah ', '12345', 'karyawan'),
(3, 'Akhamd Saefullah ', '12345', 'asmen'),
(4, 'yulianawati ', '12345', 'asmen'),
(5, 'fitri handriyani', '1234', 'asmen'),
(6, 'Subhan natansyah', '12345', 'asmen'),
(7, 'Adenin Malik', '12345', 'karyawan'),
(8, 'Abdul Fikri', '12345', 'karyawan'),
(9, 'Asep Saefullah', '12345', 'karyawan'),
(10, 'Lahmudin Li Azis', '12345', 'karyawan'),
(11, 'Adi suyana', '12345', 'karyawan'),
(12, 'Nuraida', '12345', 'karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `denom_kertas`
--
ALTER TABLE `denom_kertas`
  ADD PRIMARY KEY (`id_denom_kertas`);

--
-- Indexes for table `denom_koin`
--
ALTER TABLE `denom_koin`
  ADD PRIMARY KEY (`id_denom_koin`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `denom_kertas`
--
ALTER TABLE `denom_kertas`
  MODIFY `id_denom_kertas` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `denom_koin`
--
ALTER TABLE `denom_koin`
  MODIFY `id_denom_koin` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
