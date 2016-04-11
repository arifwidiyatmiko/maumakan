-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Des 2015 pada 05.22
-- Versi Server: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maumakan.com`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE IF NOT EXISTS `gambar` (
  `id_gambar` int(4) NOT NULL,
  `gambar` longtext NOT NULL,
  `id_resto` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `gambar`, `id_resto`) VALUES
(1, '1449829299.jpg', 1),
(2, '1449870118.jpg', 2),
(3, '1450225875.jpg', 10),
(4, '1450240148.jpg', 3),
(5, '1450247804.jpg', 27);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(5) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
('kaf', 'Kafe'),
('rcs', 'Restoran Cepat Saji'),
('rk', 'Restoran Keluarga'),
('tkm', 'Toko Kue & Minuman'),
('wkl', 'Warung Kaki Lima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `foto_profil` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`email`, `password`, `nama`, `tgl_lahir`, `no_hp`, `foto_profil`) VALUES
('arif@gmail.com', 'arif', 'arif', '2015-12-10', '0989898', '1449884617.jpg'),
('arifwidiyatmiko@apps.ipb.ac.id', 'j3c113025', 'Muhammad Arif Widiyatmiko', '1995-09-10', '085774891653', '1449645739.png'),
('arifwidiyatmiko@gmail.com', '12345678', 'Muhammad Arif Widiyatmiko', '1995-09-10', '696969', '1449646682.jpg'),
('bara@gmail.com', '654321', 'Bara GANTENG', '2002-03-21', '342426', '1449754305.jpg'),
('fadil@gmail.com', 'fadil', 'fadil', '2015-11-15', '089898989', '1449645739.png'),
('rauf@gg', 'rauf', 'rauf', '2015-12-26', '333', '1449796686.jpg'),
('rifqiawaludin@apps.ipb.ac.id', 'RIPKI123', 'rifqi awaludin', '0000-00-00', '085693313262', '1449645739.png'),
('tod.altar@gmail.com', '000000', 'Agiels Althur Faboulus', '1995-01-01', '089865565565', '1450184302.jpg'),
('udah@udah.udah', 'udah', 'udah', '1995-09-10', '0909990990', '1449645739.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `restoran`
--

CREATE TABLE IF NOT EXISTS `restoran` (
  `id_resto` int(4) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `harga` int(6) NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `menu` varchar(60) NOT NULL,
  `id_kategori` varchar(5) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `restoran`
--

INSERT INTO `restoran` (`id_resto`, `nama`, `alamat`, `telp`, `harga`, `jam_buka`, `jam_tutup`, `menu`, `id_kategori`, `status`) VALUES
(1, 'McDonald', 'Jl Kumbang no 5', '14045', 50000, '01:00:00', '23:00:00', 'Burger, Fried Chicken', 'rcs', 1),
(2, 'Mimi Cucu', 'Jl Kumbang no 4', '021-997744', 40000, '10:00:00', '23:00:00', 'Susu Sapi, Kue, Wafer', 'kaf', 1),
(3, 'Bull Wings', 'Jl Kumbang no 12', '021-575744', 70000, '11:00:00', '23:00:00', 'Steak, Daging Asap', 'rk', 1),
(4, 'Kabita', 'Jl Lodaya no 6', '', 20000, '08:00:00', '16:00:00', 'Telur Goreng, Tumis Kangkung, Rolade', 'kaf', 1),
(5, 'Soto Lamongan', 'Jl Lodaya no 8', '', 35000, '17:00:00', '23:00:00', 'Ayam Goreng, Pecel Lele', 'wkl', 1),
(6, 'KFC', 'Jl Raya Padjajaran 34', '16022', 50000, '01:00:00', '23:00:00', 'Fried Chicken, Burger', 'rcs', 1),
(7, 'Selera Kita 88', 'Jl Malabar Ujung no 22', '', 30000, '17:00:00', '23:00:00', 'Nasi Goreng, Mie Goreng, Kwetiau', 'wkl', 1),
(8, 'Ayam Sangar', 'Jl Malabar Ujung no 14', '021-885566', 40000, '10:00:00', '22:00:00', 'Ayam Penyet, Sambal Korek', 'rk', 1),
(9, 'Hoka Hoka Bento', 'Jl Raya Padjajaran 42', '16055', 50000, '07:00:00', '22:00:00', 'Teriyaki, Roll Egg, Ebi Furai', 'rcs', 1),
(10, 'Bakso Pak Jaja', 'Jl Taman Kencana no 14', '021-8337788', 40000, '09:00:00', '22:00:00', 'Bakso, Mie Ayam, Pangsit', 'rk', 1),
(11, 'Steak Ayunda', 'Jl Taman Kencana no 9', '021-8234455', 40000, '11:00:00', '23:00:00', 'Chicken Katsu, Beef Steak', 'rk', 1),
(12, 'Ny. Yenny Chinese Food', 'Jl. Bina Marga No. 1', '0251-312573', 40000, '10:00:00', '22:00:00', 'Nasi Goreng, Capcay,', 'rk', 1),
(13, 'Bogor Permai Bakery & Restaurant', 'Jl. Jenderal Sudirman 23 A ', '0251-321115', 25000, '08:00:00', '22:00:00', 'Pancake, Muffin, Pop Ice', 'tkm', 1),
(14, 'Lautan Restaurant', 'Jl. Jenderal Sudirman No 15', '0251-325859', 30000, '18:00:00', '23:00:00', 'Udang Saos Tiram, Ikan Bakar, Kepiting', 'wkl', 1),
(15, 'Martabak Bogor Sari', 'Jl Baru No 1', '0251-321655', 30000, '18:00:00', '23:00:00', 'Martabak Telor, Martabak Manis', 'kaf', 1),
(16, 'Salero Minang', 'Jl. Raya Dramaga Km 7/13', '0251-625712', 35000, '10:00:00', '22:00:00', 'Rendang, Ayam Bakar, Sayur Nangka', 'rk', 1),
(17, 'Saung Kuring', 'Jl. Baru Kedung Badak No. 9', '0251-331885', 25000, '10:00:00', '22:00:00', 'Ikan Asin, Sayur Asem, Lalapan', 'rk', 1),
(18, 'Gudeg Lesehan', 'Jl. Raya Kedung Halang No. 145', '0251-652462', 40000, '09:00:00', '19:00:00', 'Gudeg, Nasi Bakar', 'rk', 1),
(19, 'Domino Pizza', 'Jl Raya Padjajaran 12', '15055', 50000, '07:00:00', '23:00:00', 'Pizza, Sosis, Kue', 'rcs', 1),
(20, 'Pondok Sate Kelinci Ahooy', 'Jl. Raya Dramaga No 139', '0856-1226488', 30000, '16:00:00', '23:00:00', 'Sate Kelinci, Sate Ayam, Sate Kambing', 'kaf', 1),
(21, 'Coffee 27', 'Jl Raya Sukasari no 7 Bogor Timur', '021-877668', 30000, '11:00:00', '23:00:00', 'kopi luwak, hitam, capucino', 'tkm', 1),
(22, 'Coffee 27', 'Jl Raya Sukasari no 7 ', '021-8234455', 30000, '11:00:00', '23:00:00', 'kopi luwak, hitam, capucino', 'tkm', 1),
(23, 'Bebek Goreng H Slamet', 'Jl Baru No 18 ', '021-8337788', 45000, '10:00:00', '23:00:00', 'Nasi, Bebek Goreng, Sambal Korek, Lalapan', 'rk', 1),
(26, 'Hafidz', 'Jl Lodaya no 5 Bogor Utara', '021-8234455', 100000, '08:00:00', '14:00:00', 'telor dadar', 'kaf', 0),
(27, 'Dapur Pink', 'Jl Lodaya no 10 Bogor Timur', '021-8337788', 30000, '08:00:00', '14:00:00', 'Ayam bakar', 'kaf', 1),
(28, 'Mie Aceh 88', 'Jl Baru no 78 ', '021-8776644', 40000, '08:00:00', '12:00:00', 'mie aceh', 'wkl', 0),
(30, 'Piza Huts', 'Jl Raya Padjajaran no 14 Bogor Timur', '333', 45000, '01:00:00', '23:00:00', 'Pizza, Makaroni, Spageti', 'rcs', 0),
(31, 'Mang Jaya', 'Jl Malabar Ujung 44 Bogor Barat', '021-8776677', 40000, '09:00:00', '23:00:00', 'ikan, ayam', 'rcs', 0),
(41, 'Rauf food', 'malabar ujung Bogor Timur', '02122222', 30000, '13:00:00', '23:30:00', 'Kopi,roti, kue, sate', 'kaf', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id_review` int(4) NOT NULL,
  `email` varchar(40) NOT NULL,
  `id_resto` int(4) NOT NULL,
  `isi` longtext NOT NULL,
  `tgl_review` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`id_review`, `email`, `id_resto`, `isi`, `tgl_review`) VALUES
(6, 'arifwidiyatmiko@gmail.com', 16, 'Salah satu restoran favorit keluarga ada di Pacific Place. Menu favorit roti canai kari ayam, mango chicken, sizzling beef dan udang mayonaise. Ikan otak-otak dan nyonya nasi lemaknya juga enak!', '2015-12-07'),
(7, 'arifwidiyatmiko@gmail.com', 12, 'vSalah satu restoran favorit keluarga ada di Pacific Place. Menu favorit roti canai kari ayam, mango chicken, sizzling beef dan udang mayonaise. Ikan otak-otak dan nyonya nasi lemaknya juga enak!sasd', '2015-12-07'),
(8, 'arifwidiyatmiko@gmail.com', 16, 'saya suka salero minang', '2015-12-07'),
(9, 'arifwidiyatmiko@gmail.com', 16, 'Salero minang membuat saya bersemangat', '2015-12-07'),
(10, 'bara@gmail.com', 3, 'Bull Wings adalah tempat makan favorti saya, steaknya enak, krenyes... nyess', '2015-12-10'),
(11, 'rauf@gg', 6, 'aww super', '2015-12-11'),
(12, 'bara@gmail.com', 16, 'Saya Suka rendang di sini ', '2015-12-11'),
(13, 'bara@gmail.com', 11, 'SAYA SUKA SEKALI STEAK INI', '2015-12-11'),
(14, 'rauf@gg', 1, 'Saya suka ayam McDonald', '2015-12-11'),
(15, 'tod.altar@gmail.com', 6, 'saya suka ayam KFC\r\n', '2015-12-15'),
(17, 'udah@udah.udah', 2, 'Saya suka cucu nya', '2015-12-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_resto` (`id_resto`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`id_resto`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `email` (`email`),
  ADD KEY `id_resto` (`id_resto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `restoran`
--
ALTER TABLE `restoran`
  MODIFY `id_resto` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`id_resto`) REFERENCES `restoran` (`id_resto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `restoran`
--
ALTER TABLE `restoran`
  ADD CONSTRAINT `restoran_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_resto`) REFERENCES `restoran` (`id_resto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`email`) REFERENCES `member` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
