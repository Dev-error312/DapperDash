-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2024 at 12:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alicestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `a_user` text NOT NULL,
  `a_email` text NOT NULL,
  `a_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`a_user`, `a_email`, `a_password`) VALUES
('Pratigya', 'alice@gmail.com', '$2y$10$agdzcG4E/.WePgE41iz0HO5YWbWYYm/B3awTvLMVfmSlahRDQkv8u');

-- --------------------------------------------------------

--
-- Table structure for table `customerdetails`
--

CREATE TABLE `customerdetails` (
  `c_id` int(11) NOT NULL,
  `c_email` text NOT NULL,
  `c_pass` text NOT NULL,
  `c_username` text NOT NULL,
  `c_address` text NOT NULL,
  `c_gender` tinyint(4) NOT NULL,
  `c_phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerdetails`
--

INSERT INTO `customerdetails` (`c_id`, `c_email`, `c_pass`, `c_username`, `c_address`, `c_gender`, `c_phone`) VALUES
(1, 'saurebbajracharya@gmail.com', '$2y$10$IIcXId6YDLSUHIfX9.eTbeUO83kWX8.ihUTyiot03IVMDkoDq8Bru', 'Saurab Ratna Bajracharya', 'Lagankhel 12, Lalitpur', 0, '9818963709'),
(2, 'pratigya@gmail.com', '$2y$10$THN.NEpdkazZT1H4m6V5fufQSpczsxZH8HQxeyyiCjguLskc9cld6', 'Pratigya', 'satdobato', 0, '9841025095');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `p_id`, `c_id`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 8, 1),
(4, 1, 2),
(5, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_name` text NOT NULL,
  `p_desc` text NOT NULL,
  `p_price` decimal(10,0) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `p_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_desc`, `p_price`, `p_quantity`, `p_url`) VALUES
(1, 'Denim Jacket', 'Dark Blue Solid Premium Fur Denim Jacket For Women', 2000, 0, 'assets/product-image/Denim-jacket.jpg'),
(2, 'Converse', 'Durable canvas you know and love\nOutsole pattern for traction.', 2500, 0, 'assets/product-image/Converse.jpg'),
(3, 'T-Shirt', 'Made with Ever Soft ring spun cotton for premium softness wash after wash. ', 1000, 0, 'assets/product-image/T-shirt.jpg'),
(4, 'Hoodie', 'New Cool Chain Sweatshirt for Men, perfect for the winter season.', 1700, 0, 'assets/product-image/Hoodie.jpg'),
(5, 'Lightweight Jacket Men', 'Light weight Jacket for Men', 1600, 0, 'assets/product-image/Lightweight-jacket.jpg'),
(6, 'Lightweight Jacket Women', 'Light weight Jacket for Women', 1600, 0, 'assets/product-image/Lightweight sporty jacket.jpg'),
(7, 'Oversized Trench Coat', 'Oversized Trench Coat', 2500, 0, 'assets/product-image/Oversized trench coat.jpg'),
(8, 'Cargo Pant', 'Cargo Pant for Comfort', 1500, 0, 'assets/product-image/Cargo pant.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD UNIQUE KEY `a_email` (`a_email`) USING HASH;

--
-- Indexes for table `customerdetails`
--
ALTER TABLE `customerdetails`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_email` (`c_email`) USING HASH;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerdetails`
--
ALTER TABLE `customerdetails`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `customerdetails` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
