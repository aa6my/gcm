-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2015 at 11:47 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gcmfitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
`adminId` int(5) NOT NULL,
  `adminEmail` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `adminFirstName` varchar(255) COLLATE utf8_bin NOT NULL,
  `adminLastName` varchar(255) COLLATE utf8_bin NOT NULL,
  `adminBio` longtext COLLATE utf8_bin,
  `outletId` int(5) NOT NULL DEFAULT '0',
  `adminAddress` longtext COLLATE utf8_bin,
  `adminPhone` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `adminCell` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `recEmails` int(1) NOT NULL DEFAULT '1',
  `publicProfile` int(1) NOT NULL DEFAULT '1',
  `adminAvatar` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'adminDefault.png',
  `adminNotes` text COLLATE utf8_bin,
  `lastVisited` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `adminLang` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT 'en',
  `createDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hash` varchar(32) COLLATE utf8_bin NOT NULL,
  `isAdmin` int(5) NOT NULL DEFAULT '0',
  `adminRole` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `isActive` int(1) NOT NULL DEFAULT '1',
  `isArchived` int(5) NOT NULL DEFAULT '0',
  `archiveDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `MenuShown` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `ButtonShown` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `eventColor` varchar(7) CHARACTER SET utf8 DEFAULT '#cc411a'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminId`, `adminEmail`, `password`, `adminFirstName`, `adminLastName`, `adminBio`, `outletId`, `adminAddress`, `adminPhone`, `adminCell`, `recEmails`, `publicProfile`, `adminAvatar`, `adminNotes`, `lastVisited`, `adminLang`, `createDate`, `hash`, `isAdmin`, `adminRole`, `isActive`, `isArchived`, `archiveDate`, `MenuShown`, `ButtonShown`, `eventColor`) VALUES
(1, 'admin@admin.com', 'wjpsu++KU5WRObPuVfd6RCR7pqOuMn70WjnOuYSCOG4=', 'Admin', 'Admin', NULL, 0, NULL, NULL, NULL, 1, 1, 'adminDefault.png', NULL, '2015-04-06 19:52:24', 'en', '2015-04-06 19:51:44', '621bf66ddb7c962aa0d22ac97d69b793', 1, 'Site Administrator', 1, 0, '0000-00-00 00:00:00', '', '', '#cc411a');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
`clientId` int(5) NOT NULL,
  `clientAccountBal` decimal(13,4) DEFAULT '0.0000',
  `clientEmail` varchar(255) COLLATE utf8_bin NOT NULL,
  `clientNRIC` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `clientFirstName` varchar(255) COLLATE utf8_bin NOT NULL,
  `clientLastName` varchar(255) COLLATE utf8_bin NOT NULL,
  `clientMembershipNo` varchar(50) COLLATE utf8_bin NOT NULL,
  `clientDOB` date NOT NULL DEFAULT '0000-00-00',
  `clientBio` longtext COLLATE utf8_bin,
  `clientCompanyAddress` longtext COLLATE utf8_bin,
  `clientAddress` longtext COLLATE utf8_bin,
  `clientPhone` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `clientCell` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `recEmails` int(1) NOT NULL DEFAULT '1',
  `publicProfile` int(1) NOT NULL DEFAULT '1',
  `clientAvatar` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'clientDefault.png',
  `clientNotes` text COLLATE utf8_bin,
  `checkinoutStatus` int(2) DEFAULT NULL,
  `clientLang` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT 'en',
  `createDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hash` varchar(32) COLLATE utf8_bin NOT NULL,
  `isActive` int(1) NOT NULL DEFAULT '1',
  `isArchived` int(5) NOT NULL DEFAULT '0',
  `archiveDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=17 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `clientAccountBal`, `clientEmail`, `clientNRIC`, `password`, `clientFirstName`, `clientLastName`, `clientMembershipNo`, `clientDOB`, `clientBio`, `clientCompanyAddress`, `clientAddress`, `clientPhone`, `clientCell`, `recEmails`, `publicProfile`, `clientAvatar`, `clientNotes`, `checkinoutStatus`, `clientLang`, `createDate`, `hash`, `isActive`, `isArchived`, `archiveDate`) VALUES
(16, '0.0000', '', 'sdfsdf', '', 'adfasd', 'wer', 'sadf', '0000-00-00', NULL, NULL, NULL, NULL, NULL, 1, 1, 'clientDefault.png', NULL, NULL, 'en', '0000-00-00 00:00:00', '', 1, 0, '0000-00-00 00:00:00'),
(15, '0.0000', 'asdsa@yahoo.com', '123', '', 'emi', 'mm', '456', '0000-00-00', NULL, NULL, NULL, '234234', NULL, 1, 1, 'clientDefault.png', NULL, NULL, 'en', '0000-00-00 00:00:00', '', 1, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `codetable`
--

CREATE TABLE IF NOT EXISTS `codetable` (
`codetableId` int(5) NOT NULL,
  `codetypeId` varchar(50) COLLATE utf8_bin NOT NULL,
  `codeValue` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `orderSequence` int(3) NOT NULL DEFAULT '0',
  `codetableparentId` int(5) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=27 ;

--
-- Dumping data for table `codetable`
--

INSERT INTO `codetable` (`codetableId`, `codetypeId`, `codeValue`, `orderSequence`, `codetableparentId`) VALUES
(1, 'Contract Type', 'Membership', 1, NULL),
(2, 'Contract Type', 'Personal Training', 2, NULL),
(3, 'Payment Type', 'Cash', 1, NULL),
(4, 'Payment Type', 'Check', 2, NULL),
(5, 'Payment Type', 'Nets', 3, NULL),
(6, 'Payment Type', 'Master', 4, NULL),
(7, 'Payment Type', 'Visa', 5, NULL),
(8, 'PT Status', 'Request', 1, NULL),
(9, 'PT Status', 'Planned', 2, NULL),
(10, 'PT Status', 'In Progress', 3, NULL),
(11, 'PT Status', 'Cancelled', 4, NULL),
(12, 'Visit Status', 'Check In', 1, NULL),
(13, 'Visit Status', 'Check Out', 2, NULL),
(16, 'Payment Type', 'Cash', 1, NULL),
(17, 'Payment Type', 'Check', 2, NULL),
(18, 'Payment Type', 'Nets', 3, NULL),
(19, 'Payment Type', 'Master', 4, NULL),
(20, 'Payment Type', 'Visa', 5, NULL),
(21, 'PT Status', 'Request', 1, NULL),
(22, 'PT Status', 'Planned', 2, NULL),
(23, 'PT Status', 'In Progress', 3, NULL),
(24, 'PT Status', 'Cancelled', 4, NULL),
(25, 'Visit Status', 'Check In', 1, NULL),
(26, 'Visit Status', 'Check Out', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contractfiles`
--

CREATE TABLE IF NOT EXISTS `contractfiles` (
`contractfileId` int(5) NOT NULL,
  `contractId` int(5) NOT NULL DEFAULT '0',
  `clientId` int(5) NOT NULL DEFAULT '0',
  `contractName` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `contractDescription` longtext COLLATE utf8_bin,
  `contractfilestartDate` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `contractfiledueDate` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `contractNotes` text COLLATE utf8_bin,
  `contractType` int(1) NOT NULL DEFAULT '0',
  `membershipPeriod` int(2) DEFAULT '0',
  `membershipcost` decimal(13,4) DEFAULT '0.0000',
  `membershipsalecomm` decimal(3,2) DEFAULT '0.00',
  `renewalert` int(1) DEFAULT '0',
  `ptsession` int(2) DEFAULT '0',
  `ptcostpersession` decimal(13,4) DEFAULT '0.0000',
  `ptsalecomm` decimal(3,2) DEFAULT '0.00',
  `ptservicecomm` decimal(3,2) DEFAULT '0.00',
  `isActive` int(1) DEFAULT '0',
  `mssalestaffid` int(5) DEFAULT '0',
  `ptsalestaffid` int(5) DEFAULT '0',
  `ptservicestaffid` int(5) DEFAULT '0',
  `msgst` int(1) DEFAULT '0',
  `ptgst` int(1) DEFAULT '0',
  `daysComplete` int(4) DEFAULT '0',
  `monthComplete` int(4) DEFAULT '0',
  `sessionComplete` int(3) DEFAULT '0',
  `percentComplete` int(5) DEFAULT '0',
  `createdBy` int(5) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` int(5) NOT NULL,
  `updateDate` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contractfiles`
--

INSERT INTO `contractfiles` (`contractfileId`, `contractId`, `clientId`, `contractName`, `contractDescription`, `contractfilestartDate`, `contractfiledueDate`, `contractNotes`, `contractType`, `membershipPeriod`, `membershipcost`, `membershipsalecomm`, `renewalert`, `ptsession`, `ptcostpersession`, `ptsalecomm`, `ptservicecomm`, `isActive`, `mssalestaffid`, `ptsalestaffid`, `ptservicestaffid`, `msgst`, `ptgst`, `daysComplete`, `monthComplete`, `sessionComplete`, `percentComplete`, `createdBy`, `createdDate`, `updatedBy`, `updateDate`) VALUES
(3, 6, 15, 'azim', 'bbbbb', '2015-04-28 16:00:00', '2017-04-28 16:00:00', 'vvvvv', 1, 24, '12.8400', '9.99', 6, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, '2015-04-29 04:04:44', 0, '0000-00-00 00:00:00'),
(4, 6, 15, 'azim', 'bbbbb', '2015-04-29 16:00:00', '2017-04-29 16:00:00', 'vvvvv', 1, 24, '12.8400', '9.99', 6, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, '2015-04-29 04:04:44', 0, '0000-00-00 00:00:00'),
(5, 6, 16, 'azim', 'bbbbb', '2015-05-11 16:00:00', '2017-05-11 16:00:00', 'vvvvv', 1, 24, '12.8400', '9.99', 6, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, '2015-05-12 04:32:26', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contractpayments`
--

CREATE TABLE IF NOT EXISTS `contractpayments` (
`paymentId` int(5) NOT NULL,
  `clientId` int(5) NOT NULL,
  `contractfileId` int(5) NOT NULL,
  `invoiceId` int(5) NOT NULL DEFAULT '0',
  `enteredBy` int(5) NOT NULL,
  `paymentFor` varchar(255) COLLATE utf8_bin NOT NULL,
  `paymentDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `paidBy` varchar(255) COLLATE utf8_bin NOT NULL,
  `paymentAmount` varchar(50) COLLATE utf8_bin NOT NULL,
  `paymentNotes` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `invoicepayNotes` text COLLATE utf8_bin
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE IF NOT EXISTS `contracts` (
`contractId` int(5) NOT NULL,
  `contractName` varchar(255) COLLATE utf8_bin NOT NULL,
  `contractDescription` longtext COLLATE utf8_bin,
  `startDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dueDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `contractNotes` text COLLATE utf8_bin,
  `contractType` int(1) NOT NULL DEFAULT '0',
  `membershipPeriod` int(2) DEFAULT '0',
  `membershipcost` decimal(13,4) DEFAULT '0.0000',
  `membershipsalecomm` decimal(3,2) DEFAULT '0.00',
  `renewalert` int(1) DEFAULT '0',
  `ptsession` int(2) DEFAULT '0',
  `ptcostpersession` decimal(13,4) DEFAULT '0.0000',
  `ptsalecomm` decimal(3,2) DEFAULT '0.00',
  `ptservicecomm` decimal(3,2) DEFAULT '0.00',
  `isActive` int(1) DEFAULT '0',
  `msgst` int(1) DEFAULT '0',
  `ptgst` int(1) DEFAULT '0',
  `createdBy` int(5) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` int(5) NOT NULL,
  `updatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`contractId`, `contractName`, `contractDescription`, `startDate`, `dueDate`, `contractNotes`, `contractType`, `membershipPeriod`, `membershipcost`, `membershipsalecomm`, `renewalert`, `ptsession`, `ptcostpersession`, `ptsalecomm`, `ptservicecomm`, `isActive`, `msgst`, `ptgst`, `createdBy`, `createdDate`, `updatedBy`, `updatedDate`) VALUES
(6, 'azim', 'bbbbb', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'vvvvv', 1, 24, '12.8400', '9.99', 6, NULL, NULL, NULL, NULL, 1, 1, 0, 1, '2015-04-23 04:44:41', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contractsoutlets`
--

CREATE TABLE IF NOT EXISTS `contractsoutlets` (
  `contractId` int(5) NOT NULL,
  `outletId` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contractsoutlets`
--

INSERT INTO `contractsoutlets` (`contractId`, `outletId`) VALUES
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `contract_payments`
--

CREATE TABLE IF NOT EXISTS `contract_payments` (
`contract_payment_id` int(5) NOT NULL,
  `clientId` int(5) NOT NULL,
  `payment_method_id` int(5) NOT NULL,
  `contract_payment_amount` double NOT NULL,
  `contract_payment_name` varchar(255) NOT NULL,
  `contract_payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contract_payment_term` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contract_payments`
--

INSERT INTO `contract_payments` (`contract_payment_id`, `clientId`, `payment_method_id`, `contract_payment_amount`, `contract_payment_name`, `contract_payment_date`, `contract_payment_term`) VALUES
(1, 16, 1, 23, 'sdfsdf', '2015-05-11 16:00:00', 'monthly'),
(2, 16, 2, 45, 'bbb', '2015-05-12 16:00:00', 'quarter');

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE IF NOT EXISTS `outlets` (
`outletId` int(5) NOT NULL,
  `outletname` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `outletphone` int(10) NOT NULL,
  `outletaddress` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `isActive` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`outletId`, `outletname`, `outletphone`, `outletaddress`, `isActive`) VALUES
(1, 'Hello', 987, 'kiki', 1),
(2, 'bbb', 333, 'wer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE IF NOT EXISTS `payment_method` (
`payment_method_id` int(5) NOT NULL,
  `payment_method_type` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_method_id`, `payment_method_type`) VALUES
(1, 'Online Bank transfer'),
(2, 'Bank in');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
 ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `codetable`
--
ALTER TABLE `codetable`
 ADD PRIMARY KEY (`codetableId`);

--
-- Indexes for table `contractfiles`
--
ALTER TABLE `contractfiles`
 ADD PRIMARY KEY (`contractfileId`);

--
-- Indexes for table `contractpayments`
--
ALTER TABLE `contractpayments`
 ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
 ADD PRIMARY KEY (`contractId`);

--
-- Indexes for table `contractsoutlets`
--
ALTER TABLE `contractsoutlets`
 ADD PRIMARY KEY (`contractId`,`outletId`);

--
-- Indexes for table `contract_payments`
--
ALTER TABLE `contract_payments`
 ADD PRIMARY KEY (`contract_payment_id`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
 ADD PRIMARY KEY (`outletId`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
 ADD PRIMARY KEY (`payment_method_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
MODIFY `adminId` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
MODIFY `clientId` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `codetable`
--
ALTER TABLE `codetable`
MODIFY `codetableId` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `contractfiles`
--
ALTER TABLE `contractfiles`
MODIFY `contractfileId` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contractpayments`
--
ALTER TABLE `contractpayments`
MODIFY `paymentId` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
MODIFY `contractId` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `contract_payments`
--
ALTER TABLE `contract_payments`
MODIFY `contract_payment_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
MODIFY `outletId` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
MODIFY `payment_method_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
