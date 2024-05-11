-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 08:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `account$` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `user_name`, `email`, `password`, `telefone`, `bio`, `address`, `location`, `logo`, `account$`) VALUES
(3, 'amr mahmoud', 'sdfghjkla', 'j@gmail.com', '1111', '01028198354', '111', 'cfvgbhnm', 'cvbnm', 'logo11.jpeg', 0),
(4, 'youssef ashraf', 'y.ashraf257@gmail.com', 'y.ashraf257@gmail.com', '1111', '01028198354', '11111', 'qweqweqw', 'qeqwe', 'logo11.jpeg', 2700),
(7, 'amr', 'amrr', 'amr@gmail.com', '123456', '01110199414', 'hii', 'cairo', 'egpet', 'logo22.jpeg', 300),
(8, 'amr', 'mahmoud', 'ahmed@fci.com', '123456', '11', 'aaa', 'egypet', 'cairo', 'aviation-logo-icon-and-symbol-template-vector.jpg', 10000000),
(9, 'youssef ashraf', 'sdfghjkl', 'y.ashraf257@gmail.com', '12345', '01028198354', '11111', '1111idujasjnaikfncfi', 'cvbnm', 'aviation-logo-icon-and-symbol-template-vector.jpg', 11111);

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Itinerary` varchar(255) NOT NULL,
  `fees` double NOT NULL,
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `is_complete` tinyint(1) NOT NULL,
  `registered_num` int(11) NOT NULL,
  `passengers_num` int(11) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `from` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`id`, `name`, `Itinerary`, `fees`, `start_at`, `end_at`, `is_complete`, `registered_num`, `passengers_num`, `company_email`, `to`, `from`) VALUES
(10, 'ammr', 'amr', 100, '2023-12-27', '2023-12-27', 1, 0, 50, 'y.ashraf257@gmail.com', 'ciro', 'alex'),
(11, 'ammr', 'amr', 100, '2023-12-27', '2023-12-27', 0, 2, 50, 'y.ashraf257@gmail.com', 'monaco', 'paris'),
(12, 'amr', 'amr', 100, '2023-12-08', '2023-12-27', 0, 1, 50, 'y.ashraf257@gmail.com', 'cairo', 'alex'),
(13, 'cairo', 'ciro', 100, '2023-12-01', '2024-01-06', 0, 2, 50, 'amr@gmail.com', 'alex', 'cairo'),
(14, 'alex', '1000', 100, '2023-12-02', '2023-12-16', 0, 0, 50, 'amr@gmail.com', 'pairs', 'ca'),
(15, 'ahed', 'ciair', 100, '2023-12-09', '2023-12-23', 0, 0, 500, 'ahmed@fci.com', 'cairo', 'alex'),
(16, 'amr', 'joo', 100, '2023-12-28', '2023-12-28', 0, 0, 100, 'ahmed@fci.com', 'alex', 'cairo');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `passenger_name` varchar(255) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `passenger_name`, `passenger_id`, `company_id`, `message`) VALUES
(1, 'youssef ashraf', 1, 4, 'hiiii'),
(2, 'youssef ashraf', 1, 4, 'hello every one'),
(3, 'youssef ashraf', 1, 3, '1111'),
(4, 'youssef ashraf', 1, 3, '1111'),
(5, 'youssef ashraf', 1, 3, 'azzz'),
(6, 'youssef ashraf', 1, 3, 'azzz'),
(7, 'youssef ashraf', 1, 3, 'qq'),
(8, 'youssef ashraf', 1, 3, 'qq'),
(9, 'youssef ashraf', 1, 3, 'qq'),
(10, 'youssef ashraf', 1, 3, 'qq'),
(11, 'youssef ashraf', 1, 3, 'qq'),
(12, 'youssef ashraf', 1, 3, 'qq'),
(13, 'youssef ashraf', 1, 3, 'qq'),
(14, 'youssef ashraf', 1, 3, 'qq'),
(15, 'ahmed', 3, 4, 'hhi'),
(16, 'ahmed', 3, 7, 'jii'),
(17, 'ahmed', 3, 8, 'hiii');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `passport_image` varchar(255) NOT NULL,
  `account$` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`id`, `name`, `email`, `telefone`, `password`, `photo`, `passport_image`, `account$`) VALUES
(1, 'youssef ashraf', 'y.ashraf257@gmail.com', '12345675432', '123456', 'photo_profile.jpeg', 'Screenshot 2023-03-30 123847.png', 4800),
(2, 'zoomy', 'omarr@gmail.com', '011', '123456', 'photo_profile.jpeg', 'OIP.jpeg', 9800),
(3, 'ahmed', 'ahmed@fci.com', '0111019414', '123456', 'photo_profile.jpeg', 'aviation-logo-icon-and-symbol-template-vector.jpg', 9999900);

-- --------------------------------------------------------

--
-- Table structure for table `passenger_flight`
--

CREATE TABLE `passenger_flight` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `fees` double NOT NULL,
  `is_completed` tinyint(1) NOT NULL,
  `is_paid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger_flight`
--

INSERT INTO `passenger_flight` (`id`, `user_email`, `flight_id`, `fees`, `is_completed`, `is_paid`) VALUES
(10, 'y.ashraf257@gmail.com', 11, 100, 0, 1),
(11, 'y.ashraf257@gmail.com', 12, 100, 0, 1),
(12, 'omarr@gmail.com', 13, 100, 0, 1),
(13, 'omarr@gmail.com', 11, 100, 0, 1),
(14, 'ahmed@fci.com', 13, 100, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passenger_flight`
--
ALTER TABLE `passenger_flight`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `passenger_flight`
--
ALTER TABLE `passenger_flight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
