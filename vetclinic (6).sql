-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2018 at 08:24 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

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
  `itemid` int(11) UNSIGNED NOT NULL,
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
(1, 1, 'Add Product', 'Add Product: Item 1 - Paracetamol for pups with 50 pc/s and price of 25 added ', '2018-03-19 14:45:51', 50, '25.00');

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
  `items_used` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(7, 'Med200318-2', 75, 100, 2, '2018-03-20', '2018-03-31', 0),
(9, 'Med200318-1', 550, 70, 2, '2018-03-20', '2018-03-24', 0),
(10, 'Med200318-2', 80, 40, 1, '2018-03-20', '2018-03-28', 0),
(11, 'Med200318-1', 550, 80, 1, '2018-03-20', '2018-03-23', 0),
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
  `title` varchar(255) NOT NULL,
  `startdate` varchar(48) NOT NULL,
  `enddate` varchar(48) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `allDay` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`ID`, `title`, `startdate`, `enddate`, `description`, `allDay`) VALUES
(1, 'trial', '2018-03-21', '2018-03-21', 'trial', 'false'),
(2, 'trial2', '2018-03-21', '2018-03-21', 'trial2', 'false');

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
('18-1-1-5', '1-1', '1', '2018-03-19 14:37:37', 'trial3', 'trial3', 'Grooming', '0.00', '0.00', '0.00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `items_used`
--
ALTER TABLE `items_used`
  MODIFY `items_used_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
