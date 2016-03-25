-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2016 at 08:07 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `photo4130`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `state` varchar(30) CHARACTER SET utf8 NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` decimal(15,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `state`, `time`, `total`) VALUES
(1, 'checked out', '2016-02-18 23:49:39', '0.00'),
(2, 'cancelled', '2016-02-19 00:05:05', '0.00'),
(3, 'cancelled', '2016-03-22 10:04:38', '0.00'),
(4, 'cancelled', '2016-03-23 08:02:29', '0.00'),
(5, 'cancelled', '2016-03-23 08:36:20', '0.00'),
(6, 'cancelled', '2016-03-23 08:38:25', '0.00'),
(7, 'cancelled', '2016-03-23 08:40:13', '0.00'),
(8, 'cancelled', '2016-03-23 08:40:50', '0.00'),
(9, 'cancelled', '2016-03-23 08:40:55', '0.00'),
(10, 'cancelled', '2016-03-23 08:42:01', '0.00'),
(11, 'cancelled', '2016-03-23 08:42:15', '0.00'),
(12, 'cancelled', '2016-03-23 08:42:54', '0.00'),
(13, 'cancelled', '2016-03-23 09:10:14', '0.00'),
(14, 'cancelled', '2016-03-23 09:10:33', '0.00'),
(15, 'cancelled', '2016-03-23 09:11:29', '0.00'),
(16, 'cancelled', '2016-03-23 09:11:52', '0.00'),
(17, 'cancelled', '2016-03-23 09:17:23', '0.00'),
(18, 'cancelled', '2016-03-23 09:33:54', '0.00'),
(19, 'cancelled', '2016-03-23 09:37:04', '0.00'),
(20, 'cancelled', '2016-03-23 09:38:23', '0.00'),
(21, 'checked out', '2016-03-23 09:41:44', '0.00'),
(22, 'cancelled', '2016-03-23 09:49:34', '0.00'),
(23, 'checked out', '2016-03-23 09:50:07', '0.00'),
(24, 'checked out', '2016-03-23 09:50:34', '0.00'),
(25, 'cancelled', '2016-03-23 10:09:04', '0.00'),
(26, 'cancelled', '2016-03-23 10:09:55', '0.00'),
(27, 'cancelled', '2016-03-23 10:10:03', '0.00'),
(28, 'cancelled', '2016-03-23 10:10:24', '0.00'),
(29, 'cancelled', '2016-03-23 10:10:41', '0.00'),
(30, 'cancelled', '2016-03-23 10:11:10', '0.00'),
(31, 'started', '2016-03-23 10:25:40', '0.00'),
(32, 'cancelled', '2016-03-23 10:57:16', '0.00'),
(33, 'checked out', '2016-03-23 10:57:28', '0.00'),
(34, 'cancelled', '2016-03-23 11:15:29', '0.00'),
(35, 'cancelled', '2016-03-23 11:15:34', '0.00'),
(36, 'cancelled', '2016-03-23 11:15:58', '0.00'),
(37, 'cancelled', '2016-03-23 11:16:51', '0.00'),
(38, 'cancelled', '2016-03-23 11:17:00', '0.00'),
(39, 'checked out', '2016-03-23 11:17:25', '0.00'),
(40, 'cancelled', '2016-03-23 11:17:46', '0.00'),
(41, 'cancelled', '2016-03-23 11:18:28', '0.00'),
(42, 'cancelled', '2016-03-23 11:18:35', '0.00'),
(43, 'checked out', '2016-03-23 11:19:03', '0.00'),
(44, 'cancelled', '2016-03-23 11:19:12', '0.00'),
(45, 'cancelled', '2016-03-23 11:20:02', '0.00'),
(46, 'cancelled', '2016-03-23 11:20:25', '0.00'),
(47, 'cancelled', '2016-03-23 11:20:50', '0.00'),
(48, 'cancelled', '2016-03-23 11:21:34', '0.00'),
(49, 'checked out', '2016-03-23 11:21:45', '0.00'),
(50, 'cancelled', '2016-03-23 11:22:46', '0.00'),
(51, 'cancelled', '2016-03-23 11:24:08', '0.00'),
(52, 'cancelled', '2016-03-23 11:24:45', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE IF NOT EXISTS `cart_product` (
  `ID` int(30) NOT NULL AUTO_INCREMENT,
  `product_id` int(30) NOT NULL,
  `cart_id` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `product_id` (`product_id`),
  KEY `cart_id` (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cart_product`
--

INSERT INTO `cart_product` (`ID`, `product_id`, `cart_id`, `quantity`, `time`) VALUES
(1, 7, 21, 1, '2016-03-23 09:46:03'),
(2, 7, 23, 1, '2016-03-23 09:50:18'),
(3, 8, 24, 1, '2016-03-23 09:50:47'),
(4, 7, 33, 1, '2016-03-23 11:13:05'),
(5, 8, 33, 1, '2016-03-23 11:13:05'),
(6, 7, 49, 1, '2016-03-23 11:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SKU` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title` varchar(100) NOT NULL,
  `item_price` decimal(15,2) NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 NOT NULL,
  `qty` int(100) NOT NULL,
  `type` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `SKU`, `title`, `item_price`, `description`, `qty`, `type`) VALUES
(4, 'SER001', 'Wedding Package', '300.00', 'This is the wedding package', 1, 'service'),
(5, 'SER002', 'Graduation Package', '200.00', '', 1, 'service'),
(6, 'SER003', 'Portrait Package', '75.00', 'This is the portrait package', 4, 'service'),
(7, 'REN005', 'Tamron 50mm lens F1.8/2', '15.00', 'Tamron lens. High Quality.', 1, 'rental'),
(8, 'REN006', 'Canon 100mm lens f2.6', '100.00', 'Canon Lens. 0 tolerance', 4, 'rental'),
(9, 'REN007', 'Nikon 200mm sports lens', '150.00', 'Sport Lens. High shutterspeed, good zoom.', 1, 'rental'),
(10, 'REN008', 'Panaphonics XT1i camera elite edition', '100.00', 'Rare Camera', 4, 'rental'),
(11, 'REN009', 'Necronomicon', '150.00', 'Osh Kavosh', 1, 'rental'),
(12, 'REN010', 'Canon Rebel t5i', '150.00', 'Good Camera', 1, 'rental');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `firstname`, `lastname`, `type`) VALUES
(1, 'a', '123', 'Jonathan', 'Lee', 'admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `cart_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_product_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`ID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
