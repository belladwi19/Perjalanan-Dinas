-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2023 at 09:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perjalanan-dinas`
--

-- --------------------------------------------------------

--
-- Table structure for table `perjalanans`
--

CREATE TABLE `perjalanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggalberangkat` date NOT NULL,
  `tanggalpulang` date NOT NULL,
  `kotaasal` varchar(255) NOT NULL,
  `kotatujuan` varchar(255) NOT NULL,
  `durasi` double NOT NULL,
  `id_user` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jarak` double DEFAULT NULL,
  `uangsaku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perjalanans`
--

INSERT INTO `perjalanans` (`id`, `keterangan`, `tanggalberangkat`, `tanggalpulang`, `kotaasal`, `kotatujuan`, `durasi`, `id_user`, `Status`, `created_at`, `updated_at`, `jarak`, `uangsaku`) VALUES
(1, 'Kunjungan rutin', '2023-08-10', '2023-08-15', 'Surabaya', 'Jakarta', 5, 2, 'Reject', '2023-08-10 05:42:48', '2023-08-10 07:11:55', 720, 1500000),
(2, 'Nego Program Kemitraan', '2023-08-10', '2023-08-12', 'Ponorogo', 'Surabaya', 2, 2, 'Approve', '2023-08-10 05:42:48', '2023-08-10 07:51:01', 60, 500000),
(3, 'asdasasa', '2023-08-11', '2023-08-14', 'Singapore', 'Hongkong', 3, 2, 'Pending', '2023-08-10 23:56:56', '2023-08-10 23:56:56', 2589.4675769973, 900000),
(4, 'Perjalanan luar negeri', '2023-08-18', '2023-08-20', 'Singapore', 'Hongkong', 2, 2, 'Pending', '2023-08-11 00:05:50', '2023-08-11 00:05:50', 2589.4675769973, 1522100),
(5, 'Perjalanan luar pulau say', '2023-08-11', '2023-08-15', 'Jakarta', 'Medan', 4, 2, 'Pending', '2023-08-11 00:21:24', '2023-08-11 00:21:24', 1415.279791658, 1200000),
(6, 'Perjalanan outing', '2023-08-30', '2023-09-02', 'Surabaya', 'Jakarta', 3, 2, 'Pending', '2023-08-11 00:22:10', '2023-08-11 00:22:10', 667.55006299707, 750000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perjalanans`
--
ALTER TABLE `perjalanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perjalanans_id_pegawai_index` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perjalanans`
--
ALTER TABLE `perjalanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
