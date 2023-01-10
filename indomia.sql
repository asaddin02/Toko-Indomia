-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Sep 2022 pada 14.55
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indomia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kode_barang` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gambar` varchar(64) NOT NULL,
  `harga` double NOT NULL,
  `stok` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama`, `gambar`, `harga`, `stok`) VALUES
(12, 'kopi abc susu 10pcs', '630171199fac9.png', 11000, 30),
(13, 'kopi abc 10pcs', '630171ba6d7e3.png', 10000, 20),
(14, 'kopi kapal api 10 pcs', '630171f81ede8.png', 4500, 50),
(15, 'rokok surya 12 ', '630172282a238.png', 21000, 30),
(16, 'Rokok Djarum76 12', '63017269855f5.png', 13000, 17),
(17, 'rokok sampoerna 16', '63017294e45a9.png', 24500, 32),
(18, 'rokok LA lights 16', '6301735f1c6c4.png', 22000, 21),
(19, 'jajan komo', '63017385c060f.png', 500, 400),
(20, 'jajan tango 130gr', '630173fe19e5d.png', 5000, 50),
(21, 'jajan chocolatos 1 pack', '630174a03f377.png', 20000, 10),
(22, 'jajan keripik pisang', '630174d241184.png', 2000, 100),
(23, 'beras 25kg', '630174fad7abf.png', 258000, 20),
(24, 'elpiji 3kg', '6301756a4788c.png', 18500, 20),
(25, 'aqua galon', '63017583f06aa.png', 19000, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `detail_penjualan` (
  `nota_penjualan` int(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `jumlah_beli` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`nota_penjualan`, `kode_barang`, `nama`, `harga`, `jumlah_beli`, `total`) VALUES
(5, 18, '18.rokok LA lights 16', 22000, 1, 22000),
(5, 20, '20.jajan tango 130gr', 5000, 10, 50000),
(5, 15, '15.rokok surya 12 ', 21000, 2, 42000),
(2, 19, '19.jajan komo', 500, 3, 1500),
(1, 14, '14.kopi kapal api 10 pcs', 4500, 3, 13500),
(2, 18, '18.rokok LA lights 16', 22000, 2, 44000),
(3, 15, '15.rokok surya 12 ', 21000, 3, 63000),
(4, 15, '15.rokok surya 12 ', 21000, 4, 84000),
(5, 16, '16.Rokok Djarum76 12', 13000, 2, 26000),
(6, 15, '15.rokok surya 12 ', 21000, 2, 42000),
(6, 24, '24.elpiji 3kg', 18500, 3, 55500),
(7, 16, '16.Rokok Djarum76 12', 13000, 3, 39000),
(7, 14, '14.kopi kapal api 10 pcs', 4500, 3, 13500),
(7, 16, '16.Rokok Djarum76 12', 13000, 3, 39000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_kelahiran` varchar(20) NOT NULL,
  `jk` char(1) NOT NULL,
  `agama` char(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `gambar` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `alamat`, `tgl_lahir`, `tempat_kelahiran`, `jk`, `agama`, `username`, `password`, `jabatan`, `gambar`) VALUES
(1, 'Prasada Arif Nurudin', 'Dsn.Babat RT/RW 001/012, Kel.Randupitu, Kec.Gempol, Pasuruan', '2001-07-02', 'Kabupaten Pasuruan', 'L', 'Islam', 'prasada', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '6300408fd0512.jpg'),
(2, 'Prasada Arif Nurudin', 'Babat RT/RW 001/012, Randupitu, Gempol, Pasuruan', '2001-07-02', 'Pasuruan', 'L', 'Islam', 'arif', 'c7911af3adbd12a035b289556d96470a', 'Kasir', '630648604ed43.jpg'),
(3, 'Budi', 'ngerong, gempol', '2022-08-09', 'Malang', 'L', 'Budha', 'budi', 'c7911af3adbd12a035b289556d96470a', 'kasir', '63081b8d06644.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_penjualan`
--

CREATE TABLE IF NOT EXISTS `trans_penjualan` (
  `nota_penjualan` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `grand_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trans_penjualan`
--

INSERT INTO `trans_penjualan` (`nota_penjualan`, `tanggal`, `grand_total`) VALUES
(1, '2022-08-31 00:00:00', 13500),
(2, '2022-08-31 00:00:00', 45500),
(3, '2022-08-31 00:00:00', 63000),
(4, '2022-08-31 00:00:00', 84000),
(5, '2022-08-31 00:00:00', 140000),
(6, '2022-08-31 00:00:00', 97500),
(7, '2022-09-01 00:00:00', 91500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `trans_penjualan`
--
ALTER TABLE `trans_penjualan`
  ADD PRIMARY KEY (`nota_penjualan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kode_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
