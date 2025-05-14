-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 14, 2025 at 03:01 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_absensi`
--

CREATE TABLE `tabel_absensi` (
  `id_absensi` char(36) NOT NULL,
  `id_jadwal` int NOT NULL,
  `id_mahasiswa` int NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('hadir','izin','sakit','alpa') NOT NULL,
  `waktu_absen` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_absensi_dosen`
--

CREATE TABLE `tabel_absensi_dosen` (
  `id_absensi_dosen` int NOT NULL,
  `id_jadwal` int NOT NULL,
  `id_dosen` int NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('hadir','izin','sakit','alpa') NOT NULL,
  `waktu_absen` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `id_admin` char(36) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_dosen`
--

CREATE TABLE `tabel_dosen` (
  `id_dosen` char(36) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `Nip` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_prodi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_fakultas`
--

CREATE TABLE `tabel_fakultas` (
  `id_fakultas` int NOT NULL,
  `nama_fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jadwal_kuliah`
--

CREATE TABLE `tabel_jadwal_kuliah` (
  `id_jadwal` int NOT NULL,
  `id_mk` char(36) NOT NULL,
  `id_dosen` char(36) NOT NULL,
  `hari` enum('senin','selasa','rabu','kamis','jumata') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jam_mulai` time(6) NOT NULL,
  `jam_selesai` time(6) NOT NULL,
  `ruang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kelas_mahasiswa`
--

CREATE TABLE `tabel_kelas_mahasiswa` (
  `id_kelas` int NOT NULL,
  `id_mahasiswa` char(36) NOT NULL,
  `id_mk` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_log_aktivitas`
--

CREATE TABLE `tabel_log_aktivitas` (
  `id_log` int NOT NULL,
  `id_admin` char(36) NOT NULL,
  `aktivitas` varchar(100) NOT NULL,
  `waktu` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mahasiswa`
--

CREATE TABLE `tabel_mahasiswa` (
  `id_mahasiswa` char(36) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `Nim` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_prodi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mata_kuliah`
--

CREATE TABLE `tabel_mata_kuliah` (
  `id_mk` char(36) NOT NULL,
  `nama_mk` varchar(100) NOT NULL,
  `kode_mk` varchar(50) NOT NULL,
  `sks` int NOT NULL,
  `id_prodi` int NOT NULL,
  `id_dosen` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_prodi`
--

CREATE TABLE `tabel_prodi` (
  `id_prodi` int NOT NULL,
  `id_fakultas` char(36) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_role`
--

CREATE TABLE `tabel_role` (
  `id` int NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_role`
--

INSERT INTO `tabel_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Dosen'),
(3, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email_verify` timestamp NULL DEFAULT NULL,
  `role_id` int NOT NULL,
  `is_active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id`, `nama`, `email`, `phone`, `password`, `email_verify`, `role_id`, `is_active`) VALUES
('0fd23864-7e7b-4b0e-a4f9-0d7c3d9f57ba', 'ilham', 'ilhammtg2020@gmail.com', '', '$2y$10$4is588kwW5iPFR6jfrDHR.39s1YR1Hm7Y4/6de/2AaFPoqBWVS2M.', NULL, 3, 1),
('1936c993-bcac-415d-8e0e-0848d595df11', 'syifa', 'syifasafira5656@gmail.com', '', '$2y$10$26ahYz7mcHLPInH4Q21xuuwja1zgaF.ufCurrwQVytZ6MzqNrcJ8O', NULL, 2, 1),
('401dab6c-e26f-4e26-bedb-f8fd6da1c7b8', 'safira', 'syifasafira427@gmail.com', '', '$2y$10$uoLfQBMSdXoLbBhULdDude6WA6qqeQbGUohpU7lsBIlHWyewSTeg2', NULL, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int NOT NULL,
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'dosen'),
(3, 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(5, 'Syifasafira856@gmail.com', 'G4lD5brimnPgFSA1fUw-0xxt7nCMD6V2kdK6RcpHXrw', 1746960370),
(9, 'ilhammtg2020@gmail.com', 'xhxiiIo3QBA9FaCF0NVBeg9cQWsEGzJArF8PHuwCQHQ=', 1747130500),
(10, 'ilhammtg2020@gmail.com', 'Luwwv3z15c7O06TFxWxgAH4xetm+S+2G/rmuKQdJudY=', 1747131034),
(12, 'syifasafira427@gmail.com', 'hPQZJ2uAVmziSIb/hkULuN7zGJ87Af+tbELDdmzPwK0=', 1747131218),
(13, 'syifasafira427@gmail.com', 'XheLPPu6LGlrkpYGD4FOnkRn/krZA8MSidKtj3dPU5Q=', 1747185604),
(14, 'syifasafira427@gmail.com', 'G+PDRHyjqJ53EbN4mHw2BoEBf7ECh7dby9XuNb5rq4U=', 1747185675);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_absensi`
--
ALTER TABLE `tabel_absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `tabel_absensi_dosen`
--
ALTER TABLE `tabel_absensi_dosen`
  ADD PRIMARY KEY (`id_absensi_dosen`);

--
-- Indexes for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tabel_dosen`
--
ALTER TABLE `tabel_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tabel_fakultas`
--
ALTER TABLE `tabel_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `tabel_jadwal_kuliah`
--
ALTER TABLE `tabel_jadwal_kuliah`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tabel_kelas_mahasiswa`
--
ALTER TABLE `tabel_kelas_mahasiswa`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tabel_log_aktivitas`
--
ALTER TABLE `tabel_log_aktivitas`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `tabel_mata_kuliah`
--
ALTER TABLE `tabel_mata_kuliah`
  ADD PRIMARY KEY (`id_mk`);

--
-- Indexes for table `tabel_prodi`
--
ALTER TABLE `tabel_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tabel_role`
--
ALTER TABLE `tabel_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_role`
--
ALTER TABLE `tabel_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
