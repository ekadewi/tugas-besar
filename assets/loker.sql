-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2018 at 07:34 AM
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
(1, 'Kasir', 'bagian marketing, gaji kurang lebih 1jt/bulan', 3, 'Perempuan, umur max 30, pendidikan minimal lulus SMA/SMK', 4, '2018-05-15', 'buka'),
(2, 'Gudang', 'gaji 1,2jt/bulan, pekerjaan mencatat barang masuk dan keluar', 3, 'laki - laki usia max 30 tahun, jujur, tepat waktu, dapat bekerja dengan tim', 6, '2018-05-14', 'buka'),
(3, 'Office Boy', 'gaji kurang lebih 800k/bulan, membersihkan ruangan sesuai ketentuan atasan', 5, 'laki - laki usia max 40, dapat bekerja dibawah tekanan', 7, '2018-05-14', 'buka'),
(4, 'Kasir', 'gaji 1jt/bulan', 2, 'wanita usia max 29, teliti, dapat bekerja hingga malam', 8, '2018-05-14', 'buka'),
(5, 'Supervisior', 'gaji 2jt/bulan belum termasuk uang lembur', 6, 'laki - laki atau wanita usia max 35th, pandai memanagement waktu, dapat bekerja dengan cepat', 2, '2018-05-14', 'buka'),
(6, 'Pegawai', '', 0, '', 0, '0000-00-00', '');

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
(1, 'Bambangaaaa', 'P', '1996-04-12', 'hindu', 'bojonegoro', '085233825415', 'bambang@gmail.com', '121.jpg', 2),
(2, 'Muhammad Santo', 'L', '1995-04-26', 'islam', 'Bondowoso', '082323443213', 'msanto@gmail.com', '2.jpg', 3),
(3, 'Yulia Rahmawati', 'P', '1996-05-16', 'islam', 'malang', '085432754876', 'yuliar32@gmail.com', '3.jpg', 4),
(4, 'Sintya Kusumawati', 'P', '1995-01-09', 'kristen', 'malang', '083223223432', 'kusumasintya@gmail.com', '4.jpg', 1),
(5, 'vbv', 'P', '2018-05-02', 'islam', 'xcdsfdfdf', '87878', 'a@gmail.com', '311.jpg', 0),
(7, 'kjbjbjjn', 'L', '2018-05-23', 'islam', 'nbnb', '9879', 'fahrul4215@gmail.com', '122.jpg', 30),
(9, 'dhrxhdxhxd', 'P', '2018-05-04', 'islam', 'hjhj', '6757657', 'a@gmail.com', '123.jpg', 32);

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
(2, 'PT. Qawi Pragata Samira', 'Jl. Hamid Rusdi 11-21 Talok Turen\r\nMalang Jawa Timur, Indonesia', '0341 824136', 'qipas@gmail.com', 'http://qipas.co.id/', '0341 825175', 'Menjadi perusahaan terbaik dalam bidang jasa, industri pertanian dan perdagangan umum di Indonesia dengan kualitas layanan terbaik bagi kepuasan pelanggan, masyarakat petani dan perusahaan.', 'Meningkatkan daya saing produk secara berkesinambungan dengan sistem, cara dan lingkungan kerja yang mendorong munculnya kreativitas, inovasi dan efisiensi untuk meningkatkan produktivitas.', 2018, 2, 'p1.jpg', 25),
(3, 'PT Holcim Indonesia Tbk', 'Jl. TB Simatupang No.22 - 26\r\nJakarta', '02129861000', 'holcim@gmail.com', 'https://www.holcim.co.id/id', '02129863333', 'Menjadi perusahaan yang terdepan dengan kinerja terbaik dalam industry bahan bangunan di Indonesia', '1.Memastikan nihil bahaya dalam setiap kegiatan operasional dan bisnis\r\n2.Bermitra dengan para pelanggan untuk mewujudkan solusi-solusi berbeda dan inovatif\r\n3.Mengembangkan Sumber daya manusia yang berkinerja tinggi melalui lingkungan kerja yang beragam dan melibatkan setiap individu didalamnya\r\n4.Menciptakan nilai yang sama dan solusi-solusi yang berkelanjutan bagi para pemangku kepentingan\r\n', 1912, 1, 'p2.jpg', 24),
(4, 'Kalbe', 'Jl. Let. Jend Suprapto Kav 4 Jakarta 10510 - Indonesia', '02142873888', 'kalbe@gmail.com', 'https://www.kalbe.co.id/', '02142563326', 'Menjadi perusahaan produk kesehatan Indonesia terbaik dengan skala internasional yang didukung oleh inovasi, merek yang kuat, dan manajemen yang prima.', 'Meningkatkan kesehatan untuk kehidupan yang lebih baik', 1966, 4, 'p3.jpg', 26),
(6, 'PT. Semen Indonesia', 'Gresik, Jawa Timur', '0215822222', 'semenindonesia@gmail.com', 'http://www.semenindonesia.com', '0215822222', 'MENJADI PERUSAHAAN PERSEMENAN INTERNASIONAL YANG TERKEMUKA DI ASIA TENGGARA', '1. Mengembangkan usaha persemenan dan industri terkait yang berorientasikan kepuasan konsumen.\r\n2. Mewujudkan perusahaan berstandar internasional dengan keunggulan daya saing dan sinergi untuk meningkatkan nilai tambah secara berkesinambungan.\r\n2. Mewujudkan tanggung jawab sosial serta ramah lingkungan.\r\n3. Memberikan nilai terbaik kepada para pemangku kepentingan (stakeholders).\r\n4. Membangun kompetensi melalui pengembangan sumber daya manusia', 1957, 2, 'semenindonesia.jpg', 2),
(7, 'Ace Hardware Indonesia Tbk ', 'Gedung Kawan Lama Lantai 5 Jl. Puri Kencana No. 1 Meruya Kembangan Jakarta 11610', '0215822222', 'toto@acehardware.co.id', 'www.acehardware.co.id', '0215824022', 'Kami berusaha menjadi pusat ritel perlengkapan rumah dan gaya hidup yang terdepan di Indonesia.\r\n', 'Kami bertujuan memberikan pilihan lengkap untuk produk berkualitas tinggi dengan harga kompetitif, ditunjang pelayanan pelanggan oleh tim profesional.', 1995, 2, 'acehardware.jpg', 29),
(8, 'Akbar Indomakmur Stimec Tbk', 'Plaza Chase Lt. 20 Jl. Jend. Sudirman Kav. 21, Jakarta Selatan 12920', '0212934 7999', 'corpsec@aims.co.id', 'www.aims.co.id', '0215208400', 'Kami berusaha menjadi pusat ritel perlengkapan rumah dan gaya hidup yang terdepan di Indonesia.', 'Kami bertujuan memberikan pilihan lengkap untuk produk berkualitas tinggi dengan harga kompetitif, ditunjang pelayanan pelanggan oleh tim profesional.\r\n', 1999, 2, 'aims.jpg', 30);

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
(1, 'sintya', 'sintya', 3),
(2, 'bambangaa', 'bambang', 3),
(3, 'santo', 'yulia', 3),
(4, 'yulia', 'yulia', 3),
(24, 'holcim', 'holcim', 2),
(25, 'qawi', 'qawi', 2),
(26, 'kalbe', 'kalbe', 2),
(30, 'lhghjhj', 'hghjh', 3),
(32, 'jknjknjk', 'jknjnj', 3),
(33, 'sssssssssss', 'ssssssssssssssssss', 2),
(35, 'sssssssssssu', 'ssssssssssssssssss', 2),
(36, 'sssssssssssuu', 'ssssssssssssssssss', 2),
(37, 'ssssssssssso', 'ssssssssssssssssss', 2);

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
  MODIFY `id_jenis_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id_pendaftar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
