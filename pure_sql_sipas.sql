-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2023 at 12:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipas`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi_detail`
--

CREATE TABLE `disposisi_detail` (
  `disposisiId` varchar(255) NOT NULL,
  `A17` tinyint(2) NOT NULL,
  `A18` tinyint(2) NOT NULL,
  `A19` tinyint(2) NOT NULL,
  `A20` tinyint(2) NOT NULL,
  `A21` tinyint(2) NOT NULL,
  `A22` tinyint(2) NOT NULL,
  `A23` tinyint(2) NOT NULL,
  `A24` tinyint(2) NOT NULL,
  `A25` tinyint(2) NOT NULL,
  `A26` tinyint(2) NOT NULL,
  `A27` tinyint(2) NOT NULL,
  `A28` tinyint(2) NOT NULL,
  `A29` tinyint(2) NOT NULL,
  `A30` tinyint(2) NOT NULL,
  `A31` tinyint(2) NOT NULL,
  `A32` tinyint(2) NOT NULL,
  `A33` tinyint(2) NOT NULL,
  `A34` tinyint(2) NOT NULL,
  `F17` tinyint(2) NOT NULL,
  `F19` tinyint(2) NOT NULL,
  `F20` tinyint(2) NOT NULL,
  `F21` tinyint(2) NOT NULL,
  `F22` tinyint(2) NOT NULL,
  `F23` tinyint(2) NOT NULL,
  `F24` tinyint(2) NOT NULL,
  `F25` tinyint(2) NOT NULL,
  `F26` tinyint(2) NOT NULL,
  `F27` tinyint(2) NOT NULL,
  `F28` tinyint(2) NOT NULL,
  `F29` tinyint(2) NOT NULL,
  `F30` tinyint(2) NOT NULL,
  `F31` tinyint(2) NOT NULL,
  `F32` tinyint(2) NOT NULL,
  `F33` tinyint(2) NOT NULL,
  `F34` tinyint(2) NOT NULL,
  `L17` tinyint(2) NOT NULL,
  `L19` tinyint(2) NOT NULL,
  `L21` tinyint(2) NOT NULL,
  `L23` tinyint(2) NOT NULL,
  `L25` tinyint(2) NOT NULL,
  `L27` tinyint(2) NOT NULL,
  `L30` tinyint(2) NOT NULL,
  `L32` tinyint(2) NOT NULL,
  `L34` tinyint(2) NOT NULL,
  `L36` tinyint(2) NOT NULL,
  `Q6` tinyint(2) NOT NULL,
  `Q7` tinyint(2) NOT NULL,
  `Q8` tinyint(2) NOT NULL,
  `Q9` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_trx`
--

CREATE TABLE `log_trx` (
  `idLog` int(11) NOT NULL,
  `trxId` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `logDate` date NOT NULL,
  `statusLog` varchar(50) NOT NULL,
  `keteranganLog` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_auth`
--

CREATE TABLE `tb_auth` (
  `idAuth` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `level` tinyint(2) NOT NULL,
  `regisDate` date NOT NULL,
  `updateDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_disposisi`
--

CREATE TABLE `tb_disposisi` (
  `idDisposisi` varchar(255) NOT NULL,
  `trxId` varchar(255) NOT NULL,
  `nomorAgendaD` int(11) NOT NULL,
  `tglPenerimaanD` date NOT NULL,
  `asalSuratD` varchar(255) NOT NULL,
  `ringkasanKet` text NOT NULL,
  `lampiranD` text NOT NULL,
  `tglPenyelesaianD` date NOT NULL,
  `tingkatKeamananD` varchar(3) NOT NULL,
  `updateDisposisiDate` date NOT NULL,
  `tujuanPimpinanD` enum('kajati','wakajati','pimpinan','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_trx`
--

CREATE TABLE `tb_trx` (
  `idTrx` varchar(255) NOT NULL,
  `judulSurat` varchar(255) NOT NULL,
  `tglSuratMasuk` date NOT NULL,
  `tglSuratProses` date NOT NULL,
  `resPiket` int(11) NOT NULL,
  `resPersuratan` int(11) NOT NULL,
  `resPimpinan` int(11) NOT NULL,
  `resOut` int(11) NOT NULL,
  `disposisiId` varchar(255) NOT NULL,
  `updateTrxDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trx_detail`
--

CREATE TABLE `trx_detail` (
  `trxId` varchar(255) NOT NULL,
  `nomorDTrx` varchar(255) NOT NULL,
  `lampiranDTrx` varchar(255) NOT NULL,
  `keteranganDTrx` text NOT NULL,
  `ulasanDTrx` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_trx`
--
ALTER TABLE `log_trx`
  ADD PRIMARY KEY (`idLog`);

--
-- Indexes for table `tb_auth`
--
ALTER TABLE `tb_auth`
  ADD PRIMARY KEY (`idAuth`);

--
-- Indexes for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  ADD PRIMARY KEY (`idDisposisi`);

--
-- Indexes for table `tb_trx`
--
ALTER TABLE `tb_trx`
  ADD PRIMARY KEY (`idTrx`);

--
-- Indexes for table `trx_detail`
--
ALTER TABLE `trx_detail`
  ADD PRIMARY KEY (`trxId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_trx`
--
ALTER TABLE `log_trx`
  MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_auth`
--
ALTER TABLE `tb_auth`
  MODIFY `idAuth` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
