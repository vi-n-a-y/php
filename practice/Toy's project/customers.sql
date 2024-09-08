-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2024 at 11:04 PM
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
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `content1` text NOT NULL,
  `aboutFile` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `title`, `content`, `content1`, `aboutFile`, `created_at`) VALUES
(1, 'This is Heading ', 'This is content block', 'content 1', 'aboutus1.jpeg', '2024-09-07 17:48:33'),
(2, 'some thing', 'abcdefghijklmnopqrstuvwxyz', 'abdcdjlkjdlfjodwiufokjdwruewojfldksmcoiwe9rudlmclkjsxlkjiurweoiufodlkfjldkjfldkjfldjlf', 'aboutus1.jpeg', '2024-09-07 18:07:53'),
(3, 'Alphabets', 'abcdefghijk', 'kfjdlkfjldjfljdlfj', 'aboutus1.jpg', '2024-09-07 18:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `adminMail` varchar(255) DEFAULT NULL,
  `adminPassword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminMail`, `adminPassword`) VALUES
(1, 'admin@eg.com', '@Admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `agegroup`
--

CREATE TABLE `agegroup` (
  `id` int NOT NULL,
  `ageGroup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `agegroup`
--

INSERT INTO `agegroup` (`id`, `ageGroup`) VALUES
(2, '0-4'),
(3, '0-6');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'legos'),
(3, 'brand 1');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Toys'),
(3, 'iron man');

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
(2, '2024-09-05 12:37:11', 'janavi', 'janu', 'janavi@eg.com', '9807342156', '$2y$10$R/2fbuNYiPPzz/b.xFGTE.NhEeBwKjDa7tZFwHY9lNUtFm51inmDq', 'Visakhapatnam (Urban),530001,Andhra Pradesh,India', 'siri.jpeg', '2002-02-14', 'female'),
(4, '2024-09-05 12:52:09', 'sudhiksha', 'sundarapu', 'sudhiksha@eg.com', '9807567897', '$2y$10$XBXoyjZP4zH4HGDDuxkddeUXHzoTLkpf8jOj.G8Xc5JoovK9u.DJq', 'Visakhapatnam (Urban),530001,Andhra Pradesh,India', 'little_girl2.jpeg', '2002-01-05', 'female'),
(5, '2024-09-08 21:01:46', 'dfdjfkjh', 'ljdsljflj', 'dfdsfjjh@eg.com', '8989444343', '$2y$10$qtypb0JqhXi3G7dcIVVK6e3sywkSS.CyN0rpkrHLoAKPEhxg8myn6', 'fjkdjhkhkhk,dfjdkhkh', 'teddy_bear_3.jpg', '2013-01-09', 'male');

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
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `SKU`, `categoryId`, `brandId`, `ageGroupId`, `stockQuantity`, `imageUrl`, `discount`, `createdAt`, `updatedAt`, `status`) VALUES
(8, 'chocolate', 'chocolate chocolate', 10.00, '45454', 1, 1, 2, 22, 'siri.jpeg', 5, '2024-09-08 18:38:08', '2024-09-08 18:38:08', 'active'),
(12, 'Toy Car', 'Small toy car for kids', 25.99, 'TC123', 1, 1, 2, 50, 'toy_car.jpg', 10, '2024-09-08 19:28:19', '2024-09-08 19:28:19', 'active'),
(18, 'Doll', 'Stuffed doll for children', 15.49, 'DOL456', 1, 1, 2, 30, 'doll.jpg', 5, '2024-09-08 19:39:07', '2024-09-08 19:39:07', 'active'),
(19, 'Action Figure', 'Hero action figure', 35.00, 'AF789', 1, 1, 2, 20, 'action_figure.jpg', 20, '2024-09-08 19:39:07', '2024-09-08 19:39:07', 'active'),
(20, 'Building Blocks', 'Set of colorful building blocks', 29.99, 'BL012', 1, 1, 2, 100, 'blocks.jpg', 0, '2024-09-08 19:39:07', '2024-09-08 19:39:07', 'active'),
(22, 'Doll', 'Stuffed doll for children', 15.49, 'DOL456', 1, 1, 2, 30, 'doll.jpg', 5, '2024-09-08 19:41:14', '2024-09-08 19:41:14', 'active'),
(23, 'Dollfjlkdjf', 'Stuffedfdkfjl doll for children', 15.49, 'DOL456', 1, 1, 2, 30, 'dolldd.jpg', 5, '2024-09-08 19:42:40', '2024-09-08 19:42:40', 'active'),
(24, 'Dollfjlkdjf', 'Stuffedfdkfjl doll for children', 15.49, 'DOL456', 1, 1, 2, 30, 'dolldd.jpg', 5, '2024-09-08 19:44:32', '2024-09-08 19:44:32', 'active'),
(25, 'Dollfjlkdjf', 'Stuffedfdkfjl doll for children', 15.49, 'DOL456', 1, 1, 2, 30, 'dolldd.jpg', 5, '2024-09-08 19:47:57', '2024-09-08 19:47:57', 'active'),
(26, 'fjlkdjf', 'Stuffedfdkfjl doll for children', 45.22, 'DOL456', 1, 1, 2, 30, 'dolfldd.jpg', 5, '2024-09-08 19:49:20', '2024-09-08 19:49:20', 'active'),
(27, 'fjlkdjf', 'Stuffedfdkfjl doll for children', 45.22, 'DOL456', 1, 1, 2, 30, 'dolfldd.jpg', 5, '2024-09-08 19:50:19', '2024-09-08 19:50:19', 'active'),
(29, 'dfdfdf', 'dfdfdf', 54.00, '545ffvd', 1, 1, 2, 4, 'teddy_bear_3.jpg', 6, '2024-09-08 20:57:06', '2024-09-08 20:57:06', 'active'),
(30, 'blanket', 'dfdfdf', 54.00, 'dfddgfg', 1, 1, 2, 4, '', 6, '2024-09-08 20:57:38', '2024-09-08 20:57:38', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agegroup`
--
ALTER TABLE `agegroup`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
