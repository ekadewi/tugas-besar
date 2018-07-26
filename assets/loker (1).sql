-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2018 at 04:10 AM
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
(1, 'industri'),
(2, 'perdagangan'),
(4, 'farmasi');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `keterangan`) VALUES
(1, 'admin'),
(2, 'perusahaan'),
(3, 'non_premium'),
(4, 'premium'),
(5, 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `lowongan` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `persyaratan` varchar(255) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `tanggal_post` date NOT NULL,
  `status` enum('buka','tutup') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `lowongan`, `deskripsi`, `jumlah`, `persyaratan`, `id_perusahaan`, `tanggal_post`, `status`) VALUES
(1, 'Kasir', 'bagian marketing, gaji kurang lebih 1jt/bulan', 5, 'Perempuan, umur max 30, pendidikan minimal lulus SMA/SMK', 4, '2018-05-15', 'buka'),
(2, 'Gudang', 'gaji 1,2jt/bulan, pekerjaan mencatat barang masuk dan keluar', 3, 'laki - laki usia max 30 tahun, jujur, tepat waktu, dapat bekerja dengan tim', 6, '2018-05-14', 'buka'),
(3, 'Office Boy', 'gaji kurang lebih 800k/bulan, membersihkan ruangan sesuai ketentuan atasan', 5, 'laki - laki usia max 40, dapat bekerja dibawah tekanan', 7, '2018-05-14', 'buka'),
(5, 'Supervisior', 'gaji 2jt/bulan belum termasuk uang lembur', 5, 'laki - laki atau wanita usia max 35th, pandai memanagement waktu, dapat bekerja dengan cepat', 2, '2018-05-14', 'buka');

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
(1, 'Bambang', 'P', '1996-04-12', 'islam', 'bojonegoro', '08123456', 'bambang@gmail.com', 'user_icon.png', 39),
(2, 'Muhammad Santoo', 'L', '1995-04-26', 'islam', 'Bondowoso', '082323443213', 'msanto@gmail.com', '2.jpg', 58),
(3, 'Yulia Rahmawati', 'P', '1996-05-16', 'islam', 'malang', '085432754876', 'yuliar32@gmail.com', '3.jpg', 59),
(4, 'Sintya Kusumawati', 'P', '1995-01-09', 'kristen', 'malang', '083223223432', 'kusumasintya@gmail.com', '4.jpg', 60),
(5, 'ww', 'P', '2018-12-31', 'islam', 'h', '6', 'a@gmail.com', 'IMG-20180703-WA000111.jpg', 70);

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
  `status_daftar` enum('baru','lolos','tidak lolos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id_pendaftar`, `id_member`, `id_lowongan`, `cv`, `tanggal_daftar`, `status_daftar`) VALUES
(21, 2, 5, 'KTI_PrasetyoWicaksono_Pertanian_revisi.pdf', '2018-07-25', 'tidak lolos'),
(22, 3, 5, 'Kisi-kisi6.pdf', '2018-07-25', 'baru'),
(23, 1, 1, 'Berot_-_25-07-2018_(9).pdf', '2018-07-26', 'lolos'),
(24, 1, 2, 'Berot_-_25-07-2018_(4).pdf', '2018-07-26', 'baru'),
(25, 1, 3, 'Berot_-_25-07-2018_(8).pdf', '2018-07-26', 'baru');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `fax` varchar(12) NOT NULL,
  `visi` longtext NOT NULL,
  `misi` longtext NOT NULL,
  `tahun_berdiri` year(4) NOT NULL,
  `id_jenis_perusahaan` int(11) NOT NULL,
  `foto` varchar(25) NOT NULL,
  `fk_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat`, `no_telp`, `email`, `website`, `fax`, `visi`, `misi`, `tahun_berdiri`, `id_jenis_perusahaan`, `foto`, `fk_user`) VALUES
(2, 'PT. Qawi Pragata Samira', 'Jl. Hamid Rusdi 11-21 Talok TurenMalang Jawa Timur, Indonesia', '0341824136', 'qipas@gmail.com', 'http://qipas.co.id/', '0341825175', 'Menjadi perusahaan terbaik dalam bidang jasa, industri pertanian dan perdagangan umum di Indonesia dengan kualitas layanan terbaik bagi kepuasan pelanggan, masyarakat petani dan perusahaan.', 'Meningkatkan daya saing produk secara berkesinambungan dengan sistem, cara dan lingkungan kerja yang mendorong munculnya kreativitas, inovasi dan efisiensi untuk meningkatkan produktivitas.', 2018, 4, 'p11.jpg', 40),
(3, 'PT Holcim Indonesia Tbk', 'Jl. TB Simatupang No.22 - 26\r\nJakarta', '02129861000', 'holcim@gmail.com', 'https://www.holcim.co.id/id', '02129863333', 'Menjadi perusahaan yang terdepan dengan kinerja terbaik dalam industry bahan bangunan di Indonesia', '1.Memastikan nihil bahaya dalam setiap kegiatan operasional dan bisnis\r\n2.Bermitra dengan para pelanggan untuk mewujudkan solusi-solusi berbeda dan inovatif\r\n3.Mengembangkan Sumber daya manusia yang berkinerja tinggi melalui lingkungan kerja yang beragam dan melibatkan setiap individu didalamnya\r\n4.Menciptakan nilai yang sama dan solusi-solusi yang berkelanjutan bagi para pemangku kepentingan\r\n', 1912, 1, 'p2.jpg', 47),
(4, 'Kalbe', 'Jl. Let. Jend Suprapto Kav 4 Jakarta 10510 - Indonesia', '02142873888', 'kalbe@gmail.com', 'https://www.kalbe.co.id/', '02142563326', 'Menjadi perusahaan produk kesehatan Indonesia terbaik dengan skala internasional yang didukung oleh inovasi, merek yang kuat, dan manajemen yang prima.', 'Meningkatkan kesehatan untuk kehidupan yang lebih baik', 1966, 4, 'p3.jpg', 48),
(6, 'PT. Semen Indonesia', 'Gresik, Jawa Timur', '0215822222', 'semenindonesia@gmail.com', 'http://www.semenindonesia.com', '0215822222', 'MENJADI PERUSAHAAN PERSEMENAN INTERNASIONAL YANG TERKEMUKA DI ASIA TENGGARA', '1. Mengembangkan usaha persemenan dan industri terkait yang berorientasikan kepuasan konsumen.\r\n2. Mewujudkan perusahaan berstandar internasional dengan keunggulan daya saing dan sinergi untuk meningkatkan nilai tambah secara berkesinambungan.\r\n2. Mewujudkan tanggung jawab sosial serta ramah lingkungan.\r\n3. Memberikan nilai terbaik kepada para pemangku kepentingan (stakeholders).\r\n4. Membangun kompetensi melalui pengembangan sumber daya manusia', 1957, 2, 'semenindonesia.jpg', 49),
(7, 'Ace Hardware Indonesia Tbk', 'Gedung Kawan Lama Lantai 5 Jl. Puri Kencana No. 1 Meruya Kembangan Jakarta 11610', '021581223', 'toto@acehardware.co.id', 'www.acehardware.co.id', '0215824022', 'Kami berusaha menjadi pusat ritel perlengkapan rumah dan gaya hidup yang terdepan di Indonesia.\r\n', 'Kami bertujuan memberikan pilihan lengkap untuk produk berkualitas tinggi dengan harga kompetitif, ditunjang pelayanan pelanggan oleh tim profesional.', 1996, 2, 'acehardware.jpg', 51);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_level`) VALUES
(39, 'bambang', 'a9711cbb2e3c2d5fc97a63e45bbe5076', 3),
(40, 'qawi', '881d85d6de2dcc294fa55bce17ac17cb', 2),
(41, 'eka', '79ee82b17dfb837b1be94a6827fa395a', 1),
(42, 'owner', '72122ce96bfec66e2396d2e25225d70a', 5),
(47, 'holcim', 'a87c269120519d1aa7751993df0db173', 2),
(48, 'kalbe', 'cd6f86ea75f787e1d36140226dbc1a9f', 2),
(49, 'semen', '5435cfddc7e1cd3c1d703f230e2113ba', 2),
(51, 'ace', '360e2ece07507675dced80ba867d6dcd', 2),
(58, 'santoo', '9f3f480b7fef19e959abcea61561b61d', 4),
(59, 'yulia', '03be66295cd7eb6cf6001c9181bb904d', 3),
(60, 'sintya', '0ea30ead1d8dda03978429ab56a61c19', 4),
(70, 'ww', 'ad57484016654da87125db86f4227ea3', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_perusahaan`
--
ALTER TABLE `jenis_perusahaan`
  ADD PRIMARY KEY (`id_jenis_perusahaan`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id_lowongan`),
  ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id_pendaftar`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_lowongan` (`id_lowongan`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`),
  ADD KEY `id_jenis_perusahaan` (`id_jenis_perusahaan`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_perusahaan`
--
ALTER TABLE `jenis_perusahaan`
  MODIFY `id_jenis_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id_pendaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD CONSTRAINT `lowongan_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `pendaftar_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`),
  ADD CONSTRAINT `pendaftar_ibfk_2` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan` (`id_lowongan`);

--
-- Constraints for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `perusahaan_ibfk_1` FOREIGN KEY (`id_jenis_perusahaan`) REFERENCES `jenis_perusahaan` (`id_jenis_perusahaan`),
  ADD CONSTRAINT `perusahaan_ibfk_2` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
