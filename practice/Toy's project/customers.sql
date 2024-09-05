-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 05, 2024 at 02:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `updateAt` datetime DEFAULT current_timestamp(),
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(20) DEFAULT NULL,
  `password1` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `profilePic` varchar(255) DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `updateAt`, `firstName`, `lastName`, `email`, `number`, `password1`, `address`, `profilePic`, `dob`, `gender`) VALUES
(1, '2024-09-05 12:35:51', 'vinay', 'malla', 'vinay@eg.com', '9807532456', '$2y$10$LZvLWo/6dBQmLRuPhTqes.U97hpPUuL0NqwYeXxx3EjW15yH9J8l2', 'Visakhapatnam (Urban),530001,Andhra Pradesh,India', 'for sample.jpeg', '2004-06-09', 'male'),
(2, '2024-09-05 12:37:11', 'bala', 'vinay', 'bala@eg.com', '9807342156', '$2y$10$NQkn6aNvjUXdMUiLHdBDROXtM98Jc3AhfxKwkR/Lve5G4/bmoEeSW', 'Visakhapatnam (Urban),530001,Andhra Pradesh,India', 'siri.jpeg', '2002-02-14', 'male'),
(4, '2024-09-05 12:52:09', 'sudhiksha', 'sundarapu', 'sudhiksha@eg.com', '9807567897', '$2y$10$XBXoyjZP4zH4HGDDuxkddeUXHzoTLkpf8jOj.G8Xc5JoovK9u.DJq', 'Visakhapatnam (Urban),530001,Andhra Pradesh,India', 'little_girl2.jpeg', '2002-01-05', 'female'),
(6, '2024-09-05 13:06:36', 'dfdf', 'dfdf', 'fddfkd@gmail.com', '8989843333', '$2y$10$3MrEIB.t0CEC6ZlUmu/Ri.Ee4qR.nvppAgHafp4v4NmqpmlsvDW5y', 'Visakhapatnam (Urban),530001,Andhra Pradesh,India', 'little_girl2.jpeg', '2024-09-03', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
