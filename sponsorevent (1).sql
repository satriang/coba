-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2021 at 07:31 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sponsorevent`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` varchar(6) NOT NULL,
  `id_event_creator` varchar(6) NOT NULL,
  `id_kategori_event` varchar(6) NOT NULL,
  `id_kategori_peserta` varchar(6) NOT NULL,
  `nama_event` varchar(40) NOT NULL,
  `tanggal` date NOT NULL,
  `proposal` text NOT NULL,
  `lokasi_event` text NOT NULL,
  `deskripsi_event` text NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `dana_anggaran` double NOT NULL DEFAULT '0',
  `dana_terkumpul` double NOT NULL DEFAULT '0',
  `tanggal_batas_pendanaan` date NOT NULL,
  `status_terdanai` varchar(40) NOT NULL,
  `feedback` text NOT NULL,
  `tanggal_terlaksana` date DEFAULT NULL,
  `status_terlaksana` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `id_event_creator`, `id_kategori_event`, `id_kategori_peserta`, `nama_event`, `tanggal`, `proposal`, `lokasi_event`, `deskripsi_event`, `jumlah_peserta`, `dana_anggaran`, `dana_terkumpul`, `tanggal_batas_pendanaan`, `status_terdanai`, `feedback`, `tanggal_terlaksana`, `status_terlaksana`) VALUES
('EVT001', 'ECT001', 'KTE001', 'IKT007', 'Sounderlina', '2021-04-04', 'ada1.pdf', 'jl ng satria utomo no 9, nganjuk', 'Event Parade Musik yang di bintangi band-band asal Indonesia', 1000, 100000000, 100000000, '2021-04-01', 'SUDAH TERDANAI', 'Akan diberikan tenda untuk promosi', '2021-04-04', 'SUDAH TERLAKSANA'),
('EVT002', 'ECT001', 'KTE002', 'IKT007', 'Satria Car Meet', '2020-11-03', 'ada.pdf', 'lapangan sultan ng satria nganjuk', 'Satria Car Meet adalah sebuah event berkumpulnya para pencinta otomotif khususnya mobil dan akan ada kontest mobil untuk para pecinta mobil mulai dari kelas mobil retro, modifikasi, klasik original', 3000, 250000000, 0, '2021-04-08', 'BELUM TERDANAI', 'Layanan yang di dapatkan Sponsorship untuk sumbangan dana 10 % s/d 30 % akan mendapatkan tenda untuk promosi produk, sumbangan dana 40% s/d 60% akan mendapatkan promosi di spanduk, tiket dan mendapatkan tenda untuk promosi produk, sumbangan dan diatas 70% s/d 100% akan diberikan semua area di tenda promosi, promosi di spanduk, tiket, banner dan bendera', '0000-00-00', 'BELUM TERLAKSANA'),
('EVT003', 'ECT001', 'KTE005', 'IKT007', 'Big Drifting', '2021-04-13', 'EVT003_2021-04-05_01:29:04_7_normalisasi_bag1.pdf', ' Stadion Maguwo Jogja', 'Event balap drifting terbesar di Jogja', 5000, 100000000, 100000000, '2021-04-09', 'SUDAH TERDANAI', 'Untuk pendanaan 100% akan di promosikan produknya di setiap media promosi', '0000-00-00', 'BELUM TERLAKSANA'),
('EVT004', 'ECT001', 'KTE001', 'IKT007', 'Festival Band', '2021-04-14', 'EVT004_2021-04-04_09:17:22_kecerdasan-buatan.pdf', ' gnzngsgn', ' banaghah', 5000, 50000000, 0, '2021-04-07', 'BELUM TERDANAI', ' nxnxbzgf', '0000-00-00', 'BELUM TERLAKSANA');

-- --------------------------------------------------------

--
-- Table structure for table `event_creator`
--

CREATE TABLE `event_creator` (
  `id_event_creator` varchar(6) NOT NULL,
  `id_user` varchar(6) NOT NULL,
  `nama_eo` varchar(20) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `no_telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_creator`
--

INSERT INTO `event_creator` (`id_event_creator`, `id_user`, `nama_eo`, `alamat`, `no_telp`) VALUES
('ECT001', 'USR001', 'satria eo', ' nganjuk prambon', '085799414352'),
('ECT002', 'USR002', 'Ngestu eo', 'Jogja', '023408790567'),
('ECT003', 'USR003', 'tiok eo', 'solo', '076556788976');

-- --------------------------------------------------------

--
-- Table structure for table `foto_event`
--

CREATE TABLE `foto_event` (
  `id_foto_event` int(11) NOT NULL,
  `id_event` varchar(6) NOT NULL,
  `nama_foto_event` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_event`
--

INSERT INTO `foto_event` (`id_foto_event`, `id_event`, `nama_foto_event`) VALUES
(4, 'EVT001', 'EVT001_2021-04-05_06:36:34_9f871f929e91e646304f7d4990482a40.jpg'),
(5, 'EVT001', 'EVT001_2021-04-05_06:36:35_penguin-os.jpg'),
(6, 'EVT001', 'EVT001_2021-04-05_06:36:35_plf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_event`
--

CREATE TABLE `kategori_event` (
  `id_kategori_event` varchar(6) NOT NULL,
  `kategori_event` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_event`
--

INSERT INTO `kategori_event` (`id_kategori_event`, `kategori_event`) VALUES
('KTE001', 'Musik'),
('KTE002', 'Otomotif'),
('KTE003', 'Lomba'),
('KTE004', 'Pameran'),
('KTE005', 'Sport'),
('KTE006', 'Pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_peserta`
--

CREATE TABLE `kategori_peserta` (
  `id_kategori_peserta` varchar(6) NOT NULL,
  `kategori_peserta` text NOT NULL,
  `deskripsi_kategori_peserta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_peserta`
--

INSERT INTO `kategori_peserta` (`id_kategori_peserta`, `kategori_peserta`, `deskripsi_kategori_peserta`) VALUES
('IKT001', 'Dibawah 7 Tahun', 'Anak-Anak Usia Dibawah 7 Tahuh'),
('IKT002', 'Diatas 7 Tahun Dibawah 13 Tahun', 'Usia Anak diatas 7 tahun sampai dibawah 13 tahun atau setingkat anak sekolah dasar'),
('IKT003', 'Usia diatas 13 tahun Dibawah 17 tahun', 'Usia remaja diatas usia 13 tahun dan dibawah 17 tahun atau setingkat anak sekolah menengah pertama'),
('IKT004', 'Diatas umur 16 tahun Dibawah umur 19 tahun', 'Usia remaja diatas umur 16 tahun dibawah 19 tahun atau setingkat sekolah menengah atas'),
('IKT005', 'Usia diatas 13 tahun dibawah 19 tahun', 'Usia remaja diatas 13 tahun di bawah 19 tahun atau setingkat sekolah menengah pertama dan sekolah menengah atas'),
('IKT006', 'Umum Wanita', 'Usia tidak ada batas umur tertentu dikhususkan untuk perempuan '),
('IKT007', 'Umum', 'Tidak ada batasan umur baik wanita dan pria');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_sponsorship`
--

CREATE TABLE `kategori_sponsorship` (
  `id_kategori_sponsorship` varchar(6) NOT NULL,
  `nama_kategori_sponsorship` text NOT NULL,
  `deskripsi_kategori_sponsorship` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_sponsorship`
--

INSERT INTO `kategori_sponsorship` (`id_kategori_sponsorship`, `nama_kategori_sponsorship`, `deskripsi_kategori_sponsorship`) VALUES
('IKS001', 'Produk Kesehatan', 'Semua jenis usaha produk kesehatan dan produsen produk kesehatan'),
('IKS002', 'Produk Kecantikan', 'Semua jenus usaha di bidang kecantikan dan Produsen bidang kecantikan'),
('IKS003', 'Produk Sport Olahraga', 'Semua usaha di bidang produk olahraga atau produsen di bidang produk olahraga'),
('IKS004', 'Produk Elektronik dan IT', 'Semua usaha di bidang elektronik dan IT atau produsen di bidang elektronik dan IT'),
('IKS005', 'Produk Otomotif', 'Semua usaha di bidang otomotif atau produsen di bidang otomotif'),
('IKS006', 'Produk Makanan dan Minuman', 'Semua usaha di bidang makanan dan minuman atau produsen makanan dan minuman');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_event`
--

CREATE TABLE `pengajuan_event` (
  `id_pengajuan_event` varchar(6) NOT NULL,
  `id_event` varchar(6) NOT NULL,
  `id_sponsorship` varchar(6) NOT NULL,
  `dana_event` int(20) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_event`
--

INSERT INTO `pengajuan_event` (`id_pengajuan_event`, `id_event`, `id_sponsorship`, `dana_event`, `status`) VALUES
('PJE001', 'EVT001', 'SPR001', 0, 'DI TOLAK'),
('PJE002', 'EVT002', 'SPR002', 1500000, 'DI TERIMA'),
('PJE003', 'EVT003', 'SPR002', 35000000, 'DI TERIMA'),
('PJE004', 'EVT003', 'SPR001', 30000000, 'DI TERIMA'),
('PJE005', 'EVT003', 'SPR004', 35000000, 'DI TERIMA'),
('PJE006', 'EVT001', 'SPR003', 100000000, 'DI TERIMA');

--
-- Triggers `pengajuan_event`
--
DELIMITER $$
CREATE TRIGGER `update_dana_terkumpul` AFTER UPDATE ON `pengajuan_event` FOR EACH ROW BEGIN
 UPDATE event SET dana_terkumpul=dana_terkumpul+NEW.dana_event,
 				status_terdanai = IF(dana_terkumpul >= dana_anggaran,"SUDAH TERDANAI",status_terdanai)
 WHERE id_event=NEW.id_event;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sponsorship`
--

CREATE TABLE `sponsorship` (
  `id_sponsorship` varchar(6) NOT NULL,
  `id_user` varchar(6) DEFAULT NULL,
  `id_kategori_sponsorship` varchar(6) NOT NULL,
  `judul_sponsorship` text NOT NULL,
  `nama_sponsorship` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `deskripsi_sponsorship` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsorship`
--

INSERT INTO `sponsorship` (`id_sponsorship`, `id_user`, `id_kategori_sponsorship`, `judul_sponsorship`, `nama_sponsorship`, `alamat`, `no_telp`, `deskripsi_sponsorship`) VALUES
('SPR001', 'USR004', 'IKS001', 'Produsen Madu Herbal', 'Putra Corp', ' Sugihwaras, Kec. Prambon, Kabupaten Nganjuk, Jawa Timur 64484', '076556788976', 'produk kesehatan madu'),
('SPR002', 'USR005', 'IKS005', 'Produsen Oli Mesin Endudol', 'Tiok corp', '  Sugihwaras, Kec. Prambon, Kabupaten Nganjuk, Jawa Timur 64484', '023408790567', 'produk otomotif lubricant'),
('SPR003', 'USR006', 'IKS006', 'Produsen Sirup Sarjan', 'Santi Corp', 'Sugihwaras, Kec. Prambon, Kabupaten Nganjuk, Jawa Timur 64484', '085799414352', 'produk minuman'),
('SPR004', 'USR007', 'IKS003', 'Produsen Bola Ping Pong ', 'SASA CORP', 'Jombang', '076556788976', 'tentang olah raga ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(6) NOT NULL,
  `email` char(30) NOT NULL,
  `password` char(20) NOT NULL,
  `level` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `level`) VALUES
('USR001', 'satria7@tiok.com', 'satria567', 'event_creator'),
('USR002', 'wahyu@tiok.com', 'satria123', 'event_creator'),
('USR003', 'ngestu@tiok.com', 'satria123', 'event_creator'),
('USR004', 'putra@tiok.com', 'satria123', 'sponsorship'),
('USR005', 'tiok7@tiok.com', 'satria123', 'sponsorship'),
('USR006', 'paksatriang@tiok.com', 'ntiok123', 'sponsorship'),
('USR007', 'sasa@tiok.com', 'satria123', 'sponsorship');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_eventcreator` (`id_event_creator`),
  ADD KEY `id_kategori_event` (`id_kategori_event`);

--
-- Indexes for table `event_creator`
--
ALTER TABLE `event_creator`
  ADD PRIMARY KEY (`id_event_creator`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `foto_event`
--
ALTER TABLE `foto_event`
  ADD PRIMARY KEY (`id_foto_event`);

--
-- Indexes for table `kategori_event`
--
ALTER TABLE `kategori_event`
  ADD PRIMARY KEY (`id_kategori_event`);

--
-- Indexes for table `kategori_peserta`
--
ALTER TABLE `kategori_peserta`
  ADD PRIMARY KEY (`id_kategori_peserta`);

--
-- Indexes for table `kategori_sponsorship`
--
ALTER TABLE `kategori_sponsorship`
  ADD PRIMARY KEY (`id_kategori_sponsorship`);

--
-- Indexes for table `pengajuan_event`
--
ALTER TABLE `pengajuan_event`
  ADD PRIMARY KEY (`id_pengajuan_event`);

--
-- Indexes for table `sponsorship`
--
ALTER TABLE `sponsorship`
  ADD PRIMARY KEY (`id_sponsorship`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto_event`
--
ALTER TABLE `foto_event`
  MODIFY `id_foto_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sponsorship`
--
ALTER TABLE `sponsorship`
  ADD CONSTRAINT `sponsorship_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
