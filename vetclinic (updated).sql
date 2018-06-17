-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2018 at 12:08 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vetclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `breeds`
--

CREATE TABLE `breeds` (
  `id` int(11) NOT NULL,
  `species` text NOT NULL,
  `breed` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientid` int(20) NOT NULL,
  `cname` varchar(40) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `contactno` varchar(15) NOT NULL,
  `address` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientid`, `cname`, `email`, `contactno`, `address`) VALUES
(1, 'Geisher Bernabe', 'geisherbernabe@gmail.com', '09509503518', 'Tondo, Manila');

-- --------------------------------------------------------

--
-- Table structure for table `distribution_unit`
--

CREATE TABLE `distribution_unit` (
  `id` int(11) NOT NULL,
  `dist_unit` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distribution_unit`
--

INSERT INTO `distribution_unit` (`id`, `dist_unit`) VALUES
(1, '500mg tablet'),
(2, '100ml syrup');

-- --------------------------------------------------------

--
-- Table structure for table `itemhistory`
--

CREATE TABLE `itemhistory` (
  `id` int(11) NOT NULL,
  `itemid` varchar(20) NOT NULL,
  `action` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `qty` int(20) NOT NULL,
  `total_cost` decimal(20,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemhistory`
--

INSERT INTO `itemhistory` (`id`, `itemid`, `action`, `description`, `date`, `qty`, `total_cost`) VALUES
(1, '1', 'Add Product', 'Add Product: Item 1 - Paracetamol for pups with 50 pc/s and price of 25 added ', '2018-03-19 14:45:51', 50, '25.00'),
(2, '0', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 209 pc/s left', '2018-03-21 15:40:48', 1, '550.00'),
(3, '0', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 208 pc/s left', '2018-03-21 15:53:18', 1, '550.00'),
(4, '0', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 207 pc/s left', '2018-03-21 15:54:01', 1, '550.00'),
(5, '0', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 206 pc/s left', '2018-03-21 15:56:31', 1, '550.00'),
(6, '0', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 205 pc/s left', '2018-03-21 15:58:59', 1, '550.00'),
(7, '0', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 10 pc/s total cost of 5500 only 195 pc/s left', '2018-03-21 20:28:35', 10, '5500.00'),
(8, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 5 pc/s total cost of 2750 only 190 pc/s left', '2018-03-21 21:12:31', 5, '2750.00'),
(9, 'Med200318-2', 'Sold Item', 'Sold Item: Item [Med200318-2 ]- Paracetamol for pups with 5 pc/s total cost of 375 only 290 pc/s left', '2018-03-21 21:12:31', 5, '375.00'),
(10, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 5 pc/s total cost of 2750 only 185 pc/s left', '2018-03-21 21:57:24', 5, '2750.00'),
(11, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 184 pc/s left', '2018-03-21 22:42:35', 1, '550.00'),
(12, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 2 pc/s total cost of 1100 only 182 pc/s left', '2018-03-21 22:46:09', 2, '1100.00'),
(13, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 181 pc/s left', '2018-03-21 22:48:17', 1, '550.00'),
(14, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 10 pc/s total cost of 5500 only 171 pc/s left', '2018-03-22 00:32:18', 10, '5500.00'),
(15, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 5 pc/s total cost of 2750 only 166 pc/s left', '2018-03-22 00:35:43', 5, '2750.00'),
(16, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 165 pc/s left', '2018-03-22 00:38:12', 1, '550.00'),
(17, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 164 pc/s left', '2018-03-22 00:39:03', 1, '550.00'),
(18, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 163 pc/s left', '2018-03-22 00:41:46', 1, '550.00'),
(19, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 162 pc/s left', '2018-03-22 00:43:41', 1, '550.00'),
(20, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 161 pc/s left', '2018-03-22 00:44:17', 1, '550.00'),
(21, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 160 pc/s left', '2018-03-22 00:45:54', 1, '550.00'),
(22, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 159 pc/s left', '2018-03-22 00:47:04', 1, '550.00'),
(23, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 158 pc/s left', '2018-03-22 03:21:04', 1, '550.00'),
(24, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 157 pc/s left', '2018-03-22 03:21:33', 1, '550.00'),
(25, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 2 pc/s total cost of 1100 only 155 pc/s left', '2018-03-22 03:25:42', 2, '1100.00'),
(26, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 154 pc/s left', '2018-03-22 03:26:29', 1, '550.00'),
(27, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 3 pc/s total cost of 1650 only 151 pc/s left', '2018-03-22 03:27:29', 3, '1650.00'),
(28, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 2 pc/s total cost of 1100 only 149 pc/s left', '2018-03-22 03:28:25', 2, '1100.00'),
(29, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 148 pc/s left', '2018-03-22 03:32:03', 1, '550.00'),
(30, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 147 pc/s left', '2018-03-22 03:36:50', 1, '550.00'),
(31, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 2 pc/s total cost of 1100 only 145 pc/s left', '2018-03-22 03:37:16', 2, '1100.00'),
(32, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 144 pc/s left', '2018-03-22 03:39:12', 1, '550.00'),
(33, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 143 pc/s left', '2018-03-22 03:40:03', 1, '550.00'),
(34, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 142 pc/s left', '2018-03-22 03:41:40', 1, '550.00'),
(35, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 141 pc/s left', '2018-03-22 03:43:13', 1, '550.00'),
(36, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 140 pc/s left', '2018-03-22 03:45:42', 1, '550.00'),
(37, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 139 pc/s left', '2018-03-22 03:48:30', 1, '550.00'),
(38, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 138 pc/s left', '2018-03-22 03:50:46', 1, '550.00'),
(39, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 137 pc/s left', '2018-03-22 03:54:08', 1, '550.00'),
(40, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 136 pc/s left', '2018-03-22 03:59:29', 1, '550.00'),
(41, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 5 pc/s total cost of 2750 only 131 pc/s left', '2018-03-22 04:03:40', 5, '2750.00'),
(42, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 130 pc/s left', '2018-03-22 04:04:18', 1, '550.00'),
(43, 'Med200318-1', 'Sold Item', 'Sold Item: Item [Med200318-1 ]- VitaC for Cats with 1 pc/s total cost of 550 only 129 pc/s left', '2018-03-22 04:04:18', 1, '550.00');

-- --------------------------------------------------------

--
-- Table structure for table `itemstock`
--

CREATE TABLE `itemstock` (
  `itemid` varchar(20) NOT NULL,
  `item_desc` varchar(200) NOT NULL,
  `item_unit` varchar(50) NOT NULL,
  `item_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemstock`
--

INSERT INTO `itemstock` (`itemid`, `item_desc`, `item_unit`, `item_type`) VALUES
('Med200318-1', 'VitaC for Cats', '2', '1'),
('Med200318-2', 'Paracetamol for pups', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `items_used`
--

CREATE TABLE `items_used` (
  `items_used_id` int(11) NOT NULL,
  `visitid` varchar(50) NOT NULL,
  `items_used` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_used`
--

INSERT INTO `items_used` (`items_used_id`, `visitid`, `items_used`, `qty`) VALUES
(1, '18-1-1-6', 'Med200318-1', 1),
(2, '18-1-1-7', 'Med200318-1', 1),
(3, '18-1-1-8', 'Med200318-1', 1),
(4, '18-1-1-9', 'Med200318-1', 1),
(5, '18-1-1-10', 'Med200318-1', 1),
(6, '18-1-1-11', 'Med200318-1', 10),
(7, '18-1-1-12', 'Med200318-1', 5),
(8, '18-1-1-12', 'Med200318-2', 5),
(9, '18-1-1-13', 'Med200318-1', 5),
(10, '18-1-1-14', 'Med200318-1', 1),
(11, '18-1-1-15', 'Med200318-1', 2),
(12, '18-1-1-16', 'Med200318-1', 1),
(13, '18-1-1-17', 'Med200318-1', 10),
(14, '18-1-1-18', 'Med200318-1', 5),
(15, '18-1-1-19', 'Med200318-1', 1),
(42, '18-1-1-28', 'Med200318-1', 1),
(41, '18-1-1-28', 'Med200318-1', 1),
(40, '18-1-1-27', 'Med200318-1', 5),
(39, '18-1-1-26', 'Med200318-1', 1),
(38, '18-1-1-25', 'Med200318-1', 1),
(37, '18-1-1-24', 'Med200318-1', 1),
(36, '18-1-1-23', 'Med200318-1', 1),
(35, '18-1-1-22', 'Med200318-1', 1),
(34, '18-1-1-21', 'Med200318-1', 1),
(33, '18-1-1-20', 'Med200318-1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `itemusage`
--

CREATE TABLE `itemusage` (
  `itemid` int(11) UNSIGNED NOT NULL,
  `serviceid` int(1) NOT NULL DEFAULT '3',
  `date_used` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `qty_used` int(11) UNSIGNED NOT NULL,
  `total_cost` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_instance`
--

CREATE TABLE `item_instance` (
  `id` int(11) NOT NULL,
  `item_id` varchar(20) NOT NULL,
  `item_cost` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_sup` int(11) NOT NULL,
  `date_received` date NOT NULL,
  `item_exp` date NOT NULL,
  `isExpired` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_instance`
--

INSERT INTO `item_instance` (`id`, `item_id`, `item_cost`, `item_qty`, `item_sup`, `date_received`, `item_exp`, `isExpired`) VALUES
(1, 'Med200318-1', 500, 50, 1, '2018-03-20', '2018-03-21', 0),
(7, 'Med200318-2', 75, 95, 2, '2018-03-20', '2018-03-31', 0),
(9, 'Med200318-1', 550, 0, 2, '2018-03-20', '2018-03-24', 0),
(10, 'Med200318-2', 80, 40, 1, '2018-03-20', '2018-03-28', 0),
(11, 'Med200318-1', 550, 69, 1, '2018-03-20', '2018-03-23', 0),
(12, 'Med200318-2', 80, 35, 2, '2018-03-20', '2018-03-31', 0),
(13, 'Med200318-2', 90, 75, 1, '2018-03-20', '2018-03-31', 0),
(14, 'Med200318-1', 500, 25, 1, '2018-03-20', '2018-03-21', 0),
(15, 'Med200318-1', 500, 60, 2, '2018-03-20', '2018-03-31', 0),
(16, 'Med200318-2', 90, 45, 2, '2018-03-20', '2018-03-22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE `item_type` (
  `id` int(11) NOT NULL,
  `itemtype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_type`
--

INSERT INTO `item_type` (`id`, `itemtype`) VALUES
(1, 'Medication'),
(2, 'Surgical Equipment'),
(3, 'Grooming supplies');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `petid` varchar(20) NOT NULL,
  `clientid` varchar(20) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `breed` varchar(30) NOT NULL,
  `species` varchar(30) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `birthday` varchar(15) NOT NULL,
  `markings` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`petid`, `clientid`, `pname`, `breed`, `species`, `sex`, `birthday`, `markings`) VALUES
('1-1', '1', 'Marty', 'Dachshund', 'Dog', 'm', '2017-08-05', 'brown');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `ID` int(11) NOT NULL,
  `vetid` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `startdate` varchar(48) NOT NULL,
  `enddate` varchar(48) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `allDay` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`ID`, `vetid`, `title`, `startdate`, `enddate`, `description`, `allDay`) VALUES
(1, '301-001', 'trial', '2018-03-21', '2018-03-21', 'trial', 'false'),
(2, '301-002', 'trial2', '2018-03-21', '2018-03-21', 'trial2', 'false'),
(3, '301-001', 'trial3', '2018-03-21', '2018-03-21', 'trial3', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `desc` varchar(40) NOT NULL,
  `servcost` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) UNSIGNED NOT NULL,
  `desc` varchar(300) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `desc`, `type`) VALUES
(1, 'Puppy Cut', 'Grooming');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stockno` varchar(20) NOT NULL,
  `item_desc` varchar(30) NOT NULL,
  `qty_left` int(10) NOT NULL,
  `item_cost` decimal(15,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_name`) VALUES
(1, 'LODESTAR FEEDMILL AND VETERINARY PRODUCTS'),
(2, 'NOVATECH VET. & BIOLOGICALS CORP.');

-- --------------------------------------------------------

--
-- Table structure for table `veterinarian`
--

CREATE TABLE `veterinarian` (
  `vetid` varchar(20) NOT NULL,
  `vetname` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `veterinarian`
--

INSERT INTO `veterinarian` (`vetid`, `vetname`) VALUES
('301-001', 'Dr. Cerdz'),
('301-002', 'Dr. Christian');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `visitid` varchar(30) NOT NULL,
  `petid` varchar(20) NOT NULL,
  `serviceid` varchar(20) NOT NULL,
  `visitdate` varchar(25) NOT NULL,
  `findings` varchar(20) NOT NULL,
  `recommendation` varchar(30) NOT NULL,
  `case_type` varchar(15) NOT NULL,
  `visit_cost` decimal(15,2) NOT NULL,
  `Total` decimal(11,2) NOT NULL,
  `itemCost` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`visitid`, `petid`, `serviceid`, `visitdate`, `findings`, `recommendation`, `case_type`, `visit_cost`, `Total`, `itemCost`) VALUES
('18-1-1-1', '1-1', '1', '2018-03-19 13:56:30', 'long haired', 'long haired', 'Grooming', '0.00', '0.00', '0.00'),
('18-1-1-2', '1-1', '1', '2018-03-19 13:56:30', 'long haired', 'long haired', 'Grooming', '0.00', '0.00', '0.00'),
('18-1-1-3', '1-1', '1', '2018-03-19 14:07:34', 'trial', 'trial', 'Grooming', '0.00', '0.00', '0.00'),
('18-1-1-4', '1-1', '1', '2018-03-19 14:07:34', 'trial', 'trial', 'Grooming', '0.00', '0.00', '0.00'),
('18-1-1-5', '1-1', '1', '2018-03-19 14:37:37', 'trial3', 'trial3', 'Grooming', '0.00', '0.00', '0.00'),
('18-1-1-6', '1-1', '0', '2018-03-21 15:40:48', 'sick', 'sick', 'Examine', '100.00', '0.00', '0.00'),
('18-1-1-7', '1-1', '1', '2018-03-21 15:53:18', 'asdad', 'sdsada', 'Grooming', '190.00', '1290.00', '550.00'),
('18-1-1-8', '1-1', '1', '2018-03-21 15:54:01', 'asdasd', 'asdsa', 'Grooming', '100.00', '1200.00', '550.00'),
('18-1-1-9', '1-1', '1', '2018-03-21 15:56:31', 'HASHAH', 'AHSHSA', 'Grooming', '100.00', '1200.00', '550.00'),
('18-1-1-10', '1-1', '1', '2018-03-21 15:58:59', 'ah', 'hah', 'Grooming', '100.00', '1100.00', '550.00'),
('18-1-1-11', '1-1', '1', '2018-03-21 20:28:35', 'test', 'test', 'Grooming', '1000.00', '6500.00', '5500.00'),
('18-1-1-12', '1-1', '1', '2018-03-21 21:12:31', 'test3', 'test3', 'Grooming', '500.00', '6750.00', '6250.00'),
('18-1-1-13', '1-1', '1', '2018-03-21 21:57:24', 'test4', 'test4', 'Grooming', '0.00', '2750.00', '2750.00'),
('18-1-1-14', '1-1', '1', '2018-03-21 22:42:35', 'test', 'test', 'Grooming', '100.00', '650.00', '550.00'),
('18-1-1-15', '1-1', '1', '2018-03-21 22:46:09', 'test', 'test', 'Grooming', '5000.00', '6100.00', '1100.00'),
('18-1-1-16', '1-1', '1', '2018-03-21 22:48:17', 'test', '', 'Grooming', '1.00', '551.00', '550.00'),
('18-1-1-17', '1-1', '1', '2018-03-22 00:32:18', 'test', 'test', 'Grooming', '1000.00', '6500.00', '5500.00'),
('18-1-1-18', '1-1', '1', '2018-03-22 00:35:43', 'test', 'test', 'Grooming', '1000.00', '6500.00', '5500.00'),
('18-1-1-19', '1-1', '1', '2018-03-22 00:38:12', 'test', 'test', 'Grooming', '1.00', '0.00', '0.00'),
('18-1-1-28', '1-1', '1', '2018-03-22 04:04:18', 'test', 'test', 'Grooming', '100.00', '1200.00', '1100.00'),
('18-1-1-27', '1-1', '1', '2018-03-22 04:03:40', 'test', '', 'Grooming', '500.00', '3250.00', '2750.00'),
('18-1-1-26', '1-1', '1', '2018-03-22 03:59:29', 'test', '', 'Grooming', '50.00', '600.00', '550.00'),
('18-1-1-24', '1-1', '1', '2018-03-22 03:50:46', 'test', '', 'Grooming', '100.00', '650.00', '550.00'),
('18-1-1-25', '1-1', '1', '2018-03-22 03:54:08', 'test', '', 'Grooming', '100.00', '650.00', '550.00'),
('18-1-1-20', '1-1', '1', '2018-03-22 03:41:40', 'test', '', 'Grooming', '100.00', '650.00', '550.00'),
('18-1-1-21', '1-1', '1', '2018-03-22 03:43:13', 'test', '', 'Grooming', '100.00', '650.00', '550.00'),
('18-1-1-22', '1-1', '1', '2018-03-22 03:45:42', 'tets', '', 'Grooming', '100.00', '650.00', '550.00'),
('18-1-1-23', '1-1', '1', '2018-03-22 03:48:30', 'test', '', 'Grooming', '100.00', '650.00', '550.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientid`);

--
-- Indexes for table `distribution_unit`
--
ALTER TABLE `distribution_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemhistory`
--
ALTER TABLE `itemhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemstock`
--
ALTER TABLE `itemstock`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `items_used`
--
ALTER TABLE `items_used`
  ADD PRIMARY KEY (`items_used_id`);

--
-- Indexes for table `item_instance`
--
ALTER TABLE `item_instance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_type`
--
ALTER TABLE `item_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`petid`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stockno`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `veterinarian`
--
ALTER TABLE `veterinarian`
  ADD PRIMARY KEY (`vetid`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`visitid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breeds`
--
ALTER TABLE `breeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `distribution_unit`
--
ALTER TABLE `distribution_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `itemhistory`
--
ALTER TABLE `itemhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `items_used`
--
ALTER TABLE `items_used`
  MODIFY `items_used_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `item_instance`
--
ALTER TABLE `item_instance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `item_type`
--
ALTER TABLE `item_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
