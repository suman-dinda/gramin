-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2018 at 01:11 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gramin`
--

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

CREATE TABLE `service_types` (
  `id` int(10) NOT NULL,
  `service_name` varchar(20) NOT NULL,
  `service_price` varchar(20) NOT NULL,
  `gp_commission` int(10) DEFAULT NULL,
  `taluk_commission` int(10) DEFAULT NULL,
  `dist_commission` int(10) DEFAULT NULL,
  `zone_commission` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`id`, `service_name`, `service_price`, `gp_commission`, `taluk_commission`, `dist_commission`, `zone_commission`) VALUES
(1, 'PAN', '200', NULL, NULL, NULL, NULL),
(2, 'UdyogaSanjeevini', '200', NULL, NULL, NULL, NULL),
(3, 'GST', '1000', NULL, NULL, NULL, NULL),
(4, 'eSikshana', '1000', NULL, NULL, NULL, NULL),
(5, 'eGovernance', '1000', NULL, NULL, NULL, NULL),
(6, 'UPSC', '10', NULL, NULL, NULL, NULL),
(7, 'KPSC', '10', NULL, NULL, NULL, NULL),
(8, 'Banking', '10', NULL, NULL, NULL, NULL),
(9, 'Income Certificate', '40', NULL, NULL, NULL, NULL),
(10, 'Minority Certificate', '50', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service_types`
--
ALTER TABLE `service_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_types`
--
ALTER TABLE `service_types`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
