-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 11:36 PM
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
-- Table structure for table `engineering_activity`
--

CREATE TABLE `engineering_activity` (
  `id_engineering_activity` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kategori_pekerjaan` int(11) DEFAULT NULL,
  `tanggal_masuk_kerja` date DEFAULT NULL,
  `status_kerja` varchar(255) DEFAULT NULL,
  `judul_pekerjaan` varchar(255) DEFAULT NULL,
  `durasi` varchar(255) DEFAULT NULL,
  `evidence` varchar(255) DEFAULT NULL,
  `checked` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `engineering_activity`
--

INSERT INTO `engineering_activity` (`id_engineering_activity`, `id_user`, `id_kategori_pekerjaan`, `tanggal_masuk_kerja`, `status_kerja`, `judul_pekerjaan`, `durasi`, `evidence`, `checked`) VALUES
(1, 23, 4, '2023-11-05', 'WFA', 'Judul 1', '2', '11052023222554 23.jpg', 1),
(2, 23, 7, '2023-11-05', 'WFO', 'Judul 2', '2', '11052023222649 23.jpg', 1),
(3, 23, 7, '2023-10-05', 'WFO', 'Judul 3', '2', '11052023222725 23.jpg', 1),
(4, 24, 2, '2023-11-05', 'WFO', 'Judul 1', '2', '11052023222826 24.jpg', 1),
(5, 24, 7, '2023-11-05', 'WFO', 'Judul 2', '2', '11052023222854 24.jpg', 1),
(6, 24, 8, '2023-10-05', 'WFO', 'Judul 3', '2', '11052023222915 24.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pekerjaan`
--

CREATE TABLE `kategori_pekerjaan` (
  `id_kategori_pekerjaan` int(11) NOT NULL,
  `kategori_pekerjaan` varchar(255) DEFAULT NULL,
  `fungsi` varchar(255) DEFAULT NULL,
  `sub_fungsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_pekerjaan`
--

INSERT INTO `kategori_pekerjaan` (`id_kategori_pekerjaan`, `kategori_pekerjaan`, `fungsi`, `sub_fungsi`) VALUES
(1, 'CSI Collecting, Monitoring & Feedback Follow Up', 'Design & Analysis', 'Team Managing'),
(2, 'Project Technical Supporting', 'Design & Analysis', 'Technical Works'),
(3, 'Engineering Clinic', 'Design & Analysis', 'Technical Works'),
(4, 'Quality Engineering Committee (If Any)', 'Design & Analysis', 'Technical Works'),
(5, 'Engineering Work Optimation dan Efficiency Collecting', 'Design & Analysis', 'Technical Works'),
(6, 'Engineering Lesson Learn Register', 'Design & Analysis', 'Technical Works'),
(7, 'Monitoring & Collecting KI/KM Div Infra 2', 'Design & Analysis', 'Technical Works'),
(8, 'Technical Code & Standard Control', 'Design & Analysis', 'Technical Works'),
(9, 'Technical Software Renewing & Personel Capability', 'Design & Analysis', 'Team Managing'),
(10, 'Soil Investigation and Project Data Collecting', 'Design & Analysis', 'Technical Works'),
(11, 'Strategic Programs Planning', 'BIM & Digitalization Engineering', 'Strategic Works'),
(12, 'Management Review (MR) Content Planning', 'BIM & Digitalization Engineering', 'Strategic Works'),
(13, 'Monitoring Project Technical Issue, Production & BIM', 'BIM & Digitalization Engineering', 'Technical Works'),
(14, 'Personnel Time Frame Management', 'BIM & Digitalization Engineering', 'Team Managing'),
(15, 'Submission & Monitoring Engineering Expertise Certification', 'BIM & Digitalization Engineering', 'Team Managing'),
(16, 'BIM Project Monitoring', 'BIM & Digitalization Engineering', 'Building Information Modelling (BIM) Project'),
(17, 'BIM Project Supporting', 'BIM & Digitalization Engineering', 'Building Information Modelling (BIM) Project'),
(18, 'BIM & Engineering Learning Center', 'BIM & Digitalization Engineering', 'Building Information Modelling (BIM) Project'),
(19, 'BIM Software Controlling & Submission', 'BIM & Digitalization Engineering', 'Building Information Modelling (BIM) Project'),
(20, 'Data Dashboard Design System', 'BIM & Digitalization Engineering', 'Data Controlling Digitalize'),
(21, 'Data Center Controlling & Reviewing', 'BIM & Digitalization Engineering', 'Data Controlling Digitalize'),
(22, 'Project Technical Support Report Collecting & Uploading', 'BIM & Digitalization Engineering', 'Data Controlling Digitalize'),
(23, 'Sub-Contractor Technical Verification', 'System Engineering & Lean Construction', 'Strategic Works'),
(24, 'WIKA Procedure Reviewing Person', 'System Engineering & Lean Construction', 'Strategic Works'),
(25, 'Project Technical Risk Management', 'System Engineering & Lean Construction', 'Strategic Works'),
(26, 'WIKA Work Instruction Reviewing Person', 'System Engineering & Lean Construction', 'Strategic Works'),
(27, 'Project RKP Reviewing Person', 'System Engineering & Lean Construction', 'Strategic Works'),
(28, 'Project LPS Reviewing Person', 'System Engineering & Lean Construction', 'Strategic Works'),
(29, 'Pelatihan, Webinar, Internal Training Sub-Divisi Engineering', 'System Engineering & Lean Construction', 'Team Managing'),
(30, 'CMC Personnel Collecting', 'System Engineering & Lean Construction', 'Team Managing'),
(31, 'Memorandum of Understanding (MOU) With Partner Team', 'System Engineering & Lean Construction', 'Strategic Works'),
(32, 'Lean Construction', 'System Engineering & Lean Construction', 'Lean Construction'),
(33, 'Lain-lain', 'Manager of Engineering', 'Lain-lain'),
(34, 'Lain-lain', 'Expert of Engineering', 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `master_activity`
--

CREATE TABLE `master_activity` (
  `id_master_activity` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `absense_start` date DEFAULT NULL,
  `absense_end` date DEFAULT NULL,
  `work_days` int(11) DEFAULT NULL,
  `work_hours` int(11) DEFAULT NULL,
  `tanggal_master` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_activity`
--

INSERT INTO `master_activity` (`id_master_activity`, `id_user`, `absense_start`, `absense_end`, `work_days`, `work_hours`, `tanggal_master`) VALUES
(1, 23, '2023-11-05', '2023-11-30', 19, 152, '2023-11-30'),
(2, 24, '2023-11-05', '2023-11-30', 19, 152, '2023-11-30'),
(3, 23, '2023-10-05', '2023-10-31', 19, 152, '2023-10-31'),
(4, 24, '2023-10-05', '2023-10-31', 19, 152, '2023-10-31');

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
  `realisasi_proyek` int(11) DEFAULT NULL,
  `kendala_implementasi_bim` text DEFAULT NULL,
  `engineering_issue_berjalan` text DEFAULT NULL,
  `masalah_produksi_berjalan` text DEFAULT NULL,
  `konsep_lean_construction_berjalan` text DEFAULT NULL,
  `feedback_untuk_perusahaan` text DEFAULT NULL,
  `evidence_link` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `tanggal_report` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monthly_report`
--

INSERT INTO `monthly_report` (`id_monthly_report`, `id_proyek`, `realisasi_proyek`, `kendala_implementasi_bim`, `engineering_issue_berjalan`, `masalah_produksi_berjalan`, `konsep_lean_construction_berjalan`, `feedback_untuk_perusahaan`, `evidence_link`, `remarks`, `tanggal_report`) VALUES
(2, 1, 40, 'Kendala Implementasi Bim', 'Engineering Issue Berjalan', 'Masalah Produksi Berjalan', 'Konsep Lean Construction Berjalan', 'Feedback Untuk Perusahaan', 'Evidence Link', NULL, '2023-11-01'),
(3, 1, 46, 'Kendala Implementasi Bim', 'Engineering Issue Berjalan', 'Masalah Produksi Berjalan', 'Konsep Lean Construction Berjalan', 'Feedback Untuk Perusahaan', 'Evidence Link', NULL, '2023-11-02'),
(4, 1, 50, 'Kendala Implementasi Bim', 'Engineering Issue Berjalan', 'Masalah Produksi Berjalan', 'Konsep Lean Construction Berjalan', 'Feedback Untuk Perusahaan', 'Evidence Link', NULL, '2023-11-02'),
(5, 1, 60, 'Kendala Implementasi Bim', 'Engineering Issue Berjalan', 'Masalah Produksi Berjalan', 'Konsep Lean Construction Berjalan', 'Feedback Untuk Perusahaan', 'Evidence Link', NULL, '2023-11-22'),
(6, 1, 70, 'Kendala Implementasi Bim', 'Engineering Issue Berjalan', 'Masalah Produksi Berjalan', 'Konsep Lean Construction Berjalan', 'Feedback Untuk Perusahaan', 'Evidence Link', NULL, '2023-12-09');

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
  `kesiapan_bim5d` varchar(255) NOT NULL DEFAULT '0',
  `dua_d` int(11) NOT NULL DEFAULT 0,
  `tiga_d` int(11) NOT NULL DEFAULT 0,
  `empat_d` int(11) NOT NULL DEFAULT 0,
  `lima_d` int(11) NOT NULL DEFAULT 0,
  `cde` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `nama_proyek`, `tanggal`, `tipe_konstruksi`, `prioritas`, `status`, `id_tim_proyek`, `latitude`, `longitude`, `status_implementasi`, `kesiapan_bim5d`, `dua_d`, `tiga_d`, `empat_d`, `lima_d`, `cde`) VALUES
(1, 'Proyek A', '2023-10-30', 'Road & Bridge', 'Prioritas 1', 'Proyek Besar', 3, '11111', '11111', NULL, 'Persiapan Implementasi BIM 5D', 0, 1, 1, 0, 0),
(2, 'Proyek B', '2023-10-30', 'Road & Bridge', 'Prioritas 1', 'Proyek Besar', 4, '11111', '11111', NULL, '0', 0, 0, 0, 0, 0);

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
  `fungsi` varchar(255) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `role` enum('Admin','Tim Proyek','Head Office') NOT NULL,
  `foto_user` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `jabatan`, `fungsi`, `nip`, `telepon`, `password`, `role`, `foto_user`) VALUES
(1, 'Admin', 'Admin', NULL, '11111', '0898972836423', '$2y$10$sIgZRbYhk3OmrUSTZBJyH.qMkghMa7bdaAFwODNfSCZ8OIfsB4cZi', 'Admin', NULL),
(12, 'Anggota Tim Proyek A', 'General Manager', NULL, '55555', '0898988397872', '$2y$10$ftafxo0GcSpHkcObrW6K1.nX.iymQI7vZZIt58uEHn8TOn6qQP8Z6', 'Tim Proyek', '10282023195739 Anggota Tim Proyek A.jpg'),
(13, 'User 1', 'Staf', NULL, '10101010', '0898997198934', '$2y$10$648WzdZ.9DPsHOjmIHKNrOT2KPnQ4stodXLH0PmsZzdTuzuDHE58K', 'Tim Proyek', '10282023201444 User 1.jpg'),
(14, 'Tim Proyek 1', 'Kepala Seksi Proyek Menengah', NULL, '12222', '089899179868', '$2y$10$UmuCwinglz8O.0AUhx7a9OZf152cVrJd9LNe275eBVON1ctXDnkru', 'Tim Proyek', '10292023085008 Tim Proyek 1.jpg'),
(15, 'Tim Proyek 2 update', 'Staf', NULL, '22222', '089899728363', '$2y$10$jFMN4Kz5LL0cWPDCPBadpenXuuzTP44Hl5vX/Jq5lK3xQaJtkfxI.', 'Tim Proyek', '11022023000546Tim Proyek 2 update.jpg'),
(16, 'Tim Proyek 3', 'Staf', NULL, '322222', '0897867858323', '$2y$10$GbSqZohjhFBpVfg7GZ.s0.J1q7ipXJCtMLIIcA.nT7VHqE2CBcCr2', 'Tim Proyek', '10292023085157 Tim Proyek 3.jpg'),
(17, 'Tim Proyek 4', 'Staf', NULL, '42222', '089978628744', '$2y$10$iNWgb5fQFni1.gRk.IDD0OKUI1BA.oOgCbgkZlz.c67KIyncau.4S', 'Tim Proyek', '10292023085235 Tim Proyek 4.jpg'),
(18, 'Tim Proyek 5', 'Staf', NULL, '52222', '089998923432543', '$2y$10$bZBZdvRy9QKaBSRM7KdZhOsYi2WwaBhtLA8JQ3f2iYlgj5or4jt6C', 'Tim Proyek', '10292023085320 Tim Proyek 5.jpg'),
(23, 'Head Office 1', 'Staff of Engineering', 'Design & Analysis', '333331', '089979792324', '$2y$10$ZEQxnEsqEbsc1AOoX8uoRux2ESLgP6yZlT3nALgzRmCZXjIgyN0je', 'Head Office', '11042023061636 Head Office 1.jpg'),
(24, 'Head Office 2', 'Staff of Engineering', 'Design & Analysis', '333332', '089897898323', '$2y$10$Vkwjr3Gmo1o4uHp7EF1wVukGphlVPJ9NMCYpi4SAecVtt.uBDD0QG', 'Head Office', '11042023061727 Head Office 2.jpg'),
(25, 'Head Office 3', 'Staff of Engineering', 'Design & Analysis', '333333', '089978686878', '$2y$10$URcpbBLvxaGkUpI.Oob9E.lM7NVYlMEMwg019euLFVcNsn8jKuMYK', 'Head Office', '11042023061813 Head Office 3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_tim_proyek`
--
ALTER TABLE `detail_tim_proyek`
  ADD PRIMARY KEY (`id_detail_tim_proyek`);

--
-- Indexes for table `engineering_activity`
--
ALTER TABLE `engineering_activity`
  ADD PRIMARY KEY (`id_engineering_activity`);

--
-- Indexes for table `kategori_pekerjaan`
--
ALTER TABLE `kategori_pekerjaan`
  ADD PRIMARY KEY (`id_kategori_pekerjaan`);

--
-- Indexes for table `master_activity`
--
ALTER TABLE `master_activity`
  ADD PRIMARY KEY (`id_master_activity`);

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
-- AUTO_INCREMENT for table `engineering_activity`
--
ALTER TABLE `engineering_activity`
  MODIFY `id_engineering_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori_pekerjaan`
--
ALTER TABLE `kategori_pekerjaan`
  MODIFY `id_kategori_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `master_activity`
--
ALTER TABLE `master_activity`
  MODIFY `id_master_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_monthly_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
