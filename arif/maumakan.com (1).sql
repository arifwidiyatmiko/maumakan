-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2015 at 05:15 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `maumakan.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE IF NOT EXISTS `gambar` (
  `id_gambar` int(4) NOT NULL AUTO_INCREMENT,
  `gambar` longtext NOT NULL,
  `id_resto` varchar(4) NOT NULL,
  PRIMARY KEY (`id_gambar`),
  KEY `id_resto` (`id_resto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(5) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
('kaf', 'Kafe'),
('pa', 'Pesan Antar'),
('rcs', 'Restoran Cepat Saji'),
('rk', 'Restoran Keluarga'),
('tkm', 'Toko Kue & Minuman'),
('wkl', 'Warung Kaki Lima');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `foto_profil` longtext NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `restoran`
--

CREATE TABLE IF NOT EXISTS `restoran` (
  `id_resto` varchar(4) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `harga` int(6) NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `menu` varchar(60) NOT NULL,
  `id_kategori` varchar(5) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_resto`),
  KEY `id_kategori` (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restoran`
--

INSERT INTO `restoran` (`id_resto`, `nama`, `alamat`, `telp`, `harga`, `jam_buka`, `jam_tutup`, `menu`, `id_kategori`, `status`) VALUES
('R001', 'McDonald', 'Jl Kumbang no 5', '14045', 50000, '01:00:00', '23:00:00', 'Burger, Fried Chicken', 'rcs', 1),
('R002', 'Mimi Cucu', 'Jl Kumbang no 4', '021-997744', 40000, '10:00:00', '23:00:00', 'Susu Sapi, Kue, Wafer', 'kaf', 1),
('R003', 'Bull Wings', 'Jl Kumbang no 12', '021-575744', 70000, '11:00:00', '23:00:00', 'Steak, Daging Asap', 'rk', 1),
('R004', 'Kabita', 'Jl Lodaya no 6', '', 20000, '08:00:00', '16:00:00', 'Telur Goreng, Tumis Kangkung, Rolade', 'kaf', 1),
('R005', 'Soto Lamongan', 'Jl Lodaya no 8', '', 35000, '17:00:00', '23:00:00', 'Ayam Goreng, Pecel Lele', 'wkl', 1),
('R006', 'KFC', 'Jl Raya Padjajaran 34', '16022', 50000, '01:00:00', '23:00:00', 'Fried Chicken, Burger', 'rcs', 1),
('R007', 'Selera Kita 88', 'Jl Malabar Ujung no 22', '', 30000, '17:00:00', '23:00:00', 'Nasi Goreng, Mie Goreng, Kwetiau', 'wkl', 1),
('R008', 'Ayam Sangar', 'Jl Malabar Ujung no 14', '021-885566', 40000, '10:00:00', '22:00:00', 'Ayam Penyet, Sambal Korek', 'rk', 1),
('R009', 'Hoka Hoka Bento', 'Jl Raya Padjajaran 42', '16055', 50000, '07:00:00', '22:00:00', 'Teriyaki, Roll Egg, Ebi Furai', 'rcs', 1),
('R010', 'Bakso Pak Jaja', 'Jl Taman Kencana no 14', '021-8337788', 40000, '09:00:00', '22:00:00', 'Bakso, Mie Ayam, Pangsit', 'rk', 1),
('R011', 'Steak Ayunda', 'Jl Taman Kencana no 9', '021-8234455', 40000, '11:00:00', '23:00:00', 'Chicken Katsu, Beef Steak', 'rk', 1),
('R012', 'Ny. Yenny Chinese Food', 'Jl. Bina Marga No. 1', '0251-312573', 40000, '10:00:00', '22:00:00', 'Nasi Goreng, Capcay,', 'rk', 1),
('R013', 'Bogor Permai Bakery & Restaurant', 'Jl. Jenderal Sudirman 23 A ', '0251-321115', 25000, '08:00:00', '22:00:00', 'Pancake, Muffin, Pop Ice', 'tkm', 1),
('R014', 'Lautan Restaurant', 'Jl. Jenderal Sudirman No 15', '0251-325859', 30000, '18:00:00', '23:00:00', 'Udang Saos Tiram, Ikan Bakar, Kepiting', 'wkl', 1),
('R015', 'Martabak Bogor Sari', 'Jl Baru No 1', '0251-321655', 30000, '18:00:00', '23:00:00', 'Martabak Telor, Martabak Manis', 'kaf', 1),
('R016', 'Salero Minang', 'Jl. Raya Dramaga Km 7/13', '0251-625712', 35000, '10:00:00', '22:00:00', 'Rendang, Ayam Bakar, Sayur Nangka', 'rk', 1),
('R017', 'Saung Kuring', 'Jl. Baru Kedung Badak No. 9', '0251-331885', 25000, '10:00:00', '22:00:00', 'Ikan Asin, Sayur Asem, Lalapan', 'rk', 0),
('R018', 'Gudeg Lesehan', 'Jl. Raya Kedung Halang No. 145', '0251-652462', 40000, '09:00:00', '19:00:00', 'Gudeg, Nasi Bakar', 'rk', 0),
('R019', 'Domino Pizza', 'Jl Raya Padjajaran 12', '15055', 50000, '07:00:00', '23:00:00', 'Pizza, Sosis, Kue', 'rcs', 0),
('R020', 'Pondok Sate Kelinci Ahooy', 'Jl. Raya Dramaga No 139', '0856-1226488', 30000, '16:00:00', '23:00:00', 'Sate Kelinci, Sate Ayam, Sate Kambing', 'kaf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id_review` int(4) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `id_resto` varchar(4) NOT NULL,
  `isi` longtext NOT NULL,
  `tgl_review` date NOT NULL,
  PRIMARY KEY (`id_review`),
  KEY `email` (`email`),
  KEY `id_resto` (`id_resto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`id_resto`) REFERENCES `restoran` (`id_resto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restoran`
--
ALTER TABLE `restoran`
  ADD CONSTRAINT `restoran_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`email`) REFERENCES `member` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_resto`) REFERENCES `restoran` (`id_resto`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
