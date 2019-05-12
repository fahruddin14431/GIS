-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 12 Mei 2019 pada 15.24
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_lahan`
--

CREATE TABLE `tb_jenis_lahan` (
  `id_jenis_lahan` varchar(10) NOT NULL,
  `jenis_lahan` varchar(100) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `luas_tanah` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_lahan`
--

INSERT INTO `tb_jenis_lahan` (`id_jenis_lahan`, `jenis_lahan`, `warna`, `luas_tanah`) VALUES
('JLH1001', 'jenis lahan 1', 'red', 100),
('JLH1002', 'jenis lahan 2', 'yellow', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `id_kecamatan` varchar(10) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `luas_tanah` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`id_kecamatan`, `kecamatan`, `luas_tanah`) VALUES
('KEC1001', 'Kecamatan 1', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelompok_tani`
--

CREATE TABLE `tb_kelompok_tani` (
  `id_kelompok_tani` varchar(10) NOT NULL,
  `kelompok_tani` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelompok_tani`
--

INSERT INTO `tb_kelompok_tani` (`id_kelompok_tani`, `kelompok_tani`) VALUES
('KTN1001', 'Kelompok tani 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemetaan`
--

CREATE TABLE `tb_pemetaan` (
  `id_pemetaan` varchar(10) NOT NULL,
  `id_kecamatan` varchar(10) NOT NULL,
  `id_jenis_lahan` varchar(10) NOT NULL,
  `id_kelompok_tani` varchar(10) NOT NULL,
  `lat_lng` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` varchar(8) NOT NULL,
  `pengguna` varchar(50) NOT NULL,
  `kata_sandi` varchar(225) NOT NULL,
  `peran` enum('admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `pengguna`, `kata_sandi`, `peran`) VALUES
('PEN1001', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jenis_lahan`
--
ALTER TABLE `tb_jenis_lahan`
  ADD PRIMARY KEY (`id_jenis_lahan`);

--
-- Indexes for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `tb_kelompok_tani`
--
ALTER TABLE `tb_kelompok_tani`
  ADD PRIMARY KEY (`id_kelompok_tani`);

--
-- Indexes for table `tb_pemetaan`
--
ALTER TABLE `tb_pemetaan`
  ADD PRIMARY KEY (`id_pemetaan`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_jenis_lahan` (`id_jenis_lahan`),
  ADD KEY `id_kelompok_tani` (`id_kelompok_tani`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pemetaan`
--
ALTER TABLE `tb_pemetaan`
  ADD CONSTRAINT `tb_pemetaan_ibfk_1` FOREIGN KEY (`id_jenis_lahan`) REFERENCES `tb_jenis_lahan` (`id_jenis_lahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pemetaan_ibfk_2` FOREIGN KEY (`id_kelompok_tani`) REFERENCES `tb_kelompok_tani` (`id_kelompok_tani`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pemetaan_ibfk_3` FOREIGN KEY (`id_kecamatan`) REFERENCES `tb_kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
