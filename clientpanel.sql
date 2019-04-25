-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 23, 2019 at 11:52 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clientpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `disabled` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `description`, `disabled`) VALUES
(1, 'test', 'etstts', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `price` double NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `datecreated` varchar(255) NOT NULL,
  `duedate` varchar(255) NOT NULL,
  `paidon` varchar(255) DEFAULT NULL,
  `foruser` varchar(255) NOT NULL,
  `foruserid` int(255) NOT NULL,
  `createdby` varchar(255) NOT NULL,
  `products` text NOT NULL,
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `price`, `title`, `description`, `paid`, `datecreated`, `duedate`, `paidon`, `foruser`, `foruserid`, `createdby`, `products`, `suspended`) VALUES
(26, 99, 'test', 'testomschr', 0, '1556063433.4601', '1556063433.4601', '0', '123', 4, 'system', '2', 0),
(27, 99, 'test', 'testomschr', 0, '1556063460.1467', '1556063460.1467', '0', '123', 4, 'system', '2', 0),
(28, 99, 'test', 'testomschr', 0, '1556063486.1769', '1556063486.1769', '0', '123', 4, 'system', '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `categoryid` int(255) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `categoryid`, `disabled`) VALUES
(1, 'test', 'test', 12, 0, 0),
(2, 'test', 'testomschr', 99.99, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `usergroup` varchar(255) NOT NULL DEFAULT 'users',
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `discord` varchar(255) NOT NULL,
  `lastloginip` varchar(255) NOT NULL,
  `lastlogindate` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `usergroup`, `password`, `firstname`, `lastname`, `email`, `phone`, `discord`, `lastloginip`, `lastlogindate`, `token`) VALUES
(1, 'onnovanhelfteren', 'users', 'ujh', 'kj', 'j', 'jkhj', 'kh', 'jhj', 'khj', 'h', NULL),
(2, 'onnovanhelfteren1', 'users', '$2y$07$au2QCP0DP0RMLdFtL5.9luhGr8Dhb5GFiA/R4xgI5VaZKJy9XUlWy', '123', '123', '123', '123', '123', '::1', '1556052890.2283', NULL),
(3, 'onnovanhelfteren2', 'users', '$2y$07$cmUQfkyxWLVa2ocEitUtsu1y1MIaJ2bme2.13aiHQ2YGEj3QkYE2a', '123', '123', '123', '123', '123', '::1', '1556052921.6295', NULL),
(4, '123', 'admins', '$2y$07$YgDWoPuSk7wpnn2JEyXCWe4XgjHrebyxt20Gzqoa5jtJ0DVDAcuSC', 'Onno', 'Helfteren', 'private@gmail.com', '612345678', '132', '::1', '1556062377.355', '1776240fe32dd95977232bd1c16e93bd'),
(5, '123123123123123', 'users', '$2y$07$6xbCNNhwmNZO/wTSHYBBjOUvXpLIgKPoDAieZX0PaRV0RocqqUxyK', 'Onno1231231231', '213123123123123', '123123123', '123123', '123123123', '::1', '1556056655.8259', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
