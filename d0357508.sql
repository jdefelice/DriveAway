-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 06, 2012 at 07:31 AM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a4`
--

-- --------------------------------------------------------

--
-- Table structure for table `searches`
--

DROP TABLE IF EXISTS `searches`;
CREATE TABLE `searches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `search` varchar(250) NOT NULL,
  `make` varchar(250) NOT NULL,
  `color` varchar(50) NOT NULL,
  `minPrice` int(10) NOT NULL,
  `maxPrice` int(10) NOT NULL,
  `year` year(4) NOT NULL,
  `fave` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `searches`
--

INSERT INTO `searches` VALUES(72, 2, '', '', '', 0, 0, 2007, 1, '2012-03-04 23:53:52');
INSERT INTO `searches` VALUES(73, 2, '', '', 'silver', 0, 0, 0000, 0, '2012-03-05 00:07:46');
INSERT INTO `searches` VALUES(74, 2, '', '', 'blue', 0, 0, 0000, 0, '2012-03-05 00:07:52');
INSERT INTO `searches` VALUES(75, 2, '', '', '', 0, 0, 0000, 0, '2012-03-05 13:39:01');
INSERT INTO `searches` VALUES(76, 2, '', '', '', 0, 0, 2007, 0, '2012-03-05 17:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` varchar(50) NOT NULL,
  `forename` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `address1` varchar(250) NOT NULL,
  `address2` varchar(250) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `city` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(2, 'DeFelice', 'Jon', '1986-05-30', '1 Tedder Rd.', 'Beaconside', 'ST16 3RB', 'Stafford', '5f4dcc3b5aa765d61d8327deb882cf99', 'jonnywithnoh@gmail.com', '07530234567', '2012-02-28 21:02:52');
INSERT INTO `users` VALUES(7, 'Coppen', 'Emily', '1970-01-01', '1 Magic Rd', '', 'st5 9lt', 'Newcastle-under-lyme', '1a1dc91c907325c69271ddf0c944bc72', 'greenfus3@gmail.com', '999999999', '2012-02-29 09:31:44');
INSERT INTO `users` VALUES(28, 'last_name', 'first_name', '1916-08-12', 'address', 'address2', 'postcode', 'city', '5f4dcc3b5aa765d61d8327deb882cf99', 'example@example.org', 'telephone', '2012-03-01 11:26:32');
INSERT INTO `users` VALUES(29, 'last_name', 'first_name', '1900-03-03', 'address', 'address2', 'postcode', 'city', '5f4dcc3b5aa765d61d8327deb882cf99', 'example@example.org', 'telephone', '2012-03-01 19:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `make` varchar(250) NOT NULL,
  `model` varchar(250) NOT NULL,
  `year` year(4) NOT NULL,
  `cc` float NOT NULL,
  `color` varchar(50) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` VALUES(11, 'Mazda', '6 Hatchback', 2008, 2, 'Blue', 5495, '2012-03-04 22:12:44');
INSERT INTO `vehicles` VALUES(12, 'Peugeot', '407 SW Estate', 2007, 2, 'Black', 5795, '2012-03-04 22:13:51');
INSERT INTO `vehicles` VALUES(13, 'Ford', 'Mondeo Hatchback', 2007, 2, 'Silver', 6495, '2012-03-04 22:15:10');
INSERT INTO `vehicles` VALUES(14, 'Volkswagen', 'Passat Saloon', 2006, 2, 'Silver', 4995, '2012-03-04 22:16:22');
INSERT INTO `vehicles` VALUES(15, 'Vauxhall', 'Vectra Hatchback', 2008, 1.9, 'Blue', 4995, '2012-03-04 22:18:00');
INSERT INTO `vehicles` VALUES(16, 'BMW', '5-Series Saloon', 2009, 2, 'Silver', 11989, '2012-03-04 22:19:37');
INSERT INTO `vehicles` VALUES(17, 'Volkswagen', 'Passat Saloon', 2007, 2, 'Black', 5995, '2012-03-04 22:20:35');
INSERT INTO `vehicles` VALUES(18, 'Jaguar', 'XJ Saloon', 2006, 2.7, 'Silver', 9393, '2012-03-04 22:21:29');
INSERT INTO `vehicles` VALUES(19, 'Peugeot', '307 Hatchback', 2006, 1.6, 'Blue', 3499, '2012-03-04 22:22:22');
INSERT INTO `vehicles` VALUES(20, 'Volvo', 'V50 Estate', 2007, 2, 'Blue', 7695, '2012-03-04 22:23:07');
