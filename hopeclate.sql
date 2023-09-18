-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2023 at 12:17 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hopeclate`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftarmenu`
--

CREATE TABLE `daftarmenu` (
  `menuid` int(11) NOT NULL,
  `menunama` varchar(225) NOT NULL,
  `menukategori` varchar(225) NOT NULL,
  `menuharga` double(15,2) NOT NULL,
  `menufoto` varchar(225) NOT NULL,
  `penjualan` double(15,2) NOT NULL,
  `rasa` double(15,2) NOT NULL,
  `kebersihan` double(15,2) NOT NULL,
  `pelayanan` double(15,2) NOT NULL,
  `totalnilai` double(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftarmenu`
--

INSERT INTO `daftarmenu` (`menuid`, `menunama`, `menukategori`, `menuharga`, `menufoto`, `penjualan`, `rasa`, `kebersihan`, `pelayanan`, `totalnilai`) VALUES
(1, 'Pizza', 'Food', 90000.00, '1.jpg', 0.00, 0.00, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` varchar(100) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `level`) VALUES
('admin', 'Administrator', '123', 1),
('tino', 'tino', '12345', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftarmenu`
--
ALTER TABLE `daftarmenu`
  ADD PRIMARY KEY (`menuid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftarmenu`
--
ALTER TABLE `daftarmenu`
  MODIFY `menuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
