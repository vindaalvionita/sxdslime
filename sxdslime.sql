-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 07:01 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sxdslime`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `order_date` date NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `name`, `phone_number`, `address`, `order_date`, `total_price`) VALUES
(1, 'vinda', '0895367184605', 'sidoarjo', '2020-12-21', 68000),
(2, 'anin', '0897678567', 'malang', '2020-12-21', 14000);

-- --------------------------------------------------------

--
-- Table structure for table `pricelist`
--

CREATE TABLE `pricelist` (
  `product_id` int(5) NOT NULL,
  `code` varchar(30) NOT NULL,
  `variant` varchar(30) NOT NULL,
  `size` varchar(15) NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricelist`
--

INSERT INTO `pricelist` (`product_id`, `code`, `variant`, `size`, `price`, `photo`) VALUES
(1, 'gs100', 'Galaxy Slime', '100 gram', 13000, 'gs.jpg'),
(2, 'gs350', 'Galaxy Slime', '350 gram', 40000, 'gs.jpg'),
(3, 'ms100', 'Microfloam Slime', '100 gram', 14000, 'ms.jpg'),
(4, 'ms350', 'Microfloam Slime', '350 gram', 45000, 'ms.jpg'),
(5, 'mt100', 'Metallic Slime', '100 gram', 14000, 'mt.jpg'),
(6, 'mt350', 'Metallic Slime', '350 gram', 45000, 'mt.jpg'),
(7, 'ocs100', 'Ocean Clear Slime', '100 gram', 14000, 'ocs.jpg'),
(8, 'ocs350', 'Ocean Clear Slime', '350 gram', 45000, 'ocs.jpg'),
(9, 'fs100', 'Floam Slime', '100 gram', 14000, 'fs.jpg'),
(10, 'fs350', 'Floam Slime', '350 gram', 45000, 'fs.jpg'),
(11, 'js100', 'Jiggly Slime', '100 gram', 12000, 'js.jpg'),
(12, 'js350', 'Jiggly Slime', '350 gram', 35000, 'js.jpg'),
(13, 'gds100', 'Glow in the Dark Slime', '100 gram', 14000, 'gds.jpg'),
(14, 'gds350', 'Glow in the Dark Slime', '350 gram', 45000, 'gds.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `product_order_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`product_order_id`, `order_id`, `product_id`, `amount`) VALUES
(1, 1, 2, 1),
(2, 1, 3, 1),
(3, 1, 9, 1),
(4, 2, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`) VALUES
(1, 'vinda', '$2y$10$yzr/vv1tdKM5IKqn1XhJTOg3448fxwmCOcKRtGm7z8SjXpuXmbE3m', 'vinda'),
(2, 'anin', '$2y$10$gNKrlObipJwoTKcGwTdGv.pfuXwYDo5BUwW3wa.XU2zoRLTBTWSz6', 'anin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pricelist`
--
ALTER TABLE `pricelist`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`product_order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pricelist`
--
ALTER TABLE `pricelist`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `product_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
