-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 05:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saku_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `user_id`, `password`, `type`) VALUES
(1, 'admin1', '12345678', 'admin'),
(2, 'samsul', '12345678', 'user'),
(3, 'irwan', '12345678', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `akun_admin`
--

CREATE TABLE `akun_admin` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `saldo` int(11) NOT NULL,
  `penarikan` int(11) NOT NULL,
  `setoran` int(11) NOT NULL,
  `nasabah` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL DEFAULT 'nophoto.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_admin`
--

INSERT INTO `akun_admin` (`id`, `user_id`, `nama`, `nip`, `saldo`, `penarikan`, `setoran`, `nasabah`, `photo`) VALUES
(1, 'admin1', 'izzul wahyudi', '1254896136', 0, 0, 0, 2, 'nophoto.png');

-- --------------------------------------------------------

--
-- Table structure for table `akun_user`
--

CREATE TABLE `akun_user` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `no_req` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `spp` int(11) NOT NULL,
  `saldo` int(11) NOT NULL DEFAULT 0,
  `photo` varchar(100) NOT NULL DEFAULT 'nophoto.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_user`
--

INSERT INTO `akun_user` (`id`, `user_id`, `no_req`, `nama`, `nis`, `tanggal_lahir`, `spp`, `saldo`, `photo`) VALUES
(1, 'samsul', '1113332288', 'Samsul Arifin', '1468578866', '2014-11-14', 250000, 0, 'nophoto.png'),
(2, 'irwan', '1113332299', 'Irwan Nurhidayat', '1468578867', '2015-08-05', 300000, 0, 'nophoto.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `from_user_id` varchar(100) NOT NULL,
  `from_name` varchar(100) NOT NULL,
  `to_user_id` varchar(100) NOT NULL,
  `to_name` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akun_user`
--
ALTER TABLE `akun_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `akun_user`
--
ALTER TABLE `akun_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
