-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 08:59 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_premium`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `email`, `password`) VALUES
(8, 'ADMIN', 'admin', 'admin@admin.com', '$2y$10$EwP1ijT5rhnLuVMOc3SEqe6P7wkls3rXSj3PgZumAW1ogcrhAVkAC'),
(9, 'coba', 'coba', 'coba@gmail.com', '$2y$10$ZFj/VmyNvTRCVReC9ktHNeyCmg548CJRWHxQqcSaNgf0haz45pGfu'),
(10, 'Iqbal Ikhlasul Amal', 'iqball', 'iqbaliamal@gmail.com', '$2y$10$9OpdcNv9DZwpIGPBcIH5BusSdJX6QqcZhMzDB6APmQub0IQSQb2kq'),
(11, 'halo', 'halo', 'halo@halo.com', 'halo');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_layanan`
--

CREATE TABLE `jenis_layanan` (
  `id_jenis_layanan` int(11) NOT NULL,
  `jenis_layanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_layanan`
--

INSERT INTO `jenis_layanan` (`id_jenis_layanan`, `jenis_layanan`) VALUES
(1, 'Sepatu'),
(2, 'Tas_Wanita'),
(3, 'Sendal_Wanita'),
(4, 'Sepatu_Wanita'),
(5, 'Topi'),
(6, 'Sandal');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `id_jenis_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(255) NOT NULL,
  `harga_layanan` varchar(20) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `id_jenis_layanan`, `nama_layanan`, `harga_layanan`, `gambar`) VALUES
(1, 1, 'Fast Clean', '15000', '141-s1.jpeg'),
(2, 1, 'Deep Clean', '20000', '423-s4.jpeg'),
(4, 1, 'Unyellowing', '30000', '646-s2.jpeg'),
(5, 4, 'Recolor', '85000', '854-224585_bc470cf6-a263-47eb-bd87-177f81acd314_1071_1071.jpg'),
(8, 2, 'Small', '10000', '596-PIM-1593250913829-fbbc05c2-db5b-45d0-95bb-0b4cb41daa37_v1-small.jpg'),
(9, 2, 'Large', '20000', '370-whoopees-8614-8834202-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `email`, `nomor_hp`, `password`, `token`, `is_active`, `date_time`) VALUES
(2, 'IQBAL IKHLASUL AMAL', 'iqbaliamal@gmail.com', '082229741767', '$2y$10$tF/RbOrqo1hsUuqK1STMPONmOUNx64M81GLQTMZ5xO77r.AlZl5uu', '41bbbe1c8a47b48c30b3ccca59c0073e', 1, '2020-12-28 22:52:59'),
(5, 'Lila Feby Ayu Rizki', 'iqbaliamalll@gmail.com', '082229741767', '$2y$10$672f9KBLjBQavCfeajW/OurhG0f9qn5pigi5OybaUN/sGAMfrLB/u', NULL, 1, '2021-01-01 12:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` varchar(30) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `id_order_status` int(11) NOT NULL DEFAULT 1,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `harga` varchar(20) NOT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `ukuran` varchar(30) DEFAULT NULL,
  `warna` varchar(30) DEFAULT NULL,
  `tanggal_pick` datetime DEFAULT NULL,
  `lokasi_pick` text DEFAULT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `id_layanan`, `id_order_status`, `order_date`, `harga`, `merk`, `ukuran`, `warna`, `tanggal_pick`, `lokasi_pick`, `nama_pelanggan`, `email`, `nomor_hp`) VALUES
('P-00001', 2, 2, '0000-00-00 00:00:00', '20000', 'Nike air wooosshh', '43', 'merah', '2020-12-28 00:00:00', 'palerann bos', 'iqbal', 'iqbaliamal@gmail.com', '082229741767'),
('P-00002', 1, 4, '0000-00-00 00:00:00', '15000', 'nike', '42', 'merah', '2021-01-01 09:39:00', 'jember', 'iqbal', 'iqbal@gmail.com', '082229741767'),
('P-00003', 1, 3, '2021-01-01 09:41:44', '15000', 'nike', '42', 'Hitam', '2021-01-01 09:41:00', 'a', 'asdasd', 'admin@gmail.com', '082229741767'),
('P-00004', 2, 1, '2021-01-01 10:52:25', '20000', 'nike', '42', 'Putih', '2021-01-01 10:52:00', 'jember', 'saipul', 'iqbaliamal@gmail.com', '082229741767'),
('P-00005', 2, 1, '2021-01-01 10:54:03', '20000', 'nike', '42', 'Putih', '2021-01-01 10:52:00', 'jember', 'saipul', 'iqbaliamal@gmail.com', '082229741767'),
('P-00006', 2, 1, '2021-01-01 10:54:52', '20000', 'nike', '42', 'Putih', '2021-01-01 10:52:00', 'jember', 'saipul', 'iqbaliamal@gmail.com', '082229741767'),
('P-00007', 2, 1, '2021-01-01 10:55:15', '20000', 'nike', '42', 'Putih', '2021-01-01 10:52:00', 'jember', 'saipul', 'iqbaliamal@gmail.com', '082229741767'),
('P-00008', 2, 1, '2021-01-01 13:48:46', '20000', 'nike', '44', 'biru', '2021-01-01 13:48:00', 'cod', 'saipul', 'iqbaliamal@gmail.com', '082229741767'),
('P-00009', 2, 1, '2021-01-01 13:55:35', '20000', 'nike', '44', 'biru', '2021-01-01 13:48:00', 'cod', 'saipul', 'iqbaliamal@gmail.com', '082229741767'),
('P-00010', 1, 1, '2021-01-01 16:20:14', '15000', 'nike', '30', 'hijau', '2021-01-01 16:19:00', 'cod', 'IQBAL IKHLASUL AMAL', 'iqbaliamal@gmail.com', '082229741767'),
('P-00011', 1, 1, '2021-01-01 16:22:29', '15000', 'nike', '42', 'Hitam', '2021-01-01 16:22:00', 'jember', 'asdasd', 'iqbaliamal@gmail.com', '082229741767'),
('P-00012', 1, 1, '2021-01-01 16:23:49', '15000', 'nike', '42', 'Hitam', '2021-01-01 16:22:00', 'jember', 'asdasd', 'iqbaliamal@gmail.com', '082229741767'),
('P-00013', 1, 4, '2021-01-01 16:24:36', '15000', 'nike', '42', 'Hitam', '2021-01-01 16:22:00', 'jember', 'asdasd', 'iqbaliamal@gmail.com', '082229741767');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id_order_status` int(11) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id_order_status`, `order_status`) VALUES
(1, 'Penjemputan'),
(2, 'Proses Cuci'),
(3, 'Pengantaran'),
(4, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `reset_pw_temp`
--

CREATE TABLE `reset_pw_temp` (
  `email` varchar(255) NOT NULL,
  `expdate` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `akun_ig` varchar(100) NOT NULL,
  `testimoni` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `akun_ig`, `testimoni`) VALUES
(1, '@iqbali05', 'coba testi\r\n'),
(3, '@tif', 'ini testimoni sayang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `jenis_layanan`
--
ALTER TABLE `jenis_layanan`
  ADD PRIMARY KEY (`id_jenis_layanan`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`),
  ADD KEY `id_jeinis_layanan` (`id_jenis_layanan`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_layanan` (`id_layanan`,`id_order_status`),
  ADD KEY `id_order_status` (`id_order_status`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id_order_status`);

--
-- Indexes for table `reset_pw_temp`
--
ALTER TABLE `reset_pw_temp`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jenis_layanan`
--
ALTER TABLE `jenis_layanan`
  MODIFY `id_jenis_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id_order_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `layanan`
--
ALTER TABLE `layanan`
  ADD CONSTRAINT `layanan_ibfk_1` FOREIGN KEY (`id_jenis_layanan`) REFERENCES `jenis_layanan` (`id_jenis_layanan`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_order_status`) REFERENCES `order_status` (`id_order_status`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
