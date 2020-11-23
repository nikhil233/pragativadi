-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 03:50 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_manag`
--

-- --------------------------------------------------------

--
-- Table structure for table `news_map`
--

CREATE TABLE `news_map` (
  `id` int(11) NOT NULL,
  `news_im_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `x` int(255) NOT NULL,
  `y` int(255) NOT NULL,
  `x2` int(255) NOT NULL,
  `y2` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_map`
--

INSERT INTO `news_map` (`id`, `news_im_id`, `image`, `x`, `y`, `x2`, `y2`) VALUES
(1, 42, '1606001070_7605.jpg', 28, 180, 608, 617),
(2, 42, '1606001130_5434.jpg', 623, 193, 963, 761),
(3, 42, '1606001183_2753.jpg', 159, 910, 498, 1473),
(4, 42, '1606001976_7842.jpg', 320, 7, 660, 147),
(5, 43, '1606012624_8114.jpg', 0, -1, 426, 456),
(7, 42, '1606014756_3537.jpg', 508, 761, 961, 1476),
(11, 55, '1606015255_6186.jpg', 624, 191, 966, 759),
(12, 56, '1606098672_9949.jpg', 28, 180, 607, 616),
(13, 25, '1606098829_4398.jpg', 79, 24, 719, 348),
(14, 43, '1606099181_6640.jpg', 823, 83, 1441, 703);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news_map`
--
ALTER TABLE `news_map`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news_map`
--
ALTER TABLE `news_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
