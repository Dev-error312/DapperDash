-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 03:51 PM
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
('Pratigya', 'pratigya@gmail.com', '$2y$10$nHZvDTUTvg1VrvTS0Z9V8eklbDoyyQy4s5qBUMohbIbv.DOa9F9X.');

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
(1, 'saurabrtn.bajracharya@gmail.com', '$2y$10$JzniLe0YXDOQWCbs6t8L5e8t3AAeHSVn8Qzx1JEbQREt/q5ogoPk6', 'Saurab Ratna Bajracharya', 'Lagankhel 12, Lalitpur', 0, '981896370a'),
(2, 'saurebbajracharya@gmail.com', '$2y$10$GAyGK7SM7j7U2vF5enq3GO7XH6hk7Fj33tjIqPi1yguFA7McEBvpa', 'Smriti Thapa', 'Dhapakhel', 0, '1234567890');

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
(4, 'Hoodie', 'New Cool Chain Sweatshirt for Men, perfect for the winter season.', 1500, 0, 'assets/product-image/Hoodie.jpg'),
(5, 'Lightweight Jacket Men', 'Light weight Jacket for Men', 1600, 0, 'assets/product-image/Lightweight-jacket.jpg'),
(6, 'Lightweight Jacket Women', 'Light weight Jacket for Women', 1600, 0, 'assets/product-image/Lightweight sporty jacket.jpg'),
(7, 'Oversized Trench Coat', 'Oversized Trench Coat', 2500, 0, 'assets/product-image/Oversized trench coat.jpg'),
(8, 'Cargo Pant', 'Cargo Pant for Comfort', 1500, 0, 'assets/product-image/Cargo pant.jpg'),
(9, 'Lace-up Trekking Shoe', 'Lace-up trekking shoe in color olive', 2500, 0, 'assets/product-image/Lace-up trekking shoe in color olive.jpg');

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
