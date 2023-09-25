-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 12:53 PM
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
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `bobotid` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`bobotid`, `jenis`, `nilai`) VALUES
(1, 'Sangat Tinggi', 5),
(2, 'Tinggi', 4),
(3, 'Sedang', 3),
(4, 'Rendah', 2),
(5, 'Sangat Rendah', 1);

-- --------------------------------------------------------

--
-- Table structure for table `daftarmenu`
--

CREATE TABLE `daftarmenu` (
  `menuid` int(11) NOT NULL,
  `menunama` varchar(225) NOT NULL,
  `menukategori` varchar(225) NOT NULL,
  `menuharga` double(15,2) NOT NULL,
  `menufoto` text NOT NULL,
  `n_harga` int(11) NOT NULL,
  `n_rasa` int(11) NOT NULL,
  `n_kebersihan` int(11) NOT NULL,
  `n_pelayanan` int(11) NOT NULL,
  `totalnilai` double(15,2) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftarmenu`
--

INSERT INTO `daftarmenu` (`menuid`, `menunama`, `menukategori`, `menuharga`, `menufoto`, `n_harga`, `n_rasa`, `n_kebersihan`, `n_pelayanan`, `totalnilai`, `deskripsi`) VALUES
(1, 'Pizza', 'Food', 90000.00, '1695103828_e066ba407710c7db2b92.jpg', 2, 4, 5, 4, 14.53, 'Made By Fluffy Dough With Creamy Mozarella And Champignon Mushroom\r\n'),
(5, 'Spaghetti', 'Food', 60000.00, '1695104813_95cefaeb1d2b95ff7f9a.jpg', 3, 5, 5, 3, 15.47, 'Served With Delicious Chicken / Beef / Squid / Prawn Sauce'),
(6, 'Nasi Goreng', 'Food', 35000.00, '1695109341_776c10bedd9e58e31bd2.jpeg', 4, 3, 4, 4, 13.40, 'Fried Rice With Two Eggs And Also Fresh Vegetables'),
(7, 'Sate Ayam', 'Food', 40000.00, '1695109347_0ff7edb5de61eaa76fc5.jpeg', 4, 4, 4, 4, 14.40, 'Chicken Satay Served With Sweet Or Spicy Peanut Sauce\r\n'),
(8, 'Chiken Wings', 'Food', 60000.00, '1695109353_e37dc4c78a5f94228762.jpeg', 3, 4, 5, 5, 15.80, 'Chicken Wings Served With Bulgogi Or Teriyaki Sauce\r\n'),
(9, 'Bakmi Ayam', 'Food', 35000.00, '1695109361_a3ca055b36ff0f67906a.jpeg', 4, 5, 3, 4, 14.07, 'Chicken Noodle Served With Meat Balls\r\n'),
(10, 'Ayam Bakar', 'Food', 45000.00, '1695109368_224abcf4887cb3da6712.jpeg', 3, 4, 5, 4, 15.13, 'Grilled Chicken Served With Hot Chili Sauce And Fresh Vegetables'),
(11, 'Nila Bakar', 'Food', 45000.00, '1695109376_0f44f4a31997a259f3f8.jpeg', 3, 3, 5, 4, 14.13, 'Grilled Parrot Fish Served With Hot Chili Sauce And Fresh Vegetables'),
(12, 'Bakso Kuah', 'Food', 40000.00, '1695109382_0ececda42487a31d4713.jpeg', 4, 4, 3, 3, 12.40, 'Five Meat Balls Served With Beef Broth And Noodles'),
(13, 'Sop Iga', 'Food', 65000.00, '1695109389_003f65f9368577b3f21c.jpeg', 2, 4, 4, 4, 13.20, 'Beef Ribs Served With Rice And Chili Sauce'),
(14, 'Americano', 'Beverages', 35000.00, '1695109396_1fc120044ac0da1a5c6b.jpeg', 4, 3, 4, 4, 13.40, 'Smooth Coffee Beans Made With Single Shot Or Double Shot'),
(15, 'Cappucino', 'Beverages', 45000.00, '1695109580_1241d245038f1a239c7d.jpeg', 3, 4, 4, 4, 13.80, 'Smooth Coffee Beans Made With Steamed Fresh Milk'),
(16, 'Mochacino', 'Beverages', 45000.00, '1695109588_d2dbdef08ed6d15672c5.jpeg', 3, 5, 4, 5, 15.47, 'Smooth Coffee Beans And Dark Chocolate Made With Steamed Fresh Milk'),
(17, 'Chocolate', 'Beverages', 40000.00, '1695109597_5f9eebb511068303cc12.jpeg', 4, 4, 4, 4, 14.40, 'Smooth Chocolate Made With Steamed Fresh Milk And Chocolate Topping'),
(18, 'Mix Juice', 'Beverages', 60000.00, '1695109605_afed41d4ae692841d4d6.jpeg', 3, 5, 4, 4, 14.80, 'Fresh Mix Fruit Blended With Some Water And Simple Syrup'),
(19, 'Soda Gembira', 'Beverages', 30000.00, '1695109613_85c0528f3ace716b7dfe.jpeg', 4, 3, 4, 3, 12.73, 'Served With Creamer And Fanta'),
(20, 'Soft Drink', 'Beverages', 25000.00, '1695109620_fd1772b040cc556b37fe.jpeg', 4, 4, 4, 4, 14.40, 'There Are Soda, Sprite, Fantaa, And Coca-Cola'),
(21, 'Tea', 'Beverages', 25000.00, '1695109627_a16765873a40a850f01b.jpeg', 4, 3, 4, 4, 13.40, 'Selected From Leaves Choice Of Tea'),
(22, 'Lemon Tea', 'Beverages', 45000.00, '1695109634_595b46de1e4eb041d3ea.jpeg', 3, 4, 4, 4, 13.80, 'Fresh Tea Served With Fresh Lemon'),
(23, 'Lychee Tea', 'Beverages', 45000.00, '1695109641_3f26c1492d387a56073c.jpeg', 4, 4, 4, 5, 15.07, 'Fresh Tea Served With Fresh Lychee'),
(24, 'Mineral Water', 'Beverages', 20000.00, '1695109569_5151c4a41e037f5f7998.jpeg', 5, 4, 4, 4, 15.00, 'Packaged Using The Best Security Technology');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `kriteria` varchar(225) NOT NULL,
  `bobot` int(11) NOT NULL,
  `atribut` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `kriteria`, `bobot`, `atribut`) VALUES
(1, 'Harga', 3, 'Benefit'),
(2, 'Rasa', 1, 'Benefit'),
(3, 'Kebersihan', 2, 'Cost'),
(5, 'Pelayanan', 4, 'Cost');

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
('admin', 'Administrator', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`bobotid`);

--
-- Indexes for table `daftarmenu`
--
ALTER TABLE `daftarmenu`
  ADD PRIMARY KEY (`menuid`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `bobotid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `daftarmenu`
--
ALTER TABLE `daftarmenu`
  MODIFY `menuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
