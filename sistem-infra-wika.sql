-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 06:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem-infra-wika`
--

-- --------------------------------------------------------

--
-- Table structure for table `monthly_report`
--

CREATE TABLE `monthly_report` (
  `id_monthly_report` int(11) NOT NULL,
  `id_projek` int(11) DEFAULT NULL,
  `realisasi` varchar(255) DEFAULT NULL,
  `implementasi_bim` varchar(255) DEFAULT NULL,
  `kesiapan_bim_5d` varchar(255) DEFAULT NULL,
  `evidence_link` text DEFAULT NULL,
  `eng_issue` text DEFAULT NULL,
  `lean_construction` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projek`
--

CREATE TABLE `projek` (
  `id_projek` int(11) NOT NULL,
  `nama_projek` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tipe_konstruksi` varchar(255) DEFAULT NULL,
  `prioritas` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `id_kesie_eng` int(11) DEFAULT NULL,
  `coordinat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `role` enum('Admin','Tim Proyek','Head Office') NOT NULL,
  `foto_user` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `jabatan`, `nip`, `telepon`, `password`, `role`, `foto_user`) VALUES
(1, 'Admin', 'Admin', '11111', '0898972836423', '$2y$10$sIgZRbYhk3OmrUSTZBJyH.qMkghMa7bdaAFwODNfSCZ8OIfsB4cZi', 'Admin', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `monthly_report`
--
ALTER TABLE `monthly_report`
  ADD PRIMARY KEY (`id_monthly_report`);

--
-- Indexes for table `projek`
--
ALTER TABLE `projek`
  ADD PRIMARY KEY (`id_projek`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `monthly_report`
--
ALTER TABLE `monthly_report`
  MODIFY `id_monthly_report` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projek`
--
ALTER TABLE `projek`
  MODIFY `id_projek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
