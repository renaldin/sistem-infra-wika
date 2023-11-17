-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 02:29 AM
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
(7, 4, 15),
(8, 8, 54),
(9, 9, 55),
(10, 10, 56);

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_lps`
--

CREATE TABLE `dokumen_lps` (
  `id_dokumen_lps` int(11) NOT NULL,
  `nama_dokumen` varchar(255) DEFAULT NULL,
  `no_urut` varchar(10) DEFAULT NULL,
  `jenis_dokumen` enum('Utama','Pendukung') NOT NULL,
  `tanggal_input` date DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen_lps`
--

INSERT INTO `dokumen_lps` (`id_dokumen_lps`, `nama_dokumen`, `no_urut`, `jenis_dokumen`, `tanggal_input`, `is_active`) VALUES
(1, 'Dokumen LPS Bab 3 Realisasi Engineering', '1', 'Utama', '2023-11-16', 1),
(2, 'Dokumen Karya Inovasi (KI) / Knowledge Management (KM)', '2', 'Utama', '2023-11-16', 1),
(3, 'Metode Kerja', '3', 'Utama', '2023-11-16', 1),
(4, 'Laporan Justifikasi Teknis / Memo Teknis / Review Desain', '4', 'Utama', '2023-11-16', 1),
(5, 'BOQ Kontrak s.d BOQ Final Quantity', '5', 'Utama', '2023-11-16', 1),
(6, 'Gambar Perencanaan *)', '6', 'Utama', '2023-11-16', 1),
(7, 'Detail Engineering Design (DED) **)', '7', 'Utama', '2023-11-16', 1),
(8, 'Shop Drawing (SHD)', '8', 'Utama', '2023-11-16', 1),
(9, 'As Built Drawing (ABD)', '9', 'Utama', '2023-11-16', 1),
(10, 'Dokumentasi Pelaksanaan', '10', 'Utama', '2023-11-16', 1),
(11, 'Kontrak dan Addendumnya. *)', 'a', 'Pendukung', '2023-11-16', 1),
(12, 'Laporan Harian', 'b', 'Pendukung', '2023-11-16', 1),
(13, 'Laporan Mingguan', 'c', 'Pendukung', '2023-11-16', 1),
(14, 'Laporan Bulanan', 'd', 'Pendukung', '2023-11-16', 1),
(15, 'Monthly Certificate (MC) **)', 'e', 'Pendukung', '2023-11-16', 1),
(16, 'Back up Quantity', 'f', 'Pendukung', '2023-11-16', 1),
(17, 'Back up Quality', 'g', 'Pendukung', '2023-11-16', 1),
(18, 'Request Pekerjaan', 'h', 'Pendukung', '2023-11-16', 1),
(19, 'Data Soil Investigation, Data Topografi, Data Bathimetri, Data Hidrologi, Data Hidro Oceanografi, dll', 'i', 'Pendukung', '2023-11-16', 1),
(20, 'Berita Acara Serah Terima I (PHO)', 'j', 'Pendukung', '2023-11-16', 1);

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
(1, 53, 1, '2023-11-01', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023181016 53.jpg', 1),
(2, 53, 5, '2023-11-02', 'WFA', 'Judul / Deskripsi Pekerjaan', '8', '11112023181108 53.jpg', 1),
(3, 53, 14, '2023-11-03', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023181143 53.jpg', 1),
(4, 53, 16, '2023-11-06', 'WFA', 'Judul / Deskripsi Pekerjaan', '8', '11112023181243 53.jpg', 1),
(5, 53, 26, '2023-11-07', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023181317 53.jpg', 1),
(6, 53, 14, '2023-11-08', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023181345 53.jpg', 1),
(7, 53, 5, '2023-11-09', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023181439 53.jpg', 1),
(8, 53, 5, '2023-11-10', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023181506 53.jpg', 1),
(9, 53, 27, '2023-11-13', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023181539 53.jpg', 1),
(10, 53, 27, '2023-11-14', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023181634 53.jpg', 1),
(11, 53, 28, '2023-11-15', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023181707 53.jpg', 1),
(12, 53, 30, '2023-11-15', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023181743 53.jpg', 1),
(13, 53, 26, '2023-11-16', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023181810 53.jpg', 1),
(14, 53, 26, '2023-11-17', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023181838 53.jpg', 1),
(15, 53, 25, '2023-11-21', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023181941 53.jpg', 1),
(16, 53, 26, '2023-11-23', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023182029 53.jpg', 1),
(17, 53, 26, '2023-11-24', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023182057 53.jpg', 1),
(18, 53, 27, '2023-11-27', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023182125 53.jpg', 1),
(19, 53, 9, '2023-11-29', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023182154 53.jpg', 1),
(20, 53, 21, '2023-11-30', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023182220 53.jpg', 1),
(21, 52, 24, '2023-11-01', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023182339 52.jpg', 1),
(22, 52, 26, '2023-11-02', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023182406 52.jpg', 1),
(23, 52, 28, '2023-11-03', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023182434 52.jpg', 1),
(24, 52, 31, '2023-11-06', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023182502 52.jpg', 1),
(25, 52, 26, '2023-11-07', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023182528 52.jpg', 1),
(26, 52, 31, '2023-11-08', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023182555 52.jpg', 1),
(27, 52, 26, '2023-11-09', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023182621 52.jpg', 1),
(28, 52, 32, '2023-11-10', 'WFA', 'Judul / Deskripsi Pekerjaan', '8', '11112023182650 52.jpg', 1),
(29, 52, 32, '2023-11-13', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023182716 52.jpg', 1),
(30, 52, 29, '2023-11-14', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023182744 52.jpg', 1),
(31, 52, 25, '2023-11-15', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023182813 52.jpg', 1),
(32, 52, 25, '2023-11-16', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023182838 52.jpg', 1),
(33, 52, 23, '2023-11-17', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023182904 52.jpg', 1),
(34, 52, 26, '2023-11-20', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023182944 52.jpg', 1),
(35, 52, 26, '2023-11-21', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023183026 52.jpg', 1),
(36, 52, 26, '2023-11-22', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023183059 52.jpg', 1),
(37, 52, 29, '2023-11-24', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023183131 52.jpg', 1),
(38, 52, 25, '2023-11-27', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023183156 52.jpg', 1),
(39, 52, 25, '2023-11-28', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023183221 52.jpg', 1),
(40, 52, 23, '2023-11-29', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023183248 52.jpg', 1),
(41, 52, 24, '2023-11-30', 'WFO', 'Judul / Deskripsi Pekerjaan', '8', '11112023183308 52.jpg', 1),
(42, 37, 4, '2023-11-12', 'WFO', 'meeting', '5.5', '11122023033442 37.png', 1),
(43, 37, 32, '2023-11-12', 'WFO', 'meeting', '7.5', '11122023033530 37.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pekerjaan`
--

CREATE TABLE `kategori_pekerjaan` (
  `id_kategori_pekerjaan` int(11) NOT NULL,
  `kategori_pekerjaan` varchar(255) DEFAULT NULL,
  `fungsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_pekerjaan`
--

INSERT INTO `kategori_pekerjaan` (`id_kategori_pekerjaan`, `kategori_pekerjaan`, `fungsi`) VALUES
(1, 'A1. CSI Collecting, Monitoring & Feedback Follow Up', 'Design & Analysis'),
(2, 'A2. Project Technical Supporting', 'Design & Analysis'),
(3, 'A3. Engineering Clinic', 'Design & Analysis'),
(4, 'A4. Quality Engineering Committee (If Any)', 'Design & Analysis'),
(5, 'A5. Engineering Work Optimation dan Efficiency Collecting', 'Design & Analysis'),
(6, 'A6. Engineering Lesson Learn Register', 'Design & Analysis'),
(7, 'A7. Monitoring & Collecting KI/KM Div Infra 2', 'Design & Analysis'),
(8, 'A8. Technical Code & Standard Control', 'Design & Analysis'),
(9, 'A9. Technical Software Renewing & Personel Capability', 'Design & Analysis'),
(10, 'A10. Soil Investigation and Project Data Collecting', 'Design & Analysis'),
(11, 'B1. Strategic Programs Planning', 'BIM & Digitalization Engineering'),
(12, 'B2. Management Review (MR) Content Planning', 'BIM & Digitalization Engineering'),
(13, 'B3. Monitoring Project Technical Issue, Production & BIM', 'BIM & Digitalization Engineering'),
(14, 'B4. Personnel Time Frame Management', 'BIM & Digitalization Engineering'),
(15, 'B5. Submission & Monitoring Engineering Expertise Certification', 'BIM & Digitalization Engineering'),
(16, 'B6. BIM Project Monitoring', 'BIM & Digitalization Engineering'),
(17, 'B7. BIM Project Supporting', 'BIM & Digitalization Engineering'),
(18, 'B8. BIM & Engineering Learning Center', 'BIM & Digitalization Engineering'),
(19, 'B9. BIM Software Controlling & Submission', 'BIM & Digitalization Engineering'),
(20, 'B10. Data Dashboard Design System', 'BIM & Digitalization Engineering'),
(21, 'B11. Data Center Controlling & Reviewing', 'BIM & Digitalization Engineering'),
(22, 'B12. Project Technical Support Report Collecting & Uploading', 'BIM & Digitalization Engineering'),
(23, 'C1. Sub-Contractor Technical Verification', 'System Engineering & Lean Construction'),
(24, 'C2. WIKA Procedure Reviewing Person', 'System Engineering & Lean Construction'),
(25, 'C3. Project Technical Risk Management', 'System Engineering & Lean Construction'),
(26, 'C4. WIKA Work Instruction Reviewing Person', 'System Engineering & Lean Construction'),
(27, 'C5. Project RKP Reviewing Person', 'System Engineering & Lean Construction'),
(28, 'C6. Project LPS Reviewing Person', 'System Engineering & Lean Construction'),
(29, 'C7. Pelatihan, Webinar, Internal Training Sub-Divisi Engineering', 'System Engineering & Lean Construction'),
(30, 'C8. CMC Personnel Collecting', 'System Engineering & Lean Construction'),
(31, 'C9. Memorandum of Understanding (MOU) With Partner Team', 'System Engineering & Lean Construction'),
(32, 'C10. Lean Construction', 'System Engineering & Lean Construction'),
(35, 'D. Lain-lain', NULL),
(36, 'B13. BIM Valuasi & Benefit Dampak Implementasi', 'BIM & Digitalization Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `ki_km`
--

CREATE TABLE `ki_km` (
  `id_ki_km` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `status_ki_km` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `tanggal_upload` date DEFAULT NULL,
  `proses_penulisan` int(11) NOT NULL DEFAULT 0,
  `approval_atasan` int(11) NOT NULL DEFAULT 0,
  `approval_pic_divisi` int(11) NOT NULL DEFAULT 0,
  `approval_pic_pusat` int(11) NOT NULL DEFAULT 0,
  `approval_published` int(11) NOT NULL DEFAULT 0,
  `tanggal_published` date DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `is_respon` int(11) NOT NULL DEFAULT 0,
  `id_user_respon` int(11) DEFAULT NULL,
  `tanggal_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ki_km`
--

INSERT INTO `ki_km` (`id_ki_km`, `id_proyek`, `id_user`, `judul`, `status_ki_km`, `kategori`, `department`, `tanggal_upload`, `proses_penulisan`, `approval_atasan`, `approval_pic_divisi`, `approval_pic_pusat`, `approval_published`, `tanggal_published`, `note`, `is_respon`, `id_user_respon`, `tanggal_input`) VALUES
(1, 3, 54, 'Judul', 'Engineering', 'Best Practice', 'Departemen Operasi 3', '2023-11-11', 1, 1, 1, 0, 0, NULL, 'note', 1, 52, '2023-11-11'),
(2, 5, 56, 'Judul', 'Engineering', 'Best Practice', 'Departemen Operasi 3', '2023-11-11', 1, 1, 1, 1, 1, '2023-11-25', 'Note', 1, 53, '2023-11-11'),
(3, 4, 55, 'PTOYEK', 'Non Engineering', 'Knowledge Management', 'Departemen Operasi 3', '2023-11-12', 1, 1, 0, 0, 0, NULL, NULL, 1, 37, '2023-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `lps`
--

CREATE TABLE `lps` (
  `id_lps` int(11) NOT NULL,
  `id_dokumen_lps` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `pdf` int(11) NOT NULL DEFAULT 0,
  `native` int(11) NOT NULL DEFAULT 0,
  `tanggal_lps` date DEFAULT NULL,
  `id_user_respon` int(11) DEFAULT NULL,
  `is_respon` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lps`
--

INSERT INTO `lps` (`id_lps`, `id_dokumen_lps`, `id_proyek`, `pdf`, `native`, `tanggal_lps`, `id_user_respon`, `is_respon`) VALUES
(41, 1, 1, 0, 0, '2023-11-17', 1, 1),
(42, 2, 1, 0, 0, '2023-11-17', NULL, 0),
(43, 3, 1, 0, 0, '2023-11-17', NULL, 0),
(44, 4, 1, 0, 0, '2023-11-17', NULL, 0),
(45, 5, 1, 0, 0, '2023-11-17', NULL, 0),
(46, 6, 1, 0, 0, '2023-11-17', NULL, 0),
(47, 7, 1, 0, 0, '2023-11-17', NULL, 0),
(48, 8, 1, 0, 0, '2023-11-17', NULL, 0),
(49, 9, 1, 0, 0, '2023-11-17', NULL, 0),
(50, 10, 1, 0, 0, '2023-11-17', NULL, 0),
(51, 11, 1, 0, 0, '2023-11-17', 1, 1),
(52, 12, 1, 0, 0, '2023-11-17', NULL, 0),
(53, 13, 1, 0, 0, '2023-11-17', NULL, 0),
(54, 14, 1, 0, 0, '2023-11-17', NULL, 0),
(55, 15, 1, 0, 0, '2023-11-17', NULL, 0),
(56, 16, 1, 0, 0, '2023-11-17', NULL, 0),
(57, 17, 1, 0, 0, '2023-11-17', NULL, 0),
(58, 18, 1, 0, 0, '2023-11-17', NULL, 0),
(59, 19, 1, 0, 0, '2023-11-17', NULL, 0),
(60, 20, 1, 0, 0, '2023-11-17', NULL, 0);

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
(10, 53, '2023-11-01', '2023-11-30', 22, 176, '2023-11-30'),
(11, 52, '2023-11-01', '2023-11-30', 22, 176, '2023-11-30'),
(12, 37, '2023-11-12', '2023-11-30', 14, 112, '2023-11-30');

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
(6, 1, 70, 'Kendala Implementasi Bim', 'Engineering Issue Berjalan', 'Masalah Produksi Berjalan', 'Konsep Lean Construction Berjalan', 'Feedback Untuk Perusahaan', 'Evidence Link', NULL, '2023-12-09'),
(7, 1, 60, 'a', 'a', 'a', 'a', 'a', 'a', NULL, '2023-11-14'),
(9, 5, 100, '-', '-', '-', 'Di proyek ini konsep lean constrution sudah di terapkan bersinergi dengan fungsionalitas BIM yang sudah di implementasikan dan fase 4D dalam BIM, terutama di aspek Project Schedule & Planning, Just In Time Schedule, Installation Schedule, Payent Approval, dan Last Planner Schedule', 'Di Tengah kondisi perusahaan yang Sedang kurang Baik dan recovery dan di tengah implementasi Transformasi Wika yang Sedang di gencarkan, peningkatan produktivitas dan mutu dalam sinergi yang berkelanjutan menjadi tantangan tersendiri seiring dengan pesatnya perkembangan dunia industri dan teknologi informasi. Dalam konsteks tersebut ada 2  pendekatan yang sering di bahas di lingkungan akademik dan para praktisi dunia konstruksi, yaitu lean construction (LC) dan Building Information Modelling (BIM). Oleh karena itu harapan proyek agar, sosialisasi,pelatihan dan wokshop terkait Lean Construction bisa lebih d gencakan dan di rutinkn lagi, prosedurnya segera di bakukan, dan juga dijadikan salah satu indikator KPI Proyek dan individu', 'https://docs.google.com/presentation/d/1t8w1b-3MkEefYWSQEsVjhLptwuo0fXtL/edit?rtpof=true&sd=true', NULL, '2023-11-10');

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
  `cde` int(11) NOT NULL DEFAULT 0,
  `status_rkp` int(11) NOT NULL DEFAULT 0,
  `status_lps` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `nama_proyek`, `tanggal`, `tipe_konstruksi`, `prioritas`, `status`, `id_tim_proyek`, `latitude`, `longitude`, `status_implementasi`, `kesiapan_bim5d`, `dua_d`, `tiga_d`, `empat_d`, `lima_d`, `cde`, `status_rkp`, `status_lps`) VALUES
(1, 'Proyek A', '2023-10-30', 'Road & Bridge', 'Prioritas 1', 'Proyek Besar', 3, '11111', '11111', NULL, 'Persiapan Implementasi BIM 5D', 0, 1, 1, 0, 0, 1, 1),
(2, 'Proyek B', '2023-10-30', 'Road & Bridge', 'Prioritas 1', 'Proyek Besar', 4, '11111', '11111', NULL, '0', 0, 0, 0, 0, 0, 1, 0),
(3, 'Akses Tol makassar New Port', '2023-11-09', 'Road & Bridge', 'Prioritas 1', 'Proyek Menengah', 8, '8328380', '8919299', NULL, '0', 0, 0, 0, 0, 0, 0, 0),
(4, 'Bandar Udara Banggai', '2023-11-09', 'Road & Bridge', 'Prioritas 3', 'Proyek Kecil', 9, '8328380', '8929839', NULL, '0', 0, 0, 0, 0, 0, 0, 0),
(5, 'Bendungan Ameroro', '2023-11-09', 'Water Resource', 'Prioritas 2', 'Proyek Menengah', 10, '8328380', '8919299', NULL, 'Siap Implementasi BIM 5D', 1, 1, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rkp`
--

CREATE TABLE `rkp` (
  `id_rkp` int(11) NOT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `kode_spk` varchar(255) DEFAULT NULL,
  `review1` int(11) NOT NULL DEFAULT 0,
  `review2` int(11) NOT NULL DEFAULT 0,
  `review3` int(11) NOT NULL DEFAULT 0,
  `review4` int(11) NOT NULL DEFAULT 0,
  `review5` int(11) NOT NULL DEFAULT 0,
  `review6` int(11) NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL,
  `tanggal_rkp` date NOT NULL,
  `id_user_respon` int(11) DEFAULT NULL,
  `is_respon` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rkp`
--

INSERT INTO `rkp` (`id_rkp`, `id_proyek`, `kode_spk`, `review1`, `review2`, `review3`, `review4`, `review5`, `review6`, `note`, `tanggal_rkp`, `id_user_respon`, `is_respon`) VALUES
(1, 1, 'Kode SPK', 1, 1, 0, 0, 0, 0, 'Catatan', '2023-11-14', 53, 1),
(2, 2, 'Kode SPK', 0, 0, 0, 0, 0, 0, NULL, '2023-11-14', 52, 1);

-- --------------------------------------------------------

--
-- Table structure for table `technical_supporting`
--

CREATE TABLE `technical_supporting` (
  `id_technical_supporting` int(11) NOT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `nomor_laporan` varchar(255) DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `topik` varchar(255) DEFAULT NULL,
  `tanggal_submit` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `status_support` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `dokumen` text DEFAULT NULL,
  `kendala` text DEFAULT NULL,
  `is_respon` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technical_supporting`
--

INSERT INTO `technical_supporting` (`id_technical_supporting`, `id_proyek`, `pic`, `nomor_laporan`, `kode`, `topik`, `tanggal_submit`, `tanggal_selesai`, `status_support`, `note`, `dokumen`, `kendala`, `is_respon`, `id_user`) VALUES
(2, 1, 'Admin', 'D00002', 'Kode', 'Topik', '2023-11-09', '2023-11-24', 'NO DATA', 'Note', 'Dokumen', 'Kendala Proyek A 1', 1, 1),
(3, 1, 'Head Office 1', 'D00001', 'Kode 1', 'Topik 1', '2023-11-08', NULL, 'HOLD', 'Note', 'Dokeumen', 'Kendala Proyek A 2', 1, 23),
(4, 1, 'Head Office 1', 'sjqnnmad2', 'S', 'barang', '2023-11-10', NULL, 'ON GOING', NULL, NULL, 'belum datang barang', 1, 23),
(5, 5, 'Admin', 'sjqnnmad2', 'G', 'barang', '2023-11-10', '2023-11-11', 'SENT', 'Note', 'Dddsdds', 'Terjadi potensi longsoran timbunan surcharge di area lahan utara sisi utara', 1, 1),
(6, 1, 'Yanto Agus Wahyudi', 'Nomor Laporan', 'G/S', 'Topik', '2023-01-01', NULL, 'OPEN', NULL, NULL, 'Kendala', 1, 53),
(7, 1, 'Head Office 3', 'Nomor Laporan', 'S', 'Topik', '2023-01-10', NULL, 'SENT', NULL, NULL, 'Kendala Teknis', 1, 25),
(8, 1, 'Head Office 3', 'Nomor Laporan', 'G', 'Topik', '2023-01-19', NULL, 'ON GOING', NULL, NULL, 'Kendala Teknis', 1, 25),
(9, 1, 'Yanto Agus Wahyudi', 'Nomor Laporan', 'G', 'Topik', '2023-11-29', NULL, 'OPEN', NULL, NULL, 'Kendala Teknis', 1, 53),
(10, 1, 'Soleh', 'Nomor Laporan', 'G/S', 'Topik', '2023-02-07', NULL, 'SENT', NULL, NULL, 'Kendala Teknis', 1, 52),
(11, 1, NULL, NULL, NULL, NULL, '2023-02-20', NULL, NULL, NULL, NULL, 'Kendala Teknis', 0, NULL),
(12, 1, 'Yanto Agus Wahyudi', 'Nomor Laporan', 'S', 'Topik', '2023-02-22', NULL, 'SENT', NULL, NULL, 'Kendala Teknis', 1, 53),
(13, 3, 'Yanto Agus Wahyudi', 'Nomor Laporan', 'G', 'Topik', '2023-03-02', NULL, 'HOLD', NULL, NULL, 'Kendala Teknis', 1, 53),
(14, 3, 'Head Office 3', 'Nomor Laporan', 'G', 'Topik', '2023-04-10', NULL, 'SENT', NULL, NULL, 'Kendala Teknis', 1, 25),
(15, 3, NULL, NULL, NULL, NULL, '2023-05-17', NULL, NULL, NULL, NULL, 'Kendala Teknis', 0, NULL),
(16, 3, NULL, NULL, NULL, NULL, '2023-06-12', NULL, NULL, NULL, NULL, 'Kendala Teknis', 0, NULL),
(17, 3, 'Head Office 3', 'Nomor Laporan', 'G', 'Topik', '2023-07-10', NULL, 'SENT', NULL, NULL, 'Kendala Teknis', 1, 25),
(18, 3, 'Head Office 3', 'Nomor Laporan', 'S', 'Topik', '2023-08-10', NULL, 'SENT', NULL, NULL, 'Kendala Teknis', 1, 25),
(19, 3, NULL, NULL, NULL, NULL, '2023-09-10', NULL, NULL, NULL, NULL, 'Kendala Teknis', 0, NULL),
(20, 3, 'Head Office 3', 'Nomor Laporan', 'G', 'Topik', '2023-10-10', NULL, 'SENT', NULL, NULL, 'Kendala Teknis', 1, 25),
(21, 3, 'Yanto Agus Wahyudi', 'Nomor Laporan', 'G', 'Topik', '2023-11-10', NULL, 'SENT', NULL, NULL, 'Kendala Teknis', 1, 53),
(22, 3, NULL, NULL, NULL, NULL, '2023-12-04', NULL, NULL, NULL, NULL, 'Kendala Teknis', 0, NULL),
(23, 4, 'Yanto Agus Wahyudi', 'Nomor Laporan', 'G', 'Topik', '2023-01-16', NULL, 'SENT', NULL, NULL, 'Kendala Teknis', 1, 53),
(24, 4, 'Soleh', 'Nomor Laporan', 'G/S', 'Topik', '2023-02-06', NULL, 'SENT', NULL, NULL, 'Kendala Teknis', 1, 52),
(25, 4, NULL, NULL, NULL, NULL, '2023-03-14', NULL, NULL, NULL, NULL, 'Kendala Teknis', 0, NULL),
(26, 4, 'Soleh', 'Nomor Laporan', 'G', 'Topik', '2023-04-11', NULL, 'SENT', NULL, NULL, 'Kendala Teknis', 1, 52),
(27, 4, 'Yanto Agus Wahyudi', 'Nomor Laporan', 'S', 'Topik', '2023-05-16', NULL, 'HOLD', NULL, NULL, 'Kendala Teknis', 1, 53),
(28, 4, 'Soleh', 'Nomor Laporan', 'S', 'Topik', '2023-06-06', NULL, 'SENT', NULL, NULL, 'Kendala Teknis', 1, 52),
(29, 4, 'Soleh', 'Nomor Laporan', 'G', 'Topik', '2023-06-13', NULL, 'SENT', NULL, NULL, 'Kendala Teknis', 1, 52),
(30, 4, 'Yanto Agus Wahyudi', 'Nomor Laporan', 'G', 'Topik', '2023-06-14', NULL, 'SENT', NULL, NULL, 'Kendala Teknis', 1, 53),
(31, 4, NULL, NULL, NULL, NULL, '2023-07-12', NULL, NULL, NULL, NULL, 'Kendala Teknis', 0, NULL),
(32, 4, NULL, NULL, NULL, NULL, '2023-08-22', NULL, NULL, NULL, NULL, 'Kendala Teknis', 0, NULL),
(33, 4, NULL, NULL, NULL, NULL, '2023-09-10', NULL, NULL, NULL, NULL, 'Kendala Teknis', 0, NULL),
(34, 4, 'Yanto Agus Wahyudi', 'Nomor Laporan', 'G', 'Topik', '2023-10-17', NULL, 'SENT', NULL, NULL, 'Kendala Teknis', 1, 53),
(35, 4, NULL, NULL, NULL, NULL, '2023-11-10', NULL, NULL, NULL, NULL, 'Kendala Teknis', 0, NULL),
(36, 4, 'Soleh', 'Nomor Laporan', 'G', 'Topik', '2023-12-13', NULL, 'SENT', NULL, NULL, 'Kendala Teknis', 1, 52),
(37, 5, NULL, NULL, NULL, NULL, '2023-01-09', NULL, NULL, NULL, NULL, 'Kendala Teknis', 0, NULL),
(38, 5, 'Head Office 3', 'Nomor Laporan', 'S', 'Topik', '2023-02-06', NULL, 'OPEN', NULL, NULL, 'Kendala Teknis', 1, 25),
(39, 5, 'Head Office 3', 'Nomor Laporan', 'G', 'Topik', '2023-03-15', NULL, 'ON GOING', NULL, NULL, 'Kendala Teknis', 1, 25),
(40, 5, 'Agus Ubaidillah', 'nmpp', 'S', 'barang', '2023-04-05', '2023-11-12', 'SENT', NULL, NULL, 'Kendala Teknis', 1, 37),
(41, 5, 'Yanto Agus Wahyudi', 'Nomor Laporan', 'S', 'Topik', '2023-05-09', NULL, NULL, NULL, NULL, 'Kendala Teknis', 1, 53),
(42, 5, 'Yanto Agus Wahyudi', 'Nomor Laporan', 'S', 'Topik', '2023-05-09', NULL, 'HOLD', NULL, NULL, 'Kendala Teknis', 1, 53),
(43, 5, 'Soleh', 'Nomor Laporan', 'S', 'Topik', '2023-06-20', NULL, 'ON GOING', NULL, NULL, 'Kendala Teknis', 1, 52),
(44, 5, 'Soleh', 'Nomor Laporan', 'S', 'Topik', '2023-07-11', NULL, 'SENT', NULL, NULL, 'Kendala Teknis', 1, 52),
(45, 5, 'Soleh', 'Nomor Laporan', 'S', 'Topik', '2023-08-15', NULL, 'HOLD', NULL, NULL, 'Kendala Teknis', 1, 52),
(46, 5, 'Soleh', 'Nomor Laporan', 'S', 'Topik', '2023-09-25', NULL, 'SENT', NULL, NULL, 'Kendala Teknis', 1, 52),
(47, 5, 'Yanto Agus Wahyudi', 'Nomor Laporan', 'G', 'Topik', '2023-10-24', NULL, 'SENT', NULL, NULL, 'Kendala Teknis', 1, 53),
(48, 5, 'Head Office 3', 'Nomor Laporan', 'S', 'Topik', '2023-11-08', NULL, 'HOLD', NULL, NULL, 'Kendala Teknis', 1, 25),
(49, 5, 'Head Office 3', 'Nomor Laporan', 'S', 'Topik', '2023-12-19', NULL, 'SENT', NULL, NULL, 'Kendala Teknis', 1, 25);

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
(7, 'Tim Proyek E', 'Deskripsi Tim Proyek E', '2023-10-29'),
(8, 'Tim Akses Tol makassar New Port', 'Akses Tol makassar New Port', '2023-11-09'),
(9, 'Tim Bandar Udara Banggai', 'Bandar Udara Banggai', '2023-11-09'),
(10, 'Tim Bendungan Ameroro', 'Bendungan Ameroro', '2023-11-09');

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
(25, 'Head Office 3', 'Staff of Engineering', 'Design & Analysis', '333333', '089978686878', '$2y$10$URcpbBLvxaGkUpI.Oob9E.lM7NVYlMEMwg019euLFVcNsn8jKuMYK', 'Head Office', '11042023061813 Head Office 3.jpg'),
(26, 'Head Office 4', 'Staff of Engineering', 'BIM & Digitalization Engineering', '333334', '08989813412421', '$2y$10$WDVWReivpdkA22aUE1SA6OYThRdvMMLp4fR3HDYVmKg4FTof5AZOe', 'Head Office', '11062023034654 Head Office 4.jpg'),
(27, 'Luthfi Bina', 'Staff Corporate', 'System Engineering & Lean Construction', 'ET032190', '123456789', '$2y$10$4B4HKg1oDiPD.lmjtCvLTucPc7W1X6v0dV6PQHYMl0enrpe39odT2', 'Head Office', '11102023043204 Luthfi Bina.jpg'),
(28, 'Aliq Taufan Arisono', 'Staff Corporate', 'System Engineering & Lean Construction', 'ET173874', '123456789', '$2y$10$LPB/DSpZ.o9COJZv5gr/z.WiQBs3NC/i0aVTjQYcUTyQbJl77FLy.', 'Head Office', '11102023043306 Aliq Taufan Arisono.jpg'),
(29, 'Muhammad Risyad Alditio, ST.', 'Staff Corporate', 'Design & Analysis', 'ET194333', '123456789', '$2y$10$cNDjGrpv1sTb6qXJ3MxYS.RB6dl3pJAZEe1vNXjYT4Z7i1jAjJ.Sm', 'Head Office', '11102023043430 Muhammad Risyad Alditio, ST..jpg'),
(30, 'R.M. Ihsan', 'Staff Corporate', 'Design & Analysis', 'ET194334', '123456789', '$2y$10$qJ1YkMb4YMyyM61TO4ecWub5X08Tjey2DYj1PhGzDF8CAi.TP5Cly', 'Head Office', '11102023043522 R.M. Ihsan.jpg'),
(31, 'Wahyu Imam Pambudi', 'Staff Corporate', 'Design & Analysis', 'ET173858', '123456789', '$2y$10$LjDR6yfZpeFV7WWUpuu8Y.xlnhbXTnhhkpRY1.qXE/uXBE.HDe/4S', 'Head Office', '11102023043621 Wahyu Imam Pambudi.jpg'),
(32, 'Rizky Dhewandaru', 'Staff Corporate', 'Design & Analysis', 'ET194389', '123456789', '$2y$10$.8wmL2Ydi.Zjb2CuoFa6v.NJ2.VDdwJ/isGB7/8JttlKFmqj5XooG', 'Head Office', '11102023043714 Rizky Dhewandaru.jpg'),
(33, 'Andrian Wibisono', 'Staff Corporate', 'System Engineering & Lean Construction', 'ET224521', '123456789', '$2y$10$t5kbRbpSjF6qbkfD6CQhA..4Il5owS/lfKVo1XJasgN314ppjNhZG', 'Head Office', '11102023044026 Andrian Wibisono.jpg'),
(34, 'Aswadi Irsyadillah', 'Staff Corporate', 'Design & Analysis', 'ET194363', '123456789', '$2y$10$u/zVDd.jr3Hv7yuo.oYgcOk6H0luu0GGcS6XE.mEIbUfG8moCE8gK', 'Head Office', '11102023044131 Aswadi Irsyadillah.jpg'),
(35, 'Aryo Bimantoro', 'Staff Corporate', 'Design & Analysis', 'ET184207', '123456789', '$2y$10$ud7JEqN.KLAQMZlY8c0dSeWS.kGX3LwglNhByUm87p4s.YmwPDBea', 'Head Office', '11102023044225 Aryo Bimantoro.jpg'),
(36, 'Anan Febyanto Sanjaya', 'Staff Corporate', 'Design & Analysis', 'LS193837', '123456789', '$2y$10$c5QpeaBDVBM/2aPuy91Ower1LEqDFqwNWimVY0TQ16n8CQRLY6Dw.', 'Head Office', '11102023044318 Anan Febyanto Sanjaya.jpg'),
(37, 'Agus Ubaidillah', 'Coordinator', 'BIM & Digitalization Engineering', 'ET122830', '123456789', '$2y$10$MYbeRJhk4FrK.2zjgnmXn.wVcDmqPRS2RrRX4/.hPePH1T7XvDsyu', 'Head Office', '11102023044435 Agus Ubaidillah.jpg'),
(38, 'Nico Okto Wahyu Hartama', 'Staff Corporate', 'BIM & Digitalization Engineering', 'K.19.0573', '123456789', '$2y$10$26kgnbDP2JTZnI5MpIGQ1ujwCOARKJG9denMY3hSDvrLJraG.H3Le', 'Head Office', '11102023044526 Nico Okto Wahyu Hartama.jpg'),
(39, 'Herlambang Bagus Sulistyo', 'Staff Corporate', 'BIM & Digitalization Engineering', 'ET163730', '123456789', '$2y$10$upMlbbkVTKLDxmxVJSnFkOyrIwtafDtl6LRxxAc//ocUDyX9nYaAu', 'Head Office', '11102023044645 Herlambang Bagus Sulistyo.jpg'),
(40, 'Rifki Rahmadian Pangestu', 'Staff Corporate', 'BIM & Digitalization Engineering', 'ET204480', '123456789', '$2y$10$ANcu4APoKHmVS6.7oNA7xuMRW56uUgcXatUIWMHQol152hddUJsyK', 'Head Office', '11102023044740 Rifki Rahmadian Pangestu.jpg'),
(41, 'Prita Nur Rifdah', 'Staff Corporate', 'BIM & Digitalization Engineering', 'Magang', '085860500814', '$2y$10$gMniWGgLKu9abJhW/iGnt.DtcCKVV8SD9McqKU7pHGriMk0c/6jUm', 'Head Office', '11102023044842 Prita Nur Rifdah.jpg'),
(42, 'Muhammad Aqrobin', 'Coordinator', 'System Engineering & Lean Construction', 'ET082466', '123456789', '$2y$10$AmAjaX18pwub3m4MfpynSO6ZqRlIMlz3Is2pIgaRv5u/7Nb6dJQ9C', 'Head Office', '11102023044940 Muhammad Aqrobin.jpg'),
(43, 'Muhammad Ariful Akbar', 'Staff Corporate', 'System Engineering & Lean Construction', 'ET163808', '123456789', '$2y$10$HRjJ7JaU0XZR1GkT4jmNPeOBjP60Kr6rJRrgjcf9XHn5u7ZM4Seka', 'Head Office', '11102023045032 Muhammad Ariful Akbar.jpg'),
(44, 'Ahmad Najib', 'Staff Corporate', 'System Engineering & Lean Construction', 'ET133080', '123456789', '$2y$10$9wDgvz92nCizjonDrVD1w.HdzpZXDGjseuLL0WwQet7CnQURbwFxW', 'Head Office', '11102023045150 Ahmad Najib.jpg'),
(45, 'Antonius Herdianto Gultom', 'Staff Corporate', 'System Engineering & Lean Construction', 'LS153485', '123456789', '$2y$10$dJOot.VnnLuDV1g2TzAEIOjqkRF7TI47giwnHmeCzWg95TgqErMeS', 'Head Office', '11102023045243 Antonius Herdianto Gultom.jpg'),
(46, 'Meiko Yogatama', 'Staff Corporate', 'System Engineering & Lean Construction', 'LS193812', '123456789', '$2y$10$KE5veszgrtVwVHFuEc2nduG2JrllF1fABifP1zhOudbBd36m5OdFW', 'Head Office', '11102023045348 Meiko Yogatama.jpg'),
(47, 'Marjukih', 'Staff Corporate', 'System Engineering & Lean Construction', 'LS203851', '123456789', '$2y$10$5DoEaX6qNCJ3FlykfWGECuk2V6DwzsORgXkbo9F6/FcniA.VSa.c.', 'Head Office', '11102023045433 Marjukih.jpg'),
(48, 'Herru Kusuma Praja', 'Staff Corporate', 'System Engineering & Lean Construction', 'ET163721', '123456789', '$2y$10$v3KIE5WWiGhP60enqazXMuCsZtmccdS7EZIWMUGNui1/.zeSaQzDC', 'Head Office', '11102023045541 Herru Kusuma Praja.jpg'),
(49, 'M. Zaenal Muttaqin', 'Staff Corporate', 'System Engineering & Lean Construction', 'ET153447', '123456789', '$2y$10$AH7BkLcPXeyfRi7vdJsF0ueetdn4OJtirxTRbGMPPG29qKGUl5X.i', 'Head Office', '11102023045647 M. Zaenal Muttaqin.jpg'),
(50, 'Muhamad Ali', 'Staff Corporate', 'System Engineering & Lean Construction', 'LS153456', '123456789', '$2y$10$ibnlPIb8MUNfXLs5eyfbI.iBPJ2pUVE0bNBlheERXmBXqE4dafzhS', 'Head Office', '11102023045733 Muhamad Ali.jpg'),
(51, 'Paraserian Firdaus', 'Staff Corporate', 'System Engineering & Lean Construction', 'ET163687', '13456789', '$2y$10$nXsKheBL.i9hvY2ndvSL.e5di9sv48VzdnzOpGhwmoBp5GMB3m/Ou', 'Head Office', '11102023045830 Paraserian Firdaus.jpg'),
(52, 'Soleh', 'Staff Corporate', 'System Engineering & Lean Construction', 'LS193784', '123456789', '$2y$10$bxv/eZ7vo40uM3Pi1WLqAOVJL4QKi4Rd149Z0BsMEMJpbngk2nZ6S', 'Head Office', '11102023045922 Soleh.jpg'),
(53, 'Yanto Agus Wahyudi', 'Staff Corporate', 'System Engineering & Lean Construction', 'LS962699', '08987675767', '$2y$10$mcCSVirxtxck3u1k.Ngq.evDK0M0n2pgCeKNFIRuvBfrN21bCDjTS', 'Head Office', '11102023050011 Yanto Agus Wahyudi.jpg'),
(54, 'Alve Yunus', 'Kepala Seksi', NULL, 'makassar', '081294304555', '$2y$10$t7APuzXSaJ/uNhRaVlCyEe/GcluZTMaKaCOK2oxttPVFCOFzsk51C', 'Tim Proyek', '11102023050257 Alve Yunus.jpg'),
(55, 'Agustinus Dimas', 'Kepala Seksi', NULL, 'banggai', '081230000706', '$2y$10$HAzI7mO4Pm1miYuSPvkZwO0P22S10Du1JlFxf.NTn.DRknaAJeymO', 'Tim Proyek', '11102023050353 081294304555.jpg'),
(56, 'Dedi Chandra', 'Kepala Seksi', NULL, 'ameroro', '081230000706', '$2y$10$DHO3lsNI1x6zA/.wrGnF4OxtXiVFVdGSJ/.aUonPdbHe.gwEWiODS', 'Tim Proyek', '11102023050631 Dedi Chandra.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_tim_proyek`
--
ALTER TABLE `detail_tim_proyek`
  ADD PRIMARY KEY (`id_detail_tim_proyek`);

--
-- Indexes for table `dokumen_lps`
--
ALTER TABLE `dokumen_lps`
  ADD PRIMARY KEY (`id_dokumen_lps`);

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
-- Indexes for table `ki_km`
--
ALTER TABLE `ki_km`
  ADD PRIMARY KEY (`id_ki_km`);

--
-- Indexes for table `lps`
--
ALTER TABLE `lps`
  ADD PRIMARY KEY (`id_lps`);

--
-- Indexes for table `master_activity`
--
ALTER TABLE `master_activity`
  ADD PRIMARY KEY (`id_master_activity`);

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
-- Indexes for table `rkp`
--
ALTER TABLE `rkp`
  ADD PRIMARY KEY (`id_rkp`);

--
-- Indexes for table `technical_supporting`
--
ALTER TABLE `technical_supporting`
  ADD PRIMARY KEY (`id_technical_supporting`);

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
  MODIFY `id_detail_tim_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dokumen_lps`
--
ALTER TABLE `dokumen_lps`
  MODIFY `id_dokumen_lps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `engineering_activity`
--
ALTER TABLE `engineering_activity`
  MODIFY `id_engineering_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `kategori_pekerjaan`
--
ALTER TABLE `kategori_pekerjaan`
  MODIFY `id_kategori_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `ki_km`
--
ALTER TABLE `ki_km`
  MODIFY `id_ki_km` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lps`
--
ALTER TABLE `lps`
  MODIFY `id_lps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `master_activity`
--
ALTER TABLE `master_activity`
  MODIFY `id_master_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- AUTO_INCREMENT for table `monthly_report`
--
ALTER TABLE `monthly_report`
  MODIFY `id_monthly_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rkp`
--
ALTER TABLE `rkp`
  MODIFY `id_rkp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `technical_supporting`
--
ALTER TABLE `technical_supporting`
  MODIFY `id_technical_supporting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tim_proyek`
--
ALTER TABLE `tim_proyek`
  MODIFY `id_tim_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
