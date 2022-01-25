-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2021 at 03:02 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(155) NOT NULL,
  `keterangan` varchar(155) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `keterangan`, `id_kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'Daster Kuning Manis', 'Daster untuk ibu-ibu kece', 2, 249000, 25, 'daster1.jpg'),
(2, 'Kaos putih', 'Pakaian untuk jalan-jalan', 1, 125000, 22, 'kaos.jpg'),
(3, 'Kaos Pink Yang Manis', 'PakaianAnak.jpg', 5, 75000, 23, 'PakaianAnak.jpg'),
(4, 'Rok Wanita', 'Rok manis', 2, 89000, 16, 'skirtPink.jpg'),
(5, 'Samsung J7 Pro', '5.5 Inch Screen + 3600 MAH + 3 GB RAM', 3, 4000000, 22, 'SamsungJ7Pro.jpg'),
(6, 'Sepatu Nike Casual', 'Sepatu untuk bekerja', 1, 435000, 19, 'sepatu.jpg'),
(7, 'Sepatu Panary', 'Sepatu cocok untuk olahraga', 4, 620000, 22, 'sepatuPanary.jpg'),
(8, 'Samsung S7 Edge', 'Baterai 3600 MAH + Camera 12 MP with smooth dark pictures', 3, 8700000, 27, 'SamsungS7Edge.jpg'),
(11, 'Starglove Nitrile', 'Perlindungan aktivitas keperawatan', 6, 192000, 3, 'StargloveNitrile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `id_invoice` int(11) NOT NULL,
  `nama_lengkap` varchar(155) NOT NULL,
  `alamat` varchar(155) NOT NULL,
  `tanggal_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`id_invoice`, `nama_lengkap`, `alamat`, `tanggal_pesan`, `batas_bayar`) VALUES
(10, 'wimora sarwindo', 'Jakarta', '2021-03-17 23:33:03', '2021-03-18 23:33:03'),
(11, 'wimora sarwindo', 'Jakarta', '2021-03-18 12:32:59', '2021-03-19 12:32:59'),
(12, 'wimora sarwindo', 'Jakarta', '2021-03-19 12:31:21', '2021-03-20 12:31:21'),
(13, 'wimora sarwindo', 'jakarta', '2021-03-19 12:32:35', '2021-03-20 12:32:35'),
(14, 'wimora sarwindo', 'Jakarta', '2021-03-19 12:33:21', '2021-03-20 12:33:21'),
(15, 'wimora sarwindo', 'Jakarta', '2021-03-19 12:45:33', '2021-03-20 12:45:33'),
(16, 'wimora sarwindo', 'Jakarta', '2021-03-19 12:46:23', '2021-03-20 12:46:23'),
(17, 'wimora sarwindo', 'Jakarta', '2021-03-19 13:25:38', '2021-03-20 13:25:38'),
(18, 'wimora sarwindo', 'Jakarta', '2021-03-19 22:04:41', '2021-03-20 22:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pakaian Pria'),
(2, 'Pakaian Wanita'),
(3, 'Elektronik'),
(4, 'Peralatan Olahraga'),
(5, 'Pakaian Anak'),
(6, 'Perlindungan Kesehatan'),
(7, 'Peralatan Dapur'),
(8, 'Peralatan Masak'),
(9, 'Peralatan Dokter');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(155) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id_pesanan`, `id_invoice`, `id_barang`, `nama_barang`, `jumlah`, `harga`) VALUES
(4, 10, 1, 'Daster Kuning', 3, 256000),
(5, 10, 2, 'Kaos putih', 3, 125000),
(6, 11, 2, 'Kaos putih', 1, 125000),
(7, 11, 5, 'Samsung J7 Pro', 1, 4000000),
(8, 11, 1, 'Daster Kuning', 2, 256000),
(9, 11, 4, 'Rok Wanita', 3, 89000),
(10, 12, 1, 'Daster Kuning Manis', 2, 239000),
(11, 13, 1, 'Daster Kuning Manis', 2, 239000),
(12, 14, 1, 'Daster Kuning Manis', 2, 239000),
(13, 15, 2, 'Kaos putih', 3, 125000),
(14, 16, 1, 'Daster Kuning Manis', 3, 239000),
(15, 17, 3, 'Kaos Pink Yang Manis', 4, 75000),
(16, 18, 2, 'Kaos putih', 2, 125000),
(17, 18, 3, 'Kaos Pink Yang Manis', 1, 75000);

--
-- Triggers `tbl_pesanan`
--
DELIMITER $$
CREATE TRIGGER `tbl_pesanan` AFTER INSERT ON `tbl_pesanan` FOR EACH ROW BEGIN

	UPDATE tbl_barang SET stok=stok-NEW.jumlah
    WHERE id_barang=NEW.id_barang;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `image` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL,
  `role_id` int(2) NOT NULL,
  `is_active` int(2) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(2, 'wimora sarwindo', 'wimorasarwindo@yahoo.com', 'user.png', '$2y$10$p/XBawlnDhcdFtwpQE1ag.Z42Hd0Ab2/j8scljGfrru0JLqlACV7m', 2, 1, '2021-03-12 23:12:15'),
(3, 'administrator', 'wimora1991@gmail.com', 'user3.png', '$2y$10$qFY1KPmpqDfrC9jwQzUg3OdaomwM5ji6MlWYJIbFOOKdHEcRbkBIC', 1, 1, '2021-03-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_user_access_menu` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_user_access_menu`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(41, 3, 2),
(42, 3, 3),
(43, 1, 3),
(44, 1, 2),
(45, 2, 4),
(46, 1, 4),
(47, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'invoice'),
(4, 'shoppingCart');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `nama_role`) VALUES
(1, 'admininstrator'),
(2, 'member'),
(3, 'direktur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_user_access_menu`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_user_access_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
