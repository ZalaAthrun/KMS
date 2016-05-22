-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2016 at 03:47 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Login`(IN `id_user` VARCHAR(20), IN `passWord` VARCHAR(25))
BEGIN
  SELECT * FROM user u
  WHERE u.id_user = id_user AND u.password = passWord;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `biaya_tambah`
--

CREATE TABLE IF NOT EXISTS `biaya_tambah` (
  `id_biaya_tambah` varchar(10) NOT NULL,
  `nama_kebutuhan` varchar(50) NOT NULL,
  `harga` int(10) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya_tambah`
--

INSERT INTO `biaya_tambah` (`id_biaya_tambah`, `nama_kebutuhan`, `harga`, `status`, `tanggal`) VALUES
('rizki_km1', 'Kamar Bulanan', 5000000, 1, '2016-05-21 14:04:53'),
('rizki_km2', 'Kamar Bulanan', 450000, 0, '2016-05-21 14:05:07'),
('rizki_km1', 'Air + Listrik (Laptop & Riceco', 75000, 1, '2016-05-21 14:05:31'),
('rizki_km2', 'Air + Listrik ( PC  & Laptop)', 90000, 0, '2016-05-21 14:05:53'),
('rizki_km2', 'Iuran Wifi', 20000, 0, '2016-05-21 14:07:04'),
('rizki_km1', 'Iuran Wifi', 20000, 1, '2016-05-21 14:07:14'),
('rizki_km1', 'Denda Bulan Lalu', 20000, 1, '2016-05-21 14:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE IF NOT EXISTS `keuangan` (
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_kost` varchar(10) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`tanggal`, `id_kost`, `jenis`, `keterangan`, `jumlah`) VALUES
('2016-05-21 14:08:18', 'rizki', 'pemasukan', 'Saldo Sebelum Menggunakan Sistem', 15500000),
('2016-05-21 14:08:53', 'rizki', 'pengeluaran', 'Kebersihan Minggu I', 30000),
('2016-05-21 14:09:17', 'rizki', 'pengeluaran', 'Tagihan Wifi', 375000),
('2016-05-21 14:09:37', 'rizki', 'pengeluaran', 'Listrik', 321000),
('2016-05-21 14:10:41', 'rizki', 'pengeluaran', 'Ambil Profit Bulanan', 4000000),
('2016-05-21 14:11:48', 'rizki', 'Pemasukan', 'Pembayaran Tagihan rizki_km1  ', 5095000),
('2016-05-21 14:16:31', 'rizki', 'Pemasukan', 'Pembayaran Tagihan rizki_km1  ', 20000),
('2016-05-22 01:42:55', 'rizki', 'pengeluaran', 'Air', 90000),
('2016-05-22 01:47:32', 'rizki', 'pengeluaran', 'Kebersihan Minggu 2', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `kost`
--

CREATE TABLE IF NOT EXISTS `kost` (
  `id_kost` varchar(10) NOT NULL,
  `nama` varchar(10) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kost`
--

INSERT INTO `kost` (`id_kost`, `nama`, `alamat`, `deskripsi`) VALUES
('a', '', '', ''),
('rizki', 'Ako', 'Soekarno Hatta 30', 'Ako');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE IF NOT EXISTS `laporan` (
  `id_laporan` varchar(30) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `subjek` varchar(10) NOT NULL,
  `keluhan` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `main_db`
--

CREATE TABLE IF NOT EXISTS `main_db` (
  `id_kost` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `status` int(1) NOT NULL,
  `id_kamar` varchar(10) DEFAULT NULL,
  `id_biaya_tambah` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_db`
--

INSERT INTO `main_db` (`id_kost`, `id_user`, `status`, `id_kamar`, `id_biaya_tambah`) VALUES
('a', 'a', 1, '', ''),
('rizki', 'rizki_km1', 2, 'rizki_km1', 'rizki_km1'),
('rizki', 'rizki', 0, NULL, NULL),
('rizki', 'rizki_km2', 2, 'rizki_km2', 'rizki_km2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `jenis_pengenal` varchar(6) DEFAULT NULL,
  `no_pengenal` varchar(25) DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `no_telfon` varchar(13) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `alamat` varchar(40) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `jenis_pengenal`, `no_pengenal`, `pekerjaan`, `no_telfon`, `foto`, `password`, `alamat`, `tanggal`) VALUES
('a', 'a a', 'a', '1', 'a', '1', NULL, 'a', 'a', '2016-05-16 11:50:37'),
('rizki', 'Rizki Maulana', 'ktp', '11', NULL, NULL, NULL, 'zala', 'jombang', '2016-05-16 11:50:37'),
('rizki_km1', 'Adit', 'ktp', '1120', 'Mahasiswa', '098818230', NULL, 'adit', 'Jombang', '2016-05-16 11:50:37'),
('rizki_km2', 'Real', 'SIM', '111110000', 'TKI', '628572638913', NULL, 'unreal', 'Jalan Jalan', '2016-05-16 11:50:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`id_kost`);

--
-- Indexes for table `main_db`
--
ALTER TABLE `main_db`
  ADD KEY `main_db_ibfk_1` (`id_kost`), ADD KEY `main_db_ibfk_2` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `main_db`
--
ALTER TABLE `main_db`
ADD CONSTRAINT `main_db_ibfk_1` FOREIGN KEY (`id_kost`) REFERENCES `kost` (`id_kost`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `main_db_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
