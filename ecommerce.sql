-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2014 at 03:51 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kategori` varchar(5) NOT NULL,
  `keterangan` text NOT NULL,
  `file_gambar` varchar(30) NOT NULL,
  `tampil` text NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `tanggal_insert` date NOT NULL,
  `tanggal_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `id_kategori`, `keterangan`, `file_gambar`, `tampil`, `harga`, `berat`, `stok`, `tanggal_insert`, `tanggal_update`) VALUES
('10001', 'Asus', '001', 'yjkwrjrfy 5yws6yohdajgcbfaehv>KB', 'hydhyhtgh', 'hyhdgdfhyh', 9000000, 2, 11, '2013-12-01', '2013-12-21'),
('10002', 'MacPro', '001', 'e abwrvacrevwacs', 'rwwefrgh', 'vsgwsbbw', 13000000, 3, 11, '2013-12-01', '2013-12-21'),
('10003', 'Acer', '001', 'hcufhsk', 'lkjnfljng', 'jlwhnfglshnv', 8500000, 2, 11, '2013-12-01', '2013-12-21'),
('10004', 'Toshiba', '001', 'lkjlhfgk', 'opsiphrios', 'opiphgrs', 9500000, 3, 11, '2013-12-01', '2013-12-21'),
('20001', 'Lenovo', '002', 'ljnlfcd', 'lijifjloawi', 'hlhfpwah', 3000000, 0, 11, '2013-12-01', '2013-12-21'),
('20002', 'IPhone', '002', 'hjabksa', 'jnkan', 'owjoaj', 13000000, 1, 11, '2013-12-01', '2013-12-21'),
('20003', 'Sony', '002', 'inkac', 'kjnljqhu', 'quhnljnd', 5500000, 0, 11, '2013-12-01', '2013-12-21'),
('20004', 'Samsung', '002', 'njbnhac', 'jnkjhb', 'ajoijw', 3900000, 0, 11, '2013-12-01', '2013-12-21'),
('30001', 'Mouse', '003', 'knkjhk', 'dsfwaf', 'awdwdef', 15000, 0, 11, '2013-12-01', '2013-12-21'),
('30002', 'Speaker', '003', 'gjhfvagf', 'iuyiuyeqi', 'pkjbvjh', 300000, 1, 11, '2013-12-01', '2013-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `detail_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` varchar(5) NOT NULL,
  `quantity` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_penjualan`, `id_barang`, `quantity`, `harga`) VALUES
(11001, '10001', 1, 9000000),
(11002, '20001', 1, 3000000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(3) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`) VALUES
('001', 'komputer'),
('002', 'smartphone'),
('003', 'accesoris');

-- --------------------------------------------------------

--
-- Table structure for table `konfirm_pembayaran`
--

CREATE TABLE IF NOT EXISTS `konfirm_pembayaran` (
  `id_penjualan` int(11) NOT NULL,
  `nama_bank` varchar(20) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `scan_struk` varchar(40) NOT NULL,
  `verifikasi` varchar(40) NOT NULL,
  `id_petugas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id_kota` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `id_provinsi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `id_kota` varchar(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no telpon` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
`id_penjualan` int(11) NOT NULL,
  `id_pelanggan` varchar(5) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_berat` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `jenis_pengiriman` varchar(10) NOT NULL,
  `nama_kirim` varchar(30) NOT NULL,
  `alamat_kirim` text NOT NULL,
  `id_kota_kirim` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11003 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_pelanggan`, `tgl_penjualan`, `total_harga`, `total_item`, `total_berat`, `ongkir`, `jenis_pengiriman`, `nama_kirim`, `alamat_kirim`, `id_kota_kirim`) VALUES
(11001, '123', '2014-01-01', 9000000, 1, 2, 5000, 'fast', 'yuki', 'nobi nobi', '33'),
(11002, '12345', '2014-12-09', 3000000, 1, 0, 90000, 'Express', 'Yono', 'Sidodadi', '32');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `id_petugas` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `id_provinsi` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status_penjualan`
--

CREATE TABLE IF NOT EXISTS `status_penjualan` (
  `id_penjualan` varchar(10) NOT NULL,
  `id_status` varchar(10) NOT NULL,
  `tanggal_update` date NOT NULL,
  `id_petugas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tarif ongkir`
--

CREATE TABLE IF NOT EXISTS `tarif ongkir` (
  `id_kota_tujuan` varchar(5) NOT NULL,
  `jenis_pengiriman` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
 ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfirm_pembayaran`
--
ALTER TABLE `konfirm_pembayaran`
 ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
 ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
 ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
 ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
 ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `status_penjualan`
--
ALTER TABLE `status_penjualan`
 ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `tarif ongkir`
--
ALTER TABLE `tarif ongkir`
 ADD PRIMARY KEY (`id_kota_tujuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11003;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
