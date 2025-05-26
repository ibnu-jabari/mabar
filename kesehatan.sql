-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 03:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kesehatan`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_identitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `email`, `password`, `id_identitas`) VALUES
(5, 'test@gmail.com', '$2y$10$vAFVXIdy3CVLWn99XWzy9Ob/Tb.Lzwbryq.AOcwf4R9K6y0r/hD9S', 10);

-- --------------------------------------------------------

--
-- Table structure for table `bmi`
--

CREATE TABLE `bmi` (
  `id_bmi` int(11) NOT NULL,
  `bb` float DEFAULT NULL,
  `tb` float DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bmi`
--

INSERT INTO `bmi` (`id_bmi`, `bb`, `tb`, `kategori`, `tgl_input`) VALUES
(6, 55, 169, 'Normal', '2025-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `diabetes`
--

CREATE TABLE `diabetes` (
  `id_diabetes` int(11) NOT NULL,
  `risiko` varchar(50) DEFAULT NULL,
  `skor` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diabetes`
--

INSERT INTO `diabetes` (`id_diabetes`, `risiko`, `skor`, `tanggal`) VALUES
(1, 'Tinggi', 5, '2025-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `gender` enum('L','P') NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `id_bmi` int(11) DEFAULT NULL,
  `id_mental` int(11) DEFAULT NULL,
  `id_bmr` int(11) DEFAULT NULL,
  `id_diabetes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama`, `gender`, `tgl_lahir`, `usia`, `id_bmi`, `id_mental`, `id_bmr`, `id_diabetes`) VALUES
(10, 'testimoni', 'P', '2025-05-06', 0, 6, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mental`
--

CREATE TABLE `mental` (
  `id_mental` int(11) NOT NULL,
  `skor` int(11) DEFAULT NULL,
  `kategori` varchar(30) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mental`
--

INSERT INTO `mental` (`id_mental`, `skor`, `kategori`, `tgl_input`) VALUES
(0, 18, 'Cukup Berat', '2025-05-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD KEY `fk_akun_identitas` (`id_identitas`);

--
-- Indexes for table `bmi`
--
ALTER TABLE `bmi`
  ADD PRIMARY KEY (`id_bmi`);

--
-- Indexes for table `diabetes`
--
ALTER TABLE `diabetes`
  ADD PRIMARY KEY (`id_diabetes`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`),
  ADD KEY `fk_identitas_bmi` (`id_bmi`),
  ADD KEY `fk_identitas_mental` (`id_mental`),
  ADD KEY `fk_identitas_diabetes` (`id_diabetes`);

--
-- Indexes for table `mental`
--
ALTER TABLE `mental`
  ADD PRIMARY KEY (`id_mental`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bmi`
--
ALTER TABLE `bmi`
  MODIFY `id_bmi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `diabetes`
--
ALTER TABLE `diabetes`
  MODIFY `id_diabetes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `fk_akun_identitas` FOREIGN KEY (`id_identitas`) REFERENCES `identitas` (`id_identitas`);

--
-- Constraints for table `identitas`
--
ALTER TABLE `identitas`
  ADD CONSTRAINT `fk_bmi` FOREIGN KEY (`id_bmi`) REFERENCES `bmi` (`id_bmi`),
  ADD CONSTRAINT `fk_identitas_bmi` FOREIGN KEY (`id_bmi`) REFERENCES `bmi` (`id_bmi`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_identitas_diabetes` FOREIGN KEY (`id_diabetes`) REFERENCES `diabetes` (`id_diabetes`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_identitas_mental` FOREIGN KEY (`id_mental`) REFERENCES `mental` (`id_mental`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
