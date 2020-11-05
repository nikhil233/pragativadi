-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2020 at 04:31 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `role`, `password`, `email`, `status`) VALUES
(1, 'admin', 0, 'admin', 'admin@gmail.com', 1),
(3, 'Nikhil kumar', 0, '$2y$10$2pw1ENn5oxbJSVZfnGf9ZeyfqNvLxgYp6tRLaZMXesmsOIqGnNHwS', 'l.gouri1234@gmail.com', 1),
(5, 'Xyz', 1, '$2y$10$UGGBE3gSgoS4tU.kWWZm2eV8plSr/Hyho61jQu6Q/r9pIZkcLw4GG', 'xyz@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `added_on`) VALUES
(1, 'Western Odisha', '2020-10-31 12:38:14'),
(2, 'South Odisha', '2020-10-31 12:38:55'),
(3, 'North Odisha', '2020-10-31 12:39:06'),
(4, 'Coastal Odisha', '2020-10-31 12:39:16'),
(5, 'Bhubaneswar-Cuttack', '2020-10-31 12:39:49');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `status` int(5) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `cat_id`, `city_name`, `status`, `added_on`) VALUES
(1, 5, 'Bhubaneswar', 1, '2020-10-31 12:49:14'),
(2, 4, 'Balasore-Keonjhor', 1, '2020-10-31 05:15:35'),
(3, 1, 'Bhawanipatna', 1, '2020-10-31 06:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `magazine_posts`
--

CREATE TABLE `magazine_posts` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `mag_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `magazine_posts`
--

INSERT INTO `magazine_posts` (`id`, `city_id`, `mag_date`, `status`, `added_on`) VALUES
(1, 1, '2020-10-31', 1, '2020-10-31 01:19:43'),
(2, 2, '2020-10-30', 1, '2020-10-31 05:15:49'),
(3, 3, '2020-10-31', 1, '2020-11-01 05:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `magazine_post_image`
--

CREATE TABLE `magazine_post_image` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `page_no` int(11) NOT NULL,
  `mag_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `magazine_post_image`
--

INSERT INTO `magazine_post_image` (`id`, `post_id`, `page_no`, `mag_image`) VALUES
(1, 1, 1, 'Bhubaneswar_page_1_2020-10-31_9003.png'),
(2, 1, 2, 'Bhubaneswar_page_2_2020-10-31_8740.png'),
(3, 2, 1, 'Balasore-Keonjhor_page_1_2020-10-30_9986.png'),
(4, 2, 2, 'Balasore-Keonjhor_page_2_2020-10-30_1409.png'),
(5, 3, 1, 'Bhawanipatna_page_1_2020-11-01_5242.jpg'),
(6, 3, 2, 'Bhawanipatna_page_2_2020-11-01_9309.jpg'),
(7, 3, 3, 'Bhawanipatna_page_3_2020-11-01_9613.jpg'),
(8, 3, 4, 'Bhawanipatna_page_4_2020-11-01_2846.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news_posts`
--

CREATE TABLE `news_posts` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `news_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_posts`
--

INSERT INTO `news_posts` (`id`, `city_id`, `news_date`, `status`, `added_on`) VALUES
(1, 1, '2020-10-30', 1, '2020-10-31 01:25:26'),
(4, 2, '2020-10-28', 1, '2020-11-01 05:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `news_posts_image`
--

CREATE TABLE `news_posts_image` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `page_no` int(11) NOT NULL,
  `page_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_posts_image`
--

INSERT INTO `news_posts_image` (`id`, `post_id`, `page_no`, `page_image`) VALUES
(1, 1, 1, 'Bhubaneswar_page_1_2020-10-30_6021.png'),
(2, 1, 2, 'Bhubaneswar_page_2_2020-10-30_9406.png'),
(3, 1, 3, 'Bhubaneswar_page_3_2020-10-30_6297.png'),
(4, 1, 4, 'Bhubaneswar_page_4_2020-10-30_9527.png'),
(5, 1, 5, 'Bhubaneswar_page_5_2020-10-30_3676.jpg'),
(6, 1, 6, 'Bhubaneswar_page_6_2020-10-30_5916.png'),
(7, 1, 7, 'Bhubaneswar_page_7_2020-10-30_1184.png'),
(8, 1, 8, 'Bhubaneswar_page_8_2020-10-30_7190.png'),
(9, 1, 9, 'Bhubaneswar_page_9_2020-10-30_7951.png'),
(10, 1, 10, 'Bhubaneswar_page_10_2020-10-30_3824.png'),
(11, 1, 11, 'Bhubaneswar_page_11_2020-10-30_9312.png'),
(12, 1, 12, 'Bhubaneswar_page_12_2020-10-30_3771.png'),
(25, 4, 1, 'Balasore-Keonjhor_page_1_2020-10-31_5507.jpg'),
(26, 4, 2, 'Balasore-Keonjhor_page_2_2020-10-31_3404.jpg'),
(27, 4, 3, 'Balasore-Keonjhor_page_3_2020-10-31_8839.jpg'),
(28, 4, 4, 'Balasore-Keonjhor_page_4_2020-10-31_9901.jpg'),
(29, 4, 5, 'Balasore-Keonjhor_page_5_2020-10-31_2626.jpg'),
(30, 4, 6, 'Balasore-Keonjhor_page_6_2020-10-31_3401.jpg'),
(31, 4, 7, 'Balasore-Keonjhor_page_7_2020-10-31_7471.jpg'),
(32, 4, 8, 'Balasore-Keonjhor_page_8_2020-10-31_9527.jpg'),
(33, 4, 9, 'Balasore-Keonjhor_page_9_2020-10-31_3282.jpg'),
(34, 4, 10, 'Balasore-Keonjhor_page_10_2020-10-31_4063.jpg'),
(35, 4, 11, 'Balasore-Keonjhor_page_11_2020-10-31_4232.jpg'),
(36, 4, 12, 'Balasore-Keonjhor_page_12_2020-10-31_6690.jpg'),
(37, 4, 13, 'Balasore-Keonjhor_page_13_2020-10-31_6413.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `pra_img` varchar(55) DEFAULT NULL,
  `avimat_img` int(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `magazine_posts`
--
ALTER TABLE `magazine_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `magazine_post_image`
--
ALTER TABLE `magazine_post_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_posts`
--
ALTER TABLE `news_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_posts_image`
--
ALTER TABLE `news_posts_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `magazine_posts`
--
ALTER TABLE `magazine_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `magazine_post_image`
--
ALTER TABLE `magazine_post_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news_posts`
--
ALTER TABLE `news_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news_posts_image`
--
ALTER TABLE `news_posts_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
