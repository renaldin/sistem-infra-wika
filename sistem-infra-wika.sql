-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 02:37 PM
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `role` enum('Admin','Tim Proyek','Head Office') NOT NULL,
  `foto_user` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `jabatan`, `nip`, `password`, `role`, `foto_user`) VALUES
(1, 'Admin', 'Admin', '11111', '$2y$10$sIgZRbYhk3OmrUSTZBJyH.qMkghMa7bdaAFwODNfSCZ8OIfsB4cZi', 'Admin', NULL),
(9, 'Tim Proyek', 'Kesie Eng', '22222', '$2y$10$sIgZRbYhk3OmrUSTZBJyH.qMkghMa7bdaAFwODNfSCZ8OIfsB4cZi', 'Tim Proyek', NULL),
(10, 'Head Office', 'Head Office', '33333', '$2y$10$sIgZRbYhk3OmrUSTZBJyH.qMkghMa7bdaAFwODNfSCZ8OIfsB4cZi', 'Tim Proyek', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
