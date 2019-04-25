-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 01:32 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `chart_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`chart_id`, `name`) VALUES
(1, 'Equity'),
(2, 'Liabilities'),
(3, 'Assets'),
(4, 'Income'),
(5, 'Expense');

-- --------------------------------------------------------

--
-- Table structure for table `levelone`
--

CREATE TABLE `levelone` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `chart_id` int(11) NOT NULL,
  `levelone_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levelone`
--

INSERT INTO `levelone` (`id`, `name`, `chart_id`, `levelone_id`) VALUES
(1, 'Shear Capital', 1, 101);

-- --------------------------------------------------------

--
-- Table structure for table `levelthree`
--

CREATE TABLE `levelthree` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `leveltwo_id` int(11) NOT NULL,
  `levelthree_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levelthree`
--

INSERT INTO `levelthree` (`id`, `name`, `leveltwo_id`, `levelthree_id`) VALUES
(1, 'Capital introduce', 101001, 101001001),
(2, 'Dividends', 101001, 101001002);

-- --------------------------------------------------------

--
-- Table structure for table `leveltwo`
--

CREATE TABLE `leveltwo` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `levelone_id` int(11) NOT NULL,
  `leveltwo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leveltwo`
--

INSERT INTO `leveltwo` (`id`, `name`, `levelone_id`, `leveltwo_id`) VALUES
(1, 'Mr Asad Javed ', 101, 101001);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `employeeCode` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registerDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `employeeCode`, `username`, `password`, `registerDate`) VALUES
(1, 'Muhammad', 'Usman', 'usman@aimstech.net', 'ATFS0537', 'usman', 'bdb5b1ce6d7883a43b6b2629176ed881', '2019-04-09 18:30:43'),
(2, 'Yasir', 'Anjum', 'yasir@aimstech.net', 'ATFS0208', 'yasir', 'c35a28fbcc7ae3df83671a83ed1ca162', '2019-04-10 10:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `voucher_id` int(11) NOT NULL,
  `voucher_type_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `debit` decimal(12,2) NOT NULL,
  `credit` decimal(12,2) NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `voucher_type`
--

CREATE TABLE `voucher_type` (
  `voucher_type_id` int(11) NOT NULL,
  `voucher_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher_type`
--

INSERT INTO `voucher_type` (`voucher_type_id`, `voucher_type`) VALUES
(1, 'Journal Voucher (JV)'),
(2, 'Cash Receipt Voucher (CRV)'),
(3, 'Cash Payment Voucher  (CPV)'),
(4, 'Bank Receipt Voucher  (BRV)'),
(5, 'Bank Payment Voucher  (BPV)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`chart_id`);

--
-- Indexes for table `levelone`
--
ALTER TABLE `levelone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chart_id` (`chart_id`);

--
-- Indexes for table `levelthree`
--
ALTER TABLE `levelthree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leveltwo`
--
ALTER TABLE `leveltwo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`voucher_id`),
  ADD KEY `voucher_type_id` (`voucher_type_id`);

--
-- Indexes for table `voucher_type`
--
ALTER TABLE `voucher_type`
  ADD PRIMARY KEY (`voucher_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `chart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `levelone`
--
ALTER TABLE `levelone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `levelthree`
--
ALTER TABLE `levelthree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `leveltwo`
--
ALTER TABLE `leveltwo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `voucher_type`
--
ALTER TABLE `voucher_type`
  MODIFY `voucher_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `levelone`
--
ALTER TABLE `levelone`
  ADD CONSTRAINT `levelone_ibfk_1` FOREIGN KEY (`chart_id`) REFERENCES `chart` (`chart_id`);

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `vouchers_ibfk_1` FOREIGN KEY (`voucher_type_id`) REFERENCES `voucher_type` (`voucher_type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
