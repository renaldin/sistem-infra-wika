-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 05:13 PM
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
-- Table structure for table `detail_tim_proyek`
--

CREATE TABLE `detail_tim_proyek` (
  `id_detail_tim_proyek` int(11) NOT NULL,
  `id_tim_proyek` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_tim_proyek`
--

INSERT INTO `detail_tim_proyek` (`id_detail_tim_proyek`, `id_tim_proyek`, `id_user`) VALUES
(5, 3, 14),
(6, 3, 15),
(7, 4, 15);

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_ki_km`
--

CREATE TABLE `monitoring_ki_km` (
  `id_monitoring_ki_km` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_proyek` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tanggal_update` date DEFAULT NULL,
  `realisasi` int(11) DEFAULT 0,
  `progress` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_kolaborasi_ki_km`
--

CREATE TABLE `monitoring_kolaborasi_ki_km` (
  `id_monitoring_kolaborasi_ki_km` int(11) NOT NULL,
  `jenis_departemen` varchar(255) DEFAULT NULL,
  `nama_proyek` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `nip_penulis` varchar(255) DEFAULT NULL,
  `proses_penulisan` int(11) DEFAULT NULL,
  `proses_upload` int(11) DEFAULT NULL,
  `approval_atasan_langsung` int(11) DEFAULT NULL,
  `approval_pic_divisi` int(11) DEFAULT NULL,
  `approval_pic_pusat` int(11) DEFAULT NULL,
  `published` int(11) DEFAULT NULL,
  `tanggal_published` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `pic_divisi` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_license_software`
--

CREATE TABLE `monitoring_license_software` (
  `id_monitoring_license_software` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_lps`
--

CREATE TABLE `monitoring_lps` (
  `id_monitoring_lps` int(11) NOT NULL,
  `jenis_dokumen` varchar(255) DEFAULT NULL,
  `nama_dokumen` varchar(255) DEFAULT NULL,
  `pdf_bajo` int(11) DEFAULT NULL,
  `native_bajo` int(11) DEFAULT NULL,
  `pdf_bypss` int(11) DEFAULT NULL,
  `native_bypss` int(11) DEFAULT NULL,
  `pdf_g20` int(11) DEFAULT NULL,
  `native_g20` int(11) DEFAULT NULL,
  `pdf_gomur` int(11) DEFAULT NULL,
  `native_gomur` int(11) DEFAULT NULL,
  `pdf_kukaw` int(11) DEFAULT NULL,
  `native_kukaw` int(11) DEFAULT NULL,
  `pdf_seitai` int(11) DEFAULT NULL,
  `native_seitai` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_rkp`
--

CREATE TABLE `monitoring_rkp` (
  `id_monitoring_rkp` int(11) NOT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `kode_spk` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `prepared_by_divisi` varchar(255) DEFAULT NULL,
  `checked_by` varchar(255) DEFAULT NULL,
  `form_evaluasi` text DEFAULT NULL,
  `tanggal_monitoring_rkp` date DEFAULT NULL,
  `created_by` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_report`
--

CREATE TABLE `monthly_report` (
  `id_monthly_report` int(11) NOT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `realisasi_proyek` varchar(255) DEFAULT NULL,
  `implementasi_bim` varchar(255) DEFAULT NULL,
  `kesiapan_bim5d` varchar(255) DEFAULT NULL,
  `kendala_implementasi_bim` text DEFAULT NULL,
  `engineering_issue_berjalan` text DEFAULT NULL,
  `masalah_produksi_berjalan` text DEFAULT NULL,
  `konsep_lean_construction_berjalan` text DEFAULT NULL,
  `feedback_untuk_perusahaan` text DEFAULT NULL,
  `progress` varchar(255) DEFAULT NULL,
  `evidence_link` text DEFAULT NULL,
  `tanggal_report` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `nama_proyek` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tipe_konstruksi` varchar(255) DEFAULT NULL,
  `prioritas` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `id_tim_proyek` int(11) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `status_implementasi` varchar(255) DEFAULT NULL,
  `tiga_d` int(11) NOT NULL DEFAULT 0,
  `empat_d` int(11) NOT NULL DEFAULT 0,
  `lima_d` int(11) NOT NULL DEFAULT 0,
  `cde` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `nama_proyek`, `tanggal`, `tipe_konstruksi`, `prioritas`, `status`, `id_tim_proyek`, `latitude`, `longitude`, `status_implementasi`, `tiga_d`, `empat_d`, `lima_d`, `cde`) VALUES
(1, 'Proyek A', '2023-10-30', 'Road & Bridge', 'Prioritas 1', 'Proyek Besar', 3, '11111', '11111', NULL, 0, 0, 0, 0),
(2, 'Proyek B', '2023-10-30', 'Road & Bridge', 'Prioritas 1', 'Proyek Besar', 4, '11111', '11111', NULL, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tim_proyek`
--

CREATE TABLE `tim_proyek` (
  `id_tim_proyek` int(11) NOT NULL,
  `nama_tim_proyek` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_dibuat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tim_proyek`
--

INSERT INTO `tim_proyek` (`id_tim_proyek`, `nama_tim_proyek`, `deskripsi`, `tanggal_dibuat`) VALUES
(3, 'Tim Proyek A', 'Deskripsi Proyek A', '2023-10-29'),
(4, 'Tim Proyek B', 'Deskripsi Tim Proyek B', '2023-10-29'),
(5, 'Tim Proyek C', 'Deskripsi Tim Proyek C', '2023-10-29'),
(6, 'Tim Proyek D', 'Deskripsi Tim Proyek D', '2023-10-29'),
(7, 'Tim Proyek E', 'Deskripsi Tim Proyek E', '2023-10-29');

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
(1, 'Admin', 'Admin', '11111', '0898972836423', '$2y$10$sIgZRbYhk3OmrUSTZBJyH.qMkghMa7bdaAFwODNfSCZ8OIfsB4cZi', 'Admin', NULL),
(12, 'Anggota Tim Proyek A', 'General Manager', '55555', '0898988397872', '$2y$10$ftafxo0GcSpHkcObrW6K1.nX.iymQI7vZZIt58uEHn8TOn6qQP8Z6', 'Tim Proyek', '10282023195739 Anggota Tim Proyek A.jpg'),
(13, 'User 1', 'Staf', '10101010', '0898997198934', '$2y$10$648WzdZ.9DPsHOjmIHKNrOT2KPnQ4stodXLH0PmsZzdTuzuDHE58K', 'Tim Proyek', '10282023201444 User 1.jpg'),
(14, 'Tim Proyek 1', 'Kepala Seksi Proyek Menengah', '12222', '089899179868', '$2y$10$UmuCwinglz8O.0AUhx7a9OZf152cVrJd9LNe275eBVON1ctXDnkru', 'Tim Proyek', '10292023085008 Tim Proyek 1.jpg'),
(15, 'Tim Proyek 2', 'Staf', '22222', '089899728363', '$2y$10$/.KpEZ8tRpln1Lt9zXd1T.JQBOSb2z/mZoFx5uhzXTCVkbrtosl3e', 'Tim Proyek', '10292023085103 Tim Proyek 2.jpg'),
(16, 'Tim Proyek 3', 'Staf', '322222', '0897867858323', '$2y$10$GbSqZohjhFBpVfg7GZ.s0.J1q7ipXJCtMLIIcA.nT7VHqE2CBcCr2', 'Tim Proyek', '10292023085157 Tim Proyek 3.jpg'),
(17, 'Tim Proyek 4', 'Staf', '42222', '089978628744', '$2y$10$iNWgb5fQFni1.gRk.IDD0OKUI1BA.oOgCbgkZlz.c67KIyncau.4S', 'Tim Proyek', '10292023085235 Tim Proyek 4.jpg'),
(18, 'Tim Proyek 5', 'Staf', '52222', '089998923432543', '$2y$10$bZBZdvRy9QKaBSRM7KdZhOsYi2WwaBhtLA8JQ3f2iYlgj5or4jt6C', 'Tim Proyek', '10292023085320 Tim Proyek 5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_tim_proyek`
--
ALTER TABLE `detail_tim_proyek`
  ADD PRIMARY KEY (`id_detail_tim_proyek`);

--
-- Indexes for table `monitoring_ki_km`
--
ALTER TABLE `monitoring_ki_km`
  ADD PRIMARY KEY (`id_monitoring_ki_km`);

--
-- Indexes for table `monitoring_kolaborasi_ki_km`
--
ALTER TABLE `monitoring_kolaborasi_ki_km`
  ADD PRIMARY KEY (`id_monitoring_kolaborasi_ki_km`);

--
-- Indexes for table `monitoring_license_software`
--
ALTER TABLE `monitoring_license_software`
  ADD PRIMARY KEY (`id_monitoring_license_software`);

--
-- Indexes for table `monitoring_lps`
--
ALTER TABLE `monitoring_lps`
  ADD PRIMARY KEY (`id_monitoring_lps`);

--
-- Indexes for table `monitoring_rkp`
--
ALTER TABLE `monitoring_rkp`
  ADD PRIMARY KEY (`id_monitoring_rkp`);

--
-- Indexes for table `monthly_report`
--
ALTER TABLE `monthly_report`
  ADD PRIMARY KEY (`id_monthly_report`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indexes for table `tim_proyek`
--
ALTER TABLE `tim_proyek`
  ADD PRIMARY KEY (`id_tim_proyek`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_tim_proyek`
--
ALTER TABLE `detail_tim_proyek`
  MODIFY `id_detail_tim_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `monitoring_ki_km`
--
ALTER TABLE `monitoring_ki_km`
  MODIFY `id_monitoring_ki_km` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monitoring_kolaborasi_ki_km`
--
ALTER TABLE `monitoring_kolaborasi_ki_km`
  MODIFY `id_monitoring_kolaborasi_ki_km` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monitoring_license_software`
--
ALTER TABLE `monitoring_license_software`
  MODIFY `id_monitoring_license_software` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monitoring_lps`
--
ALTER TABLE `monitoring_lps`
  MODIFY `id_monitoring_lps` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monitoring_rkp`
--
ALTER TABLE `monitoring_rkp`
  MODIFY `id_monitoring_rkp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monthly_report`
--
ALTER TABLE `monthly_report`
  MODIFY `id_monthly_report` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tim_proyek`
--
ALTER TABLE `tim_proyek`
  MODIFY `id_tim_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
