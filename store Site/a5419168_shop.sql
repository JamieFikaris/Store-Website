
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2014 at 06:15 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a5419168_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `surname` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `addressline1` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `addressline2` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `postcode` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `country` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=57 ;

--
-- Dumping data for table `customers`
--


-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `customerid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=58 ;

--
-- Dumping data for table `orders`
--


-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `order_detail`
--


-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `price` float NOT NULL,
  `image` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `number_in_stock` int(5) NOT NULL,
  `reorder_level` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` VALUES(1, 'Pencil', 'HB Pencil.', 0.49, 'images/Images/Pencil.jpg', 500, 300);
INSERT INTO `products` VALUES(2, 'Pen', 'Ball point pen, black ink.', 0.79, '/images/Images/Pen.jpg', 400, 250);
INSERT INTO `products` VALUES(3, 'Coloured Pencils', '20 coloured pencils.', 1.99, '/images/Images/ColouredPencils.jpg', 150, 75);
INSERT INTO `products` VALUES(4, 'Coloured Pens', '20 coloured pens.', 2.99, '/images/Images/ColouredPens.jpg', 150, 75);
INSERT INTO `products` VALUES(5, 'Ruler', '15cm plastic ruler.', 0.99, '/images/Images/Ruler.jpg', 300, 200);
INSERT INTO `products` VALUES(6, 'Stapler', 'Office stapler.', 3.99, '/images/Images/Stapler.jpg', 130, 50);
INSERT INTO `products` VALUES(7, 'Hole Punch', 'Office hole punch.', 3.99, '/images/Images/HolePunch.jpg', 100, 30);
INSERT INTO `products` VALUES(8, 'Folder', 'Bind folder.', 1.99, '/images/Images/Folder.jpg', 600, 250);
INSERT INTO `products` VALUES(9, 'Scissors', 'Safety office scissors.', 1.99, '/images/Images/Scissors.jpg', 120, 75);
INSERT INTO `products` VALUES(10, 'Notebook', 'A5, 200 page notebook.', 1.99, 'images/Images/Notebook.jpg', 500, 250);
