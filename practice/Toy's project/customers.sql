-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2024 at 10:21 PM
-- Server version: 8.0.35
-- PHP Version: 8.2.12

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
-- Table structure for table `agegroup`
--

CREATE TABLE `agegroup` (
  `id` int NOT NULL,
  `ageGroup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `updateAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `firstName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `number` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profilePic` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `updateAt`, `firstName`, `lastName`, `email`, `number`, `password1`, `address`, `profilePic`, `dob`, `gender`) VALUES
(1, '2024-09-05 12:35:51', 'vinay', 'malla', 'vinay@eg.com', '9807532456', '$2y$10$LZvLWo/6dBQmLRuPhTqes.U97hpPUuL0NqwYeXxx3EjW15yH9J8l2', 'Visakhapatnam (Urban),530001,Andhra Pradesh,India', 'for sample.jpeg', '2004-06-09', 'male'),
(2, '2024-09-05 12:37:11', 'bala', 'vinay', 'bala@eg.com', '9807342156', '$2y$10$NQkn6aNvjUXdMUiLHdBDROXtM98Jc3AhfxKwkR/Lve5G4/bmoEeSW', 'Visakhapatnam (Urban),530001,Andhra Pradesh,India', 'siri.jpeg', '2002-02-14', 'male'),
(4, '2024-09-05 12:52:09', 'sudhiksha', 'sundarapu', 'sudhiksha@eg.com', '9807567897', '$2y$10$XBXoyjZP4zH4HGDDuxkddeUXHzoTLkpf8jOj.G8Xc5JoovK9u.DJq', 'Visakhapatnam (Urban),530001,Andhra Pradesh,India', 'little_girl2.jpeg', '2002-01-05', 'female'),
(6, '2024-09-05 13:06:36', 'dfdf', 'dfdf', 'fddfkd@gmail.com', '8989843333', '$2y$10$3MrEIB.t0CEC6ZlUmu/Ri.Ee4qR.nvppAgHafp4v4NmqpmlsvDW5y', 'Visakhapatnam (Urban),530001,Andhra Pradesh,India', 'little_girl2.jpeg', '2024-09-03', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `SKU` varchar(255) DEFAULT NULL,
  `categoryId` int DEFAULT NULL,
  `brandId` int DEFAULT NULL,
  `ageGroupId` int DEFAULT NULL,
  `stockQuantity` int DEFAULT '0',
  `imageUrl` varchar(255) DEFAULT NULL,
  `discount` int DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('active','discontinued') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agegroup`
--
ALTER TABLE `agegroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `brandId` (`brandId`),
  ADD KEY `ageGroupId` (`ageGroupId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agegroup`
--
ALTER TABLE `agegroup`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brandId`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`ageGroupId`) REFERENCES `agegroup` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
