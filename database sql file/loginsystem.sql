-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 06:39 AM
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
-- Database: `backend`
--

-- --------------------------------------------------------

--
-- Table structure for table `loginsystem`
--

CREATE TABLE `loginsystem` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loginsystem`
--

INSERT INTO `loginsystem` (`id`, `username`, `email`, `password`, `time`) VALUES
(6, 'admin5', 'admin5@gmail.com', '$2y$10$DlOkv1QrA5pB8j8UGWPkSeQ8tKtOz3Tb2EAM3y5ILHRNKeGDqyGYS', '2024-02-21 08:09:11'),
(7, 'admin6', 'admin6@gmail.com', '$2y$10$cASm7IcFhhNi/.ewepGQ8OwsNrgCOlcujshw0gMq35Sb9DYVoNYZq', '2024-02-21 08:42:08'),
(8, 'efty', 'efty17.hasan@gmail.com', '$2y$10$pzKNjHjCSKF1dM3oBzMgIOS5Nyv83wT1QspsGNVswyEjeP6gwsHPG', '2024-02-22 14:27:49'),
(9, 'efty2', 'efty17.hasan@gmail.com', '$2y$10$RIStyBB5bguYi6/QsWmG4.E9friA0D5XCZeveF0JmWVzPoY91gsmC', '2024-02-22 14:59:20'),
(10, 'efty0', 'efty0@gmail.com', '$2y$10$m5r7uktCpR8mQIWfSTfDceLRNFFFOTQ6gq3ieDWQUupu5ijXLqYJ.', '2024-02-22 19:38:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginsystem`
--
ALTER TABLE `loginsystem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loginsystem`
--
ALTER TABLE `loginsystem`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
