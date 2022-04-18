-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2022 at 12:22 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` bigint(20) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_phone` bigint(20) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_login_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_phone`, `admin_email`, `admin_login_id`) VALUES
(9, 'admin', 12345, 'admin@gmail.com', 43);

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `Area_id` int(11) NOT NULL,
  `Area_name` varchar(100) DEFAULT NULL,
  `Area_desc` varchar(100) DEFAULT NULL,
  `Area_town_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`Area_id`, `Area_name`, `Area_desc`, `Area_town_id`) VALUES
(1, 'Kayole', 'HOSDFA', 20),
(2, 'Alliance', 'Highshool', 22);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `Country_id` bigint(20) NOT NULL,
  `Country_name` varchar(200) NOT NULL,
  `Country_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`Country_id`, `Country_name`, `Country_desc`) VALUES
(4, 'Kenya', 'Hot'),
(5, 'Tanzania', 'This is TZ');

-- --------------------------------------------------------

--
-- Table structure for table `county`
--

CREATE TABLE `county` (
  `County_id` bigint(20) NOT NULL,
  `County_name` varchar(200) NOT NULL,
  `County_desc` varchar(200) NOT NULL,
  `County_Country_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `county`
--

INSERT INTO `county` (`County_id`, `County_name`, `County_desc`, `County_Country_id`) VALUES
(19, 'Nakuru', 'Not sooo hot', 4),
(20, 'Nairobi', 'This is A major town', 4),
(21, 'Kiambu', 'qwety', 4);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` bigint(20) NOT NULL,
  `login_username` varchar(200) NOT NULL,
  `login_password` varchar(200) NOT NULL,
  `login_rank` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_username`, `login_password`, `login_rank`) VALUES
(43, 'admin', '$2y$10$3NQeAny0jos2P0PPrwCI9.QgbWnaaTNnJJdzEn9ljoOzVW9ES8lZa', 'admin'),
(45, 'vendor', '$2y$10$haCcN/uiU3tcyEx9lxJZY.IDpZL2z/JYW5igKRkL3mTaXzd.XDN7W', 'vendor');

-- --------------------------------------------------------

--
-- Table structure for table `newspapers`
--

CREATE TABLE `newspapers` (
  `Newspaper_id` bigint(20) NOT NULL,
  `newspapers_Image` varchar(100) NOT NULL,
  `newspapers_Name` text NOT NULL,
  `newspapers_Headline` varchar(200) NOT NULL,
  `newspapers_vendor_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newspapers`
--

INSERT INTO `newspapers` (`Newspaper_id`, `newspapers_Image`, `newspapers_Name`, `newspapers_Headline`, `newspapers_vendor_id`) VALUES
(40, 'images/7df0b5c2bf68783ea207/11.jpg', 'Nairobian', 'Headlines', 31),
(41, 'images/43ee08321e38997c7d03/Screenshot from 2021-12-20 18-03-49.png', 'The Nairobian', 'newspapers_Headlinenewspapers_Headlinenewspapers_Headline', 31);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `Stock_id` bigint(20) NOT NULL,
  `Stock_newspaper_id` int(11) NOT NULL,
  `Stock_date` date NOT NULL DEFAULT current_timestamp(),
  `Stock_amount` int(11) NOT NULL,
  `Stock_sold` int(11) NOT NULL,
  `Stock_balance` int(11) NOT NULL,
  `Stock_vendor_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`Stock_id`, `Stock_newspaper_id`, `Stock_date`, `Stock_amount`, `Stock_sold`, `Stock_balance`, `Stock_vendor_id`) VALUES
(34, 39, '2022-01-05', 1000, 12, 0, 31),
(35, 40, '2021-12-28', 12, 100, 0, 31),
(36, 41, '2022-01-12', 12, 34, 13, 31);

-- --------------------------------------------------------

--
-- Table structure for table `town`
--

CREATE TABLE `town` (
  `Town_id` int(11) NOT NULL,
  `Town_name` varchar(200) NOT NULL,
  `Town_desc` varchar(200) NOT NULL,
  `Town_county_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `town`
--

INSERT INTO `town` (`Town_id`, `Town_name`, `Town_desc`, `Town_county_id`) VALUES
(20, 'Naivasha', 'This also very hot', 19),
(21, 'Nakuru town', 'this is nakuru town', 19),
(22, 'Kikuyu', 'towns', 21);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` bigint(20) NOT NULL,
  `vendor_name` varchar(200) NOT NULL,
  `vendor_mobile_no` varchar(200) NOT NULL,
  `vendor_email` varchar(200) NOT NULL,
  `location` int(11) DEFAULT 0,
  `vendor_login_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`, `vendor_mobile_no`, `vendor_email`, `location`, `vendor_login_id`) VALUES
(31, 'vendor2', '12345678', 'vendor@gmail.com', 1, 45);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `admin_login_id` (`admin_login_id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`Area_id`),
  ADD KEY `Area_town_id` (`Area_town_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`Country_id`);

--
-- Indexes for table `county`
--
ALTER TABLE `county`
  ADD PRIMARY KEY (`County_id`),
  ADD KEY `County_Country_id` (`County_Country_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `newspapers`
--
ALTER TABLE `newspapers`
  ADD PRIMARY KEY (`Newspaper_id`),
  ADD KEY `newspapers_vendor_id` (`newspapers_vendor_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`Stock_id`),
  ADD KEY `Stock_vendor_id` (`Stock_vendor_id`);

--
-- Indexes for table `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`Town_id`),
  ADD KEY `Town_county_id` (`Town_county_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`),
  ADD KEY `vendor_ibfk_1` (`vendor_login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `Area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `Country_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `county`
--
ALTER TABLE `county`
  MODIFY `County_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `newspapers`
--
ALTER TABLE `newspapers`
  MODIFY `Newspaper_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `Stock_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `town`
--
ALTER TABLE `town`
  MODIFY `Town_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`admin_login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`Area_town_id`) REFERENCES `town` (`Town_id`);

--
-- Constraints for table `county`
--
ALTER TABLE `county`
  ADD CONSTRAINT `county_ibfk_1` FOREIGN KEY (`County_Country_id`) REFERENCES `country` (`Country_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `newspapers`
--
ALTER TABLE `newspapers`
  ADD CONSTRAINT `newspapers_ibfk_1` FOREIGN KEY (`newspapers_vendor_id`) REFERENCES `vendor` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`Stock_vendor_id`) REFERENCES `vendor` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `town`
--
ALTER TABLE `town`
  ADD CONSTRAINT `town_ibfk_1` FOREIGN KEY (`Town_county_id`) REFERENCES `county` (`County_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendor`
--
ALTER TABLE `vendor`
  ADD CONSTRAINT `vendor_ibfk_1` FOREIGN KEY (`vendor_login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
