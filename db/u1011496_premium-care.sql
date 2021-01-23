-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 23 Jan 2021 pada 19.15
-- Versi server: 10.3.27-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1011496_premium-care`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `email`, `password`) VALUES
(8, 'ADMIN', 'admin', 'admin@admin.com', '$2y$10$EwP1ijT5rhnLuVMOc3SEqe6P7wkls3rXSj3PgZumAW1ogcrhAVkAC'),
(9, 'coba', 'coba', 'coba@gmail.com', '$2y$10$ZFj/VmyNvTRCVReC9ktHNeyCmg548CJRWHxQqcSaNgf0haz45pGfu'),
(10, 'Iqbal Ikhlasul Amal', 'iqball', 'iqbaliamal@gmail.com', '$2y$10$9OpdcNv9DZwpIGPBcIH5BusSdJX6QqcZhMzDB6APmQub0IQSQb2kq'),
(11, 'halo', 'halo', 'halo@halo.com', 'halo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_layanan`
--

CREATE TABLE `jenis_layanan` (
  `id_jenis_layanan` int(11) NOT NULL,
  `jenis_layanan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_layanan`
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
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `id_jenis_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `harga_layanan` varchar(20) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `layanan`
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
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `email`, `nomor_hp`, `password`, `token`, `is_active`, `date_time`) VALUES
(2, 'IQBAL IKHLASUL AMAL', 'iqbaliamal@gmail.com', '082229741767', '$2y$10$5PWcPe9A/rr9tW3h42XiyOM7uAG74Cf6AJNGsnmZL9/BvFHb.YsCy', '41bbbe1c8a47b48c30b3ccca59c0073e', 1, '2021-01-18 03:38:49'),
(12, 'Lila Feby Ayu Rizki', 'lilafeby15@gmail.com', '082318482691', '$2y$10$926yGGswG6nHcXGH6/0FGuWd5G93W7EGcANL.U4FQM7fM.oxay/9e', NULL, 1, '2021-01-13 12:14:05'),
(13, 'Anggito Suryo Baskoro', 'anggitosuryob@gmail.com', '085233039160', '$2y$10$jVwmCXv/DycFt7weQSYMZeytT6jso0klnGC7VysFWjrLBu/bBRgRW', NULL, 1, '2021-01-13 20:51:29'),
(14, 'Putra', 'argantara65@gmail.com', '082232862620', '$2y$10$P5iHy.5M21x9QMqgEowEaeN.N/uq1X2EA1pwLfbKkKAlKdQROWuPy', 'b5bd24b47406de391e0d6eb22fb4d42c', 0, '2021-01-13 21:36:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_order` varchar(30) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `id_order_status` int(11) NOT NULL DEFAULT 1,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `harga` varchar(20) NOT NULL,
  `merk` varchar(100) DEFAULT NULL,
  `ukuran` varchar(30) DEFAULT NULL,
  `warna` varchar(30) DEFAULT NULL,
  `tanggal_pick` datetime DEFAULT NULL,
  `lokasi_pick` text DEFAULT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_order`, `id_layanan`, `id_order_status`, `order_date`, `harga`, `merk`, `ukuran`, `warna`, `tanggal_pick`, `lokasi_pick`, `nama_pelanggan`, `email`, `nomor_hp`) VALUES
('P-00001', 1, 2, '2021-01-13 19:04:42', '15000', 'Nike Air Jordan', '43', 'Putih Hitam', '2021-01-14 19:04:00', 'Bernady Land Slawu', 'Iqbal Ikhlasul Amal', 'iqbaliamal@gmail.com', '082229741767'),
('P-00002', 1, 1, '2021-01-23 17:48:33', '15000', 'nike', '42', 'Hitam', '2021-01-23 17:48:00', 'jember', 'asdasd', 'iqbaliamal@gmail.com', '8733123980');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_status`
--

CREATE TABLE `order_status` (
  `id_order_status` int(11) NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_status`
--

INSERT INTO `order_status` (`id_order_status`, `order_status`) VALUES
(1, 'Penjemputan'),
(2, 'Proses Cuci'),
(3, 'Pengantaran'),
(4, 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reset_pw_temp`
--

CREATE TABLE `reset_pw_temp` (
  `email` varchar(100) NOT NULL,
  `expdate` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `akun_ig` varchar(50) NOT NULL,
  `testimoni` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `akun_ig`, `testimoni`) VALUES
(1, '@iqbali05', 'Bersih banget sepatunya harum jugaa saya puas dengan pelayanannya disini'),
(3, '@vigaensas', 'harga rakyat kualitas bos. Manteb ini cucinya bersihh'),
(4, '@n.faros', 'Sudah free ongkir antar jemput harga mahasiswa. Mantul'),
(5, '@dovaauria', 'Kemaren saya request sehari diambil. Alhamdulillah bisa diantar tepat waktu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `jenis_layanan`
--
ALTER TABLE `jenis_layanan`
  ADD PRIMARY KEY (`id_jenis_layanan`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`),
  ADD KEY `id_jeinis_layanan` (`id_jenis_layanan`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_layanan` (`id_layanan`,`id_order_status`),
  ADD KEY `id_order_status` (`id_order_status`);

--
-- Indeks untuk tabel `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id_order_status`);

--
-- Indeks untuk tabel `reset_pw_temp`
--
ALTER TABLE `reset_pw_temp`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `jenis_layanan`
--
ALTER TABLE `jenis_layanan`
  MODIFY `id_jenis_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id_order_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD CONSTRAINT `layanan_ibfk_1` FOREIGN KEY (`id_jenis_layanan`) REFERENCES `jenis_layanan` (`id_jenis_layanan`);

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_order_status`) REFERENCES `order_status` (`id_order_status`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
