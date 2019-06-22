-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 22 Jun 2019 pada 12.46
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
('JLH1001', 'Kopi', 'red', 100),
('JLH1002', 'Vanili', 'yellow', 50);

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
('KEC1001', 'Kodi Bangedo', 120);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelompok_tani`
--

CREATE TABLE `tb_kelompok_tani` (
  `id_kelompok_tani` varchar(10) NOT NULL,
  `kelompok_tani` varchar(100) NOT NULL,
  `id_kecamatan` varchar(8) NOT NULL,
  `id_pengguna` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelompok_tani`
--

INSERT INTO `tb_kelompok_tani` (`id_kelompok_tani`, `kelompok_tani`, `id_kecamatan`, `id_pengguna`) VALUES
('KTN1001', 'Kelompok Tani 1', 'KEC1001', 'PEN1003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemetaan`
--

CREATE TABLE `tb_pemetaan` (
  `id_pemetaan` varchar(10) NOT NULL,
  `id_jenis_lahan` varchar(10) NOT NULL,
  `id_kelompok_tani` varchar(10) NOT NULL,
  `lat_lng` text NOT NULL,
  `total_produksi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pemetaan`
--

INSERT INTO `tb_pemetaan` (`id_pemetaan`, `id_jenis_lahan`, `id_kelompok_tani`, `lat_lng`, `total_produksi`) VALUES
('PEM1001', 'JLH1001', 'KTN1001', '[{\"lat\":-9.413193386510692,\"lng\":119.17185932228494},{\"lat\":-9.430127958878096,\"lng\":119.1720309836619},{\"lat\":-9.431482688775356,\"lng\":119.1800990683787},{\"lat\":-9.436054862891043,\"lng\":119.18868213722635},{\"lat\":-9.428603881384433,\"lng\":119.18868213722635},{\"lat\":-9.423692919225001,\"lng\":119.18439060280252},{\"lat\":-9.414548182857207,\"lng\":119.19005542824198},{\"lat\":-9.415056230117766,\"lng\":119.17958408424784},{\"lat\":-9.412854686594189,\"lng\":119.17254596779276}]', 48);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` varchar(8) NOT NULL,
  `pengguna` varchar(50) NOT NULL,
  `kata_sandi` varchar(225) NOT NULL,
  `peran` enum('admin','kelompok tani') NOT NULL DEFAULT 'kelompok tani'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `pengguna`, `kata_sandi`, `peran`) VALUES
('PEN1001', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('PEN1002', 'k2', '61620957a1443c946a143cf99a7d24fa', 'kelompok tani'),
('PEN1003', 'kelompoktani1', '226dd34ff36ce89536fd2c29ad26dca8', 'kelompok tani');

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
  ADD PRIMARY KEY (`id_kelompok_tani`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `tb_pemetaan`
--
ALTER TABLE `tb_pemetaan`
  ADD PRIMARY KEY (`id_pemetaan`),
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
-- Ketidakleluasaan untuk tabel `tb_kelompok_tani`
--
ALTER TABLE `tb_kelompok_tani`
  ADD CONSTRAINT `tb_kelompok_tani_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kelompok_tani_ibfk_2` FOREIGN KEY (`id_kecamatan`) REFERENCES `tb_kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pemetaan`
--
ALTER TABLE `tb_pemetaan`
  ADD CONSTRAINT `tb_pemetaan_ibfk_1` FOREIGN KEY (`id_jenis_lahan`) REFERENCES `tb_jenis_lahan` (`id_jenis_lahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pemetaan_ibfk_2` FOREIGN KEY (`id_kelompok_tani`) REFERENCES `tb_kelompok_tani` (`id_kelompok_tani`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
