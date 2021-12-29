-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 01:50 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(3) NOT NULL,
  `id_supplier` int(3) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_supplier`, `nama_produk`, `foto`, `harga`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
(6, 19, 'Majoo Pro', 'standard_repo.png', 2750000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, doloribus nam. Porro aliquam, hic quibusdam fugit doloremque quo dolor labore.', 1, '2021-12-28 02:54:17', '2021-12-28 02:54:17'),
(7, 19, 'Majoo Advance', 'paket-advance1.png', 2750000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque alias aspernatur perspiciatis minus sunt doloremque, culpa numquam beatae itaque? Id adipisci, dignissimos accusantium ipsa sit exercitationem sed odio tenetur rerum?', 1, '2021-12-28 02:52:34', '2021-12-28 02:52:34'),
(8, 20, 'Majoo Lifestyle', 'paket-lifestyle.png', 2750000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque alias aspernatur perspiciatis minus sunt doloremque, culpa numquam beatae itaque? Id adipisci, dignissimos accusantium ipsa sit exercitationem sed ', 1, '2021-12-28 11:05:11', '2021-12-28 11:05:11'),
(9, 19, 'Majoo Desktop', 'paket-desktop.png', 2750000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque alias aspernatur perspiciatis minus sunt doloremque, culpa numquam beatae itaque? Id adipisci, dignissimos accusantium ipsa sit exercitationem sed odio tenetur rerumaspernatur perspiciatis minus sunt doloremque, culpa numquam beatae itaque? Id adipisci, dignissimos accusantium ipsa sit exercitationem sed odio tenetur rerum', 1, '2021-12-28 02:53:54', '2021-12-28 02:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(3) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `alamat`, `created_at`, `updated_at`) VALUES
(19, 'Niko Oktavio', 'Jl. Merpati no 24E', '2021-12-28 00:10:12', '2021-12-28 11:04:32'),
(20, 'Dimas Bayu B.P', 'Jl. Kertasada No. 3A, Kalianget', '2021-12-28 11:04:57', '2021-12-29 00:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `nama_cust` varchar(100) NOT NULL,
  `nohp_cust` varchar(17) NOT NULL,
  `alamat_cust` text NOT NULL,
  `grand_total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `status_trans` int(1) NOT NULL COMMENT '0)Belum selesai; 1)Selesai;',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_produk`, `nama_cust`, `nohp_cust`, `alamat_cust`, `grand_total`, `bayar`, `kembali`, `status_trans`, `created_at`, `updated_at`) VALUES
(1, 6, 'Akun Demo', '085156570034', 'hahahihihuhu', 2750000, 3000000, 225000, 1, '2021-12-28 02:54:17', '2021-12-28 13:22:39'),
(2, 7, 'Andrea Santana Adzani', '085156570034', 'hgfddds', 2750000, 3000000, 225000, 1, '2021-12-28 02:52:34', '2021-12-28 13:40:37'),
(3, 9, 'Andrea Santana asdasdasd', '085156570034', 'asdasd', 2750000, 3000000, 225000, 1, '2021-12-28 02:53:54', '2021-12-28 13:24:40'),
(4, 6, 'Akun Demo9', '085156570034', 'hahaihihihuhuhehe', 2750000, 3000000, 0, 0, '2021-12-28 10:46:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0)Non-Aktif; 1)Aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `password`, `foto`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Andrea', 'andrea@gmail.com', '$2y$10$qT9fEvUicxOe9igwo1LApOOVeK5XAgVj.wbTPt9Uz/QV6nog..cjG', 'True_Experimental1.png', 'asdasdasd', 0, '2021-12-28 00:46:31', '2021-12-28 00:46:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
