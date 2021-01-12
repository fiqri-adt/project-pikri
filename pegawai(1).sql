-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 12 Jan 2021 pada 07.33
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `denom_kertas`
--

CREATE TABLE `denom_kertas` (
  `id_denom_kertas` int(12) NOT NULL,
  `denom_kertas` bigint(12) NOT NULL,
  `id_users` int(22) NOT NULL,
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
-- Dumping data untuk tabel `denom_kertas`
--

INSERT INTO `denom_kertas` (`id_denom_kertas`, `denom_kertas`, `id_users`, `rp1`, `rp2`, `rp3`, `rp4`, `rp5`, `rp6`, `inpak`, `created_at`, `updated_at`) VALUES
(1, 100000, 7, 2, 10, 5, 3, 8, -23, 0, '0000-00-00 00:00:00', '2021-01-03 20:47:57'),
(2, 50000, 2, 1, 4, 1, 6, 1, 0, 0, '0000-00-00 00:00:00', '2021-01-03 20:27:56'),
(3, 20000, 3, 0, 3, 0, 3, 4, 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 10000, 4, 1, 1, 0, 4, 4, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 5000, 5, 1, 8, 3, 3, 10, 0, 1, '2020-11-23 14:45:46', '0000-00-00 00:00:00'),
(30, 20, 7, 1, 1, 1, 1, 1, 12, 1, '2021-01-08 23:27:32', '2021-01-08 23:27:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `denom_koin`
--

CREATE TABLE `denom_koin` (
  `id_denom_koin` int(12) NOT NULL,
  `denom_koin` bigint(12) NOT NULL,
  `id_users` int(11) NOT NULL,
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
-- Dumping data untuk tabel `denom_koin`
--

INSERT INTO `denom_koin` (`id_denom_koin`, `denom_koin`, `id_users`, `rp1`, `rp2`, `rp3`, `rp4`, `rp5`, `rp6`, `inpak`, `created_at`, `updated_at`) VALUES
(1, 1000, 7, 2, 2, 0, 0, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 500, 2, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 200, 3, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `level` enum('asmen','karyawan','manager') NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `user`, `pass`, `level`, `last_login`) VALUES
(1, 'admin', '12345', 'asmen', '2021-01-03 14:25:45'),
(2, 'Khotimah ', '12345', 'manager', '0000-00-00 00:00:00'),
(3, 'Akhamd Saefullah ', '12345', 'asmen', '0000-00-00 00:00:00'),
(4, 'yulianawati ', '12345', 'asmen', '0000-00-00 00:00:00'),
(5, 'fitri handriyani', '1234', 'asmen', '0000-00-00 00:00:00'),
(6, 'Subhan natansyah', '12345', 'asmen', '0000-00-00 00:00:00'),
(7, 'kontol', '12345', 'karyawan', '0000-00-00 00:00:00'),
(8, 'Abdul Fikri', '12345', 'karyawan', '0000-00-00 00:00:00'),
(9, 'Asep Saefullah', '12345', 'karyawan', '0000-00-00 00:00:00'),
(10, 'Lahmudin Li Azis', '12345', 'karyawan', '0000-00-00 00:00:00'),
(11, 'Adi suyana', '12345', 'karyawan', '0000-00-00 00:00:00'),
(12, 'Nuraida', '12345', 'karyawan', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `denom_kertas`
--
ALTER TABLE `denom_kertas`
  ADD PRIMARY KEY (`id_denom_kertas`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `denom_koin`
--
ALTER TABLE `denom_koin`
  ADD PRIMARY KEY (`id_denom_koin`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `denom_kertas`
--
ALTER TABLE `denom_kertas`
  MODIFY `id_denom_kertas` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `denom_koin`
--
ALTER TABLE `denom_koin`
  MODIFY `id_denom_koin` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
