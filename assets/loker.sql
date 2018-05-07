-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2018 at 02:04 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loker`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_perusahaan`
--

CREATE TABLE `jenis_perusahaan` (
  `id_jenis_perusahaan` int(11) NOT NULL,
  `jenis_perusahaan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_perusahaan`
--

INSERT INTO `jenis_perusahaan` (`id_jenis_perusahaan`, `jenis_perusahaan`) VALUES
(1, 'manufaktur'),
(2, 'dagang');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `lowongan` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `persyaratan` varchar(255) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `tanggal_post` date NOT NULL,
  `status` enum('buka','tutup') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto_member` varchar(25) NOT NULL,
  `fk_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `jenis_kelamin`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `email`, `foto_member`, `fk_user`) VALUES
(1, 'Bambanga', 'P', '1996-04-12', 'hindu', 'bojonegoro', '085233825415', 'bambang@gmail.com', '121.jpg', 1),
(2, 'Muhammad Santo', 'L', '1995-04-26', 'islam', 'Bondowoso', '082323443213', 'msanto@gmail.com', '2.jpg', 2),
(3, 'Yulia Rahmawati', 'P', '1996-05-16', 'islam', 'malang', '085432754876', 'yuliar32@gmail.com', '3.jpg', 3),
(4, 'Sintya Kusumawati', 'P', '1995-01-09', 'kristen', 'malang', '083223223432', 'kusumasintya@gmail.com', '4.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id_pendaftar` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `cv` varchar(50) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `status` enum('baru','lolos','tidak lolos') NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `fax` varchar(12) NOT NULL,
  `visi` varchar(255) NOT NULL,
  `misi` varchar(255) NOT NULL,
  `tahun_berdiri` date NOT NULL,
  `id_jenis_perusahaan` int(11) NOT NULL,
  `foto` varchar(25) NOT NULL,
  `fk_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat`, `no_telp`, `email`, `website`, `fax`, `visi`, `misi`, `tahun_berdiri`, `id_jenis_perusahaan`, `foto`, `fk_user`) VALUES
(1, 'aaaaaaaaa', 'aaaaaaaaaaaaa', '677777777', 'gggggggggggg', 'ggggggggggggg', '6666666666', 'tyttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt', 'tyyyyyyyyyyyyyyyyyyyy', '2018-05-08', 1, 'kimi-no-Na-wa.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'bambanga', 'bambang', 3),
(2, 'santo', 'santo', 3),
(3, 'yulia', 'yulia', 3),
(4, 'sintya', 'sintya', 2),
(6, 'paul', 'lolololol', 3),
(7, 'lol', 'mnbvcxz', 3),
(9, 'l', 'lllllll', 2),
(10, 'a', '1234561', 3),
(11, 'asdad', 'asdad', 3),
(12, 'asd', 'asd', 3),
(14, 'alskd', 'ldksad', 3),
(16, 'alskdasda', 'asdasd', 3),
(18, 'alskdasdasdsdsd', 'dsad', 3),
(19, 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_perusahaan`
--
ALTER TABLE `jenis_perusahaan`
  ADD PRIMARY KEY (`id_jenis_perusahaan`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id_pendaftar`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_perusahaan`
--
ALTER TABLE `jenis_perusahaan`
  MODIFY `id_jenis_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id_pendaftar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
