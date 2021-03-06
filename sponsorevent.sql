-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2021 at 02:42 AM
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
  `nama_event` varchar(40) NOT NULL,
  `tanggal` date NOT NULL,
  `proposal` text NOT NULL,
  `lokasi_event` text NOT NULL,
  `status_terdanai` varchar(40) NOT NULL,
  `tanggal_terlaksana` date DEFAULT NULL,
  `status_terlaksana` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `id_event_creator`, `id_kategori_event`, `nama_event`, `tanggal`, `proposal`, `lokasi_event`, `status_terdanai`, `tanggal_terlaksana`, `status_terlaksana`) VALUES
('EVT001', 'ECT001', 'KTE001', 'Sounderlina', '2020-11-18', 'ada1.pdf', 'jl ng satria utomo no 9, nganjuk', 'sudah terdanai', '2020-11-18', 'sudah terlaksana'),
('EVT002', 'ECT001', 'KTE002', 'Satria Car Meet', '2020-11-03', 'ada.pdf', 'lapangan sultan ng satria nganjuk', 'belum terdanai', '0000-00-00', 'belum terlaksana'),
('EVT003', 'ECT001', 'KTE005', 'Big Drifting', '2021-03-26', 'EVT003_2021-03-24_07:21:49_ayamekecing.pdf', ' Stadion Maguwo Jogja', 'belum terdanai', '0000-00-00', 'belum terlaksana');

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
('PJE003', 'EVT003', 'SPR002', 0, 'DI TOLAK');

-- --------------------------------------------------------

--
-- Table structure for table `sponsorship`
--

CREATE TABLE `sponsorship` (
  `id_sponsorship` varchar(6) NOT NULL,
  `id_user` varchar(6) DEFAULT NULL,
  `nama_sponsorship` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `dana_maksimal` int(20) NOT NULL,
  `deskripsi_sponsorship` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsorship`
--

INSERT INTO `sponsorship` (`id_sponsorship`, `id_user`, `nama_sponsorship`, `alamat`, `no_telp`, `dana_maksimal`, `deskripsi_sponsorship`) VALUES
('SPR001', 'USR004', 'Putra Corp', 'Sugihwaras, Kec. Prambon, Kabupaten Nganjuk, Jawa Timur 64484', '076556788976', 5000000, 'produk kesehatan'),
('SPR002', 'USR005', 'Tiok corp', '  Sugihwaras, Kec. Prambon, Kabupaten Nganjuk, Jawa Timur 64484', '023408790567', 7000000, 'produk otomotif lubricant'),
('SPR003', 'USR006', 'Santi Corp', 'Sugihwaras, Kec. Prambon, Kabupaten Nganjuk, Jawa Timur 64484', '085799414352', 10000000, 'produk minuman'),
('SPR004', 'USR007', 'SASA CORP', 'Jombang', '076556788976', 10000000, 'tentang olah raga ');

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
-- Indexes for table `kategori_event`
--
ALTER TABLE `kategori_event`
  ADD PRIMARY KEY (`id_kategori_event`);

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
