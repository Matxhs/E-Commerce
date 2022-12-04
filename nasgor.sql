-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 12:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nasgor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(7) NOT NULL,
  `foto_menu` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama`, `harga`, `foto_menu`, `deskripsi`, `stok`) VALUES
(1, 'Nasi Goreng Seafood', 25000, 'nasgor_seafood.jpg', 'Nasi Goreng	Seafood		', 15),
(5, 'Nasi Goreng Biasa', 13000, 'nasgor_biasa.jpg', 'Nasi Goreng Biasa		', 10),
(6, 'Nasi Goreng China', 17000, 'nasgor_china.jpg', 'Nasi Goreng China', 10),
(8, 'Nasi Goreng Kambing', 25000, 'nasgor_kambing.jpg', 'Nasi Goreng Kambing								', 10);

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(2) NOT NULL,
  `kota` varchar(60) NOT NULL,
  `tarif` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `kota`, `tarif`) VALUES
(1, 'Jakarta Selatan', 10000),
(2, 'Jakarta barat', 18000),
(3, 'Jakarta Timur', 17000),
(4, 'Jakarta Utara', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(2) NOT NULL,
  `id_pembelian` int(2) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `jumlah` int(7) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 2, 'Agung', '', 0, '2019-08-22', '20190822080605'),
(2, 3, 'Annisa', 'BNI', 68, '2019-10-18', '20191018062055full-image3.jpg'),
(3, 6, 'mira', 'bca', 60000, '2022-08-03', '20220803064823xxx.PNG'),
(4, 7, 'arnold', 'BCA', 40000, '2022-08-08', '20220808053857xxx.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(2) NOT NULL,
  `id_user` int(2) NOT NULL,
  `id_ongkir` int(2) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(7) NOT NULL,
  `nama_kota` varchar(30) NOT NULL,
  `tarif` int(7) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(20) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_user`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(6, 5, 1, '2022-08-03', 60000, 'Jabodetabek', 10000, 'JL.kambing no.2', 'barang dikirim', '12345678'),
(7, 5, 1, '2022-08-08', 35000, 'Jabodetabek', 10000, 'bungur', 'lunas', ''),
(8, 5, 2, '2022-08-15', 43000, '', 18000, 'sasss', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_menu`
--

CREATE TABLE `pembelian_menu` (
  `id_pembelian_menu` int(2) NOT NULL,
  `id_pembelian` int(2) NOT NULL,
  `id_menu` int(2) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `harga` int(7) NOT NULL,
  `subharga` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_menu`
--

INSERT INTO `pembelian_menu` (`id_pembelian_menu`, `id_pembelian`, `id_menu`, `jumlah`, `nama`, `harga`, `subharga`) VALUES
(6, 6, 1, 1, 'Nasi Goreng', 50000, 0),
(7, 7, 1, 1, 'Nasi Goreng Seafood', 25000, 0),
(8, 8, 1, 1, 'Nasi Goreng Seafood', 25000, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(2) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `nama`, `telepon`, `alamat`, `foto`) VALUES
(5, 'midun', 'qwe', 'midun', '321', 'Jl.neptunus', '20220814160333mira.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_menu`
--
ALTER TABLE `pembelian_menu`
  ADD PRIMARY KEY (`id_pembelian_menu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembelian_menu`
--
ALTER TABLE `pembelian_menu`
  MODIFY `id_pembelian_menu` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
