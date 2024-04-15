-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 07:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hyundai`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_configurations`
--

CREATE TABLE `car_configurations` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `car_model` varchar(255) NOT NULL,
  `car_type` varchar(50) NOT NULL,
  `car_color` varchar(10) NOT NULL,
  `car_features` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_configurations`
--

INSERT INTO `car_configurations` (`id`, `username`, `car_model`, `car_type`, `car_color`, `car_features`, `created_at`) VALUES
(4, 'nurulvta', 'ioniq 5', 'SUV', '#1c5928', 'sunroof, leather seats', '2024-03-31 15:21:18'),
(5, 'dinnu', 'stargazer', 'Sedan', '#320606', 'sunroof, leather seats', '2024-03-31 16:47:45'),
(6, 'dinnu', 'ioniq 5', 'Hatchback', '#000000', 'sunroof,backup camera', '2024-03-31 16:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `phone`, `address`, `postal_code`, `city`) VALUES
(4, 'Dinnuhoni', 'Trahutomo', 'dinnu', 'dinnu@gmail.com', '6a0ee5eb7966fbc5f698fdcd4e7d1ca2', '081342537281', 'Jalan Wiratama', '75138', 'Samarinda'),
(5, 'Nurul', 'Vita', 'nurulvta', 'vitanurul242@gmail.com', '202cb962ac59075b964b07152d234b70', '081342537281', 'Jalan Pramuka', '75119', 'Samarinda'),
(6, 'Alisya', 'Nisrina', 'lisya', 'lisya@gmail.com', '698d51a19d8a121ce581499d7b701668', '081342537281', 'Jalan KH Wahid Hasyim', '75115', 'Samarinda'),
(7, 'Aristy', 'Avrianti', 'aristy', 'aristy@gmail.com', '202cb962ac59075b964b07152d234b70', '081342537281', 'Jalan Sentosa', '7651', 'Samarinda'),
(8, 'Bayu Purnama', 'Aji', 'bayu', 'bayu@gmail.com', '202cb962ac59075b964b07152d234b70', '081342537281', 'Jalan Juanda', '756211', 'Samarinda'),
(9, 'Joviana', 'Young', 'jovi', 'jovi@gmail.com', '698d51a19d8a121ce581499d7b701668', '081342537281', 'Jalan M. Yamin', '75114', 'Samarinda'),
(10, 'Awang Muhammad', 'Novandra', 'novan', 'novan@gmail.com', '698d51a19d8a121ce581499d7b701668', '08536271838', 'Jalan W.R Supratman', '75472', 'Samarinda');

-- --------------------------------------------------------

--
-- Table structure for table `test_drive`
--

CREATE TABLE `test_drive` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `car_model` varchar(100) NOT NULL,
  `car_year` int(11) NOT NULL,
  `test_drive_time` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_drive`
--

INSERT INTO `test_drive` (`id`, `full_name`, `email`, `phone_number`, `address`, `car_model`, `car_year`, `test_drive_time`, `created_at`) VALUES
(20, 'Dinnuhoni Trahutomo', 'dinnuhoni@gmail.com', '081342537281', 'Jalan Wiratama', 'creta', 2023, '2024-03-20 20:13:00', '2024-03-31 12:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(3, 'admin', 'admin@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_configurations`
--
ALTER TABLE `car_configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_drive`
--
ALTER TABLE `test_drive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_configurations`
--
ALTER TABLE `car_configurations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `test_drive`
--
ALTER TABLE `test_drive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
