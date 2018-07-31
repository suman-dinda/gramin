-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 31, 2018 at 09:12 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(20) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_unit` varchar(20) NOT NULL,
  `product_size` varchar(20) NOT NULL,
  `product_category` varchar(30) NOT NULL,
  `product_subcategory` varchar(30) NOT NULL,
  `product_brand` varchar(30) NOT NULL,
  `product_cost` varchar(20) NOT NULL,
  `product_dealerprice` varchar(20) NOT NULL,
  `product_tax` varchar(10) NOT NULL,
  `product_description` text NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_unit`, `product_size`, `product_category`, `product_subcategory`, `product_brand`, `product_cost`, `product_dealerprice`, `product_tax`, `product_description`, `status`) VALUES
(1, 'SKU-1531328997147', 'productName', '9900', '3x4x5', 'Shirts', 'Checked Shirts', 'brand.brand_name', '12000', '11000', '5', 'product description', 1),
(2, 'SKU-1531329234582', 'productName1', '100', '3x4x7', 'Shirts', 'Checked Shirts', 'brand.brand_name', '1200', '1000', '5', 'product description details', 1),
(3, 'SKU-1531331120512', 'productName3', '100', '3x4x7', 'Shirts', 'Checked Shirts', 'brand.brand_name', '12000', '12000', '5', 'product descriptions 90', 1),
(4, 'SKU-1531331249225', 'productName3', '100', '3x4x7', 'Shirts', 'Checked Shirts', 'brand.brand_name', '12000', '11000', '5', 'product description', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_brand`
--

DROP TABLE IF EXISTS `product_brand`;
CREATE TABLE IF NOT EXISTS `product_brand` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(30) NOT NULL,
  `brand_description` text,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_brand`
--

INSERT INTO `product_brand` (`id`, `brand_name`, `brand_description`, `status`) VALUES
(1, 'Gucci', 'Guccci India Pvt Ltd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(20) NOT NULL,
  `category_description` text,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `category_name`, `category_description`, `status`) VALUES
(1, 'Shirts', 'All type of shirts', 1),
(2, 'T-Shirts', 'All Types Of T-Shirts', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_subcategory`
--

DROP TABLE IF EXISTS `product_subcategory`;
CREATE TABLE IF NOT EXISTS `product_subcategory` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `subcategory_name` varchar(50) NOT NULL,
  `subcategory_desc` text,
  `category` varchar(20) NOT NULL,
  `category_name` varchar(20) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_subcategory`
--

INSERT INTO `product_subcategory` (`id`, `subcategory_name`, `subcategory_desc`, `category`, `category_name`, `status`) VALUES
(1, 'Checked Shirts', '', '1', 'Shirts', 1),
(3, 'Round Tees', 'Round TShirts', '2', 'T-Shirts', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requestedstock`
--

DROP TABLE IF EXISTS `requestedstock`;
CREATE TABLE IF NOT EXISTS `requestedstock` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_unique` varchar(30) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `stock_unit` int(10) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestedstock`
--

INSERT INTO `requestedstock` (`id`, `user_unique`, `user_id`, `product_id`, `product_name`, `stock_unit`, `status`) VALUES
(4, 'hSDAeop', 1, 1, 'productName', 100, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sale_no` varchar(20) NOT NULL,
  `sale_chalan` varchar(20) NOT NULL,
  `sale_date` varchar(20) NOT NULL,
  `sale_customer` varchar(50) NOT NULL,
  `sale_custmobile` varchar(20) NOT NULL,
  `sale_custlocation` varchar(20) NOT NULL,
  `sale_custaddress` text NOT NULL,
  `sale_pcode` varchar(20) NOT NULL,
  `sale_pname` varchar(50) NOT NULL,
  `sale_pcategory` varchar(30) NOT NULL,
  `sale_psubcategory` varchar(50) NOT NULL,
  `sale_pquantity` varchar(10) NOT NULL,
  `sale_pmrp` varchar(10) NOT NULL,
  `sale_ptax` varchar(10) NOT NULL,
  `sale_totbill` varchar(15) NOT NULL,
  `sale_note` text NOT NULL,
  `sale_userunique` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

DROP TABLE IF EXISTS `service_types`;
CREATE TABLE IF NOT EXISTS `service_types` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(20) NOT NULL,
  `service_price` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`id`, `service_name`, `service_price`) VALUES
(1, 'Pan Card', '100');

-- --------------------------------------------------------

--
-- Table structure for table `stock_list`
--

DROP TABLE IF EXISTS `stock_list`;
CREATE TABLE IF NOT EXISTS `stock_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `user_unique` varchar(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `stock_requested` int(10) NOT NULL,
  `stock_unit` int(20) NOT NULL,
  `req_id` int(10) NOT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_list`
--

INSERT INTO `stock_list` (`id`, `product_id`, `product_name`, `user_unique`, `user_id`, `stock_requested`, `stock_unit`, `req_id`, `status`) VALUES
(1, 1, 'productName', 'hSDAeop', 1, 100, 100, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

DROP TABLE IF EXISTS `superadmin`;
CREATE TABLE IF NOT EXISTS `superadmin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `token` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `username`, `password`, `token`) VALUES
(1, 'admin', 'admin', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(10) NOT NULL AUTO_INCREMENT,
  `u_email` varchar(50) NOT NULL,
  `u_password` varchar(15) NOT NULL,
  `u_mobile` varchar(15) NOT NULL,
  `u_unique` varchar(10) DEFAULT NULL,
  `u_firstname` varchar(30) NOT NULL,
  `u_lastname` varchar(30) DEFAULT NULL,
  `u_fathersname` varchar(100) DEFAULT NULL,
  `u_dob` varchar(15) DEFAULT NULL,
  `u_pan` varchar(20) DEFAULT NULL,
  `u_aadhar` varchar(20) DEFAULT NULL,
  `u_district` varchar(50) DEFAULT NULL,
  `u_taluk` varchar(50) DEFAULT NULL,
  `u_address` text,
  `u_pincode` int(10) DEFAULT NULL,
  `b_accno` varchar(30) DEFAULT NULL,
  `b_ifsc` varchar(20) DEFAULT NULL,
  `b_acctype` varchar(10) DEFAULT NULL,
  `b_bank` varchar(100) DEFAULT NULL,
  `u_subordinates` text,
  `u_usertype` varchar(15) DEFAULT NULL,
  `u_assignedto` varchar(20) DEFAULT NULL,
  `u_usercreationdate` datetime DEFAULT NULL,
  `u_userdatachanged` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `u_userstatus` int(3) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_email`, `u_password`, `u_mobile`, `u_unique`, `u_firstname`, `u_lastname`, `u_fathersname`, `u_dob`, `u_pan`, `u_aadhar`, `u_district`, `u_taluk`, `u_address`, `u_pincode`, `b_accno`, `b_ifsc`, `b_acctype`, `b_bank`, `u_subordinates`, `u_usertype`, `u_assignedto`, `u_usercreationdate`, `u_userdatachanged`, `u_userstatus`) VALUES
(1, 'lovelysin1990@gmail.com', 'gramp', '8249011206', 'hSDAeop', 'gram', 'panchayat1', 'fathers name', '06/06/2000', 'canpd4972r', '123456789012', 'district', 'Chennai', 'Newgen Softaware', 603103, '123456789045678', 'sbin002123', 'savings', 'axis bank', '', 'gram_panchayat', 'zIlL7Vs', '2018-06-29 20:45:56', '2018-06-29 20:45:56', 1),
(2, 'lovelysin1990@gmail.com', 'dnrpia74', '8249011206', 'QMGG22g', 'grampanchayat', '2', 'ttyrytetettyey', '07/01/1998', 'qwee12333', '123456789012', 'district', 'Bangalore', 'Near Miami SuperMarket, Munekolala\nMarathahalli', 560037, '123456676676', 'ihbvc455', 'current', 'hdfc', '', 'gram_panchayat', 'zIlL7Vs', '2018-06-29 21:55:44', '2018-06-29 21:55:44', 1),
(3, 'lovelysin1990@gmail.com', 'qlewjtzg', '8249011206', '2M9pbuo', 'grampanchayat', '3', 'ttyrytetettyey', '07/01/1998', 'qwee12333', '123456789012', 'district', 'Bangalore', 'Near Miami SuperMarket, Munekolala\nMarathahalli', 560037, '123456676676', 'ihbvc455', 'current', 'hdfc', '', 'gram_panchayat', NULL, '2018-06-29 22:00:50', '2018-06-29 22:00:50', 1),
(4, 'foodoku.in@gmail.com', 'racsw02s', '8050986742', 'FwSE0P0', 'grampanchayat', '4', 'ttyrytetettyey', '07/16/2013', 'canpd497r', '123456789012', 'district', 'Chennai', 'Newgen Softaware', 603103, '123456786', '23456', 'current', 'icici', '', 'gram_panchayat', NULL, '2018-06-29 22:04:50', '2018-06-29 22:04:50', 1),
(5, 'sumandinda123@gmail.com', 'taluk', '8050986742', 'zIlL7Vs', 'talukdar', '1', 'fathersname', '07/15/1999', 'vadsdfsfd45465', '123456789012', 'district', 'Chennai', 'Newgen Softaware', 603103, '12rwerwerwerwer', 'ifsccode', 'savings', 'bank name', '1,2', 'taluk_head', 'HcNJNav', '2018-06-30 05:20:00', '2018-06-30 05:20:00', 1),
(6, 'sumandinda123@gmail.com', 'z2ms02pl', '8050986742', 'HcNJNav', 'districthead', '1', 'fathersname', '07/25/2018', 'canpf454564e', '', 'district', 'Chennai', 'SIruseri', 603103, '1234567890-', 'sbin002123', 'savings', 'axis bank', '5', 'district_head', NULL, '2018-07-21 13:32:14', '2018-07-21 13:32:14', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
