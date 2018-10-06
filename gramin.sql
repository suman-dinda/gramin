-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 06, 2018 at 06:23 AM
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

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `getUsers`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getUsers` (IN `gpUser` VARCHAR(10))  BEGIN
SET @gp = gpUser;
SET @taluk := (SELECT `u_assignedto` FROM `users` WHERE `u_unique` = @gp);
SET @dist := (SELECT `u_assignedto` FROM `users` WHERE `u_unique` = @taluk);
SET @zone := (SELECT `u_assignedto` FROM `users` WHERE `u_unique` = @dist);
SELECT @gp AS gp, @taluk AS taluk_head, @dist AS  dist_head, @zone AS zone_head;
END$$

DELIMITER ;

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
  `product_images` text,
  `gp_commission` int(10) DEFAULT NULL,
  `taluk_commission` int(10) DEFAULT NULL,
  `dist_commission` int(10) DEFAULT NULL,
  `zone_commission` int(10) DEFAULT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_unit`, `product_size`, `product_category`, `product_subcategory`, `product_brand`, `product_cost`, `product_dealerprice`, `product_tax`, `product_description`, `product_images`, `gp_commission`, `taluk_commission`, `dist_commission`, `zone_commission`, `status`) VALUES
(1, 'SKU-1531328997147', 'productName', '9900', '3x4x5', 'Shirts', 'Checked Shirts', 'Gucci', '12000', '11000', '5', 'product description', '1534440015.jpg,1534440015.png,1534440015.jpg', NULL, NULL, NULL, NULL, 1),
(2, 'SKU-1531329234582', 'productName1', '40', '3x4x7', 'Shirts', 'Checked Shirts', 'Gucci', '1200', '1000', '5', 'product description details', '1534440015.jpg,1534440015.png,1534440015.jpg', NULL, NULL, NULL, NULL, 1),
(3, 'SKU-1531331120512', 'productName3', '100', '3x4x7', 'Shirts', 'Checked Shirts', 'Gucci', '12000', '12000', '5', 'product descriptions 90', '1534440015.jpg,1534440015.png,1534440015.jpg', NULL, NULL, NULL, NULL, 1),
(4, 'SKU-1531331249225', 'productName3', '100', '3x4x7', 'Shirts', 'Checked Shirts', 'Gucci', '12000', '11000', '5', 'product description', '1534440015.jpg,1534440015.png,1534440015.jpg', NULL, NULL, NULL, NULL, 1),
(5, 'SKU-1534439714661', 'SareGaMa Tees', '100', '3x4x5', 'T-Shirts', 'Round Tees', 'Gucci', '299', '249', '5', 'round tees', '1534440015.jpg,1534440015.png,1534440015.jpg', NULL, NULL, NULL, NULL, 1),
(6, 'SKU-1536513007879', 'GL LED Lantern', '1000', '28M', 'Solar', 'Solar Product', 'Gee Lite', '840', '840', '5', 'Power output 1.5 Watt. Powered by 28Pcs 3014 SMD LEDs (Epistar Chips). Long life of LED bulbs. Charging Time- 12hrs from Solar, 10hrs from Charger. Working Time- 9 hrs.', '1536513523.jpeg', NULL, NULL, NULL, NULL, 1),
(7, 'SKU-1536514175467', 'LED Lantern Big', '1000', 'Big', 'Solar', 'Solar Product', 'Gee Lite', '1630', '1630', '0', 'Led watts 2.5W -5.5 Watts  High and Low mode through Switch Back up - 10 hours at High mode and 20 hours at Low mode Battery 6 Volt 5AH', '1536514531.jpeg', NULL, NULL, NULL, NULL, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_brand`
--

INSERT INTO `product_brand` (`id`, `brand_name`, `brand_description`, `status`) VALUES
(1, 'Gucci', 'Guccci India Pvt Ltd', 1),
(2, 'Gee Lite', 'Gee Lite Solar Products', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `category_name`, `category_description`, `status`) VALUES
(1, 'Shirts', 'All type of shirts', 1),
(2, 'T-Shirts', 'All Types Of T-Shirts', 1),
(3, 'Solar', 'Solar Products', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_subcategory`
--

INSERT INTO `product_subcategory` (`id`, `subcategory_name`, `subcategory_desc`, `category`, `category_name`, `status`) VALUES
(1, 'Checked Shirts', '', '1', 'Shirts', 1),
(3, 'Round Tees', 'Round TShirts', '2', 'T-Shirts', 1),
(6, 'Solar Product', 'Solar Product', '3', 'Solar', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestedstock`
--

INSERT INTO `requestedstock` (`id`, `user_unique`, `user_id`, `product_id`, `product_name`, `stock_unit`, `status`) VALUES
(5, 'hSDAeop', 1, 2, 'productName1', 100, 2),
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
  `sale_pid` varchar(10) NOT NULL,
  `sale_pquantity` varchar(10) NOT NULL,
  `sale_pmrp` varchar(10) NOT NULL,
  `sale_ptax` varchar(10) NOT NULL,
  `sale_totbill` varchar(15) NOT NULL,
  `sale_note` text NOT NULL,
  `sale_userunique` varchar(10) NOT NULL,
  `sale_paymode` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_no`, `sale_chalan`, `sale_date`, `sale_customer`, `sale_custmobile`, `sale_custlocation`, `sale_custaddress`, `sale_pcode`, `sale_pname`, `sale_pcategory`, `sale_pid`, `sale_pquantity`, `sale_pmrp`, `sale_ptax`, `sale_totbill`, `sale_note`, `sale_userunique`, `sale_paymode`) VALUES
(1, 'SL-4386', 'wertyu', '03/08/2018', 'Suman Dinda', '08050986742', 'Chennai', 'SIruseri', 'SKU-1531328997147', 'productName', 'Shirts', '1', '2', '12000', '5', '25200', 'ok', 'hSDAeop', NULL),
(2, 'SL-3627', 'wertyu', '07/08/2018', 'Suman Dinda', '08050986742', 'Chennai', 'SIruseri', 'SKU-1531328997147', 'productName', 'Shirts', '1', '2', '12000', '5', '37800', 'ok', 'hSDAeop', 'Cash'),
(3, 'SL-3627', 'wertyu', '07/08/2018', 'Suman Dinda', '08050986742', 'Chennai', 'SIruseri', 'SKU-1531329234582', 'productName1', 'Shirts', '2', '10', '1200', '5', '37800', 'ok', 'hSDAeop', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

DROP TABLE IF EXISTS `service_category`;
CREATE TABLE IF NOT EXISTS `service_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(20) NOT NULL,
  `category_code` varchar(20) DEFAULT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`id`, `category_name`, `category_code`, `status`) VALUES
(1, 'E-Sikshana', 'eSikshana', 1),
(2, 'E-Governance', 'eGovernance', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_request`
--

DROP TABLE IF EXISTS `service_request`;
CREATE TABLE IF NOT EXISTS `service_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_no` varchar(10) DEFAULT NULL,
  `service_name` varchar(20) NOT NULL,
  `service_amount` int(10) NOT NULL,
  `service_date` varchar(15) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_mobile` varchar(15) NOT NULL,
  `customer_pan` varchar(10) DEFAULT NULL,
  `customer_aadhar` varchar(20) DEFAULT NULL,
  `customer_address` text NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `amount_paid` int(10) DEFAULT NULL,
  `amount_due` int(10) DEFAULT NULL,
  `transaction_id` varchar(30) DEFAULT NULL,
  `userkey` varchar(10) DEFAULT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_request`
--

INSERT INTO `service_request` (`id`, `service_no`, `service_name`, `service_amount`, `service_date`, `customer_name`, `customer_mobile`, `customer_pan`, `customer_aadhar`, `customer_address`, `payment_mode`, `amount_paid`, `amount_due`, `transaction_id`, `userkey`, `status`) VALUES
(7, 'SR-6953', 'Pan Card', 100, '11/08/2018', 'Suman Dinda', '08050986742', NULL, NULL, 'SIruseri', 'cash', 100, 0, NULL, 'hSDAeop', 1),
(8, 'SR-887', 'UdyogaSanjeevini', 200, '01/10/2018', 'Suman Dinda', '08050986742', NULL, NULL, 'Newgen Softaware Technologies Plot No 13 D17\nSipcot It Park, Siruseri', 'cash', 200, 0, NULL, 'hSDAeop', 1),
(9, 'SR-7377', 'UdyogaSanjeevini', 200, '01/10/2018', 'Suman Dinda', '08050986742', NULL, NULL, 'Newgen Softaware Technologies Plot No 13 D17\nSipcot It Park, Siruseri', '', 200, 0, NULL, 'hSDAeop', 1),
(10, 'SR-3279', 'UdyogaSanjeevini', 200, '01/10/2018', 'Suman Dinda', '08050986742', NULL, NULL, 'Newgen Softaware Technologies Plot No 13 D17\nSipcot It Park, Siruseri', 'cash', 200, 0, NULL, 'hSDAeop', 1),
(11, 'SR-4340', 'PAN', 200, '02/10/2018', 'Suman Dinda', '08050986742', 'canpd4572r', '881567890986', 'Newgen Softaware Technologies Plot No 13 D17\nSipcot It Park, Siruseri', 'cash', 200, 0, NULL, 'hSDAeop', 1),
(12, 'SR-298', 'UdyogaSanjeevini', 200, '04/10/2018', 'Suman Dinda', '08050986742', '', '', 'Newgen Softaware Technologies Plot No 13 D17\nSipcot It Park, Siruseri', 'cash', 200, 0, '', 'hSDAeop', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

DROP TABLE IF EXISTS `service_types`;
CREATE TABLE IF NOT EXISTS `service_types` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(20) NOT NULL,
  `service_category` varchar(30) DEFAULT 'default',
  `service_price` varchar(10) NOT NULL,
  `gp_commission` int(10) DEFAULT '0',
  `taluk_commission` int(10) DEFAULT '0',
  `dist_commission` int(10) DEFAULT '0',
  `zone_commission` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`id`, `service_name`, `service_category`, `service_price`, `gp_commission`, `taluk_commission`, `dist_commission`, `zone_commission`) VALUES
(1, 'PAN', 'default', '200', NULL, NULL, NULL, NULL),
(2, 'UdyogaSanjeevini', 'default', '200', 3, 5, 5, 5),
(3, 'GST', 'default', '1000', NULL, NULL, NULL, NULL),
(4, 'UPSC', 'eSikshana', '10', 0, 0, 0, 0),
(5, 'KPSC', 'eSikshana', '10', 0, 0, 0, 0),
(6, 'Banking', 'eSikshana', '10', 0, 0, 0, 0),
(7, 'Income Certificate', 'eGovernance', '40', 0, 0, 0, 0),
(8, 'Minority Certificate', 'eGovernance', '50', 0, 0, 0, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_list`
--

INSERT INTO `stock_list` (`id`, `product_id`, `product_name`, `user_unique`, `user_id`, `stock_requested`, `stock_unit`, `req_id`, `status`) VALUES
(1, 1, 'productName', 'hSDAeop', 1, 100, 96, 4, 1),
(2, 2, 'productName1', 'hSDAeop', 1, 100, 50, 5, 1);

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
  `commission` int(10) DEFAULT '0',
  `u_usercreationdate` datetime DEFAULT NULL,
  `u_userdatachanged` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `u_userstatus` int(3) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_email`, `u_password`, `u_mobile`, `u_unique`, `u_firstname`, `u_lastname`, `u_fathersname`, `u_dob`, `u_pan`, `u_aadhar`, `u_district`, `u_taluk`, `u_address`, `u_pincode`, `b_accno`, `b_ifsc`, `b_acctype`, `b_bank`, `u_subordinates`, `u_usertype`, `u_assignedto`, `commission`, `u_usercreationdate`, `u_userdatachanged`, `u_userstatus`) VALUES
(1, 'lovelysin1990@gmail.com', 'gramp', '8249011206', 'hSDAeop', 'gram', 'panchayat1', 'fathers name', '06/06/2000', 'canpd4972r', '123456789012', 'district', 'Chennai', 'Newgen Softaware', 603103, '123456789045678', 'sbin002123', 'savings', 'axis bank', '', 'gram_panchayat', 'zIlL7Vs', 54, '2018-06-29 20:45:56', '2018-06-29 20:45:56', 1),
(2, 'lovelysin1990@gmail.com', 'dnrpia74', '8249011206', 'QMGG22g', 'grampanchayat', '2', 'ttyrytetettyey', '07/01/1998', 'qwee12333', '123456789012', 'district', 'Bangalore', 'Near Miami SuperMarket, Munekolala\nMarathahalli', 560037, '123456676676', 'ihbvc455', 'current', 'hdfc', '', 'gram_panchayat', 'zIlL7Vs', 0, '2018-06-29 21:55:44', '2018-06-29 21:55:44', 1),
(3, 'lovelysin1990@gmail.com', 'qlewjtzg', '8249011206', '2M9pbuo', 'grampanchayat', '3', 'ttyrytetettyey', '07/01/1998', 'qwee12333', '123456789012', 'district', 'Bangalore', 'Near Miami SuperMarket, Munekolala\nMarathahalli', 560037, '123456676676', 'ihbvc455', 'current', 'hdfc', '', 'gram_panchayat', NULL, 0, '2018-06-29 22:00:50', '2018-06-29 22:00:50', 1),
(4, 'foodoku.in@gmail.com', 'racsw02s', '8050986742', 'FwSE0P0', 'grampanchayat', '4', 'ttyrytetettyey', '07/16/2013', 'canpd497r', '123456789012', 'district', 'Chennai', 'Newgen Softaware', 603103, '123456786', '23456', 'current', 'icici', '', 'gram_panchayat', NULL, 0, '2018-06-29 22:04:50', '2018-06-29 22:04:50', 1),
(5, 'sumandinda123@gmail.com', 'taluk', '8050986742', 'zIlL7Vs', 'talukdar', '1', 'fathersname', '07/15/1999', 'vadsdfsfd45465', '123456789012', 'district', 'Chennai', 'Newgen Softaware', 603103, '12rwerwerwerwer', 'ifsccode', 'savings', 'bank name', '1,2', 'taluk_head', 'HcNJNav', 90, '2018-06-30 05:20:00', '2018-06-30 05:20:00', 1),
(6, 'sumandinda123@gmail.com', 'z2ms02pl', '8050986742', 'HcNJNav', 'districthead', '1', 'fathersname', '07/25/2018', 'canpf454564e', '', 'district', 'Chennai', 'SIruseri', 603103, '1234567890-', 'sbin002123', 'savings', 'axis bank', '5', 'district_head', NULL, 90, '2018-07-21 13:32:14', '2018-07-21 13:32:14', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
