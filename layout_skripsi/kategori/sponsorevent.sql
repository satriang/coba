-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 22 Jan 2021 pada 05.15
-- Versi Server: 10.1.26-MariaDB
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
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id_event` int(3) NOT NULL,
  `id_eventcreator` int(3) NOT NULL,
  `id_kategori_event` int(3) NOT NULL,
  `nama_event` varchar(40) NOT NULL,
  `tanggal` date NOT NULL,
  `proposal` varchar(30) NOT NULL,
  `lokasi_event` text NOT NULL,
  `status_terdanai` varchar(40) NOT NULL,
  `tanggal_terlaksana` date DEFAULT NULL,
  `status_terlaksana` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `id_eventcreator`, `id_kategori_event`, `nama_event`, `tanggal`, `proposal`, `lokasi_event`, `status_terdanai`, `tanggal_terlaksana`, `status_terlaksana`) VALUES
(1, 1, 1, 'Sounderlina', '2020-11-18', 'ada', 'jl ng satria utomo no 9, nganjuk', 'belum terdanai', '2020-11-18', 'belum terlaksana'),
(2, 1, 2, 'Drifting', '2020-11-03', 'ada', 'lapangan sultan ng satria nganjuk', 'belum terdanai', '2020-11-03', 'belum terlaksana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_creator`
--

CREATE TABLE `event_creator` (
  `id_event_creator` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `nama_eo` varchar(20) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event_creator`
--

INSERT INTO `event_creator` (`id_event_creator`, `id_user`, `nama_eo`, `alamat`, `no_telp`, `email`) VALUES
(1, 1, 'satria eo', 'nganjuk', '085799414352', 'ngsatria@gmail.com'),
(2, 2, 'Ngestu eo', 'Jogja', '023408790567', 'satsat@satria.com'),
(3, 3, 'tiok eo', 'solo', '076556788976', 'tiok@tiok.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_event`
--

CREATE TABLE `kategori_event` (
  `id_kategori_event` int(3) NOT NULL,
  `kategori_event` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_event`
--

INSERT INTO `kategori_event` (`id_kategori_event`, `kategori_event`) VALUES
(1, 'Musik'),
(2, 'Otomotif'),
(3, 'Lomba'),
(4, 'Pameran'),
(5, 'Sport'),
(6, 'Pendidikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sponsorship`
--

CREATE TABLE `sponsorship` (
  `id_sponsorship` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `nama_sponsorship` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `dana_maksimal` int(20) NOT NULL,
  `deskripsi_sponsorship` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `username` char(30) NOT NULL,
  `password` char(20) NOT NULL,
  `level` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'satria', 'satria123', 'event_creator'),
(2, 'wahyu', 'satria123', 'event_creator'),
(3, 'ngestu', 'satria123', 'event_creator'),
(4, 'putra', 'satria123', 'sponsorship'),
(5, 'tiok', 'satria123', 'sponsorship'),
(6, 'santi', 'satria123', 'sponsorship');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_eventcreator` (`id_eventcreator`),
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
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id_eventcreator`) REFERENCES `event_creator` (`id_event_creator`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`id_kategori_event`) REFERENCES `kategori_event` (`id_kategori_event`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `event_creator`
--
ALTER TABLE `event_creator`
  ADD CONSTRAINT `event_creator_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sponsorship`
--
ALTER TABLE `sponsorship`
  ADD CONSTRAINT `sponsorship_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
