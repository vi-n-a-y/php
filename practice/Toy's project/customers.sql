-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 10, 2024 at 02:31 PM
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
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `aboutFile` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `content1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `title`, `content`, `aboutFile`, `created_at`, `content1`) VALUES
(1, 'Content Management', 'The way you manage the content is very important in the website', NULL, '2024-09-06 07:40:24', ''),
(2, 'Content Management', 'The way you manage the content is very important in the website', NULL, '2024-09-06 07:43:02', ''),
(3, 'We are the Global Investors', 'We invest all arount the world', NULL, '2024-09-06 07:43:46', ''),
(4, 'We are the Global Investors', 'We invest all arount the world', NULL, '2024-09-06 07:44:46', ''),
(5, 'dfdslfjdslfjl', 'fdsfdsfdf', 'aboutus1.jpeg', '2024-09-06 08:03:13', ''),
(6, 'we are here go Get Peact', 'The content is the  Get to the Peace', 'aboutus1.jpg', '2024-09-06 08:47:07', ''),
(7, 'This is Heading ', 'This is content block', 'aboutus1.jpeg', '2024-09-06 11:07:22', ''),
(8, 'We are Here for Global Peace', 'Peace is only way to stop the Wars', 'aboutus1.jpg', '2024-09-09 05:48:58', 'Peace is only way to stop the Wars Peace is only way to stop the Wars Peace is only way to stop the Wars');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminMail` varchar(255) DEFAULT NULL,
  `adminPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id` int(11) NOT NULL,
  `ageGroup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agegroup`
--

INSERT INTO `agegroup` (`id`, `ageGroup`) VALUES
(1, '0-3'),
(2, '0-6'),
(3, '6-12'),
(4, '12-18');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'Barbie'),
(2, 'lego'),
(3, 'Nerf'),
(4, 'PlayShifu');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Toys & Games'),
(2, 'Sport & Outdoor'),
(3, 'Gadgets'),
(4, 'Books');

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
(1, '2024-09-05 12:35:51', 'Nivaydha', 'Thomas', 'nivaydha@eg.com', '9807532456', '$2y$10$.uY67tgwhr.Uev6MkcBJmuql9wvGzkXW/3xvpsLtMkd4SJLKKbk5W', 'Visakhapatnam (Urban),530001,Andhra Pradesh,India', 'for sample.jpeg', '2004-06-09', 'female'),
(2, '2024-09-05 12:37:11', 'Mahesh', 'Raju', 'Mahesh@eg.com', '9807342156', '$2y$10$GWqqMiNpcQiayP37y2LKG.ICwQtuNugsQ1Sbknv.LLq8wmpSim5Pi', 'Visakhapatnam (Urban),530001,Andhra Pradesh,India', 'profile.jpeg', '2002-02-14', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `SKU` varchar(255) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `brandId` int(11) DEFAULT NULL,
  `ageGroupId` int(11) DEFAULT NULL,
  `stockQuantity` int(11) DEFAULT 0,
  `imageUrl` varchar(255) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('active','discontinued') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `SKU`, `categoryId`, `brandId`, `ageGroupId`, `stockQuantity`, `imageUrl`, `discount`, `createdAt`, `updatedAt`, `status`) VALUES
(6, 'Balls', 'Outdoor sport games', 1000.00, 'ball1000', 2, 3, 4, 100, 'sports-outdoor-nerf.jpeg', 10, '2024-09-09 06:29:08', '2024-09-09 06:29:08', 'active'),
(7, 'barbie', 'barbie toys', 1000.00, 'barbie1000', 2, 1, 3, 1000, 'barbie-book.jpg', 10, '2024-09-09 07:00:39', '2024-09-09 07:00:39', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `subCategories`
--

CREATE TABLE `subCategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `categoryId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subCategories`
--

INSERT INTO `subCategories` (`id`, `name`, `categoryId`) VALUES
(1, 'puzzles', 1),
(2, 'Action Figures', 1),
(3, 'Educational Toys', 1),
(4, 'Arts & Crafts', 1),
(5, 'Cricket', 2),
(6, 'Football', 2),
(9, 'Electrical', 3),
(10, 'plastic', 3),
(12, 'fiction', 4),
(14, 'Badmintion', 2),
(17, 'test1', 2),
(18, 'test4', 2);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adminMail` (`adminMail`);

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
-- Indexes for table `subCategories`
--
ALTER TABLE `subCategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryId` (`categoryId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agegroup`
--
ALTER TABLE `agegroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subCategories`
--
ALTER TABLE `subCategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brandId`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`ageGroupId`) REFERENCES `ageGroup` (`id`);

--
-- Constraints for table `subCategories`
--
ALTER TABLE `subCategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
