-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 01:15 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tst_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `productss`
--

CREATE TABLE `productss` (
  `id` int(12) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_retail` varchar(255) NOT NULL,
  `prod_stock` varchar(255) NOT NULL,
  `prod_whlsale` varchar(255) NOT NULL,
  `prod_qnt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productss`
--

INSERT INTO `productss` (`id`, `prod_name`, `prod_retail`, `prod_stock`, `prod_whlsale`, `prod_qnt`) VALUES
(5, 'skyflakes', '6', '7', '67', '3'),
(7, 'silverswan', '6', '7', '60', '3'),
(8, 'Beer', '60', '19', '256', '4'),
(9, 'Rice', '45', '20', '600', '3'),
(10, 'Blanca', '6', '23', '100', '3'),
(11, 'Nescafe', '6', '23', '100', '3'),
(12, 'Coffemate', '6', '15', '100', '3'),
(13, 'Noodles', '6', '19', '100', '3'),
(14, 'toy', '23', '11', '123', '3'),
(15, 'Chilli', '6', '23', '100', '3'),
(16, 'Onion', '2', '12', '23', '3'),
(17, 'Ginisa', '2', '12', '23', '3'),
(18, 'Luya', '2', '12', '23', '3'),
(19, 'Mask', '2', '12', '23', '3'),
(20, 'Vicks', '34', '23', '200', '3'),
(21, 'skyflakes', '32', '32', '7687', '76'),
(22, 'Vicks', '34', '12', '98', '32');

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `id` int(12) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `coutof_sold` varchar(255) NOT NULL,
  `date_sold` date NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`id`, `prod_name`, `coutof_sold`, `date_sold`, `total`) VALUES
(1, 'skyflakes', '2', '2021-11-12', '12'),
(2, 'skyflakes', '2', '2021-11-12', '12'),
(3, 'silverswan', '1', '2021-11-12', '6'),
(4, 'skyflakes', '2', '2021-11-12', '12'),
(5, 'silverswan', '2', '2021-11-12', '12'),
(6, 'skyflakes', '2', '2021-11-12', '12'),
(7, 'Beer', '1', '2021-11-12', '60'),
(8, 'skyflakes', '1', '2021-11-13', '6'),
(9, 'Beer', '2', '2021-11-13', '120'),
(10, 'Beer', '1', '2021-11-16', '60'),
(11, 'skyflakes', '1', '2021-11-16', '6'),
(13, 'Rice', '3', '2021-11-17', '135'),
(14, 'Beer', '1', '2021-11-17', '60'),
(15, 'Noodles', '2', '2021-11-19', '12'),
(16, 'Noodles', '1', '2021-11-19', '6'),
(17, 'Noodles', '1', '2021-11-19', '6'),
(18, 'Coffemate', '1', '2021-11-19', '6'),
(19, 'Coffemate', '1', '2021-11-19', '6'),
(20, 'Coffemate', '1', '2021-11-19', '6'),
(21, 'Coffemate', '1', '2021-11-19', '6'),
(22, 'Coffemate', '6', '2021-11-19', '36'),
(23, 'toy', '1', '2021-11-19', '23'),
(24, 'silverswan', '2', '2021-11-19', '12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`) VALUES
(1, 'riri', '1415', 'Rey'),
(2, 'clay', '1234', 'Clement'),
(3, 'hya', '1234', 'Hyacint'),
(4, 'checel', '1234', 'Checel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productss`
--
ALTER TABLE `productss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
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
-- AUTO_INCREMENT for table `productss`
--
ALTER TABLE `productss`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `trans`
--
ALTER TABLE `trans`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
