-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2017 at 03:44 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joe_mo`
--
CREATE DATABASE IF NOT EXISTS `joe_mo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `joe_mo`;

-- --------------------------------------------------------

--
-- Table structure for table `adults`
--

DROP TABLE IF EXISTS `adults`;
CREATE TABLE `adults` (
  `adult_id` tinyint(4) NOT NULL,
  `size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adults`
--

INSERT INTO `adults` (`adult_id`, `size`) VALUES
(1, 's'),
(2, 'm'),
(3, 'x'),
(4, 'xl');

-- --------------------------------------------------------

--
-- Table structure for table `agegroups`
--

DROP TABLE IF EXISTS `agegroups`;
CREATE TABLE `agegroups` (
  `agegroup_id` tinyint(4) NOT NULL,
  `agegroup` varchar(20) NOT NULL,
  `size_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agegroups`
--

INSERT INTO `agegroups` (`agegroup_id`, `agegroup`, `size_id`) VALUES
(1, 'Adult', 1),
(2, 'kid', 2),
(3, 'toddler', 3),
(4, 'baby', 4);

-- --------------------------------------------------------

--
-- Table structure for table `babies`
--

DROP TABLE IF EXISTS `babies`;
CREATE TABLE `babies` (
  `baby_id` tinyint(4) NOT NULL,
  `size` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `babies`
--

INSERT INTO `babies` (`baby_id`, `size`) VALUES
(1, 'newborn'),
(2, '3 month'),
(3, '3-6 month'),
(4, '6-12 month'),
(5, '12-18 month'),
(6, '18-24 month');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE `colors` (
  `color_id` tinyint(4) NOT NULL,
  `color` varchar(20) NOT NULL,
  `is_available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`color_id`, `color`, `is_available`) VALUES
(1, 'white', 1),
(2, 'blue', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `customer_id` smallint(6) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `review_id` smallint(6) NOT NULL,
  `phone` tinyint(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `email` varchar(254) NOT NULL,
  `payment` tinyint(4) NOT NULL,
  `join_date` datetime NOT NULL,
  `login_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

DROP TABLE IF EXISTS `genders`;
CREATE TABLE `genders` (
  `gender_id` tinyint(4) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `is_dress` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`gender_id`, `gender`, `is_dress`) VALUES
(1, 'Female', 1),
(2, 'male', 0);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `image_id` smallint(6) NOT NULL,
  `url` varchar(2083) NOT NULL,
  `product_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `url`, `product_id`) VALUES
(1, 'images/logo.svg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kids`
--

DROP TABLE IF EXISTS `kids`;
CREATE TABLE `kids` (
  `kid_id` tinyint(4) NOT NULL,
  `size` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kids`
--

INSERT INTO `kids` (`kid_id`, `size`) VALUES
(1, 6),
(2, 8),
(3, 10),
(4, 12),
(5, 14),
(6, 16);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` smallint(6) NOT NULL,
  `product_type` varchar(20) NOT NULL,
  `image_id` smallint(6) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `gender_id` tinyint(4) NOT NULL,
  `agegroup_id` tinyint(4) NOT NULL,
  `color_id` tinyint(4) NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `price` smallint(6) NOT NULL,
  `is_add` tinyint(1) NOT NULL,
  `review_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_type`, `image_id`, `title`, `description`, `gender_id`, `agegroup_id`, `color_id`, `quantity`, `price`, `is_add`, `review_id`) VALUES
(1, 'shirts', 1, 'Royal Family', 'Do you want to be a king, queen, prince or princess? Choose your role.', 2, 1, 1, 1, 10, 1, 1),
(2, 'dress', 2, 'Mother and daughter dresses', 'Cute, cute', 1, 2, 2, 1, 10, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE `ratings` (
  `rating_id` smallint(6) NOT NULL,
  `rating` tinyint(5) NOT NULL,
  `product_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `review_id` smallint(6) NOT NULL,
  `product_id` smallint(6) NOT NULL,
  `rating_id` smallint(6) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `customer_id` smallint(6) NOT NULL,
  `date` datetime NOT NULL,
  `is_approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

DROP TABLE IF EXISTS `shipping`;
CREATE TABLE `shipping` (
  `shipping_id` smallint(6) NOT NULL,
  `list_id` smallint(6) NOT NULL,
  `address` varchar(150) NOT NULL,
  `payment` tinyint(4) NOT NULL,
  `is_confirm` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_lists`
--

DROP TABLE IF EXISTS `shopping_lists`;
CREATE TABLE `shopping_lists` (
  `shopping_list_id` smallint(6) NOT NULL,
  `product_id` smallint(6) NOT NULL,
  `is_login` tinyint(1) NOT NULL,
  `total_item` tinyint(4) NOT NULL,
  `total_price` tinyint(4) NOT NULL,
  `tax` tinyint(4) NOT NULL,
  `checkout` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
CREATE TABLE `sizes` (
  `size_id` tinyint(4) NOT NULL,
  `size` varchar(11) NOT NULL,
  `adult_id` tinyint(1) NOT NULL,
  `kid_id` tinyint(1) NOT NULL,
  `toddler_id` tinyint(1) NOT NULL,
  `baby_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`size_id`, `size`, `adult_id`, `kid_id`, `toddler_id`, `baby_id`) VALUES
(1, 'adult', 1, 0, 0, 0),
(2, 'kid', 0, 1, 0, 0),
(3, 'toddler', 0, 0, 1, 0),
(4, 'baby', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `toddlers`
--

DROP TABLE IF EXISTS `toddlers`;
CREATE TABLE `toddlers` (
  `toddler_id` tinyint(4) NOT NULL,
  `size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toddlers`
--

INSERT INTO `toddlers` (`toddler_id`, `size`) VALUES
(1, '2t'),
(2, '3t'),
(3, '4t'),
(4, '5t');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adults`
--
ALTER TABLE `adults`
  ADD PRIMARY KEY (`adult_id`);

--
-- Indexes for table `agegroups`
--
ALTER TABLE `agegroups`
  ADD PRIMARY KEY (`agegroup_id`);

--
-- Indexes for table `babies`
--
ALTER TABLE `babies`
  ADD PRIMARY KEY (`baby_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `kids`
--
ALTER TABLE `kids`
  ADD PRIMARY KEY (`kid_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `shopping_lists`
--
ALTER TABLE `shopping_lists`
  ADD PRIMARY KEY (`shopping_list_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `toddlers`
--
ALTER TABLE `toddlers`
  ADD PRIMARY KEY (`toddler_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adults`
--
ALTER TABLE `adults`
  MODIFY `adult_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `agegroups`
--
ALTER TABLE `agegroups`
  MODIFY `agegroup_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `babies`
--
ALTER TABLE `babies`
  MODIFY `baby_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `gender_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kids`
--
ALTER TABLE `kids`
  MODIFY `kid_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shopping_lists`
--
ALTER TABLE `shopping_lists`
  MODIFY `shopping_list_id` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `toddlers`
--
ALTER TABLE `toddlers`
  MODIFY `toddler_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
